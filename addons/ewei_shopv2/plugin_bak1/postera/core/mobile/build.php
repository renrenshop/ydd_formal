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


		$poster = pdo_fetch('select * from ' . tablename('ewei_shop_postera') . ' where keyword2=:keyword and uniacid=:uniacid limit 1', array(':keyword' => $content, ':uniacid' => $_W['uniacid']));

		if (empty($poster)) {
			m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_postera_core_mobile_build_0'].'!');
			exit();
		}


		$time = time();

		if ($time < $poster['timestart']) {
			$starttext = ((empty($poster['starttext']) ? ''.$this->lang['lang_plugin_postera_core_mobile_build_1'].' [starttime] '.$this->lang['lang_plugin_postera_core_mobile_build_2'].'...' : $poster['starttext']));
			$starttext = str_replace('[starttime]', date('Y'.$this->lang['lang_plugin_postera_core_mobile_build_3'].'m'.$this->lang['lang_plugin_postera_core_mobile_build_4'].'d'.$this->lang['lang_plugin_postera_core_mobile_build_5'].' H:i', $poster['timestart']), $starttext);
			$starttext = str_replace('[endtime]', date('Y'.$this->lang['lang_plugin_postera_core_mobile_build_6'].'m'.$this->lang['lang_plugin_postera_core_mobile_build_7'].'d'.$this->lang['lang_plugin_postera_core_mobile_build_8'].' H:i', $poster['timeend']), $starttext);
			m('message')->sendCustomNotice($openid, $starttext);
			exit();
		}


		if ($poster['timeend'] < time()) {
			$endtext = ((empty($poster['endtext']) ? ''.$this->lang['lang_plugin_postera_core_mobile_build_9'].'' : $poster['endtext']));
			$endtext = str_replace('[starttime]', date('Y-m-d H:i', $poster['timestart']), $endtext);
			$endtext = str_replace('[endtime]', date('Y-m-d- H:i', $poster['timeend']), $endtext);
			m('message')->sendCustomNotice($openid, $endtext);
			exit();
		}


		if (($member['isagent'] != 1) || ($member['status'] != 1)) {
			if (empty($poster['isopen'])) {
				$opentext = ((!empty($poster['opentext']) ? htmlspecialchars_decode($poster['opentext'], ENT_QUOTES) : ''.$this->lang['lang_plugin_postera_core_mobile_build_10'].'!'));
				m('message')->sendCustomNotice($openid, $opentext, trim($poster['openurl']));
				exit();
			}

		}


		$waittext = ((!empty($poster['waittext']) ? htmlspecialchars_decode($poster['waittext'], ENT_QUOTES) : ''.$this->lang['lang_plugin_postera_core_mobile_build_11'].'...'));
		$waittext = str_replace('[starttime]', date('Y'.$this->lang['lang_plugin_postera_core_mobile_build_12'].'m'.$this->lang['lang_plugin_postera_core_mobile_build_13'].'d'.$this->lang['lang_plugin_postera_core_mobile_build_14'].' H:i', $poster['timestart']), $waittext);
		$waittext = str_replace('[endtime]', date('Y'.$this->lang['lang_plugin_postera_core_mobile_build_15'].'m'.$this->lang['lang_plugin_postera_core_mobile_build_16'].'d'.$this->lang['lang_plugin_postera_core_mobile_build_17'].' H:i', $poster['timeend']), $waittext);
		m('message')->sendCustomNotice($openid, $waittext);
		$qr = $this->model->getQR($poster, $member);

		if (is_error($qr)) {
			m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_postera_core_mobile_build_18'].': ' . $qr['message']);
			exit();
		}


		$img = $this->model->createPoster($poster, $member, $qr);
		$mediaid = $img['mediaid'];

		if (!empty($mediaid)) {
			m('message')->sendImage($openid, $mediaid);
		}
		 else {
			$oktext = '<a href=\'' . $img['img'] . '\'>'.$this->lang['lang_plugin_postera_core_mobile_build_19'].'</a>';
			m('message')->sendCustomNotice($openid, $oktext);
		}

		exit();
	}
}


?>