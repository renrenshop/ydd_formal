<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'mmanage/core/inc/page_mmanage.php';
class Login_EweiShopV2Page extends MmanageMobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$check = $this->isLogin();
		if ($check) 
		{
			header('location: ' . mobileUrl('mmanage'));
		}
		$backurl = trim($_GPC['backurl']);
		if ($_W['ispost']) 
		{
			$type = trim($_GPC['type']);
			if (!(empty($backurl))) 
			{
				$backurl = base64_decode(urldecode($backurl));
				$backurl = './index.php?' . $backurl;
			}
			load()->model('user');
			if ($type == 'wechat') 
			{
				if (empty($_W['openid'])) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_0'].'');
				}
				$roleuser = pdo_fetch('SELECT id, uid, username, status FROM' . tablename('ewei_shop_perm_user') . 'WHERE openid=:openid AND uniacid=:uniacid LIMIT 1', array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid']));
				if (empty($roleuser)) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_1'].'');
				}
				if (empty($roleuser['status'])) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_2'].'');
				}
				$account = user_single($roleuser['uid']);
				if (!($account)) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_3'].'');
				}
				$account['hash'] = md5($account['password'] . $account['salt']);
				$session = base64_encode(json_encode($account));
				$session_key = '__mmanage_' . $_W['uniacid'] . '_session';
				isetcookie($session_key, $session, 7200);
				show_json(1, array('backurl' => $backurl));
			}
			else 
			{
				$username = trim($_GPC['username']);
				$password = trim($_GPC['password']);
				if (empty($username)) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_4'].'');
				}
				if (empty($password)) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_5'].'');
				}
				if (!(user_check(array('username' => $username)))) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_6'].'');
				}
				if (!(user_check(array('username' => $username, 'password' => $password)))) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_login_7'].'');
				}
				$account = user_single(array('username' => $username));
				$account['hash'] = md5($account['password'] . $account['salt']);
				$session = base64_encode(json_encode($account));
				$session_key = '__mmanage_' . $_W['uniacid'] . '_session';
				isetcookie($session_key, $session, 7200);
				show_json(1, array('backurl' => $backurl));
			}
		}
		$shopset = $_W['shopset'];
		$logo = tomedia($shopset['shop']['logo']);
		if (is_weixin() || (!(empty($shopset['wap']['open'])) && empty($shopset['wap']['inh5app']))) 
		{
			$goshop = true;
		}
		include $this->template();
	}
	public function logout() 
	{
		global $_W;
		global $_GPC;
		$session_key = '__mmanage_' . $_W['uniacid'] . '_session';
		isetcookie($session_key, false, -100);
		unset($GLOBALS['_W']['mmanage']);
		if ($_W['isajax']) 
		{
			show_json(1);
		}
		else 
		{
			header('location: ' . mobileUrl('mmanage/login'));
		}
	}
}
?>