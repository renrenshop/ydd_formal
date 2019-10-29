(function($) {
	$.fn.scrolld = function(options) {
		var scrolldCustom = 1;
		var scrolldNavBar = '';
		var scrolldMobileNavBar = '';
		var $win = $(window);
		var doc = document;
		var y = $win.scrollTop();
		var h = $win.height();
		var x = $win.width();
		var htmlBody = $("html, body");
		classList = [];
		$win.scroll(function(a) {
			y = $win.scrollTop();
			a.stopImmediatePropagation();
			return false
		});
		$win.resize(function(a) {
			h = $win.height();
			x = $win.width();
			a.stopImmediatePropagation();
			return false
		});
		jQuery.easing.jswing = jQuery.easing.swing;
		jQuery.extend(jQuery.easing, {
			def: "easeOutQuad",
			swing: function(e, f, a, i, g) {
				return jQuery.easing[jQuery.easing.def](e, f, a, i, g)
			},
			easeInQuad: function(e, f, a, i, g) {
				return i * (f /= g) * f + a
			},
			easeOutQuad: function(e, f, a, i, g) {
				return -i * (f /= g) * (f - 2) + a
			},
			easeInOutQuad: function(e, f, a, i, g) {
				if ((f /= g / 2) < 1) {
					return i / 2 * f * f + a
				}
				return -i / 2 * ((--f) * (f - 2) - 1) + a
			},
			easeInCubic: function(e, f, a, i, g) {
				return i * (f /= g) * f * f + a
			},
			easeOutCubic: function(e, f, a, i, g) {
				return i * ((f = f / g - 1) * f * f + 1) + a
			},
			easeInOutCubic: function(e, f, a, i, g) {
				if ((f /= g / 2) < 1) {
					return i / 2 * f * f * f + a
				}
				return i / 2 * ((f -= 2) * f * f + 2) + a
			},
			easeInQuart: function(e, f, a, i, g) {
				return i * (f /= g) * f * f * f + a
			},
			easeOutQuart: function(e, f, a, i, g) {
				return -i * ((f = f / g - 1) * f * f * f - 1) + a
			},
			easeInOutQuart: function(e, f, a, i, g) {
				if ((f /= g / 2) < 1) {
					return i / 2 * f * f * f * f + a
				}
				return -i / 2 * ((f -= 2) * f * f * f - 2) + a
			},
			easeInQuint: function(e, f, a, i, g) {
				return i * (f /= g) * f * f * f * f + a
			},
			easeOutQuint: function(e, f, a, i, g) {
				return i * ((f = f / g - 1) * f * f * f * f + 1) + a
			},
			easeInOutQuint: function(e, f, a, i, g) {
				if ((f /= g / 2) < 1) {
					return i / 2 * f * f * f * f * f + a
				}
				return i / 2 * ((f -= 2) * f * f * f * f + 2) + a
			},
			easeInSine: function(e, f, a, i, g) {
				return -i * Math.cos(f / g * (Math.PI / 2)) + i + a
			},
			easeOutSine: function(e, f, a, i, g) {
				return i * Math.sin(f / g * (Math.PI / 2)) + a
			},
			easeInOutSine: function(e, f, a, i, g) {
				return -i / 2 * (Math.cos(Math.PI * f / g) - 1) + a
			},
			easeInExpo: function(e, f, a, i, g) {
				return (f == 0) ? a : i * Math.pow(2, 10 * (f / g - 1)) + a
			},
			easeOutExpo: function(e, f, a, i, g) {
				return (f == g) ? a + i : i * (-Math.pow(2, -10 * f / g) + 1) + a
			},
			easeInOutExpo: function(e, f, a, i, g) {
				if (f == 0) {
					return a
				}
				if (f == g) {
					return a + i
				}
				if ((f /= g / 2) < 1) {
					return i / 2 * Math.pow(2, 10 * (f - 1)) + a
				}
				return i / 2 * (-Math.pow(2, -10 * --f) + 2) + a
			},
			easeInCirc: function(e, f, a, i, g) {
				return -i * (Math.sqrt(1 - (f /= g) * f) - 1) + a
			},
			easeOutCirc: function(e, f, a, i, g) {
				return i * Math.sqrt(1 - (f = f / g - 1) * f) + a
			},
			easeInOutCirc: function(e, f, a, i, g) {
				if ((f /= g / 2) < 1) {
					return -i / 2 * (Math.sqrt(1 - f * f) - 1) + a
				}
				return i / 2 * (Math.sqrt(1 - (f -= 2) * f) + 1) + a
			},
			easeInElastic: function(f, i, e, m, l) {
				var j = 1.70158;
				var k = 0;
				var g = m;
				if (i == 0) {
					return e
				}
				if ((i /= l) == 1) {
					return e + m
				}
				if (!k) {
					k = l * 0.3
				}
				if (g < Math.abs(m)) {
					g = m;
					var j = k / 4
				} else {
					var j = k / (2 * Math.PI) * Math.asin(m / g)
				}
				return -(g * Math.pow(2, 10 * (i -= 1)) * Math.sin((i * l - j) * (2 * Math.PI) / k)) + e
			},
			easeOutElastic: function(f, i, e, m, l) {
				var j = 1.70158;
				var k = 0;
				var g = m;
				if (i == 0) {
					return e
				}
				if ((i /= l) == 1) {
					return e + m
				}
				if (!k) {
					k = l * 0.3
				}
				if (g < Math.abs(m)) {
					g = m;
					var j = k / 4
				} else {
					var j = k / (2 * Math.PI) * Math.asin(m / g)
				}
				return g * Math.pow(2, -10 * i) * Math.sin((i * l - j) * (2 * Math.PI) / k) + m + e
			},
			easeInOutElastic: function(f, i, e, m, l) {
				var j = 1.70158;
				var k = 0;
				var g = m;
				if (i == 0) {
					return e
				}
				if ((i /= l / 2) == 2) {
					return e + m
				}
				if (!k) {
					k = l * (0.3 * 1.5)
				}
				if (g < Math.abs(m)) {
					g = m;
					var j = k / 4
				} else {
					var j = k / (2 * Math.PI) * Math.asin(m / g)
				}
				if (i < 1) {
					return -0.5 * (g * Math.pow(2, 10 * (i -= 1)) * Math.sin((i * l - j) * (2 * Math.PI) / k)) + e
				}
				return g * Math.pow(2, -10 * (i -= 1)) * Math.sin((i * l - j) * (2 * Math.PI) / k) * 0.5 + m + e
			},
			easeInBack: function(e, f, a, j, i, g) {
				if (g == undefined) {
					g = 1.70158
				}
				return j * (f /= i) * f * ((g + 1) * f - g) + a
			},
			easeOutBack: function(e, f, a, j, i, g) {
				if (g == undefined) {
					g = 1.70158
				}
				return j * ((f = f / i - 1) * f * ((g + 1) * f + g) + 1) + a
			},
			easeInOutBack: function(e, f, a, j, i, g) {
				if (g == undefined) {
					g = 1.70158
				}
				if ((f /= i / 2) < 1) {
					return j / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
				}
				return j / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
			},
			easeInBounce: function(e, f, a, i, g) {
				return i - jQuery.easing.easeOutBounce(e, g - f, 0, i, g) + a
			},
			easeOutBounce: function(e, f, a, i, g) {
				if ((f /= g) < (1 / 2.75)) {
					return i * (7.5625 * f * f) + a
				} else {
					if (f < (2 / 2.75)) {
						return i * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a
					} else {
						if (f < (2.5 / 2.75)) {
							return i * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
						} else {
							return i * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a
						}
					}
				}
			},
			easeInOutBounce: function(e, f, a, i, g) {
				if (f < g / 2) {
					return jQuery.easing.easeInBounce(e, f * 2, 0, i, g) * 0.5 + a
				}
				return jQuery.easing.easeOutBounce(e, f * 2 - g, 0, i, g) * 0.5 + i * 0.5 + a
			},
			scrolldEasing1: function(f, g, e, k, j) {
				var i = (g /= j) * g;
				var a = i * g;
				return e + k * (-3.6 * a * i + 4.3 * i * i + 0.2 * a + 0.1 * i)
			},
			scrolldEasing2: function(f, g, e, k, j) {
				var i = (g /= j) * g;
				var a = i * g;
				return e + k * (18.9925 * a * i + -45.23 * i * i + 40.28 * a + -19.89 * i + 6.8475 * g)
			},
			scrolldEasing3: function(e, f, a, i, g) {
				if ((f /= g) < (1.25 / 3)) {
					return i * (9.5625 * f * f) + a
				} else {
					if (f < (2.25 / 3)) {
						return i * (8.5625 * (f -= (1.5 / 2.75)) * f + 0.85) + a
					} else {
						if (f < (2.75 / 3)) {
							return i * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
						} else {
							return i * (5.5625 * (f -= (2.625 / 2.75)) * f + 1) + a
						}
					}
				}
			}
		});
		var speed1 = 100;
		var speed2 = 200;
		var speed3 = 300;
		var speed4 = 400;
		var speed5 = 500;
		var speed6 = 600;
		var speed7 = 700;
		var speed8 = 800;
		var speed9 = 900;
		var speed10 = 1000;
		var speed11 = 1100;
		var speed12 = 1200;
		var speed13 = 1300;
		var speed14 = 1400;
		var speed15 = 1500;
		var speed16 = 1600;
		var speed17 = 1700;
		var speed18 = 1800;
		var speed19 = 1900;
		var speed20 = 2000;
		var speedX = 3000;
		var idScroll = $(this).attr("id");
		var scrolldFixed = $("#" + scrolldNavBar).outerHeight();
		var scrolldMobileFixed = $("#" + scrolldMobileNavBar).outerHeight();
		var idScrollElement = $("#" + idScroll);
		var idScrollString = idScroll.substr(0, idScroll.length - 3);
		var idScrollDiv = document.getElementById(idScrollString).id;
		var idScrollDivElement = $("#" + idScrollDiv);
		var offsetDivElementTop = Math.round(idScrollDivElement.offset().top);
		var idScrollDivElementHeight = Math.round(idScrollDivElement.height());
		var scrolldTop = offsetDivElementTop + scrolldCustom;
		var scrolldTopFixed = Math.round(offsetDivElementTop - scrolldFixed) + scrolldCustom;
		var scrolldPre = offsetDivElementTop - Math.round(h / 15) + scrolldCustom;
		var scrolldPreFixed = offsetDivElementTop - scrolldFixed - Math.round(h / 20) + scrolldCustom;
		var scrolldCenter = offsetDivElementTop - Math.round(h / 2 - idScrollDivElementHeight / 2);
		var scrolldMobileTopFixed = Math.round(offsetDivElementTop - scrolldMobileFixed) + scrolldCustom;
		var scrolldMobilePreFixed = offsetDivElementTop - scrolldMobileFixed - Math.round(h / 20) + scrolldCustom;
		var scrolldDistance = scrolldTop;
		var scrolldDistanceMin = scrolldTop;
		var scrolldSpeed = speed15;
		var scrolldEasing = "scrolldEasing1";
		var scrolldFixed = true;
		var scrolldMobile = true;
		var scrolldMobileWidth = 979;
		var scrolldMobileDistance = scrolldTop;
		var scrolldMobileDistanceMin = scrolldTop;
		var scrolldMobileSpeed = speed15;
		var scrolldMobileEasing = "scrolldEasing1";
		var scrolldMobileFixed = true;

		var defaults = {
			scrolldDistance: scrolldTop,
			scrolldDistanceMin: scrolldTop,
			scrolldSpeed: speed9,
			scrolldEasing: 'easeInOutExpo',
			scrolldFixed: 'true',
			scrolldMobile: 'true',
			scrolldMobileWidth: 979,
			scrolldMobileDistance: scrolldTop,
			scrolldMobileDistanceMin: scrolldTop,
			scrolldMobileSpeed: speed9,
			scrolldMobileEasing: 'easeInOutExpo',
			scrolldMobileFixed: 'true'
		},
			settings = $.extend({}, defaults, options);
		this.each(function() {
			if ($(this).attr("id") != "") {
				var d = $(this);
				if (settings.scrolldDistance) {
					scrolldDistance = settings.scrolldDistance
				}
				if (settings.scrolldDistanceMin) {
					scrolldDistanceMin = settings.scrolldDistanceMin
				}
				if (settings.scrolldSpeed) {
					scrolldSpeed = settings.scrolldSpeed
				}
				if (settings.scrolldEasing) {
					scrolldEasing = settings.scrolldEasing
				}
				if (settings.scrolldFixed === "false") {
					scrolldFixed = false
				}
				if (settings.scrolldMobile === "false") {
					scrolldMobile = false
				}
				if (settings.scrolldMobileWidth) {
					scrolldMobileWidth = settings.scrolldMobileWidth
				}
				if (settings.scrolldMobileDistance) {
					scrolldMobileDistance = settings.scrolldMobileDistance
				}
				if (settings.scrolldMobileDistanceMin) {
					scrolldMobileDistanceMin = settings.scrolldMobileDistanceMin
				}
				if (settings.scrolldMobileSpeed) {
					scrolldMobileSpeed = settings.scrolldMobileSpeed
				}
				if (settings.scrolldMobileEasing) {
					scrolldMobileEasing = settings.scrolldMobileEasing
				}
				if (settings.scrolldMobileFixed === "false") {
					scrolldMobileFixed = false
				}
				if (this.className != "") {
					var c = (this.className || "").split(/\s+/);
					$.each(c, function(f, e) {
						if ($.inArray(e, classList) == -1) {
							classList.push(e)
						}
					});
					easings = {
						linear: "linear",
						swing: "swing",
						jswing: "jswing",
						easeInQuad: "easeInQuad",
						easeOutQuad: "easeOutQuad",
						easeInOutQuad: "easeInOutQuad",
						easeInCubic: "easeInCubic",
						easeOutCubic: "easeOutCubic",
						easeInOutCubic: "easeInOutCubic",
						easeInQuart: "easeInQuart",
						easeOutQuart: "easeOutQuart",
						easeInOutQuart: "easeInOutQuart",
						easeInQuint: "easeInQuint",
						easeOutQuint: "easeOutQuint",
						easeInOutQuint: "easeInOutQuint",
						easeInSine: "easeInSine",
						easeOutSine: "easeOutSine",
						easeInOutSine: "easeInOutSine",
						easeInExpo: "easeInExpo",
						easeOutExpo: "easeOutExpo",
						easeInOutExpo: "easeInOutExpo",
						easeInCirc: "easeInCirc",
						easeOutCirc: "easeOutCirc",
						easeInOutCirc: "easeInOutCirc",
						easeInElastic: "easeInElastic",
						easeOutElastic: "easeOutElastic",
						easeInOutElastic: "easeInOutElastic",
						easeInBack: "easeInBack",
						easeOutBack: "easeOutBack",
						easeInOutBack: "easeInOutBack",
						easeInBounce: "easeInBounce",
						easeOutBounce: "easeOutBounce",
						easeInOutBounce: "easeInOutBounce",
						scrolldEasing1: "scrolldEasing1",
						scrolldEasing2: "scrolldEasing2",
						scrolldEasing3: "scrolldEasing3"
					}, mobileEasings = {
						linearMobile: "linear",
						swingMobile: "swing",
						jswingMobile: "jswing",
						easeInQuadMobile: "easeInQuad",
						easeOutQuadMobile: "easeOutQuad",
						easeInOutQuadMobile: "easeInOutQuad",
						easeInCubicMobile: "easeInCubic",
						easeOutCubicMobile: "easeOutCubic",
						easeInOutCubicMobile: "easeInOutCubic",
						easeInQuartMobile: "easeInQuart",
						easeOutQuartMobile: "easeOutQuart",
						easeInOutQuartMobile: "easeInOutQuart",
						easeInQuintMobile: "easeInQuint",
						easeOutQuintMobile: "easeOutQuint",
						easeInOutQuintMobile: "easeInOutQuint",
						easeInSineMobile: "easeInSine",
						easeOutSineMobile: "easeOutSine",
						easeInOutSineMobile: "easeInOutSine",
						easeInExpoMobile: "easeInExpo",
						easeOutExpoMobile: "easeOutExpo",
						easeInOutExpoMobile: "easeInOutExpo",
						easeInCircMobile: "easeInCirc",
						easeOutCircMobile: "easeOutCirc",
						easeInOutCircMobile: "easeInOutCirc",
						easeInElasticMobile: "easeInElastic",
						easeOutElasticMobile: "easeOutElastic",
						easeInOutElasticMobile: "easeInOutElastic",
						easeInBackMobile: "easeInBack",
						easeOutBackMobile: "easeOutBack",
						easeInOutBackMobile: "easeInOutBack",
						easeInBounceMobile: "easeInBounce",
						easeOutBounceMobile: "easeOutBounce",
						easeInOutBounceMobile: "easeInOutBounce",
						scrolldEasing1Mobile: "scrolldEasing1",
						scrolldEasing2Mobile: "scrolldEasing2",
						scrolldEasing3Mobile: "scrolldEasing3"
					};
					for (var b = 0; b < classList.length; b++) {
						var a = classList[b];
						if (easings[a]) {
							scrolldEasing = easings[a];
							break
						}
					}
					for (var b = 0; b < classList.length; b++) {
						var a = classList[b];
						if (mobileEasings[a]) {
							scrolldMobileEasing = mobileEasings[a];
							break
						}
					}
				}
				if (x < scrolldMobileWidth) {
					if (scrolldMobile === true && scrolldMobileFixed === false) {
						if (h <= idScrollDivElementHeight) {
							htmlBody.stop(true).animate({
								scrollTop: scrolldMobileDistanceMin
							}, scrolldMobileSpeed, scrolldMobileEasing)
						} else {
							htmlBody.stop(true).animate({
								scrollTop: scrolldMobileDistance
							}, scrolldMobileSpeed, scrolldMobileEasing)
						}
					} else {
						if (scrolldMobile === true && scrolldMobileFixed === true) {
							if (h <= (idScrollDivElementHeight + (scrolldMobileFixed * 2)) && scrolldMobileDistanceMin === scrolldTop) {
								htmlBody.stop(true).animate({
									scrollTop: scrolldTopFixed
								}, scrolldMobileSpeed, scrolldMobileEasing)
							} else {
								if (h <= (idScrollDivElementHeight + (scrolldMobileFixed * 2)) && scrolldMobileDistanceMin === scrolldPre) {
									htmlBody.stop(true).animate({
										scrollTop: scrolldPreFixed
									}, scrolldMobileSpeed, scrolldMobileEasing)
								} else {
									if (h <= (idScrollDivElementHeight + (scrolldMobileFixed * 2)) && scrolldMobileDistanceMin === scrolldCenter) {
										htmlBody.stop(true).animate({
											scrollTop: scrolldCenter
										}, scrolldMobileSpeed, scrolldMobileEasing)
									} else {
										if (h > (idScrollDivElementHeight + (scrolldMobileFixed * 2)) && scrolldMobileDistance === scrolldTop) {
											htmlBody.stop(true).animate({
												scrollTop: scrolldTopFixed
											}, scrolldMobileSpeed, scrolldMobileEasing)
										} else {
											if (h > (idScrollDivElementHeight + (scrolldMobileFixed * 2)) && scrolldMobileDistance === scrolldPre) {
												htmlBody.stop(true).animate({
													scrollTop: scrolldPreFixed
												}, scrolldMobileSpeed, scrolldMobileEasing)
											} else {
												if (h > (idScrollDivElementHeight + (scrolldMobileFixed * 2)) && scrolldMobileDistance === scrolldCenter) {
													htmlBody.stop(true).animate({
														scrollTop: scrolldCenter
													}, scrolldMobileSpeed, scrolldMobileEasing)
												} else {
													htmlBody.stop(true).animate({
														scrollTop: scrolldMobileDistance
													}, scrolldMobileSpeed, scrolldMobileEasing)
												}
											}
										}
									}
								}
							}
						} else {
							if (scrolldMobile === false) {
								scrolldMobileWidth = 1
							}
						}
					}
				} else {
					if (x >= scrolldMobileWidth) {
						if (scrolldFixed === false) {
							if (h <= idScrollDivElementHeight) {
								htmlBody.stop(true).animate({
									scrollTop: scrolldDistanceMin
								}, scrolldSpeed, scrolldEasing)
							} else {
								htmlBody.stop(true).animate({
									scrollTop: scrolldDistance
								}, scrolldMobileSpeed, scrolldMobileEasing)
							}
						} else {
							if (scrolldFixed === true) {
								if (h <= (idScrollDivElementHeight + scrolldFixed) && scrolldDistanceMin === scrolldTop) {
									htmlBody.stop(true).animate({
										scrollTop: scrolldTopFixed
									}, scrolldSpeed, scrolldEasing)
								} else {
									if (h <= (idScrollDivElementHeight + scrolldFixed) && scrolldDistanceMin === scrolldPre) {
										htmlBody.stop(true).animate({
											scrollTop: scrolldPreFixed
										}, scrolldSpeed, scrolldEasing)
									} else {
										if (h <= (idScrollDivElementHeight + scrolldFixed * 2) && scrolldDistanceMin === scrolldCenter) {
											htmlBody.stop(true).animate({
												scrollTop: scrolldCenter
											}, scrolldSpeed, scrolldEasing)
										} else {
											if (h > (idScrollDivElementHeight + scrolldFixed) && scrolldDistance === scrolldTop) {
												htmlBody.stop(true).animate({
													scrollTop: scrolldTopFixed
												}, scrolldSpeed, scrolldEasing)
											} else {
												if (h > (idScrollDivElementHeight + scrolldFixed) && scrolldDistance === scrolldPre) {
													htmlBody.stop(true).animate({
														scrollTop: scrolldPreFixed
													}, scrolldSpeed, scrolldEasing)
												} else {
													if (h > (idScrollDivElementHeight + scrolldFixed * 2) && scrolldDistance === scrolldCenter) {
														htmlBody.stop(true).animate({
															scrollTop: scrolldCenter
														}, scrolldSpeed, scrolldEasing)
													} else {
														htmlBody.stop(true).animate({
															scrollTop: scrolldDistance
														}, scrolldSpeed, scrolldEasing)
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		});

		if ($(this).attr('id') === 'demo8Btn') {
			if (scrolldTop - y > 0 || scrolldTop - y < 0) {
				distanceScrolld = 0;
				if (y < 1) {
					distanceScrolld = scrolldTop;
				} else if (y > 1) {
					distanceScrolld = (scrolldTop - y);
				} else {
					distanceScrolld = scrolldTop;
				}
				$(":animated").promise().done(function() {

					if (y < 1) {
						alert('You just scrolld ' + distanceScrolld + 'px using the ' + scrolldEasing + ' easing method!');
						alert('One more for fun');
					} else if (y > 1) {
						alert('You just scrolld ' + distanceScrolld + 'px using the ' + scrolldEasing + ' easing method!');
						alert('One more for fun');
					} else {
						alert('You just scrolld ' + distanceScrolld + 'px using the ' + scrolldEasing + ' easing method!');
						alert('One more for fun');
					}

				});
			}
		}

		if ($(this).attr('id') === 'demo8Btn') {

			$(":animated").promise().done(function() {



			});
		}

		return this;
	}
})(jQuery);