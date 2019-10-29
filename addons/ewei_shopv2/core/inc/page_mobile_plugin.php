<?php
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class PluginMobilePage extends MobilePage
{
	public $model;
	public $set;

	public function __construct()
	{
		parent::__construct();
		$this->model = m('plugin')->loadModel($GLOBALS['_W']['plugin']);
		$this->set = $this->model->getSet();
        //加载插件语言包
        $this->loadPluginLanguage();
	}

	public function getSet()
	{
		return $this->set;
	}

	public function qr()
	{
		global $_W;
		global $_GPC;
		$url = trim($_GPC['url']);
		require IA_ROOT . '/framework/library/qrcode/phpqrcode.php';
		QRcode::png($url, false, QR_ECLEVEL_L, 16, 1);
	}

    public function loadPluginLanguage(){
        global $_W;
        $routes = explode('.',$_W['routes']);

        if(!empty($routes)){
            $pluginName = $routes[0];
            unset($routes[0]);
            $r = implode('_',$routes);
            $lang_file = EWEI_SHOPV2_LANGUAGE . $_W['lang_type'] . '/_plugin_' .$pluginName . '_core_mobile_' .$r;

            $lang = array();
            if (file_exists($lang_file. '.php') ){
                include $lang_file. '.php';
            }elseif(file_exists($lang_file. '_index.php')){
                include $lang_file. '_index.php';
            }else{
				$lang_file = EWEI_SHOPV2_LANGUAGE . $_W['lang_type'] . '/_plugin_' .$pluginName . '_template_mobile_default_' .$r;
				if (file_exists($lang_file. '.php') ){
					include $lang_file. '.php';
				}elseif(file_exists($lang_file. 'index.php')){
					include $lang_file. 'index.php';
				}

			}
            $this->loadLanguage($lang);
        }

    }
}

?>
