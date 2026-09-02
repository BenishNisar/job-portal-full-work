(() => {
    function e(e, a) {
        var n =
            ("undefined" != typeof Symbol && e[Symbol.iterator]) ||
            e["@@iterator"];
        if (!n) {
            if (
                Array.isArray(e) ||
                (n = (function (e, a) {
                    if (e) {
                        if ("string" == typeof e) return t(e, a);
                        var n = {}.toString.call(e).slice(8, -1);
                        return (
                            "Object" === n &&
                                e.constructor &&
                                (n = e.constructor.name),
                            "Map" === n || "Set" === n
                                ? Array.from(e)
                                : "Arguments" === n ||
                                  /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(
                                      n
                                  )
                                ? t(e, a)
                                : void 0
                        );
                    }
                })(e)) ||
                (a && e && "number" == typeof e.length)
            ) {
                n && (e = n);
                var o = 0,
                    r = function () {};
                return {
                    s: r,
                    n: function () {
                        return o >= e.length
                            ? {
                                  done: !0,
                              }
                            : {
                                  done: !1,
                                  value: e[o++],
                              };
                    },
                    e: function (e) {
                        throw e;
                    },
                    f: r,
                };
            }
            throw new TypeError(
                "Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
            );
        }
        var i,
            s = !0,
            l = !1;
        return {
            s: function () {
                n = n.call(e);
            },
            n: function () {
                var e = n.next();
                return (s = e.done), e;
            },
            e: function (e) {
                (l = !0), (i = e);
            },
            f: function () {
                try {
                    s || null == n.return || n.return();
                } finally {
                    if (l) throw i;
                }
            },
        };
    }
    function t(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var a = 0, n = Array(t); a < t; a++) n[a] = e[a];
        return n;
    }
    $(document).ready(function () {
        var t = !1,
            a = '<option value="" disabled selected>Select a state</option>';
        $.each(statesMap, function (e, t) {
            a += '<option value="'
                .concat(t.iso_code, '">')
                .concat(t.name, "</option>");
        }),
            $("#states-map").html(a),
            $("#states-map").val(""),
            $("a[data-target='#modal-map']").on("click", function () {
                function a() {
                    var e = [["State", "Name"]];
                    statesMap.map(function (t) {
                        e.push([t.iso_code, t.name]);
                    });
                    var a = google.visualization.arrayToDataTable(e);
                    $("#modal-map").hasClass("active") && (t = !0),
                        $("#modal-map").addClass("active");
                    var o = {
                        region: "US",
                        displayMode: "regions",
                        resolution: "provinces",
                        backgroundColor: "#FFF",
                        datalessRegionColor: "#EADCF2",
                        defaultColor: "#7a958f",
                        enableRegionInteractivity: $(window).width() > 575,
                        width: $("#regions_div").width(),
                        height: $("#regions_div").height(),
                    };
                    t || $("#modal-map").removeClass("active"), (t = !1);
                    var r = new google.visualization.GeoChart(
                        document.getElementById("regions_div")
                    );
                    r.draw(a, o),
                        google.visualization.events.addListener(
                            r,
                            "regionClick",
                            function (e) {
                                var t = e.region.replace("US-", "");
                                n(t), $("#states-map").val(t);
                            }
                        );
                }
                function n(t) {
                    var a,
                        n = [],
                        o = "",
                        r = e(statesMap);
                    try {
                        for (r.s(); !(a = r.n()).done; ) {
                            var i = a.value;
                            if (t == i.iso_code) {
                                (n = i.regions), (o = i.name);
                                break;
                            }
                        }
                    } catch (e) {
                        r.e(e);
                    } finally {
                        r.f();
                    }
                    if (n.length > 0) {
                        $("#map-container")
                            .removeClass("flex-center")
                            .addClass("flex-between"),
                            $("#regions-content").removeClass("d-none");
                        var s =
                            '<h3 class="color-purple-800 text-md-center text-sm-center text-xs-center">'.concat(
                                o,
                                "</h3>"
                            );
                        n.map(function (e) {
                            s += '<a href="/'
                                .concat(
                                    e.url,
                                    '" class="shadow-bottom-2 rounded d-flex flex-between pl-20 pr-20 pt-10 pb-10 color-purple-600 mb-10">'
                                )
                                .concat(
                                    e.name,
                                    ' <img src="https://public-assets.getRehabrion .com/images/arrow-right-purple.svg"></a>'
                                );
                        }),
                            "VA" === t &&
                                (s +=
                                    '<a href="/washington-dc-physical-therapy" class="shadow-bottom-2 rounded d-flex flex-between pl-20 pr-20 pt-10 pb-10 color-purple-600 mb-10">Washington D.C. Region <img src="https://public-assets.getRehabrion .com/images/arrow-right-purple.svg"></a>'),
                            $("#regions-content").html(s);
                    }
                }
                google.charts.load("current", {
                    packages: ["geochart"],
                    mapsApiKey: mapApiKey,
                }),
                    google.charts.setOnLoadCallback(a),
                    $(window).resize(function () {
                        a();
                    }),
                    $("#states-map").change(function () {
                        n($(this).val());
                    });
            });
    });
})();
