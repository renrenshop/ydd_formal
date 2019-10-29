define(['core', 'tpl'], function(core, tpl, op) {
    var modal = {
        params: {}
    };
    modal.init = function() {
        $(".btn-search").click(function() {
            if ($('#verifycode').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_verify_page_0);
                return
            }
            core.json('verify/page/search', {
                verifycode: $('#verifycode').val()
            }, function(ret) {
                if (ret.status == 0) {
                    FoxUI.toast.show(ret.result.message);
                    return
                }
                if (ret.result.isverifygoods == 1) {
                    $.router.load(core.getUrl('verify/verifygoods/detail', {
                        id: ret.result.verifygoodid,
                        verifycode: ret.result.verifycode
                    }), true)
                } else {
                    var url = 'verify/detail';
                    if (ret.result.istrade) {
                        url = 'verify/tradedetail'
                    }
                    $.router.load(core.getUrl(url, {
                        id: ret.result.orderid,
                        single: 1
                    }), true)
                }
            }, true, true)
        })
    };
    modal.verify = function(btn) {};
    return modal
});