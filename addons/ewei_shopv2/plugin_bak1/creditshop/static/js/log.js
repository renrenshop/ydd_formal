define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		page: 1,
		shine: 0
	};
	modal.init = function(params) {
		modal.shine = params.shine;
		modal.status = 0;
		$('.fui-content').infinite({
			onLoading: function() {
				modal.getList()
			}
		});
		if (modal.page == 1) {
			modal.getList()
		};
		$("#tab > a").off("click").on("click", function() {
			$(this).addClass("active").siblings().removeClass("active");
			modal.status = $(this).attr("data-status");
			modal.changeTab(modal.status)
		});
		$('.btn-packet').off('click').on("click", function() {
			var logid = $(this).data('logid');
			FoxUI.confirm(lang_js_creditshop_static_js_log_0+'?', lang_js_creditshop_static_js_log_1, function() {
				modal.packet(logid)
			})
		})
	};
	modal.changeTab = function(status) {
		$('.fui-content').infinite('init');
		$('.content-empty').hide(), $('.container').html(''), $('.infinite-loading').show();
		modal.page = 1, modal.status = status, modal.getList()
	};
	modal.packet = function(id) {
		core.json('creditshop/log/Receivepacket', {
			id: id
		}, function(pay_json) {
			if (pay_json.status == 1) {
				setTimeout(function() {
					FoxUI.message.show({
						title: ""+lang_js_creditshop_static_js_log_2+"，"+lang_js_creditshop_static_js_log_3+"!",
						icon: 'icon icon-success',
						content: '',
						buttons: [{
							text: lang_js_creditshop_static_js_log_4,
							extraClass: 'btn-danger',
							onclick: function() {
								location.reload();
								return
							}
						}]
					})
				}, 1)
			} else {
				FoxUI.toast.show(pay_json.result.message)
			}
		}, true, true)
	};
	modal.getList = function() {
		core.json('creditshop/log/getlist', {
			page: modal.page,
			status: modal.status
		}, function(ret) {
			var result = ret.result;
			if (result.total <= 0) {
				$('.content-empty').show();
				$('.fui-content').infinite('stop')
			} else {
				$('.content-empty').hide();
				$('.fui-content').infinite('init');
				if (result.list.length <= 0 || result.list.length < result.pagesize) {
					$('.fui-content').infinite('stop')
				}
			}
			modal.page++;
			core.tpl('.container', 'tpl_log_list', result, modal.page > 1);
			$('.btn-packet').off('click').on("click", function() {
				var logid = $(this).data('logid');
				FoxUI.confirm(lang_js_creditshop_static_js_log_5+'?', lang_js_creditshop_static_js_log_6, function() {
					modal.packet(logid)
				})
			})
		})
	};
	return modal
});