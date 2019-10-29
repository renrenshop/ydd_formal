<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_myshop_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_myshop_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $shop['name'];?>"; </script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page fui-page-current page-commission-myshop'>
<?php  $this->followBar()?>

	<?php  if(is_h5app()) { ?>
	<div class="fui-header">
		<div class="fui-header-left"></div>
		<div class="title"><?php  echo $shop['name'];?></div>
		<div class="fui-header-right"></div>
	</div>
	<?php  } ?>

    <div class='fui-content navbar'>

	<div class="myshop-header">
	    <div class="image">
		<img src="<?php  echo tomedia($shop['img'])?>"  />
	    </div>
	   
	    <div class="menus">
		 <div class='shopname'>
	      <?php  echo $shop['name'];?>
	    </div>
		<div class="shoplogo">
		    <img src="<?php  echo tomedia($shop['logo'])?>"  />
		</div>
		<div class="nav" onclick="location.href='<?php  echo mobileUrl('goods', array('frommyshop'=>1))?>'">
		    <p><?php  echo $goodscount;?></p>
		    <p><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_0']?></p>
		</div>
		<div class="nav btn-favorite">
		    <p><i class="icon icon-favorite"></i></p>
		    <p><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_1']?></p>
		</div>
		
		<div class="nav btn-qrcode"  
		     <?php  if($mid==$member['id'] && $member['isagent']==1 && $member['status']==1) { ?>
		     onclick="location.href='<?php  echo mobileUrl('commission/qrcode')?>'">
		    <?php  } else { ?>
		    onclick="location.href='<?php  echo mobileUrl('commission/qrcode',array('mid'=>$mid))?>'"
		    <?php  } ?>
		    <p><i class="icon icon-qrcode"></i></p>
		    <p><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_2']?></p> 
		</div>
	    </div>
	</div>
	<form action="<?php  echo mobileUrl('goods')?>" method="post">
	<div class="fui-searchbar">
	    <div class="searchbar center">
		<div class="search-input">
		    <input type="search" name='keywords' class="search" placeholder="<?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_3']?>...">
		</div>
	    </div>
	</div>
	  </form>
	
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('shop/index/cube', TEMPLATE_INCLUDEPATH)) : (include template('shop/index/cube', TEMPLATE_INCLUDEPATH));?>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('shop/index/goods', TEMPLATE_INCLUDEPATH)) : (include template('shop/index/goods', TEMPLATE_INCLUDEPATH));?>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('shop/index/banner', TEMPLATE_INCLUDEPATH)) : (include template('shop/index/banner', TEMPLATE_INCLUDEPATH));?>
	
	
	 <div class="fui-line" style="background: #f4f4f4;">
	         <div class="text text-danger"><i class="icon icon-hotfill"></i> <?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_4']?></div>
	 </div>
	<div class="fui-goods-group block" id='container'></div>
	<div class='infinite-loading' style="text-align: center; color: #666;">
	<span class='fui-preloader'></span>
	<span class='text'> <?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_5']?>...</span>
</div>
	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
    </div>
    <div id='cover'>
            <div class='fui-mask-m visible'></div>
            <div class='arrow'></div>
            <div class='content'><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_6']?><br/><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_7']?><br/><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_8']?></div>
</div>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>
    <script type="text/html" id="tpl_commission_myshop_goods_list">
	 
		
			<%each list as g%>
				<div class="fui-goods-item" data-goodsid="<%g.id%>">
					<a href="<?php  echo mobileUrl('goods/detail', array('frommyshop'=>1))?>&id=<%g.id%>">
						<div class="image" data-lazy-background="<%g.thumb%>">
							<%if g.total<=0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>
						</div>
					</a>
					<div class="detail">
						<a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.id%>">
							<div class="name"><%g.title%></div>
						</a>
						<div class="price">
							<span class="text"><?php  echo $lang['lang_plugin_commission_template_mobile_default_myshop_index_9']?><%g.minprice%></span>
							<span class="buy"><i class="icon icon-cart"></i></span>
						</div>
					</div>
				</div>

			<%/each%>
	 
</script>
<script language='javascript'>
	require(['../addons/ewei_shopv2/plugin/commission/static/js/myshop.js'], function (modal) {modal.init("<?php  echo intval($_GPC['mid'])?>");});
</script>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>