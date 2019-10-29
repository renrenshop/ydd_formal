<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_richtext.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_richtext.php');}?>
<?php  if(!empty($diyitem['params']['content'])) { ?>
    <div class="diy-richtext" style="background: <?php  echo $diyitem['style']['background'];?>; padding: <?php  echo $diyitem['style']['padding'];?>px;">
        <?php  echo base64_decode($diyitem['params']['content'])?>
    </div>
<?php  } ?>
