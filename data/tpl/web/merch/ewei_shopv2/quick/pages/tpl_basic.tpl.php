<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label must">页面名称</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
            <input type="text" name="title" id="pagetitle" class="form-control" value="<?php  echo $item['title'];?>" data-rule-required="true"  />
        <?php  } else { ?>
            <div class="form-control-static"><?php  echo $item['title'];?></div>
        <?php  } ?>
        <div class="help-block">注意：页面名称是便于后台查找。</div>
    </div>
</div>

<div class="form-group-title"></div>

<?php  if(!empty($item)) { ?>
    <div class="form-group">
        <label class="col-lg control-label">页面地址</label>
        <div class="col-sm-9 col-xs-12">
            <div class="form-control-static">
                <a href="javascript:;" data-url="<?php  echo mobileUrl('quick', array('id' => $item['id']), true)?>"  class=" js-clip"><?php  echo mobileUrl('quick', array('id'=>$item['id']), true)?></a>
                <span style="cursor: pointer;" data-toggle="popover" data-trigger="hover" data-html="true"
                      data-content="<img src='<?php  echo $qrcode;?>' width='130' alt='链接二维码'>" data-placement="auto right">
                    <i class="glyphicon glyphicon-qrcode"></i>
                </span>
            </div>
        </div>
    </div>
<?php  } ?>

<div class="form-group">
    <label class="col-lg control-label">关键字</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
            <input type="text" name="keyword" class="form-control" value="<?php  echo $item['keyword'];?>" />
            <div class="help-block">提示: 关键字为空则不使用关键字进入(非必填)</div>
        <?php  } else { ?>
            <div class="form-control-static"><?php  echo $item['keyword'];?></div>
        <?php  } ?>
    </div>
</div>


<div class="form-group">
    <label class="col-lg control-label">入口封面标题</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
        <input type="text" name="enter_title" class="form-control" value="<?php  echo $item['enter_title'];?>" />
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['enter_title'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">入口封面介绍</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
        <textarea class="form-control" name="enter_desc" rows="5"><?php  echo $item['enter_desc'];?></textarea>
        <?php  } else { ?>
        <div class="form-control-static"><?php  echo $item['enter_desc'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">入口封面图标</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
            <?php  if($_W['merchid']>0) { ?>
             <?php  echo tpl_form_field_image2('enter_icon', $item['enter_icon'],'',array('dest_dir'=>'merch/'.$_W['merchid']));?>
            <?php  } else { ?>
             <?php  echo tpl_form_field_image2('enter_icon', $item['enter_icon']);?>
            <?php  } ?>
        <?php  } else { ?>
            <?php  if(!empty($item['share_icon'])) { ?>
                <img src="<?php  echo tomedia($item['enter_icon'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
            <?php  } ?>
        <?php  } ?>
    </div>
</div>

<div class="form-group-title"></div>

<div class="form-group">
    <label class="col-lg control-label">分享标题</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
            <input type="text" name="share_title" class="form-control" value="<?php  echo $item['share_title'];?>" />
        <?php  } else { ?>
            <div class="form-control-static"><?php  echo $item['share_title'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">分享介绍</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
            <textarea class="form-control" name="share_desc" rows="5"><?php  echo $item['share_desc'];?></textarea>
        <?php  } else { ?>
            <div class="form-control-static"><?php  echo $item['share_desc'];?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">分享图标</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
            <?php  echo tpl_form_field_image2('share_icon', $item['share_icon']);?>
        <?php  } else { ?>
            <?php  if(!empty($item['share_icon'])) { ?>
                <img src="<?php  echo tomedia($item['share_icon'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
            <?php  } ?>
        <?php  } ?>
    </div>
</div>


<div class="form-group-title"></div>

<!--
<div class="form-group">
    <label class="col-lg control-label must">购物车设置</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
            <label class="radio-inline"><input type="radio" name="cart" value="0" <?php  if(empty($item['cart'])) { ?>checked<?php  } ?>> 商城购物车</label>
            <label class="radio-inline"><input type="radio" name="cart" value="1" <?php  if(!empty($item['cart'])) { ?>checked<?php  } ?>> 单独购物车</label>
        <?php  } else { ?>
            <?php echo empty($item['cart'])?"商城购物车":"单独购物车"?>
        <?php  } ?>
        <div class="help-block text-danger">提示: 选择商城购物车则与商城购物车商品互通，否则使用单页面购物车</div>
    </div>
</div>
-->

<div class="form-group">
    <label class="col-lg control-label">页面状态</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( mce('quick.pages' ,$item) ) { ?>
        <label class="radio-inline"><input type="radio" name="status" value="1" <?php  if(!empty($item['status'])) { ?>checked<?php  } ?>> 启用</label>
            <label class="radio-inline"><input type="radio" name="status" value="0" <?php  if(empty($item['status'])) { ?>checked<?php  } ?>> 关闭</label>
        <?php  } else { ?>
            <?php echo empty($item['status'])?"关闭":"启用"?>
        <?php  } ?>
        <div class="help-block">提示: 关闭后将无法浏览快速购买页面</div>
    </div>
</div>