<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_nav.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_nav.php');}?>
<?php  if(!empty($navs)) { ?>
	<div class="fui-icon-group noborder">
		<?php  if(is_array($navs)) { foreach($navs as $item) { ?>
			<div class="fui-icon-col" <?php  if(!empty($item['url'])) { ?> onclick="location.href='<?php  echo $item['url'];?>'"<?php  } ?>>
				<div class="icon"><img src="<?php  echo tomedia($item['icon'])?>" /></div>
				<div class="text"><?php  echo $item['navname'];?></div>
		    </div>
		<?php  } } ?>
	</div>
 <?php  } ?>
