<?php defined('IN_IA') or exit('Access Denied');?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .forum-info {
        padding-left: 30px;
        text-align: left;
        font-size: 18px;
        line-height: 30px;
        border-right:1px solid #efefef;
        height: 200px;
    }
    .forum-info i{
        font-size:12px;
        color: #b4b4b4;
    }
    .forum-info small{
        font-size:12px;
        color: #44abf7 ;
        line-height: 76px;
        position: relative;
        padding-left: 15px;
    }
    .forum-info small:before{
        position: absolute;
        content: '';
        width:3px;
        height:13px;
        background: #44abf7;
        left:0;
        top:2px;
    }
    .views-number{
        font-size: 24px;
        font-weight:bold ;
        color: #696a6e;
    }
    .contact-box {
        height:200px;
        background-color: #ffffff;
        border: 1px solid #e7eaec;
        margin-bottom: 20px;
    }
</style>
<div class="page-header">
    当前位置：<span class="text-primary">结算概述</span>
</div>
<div class="page-content">
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-sm-12">
            <div class="views-number" >
                <small>余额提现</small></div>
            <div class="contact-box" style="border:1px solid #e7eaec">
                <div class="forum-item">
                    <div class="row" style="margin-left: 0">
                        <a href="<?php  echo merchUrl('apply/list/add')?>">
                            <div class="col-sm-3 forum-info">
                                <div>
                                    <small>可提现金额</small>
                                </div>
                                 <span class="views-number status0">
                                    --
                                </span><br/>
                                <i class="commission">--</i><br/>
                                <a class="btn btn-primary btn-sm" href="<?php  echo merchUrl('apply/list/add')?>" style="color: #fff">申请提现</a>
                            </div>
                        </a>

                        <a href="<?php  echo merchUrl('apply/list/status1')?>">
                            <div class="col-sm-3 forum-info">
                                <div>
                                    <small>待审核金额</small>
                                </div>
                                  <span class="views-number status1">
                                   ￥--
                                </span><br/>
                                <i class="commission1">--</i><br/>
                            </div>
                        </a>

                        <a href="<?php  echo merchUrl('apply/list/status2')?>">
                            <div class="col-sm-3 forum-info">
                                <div>
                                    <small>待结算金额</small>
                                </div>
                                    <span class="views-number status2">
                                       --
                                    </span><br/>
                                <i class="commission2">--</i><br/>
                            </div>
                        </a>


                        <a href="<?php  echo merchUrl('apply/list/status3')?>">
                            <div class="col-sm-3 forum-info" style="border: none">
                                <div>
                                    <small>已结算金额</small>
                                </div>
                                <span class="views-number status3">
                                   --
                                </span><br/>
                                <i class="commission3">--</i><br/>
                            </div>
                        </a>
                    </div>

                    <!--<div class="row">-->
                        <!--<div class="col-sm-3" style="padding-left: 80px;">-->
                           
                        <!--</div>-->
                    <!--</div>-->
                </div>

            </div>
        </div>

        <div class="col-md-10 col-sm-10" style="display: none;">
            <?php  if(!empty($order_ok)) { ?>
            <div class="ibox float-e-margins" style="border: 1px solid #e7eaec">
                <div class="ibox-title">
                    <h5>用户购买待发货订单</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th class="col-sm-1">状态</th>
                            <th class="col-sm-2">日期</th>
                            <th class="col-sm-1">金额</th>
                            <th class="col-sm-2">用户</th>
                            <th class="col-sm-3">订单号</th>
                            <th class="col-sm-2">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  if(is_array($order_ok)) { foreach($order_ok as $key => $value) { ?>
                        <tr>
                            <td><span class="label label-warning">待发货</span>
                            </td>
                            <td><?php  echo date('Y-m-d H:i',$value['createtime'])?></td>
                            <td class="text-navy"><?php  echo $value['price'];?></td>
                            <td><?php echo !empty($value['address']['realname']) ? $value['address']['realname'] : $value['invoicename']?></td>
                            <td class="text-navy"><?php  echo $value['ordersn'];?></td>
                            <td>
                                <?php if(mcv('order.detail')) { ?>
                                <a href="<?php  echo merchUrl('order/detail',array('id'=>$value['id']))?>" class="btn btn-xs btn-primary">查看详情</a></td>
                            <?php  } ?>
                        </tr>
                        <?php  } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php  } else { ?>
            <div class="panel panel-default">
                <div class="panel-body" style="text-align: center;padding:30px;">
                    暂时没有任何待处理订单!
                </div>
            </div>
            <?php  } ?>
        </div>

    </div>
    <div class="row" id="iscredit" style="display: none">
        <div class="col-sm-12">
            <div class="views-number" >
            <small>积分提现</small></div>
            <div class="contact-box" style="border:1px solid #e7eaec">
                <div class="forum-item">
                    <div class="row" style="margin-left: 0">
                        <a href="<?php  echo merchUrl('apply/credit/add')?>">
                            <div class="col-sm-3 forum-info">
                                <div>
                                    <small>可提现金额</small>
                                </div>
                                <span class="views-number credit0">
                                    ￥--
                                </span><br/>
                                <i> </i><br/>
                                <a class="btn btn-primary btn-sm" href="<?php  echo merchUrl('apply/credit/add')?>" style="color: #fff">申请提现</a>
                            </div>
                        </a>

                        <a href="<?php  echo merchUrl('apply/credit/status1')?>">
                            <div class="col-sm-3 forum-info">
                                <div>
                                    <small>待审核金额</small>
                                </div>
                                <span class="views-number credit1">
                                   ￥--
                                </span><br/>

                            </div>
                        </a>

                        <a href="<?php  echo merchUrl('apply/credit/status2')?>">
                            <div class="col-sm-3 forum-info">
                                <div>
                                    <small>待结算金额</small>
                                </div>
                                <span class="views-number credit2">
                                       ￥--
                                    </span><br/>

                            </div>
                        </a>


                        <a href="<?php  echo merchUrl('apply/credit/status3')?>">
                            <div class="col-sm-3 forum-info" style="border: none">
                                <div>
                                    <small>已结算金额</small>
                                </div>
                                <span class="views-number credit3">
                                  ￥--
                                </span><br/>

                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>


    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                type: "GET",
                url: "<?php  echo merchUrl('apply/index/ajaxgettotalprice')?>",
                dataType: "json",
                success: function (data) {
                    var res = data.result;
                    $("span.status0").text(res.status0+"元");
                    $(".commission").text("已扣除佣金："+res.commission+"元");
                    $("span.status1").text(res.status1+"元");
                    $(".commission1").text("已扣除佣金："+res.commission1+"元");
                    $("span.status2").text(res.status2+"元");
                    $(".commission2").text("已扣除佣金："+res.commission2+"元");
                    $("span.status3").text(res.status3+"元");
                    $(".commission3").text("已扣除佣金："+res.commission3+"元");
                }
            });
            $.ajax({
                type: "GET",
                url: "<?php  echo merchUrl('apply/index/ajaxgettotalcredit')?>",
                dataType: "json",
                success: function (data) {
                    var res = data.result;
                    console.log(res);
                    if (res.iscredit != 1){
                        $("#iscredit").show();
                    }
                    $("span.credit0").text(res.credit0+"元");
                    $("span.credit1").text(res.credit1+"元");
                    $("span.credit2").text(res.credit2+"元");
                    $("span.credit3").text(res.credit3+"元");
                }
            });
        });
    </script>


    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
</div>