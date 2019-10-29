<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_account_rf.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_account_rf.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/account/default/style.css?v=2.0.0">
<style type="text/css">
    .account-top .logo img { border:2px solid <?php  echo $set['wap']['color'];?>;}
    .account-login-link { color:<?php  echo $set['wap']['color'];?>;  }
    .fui-cell-group .fui-cell-info .fui-input { color:<?php  echo $set['wap']['color'];?>; }
    .btn.account-btn { border:1px solid <?php  echo $set['wap']['color'];?>;color:<?php  echo $set['wap']['color'];?>;}
    .fui-cell-group .fui-cell:before {
    border-top: 1px solid<?php  echo $set['wap']['color'];?>;
    color: <?php  echo $set['wap']['color'];?>;
    }
</style>
<div class="fui-page">
    <?php  if(is_h5app()) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"> </a>
        </div>
        <div class="title"><?php  if(empty($type)) { ?><?php  echo $lang['lang_template_account_rf_0']?><?php  } else { ?><?php  echo $lang['lang_template_account_rf_1']?><?php  } ?></div>
        <div class="fui-header-right" data-nomenu="true"></div>
    </div>
    <?php  } ?>
    <div class="fui-content">

        <div class="account-bg">
            <img src="<?php echo empty($set['wap']['bg'])?'../addons/ewei_shopv2/static/images/wapbg.jpg':tomedia($set['wap']['bg'])?>" />
        </div>

        <div class="account-top">
            <div class="logo">
                <img src="<?php  echo tomedia($set['shop']['logo'])?>" />
            </div>
        </div>
        <div class="fui-cell-group fui-cell-group-o account-cell-group">
            <div class="fui-cell">
                <div class="fui-cell-info account-cell">
                    <input type="text" value="+60" disabled style="width: 30px;">
                    <input type="tel" class="fui-input" name="mobile" id="mobile" placeholder="<?php  echo $lang['lang_template_account_rf_2']?>" value="<?php  echo trim($_GPC['mobile'])?>" maxlength="10" />
                </div>
            </div>
            <?php  if(!empty($set['wap']['smsimgcode'])) { ?>
                <div class="fui-cell">
                    <div class="fui-cell-info account-cell"><input type="tel" class="fui-input" name="verifycode" id="verifycode2" placeholder="<?php  echo $lang['lang_template_account_rf_3']?>" maxlength="4" /></div>
                    <div class="fui-cell-remark noremark">
                        <img src="../web/index.php?c=utility&a=code&r=<?php  echo time()?>" style="width: 4.5rem; vertical-align: middle;" id="btnCode2">
                    </div>
                </div>
            <?php  } ?>
            <div class="fui-cell" id="cell-verifycode">
                <div class="fui-cell-info account-cell">
                    <input type="tel" class="fui-input" name="verifycode" id="verifycode" placeholder="5<?php  echo $lang['lang_template_account_rf_4']?>" maxlength="5" />
                </div>
                <div class="fui-cell-remark noremark"><a class="btn btn-default btn-default-o  btn-sm account-btn" id="btnCode" ><?php  echo $lang['lang_template_account_rf_5']?></a></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-info account-cell"><input type="password" class="fui-input"  name="pwd" id="pwd" placeholder="<?php  echo $lang['lang_template_account_rf_6']?>" value=""/></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-info account-cell"><input type="password" class="fui-input"  name="pwd1" id="pwd1" placeholder="<?php  echo $lang['lang_template_account_rf_7']?>" value=""/></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-info ">
                    <div class="btn btn-default btn-default-o block account-btn" id="btnSubmit"><?php  if(empty($type)) { ?><?php  echo $lang['lang_template_account_rf_8']?><?php  } else { ?><?php  echo $lang['lang_template_account_rf_9']?><?php  } ?></div>
                </div>
            </div>
            <div class="fui-cell-title" style="padding:0rem 1rem;;">
                <a href="<?php  echo $set['wap']['loginurl'];?>" class="account-login-link external pull-right"><?php  echo $lang['lang_template_account_rf_10']?></a>
                <?php  if(empty($type)) { ?>
                    <a href="<?php  echo $set['wap']['forgeturl'];?>" class="account-login-link  external"><?php  echo $lang['lang_template_account_rf_11']?> </a>
                <?php  } else { ?>
                    <a href="<?php  echo $set['wap']['regurl'];?>" class="account-login-link  external"><?php  echo $lang['lang_template_account_rf_12']?> </a>
                <?php  } ?>
            </div>

        </div>
        <script language='javascript'>
            require(['biz/member/account'], function (modal) {
                modal.initRf({backurl:'<?php  echo $backurl;?>', type: <?php  echo intval($type)?>, endtime: <?php  echo intval($endtime)?>, imgcode: <?php  echo intval($set['wap']['smsimgcode'])?>});
            });
        </script>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>