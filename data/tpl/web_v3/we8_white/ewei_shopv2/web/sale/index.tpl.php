<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='page-header'><span>当前位置：<span class="text-primary">抵扣设置</span></span>     </div>
    <div class="page-content">
    <form id="dataform"    <?php if(cv('sale.deduct')) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate">







    <div class="panel " >
        <div class="panel-body">
            <div class="col-sm-9 col-xs-12">
                <h4 class="set_title">积分抵扣</h4>
                <span> 开启积分抵扣, 商品最多抵扣的数目需要在商品【营销设置】中单独设置</span>
            </div>
            <div class="col-lg pull-right" style="padding-top:10px;text-align: right" >
                <?php if(cv('sale.deduct')) { ?>
                <input type="checkbox" class="js-switch" name="data[creditdeduct]" value="1" <?php  if($data['creditdeduct']==1) { ?>checked<?php  } ?> />
                <?php  } else { ?>
                <?php  if($data['creditdeduct']==1) { ?>
                <span class='text-success'>开启</span>
                <?php  } else { ?>
                <span class='text-default'>关闭</span>
                <?php  } ?>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group"  id='creditdeduct' <?php  if(empty($data['creditdeduct'])) { ?>style="display:none"<?php  } ?>>
        <label class="pull-left" style="margin-left: 40px">积分抵扣比例</label>
        <div class="col-sm-5">
            <?php if(cv('sale.deduct')) { ?>
            <div class='input-group fixsingle-input-group'>
                <input type="hidden" name="data[credit]" value="1" class="form-control" />
                <span class='input-group-addon'>1个积分 抵扣</span>
                <input type="text" name="data[money]"  value="<?php  echo $data['money'];?>" class="form-control" />
                <span class='input-group-addon'>元</span>
            </div>
            <span class='help-block'>积分抵扣比例设置</span>
            <?php  } else { ?>
            <div class='form-control-static'><?php  echo $data['credit'];?>积分 抵扣 <?php  echo $data['money'];?> 元</div>
            <?php  } ?>
        </div>
    </div>

    </div>


    <div class="panel" >
        <div class="panel-body">
            <div class="col-sm-10 col-xs-12">
                <h4 class="set_title">余额抵扣</h4>
                <span>会员可以用余额+在线支付方式支付订单,商品最多抵扣的数目需要在商品【营销设置】中单独设置</span>
            </div>
            <div class="col-lg pull-right" style="padding-top:10px;text-align: right" >
                <?php if(cv('sale.deduct')) { ?>
                <input type="checkbox" class="js-switch" name="data[moneydeduct]" value="1" <?php  if($data['moneydeduct']==1) { ?>checked<?php  } ?> />
                <?php  } else { ?>
                <?php  if($data['moneydeduct']==1) { ?>
                <span class='text-success'>开启</span>
                <?php  } else { ?>
                <span class='text-default'>关闭</span>
                <?php  } ?>
                <?php  } ?>

            </div>
        </div>


        <div class="form-group"  id='moneydeduct' <?php  if(empty($data['moneydeduct'])) { ?>style="display:none"<?php  } ?>>
        <label class="col-lg control-label">可以抵扣运费</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('sale.deduct')) { ?>
            <label class="radio-inline">
                <input type="radio" name="data[dispatchnodeduct]" value='0' <?php  if($data['dispatchnodeduct']==0) { ?>checked<?php  } ?> /> 可以
            </label>
            <label class="radio-inline">
                <input type="radio" name="data[dispatchnodeduct]" value='1' <?php  if($data['dispatchnodeduct']==1) { ?>checked<?php  } ?> /> 不可以
            </label>
            <span class='help-block'>会员使用余额抵扣时，能不能抵扣运费</span>
            <?php  } else { ?>
            <div class='form-control-static'><?php  if($data['dispatchnodeduct']==1) { ?>不可以<?php  } else { ?>可以<?php  } ?></div>
            <?php  } ?>
        </div>
    </div>

    </div>

    <?php if(cv('sale.deduct')) { ?>
    <div class="form-group"></div>
    <div class="form-group">

        <div class="col-sm-12">
            <input type="submit"  value="保存设置" class="btn btn-primary"/>

        </div>
    </div>
    <?php  } ?>

    </form>
</div>
<script language="javascript">
    $(function () {
        $(":checkbox[name='data[creditdeduct]']").click(function () {
            if ($(this).prop('checked')) {
                $("#creditdeduct").show();
            }
            else {
                $("#creditdeduct").hide();
            }
        })

        $(":checkbox[name='data[moneydeduct]']").click(function () {
            if ($(this).prop('checked')) {
                $("#moneydeduct").show();
            }
            else {
                $("#moneydeduct").hide();
            }
        })

    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

