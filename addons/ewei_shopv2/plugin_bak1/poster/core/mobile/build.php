<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}

class build_EweiShopV2Page extends PluginPfMobilePage
{
	public function main()
	{
		global $_W;
		global $_GPC;
		$goods = array();
		$openid = trim($_GPC['openid']);
		$content = trim(urldecode($_GPC['content']));

		if (empty($openid)) {
			exit();
		}


		$member = m('member')->getMember($openid);

		if (empty($member)) {
			exit();
		}


		if (strexists($content, '+')) {
			$msg = explode('+', $content);
			$poster = pdo_fetch('select * from ' . tablename('ewei_shop_poster') . ' where keyword2=:keyword and type=3 and isdefault=1 and uniacid=:uniacid limit 1', array(':keyword' => $msg[0], ':uniacid' => $_W['uniacid']));

			if (empty($poster)) {
				m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_poster_core_mobile_build_0'].'!');
				exit();
			}


			$goodsid = intval($msg[1]);

			if (empty($goodsid)) {
				m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_poster_core_mobile_build_1'].', '.$this->lang['lang_plugin_poster_core_mobile_build_2'].' !');
				exit();
			}

		}
		 else {
			$poster = pdo_fetch('select * from ' . tablename('ewei_shop_poster') . ' where keyword2=:keyword and isdefault=1 and uniacid=:uniacid limit 1', array(':keyword' => $content, ':uniacid' => $_W['uniacid']));

			if (empty($poster)) {
				m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_poster_core_mobile_build_3'].'!');
				exit();
			}

		}

		if (($member['isagent'] != 1) || ($member['status'] != 1)) {
			if (empty($poster['isopen'])) {
				$opentext = ((!empty($poster['opentext']) ? $poster['opentext'] : ''.$this->lang['lang_plugin_poster_core_mobile_build_4'].'!'));
				m('message')->sendCustomNotice($openid, $opentext, trim($poster['openurl']));
				exit();
			}

		}


		$waittext = ((!empty($poster['waittext']) ? htmlspecialchars_decode($poster['waittext'], ENT_QUOTES) : ''.$this->lang['lang_plugin_poster_core_mobile_build_5'].'...'));
		$waittext = str_replace('"', '\\"', $waittext);
		m('message')->sendCustomNotice($openid, $waittext);
		$qr = $this->model->getQR($poster, $member, $goodsid);

		if (is_error($qr)) {
			m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_poster_core_mobile_build_6'].': ' . $qr['message']);
			exit();
		}


		$img = $this->model->createPoster($poster, $member, $qr);
		$mediaid = $img['mediaid'];

		if (!empty($mediaid)) {
			m('message')->sendImage($openid, $mediaid);
		}
		 else {
			$oktext = '<a href=\'' . $img['img'] . '\'>'.$this->lang['lang_plugin_poster_core_mobile_build_7'].'</a>';
			m('message')->sendCustomNotice($openid, $oktext);
		}

		exit();
	}
}


?>