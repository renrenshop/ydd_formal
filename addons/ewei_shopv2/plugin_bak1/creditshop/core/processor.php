<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require IA_ROOT . '/addons/ewei_shopv2/defines.php';
require EWEI_SHOPV2_INC . '/plugin_processor.php';
class CreditshopProcessor extends PluginProcessor 
{
	public function __construct() 
	{
		parent::__construct('creditshop');
		$this->sessionkey = EWEI_SHOPV2_PREFIX . 'order_wechat_verify_info';
		$this->codekey = EWEI_SHOPV2_PREFIX . 'order_wechat_verify_code';
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
		if (($msgtype == 'text') || ($event == 'click')) 
		{
			$saler = pdo_fetch('select * from ' . tablename('ewei_shop_saler') . ' where openid=:openid and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));
			if (empty($saler)) 
			{
				return $this->responseEmpty();
			}
			if (!($obj->inContext)) 
			{
				$obj->beginContext();
				return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_0'].'8'.$this->lang['lang_plugin_creditshop_core_processor_1'].':');
			}
			if ($obj->inContext) 
			{
				if (is_numeric($content)) 
				{
					if (8 <= strlen($content)) 
					{
						$log = pdo_fetch('select * from ' . tablename('ewei_shop_creditshop_log') . ' where eno=:eno and uniacid=:uniacid  limit 1', array(':eno' => $content, ':uniacid' => $_W['uniacid']));
						$member = m('member')->getMember($log['openid']);
						$goods = p('creditshop')->getGoods($log['goodsid'], $member);
						if (empty($log)) 
						{
							unset($_SESSION[$this->sessionkey]);
							return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_2'].'! '.$this->lang['lang_plugin_creditshop_core_processor_3'].'n'.$this->lang['lang_plugin_creditshop_core_processor_4'].'');
						}
						$allow = p('creditshop')->allow($log['id'], 0, $openid);
						if (is_error($allow)) 
						{
							unset($_SESSION[$this->sessionkey]);
							return $obj->respText($allow['message'] . ' '.$this->lang['lang_plugin_creditshop_core_processor_5'].' n'.$this->lang['lang_plugin_creditshop_core_processor_6'].'');
						}
						extract($allow);
						$allow = p('creditshop')->allow($log['id'], 0, $openid);
						if (is_error($allow)) 
						{
							unset($_SESSION[$this->sessionkey]);
							return $obj->respText($allow['message'] . ' '.$this->lang['lang_plugin_creditshop_core_processor_7'].' n'.$this->lang['lang_plugin_creditshop_core_processor_8'].'');
						}
						extract($allow);
						$_SESSION[$this->sessionkey] = json_encode(array('logid' => $log['id'], 'openid' => $log['openid'], 'isverify' => $goods['isverify'], 'verifytype' => $goods['verifytype'], 'lastverifys' => $allow['lastverifys']));
						$str = '';
						$str .= ''.$this->lang['lang_plugin_creditshop_core_processor_9'].'' . "\r\n";
						$str .= "\r\n" . ''.$this->lang['lang_plugin_creditshop_core_processor_10'].': ' . $log['logno'] . "\r\n";
						$str .= ''.$this->lang['lang_plugin_creditshop_core_processor_11'].': ' . $goods['title'] . "\r\n";
						if ($goods['acttype'] == 0) 
						{
							$str .= ''.$this->lang['lang_plugin_creditshop_core_processor_12'].': ' . $goods['credit'] . ''.$this->lang['lang_plugin_creditshop_core_processor_13'].'+' . $goods['money'] . ''.$this->lang['lang_plugin_creditshop_core_processor_14'].'' . "\r\n";
						}
						else if ($goods['acttype'] == 1) 
						{
							$str .= ''.$this->lang['lang_plugin_creditshop_core_processor_15'].': ' . $goods['credit'] . ''.$this->lang['lang_plugin_creditshop_core_processor_16'].'' . "\r\n";
						}
						else if ($goods['acttype'] == 2) 
						{
							$str .= ''.$this->lang['lang_plugin_creditshop_core_processor_17'].': ' . $goods['money'] . ''.$this->lang['lang_plugin_creditshop_core_processor_18'].'' . "\r\n";
						}
						else if ($goods['acttype'] == 3) 
						{
							$str .= ''.$this->lang['lang_plugin_creditshop_core_processor_19'].': '.$this->lang['lang_plugin_creditshop_core_processor_20'].'' . "\r\n";
						}
						$str .= "\r\n" . ''.$this->lang['lang_plugin_creditshop_core_processor_21'].' y '.$this->lang['lang_plugin_creditshop_core_processor_22'].' n '.$this->lang['lang_plugin_creditshop_core_processor_23'].'';
						return $obj->respText($str);
					}
					if (isset($_SESSION[$this->sessionkey])) 
					{
						$session = json_decode($_SESSION[$this->sessionkey], true);
						if ($session['verifytype'] == 1) 
						{
							if (intval($content) <= 0) 
							{
								return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_24'].' 1 '.$this->lang['lang_plugin_creditshop_core_processor_25'].'!');
							}
							if ($session['lastverifys'] < intval($content)) 
							{
								return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_26'].' ' . $session['lastverifys'] . ' '.$this->lang['lang_plugin_creditshop_core_processor_27'].'!');
							}
							$result = p('creditshop')->verify($session['logid'], intval($content), '', $openid);
							if (is_error($result)) 
							{
								unset($_SESSION[$this->sessionkey]);
								return $obj->respText($allow['message'] . ' '.$this->lang['lang_plugin_creditshop_core_processor_28'].' n'.$this->lang['lang_plugin_creditshop_core_processor_29'].'');
							}
							$obj->endContext();
							return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_30'].'!');
						}
					}
					return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_31'].'8'.$this->lang['lang_plugin_creditshop_core_processor_32'].':');
				}
				if (strtolower($content) == 'y') 
				{
					if (isset($_SESSION[$this->sessionkey])) 
					{
						$session = json_decode($_SESSION[$this->sessionkey], true);
						if ($session['verifytype'] == 1) 
						{
							return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_33'].':');
						}
						$result = p('creditshop')->verify($session['logid'], 0, $session[$this->codekey], $openid);
						if (is_error($result)) 
						{
							unset($_SESSION[$this->sessionkey]);
							return $obj->respText($result['message'] . ' '.$this->lang['lang_plugin_creditshop_core_processor_34'].' n'.$this->lang['lang_plugin_creditshop_core_processor_35'].'');
						}
						$time = time();
						p('creditshop')->sendMessage($session['logid']);
						$obj->endContext();
						return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_36'].'!');
					}
					return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_37'].'8'.$this->lang['lang_plugin_creditshop_core_processor_38'].':');
				}
				@session_start();
				unset($_SESSION[$this->sessionkey]);
				unset($_SESSION[$this->codekey]);
				$obj->endContext();
				return $obj->respText(''.$this->lang['lang_plugin_creditshop_core_processor_39'].'.');
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