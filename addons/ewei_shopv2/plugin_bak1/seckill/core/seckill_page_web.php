<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class SeckillWebPage extends PluginWebPage 
{
	public function __construct() 
	{
		parent::__construct();
		global $_W;
		global $_GPC;
		if (!(function_exists('redis'))) 
		{
			$this->message(''.$this->lang['lang_plugin_seckill_core_seckill_page_web_0'].'', 'exit', 'error');
			exit();
		}
		$redis = redis();
		if (is_error($redis)) 
		{
			$message = ''.$this->lang['lang_plugin_seckill_core_seckill_page_web_1'].' redis '.$this->lang['lang_plugin_seckill_core_seckill_page_web_2'].'';
			if ($_W['isfounder']) 
			{
				$message .= '<br/><br/>'.$this->lang['lang_plugin_seckill_core_seckill_page_web_3'].': ' . $redis['message'];
			}
			$this->message($message, 'exit', 'error');
			exit();
		}
	}
}
?>