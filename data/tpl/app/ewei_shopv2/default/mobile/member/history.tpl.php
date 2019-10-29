<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_history.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_history.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
	.fui-list-group-title{
		position: relative;
	}
	.fui-list-group-title:after{
		content: " ";
		position: absolute;
		left: 0;
		top: 0;
		right: .5rem;
		height: 1px;
		border-top: 1px solid #ebebeb;
		color: #ebebeb;
		-webkit-transform-origin: 0 0;
		-ms-transform-origin: 0 0;
		transform-origin: 0 0;
		-webkit-transform: scaleY(0.5);
		-ms-transform: scaleY(0.5);
		transform: scaleY(0.5);
		left: .5rem;
	}
	.fui-list-group-title{
		font-size: .65rem;
	}
	.member-cart-page .fui-radio{
		position: static;
	}
</style>
<div class='fui-page   fui-page-current member-cart-page'>
    <div class="fui-header">
	<div class="fui-header-left">
	    <a class="back"></a>
	</div>
	<div class="title"><?php  echo $lang['lang_template_mobile_member_history_0']?></div>
	<div class="fui-header-right">
		<a class="btn-edit" style="display: none;"><?php  echo $lang['lang_template_mobile_member_history_1']?></a>
	</div>
    </div>

    <div class='fui-content' >

	<div class='content-empty' style='display:none;'>
	     <i class='icon icon-like'></i><br/><?php  echo $lang['lang_template_mobile_member_history_2']?>~<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'><?php  echo $lang['lang_template_mobile_member_history_3']?>~</a>
	</div>
	  <div class='fui-list-group container' style="display:none;"></div>
	  <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> <?php  echo $lang['lang_template_mobile_member_history_4']?>...</span></div>
    </div>
    <div class="fui-footer editmode">
	<div class="fui-list noclick">
	    <div class="fui-list-media">
		<label class="checkbox-inline editcheckall"><input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger " />&nbsp;<?php  echo $lang['lang_template_mobile_member_history_5']?></label>
	    </div>
		<div class="fui-list-inner"></div>
	    <div class='fui-list-angle'>
		<div class="btn  btn-danger btn-delete  disabled"<?php  echo $lang['lang_template_mobile_member_history_6']?></div>
	    </div>
	</div>
    </div>
 
    <script id="tpl_member_history_list" type="text/html">
	 
	    <%each list as g index%>
	    <div class="fui-list-group-title text-cancel"><%g.createtime%></div>
	    <div class="fui-list goods-item align-start" data-id="<%g.id%>" data-goodsid="<%g.goodsid%>">
		<div class="fui-list-media editmode">
		   <input type="checkbox" name="checkbox" class="fui-radio fui-radio-danger edit-item"/>
		</div> 

		<div class="fui-list-media image-media" style="margin-left: 0;">
		    <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>">
			<img data-lazy="<%g.thumb%>" class="round">
		    </a>
		</div>
		<div class="fui-list-inner">
		    <a href="<?php  echo mobileUrl('goods/detail')?>&id=<%g.goodsid%>">
			<div class="text">
			  <%g.title%>
			</div>
		    </a>
		     <div class="text"style="margin-bottom: .3rem;font-size: .75rem;"><span class="text-danger">RM<%g.marketprice%><%if g.productprice>0%></span> <span class='oldprice'>RM<%g.productprice%></span><%/if%></div>

		</div>
			<div class="historycover" style="width: 90%;position: absolute;top: 0;;right: 0;height: 100%;display: none"></div>
		</div>

	  <%/each%>
    </script>
    <script language='javascript'>require(['biz/member/history'], function (modal) {
                modal.init();
     });</script>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
