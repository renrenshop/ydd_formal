<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}


require IA_ROOT . '/addons/ewei_shopv2/defines.php';
require EWEI_SHOPV2_INC . 'plugin/plugin_processor.php';
class CreditshopProcessor extends PluginProcessor
{
	public function __construct()
	{
		parent::__construct('creditshop');
	}

	public function respond($obj = NULL)
	{
		global $_W;
		$message = $obj->message;
		$openid = $obj->message['from'];
		$content = $obj->message['content'];
		$msgtype = strtolower($message['msgtype']);
		$event = strtolower($message['event']);
		if (($msgtype == 'text') || ($event == 'click')) {
			$saler = pdo_fetch('select * from ' . tablename('ewei_shop_saler') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));

			if (empty($saler)) {
				return $this->responseEmpty();
			}


			if (!$obj->inContext) {
				$obj->beginContext();
				return $obj->respText(''.$this->lang['lang_plugin_customer_processor_0'].':');
			}


			if ($obj->inContext && is_numeric($content)) {
				$log = pdo_fetch('select * from ' . tablename('ewei_shop_creditshop_log') . ' where eno=:eno and uniacid=:uniacid  limit 1', array(':eno' => $content, ':uniacid' => $_W['uniacid']));

				if (empty($log)) {
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_1'].','.$this->lang['lang_plugin_customer_processor_2'].'!');
				}


				$logid = $log['id'];

				if (empty($log)) {
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_3'].','.$this->lang['lang_plugin_customer_processor_4'].'!');
				}


				if (empty($log['status'])) {
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_5'].'!');
				}


				if (3 <= $log['status']) {
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_6'].'!');
				}


				$member = m('member')->getMember($log['openid']);
				$goods = $this->model->getGoods($log['goodsid'], $member);

				if (empty($goods['id'])) {
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_7'].'!');
				}


				if (empty($goods['isverify'])) {
					$obj->endContext();
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_8'].'!');
				}


				if (!empty($goods['type'])) {
					if ($log['status'] <= 1) {
						return $obj->respText(''.$this->lang['lang_plugin_customer_processor_9'].'!');
					}

				}


				if ((0 < $goods['money']) && empty($log['paystatus'])) {
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_10'].'!');
				}


				if ((0 < $goods['dispatch']) && empty($log['dispatchstatus'])) {
					return $obj->respText(''.$this->lang['lang_plugin_customer_processor_11'].'!');
				}


				$stores = explode(',', $goods['storeids']);

				if (!empty($storeids)) {
					if (!empty($saler['storeid'])) {
						if (!in_array($saler['storeid'], $storeids)) {
							return $obj->respText(''.$this->lang['lang_plugin_customer_processor_12'].'!');
						}

					}

				}


				$time = time();
				pdo_update('ewei_shop_creditshop_log', array('status' => 3, 'usetime' => $time, 'verifyopenid' => $openid), array('id' => $log['id']));
				$this->model->sendMessage($logid);
				$obj->endContext();
				return $obj->respText(''.$this->lang['lang_plugin_customer_processor_13'].'!');
			}

		}

	}

	private function responseEmpty()
	{
		ob_clean();
		ob_start();
		echo '';
		ob_flush();
		ob_end_flush();
		exit(0);
	}
}


?>