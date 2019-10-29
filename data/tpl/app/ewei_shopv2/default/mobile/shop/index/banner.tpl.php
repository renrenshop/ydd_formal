<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_banner.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_banner.php');}?>
<?php  if(!empty($banners)) { ?>
	<div class='fui-swipe'>
		<?php  if(empty($bannerswipe)) { ?>
			<?php  if(is_array($banners)) { foreach($banners as $item) { ?>
				<img src="<?php  echo tomedia($item['thumb'])?>" style="display: block; width: 100%; height: auto;" <?php  if(!empty($item['link'])) { ?>onclick="location.href='<?php  echo $item['link'];?>'"<?php  } ?> />
			<?php  } } ?>
		<?php  } else { ?>
		    <div class='fui-swipe-wrapper'>
		    	<?php  if(is_array($banners)) { foreach($banners as $item) { ?>
		    		<div class='fui-swipe-item' <?php  if(!empty($item['link'])) { ?>onclick="location.href='<?php  echo $item['link'];?>'"<?php  } ?>><img src="<?php  echo tomedia($item['thumb'])?>" /></div>
				<?php  } } ?>
		    </div>
		    <div class='fui-swipe-page'></div>
	    <?php  } ?>
	</div>
<?php  } ?>