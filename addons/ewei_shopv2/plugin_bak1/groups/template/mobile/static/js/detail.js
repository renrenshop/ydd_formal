define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		goods: false,
		logid: 0,
		storeid: 0,
		realname: 0,
		mobile: 0
	};
	modal.init = function(params) {
		modal.goods = goods = params.goods;
		var loadStore = false;
		if (typeof(window.selectedStoreData) !== 'undefined') {
			loadStore = window.selectedStoreData;
			modal.storeid = loadStore.id;
			$('#storename').val(loadStore.storename)
		}
		$('#btnsub').click(function() {
			if (!goods.canbuy) {
				FoxUI.toast.show(goods.buymsg);
				return
			}
			if (goods.followneed == '1' && !goods.followed) {
				FoxUI.message.show({
					title: ""+lang_js_groups_template_mobile_static_js_detail_0+"",
					icon: 'icon icon-information',
					content: goods.followtext,
					buttons: [{
						text: lang_js_groups_template_mobile_static_js_detail_1,
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
						FoxUI.toast.show(lang_js_groups_template_mobile_static_js_detail_2+'!');
						return
					}
					if (modal.mobile == '') {
						FoxUI.toast.show(lang_js_groups_template_mobile_static_js_detail_3+'!');
						return
					}
					if (modal.storeid == 0) {
						FoxUI.toast.show(lang_js_groups_template_mobile_static_js_detail_4+'!');
						return
					}
				}
				FoxUI.message.show({
					title: ""+lang_js_groups_template_mobile_static_js_detail_5+"？",
					icon: 'icon icon-information',
					content: '',
					buttons: [{
						text: lang_js_groups_template_mobile_static_js_detail_6,
						extraClass: 'btn-danger',
						onclick: function() {
							modal.pay(goods)
						}
					}, {
						text: lang_js_groups_template_mobile_static_js_detail_7,
						extraClass: 'btn-default',
						onclick: function() {}
					}]
				});
				return
			} else {
				modal.pay(goods)
			}
		})
	};
	modal.pay = function() {
		core.json('groups/goods/pay', {
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
				var wechat = result.wechat;
				require(['http://res.wx.qq.com/open/js/jweixin-1.0.0.js'], function(wx) {
					jssdkconfig = result.jssdkconfig || {
						jsApiList: []
					};
					jssdkconfig.debug = false;
					jssdkconfig.jsApiList = ['checkJsApi', 'chooseWXPay'];
					wx.config(jssdkconfig);
					wx.ready(function() {
						var appid = wechat.appid ? wechat.appid : wechat.appId;
						wx.chooseWXPay({
							'appId': appid,
							'timestamp': wechat.timeStamp,
							'nonceStr': wechat.nonceStr,
							'package': wechat.package,
							'signType': wechat.signType,
							'paySign': wechat.paySign,
							success: function(res) {
								modal.lottery(goods)
							},
							fail: function(res) {
								alert(res.errMsg)
							}
						})
					})
				})
			} else {
				modal.lottery(goods)
			}
		}, true, true)
	};
	modal.lottery = function() {
		var type = goods.type;
		if (type == 0) {
			core.json('groups/detail/lottery', {
				id: modal.goods.id,
				logid: modal.logid
			}, function(json) {
				if (json.status == 2) {
					setTimeout(function() {
						FoxUI.message.show({
							title: ""+lang_js_groups_template_mobile_static_js_detail_8+"，"+lang_js_groups_template_mobile_static_js_detail_9+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_groups_template_mobile_static_js_detail_10,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('groups/log', {
										shine: 1
									})
								}
							}]
						})
					}, 1)
				} else if (json.status == 3) {
					setTimeout(function() {
						FoxUI.message.show({
							title: ""+lang_js_groups_template_mobile_static_js_detail_11+"，"+lang_js_groups_template_mobile_static_js_detail_12+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_groups_template_mobile_static_js_detail_13,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('groups/log', {
										shine: 1
									})
								}
							}]
						})
					}, 1)
				}
			}, true, true)
		} else {
			FoxUI.message.show({
				title: '',
				icon: 'icon icon-clock',
				content: lang_js_groups_template_mobile_static_js_detail_14+"，"+lang_js_groups_template_mobile_static_js_detail_15+'....',
				buttons: []
			});
			setTimeout(function() {
				core.json('groups/detail/lottery', {
					id: modal.goods.id,
					logid: modal.logid
				}, function(json) {
					if (json.status == -1) {
						alert(json.result)
					} else if (json.status == 2) {
						FoxUI.message.show({
							title: ""+lang_js_groups_template_mobile_static_js_detail_16+"，"+lang_js_groups_template_mobile_static_js_detail_17+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_groups_template_mobile_static_js_detail_18,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('groups/log', {
										shine: 1
									})
								}
							}]
						});
						return
					} else if (json.status == 3) {
						FoxUI.message.show({
							title: ""+lang_js_groups_template_mobile_static_js_detail_19+"，"+lang_js_groups_template_mobile_static_js_detail_20+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_groups_template_mobile_static_js_detail_21,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('groups/log', {
										shine: 1
									})
								}
							}]
						});
						return
					} else {
						FoxUI.message.show({
							title: ""+lang_js_groups_template_mobile_static_js_detail_22+"，"+lang_js_groups_template_mobile_static_js_detail_23+"!",
							icon: 'icon icon-wrong',
							content: '',
							buttons: [{
								text: lang_js_groups_template_mobile_static_js_detail_24,
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
	return modal
});