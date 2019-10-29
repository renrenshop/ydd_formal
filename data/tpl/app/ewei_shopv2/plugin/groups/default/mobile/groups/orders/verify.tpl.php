<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_orders_verify.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_orders_verify.php');}?>
<div class="order-verify-hidden" style="display: none;">
	<div class="verify-pop">
	    <div class="close"><i class="icon icon-roundclose"></i></div>
	    <div class="qrcode">
		<div class="loading"><i class="icon icon-qrcode1"></i> 正在生成二维码</div>
		<img class="qrimg" src="" />
	    </div>
	    <div class="tip">
	    	<p>如果无法扫描?</p>
	    	<p>请使用拼团核销码</p>
	    	<p>(请将此二维码出示给店员进行核销)</p>
	    </div>
	</div>
</div>
