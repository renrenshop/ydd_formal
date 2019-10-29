define(['core', 'tpl'], function(core, tpl) {
	var modal = {};
	modal.init = function(params) {
		modal.aid = params.aid;
		$("#report_content").bind("input propertychange", function() {
			var _val = $(this).val();
			var len = _val.length;
			var span = $(".textarea_counter span");
			span.text(len);
			if (len > 200) {
				span.addClass("text-danger")
			} else {
				span.removeClass("text-danger")
			}
		});
		$("#sub").click(function() {
			var _this = $(this);
			if (_this.data('state')) {
				FoxUI.toast.show(""+lang_js_article_static_js_report_0+"...!");
				return
			}
			var report_cate = $.trim($("#report_cate option:selected").val());
			var report_content = $.trim($("#report_content").val());
			if (report_cate == '') {
				FoxUI.toast.show(""+lang_js_article_static_js_report_1+"!");
				return
			}
			if (report_content == '') {
				FoxUI.toast.show(""+lang_js_article_static_js_report_2+"!");
				return
			}
			if (report_content.length < 20) {
				FoxUI.toast.show(""+lang_js_article_static_js_report_3+"20"+lang_js_article_static_js_report_4+"!");
				return
			}
			if (report_content.length > 200) {
				FoxUI.toast.show(""+lang_js_article_static_js_report_5+"200"+lang_js_article_static_js_report_6+"!");
				return
			}
			$("#sub").text(""+lang_js_article_static_js_report_7+"...").data('state', 1);
			core.json('article/report/post', {
				aid: modal.aid,
				cate: report_cate,
				content: report_content
			}, function(json) {
				if (json.status) {
					FoxUI.message.show({
						title: ""+lang_js_article_static_js_report_8+"!",
						icon: 'icon icon-success',
						content: ""+lang_js_article_static_js_report_9+"",
						buttons: [{
							text: lang_js_article_static_js_report_10,
							extraClass: 'btn-success',
							onclick: function() {
								WeixinJSBridge.call('closeWindow')
							}
						}]
					})
				} else {
					FoxUI.message.show({
						title: ""+lang_js_article_static_js_report_11+"!",
						icon: 'icon icon-wrong',
						content: ""+lang_js_article_static_js_report_12+"，"+lang_js_article_static_js_report_13+"",
						buttons: [{
							text: lang_js_article_static_js_report_14,
							extraClass: 'btn-default',
							onclick: function() {
								location.reload()
							}
						}]
					})
				}
			})
		})
	};
	return modal
});