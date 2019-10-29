<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_goods_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_goods_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php  if($groupsset['followbar'] ==1) { ?>
<?php  $this->followBar()?>
<?php  } ?>
<title>商品详情</title>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/groups/template/mobile/default/css/style.css?v=2018531" />
<style type="text/css">
	.creditshop-detail-page .fui-navbar .abtn{height:2.6rem;width:40%;font-size:12px;-webkit-border-radius: 0;border-radius: 0;padding:0.5rem 0 0 0;display: block;float:left;
		line-height: 0.8rem;}
	.creditshop-detail-page .fui-navbar .homeabtn{height:2.6rem;width:20%;font-size:12px;-webkit-border-radius: 0;border-radius: 0;margin:0;padding:0;display: block;float:left;background: #fff;
		color:#666;border:none;line-height: 2.6rem;}
	.homeabtn .icon{font-size:1rem;}
	.text-danger span{color:#ef4f4f;font-size:1rem;}
	.lynn_goods_head_title i{
		font-style: normal;
		font-size: 0.55rem;
		color: #999;
		text-align: right;
		margin-left: 0.5rem;
	}
</style>
<script  language='javascript'>
    function getHeight (obj){
        var w = obj.width;
        var h = obj.height;
        console.error('h:'+ h +'     w:'+w)

        var height = ((750*h) / w) / 40 + 'rem';
        $('.fui-swipe').css('height', height );
        $('.fui-swipe .fui-swipe-wrapper .fui-swipe-item img').css('height', height);
    }
</script>
<div class='fui-page creditshop-detail-page'>
	<?php  if(is_h5app()) { ?>
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back"></a>
		</div>
		<div class="title"><?php  echo m('plugin')->getName('groups')?></div>
		<div class="fui-header-right"></div>
	</div>
	<?php  } else { ?>
	<a href="<?php  echo mobileUrl('order')?>" class="iconfont icon lynn_back_icon back">&#xe755;</a>
	<?php  } ?>

	<div class='fui-content'>
		<?php  if(!is_mobile()) { ?><div class="pcshop-index"><?php  } ?>
		<div class="fui-swipe" data-speed="5000" data-gap="5" style="height: 0;">
			<div class="fui-swipe-wrapper">
				<?php  if(is_array($goods['thumb_url'])) { foreach($goods['thumb_url'] as $index => $thumb) { ?>
				<div class="fui-swipe-item">
					<?php  if($index == "0" ) { ?>
					<img src="<?php  echo tomedia($thumb)?>" onload="getHeight(this)" alt="<?php  echo $goods['title'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
					<?php  } else { ?>
					<img src="<?php  echo tomedia($thumb)?>" alt="<?php  echo $goods['title'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
					<?php  } ?>
				</div>
				<?php  } } ?>
			</div>
			<div class="fui-swipe-page">
				<?php  if(is_array($goods['thumb_url'])) { foreach($goods['thumb_url'] as $thumb) { ?>
				<div class="fui-swipe-bullet"></div>
				<?php  } } ?>
			</div>
		</div>
		<div class="lynn_goods_head">
			<h2 class="lynn_goods_head_title" style="font-size: 0.7rem;"><?php  if($goods['is_ladder'] ==1) { ?><span>阶梯团</span><?php  } else { ?><span><?php  echo $goods['groupnum'];?>人团</span><?php  } ?> <?php  echo $goods['title'];?><br> <i><?php  echo $goods['description'];?></i></h2>
			<span class="lynn_goods_follow" style="display: none;">
				<i class="iconfont icon">&#xe606;</i><i class="iconfont icon on">&#xe605;</i>收藏
			</span>

			<div class="subtitle">
				已有<b><?php  echo $goods['fightnum'];?></b>人参团，销量<b><?php  echo $goods['sales'];?></b>
			</div>
			<div class="price">
				<strong>¥ <?php  echo $goods['groupsprice'];?>/<?php  if($goods['units']) { ?><?php  echo $goods['goodsnum'];?><?php  echo $goods['units'];?><?php  } else { ?>1件<?php  } ?></strong> <del>原价¥ <?php  echo $goods['price'];?></del>
			</div>
			<?php  if(!empty($goods['isdiscount']) && !empty($goods['discount']) && !empty($groupsset['discount'])) { ?>
			<div class="lynn_goods_discount" style="color: #333">
				<i class="icon icon-gengduocopy" style="color: #ff5555;font-size: 0.8rem;margin-right: 0.2rem;"></i>团长优惠 <span style="color: #ff5555"><?php  if($goods['headstype']==0) { ?> ¥<?php  echo $goods['headsmoney'];?><?php  } else if($goods['headstype']==1) { ?><?php  echo (number_format($goods['headsdiscount'] / 10,1))?>折<?php  } ?></span>
			</div>
			<?php  } ?>
			<?php  if(!empty($goods['isdiscount']) && empty($goods['discount']) && !empty($groupsset['discount'])) { ?>
			<div class="lynn_goods_discount" style="color: #333">
				团长优惠 <span style="color: #ff5555"><?php  if($groupsset['headstype']==0) { ?> ¥<?php  echo $groupsset['headsmoney'];?><?php  } else if($groupsset['headstype']==1) { ?><?php  echo (number_format($groupsset['headsdiscount'] / 10,1))?>折<?php  } ?></span>
			</div>
			<?php  } ?>
		</div>

		<div class="lynn_goods_invitation">
			<div class="invitation-title">拼团玩法</div>
			<div class="fui-cell-group" style="margin-top: 0">
				<a href="<?php  echo mobileUrl('groups/team/rules')?>" class="fui-cell" style="text-decoration:none;padding: 0.4rem 0.6rem 0.45rem 0;">
					<div class="fui-cell-info" style="color: #999;font-size: 0.65rem;">开团并邀请好友参团，人数不足自动退款</div>
					<div class="fui-cell-remark"></div>
				</a>
			</div>
		</div>
		<div class="lynn_goods_content">
			<div class="lynn_goods_content_title"><span>图文详情</span></div>
			<div class="lynn_goods_content_info content-images" id="content">
				<?php  if($groupsset['description']) { ?>
				<?php  echo htmlspecialchars_decode($groupsset['groups_description'])?>
				<?php  } else { ?>
				<?php  echo htmlspecialchars_decode($goods['content'])?>
				<?php  } ?>
			</div>
		</div>
		<div style="height:2.5rem;"></div>
		<?php  if(!is_mobile()) { ?></div><?php  } ?>
	</div>
	<div class="fui-navbar bordert" style="z-index:100;padding:0;display: flex;-webkit-flex: 1">
		<a class="homeabtn btn btn-warning <?php  if(empty($goods['stock'])) { ?>disabled<?php  } ?> external" style="padding-top: 0.3rem" href="<?php  echo mobileUrl('groups')?>">
			<p class="icon icon-home1" style="line-height: 1rem"></p>
			<p style="line-height: 1rem">拼团首页</p>
		</a>
		<?php  if($goods['single']) { ?>
		<a class="lynn_goods_btn lynn_btn_waring btn-single" href="javascript:void(0);">
			<p><?php  if($goods['single']) { ?>¥ <strong><?php  echo $goods['singleprice'];?></strong><?php  } else { ?><br /><?php  } ?></p> 单独购买
		</a>
		<?php  } ?>
		<a class="lynn_goods_btn lynn_btn_danger" data-nocache="true" href="<?php  echo mobileUrl('groups/goods/openGroups',array('id'=>$goods['id'],'is_ladder'=>$goods['is_ladder'],'more_spec'=>$goods['more_spec']))?>">
			<?php  if($goods['is_ladder'] ==1) { ?>
			<p style="margin-top: 10px"><strong>参加阶梯团</strong></p>
			<?php  } else if($goods['more_spec'] ==1) { ?>
			<p>¥ <strong><?php  echo $goods['groupsprice'];?></strong></p> <?php  echo $goods['groupnum'];?>人成团
			<?php  } else { ?>
			<p>¥ <strong><?php  echo $goods['groupsprice'];?></strong></p> <?php  echo $goods['groupnum'];?>人成团
			<?php  } ?>
		</a>
	</div>
	<div class='layer'style="display: none" ></div>
	<!--多规格弹窗  -->
	<div class='fui-modal goods-picker in goodslist' style="display: none">
		<div class='option-picker'>
			<div class='option-picker-inner'>
				<div class='fui-list'>
					<div class='fui-list-media'>
						<image class='thumb' src=<?php  echo $goods['thumb'];?>></image>

					</div>
					<div class='fui-list-inner'>
						<div class='subtitle'><?php  echo $goods['title'];?></div>
						<div class='price'><?php  echo $goods['groupsprice'];?></div>
						<div class='option_id'style="display: none" ></div>
					</div>
				</div>
				<div class='option-picker-options'>
					<div class='option-picker-cell option spec'>

					</div>
				</div>
			</div>
			<div class='sure'><div class='btn btn-danger block'>确定</div></div>
		</div>
		<div class='icon icon-guanbi1' style='color:#fff;text-align:center;font-size:1.25rem;margin-top:0.75rem;' bindtap='emptyActive'> </div>
	</div>
</div>
<script language='javascript'>
    require(['../addons/ewei_shopv2/plugin/groups/static/js/goods.js'], function (modal) {
        modal.init(<?php  echo $goods['id'];?>,<?php  echo $goods['more_spec'];?>);
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>