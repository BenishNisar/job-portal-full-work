$(function() {
    $("a[data-toggle=tab-action]").on("click", function() {
        var a = $(this).attr("data-target")
          , t = $(this).parent().attr("data-containers")
          , s = $(this).attr("data-activeClass")
          , n = $(this).attr("data-defaultClass")
          , e = $(this).attr("data-containerActiveClass");
        $(this).siblings("a").addClass(n).removeClass(s),
        $(this).addClass(s).removeClass(n),
        $("".concat(t, " .tab-container")).removeClass(e).addClass("d-none"),
        $("".concat(t, " ").concat(a)).removeClass("d-none").addClass(e)
    })
});
