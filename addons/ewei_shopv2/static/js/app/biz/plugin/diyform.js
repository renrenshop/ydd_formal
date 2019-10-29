define(["core", "tpl"], function(core, tpl) {
    var modal = {};
    modal.getData = function(element) {
        var container = $(element);
        var cells = container.find(".fui-cell");
        var data = {};
        var stop = false;
        cells.each(function() {
            var $this = $(this);
            var itemid = $this.data("itemid"),
                field = "#" + itemid,
                field2 = "#" + itemid + "_2",
                must = $this.data("must") == "1",
                type = $this.data("type"),
                name = $this.data("name"),
                name2 = $this.data("name2"),
                tp_is_default = $this.data("tp_is_default"),
                key = $this.data("key");
            if (must) {
                if (type == 0 || type == 1) {
                    if ($(field).isEmpty()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_0 + name);
                        stop = true;
                        return false
                    }
                    if (type == 0 && tp_is_default == 3) {
                        if (!$(field).isMobile()) {
                            FoxUI.toast.show(lang_js_biz_plugin_diyform_1 + name);
                            stop = true;
                            return false
                        }
                    }
                }
                if (type == 2) {
                    if ($(field).isEmpty()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_2 + name);
                        stop = true;
                        return false
                    }
                }
                if (type == 3) {
                    var j = 0;
                    var checkeds = $(":checkbox[name^='" + itemid + "']:checked", $this).length;
                    if (checkeds <= 0) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_3 + name);
                        stop = true;
                        return false
                    }
                }
                if (type == 5) {
                    if ($(field + "_images").find("li").length <= 0) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_4 + name);
                        stop = true;
                        return false
                    }
                }
                if (type == 6) {
                    if ($(field).isEmpty() || !$(field).isIDCard()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_5 + name);
                        stop = true;
                        return false
                    }
                }
                if (type == 7 || type == 11) {
                    if ($(field).isEmpty()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_6 + name);
                        stop = true;
                        return false
                    }
                }
                if (type == 8 || type == 12) {
                    if ($(field + "_0").isEmpty() || $(field + "_1").isEmpty()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_7 + name);
                        stop = true;
                        return false
                    }
                }
                if (type == 9) {
                    if ($(field).isEmpty()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_8 + name);
                        stop = true;
                        return false
                    }
                }
                if (type == 10) {
                    if ($(field).isEmpty()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_9 + name);
                        stop = true;
                        return false
                    }
                    if ($(field2).isEmpty()) {
                        FoxUI.toast.show(lang_js_biz_plugin_diyform_10 + name2);
                        stop = true;
                        return false
                    }
                    if ($(field).val() != $(field2).val()) {
                        FoxUI.toast.show(name + lang_js_biz_plugin_diyform_11 + name2 + lang_js_biz_plugin_diyform_12);
                        stop = true;
                        return false
                    }
                }
            }
            if (type == 0 && tp_is_default == 3) {
                if (!$(field).isEmpty() && !$(field).isMobile()) {
                    FoxUI.toast.show(lang_js_biz_plugin_diyform_13 + name);
                    stop = true;
                    return false
                }
            }
            if (type == 6) {
                if (!$(field).isEmpty() && !$(field).isIDCard()) {
                    FoxUI.toast.show(lang_js_biz_plugin_diyform_14 + name);
                    stop = true;
                    return false
                }
            }
            if (type == 3) {
                data[key] = [];
                $("input[name='" + itemid + "[]']:checked").each(function() {
                    data[key].push($(this).val())
                })
            } else {
                if (type == 5) {
                    data[key] = [];
                    $(field + "_images").find("li").each(function() {
                        data[key].push($(this).data("filename"))
                    })
                } else {
                    if (type == 8 || type == 12) {
                        data[key] = [];
                        data[key].push($(field + "_0").val());
                        data[key].push($(field + "_1").val())
                    } else {
                        if (type == 9) {
                            var citys = $(field).val().split(" ");
                            var value = $(field).attr("data-value");
                            var province = citys.length >= 1 ? citys[0] : "";
                            var city = citys.length >= 2 ? citys[1] : "";
                            var area = citys.length >= 3 ? citys[2] : "";
                            data[key] = [province, city, area, value]
                        } else {
                            if (type == 10) {
                                var name1 = $(field).val();
                                var name2 = $(field2).val();
                                data[key] = [name1, name2]
                            } else {
                                if (type == 14) {
                                    data[key] = $("input[name^='" + itemid + "']:checked").val()
                                } else {
                                    data[key] = $(field).val()
                                }
                            }
                        }
                    }
                }
            }
        });
        if (stop) {
            return false
        }
        return data
    };
    return modal
});