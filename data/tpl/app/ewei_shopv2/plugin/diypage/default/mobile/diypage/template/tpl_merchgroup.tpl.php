<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_merchgroup.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_merchgroup.php');}?>
<?php  if(!empty($diyitem['data'])) { ?>
    <div class="fui-list-group merchgroup" style="background: <?php  echo $diyitem['style']['background'];?>; margin-top: <?php  echo $diyitem['style']['margintop'];?>;" data-itemdata='<?php  echo json_encode($diyitem)?>' data-openlocation="<?php  echo $diyitem['params']['openlocation'];?>">
        <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $merchitem) { ?>
            <div class="fui-list jump">
                <a class="fui-list-media" href="<?php  echo mobileUrl('merch', array('merchid'=>$merchitem['merchid']))?>" data-nocache="true">
                    <img class="round" src="<?php echo !empty($merchitem['thumb'])?tomedia($merchitem['thumb']):'../addons/ewei_shopv2/plugin/diypage/static/images/default/logo.jpg'?>" />
                </a>
                <a class="fui-list-inner" href="<?php  echo mobileUrl('merch', array('merchid'=>$merchitem['merchid']))?>" data-nocache="true">
                    <div class="title" style="color: <?php  echo $diyitem['style']['titlecolor'];?>;"><?php  echo $merchitem['name'];?></div>
                    <?php  if(!empty($merchitem['desc'])) { ?>
                        <div class="subtitle" style="color: <?php  echo $diyitem['style']['textcolor'];?>;"><?php  echo $merchitem['desc'];?></div>
                    <?php  } ?>
                </a>
                <a class="fui-remark jump" style="padding-right: 0.2rem; height: 2rem; width: 2rem; text-align: center; line-height: 2rem;" href="<?php  echo mobileUrl('merch/map', array('merchid'=>$merchitem['merchid']))?>" data-nocache="true">
                </a>
            </div>
        <?php  } } ?>
    </div>
<?php  } ?>
