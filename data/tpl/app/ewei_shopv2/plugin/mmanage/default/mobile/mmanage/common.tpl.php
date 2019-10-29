<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_mmanage_template_mobile_default_common.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_mmanage_template_mobile_default_common.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<?php  if(is_h5app()) { ?>
<style>
    .fui-page-group.statusbar .fui-statusbar {background: #1ab394;}
    .fui-header a, .fui-header i, .fui-header .title {color: #fff;}
    .head-menu-mask, .fui-tab.fixed {top: 3.2rem !important;}
    .head-menu {top: 3.65rem !important;}
    .fui-tab.fixed ~ .fui-content {top: 5.2rem !important;}
</style>
<?php  } ?>

<link href="../addons/ewei_shopv2/plugin/mmanage/static/css/style.css?v=20170419"rel="stylesheet"type="text/css"/>
<?php  $hideLayer=true?>
