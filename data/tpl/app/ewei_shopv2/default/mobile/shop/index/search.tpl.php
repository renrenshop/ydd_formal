<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_search.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_search.php');}?>
<!--<script src="../../../../../../../../test/cj17006_translate_file/f-517/finish/ti/_static_js_app.js"></script>-->
<form action="<?php  echo mobileUrl('goods')?>" method="post">
	<div class="fui-searchbar bar">
		<div class="searchbar center" style="width:80%;float:left;">
			<input type="submit" class="searchbar-cancel searchbtn" value="<?php  echo $lang['lang_template_mobile_shop_index_search_0']?>" />
			<div class="search-input">
				<i class="icon icon-search"></i>
				<input type="search" placeholder="<?php  echo $lang['lang_template_mobile_shop_index_search_1']?>..." class="search" name="keywords">
			</div>
		</div>
		<div class="searchbar" style="width:25%;float:right;background: none;overflow: visible;margin-left: 0;padding-left:0;">
			<div class="box">
				<p class="<?php  echo $_W['lang_config'][$_W['lang_type']]['key'];?>"><i></i><span><?php  echo $_W['lang_config'][$_W['lang_type']]['displayName'];?></span></p>
				<ul class="language-ul">
					<?php  if(is_array($_W['lang_config'])) { foreach($_W['lang_config'] as $one) { ?>
						<li data-value="<?php  echo $one['url'];?>"><p class="<?php  echo $one['key'];?>"><i></i><span><?php  echo $one['displayName'];?></span></p></li>
					<?php  } } ?>

				</ul>
			</div>
		</div>
	</div>
</form>
<style type="text/css">
	*{padding: 0;margin: 0;}
	body{font-family: "微软雅黑";font-size: 16px;}
	.box{
		width: 100%;
		position: relative;
	}
	.box p{
		font-weight: normal;
		font-size:  0.55rem;
		height: 28px;
		line-height: 28px;
		cursor: pointer;
		width: 100%;
		text-indent: 15px;
		position: relative;
		font-family: "微软雅黑";
		border-radius: 0.25rem;
		background: #fff;
		white-space: nowrap;
	}
	.language-ul{
		line-height: 28px;
		width: 100%;
		position: absolute;
		top: 28px;
		background: #fff;
		list-style: none;
		text-indent: 15px;
		display: none;

	}
	.language-ul li{
		width:100%;
		cursor: pointer;
		border-radius: 0.25rem;
		border:0.05rem #dedede solid;
		border-top: none;
		overflow: hidden;
	}
	.language-ul li:first-child {
		border-top:0.05rem #dedede solid;
	}
	li:hover{
		background: #aaa;
	}
	<?php  if(is_array($_W['lang_config'])) { foreach($_W['lang_config'] as $one) { ?>
		<?php  if(!empty($one['logo'])) { ?>
		.box .<?php  echo $one['key'];?> i:before{
			content: url('<?php  echo $one['logo'];?>');
		}
		<?php  } ?>
	<?php  } } ?>

</style>
<script>
	$(function () {
		$("input[name='keywords']").focusin(function () {
			$(this).removeAttr('placeholder');
		});
		$("input[name='keywords']").focusout(function () {
			$(this).attr('placeholder','<?php  echo $lang['lang_template_mobile_shop_index_search_2']?>...');
		});
		$("form").submit(function () {
			$(this).find("input[name='keywords']").blur();
		});
	});
</script>
<script>
    $(function(){
        $(".searchbar .box").click(function(){
                if($(this).hasClass('active')){
                    $(this).removeClass('active');
                    $(this).find("ul").hide();return ;
				}else{
                    $(this).addClass('active');
                    $(this).find("ul").show();
				}


        })
        $(".searchbar .box ul li").click(function(){
            var url = $(this).attr('data-value');
            if(url){
                location.href=url;
			}

		})
    })
</script>