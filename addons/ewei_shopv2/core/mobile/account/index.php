<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Index_EweiShopV2Page extends MobilePage 
{
	protected function getWapSet() 
	{
		global $_W;
		global $_GPC;
		$set = m('common')->getSysset(array('shop', 'wap'));
		$set['wap']['color'] = ((empty($set['wap']['color']) ? '#fff' : $set['wap']['color']));
		$params = array();
		if (!(empty($_GPC['mid']))) 
		{
			$params['mid'] = $_GPC['mid'];
		}
		if (!(empty($_GPC['backurl']))) 
		{
			$params['backurl'] = $_GPC['backurl'];
		}
		$set['wap']['loginurl'] = mobileUrl('account/login', $params);
		$set['wap']['regurl'] = mobileUrl('account/register', $params);
		$set['wap']['forgeturl'] = mobileUrl('account/forget', $params);
		return $set;
	}
	public function login() 
	{
		global $_W;
		global $_GPC;
		if (is_weixin() || !(empty($_GPC['__ewei_shopv2_member_session_' . $_W['uniacid']]))) 
		{
			header('location: ' . mobileUrl());
		}
		if ($_W['ispost']) 
		{
			$mobile = trim($_GPC['mobile']);
			$pwd = trim($_GPC['pwd']);
			$member = pdo_fetch('select id,openid,mobile,pwd,salt from ' . tablename('ewei_shop_member') . ' where mobile=:mobile and mobileverify=1 and uniacid=:uniacid limit 1', array(':mobile' => $mobile, ':uniacid' => $_W['uniacid']));
//			echo '<pre>';
//			print_r($mobile);die;
			if (empty($member)) 
			{
				show_json(0, $this->lang['lang_module_account_index_0']);
			}
			if (md5($pwd . $member['salt']) !== $member['pwd']) 
			{
				show_json(0, $this->lang['lang_module_account_index_1']);
			}
			m('account')->setLogin($member);
			show_json(1, $this->lang['lang_module_account_index_2']);
		}
		$set = $this->getWapSet();
		$backurl = '';
		if (!(empty($_GPC['backurl']))) 
		{
			$backurl = $_W['siteroot'] . 'app/index.php?' . base64_decode(urldecode($_GPC['backurl']));
		}
		$wapset = $_W['shopset']['wap'];
		$sns = $wapset['sns'];
		include $this->template('login', NULL, true);
	}
	public function register() 
	{
		$this->rf(0);
	}
	public function forget() 
	{
		$this->rf(1);
	}
	protected function rf($type) 
	{
		global $_W;
		global $_GPC;
		if (is_weixin() || !(empty($_GPC['__ewei_shopv2_member_session_' . $_W['uniacid']]))) 
		{
			header('location: ' . mobileUrl());
		}
		if ($_W['ispost']) 
		{
			$mobile = trim($_GPC['mobile']);
			$verifycode = trim($_GPC['verifycode']);
			$pwd = trim($_GPC['pwd']);
			if (empty($mobile)) 
			{
				show_json(0, $this->lang['lang_module_account_index_3']);
			}
			if (empty($verifycode)) 
			{
				show_json(0, $this->lang['lang_module_account_index_4']);
			}
			if (empty($pwd)) 
			{
				show_json(0, $this->lang['lang_module_account_index_5']);
			}
			$key = '__ewei_shopv2_member_verifycodesession_' . $_W['uniacid'] . '_' . $mobile;
			if (!(isset($_SESSION[$key])) || ($_SESSION[$key] !== $verifycode) || !(isset($_SESSION['verifycodesendtime'])) || (($_SESSION['verifycodesendtime'] + 600) < time()))
			{
				show_json(0, $this->lang['lang_module_account_index_6'].'!');
			}
			$member = pdo_fetch('select id,openid,mobile,pwd,salt from ' . tablename('ewei_shop_member') . ' where mobile=:mobile and mobileverify=1 and uniacid=:uniacid limit 1', array(':mobile' => $mobile, ':uniacid' => $_W['uniacid']));
			if (empty($type)) 
			{
				if (!(empty($member))) 
				{
					show_json(0, $this->lang['lang_module_account_index_7'].','.$this->lang['lang_module_account_index_8']);
				}
				$salt = ((empty($member) ? '' : $member['salt']));
				if (empty($salt)) 
				{
					$salt = m('account')->getSalt();
				}
				$openid = ((empty($member) ? '' : $member['openid']));
				$nickname = ((empty($member) ? '' : $member['nickname']));
				if (empty($openid)) 
				{
					$openid = 'wap_user_' . $_W['uniacid'] . '_' . $mobile;
					$nickname = substr($mobile, 0, 3) . 'xxxx' . substr($mobile, 7, 4);
				}
				$data = array('uniacid' => $_W['uniacid'], 'mobile' => $mobile, 'nickname' => $nickname, 'openid' => $openid, 'pwd' => md5($pwd . $salt), 'salt' => $salt, 'createtime' => time(), 'mobileverify' => 1, 'comefrom' => 'mobile');
			}
			else 
			{
				if (empty($member)) 
				{
					show_json(0, $this->lang['lang_module_account_index_9']);
				}
				$salt = m('account')->getSalt();
				$data = array('salt' => $salt, 'pwd' => md5($pwd . $salt));
			}
			if (empty($member)) 
			{
				pdo_insert('ewei_shop_member', $data);
				if (method_exists(m('member'), 'memberRadisCountDelete')) 
				{
					m('member')->memberRadisCountDelete();
				}
			}
			else 
			{
				pdo_update('ewei_shop_member', $data, array('id' => $member['id']));
			}
			if (p('commission')) 
			{
				p('commission')->checkAgent($openid);
			}
			unset($_SESSION[$key]);
			show_json(1, (empty($type) ? $this->lang['lang_module_account_index_10'] : $this->lang['lang_module_account_index_11']));
		}
		$sendtime = $_SESSION['verifycodesendtime'];
		if (empty($sendtime) || (($sendtime + 60) < time())) 
		{
			$endtime = 0;
		}
		else 
		{
			$endtime = 60 - time() - $sendtime;
		}
		$set = $this->getWapSet();
		include $this->template('rf', NULL, true);
	}
	public function logout() 
	{
		global $_W;
		global $_GPC;
		$key = '__ewei_shopv2_member_session_' . $_W['uniacid'];
		isetcookie($key, false, -100);
		header('location: ' . mobileUrl());
		exit();
	}
	public function sns() 
	{
		global $_W;
		global $_GPC;
		if (is_weixin() || !(empty($_GPC['__ewei_shopv2_member_session_' . $_W['uniacid']]))) 
		{
			header('location: ' . mobileUrl());
		}
		$sns = trim($_GPC['sns']);
		if ($_W['ispost'] && !(empty($sns)) && !(empty($_GPC['openid']))) 
		{
			m('member')->checkMemberSNS($sns);
		}
		if ($_GET['openid']) 
		{
			if ($sns == 'qq') 
			{
				$_GET['openid'] = 'sns_qq_' . $_GET['openid'];
			}
			if ($sns == 'wx') 
			{
				$_GET['openid'] = 'sns_wx_' . $_GET['openid'];
			}
			m('account')->setLogin($_GET['openid']);
		}
		$backurl = '';
		if (!(empty($_GPC['backurl']))) 
		{
			$backurl = $_W['siteroot'] . 'app/index.php?' . base64_decode(urldecode($_GPC['backurl']));
		}
		$backurl = ((empty($backurl) ? mobileUrl(NULL, NULL, true) : trim($backurl)));
		header('location: ' . $backurl);
	}
	public function verifycode() 
	{
		global $_W;
		global $_GPC;
        load()->func('logging');
		@session_start();

		$set = $this->getWapSet();
		$mobile = trim($_GPC['mobile']);
		$temp = trim($_GPC['temp']);
		$imgcode = trim($_GPC['imgcode']);
		if (empty($mobile))
		{
			show_json(0, $this->lang['lang_module_account_index_12']);
		}
		if (empty($temp)) 
		{
			show_json(0, $this->lang['lang_module_account_index_13']);
		}
		if (!(empty($_SESSION['verifycodesendtime'])) && (time() < ($_SESSION['verifycodesendtime'] + 60))) 
		{
			show_json(0, $this->lang['lang_module_account_index_14']);
		}
		if (!(empty($set['wap']['smsimgcode']))) 
		{
			if (empty($imgcode)) 
			{
				show_json(0, $this->lang['lang_module_account_index_15']);
			}
			$imgcodehash = md5(strtolower($imgcode) . $_W['config']['setting']['authkey']);
			if ($imgcodehash != trim($_GPC['__code'])) 
			{
				show_json(-1, $this->lang['lang_module_account_index_16']);
			}
		}
		$member = pdo_fetch('select id,openid,mobile,pwd,salt from ' . tablename('ewei_shop_member') . ' where mobile=:mobile and mobileverify=1 and uniacid=:uniacid limit 1', array(':mobile' => $mobile, ':uniacid' => $_W['uniacid']));
		if (($temp == 'sms_forget') && empty($member)) 
		{
			show_json(0, $this->lang['lang_module_account_index_17']);
		}
		if (($temp == 'sms_reg') && !(empty($member))) 
		{
			show_json(0, $this->lang['lang_module_account_index_18']);
		}
		$sms_id = $set['wap'][$temp];
		if (empty($sms_id)) 
		{
			show_json(0, $this->lang['lang_module_account_index_19'].'(NOSMSID)');
		}
		$key = '__ewei_shopv2_member_verifycodesession_' . $_W['uniacid'] . '_' . $mobile;

		@session_start();
		$code = random(5, true);

		$shopname = $_W['shopset']['shop']['name'];
		$ret = array('status' => 0, 'message' => '发送失败');
		if (com('sms')) 
		{
            $res = strpos($mobile,'03');
		    if($res === 0){
                show_json(0, $this->lang['lang_module_account_index_24']);
            }

		    //判断电话号码前是否有0
            $res = strpos($mobile,'01');

            if($res === 0){
                $mobile = substr($mobile,1);
            }elseif($res === false){
                $res = strpos($mobile,'1');
                if($res === false){
                    show_json(0, $this->lang['lang_module_account_index_24']);
                }
            }

            //马来西亚电话号码前加0060
            $mobile = '0060'.$mobile;

//            file_put_contents(dirname(__FILE__).'/'.time().'mobile.txt',$mobile);
//            file_put_contents(dirname(__FILE__).'/'.time().'code.txt',$code);
//            pp($mobile); // test
            //0126602196
            logging_run(['mobile' => $mobile, 'code' => $code, 'time' => date('Y-m-d H:i:s')], 'info', 'account');

            $ret = com('sms')->send($mobile, $sms_id, array('验证码' => $code, $this->lang['lang_module_account_index_21'] => (!(empty($shopname)) ? $shopname : $this->lang['lang_module_account_index_22'])));



		}

		if ($ret['status']) 
		{
			$_SESSION[$key] = $code;
			$_SESSION['verifycodesendtime'] = time();
			show_json(1, $this->lang['lang_module_account_index_23']);
		}
		show_json(0, $ret['message']);
	}
}
?>