define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		goods: false,
		logid: 0,
		storeid: 0,
		realname: 0,
		mobile: 0,
		settime: 0
	};
	modal.init = function(params) {
		modal.goods = goods = params.goods;
		modal.storeid = 0;
		var loadStore = false;
		if (typeof(window.selectedStoreData) !== 'undefined') {
			loadStore = window.selectedStoreData;
			modal.storeid = loadStore.id;
			$('#storename').text(loadStore.storename);
			delete window.selectedStoreData;
		}
		if (modal.goods.timestate) {
			$('.fui-timer').timer({
				onEnd: function() {
					$(".fui-navbar .btn").removeClass("btn-danger").addClass("btn-disabled").removeAttr("id").text(""+lang_js_salemall_static_js__old_detail_0+"")
				}
			})
		}
		$('#btnsub').click(function() {
			if (!goods.canbuy) {
				FoxUI.toast.show(goods.buymsg);
				return
			}
			if (goods.followneed == '1' && !goods.followed) {
				FoxUI.message.show({
					title: ""+lang_js_salemall_static_js__old_detail_1+"",
					icon: 'icon icon-information',
					content: goods.followtext,
					buttons: [{
						text: lang_js_salemall_static_js__old_detail_2,
						extraClass: 'btn-danger',
						onclick: function() {
							location.href = goods.followurl
						}
					}]
				});
				return
			}
			modal.realname = $.trim($('#carrier_realname').val());
			modal.mobile = $.trim($('#carrier_mobile').val());
			if (goods.type == 0) {
				if (goods.isverify == 1) {
					if (modal.realname == '') {
						FoxUI.toast.show(lang_js_salemall_static_js__old_detail_3+'!');
						return
					}
					if (modal.mobile == '') {
						FoxUI.toast.show(lang_js_salemall_static_js__old_detail_4+'!');
						return
					}
					if (!modal.storeid) {
						FoxUI.toast.show(lang_js_salemall_static_js__old_detail_5+'!');
						return
					}
				}
				FoxUI.message.show({
					title: ""+lang_js_salemall_static_js__old_detail_6+"？",
					icon: 'icon icon-information',
					content: '',
					buttons: [{
						text: lang_js_salemall_static_js__old_detail_7,
						extraClass: 'btn-danger',
						onclick: function() {
							modal.pay(goods)
						}
					}, {
						text: lang_js_salemall_static_js__old_detail_8,
						extraClass: 'btn-default',
						onclick: function() {}
					}]
				});
				return
			} else {
				modal.pay(goods)
			}
		});
		$(document).click(function() {
			$('input').each(function() {
				$(this).attr('data-value', $(this).val())
			})
		});
		$('input').each(function() {
			var value = $(this).attr('data-value') || '';
			if (value != '') {
				$(this).val(value)
			}
		})
	};
	modal.pay = function() {
		core.json('creditshop/detail/pay', {
			id: modal.goods.id,
			storeid: modal.storeid,
			realname: modal.realname,
			mobile: modal.mobile
		}, function(json) {
			if (json.status != 1) {
				FoxUI.toast.show(json.result.message);
				return
			}
			var result = json.result;
			modal.logid = result.logid;

			if (result.wechat) {

/*
                if(core.ish5app()){
                    modal.useAppPay(json);
                }*/

				var wechat = result.wechat;
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
							modal.lottery();
						} else if (res.err_msg == 'get_brand_wcpay_request:cancel') {
							FoxUI.toast.show(lang_js_salemall_static_js__old_detail_9)
						} else {
							core.json('creditshop/detail/pay', {
								id: modal.goods.id,
								storeid: modal.storeid,
								realname: modal.realname,
								mobile: modal.mobile,
								jie: 1
							}, function(wechat_jie) {
								modal.logid = wechat_jie.result.logid;
								modal.payWechatJie(wechat_jie.result.wechat);
							}, false, true);
						}
					})
				}
				if (wechat.weixin_jie || wechat.jie == 1) {
					modal.payWechatJie(wechat);
				}

			} else {
				modal.lottery();
			}
		}, true, true)
	};

	modal.payWechatJie = function(wechat) {
		var img = core.getUrl('index/qr', {
			url: wechat.code_url
		});
		$('#qrmoney').text(modal.goods.money);
		$('.fui-header').hide();
		$('#btnWeixinJieCancel').unbind('click').click(function() {
			clearInterval(modal.settime);
			$('.order-weixinpay-hidden').hide();
			$('.fui-header').show();
		});
		$('.order-weixinpay-hidden').show();
		modal.settime = setInterval(function() {
			modal.lottery();
		}, 2000);
		$('.verify-pop').find('.close').unbind('click').click(function() {
			$('.order-weixinpay-hidden').hide();
			$('.fui-header').show();
			clearInterval(modal.settime);
		});
		$('.verify-pop').find('.qrimg').attr('src', img).show()
	};

	modal.lottery = function() {
		var type = modal.goods.type;
		if (type == 0) {

			core.json('creditshop/detail/lottery', {
				id: modal.goods.id,
				logid: modal.logid
			}, function(json) {
				if (json.status == -1) {
					FoxUI.toast.show(json.result.message);
					return;
				}
				clearInterval(modal.settime);
				if (json.status == 2) {
					setTimeout(function() {
						FoxUI.message.show({
							title: ""+lang_js_salemall_static_js__old_detail_10+"，"+lang_js_salemall_static_js__old_detail_11+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_salemall_static_js__old_detail_12,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log', {
										shine: 1
									})
								}
							}]
						})
					}, 1)
				} else if (json.status == 3) {
					setTimeout(function() {
						FoxUI.message.show({
							title: ""+lang_js_salemall_static_js__old_detail_13+"，"+lang_js_salemall_static_js__old_detail_14+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_salemall_static_js__old_detail_15,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log', {
										shine: 1
									})
								}
							}]
						})
					}, 1)
				}
			}, false, true)
		} else {
			FoxUI.message.show({
				title: '',
				icon: 'icon icon-clock',
				content: lang_js_salemall_static_js__old_detail_16+"，"+lang_js_salemall_static_js__old_detail_17+'....',
				buttons: []
			});
			setTimeout(function() {
				core.json('creditshop/detail/lottery', {
					id: modal.goods.id,
					logid: modal.logid
				}, function(json) {
					if (json.status == -1) {
						FoxUI.toast.show(json.result.message);
						return;
					}
					clearInterval(modal.settime);
					if (json.status == 2) {
						FoxUI.message.show({
							title: ""+lang_js_salemall_static_js__old_detail_18+"，"+lang_js_salemall_static_js__old_detail_19+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_salemall_static_js__old_detail_20,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log', {
										shine: 1
									})
								}
							}]
						});
						return
					} else if (json.status == 3) {
						FoxUI.message.show({
							title: ""+lang_js_salemall_static_js__old_detail_21+"，"+lang_js_salemall_static_js__old_detail_22+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_salemall_static_js__old_detail_23,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log', {
										shine: 1
									})
								}
							}]
						});
						return
					} else {
						FoxUI.message.show({
							title: ""+lang_js_salemall_static_js__old_detail_24+"，"+lang_js_salemall_static_js__old_detail_25+"!",
							icon: 'icon icon-wrong',
							content: '',
							buttons: [{
								text: lang_js_salemall_static_js__old_detail_26,
								extraClass: 'btn-danger',
								onclick: function() {
									location.reload()
								}
							}]
						});
						return
					}
				}, false, true)
			}, 1000)
		}
	};

	modal.useAppPay = function(json) {
		FoxUI.message.show({
			title: '',
			icon: 'icon icon-clock',
			content: lang_js_salemall_static_js__old_detail_27,
			buttons: []
		});
		setTimeout(function() {
			appPay('wechat', json.result.logno, json.result.money, false, function() {
				modal.settime = setInterval(function() {
					FoxUI.toast.show('ss');
					modal.lottery(modal.goods);
				}, 2000);
			})
		}, 500);

	};

	return modal
});