define(['core', 'tpl'], function(core, tpl, op) {
    var modal = {
        params: {}
    };
    modal.init = function() {
        var verify_container = $('.verify-container');
        var verifytype = verify_container.data('verifytype'),
            orderid = verify_container.data('orderid');
        if (verifytype == 2) {
            if ($('.verify-checkbox:checked').length > 0) {
                $('.order-verify').find('span').html(lang_js_biz_verify_detail_0+'(' + $('.verify-checkbox:checked').length + ")")
            } else {
                $('.order-verify').find('span').html(lang_js_biz_verify_detail_1)
            }
        }
        verify_container.find('.verify-cell').each(function() {
            var cell = $(this);
            var verifycode = cell.data('verifycode');
            cell.find('.verify-checkbox').unbind('click').click(function() {
                core.json('verify/select', {
                    id: orderid,
                    verifycode: verifycode
                }, function(ret) {
                    setTimeout(function() {
                        if ($('.verify-checkbox:checked').length <= 0) {
                            $('.order-verify').find('span').html(lang_js_biz_verify_detail_2)
                        } else {
                            $('.order-verify').find('span').html(lang_js_biz_verify_detail_3+'(' + $('.verify-checkbox:checked').length + ")")
                        }
                    }, 0)
                }, true, true)
            })
        });
        $(".fui-number").numbers({
            minToast: lang_js_biz_verify_detail_4+"{min}"+lang_js_biz_verify_detail_5,
            maxToast: lang_js_biz_verify_detail_6+"{max}"+lang_js_biz_verify_detail_7
        });
        $('.order-verify').click(function() {
            modal.verify($(this))
        })
    };
    modal.verify = function(btn) {
        var tip = "",
            type = btn.data('verifytype'),
            orderid = btn.data('orderid');
        var times = parseInt($('.shownum').val());
        var verifycode = '';
        if (type == 0) {
            tip = lang_js_biz_verify_detail_8+"?"
        } else if (type == 1) {
            if (times <= 0) {
                FoxUI.toast.show(lang_js_biz_verify_detail_9);
                return
            }
            tip = lang_js_biz_verify_detail_10+" <span class='text-danger'>" + times + "</span> "+lang_js_biz_verify_detail_11+"?"
        } else if (type == 2) {
            verifycode = $('.verify-cell').data('verifycode');
            if ($('.verify-checkbox:checked').length <= 0) {
                tip = lang_js_biz_verify_detail_12+"?"
            } else {
                tip = lang_js_biz_verify_detail_13+"?"
            }
        }
        FoxUI.confirm(tip, function() {
            core.json('verify/complete', {
                id: orderid,
                times: times,
                verifycode: verifycode
            }, function(ret) {
                if (ret.status == 0) {
                    FoxUI.toast.show(ret.result.message);
                    return
                }
                location.href = core.getUrl('verify/success', {
                    id: orderid,
                    times: times
                })
            })
        })
    };
    return modal
});