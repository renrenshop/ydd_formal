define(['core', 'tpl', 'biz/goods/picker', 'biz/member/favorite', 'biz/member/cart', 'biz/plugin/diyform', 'biz/sale/coupon/couponpicker', 'biz/goods/wholesalePicker'], function(core, tpl, picker, favorite, cart, diyform, couponpicker, wholesalePicker) {
    var modal = {};
    modal.init = function(params) {
        modal.seckillinfo = params.seckillinfo;
        modal.goodsid = params.goodsid;
        modal.offic = params.offic;
        modal.optionid = 0;
        modal.buyoptions = [];
        modal.total = 1;
        modal.getComments = params.getComments;
        modal.attachurl_local = params.attachurl_local;
        modal.attachurl_remote = params.attachurl_remote;
        modal.coupons = params.coupons;
        modal.new_temp = params.new_temp;
        modal.liveid = params.liveid;
        modal.officType = 0;
        modal.close_preview = params.close_preview;
        modal.timeout = false;
        if (modal.offic == "offic") {
            $('#tab .tab.active').removeClass('active');
            $("#offic-tab").addClass("active");
            modal.showOffic()
        }
        if (!modal.new_temp) {
            FoxUI.tab({
                container: $('#tab'),
                handlers: {
                    tab1: function() {
                        $('.basic-block').show();
                        modal.hideDetail();
                        modal.hideParams();
                        modal.hideComment();
                        modal.hideOffic();
                        $(".fui-navbar").show()
                    },
                    tab2: function() {
                        modal.hideParams();
                        modal.hideComment();
                        modal.hideOffic();
                        modal.showDetail();
                        $(".fui-navbar").show()
                    },
                    tab3: function() {
                        modal.showParams();
                        modal.hideComment();
                        modal.hideOffic();
                        $(".fui-navbar").show()
                    },
                    tab4: function() {
                        modal.showComment();
                        modal.hideOffic();
                        $(".fui-navbar").show()
                    },
                    tab5: function() {
                        modal.showOffic()
                    }
                }
            })
        } else {
            modal.getDetail();
            FoxUI.tab({
                container: $('#tabnew'),
                handlers: {
                    tab2: function() {
                        $(".detail-tab-panel .tab-panel[data-tab='tab2']").show().siblings().hide()
                    },
                    tab3: function() {
                        $(".detail-tab-panel .tab-panel[data-tab='tab3']").show().siblings().hide()
                    },
                    tab4: function() {
                        $(".detail-tab-panel .tab-panel[data-tab='tab4']").show().siblings().hide();
                        if (!$('.comment-block').attr('loaded')) {
                            $('.comment-block').attr('loaded', 1);
                            modal.getCommentList()
                        }
                    }
                }
            });
            $('.detail-block').find('.content-block').css('height', 'auto')
        }
        $('.coupon-selector').click(function() {
            modal.couponPicker()
        });
        modal.couponPicker = function(action) {
            couponpicker.show({
                coupons: modal.coupons
            })
        };
        modal.hideDetail();
        modal.hideParams();
        modal.hideComment();
        $('.option-selector').click(function() {
            modal.optionPicker('')
        });
        $('#alert-click').on("click", function() {
            $("#alert-picker").show();
            $(".alert-content").show()
        });
        $('.alert-close').on("click", function() {
            $("#alert-picker").hide()
        });
        $('#alert-mask').on("click", function() {
            $("#alert-picker").hide()
        });
        $('#city-picker').click(function() {
            modal.salePicker = new FoxUIModal({
                content: $('#city-picker-modal').html(),
                extraClass: 'picker-modal',
                maskClick: function() {
                    modal.salePicker.close()
                }
            });
            modal.salePicker.container.find('.btn-danger').click(function() {
                modal.salePicker.close()
            });
            modal.salePicker.show()
        });
        $('#picker-sales').click(function() {
            modal.pickerSales = new FoxUIModal({
                content: $('#picker-sales-modal').html(),
                extraClass: 'picker-modal',
                maskClick: function() {
                    modal.pickerSales.close()
                }
            });
            modal.pickerSales.container.find('.btn-danger').click(function() {
                modal.pickerSales.close()
            });
            modal.pickerSales.show()
        });
        $('#fullback-picker').click(function() {
            modal.salePicker = new FoxUIModal({
                content: $('#fullback-picker-modal').html(),
                extraClass: 'picker-modal',
                maskClick: function() {
                    modal.salePicker.close()
                }
            });
            modal.salePicker.container.find('.btn-danger').click(function() {
                modal.salePicker.close()
            });
            modal.salePicker.show()
        });
        $('#sale-picker').click(function() {
            modal.salePicker = new FoxUIModal({
                content: $('#sale-picker-modal').html(),
                extraClass: 'picker-modal',
                maskClick: function() {
                    modal.salePicker.close()
                }
            });
            FoxUI.according.init();
            modal.salePicker.container.find('.btn-danger').click(function() {
                modal.salePicker.close()
            });
            modal.salePicker.show()
        });
        $(".bottom-buttons .cartbtn").click(function() {
            var type = $(this).data('type');
            if (type == 4) {
                modal.wholesalePicker('cart')
            } else {
                modal.optionPicker('cart')
            }
        });
        $(".bottom-buttons .buybtn").click(function() {
            modal.timeout = $(this).data('timeout');
            if ($(this).data('time') == 'access_time' || $(this).data('time') == 'timeout') {
                if (modal.timeout == false) {
                    $('.goods-layer').css('display', 'block');
                    return
                } else if (modal.timeout == true) {
                    if ($(this).data('time') == 'access_time') {
                        $('.goods-layer').css('display', 'none');
                        var type = $(this).data('type');
                        if (type == 4) {
                            modal.wholesalePicker('buy')
                        } else {
                            modal.optionPicker('buy')
                        }
                        return
                    }
                    if ($(this).data('time') == 'timeout') {
                        $('.goods-layer').css('display', 'none');
                        return
                    }
                }
            }
            var type = $(this).data('type');
            if (type == 4) {
                modal.wholesalePicker('buy')
            } else {
                modal.optionPicker('buy')
            }
        });
        if ($('#time-container').length > 0 || $('#discount-container').length > 0) {
            $('.fui-labeltext').timer({
                onEnd: function() {
                    location.reload()
                },
                onStart: function() {
                    location.reload()
                }
            })
        } else if ($('#time-presell').length > 0 || $('#discount-container').length > 0) {
            $('.fui-labeltext').timer({
                onEnd: function() {
                    location.reload()
                },
                onStart: function() {
                    location.reload()
                }
            })
        }
        if ($('.seckill-container').length > 0) {
            modal.initSeckill()
        }
        $('.favorite-item').click(function() {
            var self = $(this);
            if (self.attr('submit') == '1') {
                return
            }
            self.attr('submit', 1);
            var isfavorite = self.attr('data-isfavorite') == '1';
            var icon = self.find('.icon');
            icon.addClass('icon-like').removeClass('icon-likefill');
            self.removeClass('active');
            isfavorite = self.attr('data-isfavorite') == '1' ? 0 : 1;
            favorite.toggle(modal.goodsid, isfavorite, function(is) {
                self.removeAttr('submit').attr("data-isfavorite", is ? "1" : 0);
                if (is) {
                    icon.addClass('icon-likefill').removeClass('icon-like');
                    self.addClass('active')
                }
            })
        });
        if (core.isWeixin()) {
            $('#btn-share').click(function() {
                $('#cover').fadeIn(200)
            });
            $('#cover').click(function() {
                $('#cover').hide()
            })
        } else {
            $('#btn-share').click(function() {
                if (core.ish5app()) {
                    return
                }
                FoxUI.alert(lang_js_biz_goods_detail_0)
            })
        }
        if (modal.getComments) {
            core.json('goods/detail/get_comments', {
                id: modal.goodsid
            }, function(ret) {
                var result = ret.result;
                $(".fui-icon-col[data-level='all']").find('.count').html(result.count.all);
                $(".fui-icon-col[data-level='good']").find('.count').html(result.count.good);
                $(".fui-icon-col[data-level='normal']").find('.count').html(result.count.normal);
                $(".fui-icon-col[data-level='bad']").find('.count').html(result.count.bad);
                $(".fui-icon-col[data-level='pic']").find('.count').html(result.count.pic);
                if (ret.status == 1 && result.list.length > 0) {
                    modal.initComment();
                    if (!modal.new_temp) {
                        $('#tabcomment').show();
                        core.tpl('#comments-container', 'tpl_goods_detail_comments', ret.result);
                        $('#comments-container .fui-cell:first-child').click(function() {
                            $("#tabcomment").click()
                        })
                    };
                    $(".btn-show-allcomment").off("click").on("click", function() {
                        $(".fui-tab a").removeClass('active');
                        $(".fui-tab a[data-tab='tab4']").addClass('active');
                        if (!modal.new_temp) {
                            modal.showComment();
                            modal.hideOffic();
                            $(".fui-navbar").show()
                        } else {
                            $(".detail-tab-panel .tab-panel[data-tab='tab4']").show().siblings().hide();
                            if (!$('.comment-block').attr('loaded')) {
                                $('.comment-block').attr('loaded', 1);
                                modal.getCommentList()
                            }
                        }
                    });
                    $('#comments-container').lazyload()
                };
                core.showImages('#comments-container .remark.img img')
            })
        }
        if (!modal.new_temp) {
            $('.basic-block').pullToLoading({
                onLoadingReady: function() {
                    $(".look-detail").html("<i class='icon icon-unfold'></i> <span>"+lang_js_biz_goods_detail_1+"</span>")
                },
                onLoading: function() {
                    $(".look-detail").html("<i class='icon icon-fold'></i> <span>"+lang_js_biz_goods_detail_2+"</span>");
                    $('.basic-block').pullToLoading('done');
                    modal.showDetail();
                    $('#tab .tab.active').removeClass('active');
                    $('#tab .tab:eq(1)').addClass('active')
                }
            })
        }
        if (typeof(window.cartcount) !== 'undefined') {
            picker.changeCartcount(window.cartcount)
        };
        core.showImages('.goods-swipe .fui-swipe-item img');
        $(".fui-cell-giftclick").click(function() {
            modal.giftPicker = new FoxUIModal({
                content: $('#gift-picker-modal').html(),
                extraClass: 'picker-modal',
                maskClick: function() {
                    modal.giftPicker.close()
                }
            });
            modal.giftPicker.container.find('.btn-danger').click(function() {
                modal.giftPicker.close()
            });
            modal.giftPicker.show();
            var giftid = $("#giftid").val();
            $(".gift-item").each(function() {
                if ($(this).val() == giftid) {
                    $(this).prop("checked", "true")
                }
            });
            $(".gift-item").on("click", function() {
                $.ajax({
                    url: core.getUrl('goods/detail/querygift', {
                        id: $(this).val()
                    }),
                    cache: true,
                    success: function(data) {
                        data = window.JSON.parse(data);
                        if (data.status > 0) {
                            $("#giftid").val(data.result.id);
                            $("#gifttitle").text(data.result.title)
                        }
                    }
                })
            })
        });
        $(".offic-list-tab a").off("click").on("click", function() {
            var _this = $(this);
            modal.officType = _this.attr("data-type");
            $(".offic-list-tab a").removeClass("active");
            _this.addClass("active");
            modal.getOfficList()
        });
        modal.officcode();
        $('.show-allshop-btn').click(function() {
            $(this).closest('.store-container').addClass('open')
        })
    };
    modal.wholesalePicker = function(action) {
        wholesalePicker.open({
            goodsid: modal.goodsid,
            total: modal.total,
            split: ';',
            action: action,
            optionid: '',
            showConfirm: true,
            autoClose: false,
            mustbind: modal.mustbind,
            backurl: modal.backurl,
            onConfirm: function(buyoptions) {
                require(['biz/member/cart'], function(cart) {
                    modal.buyoptions = buyoptions;
                    if (action == 'buy') {
                        if ($('.diyform-container').length > 0) {
                            var diyformdata = diyform.getData('.diyform-container');
                            if (!diyformdata) {
                                return
                            } else {
                                core.json('order/create/diyform', {
                                    id: modal.goodsid,
                                    diyformdata: diyformdata
                                }, function(ret) {
                                    $.router.load(core.getUrl('order/create', {
                                        id: modal.goodsid,
                                        iswholesale: 1,
                                        buyoptions: window.JSON.stringify(modal.buyoptions),
                                        gdid: ret.result.goods_data_id
                                    }), true)
                                }, true, true);
                                wholesalePicker.close()
                            }
                        } else {
                            wholesalePicker.close();
                            $.router.load(core.getUrl('order/create', {
                                id: modal.goodsid,
                                iswholesale: 1,
                                buyoptions: window.JSON.stringify(modal.buyoptions)
                            }), false)
                        }
                    } else if (action == 'cart') {
                        cart.addwholesale(modal.goodsid, modal.buyoptions, function(ret) {
                            $('.cart-item').find('.badge').html(ret.cartcount).removeClass('out').addClass('in');
                            window.cartcount = ret.cartcount
                        });
                        wholesalePicker.close()
                    } else {
                        wholesalePicker.close()
                    }
                })
            }
        })
    };
    modal.giftPicker = function() {
        modal.giftPicker = new FoxUIModal({
            content: $('#option-picker-modal').html(),
            extraClass: 'picker-modal',
            maskClick: function() {
                modal.packagePicker.close()
            }
        })
    };
    modal.getDetail = function() {
        if ($('.detail-block').find('.content-block').html() != '') {
            return
        }
        FoxUI.loader.show('mini');
        $.ajax({
            url: core.getUrl('goods/detail/get_detail', {
                id: modal.goodsid
            }),
            cache: true,
            success: function(html) {
                FoxUI.loader.hide();
                var detailHeight = $('.detail-block').css('height');
                $('.detail-block').find('.content-block').css('height', !modal.new_temp ? detailHeight : 'auto').html(html);
                setTimeout(function() {
                    $('.fui-content').lazyload();
                    $('.detail-block').find('.content-block').css('height', 'auto');
                    if (!modal.close_preview) {
                        core.showImages('.content-block img')
                    }
                    var $html = $(html).find('img');
                    if ($html.length > 0) {
                        for (var i = 0, len = $html.length; i < len; i++) {
                            $html[i].onerror = function() {
                                var $this = $(this);
                                var data_lazy = $this.attr('data-lazy');
                                if (!$this.attr('check-src') && (data_lazy.indexOf('http://') > -1 || data_lazy.indexOf('https://') > -1)) {
                                    var src = data_lazy.indexOf(modal.attachurl_local) == -1 ? data_lazy.replace(modal.attachurl_remote, modal.attachurl_local) : data_lazy.replace(modal.attachurl_local, modal.attachurl_remote);
                                    $this.attr('data-lazy', src);
                                    $this.attr('check-src', true)
                                }
                            }
                        }
                    }
                }, 1000);
                if (!modal.new_temp) {
                    $('.detail-block').pullToRefresh({
                        onRefreshReady: function() {
                            $(".look-basic").html("<i class='icon icon-fold'></i> <span>"+lang_js_biz_goods_detail_3+"</span>")
                        },
                        onRefresh: function() {
                            $(".look-basic").html("<i class='icon icon-unfold'></i> <span>"+lang_js_biz_goods_detail_4+"</span>");
                            $('.basic-block').show();
                            $('.detail-block').removeClass('in').pullToRefresh('done');
                            $('#tab .tab.active').removeClass('active');
                            $('#tab .tab:first-child').addClass('active')
                        }
                    })
                }
            }
        })
    };
    modal.showDetail = function() {
        $('.basic-block').hide();
        modal.getDetail();
        $('.detail-block').transition(300).addClass('in').transitionEnd(function() {
            $('.detail-block').transition('')
        })
    };
    modal.hideDetail = function() {
        $('.basic-block').show();
        $('.detail-block').transition(300).removeClass('in').transitionEnd(function() {
            $('.detail-block').transition('')
        })
    };
    modal.showParams = function() {
        $('.param-block').show().addClass('in')
    };
    modal.hideParams = function() {
        $('.param-block').removeClass('in')
    };
    modal.optionPicker = function(action) {
        picker.open({
            goodsid: modal.goodsid,
            total: modal.total,
            split: ';',
            action: action,
            optionid: modal.optionid,
            showConfirm: true,
            autoClose: true,
            mustbind: modal.mustbind,
            backurl: modal.backurl,
            liveid: modal.liveid,
            onConfirm: function(total, optionid, optiontitle) {

                require(['biz/member/cart'], function(cart) {
                    modal.total = total;
                    modal.optionid = optionid;
                    $('.option-selector').html(lang_js_biz_goods_detail_5+": "+lang_js_biz_goods_detail_6+"x" + total + " " + optiontitle);
                    if (action == 'buy') {
                        var giftid = $("#giftid").val();
                        if ($("#giftid") && giftid == '') {
                            FoxUI.alert(lang_js_biz_goods_detail_7+"！");
                            $(".picker-modal").remove()
                        } else {
                            if ($('.diyform-container').length > 0) {
                                var diyformdata = diyform.getData('.diyform-container');
                                if (!diyformdata) {
                                    return
                                } else {
                                    core.json('order/create/diyform', {
                                        id: modal.goodsid,
                                        diyformdata: diyformdata
                                    }, function(ret) {
                                        $.router.load(core.getUrl('order/create', {
                                            id: modal.goodsid,
                                            optionid: modal.optionid,
                                            total: modal.total,
                                            gdid: ret.result.goods_data_id,
                                            giftid: giftid,
                                            liveid: modal.liveid
                                        }), true)
                                    }, true, true);
                                    picker.close()
                                }
                            } else {
                                picker.close();
                                $.router.load(core.getUrl('order/create', {
                                    id: modal.goodsid,
                                    optionid: modal.optionid,
                                    total: modal.total,
                                    giftid: giftid,
                                    liveid: modal.liveid
                                }), false)
                            }
                        }
                    } else if (action == 'cart') {
                        if ($('.diyform-container').length > 0) {
                            var diyformdata = diyform.getData('.diyform-container');
                            if (!diyformdata) {
                                return
                            } else {
                                core.json('order/create/diyform', {
                                    id: modal.goodsid,
                                    diyformdata: diyformdata
                                }, function(ret) {
                                    cart.add(modal.goodsid, modal.optionid, modal.total, diyformdata, function(ret) {
                                        $('.cart-item').find('.badge').html(ret.cartcount).removeClass('out').addClass('in');
                                        window.cartcount = ret.cartcount;
                                        picker.changeCartcount(cartcount);
                                        FoxUI.toast.show(lang_js_biz_goods_detail_8)
                                    })
                                }, true, true);
                                picker.close()
                            }
                        } else {
                            cart.add(modal.goodsid, modal.optionid, modal.total, false, function(ret) {
                                $('.cart-item').find('.badge').html(ret.cartcount).removeClass('out').addClass('in');
                                window.cartcount = ret.cartcount;
                                picker.changeCartcount(cartcount);
                                FoxUI.toast.show(lang_js_biz_goods_detail_9)
                            });
                            picker.close()
                        }
                    } else {
                        picker.close()
                    }
                })
            }
        })
    };
    modal.showComment = function() {
        $('.comment-block').show().addClass('in').transitionEnd(function() {
            if (!$('.comment-block').attr('loaded')) {
                $('.comment-block').attr('loaded', 1);
                modal.getCommentList()
            }
        })
    };
    modal.showOffic = function() {
        $('.offic-block').show().addClass('in').transitionEnd(function() {
            if (!$('.offic-block').attr('loaded')) {
                $('.offic-block').attr('loaded', 1);
                modal.getOfficList()
            }
        });
        $(".offic-goods-edit").show();
        $(".fui-navbar").hide();
        $(".look-basic").hide()
    };
    modal.hideOffic = function() {
        $('.offic-block').removeClass('in');
        $(".offic-goods-edit").hide()
    };
    modal.hideComment = function() {
        $('.comment-block').removeClass('in')
    };
    modal.initComment = function() {
        modal.commentPage = 1;
        modal.commentLevel = '';
        modal.commentCount = 1;
        $('.fui-content').infinite({
            onLoading: function() {
                modal.getCommentList()
            }
        });
        if (modal.commentPage == 1) {
            modal.getCommentList()
        }
    };
    modal.getCommentList = function() {
        $('#comments-list-container .content-empty').hide();
        $('#comments-list-container .infinite-loading').show();
        core.json('goods/detail/get_comment_list', {
            id: modal.goodsid,
            page: modal.commentPage,
            level: modal.commentLevel,
            getcount: modal.commentCount
        }, function(ret) {
            var result = ret.result;
            if (result.total <= 0) {
                $('#comments-list-container .container').html('').hide();
                $('#comments-list-container .content-empty').show();
                $('#comments-list-container').infinite('stop')
            } else {
                $('#comments-list-container .container').show();
                $('#comments-list-container .content-empty').hide();
                $('#comments-list-container').infinite('init');
                if (result.list.length <= 0 || result.list.length < result.pagesize) {
                    $('#comments-list-container').infinite('stop')
                }
            }
            modal.commentCount = 0;
            modal.commentPage++;
            core.tpl('#comments-list-container .container', 'tpl_goods_detail_comments_list', result, modal.commentPage > 1);
            $('#comments-list-container .fui-icon-group .fui-icon-col').unbind('click').click(function() {
                $('#comments-list-container .fui-icon-group .fui-icon-col span.text-danger').removeClass('text-danger');
                $(this).find('span').addClass('text-danger');
                modal.commentPage = 1;
                modal.commentCount = 1;
                modal.commentLevel = $(this).data('level');
                $('#comments-list-container .container').html('');
                modal.getCommentList()
            });
            core.showImages('#comments-all .remark.img img')
        }, false)
    };
    modal.getOfficList = function() {
        $('#offic-list-container .content-empty').hide();
        $('#offic-list-container .infinite-loading').show();
        core.json('goods/detail/get_offic_list', {
            id: modal.goodsid,
            page: modal.officPage,
            type: modal.officType
        }, function(ret) {
            var result = ret.result;
            if (result.total <= 0) {
                $('#offic-list-container .container').html('').hide();
                $('#offic-list-container .content-empty').show();
                $('#offic-list-container').infinite('stop')
            } else {
                $('#offic-list-container .container').show();
                $('#offic-list-container .content-empty').hide();
                $('#offic-list-container').infinite('init');
                if (result.officlist.length <= 0 || result.officlist.length < result.pagesize) {
                    $('#offic-list-container').infinite('stop')
                }
            }
            modal.officPage++;
            core.tpl('#offic-list-container .cantainer', 'tpl_offic_find_list', result, modal.officPage > 1);
            core.showImages('.find-list-content-images a img');
            modal.officcode();
            $(".offic-download").off("click").on("click", function() {
                modal.pickerDown = new FoxUIModal({
                    content: $('#picker-download-modal').html(),
                    extraClass: 'picker-modal',
                    maskClick: function() {
                        modal.pickerDown.close()
                    }
                });
                modal.pickerDown.container.find('.btn-default').click(function() {
                    modal.pickerDown.close()
                });
                modal.pickerDown.show()
            });
            $('#offic-mask').off("click").on("click", function() {
                $("#offic-picker").hide()
            })
        }, false)
    };
    modal.officcode = function() {
        $('.offic-qrcode').off("click").on("click", function() {
            modal.pickerCode = new FoxUIModal({
                content: $('#picker-qrcode-modal').html(),
                extraClass: 'picker-modal',
                maskClick: function() {
                    modal.pickerCode.close()
                }
            });
            modal.pickerCode.container.find('.btn-default').click(function() {
                modal.pickerCode.close()
            });
            modal.pickerCode.show();
            $(".offic-cell-code").off("click").on("click", function() {
                modal.pickerCode.close();
                $("#alert-picker").show();
                $(".alert-content").show()
            })
        })
    };
    modal.formatSeconds = function(value) {
        var theTime = parseInt(value);
        var theTime1 = 0;
        var theTime2 = 0;
        if (theTime > 60) {
            theTime1 = parseInt(theTime / 60);
            theTime = parseInt(theTime % 60);
            if (theTime1 > 60) {
                theTime2 = parseInt(theTime1 / 60);
                theTime1 = parseInt(theTime1 % 60)
            }
        }
        return {
            'hour': theTime2 < 10 ? '0' + theTime2 : theTime2,
            'min': theTime1 < 10 ? '0' + theTime1 : theTime1,
            'sec': theTime < 10 ? '0' + theTime : theTime
        }
    };
    modal.initSeckill = function() {
        var container = $('.seckill-container'),
            starttime = container.data('starttime'),
            endtime = container.data('endtime'),
            status = container.data('status') || 0;
        $.ajax({
            url: '../addons/ewei_shopv2/map.json',
            complete: function(x) {
                currenttime = +parseInt(new Date() / 1000);
                if (status == 0) {
                    modal.lasttime = endtime - currenttime
                } else {
                    modal.lasttime = starttime - currenttime
                }
                clearInterval(modal.timer);
                modal.setSeckillTimer();
                modal.timer = modal.setSeckillTimerInterval()
            }
        })
    };
    modal.setSeckillTimer = function() {
        if (modal.lasttime % 10 == 0) {
            var container = $('.seckill-container'),
                starttime = container.data('starttime'),
                endtime = container.data('endtime'),
                status = container.data('status') || 0;
            $.ajax({
                url: '../addons/ewei_shopv2/map.json',
                cache: false,
                complete: function(x) {
                    currenttime = +parseInt(new Date() / 1000);
                    if (status == 0) {
                        modal.lasttime = endtime - currenttime
                    } else {
                        modal.lasttime = starttime - currenttime
                    }
                }
            })
        }
        modal.lasttime -= 1;
        var times = modal.formatSeconds(modal.lasttime);
        var obj = $('.seckill-container');
        obj.find('.time-hour').html(times.hour);
        obj.find('.time-min').html(times.min);
        obj.find('.time-sec').html(times.sec);
        if (modal.lasttime <= 0) {
            location.reload()
        }
    };
    modal.setSeckillTimerInterval = function() {
        return setInterval(function() {
            modal.setSeckillTimer()
        }, 1000)
    };
    return modal
});