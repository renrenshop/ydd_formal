<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_pay_wechat_jie.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_pay_wechat_jie.php');}?>
<div class="order-verify-hidden order-weixinpay-hidden" style="display: none; z-index: 9999">
    <div class="verify-pop">

        <div class="qrcode" style="top:1rem;">
            <div class="loading"><i class="icon icon-qrcode1"></i> <?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_0']?></div>
            <img class="qrimg" src="" />
        </div>
        <div class="tip" style="top:270px;">
            <p><?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_1']?>: <span class='text-danger'><?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_2']?> <span  id="qrmoney">-</span></span></p>
        </div>
        <div class="tip" style="top:290px;">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_3']?>, <?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_4']?></p>
            <p><?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_5']?>, <?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_6']?></p>
            <p>&nbsp;</p>
            <p>
            <div class="btn btn-default btn-sm" id="btnWeixinJieCancel"><?php  echo $lang['lang_template_mobile_order_pay_wechat_jie_7']?> </div>
            </p>
        </div>
    </div>
</div>