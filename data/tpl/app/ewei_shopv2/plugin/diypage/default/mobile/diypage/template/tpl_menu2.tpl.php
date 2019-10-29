<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_menu2.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_menu2.php');}?>
<?php  if(!empty($diyitem['data'])) { ?>
    <div class="fui-menu-group" style="margin-top: <?php  echo $diyitem['style']['margintop'];?>px;">
        <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $menuitem) { ?>
            <?php  if(!empty($menuitem['text'])) { ?>
                <a class="fui-menu-item" style="<?php  if($diyitem['style']['background']!='#ffffff') { ?>background:<?php  echo $diyitem['style']['background'];?>;<?php  } ?> color: <?php  echo $menuitem['textcolor'];?>;" href="<?php  echo $menuitem['linkurl'];?>" data-nocache="true"><?php  if(!empty($menuitem['iconclass'])) { ?><i class="icon <?php  echo $menuitem['iconclass'];?>" style="color: <?php  echo $menuitem['iconcolor'];?>;position: relative;top: -2px;"></i><?php  } ?> <?php  echo $menuitem['text'];?></a>
            <?php  } ?>
        <?php  } } ?>
    </div>
<?php  } ?>