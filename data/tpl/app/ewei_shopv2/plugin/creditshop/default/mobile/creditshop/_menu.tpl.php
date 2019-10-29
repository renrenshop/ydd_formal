<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_creditshop_template_mobile_default__menu.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_creditshop_template_mobile_default__menu.php');}?>
<div class="fui-navbar">
	<a href="<?php  echo mobileUrl('creditshop/index')?>" class="external nav-item <?php  if($_W['routes'] == 'creditshop.index') { ?>active<?php  } ?>">
		<span class="icon icon-home"></span>
		<span class="label">首页</span>
	</a>
	<a href="<?php  echo mobileUrl('creditshop/lists')?>" class="external nav-item <?php  if($_W['routes'] == 'creditshop.lists') { ?>active<?php  } ?>">
		<span class="icon icon-list"></span>
		<span class="label">全部商品</span>
	</a>
	<?php  if(p('sign')) { ?>
		<?php  $signset = p('sign')->getSet();?>
		<?php  if(!empty($signset['isopen']) && !empty($signset['iscreditshop'])) { ?>
			<a href="<?php  echo mobileUrl('sign')?>" class="external nav-item">
				<span class="icon icon-gifts"></span>
				<span class="label"><?php  echo $_W['shopset']['trade']['credittext'];?>签到</span>
			</a>
		<?php  } ?>
	<?php  } ?>
	<a href="<?php  echo mobileUrl('creditshop/log')?>" class="external nav-item <?php  if($_W['routes'] == 'creditshop.log') { ?>active<?php  } ?>">
		<span class="icon icon-people"></span>
		<span class="label">我的</span>
	</a>
</div>

<?php  $this->followBar()?>
