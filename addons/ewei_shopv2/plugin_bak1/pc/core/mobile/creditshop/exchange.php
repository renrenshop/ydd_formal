<?php
if (!(defined("IN_IA"))) 
{
	exit("Access Denied");
}
require EWEI_SHOPV2_PLUGIN . "creditshop/core/page_mobile.php";
class Exchange_EweiShopV2Page extends CreditshopMobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		include $this->template();
	}
	public function check() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W['openid'];
		$uniacid = $_W['uniacid'];
		$id = intval($_GPC['id']);
		$log = pdo_fetch('select id,status from ' . tablename('ewei_shop_creditshop_log') . ' where id=:id and uniacid=:uniacid and openid=:openid limit 1', array(':id' => $id, ':uniacid' => $uniacid, ':openid' => $openid));
		if (!(empty($log)) && ($log['status'] == 3)) 
		{
			show_json(1);
		}
		show_json(0);
	}
	public function qrcode() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W['openid'];
		$uniacid = $_W['uniacid'];
		$id = intval($_GPC['id']);
		$log = pdo_fetch('select id,eno from ' . tablename('ewei_shop_creditshop_log') . ' where id=:id and uniacid=:uniacid and openid=:openid limit 1', array(':id' => $id, ':uniacid' => $uniacid, ':openid' => $openid));
		if (empty($log)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_0'].'!');
		}
		$qrcode = $this->model->createQrcode($id);
		show_json(1, array("qrcode" => $qrcode, 'eno' => $log['eno']));
	}
	public function exchange() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W['openid'];
		$uniacid = $_W['uniacid'];
		$id = intval($_GPC['id']);
		$saler = pdo_fetch('select * from ' . tablename('ewei_shop_saler') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));
		if (empty($saler)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_1'].'!');
		}
		$log = pdo_fetch('select * from ' . tablename('ewei_shop_creditshop_log') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $id, ':uniacid' => $uniacid));
		if (empty($log)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_2'].'!');
		}
		if (empty($log['status'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_3'].'!');
		}
		if (3 <= $log['status']) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_4'].'!');
		}
		$member = m('member')->getMember($log['openid']);
		$goods = $this->model->getGoods($log['goodsid'], $member);
		if (($goods['isendtime'] == 1) && ($goods['endtime'] < time())) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_5'].'!');
		}
		if (empty($goods['id'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_6'].'!');
		}
		if (empty($goods['isverify'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_7'].'!');
		}
		if (!(empty($goods['type']))) 
		{
			if ($log['status'] <= 1) 
			{
				show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_8'].'!');
			}
		}
		if ((0 < $goods['money']) && empty($log['paystatus'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_9'].'!');
		}
		if ((0 < $goods['dispatch']) && empty($log['dispatchstatus'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_10'].'!');
		}
		if (($goods['isendtime'] == 1) && ($goods['endtime'] < $goods['currenttime'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_11'].'!');
		}
		$stores = explode(',', $goods['storeids']);
		if (!(empty($storeids))) 
		{
			if (!(empty($saler['storeid']))) 
			{
				if (!(in_array($saler['storeid'], $storeids))) 
				{
					show_json(0, ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_12'].'!');
				}
			}
		}
		$time = time();
		pdo_update("ewei_shop_creditshop_log", array("status" => 3, "usetime" => $time, 'verifyopenid' => $openid), array('id' => $log['id']));
		$this->model->sendMessage($id);
		show_json(1, "'.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_13'].'" . $goods['title'] . ''.$this->lang['lang_plugin_pc_core_mobile_creditshop_exchange_14'].'!');
	}
}
?>