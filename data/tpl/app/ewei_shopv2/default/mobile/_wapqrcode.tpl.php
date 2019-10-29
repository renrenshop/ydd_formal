<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__wapqrcode.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__wapqrcode.php');}?>
<?php  if(!empty($currenturl)) { ?>
<div class="wap-qrcode-container">
    <p class="example1"><?php  echo $shopname;?></p>
    <div class="wap-qrcode-image" id="wap-qrcode"></div>
    <p class="example1"><?php  echo $lang['lang_template_mobile__wapqrcode_0']?></p>
</div>
<script language="javascript">
    $(function(){
     setTimeout(function(){
         require(['jquery.qrcode'],function(q){
             $('#wap-qrcode').html('');
             $('#wap-qrcode').qrcode("<?php  echo $currenturl;?>");
         });
     },500);

    })
</script>
<?php  } ?>