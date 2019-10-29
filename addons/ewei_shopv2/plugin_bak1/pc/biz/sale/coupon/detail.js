define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		coupon: null,
		logid: 0,
		settime: 0
	};
	modal.init = function(params) {
		modal.coupon = params.coupon;
		modal.getrm();
		if (modal.coupon.canget) {
			$("#btncoupon").click(function() {
				var btn = $(this);
				if (btn.attr('submitting') == '1') {
					return
				}
				FoxUI.message.show({
					title: lang_js_pc_biz_sale_coupon_detail_0 + modal.coupon.gettypestr + lang_js_pc_biz_sale_coupon_detail_1+'?',
					icon: 'icon icon-information',
					content: '',
					buttons: [{
						text: lang_js_pc_biz_sale_coupon_detail_2,
						extraClass: 'btn-danger',
						holdModal: true,
						onclick: function() {
							if (modal.paying) {
								return
							}
							$(".fui-message-popup .btn-danger").text(lang_js_pc_biz_sale_coupon_detail_3+'...');
							modal.paying = true;
							btn.attr('oldhtml', btn.html()).html(lang_js_pc_biz_sale_coupon_detail_4+'..').attr('submitting', 1);
							core.json('sale/coupon/detail/pay', {
								id: modal.coupon.id
							}, function(ret) {
								if (ret.status <= 0) {
									btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
									$(".fui-message-popup .btn-danger").text(lang_js_pc_biz_sale_coupon_detail_5);
									modal.paying = false;
									FoxUI.toast.show(ret.result.message);
									return
								}
								modal.logid = ret.result.logid;
								if (core.ish5app() && ret.result.needpay) {
									appPay('wechat', ret.result.logno, ret.result.money, false, function() {
										modal.settime = setInterval(function() {
											modal.payResult()
										}, 2000)
									});
									return
								}
								if (ret.result.wechat) {
									var wechat = ret.result.wechat;
									if (wechat.weixin) {
										WeixinJSBridge.invoke('getBrandWCPayRequest', {
											'appId': wechat.appid ? wechat.appid : wechat.appId,
											'timeStamp': wechat.timeStamp,
											'nonceStr': wechat.nonceStr,
											'package': wechat.package,
											'signType': wechat.signType,
											'paySign': wechat.paySign,
										}, function(res) {
											if (res.err_msg == 'get_brand_wcpay_request:ok') {
												modal.payResult()
											} else if (res.err_msg == 'get_brand_wcpay_request:cancel') {
												btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
												FoxUI.toast.show(lang_js_pc_biz_sale_coupon_detail_6)
											} else {
												btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
												core.json('sale/coupon/detail/pay', {
													id: modal.coupon.id,
													jie: 1
												}, function(wechat_jie) {
													modal.logid = wechat_jie.result.logid;
													modal.payWechatJie(wechat_jie.result.wechat)
												}, false, true)
											}
										})
									}
									if (wechat.weixin_jie || wechat.jie == 1) {
										modal.payWechatJie(wechat)
									}
								} else {
									modal.payResult()
								}
							}, true, true)
						}
					}, {
						text: lang_js_pc_biz_sale_coupon_detail_7,
						extraClass: 'btn-default',
						onclick: function() {
							modal.paying = false;
							clearInterval(modal.settime)
						}
					}]
				});
				return
			})
		}
		$("#changelot").click(function() {
			modal.getrm()
		})
	};
	modal.payWechatJie = function(wechat) {
		var img = "http://paysdk.weixin.qq.com/example/qrcode.php?data=" + wechat.code_url;
		$('#qrmoney').text(modal.coupon.money);
		$('.fui-header').hide();
		$('#btnWeixinJieCancel').unbind('click').click(function() {
			clearInterval(modal.settime);
			$('.order-weixinpay-hidden').hide();
			$('.fui-header').show();
			var btn = $("#btncoupon");
			var oldhtml = btn.attr('oldhtml');
			btn.html(oldhtml);
			btn.removeAttr('submitting');
			$(".fui-message-popup .btn-default").trigger('click')
		});
		$('.order-weixinpay-hidden').show();
		modal.settime = setInterval(function() {
			modal.payResult()
		}, 2000);
		$('.verify-pop').find('.close').unbind('click').click(function() {
			$('.order-weixinpay-hidden').hide();
			$('.fui-header').show();
			clearInterval(modal.settime)
		});
		$('.verify-pop').find('.qrimg').attr('src', img).show()
	};
	modal.payResult = function() {
		var btn = $('#btncoupon');
		core.json('sale/coupon/detail/payresult', {
			id: modal.coupon.id,
			logid: modal.logid
		}, function(pay_json) {
			btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting');
			if (pay_json.status == 0) {
				FoxUI.toast.show(pay_json.result.message);
				return
			}
			clearInterval(modal.settime);
			if (pay_json.status == 1) {
				var text = "";
				var button = "";
				var href = "";
				if (pay_json.result.coupontype == 0) {
					text = ""+lang_js_pc_biz_sale_coupon_detail_8+"，"+lang_js_pc_biz_sale_coupon_detail_9+"，"+lang_js_pc_biz_sale_coupon_detail_10+"?";
					button = ""+lang_js_pc_biz_sale_coupon_detail_11+"~";
					href = core.getUrl('goods')
				} else {
					text = ""+lang_js_pc_biz_sale_coupon_detail_12+"，"+lang_js_pc_biz_sale_coupon_detail_13+"，"+lang_js_pc_biz_sale_coupon_detail_14+"?";
					button = ""+lang_js_pc_biz_sale_coupon_detail_15+"~";
					href = core.getUrl('member/recharge')
				}
				$('#btnWeixinJieCancel').trigger('click');
				FoxUI.message.show({
					icon: 'icon icon-success',
					content: text,
					buttons: [{
						text: button,
						extraClass: 'btn-danger',
						onclick: function() {
							location.href = href
						}
					}, {
						text: lang_js_pc_biz_sale_coupon_detail_16,
						extraClass: 'btn-default',
						onclick: function() {
							location.href = core.getUrl('sale/coupon')
						}
					}]
				});
				return
			}
			FoxUI.toast.show(pay_json.result);
			btn.html(btn.attr('oldhtml')).removeAttr('oldhtml').removeAttr('submitting')
		}, false, true)
	};
	modal.getrm = function() {
		core.json('sale/coupon/detail/recommand', {}, function(r) {
			if (r.result.list.list.length < 1) {
				$("#rmgoods").html("<center>"+lang_js_pc_biz_sale_coupon_detail_17+"</center>")
			} else {
				core.tpl('#rmgoods', 'tpl_list_rmgoods', r.result.list)
			}
		}, true, true)
	};
	return modal
});