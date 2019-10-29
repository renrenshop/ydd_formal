define(['core', 'tpl', 'biz/plugin/diyform'], function(core, tpl, diyform) {
	var modal = {
		params: {
			applytitle: '',
			open_protocol: 0
		}
	};
	modal.init = function(params) {
		modal.params = $.extend(modal.params, params || {});

		$('.btn-submit').click(function() {
			var btn = $(this);
			if (btn.attr('stop')) {
				return
			}
			var html = btn.html();
			var diyformdata = false;
			if ($('#merchname').isEmpty()) {
				FoxUI.toast.show(lang_js_merch_static_js_register_0+'!');
				return
			}
			if ($('#salecate').isEmpty()) {
				FoxUI.toast.show(lang_js_merch_static_js_register_1+'!');
				return
			}
			if ($('#realname').isEmpty()) {
				FoxUI.toast.show(lang_js_merch_static_js_register_2+'!');
				return
			}
			// if (!$('#mobile').isMobile()) {
			//     FoxUI.toast.show('请填写联系人手机!');
			//     return
			// }
			if ($('#uname').isEmpty()) {
				FoxUI.toast.show(lang_js_merch_static_js_register_3+'!');
				return
			}
			if ($('#upass').isEmpty()) {
				FoxUI.toast.show(lang_js_merch_static_js_register_4+'!');
				return
			}
			var data = {
				'realname': $('#realname').val(),
				'mobile': $('#mobile').val(),
				'merchname': $('#merchname').val(),
				'uname': $('#uname').val(),
				'upass': $('#upass').val(),
				'salecate': $('#salecate').val(),
				'desc': $('#desc').val(),
				'mdata': {}
			}

			if ($(".diyform-container").length > 0) {
				diyformdata = diyform.getData('.page-merch-register .diyform-container');
				if (!diyformdata) {
					return
				}
				data.mdata = diyformdata;
			}

			if (modal.params.open_protocol == 1) {
				if (!$('#agree').prop('checked')) {
					FoxUI.toast.show(lang_js_merch_static_js_register_5+'【' + modal.params.applytitle + '】!');
					return
				}
			}

			btn.attr('stop', 1).html(lang_js_merch_static_js_register_6+'...');
			core.json('merch/register', data, function(pjson) {
				if (pjson.status == 0) {
					btn.removeAttr('stop').html(html);
					FoxUI.toast.show(pjson.result.message);
					return
				}

				FoxUI.message.show({
					icon: 'icon icon-info text-warning',
					content: ""+lang_js_merch_static_js_register_7+"，"+lang_js_merch_static_js_register_8+"!",
					buttons: [{
						text: lang_js_merch_static_js_register_9,
						extraClass: 'btn-danger',
						onclick: function() {
							location.href = core.getUrl('')
						}
					}]
				});

			}, true, true)
		});

		$("#btn-apply").unbind('click').click(function() {
			var html = $(".pop-apply-hidden").html();
			container = new FoxUIModal({
				content: html,
				extraClass: "popup-modal",
				maskClick: function() {
					container.close();
				}
			});
			container.show();
			$('.verify-pop').find('.close').unbind('click').click(function() {
				container.close()
			});
			$('.verify-pop').find('.btn').unbind('click').click(function() {
				container.close();
			})
		});
	};
	return modal
});