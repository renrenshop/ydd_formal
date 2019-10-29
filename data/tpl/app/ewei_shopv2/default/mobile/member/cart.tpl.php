<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_cart.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_cart.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page  fui-page-current member-cart-page'>
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back"></a>
		</div>
		<div class="title"><?php  echo $lang['lang_template_mobile_member_cart_0']?></div>

		<div class="fui-header-right">
			<a class="btn-edit" style="display:none"><?php  echo $lang['lang_template_mobile_member_cart_1']?></a>
		</div>

	</div>
	<div class='fui-content navbar cart-list' style="bottom: 4.9rem">
		<div id="cart_container"></div>

		<script language='javascript'>
			require(['biz/member/cart'], function (modal) {
				modal.init();
			});
		</script>
	</div>

	<div id="footer_container"></div>

	<?php  $this->footerMenus()?>
</div>


<script type="text/html" id="tpl_member_cart">
	<div class='content-empty' <%if list.length>0%>style="display:none"<%/if%>>
	<img src="<?php echo EWEI_SHOPV2_STATIC;?>images/nogoods.png" style="width: 6rem;margin-bottom: .5rem;">
	<br/>
	<p style="color: #999;font-size: .75rem"><?php  echo $lang['lang_template_mobile_member_cart_2']?></p>
	<br/>
	<a href="<?php  echo mobileUrl()?>" class='btn btn-sm btn-danger-o external'style="border-radius: 100px;height: 1.9rem;line-height:1.9rem;width:  7rem;font-size: .75rem"><?php  echo $lang['lang_template_mobile_member_cart_3']?></a>
	</div>

		<%if list.length>0%>

		<div class="fui-list-group" id="container" style="margin-top: 0px">

			<%each list as g%>
			<div class="fui-list goods-item align-start"
				 data-cartid="<%g.id%>"
				 data-goodsid="<%g.goodsid%>"
				 data-optionid="<%g.optionid%>"
				 data-seckill-maxbuy = "<%g.seckillmaxbuy%>"
				 data-seckill-selfcount = "<%g.seckillselfcount%>"
				 data-seckill-price = "<%g.seckillprice%>"
				 data-type = "<%g.type%>"
			>
				<div class="fui-list-media ">
					<input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger cartmode check-item "<%if g.selected==1%>checked<%/if%>/>
					<input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger editmode edit-item"/>
				</div>

				<div class="fui-list-media image-media">
					<a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>">
						<img id="gimg_<?php  echo $g['id'];?>" data-lazy="<%g.thumb%>" class="">
					</a>
				</div>
				<div class="fui-list-inner">
					<a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>">
						<div class="subtitle">
							<%if  g.type==4%>
							<span class='fui-label fui-label-danger'><?php  echo $lang['lang_template_mobile_member_cart_4']?></span>
							<%/if%>
							<%if  g.discounttype>0&& g.isnodiscount ==0%>
							<span class='fui-label fui-label-danger'><?php  echo $lang['lang_template_mobile_member_cart_5']?></span>
							<%/if%>
							<%if g.seckillprice>0%>
							<div class="fui fui-label fui-label-danger"><%g.seckilltag%></div>
							<%/if%>
							<%g.title%>
						</div>
						<%if g.optionid>0%>
						<div class="text cart-option cartmode">
							<div class="choose-option"><%g.optiontitle%></div>
						</div>
						<%/if%>
					</a>
					<%if g.optionid>0%>
						<div class="text  cart-option  editmode">
							<div class="choose-option" data-optionid="<%g.optionid%>"><%g.optiontitle%></div>
						</div>
					<%/if%>
					<div class='price'>
						<span class="bigprice text-danger">
						<span>RM</span>
						<span class="marketprice"><%g.marketprice%></span>
							<%if g.productprice > g.marketprice%>
								<span class="productprice">RM<%g.productprice%></span>
							<%/if%>
					</span>

						<%if g.type==4%>
							<div class="fui-number small "
								 data-value="<%g.total%>"
								 data-max="<%g.totalmaxbuy%>"
								<%if g.seckillprice>0%>
								style="display: none"
								<%/if%>
							>

						<%else%>
							<div class="fui-number small "
								 data-value="<%g.total%>"
								 data-max="<%g.totalmaxbuy%>"
								 data-min="<%g.minbuy%>"
								 data-maxtoast="<?php  echo $lang['lang_template_mobile_member_cart_8']?>{max}<%g.unit%>"
								 data-mintoast="{min}<%g.unit%><?php  echo $lang['lang_template_mobile_member_cart_9']?>"
								<%if g.seckillprice>0%>
								style="display: none"
								<%/if%>
							>
							<%/if%>
								<div class="minus">-</div>
								<input class="num shownum" type="tel" name="" value="<%g.total%>"/>
								<div class="plus ">+</div>
							</div>

						</div>
					</div>
			</div>
			<%/each%>

		</div>
	<%/if %>
</script>

<script type="text/html" id="tpl_member_cart_footer">
	<%if list.length>0%>
	<div class="fui-footer cartmode" style="bottom: 2.45rem">
		<div class="fui-list noclick">
			<div class="fui-list-media editmode  <?php  if(is_weixin()) { ?><%if height == 2436 && width == 1125%>iphonex<%/if%><?php  } ?>">
				<label class="checkbox-inline editcheckall"><input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger " />&nbsp;<?php  echo $lang['lang_template_mobile_member_cart_10']?></label>
			</div>
			<div class="fui-list-media">
				<label class="checkbox-inline checkall"><input type="checkbox" name="checkbox"
															   class="fui-radio fui-radio-danger " <%if ischeckall%>checked<%/if%>/>&nbsp;<?php  echo $lang['lang_template_mobile_member_cart_11']?></label>
			</div>
			<div class="fui-list-inner">
				<div class='subtitle'><?php  echo $lang['lang_template_mobile_member_cart_12']?>:<span class="text-danger bigprice"> <?php  echo $lang['lang_template_mobile_member_cart_13']?></span><span class='text-danger totalprice  bigprice'><%totalprice%></span></div>
				<div class='text'><?php  echo $lang['lang_template_mobile_member_cart_14']?></div>
			</div>
			<div class='fui-list-angle'>
				<div style="	width: 5rem;" class="btn  btn-submit <%if total<=0%>}btn-default disabled<%else%>btn-danger<%/if%>" <%if total<=0%>stop="1"<%/if%>><?php  echo $lang['lang_template_mobile_member_cart_15']?>(<span class='total'><%total%></span>)</div>
		</div>
	</div>
	</div>
	<div class="fui-footer editmode  <?php  if(is_weixin()) { ?><%if height == 2436 && width == 1125%>iphonex<%/if%><?php  } ?>" style="bottom: 2.45rem">
		<div class="fui-list noclick">
			<div class="fui-list-media">
				<label class="checkbox-inline editcheckall"><input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger " />&nbsp;<?php  echo $lang['lang_template_mobile_member_cart_16']?></label>
			</div>
			<div class="fui-list-inner"></div>

			<div class='fui-list-angle'>
				<div class="btn  btn-default btn-favorite disabled attention"><?php  echo $lang['lang_template_mobile_member_cart_17']?></div>
				<div class="btn  btn-danger btn-delete  disabled"><?php  echo $lang['lang_template_mobile_member_cart_18']?></div>
			</div>
		</div>
	</div>
	<%/if %>
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>


</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>