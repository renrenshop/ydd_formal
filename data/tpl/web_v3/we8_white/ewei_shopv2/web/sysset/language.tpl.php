<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>
    .tabs-container .tab-pane .panel-body {border-left: none; border-right: none; border-bottom: none;}
</style>

<form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data" >
    <div class="page-heading">
        <!--<h2>语言配置</h2>-->
        <div class="page-header">当前位置：<span class="text-primary">语言配置</span></div>
    </div>

    <div class="tabs-container">
        <ul class="nav" id="lang-nav">
            <li><input type="button" value="添加" id="addForm" class="btn btn-primary"  /></li>
        </ul>

        <?php  if(empty($data)) { ?>
        <div class="tab-pane " >
            <div class="panel panel-default" >
                <div class="panel-body">
                    <div class="col-sm-9 col-xs-12">
                        <h4>暂无配置</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php  } else { ?>
        <?php  if(is_array($data)) { foreach($data as $key => $val) { ?>
        <div class="tab-pane " >
            <div class="panel panel-default" >
                <div class="panel-body">
                    <div class="col-sm-9 col-xs-12">
                        <button type="button" class="btn btn-danger  btn-sm" onclick="removeLanguage(this)"><i class="fa fa-remove"></i></button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">显示名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="data[<?php  echo $key;?>][displayName]" class="form-control" value="<?php  echo $data[$key]['displayName'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">语言标识</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="data[<?php  echo $key;?>][key]" class="form-control" value="<?php  echo $data[$key]['key'];?>" />
                        <span class="help-block">小写字母，对应语言包目录名称，例如:中文标识为"cn"</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">显示logo</label>
                    <div class="col-sm-9 col-xs-12 input-group img-item">
                        <div class="input-group-addon">
                            <img src="<?php  echo $data[$key]['logo'];?>" style="height:16px;width:18px" />
                        </div>
                        <input type="text" class="form-control" name="data[<?php  echo $key;?>][logo]" value="<?php  echo $data[$key]['logo'];?>" />
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default btn-select-pic">选择图片</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php  } } ?>



        <?php  } ?>

        <ul class="nav">
            <li><input type="submit" value="提交" class="btn btn-primary"  /></li>
        </ul>


    </div>





    </div>
    </div>

</form>
</div>

<script type="text/javascript">
    var key = 1;
    $(function () {
        bindEvents();
        $('#addForm').click(function(){
            var str = '';
            str += '<div class="tab-pane " >';
            str += '<div class="panel panel-default" >';
            str += '<div class="panel-body">';
            str += '<div class="col-sm-9 col-xs-12">';
            str += ' <button type="button" class="btn btn-danger  btn-sm" onclick="removeLanguage(this)"><i class="fa fa-remove"></i></button>';
            str += '</div>';
            str += '</div>';
            str += '<div class="form-group">';
            str += '<label class="col-sm-2 control-label">显示名称</label>';
            str += '<div class="col-sm-9 col-xs-12">';
            str += '<input type="text" name="newdata[{'+key+'}][displayName]" class="form-control" value="" />';
            str += '</div>';
            str += '</div>';
            str += '<div class="form-group">';
            str += '<label class="col-sm-2 control-label">语言标识</label>';
            str += '<div class="col-sm-9 col-xs-12">';
            str += '<input type="text" name="newdata[{'+key+'}][key]" class="form-control" value="" />';
            str += '<span class="help-block">对应语言包目录名称，例如:中文标识为"cn"</span>';
            str += '</div>';
            str += '</div>';
            str += '<div class="form-group">';
            str += '<label class="col-sm-2 control-label">显示logo</label>';
            str += '<div class="col-sm-9 col-xs-12 input-group img-item">';
            str += '<div class="input-group-addon">';
            str += '<img src="" style="height:16px;width:18px" />';
            str += '</div>';
            str += '<input type="text" class="form-control" name="newdata[{'+key+'}][logo]" />';
            str += '<div class="input-group-btn">';
            str += '<button type="button" class="btn btn-default btn-select-pic">选择图片</button>';
            str += '</div>';
            str += '</div>';
            str += '</div>';
            str += '</div>';
            str += '</div>';
            key++;
            $('#lang-nav').after(str);
            bindEvents();

        });
    });
    function bindEvents() {
        require(['jquery', 'util'], function ($, util) {
            $('.btn-select-pic').unbind('click').click(function () {
                var imgitem = $(this).closest('.img-item');
                util.image('', function (data) {
                    imgitem.find('img').attr('src', data['url']);
                    imgitem.find('input').val(data['url']);
                });
            });
        });
    }
    function removeLanguage(obj){
        $(obj).closest('.tab-pane').remove();
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
