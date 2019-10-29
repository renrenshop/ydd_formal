define(['core', 'foxui.picker', 'jquery.gcjs'], function(core) {
    var modal = {
        backurl: '',
        nohasbindinfo: 1,
        bindrealname: 0,
        bindbirthday: 0,
        bindidnumber: 0,
        bindwechat: 0
    };
    modal.initLogin = function(params) {
        modal.backurl = params.backurl;
        $('#btnSubmit').click(function() {
            if ($('#btnSubmit').attr('stop')) {
                return
            }
            if (!$('#mobile').isMobile()) {
                FoxUI.toast.show(lang_js_biz_member_account_14+'11'+lang_js_biz_member_account_23);
                return
            }
            if ($('#pwd').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_member_account_16);
                return
            }
            $('#btnSubmit').html(lang_js_biz_member_account_3+'...').attr('stop', 1);
            core.json('account/login', {
                mobile: $('#mobile').val(),
                pwd: $('#pwd').val()
            }, function(ret) {
                FoxUI.toast.show(ret.result.message);
                if (ret.status != 1) {
                    $('#btnSubmit').html(lang_js_biz_member_account_3).removeAttr('stop');
                    return
                } else {
                    $('#btnSubmit').html(lang_js_biz_member_account_5+'...')
                }
                setTimeout(function() {
                    if (modal.backurl) {
                        location.href = modal.backurl;
                        return
                    }
                    location.href = core.getUrl('')
                }, 1000)
            }, false, true)
        })
    };
    modal.verifycode = function() {
        modal.seconds--;
        if (modal.seconds > 0) {
            $('#btnCode').html(modal.seconds + lang_js_biz_member_account_6).addClass('disabled').attr('disabled', 'disabled');
            setTimeout(function() {
                modal.verifycode()
            }, 1000)
        } else {
            $('#btnCode').html(lang_js_biz_member_account_7).removeClass('disabled').removeAttr('disabled')
        }
    };
    modal.initRf = function(params) {
        modal.backurl = params.backurl;
        modal.type = params.type;
        modal.endtime = params.endtime;
        modal.imgcode = params.imgcode;
        if (modal.endtime > 0) {
            modal.seconds = modal.endtime;
            modal.verifycode()
        }
        $('#btnCode').click(function() {
            if ($('#btnCode').hasClass('disabled')) {
                return
            }
            if (!$('#mobile').isMobile()) {
                FoxUI.toast.show(lang_js_biz_member_account_0+'10'+lang_js_biz_member_account_1);
                return
            }
            if (!$.trim($('#verifycode2').val()) && modal.imgcode == 1) {
                FoxUI.toast.show(lang_js_biz_member_account_10);
                return
            }
            modal.seconds = 60;
            core.json('account/verifycode', {
                mobile: $('#mobile').val(),
                imgcode: $.trim($('#verifycode2').val()) || 0,
                temp: !modal.type ? "sms_reg" : "sms_forget"
            }, function(ret) {
                FoxUI.toast.show(ret.result.message);
                if (ret.status != 1) {
                    $('#btnCode').html(lang_js_biz_member_account_7).removeClass('disabled').removeAttr('disabled')
                }
                if (ret.status == -1 && modal.imgcode == 1) {
                    $("#btnCode2").trigger('click')
                }
                if (ret.status == 1) {
                    modal.verifycode()
                }
            }, false, true)
        });
        $("#btnCode2").click(function() {
            $(this).prop('src', '../web/index.php?c=utility&a=code&r=' + Math.round(new Date().getTime()));
            return false
        });
        $('#btnSubmit').click(function() {
            if ($('#btnSubmit').attr('stop')) {
                return
            }
            if (!$('#mobile').isMobile()) {
                FoxUI.toast.show(lang_js_biz_member_account_8+'10'+lang_js_biz_member_account_9);
                return
            }
            if (!$('#verifycode').isInt() || $('#verifycode').len() != 5) {
                FoxUI.toast.show(lang_js_biz_member_account_8+'5'+lang_js_biz_member_account_15);
                return
            }
            if ($('#pwd').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_member_account_2);
                return
            }
            if ($('#pwd1').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_member_account_17);
                return
            }
            if ($('#pwd').val() !== $('#pwd1').val()) {
                FoxUI.toast.show(lang_js_biz_member_account_32);
                return
            }
            $('#btnSubmit').html(lang_js_biz_member_address_16+'...').attr('stop', 1);
            var url = !modal.type ? "account/register" : "account/forget";
            core.json(url, {
                mobile: $('#mobile').val(),
                verifycode: $('#verifycode').val(),
                pwd: $('#pwd').val()
            }, function(ret) {
                if (ret.status != 1) {
                    FoxUI.toast.show(ret.result.message);
                    var text = modal.type ? lang_js_biz_member_account_20 : lang_js_biz_member_account_21;
                    $('#btnSubmit').html(text).removeAttr('stop');
                    return
                } else {
                    FoxUI.alert(ret.result.message, '', function() {
                        if (modal.backurl) {
                            location.href = core.getUrl('account/login', {
                                mobile: $('#mobile').val(),
                                backurl: modal.backurl
                            })
                        } else {
                            location.href = core.getUrl('account/login', {
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
        modal.imgcode = params.imgcode || 0;
        if (modal.endtime > 0) {
            modal.seconds = modal.endtime;
            modal.verifycode()
        }
        $('#btnCode').click(function() {
            if ($('#btnCode').hasClass('disabled')) {
                return
            }
            if (!$('#mobile').isMobile()) {
                FoxUI.toast.show(lang_js_biz_member_account_12+'9/10'+lang_js_biz_member_account_13);
                return
            }
            if (!$.trim($('#verifycode2').val()) && modal.imgcode == 1) {
                FoxUI.toast.show(lang_js_biz_member_account_24);
                return
            }
            modal.seconds = 60;
            core.json('account/verifycode', {
                mobile: $('#mobile').val(),
                temp: 'sms_bind',
                imgcode: $.trim($('#verifycode2').val()) || 0
            }, function(ret) {
                if (ret.status != 1) {
                    FoxUI.toast.show(ret.result.message);
                    $('#btnCode').html(lang_js_biz_member_account_25).removeClass('disabled').removeAttr('disabled')
                }
                if (ret.status == 1) {
                    modal.verifycode()
                }
            }, false, true)
        });
        $('#btnSubmit').click(function() {
            if ($('#btnSubmit').attr('stop')) {
                return
            }
            if (!$('#mobile').isMobile()) {
                FoxUI.toast.show(lang_js_biz_member_account_26+'10'+lang_js_biz_member_account_27);
                return
            }
            if (!$('#verifycode').isInt() || $('#verifycode').len() != 5) {
                FoxUI.toast.show(lang_js_biz_member_account_28+'5'+lang_js_biz_member_account_29);
                return
            }
            if ($('#pwd').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_member_account_30);
                return
            }
            if ($('#pwd1').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_member_account_31);
                return
            }
            if ($('#pwd').val() !== $('#pwd1').val()) {
                FoxUI.toast.show(lang_js_biz_member_account_50);
                return
            }
            $('#btnSubmit').html(lang_js_biz_member_account_33+'...').attr('stop', 1);
            core.json('member/bind', {
                mobile: $('#mobile').val(),
                verifycode: $('#verifycode').val(),
                pwd: $('#pwd').val()
            }, function(ret) {
                if (ret.status == 0) {
                    FoxUI.toast.show(ret.result.message);
                    $('#btnSubmit').html(lang_js_biz_member_account_34).removeAttr('stop');
                    return
                }
                if (ret.status < 0) {
                    FoxUI.confirm(ret.result.message, lang_js_biz_member_account_35, function() {
                        core.json('member/bind', {
                            mobile: $('#mobile').val(),
                            verifycode: $('#verifycode').val(),
                            pwd: $('#pwd').val(),
                            confirm: 1
                        }, function(ret) {
                            if (ret.status == 1) {
                                FoxUI.alert(lang_js_biz_member_account_36+'!', '', function() {
                                    location.href = params.backurl ? atob(params.backurl) : core.getUrl('member')
                                });
                                return
                            }
                            FoxUI.toast.show(ret.result.message);
                            $('#btnSubmit').html(lang_js_biz_member_account_37).removeAttr('stop');
                            return
                        }, true, true)
                    }, function() {
                        $('#btnSubmit').html(lang_js_biz_member_account_38).removeAttr('stop')
                    });
                    return
                }
                FoxUI.alert(lang_js_biz_member_account_39+'!', '', function() {
                    location.href = params.backurl ? atob(params.backurl) : core.getUrl('member')
                })
            }, true, true)
        });
        $("#btnCode2").click(function() {
            $(this).prop('src', '../web/index.php?c=utility&a=code&r=' + Math.round(new Date().getTime()));
            return false
        })
    };
    modal.initChange = function(params) {
        modal.endtime = params.endtime;
        modal.imgcode = params.imgcode;
        if (modal.endtime > 0) {
            modal.seconds = modal.endtime;
            modal.verifycode()
        }
        $('#btnCode').click(function() {
            if ($('#btnCode').hasClass('disabled')) {
                return
            }
            if (!$('#mobile').isMobile()) {
                FoxUI.toast.show(lang_js_biz_member_account_40+'10'+lang_js_biz_member_account_41);
                return
            }
            if (!$.trim($('#verifycode2').val()) && modal.imgcode == 1) {
                FoxUI.toast.show(lang_js_biz_member_account_42);
                return
            }
            modal.seconds = 60;
            core.json('account/verifycode', {
                mobile: $('#mobile').val(),
                temp: 'sms_changepwd',
                imgcode: $.trim($('#verifycode2').val()) || 0
            }, function(ret) {
                if (ret.status != 1) {
                    FoxUI.toast.show(ret.result.message);
                    $('#btnCode').html(lang_js_biz_member_account_43).removeClass('disabled').removeAttr('disabled')
                }
                if (ret.status == 1) {
                    modal.verifycode()
                }
            }, false, true)
        });
        $('#btnSubmit').click(function() {
            if ($('#btnSubmit').attr('stop')) {
                return
            }
            if (!$('#mobile').isMobile()) {
                FoxUI.toast.show(lang_js_biz_member_account_44+'10'+lang_js_biz_member_account_45);
                return
            }
            if (!$('#verifycode').isInt() || $('#verifycode').len() != 5) {
                FoxUI.toast.show(lang_js_biz_member_account_46+'5'+lang_js_biz_member_account_47);
                return
            }
            if ($('#pwd').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_member_account_48);
                return
            }
            if ($('#pwd1').isEmpty()) {
                FoxUI.toast.show(lang_js_biz_member_account_49);
                return
            }
            if ($('#pwd').val() !== $('#pwd1').val()) {
                FoxUI.toast.show(lang_js_biz_member_account_50);
                return
            }
            $('#btnSubmit').html(lang_js_biz_member_account_51+'...').attr('stop', 1);
            core.json('member/changepwd', {
                mobile: $('#mobile').val(),
                verifycode: $('#verifycode').val(),
                pwd: $('#pwd').val()
            }, function(ret) {
                if (ret.status != 1) {
                    FoxUI.toast.show(ret.result.message);
                    $('#btnSubmit').html(lang_js_biz_member_account_52).removeAttr('stop');
                    return
                }
                FoxUI.alert(lang_js_biz_member_account_53, '', function() {
                    location.href = core.getUrl('member')
                })
            }, false, true)
        });
        $("#btnCode2").click(function() {
            $(this).prop('src', '../web/index.php?c=utility&a=code&r=' + Math.round(new Date().getTime()));
            return false
        })
    };
    modal.initQuick = function(params) {
        var obj = $('#account-layer');
        var text = {
            login: '登录',
            bind: '为了您能及时接收到物流信息<br>请绑定手机号后购买',
            reg: '注册',
            pass: '填写个人信息'
        };
        var passText = {
            login: '请输入密码',
            bind: '请设置登录密码',
            reg: '请设置登录密码'
        };
        var container = new FoxUIModal({
            content: obj.html(),
            extraClass: "popup-modal"
        });
        $('.account-close', container.container).unbind('click').click(function() {
            container.close()
        });
        $('.account-layer', container.container).addClass(params.action);
        var title = params.action == 'bind' ? text.bind : text.login;
        $('.account-title', container.container).html(title);
        $('.input-password', container.container).attr('placeholder', params.action == 'bind' ? passText.bind : passText.login);
        if (params.endtime > 0) {
            modal.seconds = params.endtime;
            modal.verifycode()
        } else {
            $('#btnCode').removeClass('disabled')
        }
        if (params.imgcode == 1) {
            $('.account-layer', container.container).addClass('imgcode')
        }
        if (params.action == 'bind') {
            core.json('member/bind/getbindinfo', {}, function(ret) {
                modal.nohasbindinfo = ret.result.nohasbindinfo;
                modal.bindrealname = ret.result.bindrealname;
                modal.bindbirthday = ret.result.bindbirthday;
                modal.bindidnumber = ret.result.bindidnumber;
                modal.bindwechat = ret.result.bindwechat;
                $('.input-password', container.container).show();
                if (modal.nohasbindinfo == 1) {
                    $('.account-next', container.container).hide();
                    $('.account-btn', container.container).show();
                    $('.account-btn', container.container).text('绑定')
                }
                container.show()
            }, false, false)
        } else {
            container.show()
        }
        $('.account-btn', container.container).unbind('click').click(function() {
            var _this = $(this);
            if (_this.attr('stop')) {
                FoxUI.toast.show(lang_js_biz_sale_coupon_couponpicker_0+'...');
                return
            }
            var mobile = $.trim($('.input-mobile', container.container).val());
            if (!mobile || mobile == '') {
                FoxUI.toast.show(lang_js_biz_member_address_12);
                return
            }
            if (!$.isMobile(mobile)) {
                FoxUI.toast.show(lang_js_biz_member_address_13);
                return
            }
            if (params.action == 'login') {
                var password = $.trim($('.input-password', container.container).val());
                if (!password || password == '') {
                    FoxUI.toast.show('请填写密码');
                    return
                }
                _this.text('登录中...').attr('stop', 1);
                core.json('account/login', {
                    mobile: mobile,
                    pwd: password
                }, function(ret) {
                    if (ret.status != 1) {
                        FoxUI.toast.show(ret.result.message);
                        _this.text('登录').removeAttr('stop');
                        return
                    }
                    container.close();
                    FoxUI.loader.show('登录成功', 'icon icon-check');
                    setTimeout(function() {
                        FoxUI.loader.hide();
                        if (params.success) {
                            params.success()
                        }
                    }, 500)
                }, false, true)
            } else if (params.action == 'bind') {
                var verifycode = $.trim($('.input-verify', container.container).val());
                if (!verifycode || verifycode == '') {
                    FoxUI.toast.show('请填写验证码');
                    return
                }
                if (!modal.codeLen(verifycode)) {
                    FoxUI.toast.show('请填写5位验证码');
                    return
                }
                var password = $.trim($('.input-password', container.container).val());
                if (!password || password == '') {
                    FoxUI.toast.show('请填写密码');
                    return
                }
                if (!modal.strLen(password)) {
                    FoxUI.toast.show('密码至少6位');
                    return
                }
                var bindrealname = "";
                var birthyear = 0;
                var birthmonth = 0;
                var birthday = 0;
                var bindidnumber = "";
                var bindwechat = "";
                if (modal.bindrealname == 1) {
                    bindrealname = $.trim($('.input-bindrealname', container.container).val());
                    if (!bindrealname || bindrealname == '') {
                        FoxUI.toast.show('请填写真实姓名');
                        return
                    }
                }
                if (modal.bindbirthday == 1) {
                    var birthday = $.trim($('.input-bindbirthday', container.container).val());
                    if (birthday != undefined && birthday != '') {
                        var birthday = birthday.split('-');
                        birthyear = birthday[0];
                        birthmonth = birthday[1];
                        birthday = birthday[2]
                    } else {
                        FoxUI.toast.show('请选择出生日期');
                        return
                    }
                }
                if (modal.bindidnumber == 1) {
                    bindidnumber = $.trim($('.input-bindidnumber', container.container).val());
                    if (!bindidnumber || bindidnumber == '' || !$('.input-bindidnumber', container.container).isIDCard()) {
                        FoxUI.toast.show('请填写正确身份证号码');
                        return
                    }
                }
                if (modal.bindwechat == 1) {
                    bindwechat = $.trim($('.input-bindwechat', container.container).val());
                    if (!bindwechat || bindwechat == '') {
                        FoxUI.toast.show('请填写微信号');
                        return
                    }
                }
                _this.text('绑定中...').attr('stop', 1);
                core.json('member/bind', {
                    mobile: mobile,
                    verifycode: verifycode,
                    pwd: password,
                    realname: bindrealname,
                    birthyear: birthyear,
                    birthmonth: birthmonth,
                    birthday: birthday,
                    idnumber: bindidnumber,
                    bindwechat: bindwechat
                }, function(ret) {
                    if (ret.status == 0) {
                        if (ret.result.message == '验证码错误或已过期') {
                            $('.account-tip span', container.container).click()
                        }
                        FoxUI.toast.show(ret.result.message);
                        _this.html('绑定').removeAttr('stop');
                        return
                    } else if (ret.status < 0) {
                        container.container.hide();
                        FoxUI.confirm(ret.result.message, "注意", function() {
                            core.json('member/bind', {
                                mobile: mobile,
                                verifycode: verifycode,
                                pwd: password,
                                confirm: 1,
                                realname: bindrealname,
                                birthyear: birthyear,
                                birthmonth: birthmonth,
                                birthday: birthday,
                                idnumber: bindidnumber,
                                bindwechat: bindwechat
                            }, function(ret) {
                                if (ret.status == 1) {
                                    container.close();
                                    FoxUI.loader.show('绑定成功', 'icon icon-check');
                                    setTimeout(function() {
                                        FoxUI.loader.hide();
                                        if (params.success) {
                                            params.success()
                                        }
                                    }, 500);
                                    return
                                }
                                FoxUI.toast.show(ret.result.message);
                                _this.html('绑定').removeAttr('stop');
                                return
                            }, true, true)
                        }, function() {
                            _this.html('绑定').removeAttr('stop');
                            container.container.show();
                            $('.fui-mask').remove();
                            FoxUI.mask.show()
                        });
                        return
                    }
                    container.close();
                    FoxUI.loader.show('绑定成功', 'icon icon-check');
                    setTimeout(function() {
                        FoxUI.loader.hide();
                        if (params.success) {
                            params.success()
                        }
                    }, 500)
                }, false, true)
            } else if (params.action == 'reg') {
                var verifycode = $.trim($('.input-verify', container.container).val());
                if (!verifycode || verifycode == '') {
                    FoxUI.toast.show('请填写验证码');
                    return
                }
                if (!modal.codeLen(verifycode)) {
                    FoxUI.toast.show('请填写5位验证码');
                    return
                }
                var password = $.trim($('.input-password', container.container).val());
                if (!password || password == '') {
                    FoxUI.toast.show('请填写密码');
                    return
                }
                if (!modal.strLen(password)) {
                    FoxUI.toast.show('密码至少6位');
                    return
                }
                var password2 = $.trim($('.input-password2', container.container).val());
                if (!password2 || password2 == '') {
                    FoxUI.toast.show('请重复填写密码');
                    return
                }
                if (password != password2) {
                    FoxUI.toast.show('两次输入的密码不一致');
                    return
                }
                _this.text('注册中...').attr('stop', 1);
                core.json('account/register', {
                    mobile: mobile,
                    verifycode: verifycode,
                    pwd: password
                }, function(ret) {
                    if (ret.status != 1) {
                        FoxUI.toast.show(ret.result.message);
                        _this.text('注册').removeAttr('stop');
                        if (ret.result.message == '验证码错误或已过期') {
                            $('.account-layer', container.container).removeClass('reg-next').addClass('reg')
                        }
                        return
                    } else {
                        FoxUI.toast.show('注册成功，请登录');
                        $('.account-layer', container.container).removeClass('reg-next').addClass('login');
                        params.action = 'login';
                        $('.input-password', container.container).attr('placeholder', passText.login);
                        _this.text('登录').removeAttr('stop')
                    }
                }, false, true)
            }
        });
        $('.btn-send', container.container).unbind('click').click(function() {
            var _this = $(this);
            if (_this.hasClass('disabled')) {
                return
            }
            var mobile = $.trim($('.input-mobile', container.container).val());
            if (!mobile || mobile == '') {
                FoxUI.toast.show('请填写手机号');
                return
            }
            var imgcode = 0;
            if (params.imgcode == 1) {
                var imgcode = $.trim($('.input-image', container.container).val());
                if (!imgcode || imgcode == '') {
                    FoxUI.toast.show('请填写图形验证码');
                    return
                }
                if (!modal.codeLen(imgcode, true)) {
                    FoxUI.toast.show('请填写4位图形验证码');
                    return
                }
            }
            modal.seconds = 60;
            core.json('account/verifycode', {
                mobile: mobile,
                temp: params.action == 'bind' ? 'sms_bind' : 'sms_reg',
                imgcode: imgcode
            }, function(ret) {
                if (ret.status != 1) {
                    FoxUI.toast.show(ret.result.message);
                    _this.html('发送验证码').removeClass('disabled');
                    if (ret.result.message == '此手机号已注册，请直接登录') {
                        $('.account-layer', container.container).removeClass('reg').addClass('login');
                        params.action = 'login';
                        $('.account-btn', container.container).text('登录').removeAttr('stop');
                        $('.account-title', container.container).html(text.login);
                        $('.input-password', container.container).attr('placeholder', passText.login)
                    }
                }
                if (ret.status == 1) {
                    FoxUI.toast.show('发送成功');
                    modal.verifycode()
                }
            }, false, true)
        });
        $('.account-next', container.container).unbind('click').click(function() {
            var _this = $(this);
            if (_this.attr('stop')) {
                FoxUI.toast.show('操作中...');
                return
            }
            var mobile = $.trim($('.input-mobile', container.container).val());
            if (!mobile || mobile == '') {
                FoxUI.toast.show('请填写手机号');
                return
            }
            if (!$.isMobile(mobile)) {
                FoxUI.toast.show('请填写正确手机号');
                return
            }
            var imgcode = 0;
            if (params.imgcode == 1) {
                imgcode = $.trim($('.input-image', container.container).val());
                if (!imgcode || imgcode == '') {
                    FoxUI.toast.show('请填写图形验证码');
                    return
                }
                if (!modal.codeLen(imgcode, true)) {
                    FoxUI.toast.show('请填写4位图形验证码');
                    return
                }
            }
            var verifycode = $.trim($('.input-verify', container.container).val());
            if (!verifycode || verifycode == '') {
                FoxUI.toast.show('请填写短信验证码');
                return
            }
            if (!modal.codeLen(verifycode)) {
                FoxUI.toast.show('请填写5位短信验证码');
                return
            }
            if (params.action == 'bind') {
                var password = $.trim($('.input-password', container.container).val());
                if (!password || password == '') {
                    FoxUI.toast.show('请填写密码');
                    return
                }
                if (!modal.strLen(password)) {
                    FoxUI.toast.show('密码至少6位');
                    return
                }
                if (modal.bindrealname == 1) {
                    $('.input-bindrealname', container.container).show()
                }
                if (modal.bindbirthday == 1) {
                    $('.input-bindbirthday', container.container).show();
                    $('.input-bindbirthday', container.container).datePicker()
                }
                if (modal.bindidnumber == 1) {
                    $('.input-bindidnumber', container.container).show()
                }
                if (modal.bindwechat == 1) {
                    $('.input-bindwechat', container.container).show()
                }
                $('.input-password', container.container).hide();
                $('.account-layer', container.container).removeClass('bind').addClass('bind-next');
                $('.account-title', container.container).html(text.pass);
                $('.account-btn', container.container).text('绑定')
            } else if (params.action == 'reg') {
                $('.account-layer', container.container).removeClass('reg').addClass('reg-next');
                $('.account-title', container.container).html(text.pass);
                $('.account-btn', container.container).text('注册')
            }
        });
        $('.account-tip span', container.container).unbind('click').click(function() {
            if (params.action == 'login') {
                $('.account-title', container.container).html(text.reg);
                $('.account-layer', container.container).removeClass('login').addClass('reg');
                $('.input-password', container.container).attr('placeholder', passText.reg);
                params.action = 'reg'
            }
        });
        $('.account-back', container.container).unbind('click').click(function() {
            var obj = $('.account-layer', container.container);
            if (obj.hasClass('reg-next')) {
                $('.account-layer', container.container).removeClass('reg-next').addClass('reg');
                $('.account-title', container.container).html(text.reg)
            } else if (obj.hasClass('reg')) {
                $('.account-layer', container.container).removeClass('reg').addClass('login');
                $('.account-title', container.container).html(text.login);
                $('.input-password', container.container).attr('placeholder', passText.login);
                params.action = 'login'
            } else if (obj.hasClass('bind-next')) {
                $('.account-layer', container.container).removeClass('bind-next').addClass('bind');
                $('.account-title', container.container).html(text.bind);
                $('.input-password', container.container).show();
                $('.input-bindrealname', container.container).hide();
                $('.input-bindbirthday', container.container).hide();
                $('.input-bindidnumber', container.container).hide();
                $('.input-bindwechat', container.container).hide()
            }
        });
        $('.btn-image', container.container).unbind('click').click(function() {
            $(this).prop('src', '../web/index.php?c=utility&a=code&r=' + Math.round(new Date().getTime()));
            return false
        })
    };
    modal.codeLen = function(code, img) {
        if (img) {
            return $.trim(code) !== '' && /^\d{4}$/.test($.trim(code))
        }
        return $.trim(code) !== '' && /^\d{5}$/.test($.trim(code))
    };
    modal.strLen = function(str) {
        return $.trim(str) !== '' && /^.{6,}$/.test($.trim(str))
    };
    return modal
});