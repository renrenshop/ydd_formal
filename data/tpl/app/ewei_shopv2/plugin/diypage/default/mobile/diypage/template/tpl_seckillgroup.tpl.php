<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_seckillgroup.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_diypage_template_mobile_default_template_tpl_seckillgroup.php');}?>
<?php  if(!empty($diyitem['data'])) { ?>
    <a class="seckill-group <?php  if($diyitem['style']['hideborder']==1) { ?>noborder<?php  } ?> <?php  if(count($diyitem['data']['goods'])>=4) { ?>swiper<?php  } ?> seckill-group-<?php  echo $diyitemid;?>"
         data-element=".seckill-group-<?php  echo $diyitemid;?>"
         data-view="auto" data-free="true"
         data-space="10"
         data-callback="seckill"
         style="display:block;margin-top: <?php  echo $diyitem['style']['margintop'];?>px; background-color: <?php  echo $diyitem['style']['background'];?>;"
         href="<?php  echo mobileUrl('seckill',array('taskid'=>$diyitem['params']['taskid']))?>"
         data-nocache="true"
    >
        <div class="seckill-title">
            <div class="seckill-text">
                <?php  if(!empty($diyitem['params']['iconurl'])) { ?>
                    <img src="<?php  echo tomedia($diyitem['params']['iconurl'])?>" />
                <?php  } else { ?>
                     <span class="title" style="color:red"><?php  echo $diyitem['data']['tag'];?></span>
                <?php  } ?>
                <span class="title" style="color: <?php  echo $diyitem['style']['titlecolor'];?>;"><?php  echo $diyitem['data']['time'];?>点场 </span>
                <div class="killtime" style="color: <?php  echo $diyitem['style']['timecolor'];?>;" data-toggle="timer" data-status="<?php  echo $diyitem['data']['status'];?>" data-timer="<?php  echo $diyitem['data']['endtime'];?>|.time-hour|.time-min|.time-sec|<?php  echo $diyitem['data']['starttime'];?>">
                    <?php  if($diyitem['data']['status']==0) { ?>
                    距结束
                    <?php  } else if($diyitem['data']['status']==1) { ?>
                    距开始
                    <?php  } else { ?>
                     <?php  } ?>
                    <span class="item time-hour" >--</span>
                    <span >:</span>
                    <span class="item time-min" >--</span>
                    <span>:</span>
                    <span class="item time-sec">--</span>
                </div>
            </div>
            <div class="seckill-remark"  style="color: <?php  echo $diyitem['style']['morecolor'];?>;">更多</div>
        </div>
        <div class="seckill-goods swiper-container">
            <div class="swiper-wrapper">
                <?php  if(is_array($diyitem['data']['goods'])) { foreach($diyitem['data']['goods'] as $g) { ?>
                <div class="item swiper-slide" <?php  if(count($diyitem['data']['goods'])<6) { ?>style='margin-right:.5rem'<?php  } ?>>
                    <div class="thumb">
                        <img src="<?php  echo $g['thumb'];?>" />
                        <!--<div class="tag">热卖</div>-->
                    </div>
                    <div class="marketprice" style="color: <?php  echo $diyitem['style']['marketpricecolor'];?>;">&yen;<?php  echo $g['price'];?></div>
                    <div class="productprice" style="color: <?php  echo $diyitem['style']['productpricecolor'];?>;">&yen;<?php  echo $g['marketprice'];?></div>
                </div>
                <?php  } } ?>
                <?php  if(count($diyitem['data']['goods'])>=4) { ?>
                <div class="item last-item swiper-slide">
                    <i class="icon icon-left"></i>
                    <div class="inner">
                        <p>查</p>
                        <p>看</p>
                        <p>更</p>
                        <p>多</p>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>
    </a>
<?php  } ?>
