/**
 * Created by Root on 2016/12/19.
 */
define(['core', 'tpl'], function(core, tpl) {
	var modal = {};

	modal.init = function(params) {
		$('#pointer').on('touchstart', function(e) {
			if (params.is_login == 0) {
				var backurl = core.getUrl('lottery/index', {
					id: params.id
				})
				FoxUI.confirm(""+lang_js_lottery_static_js_indexpan_0+"", ""+lang_js_lottery_static_js_indexpan_1+"", function() {
					location.href = core.getUrl('account/login', {
						backurl: btoa(backurl)
					})
				})
				return false;
			}
		});

	};

	return modal;
});