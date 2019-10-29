<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_picture.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_picture.php');}?>
<?php  if(!empty($diyitem['data'])) { ?>
    <div class="fui-picture" style="padding-bottom: <?php  echo $diyitem['style']['paddingtop'];?>px; background: <?php  echo $diyitem['style']['background'];?>;">
        <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $pictureitem) { ?>
        <a href="<?php echo empty($pictureitem['linkurl'])? 'javascript:;': $pictureitem['linkurl']?>" style="display: block; padding: <?php  echo $diyitem['style']['paddingtop'];?>px <?php  echo $diyitem['style']['paddingleft'];?>px;" data-nocache="true">
            <img src="<?php  echo tomedia($pictureitem['imgurl'])?>" />
        </a>
        <?php  } } ?>
    </div>
<?php  } ?>