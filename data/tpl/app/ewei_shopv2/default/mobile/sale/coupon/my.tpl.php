<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_sale_coupon_my_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_sale_coupon_my_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/coupon-new.css?v=2017030302">
<div class='fui-page  fui-page-current coupon-my-page'>
    <div class="fui-header">
		<div class="fui-header-left">
			<a class="back"></a>
		</div>
		<div class="title"><?php  echo $lang['lang_template_mobile_sale_coupon_my_index_0']?></div> 
		<div class="fui-header-right">&nbsp;</div>
    </div>
	<div class='fui-content'>
		<div class='fui-tab fui-tab-danger' id='cateTab'>
			<a class="active" data-cate=''><?php  echo $lang['lang_template_mobile_sale_coupon_my_index_1']?></a>
			<a data-cate='used'><?php  echo $lang['lang_template_mobile_sale_coupon_my_index_2']?></a>
			<a data-cate='past'><?php  echo $lang['lang_template_mobile_sale_coupon_my_index_3']?></a>
		</div>
		<?php  if(empty($set['closecenter'])) { ?>
			<a class="btn btn-default-o external" style="display: block;" href="<?php  echo mobileUrl('sale/coupon')?>"><i class="icon icon-gifts"></i> <?php  echo $lang['lang_template_mobile_sale_coupon_my_index_4']?>~</a>
		<?php  } ?>
		<div class="fui-message fui-message-popup in content-empty" style="display: none; margin-top: 0; padding-top: 0; position: relative; height: auto; background: none;">
				<div class="icon ">
					<i class="icon icon-information"></i>
				</div>
				<div class="content"><?php  echo $lang['lang_template_mobile_sale_coupon_my_index_5']?>~</div>
		</div>
		<div id="container" class="coupon-container coupon-list"></div>
		<div class='infinite-loading' style="text-align: center; color: #666;">
	    	<span class='fui-preloader'></span>
	    	<span class='text'> <?php  echo $lang['lang_template_mobile_sale_coupon_my_index_6']?>...</span>
	    </div>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
	</div>

	<script id='tpl_list_coupon_my' type='text/html'>
		<%each list as coupon%>
		<%if  coupon.check == 0%>
			<a href="<?php  echo mobileUrl('sale/coupon/my/detail')?>&id=<%coupon.id%>" class="coupon-item  <%coupon.color%>">
		<% else%>
			<a href="javascript:void(0)" class="coupon-item  <%if  coupon.check == 1%><%coupon.color%> <%else%>gray<%/if%>">
		<%/if%>
			<div class="coupon-dots">
				<i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
			</div>
				<div class="coupon-type" ><%coupon.tagtitle%></div>
			<div class="coupon-left">
				<div class="title"><%=coupon.title3%></div>
				<div class="subtitle"><%=coupon.title2%></div>
			</div>
			<div class="coupon-right">
				<div class="title"><%coupon.couponname%></div>
				<div class="subtitle"><%=coupon.title5%></div>
				<div class="subtitle"><%if coupon.merchname!=''%><?php  echo $lang['lang_template_mobile_sale_coupon_my_index_7']?>[<%coupon.merchname%>]<?php  echo $lang['lang_template_mobile_sale_coupon_my_index_8']?><%/if%></div>
				<div class="usetime">
					<div class="text"><%if coupon.timestr==''%>
						<?php  echo $lang['lang_template_mobile_sale_coupon_my_index_9']?>
						<%else%>
						<%if coupon.past%>
						<?php  echo $lang['lang_template_mobile_sale_coupon_my_index_10']?>
						<%else%>
						<?php  echo $lang['lang_template_mobile_sale_coupon_my_index_11']?> <%coupon.timestr%>
						<%/if%>
						<%/if%>
						</div>
					<div class="usebtn">
						<%if  coupon.check ==2%>
						<?php  echo $lang['lang_template_mobile_sale_coupon_my_index_12']?>
						<%else if  coupon.check ==1%>
						<?php  echo $lang['lang_template_mobile_sale_coupon_my_index_13']?>
						<%else%>
						<?php  echo $lang['lang_template_mobile_sale_coupon_my_index_14']?>
						<%/if%>
					</div>
				</div>
			</div>
		</a>
		<%/each%>
	</script>
	<script language='javascript'>require(['biz/sale/coupon/my'], function (modal) {modal.init();});</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>