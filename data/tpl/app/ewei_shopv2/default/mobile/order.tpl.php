<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_order_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .fui-list-media img{height:2.5rem;}
</style>
<div class='fui-page order-list-page'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  echo $lang['lang_template_mobile_order_index_0']?></div>
        <div class="fui-header-right">
            <a class="icon icon-delete external"></a>
        </div>
    </div>
    <?php  if($_GPC['status']=='4') { ?>
    <div id="tab" class="fui-tab fui-tab-danger">
        <a href="<?php  echo mobileUrl('order')?>" class="external"><?php  echo $lang['lang_template_mobile_order_index_1']?></a>
        <a class='external active'  data-status=''><?php  echo $lang['lang_template_mobile_order_index_2']?>/<?php  echo $lang['lang_template_mobile_order_index_3']?></a>
    </div>

    <?php  } else { ?>
    <div id="tab" class="fui-tab fui-tab-danger">
        <a data-tab="tab"  class="external <?php  if($_GPC['status']=='') { ?>active<?php  } ?>" data-status=''><?php  echo $lang['lang_template_mobile_order_index_4']?></a>
        <a data-tab="tab0" class="external <?php  if($_GPC['status']=='0') { ?>active<?php  } ?>"  data-status='0'><?php  echo $lang['lang_template_mobile_order_index_5']?></a>
        <a data-tab="tab1" class="external <?php  if($_GPC['status']=='1') { ?>active<?php  } ?>"  data-status='1'><?php  echo $lang['lang_template_mobile_order_index_6']?></a>
        <a data-tab="tab2" class="external <?php  if($_GPC['status']=='2') { ?>active<?php  } ?>"  data-status='2'><?php  echo $lang['lang_template_mobile_order_index_7']?></a>
        <a data-tab="tab3" class="external <?php  if($_GPC['status']=='3') { ?>active<?php  } ?>"  data-status='3'><?php  echo $lang['lang_template_mobile_order_index_8']?></a>
    </div>
    <?php  } ?>

    <div class='fui-content navbar order-list' >

        <div class='fui-content-inner'>
            <div class='content-empty' style='display:none;'>
                <i class='icon icon-lights'></i><br/><?php  echo $lang['lang_template_mobile_order_index_9']?><br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'><?php  echo $lang['lang_template_mobile_order_index_10']?></a>
            </div>
            <div class='container'></div>
            <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> <?php  echo $lang['lang_template_mobile_order_index_11']?>...</span></div>
        </div>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_copyright', TEMPLATE_INCLUDEPATH)) : (include template('_copyright', TEMPLATE_INCLUDEPATH));?>
    </div>

    <script id='tpl_order_index_list' type='text/html'>

        <%each list as order%>
        <div class='fui-list-group order-item' data-orderid="<%order.id%>" >
            <a href="<?php  echo mobileUrl('order/detail')?>&id=<%order.id%>" data-nocache='true'>
                <div class='fui-list-group-title'>
                    <?php  echo $lang['lang_template_mobile_order_index_12']?>: <%order.ordersn%>
                    <span class='status <%order.statuscss%>'><%order.statusstr%></span>
                </div>
                <%each order.goods[0].goods as g%>
                <div class="fui-list goods-list">
                    <div class="fui-list-media" style="<%if g.status==2%>padding-left:0.5rem;<%/if%>">
                        <img data-lazy="<%g.thumb%>" class="round">
                    </div>
                    <div class="fui-list-inner">
                        <div class="text goodstitle"><%if g.seckill_task%><span class="fui-label fui-label-danger"><%g.seckill_task.tag%></span><%/if%><%g.title%></div>
                        <%if g.status==2%><span class="fui-label fui-label-danger"><?php  echo $lang['lang_template_mobile_order_index_13']?></span><%/if%>
                        <%if g.optionid!='0'%><div class='subtitle'><%g.optiontitle%></div><%/if%>

                    </div>
                    <div class='fui-list-angle'>
                        RM <span class='marketprice'><%g.price%><br/>   x<%g.total%>
                    </div>

                </div>

                <%/each%>

                <div class='fui-list-group-title lineblock'>
                    <span class='status'><?php  echo $lang['lang_template_mobile_order_index_14']?> <span class='text-danger'><%order.goods.length%></span> <?php  echo $lang['lang_template_mobile_order_index_15']?> <?php  echo $lang['lang_template_mobile_order_index_16']?>: <span class='text-danger'>RM <%order.price%></span></span>
                </div>
            </a>
            <div class='fui-list-group-title lineblock opblock' style="height: auto;">
        <span class='status'>

        <%if order.userdeleted==1%>
            <%if order.status==3 || order.status==-1%>
            <div class="btn btn-default btn-default-o order-deleted" data-orderid="<%order.id%>"><?php  echo $lang['lang_template_mobile_order_index_17']?></div>
            <%/if%>
            <%if order.status==3%>
            <div class="btn btn-default btn-default-o order-recover" data-orderid="<%order.id%>"><?php  echo $lang['lang_template_mobile_order_index_18']?></div>
            <%/if%>
        <%/if%>


        <%if order.userdeleted==0%>
      <%if order.status==0%>
        <div class="btn btn-default btn-default-o order-cancel"><?php  echo $lang['lang_template_mobile_order_index_19']?>
            <select data-orderid="<%order.id%>">

                <option value=""><?php  echo $lang['lang_template_mobile_order_index_20']?></option>
                <option value="<?php  echo $lang['lang_template_mobile_order_index_21']?>"><?php  echo $lang['lang_template_mobile_order_index_22']?></option>
                <option value="<?php  echo $lang['lang_template_mobile_order_index_23']?>"><?php  echo $lang['lang_template_mobile_order_index_24']?></option>
                <option value="<?php  echo $lang['lang_template_mobile_order_index_25']?>"><?php  echo $lang['lang_template_mobile_order_index_26']?></option>
                <option value="<?php  echo $lang['lang_template_mobile_order_index_27']?>"><?php  echo $lang['lang_template_mobile_order_index_28']?></option>
            </select>
        </div>
            <?php  if(is_mobile()) { ?>
        <%if order.paytype!=3%>
        <a class="btn btn-danger external" href="<?php  echo mobileUrl('order/pay')?>&id=<%order.id%>" data-nocache="true"><?php  echo $lang['lang_template_mobile_order_index_29']?></a>
        <%/if%>
            <?php  } ?>
    <%/if%>

    <%if order.canverify&&order.status!=-1&&order.status!=0%>
    <div class="btn btn-default btn-default-o order-verify" data-nocache="true" data-orderid="<%order.id%>" data-verifytype="<%order.verifytype%>" style="margin-left:.5rem;" >
        <i class="icon icon-qrcode"></i>
        <span><%if order.dispatchtype==1%><?php  echo $lang['lang_template_mobile_order_index_30']?><%else%><?php  echo $lang['lang_template_mobile_order_index_31']?><%/if%></span>
    </div>
    <%/if%>

    <%if order.status==3 || order.status==-1%>
    <div class="btn btn-default btn-default-o order-delete" data-orderid="<%order.id%>"><?php  echo $lang['lang_template_mobile_order_index_32']?></div>
    <%/if%>

    <?php  if(empty($trade['closecomment'])) { ?>
    <%if order.status==3 && order.iscomment==1%>
    <a class="btn btn-default btn-default-o" data-nocache="true" href="<?php  echo mobileUrl('order/comment')?>&id=<%order.id%>"><?php  echo $lang['lang_template_mobile_order_index_33']?></a>
    <%/if%>

    <%if order.status==3 && order.iscomment==0%>
    <a class="btn btn-default btn-default-o" data-nocache="true" href="<?php  echo mobileUrl('order/comment')?>&id=<%order.id%>"><?php  echo $lang['lang_template_mobile_order_index_34']?></a>
    <%/if%>
    <?php  } ?>

    <%if order.status>1 && order.addressid>0%>
    <a class="btn btn-default" href="<?php  echo mobileUrl('order/express')?>&id=<%order.id%>"><?php  echo $lang['lang_template_mobile_order_index_35']?></a>
    <%/if%>

    <%if order.status==2%>
    <div class="btn btn-default btn-default-o order-finish" data-orderid="<%order.id%>"><?php  echo $lang['lang_template_mobile_order_index_36']?></div>
    <%/if%>

    <%if order.canrefund%>
            <a class="btn btn-warning" data-nocache="true" href="<?php  echo mobileUrl('order/refund')?>&id=<%order.id%>"><%if order.status==1%><?php  echo $lang['lang_template_mobile_order_index_37']?><%else%><?php  echo $lang['lang_template_mobile_order_index_38']?><%/if%><%if order.refundstate>0%><?php  echo $lang['lang_template_mobile_order_index_39']?><%/if%></a>
            <%/if%>
        <%/if%>

        </span>
            </div>
        </div>
        <%/each%>
    </script>
    <?php  if(com('verify')) { ?>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('order/verify', TEMPLATE_INCLUDEPATH)) : (include template('order/verify', TEMPLATE_INCLUDEPATH));?>
    <?php  } ?>
    <script language='javascript'>require(['biz/order/list'], function (modal) {
        modal.init({fromDetail:false,status:"<?php  echo $_GPC['status'];?>",merchid:<?php  echo intval($_GPC['merchid'])?>});
    });</script>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>