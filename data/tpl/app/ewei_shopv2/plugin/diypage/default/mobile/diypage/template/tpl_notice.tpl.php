<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_notice.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_notice.php');}?>
<?php  if(!empty($diyitem['data'])) { ?>
    <div class="fui-notice" style="background: <?php  echo $diyitem['style']['background'];?>; border-color: <?php  echo $diyitem['style']['bordercolor'];?>;" data-speed="<?php  echo $diyitem['params']['speed'];?>">
        <?php  if(!empty($diyitem['params']['iconurl'])) { ?>
        <div class="image"><img src="<?php  echo tomedia($diyitem['params']['iconurl'])?>" onerror="this.src='../addons/ewei_shopv2/static/images/hotdot.jpg'"></div>
        <?php  } ?>
        <div class="icon"><i class="icon icon-notification1" style="font-size: 0.7rem; color: <?php  echo $diyitem['style']['iconcolor'];?>;"></i></div>
        <div class="text" style="color: <?php  echo $diyitem['style']['color'];?>;">
            <ul>
                <?php  if(is_array($diyitem['data'])) { foreach($diyitem['data'] as $noticeitem) { ?>
                    <?php  if($diyitem['params']['noticedata']==0) { ?>
                        <li><a href="<?php  if(!empty($noticeitem['linkurl'])) { ?><?php  echo $noticeitem['linkurl'];?><?php  } else { ?><?php  echo mobileUrl('shop/notice/detail', array('id'=>$noticeitem['id'], 'merchid'=>$page['merch']))?><?php  } ?>" style="color: <?php  echo $diyitem['style']['color'];?>;" data-nocache="true"><?php  echo $noticeitem['title'];?></a></li>
                    <?php  } else if($diyitem['params']['noticedata']==1) { ?>
                        <li><a href="<?php  echo $noticeitem['linkurl'];?>" style="color: <?php  echo $diyitem['style']['color'];?>;" data-nocache="true"><?php  echo $noticeitem['title'];?></a></li>
                    <?php  } ?>
                <?php  } } ?>
            </ul>
        </div>
    </div>
<?php  } ?>
