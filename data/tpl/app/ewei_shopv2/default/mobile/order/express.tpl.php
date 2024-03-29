<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_express.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_express.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
	.fui-list-media img{height:1.6rem;width:1.6rem;}
</style>
<div class="fui-page order-express-page">
    <div class="fui-header">
	<div class="fui-header-left">
	    <a class="back"></a>
	</div>
	<div class="title"><?php  if(count($bundlelist)>0) { ?><?php  echo $lang['lang_template_mobile_order_express_0']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_express_1']?><?php  } ?></div>
	<div class="fui-header-right">&nbsp;</div>
    </div>
    <div class='fui-content'>
		<?php  if($sendtype > 0) { ?>
		<div class="fui-list-group">
			<div class="fui-list-group-title" style="font-size:0.6rem;"><?php  echo $lang['lang_template_mobile_order_express_2']?><?php  echo $bundle;?><?php  echo $lang['lang_template_mobile_order_express_3']?></div>
		</div>
			<?php  if(is_array($goods)) { foreach($goods as $item) { ?>
			<a href="<?php  echo mobileUrl('goods/detail',array('id'=>$item['goodsid']))?>">
				<div class="fui-list" style="padding:0.2rem 0.5rem;">
					<div class="fui-list-media back">
						<img src="<?php  echo tomedia($item['thumb'])?>">
					</div>
					<div class="fui-list-inner" style="font-size:0.6rem;max-height:1.6rem;overflow: hidden;line-height: 0.8rem;">
						<?php  echo $item['title'];?>
					</div>
				</div>
			</a>
			<?php  } } ?>
		<?php  } ?>
		<?php  if(count($bundlelist)>0) { ?>
		<?php  if(is_array($bundlelist)) { foreach($bundlelist as $index => $b) { ?>
		<div class="fui-list-group info-list">
				<div class="fui-list-group-title">
					<div class="fui-list" style="padding:0;border-bottom:1px solid #dcdcdc;">
						<div class="fui-list-inner">
							<?php  echo $lang['lang_template_mobile_order_express_4']?><?php  echo chr($index+65)?>
						</div>
						<a class="fui-list-media" href="<?php  echo mobileUrl('order/express',array('id'=>$b['orderid'],'sendtype'=>$b['sendtype'],'bundle'=>chr($index+65)))?>"
						   style="float:right;font-size:0.6rem;color:#666;margin:0;"><?php  echo $lang['lang_template_mobile_order_express_5']?>&nbsp;<span class="angle" style="font-size:1.2rem;"></span>
						</a>
					</div>
				</div>
				<?php  if(is_array($b['goods'])) { foreach($b['goods'] as $bg) { ?>
				<a href="<?php  echo mobileUrl('order/express',array('id'=>$b['orderid'],'sendtype'=>$b['sendtype'],'bundle'=>chr($index+65)))?>">
					<div class="fui-list">
						<div class="fui-list-media back">
							<img src="<?php  echo tomedia($bg['thumb'])?>">
							<div class="title"><?php  echo count($bg['total'])?><?php  echo $lang['lang_template_mobile_order_express_6']?></div>
						</div>
						<div class="fui-list-inner" style="font-size:0.7rem;">
							<?php  echo $bg['title'];?>
						</div>
					</div>
				</a>
				<?php  } } ?>
		</div>
		<?php  } } ?>
		<?php  } else { ?>
		<div class="fui-list-group info-list">
			<div class="fui-list">
				<a class="fui-list-media back">
					<img src="<?php  echo tomedia($goods[0]['thumb'])?>">
					<div class="title"><?php  echo count($goods)?><?php  echo $lang['lang_template_mobile_order_express_7']?></div>
				</a>
				<div class="fui-list-inner">
					<div class="title state"><?php  echo $lang['lang_template_mobile_order_express_8']?>
						<?php  if(!empty($expresslist)) { ?>
						<?php  if(strexists($expresslist[0]['step'],$lang['lang_template_mobile_order_express_9'])) { ?>
						<span class="text-danger"><?php  echo $lang['lang_template_mobile_order_express_10']?></span></div>
					<?php  } else if(count($expresslist)<=2) { ?>
					<span class="text-primary"><?php  echo $lang['lang_template_mobile_order_express_11']?></span></div>
				<?php  } else { ?>
				<span class="text-success"><?php  echo $lang['lang_template_mobile_order_express_12']?></span></div>
			<?php  } ?>
			<?php  } ?>
			<div class="text expcom">
				<p><?php  echo $lang['lang_template_mobile_order_express_13']?><?php  echo $order['expresscom'];?></p>
				<p><?php  echo $lang['lang_template_mobile_order_express_14']?><?php  echo $order['expresssn'];?></p>
			</div>
		</div>
		<?php  } ?>
	</div>
    </div>
    
	<?php  if(empty($expresslist) && empty($bundlelist)) { ?>
	<div class='content-empty'>
	    <i class='icon icon-deliver1'></i><br/><span class='text'><?php  echo $lang['lang_template_mobile_order_express_15']?></span>
	</div>
	<?php  } else { ?>
	<div class="fui-list-group express-list" style="margin-top: 0.5rem;">
	<?php  if(is_array($expresslist)) { foreach($expresslist as $k => $ex) { ?>
	    	<div class="fui-list <?php  if($k==0) { ?>current<?php  } ?>">
	    		<div class="fui-list-inner">
			    <div class="text step"><?php  echo $ex['step'];?></div>
	    		    <div class="text time"><?php  echo $ex['time'];?></div>
	    		</div>
	    	</div>
                    <?php  } } ?>
	    </div>
	<?php  } ?>
	
    
         </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>