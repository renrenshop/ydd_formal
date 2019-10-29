define(['core'], function(core, tpl, picker) {
	var modal = {
		backurl: ''
	};
	modal.initLogin = function(params) {
		modal.backurl = params.backurl;
		$('#btnSubmit').click(function() {
			if ($('#btnSubmit').attr('stop')) {
				return
			}
			if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

			} else {
				FoxUI.toast.show(lang_js_pc_biz_member_account_0);
				return

			}
			if ($('#pwd').val() == undefined || $.trim($('#pwd').val()) == '') {
				FoxUI.toast.show(lang_js_pc_biz_member_account_1+'!');
				return
			}
			$('#btnSubmit').html(lang_js_pc_biz_member_account_2+'...').attr('stop', 1);
			core.json('pc.account.login', {
				mobile: $('#mobile').val(),
				pwd: $('#pwd').val()
			}, function(ret) {
				FoxUI.toast.show(ret.result.message);
				if (ret.status != 1) {
					$('#btnSubmit').html(lang_js_pc_biz_member_account_3).removeAttr('stop');
					return
				} else {
					$('#btnSubmit').html(lang_js_pc_biz_member_account_4+'...')
				}
				setTimeout(function() {
					if (modal.backurl) {
						location.href = modal.backurl;
						return
					}
					location.href = core.getUrl('pc')
				}, 1000)
			}, false, true)
		})
	};
	modal.verifycode = function() {
		modal.seconds--;
		if (modal.seconds > 0) {
			$('#btnCode').html(modal.seconds + lang_js_pc_biz_member_account_5).addClass('disabled').attr('disabled', 'disabled');
			setTimeout(function() {
				modal.verifycode()
			}, 1000)
		} else {
			$('#btnCode').html(lang_js_pc_biz_member_account_6).removeClass('disabled').removeAttr('disabled')
		}
	};
	modal.initRf = function(params) {
		modal.backurl = params.backurl;
		modal.type = params.type;
		modal.endtime = params.endtime;
		if (modal.endtime > 0) {
			modal.seconds = modal.endtime;
			modal.verifycode()
		}
		$('#btnCode').click(function() {
			if ($('#btnCode').hasClass('disabled')) {
				return
			}
			if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

			} else {
				FoxUI.toast.show(lang_js_pc_biz_member_account_7);
				return

			}
			modal.seconds = 60;
			modal.verifycode();
			core.json('pc.account.verifycode', {
				mobile: $('#mobile').val(),
				temp: !modal.type ? "sms_reg" : "sms_forget"
			}, function(ret) {
				FoxUI.toast.show(ret.result.message);
				if (ret.status != 1) {
					$('#btnCode').html(lang_js_pc_biz_member_account_8).removeClass('disabled').removeAttr('disabled')
				}
			}, false, true)
		});
		$('#btnSubmit').click(function() {
			if ($('#btnSubmit').attr('stop')) {
				return
			}
			if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

			} else {
				FoxUI.toast.show(lang_js_pc_biz_member_account_9);
				return
			}
			var isnum
			if ($('#verifycode').val().length != 5) {
				FoxUI.toast.show(lang_js_pc_biz_member_account_10+"5"+lang_js_pc_biz_member_account_11+'!');
				return
			}
			if ($('#pwd').val() == undefined || $.trim($('#pwd').val()) == '') {
				FoxUI.toast.show(lang_js_pc_biz_member_account_12+'!');
				return
			}
			if ($('#pwd').val() !== $('#pwd1').val()) {
				FoxUI.toast.show(lang_js_pc_biz_member_account_13+'!');
				return
			}
			$('#btnSubmit').html(lang_js_pc_biz_member_account_14+'...').attr('stop', 1);
			var url = !modal.type ? "pc.account.register" : "pc.account.forget";
			core.json(url, {
				mobile: $('#mobile').val(),
				verifycode: $('#verifycode').val(),
				pwd: $('#pwd').val()
			}, function(ret) {
				if (ret.status != 1) {
					FoxUI.toast.show(ret.result.message);
					var text = modal.type ? ""+lang_js_pc_biz_member_account_15+"" : ""+lang_js_pc_biz_member_account_16+"";
					$('#btnSubmit').html(text).removeAttr('stop');
					return
				} else {
					FoxUI.alert(ret.result.message, '', function() {
						if (modal.backurl) {
							location.href = core.getUrl('pc.account.login', {
								mobile: $('#mobile').val(),
								backurl: modal.backurl
							})
						} else {
							location.href = core.getUrl('pc.account.login', {
								mobile: $('#mobile').val()
							})
						}
					})
				}
			}, false, true)
		})
	};
	modal.initBind = function(params) {
		modal.endtime = params.endtime;
		modal.backurl = params.backurl;
		if (modal.endtime > 0) {
			modal.seconds = modal.endtime;
			modal.verifycode()
		}
		$('#btnCode').click(function() {
			if ($('#btnCode').hasClass('disabled')) {
				return
			}
			if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

			} else {
				FoxUI.toast.show(lang_js_pc_biz_member_account_17+"11"+lang_js_pc_biz_member_account_18);
				return

			}
			modal.seconds = 60;
			modal.verifycode();
			core.json('account/verifycode', {
				mobile: $('#mobile').val(),
				temp: 'sms_bind'
			}, function(ret) {
				if (ret.status != 1) {
					FoxUI.toast.show(ret.result.message);
					$('#btnCode').html(lang_js_pc_biz_member_account_19).removeClass('disabled').removeAttr('disabled')
				}
			}, false, true)
		});
		$('#btnSubmit').click(function() {
			if ($('#btnSubmit').attr('stop')) {
				return
			}
			if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

			} else {
				FoxUI.toast.show(lang_js_pc_biz_member_account_20+"11"+lang_js_pc_biz_member_account_21);
				return

			}
			if ($('#verifycode').val().length != 5) {
				FoxUI.toast.show(lang_js_pc_biz_member_account_22+"5"+lang_js_pc_biz_member_account_23+'!');
				return
			}
			if ($('#pwd').val() == undefined || $.trim($('#pwd').val()) == '') {
				FoxUI.toast.show(lang_js_pc_biz_member_account_24+'!');
				return
			}
			if ($('#pwd').val() !== $('#pwd1').val()) {
				FoxUI.toast.show(lang_js_pc_biz_member_account_25+'!');
				return
			}
			$('#btnSubmit').html(lang_js_pc_biz_member_account_26+'...').attr('stop', 1);
			core.json('member/bind', {
				mobile: $('#mobile').val(),
				verifycode: $('#verifycode').val(),
				pwd: $('#pwd').val()
			}, function(ret) {
				if (ret.status == 0) {
					FoxUI.toast.show(ret.result.message);
					$('#btnSubmit').html(lang_js_pc_biz_member_account_27).removeAttr('stop');
					return
				}
				if (ret.status < 0) {
					FoxUI.confirm(ret.result.message, ""+lang_js_pc_biz_member_account_28+"", function() {
						core.json('pc.member.bind', {
							mobile: $('#mobile').val(),
							verifycode: $('#verifycode').val(),
							pwd: $('#pwd').val(),
							confirm: 1
						}, function(ret) {
							if (ret.status == 1) {
								FoxUI.alert(lang_js_pc_biz_member_account_29+'!', '', function() {
									location.href = params.backurl ? atob(params.backurl) : core.getUrl('pc.member')
								});
								return
							}
							FoxUI.toast.show(ret.result.message);
							$('#btnSubmit').html(lang_js_pc_biz_member_account_30).removeAttr('stop');
							return
						}, true, true)
					}, function() {
						$('#btnSubmit').html(lang_js_pc_biz_member_account_31).removeAttr('stop')
					});
					return
				}
				FoxUI.alert(lang_js_pc_biz_member_account_32+'!', '', function() {
					location.href = params.backurl ? atob(params.backurl) : core.getUrl('pc.member')
				})
			}, true, true)
		})
	};
	modal.initChange = function(params) {
		modal.endtime = params.endtime;
		if (modal.endtime > 0) {
			modal.seconds = modal.endtime;
			modal.verifycode()
		}
		$('#btnCode').click(function() {
			if ($('#btnCode').hasClass('disabled')) {
				return
			}
			if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

			} else {
				FoxUI.toast.show(lang_js_pc_biz_member_account_33+"11"+lang_js_pc_biz_member_account_34);
				return

			}
			modal.seconds = 60;
			modal.verifycode();
			core.json('pc.account.verifycode', {
				mobile: $('#mobile').val(),
				temp: 'sms_changepwd'
			}, function(ret) {
				if (ret.status != 1) {
					FoxUI.toast.show(ret.result.message);
					$('#btnCode').html(lang_js_pc_biz_member_account_35).removeClass('disabled').removeAttr('disabled')
				}
			}, false, true)
		});
		$('#btnSubmit').click(function() {
			if ($('#btnSubmit').attr('stop')) {
				return
			}
			if ($.trim($('#mobile').val()) !== '' && /^1[3|4|5|7|8][0-9]\d{8}$/.test($.trim($('#mobile').val()))) {

			} else {
				FoxUI.toast.show(lang_js_pc_biz_member_account_36+"11"+lang_js_pc_biz_member_account_37);
				return

			}
			if ($('#verifycode').val().length != 5) {
				FoxUI.toast.show(lang_js_pc_biz_member_account_38+"5"+lang_js_pc_biz_member_account_39+'!');
				return
			}
			if ($('#pwd').val() == undefined || $.trim($('#pwd').val()) == '') {
				FoxUI.toast.show(lang_js_pc_biz_member_account_40+'!');
				return
			}
			if ($('#pwd').val() !== $('#pwd1').val()) {
				FoxUI.toast.show(lang_js_pc_biz_member_account_41+'!');
				return
			}
			$('#btnSubmit').html(lang_js_pc_biz_member_account_42+'...').attr('stop', 1);
			core.json('pc.member.changepwd', {
				mobile: $('#mobile').val(),
				verifycode: $('#verifycode').val(),
				pwd: $('#pwd').val()
			}, function(ret) {
				if (ret.status != 1) {
					FoxUI.toast.show(ret.result.message);
					$('#btnSubmit').html(lang_js_pc_biz_member_account_43).removeAttr('stop');
					return
				}
				FoxUI.alert(lang_js_pc_biz_member_account_44+'!', '', function() {
					location.href = core.getUrl('pc.member')
				})
			}, false, true)
		})
	};
	return modal
});