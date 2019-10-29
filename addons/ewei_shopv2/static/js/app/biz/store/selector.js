define(['core', 'tpl', 'https://api.map.baidu.com/getscript?v=2.0&ak=ZQiFErjQB7inrGpx27M1GR5w3TxZ64k7&services=&t=20170324173232'], function(core, tpl) {
    var modal = {};
    modal.init = function() {
        window.HOST_TYPE = "2";
        window.BMap_loadScriptTime = (new Date).getTime();
        modal.bindEvents();
        if (typeof(window.selectedStoreData) !== 'undefined') {
            $(".store-item .fui-list-media i").removeClass('selected');
            $(".store-item[data-storeid='" + window.selectedStoreData.id + "'] .fui-list-media i").addClass('selected')
        }
        $('.fui-searchbar input').bind('keyup', function() {
            var val = $.trim($(this).val());
            if (val == '') {
                $('.store-item').show()
            } else {
                var empty = true;
                $('.store-item').each(function() {
                    if ($(this).html().indexOf(val) != -1) {
                        $(this).show();
                        empty = false
                    } else {
                        $(this).hide()
                    }
                });
                if (empty) {
                    $('.content-empty').show()
                } else {
                    $('.content-empty').hide()
                }
            }
        });
        $('.fui-searchbar .searchbar-cancel').click(function() {
            $('.fui-searchbar input').val(''), $('.store-item').show(), $('.content-empty').hide()
        });
        $("#btn-near").click(function() {
            FoxUI.loader.show(lang_js_biz_store_selector_0+'...', 'icon icon-location');
            $('.fui-searchbar input').val(''), $('.store-item').show(), $('.content-empty').hide();
            var arr = [];
            var geolocation = new BMap.Geolocation();
            geolocation.getCurrentPosition(function(r) {
                var _this = this;
                if (this.getStatus() == BMAP_STATUS_SUCCESS) {
                    var lat = r.point.lat,
                        lng = r.point.lng;
                    $('.store-item').each(function() {
                        var location = $(this).find('.location');
                        var store_lng = $(this).data('lng'),
                            store_lat = $(this).data('lat');
                        if (store_lng > 0 && store_lat > 0) {
                            var distance = core.getDistanceByLnglat(lng, lat, store_lng, store_lat);
                            $(this).data('distance', distance);
                            location.html(lang_js_biz_store_selector_1+': ' + distance.toFixed(2) + "km").show();
                            location.parent("div").find("i").css("display", "block")
                        } else {
                            $(this).data('distance', 999999999999999999);
                            location.html(lang_js_biz_store_selector_2).show()
                        }
                        arr.push($(this))
                    });
                    arr.sort(function(a, b) {
                        return a.data('distance') - b.data('distance')
                    });
                    $.each(arr, function() {
                        $('.fui-list-group').append(this)
                    });
                    modal.bindEvents();
                    FoxUI.loader.hide()
                }
            }, {
                enableHighAccuracy: true
            })
        });
        $(".icon-xiangqing-copy").click(function() {
            var address = $(this).closest(".fui-list").data("address");
            var realname = $(this).closest(".fui-list").data("realname");
            var mobile = $(this).closest(".fui-list").data("mobile");
            var map = $(this).closest(".fui-list").data("map");
            var storename = $(this).closest(".fui-list").data("storename");
            $("#shopmask").find(".shopmask-title").html(storename);
            $("#shopmask").find(".address").find("div").html(address);
            $("#shopmask").find(".address").find("a").attr("href", map);
            $("#shopmask").find(".mobile").find("div").html(mobile);
            $("#shopmask").find(".mobile").closest("a").attr("href", "tel:" + mobile);
            $("#shopmask").find(".realname").find("div").html(realname);
            $("#shopmask").css("display", "block")
        });
        $(".shopmask-bottom").click(function() {
            $("#shopmask").css("display", "none")
        })
    };
    modal.bindEvents = function() {
        $('.store-item .fui-list-media,.store-item .fui-list-inner').unbind('click').click(function() {
            var $this = $(this).parent();
            window.selectedStoreData = {
                'id': $this.data('storeid'),
                'storename': $this.find('.storename').html(),
                'realname': $this.find('.realname').html(),
                'mobile': $this.find('.mobile').html(),
                'address': $this.find('.address').html()
            };
            history.back()
        })
    };
    modal.click = function() {};
    return modal
});