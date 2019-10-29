define(['core', 'tpl'], function(core, tpl) {
	var modal = {};
	modal.init = function(params) {
		modal.initLogout()
	};
	modal.initLogout = function() {
		$(".btn-logout").unbind('click').click(function() {
			FoxUI.confirm(lang_js_pc_biz_member_index_0+"，"+lang_js_pc_biz_member_index_1+'？', function() {
				location.href = core.getUrl('account/logout')
			})
		})
	};
	return modal
});