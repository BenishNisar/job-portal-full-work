$(document).ready(function() {
    $("a[data-toggle=toogle]").on("click", function() {
        var a = $(this).attr("data-target")
          , t = "true" == $(this).attr("data-scroll-inactive")
          , c = $(this);
        $("".concat(a)).hasClass("active") ? $("".concat(a)).removeClass("active") : $("".concat(a)).addClass("active"),
        $(c).hasClass("active") ? $(c).removeClass("active") : $(c).addClass("active"),
        t || $("html, body").animate({
            scrollTop: $(document).height()
        }, 1e3)
    })
});
