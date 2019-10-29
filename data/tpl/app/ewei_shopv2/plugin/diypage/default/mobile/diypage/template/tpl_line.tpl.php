<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_line.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_line.php');}?>
<div class="fui-line-diy" style="background: <?php  echo $diyitem['style']['background'];?>; padding: <?php  echo $diyitem['style']['padding'];?>px 0;">
    <div class="line" style="border-top: <?php  echo $diyitem['style']['height'];?>px <?php  echo $diyitem['style']['linestyle'];?> <?php  echo $diyitem['style']['bordercolor'];?>"></div>
</div>
