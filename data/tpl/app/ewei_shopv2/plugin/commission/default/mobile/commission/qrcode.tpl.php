<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_qrcode.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_qrcode.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-commission-shares">
    <?php  if(is_h5app()) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_0']?></div>
        <div class="fui-header-right"></div>
    </div>
    <?php  } ?>
    <div class="fui-content">
        <?php  if(!empty($goods)) { ?>
        <div class="fui-list-group">
            <div class="fui-list">
                <div class="fui-list-media">
                    <i class="icon icon-money"></i>
                </div>
                <div class="fui-list-inner">
                    <div class="row">
                        <div class="row-text"><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_1']?><?php  echo $this->set['texts']['commission1']?> <span class='text-danger'><?php  echo $commission;?></span> <?php  echo $this->set['texts']['yuan']?>
                        </div>
                    </div>
                    <div class="subtitle"><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_2']?> <span><?php  echo $goods['sales'];?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_3']?></div>
                </div>
            </div>
        </div>
        <?php  } ?>
        <!-- <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_4']?> <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_5']?> -->
        <div class="img" id='posterimg'>
	    <div class='fui-cell-group'>
		<div class='fui-cell'>
		    <div class='fui-cell-info text-center'><div class="fui-preloader"></div><br/><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_6']?>...</div>
		</div>
	    </div>
	    <img src="" style="display:none;" />
        </div>
        <div class="fui-title"><i class="icon icon-smile"></i> <?php  if(empty($set['qrcode']) || (!empty($set['qrcode'])&&empty($set['qrcode_title']))) { ?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_7']?><?php  } else { ?><?php  echo $set['qrcode_title'];?><?php  } ?></div>
        <div class="fui-list-group">

            <?php  if(empty($set['qrcode']) || (!empty($set['qrcode'])&&empty($set['qrcode_content']))) { ?>
            <div class="fui-list">
                <div class="fui-list-media">
                    <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_8']?>
                </div>
                <div class="fui-list-inner">
                    <div class="subtitle"><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_9']?></div>
                </div>
            </div>
            <div class="fui-list">
                <div class="fui-list-media">
                    <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_10']?>
                </div>
                <div class="fui-list-inner">
                    <div class="subtitle"><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_11']?><?php  if($this->set['become_child']==1) { ?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_12']?><?php  } ?><?php  if($this->set['become_child']==2) { ?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_13']?><?php  } ?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_14']?>, <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_15']?><?php  echo $this->set['texts']['commission1']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_16']?>
                    </div>
                </div>
            </div>

            <div class="fui-list">
                <div class="fui-list-media">
                    <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_17']?>
                </div>
                <div class="fui-list-inner">
                    <div class="subtitle"><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_18']?><?php  echo $this->set['texts']['center']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_19']?><?php  echo $this->set['texts']['mydown']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_20']?><?php  echo $this->set['texts']['order']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_21']?><?php  echo $this->set['texts']['commission']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_22']?><?php  echo $this->set['texts']['withdraw']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_23']?>
                    </div>
                </div>
            </div>
            <?php  } else { ?>

            <div class="fui-list">
                <div class="fui-list-inner">
                    <div class="subtitle" style="text-indent: 2em;"><?php  echo $set['qrcode_content'];?></div>
                </div>
            </div>
            <?php  } ?>
            <div class="fui-list">
                <div class="fui-card">
                    <div class="fui-card-content">
                        <?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_24']?><?php  if(empty($set['qrcode']) || (!empty($set['qrcode'])&&empty($set['qrcode_remark']))) { ?><?php  echo $lang['lang_plugin_commission_template_mobile_default_qrcode_25']?><?php  } else { ?><?php  echo $set['qrcode_remark'];?><?php  } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script language='javascript'>
		require(['../addons/ewei_shopv2/plugin/commission/static/js/qrcode.js'], function (modal) {
			modal.init({goodsid: <?php  echo intval($_GPC['goodsid'])?>});
		});
	</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
