<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_tabbar.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_tabbar.php');}?>
<?php  if(!empty($diyitem['data']) && $diyitem['style']['showtype'] == 1) { ?>
<div class="fui-tabbar tabbar-num style1" style="height: 2rem;">
    <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $index => $tabbar) { ?>
    <?php  if(strpos($tabbar['linkurl'],'index.php') === false ) { ?>
    <a class="item external tab-a topmenu_tab" style="<?php  if(count($diyitem['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="1" data-url="<?php  echo $tabbar['linkurl'];?>" data-textcolor1="<?php  echo $diyitem['style']['color'];?>" data-activecolor1="<?php  echo $diyitem['style']['activecolor'];?>" data-bgcolor1="<?php  echo $diyitem['style']['background'];?>" data-activebgcolor1="<?php  echo $diyitem['style']['activebackground'];?>"><?php  echo $tabbar['text'];?></a>
    <?php  } else { ?>
    <a class="item external tab-a topmenu_tab" style="<?php  if(count($diyitem['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="0" data-url="<?php  echo $tabbar['linkurl'];?>" data-textcolor1="<?php  echo $diyitem['style']['color'];?>" data-activecolor1="<?php  echo $diyitem['style']['activecolor'];?>" data-bgcolor1="<?php  echo $diyitem['style']['background'];?>" data-activebgcolor1="<?php  echo $diyitem['style']['activebackground'];?>"><?php  echo $tabbar['text'];?></a>
    <?php  } ?>
    <?php  } } ?>
</div>
<?php  } ?>

<?php  if(!empty($diyitem['data']) && $diyitem['style']['showtype'] == 2) { ?>
<div class="fui-tabbar tabbar-num style2" style="">
    <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $index => $tabbar) { ?>
    <?php  if(strpos($tabbar['linkurl'],'index.php') === false ) { ?>
    <a class="item external tab-a tabbar_tab" style="<?php  if(count($diyitem['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="1" data-url="<?php  echo $tabbar['linkurl'];?>" data-textcolor1="<?php  echo $diyitem['style']['color'];?>" data-activecolor1="<?php  echo $diyitem['style']['activecolor'];?>" data-bgcolor1="<?php  echo $diyitem['style']['background'];?>" data-activebgcolor1="<?php  echo $diyitem['style']['activebackground'];?>"><?php  echo $tabbar['text'];?></a>
    <?php  } else { ?>
    <a class="item external tab-a tabbar_tab" style="<?php  if(count($diyitem['data']) < 5) { ?>flex: 1;<?php  } ?>" href="javascript:;" data-notskip="0" data-url="<?php  echo $tabbar['linkurl'];?>" data-textcolor1="<?php  echo $diyitem['style']['color'];?>" data-activecolor1="<?php  echo $diyitem['style']['activecolor'];?>" data-bgcolor1="<?php  echo $diyitem['style']['background'];?>" data-activebgcolor1="<?php  echo $diyitem['style']['activebackground'];?>"><?php  echo $tabbar['text'];?></a>
    <?php  } ?>
    <?php  } } ?>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diypage/template/tpl_tabbar_data', TEMPLATE_INCLUDEPATH)) : (include template('diypage/template/tpl_tabbar_data', TEMPLATE_INCLUDEPATH));?>