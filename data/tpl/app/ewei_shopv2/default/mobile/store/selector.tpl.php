<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_store_selector.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_store_selector.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page fui-page-current store-selector-page' id="page-store-selector">
 
	<div class="fui-header">
	    <div class="fui-header-left">
		<a class="back"></a>
	    </div>
	    <div class="title"><?php  echo $lang['lang_template_mobile_store_selector_0']?></div> 
	    <div class="fui-header-right">
			<a href="javascript:;" id="btn-near"><i class="icon icon-location"></i> <?php  echo $lang['lang_template_mobile_store_selector_1']?></a>
		</div>
	</div>
	<div class='fui-content'>
	      <div class="fui-searchbar">
		<div class="searchbar">
		       <a class="searchbar-cancel"><?php  echo $lang['lang_template_mobile_store_selector_2']?></a>
		      <div class="search-input">
		        <i class="fa fa-search"></i>
		        <input type="search" placeholder="<?php  echo $lang['lang_template_mobile_store_selector_3']?>..." id="search">
		      </div>
		</div>
	    </div>
	    <div class='content-empty' <?php  if(!empty($list)) { ?>style='display:none'<?php  } ?>>
			<i class='icon icon-store'></i>
			<br/><?php  echo $lang['lang_template_mobile_store_selector_4']?>
	     </div>
	    <div class="fui-list-group" >
		
		<?php  if(is_array($list)) { foreach($list as $store) { ?>
		<div  class="fui-list store-item" 
		      data-storeid="<?php  echo $store['id'];?>"
		      data-lng="<?php  echo floatval($store['lng'])?>"
		      data-lat="<?php  echo floatval($store['lat'])?>">
		    <div class="fui-list-media">
			<i class='icon icon-shop'></i>
		    </div>
		    <div class="fui-list-inner">
			<div class="title"> <span class='storename'><?php  echo $store['storename'];?></span></div>
			<div class="text">
			    <span class='realname'><?php  echo $store['realname'];?></span> <span class='mobile'><?php  echo $store['mobile'];?></span>
			</div>
			<div class="text">
			    <span class='address'><?php  echo $store['address'];?></span>
			</div>
			<div class="text location" style="color:green;display:none"><?php  echo $lang['lang_template_mobile_store_selector_5']?>...</div>
		    </div> 
		     <div class="fui-list-angle">
			 <?php  if(!empty($store['tel'])) { ?><a href="tel:<?php  echo $store['tel'];?>" class='external '><i class=' icon icon-phone' style='color:green'></i></a><?php  } ?>
			 <a href="<?php  echo mobileUrl('store/map',array('id'=>$store['id'],'merchid'=>$store['merchid']))?>" class='external' ><i class='icon icon-location' style='color:#f90'></i></a>
  		      </div>
		</div> 
		<?php  } } ?>
	    </div> 
	</div>
	<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1"></script>
    <script language='javascript'>
	    require(['biz/store/selector'], function (modal) {
		modal.init()
                });</script>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>