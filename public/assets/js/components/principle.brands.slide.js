$(document).ready(function() {
    var e = $("#health-logos .brand-slider");
    e.owlCarousel({
        loop: !0,
        margin: 0,
        nav: !1,
        items: 5,
        slideBy: 1,
        lazyLoad: !0,
        lazyLoadEager: 0,
        dots: !1,
        autoWidth: !1,
        onInitialized: function() {
            $(".owl-dots > button").each(function(e) {
                $(this).attr("aria-label", e + 1)
            })
        },
        responsive: {
            0: {
                items: 3,
                center: !0,
                autoWidth: !0
            },
            576: {
                items: 4,
                center: !1
            },
            768: {
                items: 4,
                center: !1
            },
            992: {
                items: 5,
                center: !0
            },
            1200: {
                items: 4,
                center: !1
            },
            1400: {
                items: 5,
                center: !1
            }
        }
    }),
    $("#health-logos .arrow.next").click(function() {
        e.trigger("next.owl.carousel")
    }),
    $("#health-logos .arrow.prev").click(function() {
        e.trigger("prev.owl.carousel")
    })
});
