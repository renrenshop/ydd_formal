<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_sale_coupon_util_picker.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_sale_coupon_util_picker.php');}?>
<script id="tpl_coupons" type="text/html">
	<div class="coupon-picker option-picker">
		<div class="option-picker-inner coupon-picker">
			<div class="coupon-list mini">
				<%each wxcards as wxcard%>
					<div class="coupon-item  <%wxcard.color%>   "
						 data-couponname="<%wxcard.title%>"
						 data-contype="1"
						 data-wxid="<%wxcard.id%>"
						 data-wxcardid="<%wxcard.card_id%>"
						 data-wxcode="<%wxcard.code%>"
						 data-merchid="<%wxcard.merchid%>">
						<div class="coupon-dots">
							<i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
						</div>
						<div class="coupon-left">
							<div class="single"><%if wxcard.backpre%><span class="subtitle"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_0']?></span><%/if%><%wxcard.backmoney%></div>
						</div>
						<div class="coupon-right">
							<div class="title"><%wxcard.title%></div>
							<div class="usetime">
								<div class="text"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_1']?>:<%wxcard.timestr%></div>
							</div>
						</div>
						<div class="coupon-after">
							<div class="coupon-btn"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_2']?></div>
						</div>
					</div>
				<%/each%>

				<%each coupons as coupon%>
				<div class="coupon-item  <%coupon.color%> "
					 data-contype="2"
					 data-couponname="<%coupon.couponname%>"
					 data-couponid="<%coupon.id%>"
					 data-merchid="<%coupon.merchid%>">
					<div class="coupon-dots">
						<i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
					</div>
					<div class="coupon-left">
						<div class="single"><%if coupon.backpre%><span class="subtitle"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_3']?></span><%/if%><%coupon.backmoney%></div>
					</div>
					<div class="coupon-right">
						<div class="title"><%coupon.couponname%></div>
						<div class="usetime">
							<div class="text"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_4']?>:<%coupon.timestr%></div>
						</div>
					</div>
					<div class="coupon-after">
						<div class="coupon-btn"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_5']?></div>
					</div>
				</div>
				<%/each%>
			</div>
		</div>
		<div class="fui-navbar" style="z-index: 999">
			<a class="nav-item btn btn-default btn-cancel"  style="color: #666"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_6']?></a>
			<a class="nav-item btn btn-danger btn-confirm"><?php  echo $lang['lang_template_mobile_sale_coupon_util_picker_7']?></a>
		</div>
	</div>
</script>