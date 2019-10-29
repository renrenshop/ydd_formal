<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_coupon.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_coupon.php');}?>
<?php  if(!empty($diyitem['data'])) { ?>
    <div class="diy-coupon col-<?php  echo $diyitem['params']['couponstyle'];?>" style="margin: <?php  echo $diyitem['style']['margintop'];?>px 0; background: <?php  echo $diyitem['style']['background'];?>;">
        <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $couponitem) { ?>
            <?php  if(!empty($couponitem['couponid'])) { ?>
                <a class="diy-coupon-item" href="<?php  echo mobileUrl('sale/coupon/detail', array('id'=>$couponitem['couponid']))?>" data-nocache="true">
                    <div class="inner" style="border: 0; background: <?php  echo $couponitem['couponcolor'];?>; margin: <?php  echo $diyitem['style']['margintop'];?>px <?php  echo $diyitem['style']['marginleft'];?>px">
                        <div class="name"><?php  echo $couponitem['price'];?></div>
                        <div class="receive" style="border: 1px solid <?php  echo $couponitem['textcolor'];?>;">立即领取</div>
                        <i style="left: -0.35rem;background: <?php  echo $diyitem['style']['background'];?>;"></i>
                        <i style="right: -0.35rem;background: <?php  echo $diyitem['style']['background'];?>;"></i>
                    </div>
                </a>
            <?php  } ?>
        <?php  } } ?>
    </div>
<?php  } ?>
