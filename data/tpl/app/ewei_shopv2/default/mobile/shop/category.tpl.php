<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_category_index.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_category_index.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-shop-goods_category">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">
            <form method="post" action="<?php  echo mobileUrl('goods')?>">
                <div class="searchbar">
                    <div class="search-input">
                        <i class="icon icon-search"></i>
                        <input type="search" name="keywords" placeholder="<?php  echo $lang['lang_template_mobile_shop_category_index_0']?>...">
                    </div>
                </div>
            </form>
        </div>
    </div>
	<div class="fui-content navbar">
    <div class="fui-fullHigh-group">
        <?php  if($category_set['level']!=1) { ?>
        <div class="fui-fullHigh-item menu" id="tab">
            <nav data-cate="recommend" data-src="<?php  echo $category_set['advimg'];?>" data-href="<?php  echo $category_set['advurl'];?>"><?php  echo $lang['lang_template_mobile_shop_category_index_1']?></nav>
            <?php  if(is_array($category['parent']['0'])) { foreach($category['parent']['0'] as $value) { ?>
            <nav data-cate="<?php  echo $value['id'];?>" data-src="<?php  echo $value['advimg'];?>" data-href="<?php  echo $value['advurl'];?>"><?php  echo $value['name'];?></nav>
            <?php  } } ?>
        </div>
        <?php  } ?>
        <div class="fui-fullHigh-item container" style="position: relative">
            <a id="advurl" class="swipe external" href="javascript:">
                <img id="advimg">
            </a>
            <div id="container"></div>
        </div>
    </div>
</div>
	</div>
<script id='tpl_shop_category_list' type='text/html'>
    <%if recommend == 1%>
    <div class="fui-icon-group selecter">
        <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><i class="icon icon-category"></i></div>
            <div class="text"><?php  echo $lang['lang_template_mobile_shop_category_index_2']?></div>
        </a>
        <?php  if($category_set['level']<=2) { ?>
            <%each recommend_children as child%>
                <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>&cate=<%child.id%>">
                    <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><img src="<%child.thumb%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_3']?>.'"></div>
                    <div class="text"><%child.name%></div>
                </a>
            <%/each%>

        <?php  } else { ?>

            <%each recommend_children as child%>
                <a class="fui-icon-col show" data-children="<%child.id%>" data-pid="recommend" data-src="<%child.advimg%>" data-href="<%child.advurl%>" href="javascript:">
                    <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>">
                        <img src="<%child.thumb%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_4']?>.'">
                    </div>
                    <div class="text"><%child.name%></div>
                </a>
            <%/each%>
        <?php  } ?>

        <%each recommend_grandchildren as grandchild%>
        <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>&cate=<%grandchild.id%>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><img src="<%grandchild.thumb%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_5']?>.'"></div>
            <div class="text"><%grandchild.name%></div>
        </a>
        <%/each%>
    </div>
    <%else%>

    <?php  if($category_set['level']==1) { ?>
    <a class="fui-title"><?php  echo $lang['lang_template_mobile_shop_category_index_6']?></a>
    <div class="fui-icon-group selecter">
        <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><i class="icon icon-category"></i></div>
            <div class="text"><?php  echo $lang['lang_template_mobile_shop_category_index_7']?></div>
        </a>
        <%each parent[0] as cate%>
        <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>&cate=<%cate.id%>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><img src="<%cate.advimg%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_8']?>.'"></div>
            <div class="text"><%cate.name%></div>
        </a>
        <%/each%>
    </div>

    <?php  } else if($category_set['level']==2 || empty($category_set['level']) ) { ?>
    <div class="fui-icon-group selecter">
        <%each children as child%>
        <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>&cate=<%child.id%>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><img src="<%child.thumb%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_9']?>.'"></div>
            <div class="text"><%child.name%></div>
        </a>
        <%/each%>
    </div>

    <?php  } else { ?>
    <?php  if($category_set['show']!=1) { ?>
    <%each children as child%>
    <a class="fui-title external" href="<?php  echo mobileUrl('goods')?>&cate=<%child.id%>"><%child.name%></a>
    <div class="fui-icon-group selecter">
        <%each grandchildren[child.id] as grandchild%>
        <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>&cate=<%grandchild.id%>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><img src="<%grandchild.thumb%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_10']?>.'"></div>
            <div class="text"><%grandchild.name%></div>
        </a>
        <%/each%>
    </div>
    <%/each%>
    <?php  } else { ?>
    <div class="fui-icon-group selecter">
    <%each children as child%>
    <a class="fui-icon-col show" data-children="<%child.id%>" data-pid="<%child.parentid%>"  data-src="<%child.advimg%>" data-href="<%child.advurl%>" href="javascript:">
        <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><img src="<%child.thumb%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_11']?>.'"></div>
        <div class="text"><%child.name%></div>
    </a>
    <%/each%>
    </div>
    <?php  } ?>
    <?php  } ?>
    <%/if%>
</script>

<script id='tpl_shop_category_show_list' type='text/html'>
    <div class="fui-icon-group selecter">
        <a class="fui-icon-col prev" data-prev="<%pid%>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><i class="icon icon-toleft"></i></div>
            <div class="text"><?php  echo $lang['lang_template_mobile_shop_category_index_12']?></div>
        </a>
        <%each children as child%>
        <a class="fui-icon-col external" href="<?php  echo mobileUrl('goods')?>&cate=<%child.id%>">
            <div class="icon <?php  if(empty($set['style'])) { ?>radius<?php  } ?>"><img src="<%child.thumb%>" onerror="this.src='<?php echo EWEI_SHOPV2_STATIC;?>images/nopic100.jpg'; this.title='<?php  echo $lang['lang_template_mobile_shop_category_index_13']?>.'"></div>
            <div class="text"><%child.name%></div>
        </a>
        <%/each%>
    </div>
</script>
<script language='javascript'>
    require(['biz/shop/category'], function (modal) {
        modal.init(<?php  echo json_encode($category)?>,<?php  echo json_encode($category_set)?>);
    });
</script>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>