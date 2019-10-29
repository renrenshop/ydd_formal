define(['core', 'tpl'], function(core, tpl) {
	var modal = {};
	modal.init = function(params) {
		var checked_applytype = $('#applytype').find("option:selected").val();
		if (checked_applytype == 2) {
			$('.ab-group').show();
			$('.alipay-group').show();
			$('.bank-group').hide()
		} else if (checked_applytype == 3) {
			$('.ab-group').show();
			$('.alipay-group').hide();
			$('.bank-group').show()
		} else {
			$('.ab-group').hide();
			$('.alipay-group').hide();
			$('.bank-group').hide()
		}
		$('#applytype').change(function() {
			var applytype = $(this).find("option:selected").val();
			if (applytype == 2) {
				$('.ab-group').show();
				$('.alipay-group').show();
				$('.bank-group').hide()
			} else if (applytype == 3) {
				$('.ab-group').show();
				$('.alipay-group').hide();
				$('.bank-group').show()
			} else {
				$('.ab-group').hide();
				$('.alipay-group').hide();
				$('.bank-group').hide()
			}
		});
		$('#chargeinfo').click(function() {
			$('.charge-group').toggle()
		});
		$('.btn-submit').click(function() {
			var btn = $(this);
			if (btn.attr('stop')) {
				return
			}
			var current = core.getNumber($('#current').html());
			if (current < params.withdraw) {
				FoxUI.toast.show(lang_js_commission_static_js_apply_0+' ' + params.withdraw + ' '+lang_js_commission_static_js_apply_1+'!');
				return
			}
			var html = '';
			var realname = '';
			var alipay = '';
			var alipay1 = '';
			var bankname = '';
			var bankcard = '';
			var bankcard1 = '';
			var applytype = $('#applytype').find("option:selected").val();
			var typename = $('#applytype').find("option:selected").html();
			if (applytype == undefined) {
				FoxUI.toast.show(lang_js_commission_static_js_apply_2+"，"+lang_js_commission_static_js_apply_3+'!');
				return
			}
			if (applytype == 0) {
				html = typename
			} else if (applytype == 1) {
				html = typename
			} else if (applytype == 2) {
				if ($('#realname').isEmpty()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_4+'!');
					return
				}
				if ($('#alipay').isEmpty()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_5+'!');
					return
				}
				if ($('#alipay1').isEmpty()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_6+'!');
					return
				}
				if ($('#alipay').val() != $('#alipay1').val()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_7+'!');
					return
				}
				realname = $('#realname').val();
				alipay = $('#alipay').val();
				alipay1 = $('#alipay1').val();
				html = typename + "?<br>"+lang_js_commission_static_js_apply_8+":" + realname + "<br>"+lang_js_commission_static_js_apply_9+":" + alipay
			} else if (applytype == 3) {
				if ($('#realname').isEmpty()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_10+'!');
					return
				}
				if ($('#bankcard').isEmpty()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_11+'!');
					return
				}
				if (!$('#bankcard').isNumber()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_12+'!');
					return
				}
				if ($('#bankcard1').isEmpty()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_13+'!');
					return
				}
				if ($('#bankcard').val() != $('#bankcard1').val()) {
					FoxUI.toast.show(lang_js_commission_static_js_apply_14+'!');
					return
				}
				realname = $('#realname').val();
				bankcard = $('#bankcard').val();
				bankcard1 = $('#bankcard1').val();
				bankname = $('#bankname').find("option:selected").html();
				html = typename + "?<br>"+lang_js_commission_static_js_apply_15+":" + realname + "<br>" + bankname + " "+lang_js_commission_static_js_apply_16+":" + $('#bankcard').val()
			}
			if (applytype < 2) {
				var confirm_msg = lang_js_commission_static_js_apply_17+ html + "?"
			} else {
				var confirm_msg = lang_js_commission_static_js_apply_18+ html
			}
			FoxUI.confirm(confirm_msg, function() {
				btn.html(lang_js_commission_static_js_apply_19+'...').attr('stop', 1);
				core.json('commission/apply', {
					type: applytype,
					realname: realname,
					alipay: alipay,
					alipay1: alipay1,
					bankname: bankname,
					bankcard: bankcard,
					bankcard1: bankcard1
				}, function(ret) {
					if (ret.status == 0) {
						btn.removeAttr('stop').html(html);
						FoxUI.toast.show(ret.result.message);
						return
					}
					FoxUI.toast.show(lang_js_commission_static_js_apply_20+"，"+lang_js_commission_static_js_apply_21+'!');
					location.href = core.getUrl('commission/withdraw')
				}, true, true)
			})
		})
	};
	return modal
});