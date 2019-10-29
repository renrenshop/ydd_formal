<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_orders_confirm.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_orders_confirm.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.order-create-page .buybtn{width:5rem;margin:0;float:right;}
</style>
<form name='form' action="" method="post">
    <div class='fui-page order-create-page'>
        <div class="fui-header">
            <div class="fui-header-left">
                <a class="back" href="<?php  echo mobileUrl('order')?>"></a><!-- onclick='history.back()'-->
            </div>
            <div class="title">确认订单</div>
            <div class="fui-header-right">&nbsp;</div>
        </div>
        <div class='fui-content' style="padding-bottom: 2.5rem;overflow: scroll;overflow-scrolling: touch;">
            <?php  if(count($carrier_list)>0) { ?>
            <div id="carrierTab" class="fui-tab fui-tab-danger">
                <a data-tab="tab1" class="active">快递配送</a>
                <a data-tab="tab2">上门自提</a>
            </div>
            <?php  } ?>

            <?php  if(!$isverify) { ?>
            <!--地址选择-->
            <div class="fui-list-group" id='addressInfo' data-addressid="<?php  echo intval($address['id'])?>">
                <a  class="fui-list"
                    <?php  if(empty($address)) { ?>
                    href="<?php  echo mobileUrl('member/address/post')?>"
                    <?php  } else { ?>
                    href="<?php  echo mobileUrl('member/address/selector')?>"
                    <?php  } ?> data-nocache="true">
                    <div class="fui-list-media">
                        <i class="icon icon-location"></i>
                    </div>
                    <div class="fui-list-inner" >
                        <input type="hidden" class="aid" name="aid" value="<?php  echo $address['id'];?>">
                        <div class="title has-address" <?php  if(empty($address)) { ?>style='display:none'<?php  } ?>><span class='realname'><?php  echo $address['realname'];?></span> <span class='mobile'><?php  echo $address['mobile'];?></span></div>
                        <div class="text has-address" <?php  if(empty($address)) { ?>style='display:none'<?php  } ?>><span class='address'><?php  echo $address['province'];?><?php  echo $address['city'];?><?php  echo $address['area'];?> <?php  echo $address['address'];?></span></div>
                        <div class="text no-address" <?php  if(!empty($address)) { ?>style='display:none'<?php  } ?>><i class="icon icon-add"></i> 添加收货地址</div>
                    </div>
                    <div class="fui-list-angle">
                        <div class="angle"></div>
                    </div>
                </a>
            </div>
            <!--自提点选择-->
            <div class="fui-list-group"  id="carrierInfo" style="display: none">
                <a class="fui-list" href="<?php  echo mobileUrl('store/selector')?>" data-nocache='true'>
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

        <!--联系填写-->
        <div class="fui-cell-group sm" id="memberInfo" data-type="<?php  echo $isverify;?>" <?php  if(!$isverify) { ?>style="display:none"<?php  } ?>>
            <div class="fui-cell">
                <div class="fui-cell-label sm">联系人</div>
                <div class="fui-cell-info"><input type="text" placeholder="请输入联系人" name='realname'   class="fui-input" value="<?php  echo $member['realname'];?>"/></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-label sm">联系电话</div>
                <div class="fui-cell-info"><input type="tel" placeholder="请输入联系电话" name='mobile'   class="fui-input" value="<?php  echo $member['mobile'];?>"/></div>
            </div>
        </div>
        <div class="fui-list-group" style='margin-top: 10px'>
            <div class="fui-list goods-item">
                <div class="fui-list-media">
                    <a href="<?php  echo mobileUrl('groups/goods',array('id'=>$goods['id']))?>" class="external">
                        <img src="<?php  echo tomedia($goods['thumb'])?>" alt="<?php  echo $goods['title'];?>" class="round" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
                    </a>
                </div>
                <div class="fui-list-inner">
                    <a href="<?php  echo mobileUrl('groups/goods',array('id'=>$goods['id']))?>">
                        <div class="text">
                            <?php  if(empty($goods['isnodiscount']) && !empty($goods['dflag'])) { ?><span class='fui-label fui-label-danger'>折扣</span><?php  } ?>
                            <?php  echo $goods['title'];?>
                        </div>
                    </a>
                    <div class="text">
                        <span class="price ">数量：1</span>
                        <?php  if($goods['more_spec']==1) { ?>
                        <span class="price ">规格：<?php  echo $option['title'];?></span>
                        <?php  } ?>
                        <span class="total">
                            （<span class='text-danger'>¥ <?php  if(!empty($is_team)) { ?><?php  echo $goods['groupsprice'];?>
                            <?php  } else if($type == 'single' && $goods['more_spec'] ==1) { ?>
                            <?php  echo $goodsprice;?>
                            <?php  } else { ?>
                            <?php  echo $goods['singleprice'];?>
                            <?php  } ?></span>/
                            <?php  if($goods['units']) { ?><?php  echo $goods['goodsnum'];?><?php  echo $goods['units'];?><?php  } else { ?>1件<?php  } ?>）
                        </span>
                        <div style="clear:both;"></div>
                        <?php  if($goods['showstock'] > 0) { ?>
                        <span class="price ">库存：<span class='marketprice'><?php  echo $goods['stock'];?></span></span>
                        <?php  } ?>
                    </div>
                </div>
            </div>
            <div class='fui-cell-group' style="display: none;">
                <div class="fui-cell">
                    <div class="fui-cell-info" style="text-align: right;">
                        <!--共 <span id='goodscount' class='text-danger'><?php  echo $total;?></span> 件商品-->
                        总价：<span class="text-danger">¥ <span class='goodsprice'><?php  echo number_format($price,2)?></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="fui-cell-group  sm">
            <div id='coupondiv' class="fui-cell fui-cell-click" <?php  if($couponcount<=0) { ?>style='display:none'<?php  } ?>>
            <div class='fui-cell-label' style='width:auto;'>优惠券</div>
            <div class='fui-cell-info'></div>
            <div class='fui-cell-remark'>
                <div class='badge badge-danger' <?php  if($couponcount<=0) { ?>style='display:none'<?php  } ?>><?php  echo $couponcount;?></div>
                <span class='text' <?php  if($couponcount>0) { ?>style='display:none'<?php  } ?>>无可用</span>
            </div>
        </div>

        <?php  if($goods['deduct']>0 && $creditdeduct['creditdeduct'] > 0 && $member['credit1'] > 0 && $credit['credit'] > 0 && $price > 0) { ?>
        <div class="fui-cell">
            <div class="fui-cell-label" style="width: auto;">
                <span id="deductcredit_info" class='text-danger'><?php  echo $credit['credit'];?></span> 积分可抵扣
                <span id="deductcredit_money" class='text-danger'><?php  echo number_format($credit['deductprice'],2)?></span> 元
            </div>
            <div class="fui-cell-info">
                <input type="hidden" name="credit" value="<?php  echo $credit['credit'];?>">
                <input type="hidden" name="creditmoney" value="<?php  echo $credit['deductprice'];?>">
                <input type="hidden" id="isdeduct" name="isdeduct" value="0">
                <input id="deductcredit" value="0" data-credit="<?php  echo $credit['credit'];?>" data-money="<?php  echo $credit['deductprice'];?>" type="checkbox" class="fui-switch fui-switch-small fui-switch-success pull-right">
            </div>
        </div>
        <?php  } ?>
    </div>
    <?php  if(!empty($stores)) { ?>
    <script language='javascript' src='https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1'></script>
    <div class='fui-according-group'>
        <div class='fui-according'>
            <div class='fui-according-header'>
                <i class='icon icon-shop'></i>
                <span class="text">适用门店</span>
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
                            地址: <span class='realname'><?php  echo $item['address'];?></span>
                        </div>
                        <div class="text">
                            电话: <span class='address'><?php  echo $item['tel'];?></span>
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

    <?php  if(!empty($template_flag)) { ?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diyform/formfields', TEMPLATE_INCLUDEPATH)) : (include template('diyform/formfields', TEMPLATE_INCLUDEPATH));?>
    <?php  } else { ?>
    <div class="fui-cell-group sm ">
        <div class="fui-cell">
            <div class="fui-cell-info"><input type="text" class="fui-input" name="message" id='remark' placeholder="选填: 买家留言(50字以内)" maxlength="50"></div>
        </div>
    </div>
    <?php  } ?>

    <div class="fui-cell-group sm">
        <input type="hidden" id="weight" name='weight' value="<?php  echo $weight;?>" />
        <div class="fui-cell">
            <div class="fui-cell-label" >商品小计</div>
            <div class="fui-cell-info"></div>
            <div class="fui-cell-remark noremark">¥ <span class='goodsprice'>
                <?php  if(!empty($is_team)) { ?><?php  echo $goods['groupsprice'];?><?php  } else { ?><?php  echo $goods['singleprice'];?><?php  } ?>
            </span></div>
        </div>
        <div class="fui-cell">
            <div class="fui-cell-label" >运费</div>
            <div class="fui-cell-info"></div>
            <div class="fui-cell-remark noremark">
                ¥ <span class='dispatchprice'><?php  echo number_format($goods['freight'],2)?></span>
            </div>
        </div>
        <?php  if($heads == 1 && $set['discount'] ==1 && $goods['headsmoney'] > 0) { ?>
        <div class="fui-cell">
            <div class="fui-cell-label" style='width:auto' >
                团长优惠 <span class="text-danger"><?php  if($goods['headstype']==1) { ?><?php  echo (number_format($goods['headsdiscount'] / 10,1))?>折<?php  } ?></span>
            </div>
            <div class="fui-cell-info"></div>
            <div class="fui-cell-remark noremark">
                - ¥ <span class='isdiscountprice'>
                    <?php  echo number_format($goods['headsmoney'],2)?>
                    </span>
            </div>
        </div>
        <?php  } ?>
        <?php  if($isdiscountprice>0) { ?>
        <div class="fui-cell">
            <div class="fui-cell-label" style='width:auto' >促销优惠</div>
            <div class="fui-cell-info"></div>
            <div class="fui-cell-remark noremark">- ¥ <span class='isdiscountprice'><?php  echo number_format($isdiscountprice,2)?></span></div>
        </div>
        <?php  } ?>
    </div>
</div>
<div class="fui-navbar order-create-checkout">
    <input type="submit" name="submit" value="提交订单" id= 'submit' style="-webkit-appearance: none;" class="nav-item btn btn-danger buybtn" />
    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
    <input type="hidden" name="groups" value="" />
    <a href="javascript:;" class="nav-item total">
        需付：¥ <span class="text-danger totalprice"><?php  echo number_format($price+$goods['freight'],2)?></span>
    </a>
</div>
</form>
<script language='javascript'>
    require(['../addons/ewei_shopv2/plugin/groups/static/js/confirm.js'], function (modal) {modal.init(<?php  echo json_encode($createInfo)?>); modal.totalPrice();});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>