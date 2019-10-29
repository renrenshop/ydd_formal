<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_merch_template_mobile_default_order_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_merch_template_mobile_default_order_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class='fui-page order-list-page order2'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back" href="<?php  echo mobileUrl('order')?>"></a>
        </div>
        <div class="title">我的订单</div>
        <div class="fui-header-right">
            <a class="icon icon-delete external">回收站</a>
        </div>
    </div>
    <?php  if($_GPC['status']=='4') { ?>
    <div id="tab" class="fui-tab fui-tab-danger">
        <a href="<?php  echo mobileUrl('order')?>" class="external">其他订单</a>
        <a class='external active'  data-status=''>退/换货</a>
    </div>

    <?php  } else { ?>
    <div id="tab" class="fui-tab fui-tab-danger">
        <a data-tab="tab"  class="external <?php  if($_GPC['status']=='') { ?>active<?php  } ?>" data-status=''>全部</a>
        <a data-tab="tab0" class='external <?php  if($_GPC['status']=='0') { ?>active<?php  } ?>'  data-status='0'>待付款</a>
        <a data-tab="tab1" class='external <?php  if($_GPC['status']=='1') { ?>active<?php  } ?>'  data-status='1'>待发货</a>
        <a data-tab="tab2" class='external <?php  if($_GPC['status']=='2') { ?>active<?php  } ?>'  data-status='2'>待收货</a>
        <a data-tab="tab3" class='external <?php  if($_GPC['status']=='3') { ?>active<?php  } ?>'  data-status='3'>已完成</a>
    </div>
    <?php  } ?>

    <div class='fui-content navbar order-list' >

        <div class='fui-content-inner'>
            <div class='content-empty' style='display:none;'>
                <!--<i class='icon icon-lights'></i><br/>暂时没有任何订单<br/><a href="<?php  echo mobileUrl()?>" class='btn btn-default-o external'>到处逛逛</a>-->
                <img src="<?php echo EWEI_SHOPV2_STATIC;?>images/nolist.png" style="width: 6rem;margin-bottom: .5rem;"><br/><p style="color: #999;font-size: .75rem">您暂时没有任何订单哦！</p><br/><a href="<?php  echo mobileUrl()?>" class='btn btn-sm btn-danger-o external' style="border-radius: 100px;height: 1.9rem;line-height:1.9rem;width:  7rem;font-size: .75rem">去首页逛逛吧</a>
            </div>
            </div>
            <div class='container'></div>
            <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>
        </div>
    </div>

    <script id='tpl_order_index_list' type='text/html'>

        <%each list as order%>
        <div class='fui-list-group order-item' data-orderid="<%order.id%>" data-verifycode="<%order.verifycode%>">
            <%if order.merchname != ''%>


                <a class="fui-list external" style="padding: 0.42rem 0.5rem"; href="<?php  echo mobileUrl('order/detail')?>&id=<%order.id%>" class="" data-nocache='true'>
                    <div class="fui-list-inner">
                        <div class="subtitle"> <%if order.iscycelbuy == 1%><span class="cycle-tip">周期购</span><%/if%>订单号: <%order.ordersn%></div>
                    </div>

                    <div class="row-remark <%order.statuscss%>" style="width: 4rem; font-size: 0.65rem;text-align: right;"><%order.statusstr%></div>
                    <div class="angle"></div>
                </a>
            <%/if%>
                <%each order.goods as goodlist%>
                    <a href="<%if order.merchid == 0%><?php  echo mobileUrl()?>%><%else%><?php  echo mobileUrl('merch')?>&merchid=<%order.merchid%><%/if%>" data-nocache='true'>
                        <div class='fui-list-group-title lineblock'>
                            <i class="icon icon-dianpu1"></i> <%goodlist.shopname%>
                            <span class='status noremark'></span>
                        </div>
                    </a>
                    <%each goodlist.goods as g%>
                    <a href="<?php  echo mobileUrl('order/detail')?>&id=<%order.id%>" class="external" data-nocache='true'>
                        <div class="fui-list goods-list">
                            <div class="fui-list-media" style="<%if g.status==2%><%/if%>">
                                <img data-lazy="<%g.thumb%>" class="">
                            </div>
                            <div class="fui-list-inner">
                                <div class="text goodstitle towline"><%if g.seckill_task%><span class="fui-label fui-label-danger"><%g.seckill_task.tag%></span><%/if%><%g.title%></div>
                                <%if g.status==2%><span class="fui-label fui-label-danger">赠品</span><%/if%>
                                <%if g.optionid!='0'%><div class='subtitle' style="color:#999;"><%g.optiontitle%></div><%/if%>

                            </div>
                            <div class='fui-list-angle'>
                                ￥<span class='marketprice'><%(g.price/g.total).toFixed(2)%><br/>   <span style="color: #999">x<%g.total%></span>
                            </div>

                        </div>
                    </a>
                    <%/each%>
                <%/each%>





                <div class='fui-list-group-title lineblock'>
                    <span class='status noremark'>共 <span ><%order.goods_num%></span> 个商品 实付: <span class='text-danger'>￥<%order.price%></span></span>
                </div>

            <div class='fui-list-group-title lineblock opblock' >
        <span class='status noremark'>
        <%if order.userdeleted==1%>
            <%if order.status==3 || order.status==-1%>
            <div class="btn btn-default btn-default-o order-deleted" data-orderid="<%order.id%>">彻底删除订单</div>
            <%/if%>
            <%if order.status==3%>
            <div class="btn btn-default btn-default-o order-recover" data-orderid="<%order.id%>">恢复订单</div>
            <%/if%>
        <%/if%>
        <%if order.userdeleted==0%>
            <%if order.status==0%>
            <div class="btn btn-default btn-default-o order-cancel">取消订单
                <select data-orderid="<%order.id%>">
                    <option value="">不取消了</option>
                    <option value="我不想买了">我不想买了</option>
                    <option value="信息填写错误，重新拍">信息填写错误，重新拍</option>
                    <option value="同城见面交易">同城见面交易</option>
                    <option value="其他原因">其他原因</option>
                </select>
            </div>
            <%if order.paytype!=3%>
            <a class="btn btn-sm btn-danger-o" href="<?php  echo mobileUrl('order/pay')?>&id=<%order.id%>" data-nocache="true" >支付订单</a>
            <%/if%>
            <%/if%>

            <%if order.canverify&&order.status!=-1&&order.status!=0%>
            <%if order.isonlyverifygoods && order.verifygoods_id%>
            <a class="btn btn-sm btn-danger-o"  style="margin-left:.5rem;" href="<?php  echo mobileUrl('verifygoods/detail')?>&id=<%order.verifygoods_id%>">
        <i class="icon icon-erweimazhuanhuan"></i>
        <span>我要使用</span>
    </a>

            <%else%>
    <div class="btn btn-sm btn-danger-o order-verify" data-nocache="true" data-orderid="<%order.id%>" data-verifytype="<%order.verifytype%>" style="margin-left:.5rem;" >
        <i class="icon icon-erweimazhuanhuan"></i>
        <span><%if order.dispatchtype==1%>我要取货<%else%>我要使用<%/if%></span>
    </div>
         <%/if%>
            <%/if%>
            <%if order.status==3 || order.status==-1%>
                <div class="btn btn-default btn-default-o order-delete" data-orderid="<%order.id%>">删除订单</div>
            <%/if%>
            <?php  if(empty($trade['closecomment'])) { ?>
                <%if order.status==3 && order.iscomment==1%>
                <a class="btn btn-default btn-default-o" data-nocache="true" href="<?php  echo mobileUrl('order/comment')?>&id=<%order.id%>">追加评价</a>
                <%/if%>
                <%if order.status==3 && order.iscomment==0%>
                <a class="btn btn-sm btn-danger-o" data-nocache="true" href="<?php  echo mobileUrl('order/comment')?>&id=<%order.id%>">评价</a>
                <%/if%>
            <?php  } ?>
            <%if order.status>1 && order.addressid>0 && order.iscycelbuy ==0 %>
            <a class="btn btn-default btn-default-o" href="<?php  echo mobileUrl('order/express')?>&id=<%order.id%>" data-nocache="true">查看物流</a>
            <%/if%>
            <%if order.status==2 && order.iscycelbuy ==0 %>
            <div class="btn btn-sm btn-danger-o order-finish" data-orderid="<%order.id%>">确认收货</div>
            <%/if%>
            <%if order.canrefund && order.iscycelbuy ==0%>
            <a class="btn btn-default btn-default-o" data-nocache="true" href="<?php  echo mobileUrl('order/refund')?>&id=<%order.id%>"><%if order.status==1%>申请退款<%else%>申请售后<%/if%><%if order.refundstate>0%>中<%/if%></a>
            <%/if%>

           <%if order.canrefund && order.iscycelbuy == 1 %>
            <a class="btn btn-default btn-default-o" data-nocache="true" href="<?php  echo mobileUrl('order/refund')?>&id=<%order.id%>"><%if order.status==1%>申请退款<%/if%><%if order.refundstate>0%>中<%/if%></a>
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


<?php  $this->footerMenus()?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>