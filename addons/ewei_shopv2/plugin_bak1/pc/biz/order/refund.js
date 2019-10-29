define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		params: {}
	};
	modal.init = function(params) {
		modal.params.orderid = params.orderid;
		modal.params.refundid = params.refundid;
		$('.refund-container-uploader').uploader({
			uploadUrl: core.getUrl('util/uploader'),
			removeUrl: core.getUrl('util/uploader/remove')
		});
		$('#rtype').change(function() {
			var rtype = $(this).find("option:selected").val();
			if (rtype == 2) {
				$('.r-group').hide();
				$('.re-g').html(lang_js_pc_biz_order_refund_0)
			} else {
				$('.r-group').show();
				$('.re-g').html(lang_js_pc_biz_order_refund_1)
			}
		});
		$('.btn-submit').click(function() {
			if ($(this).attr('stop')) {
				return
			}
			if (!$('#price').isNumber()) {
				FoxUI.toast.show(lang_js_pc_biz_order_refund_2+'!');
				return
			}
			var images = [];
			$('#images').find('li').each(function() {
				images.push($(this).data('filename'))
			});
			$(this).attr('stop', 1).html(lang_js_pc_biz_order_refund_3+'...');
			core.json('order/refund/submit', {
				'id': modal.params.orderid,
				'rtype': $('#rtype').val(),
				'reason': $('#reason').val(),
				'content': $('#content').val(),
				'images': images,
				'price': $('#price').val()
			}, function(ret) {
				if (ret.status == 1) {
					location.href = core.getUrl('order/detail', {
						id: modal.params.orderid
					});
					return
				}
				$('.btn-submit').removeAttr('stop').html(lang_js_pc_biz_order_refund_4);
				FoxUI.toast.show(ret.result.message)
			}, true, true)
		});
		$('.btn-cancel').click(function() {
			if ($(this).attr('stop')) {
				return
			}
			FoxUI.confirm(lang_js_pc_biz_order_refund_5+'?', '', function() {
				$(this).attr('stop', 1).attr('buttontext', $(this).html()).html(lang_js_pc_biz_order_refund_6+'..');
				core.json('order/refund/cancel', {
					'id': modal.params.orderid
				}, function(postjson) {
					if (postjson.status == 1) {
						location.href = core.getUrl('order/detail', {
							id: modal.params.orderid
						});
						return
					} else {
						FoxUI.toast.show(postjson.result.message)
					}
					$('.btn-cancel').removeAttr('stop').html($('.btn-cancel').attr('buttontext')).removeAttr('buttontext')
				}, true, true)
			})
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
				FoxUI.toast.show(lang_js_pc_biz_order_refund_7);
				return
			}
			$(this).html(lang_js_pc_biz_order_refund_8+'...').attr('stop', 1);
			core.json('order/refund/express', {
				id: modal.params.orderid,
				refundid: modal.params.refundid,
				express: $('#express').val(),
				expresscom: $('#expresscom').val(),
				expresssn: $('#expresssn').val()
			}, function(postjson) {
				if (postjson.status == 1) {
					location.href = core.getUrl('order/detail', {
						id: modal.params.orderid
					})
				} else {
					$('#express_submit').html(lang_js_pc_biz_order_refund_9).removeAttr('stop');
					FoxUI.toast.show(postjson.result.message)
				}
			}, true, true)
		});
		$('.btn-receive').click(function() {
			if ($(this).attr('stop')) {
				return
			}
			FoxUI.confirm(lang_js_pc_biz_order_refund_10+'?', '', function() {
				$(this).attr('stop', 1).html(lang_js_pc_biz_order_refund_11+'...');
				core.json('order/refund/receive', {
					refundid: modal.params.refundid,
					id: modal.params.orderid
				}, function(postjson) {
					if (postjson.status == 1) {
						location.href = core.getUrl('order/detail', {
							id: modal.params.orderid
						})
					} else {
						$('.btn-receive').html(lang_js_pc_biz_order_refund_12).removeAttr('stop');
						FoxUI.toast.show(postjson.result.message)
					}
				}, true, true)
			})
		})
	};
	return modal
});