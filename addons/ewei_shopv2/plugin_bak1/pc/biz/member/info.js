define(['core', 'tpl'], function(core, tpl) {
	var modal = {};
	modal.init = function(params) {
		params = $.extend({
			returnurl: '',
			template_flag: 0
		}, params || {});
		$('#btn-submit').click(function() {
			var postdata = {};
			if (params.template_flag == 0) {
				if ($('#realname').val() == undefined || $.trim($('#realname').val()) == '') {
					FoxUI.toast.show(lang_js_pc_biz_member_info_0);
					return
				}
				if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

				} else {
					if (!params.wapopen) {
						FoxUI.toast.show(lang_js_pc_biz_member_info_1);
						return
					}
				}
				if ($(this).attr('submit')) {
					return
				}
				$(this).html(lang_js_pc_biz_member_info_2+'...').attr('submit', 1);
				postdata = {
					'memberdata': {
						'realname': $('#realname').val(),
						'weixin': $('#weixin').val(),
						'gender': $('#sex').val()
					},
					'mcdata': {
						'realname': $('#realname').val(),
						'gender': $('#sex').val()
					}
				};
				if (!params.wapopen) {
					postdata.memberdata.mobile = $('#mobile').val();
					postdata.mcdata.mobile = $('#mobile').val()
				}
				core.json('pc.member.info.submit', postdata, function(json) {
					modal.complete(params, json)
				}, true, true)
			} else {
				FoxUI.loader.show('mini');
				$(this).html(lang_js_pc_biz_member_info_3+'...').attr('submit', 1);
				require(['../addons/ewei_shopv2/plugin/pc/biz/plugin/diyform.js'], function(diyform) {
					postdata = diyform.getData('.diyform-container');
					FoxUI.loader.hide();
					if (postdata) {
						core.json('pc.member.info.submit', {
							memberdata: postdata
						}, function(json) {
							modal.complete(params, json)
						}, true, true)
					} else {
						$('#btn-submit').html(lang_js_pc_biz_member_info_4).removeAttr('submit')
					}
				})
			}
		})
	};
	modal.complete = function(params, json) {
		FoxUI.loader.hide();
		if (json.status == 1) {
			FoxUI.toast.show(lang_js_pc_biz_member_info_5);
			window.location.reload();
/*if (params.returnurl) {
				location.href = params.returnurl
			} else {
				history.back()
			}*/
		} else {
			$('#btn-submit').html(lang_js_pc_biz_member_info_6).removeAttr('submit');
			FoxUI.toast.showshow(lang_js_pc_biz_member_info_7+'!')
		}
	};
	return modal
});