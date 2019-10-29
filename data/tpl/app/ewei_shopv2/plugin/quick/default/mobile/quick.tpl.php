<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_quick_template_mobile_default_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_quick_template_mobile_default_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script>//document.title = "<?php  echo $item['title'];?>"; </script>
<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/plugin/quick/static/css/quick.css?v=<?php  echo time()?>">
<style type="text/css">
.fui-goods-tab .menu .nav {
	border-left: 2px solid transparent;
}
.fui-goods-tab .menu .nav.active {
    border-left: 2px solid #ff5555;
    boder-bottom: none;
}
.fui-goods-tab.style3 .menu .nav.active:before {
    display: none;
}
/*.fui-page, .fui-page-group{*/
    /*height: 100%;*/
/*}*/
#title {
	padding: 0.4rem 0;
    display: block;
}
.quick-list .quick-item .info .buyline .buy .icon {
    font-size: 1rem;
    vertical-align: middle;
    line-height: .8rem;
}
.quick-num .minus, .quick-num .plus {
    height: 1rem;
    width: 1rem;
}
.fui-fullHigh-item.menu {
    width: 4.6rem;
    padding-bottom: 20px;
}
.quick-list .quick-item .thumb img,.quick-list .quick-item .thumb {
    width: 4rem;
    height: 4rem;
}
.quick-list .quick-item .info .sales {
    padding: 0.34rem 0;
}
.quick-list .quick-item .info .buyline {
    padding-top: 0.6rem;
}
.fui-swipe-bullet {
    margin: 0 4px;
}
</style>

<?php  if(!empty($data['style'])) { ?>
    <style type="text/css">
        <?php  if($data['template']==1) { ?>
            .fui-shop .shop-info .inner .name {color: <?php  echo $data['style']['namecolor'];?>;}
            .fui-shop .shop-info .inner .notice {color: <?php  echo $data['style']['noticecolor'];?>;}
            .fui-shop.style2 .shop-info .inner .notice .icon,
            .fui-shop.style3 .shop-info .inner .notice .icon {color: <?php  echo $data['style']['noticeicon'];?>;}
            .fui-shop .shop-menu .item .icon {color: <?php  echo $data['style']['menuicon'];?>;}
            .fui-shop .shop-menu .item .text {color: <?php  echo $data['style']['menutext'];?>;}
            .fui-goods-tab .menu {background: <?php  echo $data['style']['catebg'];?>;}
            .fui-goods-tab .menu .nav {background: <?php  echo $data['style']['catebg'];?>; color: <?php  echo $data['style']['catecolor'];?>;}
            .fui-goods-tab .menu .nav.active {background: <?php  echo $data['style']['cateactivebg'];?>; color: <?php  echo $data['style']['cateactivecolor'];?>;}
            .fui-goods-tab.style3 .menu .nav.active:before,
            .fui-goods-tab.style3 .menu .nav.active:before {background: <?php  echo $data['style']['cateactivecolor'];?>;}
            .fui-goods-tab .main .item-title {color: <?php  echo $data['style']['righttitle'];?>;}
            .fui-goods-tab .main {background: <?php  echo $data['style']['goodsbg'];?>;}
            .fui-goods-tab .main .item .inner .title {color: <?php  echo $data['style']['goodstitle'];?>;}
            .fui-goods-tab .main .item .inner .subtitle {color: <?php  echo $data['style']['goodssubtitle'];?>;}
            .fui-goods-tab .main .item .inner .buyline .price {color: <?php  echo $data['style']['goodsprice'];?>;}
            .fui-goods-tab .main .item .inner .buyline .sales {color: <?php  echo $data['style']['goodssales'];?>;}
            .fui-goods-tab .main .item .inner .buyline .buybtn  {background: <?php  echo $data['style']['goodscart'];?>;}
            .fui-navbar ~ .fui-content, .fui-content.navbar {padding: 0}
            .cart-dot:before {background: <?php  echo $data['style']['footercart'];?>;}
            .cart-dot .icon {color: <?php  echo $data['style']['footercarticon'];?>;}
            <?php  if(empty($data['shopmenu'])) { ?>
                .fui-shop.style2 {padding-bottom: 0;}
            <?php  } ?>
        <?php  } else { ?>
            .fui-footer.quick {background: <?php  echo $data['style']['footerbg'];?>;}
            .fui-footer.quick .quick-cart .inner {color: <?php  echo $data['style']['footercarticon'];?>; background: <?php  echo $data['style']['footercart'];?>; border-color: <?php  echo $data['style']['footerbg'];?>;}
            .fui-footer.quick .quick-info {color: <?php  echo $data['style']['footertext'];?>;}
            .fui-footer.quick .quick-submit {color: <?php  echo $data['style']['footerbtntext'];?>; background: <?php  echo $data['style']['footerbtn'];?>;}
            .fui-fullHigh-item.menu nav {color: <?php  echo $data['style']['catecolor'];?>; background: <?php  echo $data['style']['catebg'];?>;}
            .fui-fullHigh-item.menu nav:active {background: <?php  echo $data['style']['catebg'];?>;}
            .fui-fullHigh-item.menu nav.on {color: <?php  echo $data['style']['cateactivecolor'];?>; background: <?php  echo $data['style']['cateactivebg'];?>;}
            .fui-fullHigh-item.menu nav.on:before {border-color: <?php  echo $data['style']['cateactivecolor'];?>;}
            .fui-fullHigh-item.menu {background: <?php  echo $data['style']['catebg'];?>;}
            .quick-list-title {color: <?php  echo $data['style']['righttitle'];?>; background: <?php  echo $data['style']['righttitlebg'];?>;}
            .quick-list-title:before {border-color: <?php  echo $data['style']['righttitleborder'];?>;}
            .quick-list .quick-item .info .title {color: <?php  echo $data['style']['goodstitle'];?>;}
            .quick-list .quick-item .info .subtitle {color: <?php  echo $diypage['goodsubtitle'];?>;}
            .quick-list .quick-item .info .sales {color: <?php  echo $data['style']['goodssales'];?>;}
            .fui-footer.cart .inner .item .price,
            .quick-list .quick-item .info .buyline .price {color: <?php  echo $data['style']['goodsprice'];?>;}
            .quick-num .plus,
            .fly-dot {background: <?php  echo $data['style']['goodscart'];?>;}
            .quick-num .minus {border-color: <?php  echo $data['style']['goodscart'];?>; color: <?php  echo $data['style']['goodscart'];?>;}
            .fui-footer.cart .title:before {border-color: <?php  echo $data['style']['footercart'];?>;}
        <?php  } ?>
    </style>
<?php  } ?>

<div class='fui-page  fui-page-current'>
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"><?php echo empty($page['pagetitle'])?'快速购买':$page['pagetitle']?></div>
        <div class="fui-header-right">
            <a href="<?php  echo mobileUrl('order')?>" class="external">
                <i class="icon icon-person2"></i>
            </a>
        </div>
    </div>
    <div class="fui-content navbar quick">

        <?php  if($data['template']==1) { ?>
            <div style="position: relative">
                <div class="fui-shop style<?php  echo $data['style']['shopstyle'];?>">
                    <div class="shop-info">
                        <img class="background" src="<?php  echo tomedia($data['style']['shopbg'])?>" />
                        <div class="inner">
                            <div class="logo <?php  echo $data['style']['logostyle'];?>">
                                <img src="<?php  echo tomedia($_W['shopset']['shop']['logo'])?>">
                            </div>
                            <div class="right">
                                <div class="name"><?php  echo $_W['shopset']['shop']['name'];?></div>
                                <div class="notice" style="overflow: hidden">
                                    <span class="text" id="notice">
                                        <?php  if(empty($data['notices'])) { ?>
                                        <!--<i class="icon icon-notification"></i>-->
                                         暂无公告
                                        <?php  } else { ?>
                                            <ul>
                                                <?php  if(is_array($data['notices'])) { foreach($data['notices'] as $notice) { ?>
                                                    <li><a href="<?php echo $data['style']['notice']==2?$notice['linkurl']:mobileUrl('shop/notice/detail', array('id'=>$notice['id']))?>" data-nocache="true"><?php  echo $notice['title'];?></a></li>
                                                <?php  } } ?>
                                            </ul>
                                        <?php  } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  if(!empty($data['shopmenu'])) { ?>
                        <div class="shop-menu">
                            <?php  if(is_array($data['shopmenu'])) { foreach($data['shopmenu'] as $menu) { ?>
                                <a class="item external" href="<?php  echo $menu['linkurl'];?>">
                                    <div class="icon <?php  echo $menu['icon'];?>"></div>
                                    <div class="text"><?php  echo $menu['text'];?></div>
                                </a>
                            <?php  } } ?>
                        </div>
                    <?php  } ?>
                </div>

                <div class="fui-goods-tab style<?php  echo $data['style']['shopstyle'];?>">
                    <div class="menu">
                        <?php  if(is_array($data['datas'])) { foreach($data['datas'] as $index => $item) { ?>
                            <div class="nav <?php  if($index==0) { ?>active<?php  } ?>" data-index="<?php  echo $index;?>"><?php  echo $item['title'];?></div>
                        <?php  } } ?>
                    </div>
                    <div class="main">
                        <?php  if(is_array($data['datas'])) { foreach($data['datas'] as $index => $item) { ?>
                            <div class="item-title" data-index="<?php  echo $index;?>"><?php  echo $item['title'];?></div>
                            <?php  if(empty($item['data'])) { ?>
                                <div class="empty-data">该分组数据为空</div>
                            <?php  } else { ?>
                                <?php  if(is_array($item['data'])) { foreach($item['data'] as $i => $g) { ?>
                                    <div class="item" data-goodsid="<?php  echo $g['id'];?>">
                                        <a class="thumb" href="<?php  echo mobileUrl('goods/detail', array('id'=>$g['id']))?>" data-nocache="true">
                                            <img src="<?php  echo tomedia($g['thumb'])?>" />
                                        </a>
                                        <div class="inner">
                                            <a class="title" href="<?php  echo mobileUrl('goods/detail', array('id'=>$g['id']))?>" data-nocache="true"><?php  echo $g['title'];?></a>
                                            <div class="subtitle"><?php  echo $g['subtitle'];?></div>
                                            <div class="buyline">
                                                <div class="price">￥<?php  echo $g['minprice'];?></div>
                                                <?php  if($g['showsales']==1) { ?>
                                                <div class="sales">销量<?php  echo $g['sales'];?></div>
                                                <?php  } ?>
                                                <div class="buybtn"><i class="icon icon-add"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php  } } ?>
                            <?php  } ?>
                        <?php  } } ?>
                    </div>
                </div>
            </div>
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('goods/picker', TEMPLATE_INCLUDEPATH)) : (include template('goods/picker', TEMPLATE_INCLUDEPATH));?>
        <?php  } else { ?>
            <div class="fui-fullHigh-group">
                <div class="fui-fullHigh-item menu" id="tab"></div>
                <div class="fui-fullHigh-item container" style="position: relative">
                    <?php  if(!empty($data['advs'])) { ?>
                        <div class='fui-swipe'>
                            <div class='fui-swipe-wrapper'>
                                <?php  if(is_array($data['advs'])) { foreach($data['advs'] as $advitem) { ?>
                                <div class='fui-swipe-item' <?php  if(!empty($advitem['link'])) { ?>onclick="location.href='<?php  echo $advitem['link'];?>'"<?php  } ?>><img src="<?php  echo tomedia($advitem['thumb'])?>" /></div>
                                <?php  } } ?>
                        </div>
                        <div class='fui-swipe-page'></div>
                    </div>
                    <?php  } ?>
                    <div class="quick-list-title"><span id="title"></span><p class="subtitle" id="subtitle"></p></div>
                    <div class="quick-list">
                        <div class="quick-list-empty">没有数据</div>
                        <div id="list"></div>
                    </div>
                </div>
            </div>
            <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('quick/tpl', TEMPLATE_INCLUDEPATH)) : (include template('quick/tpl', TEMPLATE_INCLUDEPATH));?>
        <?php  } ?>


    <script language="javascript">
        require(['../addons/ewei_shopv2/plugin/quick/static/js/mobile.js'], function(modal){
            modal.init({datas: <?php  echo $datas;?>, cart: <?php  echo $carts?>, fromquick:<?php  echo $fromquick;?>, template: <?php  echo $data['template'];?>, merchid: <?php  echo $merchid;?>});
        });
    </script>

    </div>

<?php  if($data['template']==0) { ?>
    <!-- 底部菜单 -->
    <div class="fui-footer quick">
        <div class="quick-cart empty" id="quick-cart-btn">
            <div class="dot">0</div>
            <div class="inner">
                <i class="icon icon-cartfill"></i>
            </div>
        </div>
        <div class="quick-info">
            <p class="price" id="cart-price">￥0.00</p>
            <p>优惠信息请至结算页面查看</p>
        </div>
        <div class="quick-submit disabled" id="btn-submit" style="margin: 0">去结算</div>
    </div>
    <!-- 购物车展开 -->
    <div class="fui-footer cart" id="quick-cart">
        <div class="title">
            <div class="text">购物车</div>
            <div class="right" id="btn-clear"><i class="icon icon-delete"></i> 清空</div>
        </div>
        <div class="inner"></div>
        <div class="tip">Tip: 加入购物车后请尽快下单哦~</div>
    </div>
    <div class="mask mask-cart"></div>
<?php  } else { ?>

    <a class="cart-dot <?php echo empty($cartcount)?'empty': ''?> menucart" href="<?php  echo mobileUrl('member/cart')?>" data-nocache="true">
        <i class="icon icon-cartfill"></i>
    </a>

  <?php  $this->footerMenus()?>
<?php  } ?>

    <?php  if(!empty($startadv)) { ?>
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('diypage/startadv', TEMPLATE_INCLUDEPATH)) : (include template('diypage/startadv', TEMPLATE_INCLUDEPATH));?>
    <?php  } ?>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>