<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_index_tpl.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_index_tpl.php');}?>
	<div class='fui-content navbar'>

		<?php  if(is_array($sorts)) { foreach($sorts as $name => $item) { ?>
			<?php  if($item['visible']==1) { ?>
				<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('shop/index/'.$name, TEMPLATE_INCLUDEPATH)) : (include template('shop/index/'.$name, TEMPLATE_INCLUDEPATH));?>
			<?php  } ?>
		<?php  } } ?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/wholesalePicker', TEMPLATE_INCLUDEPATH)) : (include template('goods/wholesalePicker', TEMPLATE_INCLUDEPATH));?>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
	</div>
