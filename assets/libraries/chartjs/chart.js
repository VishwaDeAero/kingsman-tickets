/**
 * Skipped minification because the original files appears to be already minified.
 * Original file: /npm/chart.js@4.1.1/dist/chart.umd.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
/*!
 * Chart.js v4.1.1
 * https://www.chartjs.org
 * (c) 2022 Chart.js Contributors
 * Released under the MIT License
 */
! function(t, e) { "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = "undefined" != typeof globalThis ? globalThis : t || self).Chart = e() }(this, (function() { "use strict"; var t = Object.freeze({ __proto__: null, get Colors() { return Ho }, get Decimation() { return Yo }, get Filler() { return la }, get Legend() { return ua }, get SubTitle() { return ma }, get Title() { return ga }, get Tooltip() { return Ta } });

    function e() {} const i = (() => { let t = 0; return () => t++ })();

    function s(t) { return null == t }

    function n(t) { if (Array.isArray && Array.isArray(t)) return !0; const e = Object.prototype.toString.call(t); return "[object" === e.slice(0, 7) && "Array]" === e.slice(-6) }

    function o(t) { return null !== t && "[object Object]" === Object.prototype.toString.call(t) }

    function a(t) { return ("number" == typeof t || t instanceof Number) && isFinite(+t) }

    function r(t, e) { return a(t) ? t : e }

    function l(t, e) { return void 0 === t ? e : t } const h = (t, e) => "string" == typeof t && t.endsWith("%") ? parseFloat(t) / 100 : +t / e,
        c = (t, e) => "string" == typeof t && t.endsWith("%") ? parseFloat(t) / 100 * e : +t;

    function d(t, e, i) { if (t && "function" == typeof t.call) return t.apply(i, e) }

    function u(t, e, i, s) { let a, r, l; if (n(t))
            if (r = t.length, s)
                for (a = r - 1; a >= 0; a--) e.call(i, t[a], a);
            else
                for (a = 0; a < r; a++) e.call(i, t[a], a);
        else if (o(t))
            for (l = Object.keys(t), r = l.length, a = 0; a < r; a++) e.call(i, t[l[a]], l[a]) }

    function f(t, e) { let i, s, n, o; if (!t || !e || t.length !== e.length) return !1; for (i = 0, s = t.length; i < s; ++i)
            if (n = t[i], o = e[i], n.datasetIndex !== o.datasetIndex || n.index !== o.index) return !1;
        return !0 }

    function g(t) { if (n(t)) return t.map(g); if (o(t)) { const e = Object.create(null),
                i = Object.keys(t),
                s = i.length; let n = 0; for (; n < s; ++n) e[i[n]] = g(t[i[n]]); return e } return t }

    function p(t) { return -1 === ["__proto__", "prototype", "constructor"].indexOf(t) }

    function m(t, e, i, s) { if (!p(t)) return; const n = e[t],
            a = i[t];
        o(n) && o(a) ? b(n, a, s) : e[t] = g(a) }

    function b(t, e, i) { const s = n(e) ? e : [e],
            a = s.length; if (!o(t)) return t; const r = (i = i || {}).merger || m; let l; for (let e = 0; e < a; ++e) { if (l = s[e], !o(l)) continue; const n = Object.keys(l); for (let e = 0, s = n.length; e < s; ++e) r(n[e], t, l, i) } return t }

    function x(t, e) { return b(t, e, { merger: _ }) }

    function _(t, e, i) { if (!p(t)) return; const s = e[t],
            n = i[t];
        o(s) && o(n) ? x(s, n) : Object.prototype.hasOwnProperty.call(e, t) || (e[t] = g(n)) } const y = { "": t => t, x: t => t.x, y: t => t.y };

    function v(t) { const e = t.split("."),
            i = []; let s = ""; for (const t of e) s += t, s.endsWith("\\") ? s = s.slice(0, -1) + "." : (i.push(s), s = ""); return i }

    function M(t, e) { const i = y[e] || (y[e] = function(t) { const e = v(t); return t => { for (const i of e) { if ("" === i) break;
                    t = t && t[i] } return t } }(e)); return i(t) }

    function w(t) { return t.charAt(0).toUpperCase() + t.slice(1) } const k = t => void 0 !== t,
        S = t => "function" == typeof t,
        P = (t, e) => { if (t.size !== e.size) return !1; for (const i of t)
                if (!e.has(i)) return !1;
            return !0 };

    function D(t) { return "mouseup" === t.type || "click" === t.type || "contextmenu" === t.type } const C = Math.PI,
        O = 2 * C,
        A = O + C,
        T = Number.POSITIVE_INFINITY,
        L = C / 180,
        E = C / 2,
        R = C / 4,
        I = 2 * C / 3,
        z = Math.log10,
        F = Math.sign;

    function V(t, e, i) { return Math.abs(t - e) < i }

    function B(t) { const e = Math.round(t);
        t = V(t, e, t / 1e3) ? e : t; const i = Math.pow(10, Math.floor(z(t))),
            s = t / i; return (s <= 1 ? 1 : s <= 2 ? 2 : s <= 5 ? 5 : 10) * i }

    function N(t) { const e = [],
            i = Math.sqrt(t); let s; for (s = 1; s < i; s++) t % s == 0 && (e.push(s), e.push(t / s)); return i === (0 | i) && e.push(i), e.sort(((t, e) => t - e)).pop(), e }

    function W(t) { return !isNaN(parseFloat(t)) && isFinite(t) }

    function H(t, e) { const i = Math.round(t); return i - e <= t && i + e >= t }

    function j(t, e, i) { let s, n, o; for (s = 0, n = t.length; s < n; s++) o = t[s][i], isNaN(o) || (e.min = Math.min(e.min, o), e.max = Math.max(e.max, o)) }

    function $(t) { return t * (C / 180) }

    function Y(t) { return t * (180 / C) }

    function U(t) { if (!a(t)) return; let e = 1,
            i = 0; for (; Math.round(t * e) / e !== t;) e *= 10, i++; return i }

    function X(t, e) { const i = e.x - t.x,
            s = e.y - t.y,
            n = Math.sqrt(i * i + s * s); let o = Math.atan2(s, i); return o < -.5 * C && (o += O), { angle: o, distance: n } }

    function q(t, e) { return Math.sqrt(Math.pow(e.x - t.x, 2) + Math.pow(e.y - t.y, 2)) }

    function K(t, e) { return (t - e + A) % O - C }

    function G(t) { return (t % O + O) % O }

    function Z(t, e, i, s) { const n = G(t),
            o = G(e),
            a = G(i),
            r = G(o - n),
            l = G(a - n),
            h = G(n - o),
            c = G(n - a); return n === o || n === a || s && o === a || r > l && h < c }

    function J(t, e, i) { return Math.max(e, Math.min(i, t)) }

    function Q(t) { return J(t, -32768, 32767) }

    function tt(t, e, i, s = 1e-6) { return t >= Math.min(e, i) - s && t <= Math.max(e, i) + s }

    function et(t, e, i) { i = i || (i => t[i] < e); let s, n = t.length - 1,
            o = 0; for (; n - o > 1;) s = o + n >> 1, i(s) ? o = s : n = s; return { lo: o, hi: n } } const it = (t, e, i, s) => et(t, i, s ? s => { const n = t[s][e]; return n < i || n === i && t[s + 1][e] === i } : s => t[s][e] < i),
        st = (t, e, i) => et(t, i, (s => t[s][e] >= i));

    function nt(t, e, i) { let s = 0,
            n = t.length; for (; s < n && t[s] < e;) s++; for (; n > s && t[n - 1] > i;) n--; return s > 0 || n < t.length ? t.slice(s, n) : t } const ot = ["push", "pop", "shift", "splice", "unshift"];

    function at(t, e) { t._chartjs ? t._chartjs.listeners.push(e) : (Object.defineProperty(t, "_chartjs", { configurable: !0, enumerable: !1, value: { listeners: [e] } }), ot.forEach((e => { const i = "_onData" + w(e),
                s = t[e];
            Object.defineProperty(t, e, { configurable: !0, enumerable: !1, value(...e) { const n = s.apply(this, e); return t._chartjs.listeners.forEach((t => { "function" == typeof t[i] && t[i](...e) })), n } }) }))) }

    function rt(t, e) { const i = t._chartjs; if (!i) return; const s = i.listeners,
            n = s.indexOf(e); - 1 !== n && s.splice(n, 1), s.length > 0 || (ot.forEach((e => { delete t[e] })), delete t._chartjs) }

    function lt(t) { const e = new Set; let i, s; for (i = 0, s = t.length; i < s; ++i) e.add(t[i]); return e.size === s ? t : Array.from(e) } const ht = "undefined" == typeof window ? function(t) { return t() } : window.requestAnimationFrame;

    function ct(t, e) { let i = [],
            s = !1; return function(...n) { i = n, s || (s = !0, ht.call(window, (() => { s = !1, t.apply(e, i) }))) } }

    function dt(t, e) { let i; return function(...s) { return e ? (clearTimeout(i), i = setTimeout(t, e, s)) : t.apply(this, s), e } } const ut = t => "start" === t ? "left" : "end" === t ? "right" : "center",
        ft = (t, e, i) => "start" === t ? e : "end" === t ? i : (e + i) / 2,
        gt = (t, e, i, s) => t === (s ? "left" : "right") ? i : "center" === t ? (e + i) / 2 : e;

    function pt(t, e, i) { const s = e.length; let n = 0,
            o = s; if (t._sorted) { const { iScale: a, _parsed: r } = t, l = a.axis, { min: h, max: c, minDefined: d, maxDefined: u } = a.getUserBounds();
            d && (n = J(Math.min(it(r, a.axis, h).lo, i ? s : it(e, l, a.getPixelForValue(h)).lo), 0, s - 1)), o = u ? J(Math.max(it(r, a.axis, c, !0).hi + 1, i ? 0 : it(e, l, a.getPixelForValue(c), !0).hi + 1), n, s) - n : s - n } return { start: n, count: o } }

    function mt(t) { const { xScale: e, yScale: i, _scaleRanges: s } = t, n = { xmin: e.min, xmax: e.max, ymin: i.min, ymax: i.max }; if (!s) return t._scaleRanges = n, !0; const o = s.xmin !== e.min || s.xmax !== e.max || s.ymin !== i.min || s.ymax !== i.max; return Object.assign(s, n), o }
    class bt { constructor() { this._request = null, this._charts = new Map, this._running = !1, this._lastDate = void 0 }
        _notify(t, e, i, s) { const n = e.listeners[s],
                o = e.duration;
            n.forEach((s => s({ chart: t, initial: e.initial, numSteps: o, currentStep: Math.min(i - e.start, o) }))) }
        _refresh() { this._request || (this._running = !0, this._request = ht.call(window, (() => { this._update(), this._request = null, this._running && this._refresh() }))) }
        _update(t = Date.now()) { let e = 0;
            this._charts.forEach(((i, s) => { if (!i.running || !i.items.length) return; const n = i.items; let o, a = n.length - 1,
                    r = !1; for (; a >= 0; --a) o = n[a], o._active ? (o._total > i.duration && (i.duration = o._total), o.tick(t), r = !0) : (n[a] = n[n.length - 1], n.pop());
                r && (s.draw(), this._notify(s, i, t, "progress")), n.length || (i.running = !1, this._notify(s, i, t, "complete"), i.initial = !1), e += n.length })), this._lastDate = t, 0 === e && (this._running = !1) }
        _getAnims(t) { const e = this._charts; let i = e.get(t); return i || (i = { running: !1, initial: !0, items: [], listeners: { complete: [], progress: [] } }, e.set(t, i)), i }
        listen(t, e, i) { this._getAnims(t).listeners[e].push(i) }
        add(t, e) { e && e.length && this._getAnims(t).items.push(...e) }
        has(t) { return this._getAnims(t).items.length > 0 }
        start(t) { const e = this._charts.get(t);
            e && (e.running = !0, e.start = Date.now(), e.duration = e.items.reduce(((t, e) => Math.max(t, e._duration)), 0), this._refresh()) }
        running(t) { if (!this._running) return !1; const e = this._charts.get(t); return !!(e && e.running && e.items.length) }
        stop(t) { const e = this._charts.get(t); if (!e || !e.items.length) return; const i = e.items; let s = i.length - 1; for (; s >= 0; --s) i[s].cancel();
            e.items = [], this._notify(t, e, Date.now(), "complete") }
        remove(t) { return this._charts.delete(t) } } var xt = new bt;
    /*!
     * @kurkle/color v0.3.0
     * https://github.com/kurkle/color#readme
     * (c) 2022 Jukka Kurkela
     * Released under the MIT License
     */
    function _t(t) { return t + .5 | 0 } const yt = (t, e, i) => Math.max(Math.min(t, i), e);

    function vt(t) { return yt(_t(2.55 * t), 0, 255) }

    function Mt(t) { return yt(_t(255 * t), 0, 255) }

    function wt(t) { return yt(_t(t / 2.55) / 100, 0, 1) }

    function kt(t) { return yt(_t(100 * t), 0, 100) } const St = { 0: 0, 1: 1, 2: 2, 3: 3, 4: 4, 5: 5, 6: 6, 7: 7, 8: 8, 9: 9, A: 10, B: 11, C: 12, D: 13, E: 14, F: 15, a: 10, b: 11, c: 12, d: 13, e: 14, f: 15 },
        Pt = [...
            "0123456789ABCDEF"
        ],
        Dt = t => Pt[15 & t],
        Ct = t => Pt[(240 & t) >> 4] + Pt[15 & t],
        Ot = t => (240 & t) >> 4 == (15 & t);

    function At(t) { var e = (t => Ot(t.r) && Ot(t.g) && Ot(t.b) && Ot(t.a))(t) ? Dt : Ct; return t ? "#" + e(t.r) + e(t.g) + e(t.b) + ((t, e) => t < 255 ? e(t) : "")(t.a, e) : void 0 } const Tt = /^(hsla?|hwb|hsv)\(\s*([-+.e\d]+)(?:deg)?[\s,]+([-+.e\d]+)%[\s,]+([-+.e\d]+)%(?:[\s,]+([-+.e\d]+)(%)?)?\s*\)$/;

    function Lt(t, e, i) { const s = e * Math.min(i, 1 - i),
            n = (e, n = (e + t / 30) % 12) => i - s * Math.max(Math.min(n - 3, 9 - n, 1), -1); return [n(0), n(8), n(4)] }

    function Et(t, e, i) { const s = (s, n = (s + t / 60) % 6) => i - i * e * Math.max(Math.min(n, 4 - n, 1), 0); return [s(5), s(3), s(1)] }

    function Rt(t, e, i) { const s = Lt(t, 1, .5); let n; for (e + i > 1 && (n = 1 / (e + i), e *= n, i *= n), n = 0; n < 3; n++) s[n] *= 1 - e - i, s[n] += e; return s }

    function It(t) { const e = t.r / 255,
            i = t.g / 255,
            s = t.b / 255,
            n = Math.max(e, i, s),
            o = Math.min(e, i, s),
            a = (n + o) / 2; let r, l, h; return n !== o && (h = n - o, l = a > .5 ? h / (2 - n - o) : h / (n + o), r = function(t, e, i, s, n) { return t === n ? (e - i) / s + (e < i ? 6 : 0) : e === n ? (i - t) / s + 2 : (t - e) / s + 4 }(e, i, s, h, n), r = 60 * r + .5), [0 | r, l || 0, a] }

    function zt(t, e, i, s) { return (Array.isArray(e) ? t(e[0], e[1], e[2]) : t(e, i, s)).map(Mt) }

    function Ft(t, e, i) { return zt(Lt, t, e, i) }

    function Vt(t) { return (t % 360 + 360) % 360 }

    function Bt(t) { const e = Tt.exec(t); let i, s = 255; if (!e) return;
        e[5] !== i && (s = e[6] ? vt(+e[5]) : Mt(+e[5])); const n = Vt(+e[2]),
            o = +e[3] / 100,
            a = +e[4] / 100; return i = "hwb" === e[1] ? function(t, e, i) { return zt(Rt, t, e, i) }(n, o, a) : "hsv" === e[1] ? function(t, e, i) { return zt(Et, t, e, i) }(n, o, a) : Ft(n, o, a), { r: i[0], g: i[1], b: i[2], a: s } } const Nt = { x: "dark", Z: "light", Y: "re", X: "blu", W: "gr", V: "medium", U: "slate", A: "ee", T: "ol", S: "or", B: "ra", C: "lateg", D: "ights", R: "in", Q: "turquois", E: "hi", P: "ro", O: "al", N: "le", M: "de", L: "yello", F: "en", K: "ch", G: "arks", H: "ea", I: "ightg", J: "wh" },
        Wt = { OiceXe: "f0f8ff", antiquewEte: "faebd7", aqua: "ffff", aquamarRe: "7fffd4", azuY: "f0ffff", beige: "f5f5dc", bisque: "ffe4c4", black: "0", blanKedOmond: "ffebcd", Xe: "ff", XeviTet: "8a2be2", bPwn: "a52a2a", burlywood: "deb887", caMtXe: "5f9ea0", KartYuse: "7fff00", KocTate: "d2691e", cSO: "ff7f50", cSnflowerXe: "6495ed", cSnsilk: "fff8dc", crimson: "dc143c", cyan: "ffff", xXe: "8b", xcyan: "8b8b", xgTMnPd: "b8860b", xWay: "a9a9a9", xgYF: "6400", xgYy: "a9a9a9", xkhaki: "bdb76b", xmagFta: "8b008b", xTivegYF: "556b2f", xSange: "ff8c00", xScEd: "9932cc", xYd: "8b0000", xsOmon: "e9967a", xsHgYF: "8fbc8f", xUXe: "483d8b", xUWay: "2f4f4f", xUgYy: "2f4f4f", xQe: "ced1", xviTet: "9400d3", dAppRk: "ff1493", dApskyXe: "bfff", dimWay: "696969", dimgYy: "696969", dodgerXe: "1e90ff", fiYbrick: "b22222", flSOwEte: "fffaf0", foYstWAn: "228b22", fuKsia: "ff00ff", gaRsbSo: "dcdcdc", ghostwEte: "f8f8ff", gTd: "ffd700", gTMnPd: "daa520", Way: "808080", gYF: "8000", gYFLw: "adff2f", gYy: "808080", honeyMw: "f0fff0", hotpRk: "ff69b4", RdianYd: "cd5c5c", Rdigo: "4b0082", ivSy: "fffff0", khaki: "f0e68c", lavFMr: "e6e6fa", lavFMrXsh: "fff0f5", lawngYF: "7cfc00", NmoncEffon: "fffacd", ZXe: "add8e6", ZcSO: "f08080", Zcyan: "e0ffff", ZgTMnPdLw: "fafad2", ZWay: "d3d3d3", ZgYF: "90ee90", ZgYy: "d3d3d3", ZpRk: "ffb6c1", ZsOmon: "ffa07a", ZsHgYF: "20b2aa", ZskyXe: "87cefa", ZUWay: "778899", ZUgYy: "778899", ZstAlXe: "b0c4de", ZLw: "ffffe0", lime: "ff00", limegYF: "32cd32", lRF: "faf0e6", magFta: "ff00ff", maPon: "800000", VaquamarRe: "66cdaa", VXe: "cd", VScEd: "ba55d3", VpurpN: "9370db", VsHgYF: "3cb371", VUXe: "7b68ee", VsprRggYF: "fa9a", VQe: "48d1cc", VviTetYd: "c71585", midnightXe: "191970", mRtcYam: "f5fffa", mistyPse: "ffe4e1", moccasR: "ffe4b5", navajowEte: "ffdead", navy: "80", Tdlace: "fdf5e6", Tive: "808000", TivedBb: "6b8e23", Sange: "ffa500", SangeYd: "ff4500", ScEd: "da70d6", pOegTMnPd: "eee8aa", pOegYF: "98fb98", pOeQe: "afeeee", pOeviTetYd: "db7093", papayawEp: "ffefd5", pHKpuff: "ffdab9", peru: "cd853f", pRk: "ffc0cb", plum: "dda0dd", powMrXe: "b0e0e6", purpN: "800080", YbeccapurpN: "663399", Yd: "ff0000", Psybrown: "bc8f8f", PyOXe: "4169e1", saddNbPwn: "8b4513", sOmon: "fa8072", sandybPwn: "f4a460", sHgYF: "2e8b57", sHshell: "fff5ee", siFna: "a0522d", silver: "c0c0c0", skyXe: "87ceeb", UXe: "6a5acd", UWay: "708090", UgYy: "708090", snow: "fffafa", sprRggYF: "ff7f", stAlXe: "4682b4", tan: "d2b48c", teO: "8080", tEstN: "d8bfd8", tomato: "ff6347", Qe: "40e0d0", viTet: "ee82ee", JHt: "f5deb3", wEte: "ffffff", wEtesmoke: "f5f5f5", Lw: "ffff00", LwgYF: "9acd32" }; let Ht;

    function jt(t) { Ht || (Ht = function() { const t = {},
                e = Object.keys(Wt),
                i = Object.keys(Nt); let s, n, o, a, r; for (s = 0; s < e.length; s++) { for (a = r = e[s], n = 0; n < i.length; n++) o = i[n], r = r.replace(o, Nt[o]);
                o = parseInt(Wt[a], 16), t[r] = [o >> 16 & 255, o >> 8 & 255, 255 & o] } return t }(), Ht.transparent = [0, 0, 0, 0]); const e = Ht[t.toLowerCase()]; return e && { r: e[0], g: e[1], b: e[2], a: 4 === e.length ? e[3] : 255 } } const $t = /^rgba?\(\s*([-+.\d]+)(%)?[\s,]+([-+.e\d]+)(%)?[\s,]+([-+.e\d]+)(%)?(?:[\s,/]+([-+.e\d]+)(%)?)?\s*\)$/; const Yt = t => t <= .0031308 ? 12.92 * t : 1.055 * Math.pow(t, 1 / 2.4) - .055,
        Ut = t => t <= .04045 ? t / 12.92 : Math.pow((t + .055) / 1.055, 2.4);

    function Xt(t, e, i) { if (t) { let s = It(t);
            s[e] = Math.max(0, Math.min(s[e] + s[e] * i, 0 === e ? 360 : 1)), s = Ft(s), t.r = s[0], t.g = s[1], t.b = s[2] } }

    function qt(t, e) { return t ? Object.assign(e || {}, t) : t }

    function Kt(t) { var e = { r: 0, g: 0, b: 0, a: 255 }; return Array.isArray(t) ? t.length >= 3 && (e = { r: t[0], g: t[1], b: t[2], a: 255 }, t.length > 3 && (e.a = Mt(t[3]))) : (e = qt(t, { r: 0, g: 0, b: 0, a: 1 })).a = Mt(e.a), e }

    function Gt(t) { return "r" === t.charAt(0) ? function(t) { const e = $t.exec(t); let i, s, n, o = 255; if (e) { if (e[7] !== i) { const t = +e[7];
                    o = e[8] ? vt(t) : yt(255 * t, 0, 255) } return i = +e[1], s = +e[3], n = +e[5], i = 255 & (e[2] ? vt(i) : yt(i, 0, 255)), s = 255 & (e[4] ? vt(s) : yt(s, 0, 255)), n = 255 & (e[6] ? vt(n) : yt(n, 0, 255)), { r: i, g: s, b: n, a: o } } }(t) : Bt(t) }
    class Zt { constructor(t) { if (t instanceof Zt) return t; const e = typeof t; let i; var s, n, o; "object" === e ? i = Kt(t) : "string" === e && (o = (s = t).length, "#" === s[0] && (4 === o || 5 === o ? n = { r: 255 & 17 * St[s[1]], g: 255 & 17 * St[s[2]], b: 255 & 17 * St[s[3]], a: 5 === o ? 17 * St[s[4]] : 255 } : 7 !== o && 9 !== o || (n = { r: St[s[1]] << 4 | St[s[2]], g: St[s[3]] << 4 | St[s[4]], b: St[s[5]] << 4 | St[s[6]], a: 9 === o ? St[s[7]] << 4 | St[s[8]] : 255 })), i = n || jt(t) || Gt(t)), this._rgb = i, this._valid = !!i }
        get valid() { return this._valid }
        get rgb() { var t = qt(this._rgb); return t && (t.a = wt(t.a)), t }
        set rgb(t) { this._rgb = Kt(t) }
        rgbString() { return this._valid ? (t = this._rgb) && (t.a < 255 ? `rgba(${t.r}, ${t.g}, ${t.b}, ${wt(t.a)})` : `rgb(${t.r}, ${t.g}, ${t.b})`) : void 0; var t }
        hexString() { return this._valid ? At(this._rgb) : void 0 }
        hslString() { return this._valid ? function(t) { if (!t) return; const e = It(t),
                    i = e[0],
                    s = kt(e[1]),
                    n = kt(e[2]); return t.a < 255 ? `hsla(${i}, ${s}%, ${n}%, ${wt(t.a)})` : `hsl(${i}, ${s}%, ${n}%)` }(this._rgb) : void 0 }
        mix(t, e) { if (t) { const i = this.rgb,
                    s = t.rgb; let n; const o = e === n ? .5 : e,
                    a = 2 * o - 1,
                    r = i.a - s.a,
                    l = ((a * r == -1 ? a : (a + r) / (1 + a * r)) + 1) / 2;
                n = 1 - l, i.r = 255 & l * i.r + n * s.r + .5, i.g = 255 & l * i.g + n * s.g + .5, i.b = 255 & l * i.b + n * s.b + .5, i.a = o * i.a + (1 - o) * s.a, this.rgb = i } return this }
        interpolate(t, e) { return t && (this._rgb = function(t, e, i) { const s = Ut(wt(t.r)),
                    n = Ut(wt(t.g)),
                    o = Ut(wt(t.b)); return { r: Mt(Yt(s + i * (Ut(wt(e.r)) - s))), g: Mt(Yt(n + i * (Ut(wt(e.g)) - n))), b: Mt(Yt(o + i * (Ut(wt(e.b)) - o))), a: t.a + i * (e.a - t.a) } }(this._rgb, t._rgb, e)), this }
        clone() { return new Zt(this.rgb) }
        alpha(t) { return this._rgb.a = Mt(t), this }
        clearer(t) { return this._rgb.a *= 1 - t, this }
        greyscale() { const t = this._rgb,
                e = _t(.3 * t.r + .59 * t.g + .11 * t.b); return t.r = t.g = t.b = e, this }
        opaquer(t) { return this._rgb.a *= 1 + t, this }
        negate() { const t = this._rgb; return t.r = 255 - t.r, t.g = 255 - t.g, t.b = 255 - t.b, this }
        lighten(t) { return Xt(this._rgb, 2, t), this }
        darken(t) { return Xt(this._rgb, 2, -t), this }
        saturate(t) { return Xt(this._rgb, 1, t), this }
        desaturate(t) { return Xt(this._rgb, 1, -t), this }
        rotate(t) { return function(t, e) { var i = It(t);
                i[0] = Vt(i[0] + e), i = Ft(i), t.r = i[0], t.g = i[1], t.b = i[2] }(this._rgb, t), this } }

    function Jt(t) { if (t && "object" == typeof t) { const e = t.toString(); return "[object CanvasPattern]" === e || "[object CanvasGradient]" === e } return !1 }

    function Qt(t) { return Jt(t) ? t : new Zt(t) }

    function te(t) { return Jt(t) ? t : new Zt(t).saturate(.5).darken(.1).hexString() } const ee = ["x", "y", "borderWidth", "radius", "tension"],
        ie = ["color", "borderColor", "backgroundColor"]; const se = new Map;

    function ne(t, e, i) { return function(t, e) { e = e || {}; const i = t + JSON.stringify(e); let s = se.get(i); return s || (s = new Intl.NumberFormat(t, e), se.set(i, s)), s }(e, i).format(t) } const oe = { values: t => n(t) ? t : "" + t, numeric(t, e, i) { if (0 === t) return "0"; const s = this.chart.options.locale; let n, o = t; if (i.length > 1) { const e = Math.max(Math.abs(i[0].value), Math.abs(i[i.length - 1].value));
                (e < 1e-4 || e > 1e15) && (n = "scientific"), o = function(t, e) { let i = e.length > 3 ? e[2].value - e[1].value : e[1].value - e[0].value;
                    Math.abs(i) >= 1 && t !== Math.floor(t) && (i = t - Math.floor(t)); return i }(t, i) } const a = z(Math.abs(o)),
                r = Math.max(Math.min(-1 * Math.floor(a), 20), 0),
                l = { notation: n, minimumFractionDigits: r, maximumFractionDigits: r }; return Object.assign(l, this.options.ticks.format), ne(t, s, l) }, logarithmic(t, e, i) { if (0 === t) return "0"; const s = i[e].significand || t / Math.pow(10, Math.floor(z(t))); return [1, 2, 3, 5, 10, 15].includes(s) || e > .8 * i.length ? oe.numeric.call(this, t, e, i) : "" } }; var ae = { formatters: oe }; const re = Object.create(null),
        le = Object.create(null);

    function he(t, e) { if (!e) return t; const i = e.split("."); for (let e = 0, s = i.length; e < s; ++e) { const s = i[e];
            t = t[s] || (t[s] = Object.create(null)) } return t }

    function ce(t, e, i) { return "string" == typeof e ? b(he(t, e), i) : b(he(t, ""), e) }
    class de { constructor(t, e) { this.animation = void 0, this.backgroundColor = "rgba(0,0,0,0.1)", this.borderColor = "rgba(0,0,0,0.1)", this.color = "#666", this.datasets = {}, this.devicePixelRatio = t => t.chart.platform.getDevicePixelRatio(), this.elements = {}, this.events = ["mousemove", "mouseout", "click", "touchstart", "touchmove"], this.font = { family: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif", size: 12, style: "normal", lineHeight: 1.2, weight: null }, this.hover = {}, this.hoverBackgroundColor = (t, e) => te(e.backgroundColor), this.hoverBorderColor = (t, e) => te(e.borderColor), this.hoverColor = (t, e) => te(e.color), this.indexAxis = "x", this.interaction = { mode: "nearest", intersect: !0, includeInvisible: !1 }, this.maintainAspectRatio = !0, this.onHover = null, this.onClick = null, this.parsing = !0, this.plugins = {}, this.responsive = !0, this.scale = void 0, this.scales = {}, this.showLine = !0, this.drawActiveElementsOnTop = !0, this.describe(t), this.apply(e) }
        set(t, e) { return ce(this, t, e) }
        get(t) { return he(this, t) }
        describe(t, e) { return ce(le, t, e) }
        override(t, e) { return ce(re, t, e) }
        route(t, e, i, s) { const n = he(this, t),
                a = he(this, i),
                r = "_" + e;
            Object.defineProperties(n, {
                [r]: { value: n[e], writable: !0 }, [e]: { enumerable: !0, get() { const t = this[r],
                            e = a[s]; return o(t) ? Object.assign({}, e, t) : l(t, e) }, set(t) { this[r] = t } } }) }
        apply(t) { t.forEach((t => t(this))) } } var ue = new de({ _scriptable: t => !t.startsWith("on"), _indexable: t => "events" !== t, hover: { _fallback: "interaction" }, interaction: { _scriptable: !1, _indexable: !1 } }, [function(t) { t.set("animation", { delay: void 0, duration: 1e3, easing: "easeOutQuart", fn: void 0, from: void 0, loop: void 0, to: void 0, type: void 0 }), t.describe("animation", { _fallback: !1, _indexable: !1, _scriptable: t => "onProgress" !== t && "onComplete" !== t && "fn" !== t }), t.set("animations", { colors: { type: "color", properties: ie }, numbers: { type: "number", properties: ee } }), t.describe("animations", { _fallback: "animation" }), t.set("transitions", { active: { animation: { duration: 400 } }, resize: { animation: { duration: 0 } }, show: { animations: { colors: { from: "transparent" }, visible: { type: "boolean", duration: 0 } } }, hide: { animations: { colors: { to: "transparent" }, visible: { type: "boolean", easing: "linear", fn: t => 0 | t } } } }) }, function(t) { t.set("layout", { autoPadding: !0, padding: { top: 0, right: 0, bottom: 0, left: 0 } }) }, function(t) { t.set("scale", { display: !0, offset: !1, reverse: !1, beginAtZero: !1, bounds: "ticks", grace: 0, grid: { display: !0, lineWidth: 1, drawOnChartArea: !0, drawTicks: !0, tickLength: 8, tickWidth: (t, e) => e.lineWidth, tickColor: (t, e) => e.color, offset: !1 }, border: { display: !0, dash: [], dashOffset: 0, width: 1 }, title: { display: !1, text: "", padding: { top: 4, bottom: 4 } }, ticks: { minRotation: 0, maxRotation: 50, mirror: !1, textStrokeWidth: 0, textStrokeColor: "", padding: 3, display: !0, autoSkip: !0, autoSkipPadding: 3, labelOffset: 0, callback: ae.formatters.values, minor: {}, major: {}, align: "center", crossAlign: "near", showLabelBackdrop: !1, backdropColor: "rgba(255, 255, 255, 0.75)", backdropPadding: 2 } }), t.route("scale.ticks", "color", "", "color"), t.route("scale.grid", "color", "", "borderColor"), t.route("scale.border", "color", "", "borderColor"), t.route("scale.title", "color", "", "color"), t.describe("scale", { _fallback: !1, _scriptable: t => !t.startsWith("before") && !t.startsWith("after") && "callback" !== t && "parser" !== t, _indexable: t => "borderDash" !== t && "tickBorderDash" !== t && "dash" !== t }), t.describe("scales", { _fallback: "scale" }), t.describe("scale.ticks", { _scriptable: t => "backdropPadding" !== t && "callback" !== t, _indexable: t => "backdropPadding" !== t }) }]);

    function fe() { return "undefined" != typeof window && "undefined" != typeof document }

    function ge(t) { let e = t.parentNode; return e && "[object ShadowRoot]" === e.toString() && (e = e.host), e }

    function pe(t, e, i) { let s; return "string" == typeof t ? (s = parseInt(t, 10), -1 !== t.indexOf("%") && (s = s / 100 * e.parentNode[i])) : s = t, s } const me = t => t.ownerDocument.defaultView.getComputedStyle(t, null);

    function be(t, e) { return me(t).getPropertyValue(e) } const xe = ["top", "right", "bottom", "left"];

    function _e(t, e, i) { const s = {};
        i = i ? "-" + i : ""; for (let n = 0; n < 4; n++) { const o = xe[n];
            s[o] = parseFloat(t[e + "-" + o + i]) || 0 } return s.width = s.left + s.right, s.height = s.top + s.bottom, s }

    function ye(t, e) { if ("native" in t) return t; const { canvas: i, currentDevicePixelRatio: s } = e, n = me(i), o = "border-box" === n.boxSizing, a = _e(n, "padding"), r = _e(n, "border", "width"), { x: l, y: h, box: c } = function(t, e) { const i = t.touches,
                s = i && i.length ? i[0] : t,
                { offsetX: n, offsetY: o } = s; let a, r, l = !1; if (((t, e, i) => (t > 0 || e > 0) && (!i || !i.shadowRoot))(n, o, t.target)) a = n, r = o;
            else { const t = e.getBoundingClientRect();
                a = s.clientX - t.left, r = s.clientY - t.top, l = !0 } return { x: a, y: r, box: l } }(t, i), d = a.left + (c && r.left), u = a.top + (c && r.top); let { width: f, height: g } = e; return o && (f -= a.width + r.width, g -= a.height + r.height), { x: Math.round((l - d) / f * i.width / s), y: Math.round((h - u) / g * i.height / s) } } const ve = t => Math.round(10 * t) / 10;

    function Me(t, e, i, s) { const n = me(t),
            o = _e(n, "margin"),
            a = pe(n.maxWidth, t, "clientWidth") || T,
            r = pe(n.maxHeight, t, "clientHeight") || T,
            l = function(t, e, i) { let s, n; if (void 0 === e || void 0 === i) { const o = ge(t); if (o) { const t = o.getBoundingClientRect(),
                            a = me(o),
                            r = _e(a, "border", "width"),
                            l = _e(a, "padding");
                        e = t.width - l.width - r.width, i = t.height - l.height - r.height, s = pe(a.maxWidth, o, "clientWidth"), n = pe(a.maxHeight, o, "clientHeight") } else e = t.clientWidth, i = t.clientHeight } return { width: e, height: i, maxWidth: s || T, maxHeight: n || T } }(t, e, i); let { width: h, height: c } = l; if ("content-box" === n.boxSizing) { const t = _e(n, "border", "width"),
                e = _e(n, "padding");
            h -= e.width + t.width, c -= e.height + t.height }
        h = Math.max(0, h - o.width), c = Math.max(0, s ? h / s : c - o.height), h = ve(Math.min(h, a, l.maxWidth)), c = ve(Math.min(c, r, l.maxHeight)), h && !c && (c = ve(h / 2)); return (void 0 !== e || void 0 !== i) && s && l.height && c > l.height && (c = l.height, h = ve(Math.floor(c * s))), { width: h, height: c } }

    function we(t, e, i) { const s = e || 1,
            n = Math.floor(t.height * s),
            o = Math.floor(t.width * s);
        t.height = Math.floor(t.height), t.width = Math.floor(t.width); const a = t.canvas; return a.style && (i || !a.style.height && !a.style.width) && (a.style.height = `${t.height}px`, a.style.width = `${t.width}px`), (t.currentDevicePixelRatio !== s || a.height !== n || a.width !== o) && (t.currentDevicePixelRatio = s, a.height = n, a.width = o, t.ctx.setTransform(s, 0, 0, s, 0, 0), !0) } const ke = function() { let t = !1; try { const e = {get passive() { return t = !0, !1 } };
            window.addEventListener("test", null, e), window.removeEventListener("test", null, e) } catch (t) {} return t }();

    function Se(t, e) { const i = be(t, e),
            s = i && i.match(/^(\d+)(\.\d+)?px$/); return s ? +s[1] : void 0 }

    function Pe(t) { return !t || s(t.size) || s(t.family) ? null : (t.style ? t.style + " " : "") + (t.weight ? t.weight + " " : "") + t.size + "px " + t.family }

    function De(t, e, i, s, n) { let o = e[n]; return o || (o = e[n] = t.measureText(n).width, i.push(n)), o > s && (s = o), s }

    function Ce(t, e, i, s) { let o = (s = s || {}).data = s.data || {},
            a = s.garbageCollect = s.garbageCollect || [];
        s.font !== e && (o = s.data = {}, a = s.garbageCollect = [], s.font = e), t.save(), t.font = e; let r = 0; const l = i.length; let h, c, d, u, f; for (h = 0; h < l; h++)
            if (u = i[h], null != u && !0 !== n(u)) r = De(t, o, a, r, u);
            else if (n(u))
            for (c = 0, d = u.length; c < d; c++) f = u[c], null == f || n(f) || (r = De(t, o, a, r, f));
        t.restore(); const g = a.length / 2; if (g > i.length) { for (h = 0; h < g; h++) delete o[a[h]];
            a.splice(0, g) } return r }

    function Oe(t, e, i) { const s = t.currentDevicePixelRatio,
            n = 0 !== i ? Math.max(i / 2, .5) : 0; return Math.round((e - n) * s) / s + n }

    function Ae(t, e) {
        (e = e || t.getContext("2d")).save(), e.resetTransform(), e.clearRect(0, 0, t.width, t.height), e.restore() }

    function Te(t, e, i, s) { Le(t, e, i, s, null) }

    function Le(t, e, i, s, n) { let o, a, r, l, h, c, d, u; const f = e.pointStyle,
            g = e.rotation,
            p = e.radius; let m = (g || 0) * L; if (f && "object" == typeof f && (o = f.toString(), "[object HTMLImageElement]" === o || "[object HTMLCanvasElement]" === o)) return t.save(), t.translate(i, s), t.rotate(m), t.drawImage(f, -f.width / 2, -f.height / 2, f.width, f.height), void t.restore(); if (!(isNaN(p) || p <= 0)) { switch (t.beginPath(), f) { default: n ? t.ellipse(i, s, n / 2, p, 0, 0, O) : t.arc(i, s, p, 0, O), t.closePath(); break;
                case "triangle":
                        c = n ? n / 2 : p, t.moveTo(i + Math.sin(m) * c, s - Math.cos(m) * p), m += I, t.lineTo(i + Math.sin(m) * c, s - Math.cos(m) * p), m += I, t.lineTo(i + Math.sin(m) * c, s - Math.cos(m) * p), t.closePath(); break;
                case "rectRounded":
                        h = .516 * p, l = p - h, a = Math.cos(m + R) * l, d = Math.cos(m + R) * (n ? n / 2 - h : l), r = Math.sin(m + R) * l, u = Math.sin(m + R) * (n ? n / 2 - h : l), t.arc(i - d, s - r, h, m - C, m - E), t.arc(i + u, s - a, h, m - E, m), t.arc(i + d, s + r, h, m, m + E), t.arc(i - u, s + a, h, m + E, m + C), t.closePath(); break;
                case "rect":
                        if (!g) { l = Math.SQRT1_2 * p, c = n ? n / 2 : l, t.rect(i - c, s - l, 2 * c, 2 * l); break }m += R;
                case "rectRot":
                        d = Math.cos(m) * (n ? n / 2 : p), a = Math.cos(m) * p, r = Math.sin(m) * p, u = Math.sin(m) * (n ? n / 2 : p), t.moveTo(i - d, s - r), t.lineTo(i + u, s - a), t.lineTo(i + d, s + r), t.lineTo(i - u, s + a), t.closePath(); break;
                case "crossRot":
                        m += R;
                case "cross":
                        d = Math.cos(m) * (n ? n / 2 : p), a = Math.cos(m) * p, r = Math.sin(m) * p, u = Math.sin(m) * (n ? n / 2 : p), t.moveTo(i - d, s - r), t.lineTo(i + d, s + r), t.moveTo(i + u, s - a), t.lineTo(i - u, s + a); break;
                case "star":
                        d = Math.cos(m) * (n ? n / 2 : p), a = Math.cos(m) * p, r = Math.sin(m) * p, u = Math.sin(m) * (n ? n / 2 : p), t.moveTo(i - d, s - r), t.lineTo(i + d, s + r), t.moveTo(i + u, s - a), t.lineTo(i - u, s + a), m += R, d = Math.cos(m) * (n ? n / 2 : p), a = Math.cos(m) * p, r = Math.sin(m) * p, u = Math.sin(m) * (n ? n / 2 : p), t.moveTo(i - d, s - r), t.lineTo(i + d, s + r), t.moveTo(i + u, s - a), t.lineTo(i - u, s + a); break;
                case "line":
                        a = n ? n / 2 : Math.cos(m) * p, r = Math.sin(m) * p, t.moveTo(i - a, s - r), t.lineTo(i + a, s + r); break;
                case "dash":
                        t.moveTo(i, s), t.lineTo(i + Math.cos(m) * (n ? n / 2 : p), s + Math.sin(m) * p); break;
                case !1:
                        t.closePath() }
            t.fill(), e.borderWidth > 0 && t.stroke() } }

    function Ee(t, e, i) { return i = i || .5, !e || t && t.x > e.left - i && t.x < e.right + i && t.y > e.top - i && t.y < e.bottom + i }

    function Re(t, e) { t.save(), t.beginPath(), t.rect(e.left, e.top, e.right - e.left, e.bottom - e.top), t.clip() }

    function Ie(t) { t.restore() }

    function ze(t, e, i, s, n) { if (!e) return t.lineTo(i.x, i.y); if ("middle" === n) { const s = (e.x + i.x) / 2;
            t.lineTo(s, e.y), t.lineTo(s, i.y) } else "after" === n != !!s ? t.lineTo(e.x, i.y) : t.lineTo(i.x, e.y);
        t.lineTo(i.x, i.y) }

    function Fe(t, e, i, s) { if (!e) return t.lineTo(i.x, i.y);
        t.bezierCurveTo(s ? e.cp1x : e.cp2x, s ? e.cp1y : e.cp2y, s ? i.cp2x : i.cp1x, s ? i.cp2y : i.cp1y, i.x, i.y) }

    function Ve(t, e, i, o, a, r = {}) { const l = n(e) ? e : [e],
            h = r.strokeWidth > 0 && "" !== r.strokeColor; let c, d; for (t.save(), t.font = a.string, function(t, e) { e.translation && t.translate(e.translation[0], e.translation[1]);
                s(e.rotation) || t.rotate(e.rotation);
                e.color && (t.fillStyle = e.color);
                e.textAlign && (t.textAlign = e.textAlign);
                e.textBaseline && (t.textBaseline = e.textBaseline) }(t, r), c = 0; c < l.length; ++c) d = l[c], r.backdrop && Ne(t, r.backdrop), h && (r.strokeColor && (t.strokeStyle = r.strokeColor), s(r.strokeWidth) || (t.lineWidth = r.strokeWidth), t.strokeText(d, i, o, r.maxWidth)), t.fillText(d, i, o, r.maxWidth), Be(t, i, o, d, r), o += a.lineHeight;
        t.restore() }

    function Be(t, e, i, s, n) { if (n.strikethrough || n.underline) { const o = t.measureText(s),
                a = e - o.actualBoundingBoxLeft,
                r = e + o.actualBoundingBoxRight,
                l = i - o.actualBoundingBoxAscent,
                h = i + o.actualBoundingBoxDescent,
                c = n.strikethrough ? (l + h) / 2 : h;
            t.strokeStyle = t.fillStyle, t.beginPath(), t.lineWidth = n.decorationWidth || 2, t.moveTo(a, c), t.lineTo(r, c), t.stroke() } }

    function Ne(t, e) { const i = t.fillStyle;
        t.fillStyle = e.color, t.fillRect(e.left, e.top, e.width, e.height), t.fillStyle = i }

    function We(t, e) { const { x: i, y: s, w: n, h: o, radius: a } = e;
        t.arc(i + a.topLeft, s + a.topLeft, a.topLeft, -E, C, !0), t.lineTo(i, s + o - a.bottomLeft), t.arc(i + a.bottomLeft, s + o - a.bottomLeft, a.bottomLeft, C, E, !0), t.lineTo(i + n - a.bottomRight, s + o), t.arc(i + n - a.bottomRight, s + o - a.bottomRight, a.bottomRight, E, 0, !0), t.lineTo(i + n, s + a.topRight), t.arc(i + n - a.topRight, s + a.topRight, a.topRight, 0, -E, !0), t.lineTo(i + a.topLeft, s) }

    function He(t, e = [""], i = t, s, n = (() => t[0])) { k(s) || (s = Qe("_fallback", t)); const o = {
            [Symbol.toStringTag]: "Object", _cacheable: !0, _scopes: t, _rootScopes: i, _fallback: s, _getTarget: n, override: n => He([n, ...t], e, i, s) }; return new Proxy(o, { deleteProperty: (e, i) => (delete e[i], delete e._keys, delete t[0][i], !0), get: (i, s) => Xe(i, s, (() => function(t, e, i, s) { let n; for (const o of e)
                    if (n = Qe(Ye(o, t), i), k(n)) return Ue(t, n) ? Ze(i, s, t, n) : n }(s, e, t, i))), getOwnPropertyDescriptor: (t, e) => Reflect.getOwnPropertyDescriptor(t._scopes[0], e), getPrototypeOf: () => Reflect.getPrototypeOf(t[0]), has: (t, e) => ti(t).includes(e), ownKeys: t => ti(t), set(t, e, i) { const s = t._storage || (t._storage = n()); return t[e] = s[e] = i, delete t._keys, !0 } }) }

    function je(t, e, i, s) { const a = { _cacheable: !1, _proxy: t, _context: e, _subProxy: i, _stack: new Set, _descriptors: $e(t, s), setContext: e => je(t, e, i, s), override: n => je(t.override(n), e, i, s) }; return new Proxy(a, { deleteProperty: (e, i) => (delete e[i], delete t[i], !0), get: (t, e, i) => Xe(t, e, (() => function(t, e, i) { const { _proxy: s, _context: a, _subProxy: r, _descriptors: l } = t; let h = s[e];
                S(h) && l.isScriptable(e) && (h = function(t, e, i, s) { const { _proxy: n, _context: o, _subProxy: a, _stack: r } = i; if (r.has(t)) throw new Error("Recursion detected: " + Array.from(r).join("->") + "->" + t);
                    r.add(t), e = e(o, a || s), r.delete(t), Ue(t, e) && (e = Ze(n._scopes, n, t, e)); return e }(e, h, t, i));
                n(h) && h.length && (h = function(t, e, i, s) { const { _proxy: n, _context: a, _subProxy: r, _descriptors: l } = i; if (k(a.index) && s(t)) e = e[a.index % e.length];
                    else if (o(e[0])) { const i = e,
                            s = n._scopes.filter((t => t !== i));
                        e = []; for (const o of i) { const i = Ze(s, n, t, o);
                            e.push(je(i, a, r && r[t], l)) } } return e }(e, h, t, l.isIndexable));
                Ue(e, h) && (h = je(h, a, r && r[e], l)); return h }(t, e, i))), getOwnPropertyDescriptor: (e, i) => e._descriptors.allKeys ? Reflect.has(t, i) ? { enumerable: !0, configurable: !0 } : void 0 : Reflect.getOwnPropertyDescriptor(t, i), getPrototypeOf: () => Reflect.getPrototypeOf(t), has: (e, i) => Reflect.has(t, i), ownKeys: () => Reflect.ownKeys(t), set: (e, i, s) => (t[i] = s, delete e[i], !0) }) }

    function $e(t, e = { scriptable: !0, indexable: !0 }) { const { _scriptable: i = e.scriptable, _indexable: s = e.indexable, _allKeys: n = e.allKeys } = t; return { allKeys: n, scriptable: i, indexable: s, isScriptable: S(i) ? i : () => i, isIndexable: S(s) ? s : () => s } } const Ye = (t, e) => t ? t + w(e) : e,
        Ue = (t, e) => o(e) && "adapters" !== t && (null === Object.getPrototypeOf(e) || e.constructor === Object);

    function Xe(t, e, i) { if (Object.prototype.hasOwnProperty.call(t, e)) return t[e]; const s = i(); return t[e] = s, s }

    function qe(t, e, i) { return S(t) ? t(e, i) : t } const Ke = (t, e) => !0 === t ? e : "string" == typeof t ? M(e, t) : void 0;

    function Ge(t, e, i, s, n) { for (const o of e) { const e = Ke(i, o); if (e) { t.add(e); const o = qe(e._fallback, i, n); if (k(o) && o !== i && o !== s) return o } else if (!1 === e && k(s) && i !== s) return null } return !1 }

    function Ze(t, e, i, s) { const a = e._rootScopes,
            r = qe(e._fallback, i, s),
            l = [...t, ...a],
            h = new Set;
        h.add(s); let c = Je(h, l, i, r || i, s); return null !== c && ((!k(r) || r === i || (c = Je(h, l, r, c, s), null !== c)) && He(Array.from(h), [""], a, r, (() => function(t, e, i) { const s = t._getTarget();
            e in s || (s[e] = {}); const a = s[e]; if (n(a) && o(i)) return i; return a || {} }(e, i, s)))) }

    function Je(t, e, i, s, n) { for (; i;) i = Ge(t, e, i, s, n); return i }

    function Qe(t, e) { for (const i of e) { if (!i) continue; const e = i[t]; if (k(e)) return e } }

    function ti(t) { let e = t._keys; return e || (e = t._keys = function(t) { const e = new Set; for (const i of t)
                for (const t of Object.keys(i).filter((t => !t.startsWith("_")))) e.add(t); return Array.from(e) }(t._scopes)), e }

    function ei(t, e, i, s) { const { iScale: n } = t, { key: o = "r" } = this._parsing, a = new Array(s); let r, l, h, c; for (r = 0, l = s; r < l; ++r) h = r + i, c = e[h], a[r] = { r: n.parse(M(c, o), h) }; return a } const ii = Number.EPSILON || 1e-14,
        si = (t, e) => e < t.length && !t[e].skip && t[e],
        ni = t => "x" === t ? "y" : "x";

    function oi(t, e, i, s) { const n = t.skip ? e : t,
            o = e,
            a = i.skip ? e : i,
            r = q(o, n),
            l = q(a, o); let h = r / (r + l),
            c = l / (r + l);
        h = isNaN(h) ? 0 : h, c = isNaN(c) ? 0 : c; const d = s * h,
            u = s * c; return { previous: { x: o.x - d * (a.x - n.x), y: o.y - d * (a.y - n.y) }, next: { x: o.x + u * (a.x - n.x), y: o.y + u * (a.y - n.y) } } }

    function ai(t, e = "x") { const i = ni(e),
            s = t.length,
            n = Array(s).fill(0),
            o = Array(s); let a, r, l, h = si(t, 0); for (a = 0; a < s; ++a)
            if (r = l, l = h, h = si(t, a + 1), l) { if (h) { const t = h[e] - l[e];
                    n[a] = 0 !== t ? (h[i] - l[i]) / t : 0 }
                o[a] = r ? h ? F(n[a - 1]) !== F(n[a]) ? 0 : (n[a - 1] + n[a]) / 2 : n[a - 1] : n[a] }! function(t, e, i) { const s = t.length; let n, o, a, r, l, h = si(t, 0); for (let c = 0; c < s - 1; ++c) l = h, h = si(t, c + 1), l && h && (V(e[c], 0, ii) ? i[c] = i[c + 1] = 0 : (n = i[c] / e[c], o = i[c + 1] / e[c], r = Math.pow(n, 2) + Math.pow(o, 2), r <= 9 || (a = 3 / Math.sqrt(r), i[c] = n * a * e[c], i[c + 1] = o * a * e[c]))) }(t, n, o),
        function(t, e, i = "x") { const s = ni(i),
                n = t.length; let o, a, r, l = si(t, 0); for (let h = 0; h < n; ++h) { if (a = r, r = l, l = si(t, h + 1), !r) continue; const n = r[i],
                    c = r[s];
                a && (o = (n - a[i]) / 3, r[`cp1${i}`] = n - o, r[`cp1${s}`] = c - o * e[h]), l && (o = (l[i] - n) / 3, r[`cp2${i}`] = n + o, r[`cp2${s}`] = c + o * e[h]) } }(t, o, e) }

    function ri(t, e, i) { return Math.max(Math.min(t, i), e) }

    function li(t, e, i, s, n) { let o, a, r, l; if (e.spanGaps && (t = t.filter((t => !t.skip))), "monotone" === e.cubicInterpolationMode) ai(t, n);
        else { let i = s ? t[t.length - 1] : t[0]; for (o = 0, a = t.length; o < a; ++o) r = t[o], l = oi(i, r, t[Math.min(o + 1, a - (s ? 0 : 1)) % a], e.tension), r.cp1x = l.previous.x, r.cp1y = l.previous.y, r.cp2x = l.next.x, r.cp2y = l.next.y, i = r }
        e.capBezierPoints && function(t, e) { let i, s, n, o, a, r = Ee(t[0], e); for (i = 0, s = t.length; i < s; ++i) a = o, o = r, r = i < s - 1 && Ee(t[i + 1], e), o && (n = t[i], a && (n.cp1x = ri(n.cp1x, e.left, e.right), n.cp1y = ri(n.cp1y, e.top, e.bottom)), r && (n.cp2x = ri(n.cp2x, e.left, e.right), n.cp2y = ri(n.cp2y, e.top, e.bottom))) }(t, i) } const hi = t => 0 === t || 1 === t,
        ci = (t, e, i) => -Math.pow(2, 10 * (t -= 1)) * Math.sin((t - e) * O / i),
        di = (t, e, i) => Math.pow(2, -10 * t) * Math.sin((t - e) * O / i) + 1,
        ui = { linear: t => t, easeInQuad: t => t * t, easeOutQuad: t => -t * (t - 2), easeInOutQuad: t => (t /= .5) < 1 ? .5 * t * t : -.5 * (--t * (t - 2) - 1), easeInCubic: t => t * t * t, easeOutCubic: t => (t -= 1) * t * t + 1, easeInOutCubic: t => (t /= .5) < 1 ? .5 * t * t * t : .5 * ((t -= 2) * t * t + 2), easeInQuart: t => t * t * t * t, easeOutQuart: t => -((t -= 1) * t * t * t - 1), easeInOutQuart: t => (t /= .5) < 1 ? .5 * t * t * t * t : -.5 * ((t -= 2) * t * t * t - 2), easeInQuint: t => t * t * t * t * t, easeOutQuint: t => (t -= 1) * t * t * t * t + 1, easeInOutQuint: t => (t /= .5) < 1 ? .5 * t * t * t * t * t : .5 * ((t -= 2) * t * t * t * t + 2), easeInSine: t => 1 - Math.cos(t * E), easeOutSine: t => Math.sin(t * E), easeInOutSine: t => -.5 * (Math.cos(C * t) - 1), easeInExpo: t => 0 === t ? 0 : Math.pow(2, 10 * (t - 1)), easeOutExpo: t => 1 === t ? 1 : 1 - Math.pow(2, -10 * t), easeInOutExpo: t => hi(t) ? t : t < .5 ? .5 * Math.pow(2, 10 * (2 * t - 1)) : .5 * (2 - Math.pow(2, -10 * (2 * t - 1))), easeInCirc: t => t >= 1 ? t : -(Math.sqrt(1 - t * t) - 1), easeOutCirc: t => Math.sqrt(1 - (t -= 1) * t), easeInOutCirc: t => (t /= .5) < 1 ? -.5 * (Math.sqrt(1 - t * t) - 1) : .5 * (Math.sqrt(1 - (t -= 2) * t) + 1), easeInElastic: t => hi(t) ? t : ci(t, .075, .3), easeOutElastic: t => hi(t) ? t : di(t, .075, .3), easeInOutElastic(t) { const e = .1125; return hi(t) ? t : t < .5 ? .5 * ci(2 * t, e, .45) : .5 + .5 * di(2 * t - 1, e, .45) }, easeInBack(t) { const e = 1.70158; return t * t * ((e + 1) * t - e) }, easeOutBack(t) { const e = 1.70158; return (t -= 1) * t * ((e + 1) * t + e) + 1 }, easeInOutBack(t) { let e = 1.70158; return (t /= .5) < 1 ? t * t * ((1 + (e *= 1.525)) * t - e) * .5 : .5 * ((t -= 2) * t * ((1 + (e *= 1.525)) * t + e) + 2) }, easeInBounce: t => 1 - ui.easeOutBounce(1 - t), easeOutBounce(t) { const e = 7.5625,
                    i = 2.75; return t < 1 / i ? e * t * t : t < 2 / i ? e * (t -= 1.5 / i) * t + .75 : t < 2.5 / i ? e * (t -= 2.25 / i) * t + .9375 : e * (t -= 2.625 / i) * t + .984375 }, easeInOutBounce: t => t < .5 ? .5 * ui.easeInBounce(2 * t) : .5 * ui.easeOutBounce(2 * t - 1) + .5 };

    function fi(t, e, i, s) { return { x: t.x + i * (e.x - t.x), y: t.y + i * (e.y - t.y) } }

    function gi(t, e, i, s) { return { x: t.x + i * (e.x - t.x), y: "middle" === s ? i < .5 ? t.y : e.y : "after" === s ? i < 1 ? t.y : e.y : i > 0 ? e.y : t.y } }

    function pi(t, e, i, s) { const n = { x: t.cp2x, y: t.cp2y },
            o = { x: e.cp1x, y: e.cp1y },
            a = fi(t, n, i),
            r = fi(n, o, i),
            l = fi(o, e, i),
            h = fi(a, r, i),
            c = fi(r, l, i); return fi(h, c, i) } const mi = /^(normal|(\d+(?:\.\d+)?)(px|em|%)?)$/,
        bi = /^(normal|italic|initial|inherit|unset|(oblique( -?[0-9]?[0-9]deg)?))$/;

    function xi(t, e) { const i = ("" + t).match(mi); if (!i || "normal" === i[1]) return 1.2 * e; switch (t = +i[2], i[3]) {
            case "px":
                return t;
            case "%":
                t /= 100 } return e * t }

    function _i(t, e) { const i = {},
            s = o(e),
            n = s ? Object.keys(e) : e,
            a = o(t) ? s ? i => l(t[i], t[e[i]]) : e => t[e] : () => t; for (const t of n) i[t] = +a(t) || 0; return i }

    function yi(t) { return _i(t, { top: "y", right: "x", bottom: "y", left: "x" }) }

    function vi(t) { return _i(t, ["topLeft", "topRight", "bottomLeft", "bottomRight"]) }

    function Mi(t) { const e = yi(t); return e.width = e.left + e.right, e.height = e.top + e.bottom, e }

    function wi(t, e) { t = t || {}, e = e || ue.font; let i = l(t.size, e.size); "string" == typeof i && (i = parseInt(i, 10)); let s = l(t.style, e.style);
        s && !("" + s).match(bi) && (console.warn('Invalid font style specified: "' + s + '"'), s = void 0); const n = { family: l(t.family, e.family), lineHeight: xi(l(t.lineHeight, e.lineHeight), i), size: i, style: s, weight: l(t.weight, e.weight), string: "" }; return n.string = Pe(n), n }

    function ki(t, e, i, s) { let o, a, r, l = !0; for (o = 0, a = t.length; o < a; ++o)
            if (r = t[o], void 0 !== r && (void 0 !== e && "function" == typeof r && (r = r(e), l = !1), void 0 !== i && n(r) && (r = r[i % r.length], l = !1), void 0 !== r)) return s && !l && (s.cacheable = !1), r }

    function Si(t, e, i) { const { min: s, max: n } = t, o = c(e, (n - s) / 2), a = (t, e) => i && 0 === t ? 0 : t + e; return { min: a(s, -Math.abs(o)), max: a(n, o) } }

    function Pi(t, e) { return Object.assign(Object.create(t), e) }

    function Di(t, e, i) { return t ? function(t, e) { return { x: i => t + t + e - i, setWidth(t) { e = t }, textAlign: t => "center" === t ? t : "right" === t ? "left" : "right", xPlus: (t, e) => t - e, leftForLtr: (t, e) => t - e } }(e, i) : { x: t => t, setWidth(t) {}, textAlign: t => t, xPlus: (t, e) => t + e, leftForLtr: (t, e) => t } }

    function Ci(t, e) { let i, s; "ltr" !== e && "rtl" !== e || (i = t.canvas.style, s = [i.getPropertyValue("direction"), i.getPropertyPriority("direction")], i.setProperty("direction", e, "important"), t.prevTextDirection = s) }

    function Oi(t, e) { void 0 !== e && (delete t.prevTextDirection, t.canvas.style.setProperty("direction", e[0], e[1])) }

    function Ai(t) { return "angle" === t ? { between: Z, compare: K, normalize: G } : { between: tt, compare: (t, e) => t - e, normalize: t => t } }

    function Ti({ start: t, end: e, count: i, loop: s, style: n }) { return { start: t % i, end: e % i, loop: s && (e - t + 1) % i == 0, style: n } }

    function Li(t, e, i) { if (!i) return [t]; const { property: s, start: n, end: o } = i, a = e.length, { compare: r, between: l, normalize: h } = Ai(s), { start: c, end: d, loop: u, style: f } = function(t, e, i) { const { property: s, start: n, end: o } = i, { between: a, normalize: r } = Ai(s), l = e.length; let h, c, { start: d, end: u, loop: f } = t; if (f) { for (d += l, u += l, h = 0, c = l; h < c && a(r(e[d % l][s]), n, o); ++h) d--, u--;
                d %= l, u %= l } return u < d && (u += l), { start: d, end: u, loop: f, style: t.style } }(t, e, i), g = []; let p, m, b, x = !1,
            _ = null; const y = () => x || l(n, b, p) && 0 !== r(n, b),
            v = () => !x || 0 === r(o, p) || l(o, b, p); for (let t = c, i = c; t <= d; ++t) m = e[t % a], m.skip || (p = h(m[s]), p !== b && (x = l(p, n, o), null === _ && y() && (_ = 0 === r(p, n) ? t : i), null !== _ && v() && (g.push(Ti({ start: _, end: t, loop: u, count: a, style: f })), _ = null), i = t, b = p)); return null !== _ && g.push(Ti({ start: _, end: d, loop: u, count: a, style: f })), g }

    function Ei(t, e) { const i = [],
            s = t.segments; for (let n = 0; n < s.length; n++) { const o = Li(s[n], t.points, e);
            o.length && i.push(...o) } return i }

    function Ri(t, e) { const i = t.points,
            s = t.options.spanGaps,
            n = i.length; if (!n) return []; const o = !!t._loop,
            { start: a, end: r } = function(t, e, i, s) { let n = 0,
                    o = e - 1; if (i && !s)
                    for (; n < e && !t[n].skip;) n++; for (; n < e && t[n].skip;) n++; for (n %= e, i && (o += n); o > n && t[o % e].skip;) o--; return o %= e, { start: n, end: o } }(i, n, o, s); if (!0 === s) return Ii(t, [{ start: a, end: r, loop: o }], i, e); return Ii(t, function(t, e, i, s) { const n = t.length,
                o = []; let a, r = e,
                l = t[e]; for (a = e + 1; a <= i; ++a) { const i = t[a % n];
                i.skip || i.stop ? l.skip || (s = !1, o.push({ start: e % n, end: (a - 1) % n, loop: s }), e = r = i.stop ? a : null) : (r = a, l.skip && (e = a)), l = i } return null !== r && o.push({ start: e % n, end: r % n, loop: s }), o }(i, a, r < a ? r + n : r, !!t._fullLoop && 0 === a && r === n - 1), i, e) }

    function Ii(t, e, i, s) { return s && s.setContext && i ? function(t, e, i, s) { const n = t._chart.getContext(),
                o = zi(t.options),
                { _datasetIndex: a, options: { spanGaps: r } } = t,
                l = i.length,
                h = []; let c = o,
                d = e[0].start,
                u = d;

            function f(t, e, s, n) { const o = r ? -1 : 1; if (t !== e) { for (t += l; i[t % l].skip;) t -= o; for (; i[e % l].skip;) e += o;
                    t % l != e % l && (h.push({ start: t % l, end: e % l, loop: s, style: n }), c = n, d = e % l) } } for (const t of e) { d = r ? d : t.start; let e, o = i[d % l]; for (u = d + 1; u <= t.end; u++) { const r = i[u % l];
                    e = zi(s.setContext(Pi(n, { type: "segment", p0: o, p1: r, p0DataIndex: (u - 1) % l, p1DataIndex: u % l, datasetIndex: a }))), Fi(e, c) && f(d, u - 1, t.loop, c), o = r, c = e }
                d < u - 1 && f(d, u - 1, t.loop, c) } return h }(t, e, i, s) : e }

    function zi(t) { return { backgroundColor: t.backgroundColor, borderCapStyle: t.borderCapStyle, borderDash: t.borderDash, borderDashOffset: t.borderDashOffset, borderJoinStyle: t.borderJoinStyle, borderWidth: t.borderWidth, borderColor: t.borderColor } }

    function Fi(t, e) { return e && JSON.stringify(t) !== JSON.stringify(e) } var Vi = Object.freeze({ __proto__: null, easingEffects: ui, isPatternOrGradient: Jt, color: Qt, getHoverColor: te, noop: e, uid: i, isNullOrUndef: s, isArray: n, isObject: o, isFinite: a, finiteOrDefault: r, valueOrDefault: l, toPercentage: h, toDimension: c, callback: d, each: u, _elementsEqual: f, clone: g, _merger: m, merge: b, mergeIf: x, _mergerIf: _, _deprecated: function(t, e, i, s) { void 0 !== e && console.warn(t + ': "' + i + '" is deprecated. Please use "' + s + '" instead') }, _splitKey: v, resolveObjectKey: M, _capitalize: w, defined: k, isFunction: S, setsEqual: P, _isClickEvent: D, toFontString: Pe, _measureText: De, _longestText: Ce, _alignPixel: Oe, clearCanvas: Ae, drawPoint: Te, drawPointLegend: Le, _isPointInArea: Ee, clipArea: Re, unclipArea: Ie, _steppedLineTo: ze, _bezierCurveTo: Fe, renderText: Ve, addRoundedRectPath: We, _lookup: et, _lookupByKey: it, _rlookupByKey: st, _filterBetween: nt, listenArrayEvents: at, unlistenArrayEvents: rt, _arrayUnique: lt, _createResolver: He, _attachContext: je, _descriptors: $e, _parseObjectDataRadialScale: ei, splineCurve: oi, splineCurveMonotone: ai, _updateBezierControlPoints: li, _isDomSupported: fe, _getParentNode: ge, getStyle: be, getRelativePosition: ye, getMaximumSize: Me, retinaScale: we, supportsEventListenerOptions: ke, readUsedSize: Se, fontString: function(t, e, i) { return e + " " + t + "px " + i }, requestAnimFrame: ht, throttled: ct, debounce: dt, _toLeftRightCenter: ut, _alignStartEnd: ft, _textX: gt, _getStartAndCountOfVisiblePoints: pt, _scaleRangesChanged: mt, _pointInLine: fi, _steppedInterpolation: gi, _bezierInterpolation: pi, formatNumber: ne, toLineHeight: xi, _readValueToProps: _i, toTRBL: yi, toTRBLCorners: vi, toPadding: Mi, toFont: wi, resolve: ki, _addGrace: Si, createContext: Pi, PI: C, TAU: O, PITAU: A, INFINITY: T, RAD_PER_DEG: L, HALF_PI: E, QUARTER_PI: R, TWO_THIRDS_PI: I, log10: z, sign: F, almostEquals: V, niceNum: B, _factorize: N, isNumber: W, almostWhole: H, _setMinAndMaxByKey: j, toRadians: $, toDegrees: Y, _decimalPlaces: U, getAngleFromPoint: X, distanceBetweenPoints: q, _angleDiff: K, _normalizeAngle: G, _angleBetween: Z, _limitValue: J, _int16Range: Q, _isBetween: tt, getRtlAdapter: Di, overrideTextDirection: Ci, restoreTextDirection: Oi, _boundSegment: Li, _boundSegments: Ei, _computeSegments: Ri });

    function Bi(t, e, i, s) { const { controller: n, data: o, _sorted: a } = t, r = n._cachedMeta.iScale; if (r && e === r.axis && "r" !== e && a && o.length) { const t = r._reversePixels ? st : it; if (!s) return t(o, e, i); if (n._sharedOptions) { const s = o[0],
                    n = "function" == typeof s.getRange && s.getRange(e); if (n) { const s = t(o, e, i - n),
                        a = t(o, e, i + n); return { lo: s.lo, hi: a.hi } } } } return { lo: 0, hi: o.length - 1 } }

    function Ni(t, e, i, s, n) { const o = t.getSortedVisibleDatasetMetas(),
            a = i[e]; for (let t = 0, i = o.length; t < i; ++t) { const { index: i, data: r } = o[t], { lo: l, hi: h } = Bi(o[t], e, a, n); for (let t = l; t <= h; ++t) { const e = r[t];
                e.skip || s(e, i, t) } } }

    function Wi(t, e, i, s, n) { const o = []; if (!n && !t.isPointInArea(e)) return o; return Ni(t, i, e, (function(i, a, r) {
            (n || Ee(i, t.chartArea, 0)) && i.inRange(e.x, e.y, s) && o.push({ element: i, datasetIndex: a, index: r }) }), !0), o }

    function Hi(t, e, i, s, n, o) { let a = []; const r = function(t) { const e = -1 !== t.indexOf("x"),
                i = -1 !== t.indexOf("y"); return function(t, s) { const n = e ? Math.abs(t.x - s.x) : 0,
                    o = i ? Math.abs(t.y - s.y) : 0; return Math.sqrt(Math.pow(n, 2) + Math.pow(o, 2)) } }(i); let l = Number.POSITIVE_INFINITY; return Ni(t, i, e, (function(i, h, c) { const d = i.inRange(e.x, e.y, n); if (s && !d) return; const u = i.getCenterPoint(n); if (!(!!o || t.isPointInArea(u)) && !d) return; const f = r(e, u);
            f < l ? (a = [{ element: i, datasetIndex: h, index: c }], l = f) : f === l && a.push({ element: i, datasetIndex: h, index: c }) })), a }

    function ji(t, e, i, s, n, o) { return o || t.isPointInArea(e) ? "r" !== i || s ? Hi(t, e, i, s, n, o) : function(t, e, i, s) { let n = []; return Ni(t, i, e, (function(t, i, o) { const { startAngle: a, endAngle: r } = t.getProps(["startAngle", "endAngle"], s), { angle: l } = X(t, { x: e.x, y: e.y });
                Z(l, a, r) && n.push({ element: t, datasetIndex: i, index: o }) })), n }(t, e, i, n) : [] }

    function $i(t, e, i, s, n) { const o = [],
            a = "x" === i ? "inXRange" : "inYRange"; let r = !1; return Ni(t, i, e, ((t, s, l) => { t[a](e[i], n) && (o.push({ element: t, datasetIndex: s, index: l }), r = r || t.inRange(e.x, e.y, n)) })), s && !r ? [] : o } var Yi = { evaluateInteractionItems: Ni, modes: { index(t, e, i, s) { const n = ye(e, t),
                    o = i.axis || "x",
                    a = i.includeInvisible || !1,
                    r = i.intersect ? Wi(t, n, o, s, a) : ji(t, n, o, !1, s, a),
                    l = []; return r.length ? (t.getSortedVisibleDatasetMetas().forEach((t => { const e = r[0].index,
                        i = t.data[e];
                    i && !i.skip && l.push({ element: i, datasetIndex: t.index, index: e }) })), l) : [] }, dataset(t, e, i, s) { const n = ye(e, t),
                    o = i.axis || "xy",
                    a = i.includeInvisible || !1; let r = i.intersect ? Wi(t, n, o, s, a) : ji(t, n, o, !1, s, a); if (r.length > 0) { const e = r[0].datasetIndex,
                        i = t.getDatasetMeta(e).data;
                    r = []; for (let t = 0; t < i.length; ++t) r.push({ element: i[t], datasetIndex: e, index: t }) } return r }, point: (t, e, i, s) => Wi(t, ye(e, t), i.axis || "xy", s, i.includeInvisible || !1), nearest(t, e, i, s) { const n = ye(e, t),
                    o = i.axis || "xy",
                    a = i.includeInvisible || !1; return ji(t, n, o, i.intersect, s, a) }, x: (t, e, i, s) => $i(t, ye(e, t), "x", i.intersect, s), y: (t, e, i, s) => $i(t, ye(e, t), "y", i.intersect, s) } }; const Ui = ["left", "top", "right", "bottom"];

    function Xi(t, e) { return t.filter((t => t.pos === e)) }

    function qi(t, e) { return t.filter((t => -1 === Ui.indexOf(t.pos) && t.box.axis === e)) }

    function Ki(t, e) { return t.sort(((t, i) => { const s = e ? i : t,
                n = e ? t : i; return s.weight === n.weight ? s.index - n.index : s.weight - n.weight })) }

    function Gi(t, e) { const i = function(t) { const e = {}; for (const i of t) { const { stack: t, pos: s, stackWeight: n } = i; if (!t || !Ui.includes(s)) continue; const o = e[t] || (e[t] = { count: 0, placed: 0, weight: 0, size: 0 });
                    o.count++, o.weight += n } return e }(t),
            { vBoxMaxWidth: s, hBoxMaxHeight: n } = e; let o, a, r; for (o = 0, a = t.length; o < a; ++o) { r = t[o]; const { fullSize: a } = r.box, l = i[r.stack], h = l && r.stackWeight / l.weight;
            r.horizontal ? (r.width = h ? h * s : a && e.availableWidth, r.height = n) : (r.width = s, r.height = h ? h * n : a && e.availableHeight) } return i }

    function Zi(t, e, i, s) { return Math.max(t[i], e[i]) + Math.max(t[s], e[s]) }

    function Ji(t, e) { t.top = Math.max(t.top, e.top), t.left = Math.max(t.left, e.left), t.bottom = Math.max(t.bottom, e.bottom), t.right = Math.max(t.right, e.right) }

    function Qi(t, e, i, s) { const { pos: n, box: a } = i, r = t.maxPadding; if (!o(n)) { i.size && (t[n] -= i.size); const e = s[i.stack] || { size: 0, count: 1 };
            e.size = Math.max(e.size, i.horizontal ? a.height : a.width), i.size = e.size / e.count, t[n] += i.size }
        a.getPadding && Ji(r, a.getPadding()); const l = Math.max(0, e.outerWidth - Zi(r, t, "left", "right")),
            h = Math.max(0, e.outerHeight - Zi(r, t, "top", "bottom")),
            c = l !== t.w,
            d = h !== t.h; return t.w = l, t.h = h, i.horizontal ? { same: c, other: d } : { same: d, other: c } }

    function ts(t, e) { const i = e.maxPadding;

        function s(t) { const s = { left: 0, top: 0, right: 0, bottom: 0 }; return t.forEach((t => { s[t] = Math.max(e[t], i[t]) })), s } return s(t ? ["left", "right"] : ["top", "bottom"]) }

    function es(t, e, i, s) { const n = []; let o, a, r, l, h, c; for (o = 0, a = t.length, h = 0; o < a; ++o) { r = t[o], l = r.box, l.update(r.width || e.w, r.height || e.h, ts(r.horizontal, e)); const { same: a, other: d } = Qi(e, i, r, s);
            h |= a && n.length, c = c || d, l.fullSize || n.push(r) } return h && es(n, e, i, s) || c }

    function is(t, e, i, s, n) { t.top = i, t.left = e, t.right = e + s, t.bottom = i + n, t.width = s, t.height = n }

    function ss(t, e, i, s) { const n = i.padding; let { x: o, y: a } = e; for (const r of t) { const t = r.box,
                l = s[r.stack] || { count: 1, placed: 0, weight: 1 },
                h = r.stackWeight / l.weight || 1; if (r.horizontal) { const s = e.w * h,
                    o = l.size || t.height;
                k(l.start) && (a = l.start), t.fullSize ? is(t, n.left, a, i.outerWidth - n.right - n.left, o) : is(t, e.left + l.placed, a, s, o), l.start = a, l.placed += s, a = t.bottom } else { const s = e.h * h,
                    a = l.size || t.width;
                k(l.start) && (o = l.start), t.fullSize ? is(t, o, n.top, a, i.outerHeight - n.bottom - n.top) : is(t, o, e.top + l.placed, a, s), l.start = o, l.placed += s, o = t.right } }
        e.x = o, e.y = a } var ns = { addBox(t, e) { t.boxes || (t.boxes = []), e.fullSize = e.fullSize || !1, e.position = e.position || "top", e.weight = e.weight || 0, e._layers = e._layers || function() { return [{ z: 0, draw(t) { e.draw(t) } }] }, t.boxes.push(e) }, removeBox(t, e) { const i = t.boxes ? t.boxes.indexOf(e) : -1; - 1 !== i && t.boxes.splice(i, 1) }, configure(t, e, i) { e.fullSize = i.fullSize, e.position = i.position, e.weight = i.weight }, update(t, e, i, s) { if (!t) return; const n = Mi(t.options.layout.padding),
                o = Math.max(e - n.width, 0),
                a = Math.max(i - n.height, 0),
                r = function(t) { const e = function(t) { const e = []; let i, s, n, o, a, r; for (i = 0, s = (t || []).length; i < s; ++i) n = t[i], ({ position: o, options: { stack: a, stackWeight: r = 1 } } = n), e.push({ index: i, box: n, pos: o, horizontal: n.isHorizontal(), weight: n.weight, stack: a && o + a, stackWeight: r }); return e }(t),
                        i = Ki(e.filter((t => t.box.fullSize)), !0),
                        s = Ki(Xi(e, "left"), !0),
                        n = Ki(Xi(e, "right")),
                        o = Ki(Xi(e, "top"), !0),
                        a = Ki(Xi(e, "bottom")),
                        r = qi(e, "x"),
                        l = qi(e, "y"); return { fullSize: i, leftAndTop: s.concat(o), rightAndBottom: n.concat(l).concat(a).concat(r), chartArea: Xi(e, "chartArea"), vertical: s.concat(n).concat(l), horizontal: o.concat(a).concat(r) } }(t.boxes),
                l = r.vertical,
                h = r.horizontal;
            u(t.boxes, (t => { "function" == typeof t.beforeLayout && t.beforeLayout() })); const c = l.reduce(((t, e) => e.box.options && !1 === e.box.options.display ? t : t + 1), 0) || 1,
                d = Object.freeze({ outerWidth: e, outerHeight: i, padding: n, availableWidth: o, availableHeight: a, vBoxMaxWidth: o / 2 / c, hBoxMaxHeight: a / 2 }),
                f = Object.assign({}, n);
            Ji(f, Mi(s)); const g = Object.assign({ maxPadding: f, w: o, h: a, x: n.left, y: n.top }, n),
                p = Gi(l.concat(h), d);
            es(r.fullSize, g, d, p), es(l, g, d, p), es(h, g, d, p) && es(l, g, d, p),
                function(t) { const e = t.maxPadding;

                    function i(i) { const s = Math.max(e[i] - t[i], 0); return t[i] += s, s }
                    t.y += i("top"), t.x += i("left"), i("right"), i("bottom") }(g), ss(r.leftAndTop, g, d, p), g.x += g.w, g.y += g.h, ss(r.rightAndBottom, g, d, p), t.chartArea = { left: g.left, top: g.top, right: g.left + g.w, bottom: g.top + g.h, height: g.h, width: g.w }, u(r.chartArea, (e => { const i = e.box;
                    Object.assign(i, t.chartArea), i.update(g.w, g.h, { left: 0, top: 0, right: 0, bottom: 0 }) })) } };
    class os { acquireContext(t, e) {}
        releaseContext(t) { return !1 }
        addEventListener(t, e, i) {}
        removeEventListener(t, e, i) {}
        getDevicePixelRatio() { return 1 }
        getMaximumSize(t, e, i, s) { return e = Math.max(0, e || t.width), i = i || t.height, { width: e, height: Math.max(0, s ? Math.floor(e / s) : i) } }
        isAttached(t) { return !0 }
        updateConfig(t) {} }
    class as extends os { acquireContext(t) { return t && t.getContext && t.getContext("2d") || null }
        updateConfig(t) { t.options.animation = !1 } } const rs = { touchstart: "mousedown", touchmove: "mousemove", touchend: "mouseup", pointerenter: "mouseenter", pointerdown: "mousedown", pointermove: "mousemove", pointerup: "mouseup", pointerleave: "mouseout", pointerout: "mouseout" },
        ls = t => null === t || "" === t; const hs = !!ke && { passive: !0 };

    function cs(t, e, i) { t.canvas.removeEventListener(e, i, hs) }

    function ds(t, e) { for (const i of t)
            if (i === e || i.contains(e)) return !0 }

    function us(t, e, i) { const s = t.canvas,
            n = new MutationObserver((t => { let e = !1; for (const i of t) e = e || ds(i.addedNodes, s), e = e && !ds(i.removedNodes, s);
                e && i() })); return n.observe(document, { childList: !0, subtree: !0 }), n }

    function fs(t, e, i) { const s = t.canvas,
            n = new MutationObserver((t => { let e = !1; for (const i of t) e = e || ds(i.removedNodes, s), e = e && !ds(i.addedNodes, s);
                e && i() })); return n.observe(document, { childList: !0, subtree: !0 }), n } const gs = new Map; let ps = 0;

    function ms() { const t = window.devicePixelRatio;
        t !== ps && (ps = t, gs.forEach(((e, i) => { i.currentDevicePixelRatio !== t && e() }))) }

    function bs(t, e, i) { const s = t.canvas,
            n = s && ge(s); if (!n) return; const o = ct(((t, e) => { const s = n.clientWidth;
                i(t, e), s < n.clientWidth && i() }), window),
            a = new ResizeObserver((t => { const e = t[0],
                    i = e.contentRect.width,
                    s = e.contentRect.height;
                0 === i && 0 === s || o(i, s) })); return a.observe(n),
            function(t, e) { gs.size || window.addEventListener("resize", ms), gs.set(t, e) }(t, o), a }

    function xs(t, e, i) { i && i.disconnect(), "resize" === e && function(t) { gs.delete(t), gs.size || window.removeEventListener("resize", ms) }(t) }

    function _s(t, e, i) { const s = t.canvas,
            n = ct((e => { null !== t.ctx && i(function(t, e) { const i = rs[t.type] || t.type,
                        { x: s, y: n } = ye(t, e); return { type: i, chart: e, native: t, x: void 0 !== s ? s : null, y: void 0 !== n ? n : null } }(e, t)) }), t); return function(t, e, i) { t.addEventListener(e, i, hs) }(s, e, n), n }
    class ys extends os { acquireContext(t, e) { const i = t && t.getContext && t.getContext("2d"); return i && i.canvas === t ? (function(t, e) { const i = t.style,
                    s = t.getAttribute("height"),
                    n = t.getAttribute("width"); if (t.$chartjs = { initial: { height: s, width: n, style: { display: i.display, height: i.height, width: i.width } } }, i.display = i.display || "block", i.boxSizing = i.boxSizing || "border-box", ls(n)) { const e = Se(t, "width");
                    void 0 !== e && (t.width = e) } if (ls(s))
                    if ("" === t.style.height) t.height = t.width / (e || 2);
                    else { const e = Se(t, "height");
                        void 0 !== e && (t.height = e) } }(t, e), i) : null }
        releaseContext(t) { const e = t.canvas; if (!e.$chartjs) return !1; const i = e.$chartjs.initial;
            ["height", "width"].forEach((t => { const n = i[t];
                s(n) ? e.removeAttribute(t) : e.setAttribute(t, n) })); const n = i.style || {}; return Object.keys(n).forEach((t => { e.style[t] = n[t] })), e.width = e.width, delete e.$chartjs, !0 }
        addEventListener(t, e, i) { this.removeEventListener(t, e); const s = t.$proxies || (t.$proxies = {}),
                n = { attach: us, detach: fs, resize: bs }[e] || _s;
            s[e] = n(t, e, i) }
        removeEventListener(t, e) { const i = t.$proxies || (t.$proxies = {}),
                s = i[e]; if (!s) return;
            ({ attach: xs, detach: xs, resize: xs }[e] || cs)(t, e, s), i[e] = void 0 }
        getDevicePixelRatio() { return window.devicePixelRatio }
        getMaximumSize(t, e, i, s) { return Me(t, e, i, s) }
        isAttached(t) { const e = ge(t); return !(!e || !e.isConnected) } }

    function vs(t) { return !fe() || "undefined" != typeof OffscreenCanvas && t instanceof OffscreenCanvas ? as : ys } var Ms = Object.freeze({ __proto__: null, _detectPlatform: vs, BasePlatform: os, BasicPlatform: as, DomPlatform: ys }); const ws = "transparent",
        ks = { boolean: (t, e, i) => i > .5 ? e : t, color(t, e, i) { const s = Qt(t || ws),
                    n = s.valid && Qt(e || ws); return n && n.valid ? n.mix(s, i).hexString() : e }, number: (t, e, i) => t + (e - t) * i };
    class Ss { constructor(t, e, i, s) { const n = e[i];
            s = ki([t.to, s, n, t.from]); const o = ki([t.from, n, s]);
            this._active = !0, this._fn = t.fn || ks[t.type || typeof o], this._easing = ui[t.easing] || ui.linear, this._start = Math.floor(Date.now() + (t.delay || 0)), this._duration = this._total = Math.floor(t.duration), this._loop = !!t.loop, this._target = e, this._prop = i, this._from = o, this._to = s, this._promises = void 0 }
        active() { return this._active }
        update(t, e, i) { if (this._active) { this._notify(!1); const s = this._target[this._prop],
                    n = i - this._start,
                    o = this._duration - n;
                this._start = i, this._duration = Math.floor(Math.max(o, t.duration)), this._total += n, this._loop = !!t.loop, this._to = ki([t.to, e, s, t.from]), this._from = ki([t.from, s, e]) } }
        cancel() { this._active && (this.tick(Date.now()), this._active = !1, this._notify(!1)) }
        tick(t) { const e = t - this._start,
                i = this._duration,
                s = this._prop,
                n = this._from,
                o = this._loop,
                a = this._to; let r; if (this._active = n !== a && (o || e < i), !this._active) return this._target[s] = a, void this._notify(!0);
            e < 0 ? this._target[s] = n : (r = e / i % 2, r = o && r > 1 ? 2 - r : r, r = this._easing(Math.min(1, Math.max(0, r))), this._target[s] = this._fn(n, a, r)) }
        wait() { const t = this._promises || (this._promises = []); return new Promise(((e, i) => { t.push({ res: e, rej: i }) })) }
        _notify(t) { const e = t ? "res" : "rej",
                i = this._promises || []; for (let t = 0; t < i.length; t++) i[t][e]() } }
    class Ps { constructor(t, e) { this._chart = t, this._properties = new Map, this.configure(e) }
        configure(t) { if (!o(t)) return; const e = Object.keys(ue.animation),
                i = this._properties;
            Object.getOwnPropertyNames(t).forEach((s => { const a = t[s]; if (!o(a)) return; const r = {}; for (const t of e) r[t] = a[t];
                (n(a.properties) && a.properties || [s]).forEach((t => { t !== s && i.has(t) || i.set(t, r) })) })) }
        _animateOptions(t, e) { const i = e.options,
                s = function(t, e) { if (!e) return; let i = t.options; if (!i) return void(t.options = e);
                    i.$shared && (t.options = i = Object.assign({}, i, { $shared: !1, $animations: {} })); return i }(t, i); if (!s) return []; const n = this._createAnimations(s, i); return i.$shared && function(t, e) { const i = [],
                    s = Object.keys(e); for (let e = 0; e < s.length; e++) { const n = t[s[e]];
                    n && n.active() && i.push(n.wait()) } return Promise.all(i) }(t.options.$animations, i).then((() => { t.options = i }), (() => {})), n }
        _createAnimations(t, e) { const i = this._properties,
                s = [],
                n = t.$animations || (t.$animations = {}),
                o = Object.keys(e),
                a = Date.now(); let r; for (r = o.length - 1; r >= 0; --r) { const l = o[r]; if ("$" === l.charAt(0)) continue; if ("options" === l) { s.push(...this._animateOptions(t, e)); continue } const h = e[l]; let c = n[l]; const d = i.get(l); if (c) { if (d && c.active()) { c.update(d, h, a); continue }
                    c.cancel() }
                d && d.duration ? (n[l] = c = new Ss(d, t, l, h), s.push(c)) : t[l] = h } return s }
        update(t, e) { if (0 === this._properties.size) return void Object.assign(t, e); const i = this._createAnimations(t, e); return i.length ? (xt.add(this._chart, i), !0) : void 0 } }

    function Ds(t, e) { const i = t && t.options || {},
            s = i.reverse,
            n = void 0 === i.min ? e : 0,
            o = void 0 === i.max ? e : 0; return { start: s ? o : n, end: s ? n : o } }

    function Cs(t, e) { const i = [],
            s = t._getSortedDatasetMetas(e); let n, o; for (n = 0, o = s.length; n < o; ++n) i.push(s[n].index); return i }

    function Os(t, e, i, s = {}) { const n = t.keys,
            o = "single" === s.mode; let r, l, h, c; if (null !== e) { for (r = 0, l = n.length; r < l; ++r) { if (h = +n[r], h === i) { if (s.all) continue; break }
                c = t.values[h], a(c) && (o || 0 === e || F(e) === F(c)) && (e += c) } return e } }

    function As(t, e) { const i = t && t.options.stacked; return i || void 0 === i && void 0 !== e.stack }

    function Ts(t, e, i) { const s = t[e] || (t[e] = {}); return s[i] || (s[i] = {}) }

    function Ls(t, e, i, s) { for (const n of e.getMatchingVisibleMetas(s).reverse()) { const e = t[n.index]; if (i && e > 0 || !i && e < 0) return n.index } return null }

    function Es(t, e) { const { chart: i, _cachedMeta: s } = t, n = i._stacks || (i._stacks = {}), { iScale: o, vScale: a, index: r } = s, l = o.axis, h = a.axis, c = function(t, e, i) { return `${t.id}.${e.id}.${i.stack||i.type}` }(o, a, s), d = e.length; let u; for (let t = 0; t < d; ++t) { const i = e[t],
                {
                    [l]: o, [h]: d } = i;
            u = (i._stacks || (i._stacks = {}))[h] = Ts(n, c, o), u[r] = d, u._top = Ls(u, a, !0, s.type), u._bottom = Ls(u, a, !1, s.type);
            (u._visualValues || (u._visualValues = {}))[r] = d } }

    function Rs(t, e) { const i = t.scales; return Object.keys(i).filter((t => i[t].axis === e)).shift() }

    function Is(t, e) { const i = t.controller.index,
            s = t.vScale && t.vScale.axis; if (s) { e = e || t._parsed; for (const t of e) { const e = t._stacks; if (!e || void 0 === e[s] || void 0 === e[s][i]) return;
                delete e[s][i], void 0 !== e[s]._visualValues && void 0 !== e[s]._visualValues[i] && delete e[s]._visualValues[i] } } } const zs = t => "reset" === t || "none" === t,
        Fs = (t, e) => e ? t : Object.assign({}, t);
    class Vs { static defaults = {};
        static datasetElementType = null;
        static dataElementType = null;
        constructor(t, e) { this.chart = t, this._ctx = t.ctx, this.index = e, this._cachedDataOpts = {}, this._cachedMeta = this.getMeta(), this._type = this._cachedMeta.type, this.options = void 0, this._parsing = !1, this._data = void 0, this._objectData = void 0, this._sharedOptions = void 0, this._drawStart = void 0, this._drawCount = void 0, this.enableOptionSharing = !1, this.supportsDecimation = !1, this.$context = void 0, this._syncList = [], this.datasetElementType = new.target.datasetElementType, this.dataElementType = new.target.dataElementType, this.initialize() }
        initialize() { const t = this._cachedMeta;
            this.configure(), this.linkScales(), t._stacked = As(t.vScale, t), this.addElements(), this.options.fill && !this.chart.isPluginEnabled("filler") && console.warn("Tried to use the 'fill' option without the 'Filler' plugin enabled. Please import and register the 'Filler' plugin and make sure it is not disabled in the options") }
        updateIndex(t) { this.index !== t && Is(this._cachedMeta), this.index = t }
        linkScales() { const t = this.chart,
                e = this._cachedMeta,
                i = this.getDataset(),
                s = (t, e, i, s) => "x" === t ? e : "r" === t ? s : i,
                n = e.xAxisID = l(i.xAxisID, Rs(t, "x")),
                o = e.yAxisID = l(i.yAxisID, Rs(t, "y")),
                a = e.rAxisID = l(i.rAxisID, Rs(t, "r")),
                r = e.indexAxis,
                h = e.iAxisID = s(r, n, o, a),
                c = e.vAxisID = s(r, o, n, a);
            e.xScale = this.getScaleForId(n), e.yScale = this.getScaleForId(o), e.rScale = this.getScaleForId(a), e.iScale = this.getScaleForId(h), e.vScale = this.getScaleForId(c) }
        getDataset() { return this.chart.data.datasets[this.index] }
        getMeta() { return this.chart.getDatasetMeta(this.index) }
        getScaleForId(t) { return this.chart.scales[t] }
        _getOtherScale(t) { const e = this._cachedMeta; return t === e.iScale ? e.vScale : e.iScale }
        reset() { this._update("reset") }
        _destroy() { const t = this._cachedMeta;
            this._data && rt(this._data, this), t._stacked && Is(t) }
        _dataCheck() { const t = this.getDataset(),
                e = t.data || (t.data = []),
                i = this._data; if (o(e)) this._data = function(t) { const e = Object.keys(t),
                    i = new Array(e.length); let s, n, o; for (s = 0, n = e.length; s < n; ++s) o = e[s], i[s] = { x: o, y: t[o] }; return i }(e);
            else if (i !== e) { if (i) { rt(i, this); const t = this._cachedMeta;
                    Is(t), t._parsed = [] }
                e && Object.isExtensible(e) && at(e, this), this._syncList = [], this._data = e } }
        addElements() { const t = this._cachedMeta;
            this._dataCheck(), this.datasetElementType && (t.dataset = new this.datasetElementType) }
        buildOrUpdateElements(t) { const e = this._cachedMeta,
                i = this.getDataset(); let s = !1;
            this._dataCheck(); const n = e._stacked;
            e._stacked = As(e.vScale, e), e.stack !== i.stack && (s = !0, Is(e), e.stack = i.stack), this._resyncElements(t), (s || n !== e._stacked) && Es(this, e._parsed) }
        configure() { const t = this.chart.config,
                e = t.datasetScopeKeys(this._type),
                i = t.getOptionScopes(this.getDataset(), e, !0);
            this.options = t.createResolver(i, this.getContext()), this._parsing = this.options.parsing, this._cachedDataOpts = {} }
        parse(t, e) { const { _cachedMeta: i, _data: s } = this, { iScale: a, _stacked: r } = i, l = a.axis; let h, c, d, u = 0 === t && e === s.length || i._sorted,
                f = t > 0 && i._parsed[t - 1]; if (!1 === this._parsing) i._parsed = s, i._sorted = !0, d = s;
            else { d = n(s[t]) ? this.parseArrayData(i, s, t, e) : o(s[t]) ? this.parseObjectData(i, s, t, e) : this.parsePrimitiveData(i, s, t, e); const a = () => null === c[l] || f && c[l] < f[l]; for (h = 0; h < e; ++h) i._parsed[h + t] = c = d[h], u && (a() && (u = !1), f = c);
                i._sorted = u }
            r && Es(this, d) }
        parsePrimitiveData(t, e, i, s) { const { iScale: n, vScale: o } = t, a = n.axis, r = o.axis, l = n.getLabels(), h = n === o, c = new Array(s); let d, u, f; for (d = 0, u = s; d < u; ++d) f = d + i, c[d] = {
                [a]: h || n.parse(l[f], f), [r]: o.parse(e[f], f) }; return c }
        parseArrayData(t, e, i, s) { const { xScale: n, yScale: o } = t, a = new Array(s); let r, l, h, c; for (r = 0, l = s; r < l; ++r) h = r + i, c = e[h], a[r] = { x: n.parse(c[0], h), y: o.parse(c[1], h) }; return a }
        parseObjectData(t, e, i, s) { const { xScale: n, yScale: o } = t, { xAxisKey: a = "x", yAxisKey: r = "y" } = this._parsing, l = new Array(s); let h, c, d, u; for (h = 0, c = s; h < c; ++h) d = h + i, u = e[d], l[h] = { x: n.parse(M(u, a), d), y: o.parse(M(u, r), d) }; return l }
        getParsed(t) { return this._cachedMeta._parsed[t] }
        getDataElement(t) { return this._cachedMeta.data[t] }
        applyStack(t, e, i) { const s = this.chart,
                n = this._cachedMeta,
                o = e[t.axis]; return Os({ keys: Cs(s, !0), values: e._stacks[t.axis]._visualValues }, o, n.index, { mode: i }) }
        updateRangeFromParsed(t, e, i, s) { const n = i[e.axis]; let o = null === n ? NaN : n; const a = s && i._stacks[e.axis];
            s && a && (s.values = a, o = Os(s, n, this._cachedMeta.index)), t.min = Math.min(t.min, o), t.max = Math.max(t.max, o) }
        getMinMax(t, e) { const i = this._cachedMeta,
                s = i._parsed,
                n = i._sorted && t === i.iScale,
                o = s.length,
                r = this._getOtherScale(t),
                l = ((t, e, i) => t && !e.hidden && e._stacked && { keys: Cs(i, !0), values: null })(e, i, this.chart),
                h = { min: Number.POSITIVE_INFINITY, max: Number.NEGATIVE_INFINITY },
                { min: c, max: d } = function(t) { const { min: e, max: i, minDefined: s, maxDefined: n } = t.getUserBounds(); return { min: s ? e : Number.NEGATIVE_INFINITY, max: n ? i : Number.POSITIVE_INFINITY } }(r); let u, f;

            function g() { f = s[u]; const e = f[r.axis]; return !a(f[t.axis]) || c > e || d < e } for (u = 0; u < o && (g() || (this.updateRangeFromParsed(h, t, f, l), !n)); ++u); if (n)
                for (u = o - 1; u >= 0; --u)
                    if (!g()) { this.updateRangeFromParsed(h, t, f, l); break }
            return h }
        getAllParsedValues(t) { const e = this._cachedMeta._parsed,
                i = []; let s, n, o; for (s = 0, n = e.length; s < n; ++s) o = e[s][t.axis], a(o) && i.push(o); return i }
        getMaxOverflow() { return !1 }
        getLabelAndValue(t) { const e = this._cachedMeta,
                i = e.iScale,
                s = e.vScale,
                n = this.getParsed(t); return { label: i ? "" + i.getLabelForValue(n[i.axis]) : "", value: s ? "" + s.getLabelForValue(n[s.axis]) : "" } }
        _update(t) { const e = this._cachedMeta;
            this.update(t || "default"), e._clip = function(t) { let e, i, s, n; return o(t) ? (e = t.top, i = t.right, s = t.bottom, n = t.left) : e = i = s = n = t, { top: e, right: i, bottom: s, left: n, disabled: !1 === t } }(l(this.options.clip, function(t, e, i) { if (!1 === i) return !1; const s = Ds(t, i),
                    n = Ds(e, i); return { top: n.end, right: s.end, bottom: n.start, left: s.start } }(e.xScale, e.yScale, this.getMaxOverflow()))) }
        update(t) {}
        draw() { const t = this._ctx,
                e = this.chart,
                i = this._cachedMeta,
                s = i.data || [],
                n = e.chartArea,
                o = [],
                a = this._drawStart || 0,
                r = this._drawCount || s.length - a,
                l = this.options.drawActiveElementsOnTop; let h; for (i.dataset && i.dataset.draw(t, n, a, r), h = a; h < a + r; ++h) { const e = s[h];
                e.hidden || (e.active && l ? o.push(e) : e.draw(t, n)) } for (h = 0; h < o.length; ++h) o[h].draw(t, n) }
        getStyle(t, e) { const i = e ? "active" : "default"; return void 0 === t && this._cachedMeta.dataset ? this.resolveDatasetElementOptions(i) : this.resolveDataElementOptions(t || 0, i) }
        getContext(t, e, i) { const s = this.getDataset(); let n; if (t >= 0 && t < this._cachedMeta.data.length) { const e = this._cachedMeta.data[t];
                n = e.$context || (e.$context = function(t, e, i) { return Pi(t, { active: !1, dataIndex: e, parsed: void 0, raw: void 0, element: i, index: e, mode: "default", type: "data" }) }(this.getContext(), t, e)), n.parsed = this.getParsed(t), n.raw = s.data[t], n.index = n.dataIndex = t } else n = this.$context || (this.$context = function(t, e) { return Pi(t, { active: !1, dataset: void 0, datasetIndex: e, index: e, mode: "default", type: "dataset" }) }(this.chart.getContext(), this.index)), n.dataset = s, n.index = n.datasetIndex = this.index; return n.active = !!e, n.mode = i, n }
        resolveDatasetElementOptions(t) { return this._resolveElementOptions(this.datasetElementType.id, t) }
        resolveDataElementOptions(t, e) { return this._resolveElementOptions(this.dataElementType.id, e, t) }
        _resolveElementOptions(t, e = "default", i) { const s = "active" === e,
                n = this._cachedDataOpts,
                o = t + "-" + e,
                a = n[o],
                r = this.enableOptionSharing && k(i); if (a) return Fs(a, r); const l = this.chart.config,
                h = l.datasetElementScopeKeys(this._type, t),
                c = s ? [`${t}Hover`, "hover", t, ""] : [t, ""],
                d = l.getOptionScopes(this.getDataset(), h),
                u = Object.keys(ue.elements[t]),
                f = l.resolveNamedOptions(d, u, (() => this.getContext(i, s, e)), c); return f.$shared && (f.$shared = r, n[o] = Object.freeze(Fs(f, r))), f }
        _resolveAnimations(t, e, i) { const s = this.chart,
                n = this._cachedDataOpts,
                o = `animation-${e}`,
                a = n[o]; if (a) return a; let r; if (!1 !== s.options.animation) { const s = this.chart.config,
                    n = s.datasetAnimationScopeKeys(this._type, e),
                    o = s.getOptionScopes(this.getDataset(), n);
                r = s.createResolver(o, this.getContext(t, i, e)) } const l = new Ps(s, r && r.animations); return r && r._cacheable && (n[o] = Object.freeze(l)), l }
        getSharedOptions(t) { if (t.$shared) return this._sharedOptions || (this._sharedOptions = Object.assign({}, t)) }
        includeOptions(t, e) { return !e || zs(t) || this.chart._animationsDisabled }
        _getSharedOptions(t, e) { const i = this.resolveDataElementOptions(t, e),
                s = this._sharedOptions,
                n = this.getSharedOptions(i),
                o = this.includeOptions(e, n) || n !== s; return this.updateSharedOptions(n, e, i), { sharedOptions: n, includeOptions: o } }
        updateElement(t, e, i, s) { zs(s) ? Object.assign(t, i) : this._resolveAnimations(e, s).update(t, i) }
        updateSharedOptions(t, e, i) { t && !zs(e) && this._resolveAnimations(void 0, e).update(t, i) }
        _setStyle(t, e, i, s) { t.active = s; const n = this.getStyle(e, s);
            this._resolveAnimations(e, i, s).update(t, { options: !s && this.getSharedOptions(n) || n }) }
        removeHoverStyle(t, e, i) { this._setStyle(t, i, "active", !1) }
        setHoverStyle(t, e, i) { this._setStyle(t, i, "active", !0) }
        _removeDatasetHoverStyle() { const t = this._cachedMeta.dataset;
            t && this._setStyle(t, void 0, "active", !1) }
        _setDatasetHoverStyle() { const t = this._cachedMeta.dataset;
            t && this._setStyle(t, void 0, "active", !0) }
        _resyncElements(t) { const e = this._data,
                i = this._cachedMeta.data; for (const [t, e, i] of this._syncList) this[t](e, i);
            this._syncList = []; const s = i.length,
                n = e.length,
                o = Math.min(n, s);
            o && this.parse(0, o), n > s ? this._insertElements(s, n - s, t) : n < s && this._removeElements(n, s - n) }
        _insertElements(t, e, i = !0) { const s = this._cachedMeta,
                n = s.data,
                o = t + e; let a; const r = t => { for (t.length += e, a = t.length - 1; a >= o; a--) t[a] = t[a - e] }; for (r(n), a = t; a < o; ++a) n[a] = new this.dataElementType;
            this._parsing && r(s._parsed), this.parse(t, e), i && this.updateElements(n, t, e, "reset") }
        updateElements(t, e, i, s) {}
        _removeElements(t, e) { const i = this._cachedMeta; if (this._parsing) { const s = i._parsed.splice(t, e);
                i._stacked && Is(i, s) }
            i.data.splice(t, e) }
        _sync(t) { if (this._parsing) this._syncList.push(t);
            else { const [e, i, s] = t;
                this[e](i, s) }
            this.chart._dataChanges.push([this.index, ...t]) }
        _onDataPush() { const t = arguments.length;
            this._sync(["_insertElements", this.getDataset().data.length - t, t]) }
        _onDataPop() { this._sync(["_removeElements", this._cachedMeta.data.length - 1, 1]) }
        _onDataShift() { this._sync(["_removeElements", 0, 1]) }
        _onDataSplice(t, e) { e && this._sync(["_removeElements", t, e]); const i = arguments.length - 2;
            i && this._sync(["_insertElements", t, i]) }
        _onDataUnshift() { this._sync(["_insertElements", 0, arguments.length]) } }
    class Bs { static defaults = {};
        static defaultRoutes = void 0;
        active = !1;
        tooltipPosition(t) { const { x: e, y: i } = this.getProps(["x", "y"], t); return { x: e, y: i } }
        hasValue() { return W(this.x) && W(this.y) }
        getProps(t, e) { const i = this.$animations; if (!e || !i) return this; const s = {}; return t.forEach((t => { s[t] = i[t] && i[t].active() ? i[t]._to : this[t] })), s } }

    function Ns(t, e) { const i = t.options.ticks,
            n = function(t) { const e = t.options.offset,
                    i = t._tickSize(),
                    s = t._length / i + (e ? 0 : 1),
                    n = t._maxLength / i; return Math.floor(Math.min(s, n)) }(t),
            o = Math.min(i.maxTicksLimit || n, n),
            a = i.major.enabled ? function(t) { const e = []; let i, s; for (i = 0, s = t.length; i < s; i++) t[i].major && e.push(i); return e }(e) : [],
            r = a.length,
            l = a[0],
            h = a[r - 1],
            c = []; if (r > o) return function(t, e, i, s) { let n, o = 0,
                a = i[0]; for (s = Math.ceil(s), n = 0; n < t.length; n++) n === a && (e.push(t[n]), o++, a = i[o * s]) }(e, c, a, r / o), c; const d = function(t, e, i) { const s = function(t) { const e = t.length; let i, s; if (e < 2) return !1; for (s = t[0], i = 1; i < e; ++i)
                        if (t[i] - t[i - 1] !== s) return !1;
                    return s }(t),
                n = e.length / i; if (!s) return Math.max(n, 1); const o = N(s); for (let t = 0, e = o.length - 1; t < e; t++) { const e = o[t]; if (e > n) return e } return Math.max(n, 1) }(a, e, o); if (r > 0) { let t, i; const n = r > 1 ? Math.round((h - l) / (r - 1)) : null; for (Ws(e, c, d, s(n) ? 0 : l - n, l), t = 0, i = r - 1; t < i; t++) Ws(e, c, d, a[t], a[t + 1]); return Ws(e, c, d, h, s(n) ? e.length : h + n), c } return Ws(e, c, d), c }

    function Ws(t, e, i, s, n) { const o = l(s, 0),
            a = Math.min(l(n, t.length), t.length); let r, h, c, d = 0; for (i = Math.ceil(i), n && (r = n - s, i = r / Math.floor(r / i)), c = o; c < 0;) d++, c = Math.round(o + d * i); for (h = Math.max(o, 0); h < a; h++) h === c && (e.push(t[h]), d++, c = Math.round(o + d * i)) } const Hs = (t, e, i) => "top" === e || "left" === e ? t[e] + i : t[e] - i;

    function js(t, e) { const i = [],
            s = t.length / e,
            n = t.length; let o = 0; for (; o < n; o += s) i.push(t[Math.floor(o)]); return i }

    function $s(t, e, i) { const s = t.ticks.length,
            n = Math.min(e, s - 1),
            o = t._startPixel,
            a = t._endPixel,
            r = 1e-6; let l, h = t.getPixelForTick(n); if (!(i && (l = 1 === s ? Math.max(h - o, a - h) : 0 === e ? (t.getPixelForTick(1) - h) / 2 : (h - t.getPixelForTick(n - 1)) / 2, h += n < e ? l : -l, h < o - r || h > a + r))) return h }

    function Ys(t) { return t.drawTicks ? t.tickLength : 0 }

    function Us(t, e) { if (!t.display) return 0; const i = wi(t.font, e),
            s = Mi(t.padding); return (n(t.text) ? t.text.length : 1) * i.lineHeight + s.height }

    function Xs(t, e, i) { let s = ut(t); return (i && "right" !== e || !i && "right" === e) && (s = (t => "left" === t ? "right" : "right" === t ? "left" : t)(s)), s }
    class qs extends Bs { constructor(t) { super(), this.id = t.id, this.type = t.type, this.options = void 0, this.ctx = t.ctx, this.chart = t.chart, this.top = void 0, this.bottom = void 0, this.left = void 0, this.right = void 0, this.width = void 0, this.height = void 0, this._margins = { left: 0, right: 0, top: 0, bottom: 0 }, this.maxWidth = void 0, this.maxHeight = void 0, this.paddingTop = void 0, this.paddingBottom = void 0, this.paddingLeft = void 0, this.paddingRight = void 0, this.axis = void 0, this.labelRotation = void 0, this.min = void 0, this.max = void 0, this._range = void 0, this.ticks = [], this._gridLineItems = null, this._labelItems = null, this._labelSizes = null, this._length = 0, this._maxLength = 0, this._longestTextCache = {}, this._startPixel = void 0, this._endPixel = void 0, this._reversePixels = !1, this._userMax = void 0, this._userMin = void 0, this._suggestedMax = void 0, this._suggestedMin = void 0, this._ticksLength = 0, this._borderValue = 0, this._cache = {}, this._dataLimitsCached = !1, this.$context = void 0 }
        init(t) { this.options = t.setContext(this.getContext()), this.axis = t.axis, this._userMin = this.parse(t.min), this._userMax = this.parse(t.max), this._suggestedMin = this.parse(t.suggestedMin), this._suggestedMax = this.parse(t.suggestedMax) }
        parse(t, e) { return t }
        getUserBounds() { let { _userMin: t, _userMax: e, _suggestedMin: i, _suggestedMax: s } = this; return t = r(t, Number.POSITIVE_INFINITY), e = r(e, Number.NEGATIVE_INFINITY), i = r(i, Number.POSITIVE_INFINITY), s = r(s, Number.NEGATIVE_INFINITY), { min: r(t, i), max: r(e, s), minDefined: a(t), maxDefined: a(e) } }
        getMinMax(t) { let e, { min: i, max: s, minDefined: n, maxDefined: o } = this.getUserBounds(); if (n && o) return { min: i, max: s }; const a = this.getMatchingVisibleMetas(); for (let r = 0, l = a.length; r < l; ++r) e = a[r].controller.getMinMax(this, t), n || (i = Math.min(i, e.min)), o || (s = Math.max(s, e.max)); return i = o && i > s ? s : i, s = n && i > s ? i : s, { min: r(i, r(s, i)), max: r(s, r(i, s)) } }
        getPadding() { return { left: this.paddingLeft || 0, top: this.paddingTop || 0, right: this.paddingRight || 0, bottom: this.paddingBottom || 0 } }
        getTicks() { return this.ticks }
        getLabels() { const t = this.chart.data; return this.options.labels || (this.isHorizontal() ? t.xLabels : t.yLabels) || t.labels || [] }
        getLabelItems(t = this.chart.chartArea) { return this._labelItems || (this._labelItems = this._computeLabelItems(t)) }
        beforeLayout() { this._cache = {}, this._dataLimitsCached = !1 }
        beforeUpdate() { d(this.options.beforeUpdate, [this]) }
        update(t, e, i) { const { beginAtZero: s, grace: n, ticks: o } = this.options, a = o.sampleSize;
            this.beforeUpdate(), this.maxWidth = t, this.maxHeight = e, this._margins = i = Object.assign({ left: 0, right: 0, top: 0, bottom: 0 }, i), this.ticks = null, this._labelSizes = null, this._gridLineItems = null, this._labelItems = null, this.beforeSetDimensions(), this.setDimensions(), this.afterSetDimensions(), this._maxLength = this.isHorizontal() ? this.width + i.left + i.right : this.height + i.top + i.bottom, this._dataLimitsCached || (this.beforeDataLimits(), this.determineDataLimits(), this.afterDataLimits(), this._range = Si(this, n, s), this._dataLimitsCached = !0), this.beforeBuildTicks(), this.ticks = this.buildTicks() || [], this.afterBuildTicks(); const r = a < this.ticks.length;
            this._convertTicksToLabels(r ? js(this.ticks, a) : this.ticks), this.configure(), this.beforeCalculateLabelRotation(), this.calculateLabelRotation(), this.afterCalculateLabelRotation(), o.display && (o.autoSkip || "auto" === o.source) && (this.ticks = Ns(this, this.ticks), this._labelSizes = null, this.afterAutoSkip()), r && this._convertTicksToLabels(this.ticks), this.beforeFit(), this.fit(), this.afterFit(), this.afterUpdate() }
        configure() { let t, e, i = this.options.reverse;
            this.isHorizontal() ? (t = this.left, e = this.right) : (t = this.top, e = this.bottom, i = !i), this._startPixel = t, this._endPixel = e, this._reversePixels = i, this._length = e - t, this._alignToPixels = this.options.alignToPixels }
        afterUpdate() { d(this.options.afterUpdate, [this]) }
        beforeSetDimensions() { d(this.options.beforeSetDimensions, [this]) }
        setDimensions() { this.isHorizontal() ? (this.width = this.maxWidth, this.left = 0, this.right = this.width) : (this.height = this.maxHeight, this.top = 0, this.bottom = this.height), this.paddingLeft = 0, this.paddingTop = 0, this.paddingRight = 0, this.paddingBottom = 0 }
        afterSetDimensions() { d(this.options.afterSetDimensions, [this]) }
        _callHooks(t) { this.chart.notifyPlugins(t, this.getContext()), d(this.options[t], [this]) }
        beforeDataLimits() { this._callHooks("beforeDataLimits") }
        determineDataLimits() {}
        afterDataLimits() { this._callHooks("afterDataLimits") }
        beforeBuildTicks() { this._callHooks("beforeBuildTicks") }
        buildTicks() { return [] }
        afterBuildTicks() { this._callHooks("afterBuildTicks") }
        beforeTickToLabelConversion() { d(this.options.beforeTickToLabelConversion, [this]) }
        generateTickLabels(t) { const e = this.options.ticks; let i, s, n; for (i = 0, s = t.length; i < s; i++) n = t[i], n.label = d(e.callback, [n.value, i, t], this) }
        afterTickToLabelConversion() { d(this.options.afterTickToLabelConversion, [this]) }
        beforeCalculateLabelRotation() { d(this.options.beforeCalculateLabelRotation, [this]) }
        calculateLabelRotation() { const t = this.options,
                e = t.ticks,
                i = this.ticks.length,
                s = e.minRotation || 0,
                n = e.maxRotation; let o, a, r, l = s; if (!this._isVisible() || !e.display || s >= n || i <= 1 || !this.isHorizontal()) return void(this.labelRotation = s); const h = this._getLabelSizes(),
                c = h.widest.width,
                d = h.highest.height,
                u = J(this.chart.width - c, 0, this.maxWidth);
            o = t.offset ? this.maxWidth / i : u / (i - 1), c + 6 > o && (o = u / (i - (t.offset ? .5 : 1)), a = this.maxHeight - Ys(t.grid) - e.padding - Us(t.title, this.chart.options.font), r = Math.sqrt(c * c + d * d), l = Y(Math.min(Math.asin(J((h.highest.height + 6) / o, -1, 1)), Math.asin(J(a / r, -1, 1)) - Math.asin(J(d / r, -1, 1)))), l = Math.max(s, Math.min(n, l))), this.labelRotation = l }
        afterCalculateLabelRotation() { d(this.options.afterCalculateLabelRotation, [this]) }
        afterAutoSkip() {}
        beforeFit() { d(this.options.beforeFit, [this]) }
        fit() { const t = { width: 0, height: 0 },
                { chart: e, options: { ticks: i, title: s, grid: n } } = this,
                o = this._isVisible(),
                a = this.isHorizontal(); if (o) { const o = Us(s, e.options.font); if (a ? (t.width = this.maxWidth, t.height = Ys(n) + o) : (t.height = this.maxHeight, t.width = Ys(n) + o), i.display && this.ticks.length) { const { first: e, last: s, widest: n, highest: o } = this._getLabelSizes(), r = 2 * i.padding, l = $(this.labelRotation), h = Math.cos(l), c = Math.sin(l); if (a) { const e = i.mirror ? 0 : c * n.width + h * o.height;
                        t.height = Math.min(this.maxHeight, t.height + e + r) } else { const e = i.mirror ? 0 : h * n.width + c * o.height;
                        t.width = Math.min(this.maxWidth, t.width + e + r) }
                    this._calculatePadding(e, s, c, h) } }
            this._handleMargins(), a ? (this.width = this._length = e.width - this._margins.left - this._margins.right, this.height = t.height) : (this.width = t.width, this.height = this._length = e.height - this._margins.top - this._margins.bottom) }
        _calculatePadding(t, e, i, s) { const { ticks: { align: n, padding: o }, position: a } = this.options, r = 0 !== this.labelRotation, l = "top" !== a && "x" === this.axis; if (this.isHorizontal()) { const a = this.getPixelForTick(0) - this.left,
                    h = this.right - this.getPixelForTick(this.ticks.length - 1); let c = 0,
                    d = 0;
                r ? l ? (c = s * t.width, d = i * e.height) : (c = i * t.height, d = s * e.width) : "start" === n ? d = e.width : "end" === n ? c = t.width : "inner" !== n && (c = t.width / 2, d = e.width / 2), this.paddingLeft = Math.max((c - a + o) * this.width / (this.width - a), 0), this.paddingRight = Math.max((d - h + o) * this.width / (this.width - h), 0) } else { let i = e.height / 2,
                    s = t.height / 2; "start" === n ? (i = 0, s = t.height) : "end" === n && (i = e.height, s = 0), this.paddingTop = i + o, this.paddingBottom = s + o } }
        _handleMargins() { this._margins && (this._margins.left = Math.max(this.paddingLeft, this._margins.left), this._margins.top = Math.max(this.paddingTop, this._margins.top), this._margins.right = Math.max(this.paddingRight, this._margins.right), this._margins.bottom = Math.max(this.paddingBottom, this._margins.bottom)) }
        afterFit() { d(this.options.afterFit, [this]) }
        isHorizontal() { const { axis: t, position: e } = this.options; return "top" === e || "bottom" === e || "x" === t }
        isFullSize() { return this.options.fullSize }
        _convertTicksToLabels(t) { let e, i; for (this.beforeTickToLabelConversion(), this.generateTickLabels(t), e = 0, i = t.length; e < i; e++) s(t[e].label) && (t.splice(e, 1), i--, e--);
            this.afterTickToLabelConversion() }
        _getLabelSizes() { let t = this._labelSizes; if (!t) { const e = this.options.ticks.sampleSize; let i = this.ticks;
                e < i.length && (i = js(i, e)), this._labelSizes = t = this._computeLabelSizes(i, i.length) } return t }
        _computeLabelSizes(t, e) { const { ctx: i, _longestTextCache: o } = this, a = [], r = []; let l, h, c, d, f, g, p, m, b, x, _, y = 0,
                v = 0; for (l = 0; l < e; ++l) { if (d = t[l].label, f = this._resolveTickFontOptions(l), i.font = g = f.string, p = o[g] = o[g] || { data: {}, gc: [] }, m = f.lineHeight, b = x = 0, s(d) || n(d)) { if (n(d))
                        for (h = 0, c = d.length; h < c; ++h) _ = d[h], s(_) || n(_) || (b = De(i, p.data, p.gc, b, _), x += m) } else b = De(i, p.data, p.gc, b, d), x = m;
                a.push(b), r.push(x), y = Math.max(b, y), v = Math.max(x, v) }! function(t, e) { u(t, (t => { const i = t.gc,
                        s = i.length / 2; let n; if (s > e) { for (n = 0; n < s; ++n) delete t.data[i[n]];
                        i.splice(0, s) } })) }(o, e); const M = a.indexOf(y),
                w = r.indexOf(v),
                k = t => ({ width: a[t] || 0, height: r[t] || 0 }); return { first: k(0), last: k(e - 1), widest: k(M), highest: k(w), widths: a, heights: r } }
        getLabelForValue(t) { return t }
        getPixelForValue(t, e) { return NaN }
        getValueForPixel(t) {}
        getPixelForTick(t) { const e = this.ticks; return t < 0 || t > e.length - 1 ? null : this.getPixelForValue(e[t].value) }
        getPixelForDecimal(t) { this._reversePixels && (t = 1 - t); const e = this._startPixel + t * this._length; return Q(this._alignToPixels ? Oe(this.chart, e, 0) : e) }
        getDecimalForPixel(t) { const e = (t - this._startPixel) / this._length; return this._reversePixels ? 1 - e : e }
        getBasePixel() { return this.getPixelForValue(this.getBaseValue()) }
        getBaseValue() { const { min: t, max: e } = this; return t < 0 && e < 0 ? e : t > 0 && e > 0 ? t : 0 }
        getContext(t) { const e = this.ticks || []; if (t >= 0 && t < e.length) { const i = e[t]; return i.$context || (i.$context = function(t, e, i) { return Pi(t, { tick: i, index: e, type: "tick" }) }(this.getContext(), t, i)) } return this.$context || (this.$context = Pi(this.chart.getContext(), { scale: this, type: "scale" })) }
        _tickSize() { const t = this.options.ticks,
                e = $(this.labelRotation),
                i = Math.abs(Math.cos(e)),
                s = Math.abs(Math.sin(e)),
                n = this._getLabelSizes(),
                o = t.autoSkipPadding || 0,
                a = n ? n.widest.width + o : 0,
                r = n ? n.highest.height + o : 0; return this.isHorizontal() ? r * i > a * s ? a / i : r / s : r * s < a * i ? r / i : a / s }
        _isVisible() { const t = this.options.display; return "auto" !== t ? !!t : this.getMatchingVisibleMetas().length > 0 }
        _computeGridLineItems(t) { const e = this.axis,
                i = this.chart,
                s = this.options,
                { grid: n, position: a, border: r } = s,
                h = n.offset,
                c = this.isHorizontal(),
                d = this.ticks.length + (h ? 1 : 0),
                u = Ys(n),
                f = [],
                g = r.setContext(this.getContext()),
                p = g.display ? g.width : 0,
                m = p / 2,
                b = function(t) { return Oe(i, t, p) }; let x, _, y, v, M, w, k, S, P, D, C, O; if ("top" === a) x = b(this.bottom), w = this.bottom - u, S = x - m, D = b(t.top) + m, O = t.bottom;
            else if ("bottom" === a) x = b(this.top), D = t.top, O = b(t.bottom) - m, w = x + m, S = this.top + u;
            else if ("left" === a) x = b(this.right), M = this.right - u, k = x - m, P = b(t.left) + m, C = t.right;
            else if ("right" === a) x = b(this.left), P = t.left, C = b(t.right) - m, M = x + m, k = this.left + u;
            else if ("x" === e) { if ("center" === a) x = b((t.top + t.bottom) / 2 + .5);
                else if (o(a)) { const t = Object.keys(a)[0],
                        e = a[t];
                    x = b(this.chart.scales[t].getPixelForValue(e)) }
                D = t.top, O = t.bottom, w = x + m, S = w + u } else if ("y" === e) { if ("center" === a) x = b((t.left + t.right) / 2);
                else if (o(a)) { const t = Object.keys(a)[0],
                        e = a[t];
                    x = b(this.chart.scales[t].getPixelForValue(e)) }
                M = x - m, k = M - u, P = t.left, C = t.right } const A = l(s.ticks.maxTicksLimit, d),
                T = Math.max(1, Math.ceil(d / A)); for (_ = 0; _ < d; _ += T) { const t = this.getContext(_),
                    e = n.setContext(t),
                    s = r.setContext(t),
                    o = e.lineWidth,
                    a = e.color,
                    l = s.dash || [],
                    d = s.dashOffset,
                    u = e.tickWidth,
                    g = e.tickColor,
                    p = e.tickBorderDash || [],
                    m = e.tickBorderDashOffset;
                y = $s(this, _, h), void 0 !== y && (v = Oe(i, y, o), c ? M = k = P = C = v : w = S = D = O = v, f.push({ tx1: M, ty1: w, tx2: k, ty2: S, x1: P, y1: D, x2: C, y2: O, width: o, color: a, borderDash: l, borderDashOffset: d, tickWidth: u, tickColor: g, tickBorderDash: p, tickBorderDashOffset: m })) } return this._ticksLength = d, this._borderValue = x, f }
        _computeLabelItems(t) { const e = this.axis,
                i = this.options,
                { position: s, ticks: a } = i,
                r = this.isHorizontal(),
                l = this.ticks,
                { align: h, crossAlign: c, padding: d, mirror: u } = a,
                f = Ys(i.grid),
                g = f + d,
                p = u ? -d : g,
                m = -$(this.labelRotation),
                b = []; let x, _, y, v, M, w, k, S, P, D, C, O, A = "middle"; if ("top" === s) w = this.bottom - p, k = this._getXAxisLabelAlignment();
            else if ("bottom" === s) w = this.top + p, k = this._getXAxisLabelAlignment();
            else if ("left" === s) { const t = this._getYAxisLabelAlignment(f);
                k = t.textAlign, M = t.x } else if ("right" === s) { const t = this._getYAxisLabelAlignment(f);
                k = t.textAlign, M = t.x } else if ("x" === e) { if ("center" === s) w = (t.top + t.bottom) / 2 + g;
                else if (o(s)) { const t = Object.keys(s)[0],
                        e = s[t];
                    w = this.chart.scales[t].getPixelForValue(e) + g }
                k = this._getXAxisLabelAlignment() } else if ("y" === e) { if ("center" === s) M = (t.left + t.right) / 2 - g;
                else if (o(s)) { const t = Object.keys(s)[0],
                        e = s[t];
                    M = this.chart.scales[t].getPixelForValue(e) }
                k = this._getYAxisLabelAlignment(f).textAlign } "y" === e && ("start" === h ? A = "top" : "end" === h && (A = "bottom")); const T = this._getLabelSizes(); for (x = 0, _ = l.length; x < _; ++x) { y = l[x], v = y.label; const t = a.setContext(this.getContext(x));
                S = this.getPixelForTick(x) + a.labelOffset, P = this._resolveTickFontOptions(x), D = P.lineHeight, C = n(v) ? v.length : 1; const e = C / 2,
                    i = t.color,
                    o = t.textStrokeColor,
                    h = t.textStrokeWidth; let d, f = k; if (r ? (M = S, "inner" === k && (f = x === _ - 1 ? this.options.reverse ? "left" : "right" : 0 === x ? this.options.reverse ? "right" : "left" : "center"), O = "top" === s ? "near" === c || 0 !== m ? -C * D + D / 2 : "center" === c ? -T.highest.height / 2 - e * D + D : -T.highest.height + D / 2 : "near" === c || 0 !== m ? D / 2 : "center" === c ? T.highest.height / 2 - e * D : T.highest.height - C * D, u && (O *= -1), 0 === m || t.showLabelBackdrop || (M += D / 2 * Math.sin(m))) : (w = S, O = (1 - C) * D / 2), t.showLabelBackdrop) { const e = Mi(t.backdropPadding),
                        i = T.heights[x],
                        s = T.widths[x]; let n = O - e.top,
                        o = 0 - e.left; switch (A) {
                        case "middle":
                            n -= i / 2; break;
                        case "bottom":
                            n -= i } switch (k) {
                        case "center":
                            o -= s / 2; break;
                        case "right":
                            o -= s }
                    d = { left: o, top: n, width: s + e.width, height: i + e.height, color: t.backdropColor } }
                b.push({ label: v, font: P, textOffset: O, options: { rotation: m, color: i, strokeColor: o, strokeWidth: h, textAlign: f, textBaseline: A, translation: [M, w], backdrop: d } }) } return b }
        _getXAxisLabelAlignment() { const { position: t, ticks: e } = this.options; if (-$(this.labelRotation)) return "top" === t ? "left" : "right"; let i = "center"; return "start" === e.align ? i = "left" : "end" === e.align ? i = "right" : "inner" === e.align && (i = "inner"), i }
        _getYAxisLabelAlignment(t) { const { position: e, ticks: { crossAlign: i, mirror: s, padding: n } } = this.options, o = t + n, a = this._getLabelSizes().widest.width; let r, l; return "left" === e ? s ? (l = this.right + n, "near" === i ? r = "left" : "center" === i ? (r = "center", l += a / 2) : (r = "right", l += a)) : (l = this.right - o, "near" === i ? r = "right" : "center" === i ? (r = "center", l -= a / 2) : (r = "left", l = this.left)) : "right" === e ? s ? (l = this.left + n, "near" === i ? r = "right" : "center" === i ? (r = "center", l -= a / 2) : (r = "left", l -= a)) : (l = this.left + o, "near" === i ? r = "left" : "center" === i ? (r = "center", l += a / 2) : (r = "right", l = this.right)) : r = "right", { textAlign: r, x: l } }
        _computeLabelArea() { if (this.options.ticks.mirror) return; const t = this.chart,
                e = this.options.position; return "left" === e || "right" === e ? { top: 0, left: this.left, bottom: t.height, right: this.right } : "top" === e || "bottom" === e ? { top: this.top, left: 0, bottom: this.bottom, right: t.width } : void 0 }
        drawBackground() { const { ctx: t, options: { backgroundColor: e }, left: i, top: s, width: n, height: o } = this;
            e && (t.save(), t.fillStyle = e, t.fillRect(i, s, n, o), t.restore()) }
        getLineWidthForValue(t) { const e = this.options.grid; if (!this._isVisible() || !e.display) return 0; const i = this.ticks.findIndex((e => e.value === t)); if (i >= 0) { return e.setContext(this.getContext(i)).lineWidth } return 0 }
        drawGrid(t) { const e = this.options.grid,
                i = this.ctx,
                s = this._gridLineItems || (this._gridLineItems = this._computeGridLineItems(t)); let n, o; const a = (t, e, s) => { s.width && s.color && (i.save(), i.lineWidth = s.width, i.strokeStyle = s.color, i.setLineDash(s.borderDash || []), i.lineDashOffset = s.borderDashOffset, i.beginPath(), i.moveTo(t.x, t.y), i.lineTo(e.x, e.y), i.stroke(), i.restore()) }; if (e.display)
                for (n = 0, o = s.length; n < o; ++n) { const t = s[n];
                    e.drawOnChartArea && a({ x: t.x1, y: t.y1 }, { x: t.x2, y: t.y2 }, t), e.drawTicks && a({ x: t.tx1, y: t.ty1 }, { x: t.tx2, y: t.ty2 }, { color: t.tickColor, width: t.tickWidth, borderDash: t.tickBorderDash, borderDashOffset: t.tickBorderDashOffset }) } }
        drawBorder() { const { chart: t, ctx: e, options: { border: i, grid: s } } = this, n = i.setContext(this.getContext()), o = i.display ? n.width : 0; if (!o) return; const a = s.setContext(this.getContext(0)).lineWidth,
                r = this._borderValue; let l, h, c, d;
            this.isHorizontal() ? (l = Oe(t, this.left, o) - o / 2, h = Oe(t, this.right, a) + a / 2, c = d = r) : (c = Oe(t, this.top, o) - o / 2, d = Oe(t, this.bottom, a) + a / 2, l = h = r), e.save(), e.lineWidth = n.width, e.strokeStyle = n.color, e.beginPath(), e.moveTo(l, c), e.lineTo(h, d), e.stroke(), e.restore() }
        drawLabels(t) { if (!this.options.ticks.display) return; const e = this.ctx,
                i = this._computeLabelArea();
            i && Re(e, i); const s = this.getLabelItems(t); for (const t of s) { const i = t.options,
                    s = t.font;
                Ve(e, t.label, 0, t.textOffset, s, i) }
            i && Ie(e) }
        drawTitle() { const { ctx: t, options: { position: e, title: i, reverse: s } } = this; if (!i.display) return; const a = wi(i.font),
                r = Mi(i.padding),
                l = i.align; let h = a.lineHeight / 2; "bottom" === e || "center" === e || o(e) ? (h += r.bottom, n(i.text) && (h += a.lineHeight * (i.text.length - 1))) : h += r.top; const { titleX: c, titleY: d, maxWidth: u, rotation: f } = function(t, e, i, s) { const { top: n, left: a, bottom: r, right: l, chart: h } = t, { chartArea: c, scales: d } = h; let u, f, g, p = 0; const m = r - n,
                    b = l - a; if (t.isHorizontal()) { if (f = ft(s, a, l), o(i)) { const t = Object.keys(i)[0],
                            s = i[t];
                        g = d[t].getPixelForValue(s) + m - e } else g = "center" === i ? (c.bottom + c.top) / 2 + m - e : Hs(t, i, e);
                    u = l - a } else { if (o(i)) { const t = Object.keys(i)[0],
                            s = i[t];
                        f = d[t].getPixelForValue(s) - b + e } else f = "center" === i ? (c.left + c.right) / 2 - b + e : Hs(t, i, e);
                    g = ft(s, r, n), p = "left" === i ? -E : E } return { titleX: f, titleY: g, maxWidth: u, rotation: p } }(this, h, e, l);
            Ve(t, i.text, 0, 0, a, { color: i.color, maxWidth: u, rotation: f, textAlign: Xs(l, e, s), textBaseline: "middle", translation: [c, d] }) }
        draw(t) { this._isVisible() && (this.drawBackground(), this.drawGrid(t), this.drawBorder(), this.drawTitle(), this.drawLabels(t)) }
        _layers() { const t = this.options,
                e = t.ticks && t.ticks.z || 0,
                i = l(t.grid && t.grid.z, -1),
                s = l(t.border && t.border.z, 0); return this._isVisible() && this.draw === qs.prototype.draw ? [{ z: i, draw: t => { this.drawBackground(), this.drawGrid(t), this.drawTitle() } }, { z: s, draw: () => { this.drawBorder() } }, { z: e, draw: t => { this.drawLabels(t) } }] : [{ z: e, draw: t => { this.draw(t) } }] }
        getMatchingVisibleMetas(t) { const e = this.chart.getSortedVisibleDatasetMetas(),
                i = this.axis + "AxisID",
                s = []; let n, o; for (n = 0, o = e.length; n < o; ++n) { const o = e[n];
                o[i] !== this.id || t && o.type !== t || s.push(o) } return s }
        _resolveTickFontOptions(t) { return wi(this.options.ticks.setContext(this.getContext(t)).font) }
        _maxDigits() { const t = this._resolveTickFontOptions(0).lineHeight; return (this.isHorizontal() ? this.width : this.height) / t } }
    class Ks { constructor(t, e, i) { this.type = t, this.scope = e, this.override = i, this.items = Object.create(null) }
        isForType(t) { return Object.prototype.isPrototypeOf.call(this.type.prototype, t.prototype) }
        register(t) { const e = Object.getPrototypeOf(t); let i;
            (function(t) { return "id" in t && "defaults" in t })(e) && (i = this.register(e)); const s = this.items,
                n = t.id,
                o = this.scope + "." + n; if (!n) throw new Error("class does not have id: " + t); return n in s || (s[n] = t, function(t, e, i) { const s = b(Object.create(null), [i ? ue.get(i) : {}, ue.get(e), t.defaults]);
                ue.set(e, s), t.defaultRoutes && function(t, e) { Object.keys(e).forEach((i => { const s = i.split("."),
                            n = s.pop(),
                            o = [t].concat(s).join("."),
                            a = e[i].split("."),
                            r = a.pop(),
                            l = a.join(".");
                        ue.route(o, n, l, r) })) }(e, t.defaultRoutes);
                t.descriptors && ue.describe(e, t.descriptors) }(t, o, i), this.override && ue.override(t.id, t.overrides)), o }
        get(t) { return this.items[t] }
        unregister(t) { const e = this.items,
                i = t.id,
                s = this.scope;
            i in e && delete e[i], s && i in ue[s] && (delete ue[s][i], this.override && delete re[i]) } }
    class Gs { constructor() { this.controllers = new Ks(Vs, "datasets", !0), this.elements = new Ks(Bs, "elements"), this.plugins = new Ks(Object, "plugins"), this.scales = new Ks(qs, "scales"), this._typedRegistries = [this.controllers, this.scales, this.elements] }
        add(...t) { this._each("register", t) }
        remove(...t) { this._each("unregister", t) }
        addControllers(...t) { this._each("register", t, this.controllers) }
        addElements(...t) { this._each("register", t, this.elements) }
        addPlugins(...t) { this._each("register", t, this.plugins) }
        addScales(...t) { this._each("register", t, this.scales) }
        getController(t) { return this._get(t, this.controllers, "controller") }
        getElement(t) { return this._get(t, this.elements, "element") }
        getPlugin(t) { return this._get(t, this.plugins, "plugin") }
        getScale(t) { return this._get(t, this.scales, "scale") }
        removeControllers(...t) { this._each("unregister", t, this.controllers) }
        removeElements(...t) { this._each("unregister", t, this.elements) }
        removePlugins(...t) { this._each("unregister", t, this.plugins) }
        removeScales(...t) { this._each("unregister", t, this.scales) }
        _each(t, e, i) {
            [...e].forEach((e => { const s = i || this._getRegistryForType(e);
                i || s.isForType(e) || s === this.plugins && e.id ? this._exec(t, s, e) : u(e, (e => { const s = i || this._getRegistryForType(e);
                    this._exec(t, s, e) })) })) }
        _exec(t, e, i) { const s = w(t);
            d(i["before" + s], [], i), e[t](i), d(i["after" + s], [], i) }
        _getRegistryForType(t) { for (let e = 0; e < this._typedRegistries.length; e++) { const i = this._typedRegistries[e]; if (i.isForType(t)) return i } return this.plugins }
        _get(t, e, i) { const s = e.get(t); if (void 0 === s) throw new Error('"' + t + '" is not a registered ' + i + "."); return s } } var Zs = new Gs;
    class Js { constructor() { this._init = [] }
        notify(t, e, i, s) { "beforeInit" === e && (this._init = this._createDescriptors(t, !0), this._notify(this._init, t, "install")); const n = s ? this._descriptors(t).filter(s) : this._descriptors(t),
                o = this._notify(n, t, e, i); return "afterDestroy" === e && (this._notify(n, t, "stop"), this._notify(this._init, t, "uninstall")), o }
        _notify(t, e, i, s) { s = s || {}; for (const n of t) { const t = n.plugin; if (!1 === d(t[i], [e, s, n.options], t) && s.cancelable) return !1 } return !0 }
        invalidate() { s(this._cache) || (this._oldCache = this._cache, this._cache = void 0) }
        _descriptors(t) { if (this._cache) return this._cache; const e = this._cache = this._createDescriptors(t); return this._notifyStateChanges(t), e }
        _createDescriptors(t, e) { const i = t && t.config,
                s = l(i.options && i.options.plugins, {}),
                n = function(t) { const e = {},
                        i = [],
                        s = Object.keys(Zs.plugins.items); for (let t = 0; t < s.length; t++) i.push(Zs.getPlugin(s[t])); const n = t.plugins || []; for (let t = 0; t < n.length; t++) { const s = n[t]; - 1 === i.indexOf(s) && (i.push(s), e[s.id] = !0) } return { plugins: i, localIds: e } }(i); return !1 !== s || e ? function(t, { plugins: e, localIds: i }, s, n) { const o = [],
                    a = t.getContext(); for (const r of e) { const e = r.id,
                        l = Qs(s[e], n);
                    null !== l && o.push({ plugin: r, options: tn(t.config, { plugin: r, local: i[e] }, l, a) }) } return o }(t, n, s, e) : [] }
        _notifyStateChanges(t) { const e = this._oldCache || [],
                i = this._cache,
                s = (t, e) => t.filter((t => !e.some((e => t.plugin.id === e.plugin.id))));
            this._notify(s(e, i), t, "stop"), this._notify(s(i, e), t, "start") } }

    function Qs(t, e) { return e || !1 !== t ? !0 === t ? {} : t : null }

    function tn(t, { plugin: e, local: i }, s, n) { const o = t.pluginScopeKeys(e),
            a = t.getOptionScopes(s, o); return i && e.defaults && a.push(e.defaults), t.createResolver(a, n, [""], { scriptable: !1, indexable: !1, allKeys: !0 }) }

    function en(t, e) { const i = ue.datasets[t] || {}; return ((e.datasets || {})[t] || {}).indexAxis || e.indexAxis || i.indexAxis || "x" }

    function sn(t, e) { if ("x" === t || "y" === t || "r" === t) return t; var i; if (t = e.axis || ("top" === (i = e.position) || "bottom" === i ? "x" : "left" === i || "right" === i ? "y" : void 0) || t.length > 1 && sn(t[0].toLowerCase(), e)) return t; throw new Error(`Cannot determine type of '${name}' axis. Please provide 'axis' or 'position' option.`) }

    function nn(t) { const e = t.options || (t.options = {});
        e.plugins = l(e.plugins, {}), e.scales = function(t, e) { const i = re[t.type] || { scales: {} },
                s = e.scales || {},
                n = en(t.type, e),
                a = Object.create(null); return Object.keys(s).forEach((t => { const e = s[t]; if (!o(e)) return console.error(`Invalid scale configuration for scale: ${t}`); if (e._proxy) return console.warn(`Ignoring resolver passed as options for scale: ${t}`); const r = sn(t, e),
                    l = function(t, e) { return t === e ? "_index_" : "_value_" }(r, n),
                    h = i.scales || {};
                a[t] = x(Object.create(null), [{ axis: r }, e, h[r], h[l]]) })), t.data.datasets.forEach((i => { const n = i.type || t.type,
                    o = i.indexAxis || en(n, e),
                    r = (re[n] || {}).scales || {};
                Object.keys(r).forEach((t => { const e = function(t, e) { let i = t; return "_index_" === t ? i = e : "_value_" === t && (i = "x" === e ? "y" : "x"), i }(t, o),
                        n = i[e + "AxisID"] || e;
                    a[n] = a[n] || Object.create(null), x(a[n], [{ axis: e }, s[n], r[t]]) })) })), Object.keys(a).forEach((t => { const e = a[t];
                x(e, [ue.scales[e.type], ue.scale]) })), a }(t, e) }

    function on(t) { return (t = t || {}).datasets = t.datasets || [], t.labels = t.labels || [], t } const an = new Map,
        rn = new Set;

    function ln(t, e) { let i = an.get(t); return i || (i = e(), an.set(t, i), rn.add(i)), i } const hn = (t, e, i) => { const s = M(e, i);
        void 0 !== s && t.add(s) };
    class cn { constructor(t) { this._config = function(t) { return (t = t || {}).data = on(t.data), nn(t), t }(t), this._scopeCache = new Map, this._resolverCache = new Map }
        get platform() { return this._config.platform }
        get type() { return this._config.type }
        set type(t) { this._config.type = t }
        get data() { return this._config.data }
        set data(t) { this._config.data = on(t) }
        get options() { return this._config.options }
        set options(t) { this._config.options = t }
        get plugins() { return this._config.plugins }
        update() { const t = this._config;
            this.clearCache(), nn(t) }
        clearCache() { this._scopeCache.clear(), this._resolverCache.clear() }
        datasetScopeKeys(t) { return ln(t, (() => [
                [`datasets.${t}`, ""]
            ])) }
        datasetAnimationScopeKeys(t, e) { return ln(`${t}.transition.${e}`, (() => [
                [`datasets.${t}.transitions.${e}`, `transitions.${e}`],
                [`datasets.${t}`, ""]
            ])) }
        datasetElementScopeKeys(t, e) { return ln(`${t}-${e}`, (() => [
                [`datasets.${t}.elements.${e}`, `datasets.${t}`, `elements.${e}`, ""]
            ])) }
        pluginScopeKeys(t) { const e = t.id; return ln(`${this.type}-plugin-${e}`, (() => [
                [`plugins.${e}`, ...t.additionalOptionScopes || []]
            ])) }
        _cachedScopes(t, e) { const i = this._scopeCache; let s = i.get(t); return s && !e || (s = new Map, i.set(t, s)), s }
        getOptionScopes(t, e, i) { const { options: s, type: n } = this, o = this._cachedScopes(t, i), a = o.get(e); if (a) return a; const r = new Set;
            e.forEach((e => { t && (r.add(t), e.forEach((e => hn(r, t, e)))), e.forEach((t => hn(r, s, t))), e.forEach((t => hn(r, re[n] || {}, t))), e.forEach((t => hn(r, ue, t))), e.forEach((t => hn(r, le, t))) })); const l = Array.from(r); return 0 === l.length && l.push(Object.create(null)), rn.has(e) && o.set(e, l), l }
        chartOptionScopes() { const { options: t, type: e } = this; return [t, re[e] || {}, ue.datasets[e] || {}, { type: e }, ue, le] }
        resolveNamedOptions(t, e, i, s = [""]) { const o = { $shared: !0 },
                { resolver: a, subPrefixes: r } = dn(this._resolverCache, t, s); let l = a; if (function(t, e) { const { isScriptable: i, isIndexable: s } = $e(t); for (const o of e) { const e = i(o),
                            a = s(o),
                            r = (a || e) && t[o]; if (e && (S(r) || un(r)) || a && n(r)) return !0 } return !1 }(a, e)) { o.$shared = !1;
                l = je(a, i = S(i) ? i() : i, this.createResolver(t, i, r)) } for (const t of e) o[t] = l[t]; return o }
        createResolver(t, e, i = [""], s) { const { resolver: n } = dn(this._resolverCache, t, i); return o(e) ? je(n, e, void 0, s) : n } }

    function dn(t, e, i) { let s = t.get(e);
        s || (s = new Map, t.set(e, s)); const n = i.join(); let o = s.get(n); if (!o) { o = { resolver: He(e, i), subPrefixes: i.filter((t => !t.toLowerCase().includes("hover"))) }, s.set(n, o) } return o } const un = t => o(t) && Object.getOwnPropertyNames(t).reduce(((e, i) => e || S(t[i])), !1); const fn = ["top", "bottom", "left", "right", "chartArea"];

    function gn(t, e) { return "top" === t || "bottom" === t || -1 === fn.indexOf(t) && "x" === e }

    function pn(t, e) { return function(i, s) { return i[t] === s[t] ? i[e] - s[e] : i[t] - s[t] } }

    function mn(t) { const e = t.chart,
            i = e.options.animation;
        e.notifyPlugins("afterRender"), d(i && i.onComplete, [t], e) }

    function bn(t) { const e = t.chart,
            i = e.options.animation;
        d(i && i.onProgress, [t], e) }

    function xn(t) { return fe() && "string" == typeof t ? t = document.getElementById(t) : t && t.length && (t = t[0]), t && t.canvas && (t = t.canvas), t } const _n = {},
        yn = t => { const e = xn(t); return Object.values(_n).filter((t => t.canvas === e)).pop() };

    function vn(t, e, i) { const s = Object.keys(t); for (const n of s) { const s = +n; if (s >= e) { const o = t[n];
                delete t[n], (i > 0 || s > e) && (t[s + i] = o) } } }
    class Mn { static defaults = ue;
        static instances = _n;
        static overrides = re;
        static registry = Zs;
        static version = "4.1.1";
        static getChart = yn;
        static register(...t) { Zs.add(...t), wn() }
        static unregister(...t) { Zs.remove(...t), wn() }
        constructor(t, e) { const s = this.config = new cn(e),
                n = xn(t),
                o = yn(n); if (o) throw new Error("Canvas is already in use. Chart with ID '" + o.id + "' must be destroyed before the canvas with ID '" + o.canvas.id + "' can be reused."); const a = s.createResolver(s.chartOptionScopes(), this.getContext());
            this.platform = new(s.platform || vs(n)), this.platform.updateConfig(s); const r = this.platform.acquireContext(n, a.aspectRatio),
                l = r && r.canvas,
                h = l && l.height,
                c = l && l.width;
            this.id = i(), this.ctx = r, this.canvas = l, this.width = c, this.height = h, this._options = a, this._aspectRatio = this.aspectRatio, this._layers = [], this._metasets = [], this._stacks = void 0, this.boxes = [], this.currentDevicePixelRatio = void 0, this.chartArea = void 0, this._active = [], this._lastEvent = void 0, this._listeners = {}, this._responsiveListeners = void 0, this._sortedMetasets = [], this.scales = {}, this._plugins = new Js, this.$proxies = {}, this._hiddenIndices = {}, this.attached = !1, this._animationsDisabled = void 0, this.$context = void 0, this._doResize = dt((t => this.update(t)), a.resizeDelay || 0), this._dataChanges = [], _n[this.id] = this, r && l ? (xt.listen(this, "complete", mn), xt.listen(this, "progress", bn), this._initialize(), this.attached && this.update()) : console.error("Failed to create chart: can't acquire context from the given item") }
        get aspectRatio() { const { options: { aspectRatio: t, maintainAspectRatio: e }, width: i, height: n, _aspectRatio: o } = this; return s(t) ? e && o ? o : n ? i / n : null : t }
        get data() { return this.config.data }
        set data(t) { this.config.data = t }
        get options() { return this._options }
        set options(t) { this.config.options = t }
        get registry() { return Zs }
        _initialize() { return this.notifyPlugins("beforeInit"), this.options.responsive ? this.resize() : we(this, this.options.devicePixelRatio), this.bindEvents(), this.notifyPlugins("afterInit"), this }
        clear() { return Ae(this.canvas, this.ctx), this }
        stop() { return xt.stop(this), this }
        resize(t, e) { xt.running(this) ? this._resizeBeforeDraw = { width: t, height: e } : this._resize(t, e) }
        _resize(t, e) { const i = this.options,
                s = this.canvas,
                n = i.maintainAspectRatio && this.aspectRatio,
                o = this.platform.getMaximumSize(s, t, e, n),
                a = i.devicePixelRatio || this.platform.getDevicePixelRatio(),
                r = this.width ? "resize" : "attach";
            this.width = o.width, this.height = o.height, this._aspectRatio = this.aspectRatio, we(this, a, !0) && (this.notifyPlugins("resize", { size: o }), d(i.onResize, [this, o], this), this.attached && this._doResize(r) && this.render()) }
        ensureScalesHaveIDs() { u(this.options.scales || {}, ((t, e) => { t.id = e })) }
        buildOrUpdateScales() { const t = this.options,
                e = t.scales,
                i = this.scales,
                s = Object.keys(i).reduce(((t, e) => (t[e] = !1, t)), {}); let n = [];
            e && (n = n.concat(Object.keys(e).map((t => { const i = e[t],
                    s = sn(t, i),
                    n = "r" === s,
                    o = "x" === s; return { options: i, dposition: n ? "chartArea" : o ? "bottom" : "left", dtype: n ? "radialLinear" : o ? "category" : "linear" } })))), u(n, (e => { const n = e.options,
                    o = n.id,
                    a = sn(o, n),
                    r = l(n.type, e.dtype);
                void 0 !== n.position && gn(n.position, a) === gn(e.dposition) || (n.position = e.dposition), s[o] = !0; let h = null; if (o in i && i[o].type === r) h = i[o];
                else { h = new(Zs.getScale(r))({ id: o, type: r, ctx: this.ctx, chart: this }), i[h.id] = h }
                h.init(n, t) })), u(s, ((t, e) => { t || delete i[e] })), u(i, (t => { ns.configure(this, t, t.options), ns.addBox(this, t) })) }
        _updateMetasets() { const t = this._metasets,
                e = this.data.datasets.length,
                i = t.length; if (t.sort(((t, e) => t.index - e.index)), i > e) { for (let t = e; t < i; ++t) this._destroyDatasetMeta(t);
                t.splice(e, i - e) }
            this._sortedMetasets = t.slice(0).sort(pn("order", "index")) }
        _removeUnreferencedMetasets() { const { _metasets: t, data: { datasets: e } } = this;
            t.length > e.length && delete this._stacks, t.forEach(((t, i) => { 0 === e.filter((e => e === t._dataset)).length && this._destroyDatasetMeta(i) })) }
        buildOrUpdateControllers() { const t = [],
                e = this.data.datasets; let i, s; for (this._removeUnreferencedMetasets(), i = 0, s = e.length; i < s; i++) { const s = e[i]; let n = this.getDatasetMeta(i); const o = s.type || this.config.type; if (n.type && n.type !== o && (this._destroyDatasetMeta(i), n = this.getDatasetMeta(i)), n.type = o, n.indexAxis = s.indexAxis || en(o, this.options), n.order = s.order || 0, n.index = i, n.label = "" + s.label, n.visible = this.isDatasetVisible(i), n.controller) n.controller.updateIndex(i), n.controller.linkScales();
                else { const e = Zs.getController(o),
                        { datasetElementType: s, dataElementType: a } = ue.datasets[o];
                    Object.assign(e, { dataElementType: Zs.getElement(a), datasetElementType: s && Zs.getElement(s) }), n.controller = new e(this, i), t.push(n.controller) } } return this._updateMetasets(), t }
        _resetElements() { u(this.data.datasets, ((t, e) => { this.getDatasetMeta(e).controller.reset() }), this) }
        reset() { this._resetElements(), this.notifyPlugins("reset") }
        update(t) { const e = this.config;
            e.update(); const i = this._options = e.createResolver(e.chartOptionScopes(), this.getContext()),
                s = this._animationsDisabled = !i.animation; if (this._updateScales(), this._checkEventBindings(), this._updateHiddenIndices(), this._plugins.invalidate(), !1 === this.notifyPlugins("beforeUpdate", { mode: t, cancelable: !0 })) return; const n = this.buildOrUpdateControllers();
            this.notifyPlugins("beforeElementsUpdate"); let o = 0; for (let t = 0, e = this.data.datasets.length; t < e; t++) { const { controller: e } = this.getDatasetMeta(t), i = !s && -1 === n.indexOf(e);
                e.buildOrUpdateElements(i), o = Math.max(+e.getMaxOverflow(), o) }
            o = this._minPadding = i.layout.autoPadding ? o : 0, this._updateLayout(o), s || u(n, (t => { t.reset() })), this._updateDatasets(t), this.notifyPlugins("afterUpdate", { mode: t }), this._layers.sort(pn("z", "_idx")); const { _active: a, _lastEvent: r } = this;
            r ? this._eventHandler(r, !0) : a.length && this._updateHoverStyles(a, a, !0), this.render() }
        _updateScales() { u(this.scales, (t => { ns.removeBox(this, t) })), this.ensureScalesHaveIDs(), this.buildOrUpdateScales() }
        _checkEventBindings() { const t = this.options,
                e = new Set(Object.keys(this._listeners)),
                i = new Set(t.events);
            P(e, i) && !!this._responsiveListeners === t.responsive || (this.unbindEvents(), this.bindEvents()) }
        _updateHiddenIndices() { const { _hiddenIndices: t } = this, e = this._getUniformDataChanges() || []; for (const { method: i, start: s, count: n }
                of e) { vn(t, s, "_removeElements" === i ? -n : n) } }
        _getUniformDataChanges() { const t = this._dataChanges; if (!t || !t.length) return;
            this._dataChanges = []; const e = this.data.datasets.length,
                i = e => new Set(t.filter((t => t[0] === e)).map(((t, e) => e + "," + t.splice(1).join(",")))),
                s = i(0); for (let t = 1; t < e; t++)
                if (!P(s, i(t))) return;
            return Array.from(s).map((t => t.split(","))).map((t => ({ method: t[1], start: +t[2], count: +t[3] }))) }
        _updateLayout(t) { if (!1 === this.notifyPlugins("beforeLayout", { cancelable: !0 })) return;
            ns.update(this, this.width, this.height, t); const e = this.chartArea,
                i = e.width <= 0 || e.height <= 0;
            this._layers = [], u(this.boxes, (t => { i && "chartArea" === t.position || (t.configure && t.configure(), this._layers.push(...t._layers())) }), this), this._layers.forEach(((t, e) => { t._idx = e })), this.notifyPlugins("afterLayout") }
        _updateDatasets(t) { if (!1 !== this.notifyPlugins("beforeDatasetsUpdate", { mode: t, cancelable: !0 })) { for (let t = 0, e = this.data.datasets.length; t < e; ++t) this.getDatasetMeta(t).controller.configure(); for (let e = 0, i = this.data.datasets.length; e < i; ++e) this._updateDataset(e, S(t) ? t({ datasetIndex: e }) : t);
                this.notifyPlugins("afterDatasetsUpdate", { mode: t }) } }
        _updateDataset(t, e) { const i = this.getDatasetMeta(t),
                s = { meta: i, index: t, mode: e, cancelable: !0 };!1 !== this.notifyPlugins("beforeDatasetUpdate", s) && (i.controller._update(e), s.cancelable = !1, this.notifyPlugins("afterDatasetUpdate", s)) }
        render() {!1 !== this.notifyPlugins("beforeRender", { cancelable: !0 }) && (xt.has(this) ? this.attached && !xt.running(this) && xt.start(this) : (this.draw(), mn({ chart: this }))) }
        draw() { let t; if (this._resizeBeforeDraw) { const { width: t, height: e } = this._resizeBeforeDraw;
                this._resize(t, e), this._resizeBeforeDraw = null } if (this.clear(), this.width <= 0 || this.height <= 0) return; if (!1 === this.notifyPlugins("beforeDraw", { cancelable: !0 })) return; const e = this._layers; for (t = 0; t < e.length && e[t].z <= 0; ++t) e[t].draw(this.chartArea); for (this._drawDatasets(); t < e.length; ++t) e[t].draw(this.chartArea);
            this.notifyPlugins("afterDraw") }
        _getSortedDatasetMetas(t) { const e = this._sortedMetasets,
                i = []; let s, n; for (s = 0, n = e.length; s < n; ++s) { const n = e[s];
                t && !n.visible || i.push(n) } return i }
        getSortedVisibleDatasetMetas() { return this._getSortedDatasetMetas(!0) }
        _drawDatasets() { if (!1 === this.notifyPlugins("beforeDatasetsDraw", { cancelable: !0 })) return; const t = this.getSortedVisibleDatasetMetas(); for (let e = t.length - 1; e >= 0; --e) this._drawDataset(t[e]);
            this.notifyPlugins("afterDatasetsDraw") }
        _drawDataset(t) { const e = this.ctx,
                i = t._clip,
                s = !i.disabled,
                n = function(t) { const { xScale: e, yScale: i } = t; if (e && i) return { left: e.left, right: e.right, top: i.top, bottom: i.bottom } }(t) || this.chartArea,
                o = { meta: t, index: t.index, cancelable: !0 };!1 !== this.notifyPlugins("beforeDatasetDraw", o) && (s && Re(e, { left: !1 === i.left ? 0 : n.left - i.left, right: !1 === i.right ? this.width : n.right + i.right, top: !1 === i.top ? 0 : n.top - i.top, bottom: !1 === i.bottom ? this.height : n.bottom + i.bottom }), t.controller.draw(), s && Ie(e), o.cancelable = !1, this.notifyPlugins("afterDatasetDraw", o)) }
        isPointInArea(t) { return Ee(t, this.chartArea, this._minPadding) }
        getElementsAtEventForMode(t, e, i, s) { const n = Yi.modes[e]; return "function" == typeof n ? n(this, t, i, s) : [] }
        getDatasetMeta(t) { const e = this.data.datasets[t],
                i = this._metasets; let s = i.filter((t => t && t._dataset === e)).pop(); return s || (s = { type: null, data: [], dataset: null, controller: null, hidden: null, xAxisID: null, yAxisID: null, order: e && e.order || 0, index: t, _dataset: e, _parsed: [], _sorted: !1 }, i.push(s)), s }
        getContext() { return this.$context || (this.$context = Pi(null, { chart: this, type: "chart" })) }
        getVisibleDatasetCount() { return this.getSortedVisibleDatasetMetas().length }
        isDatasetVisible(t) { const e = this.data.datasets[t]; if (!e) return !1; const i = this.getDatasetMeta(t); return "boolean" == typeof i.hidden ? !i.hidden : !e.hidden }
        setDatasetVisibility(t, e) { this.getDatasetMeta(t).hidden = !e }
        toggleDataVisibility(t) { this._hiddenIndices[t] = !this._hiddenIndices[t] }
        getDataVisibility(t) { return !this._hiddenIndices[t] }
        _updateVisibility(t, e, i) { const s = i ? "show" : "hide",
                n = this.getDatasetMeta(t),
                o = n.controller._resolveAnimations(void 0, s);
            k(e) ? (n.data[e].hidden = !i, this.update()) : (this.setDatasetVisibility(t, i), o.update(n, { visible: i }), this.update((e => e.datasetIndex === t ? s : void 0))) }
        hide(t, e) { this._updateVisibility(t, e, !1) }
        show(t, e) { this._updateVisibility(t, e, !0) }
        _destroyDatasetMeta(t) { const e = this._metasets[t];
            e && e.controller && e.controller._destroy(), delete this._metasets[t] }
        _stop() { let t, e; for (this.stop(), xt.remove(this), t = 0, e = this.data.datasets.length; t < e; ++t) this._destroyDatasetMeta(t) }
        destroy() { this.notifyPlugins("beforeDestroy"); const { canvas: t, ctx: e } = this;
            this._stop(), this.config.clearCache(), t && (this.unbindEvents(), Ae(t, e), this.platform.releaseContext(e), this.canvas = null, this.ctx = null), delete _n[this.id], this.notifyPlugins("afterDestroy") }
        toBase64Image(...t) { return this.canvas.toDataURL(...t) }
        bindEvents() { this.bindUserEvents(), this.options.responsive ? this.bindResponsiveEvents() : this.attached = !0 }
        bindUserEvents() { const t = this._listeners,
                e = this.platform,
                i = (i, s) => { e.addEventListener(this, i, s), t[i] = s },
                s = (t, e, i) => { t.offsetX = e, t.offsetY = i, this._eventHandler(t) };
            u(this.options.events, (t => i(t, s))) }
        bindResponsiveEvents() { this._responsiveListeners || (this._responsiveListeners = {}); const t = this._responsiveListeners,
                e = this.platform,
                i = (i, s) => { e.addEventListener(this, i, s), t[i] = s },
                s = (i, s) => { t[i] && (e.removeEventListener(this, i, s), delete t[i]) },
                n = (t, e) => { this.canvas && this.resize(t, e) }; let o; const a = () => { s("attach", a), this.attached = !0, this.resize(), i("resize", n), i("detach", o) };
            o = () => { this.attached = !1, s("resize", n), this._stop(), this._resize(0, 0), i("attach", a) }, e.isAttached(this.canvas) ? a() : o() }
        unbindEvents() { u(this._listeners, ((t, e) => { this.platform.removeEventListener(this, e, t) })), this._listeners = {}, u(this._responsiveListeners, ((t, e) => { this.platform.removeEventListener(this, e, t) })), this._responsiveListeners = void 0 }
        updateHoverStyle(t, e, i) { const s = i ? "set" : "remove"; let n, o, a, r; for ("dataset" === e && (n = this.getDatasetMeta(t[0].datasetIndex), n.controller["_" + s + "DatasetHoverStyle"]()), a = 0, r = t.length; a < r; ++a) { o = t[a]; const e = o && this.getDatasetMeta(o.datasetIndex).controller;
                e && e[s + "HoverStyle"](o.element, o.datasetIndex, o.index) } }
        getActiveElements() { return this._active || [] }
        setActiveElements(t) { const e = this._active || [],
                i = t.map((({ datasetIndex: t, index: e }) => { const i = this.getDatasetMeta(t); if (!i) throw new Error("No dataset found at index " + t); return { datasetIndex: t, element: i.data[e], index: e } }));!f(i, e) && (this._active = i, this._lastEvent = null, this._updateHoverStyles(i, e)) }
        notifyPlugins(t, e, i) { return this._plugins.notify(this, t, e, i) }
        isPluginEnabled(t) { return 1 === this._plugins._cache.filter((e => e.plugin.id === t)).length }
        _updateHoverStyles(t, e, i) { const s = this.options.hover,
                n = (t, e) => t.filter((t => !e.some((e => t.datasetIndex === e.datasetIndex && t.index === e.index)))),
                o = n(e, t),
                a = i ? t : n(t, e);
            o.length && this.updateHoverStyle(o, s.mode, !1), a.length && s.mode && this.updateHoverStyle(a, s.mode, !0) }
        _eventHandler(t, e) { const i = { event: t, replay: e, cancelable: !0, inChartArea: this.isPointInArea(t) },
                s = e => (e.options.events || this.options.events).includes(t.native.type); if (!1 === this.notifyPlugins("beforeEvent", i, s)) return; const n = this._handleEvent(t, e, i.inChartArea); return i.cancelable = !1, this.notifyPlugins("afterEvent", i, s), (n || i.changed) && this.render(), this }
        _handleEvent(t, e, i) { const { _active: s = [], options: n } = this, o = e, a = this._getActiveElements(t, s, i, o), r = D(t), l = function(t, e, i, s) { return i && "mouseout" !== t.type ? s ? e : t : null }(t, this._lastEvent, i, r);
            i && (this._lastEvent = null, d(n.onHover, [t, a, this], this), r && d(n.onClick, [t, a, this], this)); const h = !f(a, s); return (h || e) && (this._active = a, this._updateHoverStyles(a, s, e)), this._lastEvent = l, h }
        _getActiveElements(t, e, i, s) { if ("mouseout" === t.type) return []; if (!i) return e; const n = this.options.hover; return this.getElementsAtEventForMode(t, n.mode, n, s) } }

    function wn() { return u(Mn.instances, (t => t._plugins.invalidate())) }

    function kn() { throw new Error("This method is not implemented: Check that a complete date adapter is provided.") }
    class Sn { static override(t) { Object.assign(Sn.prototype, t) }
        constructor(t) { this.options = t || {} }
        init() {}
        formats() { return kn() }
        parse() { return kn() }
        format() { return kn() }
        add() { return kn() }
        diff() { return kn() }
        startOf() { return kn() }
        endOf() { return kn() } } var Pn = { _date: Sn };

    function Dn(t) { const e = t.iScale,
            i = function(t, e) { if (!t._cache.$bar) { const i = t.getMatchingVisibleMetas(e); let s = []; for (let e = 0, n = i.length; e < n; e++) s = s.concat(i[e].controller.getAllParsedValues(t));
                    t._cache.$bar = lt(s.sort(((t, e) => t - e))) } return t._cache.$bar }(e, t.type); let s, n, o, a, r = e._length; const l = () => { 32767 !== o && -32768 !== o && (k(a) && (r = Math.min(r, Math.abs(o - a) || r)), a = o) }; for (s = 0, n = i.length; s < n; ++s) o = e.getPixelForValue(i[s]), l(); for (a = void 0, s = 0, n = e.ticks.length; s < n; ++s) o = e.getPixelForTick(s), l(); return r }

    function Cn(t, e, i, s) { return n(t) ? function(t, e, i, s) { const n = i.parse(t[0], s),
                o = i.parse(t[1], s),
                a = Math.min(n, o),
                r = Math.max(n, o); let l = a,
                h = r;
            Math.abs(a) > Math.abs(r) && (l = r, h = a), e[i.axis] = h, e._custom = { barStart: l, barEnd: h, start: n, end: o, min: a, max: r } }(t, e, i, s) : e[i.axis] = i.parse(t, s), e }

    function On(t, e, i, s) { const n = t.iScale,
            o = t.vScale,
            a = n.getLabels(),
            r = n === o,
            l = []; let h, c, d, u; for (h = i, c = i + s; h < c; ++h) u = e[h], d = {}, d[n.axis] = r || n.parse(a[h], h), l.push(Cn(u, d, o, h)); return l }

    function An(t) { return t && void 0 !== t.barStart && void 0 !== t.barEnd }

    function Tn(t, e, i, s) { let n = e.borderSkipped; const o = {}; if (!n) return void(t.borderSkipped = o); if (!0 === n) return void(t.borderSkipped = { top: !0, right: !0, bottom: !0, left: !0 }); const { start: a, end: r, reverse: l, top: h, bottom: c } = function(t) { let e, i, s, n, o; return t.horizontal ? (e = t.base > t.x, i = "left", s = "right") : (e = t.base < t.y, i = "bottom", s = "top"), e ? (n = "end", o = "start") : (n = "start", o = "end"), { start: i, end: s, reverse: e, top: n, bottom: o } }(t); "middle" === n && i && (t.enableBorderRadius = !0, (i._top || 0) === s ? n = h : (i._bottom || 0) === s ? n = c : (o[Ln(c, a, r, l)] = !0, n = h)), o[Ln(n, a, r, l)] = !0, t.borderSkipped = o }

    function Ln(t, e, i, s) { var n, o, a; return s ? (a = i, t = En(t = (n = t) === (o = e) ? a : n === a ? o : n, i, e)) : t = En(t, e, i), t }

    function En(t, e, i) { return "start" === t ? e : "end" === t ? i : t }

    function Rn(t, { inflateAmount: e }, i) { t.inflateAmount = "auto" === e ? 1 === i ? .33 : 0 : e }
    class In extends Vs { static id = "doughnut";
        static defaults = { datasetElementType: !1, dataElementType: "arc", animation: { animateRotate: !0, animateScale: !1 }, animations: { numbers: { type: "number", properties: ["circumference", "endAngle", "innerRadius", "outerRadius", "startAngle", "x", "y", "offset", "borderWidth", "spacing"] } }, cutout: "50%", rotation: 0, circumference: 360, radius: "100%", spacing: 0, indexAxis: "r" };
        static descriptors = { _scriptable: t => "spacing" !== t, _indexable: t => "spacing" !== t };
        static overrides = { aspectRatio: 1, plugins: { legend: { labels: { generateLabels(t) { const e = t.data; if (e.labels.length && e.datasets.length) { const { labels: { pointStyle: i, color: s } } = t.legend.options; return e.labels.map(((e, n) => { const o = t.getDatasetMeta(0).controller.getStyle(n); return { text: e, fillStyle: o.backgroundColor, strokeStyle: o.borderColor, fontColor: s, lineWidth: o.borderWidth, pointStyle: i, hidden: !t.getDataVisibility(n), index: n } })) } return [] } }, onClick(t, e, i) { i.chart.toggleDataVisibility(e.index), i.chart.update() } } } };
        constructor(t, e) { super(t, e), this.enableOptionSharing = !0, this.innerRadius = void 0, this.outerRadius = void 0, this.offsetX = void 0, this.offsetY = void 0 }
        linkScales() {}
        parse(t, e) { const i = this.getDataset().data,
                s = this._cachedMeta; if (!1 === this._parsing) s._parsed = i;
            else { let n, a, r = t => +i[t]; if (o(i[t])) { const { key: t = "value" } = this._parsing;
                    r = e => +M(i[e], t) } for (n = t, a = t + e; n < a; ++n) s._parsed[n] = r(n) } }
        _getRotation() { return $(this.options.rotation - 90) }
        _getCircumference() { return $(this.options.circumference) }
        _getRotationExtents() { let t = O,
                e = -O; for (let i = 0; i < this.chart.data.datasets.length; ++i)
                if (this.chart.isDatasetVisible(i) && this.chart.getDatasetMeta(i).type === this._type) { const s = this.chart.getDatasetMeta(i).controller,
                        n = s._getRotation(),
                        o = s._getCircumference();
                    t = Math.min(t, n), e = Math.max(e, n + o) }
            return { rotation: t, circumference: e - t } }
        update(t) { const e = this.chart,
                { chartArea: i } = e,
                s = this._cachedMeta,
                n = s.data,
                o = this.getMaxBorderWidth() + this.getMaxOffset(n) + this.options.spacing,
                a = Math.max((Math.min(i.width, i.height) - o) / 2, 0),
                r = Math.min(h(this.options.cutout, a), 1),
                l = this._getRingWeight(this.index),
                { circumference: d, rotation: u } = this._getRotationExtents(),
                { ratioX: f, ratioY: g, offsetX: p, offsetY: m } = function(t, e, i) { let s = 1,
                        n = 1,
                        o = 0,
                        a = 0; if (e < O) { const r = t,
                            l = r + e,
                            h = Math.cos(r),
                            c = Math.sin(r),
                            d = Math.cos(l),
                            u = Math.sin(l),
                            f = (t, e, s) => Z(t, r, l, !0) ? 1 : Math.max(e, e * i, s, s * i),
                            g = (t, e, s) => Z(t, r, l, !0) ? -1 : Math.min(e, e * i, s, s * i),
                            p = f(0, h, d),
                            m = f(E, c, u),
                            b = g(C, h, d),
                            x = g(C + E, c, u);
                        s = (p - b) / 2, n = (m - x) / 2, o = -(p + b) / 2, a = -(m + x) / 2 } return { ratioX: s, ratioY: n, offsetX: o, offsetY: a } }(u, d, r),
                b = (i.width - o) / f,
                x = (i.height - o) / g,
                _ = Math.max(Math.min(b, x) / 2, 0),
                y = c(this.options.radius, _),
                v = (y - Math.max(y * r, 0)) / this._getVisibleDatasetWeightTotal();
            this.offsetX = p * y, this.offsetY = m * y, s.total = this.calculateTotal(), this.outerRadius = y - v * this._getRingWeightOffset(this.index), this.innerRadius = Math.max(this.outerRadius - v * l, 0), this.updateElements(n, 0, n.length, t) }
        _circumference(t, e) { const i = this.options,
                s = this._cachedMeta,
                n = this._getCircumference(); return e && i.animation.animateRotate || !this.chart.getDataVisibility(t) || null === s._parsed[t] || s.data[t].hidden ? 0 : this.calculateCircumference(s._parsed[t] * n / O) }
        updateElements(t, e, i, s) { const n = "reset" === s,
                o = this.chart,
                a = o.chartArea,
                r = o.options.animation,
                l = (a.left + a.right) / 2,
                h = (a.top + a.bottom) / 2,
                c = n && r.animateScale,
                d = c ? 0 : this.innerRadius,
                u = c ? 0 : this.outerRadius,
                { sharedOptions: f, includeOptions: g } = this._getSharedOptions(e, s); let p, m = this._getRotation(); for (p = 0; p < e; ++p) m += this._circumference(p, n); for (p = e; p < e + i; ++p) { const e = this._circumference(p, n),
                    i = t[p],
                    o = { x: l + this.offsetX, y: h + this.offsetY, startAngle: m, endAngle: m + e, circumference: e, outerRadius: u, innerRadius: d };
                g && (o.options = f || this.resolveDataElementOptions(p, i.active ? "active" : s)), m += e, this.updateElement(i, p, o, s) } }
        calculateTotal() { const t = this._cachedMeta,
                e = t.data; let i, s = 0; for (i = 0; i < e.length; i++) { const n = t._parsed[i];
                null === n || isNaN(n) || !this.chart.getDataVisibility(i) || e[i].hidden || (s += Math.abs(n)) } return s }
        calculateCircumference(t) { const e = this._cachedMeta.total; return e > 0 && !isNaN(t) ? O * (Math.abs(t) / e) : 0 }
        getLabelAndValue(t) { const e = this._cachedMeta,
                i = this.chart,
                s = i.data.labels || [],
                n = ne(e._parsed[t], i.options.locale); return { label: s[t] || "", value: n } }
        getMaxBorderWidth(t) { let e = 0; const i = this.chart; let s, n, o, a, r; if (!t)
                for (s = 0, n = i.data.datasets.length; s < n; ++s)
                    if (i.isDatasetVisible(s)) { o = i.getDatasetMeta(s), t = o.data, a = o.controller; break }
            if (!t) return 0; for (s = 0, n = t.length; s < n; ++s) r = a.resolveDataElementOptions(s), "inner" !== r.borderAlign && (e = Math.max(e, r.borderWidth || 0, r.hoverBorderWidth || 0)); return e }
        getMaxOffset(t) { let e = 0; for (let i = 0, s = t.length; i < s; ++i) { const t = this.resolveDataElementOptions(i);
                e = Math.max(e, t.offset || 0, t.hoverOffset || 0) } return e }
        _getRingWeightOffset(t) { let e = 0; for (let i = 0; i < t; ++i) this.chart.isDatasetVisible(i) && (e += this._getRingWeight(i)); return e }
        _getRingWeight(t) { return Math.max(l(this.chart.data.datasets[t].weight, 1), 0) }
        _getVisibleDatasetWeightTotal() { return this._getRingWeightOffset(this.chart.data.datasets.length) || 1 } }
    class zn extends Vs { static id = "polarArea";
        static defaults = { dataElementType: "arc", animation: { animateRotate: !0, animateScale: !0 }, animations: { numbers: { type: "number", properties: ["x", "y", "startAngle", "endAngle", "innerRadius", "outerRadius"] } }, indexAxis: "r", startAngle: 0 };
        static overrides = { aspectRatio: 1, plugins: { legend: { labels: { generateLabels(t) { const e = t.data; if (e.labels.length && e.datasets.length) { const { labels: { pointStyle: i, color: s } } = t.legend.options; return e.labels.map(((e, n) => { const o = t.getDatasetMeta(0).controller.getStyle(n); return { text: e, fillStyle: o.backgroundColor, strokeStyle: o.borderColor, fontColor: s, lineWidth: o.borderWidth, pointStyle: i, hidden: !t.getDataVisibility(n), index: n } })) } return [] } }, onClick(t, e, i) { i.chart.toggleDataVisibility(e.index), i.chart.update() } } }, scales: { r: { type: "radialLinear", angleLines: { display: !1 }, beginAtZero: !0, grid: { circular: !0 }, pointLabels: { display: !1 }, startAngle: 0 } } };
        constructor(t, e) { super(t, e), this.innerRadius = void 0, this.outerRadius = void 0 }
        getLabelAndValue(t) { const e = this._cachedMeta,
                i = this.chart,
                s = i.data.labels || [],
                n = ne(e._parsed[t].r, i.options.locale); return { label: s[t] || "", value: n } }
        parseObjectData(t, e, i, s) { return ei.bind(this)(t, e, i, s) }
        update(t) { const e = this._cachedMeta.data;
            this._updateRadius(), this.updateElements(e, 0, e.length, t) }
        getMinMax() { const t = this._cachedMeta,
                e = { min: Number.POSITIVE_INFINITY, max: Number.NEGATIVE_INFINITY }; return t.data.forEach(((t, i) => { const s = this.getParsed(i).r;!isNaN(s) && this.chart.getDataVisibility(i) && (s < e.min && (e.min = s), s > e.max && (e.max = s)) })), e }
        _updateRadius() { const t = this.chart,
                e = t.chartArea,
                i = t.options,
                s = Math.min(e.right - e.left, e.bottom - e.top),
                n = Math.max(s / 2, 0),
                o = (n - Math.max(i.cutoutPercentage ? n / 100 * i.cutoutPercentage : 1, 0)) / t.getVisibleDatasetCount();
            this.outerRadius = n - o * this.index, this.innerRadius = this.outerRadius - o }
        updateElements(t, e, i, s) { const n = "reset" === s,
                o = this.chart,
                a = o.options.animation,
                r = this._cachedMeta.rScale,
                l = r.xCenter,
                h = r.yCenter,
                c = r.getIndexAngle(0) - .5 * C; let d, u = c; const f = 360 / this.countVisibleElements(); for (d = 0; d < e; ++d) u += this._computeAngle(d, s, f); for (d = e; d < e + i; d++) { const e = t[d]; let i = u,
                    g = u + this._computeAngle(d, s, f),
                    p = o.getDataVisibility(d) ? r.getDistanceFromCenterForValue(this.getParsed(d).r) : 0;
                u = g, n && (a.animateScale && (p = 0), a.animateRotate && (i = g = c)); const m = { x: l, y: h, innerRadius: 0, outerRadius: p, startAngle: i, endAngle: g, options: this.resolveDataElementOptions(d, e.active ? "active" : s) };
                this.updateElement(e, d, m, s) } }
        countVisibleElements() { const t = this._cachedMeta; let e = 0; return t.data.forEach(((t, i) => {!isNaN(this.getParsed(i).r) && this.chart.getDataVisibility(i) && e++ })), e }
        _computeAngle(t, e, i) { return this.chart.getDataVisibility(t) ? $(this.resolveDataElementOptions(t, e).angle || i) : 0 } } var Fn = Object.freeze({ __proto__: null, BarController: class extends Vs { static id = "bar";
            static defaults = { datasetElementType: !1, dataElementType: "bar", categoryPercentage: .8, barPercentage: .9, grouped: !0, animations: { numbers: { type: "number", properties: ["x", "y", "base", "width", "height"] } } };
            static overrides = { scales: { _index_: { type: "category", offset: !0, grid: { offset: !0 } }, _value_: { type: "linear", beginAtZero: !0 } } };
            parsePrimitiveData(t, e, i, s) { return On(t, e, i, s) }
            parseArrayData(t, e, i, s) { return On(t, e, i, s) }
            parseObjectData(t, e, i, s) { const { iScale: n, vScale: o } = t, { xAxisKey: a = "x", yAxisKey: r = "y" } = this._parsing, l = "x" === n.axis ? a : r, h = "x" === o.axis ? a : r, c = []; let d, u, f, g; for (d = i, u = i + s; d < u; ++d) g = e[d], f = {}, f[n.axis] = n.parse(M(g, l), d), c.push(Cn(M(g, h), f, o, d)); return c }
            updateRangeFromParsed(t, e, i, s) { super.updateRangeFromParsed(t, e, i, s); const n = i._custom;
                n && e === this._cachedMeta.vScale && (t.min = Math.min(t.min, n.min), t.max = Math.max(t.max, n.max)) }
            getMaxOverflow() { return 0 }
            getLabelAndValue(t) { const e = this._cachedMeta,
                    { iScale: i, vScale: s } = e,
                    n = this.getParsed(t),
                    o = n._custom,
                    a = An(o) ? "[" + o.start + ", " + o.end + "]" : "" + s.getLabelForValue(n[s.axis]); return { label: "" + i.getLabelForValue(n[i.axis]), value: a } }
            initialize() { this.enableOptionSharing = !0, super.initialize();
                this._cachedMeta.stack = this.getDataset().stack }
            update(t) { const e = this._cachedMeta;
                this.updateElements(e.data, 0, e.data.length, t) }
            updateElements(t, e, i, n) { const o = "reset" === n,
                    { index: a, _cachedMeta: { vScale: r } } = this,
                    l = r.getBasePixel(),
                    h = r.isHorizontal(),
                    c = this._getRuler(),
                    { sharedOptions: d, includeOptions: u } = this._getSharedOptions(e, n); for (let f = e; f < e + i; f++) { const e = this.getParsed(f),
                        i = o || s(e[r.axis]) ? { base: l, head: l } : this._calculateBarValuePixels(f),
                        g = this._calculateBarIndexPixels(f, c),
                        p = (e._stacks || {})[r.axis],
                        m = { horizontal: h, base: i.base, enableBorderRadius: !p || An(e._custom) || a === p._top || a === p._bottom, x: h ? i.head : g.center, y: h ? g.center : i.head, height: h ? g.size : Math.abs(i.size), width: h ? Math.abs(i.size) : g.size };
                    u && (m.options = d || this.resolveDataElementOptions(f, t[f].active ? "active" : n)); const b = m.options || t[f].options;
                    Tn(m, b, p, a), Rn(m, b, c.ratio), this.updateElement(t[f], f, m, n) } }
            _getStacks(t, e) { const { iScale: i } = this._cachedMeta, n = i.getMatchingVisibleMetas(this._type).filter((t => t.controller.options.grouped)), o = i.options.stacked, a = [], r = t => { const i = t.controller.getParsed(e),
                        n = i && i[t.vScale.axis]; if (s(n) || isNaN(n)) return !0 }; for (const i of n)
                    if ((void 0 === e || !r(i)) && ((!1 === o || -1 === a.indexOf(i.stack) || void 0 === o && void 0 === i.stack) && a.push(i.stack), i.index === t)) break;
                return a.length || a.push(void 0), a }
            _getStackCount(t) { return this._getStacks(void 0, t).length }
            _getStackIndex(t, e, i) { const s = this._getStacks(t, i),
                    n = void 0 !== e ? s.indexOf(e) : -1; return -1 === n ? s.length - 1 : n }
            _getRuler() { const t = this.options,
                    e = this._cachedMeta,
                    i = e.iScale,
                    s = []; let n, o; for (n = 0, o = e.data.length; n < o; ++n) s.push(i.getPixelForValue(this.getParsed(n)[i.axis], n)); const a = t.barThickness; return { min: a || Dn(e), pixels: s, start: i._startPixel, end: i._endPixel, stackCount: this._getStackCount(), scale: i, grouped: t.grouped, ratio: a ? 1 : t.categoryPercentage * t.barPercentage } }
            _calculateBarValuePixels(t) { const { _cachedMeta: { vScale: e, _stacked: i, index: n }, options: { base: o, minBarLength: a } } = this, r = o || 0, l = this.getParsed(t), h = l._custom, c = An(h); let d, u, f = l[e.axis],
                    g = 0,
                    p = i ? this.applyStack(e, l, i) : f;
                p !== f && (g = p - f, p = f), c && (f = h.barStart, p = h.barEnd - h.barStart, 0 !== f && F(f) !== F(h.barEnd) && (g = 0), g += f); const m = s(o) || c ? g : o; let b = e.getPixelForValue(m); if (d = this.chart.getDataVisibility(t) ? e.getPixelForValue(g + p) : b, u = d - b, Math.abs(u) < a) { u = function(t, e, i) { return 0 !== t ? F(t) : (e.isHorizontal() ? 1 : -1) * (e.min >= i ? 1 : -1) }(u, e, r) * a, f === r && (b -= u / 2); const t = e.getPixelForDecimal(0),
                        s = e.getPixelForDecimal(1),
                        o = Math.min(t, s),
                        h = Math.max(t, s);
                    b = Math.max(Math.min(b, h), o), d = b + u, i && !c && (l._stacks[e.axis]._visualValues[n] = e.getValueForPixel(d) - e.getValueForPixel(b)) } if (b === e.getPixelForValue(r)) { const t = F(u) * e.getLineWidthForValue(r) / 2;
                    b += t, u -= t } return { size: u, base: b, head: d, center: d + u / 2 } }
            _calculateBarIndexPixels(t, e) { const i = e.scale,
                    n = this.options,
                    o = n.skipNull,
                    a = l(n.maxBarThickness, 1 / 0); let r, h; if (e.grouped) { const i = o ? this._getStackCount(t) : e.stackCount,
                        l = "flex" === n.barThickness ? function(t, e, i, s) { const n = e.pixels,
                                o = n[t]; let a = t > 0 ? n[t - 1] : null,
                                r = t < n.length - 1 ? n[t + 1] : null; const l = i.categoryPercentage;
                            null === a && (a = o - (null === r ? e.end - e.start : r - o)), null === r && (r = o + o - a); const h = o - (o - Math.min(a, r)) / 2 * l; return { chunk: Math.abs(r - a) / 2 * l / s, ratio: i.barPercentage, start: h } }(t, e, n, i) : function(t, e, i, n) { const o = i.barThickness; let a, r; return s(o) ? (a = e.min * i.categoryPercentage, r = i.barPercentage) : (a = o * n, r = 1), { chunk: a / n, ratio: r, start: e.pixels[t] - a / 2 } }(t, e, n, i),
                        c = this._getStackIndex(this.index, this._cachedMeta.stack, o ? t : void 0);
                    r = l.start + l.chunk * c + l.chunk / 2, h = Math.min(a, l.chunk * l.ratio) } else r = i.getPixelForValue(this.getParsed(t)[i.axis], t), h = Math.min(a, e.min * e.ratio); return { base: r - h / 2, head: r + h / 2, center: r, size: h } }
            draw() { const t = this._cachedMeta,
                    e = t.vScale,
                    i = t.data,
                    s = i.length; let n = 0; for (; n < s; ++n) null !== this.getParsed(n)[e.axis] && i[n].draw(this._ctx) } }, BubbleController: class extends Vs { static id = "bubble";
            static defaults = { datasetElementType: !1, dataElementType: "point", animations: { numbers: { type: "number", properties: ["x", "y", "borderWidth", "radius"] } } };
            static overrides = { scales: { x: { type: "linear" }, y: { type: "linear" } } };
            initialize() { this.enableOptionSharing = !0, super.initialize() }
            parsePrimitiveData(t, e, i, s) { const n = super.parsePrimitiveData(t, e, i, s); for (let t = 0; t < n.length; t++) n[t]._custom = this.resolveDataElementOptions(t + i).radius; return n }
            parseArrayData(t, e, i, s) { const n = super.parseArrayData(t, e, i, s); for (let t = 0; t < n.length; t++) { const s = e[i + t];
                    n[t]._custom = l(s[2], this.resolveDataElementOptions(t + i).radius) } return n }
            parseObjectData(t, e, i, s) { const n = super.parseObjectData(t, e, i, s); for (let t = 0; t < n.length; t++) { const s = e[i + t];
                    n[t]._custom = l(s && s.r && +s.r, this.resolveDataElementOptions(t + i).radius) } return n }
            getMaxOverflow() { const t = this._cachedMeta.data; let e = 0; for (let i = t.length - 1; i >= 0; --i) e = Math.max(e, t[i].size(this.resolveDataElementOptions(i)) / 2); return e > 0 && e }
            getLabelAndValue(t) { const e = this._cachedMeta,
                    i = this.chart.data.labels || [],
                    { xScale: s, yScale: n } = e,
                    o = this.getParsed(t),
                    a = s.getLabelForValue(o.x),
                    r = n.getLabelForValue(o.y),
                    l = o._custom; return { label: i[t] || "", value: "(" + a + ", " + r + (l ? ", " + l : "") + ")" } }
            update(t) { const e = this._cachedMeta.data;
                this.updateElements(e, 0, e.length, t) }
            updateElements(t, e, i, s) { const n = "reset" === s,
                    { iScale: o, vScale: a } = this._cachedMeta,
                    { sharedOptions: r, includeOptions: l } = this._getSharedOptions(e, s),
                    h = o.axis,
                    c = a.axis; for (let d = e; d < e + i; d++) { const e = t[d],
                        i = !n && this.getParsed(d),
                        u = {},
                        f = u[h] = n ? o.getPixelForDecimal(.5) : o.getPixelForValue(i[h]),
                        g = u[c] = n ? a.getBasePixel() : a.getPixelForValue(i[c]);
                    u.skip = isNaN(f) || isNaN(g), l && (u.options = r || this.resolveDataElementOptions(d, e.active ? "active" : s), n && (u.options.radius = 0)), this.updateElement(e, d, u, s) } }
            resolveDataElementOptions(t, e) { const i = this.getParsed(t); let s = super.resolveDataElementOptions(t, e);
                s.$shared && (s = Object.assign({}, s, { $shared: !1 })); const n = s.radius; return "active" !== e && (s.radius = 0), s.radius += l(i && i._custom, n), s } }, DoughnutController: In, LineController: class extends Vs { static id = "line";
            static defaults = { datasetElementType: "line", dataElementType: "point", showLine: !0, spanGaps: !1 };
            static overrides = { scales: { _index_: { type: "category" }, _value_: { type: "linear" } } };
            initialize() { this.enableOptionSharing = !0, this.supportsDecimation = !0, super.initialize() }
            update(t) { const e = this._cachedMeta,
                    { dataset: i, data: s = [], _dataset: n } = e,
                    o = this.chart._animationsDisabled; let { start: a, count: r } = pt(e, s, o);
                this._drawStart = a, this._drawCount = r, mt(e) && (a = 0, r = s.length), i._chart = this.chart, i._datasetIndex = this.index, i._decimated = !!n._decimated, i.points = s; const l = this.resolveDatasetElementOptions(t);
                this.options.showLine || (l.borderWidth = 0), l.segment = this.options.segment, this.updateElement(i, void 0, { animated: !o, options: l }, t), this.updateElements(s, a, r, t) }
            updateElements(t, e, i, n) { const o = "reset" === n,
                    { iScale: a, vScale: r, _stacked: l, _dataset: h } = this._cachedMeta,
                    { sharedOptions: c, includeOptions: d } = this._getSharedOptions(e, n),
                    u = a.axis,
                    f = r.axis,
                    { spanGaps: g, segment: p } = this.options,
                    m = W(g) ? g : Number.POSITIVE_INFINITY,
                    b = this.chart._animationsDisabled || o || "none" === n,
                    x = e + i,
                    _ = t.length; let y = e > 0 && this.getParsed(e - 1); for (let i = 0; i < _; ++i) { const g = t[i],
                        _ = b ? g : {}; if (i < e || i >= x) { _.skip = !0; continue } const v = this.getParsed(i),
                        M = s(v[f]),
                        w = _[u] = a.getPixelForValue(v[u], i),
                        k = _[f] = o || M ? r.getBasePixel() : r.getPixelForValue(l ? this.applyStack(r, v, l) : v[f], i);
                    _.skip = isNaN(w) || isNaN(k) || M, _.stop = i > 0 && Math.abs(v[u] - y[u]) > m, p && (_.parsed = v, _.raw = h.data[i]), d && (_.options = c || this.resolveDataElementOptions(i, g.active ? "active" : n)), b || this.updateElement(g, i, _, n), y = v } }
            getMaxOverflow() { const t = this._cachedMeta,
                    e = t.dataset,
                    i = e.options && e.options.borderWidth || 0,
                    s = t.data || []; if (!s.length) return i; const n = s[0].size(this.resolveDataElementOptions(0)),
                    o = s[s.length - 1].size(this.resolveDataElementOptions(s.length - 1)); return Math.max(i, n, o) / 2 }
            draw() { const t = this._cachedMeta;
                t.dataset.updateControlPoints(this.chart.chartArea, t.iScale.axis), super.draw() } }, PolarAreaController: zn, PieController: class extends In { static id = "pie";
            static defaults = { cutout: 0, rotation: 0, circumference: 360, radius: "100%" } }, RadarController: class extends Vs { static id = "radar";
            static defaults = { datasetElementType: "line", dataElementType: "point", indexAxis: "r", showLine: !0, elements: { line: { fill: "start" } } };
            static overrides = { aspectRatio: 1, scales: { r: { type: "radialLinear" } } };
            getLabelAndValue(t) { const e = this._cachedMeta.vScale,
                    i = this.getParsed(t); return { label: e.getLabels()[t], value: "" + e.getLabelForValue(i[e.axis]) } }
            parseObjectData(t, e, i, s) { return ei.bind(this)(t, e, i, s) }
            update(t) { const e = this._cachedMeta,
                    i = e.dataset,
                    s = e.data || [],
                    n = e.iScale.getLabels(); if (i.points = s, "resize" !== t) { const e = this.resolveDatasetElementOptions(t);
                    this.options.showLine || (e.borderWidth = 0); const o = { _loop: !0, _fullLoop: n.length === s.length, options: e };
                    this.updateElement(i, void 0, o, t) }
                this.updateElements(s, 0, s.length, t) }
            updateElements(t, e, i, s) { const n = this._cachedMeta.rScale,
                    o = "reset" === s; for (let a = e; a < e + i; a++) { const e = t[a],
                        i = this.resolveDataElementOptions(a, e.active ? "active" : s),
                        r = n.getPointPositionForValue(a, this.getParsed(a).r),
                        l = o ? n.xCenter : r.x,
                        h = o ? n.yCenter : r.y,
                        c = { x: l, y: h, angle: r.angle, skip: isNaN(l) || isNaN(h), options: i };
                    this.updateElement(e, a, c, s) } } }, ScatterController: class extends Vs { static id = "scatter";
            static defaults = { datasetElementType: !1, dataElementType: "point", showLine: !1, fill: !1 };
            static overrides = { interaction: { mode: "point" }, scales: { x: { type: "linear" }, y: { type: "linear" } } };
            getLabelAndValue(t) { const e = this._cachedMeta,
                    i = this.chart.data.labels || [],
                    { xScale: s, yScale: n } = e,
                    o = this.getParsed(t),
                    a = s.getLabelForValue(o.x),
                    r = n.getLabelForValue(o.y); return { label: i[t] || "", value: "(" + a + ", " + r + ")" } }
            update(t) { const e = this._cachedMeta,
                    { data: i = [] } = e,
                    s = this.chart._animationsDisabled; let { start: n, count: o } = pt(e, i, s); if (this._drawStart = n, this._drawCount = o, mt(e) && (n = 0, o = i.length), this.options.showLine) { const { dataset: n, _dataset: o } = e;
                    n._chart = this.chart, n._datasetIndex = this.index, n._decimated = !!o._decimated, n.points = i; const a = this.resolveDatasetElementOptions(t);
                    a.segment = this.options.segment, this.updateElement(n, void 0, { animated: !s, options: a }, t) }
                this.updateElements(i, n, o, t) }
            addElements() { const { showLine: t } = this.options;!this.datasetElementType && t && (this.datasetElementType = this.chart.registry.getElement("line")), super.addElements() }
            updateElements(t, e, i, n) { const o = "reset" === n,
                    { iScale: a, vScale: r, _stacked: l, _dataset: h } = this._cachedMeta,
                    c = this.resolveDataElementOptions(e, n),
                    d = this.getSharedOptions(c),
                    u = this.includeOptions(n, d),
                    f = a.axis,
                    g = r.axis,
                    { spanGaps: p, segment: m } = this.options,
                    b = W(p) ? p : Number.POSITIVE_INFINITY,
                    x = this.chart._animationsDisabled || o || "none" === n; let _ = e > 0 && this.getParsed(e - 1); for (let c = e; c < e + i; ++c) { const e = t[c],
                        i = this.getParsed(c),
                        p = x ? e : {},
                        y = s(i[g]),
                        v = p[f] = a.getPixelForValue(i[f], c),
                        M = p[g] = o || y ? r.getBasePixel() : r.getPixelForValue(l ? this.applyStack(r, i, l) : i[g], c);
                    p.skip = isNaN(v) || isNaN(M) || y, p.stop = c > 0 && Math.abs(i[f] - _[f]) > b, m && (p.parsed = i, p.raw = h.data[c]), u && (p.options = d || this.resolveDataElementOptions(c, e.active ? "active" : n)), x || this.updateElement(e, c, p, n), _ = i }
                this.updateSharedOptions(d, n, c) }
            getMaxOverflow() { const t = this._cachedMeta,
                    e = t.data || []; if (!this.options.showLine) { let t = 0; for (let i = e.length - 1; i >= 0; --i) t = Math.max(t, e[i].size(this.resolveDataElementOptions(i)) / 2); return t > 0 && t } const i = t.dataset,
                    s = i.options && i.options.borderWidth || 0; if (!e.length) return s; const n = e[0].size(this.resolveDataElementOptions(0)),
                    o = e[e.length - 1].size(this.resolveDataElementOptions(e.length - 1)); return Math.max(s, n, o) / 2 } } });

    function Vn(t, e, i, s) { const n = _i(t.options.borderRadius, ["outerStart", "outerEnd", "innerStart", "innerEnd"]); const o = (i - e) / 2,
            a = Math.min(o, s * e / 2),
            r = t => { const e = (i - Math.min(o, t)) * s / 2; return J(t, 0, Math.min(o, e)) }; return { outerStart: r(n.outerStart), outerEnd: r(n.outerEnd), innerStart: J(n.innerStart, 0, a), innerEnd: J(n.innerEnd, 0, a) } }

    function Bn(t, e, i, s) { return { x: i + t * Math.cos(e), y: s + t * Math.sin(e) } }

    function Nn(t, e, i, s, n, o) { const { x: a, y: r, startAngle: l, pixelMargin: h, innerRadius: c } = e, d = Math.max(e.outerRadius + s + i - h, 0), u = c > 0 ? c + s + i + h : 0; let f = 0; const g = n - l; if (s) { const t = ((c > 0 ? c - s : 0) + (d > 0 ? d - s : 0)) / 2;
            f = (g - (0 !== t ? g * t / (t + s) : g)) / 2 } const p = (g - Math.max(.001, g * d - i / C) / d) / 2,
            m = l + p + f,
            b = n - p - f,
            { outerStart: x, outerEnd: _, innerStart: y, innerEnd: v } = Vn(e, u, d, b - m),
            M = d - x,
            w = d - _,
            k = m + x / M,
            S = b - _ / w,
            P = u + y,
            D = u + v,
            O = m + y / P,
            A = b - v / D; if (t.beginPath(), o) { const e = (k + S) / 2; if (t.arc(a, r, d, k, e), t.arc(a, r, d, e, S), _ > 0) { const e = Bn(w, S, a, r);
                t.arc(e.x, e.y, _, S, b + E) } const i = Bn(D, b, a, r); if (t.lineTo(i.x, i.y), v > 0) { const e = Bn(D, A, a, r);
                t.arc(e.x, e.y, v, b + E, A + Math.PI) } const s = (b - v / u + (m + y / u)) / 2; if (t.arc(a, r, u, b - v / u, s, !0), t.arc(a, r, u, s, m + y / u, !0), y > 0) { const e = Bn(P, O, a, r);
                t.arc(e.x, e.y, y, O + Math.PI, m - E) } const n = Bn(M, m, a, r); if (t.lineTo(n.x, n.y), x > 0) { const e = Bn(M, k, a, r);
                t.arc(e.x, e.y, x, m - E, k) } } else { t.moveTo(a, r); const e = Math.cos(k) * d + a,
                i = Math.sin(k) * d + r;
            t.lineTo(e, i); const s = Math.cos(S) * d + a,
                n = Math.sin(S) * d + r;
            t.lineTo(s, n) }
        t.closePath() }

    function Wn(t, e, i, s, n) { const { fullCircles: o, startAngle: a, circumference: r, options: l } = e, { borderWidth: h, borderJoinStyle: c } = l, d = "inner" === l.borderAlign; if (!h) return;
        d ? (t.lineWidth = 2 * h, t.lineJoin = c || "round") : (t.lineWidth = h, t.lineJoin = c || "bevel"); let u = e.endAngle; if (o) { Nn(t, e, i, s, u, n); for (let e = 0; e < o; ++e) t.stroke();
            isNaN(r) || (u = a + (r % O || O)) }
        d && function(t, e, i) { const { startAngle: s, pixelMargin: n, x: o, y: a, outerRadius: r, innerRadius: l } = e; let h = n / r;
            t.beginPath(), t.arc(o, a, r, s - h, i + h), l > n ? (h = n / l, t.arc(o, a, l, i + h, s - h, !0)) : t.arc(o, a, n, i + E, s - E), t.closePath(), t.clip() }(t, e, u), o || (Nn(t, e, i, s, u, n), t.stroke()) }

    function Hn(t, e, i = e) { t.lineCap = l(i.borderCapStyle, e.borderCapStyle), t.setLineDash(l(i.borderDash, e.borderDash)), t.lineDashOffset = l(i.borderDashOffset, e.borderDashOffset), t.lineJoin = l(i.borderJoinStyle, e.borderJoinStyle), t.lineWidth = l(i.borderWidth, e.borderWidth), t.strokeStyle = l(i.borderColor, e.borderColor) }

    function jn(t, e, i) { t.lineTo(i.x, i.y) }

    function $n(t, e, i = {}) { const s = t.length,
            { start: n = 0, end: o = s - 1 } = i,
            { start: a, end: r } = e,
            l = Math.max(n, a),
            h = Math.min(o, r),
            c = n < a && o < a || n > r && o > r; return { count: s, start: l, loop: e.loop, ilen: h < l && !c ? s + h - l : h - l } }

    function Yn(t, e, i, s) { const { points: n, options: o } = e, { count: a, start: r, loop: l, ilen: h } = $n(n, i, s), c = function(t) { return t.stepped ? ze : t.tension || "monotone" === t.cubicInterpolationMode ? Fe : jn }(o); let d, u, f, { move: g = !0, reverse: p } = s || {}; for (d = 0; d <= h; ++d) u = n[(r + (p ? h - d : d)) % a], u.skip || (g ? (t.moveTo(u.x, u.y), g = !1) : c(t, f, u, p, o.stepped), f = u); return l && (u = n[(r + (p ? h : 0)) % a], c(t, f, u, p, o.stepped)), !!l }

    function Un(t, e, i, s) { const n = e.points,
            { count: o, start: a, ilen: r } = $n(n, i, s),
            { move: l = !0, reverse: h } = s || {}; let c, d, u, f, g, p, m = 0,
            b = 0; const x = t => (a + (h ? r - t : t)) % o,
            _ = () => { f !== g && (t.lineTo(m, g), t.lineTo(m, f), t.lineTo(m, p)) }; for (l && (d = n[x(0)], t.moveTo(d.x, d.y)), c = 0; c <= r; ++c) { if (d = n[x(c)], d.skip) continue; const e = d.x,
                i = d.y,
                s = 0 | e;
            s === u ? (i < f ? f = i : i > g && (g = i), m = (b * m + e) / ++b) : (_(), t.lineTo(e, i), u = s, b = 0, f = g = i), p = i }
        _() }

    function Xn(t) { const e = t.options,
            i = e.borderDash && e.borderDash.length; return !(t._decimated || t._loop || e.tension || "monotone" === e.cubicInterpolationMode || e.stepped || i) ? Un : Yn } const qn = "function" == typeof Path2D;

    function Kn(t, e, i, s) { qn && !e.options.segment ? function(t, e, i, s) { let n = e._path;
            n || (n = e._path = new Path2D, e.path(n, i, s) && n.closePath()), Hn(t, e.options), t.stroke(n) }(t, e, i, s) : function(t, e, i, s) { const { segments: n, options: o } = e, a = Xn(e); for (const r of n) Hn(t, o, r.style), t.beginPath(), a(t, e, r, { start: i, end: i + s - 1 }) && t.closePath(), t.stroke() }(t, e, i, s) }
    class Gn extends Bs { static id = "line";
        static defaults = { borderCapStyle: "butt", borderDash: [], borderDashOffset: 0, borderJoinStyle: "miter", borderWidth: 3, capBezierPoints: !0, cubicInterpolationMode: "default", fill: !1, spanGaps: !1, stepped: !1, tension: 0 };
        static defaultRoutes = { backgroundColor: "backgroundColor", borderColor: "borderColor" };
        static descriptors = { _scriptable: !0, _indexable: t => "borderDash" !== t && "fill" !== t };
        constructor(t) { super(), this.animated = !0, this.options = void 0, this._chart = void 0, this._loop = void 0, this._fullLoop = void 0, this._path = void 0, this._points = void 0, this._segments = void 0, this._decimated = !1, this._pointsUpdated = !1, this._datasetIndex = void 0, t && Object.assign(this, t) }
        updateControlPoints(t, e) { const i = this.options; if ((i.tension || "monotone" === i.cubicInterpolationMode) && !i.stepped && !this._pointsUpdated) { const s = i.spanGaps ? this._loop : this._fullLoop;
                li(this._points, i, t, s, e), this._pointsUpdated = !0 } }
        set points(t) { this._points = t, delete this._segments, delete this._path, this._pointsUpdated = !1 }
        get points() { return this._points }
        get segments() { return this._segments || (this._segments = Ri(this, this.options.segment)) }
        first() { const t = this.segments,
                e = this.points; return t.length && e[t[0].start] }
        last() { const t = this.segments,
                e = this.points,
                i = t.length; return i && e[t[i - 1].end] }
        interpolate(t, e) { const i = this.options,
                s = t[e],
                n = this.points,
                o = Ei(this, { property: e, start: s, end: s }); if (!o.length) return; const a = [],
                r = function(t) { return t.stepped ? gi : t.tension || "monotone" === t.cubicInterpolationMode ? pi : fi }(i); let l, h; for (l = 0, h = o.length; l < h; ++l) { const { start: h, end: c } = o[l], d = n[h], u = n[c]; if (d === u) { a.push(d); continue } const f = r(d, u, Math.abs((s - d[e]) / (u[e] - d[e])), i.stepped);
                f[e] = t[e], a.push(f) } return 1 === a.length ? a[0] : a }
        pathSegment(t, e, i) { return Xn(this)(t, this, e, i) }
        path(t, e, i) { const s = this.segments,
                n = Xn(this); let o = this._loop;
            e = e || 0, i = i || this.points.length - e; for (const a of s) o &= n(t, this, a, { start: e, end: e + i - 1 }); return !!o }
        draw(t, e, i, s) { const n = this.options || {};
            (this.points || []).length && n.borderWidth && (t.save(), Kn(t, this, i, s), t.restore()), this.animated && (this._pointsUpdated = !1, this._path = void 0) } }

    function Zn(t, e, i, s) { const n = t.options,
            {
                [i]: o } = t.getProps([i], s); return Math.abs(e - o) < n.radius + n.hitRadius }

    function Jn(t, e) { const { x: i, y: s, base: n, width: o, height: a } = t.getProps(["x", "y", "base", "width", "height"], e); let r, l, h, c, d; return t.horizontal ? (d = a / 2, r = Math.min(i, n), l = Math.max(i, n), h = s - d, c = s + d) : (d = o / 2, r = i - d, l = i + d, h = Math.min(s, n), c = Math.max(s, n)), { left: r, top: h, right: l, bottom: c } }

    function Qn(t, e, i, s) { return t ? 0 : J(e, i, s) }

    function to(t) { const e = Jn(t),
            i = e.right - e.left,
            s = e.bottom - e.top,
            n = function(t, e, i) { const s = t.options.borderWidth,
                    n = t.borderSkipped,
                    o = yi(s); return { t: Qn(n.top, o.top, 0, i), r: Qn(n.right, o.right, 0, e), b: Qn(n.bottom, o.bottom, 0, i), l: Qn(n.left, o.left, 0, e) } }(t, i / 2, s / 2),
            a = function(t, e, i) { const { enableBorderRadius: s } = t.getProps(["enableBorderRadius"]), n = t.options.borderRadius, a = vi(n), r = Math.min(e, i), l = t.borderSkipped, h = s || o(n); return { topLeft: Qn(!h || l.top || l.left, a.topLeft, 0, r), topRight: Qn(!h || l.top || l.right, a.topRight, 0, r), bottomLeft: Qn(!h || l.bottom || l.left, a.bottomLeft, 0, r), bottomRight: Qn(!h || l.bottom || l.right, a.bottomRight, 0, r) } }(t, i / 2, s / 2); return { outer: { x: e.left, y: e.top, w: i, h: s, radius: a }, inner: { x: e.left + n.l, y: e.top + n.t, w: i - n.l - n.r, h: s - n.t - n.b, radius: { topLeft: Math.max(0, a.topLeft - Math.max(n.t, n.l)), topRight: Math.max(0, a.topRight - Math.max(n.t, n.r)), bottomLeft: Math.max(0, a.bottomLeft - Math.max(n.b, n.l)), bottomRight: Math.max(0, a.bottomRight - Math.max(n.b, n.r)) } } } }

    function eo(t, e, i, s) { const n = null === e,
            o = null === i,
            a = t && !(n && o) && Jn(t, s); return a && (n || tt(e, a.left, a.right)) && (o || tt(i, a.top, a.bottom)) }

    function io(t, e) { t.rect(e.x, e.y, e.w, e.h) }

    function so(t, e, i = {}) { const s = t.x !== i.x ? -e : 0,
            n = t.y !== i.y ? -e : 0,
            o = (t.x + t.w !== i.x + i.w ? e : 0) - s,
            a = (t.y + t.h !== i.y + i.h ? e : 0) - n; return { x: t.x + s, y: t.y + n, w: t.w + o, h: t.h + a, radius: t.radius } } var no = Object.freeze({ __proto__: null, ArcElement: class extends Bs { static id = "arc";
            static defaults = { borderAlign: "center", borderColor: "#fff", borderJoinStyle: void 0, borderRadius: 0, borderWidth: 2, offset: 0, spacing: 0, angle: void 0, circular: !0 };
            static defaultRoutes = { backgroundColor: "backgroundColor" };
            constructor(t) { super(), this.options = void 0, this.circumference = void 0, this.startAngle = void 0, this.endAngle = void 0, this.innerRadius = void 0, this.outerRadius = void 0, this.pixelMargin = 0, this.fullCircles = 0, t && Object.assign(this, t) }
            inRange(t, e, i) { const s = this.getProps(["x", "y"], i),
                    { angle: n, distance: o } = X(s, { x: t, y: e }),
                    { startAngle: a, endAngle: r, innerRadius: h, outerRadius: c, circumference: d } = this.getProps(["startAngle", "endAngle", "innerRadius", "outerRadius", "circumference"], i),
                    u = this.options.spacing / 2,
                    f = l(d, r - a) >= O || Z(n, a, r),
                    g = tt(o, h + u, c + u); return f && g }
            getCenterPoint(t) { const { x: e, y: i, startAngle: s, endAngle: n, innerRadius: o, outerRadius: a } = this.getProps(["x", "y", "startAngle", "endAngle", "innerRadius", "outerRadius", "circumference"], t), { offset: r, spacing: l } = this.options, h = (s + n) / 2, c = (o + a + l + r) / 2; return { x: e + Math.cos(h) * c, y: i + Math.sin(h) * c } }
            tooltipPosition(t) { return this.getCenterPoint(t) }
            draw(t) { const { options: e, circumference: i } = this, s = (e.offset || 0) / 4, n = (e.spacing || 0) / 2, o = e.circular; if (this.pixelMargin = "inner" === e.borderAlign ? .33 : 0, this.fullCircles = i > O ? Math.floor(i / O) : 0, 0 === i || this.innerRadius < 0 || this.outerRadius < 0) return;
                t.save(); const a = (this.startAngle + this.endAngle) / 2;
                t.translate(Math.cos(a) * s, Math.sin(a) * s); const r = s * (1 - Math.sin(Math.min(C, i || 0)));
                t.fillStyle = e.backgroundColor, t.strokeStyle = e.borderColor,
                    function(t, e, i, s, n) { const { fullCircles: o, startAngle: a, circumference: r } = e; let l = e.endAngle; if (o) { Nn(t, e, i, s, l, n); for (let e = 0; e < o; ++e) t.fill();
                            isNaN(r) || (l = a + (r % O || O)) }
                        Nn(t, e, i, s, l, n), t.fill() }(t, this, r, n, o), Wn(t, this, r, n, o), t.restore() } }, LineElement: Gn, PointElement: class extends Bs { static id = "point";
            static defaults = { borderWidth: 1, hitRadius: 1, hoverBorderWidth: 1, hoverRadius: 4, pointStyle: "circle", radius: 3, rotation: 0 };
            static defaultRoutes = { backgroundColor: "backgroundColor", borderColor: "borderColor" };
            constructor(t) { super(), this.options = void 0, this.parsed = void 0, this.skip = void 0, this.stop = void 0, t && Object.assign(this, t) }
            inRange(t, e, i) { const s = this.options,
                    { x: n, y: o } = this.getProps(["x", "y"], i); return Math.pow(t - n, 2) + Math.pow(e - o, 2) < Math.pow(s.hitRadius + s.radius, 2) }
            inXRange(t, e) { return Zn(this, t, "x", e) }
            inYRange(t, e) { return Zn(this, t, "y", e) }
            getCenterPoint(t) { const { x: e, y: i } = this.getProps(["x", "y"], t); return { x: e, y: i } }
            size(t) { let e = (t = t || this.options || {}).radius || 0;
                e = Math.max(e, e && t.hoverRadius || 0); return 2 * (e + (e && t.borderWidth || 0)) }
            draw(t, e) { const i = this.options;
                this.skip || i.radius < .1 || !Ee(this, e, this.size(i) / 2) || (t.strokeStyle = i.borderColor, t.lineWidth = i.borderWidth, t.fillStyle = i.backgroundColor, Te(t, i, this.x, this.y)) }
            getRange() { const t = this.options || {}; return t.radius + t.hitRadius } }, BarElement: class extends Bs { static id = "bar";
            static defaults = { borderSkipped: "start", borderWidth: 0, borderRadius: 0, inflateAmount: "auto", pointStyle: void 0 };
            static defaultRoutes = { backgroundColor: "backgroundColor", borderColor: "borderColor" };
            constructor(t) { super(), this.options = void 0, this.horizontal = void 0, this.base = void 0, this.width = void 0, this.height = void 0, this.inflateAmount = void 0, t && Object.assign(this, t) }
            draw(t) { const { inflateAmount: e, options: { borderColor: i, backgroundColor: s } } = this, { inner: n, outer: o } = to(this), a = (r = o.radius).topLeft || r.topRight || r.bottomLeft || r.bottomRight ? We : io; var r;
                t.save(), o.w === n.w && o.h === n.h || (t.beginPath(), a(t, so(o, e, n)), t.clip(), a(t, so(n, -e, o)), t.fillStyle = i, t.fill("evenodd")), t.beginPath(), a(t, so(n, e)), t.fillStyle = s, t.fill(), t.restore() }
            inRange(t, e, i) { return eo(this, t, e, i) }
            inXRange(t, e) { return eo(this, t, null, e) }
            inYRange(t, e) { return eo(this, null, t, e) }
            getCenterPoint(t) { const { x: e, y: i, base: s, horizontal: n } = this.getProps(["x", "y", "base", "horizontal"], t); return { x: n ? (e + s) / 2 : e, y: n ? i : (i + s) / 2 } }
            getRange(t) { return "x" === t ? this.width / 2 : this.height / 2 } } });

    function oo(t, e, i, s) { const n = t.indexOf(e); if (-1 === n) return ((t, e, i, s) => ("string" == typeof e ? (i = t.push(e) - 1, s.unshift({ index: i, label: e })) : isNaN(e) && (i = null), i))(t, e, i, s); return n !== t.lastIndexOf(e) ? i : n }

    function ao(t) { const e = this.getLabels(); return t >= 0 && t < e.length ? e[t] : t }

    function ro(t, e, { horizontal: i, minRotation: s }) { const n = $(s),
            o = (i ? Math.sin(n) : Math.cos(n)) || .001,
            a = .75 * e * ("" + t).length; return Math.min(e / o, a) }
    class lo extends qs { constructor(t) { super(t), this.start = void 0, this.end = void 0, this._startValue = void 0, this._endValue = void 0, this._valueRange = 0 }
        parse(t, e) { return s(t) || ("number" == typeof t || t instanceof Number) && !isFinite(+t) ? null : +t }
        handleTickRangeOptions() { const { beginAtZero: t } = this.options, { minDefined: e, maxDefined: i } = this.getUserBounds(); let { min: s, max: n } = this; const o = t => s = e ? s : t,
                a = t => n = i ? n : t; if (t) { const t = F(s),
                    e = F(n);
                t < 0 && e < 0 ? a(0) : t > 0 && e > 0 && o(0) } if (s === n) { let e = 0 === n ? 1 : Math.abs(.05 * n);
                a(n + e), t || o(s - e) }
            this.min = s, this.max = n }
        getTickLimit() { const t = this.options.ticks; let e, { maxTicksLimit: i, stepSize: s } = t; return s ? (e = Math.ceil(this.max / s) - Math.floor(this.min / s) + 1, e > 1e3 && (console.warn(`scales.${this.id}.ticks.stepSize: ${s} would result generating up to ${e} ticks. Limiting to 1000.`), e = 1e3)) : (e = this.computeTickLimit(), i = i || 11), i && (e = Math.min(i, e)), e }
        computeTickLimit() { return Number.POSITIVE_INFINITY }
        buildTicks() { const t = this.options,
                e = t.ticks; let i = this.getTickLimit();
            i = Math.max(2, i); const n = function(t, e) { const i = [],
                    { bounds: n, step: o, min: a, max: r, precision: l, count: h, maxTicks: c, maxDigits: d, includeBounds: u } = t,
                    f = o || 1,
                    g = c - 1,
                    { min: p, max: m } = e,
                    b = !s(a),
                    x = !s(r),
                    _ = !s(h),
                    y = (m - p) / (d + 1); let v, M, w, k, S = B((m - p) / g / f) * f; if (S < 1e-14 && !b && !x) return [{ value: p }, { value: m }];
                k = Math.ceil(m / S) - Math.floor(p / S), k > g && (S = B(k * S / g / f) * f), s(l) || (v = Math.pow(10, l), S = Math.ceil(S * v) / v), "ticks" === n ? (M = Math.floor(p / S) * S, w = Math.ceil(m / S) * S) : (M = p, w = m), b && x && o && H((r - a) / o, S / 1e3) ? (k = Math.round(Math.min((r - a) / S, c)), S = (r - a) / k, M = a, w = r) : _ ? (M = b ? a : M, w = x ? r : w, k = h - 1, S = (w - M) / k) : (k = (w - M) / S, k = V(k, Math.round(k), S / 1e3) ? Math.round(k) : Math.ceil(k)); const P = Math.max(U(S), U(M));
                v = Math.pow(10, s(l) ? P : l), M = Math.round(M * v) / v, w = Math.round(w * v) / v; let D = 0; for (b && (u && M !== a ? (i.push({ value: a }), M < a && D++, V(Math.round((M + D * S) * v) / v, a, ro(a, y, t)) && D++) : M < a && D++); D < k; ++D) i.push({ value: Math.round((M + D * S) * v) / v }); return x && u && w !== r ? i.length && V(i[i.length - 1].value, r, ro(r, y, t)) ? i[i.length - 1].value = r : i.push({ value: r }) : x && w !== r || i.push({ value: w }), i }({ maxTicks: i, bounds: t.bounds, min: t.min, max: t.max, precision: e.precision, step: e.stepSize, count: e.count, maxDigits: this._maxDigits(), horizontal: this.isHorizontal(), minRotation: e.minRotation || 0, includeBounds: !1 !== e.includeBounds }, this._range || this); return "ticks" === t.bounds && j(n, this, "value"), t.reverse ? (n.reverse(), this.start = this.max, this.end = this.min) : (this.start = this.min, this.end = this.max), n }
        configure() { const t = this.ticks; let e = this.min,
                i = this.max; if (super.configure(), this.options.offset && t.length) { const s = (i - e) / Math.max(t.length - 1, 1) / 2;
                e -= s, i += s }
            this._startValue = e, this._endValue = i, this._valueRange = i - e }
        getLabelForValue(t) { return ne(t, this.chart.options.locale, this.options.ticks.format) } }
    class ho extends lo { static id = "linear";
        static defaults = { ticks: { callback: ae.formatters.numeric } };
        determineDataLimits() { const { min: t, max: e } = this.getMinMax(!0);
            this.min = a(t) ? t : 0, this.max = a(e) ? e : 1, this.handleTickRangeOptions() }
        computeTickLimit() { const t = this.isHorizontal(),
                e = t ? this.width : this.height,
                i = $(this.options.ticks.minRotation),
                s = (t ? Math.sin(i) : Math.cos(i)) || .001,
                n = this._resolveTickFontOptions(0); return Math.ceil(e / Math.min(40, n.lineHeight / s)) }
        getPixelForValue(t) { return null === t ? NaN : this.getPixelForDecimal((t - this._startValue) / this._valueRange) }
        getValueForPixel(t) { return this._startValue + this.getDecimalForPixel(t) * this._valueRange } } const co = t => Math.floor(z(t)),
        uo = (t, e) => Math.pow(10, co(t) + e);

    function fo(t) { return 1 === t / Math.pow(10, co(t)) }

    function go(t, e, i) { const s = Math.pow(10, i),
            n = Math.floor(t / s); return Math.ceil(e / s) - n }

    function po(t, { min: e, max: i }) { e = r(t.min, e); const s = [],
            n = co(e); let o = function(t, e) { let i = co(e - t); for (; go(t, e, i) > 10;) i++; for (; go(t, e, i) < 10;) i--; return Math.min(i, co(t)) }(e, i),
            a = o < 0 ? Math.pow(10, Math.abs(o)) : 1; const l = Math.pow(10, o),
            h = n > o ? Math.pow(10, n) : 0,
            c = Math.round((e - h) * a) / a,
            d = Math.floor((e - h) / l / 10) * l * 10; let u = Math.floor((c - d) / Math.pow(10, o)),
            f = r(t.min, Math.round((h + d + u * Math.pow(10, o)) * a) / a); for (; f < i;) s.push({ value: f, major: fo(f), significand: u }), u >= 10 ? u = u < 15 ? 15 : 20 : u++, u >= 20 && (o++, u = 2, a = o >= 0 ? 1 : a), f = Math.round((h + d + u * Math.pow(10, o)) * a) / a; const g = r(t.max, f); return s.push({ value: g, major: fo(g), significand: u }), s }
    class mo extends qs { static id = "logarithmic";
        static defaults = { ticks: { callback: ae.formatters.logarithmic, major: { enabled: !0 } } };
        constructor(t) { super(t), this.start = void 0, this.end = void 0, this._startValue = void 0, this._valueRange = 0 }
        parse(t, e) { const i = lo.prototype.parse.apply(this, [t, e]); if (0 !== i) return a(i) && i > 0 ? i : null;
            this._zero = !0 }
        determineDataLimits() { const { min: t, max: e } = this.getMinMax(!0);
            this.min = a(t) ? Math.max(0, t) : null, this.max = a(e) ? Math.max(0, e) : null, this.options.beginAtZero && (this._zero = !0), this._zero && this.min !== this._suggestedMin && !a(this._userMin) && (this.min = t === uo(this.min, 0) ? uo(this.min, -1) : uo(this.min, 0)), this.handleTickRangeOptions() }
        handleTickRangeOptions() { const { minDefined: t, maxDefined: e } = this.getUserBounds(); let i = this.min,
                s = this.max; const n = e => i = t ? i : e,
                o = t => s = e ? s : t;
            i === s && (i <= 0 ? (n(1), o(10)) : (n(uo(i, -1)), o(uo(s, 1)))), i <= 0 && n(uo(s, -1)), s <= 0 && o(uo(i, 1)), this.min = i, this.max = s }
        buildTicks() { const t = this.options,
                e = po({ min: this._userMin, max: this._userMax }, this); return "ticks" === t.bounds && j(e, this, "value"), t.reverse ? (e.reverse(), this.start = this.max, this.end = this.min) : (this.start = this.min, this.end = this.max), e }
        getLabelForValue(t) { return void 0 === t ? "0" : ne(t, this.chart.options.locale, this.options.ticks.format) }
        configure() { const t = this.min;
            super.configure(), this._startValue = z(t), this._valueRange = z(this.max) - z(t) }
        getPixelForValue(t) { return void 0 !== t && 0 !== t || (t = this.min), null === t || isNaN(t) ? NaN : this.getPixelForDecimal(t === this.min ? 0 : (z(t) - this._startValue) / this._valueRange) }
        getValueForPixel(t) { const e = this.getDecimalForPixel(t); return Math.pow(10, this._startValue + e * this._valueRange) } }

    function bo(t) { const e = t.ticks; if (e.display && t.display) { const t = Mi(e.backdropPadding); return l(e.font && e.font.size, ue.font.size) + t.height } return 0 }

    function xo(t, e, i, s, n) { return t === s || t === n ? { start: e - i / 2, end: e + i / 2 } : t < s || t > n ? { start: e - i, end: e } : { start: e, end: e + i } }

    function _o(t) { const e = { l: t.left + t._padding.left, r: t.right - t._padding.right, t: t.top + t._padding.top, b: t.bottom - t._padding.bottom },
            i = Object.assign({}, e),
            s = [],
            o = [],
            a = t._pointLabels.length,
            r = t.options.pointLabels,
            l = r.centerPointLabels ? C / a : 0; for (let u = 0; u < a; u++) { const a = r.setContext(t.getPointLabelContext(u));
            o[u] = a.padding; const f = t.getPointPosition(u, t.drawingArea + o[u], l),
                g = wi(a.font),
                p = (h = t.ctx, c = g, d = n(d = t._pointLabels[u]) ? d : [d], { w: Ce(h, c.string, d), h: d.length * c.lineHeight });
            s[u] = p; const m = G(t.getIndexAngle(u) + l),
                b = Math.round(Y(m));
            yo(i, e, m, xo(b, f.x, p.w, 0, 180), xo(b, f.y, p.h, 90, 270)) } var h, c, d;
        t.setCenterPoint(e.l - i.l, i.r - e.r, e.t - i.t, i.b - e.b), t._pointLabelItems = function(t, e, i) { const s = [],
                n = t._pointLabels.length,
                o = t.options,
                a = bo(o) / 2,
                r = t.drawingArea,
                l = o.pointLabels.centerPointLabels ? C / n : 0; for (let o = 0; o < n; o++) { const n = t.getPointPosition(o, r + a + i[o], l),
                    h = Math.round(Y(G(n.angle + E))),
                    c = e[o],
                    d = wo(n.y, c.h, h),
                    u = vo(h),
                    f = Mo(n.x, c.w, u);
                s.push({ x: n.x, y: d, textAlign: u, left: f, top: d, right: f + c.w, bottom: d + c.h }) } return s }(t, s, o) }

    function yo(t, e, i, s, n) { const o = Math.abs(Math.sin(i)),
            a = Math.abs(Math.cos(i)); let r = 0,
            l = 0;
        s.start < e.l ? (r = (e.l - s.start) / o, t.l = Math.min(t.l, e.l - r)) : s.end > e.r && (r = (s.end - e.r) / o, t.r = Math.max(t.r, e.r + r)), n.start < e.t ? (l = (e.t - n.start) / a, t.t = Math.min(t.t, e.t - l)) : n.end > e.b && (l = (n.end - e.b) / a, t.b = Math.max(t.b, e.b + l)) }

    function vo(t) { return 0 === t || 180 === t ? "center" : t < 180 ? "left" : "right" }

    function Mo(t, e, i) { return "right" === i ? t -= e : "center" === i && (t -= e / 2), t }

    function wo(t, e, i) { return 90 === i || 270 === i ? t -= e / 2 : (i > 270 || i < 90) && (t -= e), t }

    function ko(t, e, i, s) { const { ctx: n } = t; if (i) n.arc(t.xCenter, t.yCenter, e, 0, O);
        else { let i = t.getPointPosition(0, e);
            n.moveTo(i.x, i.y); for (let o = 1; o < s; o++) i = t.getPointPosition(o, e), n.lineTo(i.x, i.y) } }
    class So extends lo { static id = "radialLinear";
        static defaults = { display: !0, animate: !0, position: "chartArea", angleLines: { display: !0, lineWidth: 1, borderDash: [], borderDashOffset: 0 }, grid: { circular: !1 }, startAngle: 0, ticks: { showLabelBackdrop: !0, callback: ae.formatters.numeric }, pointLabels: { backdropColor: void 0, backdropPadding: 2, display: !0, font: { size: 10 }, callback: t => t, padding: 5, centerPointLabels: !1 } };
        static defaultRoutes = { "angleLines.color": "borderColor", "pointLabels.color": "color", "ticks.color": "color" };
        static descriptors = { angleLines: { _fallback: "grid" } };
        constructor(t) { super(t), this.xCenter = void 0, this.yCenter = void 0, this.drawingArea = void 0, this._pointLabels = [], this._pointLabelItems = [] }
        setDimensions() { const t = this._padding = Mi(bo(this.options) / 2),
                e = this.width = this.maxWidth - t.width,
                i = this.height = this.maxHeight - t.height;
            this.xCenter = Math.floor(this.left + e / 2 + t.left), this.yCenter = Math.floor(this.top + i / 2 + t.top), this.drawingArea = Math.floor(Math.min(e, i) / 2) }
        determineDataLimits() { const { min: t, max: e } = this.getMinMax(!1);
            this.min = a(t) && !isNaN(t) ? t : 0, this.max = a(e) && !isNaN(e) ? e : 0, this.handleTickRangeOptions() }
        computeTickLimit() { return Math.ceil(this.drawingArea / bo(this.options)) }
        generateTickLabels(t) { lo.prototype.generateTickLabels.call(this, t), this._pointLabels = this.getLabels().map(((t, e) => { const i = d(this.options.pointLabels.callback, [t, e], this); return i || 0 === i ? i : "" })).filter(((t, e) => this.chart.getDataVisibility(e))) }
        fit() { const t = this.options;
            t.display && t.pointLabels.display ? _o(this) : this.setCenterPoint(0, 0, 0, 0) }
        setCenterPoint(t, e, i, s) { this.xCenter += Math.floor((t - e) / 2), this.yCenter += Math.floor((i - s) / 2), this.drawingArea -= Math.min(this.drawingArea / 2, Math.max(t, e, i, s)) }
        getIndexAngle(t) { return G(t * (O / (this._pointLabels.length || 1)) + $(this.options.startAngle || 0)) }
        getDistanceFromCenterForValue(t) { if (s(t)) return NaN; const e = this.drawingArea / (this.max - this.min); return this.options.reverse ? (this.max - t) * e : (t - this.min) * e }
        getValueForDistanceFromCenter(t) { if (s(t)) return NaN; const e = t / (this.drawingArea / (this.max - this.min)); return this.options.reverse ? this.max - e : this.min + e }
        getPointLabelContext(t) { const e = this._pointLabels || []; if (t >= 0 && t < e.length) { const i = e[t]; return function(t, e, i) { return Pi(t, { label: i, index: e, type: "pointLabel" }) }(this.getContext(), t, i) } }
        getPointPosition(t, e, i = 0) { const s = this.getIndexAngle(t) - E + i; return { x: Math.cos(s) * e + this.xCenter, y: Math.sin(s) * e + this.yCenter, angle: s } }
        getPointPositionForValue(t, e) { return this.getPointPosition(t, this.getDistanceFromCenterForValue(e)) }
        getBasePosition(t) { return this.getPointPositionForValue(t || 0, this.getBaseValue()) }
        getPointLabelPosition(t) { const { left: e, top: i, right: s, bottom: n } = this._pointLabelItems[t]; return { left: e, top: i, right: s, bottom: n } }
        drawBackground() { const { backgroundColor: t, grid: { circular: e } } = this.options; if (t) { const i = this.ctx;
                i.save(), i.beginPath(), ko(this, this.getDistanceFromCenterForValue(this._endValue), e, this._pointLabels.length), i.closePath(), i.fillStyle = t, i.fill(), i.restore() } }
        drawGrid() { const t = this.ctx,
                e = this.options,
                { angleLines: i, grid: n, border: o } = e,
                a = this._pointLabels.length; let r, l, h; if (e.pointLabels.display && function(t, e) { const { ctx: i, options: { pointLabels: n } } = t; for (let o = e - 1; o >= 0; o--) { const e = n.setContext(t.getPointLabelContext(o)),
                            a = wi(e.font),
                            { x: r, y: l, textAlign: h, left: c, top: d, right: u, bottom: f } = t._pointLabelItems[o],
                            { backdropColor: g } = e; if (!s(g)) { const t = vi(e.borderRadius),
                                s = Mi(e.backdropPadding);
                            i.fillStyle = g; const n = c - s.left,
                                o = d - s.top,
                                a = u - c + s.width,
                                r = f - d + s.height;
                            Object.values(t).some((t => 0 !== t)) ? (i.beginPath(), We(i, { x: n, y: o, w: a, h: r, radius: t }), i.fill()) : i.fillRect(n, o, a, r) }
                        Ve(i, t._pointLabels[o], r, l + a.lineHeight / 2, a, { color: e.color, textAlign: h, textBaseline: "middle" }) } }(this, a), n.display && this.ticks.forEach(((t, e) => { if (0 !== e) { l = this.getDistanceFromCenterForValue(t.value); const i = this.getContext(e),
                            s = n.setContext(i),
                            r = o.setContext(i);! function(t, e, i, s, n) { const o = t.ctx,
                                a = e.circular,
                                { color: r, lineWidth: l } = e;!a && !s || !r || !l || i < 0 || (o.save(), o.strokeStyle = r, o.lineWidth = l, o.setLineDash(n.dash), o.lineDashOffset = n.dashOffset, o.beginPath(), ko(t, i, a, s), o.closePath(), o.stroke(), o.restore()) }(this, s, l, a, r) } })), i.display) { for (t.save(), r = a - 1; r >= 0; r--) { const s = i.setContext(this.getPointLabelContext(r)),
                        { color: n, lineWidth: o } = s;
                    o && n && (t.lineWidth = o, t.strokeStyle = n, t.setLineDash(s.borderDash), t.lineDashOffset = s.borderDashOffset, l = this.getDistanceFromCenterForValue(e.ticks.reverse ? this.min : this.max), h = this.getPointPosition(r, l), t.beginPath(), t.moveTo(this.xCenter, this.yCenter), t.lineTo(h.x, h.y), t.stroke()) }
                t.restore() } }
        drawBorder() {}
        drawLabels() { const t = this.ctx,
                e = this.options,
                i = e.ticks; if (!i.display) return; const s = this.getIndexAngle(0); let n, o;
            t.save(), t.translate(this.xCenter, this.yCenter), t.rotate(s), t.textAlign = "center", t.textBaseline = "middle", this.ticks.forEach(((s, a) => { if (0 === a && !e.reverse) return; const r = i.setContext(this.getContext(a)),
                    l = wi(r.font); if (n = this.getDistanceFromCenterForValue(this.ticks[a].value), r.showLabelBackdrop) { t.font = l.string, o = t.measureText(s.label).width, t.fillStyle = r.backdropColor; const e = Mi(r.backdropPadding);
                    t.fillRect(-o / 2 - e.left, -n - l.size / 2 - e.top, o + e.width, l.size + e.height) }
                Ve(t, s.label, 0, -n, l, { color: r.color }) })), t.restore() }
        drawTitle() {} } const Po = { millisecond: { common: !0, size: 1, steps: 1e3 }, second: { common: !0, size: 1e3, steps: 60 }, minute: { common: !0, size: 6e4, steps: 60 }, hour: { common: !0, size: 36e5, steps: 24 }, day: { common: !0, size: 864e5, steps: 30 }, week: { common: !1, size: 6048e5, steps: 4 }, month: { common: !0, size: 2628e6, steps: 12 }, quarter: { common: !1, size: 7884e6, steps: 4 }, year: { common: !0, size: 3154e7 } },
        Do = Object.keys(Po);

    function Co(t, e) { return t - e }

    function Oo(t, e) { if (s(e)) return null; const i = t._adapter,
            { parser: n, round: o, isoWeekday: r } = t._parseOpts; let l = e; return "function" == typeof n && (l = n(l)), a(l) || (l = "string" == typeof n ? i.parse(l, n) : i.parse(l)), null === l ? null : (o && (l = "week" !== o || !W(r) && !0 !== r ? i.startOf(l, o) : i.startOf(l, "isoWeek", r)), +l) }

    function Ao(t, e, i, s) { const n = Do.length; for (let o = Do.indexOf(t); o < n - 1; ++o) { const t = Po[Do[o]],
                n = t.steps ? t.steps : Number.MAX_SAFE_INTEGER; if (t.common && Math.ceil((i - e) / (n * t.size)) <= s) return Do[o] } return Do[n - 1] }

    function To(t, e, i) { if (i) { if (i.length) { const { lo: s, hi: n } = et(i, e);
                t[i[s] >= e ? i[s] : i[n]] = !0 } } else t[e] = !0 }

    function Lo(t, e, i) { const s = [],
            n = {},
            o = e.length; let a, r; for (a = 0; a < o; ++a) r = e[a], n[r] = a, s.push({ value: r, major: !1 }); return 0 !== o && i ? function(t, e, i, s) { const n = t._adapter,
                o = +n.startOf(e[0].value, s),
                a = e[e.length - 1].value; let r, l; for (r = o; r <= a; r = +n.add(r, 1, s)) l = i[r], l >= 0 && (e[l].major = !0); return e }(t, s, n, i) : s }
    class Eo extends qs { static id = "time";
        static defaults = { bounds: "data", adapters: {}, time: { parser: !1, unit: !1, round: !1, isoWeekday: !1, minUnit: "millisecond", displayFormats: {} }, ticks: { source: "auto", callback: !1, major: { enabled: !1 } } };
        constructor(t) { super(t), this._cache = { data: [], labels: [], all: [] }, this._unit = "day", this._majorUnit = void 0, this._offsets = {}, this._normalized = !1, this._parseOpts = void 0 }
        init(t, e = {}) { const i = t.time || (t.time = {}),
                s = this._adapter = new Pn._date(t.adapters.date);
            s.init(e), x(i.displayFormats, s.formats()), this._parseOpts = { parser: i.parser, round: i.round, isoWeekday: i.isoWeekday }, super.init(t), this._normalized = e.normalized }
        parse(t, e) { return void 0 === t ? null : Oo(this, t) }
        beforeLayout() { super.beforeLayout(), this._cache = { data: [], labels: [], all: [] } }
        determineDataLimits() { const t = this.options,
                e = this._adapter,
                i = t.time.unit || "day"; let { min: s, max: n, minDefined: o, maxDefined: r } = this.getUserBounds();

            function l(t) { o || isNaN(t.min) || (s = Math.min(s, t.min)), r || isNaN(t.max) || (n = Math.max(n, t.max)) }
            o && r || (l(this._getLabelBounds()), "ticks" === t.bounds && "labels" === t.ticks.source || l(this.getMinMax(!1))), s = a(s) && !isNaN(s) ? s : +e.startOf(Date.now(), i), n = a(n) && !isNaN(n) ? n : +e.endOf(Date.now(), i) + 1, this.min = Math.min(s, n - 1), this.max = Math.max(s + 1, n) }
        _getLabelBounds() { const t = this.getLabelTimestamps(); let e = Number.POSITIVE_INFINITY,
                i = Number.NEGATIVE_INFINITY; return t.length && (e = t[0], i = t[t.length - 1]), { min: e, max: i } }
        buildTicks() { const t = this.options,
                e = t.time,
                i = t.ticks,
                s = "labels" === i.source ? this.getLabelTimestamps() : this._generate(); "ticks" === t.bounds && s.length && (this.min = this._userMin || s[0], this.max = this._userMax || s[s.length - 1]); const n = this.min,
                o = nt(s, n, this.max); return this._unit = e.unit || (i.autoSkip ? Ao(e.minUnit, this.min, this.max, this._getLabelCapacity(n)) : function(t, e, i, s, n) { for (let o = Do.length - 1; o >= Do.indexOf(i); o--) { const i = Do[o]; if (Po[i].common && t._adapter.diff(n, s, i) >= e - 1) return i } return Do[i ? Do.indexOf(i) : 0] }(this, o.length, e.minUnit, this.min, this.max)), this._majorUnit = i.major.enabled && "year" !== this._unit ? function(t) { for (let e = Do.indexOf(t) + 1, i = Do.length; e < i; ++e)
                    if (Po[Do[e]].common) return Do[e] }(this._unit) : void 0, this.initOffsets(s), t.reverse && o.reverse(), Lo(this, o, this._majorUnit) }
        afterAutoSkip() { this.options.offsetAfterAutoskip && this.initOffsets(this.ticks.map((t => +t.value))) }
        initOffsets(t = []) { let e, i, s = 0,
                n = 0;
            this.options.offset && t.length && (e = this.getDecimalForValue(t[0]), s = 1 === t.length ? 1 - e : (this.getDecimalForValue(t[1]) - e) / 2, i = this.getDecimalForValue(t[t.length - 1]), n = 1 === t.length ? i : (i - this.getDecimalForValue(t[t.length - 2])) / 2); const o = t.length < 3 ? .5 : .25;
            s = J(s, 0, o), n = J(n, 0, o), this._offsets = { start: s, end: n, factor: 1 / (s + 1 + n) } }
        _generate() { const t = this._adapter,
                e = this.min,
                i = this.max,
                s = this.options,
                n = s.time,
                o = n.unit || Ao(n.minUnit, e, i, this._getLabelCapacity(e)),
                a = l(s.ticks.stepSize, 1),
                r = "week" === o && n.isoWeekday,
                h = W(r) || !0 === r,
                c = {}; let d, u, f = e; if (h && (f = +t.startOf(f, "isoWeek", r)), f = +t.startOf(f, h ? "day" : o), t.diff(i, e, o) > 1e5 * a) throw new Error(e + " and " + i + " are too far apart with stepSize of " + a + " " + o); const g = "data" === s.ticks.source && this.getDataTimestamps(); for (d = f, u = 0; d < i; d = +t.add(d, a, o), u++) To(c, d, g); return d !== i && "ticks" !== s.bounds && 1 !== u || To(c, d, g), Object.keys(c).sort(((t, e) => t - e)).map((t => +t)) }
        getLabelForValue(t) { const e = this._adapter,
                i = this.options.time; return i.tooltipFormat ? e.format(t, i.tooltipFormat) : e.format(t, i.displayFormats.datetime) }
        _tickFormatFunction(t, e, i, s) { const n = this.options,
                o = n.ticks.callback; if (o) return d(o, [t, e, i], this); const a = n.time.displayFormats,
                r = this._unit,
                l = this._majorUnit,
                h = r && a[r],
                c = l && a[l],
                u = i[e],
                f = l && c && u && u.major; return this._adapter.format(t, s || (f ? c : h)) }
        generateTickLabels(t) { let e, i, s; for (e = 0, i = t.length; e < i; ++e) s = t[e], s.label = this._tickFormatFunction(s.value, e, t) }
        getDecimalForValue(t) { return null === t ? NaN : (t - this.min) / (this.max - this.min) }
        getPixelForValue(t) { const e = this._offsets,
                i = this.getDecimalForValue(t); return this.getPixelForDecimal((e.start + i) * e.factor) }
        getValueForPixel(t) { const e = this._offsets,
                i = this.getDecimalForPixel(t) / e.factor - e.end; return this.min + i * (this.max - this.min) }
        _getLabelSize(t) { const e = this.options.ticks,
                i = this.ctx.measureText(t).width,
                s = $(this.isHorizontal() ? e.maxRotation : e.minRotation),
                n = Math.cos(s),
                o = Math.sin(s),
                a = this._resolveTickFontOptions(0).size; return { w: i * n + a * o, h: i * o + a * n } }
        _getLabelCapacity(t) { const e = this.options.time,
                i = e.displayFormats,
                s = i[e.unit] || i.millisecond,
                n = this._tickFormatFunction(t, 0, Lo(this, [t], this._majorUnit), s),
                o = this._getLabelSize(n),
                a = Math.floor(this.isHorizontal() ? this.width / o.w : this.height / o.h) - 1; return a > 0 ? a : 1 }
        getDataTimestamps() { let t, e, i = this._cache.data || []; if (i.length) return i; const s = this.getMatchingVisibleMetas(); if (this._normalized && s.length) return this._cache.data = s[0].controller.getAllParsedValues(this); for (t = 0, e = s.length; t < e; ++t) i = i.concat(s[t].controller.getAllParsedValues(this)); return this._cache.data = this.normalize(i) }
        getLabelTimestamps() { const t = this._cache.labels || []; let e, i; if (t.length) return t; const s = this.getLabels(); for (e = 0, i = s.length; e < i; ++e) t.push(Oo(this, s[e])); return this._cache.labels = this._normalized ? t : this.normalize(t) }
        normalize(t) { return lt(t.sort(Co)) } }

    function Ro(t, e, i) { let s, n, o, a, r = 0,
            l = t.length - 1;
        i ? (e >= t[r].pos && e <= t[l].pos && ({ lo: r, hi: l } = it(t, "pos", e)), ({ pos: s, time: o } = t[r]), ({ pos: n, time: a } = t[l])) : (e >= t[r].time && e <= t[l].time && ({ lo: r, hi: l } = it(t, "time", e)), ({ time: s, pos: o } = t[r]), ({ time: n, pos: a } = t[l])); const h = n - s; return h ? o + (a - o) * (e - s) / h : o } var Io = Object.freeze({ __proto__: null, CategoryScale: class extends qs { static id = "category";
            static defaults = { ticks: { callback: ao } };
            constructor(t) { super(t), this._startValue = void 0, this._valueRange = 0, this._addedLabels = [] }
            init(t) { const e = this._addedLabels; if (e.length) { const t = this.getLabels(); for (const { index: i, label: s }
                        of e) t[i] === s && t.splice(i, 1);
                    this._addedLabels = [] }
                super.init(t) }
            parse(t, e) { if (s(t)) return null; const i = this.getLabels(); return ((t, e) => null === t ? null : J(Math.round(t), 0, e))(e = isFinite(e) && i[e] === t ? e : oo(i, t, l(e, t), this._addedLabels), i.length - 1) }
            determineDataLimits() { const { minDefined: t, maxDefined: e } = this.getUserBounds(); let { min: i, max: s } = this.getMinMax(!0); "ticks" === this.options.bounds && (t || (i = 0), e || (s = this.getLabels().length - 1)), this.min = i, this.max = s }
            buildTicks() { const t = this.min,
                    e = this.max,
                    i = this.options.offset,
                    s = []; let n = this.getLabels();
                n = 0 === t && e === n.length - 1 ? n : n.slice(t, e + 1), this._valueRange = Math.max(n.length - (i ? 0 : 1), 1), this._startValue = this.min - (i ? .5 : 0); for (let i = t; i <= e; i++) s.push({ value: i }); return s }
            getLabelForValue(t) { return ao.call(this, t) }
            configure() { super.configure(), this.isHorizontal() || (this._reversePixels = !this._reversePixels) }
            getPixelForValue(t) { return "number" != typeof t && (t = this.parse(t)), null === t ? NaN : this.getPixelForDecimal((t - this._startValue) / this._valueRange) }
            getPixelForTick(t) { const e = this.ticks; return t < 0 || t > e.length - 1 ? null : this.getPixelForValue(e[t].value) }
            getValueForPixel(t) { return Math.round(this._startValue + this.getDecimalForPixel(t) * this._valueRange) }
            getBasePixel() { return this.bottom } }, LinearScale: ho, LogarithmicScale: mo, RadialLinearScale: So, TimeScale: Eo, TimeSeriesScale: class extends Eo { static id = "timeseries";
            static defaults = Eo.defaults;
            constructor(t) { super(t), this._table = [], this._minPos = void 0, this._tableRange = void 0 }
            initOffsets() { const t = this._getTimestampsForTable(),
                    e = this._table = this.buildLookupTable(t);
                this._minPos = Ro(e, this.min), this._tableRange = Ro(e, this.max) - this._minPos, super.initOffsets(t) }
            buildLookupTable(t) { const { min: e, max: i } = this, s = [], n = []; let o, a, r, l, h; for (o = 0, a = t.length; o < a; ++o) l = t[o], l >= e && l <= i && s.push(l); if (s.length < 2) return [{ time: e, pos: 0 }, { time: i, pos: 1 }]; for (o = 0, a = s.length; o < a; ++o) h = s[o + 1], r = s[o - 1], l = s[o], Math.round((h + r) / 2) !== l && n.push({ time: l, pos: o / (a - 1) }); return n }
            _getTimestampsForTable() { let t = this._cache.all || []; if (t.length) return t; const e = this.getDataTimestamps(),
                    i = this.getLabelTimestamps(); return t = e.length && i.length ? this.normalize(e.concat(i)) : e.length ? e : i, t = this._cache.all = t, t }
            getDecimalForValue(t) { return (Ro(this._table, t) - this._minPos) / this._tableRange }
            getValueForPixel(t) { const e = this._offsets,
                    i = this.getDecimalForPixel(t) / e.factor - e.end; return Ro(this._table, i * this._tableRange + this._minPos, !0) } } }); const zo = ["rgb(54, 162, 235)", "rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
        Fo = zo.map((t => t.replace("rgb(", "rgba(").replace(")", ", 0.5)")));

    function Vo(t) { return zo[t % zo.length] }

    function Bo(t) { return Fo[t % Fo.length] }

    function No(t) { let e = 0; return (i, s) => { const n = t.getDatasetMeta(s).controller;
            n instanceof In ? e = function(t, e) { return t.backgroundColor = t.data.map((() => Vo(e++))), e }(i, e) : n instanceof zn ? e = function(t, e) { return t.backgroundColor = t.data.map((() => Bo(e++))), e }(i, e) : n && (e = function(t, e) { return t.borderColor = Vo(e), t.backgroundColor = Bo(e), ++e }(i, e)) } }

    function Wo(t) { let e; for (e in t)
            if (t[e].borderColor || t[e].backgroundColor) return !0;
        return !1 } var Ho = { id: "colors", defaults: { enabled: !0, forceOverride: !1 }, beforeLayout(t, e, i) { if (!i.enabled) return; const { options: { elements: s }, data: { datasets: n } } = t.config; if (!i.forceOverride && (Wo(n) || s && Wo(s))) return; const o = No(t);
            n.forEach(o) } };

    function jo(t) { if (t._decimated) { const e = t._data;
            delete t._decimated, delete t._data, Object.defineProperty(t, "data", { value: e }) } }

    function $o(t) { t.data.datasets.forEach((t => { jo(t) })) } var Yo = { id: "decimation", defaults: { algorithm: "min-max", enabled: !1 }, beforeElementsUpdate: (t, e, i) => { if (!i.enabled) return void $o(t); const n = t.width;
            t.data.datasets.forEach(((e, o) => { const { _data: a, indexAxis: r } = e, l = t.getDatasetMeta(o), h = a || e.data; if ("y" === ki([r, t.options.indexAxis])) return; if (!l.controller.supportsDecimation) return; const c = t.scales[l.xAxisID]; if ("linear" !== c.type && "time" !== c.type) return; if (t.options.parsing) return; let { start: d, count: u } = function(t, e) { const i = e.length; let s, n = 0; const { iScale: o } = t, { min: a, max: r, minDefined: l, maxDefined: h } = o.getUserBounds(); return l && (n = J(it(e, o.axis, a).lo, 0, i - 1)), s = h ? J(it(e, o.axis, r).hi + 1, n, i) - n : i - n, { start: n, count: s } }(l, h); if (u <= (i.threshold || 4 * n)) return void jo(e); let f; switch (s(a) && (e._data = h, delete e.data, Object.defineProperty(e, "data", { configurable: !0, enumerable: !0, get: function() { return this._decimated }, set: function(t) { this._data = t } })), i.algorithm) {
                    case "lttb":
                        f = function(t, e, i, s, n) { const o = n.samples || s; if (o >= i) return t.slice(e, e + i); const a = [],
                                r = (i - 2) / (o - 2); let l = 0; const h = e + i - 1; let c, d, u, f, g, p = e; for (a[l++] = t[p], c = 0; c < o - 2; c++) { let s, n = 0,
                                    o = 0; const h = Math.floor((c + 1) * r) + 1 + e,
                                    m = Math.min(Math.floor((c + 2) * r) + 1, i) + e,
                                    b = m - h; for (s = h; s < m; s++) n += t[s].x, o += t[s].y;
                                n /= b, o /= b; const x = Math.floor(c * r) + 1 + e,
                                    _ = Math.min(Math.floor((c + 1) * r) + 1, i) + e,
                                    { x: y, y: v } = t[p]; for (u = f = -1, s = x; s < _; s++) f = .5 * Math.abs((y - n) * (t[s].y - v) - (y - t[s].x) * (o - v)), f > u && (u = f, d = t[s], g = s);
                                a[l++] = d, p = g } return a[l++] = t[h], a }(h, d, u, n, i); break;
                    case "min-max":
                        f = function(t, e, i, n) { let o, a, r, l, h, c, d, u, f, g, p = 0,
                                m = 0; const b = [],
                                x = e + i - 1,
                                _ = t[e].x,
                                y = t[x].x - _; for (o = e; o < e + i; ++o) { a = t[o], r = (a.x - _) / y * n, l = a.y; const e = 0 | r; if (e === h) l < f ? (f = l, c = o) : l > g && (g = l, d = o), p = (m * p + a.x) / ++m;
                                else { const i = o - 1; if (!s(c) && !s(d)) { const e = Math.min(c, d),
                                            s = Math.max(c, d);
                                        e !== u && e !== i && b.push({...t[e], x: p }), s !== u && s !== i && b.push({...t[s], x: p }) }
                                    o > 0 && i !== u && b.push(t[i]), b.push(a), h = e, m = 0, f = g = l, c = d = u = o } } return b }(h, d, u, n); break;
                    default:
                        throw new Error(`Unsupported decimation algorithm '${i.algorithm}'`) }
                e._decimated = f })) }, destroy(t) { $o(t) } };

    function Uo(t, e, i, s) { if (s) return; let n = e[t],
            o = i[t]; return "angle" === t && (n = G(n), o = G(o)), { property: t, start: n, end: o } }

    function Xo(t, e, i) { for (; e > t; e--) { const t = i[e]; if (!isNaN(t.x) && !isNaN(t.y)) break } return e }

    function qo(t, e, i, s) { return t && e ? s(t[i], e[i]) : t ? t[i] : e ? e[i] : 0 }

    function Ko(t, e) { let i = [],
            s = !1; return n(t) ? (s = !0, i = t) : i = function(t, e) { const { x: i = null, y: s = null } = t || {}, n = e.points, o = []; return e.segments.forEach((({ start: t, end: e }) => { e = Xo(t, e, n); const a = n[t],
                    r = n[e];
                null !== s ? (o.push({ x: a.x, y: s }), o.push({ x: r.x, y: s })) : null !== i && (o.push({ x: i, y: a.y }), o.push({ x: i, y: r.y })) })), o }(t, e), i.length ? new Gn({ points: i, options: { tension: 0 }, _loop: s, _fullLoop: s }) : null }

    function Go(t) { return t && !1 !== t.fill }

    function Zo(t, e, i) { let s = t[e].fill; const n = [e]; let o; if (!i) return s; for (; !1 !== s && -1 === n.indexOf(s);) { if (!a(s)) return s; if (o = t[s], !o) return !1; if (o.visible) return s;
            n.push(s), s = o.fill } return !1 }

    function Jo(t, e, i) { const s = function(t) { const e = t.options,
                i = e.fill; let s = l(i && i.target, i);
            void 0 === s && (s = !!e.backgroundColor); if (!1 === s || null === s) return !1; if (!0 === s) return "origin"; return s }(t); if (o(s)) return !isNaN(s.value) && s; let n = parseFloat(s); return a(n) && Math.floor(n) === n ? function(t, e, i, s) { "-" !== t && "+" !== t || (i = e + i); if (i === e || i < 0 || i >= s) return !1; return i }(s[0], e, n, i) : ["origin", "start", "end", "stack", "shape"].indexOf(s) >= 0 && s }

    function Qo(t, e, i) { const s = []; for (let n = 0; n < i.length; n++) { const o = i[n],
                { first: a, last: r, point: l } = ta(o, e, "x"); if (!(!l || a && r))
                if (a) s.unshift(l);
                else if (t.push(l), !r) break }
        t.push(...s) }

    function ta(t, e, i) { const s = t.interpolate(e, i); if (!s) return {}; const n = s[i],
            o = t.segments,
            a = t.points; let r = !1,
            l = !1; for (let t = 0; t < o.length; t++) { const e = o[t],
                s = a[e.start][i],
                h = a[e.end][i]; if (tt(n, s, h)) { r = n === s, l = n === h; break } } return { first: r, last: l, point: s } }
    class ea { constructor(t) { this.x = t.x, this.y = t.y, this.radius = t.radius }
        pathSegment(t, e, i) { const { x: s, y: n, radius: o } = this; return e = e || { start: 0, end: O }, t.arc(s, n, o, e.end, e.start, !0), !i.bounds }
        interpolate(t) { const { x: e, y: i, radius: s } = this, n = t.angle; return { x: e + Math.cos(n) * s, y: i + Math.sin(n) * s, angle: n } } }

    function ia(t) { const { chart: e, fill: i, line: s } = t; if (a(i)) return function(t, e) { const i = t.getDatasetMeta(e); return i && t.isDatasetVisible(e) ? i.dataset : null }(e, i); if ("stack" === i) return function(t) { const { scale: e, index: i, line: s } = t, n = [], o = s.segments, a = s.points, r = function(t, e) { const i = [],
                    s = t.getMatchingVisibleMetas("line"); for (let t = 0; t < s.length; t++) { const n = s[t]; if (n.index === e) break;
                    n.hidden || i.unshift(n.dataset) } return i }(e, i);
            r.push(Ko({ x: null, y: e.bottom }, s)); for (let t = 0; t < o.length; t++) { const e = o[t]; for (let t = e.start; t <= e.end; t++) Qo(n, a[t], r) } return new Gn({ points: n, options: {} }) }(t); if ("shape" === i) return !0; const n = function(t) { if ((t.scale || {}).getPointPositionForValue) return function(t) { const { scale: e, fill: i } = t, s = e.options, n = e.getLabels().length, a = s.reverse ? e.max : e.min, r = function(t, e, i) { let s; return s = "start" === t ? i : "end" === t ? e.options.reverse ? e.min : e.max : o(t) ? t.value : e.getBaseValue(), s }(i, e, a), l = []; if (s.grid.circular) { const t = e.getPointPositionForValue(0, a); return new ea({ x: t.x, y: t.y, radius: e.getDistanceFromCenterForValue(r) }) } for (let t = 0; t < n; ++t) l.push(e.getPointPositionForValue(t, r)); return l }(t); return function(t) { const { scale: e = {}, fill: i } = t, s = function(t, e) { let i = null; return "start" === t ? i = e.bottom : "end" === t ? i = e.top : o(t) ? i = e.getPixelForValue(t.value) : e.getBasePixel && (i = e.getBasePixel()), i }(i, e); if (a(s)) { const t = e.isHorizontal(); return { x: t ? s : null, y: t ? null : s } } return null }(t) }(t); return n instanceof ea ? n : Ko(n, s) }

    function sa(t, e, i) { const s = ia(e),
            { line: n, scale: o, axis: a } = e,
            r = n.options,
            l = r.fill,
            h = r.backgroundColor,
            { above: c = h, below: d = h } = l || {};
        s && n.points.length && (Re(t, i), function(t, e) { const { line: i, target: s, above: n, below: o, area: a, scale: r } = e, l = i._loop ? "angle" : e.axis;
            t.save(), "x" === l && o !== n && (na(t, s, a.top), oa(t, { line: i, target: s, color: n, scale: r, property: l }), t.restore(), t.save(), na(t, s, a.bottom));
            oa(t, { line: i, target: s, color: o, scale: r, property: l }), t.restore() }(t, { line: n, target: s, above: c, below: d, area: i, scale: o, axis: a }), Ie(t)) }

    function na(t, e, i) { const { segments: s, points: n } = e; let o = !0,
            a = !1;
        t.beginPath(); for (const r of s) { const { start: s, end: l } = r, h = n[s], c = n[Xo(s, l, n)];
            o ? (t.moveTo(h.x, h.y), o = !1) : (t.lineTo(h.x, i), t.lineTo(h.x, h.y)), a = !!e.pathSegment(t, r, { move: a }), a ? t.closePath() : t.lineTo(c.x, i) }
        t.lineTo(e.first().x, i), t.closePath(), t.clip() }

    function oa(t, e) { const { line: i, target: s, property: n, color: o, scale: a } = e, r = function(t, e, i) { const s = t.segments,
                n = t.points,
                o = e.points,
                a = []; for (const t of s) { let { start: s, end: r } = t;
                r = Xo(s, r, n); const l = Uo(i, n[s], n[r], t.loop); if (!e.segments) { a.push({ source: t, target: l, start: n[s], end: n[r] }); continue } const h = Ei(e, l); for (const e of h) { const s = Uo(i, o[e.start], o[e.end], e.loop),
                        r = Li(t, n, s); for (const t of r) a.push({ source: t, target: e, start: {
                            [i]: qo(l, s, "start", Math.max) }, end: {
                            [i]: qo(l, s, "end", Math.min) } }) } } return a }(i, s, n); for (const { source: e, target: l, start: h, end: c }
            of r) { const { style: { backgroundColor: r = o } = {} } = e, d = !0 !== s;
            t.save(), t.fillStyle = r, aa(t, a, d && Uo(n, h, c)), t.beginPath(); const u = !!i.pathSegment(t, e); let f; if (d) { u ? t.closePath() : ra(t, s, c, n); const e = !!s.pathSegment(t, l, { move: u, reverse: !0 });
                f = u && e, f || ra(t, s, h, n) }
            t.closePath(), t.fill(f ? "evenodd" : "nonzero"), t.restore() } }

    function aa(t, e, i) { const { top: s, bottom: n } = e.chart.chartArea, { property: o, start: a, end: r } = i || {}; "x" === o && (t.beginPath(), t.rect(a, s, r - a, n - s), t.clip()) }

    function ra(t, e, i, s) { const n = e.interpolate(i, s);
        n && t.lineTo(n.x, n.y) } var la = { id: "filler", afterDatasetsUpdate(t, e, i) { const s = (t.data.datasets || []).length,
                n = []; let o, a, r, l; for (a = 0; a < s; ++a) o = t.getDatasetMeta(a), r = o.dataset, l = null, r && r.options && r instanceof Gn && (l = { visible: t.isDatasetVisible(a), index: a, fill: Jo(r, a, s), chart: t, axis: o.controller.options.indexAxis, scale: o.vScale, line: r }), o.$filler = l, n.push(l); for (a = 0; a < s; ++a) l = n[a], l && !1 !== l.fill && (l.fill = Zo(n, a, i.propagate)) }, beforeDraw(t, e, i) { const s = "beforeDraw" === i.drawTime,
                n = t.getSortedVisibleDatasetMetas(),
                o = t.chartArea; for (let e = n.length - 1; e >= 0; --e) { const i = n[e].$filler;
                i && (i.line.updateControlPoints(o, i.axis), s && i.fill && sa(t.ctx, i, o)) } }, beforeDatasetsDraw(t, e, i) { if ("beforeDatasetsDraw" !== i.drawTime) return; const s = t.getSortedVisibleDatasetMetas(); for (let e = s.length - 1; e >= 0; --e) { const i = s[e].$filler;
                Go(i) && sa(t.ctx, i, t.chartArea) } }, beforeDatasetDraw(t, e, i) { const s = e.meta.$filler;
            Go(s) && "beforeDatasetDraw" === i.drawTime && sa(t.ctx, s, t.chartArea) }, defaults: { propagate: !0, drawTime: "beforeDatasetDraw" } }; const ha = (t, e) => { let { boxHeight: i = e, boxWidth: s = e } = t; return t.usePointStyle && (i = Math.min(i, e), s = t.pointStyleWidth || Math.min(s, e)), { boxWidth: s, boxHeight: i, itemHeight: Math.max(e, i) } };
    class ca extends Bs { constructor(t) { super(), this._added = !1, this.legendHitBoxes = [], this._hoveredItem = null, this.doughnutMode = !1, this.chart = t.chart, this.options = t.options, this.ctx = t.ctx, this.legendItems = void 0, this.columnSizes = void 0, this.lineWidths = void 0, this.maxHeight = void 0, this.maxWidth = void 0, this.top = void 0, this.bottom = void 0, this.left = void 0, this.right = void 0, this.height = void 0, this.width = void 0, this._margins = void 0, this.position = void 0, this.weight = void 0, this.fullSize = void 0 }
        update(t, e, i) { this.maxWidth = t, this.maxHeight = e, this._margins = i, this.setDimensions(), this.buildLabels(), this.fit() }
        setDimensions() { this.isHorizontal() ? (this.width = this.maxWidth, this.left = this._margins.left, this.right = this.width) : (this.height = this.maxHeight, this.top = this._margins.top, this.bottom = this.height) }
        buildLabels() { const t = this.options.labels || {}; let e = d(t.generateLabels, [this.chart], this) || [];
            t.filter && (e = e.filter((e => t.filter(e, this.chart.data)))), t.sort && (e = e.sort(((e, i) => t.sort(e, i, this.chart.data)))), this.options.reverse && e.reverse(), this.legendItems = e }
        fit() { const { options: t, ctx: e } = this; if (!t.display) return void(this.width = this.height = 0); const i = t.labels,
                s = wi(i.font),
                n = s.size,
                o = this._computeTitleHeight(),
                { boxWidth: a, itemHeight: r } = ha(i, n); let l, h;
            e.font = s.string, this.isHorizontal() ? (l = this.maxWidth, h = this._fitRows(o, n, a, r) + 10) : (h = this.maxHeight, l = this._fitCols(o, s, a, r) + 10), this.width = Math.min(l, t.maxWidth || this.maxWidth), this.height = Math.min(h, t.maxHeight || this.maxHeight) }
        _fitRows(t, e, i, s) { const { ctx: n, maxWidth: o, options: { labels: { padding: a } } } = this, r = this.legendHitBoxes = [], l = this.lineWidths = [0], h = s + a; let c = t;
            n.textAlign = "left", n.textBaseline = "middle"; let d = -1,
                u = -h; return this.legendItems.forEach(((t, f) => { const g = i + e / 2 + n.measureText(t.text).width;
                (0 === f || l[l.length - 1] + g + 2 * a > o) && (c += h, l[l.length - (f > 0 ? 0 : 1)] = 0, u += h, d++), r[f] = { left: 0, top: u, row: d, width: g, height: s }, l[l.length - 1] += g + a })), c }
        _fitCols(t, e, i, s) { const { ctx: n, maxHeight: o, options: { labels: { padding: a } } } = this, r = this.legendHitBoxes = [], l = this.columnSizes = [], h = o - t; let c = a,
                d = 0,
                u = 0,
                f = 0,
                g = 0; return this.legendItems.forEach(((t, o) => { const { itemWidth: p, itemHeight: m } = function(t, e, i, s, n) { const o = function(t, e, i, s) { let n = t.text;
                            n && "string" != typeof n && (n = n.reduce(((t, e) => t.length > e.length ? t : e))); return e + i.size / 2 + s.measureText(n).width }(s, t, e, i),
                        a = function(t, e, i) { let s = t; "string" != typeof e.text && (s = da(e, i)); return s }(n, s, e.lineHeight); return { itemWidth: o, itemHeight: a } }(i, e, n, t, s);
                o > 0 && u + m + 2 * a > h && (c += d + a, l.push({ width: d, height: u }), f += d + a, g++, d = u = 0), r[o] = { left: f, top: u, col: g, width: p, height: m }, d = Math.max(d, p), u += m + a })), c += d, l.push({ width: d, height: u }), c }
        adjustHitBoxes() { if (!this.options.display) return; const t = this._computeTitleHeight(),
                { legendHitBoxes: e, options: { align: i, labels: { padding: s }, rtl: n } } = this,
                o = Di(n, this.left, this.width); if (this.isHorizontal()) { let n = 0,
                    a = ft(i, this.left + s, this.right - this.lineWidths[n]); for (const r of e) n !== r.row && (n = r.row, a = ft(i, this.left + s, this.right - this.lineWidths[n])), r.top += this.top + t + s, r.left = o.leftForLtr(o.x(a), r.width), a += r.width + s } else { let n = 0,
                    a = ft(i, this.top + t + s, this.bottom - this.columnSizes[n].height); for (const r of e) r.col !== n && (n = r.col, a = ft(i, this.top + t + s, this.bottom - this.columnSizes[n].height)), r.top = a, r.left += this.left + s, r.left = o.leftForLtr(o.x(r.left), r.width), a += r.height + s } }
        isHorizontal() { return "top" === this.options.position || "bottom" === this.options.position }
        draw() { if (this.options.display) { const t = this.ctx;
                Re(t, this), this._draw(), Ie(t) } }
        _draw() { const { options: t, columnSizes: e, lineWidths: i, ctx: s } = this, { align: n, labels: o } = t, a = ue.color, r = Di(t.rtl, this.left, this.width), h = wi(o.font), { padding: c } = o, d = h.size, u = d / 2; let f;
            this.drawTitle(), s.textAlign = r.textAlign("left"), s.textBaseline = "middle", s.lineWidth = .5, s.font = h.string; const { boxWidth: g, boxHeight: p, itemHeight: m } = ha(o, d), b = this.isHorizontal(), x = this._computeTitleHeight();
            f = b ? { x: ft(n, this.left + c, this.right - i[0]), y: this.top + c + x, line: 0 } : { x: this.left + c, y: ft(n, this.top + x + c, this.bottom - e[0].height), line: 0 }, Ci(this.ctx, t.textDirection); const _ = m + c;
            this.legendItems.forEach(((y, v) => { s.strokeStyle = y.fontColor, s.fillStyle = y.fontColor; const M = s.measureText(y.text).width,
                    w = r.textAlign(y.textAlign || (y.textAlign = o.textAlign)),
                    k = g + u + M; let S = f.x,
                    P = f.y;
                r.setWidth(this.width), b ? v > 0 && S + k + c > this.right && (P = f.y += _, f.line++, S = f.x = ft(n, this.left + c, this.right - i[f.line])) : v > 0 && P + _ > this.bottom && (S = f.x = S + e[f.line].width + c, f.line++, P = f.y = ft(n, this.top + x + c, this.bottom - e[f.line].height)); if (function(t, e, i) { if (isNaN(g) || g <= 0 || isNaN(p) || p < 0) return;
                        s.save(); const n = l(i.lineWidth, 1); if (s.fillStyle = l(i.fillStyle, a), s.lineCap = l(i.lineCap, "butt"), s.lineDashOffset = l(i.lineDashOffset, 0), s.lineJoin = l(i.lineJoin, "miter"), s.lineWidth = n, s.strokeStyle = l(i.strokeStyle, a), s.setLineDash(l(i.lineDash, [])), o.usePointStyle) { const a = { radius: p * Math.SQRT2 / 2, pointStyle: i.pointStyle, rotation: i.rotation, borderWidth: n },
                                l = r.xPlus(t, g / 2);
                            Le(s, a, l, e + u, o.pointStyleWidth && g) } else { const o = e + Math.max((d - p) / 2, 0),
                                a = r.leftForLtr(t, g),
                                l = vi(i.borderRadius);
                            s.beginPath(), Object.values(l).some((t => 0 !== t)) ? We(s, { x: a, y: o, w: g, h: p, radius: l }) : s.rect(a, o, g, p), s.fill(), 0 !== n && s.stroke() }
                        s.restore() }(r.x(S), P, y), S = gt(w, S + g + u, b ? S + k : this.right, t.rtl), function(t, e, i) { Ve(s, i.text, t, e + m / 2, h, { strikethrough: i.hidden, textAlign: r.textAlign(i.textAlign) }) }(r.x(S), P, y), b) f.x += k + c;
                else if ("string" != typeof y.text) { const t = h.lineHeight;
                    f.y += da(y, t) } else f.y += _ })), Oi(this.ctx, t.textDirection) }
        drawTitle() { const t = this.options,
                e = t.title,
                i = wi(e.font),
                s = Mi(e.padding); if (!e.display) return; const n = Di(t.rtl, this.left, this.width),
                o = this.ctx,
                a = e.position,
                r = i.size / 2,
                l = s.top + r; let h, c = this.left,
                d = this.width; if (this.isHorizontal()) d = Math.max(...this.lineWidths), h = this.top + l, c = ft(t.align, c, this.right - d);
            else { const e = this.columnSizes.reduce(((t, e) => Math.max(t, e.height)), 0);
                h = l + ft(t.align, this.top, this.bottom - e - t.labels.padding - this._computeTitleHeight()) } const u = ft(a, c, c + d);
            o.textAlign = n.textAlign(ut(a)), o.textBaseline = "middle", o.strokeStyle = e.color, o.fillStyle = e.color, o.font = i.string, Ve(o, e.text, u, h, i) }
        _computeTitleHeight() { const t = this.options.title,
                e = wi(t.font),
                i = Mi(t.padding); return t.display ? e.lineHeight + i.height : 0 }
        _getLegendItemAt(t, e) { let i, s, n; if (tt(t, this.left, this.right) && tt(e, this.top, this.bottom))
                for (n = this.legendHitBoxes, i = 0; i < n.length; ++i)
                    if (s = n[i], tt(t, s.left, s.left + s.width) && tt(e, s.top, s.top + s.height)) return this.legendItems[i];
            return null }
        handleEvent(t) { const e = this.options; if (! function(t, e) { if (("mousemove" === t || "mouseout" === t) && (e.onHover || e.onLeave)) return !0; if (e.onClick && ("click" === t || "mouseup" === t)) return !0; return !1 }(t.type, e)) return; const i = this._getLegendItemAt(t.x, t.y); if ("mousemove" === t.type || "mouseout" === t.type) { const o = this._hoveredItem,
                    a = (n = i, null !== (s = o) && null !== n && s.datasetIndex === n.datasetIndex && s.index === n.index);
                o && !a && d(e.onLeave, [t, o, this], this), this._hoveredItem = i, i && !a && d(e.onHover, [t, i, this], this) } else i && d(e.onClick, [t, i, this], this); var s, n } }

    function da(t, e) { return e * (t.text ? t.text.length + .5 : 0) } var ua = { id: "legend", _element: ca, start(t, e, i) { const s = t.legend = new ca({ ctx: t.ctx, options: i, chart: t });
            ns.configure(t, s, i), ns.addBox(t, s) }, stop(t) { ns.removeBox(t, t.legend), delete t.legend }, beforeUpdate(t, e, i) { const s = t.legend;
            ns.configure(t, s, i), s.options = i }, afterUpdate(t) { const e = t.legend;
            e.buildLabels(), e.adjustHitBoxes() }, afterEvent(t, e) { e.replay || t.legend.handleEvent(e.event) }, defaults: { display: !0, position: "top", align: "center", fullSize: !0, reverse: !1, weight: 1e3, onClick(t, e, i) { const s = e.datasetIndex,
                    n = i.chart;
                n.isDatasetVisible(s) ? (n.hide(s), e.hidden = !0) : (n.show(s), e.hidden = !1) }, onHover: null, onLeave: null, labels: { color: t => t.chart.options.color, boxWidth: 40, padding: 10, generateLabels(t) { const e = t.data.datasets,
                        { labels: { usePointStyle: i, pointStyle: s, textAlign: n, color: o, useBorderRadius: a, borderRadius: r } } = t.legend.options; return t._getSortedDatasetMetas().map((t => { const l = t.controller.getStyle(i ? 0 : void 0),
                            h = Mi(l.borderWidth); return { text: e[t.index].label, fillStyle: l.backgroundColor, fontColor: o, hidden: !t.visible, lineCap: l.borderCapStyle, lineDash: l.borderDash, lineDashOffset: l.borderDashOffset, lineJoin: l.borderJoinStyle, lineWidth: (h.width + h.height) / 4, strokeStyle: l.borderColor, pointStyle: s || l.pointStyle, rotation: l.rotation, textAlign: n || l.textAlign, borderRadius: a && (r || l.borderRadius), datasetIndex: t.index } }), this) } }, title: { color: t => t.chart.options.color, display: !1, position: "center", text: "" } }, descriptors: { _scriptable: t => !t.startsWith("on"), labels: { _scriptable: t => !["generateLabels", "filter", "sort"].includes(t) } } };
    class fa extends Bs { constructor(t) { super(), this.chart = t.chart, this.options = t.options, this.ctx = t.ctx, this._padding = void 0, this.top = void 0, this.bottom = void 0, this.left = void 0, this.right = void 0, this.width = void 0, this.height = void 0, this.position = void 0, this.weight = void 0, this.fullSize = void 0 }
        update(t, e) { const i = this.options; if (this.left = 0, this.top = 0, !i.display) return void(this.width = this.height = this.right = this.bottom = 0);
            this.width = this.right = t, this.height = this.bottom = e; const s = n(i.text) ? i.text.length : 1;
            this._padding = Mi(i.padding); const o = s * wi(i.font).lineHeight + this._padding.height;
            this.isHorizontal() ? this.height = o : this.width = o }
        isHorizontal() { const t = this.options.position; return "top" === t || "bottom" === t }
        _drawArgs(t) { const { top: e, left: i, bottom: s, right: n, options: o } = this, a = o.align; let r, l, h, c = 0; return this.isHorizontal() ? (l = ft(a, i, n), h = e + t, r = n - i) : ("left" === o.position ? (l = i + t, h = ft(a, s, e), c = -.5 * C) : (l = n - t, h = ft(a, e, s), c = .5 * C), r = s - e), { titleX: l, titleY: h, maxWidth: r, rotation: c } }
        draw() { const t = this.ctx,
                e = this.options; if (!e.display) return; const i = wi(e.font),
                s = i.lineHeight / 2 + this._padding.top,
                { titleX: n, titleY: o, maxWidth: a, rotation: r } = this._drawArgs(s);
            Ve(t, e.text, 0, 0, i, { color: e.color, maxWidth: a, rotation: r, textAlign: ut(e.align), textBaseline: "middle", translation: [n, o] }) } } var ga = { id: "title", _element: fa, start(t, e, i) {! function(t, e) { const i = new fa({ ctx: t.ctx, options: e, chart: t });
                ns.configure(t, i, e), ns.addBox(t, i), t.titleBlock = i }(t, i) }, stop(t) { const e = t.titleBlock;
            ns.removeBox(t, e), delete t.titleBlock }, beforeUpdate(t, e, i) { const s = t.titleBlock;
            ns.configure(t, s, i), s.options = i }, defaults: { align: "center", display: !1, font: { weight: "bold" }, fullSize: !0, padding: 10, position: "top", text: "", weight: 2e3 }, defaultRoutes: { color: "color" }, descriptors: { _scriptable: !0, _indexable: !1 } }; const pa = new WeakMap; var ma = { id: "subtitle", start(t, e, i) { const s = new fa({ ctx: t.ctx, options: i, chart: t });
            ns.configure(t, s, i), ns.addBox(t, s), pa.set(t, s) }, stop(t) { ns.removeBox(t, pa.get(t)), pa.delete(t) }, beforeUpdate(t, e, i) { const s = pa.get(t);
            ns.configure(t, s, i), s.options = i }, defaults: { align: "center", display: !1, font: { weight: "normal" }, fullSize: !0, padding: 0, position: "top", text: "", weight: 1500 }, defaultRoutes: { color: "color" }, descriptors: { _scriptable: !0, _indexable: !1 } }; const ba = { average(t) { if (!t.length) return !1; let e, i, s = 0,
                n = 0,
                o = 0; for (e = 0, i = t.length; e < i; ++e) { const i = t[e].element; if (i && i.hasValue()) { const t = i.tooltipPosition();
                    s += t.x, n += t.y, ++o } } return { x: s / o, y: n / o } }, nearest(t, e) { if (!t.length) return !1; let i, s, n, o = e.x,
                a = e.y,
                r = Number.POSITIVE_INFINITY; for (i = 0, s = t.length; i < s; ++i) { const s = t[i].element; if (s && s.hasValue()) { const t = q(e, s.getCenterPoint());
                    t < r && (r = t, n = s) } } if (n) { const t = n.tooltipPosition();
                o = t.x, a = t.y } return { x: o, y: a } } };

    function xa(t, e) { return e && (n(e) ? Array.prototype.push.apply(t, e) : t.push(e)), t }

    function _a(t) { return ("string" == typeof t || t instanceof String) && t.indexOf("\n") > -1 ? t.split("\n") : t }

    function ya(t, e) { const { element: i, datasetIndex: s, index: n } = e, o = t.getDatasetMeta(s).controller, { label: a, value: r } = o.getLabelAndValue(n); return { chart: t, label: a, parsed: o.getParsed(n), raw: t.data.datasets[s].data[n], formattedValue: r, dataset: o.getDataset(), dataIndex: n, datasetIndex: s, element: i } }

    function va(t, e) { const i = t.chart.ctx,
            { body: s, footer: n, title: o } = t,
            { boxWidth: a, boxHeight: r } = e,
            l = wi(e.bodyFont),
            h = wi(e.titleFont),
            c = wi(e.footerFont),
            d = o.length,
            f = n.length,
            g = s.length,
            p = Mi(e.padding); let m = p.height,
            b = 0,
            x = s.reduce(((t, e) => t + e.before.length + e.lines.length + e.after.length), 0); if (x += t.beforeBody.length + t.afterBody.length, d && (m += d * h.lineHeight + (d - 1) * e.titleSpacing + e.titleMarginBottom), x) { m += g * (e.displayColors ? Math.max(r, l.lineHeight) : l.lineHeight) + (x - g) * l.lineHeight + (x - 1) * e.bodySpacing }
        f && (m += e.footerMarginTop + f * c.lineHeight + (f - 1) * e.footerSpacing); let _ = 0; const y = function(t) { b = Math.max(b, i.measureText(t).width + _) }; return i.save(), i.font = h.string, u(t.title, y), i.font = l.string, u(t.beforeBody.concat(t.afterBody), y), _ = e.displayColors ? a + 2 + e.boxPadding : 0, u(s, (t => { u(t.before, y), u(t.lines, y), u(t.after, y) })), _ = 0, i.font = c.string, u(t.footer, y), i.restore(), b += p.width, { width: b, height: m } }

    function Ma(t, e, i, s) { const { x: n, width: o } = i, { width: a, chartArea: { left: r, right: l } } = t; let h = "center"; return "center" === s ? h = n <= (r + l) / 2 ? "left" : "right" : n <= o / 2 ? h = "left" : n >= a - o / 2 && (h = "right"),
            function(t, e, i, s) { const { x: n, width: o } = s, a = i.caretSize + i.caretPadding; return "left" === t && n + o + a > e.width || "right" === t && n - o - a < 0 || void 0 }(h, t, e, i) && (h = "center"), h }

    function wa(t, e, i) { const s = i.yAlign || e.yAlign || function(t, e) { const { y: i, height: s } = e; return i < s / 2 ? "top" : i > t.height - s / 2 ? "bottom" : "center" }(t, i); return { xAlign: i.xAlign || e.xAlign || Ma(t, e, i, s), yAlign: s } }

    function ka(t, e, i, s) { const { caretSize: n, caretPadding: o, cornerRadius: a } = t, { xAlign: r, yAlign: l } = i, h = n + o, { topLeft: c, topRight: d, bottomLeft: u, bottomRight: f } = vi(a); let g = function(t, e) { let { x: i, width: s } = t; return "right" === e ? i -= s : "center" === e && (i -= s / 2), i }(e, r); const p = function(t, e, i) { let { y: s, height: n } = t; return "top" === e ? s += i : s -= "bottom" === e ? n + i : n / 2, s }(e, l, h); return "center" === l ? "left" === r ? g += h : "right" === r && (g -= h) : "left" === r ? g -= Math.max(c, u) + n : "right" === r && (g += Math.max(d, f) + n), { x: J(g, 0, s.width - e.width), y: J(p, 0, s.height - e.height) } }

    function Sa(t, e, i) { const s = Mi(i.padding); return "center" === e ? t.x + t.width / 2 : "right" === e ? t.x + t.width - s.right : t.x + s.left }

    function Pa(t) { return xa([], _a(t)) }

    function Da(t, e) { const i = e && e.dataset && e.dataset.tooltip && e.dataset.tooltip.callbacks; return i ? t.override(i) : t } const Ca = { beforeTitle: e, title(t) { if (t.length > 0) { const e = t[0],
                    i = e.chart.data.labels,
                    s = i ? i.length : 0; if (this && this.options && "dataset" === this.options.mode) return e.dataset.label || ""; if (e.label) return e.label; if (s > 0 && e.dataIndex < s) return i[e.dataIndex] } return "" }, afterTitle: e, beforeBody: e, beforeLabel: e, label(t) { if (this && this.options && "dataset" === this.options.mode) return t.label + ": " + t.formattedValue || t.formattedValue; let e = t.dataset.label || "";
            e && (e += ": "); const i = t.formattedValue; return s(i) || (e += i), e }, labelColor(t) { const e = t.chart.getDatasetMeta(t.datasetIndex).controller.getStyle(t.dataIndex); return { borderColor: e.borderColor, backgroundColor: e.backgroundColor, borderWidth: e.borderWidth, borderDash: e.borderDash, borderDashOffset: e.borderDashOffset, borderRadius: 0 } }, labelTextColor() { return this.options.bodyColor }, labelPointStyle(t) { const e = t.chart.getDatasetMeta(t.datasetIndex).controller.getStyle(t.dataIndex); return { pointStyle: e.pointStyle, rotation: e.rotation } }, afterLabel: e, afterBody: e, beforeFooter: e, footer: e, afterFooter: e };

    function Oa(t, e, i, s) { const n = t[e].call(i, s); return void 0 === n ? Ca[e].call(i, s) : n }
    class Aa extends Bs { static positioners = ba;
        constructor(t) { super(), this.opacity = 0, this._active = [], this._eventPosition = void 0, this._size = void 0, this._cachedAnimations = void 0, this._tooltipItems = [], this.$animations = void 0, this.$context = void 0, this.chart = t.chart, this.options = t.options, this.dataPoints = void 0, this.title = void 0, this.beforeBody = void 0, this.body = void 0, this.afterBody = void 0, this.footer = void 0, this.xAlign = void 0, this.yAlign = void 0, this.x = void 0, this.y = void 0, this.height = void 0, this.width = void 0, this.caretX = void 0, this.caretY = void 0, this.labelColors = void 0, this.labelPointStyles = void 0, this.labelTextColors = void 0 }
        initialize(t) { this.options = t, this._cachedAnimations = void 0, this.$context = void 0 }
        _resolveAnimations() { const t = this._cachedAnimations; if (t) return t; const e = this.chart,
                i = this.options.setContext(this.getContext()),
                s = i.enabled && e.options.animation && i.animations,
                n = new Ps(this.chart, s); return s._cacheable && (this._cachedAnimations = Object.freeze(n)), n }
        getContext() { return this.$context || (this.$context = (t = this.chart.getContext(), e = this, i = this._tooltipItems, Pi(t, { tooltip: e, tooltipItems: i, type: "tooltip" }))); var t, e, i }
        getTitle(t, e) { const { callbacks: i } = e, s = Oa(i, "beforeTitle", this, t), n = Oa(i, "title", this, t), o = Oa(i, "afterTitle", this, t); let a = []; return a = xa(a, _a(s)), a = xa(a, _a(n)), a = xa(a, _a(o)), a }
        getBeforeBody(t, e) { return Pa(Oa(e.callbacks, "beforeBody", this, t)) }
        getBody(t, e) { const { callbacks: i } = e, s = []; return u(t, (t => { const e = { before: [], lines: [], after: [] },
                    n = Da(i, t);
                xa(e.before, _a(Oa(n, "beforeLabel", this, t))), xa(e.lines, Oa(n, "label", this, t)), xa(e.after, _a(Oa(n, "afterLabel", this, t))), s.push(e) })), s }
        getAfterBody(t, e) { return Pa(Oa(e.callbacks, "afterBody", this, t)) }
        getFooter(t, e) { const { callbacks: i } = e, s = Oa(i, "beforeFooter", this, t), n = Oa(i, "footer", this, t), o = Oa(i, "afterFooter", this, t); let a = []; return a = xa(a, _a(s)), a = xa(a, _a(n)), a = xa(a, _a(o)), a }
        _createItems(t) { const e = this._active,
                i = this.chart.data,
                s = [],
                n = [],
                o = []; let a, r, l = []; for (a = 0, r = e.length; a < r; ++a) l.push(ya(this.chart, e[a])); return t.filter && (l = l.filter(((e, s, n) => t.filter(e, s, n, i)))), t.itemSort && (l = l.sort(((e, s) => t.itemSort(e, s, i)))), u(l, (e => { const i = Da(t.callbacks, e);
                s.push(Oa(i, "labelColor", this, e)), n.push(Oa(i, "labelPointStyle", this, e)), o.push(Oa(i, "labelTextColor", this, e)) })), this.labelColors = s, this.labelPointStyles = n, this.labelTextColors = o, this.dataPoints = l, l }
        update(t, e) { const i = this.options.setContext(this.getContext()),
                s = this._active; let n, o = []; if (s.length) { const t = ba[i.position].call(this, s, this._eventPosition);
                o = this._createItems(i), this.title = this.getTitle(o, i), this.beforeBody = this.getBeforeBody(o, i), this.body = this.getBody(o, i), this.afterBody = this.getAfterBody(o, i), this.footer = this.getFooter(o, i); const e = this._size = va(this, i),
                    a = Object.assign({}, t, e),
                    r = wa(this.chart, i, a),
                    l = ka(i, a, r, this.chart);
                this.xAlign = r.xAlign, this.yAlign = r.yAlign, n = { opacity: 1, x: l.x, y: l.y, width: e.width, height: e.height, caretX: t.x, caretY: t.y } } else 0 !== this.opacity && (n = { opacity: 0 });
            this._tooltipItems = o, this.$context = void 0, n && this._resolveAnimations().update(this, n), t && i.external && i.external.call(this, { chart: this.chart, tooltip: this, replay: e }) }
        drawCaret(t, e, i, s) { const n = this.getCaretPosition(t, i, s);
            e.lineTo(n.x1, n.y1), e.lineTo(n.x2, n.y2), e.lineTo(n.x3, n.y3) }
        getCaretPosition(t, e, i) { const { xAlign: s, yAlign: n } = this, { caretSize: o, cornerRadius: a } = i, { topLeft: r, topRight: l, bottomLeft: h, bottomRight: c } = vi(a), { x: d, y: u } = t, { width: f, height: g } = e; let p, m, b, x, _, y; return "center" === n ? (_ = u + g / 2, "left" === s ? (p = d, m = p - o, x = _ + o, y = _ - o) : (p = d + f, m = p + o, x = _ - o, y = _ + o), b = p) : (m = "left" === s ? d + Math.max(r, h) + o : "right" === s ? d + f - Math.max(l, c) - o : this.caretX, "top" === n ? (x = u, _ = x - o, p = m - o, b = m + o) : (x = u + g, _ = x + o, p = m + o, b = m - o), y = x), { x1: p, x2: m, x3: b, y1: x, y2: _, y3: y } }
        drawTitle(t, e, i) { const s = this.title,
                n = s.length; let o, a, r; if (n) { const l = Di(i.rtl, this.x, this.width); for (t.x = Sa(this, i.titleAlign, i), e.textAlign = l.textAlign(i.titleAlign), e.textBaseline = "middle", o = wi(i.titleFont), a = i.titleSpacing, e.fillStyle = i.titleColor, e.font = o.string, r = 0; r < n; ++r) e.fillText(s[r], l.x(t.x), t.y + o.lineHeight / 2), t.y += o.lineHeight + a, r + 1 === n && (t.y += i.titleMarginBottom - a) } }
        _drawColorBox(t, e, i, s, n) { const a = this.labelColors[i],
                r = this.labelPointStyles[i],
                { boxHeight: l, boxWidth: h, boxPadding: c } = n,
                d = wi(n.bodyFont),
                u = Sa(this, "left", n),
                f = s.x(u),
                g = l < d.lineHeight ? (d.lineHeight - l) / 2 : 0,
                p = e.y + g; if (n.usePointStyle) { const e = { radius: Math.min(h, l) / 2, pointStyle: r.pointStyle, rotation: r.rotation, borderWidth: 1 },
                    i = s.leftForLtr(f, h) + h / 2,
                    o = p + l / 2;
                t.strokeStyle = n.multiKeyBackground, t.fillStyle = n.multiKeyBackground, Te(t, e, i, o), t.strokeStyle = a.borderColor, t.fillStyle = a.backgroundColor, Te(t, e, i, o) } else { t.lineWidth = o(a.borderWidth) ? Math.max(...Object.values(a.borderWidth)) : a.borderWidth || 1, t.strokeStyle = a.borderColor, t.setLineDash(a.borderDash || []), t.lineDashOffset = a.borderDashOffset || 0; const e = s.leftForLtr(f, h - c),
                    i = s.leftForLtr(s.xPlus(f, 1), h - c - 2),
                    r = vi(a.borderRadius);
                Object.values(r).some((t => 0 !== t)) ? (t.beginPath(), t.fillStyle = n.multiKeyBackground, We(t, { x: e, y: p, w: h, h: l, radius: r }), t.fill(), t.stroke(), t.fillStyle = a.backgroundColor, t.beginPath(), We(t, { x: i, y: p + 1, w: h - 2, h: l - 2, radius: r }), t.fill()) : (t.fillStyle = n.multiKeyBackground, t.fillRect(e, p, h, l), t.strokeRect(e, p, h, l), t.fillStyle = a.backgroundColor, t.fillRect(i, p + 1, h - 2, l - 2)) }
            t.fillStyle = this.labelTextColors[i] }
        drawBody(t, e, i) { const { body: s } = this, { bodySpacing: n, bodyAlign: o, displayColors: a, boxHeight: r, boxWidth: l, boxPadding: h } = i, c = wi(i.bodyFont); let d = c.lineHeight,
                f = 0; const g = Di(i.rtl, this.x, this.width),
                p = function(i) { e.fillText(i, g.x(t.x + f), t.y + d / 2), t.y += d + n },
                m = g.textAlign(o); let b, x, _, y, v, M, w; for (e.textAlign = o, e.textBaseline = "middle", e.font = c.string, t.x = Sa(this, m, i), e.fillStyle = i.bodyColor, u(this.beforeBody, p), f = a && "right" !== m ? "center" === o ? l / 2 + h : l + 2 + h : 0, y = 0, M = s.length; y < M; ++y) { for (b = s[y], x = this.labelTextColors[y], e.fillStyle = x, u(b.before, p), _ = b.lines, a && _.length && (this._drawColorBox(e, t, y, g, i), d = Math.max(c.lineHeight, r)), v = 0, w = _.length; v < w; ++v) p(_[v]), d = c.lineHeight;
                u(b.after, p) }
            f = 0, d = c.lineHeight, u(this.afterBody, p), t.y -= n }
        drawFooter(t, e, i) { const s = this.footer,
                n = s.length; let o, a; if (n) { const r = Di(i.rtl, this.x, this.width); for (t.x = Sa(this, i.footerAlign, i), t.y += i.footerMarginTop, e.textAlign = r.textAlign(i.footerAlign), e.textBaseline = "middle", o = wi(i.footerFont), e.fillStyle = i.footerColor, e.font = o.string, a = 0; a < n; ++a) e.fillText(s[a], r.x(t.x), t.y + o.lineHeight / 2), t.y += o.lineHeight + i.footerSpacing } }
        drawBackground(t, e, i, s) { const { xAlign: n, yAlign: o } = this, { x: a, y: r } = t, { width: l, height: h } = i, { topLeft: c, topRight: d, bottomLeft: u, bottomRight: f } = vi(s.cornerRadius);
            e.fillStyle = s.backgroundColor, e.strokeStyle = s.borderColor, e.lineWidth = s.borderWidth, e.beginPath(), e.moveTo(a + c, r), "top" === o && this.drawCaret(t, e, i, s), e.lineTo(a + l - d, r), e.quadraticCurveTo(a + l, r, a + l, r + d), "center" === o && "right" === n && this.drawCaret(t, e, i, s), e.lineTo(a + l, r + h - f), e.quadraticCurveTo(a + l, r + h, a + l - f, r + h), "bottom" === o && this.drawCaret(t, e, i, s), e.lineTo(a + u, r + h), e.quadraticCurveTo(a, r + h, a, r + h - u), "center" === o && "left" === n && this.drawCaret(t, e, i, s), e.lineTo(a, r + c), e.quadraticCurveTo(a, r, a + c, r), e.closePath(), e.fill(), s.borderWidth > 0 && e.stroke() }
        _updateAnimationTarget(t) { const e = this.chart,
                i = this.$animations,
                s = i && i.x,
                n = i && i.y; if (s || n) { const i = ba[t.position].call(this, this._active, this._eventPosition); if (!i) return; const o = this._size = va(this, t),
                    a = Object.assign({}, i, this._size),
                    r = wa(e, t, a),
                    l = ka(t, a, r, e);
                s._to === l.x && n._to === l.y || (this.xAlign = r.xAlign, this.yAlign = r.yAlign, this.width = o.width, this.height = o.height, this.caretX = i.x, this.caretY = i.y, this._resolveAnimations().update(this, l)) } }
        _willRender() { return !!this.opacity }
        draw(t) { const e = this.options.setContext(this.getContext()); let i = this.opacity; if (!i) return;
            this._updateAnimationTarget(e); const s = { width: this.width, height: this.height },
                n = { x: this.x, y: this.y };
            i = Math.abs(i) < .001 ? 0 : i; const o = Mi(e.padding),
                a = this.title.length || this.beforeBody.length || this.body.length || this.afterBody.length || this.footer.length;
            e.enabled && a && (t.save(), t.globalAlpha = i, this.drawBackground(n, t, s, e), Ci(t, e.textDirection), n.y += o.top, this.drawTitle(n, t, e), this.drawBody(n, t, e), this.drawFooter(n, t, e), Oi(t, e.textDirection), t.restore()) }
        getActiveElements() { return this._active || [] }
        setActiveElements(t, e) { const i = this._active,
                s = t.map((({ datasetIndex: t, index: e }) => { const i = this.chart.getDatasetMeta(t); if (!i) throw new Error("Cannot find a dataset at index " + t); return { datasetIndex: t, element: i.data[e], index: e } })),
                n = !f(i, s),
                o = this._positionChanged(s, e);
            (n || o) && (this._active = s, this._eventPosition = e, this._ignoreReplayEvents = !0, this.update(!0)) }
        handleEvent(t, e, i = !0) { if (e && this._ignoreReplayEvents) return !1;
            this._ignoreReplayEvents = !1; const s = this.options,
                n = this._active || [],
                o = this._getActiveElements(t, n, e, i),
                a = this._positionChanged(o, t),
                r = e || !f(o, n) || a; return r && (this._active = o, (s.enabled || s.external) && (this._eventPosition = { x: t.x, y: t.y }, this.update(!0, e))), r }
        _getActiveElements(t, e, i, s) { const n = this.options; if ("mouseout" === t.type) return []; if (!s) return e; const o = this.chart.getElementsAtEventForMode(t, n.mode, n, i); return n.reverse && o.reverse(), o }
        _positionChanged(t, e) { const { caretX: i, caretY: s, options: n } = this, o = ba[n.position].call(this, t, e); return !1 !== o && (i !== o.x || s !== o.y) } } var Ta = { id: "tooltip", _element: Aa, positioners: ba, afterInit(t, e, i) { i && (t.tooltip = new Aa({ chart: t, options: i })) }, beforeUpdate(t, e, i) { t.tooltip && t.tooltip.initialize(i) }, reset(t, e, i) { t.tooltip && t.tooltip.initialize(i) }, afterDraw(t) { const e = t.tooltip; if (e && e._willRender()) { const i = { tooltip: e }; if (!1 === t.notifyPlugins("beforeTooltipDraw", {...i, cancelable: !0 })) return;
                e.draw(t.ctx), t.notifyPlugins("afterTooltipDraw", i) } }, afterEvent(t, e) { if (t.tooltip) { const i = e.replay;
                t.tooltip.handleEvent(e.event, i, e.inChartArea) && (e.changed = !0) } }, defaults: { enabled: !0, external: null, position: "average", backgroundColor: "rgba(0,0,0,0.8)", titleColor: "#fff", titleFont: { weight: "bold" }, titleSpacing: 2, titleMarginBottom: 6, titleAlign: "left", bodyColor: "#fff", bodySpacing: 2, bodyFont: {}, bodyAlign: "left", footerColor: "#fff", footerSpacing: 2, footerMarginTop: 6, footerFont: { weight: "bold" }, footerAlign: "left", padding: 6, caretPadding: 2, caretSize: 5, cornerRadius: 6, boxHeight: (t, e) => e.bodyFont.size, boxWidth: (t, e) => e.bodyFont.size, multiKeyBackground: "#fff", displayColors: !0, boxPadding: 0, borderColor: "rgba(0,0,0,0)", borderWidth: 0, animation: { duration: 400, easing: "easeOutQuart" }, animations: { numbers: { type: "number", properties: ["x", "y", "width", "height", "caretX", "caretY"] }, opacity: { easing: "linear", duration: 200 } }, callbacks: Ca }, defaultRoutes: { bodyFont: "font", footerFont: "font", titleFont: "font" }, descriptors: { _scriptable: t => "filter" !== t && "itemSort" !== t && "external" !== t, _indexable: !1, callbacks: { _scriptable: !1, _indexable: !1 }, animation: { _fallback: !1 }, animations: { _fallback: "animation" } }, additionalOptionScopes: ["interaction"] }; return Mn.register(Fn, Io, no, t), Mn.helpers = {...Vi }, Mn._adapters = Pn, Mn.Animation = Ss, Mn.Animations = Ps, Mn.animator = xt, Mn.controllers = Zs.controllers.items, Mn.DatasetController = Vs, Mn.Element = Bs, Mn.elements = no, Mn.Interaction = Yi, Mn.layouts = ns, Mn.platforms = Ms, Mn.Scale = qs, Mn.Ticks = ae, Object.assign(Mn, Fn, Io, no, t, Ms), Mn.Chart = Mn, "undefined" != typeof window && (window.Chart = Mn), Mn }));
//# sourceMappingURL=chart.umd.js.map