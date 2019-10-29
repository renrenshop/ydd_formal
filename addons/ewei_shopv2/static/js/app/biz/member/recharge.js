define(['core', 'tpl'], function(core, tpl) {
    var modal = {
        minimumcharge: 0,
        wechat: 0,
        alipay: 0,
        couponid: 0,
        coupons: []
    };
    modal.init = function(params) {
        modal.minimumcharge = params.minimumcharge;
        modal.wechat = params.wechat;
        modal.alipay = params.alipay;
        modal.rmpay = params.rmpay;
        window.couponid = modal.couponid;
        $('#money').bind('input propertychange', function() {
            modal.hideCoupon();
            $('#btn-next').addClass('disabled').show(), $('.btn-pay').hide();
            $('.applyradio').hide();
            if ($(this).isNumber() && !$(this).isEmpty() && parseFloat($(this).val()) > 0) {
                $('#btn-next').removeClass('disabled')
            }
        });
        $('#btn-next').click(function() {
            var money = $.trim($('#money').val());
            var showpay = false;
            if ($(this).attr('submit')) {
                return
            }
            if (!$.isEmpty(money)) {
                if ($.isNumber(money) && parseFloat(money) > 0) {
                    if (modal.minimumcharge > 0) {
                        if (parseFloat(money) < modal.minimumcharge) {
                            FoxUI.toast.show(lang_js_biz_member_recharge_0 + modal.minimumcharge + lang_js_biz_member_recharge_1+'!');
                            return
                        } else {
                            showpay = true
                        }
                    } else {
                        showpay = true
                    }
                }
            }
            if (!showpay) {
                return
            }
            $(this).attr('submit', '1');
            core.json('sale/coupon/util/query', {
                money: money,
                type: 1
            }, function(rjson) {
                if (rjson.status != 1) {
                    $('#btn-next').removeAttr('submit');
                    core.tip.show(rjson.result);
                    return
                }
                if (rjson.result.coupons.length > 0) {
                    $('#coupondiv').show().find('.badge').html(rjson.result.coupons.length).show();
                    $('#coupondiv').find('.text').hide();
                    $('#coupondiv').click(function() {
                        require(['biz/sale/coupon/picker'], function(picker) {
                            picker.show({
                                couponid: modal.couponid,
                                coupons: rjson.result.coupons,
                                onCancel: function() {
                                    window.couponid = modal.couponid = 0;
                                    $('#coupondiv').find('.fui-cell-label').html(lang_js_biz_member_recharge_2);
                                    $('#coupondiv').find('.fui-cell-info').html('')
                                },
                                onSelected: function(data) {
                                    $('#coupondiv').find('.fui-cell-label').html(lang_js_biz_member_recharge_3);
                                    $('#coupondiv').find('.fui-cell-info').html(data.couponame);
                                    window.couponid = modal.couponid = data.couponid
                                }
                            })
                        })
                    })
                } else {
                    modal.hideCoupon()
                }
                $('#btn-next').removeAttr('submit').hide();

                // console.log(modal);return;

                if (core.ish5app()) {
                    // $('#btn-wechat1').css("display", "flex");
                    // $('#btn-wechat').show();
                    // $('#btn-alipay1').css("display", "flex");
                    $('#btn-rm1').css("display", "flex");
                    $('#btn-rm1').show();
                    return
                }
                // if (modal.wechat) {
                //     $('#btn-wechat1').css("display", "flex");
                //     $('#btn-wechat').show()
                // }
                // if (modal.alipay) {
                //     $('#btn-alipay1').css("display", "flex")
                // }
                if (modal.rmpay) {
                    $('#btn-rm1').css("display", "flex")
                    $('#btn-rm').show()
                }
            }, true, true)
        });
        $(document).on('click', '#btn-wechat', function() {
            if ($('.btn-pay').attr('submit')) {
                return
            }
            var money = $('#money').val();
            if (money <= 0) {
                FoxUI.toast.show('' + lang_js_biz_member_recharge_4+'0!');
                return
            }
            if (!$('#money').isNumber()) {
                FoxUI.toast.show(lang_js_biz_member_recharge_5+'!');
                return
            }
            $('.btn-pay').attr('submit', 1);
            core.json('member/recharge/submit', {
                type: 'wechat',
                money: money,
                couponid: modal.couponid
            }, function(rjson) {
                if (rjson.status != 1) {
                    $('.btn-pay').removeAttr('submit');
                    FoxUI.toast.show(rjson.result.message);
                    return
                }
                if (core.ish5app()) {
                    appPay('wechat', rjson.result.logno, rjson.result.money, true);
                    return
                }
                var wechat = rjson.result.wechat;
                if (wechat.weixin) {
                    function onBridgeReady() {
                        WeixinJSBridge.invoke('getBrandWCPayRequest', {
                            'appId': wechat.appid ? wechat.appid : wechat.appId,
                            'timeStamp': wechat.timeStamp,
                            'nonceStr': wechat.nonceStr,
                            'package': wechat.package,
                            'signType': wechat.signType,
                            'paySign': wechat.paySign
                        }, function(res) {
                            if (res.err_msg == 'get_brand_wcpay_request:ok') {
                                var sub = setInterval(function() {
                                    core.json('member/recharge/wechat_complete', {
                                        logid: rjson.result.logid
                                    }, function(pay_json) {
                                        if (pay_json.status == 1) {
                                            clearInterval(sub);
                                            FoxUI.toast.show(lang_js_biz_member_recharge_6+'!');
                                            location.href = core.getUrl('member');
                                            return
                                        }
                                    }, true, true)
                                }, 2000)
                            } else if (res.err_msg == 'get_brand_wcpay_request:cancel') {
                                $('.btn-pay').removeAttr('submit');
                                FoxUI.toast.show(lang_js_biz_member_recharge_7)
                            } else {
                                core.json('member/recharge/submit', {
                                    type: 'wechat',
                                    money: money,
                                    couponid: modal.couponid,
                                    jie: 1
                                }, function(wechat_jie) {
                                    modal.payWechatJie(wechat_jie.result, money)
                                }, false, true)
                            }
                        })
                    }
                    if (typeof WeixinJSBridge == "undefined") {
                        if (document.addEventListener) {
                            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false)
                        } else if (document.attachEvent) {
                            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady)
                        }
                    } else {
                        onBridgeReady()
                    }
                }
                if (wechat.weixin_jie || wechat.jie == 1) {
                    modal.payWechatJie(rjson.result, money)
                }
            }, true, true)
        });
        $(document).on('click', '#btn-alipay', function() {
            if ($('.btn-pay').attr('submit') && !core.ish5app()) {
                return
            }
            if (money <= 0) {
                FoxUI.toast.show(lang_js_biz_member_recharge_8+'0!');
                return
            }
            var money = $('#money').val();
            if (!$('#money').isNumber()) {
                FoxUI.toast.show(lang_js_biz_member_recharge_9+'!');
                return
            }
            $('.btn-pay').attr('submit', 1);
            core.json('member/recharge/submit', {
                type: 'alipay',
                money: money,
                couponid: modal.couponid
            }, function(rjson) {
                if (rjson.status != 1) {
                    $('.btn-pay').removeAttr('submit');
                    FoxUI.toast.show(rjson.result.message);
                    return
                }
                if (core.ish5app()) {
                    appPay('alipay', rjson.result.logno, money, '1', null, true)
                } else {
                    location.href = core.getUrl('order/pay_alipay', {
                        orderid: rjson.result.logno,
                        type: 1,
                        url: rjson.result.alipay.url
                    })
                }
            }, true, true)
        });
        $(document).on('click', '#btn-rm', function() {
            if ($('.btn-pay').attr('submit') && !core.ish5app()) {
                return
            }
            if (money <= 0) {
                FoxUI.toast.show(lang_js_biz_member_recharge_8+'0!');
                return
            }
            var money = $('#money').val();
            if (!$('#money').isNumber()) {
                FoxUI.toast.show(lang_js_biz_member_recharge_9+'!');
                return
            }
            $('.btn-pay').attr('submit', 1);
            core.json('member/recharge/submit', {
                type: 'rm',
                money: money,
                couponid: modal.couponid
            }, function(rjson) {
                if (rjson.status != 1) {
                    $('.btn-pay').removeAttr('submit');
                    FoxUI.toast.show(rjson.result.message);
                    return
                }else{
                    var html = "<img style='margin-left: 40px;' src='"+rjson.result.code+"'/>";
                    FoxUI.confirm(html,'扫码支付');
                }
            }, true, true)
        });
    };
    modal.payWechatJie = function(res, money) {
        var img = core.getUrl('index/qr', {
            url: res.wechat.code_url
        });
        $('#qrmoney').text(money);
        $('#btnWeixinJieCancel').unbind('click').click(function() {
            $('.btn-pay').removeAttr('submit');
            clearInterval(settime);
            $('.order-weixinpay-hidden').hide()
        });
        $('.order-weixinpay-hidden').show();
        var settime = setInterval(function() {
            core.json('member/recharge/wechat_complete', {
                logid: res.logid
            }, function(pay_json) {
                if (pay_json.status == 1) {
                    location.href = core.getUrl('member');
                    return
                }
            }, false, true)
        }, 1000);
        $('.verify-pop').find('.close').unbind('click').click(function() {
            $('.order-weixinpay-hidden').hide();
            $('.btn-pay').removeAttr('submit');
            clearInterval(settime)
        });
        $('.verify-pop').find('.qrimg').attr('src', img).show()
    };
    modal.hideCoupon = function() {
        $('#coupondiv').hide();
        $('#coupondiv').find('.badge').html('0').hide();
        $('#coupondiv').find('.text').show()
    };
    return modal
});