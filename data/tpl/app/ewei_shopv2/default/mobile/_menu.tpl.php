<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__menu.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__menu.php');}?>
<style>
    .fui-navbar{
        height: auto;
    }
    .fui-navbar .nav-item{
        vertical-align: top;
    }
</style>
<div class="fui-navbar">

    <a href="<?php  if(empty($_GPC['merchid'])) { ?><?php  echo mobileUrl()?><?php  } else { ?><?php  echo mobileUrl('merch')?><?php  } ?>" class="external nav-item <?php  if($_W['routes']=='' ||  $_W['routes']=='shop' ||  $_W['routes']=='commission.myshop') { ?>active<?php  } ?>">
        <span class="icon icon-homefill"></span>
        <span class="label"><?php  echo $lang['lang_template_mobile__menu_0']?></span>
    </a>
    
    <?php  if(intval($_W['shopset']['category']['level'])!=-1) { ?>
    <a href="<?php  echo mobileUrl('shop/category')?>" class="external nav-item <?php  if($_W['routes']=='shop.category') { ?>active<?php  } ?>" >
        <span class="icon icon-liebiao"></span>
        <span class="label"><?php  echo $lang['lang_template_mobile__menu_1']?></span>
    </a>
    <?php  } else { ?>
    <a href="<?php  echo mobileUrl('goods')?>" class="external nav-item <?php  if($_W['routes']=='goods') { ?>active<?php  } ?>" >
        <span class="icon icon-liebiao"></span>
        <span class="label"><?php  echo $lang['lang_template_mobile__menu_2']?></span>
    </a>
    <?php  } ?>
    
    <?php  if(!empty($commission)) { ?>
    <a href="<?php  echo $commission['url'];?>" class="external nav-item <?php  if($_W['routes']=='commission.register') { ?>active<?php  } ?>">
        <span class="icon icon-friendfill"></span>
        <!--<span class="label">Distribution Center</span>-->
        <!--<span class="label"><?php  echo $commission['text'];?></span>-->
        <span class="label"><?php  echo $lang['lang_template_mobile__menu_5']?></span>
    </a>
    <?php  } ?>
    
    <a href="<?php  echo mobileUrl('member/cart')?>" class="external nav-item <?php  if($_W['routes']=='member.cart') { ?>active<?php  } ?>" id="menucart">
        <span class="icon icon-cartfill"></span>
        <span class="label"><?php  echo $lang['lang_template_mobile__menu_3']?></span>
        <?php  if($cartcount>0) { ?><span class="badge"><?php  echo $cartcount;?></span><?php  } ?>
    </a>
    <a href="<?php  echo mobileUrl('member')?>" class="external nav-item  <?php  if($_W['routes']=='member') { ?>active<?php  } ?>">
        <span class="icon icon-peoplefill"></span>
        <span class="label"><?php  echo $lang['lang_template_mobile__menu_4']?></span>
    </a>
</div>
