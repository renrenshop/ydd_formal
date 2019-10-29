<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_down.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_down.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-commission-down">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $this->set['texts']['mydown']?>(<?php  echo $total;?>)</div>
    </div>
    <div class="fui-content navbar">
        <?php  if($this->set['level']>=2) { ?>
        <div class="fui-tab fui-tab-warning" id="tab">
            <a class="active" href="javascript:void(0)" data-tab='level1'><?php  echo $this->set['texts']['c1']?>(<?php  echo $level1;?>)</a>
            <?php  if($this->set['level']>=2) { ?><a href="javascript:void(0)" data-tab='level2'><?php  echo $this->set['texts']['c2']?>(<?php  echo $level2;?>)</a><?php  } ?>
            <?php  if($this->set['level']>=3) { ?><a href="javascript:void(0)" data-tab='level3'><?php  echo $this->set['texts']['c3']?>(<?php  echo $level3;?>)</a><?php  } ?>
        </div>
        <?php  } ?>


        <div class="fui-title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_0']?> <i class="icon icon-favor text-danger"></i> <?php  echo $lang['lang_plugin_commission_template_mobile_default_down_1']?><?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_2']?><?php  echo $this->set['texts']['down']?>
            
        </div>
        <div class="fui-list-group" id="container"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> <?php  echo $lang['lang_plugin_commission_template_mobile_default_down_3']?>...</span></div>

		<div class='content-empty' style='display:none;'>
			<i class='icon icon-group'></i><br/><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_4']?>
		</div>

    </div>


	<script id='tpl_commission_down_list' type='text/html'>
		<%each list as user%>
		<div class="fui-list">
			<div class="fui-list-media">
				<%if user.avatar%>
				<img data-lazy="<%user.avatar%>" class="round">
				<%else%>
				<i class="icon icon-my2"></i>
				<%/if%>
			</div>
			<div class="fui-list-inner">
				<div class="row">
				      <div class="row-text">
					  <%if user.isagent==1 && user.status==1%>
					  <i class="icon icon-favor text-danger"></i>
					  <%/if%>
					  <%if user.nickname%><%user.nickname%><%else%><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_5']?><%/if%>
				      
				      </div>
				</div>
				<div class="subtitle">
				      <%if user.isagent==1 && user.status==1%>
				    <?php  echo $lang['lang_plugin_commission_template_mobile_default_down_6']?><?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_7']?>: <%user.agenttime%>
				    <%else%>
				    <?php  echo $lang['lang_plugin_commission_template_mobile_default_down_8']?>:  <%user.createtime%>
				    <%/if%>
				    
				</div>
			</div>
			<div class="row-remark">
				<%if user.isagent==1 && user.status==1%>
				<p>+<%user.commission_total%></p>
				<p><%user.agentcount%><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_9']?></p>
				<%else%>
				<p><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_10']?>: <%user.moneycount%><?php  echo $this->set['texts']['yuan']?></p>
				<p><%user.ordercount%><?php  echo $lang['lang_plugin_commission_template_mobile_default_down_11']?></p>
				<%/if%>
				
			</div>
		</div>
		<%/each%>
	</script>

	<script language='javascript'>
		require(['../addons/ewei_shopv2/plugin/commission/static/js/down.js'], function (modal) {
			modal.init({fromDetail: false});
		});
	</script>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
