$(document).ready(function() {
    $(".accordion-item .accordion-toogle").on("click", function() {
        var s = $(this).attr("data-classes");
        $(this).parent().hasClass("active") ? ($(this).parent().removeClass("active"),
        $(this).parent().removeClass(s),
        $(this).parent().siblings().removeClass("active")) : ($(this).parent().siblings().removeClass("active"),
        $(this).parent().siblings().removeClass(s),
        $(this).parent().addClass("active"),
        $(this).parent().addClass(s))
    })
});
