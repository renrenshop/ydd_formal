<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_notice.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_notice.php');}?>
<?php  if(!empty($notices)) { ?>
	<div class="fui-notice">
		<div class="image"><img src="../addons/ewei_shopv2/static/images/hotdot.jpg"></div>
		<div class="icon"><i class="icon icon-notification1" style="font-size: 0.7rem;"></i></div>
		<div class="text">
			<ul>
				<?php  if(is_array($notices)) { foreach($notices as $item) { ?>
					<li>
						<a href="<?php  if(!empty($item['link'])) { ?><?php  echo $item['link'];?><?php  } else { ?><?php  echo mobileUrl('shop/notice/detail', array('id'=>$item['id']))?><?php  } ?>"><?php  echo $item['title'];?></a>
					</li>
				<?php  } } ?>
			</ul>
		</div>
	</div>
	<?php  if(count($notices)>1) { ?>
		<script type="text/javascript">
			function autoScroll(obj){
				$(obj).find("ul").animate({  
					marginTop : "-1rem"  
				},500,function(){  
					$(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
				})  
			}  
			$(function(){  
				setInterval('autoScroll(".fui-notice .text")',3000);
			}) 
		</script>
	<?php  } ?>
<?php  } ?>
