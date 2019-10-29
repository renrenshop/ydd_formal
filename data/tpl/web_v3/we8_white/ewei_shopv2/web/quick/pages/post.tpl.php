<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>
    .diy-menu {
        background: transparent !important;
        border: none !important;
        box-shadow:none !important;
    }
    .diy-menu .action {
        text-align: left !important;
    }
</style>
<form class="form-horizontal form-validate" action="" method="post">
    <input type="hidden" name="tab" id="tab" value="<?php  echo $_GPC['tab'];?>">
    <input type="hidden" name="type" id="type" value="<?php  echo $_GPC['type'];?>">

    <div class="page-header">
        当前位置：<span class="text-primary"><?php  if(empty($item)) { ?>新建<?php  } else { ?>编辑<?php  } ?>页面 <?php  if(!empty($item)) { ?><small>(ID: <?php  echo $item['id'];?> 名称: <?php  echo $item['title'];?>)</small><?php  } ?></span>
    </div>
<div class="page-content">
    <ul class="nav nav-tabs" id="myTab">
        <?php  if($type=='0') { ?>
        <li <?php  if($_GPC['tab']=='tab_basic'||empty($_GPC['tab'])) { ?>class="active"<?php  } ?>><a href="#tab_basic" data-toggle="tab" data-page="1">基本</a></li>
        <li <?php  if($_GPC['tab']=='tab_content') { ?>class="active"<?php  } ?> id="myTab2"><a href="#tab_content" data-toggle="tab" data-page="2">内容/数据</a></li>
        <?php  } else { ?>
        <li class="active" id="myTab2"><a href="#tab_content" data-toggle="tab" data-page="2">内容/数据</a></li>
        <?php  } ?>
    </ul>

    <div class="tab-content ">
        <?php  if($type=='0') { ?>
        <div class="tab-pane <?php  if($_GPC['tab']=='tab_basic'||empty($_GPC['tab'])) { ?>active<?php  } ?>" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('quick/pages/tpl_basic', TEMPLATE_INCLUDEPATH)) : (include template('quick/pages/tpl_basic', TEMPLATE_INCLUDEPATH));?></div>
        <div class="tab-pane <?php  if($_GPC['tab']=='tab_content') { ?>active<?php  } ?>" id="tab_content"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('quick/pages/tpl_content', TEMPLATE_INCLUDEPATH)) : (include template('quick/pages/tpl_content', TEMPLATE_INCLUDEPATH));?></div>
        <?php  } else { ?>
        <div class="tab-pane active" id="tab_content"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('quick/pages/tpl_content', TEMPLATE_INCLUDEPATH)) : (include template('quick/pages/tpl_content', TEMPLATE_INCLUDEPATH));?></div>
        <?php  } ?>
    </div>

    <?php if( ce('quick.pages' ,$item) ) { ?>
        <div class="diy-menu" style="position: static">
            <label class="col-lg control-label"></label>
            <div class="action col-sm-9" style="padding-left: 0">
                <?php  if($type==0) { ?>
                <span class="btn btn-primary btn-sm" id="next-page" style="display: <?php  if($_GPC['tab']!='tab_content') { ?>inline-block<?php  } else { ?>none<?php  } ?>">下一步</span>
                <span class="btn btn-primary btn-sm" id="prev-page" style="display: <?php  if($_GPC['tab']=='tab_content') { ?>inline-block<?php  } else { ?>none<?php  } ?>">上一步</span>
                <input type="submit" class="btn btn-primary btn-sm" value="保存页面" id="btn-save" style="display: <?php  if($_GPC['tab']=='tab_content') { ?>inline-block<?php  } else { ?>none<?php  } ?>" />
                <?php  } else { ?>
                <input type="submit" class="btn btn-primary btn-sm" value="保存页面" id="btn-save" style="display: inline-block" />
                <?php  } ?>
            </div>
        </div>
    <?php  } ?>
</div>
</form>

<link rel="stylesheet" href="../addons/ewei_shopv2/static/js/dist/select2/select2.css">
<link rel="stylesheet" href="../addons/ewei_shopv2/static/js/dist/select2/select2-bootstrap.css">

<?php  if($type=='1') { ?>
    <link rel="stylesheet" href="../addons/ewei_shopv2/static/fonts/wxiconx/iconfont.css">
<?php  } ?>

<script type="text/javascript">
    var path = '../../plugin/quick/static/js/web';
    myrequire([path,'tpl','web/biz'],function(modal,tpl) {
        modal.init({
            tpl: tpl,
            type: <?php  echo $_GPC['type']?>,
            page: <?php  echo $datas;?>,
            attachurl: "<?php  echo $_W['attachurl'];?>",
            merchid: <?php  echo intval($_W["merchid"])?>
    });
    })
    function callbackGoods(ret) {
        myrequire([path],function(modal) {
            modal.callbackGoods(ret);
        });
    }
    function callbackCategory(ret) {
        myrequire([path],function(modal) {
            modal.callbackCategory(ret);
        });
    }
    function callbackGroup(ret) {
        myrequire([path],function(modal) {
            modal.callbackGroup(ret);
        });
    }
    $("#next-page").unbind('click').click(function () {
        var title = $.trim($("#pagetitle").val());
        var type = $("input[name='type']").val();
        if(type != '1') {
            if (!title || title == '') {
                tip.msgbox.err("请先填写页面标题");
                return;
            }
        }
        $("#next-page").hide();
        $("#btn-save").show();
        $("#prev-page").show();
        $("#myTab").find("li").eq(1).find('a').trigger('click');
    });
    $("#prev-page").unbind('click').click(function () {
        $("#next-page").show();
        $("#prev-page").hide();
        $("#btn-save").hide();
        $("#myTab").find("li").eq(0).find('a').trigger('click');
    });
    $("#myTab a").click(function () {
        var page = $(this).data('page');
        if(page==2){
            $("#next-page").hide();
            $("#btn-save").show();
            $("#prev-page").show();
            var value = "tab_content";
        }else{
            $("#next-page").show();
            $("#prev-page").hide();
            $("#btn-save").hide();
            var value = "tab_basic";
        }
        $("#tab").val(value);
    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>