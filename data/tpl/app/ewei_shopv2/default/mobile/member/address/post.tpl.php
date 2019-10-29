<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_address_post.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_member_address_post.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .fui-cell-group:not(.fui-cell-group-o):before{
        border:0
    }
    .fui-cell-group:first-child{
        margin-top: 0;
    }
</style>
<div class='fui-page  fui-page-current'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php  if(empty($address)) { ?><?php  echo $lang['lang_template_mobile_member_address_post_0']?><?php  } else { ?><?php  echo $lang['lang_template_mobile_member_address_post_1']?><?php  } ?></div>
        <div class="fui-header-right"><a data-toggle="delete" data-addressid="<?php  echo $address['id'];?>"><?php  if(!empty($address)) { ?><?php  echo $lang['lang_template_mobile_member_address_post_14']?><?php  } ?></a></div>
    </div>
    <div class='fui-content'>
        <?php  if(is_weixin() && $_W['shopset']['trade']['shareaddress']) { ?>
        <div class="fui-cell-group order-info noborder">
            <a class="fui-cell" id="btn-address">
                <div class="fui-cell-text">
                    <?php  echo $lang['lang_template_mobile_member_address_post_13']?>
                </div>
                <div class="fui-cell-remark text-danger">
                </div>
            </a>


        </div>
        <?php  } ?>
        <form method='post' class='form-ajax' >
            <input type='hidden' id='addressid' value="<?php  echo $address['id'];?>"/>
            <div class='fui-cell-group'>
                <div class='fui-cell'>

                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_2']?></div>
                    <div class='fui-cell-info c000'>
                        <input type="text" id='realname'  name='realname' value="<?php  echo $address['realname'];?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_3']?>" class="fui-input"/>
                    </div>
                </div>
                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_4']?></div>
                    <div class='fui-cell-info c000'>
                        <input type="tel" id='mobile' name='mobile' value="<?php  echo $address['mobile'];?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_5']?>"  class="fui-input"/>
                    </div>
                </div>


                <?php  if($_W['lang_type'] == 'cn') { ?>
                <!--省-->
                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_6']?></div>
                    <div class="fui-cell-info">
                        <select name="area_province" id="province">
                            <option value=""><?php  if(!empty($address['province'])) { ?><?php  echo $address['province'];?><?php  } else { ?><?php  echo $lang['lang_template_mobile_member_address_post_6']?><?php  } ?></option>
                        </select>
                    </div>
                </div>
                <!--市-->
                <div class='fui-cell citys' <?php  if(empty($address['city'])) { ?> style="display:none" <?php  } ?>>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_7'];?></div>
                    <div class="fui-cell-info">
                        <select name="area_city" id="city">
                            <option value=""><?php  if(!empty($address['city'])) { ?><?php  echo $address['city'];?><?php  } else { ?><?php  echo $lang['lang_template_mobile_member_address_post_7']?><?php  } ?></option>
                        </select>
                    </div>
                </div>
                <!--区-->
                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_8'];?></div>
                    <div class="fui-cell-info">
                        <input class="fui-input" type="text" id="areas_id" name="area_town" value="<?php  echo $address['area'];?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_8'];?>">
                    </div>
                </div>

                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_10']?></div>
                    <div class='fui-cell-info c000'><input type="text" id='address' name='address' value="<?php  echo $address['address'];?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_11']?>"  class="fui-input"/></div>
                </div>
                <!--街道-->
                <?php  if(!empty($new_area) && !empty($address_street)) { ?>
                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_9']?></div>
                    <div class='fui-cell-info c000'><input type="text" id='street'  name='street' data-value="<?php  if(!empty($address)) { ?><?php  echo $address['streetdatavalue'];?><?php  } ?>" value="<?php  if(!empty($address)) { ?><?php  echo $address['street'];?><?php  } ?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_9']?>"  class="fui-input" readonly=""/></div>
                </div>
                <?php  } ?>

                <?php  } else { ?>

                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_10']?></div>
                    <div class='fui-cell-info c000'><input type="text" id='address' name='address' value="<?php  echo $address['address'];?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_11']?>"  class="fui-input"/></div>
                </div>
                <!--街道-->
                <?php  if(!empty($new_area) && !empty($address_street)) { ?>
                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_9']?></div>
                    <div class='fui-cell-info c000'><input type="text" id='street'  name='street' data-value="<?php  if(!empty($address)) { ?><?php  echo $address['streetdatavalue'];?><?php  } ?>" value="<?php  if(!empty($address)) { ?><?php  echo $address['street'];?><?php  } ?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_9']?>"  class="fui-input" readonly=""/></div>
                </div>
                <?php  } ?>

                <!--区-->
                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_8'];?></div>
                    <div class="fui-cell-info">
                        <input class="fui-input" type="text" id="areas_id" name="area_town" value="<?php  echo $address['area'];?>" placeholder="<?php  echo $lang['lang_template_mobile_member_address_post_8'];?>">
                    </div>
                </div>

                <!--市-->
                <div class='fui-cell citys' <?php  if(empty($address['city'])) { ?> style="display:none" <?php  } ?>>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_7'];?></div>
                    <div class="fui-cell-info">
                        <select name="area_city" id="city">
                            <option value=""><?php  if(!empty($address['city'])) { ?><?php  echo $address['city'];?><?php  } else { ?><?php  echo $lang['lang_template_mobile_member_address_post_7']?><?php  } ?></option>
                        </select>
                    </div>
                </div>

                <!--省-->
                <div class='fui-cell'>
                    <div class='fui-cell-label'><?php  echo $lang['lang_template_mobile_member_address_post_6']?></div>
                    <div class="fui-cell-info">
                        <select name="area_province" id="province">
                            <option value=""><?php  if(!empty($address['province'])) { ?><?php  echo $address['province'];?><?php  } else { ?><?php  echo $lang['lang_template_mobile_member_address_post_6']?><?php  } ?></option>
                        </select>
                    </div>
                </div>

                <?php  } ?>



                <?php  if(empty($address['isdefault'])) { ?>
                    <div class="fui-cell ">
                        <div class="fui-cell-label" style="width:auto"><?php  echo $lang['lang_template_mobile_member_address_post_15']?></div>
                        <div class="fui-cell-info ">
                            <input type="checkbox" id='isdefault' class="fui-switch fui-switch-danger pull-right">
                        </div>
                    </div>
 				<!--<div class="fui-cell ">-->
                    <!--<div class="fui-cell-label" style="width:auto">设置默认地址</div>-->
                    <!--<div class="fui-cell-info  c000"><input type="checkbox" class="fui-switch fui-switch-danger pull-right"data-toggle="setdefault" data-addressid="<?php  echo $address['id'];?>"></div>-->
                <!--</div>-->
                <?php  } ?>
            </div>

            
            <a id="btn-submit" class='external btn btn-danger block' style="margin-top:1.25rem"><?php  echo $lang['lang_template_mobile_member_address_post_11']?></a>
              <?php  if(is_weixin() && $_W['shopset']['trade']['shareaddress']) { ?>
                <!--<a id="btn-address" class='btn btn-success block'>读取微信地址</a>-->
            <?php  } ?>


        </form>
    </div>
    <script language='javascript' type="text/javascript">

        require(['biz/member/address'], function (modal) {
            modal.initPost({new_area: <?php  echo $new_area?>, address_street: <?php  echo $address_street?>,lang_type:"<?php  echo $_W['lang_type']?>"});
        });
    </script>
    <script language='javascript'>require(['biz/member/address'], function (modal) {
        modal.initList();
    });</script>
</div>
<script>
    $(function(){
        // 声明ajax请求函数
        function getpct(urlname,pid){
            var url = '',name={};
            if(urlname == 1){
                url = "<?php  echo mobileUrl('member/address/get_province')?>";
            }else if(urlname == 2){
                url = "<?php  echo mobileUrl('member/address/get_city')?>" ;
                name = {'state_code':pid};
            }else if(urlname == 3){
                url = "<?php  echo mobileUrl('member/address/get_area')?>"
                name = {'post_office':pid};
            }
            $.ajax({
                url:url,
                method:'GET',
                data:name,
                success:function(res){
                    res = JSON.parse(res);
                    if(urlname == 1){
                        let phtml = '';
                        for(var i = 0;i<res.result.province.length;i++){
                            phtml += '<option value="'+res.result.province[i].state_code+'" >'+res.result.province[i].state_name+'</option>'
                        }
                        $('#province').append(phtml);
                    }else if(urlname == 2){
                        $('#city').html('');
                        let chtml = '<option value="">Sila pilih bandar</option>';
                        for(var i = 0;i<res.result.city.length;i++){
                            chtml += '<option value="'+res.result.city[i].post_office+'">'+res.result.city[i].post_office+'</option>'
                        }
                        $('#city').append(chtml);
                    }else if(urlname == 3){
                        $('#town').html('');
                        let thtml = '<option value="">Sila pilih daerah</option>';
                        for(var i = 0;i<res.result.area.length;i++){
                            thtml += '<option value="'+res.result.area[i].area+'">'+res.result.area[i].area+'</option>'
                        }
                        $('#town').append(thtml);
                    }
                },
                fail:function(msg){
                    console.log('请求错误'+msg)
                }
            })
        };
        getpct(1);
        //选择州
        $('#province').change(function(){
            let pid = $(this).val();
            if(pid != ''){
                $('.citys').show();
                getpct(2,pid);
            }
        })
        $('#city').change(function(){
            let cid = $(this).val();
            if(cid != ''){
                $('.towns').show();
                getpct(3,cid);
            }
        })
    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
