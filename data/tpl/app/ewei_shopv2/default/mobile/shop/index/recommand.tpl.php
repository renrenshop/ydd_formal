<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_recommand.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_recommand.php');}?>
<div id="recommand"></div>
<div class='infinite-loading' style="text-align: center; color: #666;">
	<span class='fui-preloader'></span>
	<span class='text'> <?php  echo $lang['lang_template_mobile_shop_index_recommand_0']?>...</span>
</div>
<script type="text/html" id="tpl_recommand">
	<%if list!=''%>
		<%if page==1%>
			<div class="fui-line" style="background: #f4f4f4;">
				<div class="text text-danger"><i class="icon icon-hotfill"></i> <?php  echo $lang['lang_template_mobile_shop_index_recommand_1']?></div>
			</div>
			<div class="fui-goods-group block border">
		<%/if%>
		
			<%each list as item%>
				<div class="fui-goods-item" data-goodsid="<%item.id%>" data-type="<%item.type%>">
					<a <%if item.bargain>0%>href="<?php  echo mobileUrl('bargain/detail')?>&id=<%item.bargain%>"<%else%>href="<?php  echo mobileUrl('goods/detail')?>&id=<%item.id%>"<%/if%>>
						<div class="image" data-lazy-background="<%item.thumb%>">
							<%if item.total<=0%><div class="salez" style="background-image: url('<?php  echo tomedia($_W['shopset']['shop']['saleout'])?>'); "></div><%/if%>
						</div>
					</a>
					<div class="detail">
						<a <%if item.bargain>0%>href="<?php  echo mobileUrl('bargain/detail')?>&id=<%item.bargain%>"<%else%>href="<?php  echo mobileUrl('goods/detail')?>&id=<%item.id%>"<%/if%>>
							<div class="name">
								<%if item.ispresell==1%><i class="fui-tag fui-tag-danger"><?php  echo $lang['lang_template_mobile_shop_index_recommand_2']?></i><%/if%>
								<%item.title%>
							</div>
						</a>
						<div class="price">
							<span class="text"><?php  echo $lang['lang_template_mobile_shop_index_recommand_3']?><%item.minprice%></span>
							<span class="buy" data-type="<%item.type%>" ><%if item.bargain>0%><?php  echo $lang['lang_template_mobile_shop_index_recommand_4']?><%else%><i class="icon icon-cart"></i><%/if%></span>
						</div>
					</div>
				</div>

			<%/each%>
			
		<%if page==1%>
			</div>
		<%/if%>
		
	<%/if%>
</script>
<script language='javascript'>
	require(['biz/shop/index'], function (modal) {modal.init({merchid:<?php  echo intval($_GPC['merchid'])?>})});
</script>