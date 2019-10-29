define(['core', 'tpl'], function(core, tpl) {
	var modal = {};
	modal.allow = function() {
		if (!$('#money').isNumber() || $('#money').isEmpty()) {
			return false
		} else {
			var money = parseFloat($('#money').val());
			if (money <= 0) {
				return false
			}
			if (modal.min > 0) {
				if (money < modal.min) {
					return false
				}
			}
			if (money > modal.max) {
				return false
			}
		}
		if (modal.withdrawcharge > 0 && money != 0) {
			var deductionmoney = money / 100 * modal.withdrawcharge;
			deductionmoney = Math.round(deductionmoney * 100) / 100;
			if (deductionmoney >= modal.withdrawbegin && deductionmoney <= modal.withdrawend) {
				deductionmoney = 0
			}
			var realmoney = money - deductionmoney;
			realmoney = Math.round(realmoney * 100) / 100;
			$("#deductionmoney").html(deductionmoney);
			$("#realmoney").html(realmoney);
			$(".charge-group").show()
		}
		return true
	};
	modal.init = function(params) {
		modal.withdrawcharge = params.withdrawcharge;
		modal.withdrawbegin = params.withdrawbegin;
		modal.withdrawend = params.withdrawend;
		modal.min = params.min;
		modal.max = params.max;
		$('#btn-all').click(function() {
			if (modal.max <= 0) {
				return
			}
			$('#money').val(modal.max);
			if (!modal.allow()) {
				$('#btn-next').addClass('disabled')
			} else {
				$('#btn-next').removeClass('disabled')
			}
		});
		$('#money').bind('input propertychange', function() {
			if (!modal.allow()) {
				$('#btn-next').addClass('disabled')
			} else {
				$('#btn-next').removeClass('disabled')
			}
		});
		$('#btn-next').click(function() {
			var money = $.trim($('#money').val());
			if ($(this).attr('submit')) {
				return
			}
			if (!modal.allow()) {
				return
			}
			if ($('.btn-withdraw').attr('submit')) {
				return
			}
			var money = $('#money').val();
			if (!$('#money').isNumber()) {
				FoxUI.toast.show(lang_js_pc_biz_member_withdraw_0+'!');
				return
			}
			var msg = lang_js_pc_biz_member_withdraw_1+' ' + money + ' '+lang_js_pc_biz_member_withdraw_2+'?';
			if (modal.withdrawcharge > 0) {
				msg += ' "+lang_js_pc_biz_member_withdraw_3+" ' + $("#deductionmoney").html() + ' "+lang_js_pc_biz_member_withdraw_4+","+lang_js_pc_biz_member_withdraw_5+" ' + $("#realmoney").html() + ' "+lang_js_pc_biz_member_withdraw_6+"'
			}
			FoxUI.confirm(msg, function() {
				$('.btn-withdraw').attr('submit', 1);
				core.json('member/withdraw/submit', {
					money: money
				}, function(rjson) {
					if (rjson.status != 1) {
						$('.btn-widthdraw').removeAttr('submit');
						FoxUI.toast.show(rjson.result.message);
						return
					}
					FoxUI.toast.show(lang_js_pc_biz_member_withdraw_7+"，"+lang_js_pc_biz_member_withdraw_8+'!');
					location.href = core.getUrl('member/log', {
						type: 1
					})
				}, true, true)
			})
		})
	};
	return modal
});