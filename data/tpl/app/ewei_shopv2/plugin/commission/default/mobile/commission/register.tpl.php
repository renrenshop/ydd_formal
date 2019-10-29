<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_register.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_commission_template_mobile_default_register.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<script>document.title = "<?php  echo $this->set['texts']['become']?>"; </script>
<div class='fui-page fui-page-current page-commission-register'>
    <?php  if(is_h5app()) { ?>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_0']?><?php  echo $this->set['texts']['agent']?></div>
        <div class="fui-header-right"></div>
    </div>
    <?php  } ?>
    <div class='fui-content'>
        <img style='width:100%;position: relative' src="<?php  if(empty($set['regbg'])) { ?>../addons/ewei_shopv2/plugin/commission/template/mobile/default/static/images/bg.png<?php  } else { ?><?php  echo tomedia($set['regbg'])?><?php  } ?>" />

        <?php  if($member['agentblack']) { ?>
        <div class='content-empty' >
            <i class='icon icon-info text-danger'></i>
            <br/><span class="text-danger"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_1']?></span>
            <br/><a class="btn btn-danger" href="<?php  echo mobileUrl()?>"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_2']?></a>
        </div>

        <?php  } else { ?>
        <?php  if($set['become']==2 && $status==0) { ?>
        <div class='fui-list-group'>
            <div class='fui-list-group-title'><i class="icon icon-lights"></i> <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_3']?></div>
            <div class='fui-list'>
                <div class='fui-list-inner'>
                    <div class='text'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_4']?> <span class="text-danger text-bold"><?php  echo $order_totalcount;?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_5']?>
                        <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_6']?>&lt;<span class="text-danger text-bold"><?php  echo $_W['shopset']['shop']['name'];?></span>&gt;<?php  echo $lang['lang_plugin_commission_template_mobile_default_register_7']?><?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_8']?> <span class="text-danger text-bold"><?php  echo $order_count;?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_9']?></div>
                </div>
            </div></div>
        <a class="btn btn-danger block" href="<?php  echo mobileUrl()?>"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_10']?></a>
        <?php  } ?>
        <?php  if($set['become']==3 && $status==0) { ?>
        <div class='fui-list-group'>
            <div class='fui-list-group-title'><i class="icon icon-lights"></i> <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_11']?></div>
            <div class='fui-list'>
                <div class='fui-list-inner'>
                    <div class='text'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_12']?> <span class="text-danger text-bold"><?php  echo $money_totalcount;?></span> <?php  echo $this->set['texts']['yuan']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_13']?>
                        <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_14']?>&lt;<span class="text-danger text-bold"><?php  echo $_W['shopset']['shop']['name'];?></span>&gt;<?php  echo $lang['lang_plugin_commission_template_mobile_default_register_15']?><?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_16']?> <span class="text-danger text-bold"><?php  echo intval($moneycount)?></span> <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_17']?></div>
                </div>
            </div></div>
        <a class="btn btn-danger block external" href="<?php  echo mobileUrl()?>"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_18']?></a>
        <?php  } ?>
        <?php  if($set['become']==4 && $status==0 && $member['isagent']==0) { ?>
        <div class='fui-list-group'>
            <div class='fui-list-group-title'><i class="icon icon-lights"></i> <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_19']?></div>
            <a href="<?php  echo mobileUrl('goods/detail',array('id'=>$buy_goods['id']))?>">
                <div class='fui-list'>
                    <div class='fui-list-media'><img src="<?php  echo tomedia($buy_goods['thumb'])?>" class='round' /></div>
                    <div class='fui-list-inner'>
                        <div class='text'><?php  echo $buy_goods['title'];?></div>
                        <div class='text'><?php  echo $buy_goods['marketprice'];?></div>
                    </div>
                </div>
            </a>
            <div class='fui-list'>

                <div class='fui-list-inner'>
                    <div class='text'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_20']?>&lt;<span class="text-danger text-bold"><?php  echo $_W['shopset']['shop']['name'];?></span>&gt;<?php  echo $lang['lang_plugin_commission_template_mobile_default_register_21']?>
                        <?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_22']?></div>
                </div>
            </div>
        </div>
        <a class="btn btn-danger block" href="<?php  echo mobileUrl('goods/detail',array('id'=>$buy_goods['id']))?>"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_23']?></a>
        <?php  } ?>

        <?php  if($member['status']==1 && $member['isagent']==1) { ?>
        <div class='content-info'>
            <i class='icon icon-roundcheck text-success'></i>
            <br/><span class="text-success"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_24']?></span>
            <br/><a class="btn btn-danger" href="<?php  echo mobileUrl()?>"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_25']?></a>
        </div>
        <?php  } ?>
        <?php  if($member['status']==0 && $member['isagent']==1) { ?>
        <div class='content-info' >
            <i class='icon icon-time'></i>
            <br/><span class=""><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_26']?></span>
            <br/><a class="btn btn-danger" href="<?php  echo mobileUrl()?>"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_27']?></a>
        </div>
        <?php  } ?>


        <?php  if(empty($member['status']) &&  empty($member['isagent']) && $set['become']=='1') { ?>
        <div class="fui-cell-group" style='margin-top:0'>
            <div class="fui-cell-title">
                <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_28']?><span class='text-danger'><?php  echo $_W['shopset']['shop']['name'];?></span><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_29']?>
            </div>
            <div class='fui-cell'>
                <div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_30']?></div>
                <div class='fui-cell-info overflow'><span class='text-danger'><?php  if(!empty($agent)) { ?><?php  echo $agent['nickname'];?><?php  } else { ?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_31']?><?php  } ?></span> (<?php  echo $lang['lang_plugin_commission_template_mobile_default_register_32']?>)</div>
            </div>

            <?php  if($template_flag) { ?>

            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diyform/formfields', TEMPLATE_INCLUDEPATH)) : (include template('diyform/formfields', TEMPLATE_INCLUDEPATH));?>

            <?php  } else { ?>

            <div class='fui-cell must'>
                <div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_33']?></div>
                <div class='fui-cell-info'><input type="text" class='fui-input' id='realname' placeholder="<?php  echo $lang['lang_plugin_commission_template_mobile_default_register_34']?>" value="<?php  echo $member['realname'];?>" /></div>
            </div>

            <div class='fui-cell must'>
                <div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_35']?></div>
                <div class='fui-cell-info'><input type="tel" class='fui-input' id='mobile' placeholder="<?php  echo $lang['lang_plugin_commission_template_mobile_default_register_36']?>" value="<?php  echo $member['mobile'];?>" /></div>
            </div>

            <div class='fui-cell'>
                <div class='fui-cell-label'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_37']?></div>
                <div class='fui-cell-info'><input type="text" class='fui-input' id='weixin' placeholder="<?php  echo $lang['lang_plugin_commission_template_mobile_default_register_38']?>" value="<?php  echo $member['weixin'];?>" /></div>
            </div>

            <?php  } ?>

            <?php  if($set['open_protocol'] == 1) { ?>
            <div class="fui-cell-group">
                <div class="fui-cell small ">
                    <div class="fui-cell-info">

                        <label class="checkbox-inline">
                            <input type="checkbox" class="fui-checkbox-primary" id="agree" <?php  if(!empty($reg)) { ?>checked<?php  } ?>/> <?php  echo $lang['lang_plugin_commission_template_mobile_default_register_39']?><a id="btn-apply" style="color:#337ab7;"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_40']?><?php  echo $apply_set['applytitle'];?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_41']?></a><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_42']?>
                        </label>

                    </div>
                </div>

            </div>

            <div class="pop-apply-hidden" style="display: none;">
                <div class="verify-pop pop">
                    <div class="close"><i class="icon icon-roundclose"></i></div>
                    <div class="qrcode">
                        <div class="inner">
                            <div class="title"><?php  echo $set['applytitle'];?></div>
                            <div class="text"><?php  echo $set['applycontent'];?></div>
                        </div>
                        <div class="inner-btn" style="padding: 0.5rem;">
                            <div class="btn btn-danger" style="width: 100%; margin: 0;"><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_43']?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php  } ?>

        </div>
        <div class='btn btn-danger block btn-submit'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_44']?><?php  echo $this->set['texts']['agent']?></div>


        <div class='fui-list-group vip-group'>

            <?php  if(empty($set['register_bottom'])) { ?>
                <div class='fui-list'>
                    <div class='fui-list-media '><i class='icon icon-vip'></i></div>
                    <div class='fui-list-inner'>
                        <div class='subtitle'><?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_45']?></div>
                    </div>
                </div>
                <div class='fui-list'>
                    <div class='fui-list-media '><i class='icon icon-qrcode text-default'></i></div>
                    <div class='fui-list-inner'>
                        <div class='subtitle'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_46']?></div>
                        <div class='text'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_47']?></div>
                    </div>
                </div>
                <div class='fui-list'>
                    <div class='fui-list-media'><i class='icon icon-money text-danger'></i></div>
                    <div class='fui-list-inner'>
                        <div class='subtitle'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_48']?><?php  echo $this->set['texts']['commission']?></div>
                        <div class='text'><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_49']?><?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_50']?><?php  echo $this->set['texts']['commission']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_51']?></div>
                    </div>
                </div>
                <div class='fui-list'>
                    <div class='fui-list-inner'>
                        <div class='text'><?php  echo $this->set['texts']['agent']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_52']?><?php  echo $this->set['texts']['commission1']?><?php  echo $lang['lang_plugin_commission_template_mobile_default_register_53']?></div>
                    </div>
                </div>
            <?php  } else if($set['register_bottom'] == 1) { ?>

                <?php  if(!empty($set['register_bottom_title1']) || !empty($set['register_bottom_content1'])) { ?>
                <div class='fui-list'>
                    <div class='fui-list-media '><i class='icon icon-vip'></i></div>
                    <div class='fui-list-inner'>
                        <div class='subtitle'><?php  echo $set['register_bottom_title1'];?></div>
                        <div class='text'><?php  echo $set['register_bottom_content1'];?></div>
                    </div>
                </div>
                <?php  } ?>

                <?php  if(!empty($set['register_bottom_title2']) || !empty($set['register_bottom_content2'])) { ?>
                <div class='fui-list'>
                    <div class='fui-list-media '><i class='icon icon-qrcode text-default'></i></div>
                    <div class='fui-list-inner'>
                        <div class='subtitle'><?php  echo $set['register_bottom_title2'];?></div>
                        <div class='text'><?php  echo $set['register_bottom_content2'];?></div>
                    </div>
                </div>
                <?php  } ?>

                <?php  if(!empty($set['register_bottom_title3']) || !empty($set['register_bottom_content3'])) { ?>
                <div class='fui-list'>
                    <div class='fui-list-media'><i class='icon icon-money text-danger'></i></div>
                    <div class='fui-list-inner'>
                        <div class='subtitle'><?php  echo $set['register_bottom_title3'];?></div>
                        <div class='text'><?php  echo $set['register_bottom_content3'];?></div>
                    </div>
                </div>
                <?php  } ?>

                <?php  if(!empty($set['register_bottom_remark'])) { ?>
                <div class='fui-list'>
                    <div class='fui-list-inner'>
                        <div class='text'><?php  echo $set['register_bottom_remark'];?></div>
                    </div>
                </div>
                <?php  } ?>
            <?php  } else if($set['register_bottom'] == 2) { ?>
                <div class="row">
                    <?php  echo $set['register_bottom_content'];?>
                </div>
            <?php  } ?>

        </div>

        <?php  } ?>

        <?php  } ?>

    </div>
    <script language="javascript">
        require(['../addons/ewei_shopv2/plugin/commission/static/js/register.js'], function (modal) {
            modal.init("<?php  echo $mid;?>",<?php  echo json_encode($apply_set)?>);

        })
    </script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
