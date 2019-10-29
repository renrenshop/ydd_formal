<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__copyright.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__copyright.php');}?>
<?php  $copyright = m('common')->getCopyright()?>
<?php  if(!empty($copyright) && !empty($copyright['copyright'])) { ?>
    <div class="footer" style='width:100%; display: block; <?php  if(!empty($copyright['bgcolor'])) { ?> background: <?php  echo $copyright['bgcolor'];?>; <?php  } ?>'>
        <?php  echo $copyright['copyright'];?>
    </div>
<?php  } ?>