<?php
if (!(defined("IN_IA"))) 
{
	exit("Access Denied");
}
class Pay_Alipay_EweiShopV2Page extends MobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$url = urldecode($_GPC['url']);
		if (!(is_weixin())) 
		{
			header("location: " . $url);
			exit();
		}
		include $this->template('pc.order/alipay');
	}
	public function complete() 
	{
		global $_GPC;
		global $_W;
		$set = m('common')->getSysset(array('shop', 'pay'));
		$fromwechat = intval($_GPC['fromwechat']);
		$tid = $_GPC['out_trade_no'];
		if (is_h5app()) 
		{
			$sec = m('common')->getSec();
			$sec = iunserializer($sec['sec']);
			$public_key = $sec['app_alipay']['public_key'];
			if (empty($set['pay']['app_alipay']) || empty($public_key)) 
			{
				$this->message(''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_0'].'(1)!', mobileUrl('pc.order'));
			}
			$alidata = base64_decode($_GET['alidata']);
			$alidata = json_decode($alidata, true);
			$alisign = m('finance')->RSAVerify($alidata, $public_key, false);
			$tid = $this->str($alidata['out_trade_no']);
			if ($alisign == 0) 
			{
				$this->message(''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_1'].'(2)!', mobileUrl('pc.order'));
			}
			if (strexists($tid, 'GJ')) 
			{
				$tids = explode('GJ', $tid);
				$tid = $tids[0];
			}
		}
		else 
		{
			if (empty($set['pay']['alipay'])) 
			{
				$this->message(''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_2'].'!', mobileUrl('pc.order'));
			}
			if (!(m("finance")->isAlipayNotify($_GET))) 
			{
				$log = pdo_fetch('SELECT * FROM ' . tablename('core_paylog') . ' WHERE `uniacid`=:uniacid AND `module`=:module AND `tid`=:tid limit 1', array(':uniacid' => $_W['uniacid'], ':module' => 'ewei_shopv2', ':tid' => $tid));
				if (($log['status'] == 1) && ($log['fee'] == $_GPC['total_fee'])) 
				{
					if ($fromwechat) 
					{
						$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_3'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_4'].'!', 'buttondisplay' => false), NULL, 'success');
					}
					else 
					{
						$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_5'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_6'].'!'), mobileUrl('pc.order'), 'success');
					}
				}
				$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_7'].'('.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_8'].')!', 'buttondisplay' => ($fromwechat ? false : true)), ($fromwechat ? NULL : mobileUrl('pc.order')));
			}
		}
		$log = pdo_fetch('SELECT * FROM ' . tablename('core_paylog') . ' WHERE `uniacid`=:uniacid AND `module`=:module AND `tid`=:tid limit 1', array(':uniacid' => $_W['uniacid'], ':module' => 'ewei_shopv2', ':tid' => $tid));
		if (empty($log)) 
		{
			$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_9'].'('.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_10'].'2)!', 'buttondisplay' => ($fromwechat ? false : true)), ($fromwechat ? NULL : mobileUrl('pc.order')));
		}
		if (is_h5app()) 
		{
			$alidatafee = $this->str($alidata['total_fee']);
			$alidatastatus = $this->str($alidata['success']);
			if (($log['fee'] != $alidatafee) || !($alidatastatus)) 
			{
				$this->message(''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_11'].'(4)!', mobileUrl('pc.order'));
			}
		}
		if ($log['status'] != 1) 
		{
			$record = array();
			$record['status'] = '1';
			$record['type'] = 'alipay';
			pdo_update("core_paylog", $record, array('plid' => $log['plid']));
			$orderid = pdo_fetchcolumn('select id from ' . tablename('ewei_shop_order') . ' where ordersn=:ordersn and uniacid=:uniacid', array(':ordersn' => $log['tid'], ':uniacid' => $_W['uniacid']));
			if (!(empty($orderid))) 
			{
				m('order')->setOrderPayType($orderid, 22);
				$data_alipay = array('transid' => $_GET['trade_no']);
				if (is_h5app()) 
				{
					$data_alipay['transid'] = $alidata['trade_no'];
					$data_alipay['apppay'] = 1;
				}
				pdo_update("ewei_shop_order", $data_alipay, array('id' => $orderid));
			}
			$ret = array();
			$ret['result'] = 'success';
			$ret['type'] = 'alipay';
			$ret['from'] = 'return';
			$ret['tid'] = $log['tid'];
			$ret['user'] = $log['openid'];
			$ret['fee'] = $log['fee'];
			$ret['weid'] = $log['weid'];
			$ret['uniacid'] = $log['uniacid'];
			m("order")->payResult($ret);
		}
		if (is_h5app()) 
		{
			$url = mobileUrl('pc.order/detail', array('id' => $orderid), true);
			exit("<script>top.window.location.href='" . $url . '\'</script>');
			return;
		}
		if ($fromwechat) 
		{
			$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_12'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_13'].'!', 'buttondisplay' => false), NULL, 'success');
			return;
		}
		$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_14'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_15'].'!'), mobileUrl('pc.order'), 'success');
	}
	public function recharge_complete() 
	{
		global $_W;
		global $_GPC;
		$fromwechat = intval($_GPC['fromwechat']);
		$logno = trim($_GPC['out_trade_no']);
		$notify_id = trim($_GPC['notify_id']);
		$sign = trim($_GPC['sign']);
		$set = m('common')->getSysset(array('shop', 'pay'));
		if (is_h5app()) 
		{
			$sec = m('common')->getSec();
			$sec = iunserializer($sec['sec']);
			$public_key = $sec['app_alipay']['public_key'];
			if (empty($_GET['alidata'])) 
			{
				$this->message(''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_16'].'(1)!', mobileUrl('pc.order'));
			}
			if (empty($set['pay']['app_alipay']) || empty($public_key)) 
			{
				$this->message(''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_17'].'(2)!', mobileUrl('pc.order'));
			}
			$alidata = base64_decode($_GET['alidata']);
			$alidata = json_decode($alidata, true);
			$alisign = m('finance')->RSAVerify($alidata, $public_key, false);
			$logno = $this->str($alidata['out_trade_no']);
			if ($alisign == 0) 
			{
				$this->message(''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_18'].'(3)!', mobileUrl('pc.order'));
			}
			$transid = $alidata['trade_no'];
		}
		else 
		{
			if (empty($logno)) 
			{
				$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_19'].'('.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_20'].'1)!', 'buttondisplay' => ($fromwechat ? false : true)), ($fromwechat ? NULL : mobileUrl('pc.order')));
			}
			if (empty($set['pay']['alipay'])) 
			{
				$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_21'].'('.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_22'].')!', 'buttondisplay' => ($fromwechat ? false : true)), ($fromwechat ? NULL : mobileUrl('pc.order')));
			}
			if (!(m("finance")->isAlipayNotify($_GET))) 
			{
				$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_log') . ' WHERE `logno`=:logno and `uniacid`=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':logno' => $logno));
				if (!(empty($log)) && !(empty($log['status']))) 
				{
					if ($fromwechat) 
					{
						$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_23'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_24'].'!', 'buttondisplay' => false), NULL, 'success');
					}
					else 
					{
						$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_25'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_26'].'!'), mobileUrl('pc.order'), 'success');
					}
				}
				$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_27'].'('.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_28'].'2)!', 'buttondisplay' => ($fromwechat ? false : true)), ($fromwechat ? NULL : mobileUrl('pc.order')));
			}
			$transid = $_GET['trade_no'];
		}
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_log') . ' WHERE `logno`=:logno and `uniacid`=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':logno' => $logno));
		if (!(empty($log)) && empty($log['status'])) 
		{
			pdo_update('ewei_shop_member_log', array('status' => 1, 'rechargetype' => 'alipay', 'apppay' => (is_h5app() ? 1 : 0), 'transid' => $transid), array('id' => $log['id']));
			m("member")->setCredit($log['openid'], 'credit2', $log['money'], array(0, $_W['shopset']['shop']['name'] . ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_29'].':alipayreturn:credit2:' . $log['money']));
			m("member")->setRechargeCredit($log['openid'], $log['money']);
			com_run("sale::setRechargeActivity", $log);
			com_run("coupon::useRechargeCoupon", $log);
			m("notice")->sendMemberLogMessage($log['id']);
		}
		if (is_h5app()) 
		{
			$url = mobileUrl('member', NULL, true);
			exit("<script>top.window.location.href='" . $url . '\'</script>');
			return;
		}
		if ($fromwechat) 
		{
			$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_30'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_31'].'!', 'buttondisplay' => false), NULL, 'success');
			return;
		}
		$this->message(array('message' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_32'].'', 'title' => ''.$this->lang['lang_plugin_pc_core_mobile_order_pay_alipay_33'].'!'), mobileUrl('pc.order'), 'success');
	}
	protected function str($str) 
	{
		$str = str_replace('"', '', $str);
		$str = str_replace('\'', '', $str);
		return $str;
	}
}
?>