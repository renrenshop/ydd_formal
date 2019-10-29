<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default__menu.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default__menu.php');}?>
<div class="fui-navbar">
    <a href="<?php  echo mobileUrl('commission')?>" class="external nav-item <?php  if($_W['routes']=='commission') { ?>active<?php  } ?>">
        <span class="icon icon-homefill"></span>
        <span class="label"><?php  echo $this->set['texts']['center']?></span>
        <!--<span class="label"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_13']?></span>-->

    </a>
    <a href="<?php  echo mobileUrl('commission/withdraw')?>"
       class="external nav-item <?php  if($_W['routes']=='commission.log' || $_W['routes']=='commission.withdraw' || $_W['routes']=='commission.apply') { ?>active<?php  } ?>">
        <span class="icon icon-money"></span>
        <span class="label"><?php  echo $this->set['texts']['commission1']?></span>
        <!--<span class="label"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_23']?></span>-->
    </a>

    <a href="<?php  echo mobileUrl('commission/order')?>"
       class="external nav-item <?php  if($_W['routes']=='commission.order') { ?>active<?php  } ?>">
        <span class="icon icon-liebiao"></span>
        <span class="label"><?php  echo $this->set['texts']['order']?></span>
        <!--<span class="label"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_24']?></span>-->
    </a>

    <a href="<?php  echo mobileUrl('commission/down')?>"
       class="external nav-item <?php  if($_W['routes']=='commission.down') { ?>active<?php  } ?>">
        <span class="icon icon-friendfill"></span>
        <span class="label"><?php  echo $this->set['texts']['mydown']?></span>
        <!--<span class="label"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_25']?></span>-->
    </a>
    <?php  if(empty($this->set['closemyshop'])) { ?>
        <?php  $mid = m('member')->getMid()?>
        <a href="<?php  echo mobileUrl('commission/myshop',array('mid'=>$mid))?>"
           class=" external nav-item <?php  if($_W['routes']=='commission.myshop') { ?>active<?php  } ?>">
            <span class="icon icon-shopfill"></span>
            <span class="label"><?php  echo $this->set['texts']['myshop']?></span>
            <!--<span class="label"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_26']?></span>-->
        </a>
    <?php  } ?>
</div>
