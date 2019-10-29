define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		goods: false,
		optionid: 0
	};
	modal.init = function(params) {
		modal.goods = goods = params.goods;
		modal.storeid = 0;
		modal.optionid = params.optionid;
		modal.jie = params.goods.jie;
		var loadStore = false;
		if (typeof(window.selectedStoreData) !== 'undefined') {
			loadStore = window.selectedStoreData;
			modal.storeid = loadStore.id;
			$('#storename').text(loadStore.storename);
			delete window.selectedStoreData
		}
		var loadAddress = false;
		if (typeof(window.selectedAddressData) !== 'undefined') {
			loadAddress = window.selectedAddressData
		} else if (typeof(window.editAddressData) !== 'undefined') {
			loadAddress = window.editAddressData;
			loadAddress.address = loadAddress.areas.replace(/ /ig, '') + ' ' + loadAddress.address
		}
		if (loadAddress) {
			modal.address = loadAddress;
			modal.addressid = loadAddress.id;
			if (modal.addressid) {
				core.json('creditshop/create/dispatch', {
					goodsid: modal.goods.id,
					addressid: modal.addressid,
					optionid: modal.optionid
				}, function(ret) {
					if (ret.status == 1) {
						var result = ret.result;
						modal.dispatch = result.dispatch;
						var money = parseFloat(result.dispatch) + parseFloat(goods.money);
						if (result.dispatch > 0) {
							$(".dispatchprice").html("¥" + result.dispatch);
							$(".moneydispatch").html(money)
						}
						$("#address_select").text(modal.address.address);
						$("#carrier_realname").show().find("input").val(modal.address.realname);
						$("#carrier_mobile").show().find("input").val(modal.address.mobile)
					} else {
						var result = ret.result;
						modal.address = '';
						modal.addressid = 0;
						$("#address_select").text(lang_js_creditshop_static_js_create_0);
						$("#carrier_realname").show().find("input").val('');
						$("#carrier_mobile").show().find("input").val('');
						FoxUI.toast.show(result.nodispatch);
						return
					}
				})
			};
			$('#addressInfo a').attr('href', core.getUrl('member/address/selector'));
			$('#addressInfo a').click(function() {
				window.orderSelectedAddressID = loadAddress.id
			})
		}
		if (modal.goods.timestate) {
			$('.fui-timer').timer({
				onEnd: function() {
					$(".fui-navbar .btn").removeClass("btn-danger").addClass("btn-disabled").removeAttr("id").text(""+lang_js_creditshop_static_js_create_1+"")
				}
			})
		};
		modal.paycheck = function(paytype) {
			modal.paytype = paytype;
			if (!goods.canbuy) {
				FoxUI.toast.show(goods.buymsg);
				return
			}
			if (goods.followneed == '1' && !goods.followed) {
				FoxUI.message.show({
					title: ""+lang_js_creditshop_static_js_create_2+"",
					icon: 'icon icon-information',
					content: goods.followtext,
					buttons: [{
						text: lang_js_creditshop_static_js_create_3,
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
				if (goods.isverify == 1 && goods.goodstype == 0) {
					if (modal.realname == '' && $('#carrier_realname').attr("data-show") == 0) {
						FoxUI.toast.show(lang_js_creditshop_static_js_create_4+'!');
						return
					}
					if (modal.mobile == '' && $('#carrier_mobile').attr("data-show") == 0) {
						FoxUI.toast.show(lang_js_creditshop_static_js_create_5+'!');
						return
					}
					if (modal.storeid == 0) {
						FoxUI.toast.show(lang_js_creditshop_static_js_create_6+'!');
						return
					}
				} else if ((goods.isverify == 0 && goods.goodstype == 0)) {
					if (!modal.addressid) {
						FoxUI.toast.show(lang_js_creditshop_static_js_create_7+'!');
						return
					}
				}
				FoxUI.message.show({
					title: ""+lang_js_creditshop_static_js_create_8+"？",
					icon: 'icon icon-information',
					content: '',
					buttons: [{
						text: lang_js_creditshop_static_js_create_9,
						extraClass: 'btn-danger',
						onclick: function() {
							modal.pay(goods)
						}
					}, {
						text: lang_js_creditshop_static_js_create_10,
						extraClass: 'btn-default',
						onclick: function() {}
					}]
				});
				return
			} else {
				modal.pay(goods)
			}
		};
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
		});
		$("#openActionSheet").off("click").on("click", function() {
			if (goods.type == 0) {
				if (goods.money > 0 || goods.dispatch > 0) {
					modal.openActionSheet(false)
				} else {
					modal.paycheck()
				}
			} else {
				if (goods.money > 0) {
					modal.openActionSheet(false)
				} else {
					modal.paycheck()
				}
			}
		});
		$("#optionid").off("click").on("click", function() {
			modal.optionPicker();
			core.json('creditshop/detail/option', {
				goodsid: modal.goods.id
			}, function(ret) {
				if (ret.status == 0) {
					FoxUI.toast.show(lang_js_creditshop_static_js_create_11+'!');
					return
				} else {
					modal.specs = ret.result.specs;
					modal.options = ret.result.options;
					modal.good = ret.result.goods;
					modal.goods.id = modal.goods.id;
					$(".option_thumb").attr("src", modal.good.thumb);
					$(".option_credit").html(modal.good.credit);
					$(".option_money").html(modal.good.money);
					$(".option_total").html(modal.good.total);
					core.tpl('.option-picker-options', 'option-picker-tpl', ret.result);
					$(".spec-item").off('click').on("click", function() {
						modal.chooseSpec(this)
					})
				}
			});
			modal.optionPicker1.show()
		})
	};
	modal.getListlog = function(page, goodsid) {
		core.json('creditshop/detail/getlistlog', {
			page: page,
			goodsid: goodsid
		}, function(ret) {
			var result = ret.result;
			console.log(result);
			if (result.total <= 0) {
				$(".logmore").hide()
			} else {
				if (result.list.length <= 0 || result.list.length < result.pagesize) {
					$(".logmore").hide()
				}
			}
			modal.logpage++;
			core.tpl('#loglist', 'tpl_loglist', result, modal.logpage > 1)
		})
	};
	modal.getListreply = function(page, goodsid) {
		core.json('creditshop/detail/getlistreply', {
			page: page,
			goodsid: goodsid
		}, function(ret) {
			var result = ret.result;
			if (result.total <= 0) {
				$(".replymore").hide()
			} else {
				if (result.list.length <= 0 || result.list.length < result.pagesize) {
					$(".replymore").hide()
				}
			}
			modal.replypage++;
			core.tpl('#comments_reply', 'tpl_replylist', result, modal.replypage > 1)
		})
	};
	modal.openActionSheet = function(round) {
		FoxUI.actionsheet.show(""+lang_js_creditshop_static_js_create_12+"", [{
			text: lang_js_creditshop_static_js_create_13,
			extraClass: 'wechat',
			onclick: function() {
				modal.paycheck('wechat')
			}
		}, {
			text: lang_js_creditshop_static_js_create_14,
			extraClass: 'alipay',
			onclick: function() {
				modal.paycheck('alipay')
			}
		}, {
			text: lang_js_creditshop_static_js_create_15,
			extraClass: 'balance',
			onclick: function() {
				modal.paycheck('balance')
			}
		}, ], round)
	};
	modal.optionPicker = function() {
		modal.optionPicker1 = new FoxUIModal({
			content: $('#option-picker').html(),
			extraClass: 'picker-modal',
			maskClick: function() {
				modal.optionPicker1.close()
			}
		});
		$(".icon-roundclose").click(function() {
			modal.optionPicker1.close()
		});
		$(".confirmbtn").click(function() {
			modal.optionPicker1.close()
		})
	};
	modal.initOption = function() {
		$(".spec-item").removeClass('btn-danger');
		var optionid = modal.optionid;
		var specs = false;
		$.each(modal.options, function() {
			if (this.id == optionid) {
				specs = this.specs.split('_');
				return false
			}
		});
		if (specs) {
			var item = false;
			var selectitems = [];
			$(".spec-item").each(function() {
				var item = $(this),
					itemid = item.data('id');
				$.each(specs, function() {
					console.log(this);
					if (this == itemid) {
						selectitems.push(item);
						item.addClass('btn-danger')
					}
				})
			});
			if (selectitems.length > 0) {
				var lastitem = selectitems[selectitems.length - 1];
				modal.chooseSpec(lastitem, false)
			}
		}
	};
	modal.chooseSpec = function(obj, callback) {
		var $this = $(obj);
		$this.closest('.spec').find('.spec-item').removeClass('btn-danger'), $this.addClass('btn-danger');
		var thumb = $this.data('thumb') || '';
		if (thumb) {
			$('.option_thumb').attr('src', thumb)
		} else {
			thumb = modal.goods.thumb
		}
		modal.optionthumb = thumb;
		var selected = $(".spec-item.btn-danger");
		var itemids = [];
		if (selected.length == modal.specs.length) {
			selected.each(function() {
				itemids.push($(this).data('id'))
			});
			$.each(modal.options, function() {
				var specs = this.specs.split('_').sort().join('_');
				if (specs == itemids.sort().join('_')) {
					var stock = this.total == '-1' ? lang_js_creditshop_static_js_create_16 : this.stock;
					$('.total').html(stock);
					if (this.total != '-1' && this.total <= 0) {
						$('.confirmbtn').show().addClass('disabled').html(lang_js_creditshop_static_js_create_17)
					} else {
						$('.confirmbtn').removeClass('disabled').html(lang_js_creditshop_static_js_create_18)
					}
					$('.option_money').html(this.money);
					$('.option_credit').html(this.credit);
					modal.option = this;
					modal.optionid = this.id
				}
			})
		}
		if (modal.option) {
			var titles = [];
			selected.each(function() {
				titles.push($.trim($(this).html()))
			});
			$('.info-titles').html(lang_js_creditshop_static_js_create_19+' ' + modal.option.title);
			$(".option_total").html(modal.option.total);
			$("#optionid").html(modal.option.title);
			if (callback) {
				if (modal.params.onSelected) {
					modal.params.onSelected(modal.params.total, modal.params.optionid, modal.params.titles)
				}
			}
		}
	};
	modal.pay = function() {
		core.json('creditshop/detail/pay', {
			id: modal.goods.id,
			optionid: modal.optionid,
			addressid: modal.addressid,
			storeid: modal.storeid,
			realname: modal.realname,
			mobile: modal.mobile,
			paytype: modal.paytype
		}, function(json) {
			var result = json.result;
			modal.logid = result.logid;
			if (json.status != 1) {
				FoxUI.toast.show(json.result.message);
				return
			}
			if (result.wechat) {
				var wechat = result.wechat;
				if (wechat.weixin) {
					function onBridgeReady() {
						WeixinJSBridge.invoke('getBrandWCPayRequest', {
							'appId': wechat.appid ? wechat.appid : wechat.appId,
							'timeStamp': wechat.timeStamp,
							'nonceStr': wechat.nonceStr,
							'package': wechat.package,
							'signType': wechat.signType,
							'paySign': wechat.paySign,
						}, function(res) {
							if (res.err_msg == 'get_brand_wcpay_request:ok') {
								modal.lottery(modal.goods)
							} else if (res.err_msg == 'get_brand_wcpay_request:cancel') {
								FoxUI.toast.show(lang_js_creditshop_static_js_create_20)
							} else {
								if (modal.jie) {
									core.json('creditshop/detail/pay', {
										id: modal.goods.id,
										optionid: modal.optionid,
										addressid: modal.addressid,
										storeid: modal.storeid,
										realname: modal.realname,
										mobile: modal.mobile,
										jie: 1
									}, function(wechat_jie) {
										modal.logid = wechat_jie.result.logid;
										modal.payWechatJie(wechat_jie.result.wechat)
									}, false, true)
								}
							}
						})
					}
					if (typeof WeixinJSBridge == "undefined") {
						if (document.addEventListener) {
							document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false)
						} else if (document.attachEvent) {
							document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
							document.attachEvent('onWeixinJSBridgeReady', onBridgeReady)
						}
					} else {
						onBridgeReady()
					}
				}
				if (wechat.weixin_jie || wechat.jie == 1) {
					modal.payWechatJie(wechat)
				}
			} else if (result.alipay) {
				var alipay = result.alipay;
				if (!alipay.success) {
					FoxUI.toast.show(lang_js_creditshop_static_js_create_21+'！')
				}
				location.href = core.getUrl('order/pay_alipay', {
					id: goods.id,
					logid: result.logid,
					type: 20,
					url: alipay.url
				})
			} else {
				modal.lottery(modal.goods)
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
			$('.fui-header').show()
		});
		$('.order-weixinpay-hidden').show();
		modal.settime = setInterval(function() {
			modal.lottery(modal.goods)
		}, 2000);
		$('.verify-pop').find('.close').unbind('click').click(function() {
			$('.order-weixinpay-hidden').hide();
			$('.fui-header').show();
			clearInterval(modal.settime)
		});
		$('.verify-pop').find('.qrimg').attr('src', img).show()
	};
	modal.lottery = function(goods) {
		var type = goods.type;
		if (type == 0) {
			core.json('creditshop/detail/lottery', {
				logid: modal.logid,
				id: modal.goods.id
			}, function(json) {
				var result = json.result;
				if (result.status == -1) {
					FoxUI.toast.show(json.result.message);
					return
				}
				clearInterval(modal.settime);
				$('.fui-header').show();
				$('.order-weixinpay-hidden').hide();
				if (result.status == 2) {
					setTimeout(function() {
						FoxUI.message.show({
							title: ""+lang_js_creditshop_static_js_create_22+"，"+lang_js_creditshop_static_js_create_23+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_creditshop_static_js_create_24,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log/detail', {
										id: modal.logid,
										shine: 1
									})
								}
							}]
						})
					}, 1)
				} else if (result.status == 3) {
					var str = ""+lang_js_creditshop_static_js_create_25+"";
					if (result.goodstype == 1) {
						str = ""+lang_js_creditshop_static_js_create_26+""
					} else if (result.goodstype == 2) {
						str = ""+lang_js_creditshop_static_js_create_27+""
					} else if (result.goodstype == 3) {
						str = ""+lang_js_creditshop_static_js_create_28+""
					};
					setTimeout(function() {
						FoxUI.message.show({
							title: ""+lang_js_creditshop_static_js_create_29+"，" + str + ""+lang_js_creditshop_static_js_create_30+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_creditshop_static_js_create_31,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log/detail', {
										id: modal.logid,
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
				content: lang_js_creditshop_static_js_create_32+"，"+lang_js_creditshop_static_js_create_33+'....',
				buttons: []
			});
			setTimeout(function() {
				core.json('creditshop/detail/lottery', {
					id: modal.goods.id,
					logid: modal.logid
				}, function(json) {
					var result = json.result;
					if (json.status == -1) {
						FoxUI.toast.show(json.result.message);
						return
					}
					clearInterval(modal.settime);
					if (result.status == 2) {
						FoxUI.message.show({
							title: ""+lang_js_creditshop_static_js_create_34+"，"+lang_js_creditshop_static_js_create_35+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_creditshop_static_js_create_36,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log/detail', {
										id: modal.logid,
										shine: 1
									})
								}
							}]
						});
						return
					} else if (result.status == 3) {
						var str = ""+lang_js_creditshop_static_js_create_37+"";
						if (result.goodstype == 1) {
							str = ""+lang_js_creditshop_static_js_create_38+""
						} else if (result.goodstype == 2) {
							str = ""+lang_js_creditshop_static_js_create_39+""
						} else if (result.goodstype == 3) {
							str = ""+lang_js_creditshop_static_js_create_40+""
						};
						FoxUI.message.show({
							title: ""+lang_js_creditshop_static_js_create_41+"，" + str + ""+lang_js_creditshop_static_js_create_42+"!",
							icon: 'icon icon-success',
							content: '',
							buttons: [{
								text: lang_js_creditshop_static_js_create_43,
								extraClass: 'btn-danger',
								onclick: function() {
									location.href = core.getUrl('creditshop/log/detail', {
										id: modal.logid,
										shine: 1
									})
								}
							}]
						});
						return
					} else {
						FoxUI.message.show({
							title: ""+lang_js_creditshop_static_js_create_44+"，"+lang_js_creditshop_static_js_create_45+"!",
							icon: 'icon icon-wrong',
							content: '',
							buttons: [{
								text: lang_js_creditshop_static_js_create_46,
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