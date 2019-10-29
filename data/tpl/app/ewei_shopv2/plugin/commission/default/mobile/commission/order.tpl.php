<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_order.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_order.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-commission-order">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $this->set['texts']['order']?></div>
		 
    </div>
    <div class="fui-content navbar">
		<div class='fui-cell-group' style='margin-top:0px;'>
			<div class='fui-cell'>
				<div class='fui-cell-label' style='width:auto'><?php  echo $this->set['texts']['commission_total']?></div>
				<div class='fui-cell-info'></div>
				<div class='fui-cell-remark noremark'>+<?php  echo number_format($member['commission_total'],2)?><?php  echo $this->set['texts']['yuan']?></div>
			</div>
		</div>
        <div class="fui-tab fui-tab-warning" id="tab">
            <a class="active" data-tab='status'><?php  echo $lang['lang_plugin_commission_template_mobile_default_order_0']?></a>
            <a href="javascript:void(0)" data-tab='status0'><?php  echo $lang['lang_plugin_commission_template_mobile_default_order_1']?></a>
            <a href="javascript:void(0)" data-tab='status1'><?php  echo $lang['lang_plugin_commission_template_mobile_default_order_2']?></a>
            <a href="javascript:void(0)" data-tab='status3'><?php  echo $lang['lang_plugin_commission_template_mobile_default_order_3']?></a>
        </div>

        <div class='content-empty' style='display:none;'>
            <i class='icon icon-list'></i><br/><?php  echo $lang['lang_plugin_commission_template_mobile_default_order_4']?>
        </div>
        <div class="fui-according-group" id="container"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> <?php  echo $lang['lang_plugin_commission_template_mobile_default_order_5']?>...</span></div>
   </div>
</div>

<script id='tpl_commission_order_list' type='text/html'>
    <%each list as order%>
    <div class='fui-according'>
        <div class='fui-according-header'>
                    <span class="left"><%order.ordersn%>(<%order.level%>)<br>
                        <span><%order.createtime%></span>
                    </span>
            <span class="right">+<%order.commission%><br><span><%order.status%></span></span>
            <?php  if(!empty($this->set['openorderdetail']) || !empty($this->set['openorderbuyer'])) { ?>
            <span class="remark"></span>
            <?php  } ?>
        </div>
        <?php  if(!empty($this->set['openorderdetail']) || !empty($this->set['openorderbuyer'])) { ?>
        <div class='fui-according-content'>
            <div class='content-block'>
                <?php  if(!empty($this->set['openorderbuyer'])) { ?>
                <div class="fui-list">
                    <div class="fui-list-media">
                        <img data-lazy="<%order.buyer.avatar%>" class="round" style='width:2rem;height:2rem;'>
                        <!--<div class="badge">1</div>-->
                    </div>
                    <div class="fui-list-inner">
                        <div class="row">
                            <div class="row-text" style="font-size: 15px"><%order.buyer.nickname%></div>
                        </div>
                        <div class="subtitle" style="font-size: 15px"><?php  echo $lang['lang_plugin_commission_template_mobile_default_order_6']?>: <%order.buyer.weixin%></div>
                    </div>
                </div>
                <?php  } ?>
                <?php  if(!empty($this->set['openorderdetail'])) { ?>
                <%each order.order_goods as g%>
                <div class="fui-list">
                    <div class="fui-list-media">
                        <img data-lazy="<%g.thumb%>" class="round" style='width:2rem;height:2rem;'>
                    </div>
                    <div class="fui-list-inner">
                        <div class="row">
                            <div class="row-text" style="font-size: 14px"><%g.title%></div>
                        </div>
                        <div class="subtitle" style="font-size: 14px"><%g.optionname%>x<%g.total%></div>
                    </div>
                    <div class="row-remark">
                        <p><?php  echo $lang['lang_plugin_commission_template_mobile_default_order_7']?></p>
                        <p>+<%g.commission%></p>
                    </div>
                </div>
                <%/each%>
                <?php  } ?>
                <?php  } ?>
            </div>
        </div>
    </div>
    <%/each%>
</script>

<script language='javascript'>
    require(['../addons/ewei_shopv2/plugin/commission/static/js/order.js'], function (modal) {
    modal.init({fromDetail:false});
});
</script>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
