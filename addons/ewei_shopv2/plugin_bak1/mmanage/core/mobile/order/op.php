<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'mmanage/core/inc/page_mmanage.php';
class Op_EweiShopV2Page extends MmanageMobilePage 
{
	protected function getOrder($id) 
	{
		global $_W;
		if (empty($id)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_0'].'');
		}
		$item = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_order') . ' WHERE id = :id and uniacid=:uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (empty($item)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_1'].'');
		}
		return $item;
	}
	protected function show($msg, $status = 0) 
	{
		global $_W;
		if ($_W['isajax']) 
		{
			show_json(0, $msg);
		}
		else 
		{
			$this->message($msg);
		}
	}
	public function remarksaler() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.remarksaler'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_2'].'');
		}
		$orderid = intval($_GPC['id']);
		if (empty($orderid)) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_3'].'');
		}
		$item = $this->getOrder($orderid);
		if ($_W['ispost']) 
		{
			$remarksaler = trim($_GPC['remarksaler']);
			pdo_update('ewei_shop_order', array('remarksaler' => $remarksaler), array('id' => $orderid, 'uniacid' => $_W['uniacid']));
			plog('order.op.remarksaler', ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_4'].' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_5'].': ' . $item['ordersn'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_6'].': ' . $remarksaler);
			show_json(1);
		}
		include $this->template();
	}
	public function changeaddress() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.changeaddress'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_7'].'');
		}
		$orderid = intval($_GPC['id']);
		if (empty($orderid)) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_8'].'');
		}
		$item = $this->getOrder($orderid);
		$area_set = m('util')->get_area_config_set();
		$new_area = intval($area_set['new_area']);
		$address_street = intval($area_set['address_street']);
		if (empty($item['addressid'])) 
		{
			$user = unserialize($item['carrier']);
		}
		else 
		{
			$user = iunserializer($item['address']);
			if (!(is_array($user))) 
			{
				$user = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_address') . ' WHERE id = :id and uniacid=:uniacid', array(':id' => $item['addressid'], ':uniacid' => $_W['uniacid']));
			}
			$address_info = $user['address'];
			$user_address = $user['address'];
			$user['address'] = $user['province'] . ' ' . $user['city'] . ' ' . $user['area'] . ' ' . $user['street'] . ' ' . $user['address'];
			$item['addressdata'] = $oldaddress = array('realname' => $user['realname'], 'mobile' => $user['mobile'], 'address' => $user['address']);
		}
		if ($_W['ispost']) 
		{
			$realname = $_GPC['realname'];
			$mobile = $_GPC['mobile'];
			$province = $_GPC['province'];
			$city = $_GPC['city'];
			$area = $_GPC['area'];
			$street = $_GPC['street'];
			$changead = intval($_GPC['changead']);
			$address = trim($_GPC['address']);
			if (empty($realname)) 
			{
				$ret = ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_9'].'';
				show_json(0, $ret);
			}
			if (empty($mobile)) 
			{
				$ret = ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_10'].'';
				show_json(0, $ret);
			}
			if ($changead) 
			{
				if ($province == ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_11'].'') 
				{
					$ret = ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_12'].'';
					show_json(0, $ret);
				}
				if (empty($address)) 
				{
					$ret = ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_13'].'';
					show_json(0, $ret);
				}
			}
			$address_array = iunserializer($item['address']);
			$address_array['realname'] = $realname;
			$address_array['mobile'] = $mobile;
			if ($changead) 
			{
				$address_array['province'] = $province;
				$address_array['city'] = $city;
				$address_array['area'] = $area;
				$address_array['street'] = $street;
				$address_array['address'] = $address;
			}
			else 
			{
				$address_array['province'] = $user['province'];
				$address_array['city'] = $user['city'];
				$address_array['area'] = $user['area'];
				$address_array['street'] = $user['street'];
				$address_array['address'] = $user_address;
			}
			$address_array = iserializer($address_array);
			pdo_update('ewei_shop_order', array('address' => $address_array), array('id' => $orderid, 'uniacid' => $_W['uniacid']));
			plog('order.op.changeaddress', ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_14'].' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_15'].': ' . $item['ordersn'] . ' <br>'.$this->lang['lang_plugin_mmanage_core_mobile_order_op_16'].': '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_17'].': ' . $oldaddress['realname'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_18'].': ' . $oldaddress['mobile'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_19'].': ' . $oldaddress['address'] . '<br>'.$this->lang['lang_plugin_mmanage_core_mobile_order_op_20'].': '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_21'].': ' . $realname . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_22'].': ' . $mobile . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_23'].': ' . $province . ' ' . $city . ' ' . $area . ' ' . $address);
			m('notice')->sendOrderChangeMessage($item['openid'], array('title' => ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_24'].'', 'orderid' => $item['id'], 'ordersn' => $item['ordersn'], 'olddata' => $oldaddress['address'], 'data' => $province . $city . $area . $address, 'type' => 0), 'orderstatus');
			show_json(1);
		}
		include $this->template();
	}
	public function send() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.send'))) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_25'].'');
		}
		$orderid = intval($_GPC['id']);
		if (empty($orderid)) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_26'].'');
		}
		$item = $this->getOrder($orderid);
		if (empty($item['addressid'])) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_27'].'');
		}
		if ($item['paytype'] != 3) 
		{
			if ($item['status'] != 1) 
			{
				$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_28'].'');
			}
		}
		if ($_W['ispost']) 
		{
			$expresssn = trim($_GPC['expresssn']);
			if (empty($expresssn)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_29'].'');
			}
			$express = trim($_GPC['express']);
			$expresscom = trim($_GPC['expresscom']);
			$time = time();
			$data = array('sendtype' => (0 < $item['sendtype'] ? $item['sendtype'] : intval($_GPC['sendtype'])), 'express' => $express, 'expresscom' => $expresscom, 'expresssn' => $expresssn, 'sendtime' => $time);
			$sendtype = intval($_GPC['sendtype']);
			if (!(empty($sendtype))) 
			{
				$goodsids = trim($_GPC['sendgoodsids']);
				if (empty($goodsids)) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_30'].'');
				}
				$ogoods = array();
				$ogoods = pdo_fetchall('select sendtype from ' . tablename('ewei_shop_order_goods') . "\r\n" . '                    where orderid = ' . $item['id'] . ' and uniacid = ' . $_W['uniacid'] . ' order by sendtype desc ');
				$senddata = array('sendtype' => $ogoods[0]['sendtype'] + 1, 'sendtime' => $data['sendtime']);
				$data['sendtype'] = $ogoods[0]['sendtype'] + 1;
				$goodsid = trim($_GPC['sendgoodsid']);
				$goodsids = explode(',', $goodsids);
				if ($goodsids) 
				{
					foreach ($goodsids as $key => $value ) 
					{
						pdo_update('ewei_shop_order_goods', $data, array('orderid' => $item['id'], 'goodsid' => $value, 'uniacid' => $_W['uniacid']));
					}
				}
				$send_goods = pdo_fetch('select * from ' . tablename('ewei_shop_order_goods') . "\r\n" . '                    where orderid = ' . $item['id'] . ' and sendtype = 0 and uniacid = ' . $_W['uniacid'] . ' limit 1 ');
				if (empty($send_goods)) 
				{
					$senddata['status'] = 2;
				}
				pdo_update('ewei_shop_order', $senddata, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
			}
			else 
			{
				$data['status'] = 2;
				pdo_update('ewei_shop_order', $data, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
			}
			if (!(empty($item['refundid']))) 
			{
				$refund = pdo_fetch('select * from ' . tablename('ewei_shop_order_refund') . ' where id=:id limit 1', array(':id' => $item['refundid']));
				if (!(empty($refund))) 
				{
					pdo_update('ewei_shop_order_refund', array('status' => -1, 'endtime' => $time), array('id' => $item['refundid']));
					pdo_update('ewei_shop_order', array('refundstate' => 0), array('id' => $item['id']));
				}
			}
			if ($item['paytype'] == 3) 
			{
				m('order')->setStocksAndCredits($item['id'], 1);
			}
			m('notice')->sendOrderMessage($item['id']);
			plog('order.op.send', ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_31'].' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_32'].': ' . $item['ordersn'] . ' <br/>'.$this->lang['lang_plugin_mmanage_core_mobile_order_op_33'].': ' . $_GPC['expresscom'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_34'].': ' . $_GPC['expresssn']);
			show_json(1);
		}
		$noshipped = array();
		$shipped = array();
		if (0 < $item['sendtype']) 
		{
			$noshipped = pdo_fetchall('select g.id,g.title,g.thumb,og.sendtype,g.ispresell,og.optionname,og.total from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.sendtype = 0 and og.orderid=:orderid ', array(':uniacid' => $_W['uniacid'], ':orderid' => $item['id']));
			$i = 1;
			while ($i <= $item['sendtype']) 
			{
				$shipped[$i]['sendtype'] = $i;
				$shipped[$i]['goods'] = pdo_fetchall('select g.id,g.title,g.thumb,og.sendtype,g.ispresell,og.optionname,og.total from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.sendtype = ' . $i . ' and og.orderid=:orderid ', array(':uniacid' => $_W['uniacid'], ':orderid' => $item['id']));
				++$i;
			}
		}
		$order_goods = pdo_fetchall('select g.id,g.title,g.thumb,og.sendtype,g.ispresell,og.optionname,og.total from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.orderid=:orderid ', array(':uniacid' => $_W['uniacid'], ':orderid' => $item['id']));
		$address = iunserializer($item['address']);
		if (!(is_array($address))) 
		{
			$address = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_address') . ' WHERE id = :id and uniacid=:uniacid', array(':id' => $item['addressid'], ':uniacid' => $_W['uniacid']));
		}
		$express_list = m('express')->getExpressList();
		include $this->template();
	}
	public function sendcancel() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.sendcancel'))) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_35'].'');
		}
		$orderid = intval($_GPC['id']);
		if (empty($orderid)) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_36'].'');
		}
		$item = $this->getOrder($orderid);
		if (($item['status'] != 2) && ($item['sendtype'] == 0)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_37'].'');
		}
		$sendtype = intval($_GPC['sendtype']);
		if ($_W['ispost']) 
		{
			$remark = trim($_GPC['remark']);
			if (!(empty($item['remarksend']))) 
			{
				$remark = $item['remarksend'] . "\r\n" . $remark;
			}
			$data = array('sendtime' => 0, 'remarksend' => $remark);
			if (0 < $item['sendtype']) 
			{
				if (empty($sendtype)) 
				{
					if (empty($_GPC['bundles'])) 
					{
						show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_38'].'');
					}
					$sendtype = trim($_GPC['bundles']);
				}
				$sendtype = explode(',', $sendtype);
				if (is_array($sendtype)) 
				{
					foreach ($sendtype as $key => $value ) 
					{
						$data['sendtype'] = 0;
						pdo_update('ewei_shop_order_goods', $data, array('orderid' => $item['id'], 'sendtype' => $value, 'uniacid' => $_W['uniacid']));
						$order = pdo_fetch('select sendtype from ' . tablename('ewei_shop_order') . ' where id = ' . $item['id'] . ' and uniacid = ' . $_W['uniacid'] . ' ');
						pdo_update('ewei_shop_order', array('sendtype' => $order['sendtype'] - 1, 'status' => 1), array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
					}
				}
			}
			else 
			{
				$data['status'] = 1;
				pdo_update('ewei_shop_order', $data, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
			}
			if ($item['paytype'] == 3) 
			{
				m('order')->setStocksAndCredits($item['id'], 2);
			}
			plog('order.op.sendcancel', ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_39'].' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_40'].': ' . $item['ordersn'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_41'].': ' . $remark);
			show_json(1);
		}
		$sendgoods = array();
		$bundles = array();
		if (0 < $sendtype) 
		{
			$sendgoods = pdo_fetchall('select g.id,g.title,g.thumb,og.sendtype,g.ispresell,og.optionname,og.total from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.orderid=:orderid and og.sendtype=' . $sendtype . ' ', array(':uniacid' => $_W['uniacid'], ':orderid' => $item['id']));
		}
		else if (0 < $item['sendtype']) 
		{
			$i = 1;
			while ($i <= intval($item['sendtype'])) 
			{
				$bundles[$i]['goods'] = pdo_fetchall('select g.id,g.title,g.thumb,og.sendtype,g.ispresell,og.optionname,og.total from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.orderid=:orderid and og.sendtype=' . $i . ' ', array(':uniacid' => $_W['uniacid'], ':orderid' => $item['id']));
				$bundles[$i]['sendtype'] = $i;
				if (empty($bundles[$i]['goods'])) 
				{
					unset($bundles[$i]);
				}
				++$i;
			}
		}
		include $this->template();
	}
	public function changeexpress() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.changeexpress'))) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_42'].'');
		}
		$orderid = intval($_GPC['id']);
		if (empty($orderid)) 
		{
			$this->show(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_43'].'');
		}
		$item = $this->getOrder($orderid);
		$changeexpress = 1;
		$sendtype = intval($_GPC['sendtype']);
		$edit_flag = 1;
		if ($_W['ispost']) 
		{
			$express = $_GPC['express'];
			$expresscom = $_GPC['expresscom'];
			$expresssn = trim($_GPC['expresssn']);
			if (empty($expresssn)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_44'].'');
			}
			$change_data = array();
			$change_data['express'] = $express;
			$change_data['expresscom'] = $expresscom;
			$change_data['expresssn'] = $expresssn;
			if (0 < $item['sendtype']) 
			{
				if (empty($sendtype)) 
				{
					if (empty($_GPC['bundles'])) 
					{
						show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_45'].'');
					}
					$sendtype = intval($_GPC['bundles']);
				}
				$sendtype = explode(',', $sendtype);
				if (is_array($sendtype)) 
				{
					foreach ($sendtype as $key => $value ) 
					{
						pdo_update('ewei_shop_order_goods', $change_data, array('orderid' => $orderid, 'sendtype' => $value, 'uniacid' => $_W['uniacid']));
					}
				}
			}
			else 
			{
				pdo_update('ewei_shop_order', $change_data, array('id' => $orderid, 'uniacid' => $_W['uniacid']));
			}
			plog('order.op.changeexpress', ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_46'].' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_47'].': ' . $item['ordersn'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_48'].': ' . $expresscom . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_49'].': ' . $expresssn);
			show_json(1);
		}
		$sendgoods = array();
		$bundles = array();
		if (0 < $sendtype) 
		{
			$sendgoods = pdo_fetchall('select g.id,g.title,g.thumb,og.sendtype,g.ispresell from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.orderid=:orderid and og.sendtype=' . $sendtype . ' ', array(':uniacid' => $_W['uniacid'], ':orderid' => $item['id']));
		}
		else if (0 < $item['sendtype']) 
		{
			$i = 1;
			while ($i <= intval($item['sendtype'])) 
			{
				$bundles[$i]['goods'] = pdo_fetchall('select g.id,g.title,g.thumb,og.sendtype,g.ispresell from ' . tablename('ewei_shop_order_goods') . ' og ' . ' left join ' . tablename('ewei_shop_goods') . ' g on g.id=og.goodsid ' . ' where og.uniacid=:uniacid and og.orderid=:orderid and og.sendtype=' . $i . ' ', array(':uniacid' => $_W['uniacid'], ':orderid' => $item['id']));
				$bundles[$i]['sendtype'] = $i;
				if (empty($bundles[$i]['goods'])) 
				{
					unset($bundles[$i]);
				}
				++$i;
			}
		}
		$address = iunserializer($item['address']);
		if (!(is_array($address))) 
		{
			$address = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_address') . ' WHERE id = :id and uniacid=:uniacid', array(':id' => $item['addressid'], ':uniacid' => $_W['uniacid']));
		}
		$express_list = m('express')->getExpressList();
		include $this->template('mmanage/order/op/send');
	}
	public function payorder() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.pay'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_50'].'');
		}
		if (!($_W['ispost'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_51'].'');
		}
		$orderid = intval($_GPC['orderid']);
		if (empty($orderid)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_52'].'');
		}
		$item = $this->getOrder($orderid);
		if (1 < $item['status']) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_53'].'');
		}
		if (!(empty($item['virtual'])) && com('virtual')) 
		{
			com('virtual')->pay($item);
		}
		else 
		{
			pdo_update('ewei_shop_order', array('status' => 1, 'paytype' => 11, 'paytime' => time()), array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
			m('order')->setStocksAndCredits($item['id'], 1);
			m('notice')->sendOrderMessage($item['id']);
			com_run('printer::sendOrderMessage', $item['id']);
			if (com('coupon')) 
			{
				com('coupon')->sendcouponsbytask($item['id']);
			}
			if (com('coupon') && !(empty($item['couponid']))) 
			{
				com('coupon')->backConsumeCoupon($item['id']);
			}
			if (p('commission')) 
			{
				p('commission')->checkOrderPay($item['id']);
			}
		}
		plog('order.op.pay', ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_54'].' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_55'].': ' . $item['ordersn']);
		show_json(1);
	}
	public function changeprice() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.pay'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_56'].'');
		}
		$orderid = intval($_GPC['id']);
		if (empty($orderid)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_57'].'');
		}
	}
	public function fetch() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.fetch'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_58'].'');
		}
		if (!($_W['ispost'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_59'].'');
		}
		$orderid = intval($_GPC['orderid']);
		if (empty($orderid)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_60'].'');
		}
		$item = $this->getOrder($orderid);
		if ($item['status'] != 1) 
		{
			message(''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_61'].'');
		}
		$time = time();
		$d = array('status' => 3, 'sendtime' => $time, 'finishtime' => $time);
		if ($item['isverify'] == 1) 
		{
			$d['verified'] = 1;
			$d['verifytime'] = $time;
			$d['verifyopenid'] = '';
		}
		pdo_update('ewei_shop_order', $d, array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
		if (com('coupon')) 
		{
			com('coupon')->sendcouponsbytask($item['id']);
		}
		if (!(empty($item['couponid']))) 
		{
			com('coupon')->backConsumeCoupon($item['id']);
		}
		if (!(empty($item['refundid']))) 
		{
			$refund = pdo_fetch('select * from ' . tablename('ewei_shop_order_refund') . ' where id=:id limit 1', array(':id' => $item['refundid']));
			if (!(empty($refund))) 
			{
				pdo_update('ewei_shop_order_refund', array('status' => -1), array('id' => $item['refundid']));
				pdo_update('ewei_shop_order', array('refundstate' => 0), array('id' => $item['id']));
			}
		}
		$log = ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_62'].'';
		if (p('ccard') && !(empty($item['ccardid']))) 
		{
			p('ccard')->setBegin($item['id'], $item['ccardid']);
			$log = ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_63'].'';
		}
		$log .= ' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_64'].': ' . $item['ordersn'];
		m('order')->setGiveBalance($item['id'], 1);
		m('member')->upgradeLevel($item['openid']);
		m('notice')->sendOrderMessage($item['id']);
		if (p('commission')) 
		{
			p('commission')->checkOrderFinish($item['id']);
		}
		plog('order.op.fetch', $log);
		show_json(1);
	}
	public function finish() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('order.op.finish'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_65'].'');
		}
		if (!($_W['ispost'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_66'].'');
		}
		$orderid = intval($_GPC['orderid']);
		if (empty($orderid)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_67'].'');
		}
		$item = $this->getOrder($orderid);
		pdo_update('ewei_shop_order', array('status' => 3, 'finishtime' => time()), array('id' => $item['id'], 'uniacid' => $_W['uniacid']));
		if (p('ccard') && !(empty($item['ccardid']))) 
		{
			p('ccard')->setBegin($item['id'], $item['ccardid']);
		}
		m('member')->upgradeLevel($item['openid']);
		m('order')->setGiveBalance($item['id'], 1);
		m('notice')->sendOrderMessage($item['id']);
		com_run('printer::sendOrderMessage', $item['id']);
		if (com('coupon')) 
		{
			com('coupon')->sendcouponsbytask($item['id']);
		}
		if (!(empty($item['couponid']))) 
		{
			com('coupon')->backConsumeCoupon($item['id']);
		}
		if (p('lineup')) 
		{
			p('lineup')->checkOrder($item);
		}
		if (p('commission')) 
		{
			p('commission')->checkOrderFinish($item['id']);
		}
		if (p('lottery')) 
		{
			$res = p('lottery')->getLottery($item['openid'], 1, array('money' => $item['price'], 'paytype' => 2));
			if ($res) 
			{
				p('lottery')->getLotteryList($item['openid'], array('lottery_id' => $res));
			}
		}
		plog('order.op.finish', ''.$this->lang['lang_plugin_mmanage_core_mobile_order_op_68'].' ID: ' . $item['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_order_op_69'].': ' . $item['ordersn']);
		show_json(1);
	}
}
?>