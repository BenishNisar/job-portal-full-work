( () => {
    function t(t) {
        return function(t) {
            if (Array.isArray(t))
                return e(t)
        }(t) || function(t) {
            if ("undefined" != typeof Symbol && null != t[Symbol.iterator] || null != t["@@iterator"])
                return Array.from(t)
        }(t) || function(t, r) {
            if (t) {
                if ("string" == typeof t)
                    return e(t, r);
                var n = {}.toString.call(t).slice(8, -1);
                return "Object" === n && t.constructor && (n = t.constructor.name),
                "Map" === n || "Set" === n ? Array.from(t) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? e(t, r) : void 0
            }
        }(t) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }
    function e(t, e) {
        (null == e || e > t.length) && (e = t.length);
        for (var r = 0, n = Array(e); r < e; r++)
            n[r] = t[r];
        return n
    }
    window.addEventListener("load", function() {
        setTimeout(function() {
            document.querySelectorAll('script[type="text/plain"][data-src]').forEach(function(e) {
                var r = document.createElement("script");
                r.src = e.getAttribute("data-src"),
                r.async = !0,
                t(e.attributes).forEach(function(t) {
                    "type" !== t.name && "data-src" !== t.name && r.setAttribute(t.name, t.value)
                }),
                document.head.appendChild(r)
            }),
            document.querySelectorAll('script[type="text/plain"][data-inline]').forEach(function(t) {
                var e = document.createElement("script");
                e.text = t.textContent,
                document.body.appendChild(e)
            })
        }, 1500)
    })
}
)();
