<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_create.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_create.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon.css?v=2.0.0">
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon-new.css?v=2017030302">
<style>
    .yen{border:none;height:0.75rem;width:0.75rem;display: inline-block;background: #ff4753;color:#fff;font-size:0.4rem;line-height: 0.8rem;text-align: center;
        font-style: normal;border-radius: 0.75rem;-webkit-border-radius: 0.75rem;}
</style>
<div class='fui-page order-create-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_template_mobile_order_create_0']?></div>
        <div class="fui-header-right" data-nomenu="true">&nbsp;</div>
    </div>
    <div class='fui-content  navbar'>

        <?php  if(count($carrier_list)>0 && !$isverify && !$isvirtual) { ?>
        <div id="carrierTab" class="fui-tab fui-tab-danger">
            <a data-tab="tab1" class="active"><?php  echo $lang['lang_template_mobile_order_create_1']?></a>
            <a data-tab="tab2"><?php  echo $lang['lang_template_mobile_order_create_2']?></a>
        </div>
        <?php  } ?>

        <?php  if(!empty($quickinfo)) { ?>
        <div class="fui-cell-group">
            <a class="fui-cell external" href="<?php  echo mobileUrl('quick', array('id'=>$quickinfo['id']))?>">
                <div class="fui-cell-info"><?php  echo $lang['lang_template_mobile_order_create_3']?>: <?php  echo $quickinfo['title'];?></div>
                <div class="fui-cell-remark"></div>
            </a>
        </div>
        <?php  } ?>

        <?php  if(!$isverify && !$isvirtual) { ?>
        <?php  echo $lang['lang_template_mobile_order_create_4']?>
        <div class="fui-list-group" id='addressInfo' data-addressid="<?php  echo intval($address['id'])?>">
            <a  class="fui-list <?php  if(empty($address)) { ?>external<?php  } ?>"
                <?php  if(empty($address)) { ?>
                href="<?php  echo mobileUrl('member/address/post')?>"
                <?php  } else { ?>
                href="<?php  echo mobileUrl('member/address/selector')?>"
                <?php  } ?>
            data-nocache="true">
            <div class="fui-list-media">
                <i class="icon icon-location"></i>
            </div>
            <div class="fui-list-inner" >
                <div class="title has-address" <?php  if(empty($address)) { ?>style='display:none'<?php  } ?>><span class='realname'><?php  echo $address['realname'];?></span> <span class='mobile'><?php  echo $address['mobile'];?></span></div>
            <div class="text has-address" <?php  if(empty($address)) { ?>style='display:none'<?php  } ?>><span class='address'><?php  echo $address['province'];?><?php  echo $address['city'];?><?php  echo $address['area'];?><?php  if(!empty($new_area) && !empty($address_street)) { ?> <?php  echo $address['street'];?><?php  } ?> <?php  echo $address['address'];?></span></div>
        <div class="text no-address" <?php  if(!empty($address)) { ?>style='display:none'<?php  } ?>><i class="icon icon-add"></i> <?php  echo $lang['lang_template_mobile_order_create_5']?></div>
</div>
<div class="fui-list-angle">
    <div class="angle"></div>
</div>
</a>
</div>


<?php  echo $lang['lang_template_mobile_order_create_6']?>
<div class="fui-list-group"  id="carrierInfo" style="display: none">
    <a class="fui-list" href="<?php  echo mobileUrl('store/selector', array('type'=>1,'merchid'=>$merch_id))?>" data-nocache='true'>
        <div class="fui-list-media">
            <i class="icon icon-shop"></i>
        </div>

        <div class="fui-list-inner">
            <div class="title"><span class='storename'><?php  echo $carrier_list[0]['storename'];?></span></div>
            <div class="subtitle"><span class='realname'><?php  echo $carrier_list[0]['realname'];?></span> <span class='mobile' id="carrierInfo_mobile"><?php  echo $carrier_list[0]['mobile'];?></span></div>
            <div class="text"><span class='address'><?php  echo $carrier_list[0]['address'];?></span></div>
        </div>
        <div class="fui-list-angle">
            <div class="angle"></div>
        </div>
    </a>
</div>
<?php  } ?>
<?php  echo $lang['lang_template_mobile_order_create_7']?>
<?php  if($sysset['set_realname']==0 || $sysset['set_mobile']==0) { ?>
<div class="fui-cell-group sm" id="memberInfo" <?php  if(!$isverify && !$isvirtual) { ?>style="display:none"<?php  } ?>>
<?php  if($sysset['set_realname']==0) { ?>
<div class="fui-cell">
    <div class="fui-cell-label sm"><?php  echo $lang['lang_template_mobile_order_create_8']?></div>
    <div class="fui-cell-info"><input type="text" placeholder="<?php  echo $lang['lang_template_mobile_order_create_9']?>" data-set="<?php  echo $sysset['set_realname'];?>" name='carrier_realname' class="fui-input" value="<?php  echo $member['realname'];?>"/></div>
</div>
<?php  } ?>
<?php  if($sysset['set_mobile']==0) { ?>
<div class="fui-cell">
    <div class="fui-cell-label sm"><?php  echo $lang['lang_template_mobile_order_create_10']?></div>
    <div class="fui-cell-info"><input type="tel" placeholder="<?php  echo $lang['lang_template_mobile_order_create_11']?>" data-set="<?php  echo $sysset['set_mobile'];?>" name='carrier_mobile' class="fui-input" value="<?php  echo $member['carrier_mobile'];?>"/></div>
</div>
<?php  } ?>
</div>
<?php  } ?>


<div class="fui-list-group" >

    <?php  if(is_array($goods_list)) { foreach($goods_list as $key => $list) { ?>
    <div class="fui-list-group-title"><i class="icon icon-shop"></i > <?php  echo $list['shopname'];?></div>
    <?php  if(is_array($list['goods'])) { foreach($list['goods'] as $g) { ?>
    <input type='hidden' name='goodsid[]' value="<?php  echo $g['id'];?>" />
    <input type='hidden' name='optionid[]' value="<?php  echo $g['optionid'];?>" />
    <div class="fui-list goods-item">
        <div class="fui-list-media">
            <a href="<?php  echo mobileUrl('goods/detail',array('id'=>$g['goodsid']))?>">
                <img src="<?php  echo tomedia($g['thumb'])?>" class="round package-goods-img">
            </a>
        </div>
        <div class="fui-list-inner">
            <a href="<?php  echo mobileUrl('goods/detail',array('id'=>$g['goodsid']))?>">
                <div class="text">
                    <?php  if($g['seckillinfo'] && $g['seckillinfo']['status']==0) { ?><span class='fui-label fui-label-danger'><?php  echo $g['seckillinfo']['tag'];?></span><?php  } ?>
                    <?php  if(empty($g['isnodiscount']) && !empty($g['dflag'])) { ?><span class='fui-label fui-label-danger'><?php  echo $lang['lang_template_mobile_order_create_12']?></span><?php  } ?>
                    <?php  if($g['type']==4) { ?><span class='fui-label fui-label-danger'><?php  echo $lang['lang_template_mobile_order_create_13']?></span><?php  } ?>
                    <?php  echo $g['title'];?>
                </div>
                <?php  if(!empty($g['optionid'])) { ?>
                <div class="text">
                    <?php  echo $g['optiontitle'];?>
                </div>
                <?php  } ?>
            </a>
        </div>
        <div class='fui-list-angle'>
            <span class="price "><?php  echo $lang['lang_template_mobile_order_create_46'];?><span class='marketprice'><?php  if($g['packageprice'] > $g['unitprice']) { ?><?php  echo $g['packageprice'];?><?php  } else if($g['marketprice'] > $g['unitprice']) { ?><?php  echo $g['marketprice'];?><?php  } else { ?><?php  echo $g['unitprice'];?><?php  } ?></span></span>
            <span class="total">
                    <?php  if($taskgoodsprice) { ?>
                        <?php  $total = 1;?>
                        x1<input class="num shownum" type="hidden" name="" value="1"/>
                    <?php  } else if($changenum && !$isgift) { ?>
                    <div class="fui-number small" data-value="<?php  echo $total;?>" data-unit="<?php  echo $g['unit'];?>" data-maxbuy="<?php  echo $g['totalmaxbuy'];?>" data-minbuy="<?php  echo $g['minbuy'];?>" data-goodsid="<?php  echo $g['goodsid'];?>">
                        <div class="minus">-</div>
                        <input class="num shownum" type="tel" name="" value="<?php  echo $total;?>"/>
                        <div class="plus">+</div>
                    </div>
                    <?php  } else { ?>
                        x<?php  echo $g['total'];?><input class="num shownum" type="hidden" name="" value="<?php  echo $total;?>"/>
                    <?php  } ?>
                </span>
        </div>

    </div>
    <?php  } } ?>
    <?php  } } ?>





    <script type="text/javascript">
        $(function(){
            $(".package-goods-img").height($(".package-goods-img").width());
        })
    </script>
    <div class='fui-cell-group'>
        <?php  if(is_array($giftGood)) { foreach($giftGood as $item) { ?>
        <div class="fui-cell" style="padding:0 0 0 0.5rem;">
            <div class="fui-list goods-item" style="width:100%;">
                <div class="fui-list-media image-media" style="position: initial;">
                    <a href="javascript:void(0);">
                        <img class="round" src="<?php  echo tomedia($item['thumb'])?>" data-lazyloaded="true">
                    </a>
                </div>
                <div class="fui-list-inner">
                    <a href="javascript:void(0);">
                        <div class="text">
                            <?php  echo $item['title'];?><br /><span class="fui-label fui-label-danger"><?php  echo $lang['lang_template_mobile_order_create_14']?></span>
                        </div>
                    </a>
                </div>
                <div class='fui-list-angle'>
                    <span class="price"><?php  echo $lang['lang_template_mobile_order_create_46'];?><del class='marketprice'><?php  echo $item['marketprice'];?></del></span>
                </div>
            </div>
        </div>
        <?php  } } ?>

        <?php  if(!empty($fullbackgoods)) { ?>
        <div class="fui-cell" id="fullbackgoods" <?php  if($fullbackgoods['minallfullbackallprice']<=0 && $fullbackgoods['minallfullbackallratio']<=0) { ?>style="display: none"<?php  } ?>>
        <div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_15']?></div>
        <div class="fui-cell-info" style="text-align: right;">
            <span class="fui-cell-remark noremark" style="font-size: 0.6rem;color:#333;">
                <i class="yen"><?php  echo $lang['lang_template_mobile_order_create_46'];?></i>
                <?php  if($fullbackgoods['type']>0) { ?>
                <?php  echo $lang['lang_template_mobile_order_create_16']?> <span class="text-danger"><?php  echo price_format($fullbackgoods['minallfullbackallratio'],2)?>%</span> <?php  echo $lang['lang_template_mobile_order_create_17']?><span class="text-danger"><?php  echo price_format($fullbackgoods['fullbackratio'],2)?>%</span><?php  echo $lang['lang_template_mobile_order_create_18']?><span class="text-danger"><?php  echo $fullbackgoods['day'];?></span><?php  echo $lang['lang_template_mobile_order_create_19']?>
                <?php  } else { ?>
                <?php  echo $lang['lang_template_mobile_order_create_20']?> $lang['lang_template_mobile_order_create_46']<?php  echo price_format($fullbackgoods['minallfullbackallprice'],2)?><?php  echo $lang['lang_template_mobile_order_create_21']?><?php  echo $lang['lang_template_mobile_order_create_46'];?><?php  echo price_format($fullbackgoods['fullbackprice'],2)?><?php  echo $lang['lang_template_mobile_order_create_22']?><?php  echo $fullbackgoods['day'];?><?php  echo $lang['lang_template_mobile_order_create_23']?>
                <?php  } ?>
            </span>
        </div>
    </div>
    <?php  } ?>
    <?php  if($hasinvoice) { ?>
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_create_24']?></div>
        <div class="fui-cell-info"><input type='text' class='fui-input' value="<?php  echo $invoicename;?>" id='invoicename' /></div>
    </div>
    <?php  } ?>
    <div class="fui-cell">
        <div class="fui-cell-info" style="text-align: right;"><?php  echo $lang['lang_template_mobile_order_create_25']?> <span id='goodscount' class='text-danger'><?php  echo $total;?></span> <?php  echo $lang['lang_template_mobile_order_create_26']?> <?php  echo $lang['lang_template_mobile_order_create_27']?><span class="text-danger"><?php  echo $lang['lang_template_mobile_order_create_46'];?> <span class='<?php  if(!$packageid && empty($exchangeOrder)) { ?>goodsprice<?php  } ?>'><?php  echo number_format($goodsprice,2)?></soan></span></div>
    </div>

</div>
</div>

<?php  if($isgift) { ?>
<input type="hidden" name="giftid" id="giftid" value="<?php  echo $giftid;?>">
<div class="fui-cell-group sm ">
    <div class="fui-cell">
        <?php  if(count($gifts)>1) { ?>
        <div class='fui-cell-text fui-cell-giftclick'>
            <?php  echo $lang['lang_template_mobile_order_create_28']?><label id="gifttitle"><?php  echo $lang['lang_template_mobile_order_create_29']?></label>
        </div>
        <?php  } else { ?>
        <?php  if(is_array($gifts)) { foreach($gifts as $item) { ?>
        <div class='fui-cell-text' onclick="javascript:window.location.href='<?php  echo mobileUrl('goods/gift',array('id'=>$item['id']))?>'">
            <?php  echo $lang['lang_template_mobile_order_create_30']?><?php  echo $gifttitle;?>
        </div>
        <?php  } } ?>
        <?php  } ?>
        <div class='fui-cell-remark'></div>
    </div>
</div>
<?php  } ?>

<?php  if(!empty($order_formInfo)) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diyform/formfields', TEMPLATE_INCLUDEPATH)) : (include template('diyform/formfields', TEMPLATE_INCLUDEPATH));?>
<?php  } else { ?>
<div class="fui-cell-group sm ">
    <div class="fui-cell">
        <div class="fui-cell-info"><input type="text" class="fui-input" id='remark' placeholder="<?php  echo $lang['lang_template_mobile_order_create_31']?>: <?php  echo $lang['lang_template_mobile_order_create_32']?>(50<?php  echo $lang['lang_template_mobile_order_create_33']?>)" maxlength="50"></div>
    </div>
</div>
<?php  } ?>
<?php  if(empty($exchangeOrder) && empty($taskgoodsprice)) { ?>
<div class="fui-cell-group  sm">

    <div id='coupondiv' class="fui-cell fui-cell-click" <?php  if($couponcount<=0) { ?>style='display:none'<?php  } ?>>
    <div class='fui-cell-label' style='width:auto;'><?php  echo $lang['lang_template_mobile_order_create_34']?></div>
    <div class='fui-cell-info'></div>
    <div class='fui-cell-remark'>
        <img id="couponloading" src="../addons/ewei_shopv2/static/images/loading.gif" style="vertical-align: middle;display: none;" width="20" alt=""/>
        <div class='badge badge-danger' <?php  if($couponcount<=0) { ?>style='display:none'<?php  } ?>><?php  echo $couponcount;?></div>
    <span class='text' <?php  if($couponcount>0) { ?>style='display:none'<?php  } ?>><?php  echo $lang['lang_template_mobile_order_create_35']?></span>
</div>
</div>


<?php  if($deductcredit>0) { ?>
<div class="fui-cell">
    <div class="fui-cell-label" style="width: auto;"> <span id="deductcredit_info" class='text-danger'><?php  echo $deductcredit;?></span> <?php  echo $_W['shopset']['trade']['credittext'];?><?php  echo $lang['lang_template_mobile_order_create_36']?> <span id="deductcredit_money" class='text-danger'><?php  echo number_format($deductmoney,2)?></span> <?php  echo $lang['lang_template_mobile_order_create_37']?></div>
    <div class="fui-cell-info"></div>
    <div class="fui-cell-remark noremark"><input id="deductcredit" data-credit="<?php  echo $deductcredit;?>" data-money='<?php  echo $deductmoney;?>' type="checkbox" class="fui-switch fui-switch-small fui-switch-success pull-right"></div>
</div>
<?php  } ?>

<?php  if($deductcredit2>0) { ?>
<div class="fui-cell">
    <div class="fui-cell-label" style="width: auto;"><?php  echo $_W['shopset']['trade']['moneytext'];?><?php  echo $lang['lang_template_mobile_order_create_38']?> <span id='deductcredit2_money' class="text-danger"><?php  echo number_format($deductcredit2,2)?></span><?php  echo $lang['lang_template_mobile_order_create_39']?></div>
    <div class="fui-cell-info"></div>
    <div class="fui-cellfui-cell-remark noremarkinfo"><input id="deductcredit2" data-credit2="<?php  echo $deductcredit2;?>" type="checkbox"  class="fui-switch fui-switch-small fui-switch-success pull-right"></div>
</div>
<?php  } ?>

</div>

<?php  if(!empty($stores)) { ?>
<script language='javascript' src='https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1'></script>
<div class='fui-according-group'>
    <div class='fui-according'>
        <div class='fui-according-header'>
            <i class='icon icon-shop'></i>
            <span class="text"><?php  echo $lang['lang_template_mobile_order_create_40']?></span>
            <span class="remark"><div class="badge"><?php  echo count($stores)?></div></span>
        </div>
        <div class="fui-according-content store-container">
            <?php  if(is_array($stores)) { foreach($stores as $item) { ?>
            <div  class="fui-list store-item" data-lng="<?php  echo floatval($item['lng'])?>" data-lat="<?php  echo floatval($item['lat'])?>">
                <div class="fui-list-media">
                    <i class='icon icon-shop'></i>
                </div>
                <div class="fui-list-inner store-inner">
                    <div class="title"><span class='storename'><?php  echo $item['storename'];?></span></div>
                    <div class="text">
                        <?php  echo $lang['lang_template_mobile_order_create_41']?>: <span class='realname'><?php  echo $item['address'];?></span>
                    </div>
                    <div class="text">
                        <?php  echo $lang['lang_template_mobile_order_create_42']?>: <span class='address'><?php  echo $item['tel'];?></span>
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
<?php  } ?>


<div class="fui-cell-group sm">
    <input type="hidden" id="weight" name='weight' value="<?php  echo $weight;?>" />
    <?php  if(!empty($exchangeOrder)) { ?>
    <div class="fui-cell">
        <div class="fui-cell-label" ><?php  echo $lang['lang_template_mobile_order_create_43']?></div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark"><span style="color: red;">- <?php  echo $lang['lang_template_mobile_order_create_46'];?> <?php  echo number_format($exchangecha,2);?></span></div>
    </div>
    <?php  } ?>
    <div class="fui-cell">
        <div class="fui-cell-label" ><?php  echo $lang['lang_template_mobile_order_create_44']?></div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark"><?php  echo $lang['lang_template_mobile_order_create_46'];?> <span class='<?php  if(!$packageid && empty($exchangeOrder)) { ?>goodsprice<?php  } ?>'>
            <?php  if(!empty($exchangeOrder)) { ?><?php  echo $exchangeprice;?><?php  } else if($taskgoodsprice) { ?><?php  echo $taskgoodsprice;?><?php  } else { ?><?php  echo number_format($goodsprice,2)?><?php  } ?>
        </span></div>
    </div>
    <?php  if(empty($exchangeOrder) && empty($taskgoodsprice)) { ?>
    <?php  if(!$packageid) { ?>
    <?php  if(empty($if_bargain['bargain'])) { ?>
    <div class="fui-cell"  style="display: none">
        <div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_45']?></div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46']?><span id='showbuyagainprice' class='showbuyagainprice'></span></div>
        <input type="hidden" id='buyagain' class='buyagainprice'  value="<?php  echo number_format($buyagainprice,2)?>" />
    </div>
    <?php  } ?>
    <div class="fui-cell istaskdiscount"  style="display: none">
        <div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_47']?></div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id='showtaskdiscountprice' class='showtaskdiscountprice'></span></div>
        <input type="hidden" id='taskdiscountprice' class='taskdiscountprice'  value="<?php  echo number_format($taskdiscountprice,2)?>" />
    </div>

    <div class="fui-cell islotterydiscount"  style="display: none">
        <div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_48']?></div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id='showlotterydiscountprice' class='showlotterydiscountprice'></span></div>
        <input type="hidden" id='lotterydiscountprice' class='lotterydiscountprice'  value="<?php  echo number_format($lotterydiscountprice,2)?>" />
    </div>

    <div class="fui-cell discount"  style="display: none">
        <div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_49']?></div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id='showdiscountprice' class='showdiscountprice'></span></div>
        <input type="hidden" id='discountprice' class='discountprice'  value="<?php  echo number_format($discountprice,2)?>" />
    </div>

    <div class="fui-cell isdiscount"  style="display: none">
        <div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_50']?></div>
        <div class="fui-cell-info"></div>
        <div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id='showisdiscountprice' class='showisdiscountprice'></span></div>
        <input type="hidden" id='isdiscountprice' class='isdiscountprice'  value="<?php  echo number_format($isdiscountprice,2)?>" />
    </div>

    <div class="fui-cell" id="deductenough" <?php  if(!$saleset['showenough']) { ?>style='display:none'<?php  } ?>>
    <div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_51']?> <span id="deductenough_enough" class='text-danger'><?php  echo number_format($saleset['enoughmoney'],2)?></span> <?php  echo $lang['lang_template_mobile_order_create_52']?></div>
    <div class="fui-cell-info"></div>
    <div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id='deductenough_money'><?php  if($saleset['showenough']) { ?><?php  echo number_format($saleset['enoughdeduct'],2)?><?php  } ?></span></div>
</div>

<div class="fui-cell" id="merch_deductenough" <?php  if(!$merch_saleset['merch_showenough']) { ?>style='display:none'<?php  } ?>>
<div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_53']?> <span id="merch_deductenough_enough" class='text-danger'><?php  echo number_format($merch_saleset['merch_enoughmoney'],2)?></span> <?php  echo $lang['lang_template_mobile_order_create_54']?></div>
<div class="fui-cell-info"></div>
<div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id='merch_deductenough_money'><?php  if($merch_saleset['merch_showenough']) { ?><?php  echo number_format($merch_saleset['merch_enoughdeduct'],2)?><?php  } ?></span></div>
</div>

<div class="fui-cell" id="seckillprice"  <?php  if($seckill_price<=0) { ?>style="display: none"<?php  } ?>>
<div class="fui-cell-label" style='width:auto' ><?php  echo $lang['lang_template_mobile_order_create_55']?></div>
<div class="fui-cell-info"></div>
<div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id="seckillprice_money"><?php  echo number_format($seckill_price,2)?></span></div>
</div>
<?php  } ?>

<?php  } ?>

<div class="fui-cell">
    <div class="fui-cell-label" ><?php  echo $lang['lang_template_mobile_order_create_56']?></div>
    <div class="fui-cell-info"></div>
    <div class="fui-cell-remark noremark"><?php  echo $lang['lang_template_mobile_order_create_46'];?> <span class='<?php  if(!$packageid && empty($exchangeOrder)) { ?>dispatchprice<?php  } ?>'><?php  if(!empty($exchangeOrder)) { ?><?php  echo $exchangepostage;?><?php  } else if($taskgoodsprice) { ?><?php  echo $taskgoodsprice;?><?php  } else { ?><?php  echo number_format($dispatch_price,2)?><?php  } ?></span></div>
</div>


<div class="fui-cell" id='coupondeduct_div' style='display:none'>
    <div class="fui-cell-label" style='width:auto' id='coupondeduct_text' ></div>
    <div class="fui-cell-info"></div>
    <div class="fui-cell-remark noremark">-<?php  echo $lang['lang_template_mobile_order_create_46'];?> <span id="coupondeduct_money">0</span></div>
</div>
</div>

</div>
<?php  if($isgift) { ?>
<div id='gift-picker-modal' style="margin:-100%;">
    <div class='gift-picker'>
        <div class="fui-cell-group fui-sale-group" style='margin-top:0;'>
            <div class="fui-cell">
                <div class="fui-cell-text dispatching">
                    <?php  echo $lang['lang_template_mobile_order_create_57']?>:
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
                                        <span class="price"><?php  echo $lang['lang_template_mobile_order_create_46'];?><del class='marketprice'><?php  echo $gift['marketprice'];?></del></span>
                                    </div>
                                </div>
                                <?php  } } ?>
                            </div>
                        </div>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
            <div class='btn btn-danger block'><?php  echo $lang['lang_template_mobile_order_create_58']?></div>
        </div>
    </div>
</div>
<?php  } ?>

<div class="fui-navbar order-create-checkout">
    <a href="javascript:;" class="nav-item total">
        <p><?php  if($packageid) { ?><span class="text-danger" style="font-size: 0.6rem;">(<?php  echo $lang['lang_template_mobile_order_create_59']?><?php  echo $lang['lang_template_mobile_order_create_46'];?><?php  echo number_format($marketprice-$goodsprice,2)?>)</span><?php  } ?>
            <?php  echo $lang['lang_template_mobile_order_create_60']?><span class="text-danger "><?php  echo $lang['lang_template_mobile_order_create_46'];?> <span class="<?php  if(!$packageid && empty($exchangeOrder)) { ?>totalprice<?php  } ?>">
                <?php  if(!empty($exchangeOrder)) { ?><?php  echo $exchangerealprice;?><?php  } else if($taskgoodsprice) { ?><?php  echo $taskgoodsprice;?><?php  } else { ?><?php  echo number_format($realprice,2)?><?php  } ?></span></span>
        </p>
    </a>
    <a href="javascript:;" class="nav-item btn btn-danger buybtn"><?php  echo $lang['lang_template_mobile_order_create_61']?></a>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('sale/coupon/util/picker', TEMPLATE_INCLUDEPATH)) : (include template('sale/coupon/util/picker', TEMPLATE_INCLUDEPATH));?>
<script language='javascript'>require(['biz/order/create'], function (modal) {modal.init(<?php  echo json_encode($createInfo)?>); });</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>