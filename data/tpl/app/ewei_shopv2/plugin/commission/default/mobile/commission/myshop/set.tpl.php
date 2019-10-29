<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_myshop_set.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_myshop_set.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current">
	<div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_0']?></div>
    </div>
	<div class='fui-content'>
		<div class='fui-cell-group'>
			<div class='fui-cell'>
				<div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_1']?></div>
				<div class='fui-cell-info'><input type="text" class='fui-input' id="shopname" value="<?php  echo $shop['name'];?>" placeholder='<?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_2']?>'/></div>
			</div>
			<div class='fui-cell'>
				<div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_3']?></div>
				<div class='fui-cell-info'>
					<ul class="fui-images fui-images-sm" id="imageLogo"> 
						<?php  if(!empty($shop['logo'])) { ?>
						<li style="background-image:url(<?php  echo tomedia($shop['logo'])?>)" class="image image-sm" data-filename="<?php  echo $shop['logo'];?>">
							<span class="image-remove"><i class="icon icon-roundclose"></i></span></li>
						<?php  } ?>


					</ul>
					
					<div class="fui-uploader fui-uploader-sm "  <?php  if(!empty($shop['logo'])) { ?>style='display:none'<?php  } ?>
						 data-max="1" 
						data-count="<?php  if(!empty($shop['logo'])) { ?>1<?php  } else { ?>0<?php  } ?>"> 
						 <input type="file" name='imgFile0' id='imgFile0'  <?php  if(!is_h5app() || (is_h5app() && is_ios())) { ?>multiple="" accept="image/*" <?php  } ?>>
					</div>
				 
					
				</div>
			</div>
			<div class='fui-cell'>
				<div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_4']?></div>
				<div class='fui-cell-info'>
					
					<ul class="fui-images" id="imageImg"> 
						<?php  if(!empty($shop['img'])) { ?>
						<li style="background-image:url(<?php  echo tomedia($shop['img'])?>)" class="image long" data-filename="<?php  echo $shop['img'];?>" >
							<span class="image-remove"><i class="icon icon-roundclose"></i></span></li>
						<?php  } ?>


					</ul>
				 
					<div class="fui-uploader img-container-uploader long"   <?php  if(!empty($shop['img'])) { ?>style='display:none'<?php  } ?>
						  data-max="1" 
						  data-long="1"
						  data-count="<?php  if(!empty($shop['img'])) { ?>1<?php  } else { ?>0<?php  } ?>"> 
						 <input type="file" name='imgFile1' id='imgFile1' <?php  if(!is_h5app() || (is_h5app() && is_ios())) { ?>multiple="" accept="image/*" <?php  } ?> >
					</div>
					 
					
				</div>
			</div>
			<div class='fui-cell'>
				<div class='fui-cell-info'><textarea id="desc" rows="3" placeholder="<?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_5']?>,<?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_6']?>"><?php  echo $shop['desc'];?></textarea></div>
			</div>
		</div>
		<div class='btn btn-danger block btn-submit'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_set_7']?></div>
	</div>

	
	<script language='javascript'>
		require(['../addons/ewei_shopv2/plugin/commission/static/js/myshop.js'], function (modal) {
			modal.initSet();
	});
</script>

</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>