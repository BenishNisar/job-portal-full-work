$(document).ready(function() {
    $("a[data-toggle=scrollspy]").on("click", function() {
        var t = $(this).attr("data-target")
          , a = $(this).attr("data-top")
          , i = 50;
        a && (i = a),
        $("html, body").animate({
            scrollTop: $(t).offset().top - i
        }, 1e3)
    }),
    $(window).on("scroll", function() {
        var t = $(window).scrollTop();
        $("body").find("a[data-hide]").each(function(a, i) {
            var s = $(this).attr("data-hide")
              , o = $(this).attr("data-top-hide");
            $(s).length && s && ($(s).offset().top - t < 80 ? ($(this).addClass("hide"),
            $(this).removeClass("active")) : ($(this).removeClass("hide"),
            $(this).addClass("active")),
            0 != t || 1 != o && "true" != o || ($(this).addClass("hide"),
            $(this).removeClass("active")))
        })
    }),
    $(window).on("scroll", function() {
        var t = $(window).scrollTop();
        $("body").find("a[data-active]").each(function(a, i) {
            var s = $(this).attr("data-active");
            $(s).length && s && ($(s).offset().top - t > 500 ? $(this).removeClass("active") : ($(this).siblings().removeClass("active"),
            $(this).addClass("active")))
        })
    })
});
