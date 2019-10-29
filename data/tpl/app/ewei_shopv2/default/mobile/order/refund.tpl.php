<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_refund.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_refund.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page <?php  if(empty($order['refundstate'])) { ?>fui-page-current<?php  } ?>' id='page-refund-edit' >
<div class="fui-header">
    <div class="fui-header-left">
        <a class="back" onclick='history.back()'></a>
    </div>
    <div class="title"><?php  if($order['status']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_0']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_1']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_2']?></div>
    <div class="fui-header-right">&nbsp;</div>
</div>
<div class='fui-content margin navbar'>
    <div class="fui-cell-group">
        <div class="fui-cell">
            <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_3']?></div>
            <div class="fui-cell-info">

                <select id="rtype">
                    <?php  if($order['status']==2 || $order['status']==3) { ?>
                    <option value="1" <?php  if($refund['rtype']=='1') { ?>selected<?php  } ?>><?php  echo $lang['lang_template_mobile_order_refund_4']?></option>
                    <option value="2" <?php  if($refund['rtype']=='2') { ?>selected<?php  } ?>><?php  echo $lang['lang_template_mobile_order_refund_5']?></option>
                    <?php  } ?>
                    <option value="0" <?php  if($refund['rtype']=='0') { ?>selected<?php  } ?>><?php  echo $lang['lang_template_mobile_order_refund_6']?>(<?php  echo $lang['lang_template_mobile_order_refund_7']?>)</option>
                </select>
            </div>
            <div class="fui-cell-remark"></div>

        </div>
        <div class="fui-cell">
            <div class="fui-cell-label"><span class="re-g"><?php  if($refund['rtype']=='2') { ?><?php  echo $lang['lang_template_mobile_order_refund_8']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_9']?><?php  } ?></span><?php  echo $lang['lang_template_mobile_order_refund_10']?></div>
            <div class="fui-cell-info">

                <select id="reason">
                    <option value="<?php  echo $lang['lang_template_mobile_order_refund_11']?>" <?php  if($refund['reason']==$lang['lang_template_mobile_order_refund_12']) { ?>selected<?php  } ?>><?php  echo $lang['lang_template_mobile_order_refund_13']?></option>
                    <option value="<?php  echo $lang['lang_template_mobile_order_refund_14']?>" <?php  if($refund['reason']==$lang['lang_template_mobile_order_refund_15']) { ?>selected<?php  } ?>><?php  echo $lang['lang_template_mobile_order_refund_16']?></option>
                    <option value="<?php  echo $lang['lang_template_mobile_order_refund_17']?>/<?php  echo $lang['lang_template_mobile_order_refund_18']?>" <?php  if($refund['reason']==$lang['lang_template_mobile_order_refund_19']) { ?>.'/'.$lang['lang_template_mobile_order_refund_20']}selected<?php  } ?>><?php  echo $lang['lang_template_mobile_order_refund_21']?>/<?php  echo $lang['lang_template_mobile_order_refund_22']?></option>
                    <option value="<?php  echo $lang['lang_template_mobile_order_refund_23']?>" <?php  if($refund['reason']==$lang['lang_template_mobile_order_refund_24']) { ?>selected<?php  } ?>><?php  echo $lang['lang_template_mobile_order_refund_25']?></option>
                </select>
            </div>
            <div class="fui-cell-remark"></div>
        </div>

        <div class="fui-cell">
            <div class="fui-cell-label"><span class="re-g"><?php  if($refund['rtype']=='2') { ?><?php  echo $lang['lang_template_mobile_order_refund_26']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_27']?><?php  } ?></span><?php  echo $lang['lang_template_mobile_order_refund_28']?></div>
            <div class="fui-cell-info">
                <input type="text" id="content" class='fui-input' placeholder="<?php  echo $lang['lang_template_mobile_order_refund_29']?>" value="<?php  echo $refund['content'];?>"/>
            </div>
        </div>

        <div class="fui-cell r-group" <?php  if($refund['rtype']=='2') { ?>style="display:none;"<?php  } ?>>
        <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_30']?></div>
        <div class="fui-cell-info">
            <input type="number" id="price" class='fui-input' placeholder="<?php  echo $lang['lang_template_mobile_order_refund_31']?>" value="<?php  if(!empty($refund['id'])) { ?><?php  echo $show_price?><?php  } ?>" />
        </div>


    </div>
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_32']?></div>
        <div class="fui-cell-info">

            <ul class="fui-images fui-images-sm" id="images">

                <?php  if(is_array($refund['imgs'])) { foreach($refund['imgs'] as $k => $v) { ?>
                <input type="hidden" name="images[]" value="<?php  echo $v;?>" />
                <li style="background-image:url(<?php  echo tomedia($v)?>)" class="image image-sm" data-filename="<?php  echo $v;?>"><span class="image-remove"><i class="icon icon-roundclose"></i></span></li>
                <?php  } } ?>


            </ul>
            <div class="fui-uploader fui-uploader-sm refund-container-uploader" <?php  if(count($refund['imgs'])==5) { ?>style='display:none'<?php  } ?>
            data-name="images[]"
            data-max="5"
            data-count="<?php  echo count($refund['imgs'])?>">
            <input type="file" name='imgFile0' id='imgFile0'>
        </div>

    </div>
</div>

<div class='fui-title r-group'  <?php  if($refund['rtype']=='2') { ?>style="display:none;"<?php  } ?>>
<?php  echo $lang['lang_template_mobile_order_refund_33']?>:<?php  echo $lang['lang_template_mobile_order_refund_34']?> <span class='text-danger'><?php  echo $lang['lang_template_mobile_order_refund_35']?><?php  echo number_format($order['refundprice'],2)?></span>
</div>

</div>


</div>
<div class='fui-footer text-right'>
    <a class='btn btn-danger btn-submit'><?php  echo $lang['lang_template_mobile_order_refund_36']?></a>
    <a class="btn btn-default btn-default-o back"><?php  echo $lang['lang_template_mobile_order_refund_37']?></a>
</div>
</div>

<div class='fui-page  <?php  if(!empty($order['refundstate'])) { ?>fui-page-current<?php  } ?>' id='page-refund-info'>
<div class="fui-header">
    <div class="fui-header-left">
        <a class="back" onclick='history.back()'></a>
    </div>
    <div class="title"><?php  if($order['status']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_38']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_39']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_40']?></div>
    <div class="fui-header-right">&nbsp;</div>
</div>
<div class='fui-content margin navbar'>
    <div class='fui-according-group'>
        <div class='fui-according expanded'>
            <div class='fui-according-header'>
                <i class='icon icon-info'></i>
					<span class="text"><?php  if($refund['status']==0) { ?><?php  echo $lang['lang_template_mobile_order_refund_41']?><?php  if($order['status']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_42']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_43']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_44']?><?php  } ?>
						<?php  if($refund['status']>=3) { ?><?php  echo $lang['lang_template_mobile_order_refund_45']?><?php  if($order['status']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_46']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_47']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_48']?><?php  } ?>
					</span>

                <div class='remark'></div>
            </div>
            <div class='fui-according-content'>
                <div class='content-block' style='font-size:.7rem;padding:.5rem .8rem'>
                    <?php  if($refund['rtype']==0) { ?>
                    <?php  if($refund['status']==0) { ?>
                    <?php  echo $lang['lang_template_mobile_order_refund_49']?> <br>1<?php  echo $lang['lang_template_mobile_order_refund_50']?><br>2<?php  echo $lang['lang_template_mobile_order_refund_51']?>
                    <?php  echo $lang['lang_template_mobile_order_refund_52']?>
                    <?php  } ?>
                    <?php  } else if($refund['rtype']==1) { ?>
                    <?php  echo $lang['lang_template_mobile_order_refund_53']?><br>1<?php  echo $lang['lang_template_mobile_order_refund_54']?><br>2<?php  echo $lang['lang_template_mobile_order_refund_55']?><br>3<?php  echo $lang['lang_template_mobile_order_refund_56']?><br>4<?php  echo $lang['lang_template_mobile_order_refund_57']?>
                    <?php  } else if($refund['rtype']==2) { ?>
                    <?php  echo $lang['lang_template_mobile_order_refund_58']?><br>1<?php  echo $lang['lang_template_mobile_order_refund_59']?><br>2<?php  echo $lang['lang_template_mobile_order_refund_60']?><br>3<?php  echo $lang['lang_template_mobile_order_refund_61']?><br>4<?php  echo $lang['lang_template_mobile_order_refund_62']?>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
    <?php  if($refund['status']>=3) { ?>

    <?php  if(!empty($refund['refundaddress'])) { ?>
    <div class="fui-list-group" style='margin-top:5px;'>
        <div class="fui-list-group-title"><i class='icon icon-location'></i> <?php  echo $lang['lang_template_mobile_order_refund_63']?></div>
        <div class="fui-list">
            <div class="fui-list-media"></div>
            <div class="fui-list-inner">
                <div class='text'><?php  echo $refund['refundaddress']['province'];?><?php  echo $refund['refundaddress']['city'];?><?php  echo $refund['refundaddress']['area'];?> <?php  echo $refund['refundaddress']['address'];?></div>
                <div class='subtitle'><?php  echo $refund['refundaddress']['name'];?> <?php  echo $refund['refundaddress']['mobile'];?> <?php  echo $refund['refundaddress']['tel'];?></div>
            </div>
        </div>
        <?php  if(!empty($refund['message'])) { ?>
        <div class="fui-list-group-title"><i class='icon icon-message'></i> <?php  echo $lang['lang_template_mobile_order_refund_64']?></div>
        <div class="fui-list">
            <div class="fui-list-media"></div>
            <div class="fui-list-inner">
                <div class='text'><span class='text-danger'><?php  echo $refund['message'];?></span></div>

            </div>
        </div>
        <?php  } ?>



    </div>
    <?php  } ?>

    <?php  if($refund['rtype']==1 || $refund['rtype']==2) { ?>

    <div class="fui-cell-group">

        <a class="fui-cell <?php  if($refund['status']==3) { ?>fui-cell-click<?php  } ?>" <?php  if($refund['status']==3) { ?>href='#page-refund-express'<?php  } ?>>
        <div class="fui-cell-label"><?php  if($refund['rtype']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_65']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_66']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_67']?></div>
        <div class='fui-cell-info'></div>
        <div class='fui-cell-remark  <?php  if($refund['status']!=3) { ?>noremark<?php  } ?>'>
        <?php  if($refund['status']==3) { ?>
        <?php  echo $lang['lang_template_mobile_order_refund_68']?>
        <?php  } else if($refund['status']==4) { ?>
        <?php  echo $lang['lang_template_mobile_order_refund_69']?>
        <?php  } else if($refund['status']==5) { ?>
        <?php  echo $lang['lang_template_mobile_order_refund_70']?>
        <?php  } ?></div>
    </a>

    <?php  if(!empty($refund['rexpresssn'])) { ?>
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  if($refund['rtype']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_71']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_72']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_73']?></div>
        <div class='fui-cell-info'><?php  echo $refund['rexpresscom'];?></div>
    </div>
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  if($refund['rtype']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_74']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_75']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_76']?></div>
        <div class='fui-cell-info'><?php  echo $refund['rexpresssn'];?></div>
    </div>
    <?php  } ?>
</div>
<?php  } ?>

<?php  } ?>

<div class='fui-title'><?php  echo $lang['lang_template_mobile_order_refund_77']?></div>
<div class="fui-cell-group">
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_78']?></div>
        <div class="fui-cell-info">
            <?php  if($refund['rtype']==0) { ?>
            <?php  echo $lang['lang_template_mobile_order_refund_79']?>
            <?php  } else if($refund['rtype']==1) { ?>
            <?php  echo $lang['lang_template_mobile_order_refund_80']?>
            <?php  } else { ?>
            <?php  echo $lang['lang_template_mobile_order_refund_81']?><?php  } ?>
        </div>
    </div>
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  if($refund['rtype']=='2') { ?><?php  echo $lang['lang_template_mobile_order_refund_82']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_83']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_84']?></div>
        <div class="fui-cell-info"><?php  echo $refund['reason'];?></div>
    </div>
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  if($refund['rtype']=='2') { ?><?php  echo $lang['lang_template_mobile_order_refund_85']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_86']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_87']?></div>
        <div class="fui-cell-info"><?php  if(empty($refund['content'])) { ?><?php  echo $lang['lang_template_mobile_order_refund_88']?><?php  } else { ?><?php  echo $refund['content'];?> <?php  } ?></div>
    </div>
    <?php  if($refund['applyprice']>0 && $refund['rtype']!=2) { ?>
    <div class="fui-cell">
        <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_89']?></div>
        <div class="fui-cell-info"><?php  echo number_format($refund['applyprice'],2)?> <?php  echo $lang['lang_template_mobile_order_refund_90']?></div>
    </div>
    <?php  } ?>

    <div class="fui-cell">
        <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_91']?></div>
        <div class="fui-cell-info"><?php  echo date('Y-m-d H:i',$refund['createtime'])?></div>
    </div>

</div>

</div>
<div class='fui-footer text-right'>
    <?php  if($refund['rtype']==2 && $refund['status']==5) { ?>
    <div class="btn btn-danger btn-receive"><?php  echo $lang['lang_template_mobile_order_refund_92']?></div>
    <a external data-nocache="true" href="<?php  echo mobileUrl('order/refund/refundexpress',array('id'=>$order['id'], 'express'=>$refund['rexpress'], 'expresscom'=>$refund['expresscom'],'expresssn'=>$refund['rexpresssn']))?>"><div class="btn btn-primary"><?php  echo $lang['lang_template_mobile_order_refund_93']?></div></a>
    <?php  } ?>

    <?php  if($refund['status']==3 || $refund['status']==4) { ?>
    <a data-nocache="true" class="btn btn-primary" href='#page-refund-express'><?php  if(empty($refund['express'])) { ?><?php  echo $lang['lang_template_mobile_order_refund_94']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_95']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_96']?></a>
    <?php  } ?>

    <?php  if($refund['status']==0) { ?>
    <a data-nocache="true" class='btn btn-danger btn-edit' href='#page-refund-edit'><?php  echo $lang['lang_template_mobile_order_refund_97']?></a>
    <?php  } ?>

    <?php  if($refund['status']!=5) { ?>
    <a class='btn btn-default-o btn-cancel'><?php  echo $lang['lang_template_mobile_order_refund_98']?></a>
    <?php  } ?>
</div>
</div>

<div class='fui-page' id='page-refund-express'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back" onclick='history.back()'></a>
        </div>
        <div class="title"><?php  if($order['status']==1) { ?><?php  echo $lang['lang_template_mobile_order_refund_99']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_order_refund_100']?><?php  } ?><?php  echo $lang['lang_template_mobile_order_refund_101']?></div>
        <div class="fui-header-right">&nbsp;</div>
    </div>
    <div class='fui-content margin'>
        <input type='hidden' id='express_old' value="<?php  echo $refund['express'];?>"/>
        <input type="hidden" name="expresscom" id="expresscom" value="<?php  echo $refund['expresscom'];?>">
        <div class="fui-cell-group">
            <div class='fui-cell-title'><?php  echo $lang['lang_template_mobile_order_refund_102']?></div>
            <div class="fui-cell">
                <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_103']?></div>
                <div class="fui-cell-info"><select id="express" name="express">
                    <option value="" data-name="<?php  echo $lang['lang_template_mobile_order_refund_104']?>"><?php  echo $lang['lang_template_mobile_order_refund_105']?></option>

                    <?php  if(is_array($express_list)) { foreach($express_list as $value) { ?>
                    <option value="<?php  echo $value['express'];?>" data-name="<?php  echo $value['name'];?>"><?php  echo $value['name'];?></option>
                    <?php  } } ?>
                </select></div>
            </div>
            <div class="fui-cell">
                <div class="fui-cell-label"><?php  echo $lang['lang_template_mobile_order_refund_106']?></div>
                <div class="fui-cell-info"><input type="text" id="expresssn" class='fui-input' value="<?php  echo $refund['expresssn'];?>" max="50"/></div>
            </div>
        </div>

    </div>
    <div class='fui-footer text-right'>
        <div class="btn btn-danger" id='express_submit'><?php  echo $lang['lang_template_mobile_order_refund_107']?></div>
        <a class="btn btn-default btn-default-o back"><?php  echo $lang['lang_template_mobile_order_refund_108']?></a>
    </div>




    <script language='javascript'>
        require(['biz/order/refund'], function (modal) {
            modal.init({orderid: "<?php  echo $orderid;?>",refundid:"<?php  echo $refundid;?>"});
        });

    </script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>