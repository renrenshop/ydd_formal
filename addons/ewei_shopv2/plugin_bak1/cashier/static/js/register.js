define(['core', 'tpl', 'biz/plugin/diyform'], function(core, tpl, diyform) {
	var modal = {
		params: {
			applycontent: 0
		}
	};
	modal.init = function(params) {
		modal.params.applycontent = params.applycontent;
		$('.fui-uploader').uploader({
			uploadUrl: core.getUrl('cashier/uploader'),
			removeUrl: core.getUrl('cashier/uploader/remove')
		});

		$('.btn-submit').click(function() {
			var btn = $(this);
			if (btn.attr('stop')) {
				return
			}
			var html = btn.html();
			var diyformdata = false;
			if ($('#title').isEmpty()) {
				FoxUI.toast.show(lang_js_cashier_static_js_register_0+'!');
				return
			}
			if ($('#name').isEmpty()) {
				FoxUI.toast.show(lang_js_cashier_static_js_register_1+'!');
				return
			}
			if (!$('#mobile').isMobile()) {
				FoxUI.toast.show(lang_js_cashier_static_js_register_2+'!');
				return
			}
			if ($('#username').isEmpty()) {
				FoxUI.toast.show(lang_js_cashier_static_js_register_3+'!');
				return
			}

			var data = $("#cashierForm").serialize();

			if ($(".diyform-container").length > 0) {
				diyformdata = diyform.getData('.page-cashier-register .diyform-container');
				if (!diyformdata) {
					return
				}
				data.mdata = diyformdata;
			}

			if (modal.params.applycontent == 1) {
				if (!$('#agree').prop('checked')) {
					FoxUI.toast.show(lang_js_cashier_static_js_register_4+'【'+lang_js_cashier_static_js_register_5+'】!');
					return
				}
			}

			btn.attr('stop', 1).html(lang_js_cashier_static_js_register_6+'...');
			core.json('cashier/register', data, function(pjson) {
				if (pjson.status == 0) {
					btn.removeAttr('stop').html(html);
					FoxUI.toast.show(pjson.result.message);
					return
				}

				FoxUI.message.show({
					icon: 'icon icon-info text-warning',
					content: ""+lang_js_cashier_static_js_register_7+"，"+lang_js_cashier_static_js_register_8+"!",
					buttons: [{
						text: lang_js_cashier_static_js_register_9,
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