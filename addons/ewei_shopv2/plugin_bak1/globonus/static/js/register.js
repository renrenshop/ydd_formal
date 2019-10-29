define(['core', 'tpl', 'biz/plugin/diyform'], function(core, tpl, diyform) {
	var modal = {
		params: {
			applytitle: '',
			open_protocol: 0
		}
	};
	modal.init = function(mid, params) {
		modal.params = $.extend(modal.params, params || {});
		$('.btn-submit').click(function() {
			var btn = $(this);
			if (btn.attr('stop')) {
				return
			}
			var html = btn.html();
			var diyformdata = false;
			var data = {};
			if ($(".diyform-container").length > 0) {
				diyformdata = diyform.getData('.page-globonus-register .diyform-container');
				if (!diyformdata) {
					return
				}
				data = {
					memberdata: diyformdata
				}
			} else {
				if ($('#realname').isEmpty()) {
					FoxUI.toast.show(lang_js_globonus_static_js_register_0+'!');
					return
				}
				if (!$('#mobile').isMobile()) {
					FoxUI.toast.show(lang_js_globonus_static_js_register_1+'!');
					return
				}
				data = {
					'agentid': mid,
					'realname': $('#realname').val(),
					'mobile': $('#mobile').val(),
					'weixin': $('#weixin').val()
				}
			}
			if (modal.params.open_protocol == 1) {
				if (!$('#agree').prop('checked')) {
					FoxUI.toast.show(lang_js_globonus_static_js_register_2+'【' + modal.params.applytitle + '】!');
					return
				}
			}
			btn.attr('stop', 1).html(lang_js_globonus_static_js_register_3+'...');
			core.json('globonus/register', data, function(pjson) {
				if (pjson.status == 0) {
					btn.removeAttr('stop').html(html);
					FoxUI.toast.show(pjson.result.message);
					return
				}
				var result = pjson.result;
				if (result.check == '1') {
					FoxUI.message.show({
						icon: 'icon icon-roundcheck success',
						content: ""+lang_js_globonus_static_js_register_4+"!",
						buttons: [{
							text: lang_js_globonus_static_js_register_5,
							extraClass: 'btn-success',
							onclick: function() {
								location.href = core.getUrl('')
							}
						}]
					})
				} else {
					FoxUI.message.show({
						icon: 'icon icon-info text-warning',
						content: ""+lang_js_globonus_static_js_register_6+"，"+lang_js_globonus_static_js_register_7+"!",
						buttons: [{
							text: lang_js_globonus_static_js_register_8,
							extraClass: 'btn-danger',
							onclick: function() {
								location.href = core.getUrl('')
							}
						}]
					})
				}
			}, true, true)
		});
		$("#btn-apply").unbind('click').click(function() {
			var html = $(".pop-apply-hidden").html();
			container = new FoxUIModal({
				content: html,
				extraClass: "popup-modal",
				maskClick: function() {
					container.close()
				}
			});
			container.show();
			$('.verify-pop').find('.close').unbind('click').click(function() {
				container.close()
			});
			$('.verify-pop').find('.btn').unbind('click').click(function() {
				container.close()
			})
		})
	};
	return modal
});