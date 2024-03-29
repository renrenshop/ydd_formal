<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Pay_EweiShopV2Page extends PluginMobileLoginPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W['openid'];
		load()->model('mc');
		$uid = mc_openid2uid($openid);
		if (empty($uid)) 
		{
			mc_oauth_userinfo($openid);
		}
		$member = m('member')->getMember($openid, true);
		$uniacid = $_W['uniacid'];
		$orderid = intval($_GPC['orderid']);
		$teamid = intval($_GPC['teamid']);
		$order = pdo_fetch('select o.*,g.title,g.status as gstatus,g.deleted as gdeleted,g.stock from ' . tablename('ewei_shop_groups_order') . ' as o' . "\r\n\t\t\t\t" . 'left join ' . tablename('ewei_shop_groups_goods') . ' as g on g.id = o.goodid' . "\r\n\t\t\t\t" . 'where o.id = :id and o.uniacid = :uniacid order by o.createtime desc', array(':id' => $orderid, ':uniacid' => $uniacid));
		if (empty($order)) 
		{
			$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_0'].'', mobileUrl('groups/index'), 'error');
		}
		if (!(empty($isteam)) && ($order['success'] == -1)) 
		{
			$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_1'].'', mobileUrl('groups/index'), 'error');
		}
		if (empty($order['gstatus']) || !(empty($order['gdeleted']))) 
		{
			$this->message($order['title'] . '<br/> '.$this->lang['lang_plugin_groups_core_mobile_pay_2'].'!', mobileUrl('groups/index'), 'error');
		}
		if ($order['stock'] <= 0) 
		{
			$this->message($order['title'] . '<br/>'.$this->lang['lang_plugin_groups_core_mobile_pay_3'].'!', mobileUrl('groups/index'), 'error');
		}
		if (!(empty($teamid))) 
		{
			$team_orders = pdo_fetchall('select * from ' . tablename('ewei_shop_groups_order') . "\r\n\t\t\t\t\t" . 'where teamid = :teamid and uniacid = :uniacid ', array(':teamid' => $teamid, ':uniacid' => $uniacid));
			foreach ($team_orders as $key => $value ) 
			{
				if ($team_orders && ($value['success'] == -1)) 
				{
					$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_4'].'', mobileUrl('groups/index'), 'error');
				}
				if ($team_orders && ($value['success'] == 1)) 
				{
					$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_5'].'', mobileUrl('groups/index'), 'error');
				}
			}
			$num = pdo_fetchcolumn('select count(1) from ' . tablename('ewei_shop_groups_order') . ' as o where teamid = :teamid and status > :status and uniacid = :uniacid ', array(':teamid' => $teamid, ':status' => 0, ':uniacid' => $uniacid));
			if ($order['groupnum'] <= $num) 
			{
				$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_6'].'', mobileUrl('groups/index'), 'error');
			}
		}
		if (empty($order)) 
		{
			header('location: ' . mobileUrl('groups'));
			exit();
		}
		if ($order['status'] == -1) 
		{
			header('location: ' . mobileUrl('groups/goods', array('id' => $order['goodid'])));
			exit();
		}
		else if (1 <= $order['status']) 
		{
			header('location: ' . mobileUrl('groups/goods', array('id' => $order['goodid'])));
			exit();
		}
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_groups_paylog') . "\r\n\t\t" . ' WHERE `uniacid`=:uniacid AND `module`=:module AND `tid`=:tid limit 1', array(':uniacid' => $uniacid, ':module' => 'groups', ':tid' => $order['orderno']));
		if (!(empty($log)) && ($log['status'] != '0')) 
		{
			header('location: ' . mobileUrl('groups/goods', array('id' => $order['id'])));
			exit();
		}
		if (empty($log)) 
		{
			$log = array('uniacid' => $uniacid, 'openid' => $_W['openid'], 'module' => 'groups', 'tid' => $order['orderno'], 'credit' => $order['credit'], 'creditmoney' => $order['creditmoney'], 'fee' => ($order['price'] - $order['creditmoney']) + $order['freight'], 'status' => 0);
			pdo_insert('ewei_shop_groups_paylog', $log);
			$plid = pdo_insertid();
		}
		$set = m('common')->getSysset(array('shop', 'pay'));
		$set['pay']['weixin'] = ((!(empty($set['pay']['weixin_sub'])) ? 1 : $set['pay']['weixin']));
		$set['pay']['weixin_jie'] = ((!(empty($set['pay']['weixin_jie_sub'])) ? 1 : $set['pay']['weixin_jie']));
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		$param_title = $set['shop']['name'] . ''.$this->lang['lang_plugin_groups_core_mobile_pay_7'].'';
		$credit = array('success' => false);
		if (isset($set['pay']) && ($set['pay']['credit'] == 1)) 
		{
			if ($order['deductcredit2'] <= 0) 
			{
				$credit = array('success' => true, 'current' => $member['credit2']);
			}
		}
		load()->model('payment');
		$setting = uni_setting($_W['uniacid'], array('payment'));
		$wechat = array('success' => false);
		if (is_weixin()) 
		{
			$params = array();
			$params['tid'] = $log['tid'];
			$params['user'] = $openid;
			$params['fee'] = $log['fee'];
			$params['title'] = $param_title;
			if (isset($set['pay']) && ($set['pay']['weixin'] == 1)) 
			{
				if (is_array($setting['payment']['wechat']) && $setting['payment']['wechat']['switch']) 
				{
					load()->model('payment');
					$setting = uni_setting($_W['uniacid'], array('payment'));
					$options = array();
					if (is_array($setting['payment'])) 
					{
						$options = $setting['payment']['wechat'];
						$options['appid'] = $_W['account']['key'];
						$options['secret'] = $_W['account']['secret'];
					}
					$wechat = m('common')->wechat_build($params, $options, 5);
					if (!(is_error($wechat))) 
					{
						$wechat['success'] = true;
						if (!(empty($wechat['code_url']))) 
						{
							$wechat['weixin_jie'] = true;
						}
						else 
						{
							$wechat['weixin'] = true;
						}
					}
				}
			}
			if (isset($set['pay']) && ($set['pay']['weixin_jie'] == 1) && !($wechat['success'])) 
			{
				$params['tid'] = $params['tid'] . '_borrow';
				$options = array();
				$options['appid'] = $sec['appid'];
				$options['mchid'] = $sec['mchid'];
				$options['apikey'] = $sec['apikey'];
				if (!(empty($set['pay']['weixin_jie_sub'])) && !(empty($sec['sub_secret_jie_sub']))) 
				{
					$wxuser = m('member')->wxuser($sec['sub_appid_jie_sub'], $sec['sub_secret_jie_sub']);
					$params['openid'] = $wxuser['openid'];
				}
				else if (!(empty($sec['secret']))) 
				{
					$wxuser = m('member')->wxuser($sec['appid'], $sec['secret']);
					$params['openid'] = $wxuser['openid'];
				}
				$wechat = m('common')->wechat_native_build($params, $options, 5);
				if (!(is_error($wechat))) 
				{
					$wechat['success'] = true;
					if (!(empty($params['openid']))) 
					{
						$wechat['weixin'] = true;
					}
					else 
					{
						$wechat['weixin_jie'] = true;
					}
				}
			}
		}
		$payinfo = array('orderid' => $orderid, 'teamid' => $teamid, 'credit' => $credit, 'wechat' => $wechat, 'money' => $log['fee']);
		if (is_h5app()) 
		{
			$payinfo = array('wechat' => (!(empty($sec['app_wechat']['merchname'])) && !(empty($set['pay']['app_wechat'])) && !(empty($sec['app_wechat']['appid'])) && !(empty($sec['app_wechat']['appsecret'])) && !(empty($sec['app_wechat']['merchid'])) && !(empty($sec['app_wechat']['apikey'])) && (0 < $order['price']) ? true : false), 'alipay' => false, 'mcname' => $sec['app_wechat']['merchname'], 'ordersn' => $order['orderno'], 'money' => $log['fee'], 'attach' => $_W['uniacid'] . ':5', 'type' => 5, 'orderid' => $orderid, 'credit' => $credit, 'teamid' => $teamid);
		}
		include $this->template();
	}
	public function complete() 
	{
		global $_W;
		global $_GPC;
		$orderid = intval($_GPC['orderid']);
		$teamid = intval($_GPC['teamid']);
		$isteam = intval($_GPC['isteam']);
		$uniacid = $_W['uniacid'];
		$openid = $_W['openid'];
		if (is_h5app() && empty($orderid)) 
		{
			$ordersn = $_GPC['ordersn'];
			$orderid = pdo_fetchcolumn('select id from ' . tablename('ewei_shop_groups_order') . ' where orderno=:orderno and uniacid=:uniacid and openid=:openid limit 1', array(':orderno' => $ordersn, ':uniacid' => $uniacid, ':openid' => $openid));
		}
		if (empty($orderid)) 
		{
			if ($_W['ispost']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_groups_core_mobile_pay_8'].'!');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_9'].'!', mobileUrl('groups/orders'));
			}
		}
		$order = pdo_fetch('select * from ' . tablename('ewei_shop_groups_order') . ' where id = :orderid and uniacid=:uniacid and openid=:openid', array(':orderid' => $orderid, ':uniacid' => $uniacid, ':openid' => $openid));
		if (empty($order)) 
		{
			if ($_W['ispost']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_groups_core_mobile_pay_10'].'!');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_11'].'!', mobileUrl('groups/orders'));
			}
		}
		$order_goods = pdo_fetch('select * from  ' . tablename('ewei_shop_groups_goods') . "\r\n\t\t\t\t\t" . 'where id = :id and uniacid=:uniacid ', array(':uniacid' => $_W['uniacid'], ':id' => $order['goodid']));
		if (empty($order_goods)) 
		{
			if ($_W['ispost']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_groups_core_mobile_pay_12'].'!');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_13'].'!', mobileUrl('groups/orders'));
			}
		}
		$type = $_GPC['type'];
		if (!(in_array($type, array('wechat', 'alipay', 'credit', 'cash')))) 
		{
			if ($_W['ispost']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_groups_core_mobile_pay_14'].'!');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_15'].'!', mobileUrl('groups/orders'));
			}
		}
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_groups_paylog') . "\r\n\t\t" . ' WHERE `uniacid`=:uniacid AND `module`=:module AND `tid`=:tid limit 1', array(':uniacid' => $uniacid, ':module' => 'groups', ':tid' => $order['orderno']));
		if (empty($log)) 
		{
			if ($_W['ispost']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_groups_core_mobile_pay_16'].','.$this->lang['lang_plugin_groups_core_mobile_pay_17'].'(0)!');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_18'].','.$this->lang['lang_plugin_groups_core_mobile_pay_19'].'!', mobileUrl('groups/orders'));
			}
		}
		if ($type == 'credit') 
		{
			$orderno = $order['orderno'];
			$credits = m('member')->getCredit($openid, 'credit2');
			if (($credits < $log['fee']) || ($credits < 0)) 
			{
				show_json($credits, ''.$this->lang['lang_plugin_groups_core_mobile_pay_20'].','.$this->lang['lang_plugin_groups_core_mobile_pay_21'].'');
			}
			$fee = floatval($log['fee']);
			$result = m('member')->setCredit($openid, 'credit2', -$fee, array($_W['member']['uid'], $_W['shopset']['shop']['name'] . ''.$this->lang['lang_plugin_groups_core_mobile_pay_22'].'' . $fee));
			if (is_error($result)) 
			{
				if ($_W['ispost']) 
				{
					show_json(0, $result['message']);
				}
				else 
				{
					$this->message($result['message'], mobileUrl('groups/orders'));
				}
			}
			$this->model->payResult($log['tid'], $type);
			pdo_update('ewei_shop_groups_order', array('pay_type' => 'credit', 'status' => 1, 'paytime' => time(), 'starttime' => time()), array('id' => $orderid));
			if ($_W['ispost']) 
			{
				show_json(1);
				return;
			}
			header('location: ' . mobileUrl('groups/team/detail', array('orderid' => $orderid, 'teamid' => $orderid)));
			exit();
			return;
		}
		if ($type == 'wechat') 
		{
			$orderno = $order['orderno'];
			if (!(empty($order['ordersn2']))) 
			{
				$orderno .= 'GJ' . sprintf('%02d', $order['ordersn2']);
			}
			$payquery = m('finance')->isWeixinPay($orderno, $log['fee'], (is_h5app() ? true : false));
			$payqueryBorrow = m('finance')->isWeixinPayBorrow($orderno, $log['fee']);
			if (!(is_error($payquery)) || !(is_error($payqueryBorrow))) 
			{
				$this->model->payResult($log['tid'], $type, (is_h5app() ? true : false));
				pdo_update('ewei_shop_groups_order', array('pay_type' => 'wechat', 'status' => 1, 'paytime' => time(), 'starttime' => time(), 'apppay' => (is_h5app() ? 1 : 0)), array('id' => $orderid));
				if ($_W['ispost']) 
				{
					show_json(1);
					return;
				}
				header('location: ' . mobileUrl('groups/team/detail', array('orderid' => $orderid, 'teamid' => $orderid)));
				exit();
				return;
			}
			if ($_W['ispost']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_groups_core_mobile_pay_23'].','.$this->lang['lang_plugin_groups_core_mobile_pay_24'].'(1)!');
				return;
			}
			$this->message(''.$this->lang['lang_plugin_groups_core_mobile_pay_25'].','.$this->lang['lang_plugin_groups_core_mobile_pay_26'].'!', mobileUrl('groups/orders'));
		}
	}
	public function orderstatus() 
	{
		global $_W;
		global $_GPC;
		$uniacid = $_W['uniacid'];
		$orderid = intval($_GPC['id']);
		$order = pdo_fetch('select status from ' . tablename('ewei_shop_groups_order') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $orderid, ':uniacid' => $uniacid));
		show_json(1, $order);
	}
}
?>