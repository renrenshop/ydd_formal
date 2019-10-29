define(['core', 'tpl'], function (core, tpl) {
    var modal = {coupon: null, logid: 0, settime: 0};
    modal.init = function (params) {
        modal.coupon = params.coupon;
        if (modal.coupon.canget) {
            $(".btncoupon").click(function () {
                var btn = $(this);
                if (btn.attr('submitting') == '1') {
                    return
                }
                FoxUI.confirm(lang_js_membercard_js_coupon_7+'?', lang_js_membercard_js_coupon_8, function () {
                    if (modal.paying) {
                        return
                    }
                    $(".fui-message-popup .btn-danger").text(lang_js_membercard_js_coupon_9+'...');
                    modal.paying = true;
                    btn.attr('oldhtml', btn.html()).html(lang_js_membercard_js_coupon_10+'..').attr('submitting', 1);
                    core.json('membercard/coupon/pay', {id: modal.coupon.id}, function (ret) {
                        if (ret.status <= 0) {
                            btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
                            $(".fui-message-popup .btn-danger").text(lang_js_membercard_js_coupon_11);
                            modal.paying = false;
                            FoxUI.toast.show(ret.result.message);
                            return
                        }
                        modal.logid = ret.result.logid;
                        if (core.ish5app() && ret.result.needpay) {
                            appPay('wechat', ret.result.logno, ret.result.money, false, function () {
                                modal.settime = setInterval(function () {
                                    modal.payResult()
                                }, 2000)
                            });
                            return
                        }
                        if (ret.result.wechat) {
                            var wechat = ret.result.wechat;
                            if (wechat.weixin) {
                                function onBridgeReady(){
                                    WeixinJSBridge.invoke('getBrandWCPayRequest', {
                                        'appId': wechat.appid ? wechat.appid : wechat.appId,
                                        'timeStamp': wechat.timeStamp,
                                        'nonceStr': wechat.nonceStr,
                                        'package': wechat.package,
                                        'signType': wechat.signType,
                                        'paySign': wechat.paySign,
                                    }, function (res) {
                                        if (res.err_msg == 'get_brand_wcpay_request:ok') {
                                            modal.payResult()
                                        } else if (res.err_msg == 'get_brand_wcpay_request:cancel') {
                                            btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
                                            FoxUI.toast.show(lang_js_membercard_js_coupon_12)
                                        } else {
                                            btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
                                            FoxUI.toast.show(res.err_msg)
                                        }
                                    })
                                }
                                if (typeof WeixinJSBridge == "undefined"){
                                    if( document.addEventListener ){
                                        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                                    }else if (document.attachEvent){
                                        document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                                        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                                    }
                                }else{
                                    onBridgeReady();
                                }
                            }
                            if (wechat.weixin_jie || wechat.jie == 1) {
                                modal.payWechatJie(wechat)
                            }
                        } else {
                            modal.payResult()
                        }
                    }, true, true);
                });
                return
            })
        }
    };
    modal.payWechatJie = function (wechat) {
        var img = core.getUrl('index/qr',{url:wechat.code_url});
        $('#qrmoney').text(modal.coupon.money);
        $('.fui-header').hide();
        $('#btnWeixinJieCancel').unbind('click').click(function () {
            clearInterval(modal.settime);
            $('.order-weixinpay-hidden').hide();
            $('.fui-header').show();
            var btn = $(".btncoupon");
            var oldhtml = btn.attr('oldhtml');
            btn.html(oldhtml);
            btn.removeAttr('submitting');
            $(".fui-message-popup .btn-default").trigger('click')
        });
        $('.order-weixinpay-hidden').show();
        modal.settime = setInterval(function () {
            modal.payResult()
        }, 2000);
        $('.verify-pop').find('.close').unbind('click').click(function () {
            $('.order-weixinpay-hidden').hide();
            $('.fui-header').show();
            clearInterval(modal.settime)
        });
        $('.verify-pop').find('.qrimg').attr('src', img).show()
    };
    modal.payResult = function () {
        var btn = $('.btncoupon');
        //传入数量
        core.json('membercard/coupon/payresult', {id: modal.coupon.id, logid: modal.logid,num: modal.coupon.num,card_id: modal.coupon.card_id}, function (pay_json) {
            btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
            if (pay_json.status == 0) {
                FoxUI.toast.show(pay_json.result.message);
                return
            }
            clearInterval(modal.settime);
            if (pay_json.status == 1) {
                var text = "";
                var button = "";
                var href = "";
                if (pay_json.result.coupontype == 0) {
                    location.href = core.getUrl('sale/coupon/my/showcoupons2', {id: pay_json.result.dataid});
                    return
                } else  if (pay_json.result.coupontype == 1) {
                    text = lang_js_membercard_js_coupon_0 +"?";
                    button = lang_js_membercard_js_coupon_1 +"~";
                    href = core.getUrl('member/recharge')
                } else  if (pay_json.result.coupontype == 2) {
                    text = lang_js_membercard_js_coupon_2 ;
                    button = lang_js_membercard_js_coupon_3 ;
                    href = core.getUrl('sale/coupon/my')
                }else{
                    text = lang_js_membercard_js_coupon_4 ;
                    button = lang_js_membercard_js_coupon_5 ;
                    href = core.getUrl('sale/coupon/my')
                };

                $('#btnWeixinJieCancel').trigger('click');
                FoxUI.message.show({
                    icon: 'icon icon-success',
                    content: text,
                    buttons: [{
                        text: button, extraClass: 'btn-danger', onclick: function () {
                            location.href = href
                        }
                    }, {
                        text: lang_js_membercard_js_coupon_6 , extraClass: 'btn-default', onclick: function () {
                            location.href = core.getUrl('sale/coupon')
                        }
                    }]
                });
                return
            }
            FoxUI.toast.show(pay_json.result);
            btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting')
        }, false, true);
    };

    return modal
});