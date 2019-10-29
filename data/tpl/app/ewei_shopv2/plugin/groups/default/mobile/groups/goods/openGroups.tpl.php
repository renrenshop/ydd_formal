<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_goods_openGroups.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_groups_template_mobile_default_goods_openGroups.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php  if($groupsset['followbar'] ==1) { ?>
<?php  $this->followBar()?>
<?php  } ?>
<title>商品详情</title>
<link rel="stylesheet" href="../addons/ewei_shopv2/plugin/groups/template/mobile/default/css/style.css?v=2018530" />
<div class='fui-page creditshop-detail-page'>
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back" href="<?php  echo mobileUrl('order')?>"></a>
		</div>
		<div class="title">拼团操作</div>
		<div class="fui-header-right">&nbsp;</div>
	</div>
	<div class='fui-content navbar'>
		<?php  if(!is_mobile()) { ?><div class="pcshop-index"><?php  } ?>
		<div class="lynn_opengroups_head fui-list">
			<a href="<?php  echo mobileUrl('groups/goods', array('id'=>$goods['id']))?>" class="lynn_index_list_a fui-list-media">
				<img src="<?php  echo $goods['thumb'];?>" alt="<?php  echo $goods['title'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
			</a>
			<div class="fui-list-inner lynn_opengroups_head_goods ">
				<h2><?php  echo $goods['title'];?></h2>
				<?php  if($goods['more_spec'] ==0) { ?>
				<!--<p>库存：<?php  echo $goods['stock'];?></p>-->
				<?php  } ?>
				<div class="person" style="margin: 0.6rem 0">
					<?php  if($goods['is_ladder'] ==1) { ?>
						阶梯团
					<?php  } else { ?>
					<?php  echo $goods['groupnum'];?>人团
					<?php  } ?>
				</div>
				<div class="price" style="font-size:0.65rem;color:#ff5555;">
					¥<?php  echo $goods['groupsprice'];?>/<?php  if($goods['units']) { ?><?php  echo $goods['goodsnum'];?><?php  echo $goods['units'];?><?php  } else { ?>1件<?php  } ?>
					<span class="pull-right" style="font-size: 0.6rem;color: #999;">已有<b><?php  echo $goods['fightnum'];?></b>人参团</span>
				</div>
			</div>
		</div>


		<div class="progress">
			<text class="icox icox-1">1</text>
			下单开团/参团
			<text class="line">---------</text>
			<text class="icox icox-2">2</text>
			邀请好友参团
			<text class="line">---------</text>
			<text class="icox icox-3">3</text>
			人满拼团成功
		</div>
		<div class="lynn_opengroups_invitation row">
			<?php  if($goods['is_ladder'] ==1) { ?>
			<p>支付开团并邀请好友参加，人数不足自动退款</p>
			<?php  } else { ?>
			<p>支付开团并邀请<b><?php  echo $goods['groupnum']-1?></b>人参加，人数不足自动退款</p>
			<?php  } ?>
			<?php  if($order_num == 0 && $goods['more_spec'] == 1) { ?>
			<a href="javascript:void(0);" class="lynn_fightgroups_btn " data-nocache="true">暂时无团</a>
			<?php  } else if($order_num == 0 && $goods['is_ladder'] == 1) { ?>
			<a href="javascript:void(0);" class="lynn_fightgroups_btn " data-nocache="true">暂时无团</a>
			<?php  } else if($order_num == 0 && $goods['is_ladder'] == 0 && $goods['more_spec'] == 0) { ?>
			<a href="javascript:void(0);" class="lynn_fightgroups_btn " data-nocache="true">暂时无团</a>
			<?php  } else { ?>
			<a href="javascript:void(0);" class="lynn_fightgroups_btn btn-fightgroups" data-nocache="true">我要参团</a>
			<?php  } ?>
			<a href="javascript:void(0);" class="lynn_opengroups_btn btn-groups">我要开团</a>
		</div>

		<div class="lynn_more_groups">
			<div class="lynn_more_groups_head">
				<p>
					<i></i>
					<span>更多好团</span>
				</p>
			</div>
			<ul class="lynn_more_groups_list row">
				<?php  if(is_array($teams)) { foreach($teams as $item) { ?>
				<li>
					<a href="<?php  echo mobileUrl('groups/goods', array('id'=>$item['id']))?>" class="lynn_more_groups_list_a">
						<img src="<?php  echo $item['thumb'];?>" alt="<?php  echo $item['title'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg'">
					</a>
					<h3><?php  echo $item['title'];?></h3>
					<p class="lynn_more_groups_list_p row">
						<span class="fl">¥ <b><?php  echo $item['groupsprice'];?></b><del>¥<?php  echo $item['price'];?></del></span>
						<span class="fr"><?php  echo $item['fightnum'];?>人参团</span>
					</p>
				</li>
				<?php  } } ?>
			</ul>
		</div>
		<?php  if(!is_mobile()) { ?></div><?php  } ?>
	</div>
	<script language='javascript'>
		require(['../addons/ewei_shopv2/plugin/groups/static/js/goods.js'], function (modal) {
            modal.init(<?php  echo $goods['id'];?>,<?php  echo $goods['is_ladder'];?>,<?php  echo $goods['more_spec'];?>);
		});
	</script>


	<div class='layer'style="display: none" ></div>
	<!--阶梯团弹窗  -->
	<div class='chosenum' style="display: none">
		<div class='title'>请选择拼团人数 <span class='laddernum' style="margin-bottom:15px;color: #ff5555"></span></div>
		<div class='num'>
		</div>
		<div class='btn btn-danger btn-jieti'  disabled="disabled" style="margin: 0">确定</div>
		<div class='close1 icon icon-guanbi1'></div>
	</div>
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
              <input class='stock' type="hidden" >
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
      <div class='icon icon-guanbi1' style='color:#fff;text-align:center;font-size:1.25rem;margin-top:0.75rem;' > </div>
    </div>
</div>


    <?php  $this->footerMenus()?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>