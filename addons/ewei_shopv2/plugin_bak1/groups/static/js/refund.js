define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		params: {}
	};
	modal.init = function(params) {
		modal.params.orderid = params.orderid;
		modal.params.teamid = params.teamid;
		modal.params.refundid = params.refundid;
		$('.refund-container-uploader').uploader({
			uploadUrl: core.getUrl('util/uploader'),
			removeUrl: core.getUrl('util/uploader/remove')
		});
		$('#rtype').change(function() {
			var rtype = $(this).find("option:selected").val();
			if (rtype == 2) {
				$('.r-group').hide();
				$('.re-g').html(lang_js_groups_static_js_refund_0)
			} else {
				$('.r-group').show();
				$('.re-g').html(lang_js_groups_static_js_refund_1)
			}
		});
		$('.btn-submit').click(function() {
			if ($(this).attr('stop')) {
				return
			}
			if (!$('#price').isNumber()) {
				FoxUI.toast.show(lang_js_groups_static_js_refund_2+'!');
				return
			}
			var images = [];
			$('#images').find('li').each(function() {
				images.push($(this).data('filename'))
			});
			$(this).attr('stop', 1).html(lang_js_groups_static_js_refund_3+'...');
			core.json('groups/refund/submit', {
				'orderid': modal.params.orderid,
				'teamid': modal.params.teamid,
				'rtype': $('#rtype').val(),
				'reason': $('#reason').val(),
				'content': $('#content').val(),
				'images': images,
				'price': $('#price').val()
			}, function(ret) {
				if (ret.status == 1) {
					location.href = core.getUrl('groups/orders/detail', {
						orderid: modal.params.orderid,
						teamid: modal.params.teamid
					});
					return
				}
				$('.btn-submit').removeAttr('stop').html(lang_js_groups_static_js_refund_4);
				FoxUI.toast.show(ret.result.message)
			}, true, true)
		});
		$('.btn-cancel').click(function() {
			if ($(this).attr('stop')) {
				return
			}
			$(this).attr('stop', 1).attr('buttontext', $(this).html()).html(lang_js_groups_static_js_refund_5+'..');
			core.json('groups/refund/cancel', {
				orderid: modal.params.orderid,
				teamid: modal.params.teamid
			}, function(ret) {
				if (ret.status == 1) {
					location.href = core.getUrl('groups/orders/detail', {
						orderid: modal.params.orderid,
						teamid: modal.params.teamid
					});
					return
				}
				$('.btn-cancel').removeAttr('stop').html($('.btn-cancel').attr('buttontext')).removeAttr('buttontext')
			}, true, true)
		});
		$("select[name=express]").val($('#express_old').val()).change(function() {
			var obj = $(this);
			var sel = obj.find("option:selected");
			var name = sel.data("name");
			$(":input[name=expresscom]").val(name)
		});
		$('#express_submit').click(function() {
			if ($(this).attr('stop')) {
				return
			}
			if ($('#expresssn').isEmpty()) {
				FoxUI.toast.show(lang_js_groups_static_js_refund_6);
				return
			}
			$(this).html(lang_js_groups_static_js_refund_7+'...').attr('stop', 1);
			core.json('groups/refund/express', {
				orderid: modal.params.orderid,
				teamid: modal.params.teamid,
				refundid: modal.params.refundid,
				express: $('#express').val(),
				expresscom: $('#expresscom').val(),
				expresssn: $('#expresssn').val()
			}, function(postjson) {
				if (postjson.status == 1) {
					location.href = core.getUrl('groups/orders/detail', {
						orderid: modal.params.orderid,
						teamid: modal.params.teamid
					})
				} else {
					$('#express_submit').html(lang_js_groups_static_js_refund_8).removeAttr('stop');
					FoxUI.toast.show(postjson.result.message)
				}
			}, true, true)
		});
		$('.btn-receive').click(function() {
			if ($(this).attr('stop')) {
				return
			}
			FoxUI.confirm(lang_js_groups_static_js_refund_9+'?', '', function() {
				$(this).attr('stop', 1).html(lang_js_groups_static_js_refund_10+'...');
				core.json('groups/refund/receive', {
					refundid: modal.params.refundid,
					orderid: modal.params.orderid,
					teamid: modal.params.teamid
				}, function(postjson) {
					if (postjson.status == 1) {
						location.href = core.getUrl('groups/orders/detail', {
							orderid: modal.params.orderid,
							teamid: modal.params.teamid
						})
					} else {
						$('.btn-receive').html(lang_js_groups_static_js_refund_11).removeAttr('stop');
						FoxUI.toast.show(postjson.result.message)
					}
				}, true, true)
			})
		})
	};
	return modal
});