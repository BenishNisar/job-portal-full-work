$(document).ready(function() {
    $("a[data-toggle=modal]").on("click", function() {
        var a = $(this).attr("data-target");
        $("body").css("overflow", "hidden"),
        $(a).addClass("active"),
        $("#overlay-" + a.replace("#", "")).addClass("active");
        var t = $(a + " img.lazy-map")
          , o = $(a + " .lazy-brands img");
        setTimeout(function() {
            t.each(function() {
                src = $(this).attr("data-src"),
                $(this).attr("src", src)
            }),
            o.each(function() {
                src = $(this).attr("data-src"),
                $(this).attr("src", src)
            })
        }, 100)
    }),
    $("a.close").on("click", function() {
        var a = $(this).parent().parent().attr("id");
        $("body").removeAttr("style"),
        $("#" + a).removeClass("active")
    }),
    $("a.overlay-modal").on("click", function() {
        $("body").removeAttr("style"),
        $(".modal-container").removeClass("active"),
        $(".overlay-modal").removeClass("active")
    }),
    $(".modal-container").on("click", function(a) {
        a.stopPropagation();
        var t = $(this).attr("id");
        $("body").removeAttr("style"),
        $("#" + t).removeClass("active")
    }),
    $(".modal-container").on("click", "*", function(a) {
        a.stopPropagation()
    });
    var a = window.location.hash;
    if (a) {
        var t = $(a)
          , o = $("#overlay-" + a.replace("#", ""));
        if (t.length && t.hasClass("modal-container") && o.length) {
            $("body").css("overflow", "hidden"),
            t.addClass("active"),
            o.addClass("active");
            var r = t.find("img.lazy-map")
              , e = t.find(".lazy-brands img");
            setTimeout(function() {
                r.each(function() {
                    var a = $(this).attr("data-src");
                    $(this).attr("src", a)
                }),
                e.each(function() {
                    var a = $(this).attr("data-src");
                    $(this).attr("src", a)
                })
            }, 100)
        }
    }
});
