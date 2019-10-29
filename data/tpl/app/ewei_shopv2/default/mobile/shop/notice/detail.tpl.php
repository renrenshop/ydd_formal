<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_notice_detail.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_notice_detail.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-shop-notice-detail">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_template_mobile_shop_notice_detail_0']?></div>
        <div class="fui-header-right">&nbsp;</div>
    </div>
    <div class='fui-content'>
        <div class='fui-article'>
            <div class="title"><b><?php  echo $notice['title'];?></b></div>
            <div class='subtitle'>
                <?php  echo $lang['lang_template_mobile_shop_notice_detail_1']?> : <?php  echo date('Y-m-d H:i',$notice['createtime'])?>
            </div>
            <hr>
            <div class='content content-block'>
                <?php  echo $notice['detail'];?>
            </div>
        </div>
    </div> 
    <script >require(['init'])</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>