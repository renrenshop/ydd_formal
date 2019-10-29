<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_myshop_select.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_myshop_select.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current ">
	<div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_0']?></div>
    </div>
	<div class='fui-content navbar'>
		<div class='fui-cell-group'>
			<div class='fui-cell'>
				<div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_1']?></div>
				<div class='fui-cell-info'></div>
				<div class='fui-cell-remark noremark'><input type='checkbox' id="openselect" class='fui-switch fui-switch-success fui-switch-small' <?php  if(!empty($shop['selectgoods'])) { ?>checked<?php  } ?>/></div>
			</div>
			<div class='fui-cell-tip'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_2']?></div>
		</div>
		
		<div id="divselect" class='fui-cell-group' <?php  if(empty($shop['selectgoods'])) { ?>style='display:none'<?php  } ?>  >
			 <?php  if($_W['shopset']['shop']['category']['level']!=-1) { ?>
		         <div class='fui-cell'>
				<div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_3']?></div>
				<div class='fui-cell-info'></div>
				<div class='fui-cell-remark noremark'><input type='checkbox' id="opencategory" class='fui-switch fui-switch-success fui-switch-small' <?php  if(!empty($shop['selectcategory'])) { ?>checked<?php  } ?> /></div>
			</div>
			 <?php  } ?>
			<div class='fui-cell-tip'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_4']?></div>
			  <div class='fui-cell'>
				<div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_5']?></div>
				<div class='fui-cell-info'></div>
				<div class='fui-cell-remark noremark'><a class='btn btn-default-o btn-sm btn-select' href="#myshop-select-goods"><i class="icon icon-add"></i> <?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_6']?></a></div>
			</div>
			<div id='goods-container' class='fui-list-group goods-selected-group'>
				<?php  if(is_array($goods)) { foreach($goods as $g) { ?>
						<div class='fui-list goods-selected' data-goodsid='<?php  echo $g['id'];?>'>
					<div class='fui-list-media'>
							<img src='<?php  echo tomedia($g['thumb'])?>' class='round' />
					</div>
					<div class='fui-list-inner'>
							<div class='subtitle'><?php  echo $g['title'];?></div>
							<div class='text'><span class='text-danger'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_7']?><?php  echo $g['marketprice'];?></span></div>
							<div class='text text-right'><div class='btn btn-danger-o btn-sm btn-delete'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_8']?></div></div>
						</div>
					 </div>
				<?php  } } ?>
			</div>
		</div>
		
		<div class='btn btn-danger block btn-submit'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_9']?></div>
	</div>
	 
</div>


<div class="fui-page fui-page page-commission-selectgoods" id="myshop-select-goods">
	
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_10']?></div>
		<div class="fui-header-right" onclick='history.back()' ><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_11']?></div>
    </div>
    <div class="fui-content navbar">
	<div class="fui-fullHigh-group" >
      
        <div class="fui-fullHigh-item menu" id="tab">
            <nav class="on"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_12']?></nav>
	   <nav data-isnew="1"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_13']?></nav>
	   <nav data-isrecommand="1"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_14']?></nav>
	   <nav data-istime="1"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_15']?></nav>
    	   <nav data-isdiscount="1" ><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_16']?></nav>
		   <?php  if($_W['shopset']['category']['level']!='-1') { ?>
		   <?php  if(is_array($category['parent'])) { foreach($category['parent'] as $c1) { ?>
		          <?php  if(!$c1['enabled']) { ?><?php  continue;?><?php  } ?>
			<nav data-cate="<?php  echo $c1['id'];?>"><?php  echo $c1['name'];?></nav>
			  <?php  if(intval($_W['shopset']['category']['level'])>=2) { ?>
				<?php  if(is_array($category['children'][$c1['id']])) { foreach($category['children'][$c1['id']] as $c2) { ?>
				        <?php  if(!$c2['enabled']) { ?><?php  continue;?><?php  } ?>
					<nav data-cate="<?php  echo $c2['id'];?>"><?php  echo $c2['name'];?></nav>
					 <?php  if(intval($_W['shopset']['category']['level'])>=3) { ?>
					 	<?php  if(is_array($category['children'][$c2['id']])) { foreach($category['children'][$c2['id']] as $c3) { ?>
						    <?php  if(!$c3['enabled']) { ?><?php  continue;?><?php  } ?>
					             <nav data-cate="<?php  echo $c3['id'];?>"><?php  echo $c3['name'];?></nav>
					        <?php  } } ?>
					 <?php  } ?>
				<?php  } } ?>
			  <?php  } ?>
		   <?php  } } ?>
		   <?php  } ?>
        </div>
        <div class="fui-fullHigh-item container ">
	  
	   <form method="post" action="<?php  echo mobileUrl('goods')?>">
                <div class="searchbar" style='margin:0;padding:0'>
                    <div class="search-input">
                        <i class="icon icon-search"></i>
                        <input type="search" id='keywords' name="keywords" placeholder="<?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_17']?>...">
                    </div>
                </div>
            </form>
	    <p class='text-center text-cancel empty' style='display: none;'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_18']?></p>
	    <div class='fui-list-group goods-list-group' style='margin-top:0;display: none'></div>
	    <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> <?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_19']?>...</span></div>
	   
        </div> 
    </div>
</div>
	<script id='tpl_commission_goods_select' type='text/html'>
		<%each list as g%>
		<div class='fui-list goods-item' 
			 data-goodsid='<%g.id%>'
			 data-title='<%g.title%>'
			 data-marketprice='<%g.marketprice%>'
			 data-thumb='<%g.thumb%>'
			 >
					<div class='fui-list-media'>
						<img data-lazy='<%g.thumb%>' class='round' />
					</div>
					<div class='fui-list-inner'>
						<div class='subtitle'><%g.title%></div>
						<div class='text'><span class='text-danger'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_20']?><%g.marketprice%></span></div>
						<div class='text text-right'><input type='checkbox' class='fui-switch fui-switch-warning fui-switch-small' /></div>
					</div>
				  </div>
		<%/each%>
	</script>
	
	<script id='tpl_commission_goods_item' type='text/html'>
		 
		<div class='fui-list goods-selected' data-goodsid='<%g.id%>'>
			<div class='fui-list-media'>
					<img src='<%g.thumb%>' class='round' />
			</div>
			<div class='fui-list-inner'>
					<div class='subtitle'><%g.title%></div>
					<div class='text'><span class='text-danger'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_21']?><%g.marketprice%></span></div>
					<div class='text text-right'><div class='btn btn-danger-o btn-sm btn-delete'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_select_22']?></div></div>
				</div>
			 </div>
		 
	</script>

	<script language='javascript'>
		require(['../addons/ewei_shopv2/plugin/commission/static/js/myshop.js'], function (modal) {
			modal.initSelect();
	});
</script>

</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>