<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_goods_picker.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_goods_picker.php');}?>
<script type="text/html" id="option-picker">
    <div class="option-picker">
	<div class="option-picker-inner">
	<div class="option-picker-cell goodinfo">
	    <div class="closebtn"><i class="icon icon-roundclose"></i></div>
	    <div class="img"><img class='thumb' src="<%goods.thumb%>" /></div>
	    <div class="info info-price text-danger">
			<?php  if($threen &&(!empty($threenprice['price'])||!empty($threenprice['discount']))) { ?>
			<span><?php  echo $lang['lang_template_mobile_goods_picker_0']?><span class=''>
			<?php  if(!empty($threenprice['price'])) { ?>
			<?php  echo $threenprice['price'];?>
			<?php  } else if(!empty($threenprice['discount'])) { ?>
			<?php  echo $threenprice['discount']*$goods['minprice'];?>
			<?php  } ?>
			<?php  } else { ?>
			<span>

				<?php  echo $lang['lang_template_mobile_goods_picker_1']?>
				<span class='price'>
				<?php  if($taskGoodsInfo) { ?>
				<?php  echo $taskGoodsInfo['price'];?>
				<?php  } else { ?>
				<%if goods.ispresell>0 && (goods.preselltimeend == 0 || goods.preselltimeend > goods.thistime)%>
				<%goods.presellprice%>
				<%else%>
				<%if goods.maxprice == goods.minprice%><%goods.minprice%><%else%><%goods.minprice%>~<%goods.maxprice%><%/if%>
				<%/if%>
					<?php  } ?>
				</span>
			</span>

			<?php  } ?>
		</div>
	    <div class="info info-total">
			<%if seckillinfo==false || ( seckillinfo && seckillinfo.status==1) %>
	    		<%if goods.showtotal != 0%><%if goods.unite_total != 0%><?php  echo $lang['lang_template_mobile_goods_picker_2']?><%/if%><?php  echo $lang['lang_template_mobile_goods_picker_3']?> <span class='total text-danger'><%goods.total%></span> <?php  echo $lang['lang_template_mobile_goods_picker_4']?><%/if%>
			<%/if%>
	    </div>
	    <div class="info info-titles"><%if specs.length>0%><?php  echo $lang['lang_template_mobile_goods_picker_5']?><%/if%></div>
	</div>
	<div class="option-picker-options">
	<%each specs as spec%>
	    <div class="option-picker-cell option spec">
		<div class="title"><%spec.title%></div>
		<div class="select">
		 <%each spec.items as item%>
		      <a href="javascript:;" class="btn btn-default btn-sm nav spec-item spec-item<%item.id%>" data-id="<%item.id%>" data-thumb="<%item.thumb%>"> <%item.title%> </a>
			<%/each%>
		</div>
	    </div>
	<%/each%> 
	<%=diyformhtml%>

	 <%if seckillinfo==false || ( seckillinfo && seckillinfo.status==1) %>
		<div class="fui-cell-group">
			<div class="fui-cell">
			<div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_goods_picker_6']?></div>
			<div class="fui-cell-info"></div>
			<div class="fui-cell-mask noremark">
				 <div class="fui-number">
					<div class="minus">-</div>
					<input class="num" type="tel" name="" value="<%if goods.minbuy>0%><%goods.minbuy%><%else%>1<%/if%>"/>
					<div class="plus ">+</div>
				</div>
			</div>
		</div>
			<%else%>
			   <input class="num" type="hidden" name="" value="1"/>
		<%/if%>
	</div>

                   
	</div>
	<div class="fui-navbar">
		<a href="javascript:;" class="nav-item btn cartbtn" style='display:none'><?php  echo $lang['lang_template_mobile_goods_picker_7']?></a>
	    <a href="javascript:;" class="nav-item btn buybtn"  style='display:none' ><?php  echo $lang['lang_template_mobile_goods_picker_8']?></a>
	    <a href="javascript:;" class="nav-item btn confirmbtn"  style='display:none'><?php  echo $lang['lang_template_mobile_goods_picker_9']?></a>
	</div>
    </div>
    </div>
</script>