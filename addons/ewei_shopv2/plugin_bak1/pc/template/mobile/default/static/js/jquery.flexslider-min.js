!
function(e) {
	e.flexslider = function(t, i) {
		var n = e(t),
			a = e.extend({}, e.flexslider.defaults, i),
			o = a.namespace,
			s = "ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch,
			r = s ? "touchend" : "click",
			l = a.direction === "vertical",
			c = a.reverse,
			u = a.itemWidth > 0,
			d = a.animation === "fade",
			f = a.asNavFor !== "",
			p = {};
		e.data(t, "flexslider", n);
		p = {
			init: function() {
				n.animating = false;
				n.currentSlide = a.startAt;
				n.animatingTo = n.currentSlide;
				n.atEnd = n.currentSlide === 0 || n.currentSlide === n.last;
				n.containerSelector = a.selector.substr(0, a.selector.search(" "));
				n.slides = e(a.selector, n);
				n.container = e(n.containerSelector, n);
				n.count = n.slides.length;
				n.syncExists = e(a.sync).length > 0;
				if (a.animation === "slide") a.animation = "swing";
				n.prop = l ? "top" : "marginLeft";
				n.args = {};
				n.manualPause = false;
				n.transitions = !a.video && !d && a.useCSS &&
				function() {
					var e = document.createElement("div"),
						t = ["perspectiveProperty", "WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
					for (var i in t) {
						if (e.style[t[i]] !== undefined) {
							n.pfx = t[i].replace("Perspective", "").toLowerCase();
							n.prop = "-" + n.pfx + "-transform";
							return true
						}
					}
					return false
				}();
				if (a.controlsContainer !== "") n.controlsContainer = e(a.controlsContainer).length > 0 && e(a.controlsContainer);
				if (a.manualControls !== "") n.manualControls = e(a.manualControls).length > 0 && e(a.manualControls);
				if (a.randomize) {
					n.slides.sort(function() {
						return Math.round(Math.random()) - .5
					});
					n.container.empty().append(n.slides)
				}
				n.doMath();
				if (f) p.asNav.setup();
				n.setup("init");
				if (a.controlNav) p.controlNav.setup();
				if (a.directionNav) p.directionNav.setup();
				if (a.keyboard && (e(n.containerSelector).length === 1 || a.multipleKeyboard)) {
					e(document).bind("keyup", function(e) {
						var t = e.keyCode;
						if (!n.animating && (t === 39 || t === 37)) {
							var i = t === 39 ? n.getTarget("next") : t === 37 ? n.getTarget("prev") : false;
							n.flexAnimate(i, a.pauseOnAction)
						}
					})
				}
				if (a.mousewheel) {
					n.bind("mousewheel", function(e, t, i, o) {
						e.preventDefault();
						var s = t < 0 ? n.getTarget("next") : n.getTarget("prev");
						n.flexAnimate(s, a.pauseOnAction)
					})
				}
				if (a.pausePlay) p.pausePlay.setup();
				if (a.slideshow) {
					if (a.pauseOnHover) {
						n.hover(function() {
							if (!n.manualPlay && !n.manualPause) n.pause()
						}, function() {
							if (!n.manualPause && !n.manualPlay) n.play()
						})
					}
					a.initDelay > 0 ? setTimeout(n.play, a.initDelay) : n.play()
				}
				if (s && a.touch) p.touch();
				if (!d || d && a.smoothHeight) e(window).bind("resize focus", p.resize);
				setTimeout(function() {
					a.start(n)
				}, 200)
			},
			asNav: {
				setup: function() {
					n.asNav = true;
					n.animatingTo = Math.floor(n.currentSlide / n.move);
					n.currentItem = n.currentSlide;
					n.slides.removeClass(o + "active-slide").eq(n.currentItem).addClass(o + "active-slide");
					n.slides.click(function(t) {
						t.preventDefault();
						var i = e(this),
							o = i.index();
						if (!e(a.asNavFor).data("flexslider").animating && !i.hasClass("active")) {
							n.direction = n.currentItem < o ? "next" : "prev";
							n.flexAnimate(o, a.pauseOnAction, false, true, true)
						}
					})
				}
			},
			controlNav: {
				setup: function() {
					if (!n.manualControls) {
						p.controlNav.setupPaging()
					} else {
						p.controlNav.setupManual()
					}
				},
				setupPaging: function() {
					var t = a.controlNav === "thumbnails" ? "control-thumbs" : "control-paging",
						i = 1,
						l;
					n.controlNavScaffold = e('<ol class="' + o + "control-nav " + o + t + '"></ol>');
					if (n.pagingCount > 1) {
						for (var c = 0; c < n.pagingCount; c++) {
							l = a.controlNav === "thumbnails" ? '<img src="' + n.slides.eq(c).attr("data-thumb") + '"/>' : "<a>" + i + "</a>";
							n.controlNavScaffold.append("<li>" + l + "</li>");
							i++
						}
					}
					n.controlsContainer ? e(n.controlsContainer).append(n.controlNavScaffold) : n.append(n.controlNavScaffold);
					p.controlNav.set();
					p.controlNav.active();
					n.controlNavScaffold.delegate("a, img", r, function(t) {
						t.preventDefault();
						var i = e(this),
							s = n.controlNav.index(i);
						if (!i.hasClass(o + "active")) {
							n.direction = s > n.currentSlide ? "next" : "prev";
							n.flexAnimate(s, a.pauseOnAction)
						}
					});
					if (s) {
						n.controlNavScaffold.delegate("a", "click touchstart", function(e) {
							e.preventDefault()
						})
					}
				},
				setupManual: function() {
					n.controlNav = n.manualControls;
					p.controlNav.active();
					n.controlNav.live(r, function(t) {
						t.preventDefault();
						var i = e(this),
							s = n.controlNav.index(i);
						if (!i.hasClass(o + "active")) {
							s > n.currentSlide ? n.direction = "next" : n.direction = "prev";
							n.flexAnimate(s, a.pauseOnAction)
						}
					});
					if (s) {
						n.controlNav.live("click touchstart", function(e) {
							e.preventDefault()
						})
					}
				},
				set: function() {
					var t = a.controlNav === "thumbnails" ? "img" : "a";
					n.controlNav = e("." + o + "control-nav li " + t, n.controlsContainer ? n.controlsContainer : n)
				},
				active: function() {
					n.controlNav.removeClass(o + "active").eq(n.animatingTo).addClass(o + "active")
				},
				update: function(t, i) {
					if (n.pagingCount > 1 && t === "add") {
						n.controlNavScaffold.append(e("<li><a>" + n.count + "</a></li>"))
					} else if (n.pagingCount === 1) {
						n.controlNavScaffold.find("li").remove()
					} else {
						n.controlNav.eq(i).closest("li").remove()
					}
					p.controlNav.set();
					n.pagingCount > 1 && n.pagingCount !== n.controlNav.length ? n.update(i, t) : p.controlNav.active()
				}
			},
			directionNav: {
				setup: function() {
					var t = e('<ul class="' + o + 'direction-nav"><li><a class="' + o + 'prev" href="#">' + a.prevText + '</a></li><li><a class="' + o + 'next" href="#">' + a.nextText + "</a></li></ul>");
					if (n.controlsContainer) {
						e(n.controlsContainer).append(t);
						n.directionNav = e("." + o + "direction-nav li a", n.controlsContainer)
					} else {
						n.append(t);
						n.directionNav = e("." + o + "direction-nav li a", n)
					}
					p.directionNav.update();
					n.directionNav.bind(r, function(t) {
						t.preventDefault();
						var i = e(this).hasClass(o + "next") ? n.getTarget("next") : n.getTarget("prev");
						n.flexAnimate(i, a.pauseOnAction)
					});
					if (s) {
						n.directionNav.bind("click touchstart", function(e) {
							e.preventDefault()
						})
					}
				},
				update: function() {
					var e = o + "disabled";
					if (n.pagingCount === 1) {
						n.directionNav.addClass(e)
					} else if (!a.animationLoop) {
						if (n.animatingTo === 0) {
							n.directionNav.removeClass(e).filter("." + o + "prev").addClass(e)
						} else if (n.animatingTo === n.last) {
							n.directionNav.removeClass(e).filter("." + o + "next").addClass(e)
						} else {
							n.directionNav.removeClass(e)
						}
					} else {
						n.directionNav.removeClass(e)
					}
				}
			},
			pausePlay: {
				setup: function() {
					var t = e('<div class="' + o + 'pauseplay"><a></a></div>');
					if (n.controlsContainer) {
						n.controlsContainer.append(t);
						n.pausePlay = e("." + o + "pauseplay a", n.controlsContainer)
					} else {
						n.append(t);
						n.pausePlay = e("." + o + "pauseplay a", n)
					}
					p.pausePlay.update(a.slideshow ? o + "pause" : o + "play");
					n.pausePlay.bind(r, function(t) {
						t.preventDefault();
						if (e(this).hasClass(o + "pause")) {
							n.manualPause = true;
							n.manualPlay = false;
							n.pause()
						} else {
							n.manualPause = false;
							n.manualPlay = true;
							n.play()
						}
					});
					if (s) {
						n.pausePlay.bind("click touchstart", function(e) {
							e.preventDefault()
						})
					}
				},
				update: function(e) {
					e === "play" ? n.pausePlay.removeClass(o + "pause").addClass(o + "play").text(a.playText) : n.pausePlay.removeClass(o + "play").addClass(o + "pause").text(a.pauseText)
				}
			},
			touch: function() {
				var e, i, o, s, r, f, p = false;
				t.addEventListener("touchstart", m, false);

				function m(r) {
					if (n.animating) {
						r.preventDefault()
					} else if (r.touches.length === 1) {
						n.pause();
						s = l ? n.h : n.w;
						f = Number(new Date);
						o = u && c && n.animatingTo === n.last ? 0 : u && c ? n.limit - (n.itemW + a.itemMargin) * n.move * n.animatingTo : u && n.currentSlide === n.last ? n.limit : u ? (n.itemW + a.itemMargin) * n.move * n.currentSlide : c ? (n.last - n.currentSlide + n.cloneOffset) * s : (n.currentSlide + n.cloneOffset) * s;
						e = l ? r.touches[0].pageY : r.touches[0].pageX;
						i = l ? r.touches[0].pageX : r.touches[0].pageY;
						t.addEventListener("touchmove", v, false);
						t.addEventListener("touchend", g, false)
					}
				}
				function v(t) {
					r = l ? e - t.touches[0].pageY : e - t.touches[0].pageX;
					p = l ? Math.abs(r) < Math.abs(t.touches[0].pageX - i) : Math.abs(r) < Math.abs(t.touches[0].pageY - i);
					if (!p || Number(new Date) - f > 500) {
						t.preventDefault();
						if (!d && n.transitions) {
							if (!a.animationLoop) {
								r = r / (n.currentSlide === 0 && r < 0 || n.currentSlide === n.last && r > 0 ? Math.abs(r) / s + 2 : 1)
							}
							n.setProps(o + r, "setTouch")
						}
					}
				}
				function g(l) {
					t.removeEventListener("touchmove", v, false);
					if (n.animatingTo === n.currentSlide && !p && !(r === null)) {
						var u = c ? -r : r,
							m = u > 0 ? n.getTarget("next") : n.getTarget("prev");
						if (n.canAdvance(m) && (Number(new Date) - f < 550 && Math.abs(u) > 50 || Math.abs(u) > s / 2)) {
							n.flexAnimate(m, a.pauseOnAction)
						} else {
							if (!d) n.flexAnimate(n.currentSlide, a.pauseOnAction, true)
						}
					}
					t.removeEventListener("touchend", g, false);
					e = null;
					i = null;
					r = null;
					o = null
				}
			},
			resize: function() {
				if (!n.animating && n.is(":visible")) {
					if (!u) n.doMath();
					if (d) {
						p.smoothHeight()
					} else if (u) {
						n.slides.width(n.computedW);
						n.update(n.pagingCount);
						n.setProps()
					} else if (l) {
						n.viewport.height(n.h);
						n.setProps(n.h, "setTotal")
					} else {
						if (a.smoothHeight) p.smoothHeight();
						n.newSlides.width(n.computedW);
						n.setProps(n.computedW, "setTotal")
					}
				}
			},
			smoothHeight: function(e) {
				if (!l || d) {
					var t = d ? n : n.viewport;
					e ? t.animate({
						height: n.slides.eq(n.animatingTo).height()
					}, e) : t.height(n.slides.eq(n.animatingTo).height())
				}
			},
			sync: function(t) {
				var i = e(a.sync).data("flexslider"),
					o = n.animatingTo;
				switch (t) {
				case "animate":
					i.flexAnimate(o, a.pauseOnAction, false, true);
					break;
				case "play":
					if (!i.playing && !i.asNav) {
						i.play()
					}
					break;
				case "pause":
					i.pause();
					break
				}
			}
		};
		n.flexAnimate = function(t, i, r, m, v) {
			if (f) n.direction = n.currentItem < t ? "next" : "prev";
			if (!n.animating && (n.canAdvance(t, v) || r) && n.is(":visible")) {
				if (f && m) {
					var g = e(a.asNavFor).data("flexslider");
					n.atEnd = t === 0 || t === n.count - 1;
					g.flexAnimate(t, true, false, true, v);
					n.direction = n.currentItem < t ? "next" : "prev";
					g.direction = n.direction;
					if (Math.ceil((t + 1) / n.visible) - 1 !== n.currentSlide && t !== 0) {
						n.currentItem = t;
						n.slides.removeClass(o + "active-slide").eq(t).addClass(o + "active-slide");
						t = Math.floor(t / n.visible)
					} else {
						n.currentItem = t;
						n.slides.removeClass(o + "active-slide").eq(t).addClass(o + "active-slide");
						return false
					}
				}
				n.animating = true;
				n.animatingTo = t;
				a.before(n);
				if (i) n.pause();
				if (n.syncExists && !v) p.sync("animate");
				if (a.controlNav) p.controlNav.active();
				if (!u) n.slides.removeClass(o + "active-slide").eq(t).addClass(o + "active-slide");
				n.atEnd = t === 0 || t === n.last;
				if (a.directionNav) p.directionNav.update();
				if (t === n.last) {
					a.end(n);
					if (!a.animationLoop) n.pause()
				}
				if (!d) {
					var h = l ? n.slides.filter(":first").height() : n.computedW,
						S, x, y;
					if (u) {
						S = a.itemWidth > n.w ? a.itemMargin * 2 : a.itemMargin;
						y = (n.itemW + S) * n.move * n.animatingTo;
						x = y > n.limit && n.visible !== 1 ? n.limit : y
					} else if (n.currentSlide === 0 && t === n.count - 1 && a.animationLoop && n.direction !== "next") {
						x = c ? (n.count + n.cloneOffset) * h : 0
					} else if (n.currentSlide === n.last && t === 0 && a.animationLoop && n.direction !== "prev") {
						x = c ? 0 : (n.count + 1) * h
					} else {
						x = c ? (n.count - 1 - t + n.cloneOffset) * h : (t + n.cloneOffset) * h
					}
					n.setProps(x, "", a.animationSpeed);
					if (n.transitions) {
						if (!a.animationLoop || !n.atEnd) {
							n.animating = false;
							n.currentSlide = n.animatingTo
						}
						n.container.unbind("webkitTransitionEnd transitionend");
						n.container.bind("webkitTransitionEnd transitionend", function() {
							n.wrapup(h)
						})
					} else {
						n.container.animate(n.args, a.animationSpeed, a.easing, function() {
							n.wrapup(h)
						})
					}
				} else {
					if (!s) {
						n.slides.eq(n.currentSlide).fadeOut(a.animationSpeed, a.easing);
						n.slides.eq(t).fadeIn(a.animationSpeed, a.easing, n.wrapup)
					} else {
						n.slides.eq(n.currentSlide).css({
							opacity: 0,
							zIndex: 1
						});
						n.slides.eq(t).css({
							opacity: 1,
							zIndex: 2
						});
						n.slides.unbind("webkitTransitionEnd transitionend");
						n.slides.eq(n.currentSlide).bind("webkitTransitionEnd transitionend", function() {
							a.after(n)
						});
						n.animating = false;
						n.currentSlide = n.animatingTo
					}
				}
				if (a.smoothHeight) p.smoothHeight(a.animationSpeed)
			}
		};
		n.wrapup = function(e) {
			if (!d && !u) {
				if (n.currentSlide === 0 && n.animatingTo === n.last && a.animationLoop) {
					n.setProps(e, "jumpEnd")
				} else if (n.currentSlide === n.last && n.animatingTo === 0 && a.animationLoop) {
					n.setProps(e, "jumpStart")
				}
			}
			n.animating = false;
			n.currentSlide = n.animatingTo;
			a.after(n)
		};
		n.animateSlides = function() {
			if (!n.animating) n.flexAnimate(n.getTarget("next"))
		};
		n.pause = function() {
			clearInterval(n.animatedSlides);
			n.playing = false;
			if (a.pausePlay) p.pausePlay.update("play");
			if (n.syncExists) p.sync("pause")
		};
		n.play = function() {
			n.animatedSlides = setInterval(n.animateSlides, a.slideshowSpeed);
			n.playing = true;
			if (a.pausePlay) p.pausePlay.update("pause");
			if (n.syncExists) p.sync("play")
		};
		n.canAdvance = function(e, t) {
			var i = f ? n.pagingCount - 1 : n.last;
			var o = t ? true : f && n.currentItem === n.count - 1 && e === 0 && n.direction === "prev" ? true : f && n.currentItem === 0 && e === n.pagingCount - 1 && n.direction !== "next" ? false : e === n.currentSlide && !f ? false : a.animationLoop ? true : n.atEnd && n.currentSlide === 0 && e === i && n.direction !== "next" ? false : n.atEnd && n.currentSlide === i && e === 0 && n.direction === "next" ? false : true;
			return o
		};
		n.getTarget = function(e) {
			n.direction = e;
			if (e === "next") {
				return n.currentSlide === n.last ? 0 : n.currentSlide + 1
			} else {
				return n.currentSlide === 0 ? n.last : n.currentSlide - 1
			}
		};
		n.setProps = function(e, t, i) {
			var o = function() {
					var i = e ? e : (n.itemW + a.itemMargin) * n.move * n.animatingTo,
						o = function() {
							if (u) {
								return t === "setTouch" ? e : c && n.animatingTo === n.last ? 0 : c ? n.limit - (n.itemW + a.itemMargin) * n.move * n.animatingTo : n.animatingTo === n.last ? n.limit : i
							} else {
								switch (t) {
								case "setTotal":
									return c ? (n.count - 1 - n.currentSlide + n.cloneOffset) * e : (n.currentSlide + n.cloneOffset) * e;
								case "setTouch":
									return c ? e : e;
								case "jumpEnd":
									return c ? e : n.count * e;
								case "jumpStart":
									return c ? n.count * e : e;
								default:
									return e
								}
							}
						}();
					return o * -1 + "px"
				}();
			if (n.transitions) {
				o = l ? "translate3d(0," + o + ",0)" : "translate3d(" + o + ",0,0)";
				i = i !== undefined ? i / 1e3 + "s" : "0s";
				n.container.css("-" + n.pfx + "-transition-duration", i)
			}
			n.args[n.prop] = o;
			if (n.transitions || i === undefined) n.container.css(n.args)
		};
		n.setup = function(t) {
			if (!d) {
				var i, r;
				if (t === "init") {
					n.viewport = e('<div class="' + o + 'viewport"></div>').css({
						overflow: "hidden",
						position: "relative"
					}).appendTo(n).append(n.container);
					n.cloneCount = 0;
					n.cloneOffset = 0;
					if (c) {
						r = e.makeArray(n.slides).reverse();
						n.slides = e(r);
						n.container.empty().append(n.slides)
					}
				}
				if (a.animationLoop && !u) {
					n.cloneCount = 2;
					n.cloneOffset = 1;
					if (t !== "init") n.container.find(".clone").remove();
					n.container.append(n.slides.first().clone().addClass("clone")).prepend(n.slides.last().clone().addClass("clone"))
				}
				n.newSlides = e(a.selector, n);
				i = c ? n.count - 1 - n.currentSlide + n.cloneOffset : n.currentSlide + n.cloneOffset;
				if (l && !u) {
					n.container.height((n.count + n.cloneCount) * 200 + "%").css("position", "absolute").width("100%");
					setTimeout(function() {
						n.newSlides.css({
							display: "block"
						});
						n.doMath();
						n.viewport.height(n.h);
						n.setProps(i * n.h, "init")
					}, t === "init" ? 100 : 0)
				} else {
					n.container.width((n.count + n.cloneCount) * 200 + "%");
					n.setProps(i * n.computedW, "init");
					setTimeout(function() {
						n.doMath();
						n.newSlides.css({
							width: n.computedW,
							"float": "left",
							display: "block"
						});
						if (a.smoothHeight) p.smoothHeight()
					}, t === "init" ? 100 : 0)
				}
			} else {
				n.slides.css({
					width: "100%",
					"float": "left",
					marginRight: "-100%",
					position: "relative"
				});
				if (t === "init") {
					if (!s) {
						n.slides.eq(n.currentSlide).fadeIn(a.animationSpeed, a.easing)
					} else {
						n.slides.css({
							opacity: 0,
							display: "block",
							webkitTransition: "opacity " + a.animationSpeed / 1e3 + "s ease",
							zIndex: 1
						}).eq(n.currentSlide).css({
							opacity: 1,
							zIndex: 2
						})
					}
				}
				if (a.smoothHeight) p.smoothHeight()
			}
			if (!u) n.slides.removeClass(o + "active-slide").eq(n.currentSlide).addClass(o + "active-slide")
		};
		n.doMath = function() {
			var e = n.slides.first(),
				t = a.itemMargin,
				i = a.minItems,
				o = a.maxItems;
			n.w = n.width();
			n.h = e.height();
			n.boxPadding = e.outerWidth() - e.width();
			if (u) {
				n.itemT = a.itemWidth + t;
				n.minW = i ? i * n.itemT : n.w;
				n.maxW = o ? o * n.itemT : n.w;
				n.itemW = n.minW > n.w ? (n.w - t * i) / i : n.maxW < n.w ? (n.w - t * o) / o : a.itemWidth > n.w ? n.w : a.itemWidth;
				n.visible = Math.floor(n.w / (n.itemW + t));
				n.move = a.move > 0 && a.move < n.visible ? a.move : n.visible;
				n.pagingCount = Math.ceil((n.count - n.visible) / n.move + 1);
				n.last = n.pagingCount - 1;
				n.limit = n.pagingCount === 1 ? 0 : a.itemWidth > n.w ? (n.itemW + t * 2) * n.count - n.w - t : (n.itemW + t) * n.count - n.w - t
			} else {
				n.itemW = n.w;
				n.pagingCount = n.count;
				n.last = n.count - 1
			}
			n.computedW = n.itemW - n.boxPadding
		};
		n.update = function(e, t) {
			n.doMath();
			if (!u) {
				if (e < n.currentSlide) {
					n.currentSlide += 1
				} else if (e <= n.currentSlide && e !== 0) {
					n.currentSlide -= 1
				}
				n.animatingTo = n.currentSlide
			}
			if (a.controlNav && !n.manualControls) {
				if (t === "add" && !u || n.pagingCount > n.controlNav.length) {
					p.controlNav.update("add")
				} else if (t === "remove" && !u || n.pagingCount < n.controlNav.length) {
					if (u && n.currentSlide > n.last) {
						n.currentSlide -= 1;
						n.animatingTo -= 1
					}
					p.controlNav.update("remove", n.last)
				}
			}
			if (a.directionNav) p.directionNav.update()
		};
		n.addSlide = function(t, i) {
			var o = e(t);
			n.count += 1;
			n.last = n.count - 1;
			if (l && c) {
				i !== undefined ? n.slides.eq(n.count - i).after(o) : n.container.prepend(o)
			} else {
				i !== undefined ? n.slides.eq(i).before(o) : n.container.append(o)
			}
			n.update(i, "add");
			n.slides = e(a.selector + ":not(.clone)", n);
			n.setup();
			a.added(n)
		};
		n.removeSlide = function(t) {
			var i = isNaN(t) ? n.slides.index(e(t)) : t;
			n.count -= 1;
			n.last = n.count - 1;
			if (isNaN(t)) {
				e(t, n.slides).remove()
			} else {
				l && c ? n.slides.eq(n.last).remove() : n.slides.eq(t).remove()
			}
			n.doMath();
			n.update(i, "remove");
			n.slides = e(a.selector + ":not(.clone)", n);
			n.setup();
			a.removed(n)
		};
		p.init()
	};
	e.flexslider.defaults = {
		namespace: "flex-",
		selector: ".slides > li",
		animation: "fade",
		easing: "swing",
		direction: "horizontal",
		reverse: false,
		animationLoop: true,
		smoothHeight: false,
		startAt: 0,
		slideshow: true,
		slideshowSpeed: 7e3,
		animationSpeed: 600,
		initDelay: 0,
		randomize: false,
		pauseOnAction: true,
		pauseOnHover: false,
		useCSS: true,
		touch: true,
		video: false,
		controlNav: true,
		directionNav: true,
		prevText: "Previous",
		nextText: "Next",
		keyboard: true,
		multipleKeyboard: false,
		mousewheel: false,
		pausePlay: false,
		pauseText: "Pause",
		playText: "Play",
		controlsContainer: "",
		manualControls: "",
		sync: "",
		asNavFor: "",
		itemWidth: 0,
		itemMargin: 0,
		minItems: 0,
		maxItems: 0,
		move: 0,
		start: function() {},
		before: function() {},
		after: function() {},
		end: function() {},
		added: function() {},
		removed: function() {}
	};
	e.fn.flexslider = function(t) {
		if (t === undefined) t = {};
		if (typeof t === "object") {
			return this.each(function() {
				var i = e(this),
					n = t.selector ? t.selector : ".slides > li",
					a = i.find(n);
				if (a.length === 1) {
					a.fadeIn(400);
					if (t.start) t.start(i)
				} else if (i.data("flexslider") == undefined) {
					new e.flexslider(this, t)
				}
			})
		} else {
			var i = e(this).data("flexslider");
			switch (t) {
			case "play":
				i.play();
				break;
			case "pause":
				i.pause();
				break;
			case "next":
				i.flexAnimate(i.getTarget("next"), true);
				break;
			case "prev":
			case "previous":
				i.flexAnimate(i.getTarget("prev"), true);
				break;
			default:
				if (typeof t === "number") i.flexAnimate(t, true)
			}
		}
	}
}(jQuery);