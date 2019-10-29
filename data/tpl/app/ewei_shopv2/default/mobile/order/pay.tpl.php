<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_pay.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_pay.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page  fui-page-current order-pay-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back" onclick='history.back()'></a>
        </div>
        <div class="title" style='margin-right:-2rem;'><?php  echo $lang['lang_template_mobile_order_pay_0']?></div>
        <div class="fui-header-right">
            <a href="<?php  echo mobileUrl('order')?>" class="external"><?php  echo $lang['lang_template_mobile_order_pay_1']?></a>
        </div>
    </div>
    <div class='fui-content margin'>
        <div class="fui-cell-group">
            <div class="fui-cell">
                <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_pay_2']?></div>
                <div class="fui-cell-info"></div>
                <div class="fui-cell-remark noremark"><?php  echo $order['ordersn'];?></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_pay_3']?></div>
                <div class="fui-cell-info"></div>
                <div class="fui-cell-remark noremark"><span class='text-danger'><?php  echo $lang['lang_template_mobile_order_pay_4']?><?php  if(empty($ispeerpay)) { ?><?php  echo number_format($order['price'],2)?><?php  } else { ?><span id="peerpay"><?php  echo number_format($peerprice,2)?></span><?php  } ?></span>
                </div>
            </div>
        </div>


        <div class='fui-list-group' style="margin-top:10px;">
            <?php  if($order['price'] == 0) { ?>
            <div class='fui-list pay-btn' data-type='credit'>
                <div class='fui-list-media'>
                    <i class='icon icon-money credit'></i>
                </div>
                <div class='fui-list-inner'>
                    <div class="title"><?php  echo $lang['lang_template_mobile_order_pay_5']?></div>
                </div>
                <div class='fui-list-angle'>
                    <span class="angle"></span>
                </div>
            </div>
            <?php  } else { ?>
            <?php  if($wechat['success'] || (is_h5app() &&$payinfo['wechat'])) { ?>
            <div class='fui-list pay-btn' data-type='wechat' <?php  if(is_h5app()&&is_ios()) { ?>style="display: none;" id="threeWX"<?php  } ?>>
                <div class='fui-list-media'>
                    <i class='icon icon-wechat wechat'></i>
                </div>
                <div class='fui-list-inner'>
                    <div class="title"><?php  echo $lang['lang_template_mobile_order_pay_6']?></div>
                    <div class="subtitle"><?php  echo $lang['lang_template_mobile_order_pay_7']?></div>
                </div>
                <div class='fui-list-angle'><span class="angle"></span></div>
            </div>
            <?php  } ?>
        <?php  if(is_array($pay_type)) { foreach($pay_type as $item) { ?>
        <div class='fui-list pay-btn' data-type='RM' data-paytype="<?php  echo $item['type'];?>" data-id="<?php  echo $set['pay']['weixin_id'];?>" >
            <div class='fui-list-media'>
                <!--<i class='icon icon-wechat wechat'></i>-->
                <img src="../addons/ewei_shopv2/static/images/pay/<?php  echo $item['img'];?>" alt="">
            </div>
            <div class='fui-list-inner'>
                <div class="title"><?php  echo $item['name'];?></div>
                <div class="subtitle">easy <?php  echo $item['name'];?></div>
            </div>
            <div class='fui-list-angle'><span class="angle"></span></div>
        </div>
        <?php  } } ?>
            <?php  if(($alipay['success'] && !is_h5app()) || (is_h5app() &&$payinfo['alipay']) && empty($ispeerpay)) { ?>
            <div class='fui-list pay-btn' data-type='alipay'>
                <div class='fui-list-media'>
                    <i class='icon icon-alipay alipay'></i>
                </div>
                <div class='fui-list-inner'>
                    <div class="title"><?php  echo $lang['lang_template_mobile_order_pay_8']?></div>
                    <div class="subtitle"><?php  echo $lang['lang_template_mobile_order_pay_9']?></div>
                </div>
                <div class='fui-list-angle'><span class="angle"></span></div>
            </div>
            <?php  } ?>


            <?php  if($bestpay['success'] || (is_h5app() &&$bestpay['wechat'])) { ?>
                <div class='fui-list pay-btn' data-type='bestpay'>
                    <div class='fui-list-media'>
                        <i class='icon icon-money credit'></i>
                    </div>
                    <div class='fui-list-inner'>
                        <div class="title"><?php  echo $lang['lang_template_mobile_order_pay_10']?></div>
                        <div class="subtitle"><?php  echo $lang['lang_template_mobile_order_pay_11']?></div>
                    </div>
                    <div class='fui-list-angle'><span class="angle"></span></div>
                </div>
            <?php  } ?>



        <?php  if($credit['success']) { ?>
            <div class='fui-list pay-btn' data-type='credit'>
                <div class='fui-list-media'>
                    <i class='icon icon-money credit'></i>
                </div>
                <div class='fui-list-inner'>
                    <div class="title"><?php  echo $_W['shopset']['trade']['moneytext'];?><?php  echo $lang['lang_template_mobile_order_pay_12']?></div>
                    <div class="subtitle"><?php  echo $lang['lang_template_mobile_order_pay_13']?><?php  echo $_W['shopset']['trade']['moneytext'];?>: <span class='text-danger'><?php  echo $lang['lang_template_mobile_order_pay_14']?><?php  echo number_format($member['credit2'],2)?></span>
                    </div>
                </div>
                <div class='fui-list-angle'>
		    <span class="angle">

		    </span>
                </div>
            </div>
            <?php  } ?>
            <?php  if($cash['success'] && empty($ispeerpay)) { ?>
            <div class='fui-list pay-btn' data-type='cash'>
                <div class='fui-list-media'>
                    <i class='icon icon-deliver1 cash'></i>
                </div>
                <div class='fui-list-inner'>
                    <div class="title"><?php  echo $lang['lang_template_mobile_order_pay_15']?></div>
                    <div class="subtitle"><?php  echo $lang['lang_template_mobile_order_pay_16']?></div>
                </div>
                <div class='fui-list-angle'><span class="angle"></span></div>
            </div>
            <?php  } ?>
            <?php  if((!($ispeerpay)) && !empty($peerPaySwi)) { ?>
            <div class='fui-list pay-btn' data-type='peerpay'>
                <div class='fui-list-media'>
                    <i class='icon icon-natice peerpay' style="background: #ff9326;color: #fff"></i>
                </div>
                <div class='fui-list-inner'>
                    <div class="title"><?php  echo $lang['lang_template_mobile_order_pay_17']?></div>
                    <div class="subtitle"><?php  echo $lang['lang_template_mobile_order_pay_18']?></div>
                </div>
                <div class='fui-list-angle'><span class="angle"></span></div>
            </div>
            <?php  } ?>
            <?php  } ?>
        </div>
    </div>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('order/pay/wechat_jie', TEMPLATE_INCLUDEPATH)) : (include template('order/pay/wechat_jie', TEMPLATE_INCLUDEPATH));?>
    <script language='javascript'>require(['biz/order/pay'], function (modal) {
        modal.init(<?php  echo json_encode($payinfo)?>);
    });</script>
</div>
<input type="hidden" value="<?php  echo $peerpayMessage;?>" id="peerpaymessage">
<?php  if(is_ios()) { ?>
    <?php  $initWX=true?>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>