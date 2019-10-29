define(['core', 'tpl'], function(core, tpl) {
    var modal = {};
    modal.init = function(params) {
        if (typeof(window.memberData) !== 'undefined') {
            if (memberData.avatar) {
                $(".userinfo .face img").attr('src', memberData.avatar)
            }
            if (memberData.nickname) {
                $(".userinfo .name").text(memberData.nickname)
            }
        }
        modal.initLogout()
    };
    modal.initLogout = function() {
        $(".btn-logout").unbind('click').click(function() {
            FoxUI.confirm(lang_js_biz_member_index_0+'，'+lang_js_biz_member_index_1+'？', function() {
                location.href = core.getUrl('account/logout')
            })
        })
    };
    return modal
});