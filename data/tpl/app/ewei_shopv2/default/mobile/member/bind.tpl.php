<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_bind.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_bind.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
	.fui-cell-group .fui-cell .fui-cell-label{
		width:4.2rem;
	}
</style>
<div class='fui-page  fui-page-current'>
    <div class="fui-header">
		<div class="fui-header-left">
			<a class="back" onclick='location.back()'></a>
		</div>
		<div class="title"><?php  if(!empty($bind)) { ?><?php  echo $lang['lang_template_mobile_member_bind_0']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_member_bind_1']?><?php  } ?></div>
		<div class="fui-header-right">&nbsp;</div>
	</div>

	<div class='fui-content' style='margin-top:5px;'>

		<div class="fui-cell-group">

			<div class="fui-cell must">
				<div class="fui-cell-label">
					<?php  echo $lang['lang_template_mobile_member_bind_2']?>
					<input type="text" value="+60" disabled style="width: 27px;">
				</div>
				<div class="fui-cell-info">
					<input type="tel" class='fui-input' id='mobile' name='mobile' placeholder="<?php  echo $lang['lang_template_mobile_member_bind_3']?>"  value="<?php  echo $member['mobile'];?>" maxlength="11" />
				</div>
			</div>

			<?php  if(!empty($wapset['smsimgcode'])) { ?>
			<div class="fui-cell must">
				<div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_member_bind_4']?></div>
				<div class="fui-cell-info">
					<input type="tel" class="fui-input" value="" placeholder="<?php  echo $lang['lang_template_mobile_member_bind_5']?>" name="verifycode2" id="verifycode2" maxlength="4" />
				</div>
				<div class="remark noremark">
					<img src="../web/index.php?c=utility&a=code&r=<?php  echo time()?>" style="width: 3.5rem; height: 1.5rem; vertical-align: middle;" id="btnCode2">
				</div>
			</div>
			<?php  } ?>

			<div class="fui-cell must">
				<div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_member_bind_6']?></div>
				<div class="fui-cell-info"><input type="tel" class='fui-input' id='verifycode' name='verifycode' placeholder="<?php  echo $lang['lang_template_mobile_member_bind_7']?>"  value="" maxlength="5" /></div>
				<div class="fui-cell-remark noremark"><a class="btn btn-default btn-default-o btn-sm" id="btnCode"><?php  echo $lang['lang_template_mobile_member_bind_8']?></a></div>
			</div>
			<div class="fui-cell must">
				<div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_member_bind_9']?></div>
				<div class="fui-cell-info"><input type="password" class='fui-input' id='pwd' name='pwd' placeholder="<?php  echo $lang['lang_template_mobile_member_bind_10']?>"  value="" /></div>
			</div>
			<div class="fui-cell must">
				<div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_member_bind_11']?></div>
				<div class="fui-cell-info"><input type="password" class='fui-input' id='pwd1' name='pwd1' placeholder="<?php  echo $lang['lang_template_mobile_member_bind_12']?>"  value="" /></div>
			</div>

		</div>

		<a href='#' id='btnSubmit' class='btn btn-danger block mtop'><?php  echo $lang['lang_template_mobile_member_bind_13']?></a>
	</div>
	<script language='javascript'>
		require(['biz/member/account'], function (modal) {
		  	modal.initBind({
				endtime: <?php  echo intval($endtime)?>,
				backurl: "<?php  echo $_GPC['backurl'];?>",
				imgcode: <?php  echo intval($wapset['smsimgcode'])?>
			});
		});
</script>

</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

