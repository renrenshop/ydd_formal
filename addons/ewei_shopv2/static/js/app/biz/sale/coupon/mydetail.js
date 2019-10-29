define(['core', 'tpl'], function(core, tpl) {
    var modal = {};
    modal.init = function(params) {
        modal.getrm();
        $("#changelot").click(function() {
            modal.getrm()
        })
    };
    modal.getrm = function() {
        core.json('sale/coupon/detail/recommand', {}, function(r) {
            if (r.result.list.list.length < 1) {
                $("#rmgoods").html("<center>"+lang_js_biz_sale_coupon_mydetail_0+"</center>")
            } else {
                core.tpl('#rmgoods', 'tpl_list_rmgoods', r.result.list)
            }
        }, true, true)
    };
    return modal
});