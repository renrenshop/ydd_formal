<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}


global $_W;
global $_GPC;
$operation = ((!empty($_GPC['op']) ? $_GPC['op'] : 'display'));
$openid = m('user')->getOpenid();
$uniacid = $_W['uniacid'];
$id = intval($_GPC['id']);

if ($operation == 'check') {
	$log = pdo_fetch('select id,status from ' . tablename('ewei_shop_creditshop_log') . ' where id=:id and uniacid=:uniacid and openid=:openid limit 1', array(':id' => $id, ':uniacid' => $uniacid, ':openid' => $openid));

	if (!empty($log) && ($log['status'] == 3)) {
		show_json(1);
	}


	show_json(0);
	return 1;
}


if ($operation == 'qrcode') {
	$log = pdo_fetch('select id,eno from ' . tablename('ewei_shop_creditshop_log') . ' where id=:id and uniacid=:uniacid and openid=:openid limit 1', array(':id' => $id, ':uniacid' => $uniacid, ':openid' => $openid));

	if (empty($log)) {
		show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_0'].'!');
	}


	$qrcode = $this->model->createQrcode($id);
	show_json(1, array('qrcode' => $qrcode, 'eno' => $log['eno']));
	return 1;
}


if ($operation == 'exchange') {
	if ($_W['ispost'] && $_W['isajax']) {
		$saler = pdo_fetch('select * from ' . tablename('ewei_shop_saler') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));

		if (empty($saler)) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_1'].'!');
		}


		$log = pdo_fetch('select * from ' . tablename('ewei_shop_creditshop_log') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $id, ':uniacid' => $uniacid));

		if (empty($log)) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_2'].'!');
		}


		if (empty($log)) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_3'].'!');
		}


		if (empty($log['status'])) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_4'].'!');
		}


		if (3 <= $log['status']) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_5'].'!');
		}


		$member = m('member')->getMember($log['openid']);
		$goods = $this->model->getGoods($log['goodsid'], $member);

		if (empty($goods['id'])) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_6'].'!');
		}


		if (empty($goods['isverify'])) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_7'].'!');
		}


		if (!empty($goods['type'])) {
			if ($log['status'] <= 1) {
				show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_8'].'!');
			}

		}


		if ((0 < $goods['money']) && empty($log['paystatus'])) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_9'].'!');
		}


		if ((0 < $goods['dispatch']) && empty($log['dispatchstatus'])) {
			show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_10'].'!');
		}


		$stores = explode(',', $goods['storeids']);

		if (!empty($storeids)) {
			if (!empty($saler['storeid'])) {
				if (!in_array($saler['storeid'], $storeids)) {
					show_json(0, ''.$this->lang['lang_plugin_customer_core_mobile_exchange_11'].'!');
				}

			}

		}


		$time = time();
		pdo_update('ewei_shop_creditshop_log', array('status' => 3, 'usetime' => $time, 'verifyopenid' => $openid), array('id' => $log['id']));
		$this->model->sendMessage($id);
		show_json(1);
	}


	include $this->template('exchange');
}


?>