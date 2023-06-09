!(function (e, t) {
    "function" == typeof define && define.amd
        ? define(["exports"], t)
        : t(
              "object" == typeof exports && "string" != typeof exports.nodeName
                  ? exports
                  : (e.commonJsStrict = {})
          );
})(this, function (e) {
    function t(e) {
        if (e in q) return e;
        for (var t = e[0].toUpperCase() + e.slice(1), n = T.length; n--; )
            if (((e = T[n] + t), e in q)) return e;
    }
    function n(e, t) {
        e = e || {};
        for (var i in t)
            t[i] && t[i].constructor && t[i].constructor === Object
                ? ((e[i] = e[i] || {}), n(e[i], t[i]))
                : (e[i] = t[i]);
        return e;
    }
    function i(e, t, n) {
        var i;
        return function () {
            var o = this,
                r = arguments,
                a = function () {
                    (i = null), n || e.apply(o, r);
                },
                s = n && !i;
            clearTimeout(i), (i = setTimeout(a, t)), s && e.apply(o, r);
        };
    }
    function o(e) {
        if ("createEvent" in document) {
            var t = document.createEvent("HTMLEvents");
            t.initEvent("change", !1, !0), e.dispatchEvent(t);
        } else e.fireEvent("onchange");
    }
    function r(e, t, n) {
        if ("string" == typeof t) {
            var i = t;
            (t = {}), (t[i] = n);
        }
        for (var o in t) e.style[o] = t[o];
    }
    function a(e, t) {
        e.classList ? e.classList.add(t) : (e.className += " " + t);
    }
    function s(e, t) {
        e.classList
            ? e.classList.remove(t)
            : (e.className = e.className.replace(t, ""));
    }
    function l(e) {
        return parseInt(e, 10);
    }
    function u(e, t, n) {
        var i = t || new Image();
        return (
            (i.style.opacity = 0),
            new Promise(function (t) {
                function o() {
                    setTimeout(function () {
                        t(i);
                    }, 1);
                }
                return i.src === e
                    ? void o()
                    : ((i.exifdata = null),
                      i.removeAttribute("crossOrigin"),
                      e.match(/^https?:\/\/|^\/\//) &&
                          i.setAttribute("crossOrigin", "anonymous"),
                      (i.onload = function () {
                          n
                              ? EXIF.getData(i, function () {
                                    o();
                                })
                              : o();
                      }),
                      void (i.src = e));
            })
        );
    }
    function c(e) {
        var t = e.naturalWidth,
            n = e.naturalHeight;
        if (e.exifdata && e.exifdata.Orientation >= 5) {
            var i = t;
            (t = n), (n = i);
        }
        return { width: t, height: n };
    }
    function h(e) {
        return e.exifdata.Orientation;
    }
    function p(e, t, n) {
        var i = t.width,
            o = t.height,
            r = e.getContext("2d");
        switch (((e.width = t.width), (e.height = t.height), r.save(), n)) {
            case 2:
                r.translate(i, 0), r.scale(-1, 1);
                break;
            case 3:
                r.translate(i, o), r.rotate((180 * Math.PI) / 180);
                break;
            case 4:
                r.translate(0, o), r.scale(1, -1);
                break;
            case 5:
                (e.width = o),
                    (e.height = i),
                    r.rotate((90 * Math.PI) / 180),
                    r.scale(1, -1);
                break;
            case 6:
                (e.width = o),
                    (e.height = i),
                    r.rotate((90 * Math.PI) / 180),
                    r.translate(0, -o);
                break;
            case 7:
                (e.width = o),
                    (e.height = i),
                    r.rotate((-90 * Math.PI) / 180),
                    r.translate(-i, o),
                    r.scale(1, -1);
                break;
            case 8:
                (e.width = o),
                    (e.height = i),
                    r.translate(0, i),
                    r.rotate((-90 * Math.PI) / 180);
        }
        r.drawImage(t, 0, 0, i, o), r.restore();
    }
    function d() {
        var e,
            t,
            n,
            i,
            o,
            s,
            l = this,
            u = "croppie-container",
            c = l.options.viewport.type
                ? "cr-vp-" + l.options.viewport.type
                : null;
        (l.options.useCanvas = l.options.enableOrientation || m.call(l)),
            (l.data = {}),
            (l.elements = {}),
            (e = l.elements.boundary = document.createElement("div")),
            (n = l.elements.viewport = document.createElement("div")),
            (t = l.elements.img = document.createElement("img")),
            (i = l.elements.overlay = document.createElement("div")),
            l.options.useCanvas
                ? ((l.elements.canvas = document.createElement("canvas")),
                  (l.elements.preview = l.elements.canvas))
                : (l.elements.preview = l.elements.img),
            a(e, "cr-boundary"),
            (o = l.options.boundary.width),
            (s = l.options.boundary.height),
            r(e, {
                width: o + (isNaN(o) ? "" : "px"),
                height: s + (isNaN(s) ? "" : "px"),
            }),
            a(n, "cr-viewport"),
            c && a(n, c),
            r(n, {
                width: l.options.viewport.width + "px",
                height: l.options.viewport.height + "px",
            }),
            n.setAttribute("tabindex", 0),
            a(l.elements.preview, "cr-image"),
            a(i, "cr-overlay"),
            l.element.appendChild(e),
            e.appendChild(l.elements.preview),
            e.appendChild(n),
            e.appendChild(i),
            a(l.element, u),
            l.options.customClass && a(l.element, l.options.customClass),
            x.call(this),
            l.options.enableZoom && g.call(l),
            l.options.enableResize && f.call(l);
    }
    function m() {
        return this.options.enableExif && window.EXIF;
    }
    function f() {
        function e(e) {
            if (
                (void 0 === e.button || 0 === e.button) &&
                (e.preventDefault(), !m)
            ) {
                var r = p.elements.overlay.getBoundingClientRect();
                if (
                    ((m = !0),
                    (o = e.pageX),
                    (s = e.pageY),
                    (i =
                        -1 !== e.currentTarget.className.indexOf("vertical")
                            ? "v"
                            : "h"),
                    (l = r.width),
                    (u = r.height),
                    e.touches)
                ) {
                    var a = e.touches[0];
                    (o = a.pageX), (s = a.pageY);
                }
                window.addEventListener("mousemove", t),
                    window.addEventListener("touchmove", t),
                    window.addEventListener("mouseup", n),
                    window.addEventListener("touchend", n),
                    (document.body.style[D] = "none");
            }
        }
        function t(e) {
            var t = e.pageX,
                n = e.pageY;
            if ((e.preventDefault(), e.touches)) {
                var a = e.touches[0];
                (t = a.pageX), (n = a.pageY);
            }
            var c = t - o,
                h = n - s,
                m = p.options.viewport.height + h,
                v = p.options.viewport.width + c;
            "v" === i && m >= f && u >= m
                ? (r(d, { height: m + "px" }),
                  (p.options.boundary.height += h),
                  r(p.elements.boundary, {
                      height: p.options.boundary.height + "px",
                  }),
                  (p.options.viewport.height += h),
                  r(p.elements.viewport, {
                      height: p.options.viewport.height + "px",
                  }))
                : "h" === i &&
                  v >= f &&
                  l >= v &&
                  (r(d, { width: v + "px" }),
                  (p.options.boundary.width += c),
                  r(p.elements.boundary, {
                      width: p.options.boundary.width + "px",
                  }),
                  (p.options.viewport.width += c),
                  r(p.elements.viewport, {
                      width: p.options.viewport.width + "px",
                  })),
                C.call(p),
                B.call(p),
                b.call(p),
                E.call(p),
                (s = n),
                (o = t);
        }
        function n() {
            (m = !1),
                window.removeEventListener("mousemove", t),
                window.removeEventListener("touchmove", t),
                window.removeEventListener("mouseup", n),
                window.removeEventListener("touchend", n),
                (document.body.style[D] = "");
        }
        var i,
            o,
            s,
            l,
            u,
            c,
            h,
            p = this,
            d = document.createElement("div"),
            m = !1,
            f = 50;
        a(d, "cr-resizer"),
            r(d, {
                width: this.options.viewport.width + "px",
                height: this.options.viewport.height + "px",
            }),
            this.options.resizeControls.height &&
                ((c = document.createElement("div")),
                a(c, "cr-resizer-vertical"),
                d.appendChild(c)),
            this.options.resizeControls.width &&
                ((h = document.createElement("div")),
                a(h, "cr-resizer-horisontal"),
                d.appendChild(h)),
            c && c.addEventListener("mousedown", e),
            h && h.addEventListener("mousedown", e),
            this.elements.boundary.appendChild(d);
    }
    function v(e) {
        if (this.options.enableZoom) {
            var t = this.elements.zoomer,
                n = F(e, 4);
            t.value = Math.max(t.min, Math.min(t.max, n));
        }
    }
    function g() {
        function e() {
            w.call(n, {
                value: parseFloat(o.value),
                origin: new $(n.elements.preview),
                viewportRect: n.elements.viewport.getBoundingClientRect(),
                transform: K.parse(n.elements.preview),
            });
        }
        function t(t) {
            var i, o;
            (i = t.wheelDelta
                ? t.wheelDelta / 1200
                : t.deltaY
                ? t.deltaY / 1060
                : t.detail
                ? t.detail / -60
                : 0),
                (o = n._currentZoom + i * n._currentZoom),
                t.preventDefault(),
                v.call(n, o),
                e.call(n);
        }
        var n = this,
            i = (n.elements.zoomerWrap = document.createElement("div")),
            o = (n.elements.zoomer = document.createElement("input"));
        a(i, "cr-slider-wrap"),
            a(o, "cr-slider"),
            (o.type = "range"),
            (o.step = "0.0001"),
            (o.value = 1),
            (o.style.display = n.options.showZoomer ? "" : "none"),
            n.element.appendChild(i),
            i.appendChild(o),
            (n._currentZoom = 1),
            n.elements.zoomer.addEventListener("input", e),
            n.elements.zoomer.addEventListener("change", e),
            n.options.mouseWheelZoom &&
                (n.elements.boundary.addEventListener("mousewheel", t),
                n.elements.boundary.addEventListener("DOMMouseScroll", t));
    }
    function w(e) {
        function t() {
            var e = {};
            (e[A] = i.toString()),
                (e[P] = a.toString()),
                r(n.elements.preview, e);
        }
        var n = this,
            i = e ? e.transform : K.parse(n.elements.preview),
            o = e
                ? e.viewportRect
                : n.elements.viewport.getBoundingClientRect(),
            a = e ? e.origin : new $(n.elements.preview);
        if (
            ((n._currentZoom = e ? e.value : n._currentZoom),
            (i.scale = n._currentZoom),
            t(),
            n.options.enforceBoundary)
        ) {
            var s = y.call(n, o),
                l = s.translate,
                u = s.origin;
            i.x >= l.maxX && ((a.x = u.minX), (i.x = l.maxX)),
                i.x <= l.minX && ((a.x = u.maxX), (i.x = l.minX)),
                i.y >= l.maxY && ((a.y = u.minY), (i.y = l.maxY)),
                i.y <= l.minY && ((a.y = u.maxY), (i.y = l.minY));
        }
        t(), Q.call(n), E.call(n);
    }
    function y(e) {
        var t = this,
            n = t._currentZoom,
            i = e.width,
            o = e.height,
            r = t.elements.boundary.clientWidth / 2,
            a = t.elements.boundary.clientHeight / 2,
            s = t.elements.preview.getBoundingClientRect(),
            l = s.width,
            u = s.height,
            c = i / 2,
            h = o / 2,
            p = -1 * (c / n - r),
            d = p - (l * (1 / n) - i * (1 / n)),
            m = -1 * (h / n - a),
            f = m - (u * (1 / n) - o * (1 / n)),
            v = (1 / n) * c,
            g = l * (1 / n) - v,
            w = (1 / n) * h,
            y = u * (1 / n) - w;
        return {
            translate: { maxX: p, minX: d, maxY: m, minY: f },
            origin: { maxX: g, minX: v, maxY: y, minY: w },
        };
    }
    function b() {
        var e = this,
            t = e._currentZoom,
            n = e.elements.preview.getBoundingClientRect(),
            i = e.elements.viewport.getBoundingClientRect(),
            o = K.parse(e.elements.preview.style[A]),
            a = new $(e.elements.preview),
            s = i.top - n.top + i.height / 2,
            l = i.left - n.left + i.width / 2,
            u = {},
            c = {};
        (u.y = s / t),
            (u.x = l / t),
            (c.y = (u.y - a.y) * (1 - t)),
            (c.x = (u.x - a.x) * (1 - t)),
            (o.x -= c.x),
            (o.y -= c.y);
        var h = {};
        (h[P] = u.x + "px " + u.y + "px"),
            (h[A] = o.toString()),
            r(e.elements.preview, h);
    }
    function x() {
        function e(e, t) {
            var n = d.elements.preview.getBoundingClientRect(),
                i = p.y + t,
                o = p.x + e;
            d.options.enforceBoundary
                ? (h.top > n.top + t && h.bottom < n.bottom + t && (p.y = i),
                  h.left > n.left + e && h.right < n.right + e && (p.x = o))
                : ((p.y = i), (p.x = o));
        }
        function t(e) {
            function t(e) {
                switch (e) {
                    case i:
                        return [1, 0];
                    case o:
                        return [0, 1];
                    case r:
                        return [-1, 0];
                    case a:
                        return [0, -1];
                }
            }
            var i = 37,
                o = 38,
                r = 39,
                a = 40;
            if (!e.shiftKey || (e.keyCode != o && e.keyCode != a)) {
                if (
                    d.options.enableKeyMovement &&
                    e.keyCode >= 37 &&
                    e.keyCode <= 40
                ) {
                    e.preventDefault();
                    var s = t(e.keyCode);
                    (p = K.parse(d.elements.preview)),
                        (document.body.style[D] = "none"),
                        (h = d.elements.viewport.getBoundingClientRect()),
                        n(s);
                }
            } else {
                var l = 0;
                (l =
                    e.keyCode == o
                        ? parseFloat(d.elements.zoomer.value, 10) +
                          parseFloat(d.elements.zoomer.step, 10)
                        : parseFloat(d.elements.zoomer.value, 10) -
                          parseFloat(d.elements.zoomer.step, 10)),
                    d.setZoom(l);
            }
        }
        function n(t) {
            var n = t[0],
                i = t[1],
                o = {};
            e(n, i),
                (o[A] = p.toString()),
                r(d.elements.preview, o),
                C.call(d),
                (document.body.style[D] = ""),
                b.call(d),
                E.call(d),
                (c = 0);
        }
        function i(e) {
            if (
                (void 0 === e.button || 0 === e.button) &&
                (e.preventDefault(), !m)
            ) {
                if (((m = !0), (l = e.pageX), (u = e.pageY), e.touches)) {
                    var t = e.touches[0];
                    (l = t.pageX), (u = t.pageY);
                }
                (p = K.parse(d.elements.preview)),
                    window.addEventListener("mousemove", a),
                    window.addEventListener("touchmove", a),
                    window.addEventListener("mouseup", s),
                    window.addEventListener("touchend", s),
                    (document.body.style[D] = "none"),
                    (h = d.elements.viewport.getBoundingClientRect());
            }
        }
        function a(t) {
            t.preventDefault();
            var n = t.pageX,
                i = t.pageY;
            if (t.touches) {
                var a = t.touches[0];
                (n = a.pageX), (i = a.pageY);
            }
            var s = n - l,
                h = i - u,
                m = {};
            if ("touchmove" == t.type && t.touches.length > 1) {
                var f = t.touches[0],
                    g = t.touches[1],
                    w = Math.sqrt(
                        (f.pageX - g.pageX) * (f.pageX - g.pageX) +
                            (f.pageY - g.pageY) * (f.pageY - g.pageY)
                    );
                c || (c = w / d._currentZoom);
                var y = w / c;
                return v.call(d, y), void o(d.elements.zoomer);
            }
            e(s, h),
                (m[A] = p.toString()),
                r(d.elements.preview, m),
                C.call(d),
                (u = i),
                (l = n);
        }
        function s() {
            (m = !1),
                window.removeEventListener("mousemove", a),
                window.removeEventListener("touchmove", a),
                window.removeEventListener("mouseup", s),
                window.removeEventListener("touchend", s),
                (document.body.style[D] = ""),
                b.call(d),
                E.call(d),
                (c = 0);
        }
        var l,
            u,
            c,
            h,
            p,
            d = this,
            m = !1;
        d.elements.overlay.addEventListener("mousedown", i),
            d.elements.viewport.addEventListener("keydown", t),
            d.elements.overlay.addEventListener("touchstart", i);
    }
    function C() {
        var e = this,
            t = e.elements.boundary.getBoundingClientRect(),
            n = e.elements.preview.getBoundingClientRect();
        r(e.elements.overlay, {
            width: n.width + "px",
            height: n.height + "px",
            top: n.top - t.top + "px",
            left: n.left - t.left + "px",
        });
    }
    function E() {
        var e,
            t = this,
            n = t.get();
        if (_.call(t))
            if (
                (t.options.update.call(t, n),
                t.$ && "undefined" == typeof Prototype)
            )
                t.$(t.element).trigger("update", n);
            else {
                var e;
                window.CustomEvent
                    ? (e = new CustomEvent("update", { detail: n }))
                    : ((e = document.createEvent("CustomEvent")),
                      e.initCustomEvent("update", !0, !0, n)),
                    t.element.dispatchEvent(e);
            }
    }
    function _() {
        return (
            this.elements.preview.offsetHeight > 0 &&
            this.elements.preview.offsetWidth > 0
        );
    }
    function L() {
        var e = this,
            t = 1,
            n = {},
            i = e.elements.preview,
            o = e.elements.preview.getBoundingClientRect(),
            a = new K(0, 0, t),
            s = new $(),
            l = _.call(e);
        l &&
            !e.data.bound &&
            ((e.data.bound = !0),
            (n[A] = a.toString()),
            (n[P] = s.toString()),
            (n.opacity = 1),
            r(i, n),
            (e._originalImageWidth = o.width),
            (e._originalImageHeight = o.height),
            e.options.enableZoom ? B.call(e, !0) : (e._currentZoom = t),
            (a.scale = e._currentZoom),
            (n[A] = a.toString()),
            r(i, n),
            e.data.points.length ? R.call(e, e.data.points) : I.call(e),
            b.call(e),
            C.call(e));
    }
    function B(e) {
        var t,
            n,
            i,
            r,
            a = this,
            s = 0,
            l = 1.5,
            u = a.elements.zoomer,
            c = parseFloat(u.value),
            h = a.elements.boundary.getBoundingClientRect(),
            p = a.elements.preview.getBoundingClientRect(),
            d = a.elements.viewport.getBoundingClientRect();
        a.options.enforceBoundary &&
            ((i = d.width / (e ? p.width : p.width / c)),
            (r = d.height / (e ? p.height : p.height / c)),
            (s = Math.max(i, r))),
            s >= l && (l = s + 1),
            (u.min = F(s, 4)),
            (u.max = F(l, 4)),
            e &&
                ((n = Math.max(h.width / p.width, h.height / p.height)),
                (t = null !== a.data.boundZoom ? a.data.boundZoom : n),
                v.call(a, t)),
            o(u);
    }
    function R(e) {
        if (4 != e.length)
            throw "Croppie - Invalid number of points supplied: " + e;
        var t = this,
            n = e[2] - e[0],
            i = t.elements.viewport.getBoundingClientRect(),
            o = t.elements.boundary.getBoundingClientRect(),
            a = { left: i.left - o.left, top: i.top - o.top },
            s = i.width / n,
            l = e[1],
            u = e[0],
            c = -1 * e[1] + a.top,
            h = -1 * e[0] + a.left,
            p = {};
        (p[P] = u + "px " + l + "px"),
            (p[A] = new K(h, c, s).toString()),
            r(t.elements.preview, p),
            v.call(t, s),
            (t._currentZoom = s);
    }
    function I() {
        var e = this,
            t = e.elements.preview.getBoundingClientRect(),
            n = e.elements.viewport.getBoundingClientRect(),
            i = e.elements.boundary.getBoundingClientRect(),
            o = n.left - i.left,
            a = n.top - i.top,
            s = o - (t.width - n.width) / 2,
            l = a - (t.height - n.height) / 2,
            u = new K(s, l, e._currentZoom);
        r(e.elements.preview, A, u.toString());
    }
    function M(e) {
        var t = this,
            n = t.elements.canvas,
            i = t.elements.img,
            o = n.getContext("2d"),
            r = m.call(t),
            e = t.options.enableOrientation && e;
        if (
            (o.clearRect(0, 0, n.width, n.height),
            (n.width = i.width),
            (n.height = i.height),
            r && !e)
        ) {
            var a = h(i);
            p(n, i, l(a || 0, 10));
        } else e && p(n, i, e);
    }
    function Z(e) {
        var t = this,
            n = e.points,
            i = l(n[0]),
            o = l(n[1]),
            r = l(n[2]),
            a = l(n[3]),
            s = r - i,
            u = a - o,
            c = e.circle,
            h = document.createElement("canvas"),
            p = h.getContext("2d"),
            d = s,
            m = u,
            f = 0,
            v = 0,
            g = d,
            w = m,
            y = e.outputWidth && e.outputHeight,
            b = 1;
        return (
            y && ((g = e.outputWidth), (w = e.outputHeight), (b = g / d)),
            (h.width = g),
            (h.height = w),
            e.backgroundColor &&
                ((p.fillStyle = e.backgroundColor), p.fillRect(0, 0, d, m)),
            t.options.enforceBoundary ||
                (0 > i && ((f = Math.abs(i)), (i = 0)),
                0 > o && ((v = Math.abs(o)), (o = 0)),
                r > t._originalImageWidth &&
                    ((s = t._originalImageWidth - i), (d = s)),
                a > t._originalImageHeight &&
                    ((u = t._originalImageHeight - o), (m = u))),
            1 !== b && ((f *= b), (v *= b), (d *= b), (m *= b)),
            p.drawImage(
                this.elements.preview,
                i,
                o,
                Math.min(s, t._originalImageWidth),
                Math.min(u, t._originalImageHeight),
                f,
                v,
                d,
                m
            ),
            c &&
                ((p.fillStyle = "#fff"),
                (p.globalCompositeOperation = "destination-in"),
                p.beginPath(),
                p.arc(d / 2, m / 2, d / 2, 0, 2 * Math.PI, !0),
                p.closePath(),
                p.fill()),
            h
        );
    }
    function z(e) {
        var t = e.points,
            n = document.createElement("div"),
            i = document.createElement("img"),
            o = t[2] - t[0],
            s = t[3] - t[1];
        return (
            a(n, "croppie-result"),
            n.appendChild(i),
            r(i, { left: -1 * t[0] + "px", top: -1 * t[1] + "px" }),
            (i.src = e.url),
            r(n, { width: o + "px", height: s + "px" }),
            n
        );
    }
    function Y(e) {
        return Z.call(this, e).toDataURL(e.format, e.quality);
    }
    function W(e) {
        var t = this;
        return new Promise(function (n) {
            Z.call(t, e).toBlob(
                function (e) {
                    n(e);
                },
                e.format,
                e.quality
            );
        });
    }
    function X(e, t) {
        var n,
            i = this,
            o = [],
            r = null,
            a = m.call(i);
        if ("string" == typeof e) (n = e), (e = {});
        else if (Array.isArray(e)) o = e.slice();
        else {
            if ("undefined" == typeof e && i.data.url)
                return L.call(i), E.call(i), null;
            (n = e.url),
                (o = e.points || []),
                (r = "undefined" == typeof e.zoom ? null : e.zoom);
        }
        return (
            (i.data.bound = !1),
            (i.data.url = n || i.data.url),
            (i.data.boundZoom = r),
            u(n, i.elements.img, a).then(function (n) {
                if (o.length)
                    i.options.relative &&
                        (o = [
                            (o[0] * n.naturalWidth) / 100,
                            (o[1] * n.naturalHeight) / 100,
                            (o[2] * n.naturalWidth) / 100,
                            (o[3] * n.naturalHeight) / 100,
                        ]);
                else {
                    var r,
                        a,
                        s = c(n),
                        l = i.elements.viewport.getBoundingClientRect(),
                        u = l.width / l.height,
                        h = s.width / s.height;
                    h > u
                        ? ((a = s.height), (r = a * u))
                        : ((r = s.width), (a = r / u));
                    var p = (s.width - r) / 2,
                        d = (s.height - a) / 2,
                        m = p + r,
                        f = d + a;
                    i.data.points = [p, d, m, f];
                }
                (i.data.points = o.map(function (e) {
                    return parseFloat(e);
                })),
                    i.options.useCanvas && M.call(i, e.orientation || 1),
                    L.call(i),
                    E.call(i),
                    t && t();
            })
        );
    }
    function F(e, t) {
        return parseFloat(e).toFixed(t || 0);
    }
    function H() {
        var e = this,
            t = e.elements.preview.getBoundingClientRect(),
            n = e.elements.viewport.getBoundingClientRect(),
            i = n.left - t.left,
            o = n.top - t.top,
            r = (n.width - e.elements.viewport.offsetWidth) / 2,
            a = (n.height - e.elements.viewport.offsetHeight) / 2,
            s = i + e.elements.viewport.offsetWidth + r,
            l = o + e.elements.viewport.offsetHeight + a,
            u = e._currentZoom;
        (u === 1 / 0 || isNaN(u)) && (u = 1);
        var c = e.options.enforceBoundary ? 0 : Number.NEGATIVE_INFINITY;
        return (
            (i = Math.max(c, i / u)),
            (o = Math.max(c, o / u)),
            (s = Math.max(c, s / u)),
            (l = Math.max(c, l / u)),
            { points: [F(i), F(o), F(s), F(l)], zoom: u }
        );
    }
    function k(e) {
        var t,
            i = this,
            o = H.call(i),
            r = n(G, n({}, e)),
            a = "string" == typeof e ? e : r.type || "base64",
            s = r.size || "viewport",
            l = r.format,
            u = r.quality,
            c = r.backgroundColor,
            h =
                "boolean" == typeof r.circle
                    ? r.circle
                    : "circle" === i.options.viewport.type,
            p = i.elements.viewport.getBoundingClientRect(),
            d = p.width / p.height;
        return (
            "viewport" === s
                ? ((o.outputWidth = p.width), (o.outputHeight = p.height))
                : "object" == typeof s &&
                  (s.width && s.height
                      ? ((o.outputWidth = s.width), (o.outputHeight = s.height))
                      : s.width
                      ? ((o.outputWidth = s.width),
                        (o.outputHeight = s.width / d))
                      : s.height &&
                        ((o.outputWidth = s.height * d),
                        (o.outputHeight = s.height))),
            J.indexOf(l) > -1 && ((o.format = "image/" + l), (o.quality = u)),
            (o.circle = h),
            (o.url = i.data.url),
            (o.backgroundColor = c),
            (t = new Promise(function (e) {
                switch (a.toLowerCase()) {
                    case "rawcanvas":
                        e(Z.call(i, o));
                        break;
                    case "canvas":
                    case "base64":
                        e(Y.call(i, o));
                        break;
                    case "blob":
                        W.call(i, o).then(e);
                        break;
                    default:
                        e(z.call(i, o));
                }
            }))
        );
    }
    function j() {
        L.call(this);
    }
    function S(e) {
        if (!this.options.useCanvas)
            throw "Croppie: Cannot rotate without enableOrientation";
        var t = this,
            n = t.elements.canvas,
            i = document.createElement("canvas"),
            o = 1;
        (i.width = n.width), (i.height = n.height);
        var r = i.getContext("2d");
        r.drawImage(n, 0, 0),
            (90 === e || -270 === e) && (o = 6),
            (-90 === e || 270 === e) && (o = 8),
            (180 === e || -180 === e) && (o = 3),
            p(n, i, o),
            w.call(t),
            (i = null);
    }
    function O() {
        var e = this;
        e.element.removeChild(e.elements.boundary),
            s(e.element, "croppie-container"),
            e.options.enableZoom &&
                e.element.removeChild(e.elements.zoomerWrap),
            delete e.elements;
    }
    function N(e, t) {
        if (
            ((this.element = e),
            (this.options = n(n({}, N.defaults), t)),
            "img" === this.element.tagName.toLowerCase())
        ) {
            var i = this.element;
            a(i, "cr-original-image");
            var o = document.createElement("div");
            this.element.parentNode.appendChild(o),
                o.appendChild(i),
                (this.element = o),
                (this.options.url = this.options.url || i.src);
        }
        if ((d.call(this), this.options.url)) {
            var r = { url: this.options.url, points: this.options.points };
            delete this.options.url,
                delete this.options.points,
                X.call(this, r);
        }
    }
    "function" != typeof Promise &&
        !(function (e) {
            function t(e, t) {
                return function () {
                    e.apply(t, arguments);
                };
            }
            function n(e) {
                if ("object" != typeof this)
                    throw new TypeError("Promises must be constructed via new");
                if ("function" != typeof e)
                    throw new TypeError("not a function");
                (this._state = null),
                    (this._value = null),
                    (this._deferreds = []),
                    l(e, t(o, this), t(r, this));
            }
            function i(e) {
                var t = this;
                return null === this._state
                    ? void this._deferreds.push(e)
                    : void c(function () {
                          var n = t._state ? e.onFulfilled : e.onRejected;
                          if (null === n)
                              return void (t._state ? e.resolve : e.reject)(
                                  t._value
                              );
                          var i;
                          try {
                              i = n(t._value);
                          } catch (o) {
                              return void e.reject(o);
                          }
                          e.resolve(i);
                      });
            }
            function o(e) {
                try {
                    if (e === this)
                        throw new TypeError(
                            "A promise cannot be resolved with itself."
                        );
                    if (e && ("object" == typeof e || "function" == typeof e)) {
                        var n = e.then;
                        if ("function" == typeof n)
                            return void l(t(n, e), t(o, this), t(r, this));
                    }
                    (this._state = !0), (this._value = e), a.call(this);
                } catch (i) {
                    r.call(this, i);
                }
            }
            function r(e) {
                (this._state = !1), (this._value = e), a.call(this);
            }
            function a() {
                for (var e = 0, t = this._deferreds.length; t > e; e++)
                    i.call(this, this._deferreds[e]);
                this._deferreds = null;
            }
            function s(e, t, n, i) {
                (this.onFulfilled = "function" == typeof e ? e : null),
                    (this.onRejected = "function" == typeof t ? t : null),
                    (this.resolve = n),
                    (this.reject = i);
            }
            function l(e, t, n) {
                var i = !1;
                try {
                    e(
                        function (e) {
                            i || ((i = !0), t(e));
                        },
                        function (e) {
                            i || ((i = !0), n(e));
                        }
                    );
                } catch (o) {
                    if (i) return;
                    (i = !0), n(o);
                }
            }
            var u = setTimeout,
                c =
                    ("function" == typeof setImmediate && setImmediate) ||
                    function (e) {
                        u(e, 1);
                    },
                h =
                    Array.isArray ||
                    function (e) {
                        return (
                            "[object Array]" ===
                            Object.prototype.toString.call(e)
                        );
                    };
            (n.prototype["catch"] = function (e) {
                return this.then(null, e);
            }),
                (n.prototype.then = function (e, t) {
                    var o = this;
                    return new n(function (n, r) {
                        i.call(o, new s(e, t, n, r));
                    });
                }),
                (n.all = function () {
                    var e = Array.prototype.slice.call(
                        1 === arguments.length && h(arguments[0])
                            ? arguments[0]
                            : arguments
                    );
                    return new n(function (t, n) {
                        function i(r, a) {
                            try {
                                if (
                                    a &&
                                    ("object" == typeof a ||
                                        "function" == typeof a)
                                ) {
                                    var s = a.then;
                                    if ("function" == typeof s)
                                        return void s.call(
                                            a,
                                            function (e) {
                                                i(r, e);
                                            },
                                            n
                                        );
                                }
                                (e[r] = a), 0 === --o && t(e);
                            } catch (l) {
                                n(l);
                            }
                        }
                        if (0 === e.length) return t([]);
                        for (var o = e.length, r = 0; r < e.length; r++)
                            i(r, e[r]);
                    });
                }),
                (n.resolve = function (e) {
                    return e && "object" == typeof e && e.constructor === n
                        ? e
                        : new n(function (t) {
                              t(e);
                          });
                }),
                (n.reject = function (e) {
                    return new n(function (t, n) {
                        n(e);
                    });
                }),
                (n.race = function (e) {
                    return new n(function (t, n) {
                        for (var i = 0, o = e.length; o > i; i++)
                            e[i].then(t, n);
                    });
                }),
                (n._setImmediateFn = function (e) {
                    c = e;
                }),
                "undefined" != typeof module && module.exports
                    ? (module.exports = n)
                    : e.Promise || (e.Promise = n);
        })(this),
        "function" != typeof window.CustomEvent &&
            !(function () {
                function e(e, t) {
                    t = t || { bubbles: !1, cancelable: !1, detail: void 0 };
                    var n = document.createEvent("CustomEvent");
                    return (
                        n.initCustomEvent(e, t.bubbles, t.cancelable, t.detail),
                        n
                    );
                }
                (e.prototype = window.Event.prototype),
                    (window.CustomEvent = e);
            })(),
        HTMLCanvasElement.prototype.toBlob ||
            Object.defineProperty(HTMLCanvasElement.prototype, "toBlob", {
                value: function (e, t, n) {
                    for (
                        var i = atob(this.toDataURL(t, n).split(",")[1]),
                            o = i.length,
                            r = new Uint8Array(o),
                            a = 0;
                        o > a;
                        a++
                    )
                        r[a] = i.charCodeAt(a);
                    e(new Blob([r], { type: t || "image/png" }));
                },
            });
    var P,
        A,
        D,
        T = ["Webkit", "Moz", "ms"],
        q = document.createElement("div").style;
    (A = t("transform")), (P = t("transformOrigin")), (D = t("userSelect"));
    var U = { translate3d: { suffix: ", 0px" }, translate: { suffix: "" } },
        K = function (e, t, n) {
            (this.x = parseFloat(e)),
                (this.y = parseFloat(t)),
                (this.scale = parseFloat(n));
        };
    (K.parse = function (e) {
        return e.style
            ? K.parse(e.style[A])
            : e.indexOf("matrix") > -1 || e.indexOf("none") > -1
            ? K.fromMatrix(e)
            : K.fromString(e);
    }),
        (K.fromMatrix = function (e) {
            var t = e.substring(7).split(",");
            return (
                (t.length && "none" !== e) || (t = [1, 0, 0, 1, 0, 0]),
                new K(l(t[4]), l(t[5]), parseFloat(t[0]))
            );
        }),
        (K.fromString = function (e) {
            var t = e.split(") "),
                n = t[0].substring(N.globals.translate.length + 1).split(","),
                i = t.length > 1 ? t[1].substring(6) : 1,
                o = n.length > 1 ? n[0] : 0,
                r = n.length > 1 ? n[1] : 0;
            return new K(o, r, i);
        }),
        (K.prototype.toString = function () {
            var e = U[N.globals.translate].suffix || "";
            return (
                N.globals.translate +
                "(" +
                this.x +
                "px, " +
                this.y +
                "px" +
                e +
                ") scale(" +
                this.scale +
                ")"
            );
        });
    var $ = function (e) {
        if (!e || !e.style[P]) return (this.x = 0), void (this.y = 0);
        var t = e.style[P].split(" ");
        (this.x = parseFloat(t[0])), (this.y = parseFloat(t[1]));
    };
    $.prototype.toString = function () {
        return this.x + "px " + this.y + "px";
    };
    var Q = i(C, 500),
        G = { type: "canvas", format: "png", quality: 1 },
        J = ["jpeg", "webp", "png"];
    if (window.jQuery) {
        var V = window.jQuery;
        V.fn.croppie = function (e) {
            var t = typeof e;
            if ("string" === t) {
                var n = Array.prototype.slice.call(arguments, 1),
                    i = V(this).data("croppie");
                return "get" === e
                    ? i.get()
                    : "result" === e
                    ? i.result.apply(i, n)
                    : "bind" === e
                    ? i.bind.apply(i, n)
                    : this.each(function () {
                          var t = V(this).data("croppie");
                          if (t) {
                              var i = t[e];
                              if (!V.isFunction(i))
                                  throw "Croppie " + e + " method not found";
                              i.apply(t, n),
                                  "destroy" === e &&
                                      V(this).removeData("croppie");
                          }
                      });
            }
            return this.each(function () {
                var t = new N(this, e);
                (t.$ = V), V(this).data("croppie", t);
            });
        };
    }
    (N.defaults = {
        viewport: { width: 100, height: 100, type: "square" },
        boundary: {},
        orientationControls: { enabled: !0, leftClass: "", rightClass: "" },
        resizeControls: { width: !0, height: !0 },
        customClass: "",
        showZoomer: !0,
        enableZoom: !0,
        enableResize: !1,
        mouseWheelZoom: !0,
        enableExif: !1,
        enforceBoundary: !0,
        enableOrientation: !1,
        enableKeyMovement: !0,
        update: function () {},
    }),
        (N.globals = { translate: "translate3d" }),
        n(N.prototype, {
            bind: function (e, t) {
                return X.call(this, e, t);
            },
            get: function () {
                var e = H.call(this),
                    t = e.points;
                return (
                    this.options.relative &&
                        ((t[0] /= this.elements.img.naturalWidth / 100),
                        (t[1] /= this.elements.img.naturalHeight / 100),
                        (t[2] /= this.elements.img.naturalWidth / 100),
                        (t[3] /= this.elements.img.naturalHeight / 100)),
                    e
                );
            },
            result: function (e) {
                return k.call(this, e);
            },
            refresh: function () {
                return j.call(this);
            },
            setZoom: function (e) {
                v.call(this, e), o(this.elements.zoomer);
            },
            rotate: function (e) {
                S.call(this, e);
            },
            destroy: function () {
                return O.call(this);
            },
        }),
        (e.Croppie = window.Croppie = N),
        "object" == typeof module && module.exports && (module.exports = N);
});
