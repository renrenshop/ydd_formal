<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_pay_success.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_pay_success.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>
    .fui-mask {
        opacity: 1;
    }
</style>
<div class='fui-page order-success-page'>

	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back" href="<?php  echo mobileUrl('order')?>"></a>
		</div>
		<div class="title">
			<?php  if($_GPC['result']=='seckill_refund') { ?>
			<?php  echo $lang['lang_template_mobile_order_pay_success_0']?>
			<?php  } else { ?>
			<?php  echo $lang['lang_template_mobile_order_pay_success_1']?>
			<?php  } ?>

		</div>
		<div class="fui-header-right" data-nomenu="true">&nbsp;</div>
	</div>

    <div class='fui-content'>
	
	<div class='fui-list-group result-list ' style="margin-top: 0;">
	    <div class='fui-list'>
		<div class='fui-list-media'>
			<?php  if($_GPC['result']=='seckill_refund') { ?>
					<i class='icon icon-cry'></i>
			<?php  } else { ?>
		                   <?php  if(!empty($address)) { ?><i class='icon icon-deliver'></i><?php  } ?>
			
			<?php  if(!empty($order['dispatchtype']) && empty($order['isverify'])) { ?><i class='icon icon-store'></i><?php  } ?>
			
			<?php  if(!empty($order['isverify'])) { ?><i class='icon icon-store'></i><?php  } ?>
			
			<?php  if(!empty($order['virtual'])) { ?><i class='icon icon-text'></i><?php  } ?>
			
			<?php  if(!empty($order['isvirtual']) && empty($order['virtual'])) { ?>
			    <?php  if(!empty($order['isvirtualsend'])) { ?>
			    <i class='icon icon-text'></i>
			    <?php  } else { ?>
			    <i class='icon icon-check'></i>
			    <?php  } ?>
			<?php  } ?>
			<?php  } ?>
			
		     </div>
		<div class='fui-list-inner'>
		    <div class='title'>
				<?php  if($_GPC['result']=='seckill_refund') { ?>
				<?php  echo $lang['lang_template_mobile_order_pay_success_2']?>
				<?php  } else { ?>
				<?php  if($order['paytype']==3) { ?>
				<?php  echo $lang['lang_template_mobile_order_pay_success_3']?>
				<?php  } else { ?>
				<?php  echo $lang['lang_template_mobile_order_pay_success_4']?>
				<?php  } ?>
				<?php  } ?>

		    </div>
		    <div class='text'>

				<?php  if($_GPC['result']=='seckill_refund') { ?>
				 <?php  echo $lang['lang_template_mobile_order_pay_success_5']?>!
				<?php  } else { ?>


			<?php  if(!empty($address)) { ?><?php  echo $lang['lang_template_mobile_order_pay_success_6']?><?php  } ?>
			
			<?php  if(!empty($order['dispatchtype']) && empty($order['isverify'])) { ?><?php  echo $lang['lang_template_mobile_order_pay_success_7']?><?php  } ?>
			
			<?php  if(!empty($order['isverify'])) { ?><?php  echo $lang['lang_template_mobile_order_pay_success_8']?><?php  } ?>
			
			<?php  if(!empty($order['virtual'])) { ?><?php  echo $lang['lang_template_mobile_order_pay_success_9']?><?php  } ?>
			
			<?php  if(!empty($order['isvirtual']) && empty($order['virtual'])) { ?>
			     <?php  if(!empty($order['isvirtualsend'])) { ?>
			         <?php  echo $lang['lang_template_mobile_order_pay_success_10']?>
			    <?php  } else { ?>
			         <?php  echo $lang['lang_template_mobile_order_pay_success_11']?>

				<?php  if(p('lottery')) { ?>
				<div id="changesmodel" style="display: none;">
					<div id="changescontent" onclick="" class="task-model" style="background: url('../addons/ewei_shopv2/plugin/lottery/static/images/changes.png');background-size: cover; width: 16rem; height: 16rem;  background-size: cover;position: relative; left: 9%; margin-bottom: 55%;">
        <span class="changes-btn-close" style="border: 1px solid #ffffff; color: #ffffff; border-radius: 50%; position: relative; top: -1.3rem; left: 15.5rem; padding: 0.2rem 0.3rem;"><i class="icon icon-close"></i><span>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function () {
						setTimeout(function () {
							if (<?php  echo $lottery_changes['is_changes'];?> == 1) {
								var changes = <?php  echo json_encode($lottery_changes['lottery']);?>;
								$('#changescontent').attr('onclick', 'window.location.href="<?php  echo mobileUrl("lottery/lottery_info",array(),true);?>&id=' + changes.lottery_id + '"');
								taskget = new FoxUIModal({
									content: $('#changesmodel').html(),
									extraClass: 'picker-modal',
									maskClick: function () {
										taskget.close()
									}
								});
								taskget.container.find('.changes-btn-close').click(function () {
									taskget.close();
									event.stopPropagation();
								});

								taskget.show();
							}
						}, 200);
					});

				</script>
				<?php  } ?>


			    <?php  } ?>
			<?php  } ?>
				<?php  } ?>
	
		    </div>
		</div>
	    </div>
	</div>
	
	<?php  if(!empty($stores)) { ?>
	<script language='javascript' src='https://api.map.baidu.com/api?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&s=1'></script>
	<div class='fui-according-group'>
	<div class='fui-according'>
	    <div class='fui-according-header'>
		<i class='icon icon-shop'></i>
		<span class="text"><?php  echo $lang['lang_template_mobile_order_pay_success_12']?></span>
		<span class="remark"><div class="badge"><?php  echo count($stores)?></div></span>
	    </div>
	   <div class="fui-according-content store-container">
		 <?php  if(is_array($stores)) { foreach($stores as $item) { ?>
			<div  class="fui-list store-item" 
		      
		      data-lng="<?php  echo floatval($item['lng'])?>"
		      data-lat="<?php  echo floatval($item['lat'])?>">
		    <div class="fui-list-media">
			<i class='icon icon-shop'></i>
		    </div>
		    <div class="fui-list-inner store-inner">
			<div class="title"> <span class='storename'><?php  echo $item['storename'];?></span></div>
			<div class="text">
			    <span class='realname'><?php  echo $item['realname'];?></span> <span class='mobile'><?php  echo $item['mobile'];?></span>
			</div>
			<div class="text">
			    <span class='address'><?php  echo $item['address'];?></span>
			</div>
			<div class="text location" style="color:green;display:none"><?php  echo $lang['lang_template_mobile_order_pay_success_13']?>...</div>
		    </div> 
		     <div class="fui-list-angle ">
			 <?php  if(!empty($item['tel'])) { ?><a href="tel:<?php  echo $item['tel'];?>" class='external '><i class=' icon icon-phone' style='color:green'></i></a><?php  } ?>
			 <a href="<?php  echo mobileUrl('store/map',array('id'=>$item['id'],'merchid'=>$item['merchid']))?>" class='external' ><i class='icon icon-location' style='color:#f90'></i></a>
  		      </div>
		</div> 
			<?php  } } ?>
		</div>
	 
	<div id="nearStore" style="display:none">
		 
		<div class='fui-list store-item'   id='nearStoreHtml'></div>
	</div>
	</div></div>
	<?php  } ?>
	<?php  if(!empty($address)) { ?>
	 
	<div class='fui-list-group' style='margin-top:5px;'>
	    <div class='fui-list'>
		<div class='fui-list-media'><i class='icon icon-location'></i></div>
		<div class='fui-list-inner'>
		    <div class='title'><?php  echo $address['realname'];?> <?php  echo $address['mobile'];?></div>
		    <div class='text'><?php  echo $address['province'];?><?php  echo $address['city'];?><?php  echo $address['area'];?> <?php  echo $address['address'];?></div>
		</div>
	    </div>
	</div>
	<?php  } ?>
	
	<?php  if(!empty($carrier) || !empty($store)) { ?>
	 
	<div class='fui-list-group' style='margin-top:5px;'>
	        <?php  if(!empty($carrier)) { ?>
	    <div class='fui-list'>
		<div class='fui-list-media'><i class='icon icon-person2'></i></div>
		<div class='fui-list-inner'>
		    <div class='title'><?php  echo $carrier['carrier_realname'];?> <?php  echo $carrier['carrier_mobile'];?></div>
		</div>
	    </div>
		<?php  } ?>
	    
	    <?php  if(!empty($store)) { ?>
	       <div  class="fui-list" >
		    <div class="fui-list-media">
			<i class='icon icon-shop'></i>
		    </div>
		    <div class="fui-list-inner store-inner">
			<div class="title"> <span class='storename'><?php  echo $store['storename'];?></span></div>
			<div class="text">
			    <span class='realname'><?php  echo $store['realname'];?></span> <span class='mobile'><?php  echo $store['mobile'];?></span>
			</div>
			<div class="text">
			    <span class='address'><?php  echo $store['address'];?></span>
			</div>
		    </div> 
		     <div class="fui-list-angle ">
			 <?php  if(!empty($store['tel'])) { ?><a href="tel:<?php  echo $store['tel'];?>" class='external '><i class=' icon icon-phone' style='color:green'></i></a><?php  } ?>
			 <a href="<?php  echo mobileUrl('store/map',array('id'=>$store['id'],'merchid'=>$store['merchid']))?>" class='external' ><i class='icon icon-location' style='color:#f90'></i></a>
  		      </div>
		</div> 
	    <?php  } ?>
	</div>
	<?php  } ?>
	
	
	<div class="fui-cell-group">
	    <div class="fui-cell">
		<div class="fui-cell-label"><?php  if($order['paytype']==3) { ?><?php  echo $lang['lang_template_mobile_order_pay_success_14']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_pay_success_15']?><?php  } ?></div>
		<div class="fui-cell-info"></div>
		<div class="fui-cell-remark noremark"><span class='text-danger'><?php  echo $lang['lang_template_mobile_order_pay_success_16']?><?php  if(empty($peerprice)) { ?><?php  echo number_format($order['price'],2)?><?php  } else { ?><?php  echo $peerprice['price'];?><?php  } ?></span></div>
	    </div>
		<?php  if($_GPC['result']!='seckill_refund') { ?>
	<?php  if(!empty($order['virtual']) || !empty($order['isvirtualsend'])) { ?>
	 
	    <div class="fui-cell">
		
		<div class="fui-cell-remark noremark" style='width:auto;'><?php  echo $lang['lang_template_mobile_order_pay_success_17']?></div>
		
	    </div>
 
	<?php  } ?>
		<?php  } ?>
	</div>
	 
	<div class='row'>
	    <div class='col-50'>
		<a class="btn btn-default external" <?php  if(empty($ispeerpay)) { ?>href="<?php  echo mobileUrl('order/detail',array('id'=>$order['id']))?>"<?php  } else { ?>href="<?php  echo mobileUrl('order/pay/peerpaydetail',array('id'=>$orderid))?>"<?php  } ?> ><?php  echo $lang['lang_template_mobile_order_pay_success_18']?></a>
	    </div>
	    <div class='col-50'>
		<a class="btn btn-default external" href="<?php  echo mobileUrl()?>" ><?php  echo $lang['lang_template_mobile_order_pay_success_19']?></a>
	    </div>
	</div>
	 
    </div>

	<?php  if(p('lottery')) { ?>
	<div id="changesmodel" style="display: none;width: 90%">
		<div id="changescontent" onclick="" class="task-model" style="background: url('../addons/ewei_shopv2/plugin/lottery/static/images/changes.png');background-size: cover; width: 90%; height: 16rem;  background-size: cover;position: relative;margin: 0 auto; margin-bottom: 55%;">
            <span class="changes-btn-close" style="border: 1px solid dodgerblue; color: dodgerblue; border-radius: 50%; position: absolute;right: 5px; padding: 0.2rem 0.4rem;top: 5px;z-index: 10"><i class="icon icon-close"></i><span>
		</div>
	</div>
	<?php  } ?>
	    <script language='javascript'>
            require(['biz/order/success'], function (modal) {modal.init("<?php  echo $lottery_changes['is_changes'];?>","<?php  echo $lottery_changes['lottery']['lottery_id'];?>");});
        </script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>