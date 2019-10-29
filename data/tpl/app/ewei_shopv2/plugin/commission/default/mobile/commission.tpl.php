<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $this->set['texts']['center']?>"; </script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-commission-index ">
	<div class="fui-header">
		<div class="fui-header-left">
			<a class="back" onclick='location.back()'></a>
		</div>
		<div class="title"><?php  echo $this->set['texts']['center']?></div>
		<div class="fui-header-right"></div>
	</div>
    <div class='fui-content navbar'>
	<div class="headinfo">
	    <div class="userinfo">
		<div class='fui-list'>
		    <div class='fui-list-media'><img src="<?php  echo $member['avatar'];?>" /></div>
		    <div class='fui-list-info'>
			<div class='title'><?php  echo $member['nickname'];?> </div>
			<div class='subtitle'  <?php  if($this->set['levelurl']!='') { ?>onclick='location.href="<?php  echo $this->set['levelurl']?>"'<?php  } ?>>
				&lt;<?php echo empty($level) ? ( empty($this->set['levelname'])? $lang['lang_plugin_commission_template_mobile_default_index_0'] :$this->set['levelname'] ) : $level['levelname']?>&gt;
			    <?php  if($this->set['levelurl']!='') { ?><i class='icon icon-question' style='font-size:8px;'></i><?php  } ?>
			</div>
			<div class='text' ><?php  echo $this->set['texts']['up']?>: <?php  if(empty($up)) { ?>
			    <?php  echo $lang['lang_plugin_commission_template_mobile_default_index_1']?>
			    <?php  } else { ?>
			    <?php  echo $up['nickname'];?>
			    <?php  } ?></div>
		    </div>
		</div>
		<?php  if(empty($this->set['closemyshop'])) { ?>
			<a class="setbtn" href="<?php  echo mobileUrl('commission/myshop/set')?>"><i class="icon icon-settings"></i></a>
		<?php  } ?>
	    </div>
	    <div class="userblock">
		<div class="line total">
		    <!--<div class="title"><?php  echo $this->set['texts']['commission_pay']?>(<?php  echo $this->set['texts']['yuan']?>)</div>-->
		    <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_14']?>(<?php  echo $lang['lang_plugin_commission_template_mobile_default_index_15']?>)</div>
		    <div class="num"><?php  echo number_format($member['commission_pay'],2)?></div>
		</div>
		<div class="line usable">
		    <?php  if($cansettle) { ?>
		    <a class="btn" href="<?php  echo mobileUrl('commission/withdraw')?>"><?php  echo $this->set['texts']['commission']?><?php  echo $this->set['texts']['withdraw']?></a>
		    <?php  } else { ?>
		    <div class="btn disabled"
				 onclick="FoxUI.toast.show('<?php  echo $lang['lang_plugin_commission_template_mobile_default_index_2']?> <?php  echo $this->set['withdraw']?> <?php  echo $lang['lang_plugin_commission_template_mobile_default_index_20']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_3']?>!')">
				<?php  echo $lang['lang_plugin_commission_template_mobile_default_index_18']?>
				<?php  echo $lang['lang_plugin_commission_template_mobile_default_index_19']?>
			</div>
		    <?php  } ?>
		    <div class="text">
			<!--<div class="title"><?php  echo $this->set['texts']['commission_ok']?>(<?php  echo $this->set['texts']['yuan']?>)</div>-->
			<div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_16']?>(<?php  echo $lang['lang_plugin_commission_template_mobile_default_index_17']?>)</div>
			<div class="num"><?php  echo number_format( $member['commission_ok'],2)?></div>
		    </div>
		</div>
	    </div>
	</div>

	<div class="fui-block-group col-3" style='margin-top:0; overflow: hidden;'>
            <a class="fui-block-child" href="<?php  echo mobileUrl('commission/withdraw')?>">
                <div class="icon text-yellow"><i class="icon icon-money"></i></div>
                <!--<div class="title"><?php  echo $this->set['texts']['commission1']?></div> -->
                <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_21']?></div>
                <!--<div class="text"><span><?php  echo number_format($member['commission_total'],2)?></span> <?php  echo $this->set['texts']['yuan']?></div>-->
                <div class="text"><span><?php  echo number_format($member['commission_total'],2)?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_index_22']?></div>
            </a>
            <a class="fui-block-child" href="<?php  echo mobileUrl('commission/order')?>">
                <div class="icon text-blue"><i class="icon icon-list"></i></div>
                <!--<div class="title"><?php  echo $this->set['texts']['order']?></div>-->
                <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_23']?></div>
                <div class="text"><span><?php  echo number_format($member['ordercount0'],0)?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_index_4']?></div>
            </a>
            <a class="fui-block-child" href="<?php  echo mobileUrl('commission/log')?>">
                <div class="icon text-orange"><i class="icon icon-manageorder"></i></div>
                <!--<div class="title"><?php  echo $this->set['texts']['commission_detail']?></div>-->
                <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_24']?></div>
		<div class="text"><span><?php  echo number_format($member['applycount'],0)?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_index_5']?></div>
            </a>
            <a class="fui-block-child" href="<?php  echo mobileUrl('commission/down')?>">
                <div class="icon text-orange"><i class="icon icon-group"></i></div>
                <!--<div class="title"><?php  echo $this->set['texts']['mydown']?></div>-->
                <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_25']?></div>
                <div class="text"><span><?php  echo number_format($member['downcount'],0)?></span><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_6']?></div>
            </a>

		<?php  if($hasglobonus) { ?>
		<a class="fui-block-child" href="<?php  echo mobileUrl('globonus')?>">
			<div class="icon text-yellow"><i class="icon icon-profile"></i></div>
			<div class="title"><?php  echo $plugin_globonus_set['texts']['center'];?></div>
			<div class="text"></div>
		</a>
		<?php  } ?>


		<?php  if($hasabonus) { ?>
		<a class="fui-block-child" href="<?php  echo mobileUrl('abonus')?>">
			<div class="icon text-orange"><i class="icon icon-shengfen"></i></div>
			<div class="title"><?php  echo $plugin_abonus_set['texts']['center'];?></div>
			<div class="text"></div>
		</a>
		<?php  } ?>

		<?php  if($hasauthor) { ?>
		<a class="fui-block-child" href="<?php  echo mobileUrl('author')?>">
			<div class="icon text-orange"><i class="icon icon-profile"></i></div>
			<div class="title"><?php  echo $plugin_author_set['texts']['center'];?></div>
			<div class="text"></div>
		</a>
		<?php  if($team_money>0) { ?>
		<a class="fui-block-child">
			<div class="icon text-blue"><i class="icon icon-money"></i></div>
			<div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_7']?></div>
			<div class="text"><span><?php  echo $team_money;?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_index_8']?></div>
		</a>
		<?php  } ?>
		<?php  } ?>

		<?php  if(!empty($plugin_author_set['team_open'])) { ?>
		<a class="fui-block-child" href="<?php  echo mobileUrl('author/team')?>">
			<div class="icon text-red"><i class="icon icon-people2"></i></div>
			<div class="title"><?php  echo $plugin_author_set['texts']['bonus_team'];?></div>
			<div class="text"></div>
		</a>
		<?php  } ?>

		<?php  if(!$this->set['closed_qrcode']) { ?>
            <a class="fui-block-child" href="<?php  echo mobileUrl('commission/qrcode')?>">
                <div class="icon text-yellow"><i class="icon icon-qrcode"></i></div>
                <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_9']?></div>
                <div class="text"></div>
            </a>
		<?php  } ?>


	    <?php  if(empty($this->set['closemyshop'])) { ?>

	    <a class="fui-block-child" href="<?php  echo mobileUrl('commission/myshop/set')?>">
		<div class="icon text-blue"><i class="icon icon-shopfill"></i></div>
		<div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_10']?></div>
		<div class="text"></div>
	    </a>
	    <?php  if($this->set['openselect']) { ?>
	    <a class="fui-block-child" href="<?php  echo mobileUrl('commission/myshop/select')?>">
		<div class="icon text-blue"><i class="icon icon-apps"></i></div>
		<div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_11']?></div>
		<div class="text"></div>
	    </a>
	    <?php  } ?>
	    <?php  } ?>
	    <?php  if(!empty($this->set['rank']['status'])) { ?>
		  <a class="fui-block-child" href="<?php  echo mobileUrl('commission/rank');?>">
			    <div class="icon text-orange"><i class="icon icon-rank"></i></div>
			    <div class="title"><?php  echo $this->set['texts']['commission']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_index_12']?></div>
			    <div class="text"></div>
		 </a>
	    <?php  } ?>

	</div>
		<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
    </div>

    <?php  $this->footerMenus()?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>