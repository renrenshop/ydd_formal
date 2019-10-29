<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_category.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_category.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php  if($groupsset['followbar'] ==1) { ?>
<?php  $this->followBar()?>
<?php  } ?>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/groups/template/mobile/default/css/style.css?v=2018531" />
<div class='fui-page creditshop-index-page'>
	<div class="fui-header" style="z-index: 100;">
		<div class="fui-header-left">
			<a class="back"></a>
		</div>
		<div class="title"><?php  echo $category_name['name'];?></div>
		<div class="fui-header-right">
			<?php  if(!is_h5app()) { ?>
			<a href="javascript:void(0);" class="icon icon-menu category_menu"></a>
			<?php  } ?>
		</div>
		<div class="category_menu_list">
			<a href="<?php  echo mobileUrl('groups/category');?>" class="external">全部活动</a>
			<?php  if(is_array($category)) { foreach($category as $cate) { ?>
			<a href="<?php  echo mobileUrl('groups/category',array('category'=>$cate['id']));?>" class="external"><?php  echo $cate['name'];?></a>
			<?php  } } ?>
		</div>
		<div class="lynn-mask fui-mask-m"></div>
	</div>
	<div class='fui-content navbar order-list' style="padding-bottom:0;">
		<?php  if(!is_mobile()) { ?><div class="pcshop-index"><?php  } ?>
		<div class="fui-searchbar">
			<div class="searchbar">
				<a class="searchbar-cancel" id="search">搜索</a>
				<div class="search-input">
					<i class="icon icon-search"></i>
					<input type="search" id="keyword" placeholder="输入关键字..." value="<?php  echo $keyword;?>">
				</div>
			</div>
		</div>
		<div class='fui-content-inner'style="padding:0;">
			<div class='content-loading'>
				<span class='fui-preloader'></span>
				<span class='text'>正在加载活动...</span>
			</div>
			<div class='content-empty'>
				<div class="fui-message fui-message-popup in">
					<div class="icon ">
						<i class="icon icon-information"></i>
					</div>
					<div class="content">未找到任何活动</div>
					<a class="btn btn-default btn-default block" href="<?php  echo mobileUrl('groups')?>">去首页逛逛</a>
					<a class="btn btn-default btn-default block back">返回上一页</a>
				</div>
			</div>
			<ul class="lynn_index_list_ul row" id="container" style="background: none;"></ul>
		</div>
		<?php  if(!is_mobile()) { ?></div><?php  } ?>
	</div>
	<script id='tpl_list' type='text/html'>
		<%each list as item%>
		<li class="lynn_index_list_li fui-list goods-list">
			<a href="<?php  echo mobileUrl('groups/goods')?>&id=<%item.id%>" class="lynn_index_list_a fui-list-media">
				<img src="<%item.thumb%>" alt="<%item.title%>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
			</a>
			<div class="lynn_index_list_info fui-list-inner" onclick="window.location.href='<?php  echo mobileUrl('groups/goods')?>&id=<%item.id%>';">
				<h3><span class="person"><%if item.is_ladder == '1'%>阶梯团<%else%><%item.groupnum%>人团<%/if%></span><%item.title%></h3>
				<span>
					原价：¥<%item.price%>
				</span>
				<div class="price">
					<span><%item.groupsprice%>/<%item.goodsnum%><%if item.units%><%item.units%><%else%>件<%/if%></span>
					<a href="<?php  echo mobileUrl('groups/goods')?>&id=<%item.id%>" class="lynn_index_list_team_a">去拼团 </a>
				</div>
				<!--<div class="lynn_index_list_team">-->
					<!--<%if item.is_ladder == '1'%>-->
					<!--<span class="lynn_index_list_team_left">-->
							<!--<strong><i class="icon icon-group"></i></strong>阶梯团享受不同的价格优惠-->
						<!--</span>-->
					<!--<a href="<?php  echo mobileUrl('groups/goods')?>&id=<%item.id%>" class="lynn_index_list_team_a">去拼团 ></a>-->
					<!--<%/if%>-->
					<!--<%if item.more_spec == '1'%>-->
					<!--<span class="lynn_index_list_team_left">-->
							<!--<strong><i class="icon icon-group"></i></strong>多规格团,总有一款适合你-->
						<!--</span>-->
					<!--<%else%>-->
					<!--<span class="lynn_index_list_team_left">-->
							<!--<strong><i class="icon icon-group"></i></strong>-->
							<!--<%item.groupnum%>人团 ¥<em><%item.groupsprice%></em>/<%item.goodsnum%><%if item.units%><%item.units%><%else%>件<%/if%>-->
						<!--</span>-->
					<!--<%/if%>-->
					<!--<a href="<?php  echo mobileUrl('groups/goods')?>&id=<%item.id%>" class="lynn_index_list_team_a">去拼团 ></a>-->
				<!--</div>-->
			</div>
		</li>
		<%/each%>
	</script>

	<script language="javascript">
		require(['../addons/ewei_shopv2/plugin/groups/static/js/category.js'],function(modal){
			modal.init({category: "<?php  echo $_GPC['category'];?>", keyword: "<?php  echo $_GPC['keyword'];?>"});
		});
	</script>
	<script language="javascript">
		$(function(){
			$(".category_menu_list").css("display","none")
			$(".category_menu").bind('click',function(){
				var $list = $("div.category_menu_list");
				if($list.css("display") == 'block'){
					$list.hide();
					$(".lynn-mask").hide();
				}else{
					$list.show();
					$(".lynn-mask").show();
				}
			})
			$(".lynn-mask").bind("click",function(){
				var $list = $("div.category_menu_list");
				if($list.css("display") == 'block'){
					$list.hide();
					$(".lynn-mask").hide();
				}else{
					$list.show();
					$(".lynn-mask").show();
				}
			})
			$("#search").click(function(){
				var kw = $.trim($("#keyword").val());
				location.href = "<?php  echo mobileUrl('groups/category')?>&keyword="+kw+"&cate="+"<?php  echo $category_name['id'];?>";
			});
		});
	</script>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>