<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class GroupsModel extends PluginModel 
{
	protected function getUrl($do, $query = NULL) 
	{
		$url = mobileUrl($do, $query, true);
		if (strexists($url, '/addons/ewei_shopv2/')) 
		{
			$url = str_replace('/addons/ewei_shopv2/', '/', $url);
		}
		if (strexists($url, '/core/mobile/order/')) 
		{
			$url = str_replace('/core/mobile/order/', '/', $url);
		}
		return $url;
	}
	public function orderstest() 
	{
		global $_W;
		$uniacid = $_W['uniacid'];
		$sql = 'SELECT * FROM' . tablename('ewei_shop_groups_order') . 'where uniacid = :uniacid and status = 0 ';
		$params = array('uniacid' => $uniacid);
		$allorders = pdo_fetchall($sql, $params);
		if ($allorders) 
		{
			foreach ($allorders as $key => $value ) 
			{
				$hours = $value['endtime'];
				$time = time();
				$date = date('Y-m-d H:i:s', $value['createtime']);
				$endtime = date('Y-m-d H:i:s', strtotime(' ' . $date . ' + ' . $hours . ' hour'));
				$date1 = date('Y-m-d H:i:s', $time);
				$lasttime2 = strtotime($endtime) - strtotime($date1);
				if ($lasttime2 < 0) 
				{
					pdo_update('ewei_shop_groups_order', array('status' => -1), array('id' => $value['id']));
				}
			}
		}
		$sql1 = 'SELECT * FROM' . tablename('ewei_shop_groups_order') . 'where uniacid = :uniacid and heads = 1 and status = 1 and success = 0 ';
		$allteam = pdo_fetchall($sql1, $params);
		if ($allteam) 
		{
			foreach ($allteam as $key => $value ) 
			{
				$total = pdo_fetchcolumn('select count(1) from ' . tablename('ewei_shop_groups_order') . '  where uniacid = :uniacid and teamid = :teamid and heads = :heads and status = :status and success = :success ', array(':uniacid' => $uniacid, ':heads' => 1, ':teamid' => $value['teamid'], ':status' => 1, ':success' => 0));
				if ($value['groupnum'] == $total) 
				{
					pdo_update('ewei_shop_groups_order', array('success' => 1), array('teamid' => $value['teamid']));
				}
				else 
				{
					$hours = $value['endtime'];
					$time = time();
					$date = date('Y-m-d H:i:s', $value['starttime']);
					$endtime = date('Y-m-d H:i:s', strtotime(' ' . $date . ' + ' . $hours . ' hour'));
					$date1 = date('Y-m-d H:i:s', $time);
					$lasttime2 = strtotime($endtime) - strtotime($date1);
					if ($lasttime2 < 0) 
					{
						pdo_update('ewei_shop_groups_order', array('success' => -1, 'canceltime' => strtotime($endtime)), array('teamid' => $value['teamid']));
					}
				}
			}
		}
	}
	public function payResult($orderno, $type, $app = false) 
	{
		global $_W;
		$uniacid = $_W['uniacid'];
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_groups_paylog') . "\n\t\t" . ' WHERE `uniacid`=:uniacid AND `module`=:module AND `tid`=:tid limit 1', array(':uniacid' => $uniacid, ':module' => 'groups', ':tid' => $orderno));
		$order = pdo_fetch('select * from ' . tablename('ewei_shop_groups_order') . ' where  orderno =:orderno and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':orderno' => $orderno));
		if (0 < $order['status']) 
		{
			return true;
		}
		$openid = $order['openid'];
		$order_goods = pdo_fetch('select * from  ' . tablename('ewei_shop_groups_goods') . "\n\t\t\t\t\t" . 'where id = :id and uniacid=:uniacid ', array(':uniacid' => $uniacid, ':id' => $order['goodid']));
		$result = m('member')->setCredit($openid, 'credit1', -$order['credit'], array($_W['member']['uid'], $_W['shopset']['shop']['name'] . ''.$this->lang['lang_plugin_groups_core_model_0'].'' . $order['credit'] . ''.$this->lang['lang_plugin_groups_core_model_1'].''));
		if (is_error($result)) 
		{
			return $result['message'];
		}
		$record = array();
		$record['status'] = '1';
		$record['type'] = $type;
		$params = array(':teamid' => $order['teamid'], ':uniacid' => $uniacid, ':success' => 0, ':status' => 1);
		pdo_update('ewei_shop_groups_order', array('pay_type' => $type, 'status' => 1, 'paytime' => TIMESTAMP, 'starttime' => TIMESTAMP, 'apppay' => ($app ? 1 : 0)), array('orderno' => $orderno));
		$this->sendTeamMessage($order['id']);
		if (!(empty($order['is_team']))) 
		{
			$total = pdo_fetchcolumn('select count(1) from ' . tablename('ewei_shop_groups_order') . ' as o where status = :status and teamid = :teamid and uniacid = :uniacid and success = :success ', $params);
			if ($order['groupnum'] == $total) 
			{
				pdo_update('ewei_shop_groups_order', array('success' => 1), array('teamid' => $order['teamid'], 'status' => 1, 'uniacid' => $uniacid));
				pdo_update('ewei_shop_groups_order', array('success' => -1, 'status' => -1, 'canceltime' => time()), array('teamid' => $order['teamid'], 'status' => 0, 'uniacid' => $uniacid));
				$this->sendTeamMessage($order['id']);
			}
		}
		$stock = intval($order_goods['stock'] - 1);
		$sales = intval($order_goods['sales']) + 1;
		$teamnum = intval($order_goods['teamnum']) + 1;
		pdo_update('ewei_shop_groups_goods', array('stock' => $stock, 'sales' => $sales, 'teamnum' => $teamnum), array('id' => $order_goods['id']));
		return true;
	}
	public function getTotals() 
	{
		global $_W;
		$paras = array(':uniacid' => $_W['uniacid']);
		$totals['all'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.isverify = 0 ', $paras);
		$totals['status1'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.isverify = 0 and o.status = 1 and (o.success = 1 or o.is_team = 0) ', $paras);
		$totals['status2'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.isverify = 0 and o.status=2 ', $paras);
		$totals['status3'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.isverify = 0 and o.status = 0 ', $paras);
		$totals['status4'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.isverify = 0 and o.status = 3 ', $paras);
		$totals['status5'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.isverify = 0 and o.status = -1 ', $paras);
		$totals['team1'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.heads = 1 and o.paytime > 0 and is_team = 1 and o.success = 1 ', $paras);
		$totals['team2'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.heads = 1 and o.paytime > 0 and is_team = 1 and o.success = 0 ', $paras);
		$totals['team3'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.heads = 1 and o.paytime > 0 and is_team = 1 and o.success = -1 ', $paras);
		$totals['allteam'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' o' . "\n\t\t\t" . ' WHERE o.uniacid = :uniacid and o.heads = 1 and o.paytime > 0 and is_team = 1 ', $paras);
		$totals['refund1'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order_refund') . ' as ore' . "\n\t\t\t" . 'left join ' . tablename('ewei_shop_groups_order') . ' as o on o.id = ore.orderid' . "\n\t\t\t" . 'right join ' . tablename('ewei_shop_groups_goods') . ' as g on g.id = o.goodid' . "\n\t\t\t" . 'right join ' . tablename('ewei_shop_member') . ' m on m.openid=o.openid and m.uniacid =  o.uniacid' . "\n\t\t\t" . 'left join ' . tablename('ewei_shop_member_address') . ' a on a.id=ore.refundaddressid' . "\n\t\t\t" . 'right join ' . tablename('ewei_shop_groups_category') . ' as c on c.id = g.category' . "\n\t\t\t" . 'WHERE ore.uniacid = :uniacid AND o.refundstate > 0 and o.refundid != 0 and ore.refundstatus >= 0 ', $paras);
		$totals['refund2'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order_refund') . ' as ore' . "\n\t\t\t" . 'left join ' . tablename('ewei_shop_groups_order') . ' as o on o.id = ore.orderid' . "\n\t\t\t" . 'right join ' . tablename('ewei_shop_groups_goods') . ' as g on g.id = o.goodid' . "\n\t\t\t" . 'right join ' . tablename('ewei_shop_member') . ' m on m.openid=o.openid and m.uniacid =  o.uniacid' . "\n\t\t\t" . 'left join ' . tablename('ewei_shop_member_address') . ' a on a.id=ore.refundaddressid' . "\n\t\t\t" . 'right join ' . tablename('ewei_shop_groups_category') . ' as c on c.id = g.category' . "\n\t\t\t" . 'WHERE ore.uniacid = :uniacid AND (o.refundtime != 0 or ore.refundstatus < 0) ', $paras);
		$totals['verify1'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' as o' . "\n\t\t\t" . 'WHERE o.uniacid=:uniacid and o.isverify = 1 and o.status =  1 ', $paras);
		$totals['verify2'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' as o' . "\n\t\t\t" . 'WHERE o.uniacid=:uniacid and o.isverify = 1 and o.status = 3 ', $paras);
		$totals['verify3'] = pdo_fetchcolumn('SELECT COUNT(1) FROM ' . tablename('ewei_shop_groups_order') . ' as o' . "\n\t\t\t" . 'WHERE o.uniacid=:uniacid and o.isverify = 1 and o.status <= 0 ', $paras);
		return $totals;
	}
	public function groupsShare() 
	{
		global $_W;
		$uniacid = $_W['uniacid'];
		$share = pdo_fetch('select share_title,share_icon,share_desc,share_url from ' . tablename('ewei_shop_groups_set') . ' where uniacid=:uniacid ', array(':uniacid' => $uniacid));
		$myid = m('member')->getMid();
		$set = $_W['shopset'];
		$_W['shopshare'] = array('title' => (!(empty($share['share_title'])) ? $share['share_title'] : $set['shop']['name']), 'imgUrl' => (!(empty($share['share_icon'])) ? tomedia($share['share_icon']) : tomedia($set['shop']['logo'])), 'desc' => (!(empty($share['share_desc'])) ? $share['share_desc'] : $set['shop']['description']), 'link' => (!(empty($share['share_url'])) ? $share['share_url'] : mobileUrl('groups', array('shareid' => $myid), true)));
	}
	public function sendTeamMessage($orderid = '0', $delRefund = false) 
	{
		global $_W;
		$uniacid = $_W['uniacid'];
		$orderid = intval($orderid);
		if (empty($orderid)) 
		{
			return;
		}
		$order = pdo_fetch('select * from ' . tablename('ewei_shop_groups_order') . ' where uniacid = :uniacid and id=:id limit 1', array(':uniacid' => $uniacid, ':id' => $orderid));
		if (empty($order)) 
		{
			return;
		}
		$openid = $order['openid'];
		if (intval($order['teamid'])) 
		{
			$url = $this->getUrl('groups/team/detail', array('orderid' => $orderid, 'teamid' => intval($order['teamid'])));
		}
		else 
		{
			$url = $this->getUrl('groups/orders/detail', array('orderid' => $orderid));
		}
		$order_goods = pdo_fetch('select * from ' . tablename('ewei_shop_groups_goods') . ' where uniacid=:uniacid and id=:id ', array(':uniacid' => $_W['uniacid'], ':id' => intval($order['goodid'])));
		$goodsprice = ((!(empty($order['is_team'])) ? number_format($order_goods['groupsprice'], 2) : number_format($order_goods['singleprice'], 2)));
		$price = number_format(($order['price'] - $order['creditmoney']) + $order['freight'], 2);
		$goods = ''.$this->lang['lang_plugin_groups_core_model_2'].'--' . $order_goods['title'];
		$goods2 = $order_goods['title'];
		$orderpricestr = ' '.$this->lang['lang_plugin_groups_core_model_3'].'' . $price . ''.$this->lang['lang_plugin_groups_core_model_4'].' ('.$this->lang['lang_plugin_groups_core_model_5'].': '.$this->lang['lang_plugin_groups_core_model_6'].'' . $order['freight'] . ''.$this->lang['lang_plugin_groups_core_model_7'].': '.$this->lang['lang_plugin_groups_core_model_8'].'' . $order['creditmoney'] . ''.$this->lang['lang_plugin_groups_core_model_9'].')';
		$member = m('member')->getMember($openid);
		$datas = array( array('name' => ''.$this->lang['lang_plugin_groups_core_model_10'].'', 'value' => $_W['shopset']['shop']['name']), array('name' => ''.$this->lang['lang_plugin_groups_core_model_11'].'', 'value' => $member['nickname']), array('name' => ''.$this->lang['lang_plugin_groups_core_model_12'].'', 'value' => $order['orderno']), array('name' => ''.$this->lang['lang_plugin_groups_core_model_13'].'', 'value' => ($order['price'] - $order['creditmoney']) + $order['freight']), array('name' => ''.$this->lang['lang_plugin_groups_core_model_14'].'', 'value' => $order['freight']), array('name' => ''.$this->lang['lang_plugin_groups_core_model_15'].'', 'value' => $goods), array('name' => ''.$this->lang['lang_plugin_groups_core_model_16'].'', 'value' => $order['expresscom']), array('name' => ''.$this->lang['lang_plugin_groups_core_model_17'].'', 'value' => $order['expresssn']), array('name' => ''.$this->lang['lang_plugin_groups_core_model_18'].'', 'value' => date('Y-m-d H:i', $order['createtime'])), array('name' => ''.$this->lang['lang_plugin_groups_core_model_19'].'', 'value' => date('Y-m-d H:i', $order['paytime'])), array('name' => ''.$this->lang['lang_plugin_groups_core_model_20'].'', 'value' => date('Y-m-d H:i', $order['sendtime'])), array('name' => ''.$this->lang['lang_plugin_groups_core_model_21'].'', 'value' => date('Y-m-d H:i', $order['finishtime'])) );
		$usernotice = unserialize($member['noticeset']);
		if (!(is_array($usernotice))) 
		{
			$usernotice = array();
		}
		$set = $set = m('common')->getSysset();
		$shop = $set['shop'];
		$tm = $set['notice'];
		if ($delRefund == true) 
		{
			$order_refund = pdo_fetch('select * from ' . tablename('ewei_shop_groups_order_refund') . ' where uniacid=:uniacid and id=:id ', array(':uniacid' => $_W['uniacid'], ':id' => intval($order['refundid'])));
			$refundtype = '';
			if ($order['pay_type'] == 'credit') 
			{
				$refundtype = ', '.$this->lang['lang_plugin_groups_core_model_22'].'';
			}
			else if ($order['pay_type'] == 'wechat') 
			{
				$refundtype = ', '.$this->lang['lang_plugin_groups_core_model_23'].', '.$this->lang['lang_plugin_groups_core_model_24'].')'.$this->lang['lang_plugin_groups_core_model_25'].'';
			}
			if ($order_refund['refundtype'] == 2) 
			{
				$refundtype = ', '.$this->lang['lang_plugin_groups_core_model_26'].'';
			}
			$applyprice = ((!(empty($order_refund['applyprice'])) ? $order_refund['applyprice'] : ($order['price'] - $order['creditmoney']) + $order['freight']));
			if ($order_refund['refundstatus'] == 0) 
			{
				$tm = m('common')->getSysset('notice');
				$msgteam = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_27'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_28'].'', 'value' => $shop['name'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_29'].'', 'value' => ''.$this->lang['lang_plugin_groups_core_model_30'].'' . $order['orderno'] . ','.$this->lang['lang_plugin_groups_core_model_31'].'' . $order_refund['refundno'], 'color' => '#4a5077') );
				if (!(empty($tm['openid']))) 
				{
					$openids = explode(',', $tm['openid']);
					foreach ($openids as $value ) 
					{
						$this->sendGroupsNotice(array('openid' => $value, 'tag' => 'groups_teamsend', 'default' => $msgteam, 'datas' => $datas));
					}
					return;
				}
			}
			else if ($order_refund['refundstatus'] == -1) 
			{
				$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_32'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_33'].'', 'value' => $order['orderno'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_34'].'', 'value' => $order_refund['refundno'], 'color' => '#4a5077'), 'keyword3' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_35'].'', 'value' => $order_refund['reply'], 'color' => '#4a5077') );
				$this->sendGroupsNotice(array('openid' => $openid, 'tag' => 'groups_refund', 'default' => $msg, 'datas' => $datas));
				return;
			}
			else if ($order_refund['refundstatus'] == 1) 
			{
				$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_36'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_37'].'', 'value' => ''.$this->lang['lang_plugin_groups_core_model_38'].'' . $applyprice . ''.$this->lang['lang_plugin_groups_core_model_39'].'', 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_40'].'', 'value' => $goods2, 'color' => '#4a5077'), 'keyword3' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_41'].'', 'value' => $order['orderno'], 'color' => '#4a5077'), 'remark' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_42'].' '.$this->lang['lang_plugin_groups_core_model_43'].'' . $applyprice . $refundtype . "\r\n" . ' '.$this->lang['lang_plugin_groups_core_model_44'].'', 'color' => '#4a5077') );
				$this->sendGroupsNotice(array('openid' => $openid, 'tag' => 'groups_refund', 'default' => $msg, 'datas' => $datas));
				return;
			}
		}
		else if ($order['status'] == 1) 
		{
			if ($order['success'] == 1) 
			{
				$order = pdo_fetchall('select * from ' . tablename('ewei_shop_groups_order') . ' where teamid = :teamid and success = 1 and status = 1 ', array(':teamid' => $order['teamid']));
				$remark = ''.$this->lang['lang_plugin_groups_core_model_45'].'~~';
				foreach ($order as $key => $value ) 
				{
					$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_46'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_47'].'', 'value' => $value['orderno'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_48'].'', 'value' => date('Y-m-d H:i', time()), 'color' => '#4a5077'), 'remark' => array('value' => $remark, 'color' => '#4a5077') );
					$this->sendGroupsNotice(array('openid' => $value['openid'], 'tag' => 'groups_success', 'default' => $msg, 'datas' => $datas));
				}
				$tm = m('common')->getSysset('notice');
				$remarkteam = ''.$this->lang['lang_plugin_groups_core_model_49'].'';
				$msgteam = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_50'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_51'].'', 'value' => $shop['name'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_52'].'', 'value' => $goods, 'color' => '#4a5077'), 'remark' => array('value' => $remarkteam, 'color' => '#4a5077') );
				if (!(empty($tm['openid']))) 
				{
					$openids = explode(',', $tm['openid']);
					foreach ($openids as $value ) 
					{
						$this->sendGroupsNotice(array('openid' => $value, 'tag' => 'groups_teamsend', 'default' => $msgteam, 'datas' => $datas));
					}
					return;
				}
			}
			else if ($order['success'] == -1) 
			{
				$order = pdo_fetchall('select * from ' . tablename('ewei_shop_groups_order') . ' where teamid = :teamid and success = -1 and status = 1 ', array(':teamid' => $order['teamid']));
				$remark = ''.$this->lang['lang_plugin_groups_core_model_53'].'24'.$this->lang['lang_plugin_groups_core_model_54'].'';
				foreach ($order as $key => $value ) 
				{
					$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_55'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_56'].'', 'value' => $value['orderno'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_57'].'', 'value' => date('Y-m-d H:i:s', time()), 'color' => '#4a5077'), 'remark' => array('value' => $remark, 'color' => '#4a5077') );
					$this->sendGroupsNotice(array('openid' => $value['openid'], 'tag' => 'groups_error', 'default' => $msg, 'datas' => $datas));
				}
				return;
			}
			else if ($order['success'] == 0) 
			{
				if (!(empty($order['addressid']))) 
				{
					if ($order['is_team']) 
					{
						$remark = "\r\n" . ''.$this->lang['lang_plugin_groups_core_model_58'].'~~';
					}
					else 
					{
						$remark = "\r\n" . ''.$this->lang['lang_plugin_groups_core_model_59'].'~~';
					}
				}
				$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_60'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_61'].'', 'value' => $order['orderno'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_62'].'', 'value' => $orderpricestr, 'color' => '#4a5077'), 'keyword3' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_63'].'', 'value' => $shop['name'], 'color' => '#4a5077'), 'keyword4' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_64'].'', 'value' => date('Y-m-d H:i:s', $order['createtime']), 'color' => '#4a5077'), 'remark' => array('value' => $remark, 'color' => '#4a5077') );
				$this->sendGroupsNotice(array('openid' => $openid, 'tag' => 'groups_pay', 'default' => $msg, 'url' => $url, 'datas' => $datas));
				if (!($order['is_team'])) 
				{
					$tm = m('common')->getSysset('notice');
					$remarkteam = ''.$this->lang['lang_plugin_groups_core_model_65'].'';
					$msgteam = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_66'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_67'].'', 'value' => $shop['name'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_68'].'', 'value' => $goods, 'color' => '#4a5077'), 'remark' => array('value' => $remarkteam, 'color' => '#4a5077') );
					$business = explode(',', $tm['openid']);
					foreach ($business as $value ) 
					{
						$this->sendGroupsNotice(array('openid' => $value, 'tag' => 'groups_teamsend', 'default' => $msgteam, 'datas' => $datas));
					}
					return;
				}
			}
		}
		else if ($order['status'] == 2) 
		{
			if (!(empty($order['addressid']))) 
			{
				$remark = ''.$this->lang['lang_plugin_groups_core_model_69'].'';
			}
			$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_70'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_71'].'', 'value' => $order['orderno'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_72'].'', 'value' => $order['expresscom'], 'color' => '#4a5077'), 'keyword3' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_73'].'', 'value' => $order['expresssn'], 'color' => '#4a5077'), 'remark' => array('value' => $remark, 'color' => '#4a5077') );
			$this->sendGroupsNotice(array('openid' => $openid, 'tag' => 'groups_send', 'default' => $msg, 'datas' => $datas));
			return;
		}
		else if ($order['status'] == 3) 
		{
			if (!(empty($order['addressid']))) 
			{
				$remark = ''.$this->lang['lang_plugin_groups_core_model_74'].'';
			}
			$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_75'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_76'].'', 'value' => $order['orderno'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_77'].'', 'value' => $order['expresscom'], 'color' => '#4a5077'), 'keyword3' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_78'].'', 'value' => $order['expresssn'], 'color' => '#4a5077'), 'remark' => array('value' => $remark, 'color' => '#4a5077') );
			$this->sendGroupsNotice(array('openid' => $openid, 'tag' => 'groups_send', 'default' => $msg, 'datas' => $datas));
			return;
		}
		else if ($order['status'] == -1) 
		{
			if (!(empty($order['addressid']))) 
			{
				$remark = ''.$this->lang['lang_plugin_groups_core_model_79'].'';
			}
			$msg = array( 'first' => array('value' => ''.$this->lang['lang_plugin_groups_core_model_80'].'', 'color' => '#4a5077'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_81'].'', 'value' => $order['orderno'], 'color' => '#4a5077'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_groups_core_model_82'].'', 'value' => date('Y-m-d H:i:s', time()), 'color' => '#4a5077'), 'remark' => array('value' => $remark, 'color' => '#4a5077') );
			$this->sendGroupsNotice(array('openid' => $openid, 'tag' => 'groups_error', 'default' => $msg, 'datas' => $datas));
		}
	}
	public function sendGroupsNotice(array $params) 
	{
		global $_W;
		global $_GPC;
		$tag = ((isset($params['tag']) ? $params['tag'] : ''));
		$touser = ((isset($params['openid']) ? $params['openid'] : ''));
		if (empty($touser)) 
		{
			return;
		}
		$tm = $_W['shopset']['notice'];
		if (empty($tm)) 
		{
			$tm = m('common')->getSysset('notice');
		}
		$templateid = (($tm['is_advanced'] ? $tm[$tag . '_template'] : $tm[$tag]));
		$default_message = ((isset($params['default']) ? $params['default'] : array()));
		$url = ((isset($params['url']) ? $params['url'] : ''));
		$account = ((isset($params['account']) ? $params['account'] : m('common')->getAccount()));
		$datas = ((isset($params['datas']) ? $params['datas'] : array()));
		$advanced_message = false;
		if ($tm['is_advanced']) 
		{
			if (!(empty($tm[$tag . '_close_advanced']))) 
			{
				return;
			}
			if (!(empty($templateid))) 
			{
				$advanced_template = pdo_fetch('select * from ' . tablename('ewei_shop_member_message_template') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $templateid, ':uniacid' => $_W['uniacid']));
				if (!(empty($advanced_template))) 
				{
					$advanced_message = array( 'first' => array('value' => $this->replaceTemplate($advanced_template['first'], $datas), 'color' => $advanced_template['firstcolor']), 'remark' => array('value' => $this->replaceTemplate($advanced_template['remark'], $datas), 'color' => $advanced_template['remarkcolor']) );
					$data = iunserializer($advanced_template['data']);
					foreach ($data as $d ) 
					{
						$advanced_message[$d['keywords']] = array('value' => $this->replaceTemplate($d['value'], $datas), 'color' => $d['color']);
					}
					$ret = m('message')->sendTplNotice($touser, $advanced_template['template_id'], $advanced_message, $url, $account);
					if (is_error($ret)) 
					{
						$ret = m('message')->sendCustomNotice($touser, $advanced_message, $url, $account);
						if (is_error($ret)) 
						{
							$ret = m('message')->sendCustomNotice($touser, $advanced_message, $url, $account);
							return;
						}
					}
				}
				else 
				{
					m('message')->sendCustomNotice($touser, $default_message, $url, $account);
					return;
				}
			}
			else 
			{
				m('message')->sendCustomNotice($touser, $default_message, $url, $account);
				return;
			}
		}
		else if (!(empty($tm[$tag . '_close_normal']))) 
		{
			return;
		}
		else 
		{
			$ret = m('message')->sendTplNotice($touser, $templateid, $default_message, $url, $account);
			if (is_error($ret)) 
			{
				m('message')->sendCustomNotice($touser, $default_message, $url, $account);
			}
		}
	}
	protected function replaceTemplate($str, $datas = array()) 
	{
		foreach ($datas as $d ) 
		{
			$str = str_replace('[' . $d['name'] . ']', $d['value'], $str);
		}
		return $str;
	}
	public function allow($orderid, $times = 0, $verifycode = '', $openid = '') 
	{
		global $_W;
		global $_GPC;
		if (empty($openid)) 
		{
			$openid = $_W['openid'];
		}
		$uniacid = $_W['uniacid'];
		$store = false;
		$merchid = 0;
		$lastverifys = 0;
		$verifyinfo = false;
		if ($times <= 0) 
		{
			$times = 1;
		}
		$saler = pdo_fetch('select * from ' . tablename('ewei_shop_saler') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));
		if (empty($saler)) 
		{
			return error(-1, ''.$this->lang['lang_plugin_groups_core_model_83'].'!');
		}
		$merchid = $saler['merchid'];
		$order = pdo_fetch('select * from ' . tablename('ewei_shop_groups_order') . ' where id=:id and uniacid=:uniacid  limit 1', array(':id' => $orderid, ':uniacid' => $uniacid));
		if (empty($order)) 
		{
			return error(-1, ''.$this->lang['lang_plugin_groups_core_model_84'].'!');
		}
		if (empty($order['isverify'])) 
		{
			return error(-1, ''.$this->lang['lang_plugin_groups_core_model_85'].'!');
		}
		if (!(empty($order['is_team']))) 
		{
			if (($order['status'] <= 0) || ($order['success'] <= 0)) 
			{
				return error(-1, ''.$this->lang['lang_plugin_groups_core_model_86'].'!');
			}
		}
		if (empty($order['is_team']) && ($order['status'] <= 0)) 
		{
			return error(-1, ''.$this->lang['lang_plugin_groups_core_model_87'].'!');
		}
		$goods = pdo_fetch('select * from ' . tablename('ewei_shop_groups_goods') . "\n\t\t\t" . 'where uniacid=:uniacid and id = :goodid ', array(':uniacid' => $uniacid, ':goodid' => $order['goodid']));
		if (empty($goods)) 
		{
			return error(-1, ''.$this->lang['lang_plugin_groups_core_model_88'].'!');
		}
		if ($order['isverify']) 
		{
			$storeids = array();
			if (!(empty($goods['storeids']))) 
			{
				$storeids = explode(',', $goods['storeids']);
			}
			if (!(empty($storeids))) 
			{
				if (!(empty($saler['storeid']))) 
				{
					if (!(in_array($saler['storeid'], $storeids))) 
					{
						return error(-1, ''.$this->lang['lang_plugin_groups_core_model_89'].'!');
					}
				}
			}
			if ($order['verifytype'] == 0) 
			{
				$verifynum = pdo_fetchcolumn('select COUNT(1) from ' . tablename('ewei_shop_groups_verify') . ' where uniacid = :uniacid and orderid = :orderid ', array(':uniacid' => $uniacid, ':orderid' => $orderid));
				if ($order['verifynum'] <= $verifynum) 
				{
					return error(-1, ''.$this->lang['lang_plugin_groups_core_model_90'].'');
					if ($order['verifytype'] == 1) 
					{
						$verifynum = pdo_fetchcolumn('select COUNT(1) from ' . tablename('ewei_shop_groups_verify') . ' where uniacid = :uniacid and orderid = :orderid ', array(':uniacid' => $uniacid, ':orderid' => $orderid));
						if ($order['verifynum'] <= $verifynum) 
						{
							return error(-1, ''.$this->lang['lang_plugin_groups_core_model_91'].'');
						}
						$lastverifys = $order['verifynum'] - $verifynum;
						if (($lastverifys < 0) && !(empty($order['verifytype']))) 
						{
							return error(-1, ''.$this->lang['lang_plugin_groups_core_model_92'].' ' . $order['verifynum'] . ' '.$this->lang['lang_plugin_groups_core_model_93'].'!');
						}
					}
				}
			}
			else 
			{
				$verifynum = pdo_fetchcolumn('select COUNT(1) from ' . tablename('ewei_shop_groups_verify') . ' where uniacid = :uniacid and orderid = :orderid ', array(':uniacid' => $uniacid, ':orderid' => $orderid));
				return error(-1, ''.$this->lang['lang_plugin_groups_core_model_94'].'');
				$lastverifys = $order['verifynum'] - $verifynum;
				return error(-1, ''.$this->lang['lang_plugin_groups_core_model_95'].' ' . $order['verifynum'] . ' '.$this->lang['lang_plugin_groups_core_model_96'].'!');
			}
			if (!(empty($saler['storeid']))) 
			{
				if (0 < $merchid) 
				{
					$store = pdo_fetch('select * from ' . tablename('ewei_shop_merch_store') . ' where id=:id and uniacid=:uniacid and merchid = :merchid limit 1', array(':id' => $saler['storeid'], ':uniacid' => $_W['uniacid'], ':merchid' => $merchid));
				}
				else 
				{
					$store = pdo_fetch('select * from ' . tablename('ewei_shop_store') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $saler['storeid'], ':uniacid' => $_W['uniacid']));
				}
			}
		}
		$carrier = unserialize($order['carrier']);
		return array('order' => $order, 'store' => $store, 'saler' => $saler, 'lastverifys' => $lastverifys, 'goods' => $goods, 'verifyinfo' => $verifyinfo, 'carrier' => $carrier);
	}
	public function verify($orderid = 0, $times = 0, $verifycode = '', $openid = '') 
	{
		global $_W;
		global $_GPC;
		$uniacid = $_W['uniacid'];
		$current_time = time();
		if (empty($openid)) 
		{
			$openid = $_W['openid'];
		}
		$data = $this->allow($orderid, $times, $openid);
		if (is_error($data)) 
		{
			return;
		}
		extract($data);
		$order = pdo_fetch('select * from ' . tablename('ewei_shop_groups_order') . ' where id=:id and uniacid=:uniacid  limit 1', array(':id' => $orderid, ':uniacid' => $uniacid));
		if ($order['isverify']) 
		{
			if ($order['verifytype'] == 0) 
			{
				pdo_update('ewei_shop_groups_order', array('status' => 3, 'finishtime' => time(), 'sendtime' => $current_time), array('id' => $order['id']));
				$data = array('uniacid' => $uniacid, 'openid' => $order['openid'], 'orderid' => $orderid, 'verifycode' => $order['verifycode'], 'storeid' => $saler['storeid'], 'verifier' => $openid, 'isverify' => 1, 'verifytime' => time());
				pdo_insert('ewei_shop_groups_verify', $data);
			}
			else if ($order['verifytype'] == 1) 
			{
				if ($order['status'] != 3) 
				{
					pdo_update('ewei_shop_groups_order', array('status' => 3, 'finishtime' => time(), 'sendtime' => $current_time), array('id' => $order['id']));
				}
				$verifyinfo = iunserializer($order['verifyinfo']);
				$i = 1;
				while ($i <= $times) 
				{
					$data = array('uniacid' => $uniacid, 'openid' => $order['openid'], 'orderid' => $orderid, 'verifycode' => $order['verifycode'], 'storeid' => $saler['storeid'], 'verifier' => $openid, 'isverify' => 1, 'verifytime' => time());
					pdo_insert('ewei_shop_groups_verify', $data);
					++$i;
				}
			}
		}
		return true;
	}
	public function tempData($type) 
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 20;
		$condition = ' uniacid = :uniacid and type=:type ';
		$params = array(':uniacid' => $_W['uniacid'], ':type' => $type);
		if (!(empty($_GPC['keyword']))) 
		{
			$_GPC['keyword'] = trim($_GPC['keyword']);
			$condition .= ' AND expressname LIKE :expressname';
			$params[':expressname'] = '%' . trim($_GPC['keyword']) . '%';
		}
		$sql = 'SELECT id,expressname,expresscom,isdefault FROM ' . tablename('ewei_shop_exhelper_express') . ' where  1 and ' . $condition . ' ORDER BY isdefault desc, id DESC LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;
		$list = pdo_fetchall($sql, $params);
		$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exhelper_express') . ' where 1 and ' . $condition, $params);
		$pager = pagination($total, $pindex, $psize);
		return array('list' => $list, 'total' => $total, 'pager' => $pager, 'type' => $type);
	}
	public function setDefault($id, $type) 
	{
		global $_W;
		$item = pdo_fetch('SELECT id,expressname,type FROM ' . tablename('ewei_shop_exhelper_express') . ' WHERE id=:id and type=:type AND uniacid=:uniacid', array(':id' => $id, ':type' => $type, ':uniacid' => $_W['uniacid']));
		if (!(empty($item))) 
		{
			pdo_update('ewei_shop_exhelper_express', array('isdefault' => 0), array('type' => $type, 'uniacid' => $_W['uniacid']));
			pdo_update('ewei_shop_exhelper_express', array('isdefault' => 1), array('id' => $id));
			if ($type == 1) 
			{
				plog('exhelper.temp.express.setdefault', ''.$this->lang['lang_plugin_groups_core_model_97'].' ID: ' . $item['id'] . ''.$this->lang['lang_plugin_groups_core_model_98'].' '.$this->lang['lang_plugin_groups_core_model_99'].': ' . $item['expressname'] . ' ');
				return;
			}
			if ($type == 2) 
			{
				plog('exhelper.temp.invoice.setdefault', ''.$this->lang['lang_plugin_groups_core_model_100'].' ID: ' . $item['id'] . ''.$this->lang['lang_plugin_groups_core_model_101'].' '.$this->lang['lang_plugin_groups_core_model_102'].': ' . $item['expressname'] . ' ');
			}
		}
	}
	public function tempDelete($id, $type) 
	{
		global $_W;
		$items = pdo_fetchall('SELECT id,expressname FROM ' . tablename('ewei_shop_exhelper_express') . ' WHERE id in( ' . $id . ' ) and type=:type and uniacid=:uniacid ', array(':type' => $type, ':uniacid' => $_W['uniacid']));
		foreach ($items as $item ) 
		{
			pdo_delete('ewei_shop_exhelper_express', array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
			if ($type == 1) 
			{
				plog('groups.exhelper.expressdelete', ''.$this->lang['lang_plugin_groups_core_model_103'].' '.$this->lang['lang_plugin_groups_core_model_104'].' '.$this->lang['lang_plugin_groups_core_model_105'].' ID: ' . $item['id'] . ''.$this->lang['lang_plugin_groups_core_model_106'].' '.$this->lang['lang_plugin_groups_core_model_107'].': ' . $item['expressname'] . ' ');
			}
			else if ($type == 2) 
			{
				plog('groups.exhelper.invoicedelete', ''.$this->lang['lang_plugin_groups_core_model_108'].' '.$this->lang['lang_plugin_groups_core_model_109'].' '.$this->lang['lang_plugin_groups_core_model_110'].' ID: ' . $item['id'] . ''.$this->lang['lang_plugin_groups_core_model_111'].' '.$this->lang['lang_plugin_groups_core_model_112'].': ' . $item['expressname'] . ' ');
			}
		}
	}
	public function getTemp() 
	{
		global $_W;
		global $_GPC;
		$temp_sender = pdo_fetchall('SELECT id,isdefault,sendername,sendertel FROM ' . tablename('ewei_shop_exhelper_senduser') . ' WHERE uniacid=:uniacid order by isdefault desc ', array(':uniacid' => $_W['uniacid']));
		$temp_express = pdo_fetchall('SELECT id,type,isdefault,expressname FROM ' . tablename('ewei_shop_exhelper_express') . ' WHERE type=1 and uniacid=:uniacid order by isdefault desc ', array(':uniacid' => $_W['uniacid']));
		$temp_invoice = pdo_fetchall('SELECT id,type,isdefault,expressname FROM ' . tablename('ewei_shop_exhelper_express') . ' WHERE type=2 and uniacid=:uniacid order by isdefault desc ', array(':uniacid' => $_W['uniacid']));
		return array('temp_sender' => $temp_sender, 'temp_express' => $temp_express, 'temp_invoice' => $temp_invoice);
	}
}
?>