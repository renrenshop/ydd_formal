<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .select2 {width: 100%;}
    <?php  if(!empty($opensms)) { ?>
    .w200 {width:250px;}
    <?php  } else { ?>
    .w200 {width: 550px;}
    <?php  } ?>
    .w60 {width: 70px; text-align: right;}
    .form-horizontal .form-group {margin-left: 0; margin-right: 0;}
    .table > thead > tr > th {border:none;}
    .is_advanced {display: table-block;}
    #openids_selector .input-group {width: 100%;}
    #openids2_selector .input-group {width: 100%;}
    .is_sms {display: <?php  if(!empty($opensms)) { ?>table-block<?php  } else { ?>none<?php  } ?>;}
</style>

<div class="page-header">
    当前位置：<span class="text-primary">消息提醒设置</span>
</div>
<div class="page-content">
    <div class="alert alert-primary">
        <h3>注意：</h3>
        <p>点击模板消息后方的开关按钮<img src="../addons/ewei_shopv2/static/images/on-off.png" />即可<b>开启模板消息</b>，无需进行额外设置。</p>
    </div>

    <form action="" method="post" class="form-horizontal  form-validate" enctype="multipart/form-data" >

        <table class="table table-responsive">
            <thead>
            <th>卖家通知</th>
            <th>模板消息</th>
            <th ></th>
            </thead>
            <tbody>
            <tr>
                <td>订单付款通知</td>
                <td>
                </td>
                <td style="text-align: right;" class="is_advanced">
                    <label class="notice-default">
                        <input type="hidden" name="data[saler_pay_close_advanced]" value="<?php  echo intval($data['saler_pay_close_advanced'])?>" />
                        <input class="js-switch small checkone" data-type="tpl-advanced"  data-tag="saler_pay"  type="checkbox"   value="<?php  echo intval($data['saler_pay_close_advanced'])?>" <?php  if(empty($data['saler_pay_close_advanced'])) { ?>checked<?php  } ?>/>
                    </label>
                    <label style="display: none;">
                        <img src="../addons/ewei_shopv2/static/images/loading.gif" width="20" alt=""/>
                    </label>
                </td>

            </tr>
            <tr>
                <td style="vertical-align: top;">选择通知人-<br/>订单付款通知</td>
                <td colspan="<?php  if(!empty($opensms)) { ?>4<?php  } else { ?>2<?php  } ?>" class="colstd">
                    <?php  echo tpl_selector('openids',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>1,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择通知人', 'items'=>$salers,'url'=>webUrl('member/query') ))?>
                    <span class='help-block'>订单生成后以模板消息的方式商家通知，可以指定多个人，如果不填写则不通知</span>
                </td>
                <td class="is_default is_sms"></td>
            </tr>

            <tr>
                <td>订单收货通知</td>
                <td>
                </td>
                <td style="text-align: right;" class="is_advanced">
                    <label class="notice-default">
                        <input type="hidden" name="data[saler_finish_close_advanced]" value="<?php  echo intval($data['saler_finish_close_advanced'])?>" />
                        <input class="js-switch small checkone" data-type="tpl-advanced"  data-tag="saler_finish"  type="checkbox"   value="<?php  echo intval($data['saler_finish_close_advanced'])?>" <?php  if(empty($data['saler_finish_close_advanced'])) { ?>checked<?php  } ?>/>
                    </label>
                    <label style="display: none;">
                        <img src="../addons/ewei_shopv2/static/images/loading.gif" width="20" alt=""/>
                    </label>
                </td>
                <td class="is_sms">
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top;">选择通知人-<br/>订单收货通知</td>
                <td colspan="<?php  if(!empty($opensms)) { ?>4<?php  } else { ?>2<?php  } ?>" class="colstd">
                    <?php  echo tpl_selector('openids2',array('key'=>'openid','text'=>'nickname', 'thumb'=>'avatar','multi'=>1,'placeholder'=>'昵称/姓名/手机号','buttontext'=>'选择通知人', 'items'=>$salers2,'url'=>webUrl('member/query') ))?>
                    <span class='help-block'>订单生成后以模板消息的方式商家通知，可以指定多个人，如果不填写则不通知</span>
                </td>
                <td class="is_default is_sms"></td>
            </tr>

            </tbody>
        </table>

        <div class="form-group splitter"></div>

        <div class="form-group">
            <div class="col-sm-12 col-xs-12" style="text-align: right;">
                <?php if(mcv('sysset.notice.edit')) { ?>
                <input type="submit"  value="提交" class="btn btn-primary"  />
                <?php  } ?>
            </div>
        </div>
    </form>
</div>
<script>
    $(function () {

        var sms =  <?php  if(!empty($opensms)) { ?>true<?php  } else { ?>false<?php  } ?>;

        $(".is_advanced").show();
        $(".w60").css('width', '70px');
        if (sms){
            $(".w200").css('width', '250px');
        }else{
            $(".w200").css('width', '550px');
            $(".colstd").attr('colspan',2);
        }


        $(".js-switch").not(".checkhi").click(function () {
            var next = $(this).next();
            if(next.hasClass('checked')){
                $(this).val("1").prev().val("0");
            }else{
                $(this).val("0").prev().val("1");
            }
        });

        $(".checkhi").click(function () {
            var trueval = $(this).prev().data('true');
            var falseval = $(this).prev().data('false');
            var next = $(this).next();
            if(next.hasClass('checked')){
                $(this).val("1").prev().val(trueval);
            }else{
                $(this).val("0").prev().val(falseval);
            }
        });

        $(".checkall").click(function () {
            var type = $(this).data('type');
            var val = $(this).val();
            if(val==0){
                $(this).closest(".table").find(".checkone[data-type='"+type+"']").attr("checked","false").val("1").next().removeClass("checked").prev().prev().val("1");
            }else{
                $(this).closest(".table").find(".checkone[data-type='"+type+"']").attr("checked","true").val("0").next().addClass("checked").prev().prev().val("0");
            }
        });

        //开启通知
        $(".checkone").click(function () {
            var _this =$(this);
            var type = _this.data('type');
            var val = _this.val();

            var tag = _this.data('tag');
            var stop = _this.data('stop');

            if(stop==1)
            {
                return;
            }

            //判断是否开启模板通知
            if(tag != '' && val==1&&type=='tpl-advanced') {
                $(this).data('stop', 1);
                $(this).parent().hide().next().show();

                var data = {
                    'tag': tag,
                    checked:val
                };
                //申请微信模板,并将模板ID更新至数据库.
                $.ajax({
                    url: "<?php  echo webUrl('sysset/settemplateid')?>",
                    type:'get',
                    dataType:'json',
                    timeout : 3000, //超时时间设置，单位毫秒
                    data:data,
                    success:function(ret){
                        var _this = $(".checkone[data-tag='"+ret.result.tag+"']");
                        if (ret.result.status == '0') {
                            this.value=0;
                            _this.prev().val(1);
                            _this.next().removeClass('checked');

                            console.log(ret.result.messages);
                            alert(ret.result.messages);
                        }

                        $(_this).data('stop', 0);
                        $(_this).parent().show().next().hide();
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $(".table").each(function () {
                            var _this = $(this);
                            _this.find(".checkone[data-type='tpl-advanced']").each(function () {
                                $(this).data('stop', 0);
                                $(this).parent().show().next().hide();
                            });
                        });
                    }
                });
            }


            var type = $(this).data('type');
            var val = $(this).val();
            if(val==0){
                $(this).attr("checked","false").val("1").next().removeClass("checked");
                $(this).closest(".table").find(".checkall[data-type='"+type+"']").val("1").attr("checked","false").next().removeClass("checked");
            }else{
                $(this).attr("checked","true").val("0").next().addClass("checked");
                var all = true;
                $(this).closest(".table").find(".checkone[data-type='"+type+"']").each(function () {
                    var val = $(this).val();
                    if(val!='on' && val==1){
                        all = false;
                        return;
                    }
                });
                if(all){
                    $(this).closest(".table").find(".checkall[data-type='"+type+"']").val("0").attr("checked","true").next().addClass("checked");
                }
            }

        });

        $(".table").each(function () {
            var _this = $(this);
            var all_tpl_normal = true;
            var all_tpl_advanced = true;
            var all_sms = true;
            _this.find(".checkone[data-type='tpl-advanced']").each(function () {
                var val = $(this).val();
                if(val!='on' && val==1){
                    all_tpl_advanced = false;
                    return;
                }
            });
            _this.find(".checkone[data-type='sms']").each(function () {
                var val = $(this).val();
                if(val!='on' && val==1){
                    all_sms = false;
                    return;
                }
            });
            if(all_tpl_normal){
                _this.find(".checkall[data-type='tpl-normal']").val("0").attr("checked","true").next().addClass("checked");
            }
            if(all_tpl_advanced){
                _this.find(".checkall[data-type='tpl-advanced']").val("0").attr("checked","true").next().addClass("checked");
            }
            if(all_sms){
                _this.find(".checkall[data-type='sms']").val("0").attr("checked","true").next().addClass("checked");
            }
        });

    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>     
