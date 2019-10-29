<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_goods_detail.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_goods_detail.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .fui-cell-group{width:100%;}
    .fullback-title{color:#999999;font-size:0.7rem;padding:0.75rem 0 0.5rem 0;}
    .fullback-info{}
    .fullback-info p{height:1rem;line-height: 1rem;font-size:0.625rem;color:#333;display: inline-block;padding:0 0.5rem 0 0;}
    .fullback-info p i{border:none;height:0.75rem;width:0.75rem;display: inline-block;background: #ff4753;color:#fff;font-size:0.4rem;line-height: 0.8rem;text-align: center;
        font-style: normal;border-radius: 0.75rem;-webkit-border-radius: 0.75rem;margin-right:0.25rem;}
    .fullback-remark{line-height: 1rem;font-size:0.6rem;color:#666;padding:0.2rem 0;}
</style>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon.css?v=2.0.0">
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon-new.css?v=2017030302">
<link rel="stylesheet" href="../addons/ewei_shopv2/static/js/dist/swiper/swiper.min.css">
<div class='fui-page fui-page-current  page-goods-detail' id='page-goods-detail-index'>
    <?php  $this->followBar()?>

    <?php  if(empty($err)) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back" id="btn-back"></a>
        </div>
        <div class="title">
            <?php  if($new_temp) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_0']?>
            <?php  } else { ?>
            <div id="tab" class="fui-tab fui-tab-danger">
                <a data-tab="tab1" class="tab active"><?php  echo $lang['lang_template_mobile_goods_detail_1']?></a>
                <a data-tab="tab2" class="tab"><?php  echo $lang['lang_template_mobile_goods_detail_2']?></a>
                <?php  if(count($params)>0) { ?>
                <a data-tab="tab3" class="tab"><?php  echo $lang['lang_template_mobile_goods_detail_3']?></a>
                <?php  } ?>
                <?php  if($getComments) { ?>
                <a  data-tab="tab4" class="tab" style="display:none" id="tabcomment"><?php  echo $lang['lang_template_mobile_goods_detail_4']?></a>
                <?php  } ?>
            </div>
            <?php  } ?>
        </div>
        <div class="fui-header-right"></div>
    </div>
    <?php  } else { ?>
    <div class="fui-header ">
        <div class="fui-header-left">
            <a class="back" id="btn-back"></a>
        </div>
        <div class="title">
            <?php  echo $lang['lang_template_mobile_goods_detail_5']?>
        </div>
    </div>
    <?php  } ?>

    <?php  if(empty($err)) { ?>


    <?php  if(count($params)>0) { ?>
    <div class="fui-content param-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>">
        <div class="fui-cell-group">
            <?php  if(!empty($params)) { ?>
            <?php  if(is_array($params)) { foreach($params as $p) { ?>
            <div class="fui-cell">
                <div class="fui-cell-label" ><?php  echo $p['title'];?></div>
                <div class="fui-cell-info overflow"><?php  echo $p['value'];?></div>
            </div>
            <?php  } } ?>

            <?php  } else { ?>
            <div class="fui-cell">
                <div class="fui-cell-info text-align"><?php  echo $lang['lang_template_mobile_goods_detail_6']?></div>
            </div>
            <?php  } ?>
        </div>
    </div>
    <?php  } ?>

    <?php  if(!$new_temp) { ?>
    <div class='fui-content comment-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>' data-getcount='1' id='comments-list-container'>
    <div class='fui-icon-group col-5 '>
        <div class='fui-icon-col' data-level='all'><span class='text-danger'><?php  echo $lang['lang_template_mobile_goods_detail_7']?><br/><span class="count"></span></span></div>
        <div class='fui-icon-col' data-level='good'><span><?php  echo $lang['lang_template_mobile_goods_detail_8']?><br/><span class="count"></span></span></div>
        <div class='fui-icon-col' data-level='normal'><span><?php  echo $lang['lang_template_mobile_goods_detail_9']?><br/><span class="count"></span></span></div>
        <div class='fui-icon-col' data-level='bad'><span><?php  echo $lang['lang_template_mobile_goods_detail_10']?><br/><span class="count"></span></span></div>
        <div class='fui-icon-col' data-level='pic'><span><?php  echo $lang['lang_template_mobile_goods_detail_11']?><br/><span class="count"></span></span></div>
    </div>
    <div class='content-empty' style='display:none;'>
        <i class='icon icon-community'></i><br/><?php  echo $lang['lang_template_mobile_goods_detail_12']?>
    </div>
    <div class='container' id="comments-all"></div>
    <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> <?php  echo $lang['lang_template_mobile_goods_detail_13']?>...</span></div>
</div>
<div class="fui-content detail-block  <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>">
    <div class="text-danger look-basic"><i class='icon icon-unfold'></i> <span><?php  echo $lang['lang_template_mobile_goods_detail_14']?></span></div>
    <div class='content-block content-images'></div>
</div>
<?php  } ?>

<div class='fui-content basic-block pulldown <?php  if(!$goods['canbuy']) { ?>notbuy<?php  } ?>'>


<?php  if(!empty($err)) { ?>
<div class='content-empty'>
    <i class='icon icon-search'></i><br/> <?php  echo $lang['lang_template_mobile_goods_detail_15']?>~ <?php  echo $lang['lang_template_mobile_goods_detail_16']?> ~<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'><?php  echo $lang['lang_template_mobile_goods_detail_17']?></a>
</div>
<?php  } else { ?>
<?php  if($commission_data['qrcodeshare'] > 0) { ?>
<i class="icon icon-qrcode" id="alert-click"></i>
<?php  } ?>
<div class='fui-swipe goods-swipe'>
    <div class='fui-swipe-wrapper'>
        <?php  if(is_array($thumbs)) { foreach($thumbs as $thumb) { ?>
        <div class='fui-swipe-item'><img src="<?php echo EWEI_SHOPV2_PLACEHOLDER;?>"  data-lazy="<?php  echo tomedia($thumb)?>" /></div>
        <?php  } } ?>
    </div>
    <div class='fui-swipe-page'></div>
    <?php  if($goods['total']<=0 && !empty($_W['shopset']['shop']['saleout'])) { ?>
    <div class="salez">
        <img src="<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>">
    </div>
    <?php  } ?>
</div>

<?php  if(!empty($seckillinfo)) { ?>
<div class="seckill-container <?php  if($seckillinfo['status']==1) { ?>notstart<?php  } ?>"
     data-starttime="<?php  echo $seckillinfo['starttime']-time();?>"
     data-endtime="<?php  echo $seckillinfo['endtime']-time();?>"
     data-status="<?php  echo $seckillinfo['status'];?>">
    <div class="fui-list seckill-list" style="" >
        <div class="fui-list-media seckill-price">
            RM<span><?php  echo $seckillinfo['price'];?></span>
        </div>
        <div class="fui-list-inner">
            <div class="text"><span class="stitle" style="white-space:nowrap; overflow:hidden; max-width:2.6rem;"><?php  echo $seckillinfo['tag'];?></span></div>
            <div class="text"><span class="oldprice">RM<?php  echo $goods['minprice'];?></span></div>
        </div>
    </div>
    <div class="fui-list seckill-list1" >
        <div class="fui-list-inner">
            <div class="text "><?php  if($seckillinfo['status']==0) { ?><?php  echo $lang['lang_template_mobile_goods_detail_18']?> <?php  echo $seckillinfo['percent'];?>%<?php  } ?></div>
            <div class="text "><?php  if($seckillinfo['status']==0) { ?><span class="process"><div class="inner" style="width:<?php  echo $seckillinfo['percent'];?>%"></div></span><?php  } ?></div>
        </div>
    </div>
    <div class="fui-list seckill-list2" style="" >
        <div class="fui-list-inner">
            <div class="text "><?php  echo $lang['lang_template_mobile_goods_detail_19']?><?php  if($seckillinfo['status']==1) { ?><?php  echo $lang['lang_template_mobile_goods_detail_20']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_goods_detail_21']?><?php  } ?><?php  echo $lang['lang_template_mobile_goods_detail_22']?></div>
            <div class="text timer">
                <span class="time-hour">-</span>&nbsp;:&nbsp;<span class="time-min">-</span>&nbsp;:&nbsp;<span class="time-sec">-</span>
            </div>
        </div>
    </div>
</div>
<?php  } ?>


<div class="fui-cell-group fui-detail-group" >
    <div class="fui-cell">
        <div class="fui-cell-text name ">
            <?php  if($ispresell==1) { ?><i class="fui-tag fui-tag-danger"><?php  echo $lang['lang_template_mobile_goods_detail_23']?></i><?php  } ?>
            <?php  echo $goods['title'];?>
        </div>
        <?php  if(empty($share['goods_detail_close'])) { ?>
        <a class="fui-cell-remark share"  <?php  if(!empty($goods['sharebtn']) && $member['isagent']==1 && $member['status']==1) { ?> href="<?php  echo mobileUrl('commission/qrcode', array('goodsid'=>$goods['id']))?>" <?php  } else { ?> id='btn-share' <?php  } ?>>
        <i class="icon icon-share"></i>
        <p><?php  echo $lang['lang_template_mobile_goods_detail_24']?></p>
        </a>
        <?php  } ?>
    </div>
    <?php  if(!empty($goods['subtitle'])) { ?>
    <div class="fui-cell goods-subtitle">
        <span class='text-danger'><?php  echo $goods['subtitle'];?></span>
    </div>
    <?php  } ?>

    <?php  if($goods['type']==4) { ?>
    <?php  echo $lang['lang_template_mobile_goods_detail_25']?>
    <div class="fui-cell goods-bulk">
        <div class="fui-cell-text  flex">
            <?php  if($goods['intervalfloor']>0) { ?>
                <span>
                    <p class="price"><small><?php  echo $lang['lang_template_mobile_goods_detail_26']?></small><?php  echo $goods['intervalprice1'];?></p>
                    <p><?php  echo $goods['intervalnum1'];?> <?php  if($goods['intervalfloor']>1) { ?>-<?php  echo intval($goods['intervalnum2'])-1?><?php  echo $lang['lang_template_mobile_goods_detail_27']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_goods_detail_28']?><?php  } ?></p>
                </span>
            <?php  } ?>
            <?php  if($goods['intervalfloor']>1) { ?>
                <span>
                    <p class="price"><small><?php  echo $lang['lang_template_mobile_goods_detail_29']?></small><?php  echo $goods['intervalprice2'];?></p>
                    <p><?php  echo $goods['intervalnum2'];?><?php  if($goods['intervalfloor']>2) { ?>-<?php  echo intval($goods['intervalnum3'])-1?><?php  echo $lang['lang_template_mobile_goods_detail_30']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_goods_detail_31']?><?php  } ?></p>
                </span>
            <?php  } ?>
            <?php  if($goods['intervalfloor']>2) { ?>
                <span>
                    <p class="price"><small><?php  echo $lang['lang_template_mobile_goods_detail_32']?></small><?php  echo $goods['intervalprice3'];?></p>
                    <p>><?php  echo $goods['intervalnum3'];?><?php  echo $lang['lang_template_mobile_goods_detail_33']?></p>
                </span>
            <?php  } ?>
        </div>
    </div>
    <?php  } ?>
    <?php  if(empty($seckillinfo)&&$goods['type']!=4) { ?>
    <div class="fui-cell">
        <div class="fui-cell-text price">
			<span class="text-danger">
                <?php  if(!empty($taskGoodsInfo)) { ?>
                    <?php  echo $lang['lang_template_mobile_goods_detail_34']?><?php  echo $taskGoodsInfo['price'];?>
                <?php  } else if($threen &&(!empty($threenprice['price'])||!empty($threenprice['discount']))) { ?>
                    <?php  if(!empty($threenprice['price'])) { ?>
                        <?php  echo $threenprice['price'];?>
                    <?php  } else if(!empty($threenprice['discount'])) { ?>
                        <?php  echo $threenprice['discount']*$goods['minprice'];?>
                    <?php  } ?>
                <?php  } else { ?>
                <?php  echo $lang['lang_template_mobile_goods_detail_35']?><?php  if($goods['ispresell']>0 && ($goods['preselltimeend'] == 0 || $goods['preselltimeend'] > time())) { ?>
                        <?php  echo $goods['presellprice'];?>
                    <?php  } else { ?>
                        <?php  if($goods['minprice']==$goods['maxprice']) { ?>
                            <?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?>
                        <?php  } ?>
                    <?php  } ?>
                    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
                         <span class="original"><?php  echo $lang['lang_template_mobile_goods_detail_36']?><?php  echo $goods['productprice'];?></span>
                    <?php  } else { ?>
                        <?php  if($goods['productprice']>0) { ?>
                            <span  class="original"><?php  echo $lang['lang_template_mobile_goods_detail_37']?><?php  echo $goods['productprice'];?></span>
                        <?php  } ?>
                    <?php  } ?>
                <?php  } ?>
			</span>
        </div>
    </div>


    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
    <div class="row row-time">
        <div id='discount-container' class='fui-labeltext fui-labeltext-danger'
             data-now="<?php  echo date('Y-m-d H:i:s')?>"
             data-end="<?php  echo date('Y-m-d H:i:s', $goods['isdiscount_time'])?>"
             data-end-label='<?php echo empty($goods['isdiscount_title'])?$lang['lang_template_mobile_goods_detail_38']:$goods['isdiscount_title']?>' >
        <div class='label'><?php echo empty($goods['isdiscount_title'])?$lang['lang_template_mobile_goods_detail_39']:$goods['isdiscount_title']?></div>
        <div class='text'>
            <span class="day number text-danger" >-</span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_40']?></span>
            <span class="hour number text-danger">-</span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_41']?></span>
            <span class="minute number text-danger">-</span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_42']?></span>
            <span class="second number text-danger">-</span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_43']?></span>
        </div>
    </div>

</div>
<?php  } ?>

<?php  if($goods['istime']) { ?>
<div class="row row-time">
    <div id='time-container' class='fui-labeltext fui-labeltext-danger'
         data-now="<?php  echo date('Y-m-d H:i:s')?>"
         data-start-label='<?php  echo $lang['lang_template_mobile_goods_detail_44']?>'
         data-end-label='<?php  echo $lang['lang_template_mobile_goods_detail_45']?>'
         data-end-text='<?php  echo $lang['lang_template_mobile_goods_detail_46']?>~'
         data-start="<?php  echo date('Y-m-d H:i:s', $goods['timestart'])?>"
         data-end="<?php  echo date('Y-m-d H:i:s', $goods['timeend'])?>"
    >
        <div class='label'><?php  echo $lang['lang_template_mobile_goods_detail_47']?></div>
        <div class='text'>
            <span class="day number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_48']?></span><span class="hour number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_49']?></span><span class="minute number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_50']?></span><span class="second number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_51']?></span>
        </div>
    </div>
</div>
<?php  } ?>
<?php  } ?>

<?php  if($goods['ispresell']==1 && ($goods['preselltimestart'] > time() || $goods['preselltimeend'] > time())) { ?>
<div class="row row-time">
    <div id='time-presell' class='fui-labeltext fui-labeltext-danger'
         data-now="<?php  echo date('Y-m-d H:i:s')?>"
         data-start-label='<?php  echo $lang['lang_template_mobile_goods_detail_52']?>'
         data-end-label='<?php  echo $lang['lang_template_mobile_goods_detail_53']?>'
         data-end-text='<?php  echo $lang['lang_template_mobile_goods_detail_54']?>~'
         data-start="<?php  echo date('Y-m-d H:i:s', $goods['preselltimestart'])?>"
         data-end="<?php  echo date('Y-m-d H:i:s', $goods['preselltimeend'])?>">
        <div class='label'><?php  echo $lang['lang_template_mobile_goods_detail_55']?></div>
        <div class='text'>
            <span class="day number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_56']?></span><span class="hour number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_57']?></span><span class="minute number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_58']?></span><span class="second number"></span><span class="time"><?php  echo $lang['lang_template_mobile_goods_detail_59']?></span>
        </div>
    </div>
</div>
<?php  } ?>
<div class="fui-cell">
    <div class="fui-cell-text flex">
        <?php  if(is_array($goods['dispatchprice'])) { ?>

        <?php  if($goods['type']==1 && $goods['isverify']!=2) { ?>
        <span><?php  echo $lang['lang_template_mobile_goods_detail_60']?>:  <?php  echo number_format($goods['dispatchprice']['min'],2)?> ~ <?php  echo number_format($goods['dispatchprice']['max'],2)?></span>
        <?php  } ?>

        <?php  } else { ?>

        <?php  if($goods['type']==1 && $goods['isverify']!=2) { ?>
        <span><?php  echo $lang['lang_template_mobile_goods_detail_61']?>:  <?php echo $goods['dispatchprice'] == 0 ? $lang['lang_template_mobile_goods_detail_62']: number_format($goods['dispatchprice'],2)?></span>
        <?php  } ?>

        <?php  } ?>
        <?php  if($seckillinfo==false || ( $seckillinfo && $seckillinfo.status==1)) { ?>
        <?php  if($goods['showtotal'] == 1) { ?>
        <span><?php  echo $lang['lang_template_mobile_goods_detail_63']?>:  <?php  echo $goods['total'];?></span>
        <?php  } ?>

        <?php  if($goods['showsales'] == 1) { ?>
        <span><?php  echo $lang['lang_template_mobile_goods_detail_64']?>:  <?php  echo number_format($goods['sales'],0)?> <?php  echo $goods['unit'];?></span>
        <?php  } ?>

        <?php  } else { ?>
        <span></span>
        <span></span>
        <?php  } ?>


        <?php  if($goods['province'] != $lang['lang_template_mobile_goods_detail_65'] && $goods['city'] != $lang['lang_template_mobile_goods_detail_66']) { ?>
        <span><?php  echo $goods['province'];?> <?php  echo $goods['city'];?></span>
        <?php  } ?>
    </div>
</div>
</div>
<?php  if($goods['ispresell']==1 && ( $goods['preselltimeend'] > time() ||  $goods['preselltimeend'] == 0)) { ?>
<div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0'>
    <div class="fui-list">
        <div class="fui-list-media">
            <div class='fui-cell-text'>
                <span class="fui-label fui-label-safety"><?php  echo $lang['lang_template_mobile_goods_detail_67']?></span>
            </div>
        </div>
        <div class="fui-list-inner" style="font-size:0.65rem;color:#666;">
            <?php  if($goods['preselltimeend'] > 0) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_68']?><?php  echo date('m'.$lang['lang_template_mobile_goods_detail_69'].'d'. $lang['lang_template_mobile_goods_detail_70'].' H:i:s', $goods['preselltimeend'])?><br />
            <?php  } ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_71']?><?php  if($goods['presellsendtype']>0) { ?><?php  echo $lang['lang_template_mobile_goods_detail_72']?><?php  echo $goods['presellsendtime'];?><?php  echo $lang['lang_template_mobile_goods_detail_73']?><?php  } else { ?><?php  echo date('m'. $lang['lang_template_mobile_goods_detail_74'].'d'. $lang['lang_template_mobile_goods_detail_75'], $goods['presellsendstatrttime'])?><?php  } ?>
        </div>
    </div>
</div>
<?php  } ?>

<?php  if(com('coupon')&&$coupons) { ?>
<div class="fui-cell-group fui-cell-click">
    <div class="fui-cell">
        <div class="fui-cell-text coupon-selector"><?php  echo $lang['lang_template_mobile_goods_detail_76']?></div>
        <div class="fui-cell-remark"></div>
    </div>
</div>
<?php  } ?>


<?php  if(empty($seckillinfo)) { ?>
<?php  if(floatval($goods['buyagain'])>0) { ?>
<div class="fui-cell-group  fui-sale-group" style="margin-top:0">
    <div class="fui-cell">
        <div class="fui-cell-text" style="white-space: normal;"><?php  echo $lang['lang_template_mobile_goods_detail_77']?> <?php  echo $lang['lang_template_mobile_goods_detail_78']?> <span class="text-danger"><?php  echo $goods['buyagain'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_79']?>
            <?php  if(empty($goods['buyagain_sale'])) { ?>
            <br><?php  echo $lang['lang_template_mobile_goods_detail_80']?> <?php  echo $lang['lang_template_mobile_goods_detail_81']?>
            <?php  } ?>
        </div>
    </div>
</div>
<?php  } ?>

<?php  if(empty($goods['isdiscount']) || (!empty($goods['isdiscount']) &&$goods['isdiscount_time']<time())) { ?>
<?php  if(!empty($memberprice) && $memberprice!=$goods['minprice'] && !empty($level)) { ?>
<div class="fui-cell-group  fui-sale-group" style="margin-top:0">
    <div class="fui-cell">
        <div class="fui-cell-text" style="white-space: normal;"><?php  echo $lang['lang_template_mobile_goods_detail_82']?> <span class="text-danger"><?php  echo $level['levelname'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_83']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_84']?><?php  echo $memberprice;?></span> <?php  echo $lang['lang_template_mobile_goods_detail_85']?></div>
    </div>
</div>
<?php  } ?>
<?php  } ?>

<?php  } ?>
<?php  if(!empty($fullbackgoods) && $isfullback) { ?>
<div class="fui-cell-group  fui-sale-group" id="fullback-picker" style="margin-top:0;background: #fcecec;font-size:1.5rem;border:none;">
    <div class="fui-cell">
        <div class="fui-cell-text" style="white-space: normal;color:#ff5555;">
            <?php  echo $lang['lang_template_mobile_goods_detail_86']?>
            <?php  if($fullbackgoods['type']>0) { ?>
                <span class="text-danger" style="font-weight: bold;">
                    <?php  if($goods['hasoption'] > 0) { ?>
                        <?php  if($fullbackgoods['minallfullbackallprice'] == $fullbackgoods['maxallfullbackallprice']) { ?>
                            <?php  echo $fullbackgoods['minallfullbackallratio'];?>%
                        <?php  } else { ?>
                            <?php  echo $fullbackgoods['minallfullbackallratio'];?>% ~ <?php  echo $fullbackgoods['maxallfullbackallratio'];?>%
                        <?php  } ?>
                    <?php  } else { ?>
                        <?php  echo $fullbackgoods['minallfullbackallratio'];?>%
                    <?php  } ?>
                </span>
            <?php  } else { ?>
                <span class="text-danger" style="font-weight: bold;">
                    <?php  if($goods['hasoption'] > 0) { ?>
                        <?php  if($fullbackgoods['minallfullbackallprice'] == $fullbackgoods['maxallfullbackallprice']) { ?>
                            RM<?php  echo $fullbackgoods['minallfullbackallprice'];?>
                        <?php  } else { ?>
                            RM<?php  echo $fullbackgoods['minallfullbackallprice'];?> ~ RM<?php  echo $fullbackgoods['maxallfullbackallprice'];?>
                        <?php  } ?>
                    <?php  } else { ?>
                    RM<?php  echo $fullbackgoods['minallfullbackallprice'];?>
                    <?php  } ?>
                </span>
            <?php  } ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_87']?>
        </div>
        <div class='fui-cell-remark'></div>
    </div>
</div>
<?php  } ?>

<?php  if((!empty($goods['deduct']) && $goods['deduct'] != '0.00')  || !empty($goods['credit'])) { ?>
<div class='fui-cell-group  fui-sale-group' style='margin-top:0'>
    <div class='fui-cell'>
        <div class='fui-cell-text'><?php  echo $_W['shopset']['trade']['credittext'];?> <?php  if(!empty($goods['deduct']) && $goods['deduct'] != '0.00') { ?><?php  echo $lang['lang_template_mobile_goods_detail_88']?> <span class="text-danger"><?php  echo $goods['deduct'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_89']?><?php  } ?> <?php  if(!empty($goods['credit'])) { ?><?php  echo $lang['lang_template_mobile_goods_detail_90']?> <span class="text-danger"><?php  echo $goods['credit'];?></span> <?php  echo $_W['shopset']['trade']['credittext'];?><?php  } ?></div>
    </div>
</div>
<?php  } ?>

<?php  if($has_city) { ?>
<div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0' id="city-picker">
    <div class='fui-cell'>
        <div class='fui-cell-text'><?php  if(empty($onlysent)) { ?><?php  echo $lang['lang_template_mobile_goods_detail_91']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_goods_detail_92']?><?php  } ?><?php  echo $lang['lang_template_mobile_goods_detail_93']?>:
            <?php  if(is_array($citys)) { foreach($citys as $item) { ?>
            <?php  echo $item;?>
            <?php  } } ?>
        </div>

        <div class='fui-cell-remark'></div>
    </div>
</div>
<?php  } ?>

<?php  if($gifts && $goods['total'] > 0) { ?>
<div class='fui-cell-group fui-sale-group' style='margin-top:0'>
    <div class='fui-cell'>
        <?php  if(count($gifts)>1) { ?>
        <div class='fui-cell-text fui-cell-giftclick'>
            <?php  echo $lang['lang_template_mobile_goods_detail_94']?>: <label id="gifttitle"><?php  echo $lang['lang_template_mobile_goods_detail_95']?></label>
            <input type="hidden" name="giftid" id="giftid" value="">
        </div>
        <?php  } else { ?>
        <?php  if(is_array($gifts)) { foreach($gifts as $item) { ?>
        <div class='fui-cell-text' onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/gift',array('id'=>$item['id']))?>'">
            <?php  echo $lang['lang_template_mobile_goods_detail_96']?>:<?php  echo $gifttitle;?><input type="hidden" name="giftid" id="giftid" value="<?php  echo $item['id'];?>">
        </div>
        <?php  } } ?>
        <?php  } ?>
        <div class='fui-cell-remark'></div>
    </div>
</div>
<?php  } ?>

<?php  if($hasSales && empty($seckillinfo)) { ?>

<div class='fui-cell-group fui-cell-click  fui-sale-group' style='margin-top:0' id="sale-picker">
    <div class='fui-cell'>
        <div class='fui-cell-text'><?php  echo $lang['lang_template_mobile_goods_detail_97']?>
            <?php  if(!is_array($goods['dispatchprice'])) { ?>
            <?php  if($goods['type']==1 && $goods['isverify']!=2) { ?>
            <?php  if($goods['dispatchprice']==0) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_98']?>
            <?php  } ?>
            <?php  } ?>
            <?php  } ?>

            <?php  if($enoughfree && $enoughfree==-1) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_99']?>
            <?php  } else { ?>
            <?php  if($goods['ednum']>0) { ?><?php  echo $lang['lang_template_mobile_goods_detail_100']?> <span class="text-danger"><?php  echo $goods['ednum'];?></span> <?php echo empty($goods['unit'])?$lang['lang_template_mobile_goods_detail_101']:$goods['unit']?><?php  echo $lang['lang_template_mobile_goods_detail_102']?><?php  } ?>
            <?php  if($goods['edmoney']>0) { ?><?php  echo $lang['lang_template_mobile_goods_detail_103']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_104']?><?php  echo $goods['edmoney'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_105']?><?php  } ?>
            <?php  if($enoughfree) { ?><?php  echo $lang['lang_template_mobile_goods_detail_106']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_107']?><?php  echo $enoughfree;?></span> <?php  echo $lang['lang_template_mobile_goods_detail_108']?><?php  } ?>
            <?php  } ?>
            <?php  if($enoughs && count($enoughs)>0) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_109']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_110']?><?php  echo $enoughs[0]['enough'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_111']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_112']?><?php  echo $enoughs[0]['money'];?></span>
            <?php  } ?>
        </div>

        <div class='fui-cell-remark'></div>
    </div>
</div>

<?php  } ?>

<?php  if($hasServices || $labelname) { ?>
<div class="fui-cell-group fui-option-group" style='margin-top:0'>

    <div class="goods-label-demo">
        <div class="goods-label-list
        <?php  if(empty($style['style'])) { ?>goods-label-style1
        <?php  } else if($style['style']==1) { ?>goods-label-style2
        <?php  } else if($style['style']==2) { ?>goods-label-style3
        <?php  } else if($style['style']==3) { ?>goods-label-style4
        <?php  } else if($style['style']==4) { ?>goods-label-style5<?php  } ?>">
            <?php  if($goods['cash']==2) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong><?php  echo $lang['lang_template_mobile_goods_detail_113']?></strong></span><?php  } ?>
            <?php  if($goods['quality']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong><?php  echo $lang['lang_template_mobile_goods_detail_114']?></strong></span><?php  } ?>
            <?php  if($goods['repair']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong><?php  echo $lang['lang_template_mobile_goods_detail_115']?></strong></span><?php  } ?>
            <?php  if($goods['invoice']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong><?php  echo $lang['lang_template_mobile_goods_detail_116']?></strong></span><?php  } ?>
            <?php  if($goods['seven']) { ?><span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong>7<?php  echo $lang['lang_template_mobile_goods_detail_117']?></strong></span><?php  } ?>
            <?php  if($labelname) { ?>
            <?php  if(is_array($labelname)) { foreach($labelname as $item) { ?>
            <span class="<?php  if($style['style']<2) { ?>cl-3 cl-4 cl-2<?php  } ?>"><i></i><strong><?php  echo $item;?></strong></span>
            <?php  } } ?>
            <?php  } ?>
            <div style="clear: both;"></div>
        </div>
    </div>


</div>
<?php  } ?>


<?php  if(!empty($stores)) { ?>
<script language='javascript' src='https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1'></script>
<div class='fui-according-group'>
    <div class='fui-according'>
        <div class='fui-according-header'>
            <i class='icon icon-shopfill'></i>
            <span class="text"><?php  echo $lang['lang_template_mobile_goods_detail_118']?></span>
            <span class="remark"><div class="badge"><?php  echo count($stores)?></div></span>
        </div>
        <div class="fui-according-content store-container">
            <?php  if(is_array($stores)) { foreach($stores as $item) { ?>
            <div  class="fui-list store-item"

                  data-lng="<?php  echo floatval($item['lng'])?>"
                  data-lat="<?php  echo floatval($item['lat'])?>">
                <div class="fui-list-media">
                    <i class='icon icon-shopfill'></i>
                </div>
                <div class="fui-list-inner store-inner">
                    <div class="title"><span class='storename'><?php  echo $item['storename'];?></span></div>
                    <div class="text">
                        <?php  echo $lang['lang_template_mobile_goods_detail_119']?>: <span class='realname'><?php  echo $item['address'];?></span>
                    </div>
                    <div class="text">
                        <?php  echo $lang['lang_template_mobile_goods_detail_120']?>: <span class='address'><?php  echo $item['tel'];?></span>
                    </div>
                </div>
                <div class="fui-list-angle ">
                    <?php  if(!empty($item['tel'])) { ?><a href="tel:<?php  echo $item['tel'];?>" class='external '><i class=' icon icon-phone' style='color:green'></i></a><?php  } ?>
                    <a href="<?php  echo mobileUrl('store/map',array('id'=>$item['id'],'merchid'=>$item['merchid']))?>" class='external' ><i class='icon icon-location' style='color:#f90'></i></a>
                </div>
            </div>
            <?php  } } ?>
        </div>

        <div id="nearStore" style="display:none">

            <div class='fui-list store-item'  id='nearStoreHtml'></div>
        </div>
    </div></div>
<?php  } ?>
<?php  if($goods['canbuy']) { ?>
    <?php  if($goods['type']!=4) { ?>
    <div class="fui-cell-group fui-cell-click">
        <div class="fui-cell">
            <div class="fui-cell-text option-selector"><?php  echo $lang['lang_template_mobile_goods_detail_121']?><?php  if(empty($spec_titles)) { ?><?php  echo $lang['lang_template_mobile_goods_detail_122']?><?php  } else { ?><?php  echo $spec_titles;?><?php  echo $lang['lang_template_mobile_goods_detail_123']?><?php  } ?></div>
            <div class="fui-cell-remark"></div>
        </div>
    </div>
    <?php  } ?>
<?php  } else { ?>
<div class="fui-cell-group fui-cell-click">
    <div class="fui-cell">
        <div class="fui-cell-text">
            <?php  if($goods['userbuy']==0) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_124']?><?php  echo $goods['usermaxbuy'];?><?php  echo $lang['lang_template_mobile_goods_detail_125']?>
            <?php  } else if($goods['levelbuy']==0) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_126']?>
            <?php  } else if($goods['groupbuy']==0) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_127']?>
            <?php  } else if($goods['timebuy'] ==-1) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_128']?>!
            <?php  } else if($goods['timebuy'] ==1) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_129']?>!
            <?php  } else if($goods['total'] <=0) { ?>
            <?php  echo $lang['lang_template_mobile_goods_detail_130']?>!
            <?php  } ?></div>
    </div>
</div>

<?php  } ?>
<?php  if($packages && $goods['total'] > 0) { ?>
<?php  if(count($packages)<=3) { ?>
<style>
    .package-goods{padding:0.2rem 1rem;}
</style>
<div class="fui-cell-group fui-comment-group">
    <div class="fui-cell fui-cell-click">
        <div class="fui-cell-text desc"><?php  echo $lang['lang_template_mobile_goods_detail_131']?></div>
        <div class="fui-cell-text desc label" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package',array('goodsid'=>$goods['id']))?>'"><?php  echo $lang['lang_template_mobile_goods_detail_132']?></div>
        <div class="fui-cell-remark"></div>
    </div>
    <div class="fui-cell">
        <div class="fui-cell-text comment ">
            <div class="fui-list package-list">
                <?php  if(is_array($packages)) { foreach($packages as $item) { ?>
                <div class="fui-list-inner package-goods" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package/detail',array('pid'=>$package_goods['pid']))?>'">
                    <img src="<?php  echo tomedia($item['thumb'])?>" class="package-goods-img" alt="<?php  echo $item['title'];?>">
                    <span><?php  echo $item['title'];?></span>
                </div>
                <?php  } } ?>
            </div>
        </div>
    </div>
</div>
<?php  } else { ?>
<div class="fui-cell-group fui-comment-group">
    <div class="fui-cell fui-cell-click">
        <div class="fui-cell-text desc"><?php  echo $lang['lang_template_mobile_goods_detail_133']?></div>
        <div class="fui-cell-text desc label" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package',array('goodsid'=>$goods['id']))?>'"><?php  echo $lang['lang_template_mobile_goods_detail_134']?></div>
        <div class="fui-cell-remark"></div>
    </div>
    <div id="product" class="fui-list">
        <span class="prev fui-list-media"><i class="icon icon-left"></i></span>
        <div id="content" class="fui-list-inner">
            <div id="content_list" onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/package/detail',array('pid'=>$package_goods['pid']))?>'">
                <?php  if(is_array($packages)) { foreach($packages as $item) { ?>
                <dl class="package-goods package-goods3">
                    <dt><img class="package-goods-img" src="<?php  echo tomedia($item['thumb'])?>"/></dt>
                    <dd><?php  echo $item['title'];?></dd>
                </dl>
                <?php  } } ?>
            </div>
        </div>
        <span class="next fui-list-media"><i class="icon icon-right1"></i></span>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var page = 1;
        var i = 3; //<?php  echo $lang['lang_template_mobile_goods_detail_135']?>4<?php  echo $lang['lang_template_mobile_goods_detail_136']?>
        //<?php  echo $lang['lang_template_mobile_goods_detail_137']?> <?php  echo $lang['lang_template_mobile_goods_detail_138']?>
        $("span.next").click(function(){    //<?php  echo $lang['lang_template_mobile_goods_detail_139']?>click<?php  echo $lang['lang_template_mobile_goods_detail_140']?>
            var content = $("div#content");
            var content_list = $("div#content_list");
            var v_width = content.width();
            var len = content.find("dl").length;
            var page_count = Math.ceil(len / i) ;   //<?php  echo $lang['lang_template_mobile_goods_detail_141']?>
            if( !content_list.is(":animated") ){    //<?php  echo $lang['lang_template_mobile_goods_detail_142']?>
                if( page == page_count ){  //<?php  echo $lang['lang_template_mobile_goods_detail_143']?>,<?php  echo $lang['lang_template_mobile_goods_detail_144']?>
                    content_list.animate({ left : '0px'}, "slow"); //<?php  echo $lang['lang_template_mobile_goods_detail_145']?>left<?php  echo $lang['lang_template_mobile_goods_detail_146']?>
                    page = 1;
                }else{
                    content_list.animate({ left : '-='+v_width }, "slow");  //<?php  echo $lang['lang_template_mobile_goods_detail_147']?>left<?php  echo $lang['lang_template_mobile_goods_detail_148']?>
                    page++;
                }
            }
        });
        //<?php  echo $lang['lang_template_mobile_goods_detail_149']?> <?php  echo $lang['lang_template_mobile_goods_detail_150']?>
        $("span.prev").click(function(){
            var content = $("div#content");
            var content_list = $("div#content_list");
            var v_width = content.width();
            var len = content.find("dl").length;
            var page_count = Math.ceil(len / i) ;   //<?php  echo $lang['lang_template_mobile_goods_detail_151']?>
            if(!content_list.is(":animated") ){    //<?php  echo $lang['lang_template_mobile_goods_detail_152']?>
                if(page == 1 ){  //<?php  echo $lang['lang_template_mobile_goods_detail_153']?>,<?php  echo $lang['lang_template_mobile_goods_detail_154']?>
                    content_list.animate({ left : '-='+v_width*(page_count-1) }, "slow");
                    page = page_count;
                }else{
                    content_list.animate({ left : '+='+v_width }, "slow");
                    page--;
                }
            }
        });
    });
</script>
<?php  } ?>

<script type="text/javascript">
    $(function(){
        $(".package-goods-img").height($(".package-goods-img").width());
    })
</script>
<?php  } ?>

<div id='comments-container'></div>

<div class="fui-cell-group fui-shop-group">
    <div class='fui-list'>
        <div class='fui-list-media'>
            <img data-lazy="<?php  echo tomedia($shopdetail['logo'])?>" />
        </div>
        <div class='fui-list-inner'>
            <div class='title'><?php  echo $shopdetail['shopname'];?></div>
            <div class='subtitle'><?php  echo $shopdetail['description'];?></div>
        </div>
    </div>

    <div class="fui-cell">
        <div class="fui-cell-text center"><?php  echo $statics['all'];?><p><?php  echo $lang['lang_template_mobile_goods_detail_155']?></p></div>
        <div class="fui-cell-text center"><?php  echo $statics['new'];?><p><?php  echo $lang['lang_template_mobile_goods_detail_156']?></p></div>
        <div class="fui-cell-text center"><?php  echo $statics['discount'];?><p><?php  echo $lang['lang_template_mobile_goods_detail_157']?></p></div>
    </div>
    <div class="fui-cell btns">
        <div class="fui-cell-text center">
            <a class="btn btn-default-o external" href="<?php  echo $shopdetail['btnurl1'];?>"><?php  if(!empty($shopdetail['btntext1'])) { ?><?php  echo $shopdetail['btntext1'];?><?php  } else { ?><?php  echo $lang['lang_template_mobile_goods_detail_158']?><?php  } ?></a>
            <a class="btn btn-default-o external" href="<?php  echo $shopdetail['btnurl2'];?>"><?php  if(!empty($shopdetail['btntext2'])) { ?><?php  echo $shopdetail['btntext2'];?><?php  } else { ?><?php  echo $lang['lang_template_mobile_goods_detail_159']?><?php  } ?></a>
        </div>
    </div>
</div>

<?php  if($buyshow==1 && !empty($goods['buycontent'])) { ?>
<div class="fui-cell-group">
    <div class="fui-cell">
        <div class="content-block"><?php  echo $goods['buycontent'];?></div>
    </div>
</div>
<?php  } ?>


<?php  if($new_temp) { ?>
<?php  if(count($params)>0 || $showComments) { ?>
<div class="fui-tab fui-tab-danger detail-tab" id="tabnew">
    <a data-tab="tab2" class="active"><?php  echo $lang['lang_template_mobile_goods_detail_160']?></a>
    <?php  if(count($params)>0) { ?>
    <a data-tab="tab3"><?php  echo $lang['lang_template_mobile_goods_detail_161']?></a>
    <?php  } ?>
    <?php  if($showComments) { ?>
    <a data-tab="tab4"><?php  echo $lang['lang_template_mobile_goods_detail_162']?></a>
    <?php  } ?>
</div>
<?php  } else { ?>
<div class="fui-cell-group">
    <div class="fui-cell">
        <div class="fui-cell-info"><?php  echo $lang['lang_template_mobile_goods_detail_163']?></div>
    </div>
</div>
<?php  } ?>
<div class="detail-tab-panel">
    <div class="tab-panel show detail-block" data-tab="tab2">
        <div class="content-block content-images"></div>
    </div>
    <div class="tab-panel" data-tab="tab3">
        <div class="fui-cell-group">
            <?php  if(!empty($params)) { ?>
            <?php  if(is_array($params)) { foreach($params as $p) { ?>
            <div class="fui-cell">
                <div class="fui-cell-label" ><?php  echo $p['title'];?></div>
                <div class="fui-cell-info overflow"><?php  echo $p['value'];?></div>
            </div>
            <?php  } } ?>
            <?php  } else { ?>
            <div class="fui-cell">
                <div class="fui-cell-info text-align"><?php  echo $lang['lang_template_mobile_goods_detail_164']?></div>
            </div>
            <?php  } ?>
        </div>
    </div>
    <div class="tab-panel comment-block" data-tab="tab4" data-getcount='1' id='comments-list-container'>
        <div class='fui-icon-group col-5 '>
            <div class='fui-icon-col' data-level='all'><span class='text-danger'><?php  echo $lang['lang_template_mobile_goods_detail_165']?><br/><span class="count"></span></span></div>
            <div class='fui-icon-col' data-level='good'><span><?php  echo $lang['lang_template_mobile_goods_detail_166']?><br/><span class="count"></span></span></div>
            <div class='fui-icon-col' data-level='normal'><span><?php  echo $lang['lang_template_mobile_goods_detail_167']?><br/><span class="count"></span></span></div>
            <div class='fui-icon-col' data-level='bad'><span><?php  echo $lang['lang_template_mobile_goods_detail_168']?><br/><span class="count"></span></span></div>
            <div class='fui-icon-col' data-level='pic'><span><?php  echo $lang['lang_template_mobile_goods_detail_169']?><br/><span class="count"></span></span></div>
        </div>
        <div class='content-empty' style='display:none;'><?php  echo $lang['lang_template_mobile_goods_detail_170']?>
        </div>
        <div class='container' id="comments-all"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> <?php  echo $lang['lang_template_mobile_goods_detail_171']?>...</span></div>
    </div>
</div>
<?php  } else { ?>
<div class="fui-cell-group">
    <div class="fui-cell">
        <div class="fui-cell-text text-center look-detail"><i class='icon icon-fold'></i> <span><?php  echo $lang['lang_template_mobile_goods_detail_172']?></span></div>
    </div>
</div>
<?php  } ?>

<?php  } ?>
</div>
<?php  if($isgift && $goods['total'] > 0) { ?>
<div id='gift-picker-modal' style="margin:-100%;">
    <div class='gift-picker'>
        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>
            <div class="fui-cell">
                <div class="fui-cell-text dispatching">
                    <?php  echo $lang['lang_template_mobile_goods_detail_173']?>:
                    <div class="dispatching-info" style="max-height:12rem;overflow-y: auto ">
                        <?php  if(is_array($gifts)) { foreach($gifts as $item) { ?>
                        <div class="fui-list goods-item align-start" data-giftid="<?php  echo $item['id'];?>">
                            <div class="fui-list-media">
                                <input type="radio" name="checkbox" class="fui-radio fui-radio-danger gift-item" value="<?php  echo $item['id'];?>" style="display: list-item;">
                            </div>
                            <div class="fui-list-inner">
                                <?php  if(is_array($item['gift'])) { foreach($item['gift'] as $gift) { ?>
                                <div class="fui-list">
                                    <div class="fui-list-media image-media" style="position: initial;">
                                        <a href="javascript:void(0);">
                                            <img class="round" src="<?php  echo tomedia($gift['thumb'])?>" data-lazyloaded="true">
                                        </a>
                                    </div>
                                    <div class="fui-list-inner">
                                        <a href="javascript:void(0);">
                                            <div class="text">
                                                <?php  echo $gift['title'];?>
                                            </div>
                                        </a>
                                    </div>
                                    <div class='fui-list-angle'>
                                        <span class="price">RM<del class='marketprice'><?php  echo $gift['marketprice'];?></del></span>
                                    </div>
                                </div>
                                <?php  } } ?>
                            </div>
                        </div>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
            <div class='btn btn-danger block'><?php  echo $lang['lang_template_mobile_goods_detail_174']?></div>
        </div>
    </div>
</div>
<?php  } ?>
<?php  if($goods['canbuy']) { ?>
<div class="fui-navbar bottom-buttons">
    <a  class="nav-item favorite-item <?php  if($isFavorite) { ?>active<?php  } ?>" data-isfavorite="<?php  echo intval($isFavorite)?>">
        <span class="icon <?php  if($isFavorite) { ?>icon-likefill<?php  } else { ?>icon-like<?php  } ?>"></span>
        <span class="label" ><?php  echo $lang['lang_template_mobile_goods_detail_175']?></span>
    </a>
    <a class="nav-item external" href="<?php echo !empty($goods['merchid']) ? mobileUrl('merch',array('merchid'=>$goods['merchid'])) : mobileUrl('');?>">
        <span class="icon icon-shopfill"></span>
        <span class="label" ><?php  echo $lang['lang_template_mobile_goods_detail_176']?></span>
    </a>
    <a class="nav-item cart-item" href="<?php  echo mobileUrl('member/cart')?>" data-nocache="true" he="" id="menucart">
        <span class='badge <?php  if($cartCount<=0) { ?>out<?php  } else { ?>in<?php  } ?>'><?php  echo $cartCount;?></span>
        <span class="icon icon-cartfill"></span>
        <span class="label"><?php  echo $lang['lang_template_mobile_goods_detail_177']?></span>
    </a>
    <?php  if($canAddCart) { ?>
    <a  class="nav-item btn cartbtn"  data-type="<?php  echo $goods['type'];?>"><?php  echo $lang['lang_template_mobile_goods_detail_178']?></a>
    <?php  } ?>
    <?php  if(!empty($seckillinfo) && $seckillinfo['status']==1) { ?>
    <a  class="nav-item btn buybtn seckill-notstart"><?php  echo $lang['lang_template_mobile_goods_detail_179']?></a>
    <?php  } else { ?>
    <a  class="nav-item btn buybtn"  data-type="<?php  echo $goods['type'];?>"><?php  echo $lang['lang_template_mobile_goods_detail_180']?></a>
    <?php  } ?>
</div>
<?php  } ?>

<?php  if($has_city) { ?>
<div id='city-picker-modal' style="margin: -100%;">
    <div class='city-picker'>
        <div class='fui-cell-title'><?php  echo $lang['lang_template_mobile_goods_detail_181']?></div>

        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>

            <div class="fui-cell">
                <div class="fui-cell-text dispatching">
                    <?php  if(empty($onlysent)) { ?><?php  echo $lang['lang_template_mobile_goods_detail_182']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_goods_detail_183']?><?php  } ?><?php  echo $lang['lang_template_mobile_goods_detail_184']?>:
                    <div class="dispatching-info">
                        <?php  if(is_array($citys)) { foreach($citys as $item) { ?>
                        <i><?php  echo $item;?></i>
                        <?php  } } ?>
                    </div>
                </div>
            </div>


            <div class='btn btn-danger block'><?php  echo $lang['lang_template_mobile_goods_detail_185']?></div>
        </div>
    </div>
</div>
<?php  } ?>
<?php  if($isfullback) { ?>
<div id='fullback-picker-modal' style="margin: -100%;">
    <div class='city-picker'>
        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>

            <div class="fui-cell">
                <div class="fui-cell-text">
                    <div class="fullback-title"><?php  echo $lang['lang_template_mobile_goods_detail_186']?></div>
                    <div class="fullback-info">
                        <p><i>RM</i><?php  echo $lang['lang_template_mobile_goods_detail_187']?>
                            <?php  if($fullbackgoods['type']>0) { ?>
                                <?php  if($goods['hasoption'] > 0) { ?>
                                    <?php  if($fullbackgoods['minallfullbackallratio'] == $fullbackgoods['maxallfullbackallratio']) { ?>
                                        <?php  echo price_format($fullbackgoods['minallfullbackallratio'],2)?>%
                                    <?php  } else { ?>
                                        <?php  echo price_format($fullbackgoods['minallfullbackallratio'],2)?>% ~ <?php  echo price_format($fullbackgoods['maxallfullbackallratio'],2)?>%
                                    <?php  } ?>
                                <?php  } else { ?>
                                    <?php  echo price_format($fullbackgoods['minallfullbackallratio'],2)?>%
                                <?php  } ?>
                            <?php  } else { ?>
                                <?php  if($goods['hasoption'] > 0) { ?>
                                    <?php  if($fullbackgoods['minallfullbackallprice'] != $fullbackgoods['maxallfullbackallprice']) { ?>
                                        RM<?php  echo price_format($fullbackgoods['minallfullbackallprice'],2)?>
                                    <?php  } else { ?>
                                        RM<?php  echo price_format($fullbackgoods['minallfullbackallprice'],2)?> ~ RM<?php  echo price_format($fullbackgoods['maxallfullbackallprice'],2)?>
                                    <?php  } ?>
                                <?php  } else { ?>
                                    RM<?php  echo price_format($fullbackgoods['minallfullbackallprice'],2)?>
                                <?php  } ?>
                            <?php  } ?>
                        </p>
                        <p><i>RM</i><?php  echo $lang['lang_template_mobile_goods_detail_188']?>
                            <?php  if($fullbackgoods['type']>0) { ?>
                                <?php  if($goods['hasoption'] > 0) { ?>
                                    <?php  if($fullbackgoods['minfullbackratio'] == $fullbackgoods['maxfullbackratio']) { ?>
                                        <?php  echo price_format($fullbackgoods['minfullbackratio'],2)?>%
                                    <?php  } else { ?>
                                        <?php  echo price_format($fullbackgoods['minfullbackratio'],2)?>% ~ <?php  echo price_format($fullbackgoods['maxfullbackratio'],2)?>%
                                    <?php  } ?>
                                <?php  } else { ?>
                                    <?php  echo price_format($fullbackgoods['fullbackratio'],2)?>%
                                <?php  } ?>
                            <?php  } else { ?>
                                <?php  if($goods['hasoption'] > 0) { ?>
                                    <?php  if($fullbackgoods['minfullbackprice'] == $fullbackgoods['maxfullbackprice']) { ?>
                                        RM<?php  echo price_format($fullbackgoods['minfullbackprice'],2)?>
                                    <?php  } else { ?>
                                        RM<?php  echo price_format($fullbackgoods['minfullbackprice'],2)?> ~ RM<?php  echo price_format($fullbackgoods['maxfullbackprice'],2)?>
                                    <?php  } ?>
                                <?php  } else { ?>
                                    RM<?php  echo price_format($fullbackgoods['fullbackprice'],2)?>
                                <?php  } ?>
                            <?php  } ?>
                        </p>
                        <p><i>RM</i><?php  echo $lang['lang_template_mobile_goods_detail_189']?>
                            <?php  if($goods['hasoption'] > 0) { ?>
                                <?php  if($fullbackgoods['minday'] == $fullbackgoods['maxday']) { ?>
                                    <?php  echo $fullbackgoods['minday'];?>
                                <?php  } else { ?>
                                    <?php  echo $fullbackgoods['minday'];?> ~ <?php  echo $fullbackgoods['maxday'];?>
                                <?php  } ?>
                            <?php  } else { ?>
                                <?php  echo $fullbackgoods['day'];?>
                            <?php  } ?><?php  echo $lang['lang_template_mobile_goods_detail_190']?>
                        </p>
                    </div>
                    <?php  if($fullbackgoods['startday']>0) { ?>
                    <div class="fullback-remark">
                        <?php  echo $lang['lang_template_mobile_goods_detail_191']?> <?php  echo $fullbackgoods['startday'];?><?php  echo $lang['lang_template_mobile_goods_detail_192']?>
                    </div>
                    <?php  } ?>
                </div>
            </div>
            <div class='btn btn-danger block' style="margin:0;border-radius: 0;height:2.5rem;line-height: 2.5rem;"><?php  echo $lang['lang_template_mobile_goods_detail_193']?></div>
        </div>
    </div>
</div>
<?php  } ?>

<div id='sale-picker-modal' style="margin: -100%;">
    <div class='sale-picker'>
        <div class='fui-cell-title'><?php  echo $lang['lang_template_mobile_goods_detail_194']?></div>

        <div class="fui-cell-group fui-sale-group" style='margin-top:0'>
            <?php  if(!is_array($goods['dispatchprice'])) { ?>
            <?php  if($goods['type']==1 && $goods['isverify']!=2) { ?>
            <?php  if($goods['dispatchprice']==0) { ?>
            <div class="fui-cell"><div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_195']?></div></div>
            <?php  } ?>
            <?php  } ?>
            <?php  } ?>

            <?php  if($enoughfree && $enoughfree==-1) { ?>
            <div class="fui-cell"><div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_196']?></div></div>
            <?php  } else { ?>

            <?php  if($enoughfree>0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_197']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_198']?><?php  echo $enoughfree;?></span> <?php  echo $lang['lang_template_mobile_goods_detail_199']?></div>
            </div>
            <?php  } ?>

            <?php  if($goods['ednum']>0) { ?>
            <div class="fui-cell">
                <div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_200']?> <span class="text-danger"><?php  echo $goods['ednum'];?></span> <?php echo empty($goods['unit'])?$lang['lang_template_mobile_goods_detail_201']:$goods['unit']?><?php  echo $lang['lang_template_mobile_goods_detail_202']?>
                </div>
            </div>
            <?php  } ?>
            <?php  if($goods['edmoney']>0) { ?>

            <div class="fui-cell">
                <div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_203']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_204']?><?php  echo $goods['edmoney'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_205']?>
                </div>
            </div>

            <?php  } ?>
            <?php  } ?>



            <?php  if($enoughfree || ($enoughs && count($enoughs)>0)) { ?>
                <?php  if($enoughs && count($enoughs)>0) { ?>
                <div class='fui-according'>
                    <div class='fui-according-header'>
                        <div class="text">
                            <div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_206']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_207']?><?php  echo $enoughs[0]['enough'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_208']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_209']?><?php  echo $enoughs[0]['money'];?></span></div>
                        </div>
                        <?php  if(count($enoughs)>1) { ?><span class="remark"><?php  echo $lang['lang_template_mobile_goods_detail_210']?></span><?php  } ?>
                    </div>
                    <?php  if(count($enoughs)>1) { ?>
                    <div class='fui-according-content'>
                        <?php  if(is_array($enoughs)) { foreach($enoughs as $key => $enough) { ?>
                        <?php  if($key>0) { ?>
                        <div class="fui-cell">
                            <div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_211']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_212']?><?php  echo $enough['enough'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_213']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_214']?><?php  echo $enough['money'];?></span></div>
                        </div>
                        <?php  } ?>
                        <?php  } } ?>
                    </div>
                    <?php  } ?>
                </div>
                <?php  } ?>
            <?php  } ?>

            <?php  if(!empty($merch_set['enoughdeduct'])) { ?>
                <div class='fui-according'>
                    <div class='fui-according-header'>
                        <div class="text">
                            <div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_215']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_216']?><?php  echo $merch_set['enoughmoney'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_217']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_218']?><?php  echo $merch_set['enoughdeduct'];?></span></div>
                        </div>
                        <?php  if(count($merch_set['enoughs'])>0) { ?><span class="remark"><?php  echo $lang['lang_template_mobile_goods_detail_219']?></span><?php  } ?>
                    </div>
                    <?php  if(count($merch_set['enoughs'])>0) { ?>
                    <div class='fui-according-content'>
                        <?php  if(is_array($merch_set['enoughs'])) { foreach($merch_set['enoughs'] as $key => $enough) { ?>
                        <?php  if($key>0) { ?>
                        <div class="fui-cell">
                            <div class="fui-cell-text"><?php  echo $lang['lang_template_mobile_goods_detail_220']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_221']?><?php  echo $enough['enough'];?></span> <?php  echo $lang['lang_template_mobile_goods_detail_222']?> <span class="text-danger"><?php  echo $lang['lang_template_mobile_goods_detail_223']?><?php  echo $enough['give'];?></span></div>
                        </div>
                        <?php  } ?>
                        <?php  } } ?>
                    </div>
                    <?php  } ?>
                </div>
            <?php  } ?>


            <div class='btn btn-danger block'><?php  echo $lang['lang_template_mobile_goods_detail_224']?></div>
        </div>
    </div>
</div>
<?php  if($goods['type']==4) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/wholesalePicker', TEMPLATE_INCLUDEPATH)) : (include template('goods/wholesalePicker', TEMPLATE_INCLUDEPATH));?>
<?php  } else { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<?php  if($getComments) { ?>
<script type='text/html' id='tpl_goods_detail_comments_list'>
    <div class="fui-cell-group fui-comment-group">
        <%each list as comment%>
        <div class="fui-cell">
            <div class="fui-cell-text comment ">
                <div class="info head">
                    <div class='img'><img src='<%comment.headimgurl%>'/></div>
                    <div class='nickname'><%comment.nickname%></div>

                    <div class="date"><%comment.createtime%></div>
                    <div class="star star1">
                        <span <%if comment.level>=1%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_225']?></span>
                        <span <%if comment.level>=2%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_226']?></span>
                        <span <%if comment.level>=3%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_227']?></span>
                        <span <%if comment.level>=4%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_228']?></span>
                        <span <%if comment.level>=5%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_229']?></span>
                    </div>
                </div>
                <div class="remark"><%comment.content%></div>
                <%if comment.images.length>0%>
                <div class="remark img">
                    <%each comment.images as img%>
                    <div class="img"><img data-lazy="<%img%>" /></div>
                    <%/each%>
                </div>
                <%/if%>

                <%if comment.reply_content%>
                <div class="reply-content" style="background:#EDEDED;">
                    <?php  echo $lang['lang_template_mobile_goods_detail_230']?><%comment.reply_content%>
                    <%if comment.reply_images.length>0%>
                    <div class="remark img">
                        <%each comment.reply_images as img%>
                        <div class="img"><img data-lazy="<%img%>" /></div>
                        <%/each%>
                    </div>
                    <%/if%>
                </div>
                <%/if%>
                <%if comment.append_content && comment.replychecked==0%>
                <div class="remark reply-title"><?php  echo $lang['lang_template_mobile_goods_detail_231']?></div>
                <div class="remark"><%comment.append_content%></div>
                <%if comment.append_images.length>0%>
                <div class="remark img">
                    <%each comment.append_images as img%>
                    <div class="img"><img data-lazy="<%img%>" /></div>
                    <%/each%>
                </div>
                <%/if%>
                <%if comment.append_reply_content%>
                <div class="reply-content" style="background:#EDEDED;">
                    <?php  echo $lang['lang_template_mobile_goods_detail_232']?><%comment.append_reply_content%>
                    <%if comment.append_reply_images.length>0%>
                    <div class="remark img">
                        <%each comment.append_reply_images as img%>
                        <div class="img"><img data-lazy="<%img%>" /></div>
                        <%/each%>
                    </div>
                    <%/if%>
                </div>
                <%/if%>
                <%/if%>
            </div>
        </div>
        <%/each%>
    </div>
</script>

<script type='text/html' id='tpl_goods_detail_comments'>
    <div class="fui-cell-group fui-comment-group">

        <div class="fui-cell fui-cell-click">
            <div class="fui-cell-text desc"><?php  echo $lang['lang_template_mobile_goods_detail_233']?>(<%count.all%>)</div>
            <div class="fui-cell-text desc label"><span><%percent%>%</span> <?php  echo $lang['lang_template_mobile_goods_detail_234']?></div>
            <div class="fui-cell-remark"></div>

        </div>
        <%each list as comment%>
        <div class="fui-cell">

            <div class="fui-cell-text comment ">
                <div class="info">
                    <div class="star">
                        <span <%if comment.level>=1%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_235']?></span>
                        <span <%if comment.level>=2%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_236']?></span>
                        <span <%if comment.level>=3%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_237']?></span>
                        <span <%if comment.level>=4%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_238']?></span>
                        <span <%if comment.level>=5%>class="shine"<%/if%>><?php  echo $lang['lang_template_mobile_goods_detail_239']?></span>
                    </div>
                    <div class="date"><%comment.nickname%> <%comment.createtime%></div>
                </div>
                <div class="remark"><%comment.content%></div>
                <%if comment.images.length>0%>
                <div class="remark img">
                    <%each comment.images as img%>
                    <div class="img"><img data-lazy="<%img%>" height="50" /></div>
                    <%/each%>
                </div>
                <%/if%>
            </div>
        </div>
        <%/each%>
    </div>
</script>
<?php  } ?>

<?php  } else { ?>

<div class='fui-content'>
    <div class='content-empty'>
        <i class='icon icon-searchlist'></i><br/> <?php  echo $lang['lang_template_mobile_goods_detail_240']?>!<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'><?php  echo $lang['lang_template_mobile_goods_detail_241']?></a>
    </div>
</div>
<?php  } ?>


<div id='cover'>
    <div class='fui-mask-m visible'></div>
    <div class='arrow'></div>
    <div class='content'><?php  if(empty($share['goods_detail_text'])) { ?><?php  echo $lang['lang_template_mobile_goods_detail_242']?><br/><?php  echo $lang['lang_template_mobile_goods_detail_243']?><br/><?php  echo $lang['lang_template_mobile_goods_detail_244']?><?php  } else { ?><?php  echo $share['goods_detail_text'];?><?php  } ?></div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sale/coupon/util/couponpicker', TEMPLATE_INCLUDEPATH)) : (include template('sale/coupon/util/couponpicker', TEMPLATE_INCLUDEPATH));?>
<script language="javascript">

    require(['biz/goods/detail'], function (modal) {
        modal.init({
            goodsid:"<?php  echo $goods['id'];?>",
            getComments : "<?php  echo $getComments;?>",
            seckillinfo: <?php  echo json_encode($seckillinfo)?>,
            attachurl_local:"<?php  echo $GLOBALS['_W']['attachurl_local'];?>",
            attachurl_remote:"<?php  echo $GLOBALS['_W']['attachurl_remote'];?>",
            coupons: <?php  echo json_encode($coupons)?>,
            new_temp: <?php  echo $new_temp;?>
        });
    });
</script>
</div>

<div id="alert-picker">
    <script type="text/javascript" src="../addons/ewei_shopv2/static/js/dist/jquery/jquery.qrcode.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".alert-qrcode-i").html('')
            $(".alert-qrcode-i").qrcode({
                typeNumber: 0,
                correctLevel: 0,
                text:"<?php  echo mobileUrl('goods/detail', array('id'=>$goods['id'],'mid'=>$mid),true)?>"
            });
        });
    </script>
    <div id="alert-mask"></div>
    <?php  if($commission_data['codeShare'] == 1) { ?>
    <div class="alert-content">
        <div class="alert">
            <i class="alert-close alert-close1 icon icon-close"></i>
            <div class="fui-list alert-header">
                <div class="fui-list-media">
                    <img class="round" src="<?php  echo tomedia($_W['shopset']['shop']['logo'])?>">
                </div>
                <div class="fui-list-inner">
                    <?php  echo $_W['shopset']['shop']['name'];?>
                </div>
            </div>
            <img src="<?php  echo tomedia($goods['thumb'])?>" class="alert-goods-img" alt="">
            <div class="fui-list alert-qrcode">
                <div class="fui-list-media">
                    <i class="alert-qrcode-i"></i>
                </div>
                <div class="fui-list-inner alert-content">
                    <h2 class="alert-title"><?php  echo $goods['title'];?></h2>
                    <span>RM<?php  if($goods['minprice']==$goods['maxprice']) { ?><?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?><?php  } ?></span>
                    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
                    <del>RM<?php  echo $goods['productprice'];?></del>
                    <?php  } else { ?>
                    <?php  if($goods['productprice']>0) { ?><del>RM<?php  echo $goods['productprice'];?></del><?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="share-text1"><?php  echo $lang['lang_template_mobile_goods_detail_247']?></div>
        </div>
    </div>
    <?php  } else if($commission_data['codeShare'] == 2) { ?>
    <div class="alert-content">
        <div class="alert2">
            <div class="fui-list alert2-goods">
                <div class="fui-list-media">
                    <img src="<?php  echo tomedia($goods['thumb'])?>" class="alert2-goods-img" alt="">
                </div>
                <div class="fui-list-inner">
                    <h2 class="alert2-title"><?php  echo $goods['title'];?></h2>
                    <span>RM<?php  if($goods['minprice']==$goods['maxprice']) { ?><?php  echo $goods['minprice'];?><?php  } else { ?><?php  echo $goods['minprice'];?>~<?php  echo $goods['maxprice'];?><?php  } ?></span>
                    <?php  if($goods['isdiscount'] && $goods['isdiscount_time']>=time()) { ?>
                    <del>RM<?php  echo $goods['productprice'];?></del>
                    <?php  } else { ?>
                    <?php  if($goods['productprice']>0) { ?><del>RM<?php  echo $goods['productprice'];?></del><?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="alert2-qrcode">
                <i class="alert-qrcode-i"></i>
            </div>
            <div class="share-text2"><?php  echo $lang['lang_template_mobile_goods_detail_248']?></div>
            <a href="javascript:void(0);" class="alert-close2"><?php  echo $_W['shopset']['shop']['name'];?></a>
        </div>
    </div>
    <?php  } else { ?>
    <div class="alert-content">
        <div class="alert" style="padding:0;background: #f5f4f9;border:none;-webkit-border-radius: 0.3rem;border-radius: 0.3rem;top:2rem;">
            <i class="alert-close alert-close1 icon icon-close" style="right: -0.7rem;top: -0.8rem;background: #e1040d;border:none;z-index:10"></i>
            <div class="fui-list alert-header" style="-webkit-border-radius: 0.3rem;border-radius: 0.3rem;padding:0;">
                <img src="<?php  echo tomedia($goodscode)?>" class="alert-goods-img" alt="">
            </div>

        </div>
    </div>
    <?php  } ?>
</div>

<style type="text/css">
    .share-text1{text-align: center;padding:0.5rem 0.5rem 0;font-size:0.6rem;color:#666;line-height: 1rem;}
    .share-text2{text-align: center;padding:0 0.5rem 0.5rem;font-size:0.6rem;color:#666;line-height: 1rem;}
</style>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>