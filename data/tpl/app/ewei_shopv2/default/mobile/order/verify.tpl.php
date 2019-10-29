<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_verify.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_verify.php');}?>
<div class="order-verify-hidden" style="display: none;">
	<div class="verify-pop">
	    <div class="close" <?php  if(is_h5app()) { ?>style="top: 2rem;"<?php  } ?>><i class="icon icon-roundclose"></i></div>
	    <div class="qrcode">
		<div class="loading"><i class="icon icon-qrcode1"></i> <?php  echo $lang['lang_template_mobile_order_verify_0']?></div>
		<img class="qrimg" src="" />
	    </div>
	    <div class="tip">
	    	<p><?php  echo $lang['lang_template_mobile_order_verify_1']?>?</p>
	    	<p><?php  echo $lang['lang_template_mobile_order_verify_2']?></p>
	    	<p>(<?php  echo $lang['lang_template_mobile_order_verify_3']?>)</p>
	    </div>
	</div>
</div>