<?php

if (!defined('IN_IA')) {
	exit('Access Denied');
}


require IA_ROOT . '/addons/ewei_shopv2/defines.php';
require EWEI_SHOPV2_INC . '/plugin_processor.php';
class GroupsProcessor extends PluginProcessor
{
	public function __construct()
	{
		parent::__construct('groups');
		$this->sessionkey = EWEI_SHOPV2_PREFIX . 'gorder_wechat_verify_info';
		$this->codekey = EWEI_SHOPV2_PREFIX . 'gorder_wechat_verify_code';
	}

	public function respond($obj = NULL)
	{
		global $_W;
		$message = $obj->message;
		$openid = $obj->message['from'];
		$content = $obj->message['content'];
		$msgtype = strtolower($message['msgtype']);
		$event = strtolower($message['event']);
		@session_start();
		if (($msgtype == 'text') || ($event == 'click')) {
			$saler = pdo_fetch('select * from ' . tablename('ewei_shop_saler') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));

			if (empty($saler)) {
				return $this->responseEmpty();
			}


			if (!$obj->inContext) {
				unset($_SESSION[$this->sessionkey]);
				unset($_SESSION[$this->codekey]);
				$obj->beginContext();
				return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_0'].'8'.$this->lang['lang_plugin_groups_core_processor_1'].':');
			}


			if ($obj->inContext) {
				if (is_numeric($content)) {
					if (8 <= strlen($content)) {
						$_SESSION[$this->codekey] = $verifycode = trim($content);
						$order = pdo_fetch('select id,orderno,price,goodid from ' . tablename('ewei_shop_groups_order') . "\n\t\t\t\t\t\t\t" . 'where uniacid=:uniacid and verifycode = :verifycode limit 1 ', array(':uniacid' => $_W['uniacid'], ':verifycode' => 'PT' . $verifycode));

						if (empty($order)) {
							unset($_SESSION[$this->sessionkey]);
							return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_2'].' n'.$this->lang['lang_plugin_groups_core_processor_3'].'');
						}


						$allow = p('groups')->allow($order['id'], 0, $openid);

						if (is_error($allow)) {
							unset($_SESSION[$this->sessionkey]);
							return $obj->respText($allow['message'] . ' '.$this->lang['lang_plugin_groups_core_processor_4'].' n'.$this->lang['lang_plugin_groups_core_processor_5'].'');
						}


						extract($allow);
						$_SESSION[$this->sessionkey] = json_encode(array('orderid' => $allow['order']['id'], 'verifytype' => $allow['order']['verifytype'], 'lastverifys' => $allow['lastverifys']));
						$str = '';
						$str .= ''.$this->lang['lang_plugin_groups_core_processor_6'].'' . $order['orderno'] . "\r\n" . ''.$this->lang['lang_plugin_groups_core_processor_7'].'' . $order['price'] . ' '.$this->lang['lang_plugin_groups_core_processor_8'].'' . "\r\n";
						$str .= ''.$this->lang['lang_plugin_groups_core_processor_9'].'' . "\r\n";
						$str .= 1 . ''.$this->lang['lang_plugin_groups_core_processor_10'].'' . $goods['title'] . "\r\n";

						if ($order['dispatchtype'] == 1) {
							$str .= "\r\n" . ''.$this->lang['lang_plugin_groups_core_processor_11'].' y '.$this->lang['lang_plugin_groups_core_processor_12'].' n '.$this->lang['lang_plugin_groups_core_processor_13'].'';
						}
						 else if ($order['verifytype'] == 0) {
							$str .= "\r\n" . ''.$this->lang['lang_plugin_groups_core_processor_14'].' y '.$this->lang['lang_plugin_groups_core_processor_15'].' n '.$this->lang['lang_plugin_groups_core_processor_16'].'';
						}
						 else if ($order['verifytype'] == 1) {
							$str .= "\r\n" . ''.$this->lang['lang_plugin_groups_core_processor_17'].' ' . $lastverifys . ' '.$this->lang['lang_plugin_groups_core_processor_18'].' n '.$this->lang['lang_plugin_groups_core_processor_19'].'';
							return $obj->respText($str);
						}


						return $obj->respText($str);
					}


					if (isset($_SESSION[$this->sessionkey])) {
						$session = json_decode($_SESSION[$this->sessionkey], true);

						if ($session['verifytype'] == 1) {
							if (intval($content) <= 0) {
								return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_20'].' 1 '.$this->lang['lang_plugin_groups_core_processor_21'].'!');
							}


							if ($session['lastverifys'] < intval($content)) {
								return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_22'].' ' . $session['lastverifys'] . ' '.$this->lang['lang_plugin_groups_core_processor_23'].'!');
							}


							$result = p('groups')->verify($session['orderid'], intval($content), '', $openid);

							if (is_error($result)) {
								unset($_SESSION[$this->sessionkey]);
								return $obj->respText($allow['message'] . ' '.$this->lang['lang_plugin_groups_core_processor_24'].' n'.$this->lang['lang_plugin_groups_core_processor_25'].'');
							}


							$obj->endContext();
							return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_26'].'!');
						}

					}


					return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_27'].'8'.$this->lang['lang_plugin_groups_core_processor_28'].':');
				}


				if (strtolower($content) == 'y') {
					if (isset($_SESSION[$this->sessionkey])) {
						$session = json_decode($_SESSION[$this->sessionkey], true);

						if ($session['verifytype'] == 1) {
							return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_29'].':');
						}


						$result = p('groups')->verify($session['orderid'], 0, $session[$this->codekey], $openid);

						if (is_error($result)) {
							unset($_SESSION[$this->sessionkey]);
							return $obj->respText($result['message'] . ' '.$this->lang['lang_plugin_groups_core_processor_30'].' n'.$this->lang['lang_plugin_groups_core_processor_31'].'');
						}


						$obj->endContext();
						return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_32'].'!');
					}


					return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_33'].'8'.$this->lang['lang_plugin_groups_core_processor_34'].':');
				}


				@session_start();
				unset($_SESSION[$this->sessionkey]);
				unset($_SESSION[$this->codekey]);
				$obj->endContext();
				return $obj->respText(''.$this->lang['lang_plugin_groups_core_processor_35'].'.');
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