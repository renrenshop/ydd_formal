<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page  fui-page-current shop-index-page'>
	<?php  if(is_h5app()) { ?>
	<div class="fui-header">
		<div class="fui-header-left"></div>
		<div class="title"><?php  if(empty($this->merch_user)) { ?><?php  echo $_W['shopset']['shop']['name'];?><?php  } else { ?><?php  echo $this->merch_user['merchname']?><?php  } ?></div>
		<div class="fui-header-right"></div>
	</div>
	<?php  } ?>
	<?php  $this->followBar()?>
	<?php  echo $index_cache;?>
</div>

<?php  $this->diyDanmu()?>

<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>