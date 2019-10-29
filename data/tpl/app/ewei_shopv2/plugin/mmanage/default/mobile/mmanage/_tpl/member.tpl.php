<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_mmanage_template_mobile_default__tpl_member.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_plugin_mmanage_template_mobile_default__tpl_member.php');}?>
<script type="text/html" id="tpl_member">
    <%each list as item%>
        <div class="fui-list" data-id="<%item.id%>" data-can="<?php if(cv('member.list.view|member.list.edit')) { ?>1<?php  } ?>">
            <div class="fui-list-media round">
                <img src="<%item.avatar%>" class="round" onerror="this.src='../addons/ewei_shopv2/static/images/nopic100.jpg';" />
                <%if item.followed==1%>
                    <%if item.unfollowtime>0%>
                        <div class="title green">取消关注</div>
                    <%/if%>
                <%esle%>
                    <div class="title green">已关注</div>
                <%/if%>
            </div>
            <div class="fui-list-inner">
                <div class="title"><%if item.isblack==1%><span class="fui-label fui-label-default">黑名单</span><%/if%><%item.nickname||"未更新"%><%if item.realname%>(<%item.realname%>)<%/if%></div>
                <div class="subtitle">
                    <span class="total half">等级: <%item.levelname%></span>
                    <span class="total half">分组: <%item.groupname%></span>
                </div>
                <div class="subtitle">
                    <span class="total">积分: <%item.credit1%></span>
                    <span class="total">余额: <%item.credit2%></span>
                </div>
            </div>
            <div class="fui-list-angle fundot-parent">
                <div class="fundot"><i class="icon icon-more"></i></div>
                <div class="funmenu">
                    <?php if(cv('member.list.view|member.list.edit')) { ?>
                        <a href="<?php  echo mobileUrl('mmanage/member/detail')?>&id=<%item.id%>"><i class="icon icon-enclosure"></i><span>查看</span></a>
                    <?php  } ?>
                    <?php if(cv('finance.recharge.credit1||finance.recharge.credit2')) { ?>
                        <a href="<?php  echo mobileUrl('mmanage/finance/recharge')?>&id=<%item.id%>"><i class="icon icon-jifen"></i><span>充值</span></a>
                    <?php  } ?>
                    <?php if(cv('order')) { ?>
                        <a href="<?php  echo mobileUrl('mmanage/order', array('searchfield'=>'member'))?>&keyword=<%item.nickname%>"><i class="icon icon-manageorder"></i><span>订单</span></a>
                    <?php  } ?>
                </div>
            </div>
        </div>
    <%/each%>
</script>