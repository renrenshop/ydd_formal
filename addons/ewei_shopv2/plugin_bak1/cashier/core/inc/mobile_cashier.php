<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class CashierMobilePage extends PluginMobilePage 
{
	public function __construct() 
	{
		global $_W;
		global $_GPC;
		parent::__construct();
		if (!(empty($_GPC['cashierid']))) 
		{
			$_W['cashieruser'] = $this->model->userInfo((int) $_GPC['cashierid']);
			$_W['cashierid'] = $_W['cashieruser']['id'];
			$_W['cashierset'] = json_decode($_W['cashieruser']['set'], true);
		}
		else 
		{
			$this->message(''.$this->lang['lang_plugin_cashier_core_inc_mobile_cashier_0'].'!', 'close', 'error');
		}
		if (empty($_W['cashieruser'])) 
		{
			$this->message(''.$this->lang['lang_plugin_cashier_core_inc_mobile_cashier_1'].'!', 'close', 'error');
		}
		if (empty($this->set['isopen'])) 
		{
			$this->message(''.$this->lang['lang_plugin_cashier_core_inc_mobile_cashier_2'].'!', 'close', 'error');
		}
		if (empty($_W['cashierset']['mobile_pay'])) 
		{
			$this->message(''.$this->lang['lang_plugin_cashier_core_inc_mobile_cashier_3'].'!', 'close', 'error');
		}
		if ($_W['cashieruser']['lifetimeend'] < time()) 
		{
			if (($_W['routes'] != 'login') && ($_W['routes'] != 'quit')) 
			{
				$this->message(''.$this->lang['lang_plugin_cashier_core_inc_mobile_cashier_4'].'!', 'close', 'error');
			}
		}
	}
}
?>