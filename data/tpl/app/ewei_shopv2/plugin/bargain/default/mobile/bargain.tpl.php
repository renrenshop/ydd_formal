<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_bargain_template_mobile_default_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_bargain_template_mobile_default_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/bargain/static/css/bargain.css">
<script>document.title = "砍价商品详情"; </script>
<div class="fui-page-group bargain">
    <div class="fui-page  fui-page-current">
        <?php  if(is_h5app()) { ?>
        <div class="fui-header">
            <div class="fui-header-left">
                <a class="back"></a>
            </div>
            <div class="title">全部砍价</div>
            <div class="fui-header-right"></div>
        </div>
        <?php  } ?>
        <div class="fui-content navbar">
            <form action="" method="post">
                <div class="fui-searchbar bar">
                    <div class="searchbar center">
                        <input type="submit" class="searchbar-cancel searchbtn" value="搜索">
                        <div class="search-input">
                            <i class="icon icon-search"></i>
                            <input type="search" class="search" name="keywords" placeholder="搜索砍价活动...">
                        </div>
                    </div>
                </div>
            </form>
            <script>
                $(function () {
                    $("input[name='keywords']").focusin(function () {
                        $(this).removeAttr('placeholder');
                    });
                    $("input[name='keywords']").focusout(function () {
                        $(this).attr('placeholder','搜索砍价活动...');
                    });
                });
            </script>																																																																								<div id="recommand">
           <?php  if(!empty($res)) { ?>
            <div class="fui-goods-group block border">
                <?php  if(is_array($res)) { foreach($res as $key => $value) { ?>
                            <div class="fui-goods-item" data-goodsid="8">
                                <a href="<?php  echo mobileUrl('bargain/detail',array('id'=>$value['id']));?>" data-nocache="true" class="external">
                                    <div class="image" style="background-image: url(<?php  echo tomedia($value['images']);?>)"></div>
                                </a>
                                <div class="detail">
                                    <a href="<?php  echo mobileUrl('bargain/detail',array('id'=>$value['id']));?>" data-nocache="true" class="external">
                                        <div class="name"><?php  echo $value['title'];?></div>
                                    </a>
                <?php  if($value['type']==1) { ?>
                                    <div class="price">
                                        <span class="text">底价 ￥<?php  echo $value['end_price'];?></span>
                                        <span class="original_price">￥<?php  echo $value['start_price'];?></span>
                                    </div>
                <?php  } ?>
                                    <?php  if($value['type']==0) { ?>
                                    <div class="price">
                                        <span class="text" >砍多少减多少</span>
                                        <span class="original_price">￥<?php  echo $value['start_price'];?></span>
                                    </div>
                                    <?php  } ?>
                                </div>
                            </div>
                <?php  } } ?>
            </div>
            <?php  } else { ?>
            <div class='empty'>
                <div>暂无砍价商品</div>
            </div>
            <?php  } ?>
            </div>
        </div>



    </div>
</div>
    <div class="fui-navbar footer-nav bordert" style="z-index:10;padding:0;position:absolute">

        <a href="<?php  echo mobileUrl();?>" class="nav-item external" data-nocache="true">
            <span class="icon icon-home"></span>
            <span class="label">商城首页</span>
        </a>

        <a href="<?php  echo mobileUrl('bargain');?>" class="nav-item active external" data-nocache="true">
            <span class="icon icon-all"></span>
            <span class="label">全部砍价</span>
        </a>


        <a href="<?php  echo mobileUrl('bargain/act');?>" class="nav-item external" id="menucart" data-nocache="true">
            <span class="icon icon-all1"></span>
            <span class="label">砍价中</span>
        </a>
        <a href="<?php  echo mobileUrl('bargain/purchase');?>" class="nav-item external" data-nocache="true">
            <span class="icon icon-money"></span>
            <span class="label">已购买</span>
        </a>
    </div>
    <span style="display:none"></span>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>