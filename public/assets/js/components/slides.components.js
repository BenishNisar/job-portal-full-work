$(document).ready(function () {
    var t = $(".testimonial-slide-divider");
    t.owlCarousel({
        loop: !0,
        margin: 0,
        nav: !1,
        items: 3,
        slideBy: 1,
        lazyLoad: !0,
        lazyLoadEager: 0,
        dots: !1,
        autoWidth: !0,
        center: !0,
        startPosition: 1,
        onInitialized: function () {
            $(".owl-dots > button").each(function (t) {
                $(this).attr("aria-label", t + 1);
            });
        },
        responsive: {
            0: {
                dots: !0,
            },
            576: {
                dots: !1,
            },
        },
    }),
        $("#people-slide .arrow.next").click(function () {
            t.trigger("next.owl.carousel");
        }),
        $("#people-slide .arrow.prev").click(function () {
            t.trigger("prev.owl.carousel");
        }),
        $("#testimonials .testimonial-carousel-1").owlCarousel({
            loop: !0,
            margin: 0,
            nav: !1,
            items: 5,
            slideBy: 1,
            lazyLoad: !0,
            lazyLoadEager: 0,
            dots: !1,
            autoWidth: !0,
            center: !0,
            startPosition: 1,
        }),
        $("#testimonials .testimonial-carousel-2").owlCarousel({
            loop: !0,
            margin: 0,
            nav: !1,
            items: 5,
            slideBy: 1,
            lazyLoad: !0,
            lazyLoadEager: 0,
            dots: !1,
            autoWidth: !0,
            center: !1,
            startPosition: 1,
            smartSpeed: 350,
        }),
        $("#testimonials .testimonial-carousel-3").owlCarousel({
            loop: !0,
            margin: 0,
            nav: !1,
            items: 5,
            slideBy: 1,
            lazyLoad: !0,
            lazyLoadEager: 0,
            dots: !1,
            autoWidth: !0,
            center: !0,
            startPosition: 1,
        }),
        $("#testimonials .arrow.next").click(function () {
            $(".testimonial-carousel-1").trigger("next.owl.carousel"),
                $(".testimonial-carousel-2").trigger("next.owl.carousel"),
                $(".testimonial-carousel-3").trigger("next.owl.carousel");
        }),
        $("#testimonials .arrow.prev").click(function () {
            $(".testimonial-carousel-1").trigger("prev.owl.carousel"),
                $(".testimonial-carousel-2").trigger("prev.owl.carousel"),
                $(".testimonial-carousel-3").trigger("prev.owl.carousel");
        });
    var i = $(".physicians-testimonials");
    i.owlCarousel({
        loop: !1,
        margin: 0,
        nav: !1,
        items: 1,
        slideBy: 1,
        lazyLoad: !0,
        lazyLoadEager: 0,
        dots: !0,
        autoWidth: !1,
        center: !0,
        startPosition: 0,
        autoHeight: !0,
        onInitialized: function () {
            $(".owl-dots > button").each(function (t) {
                $(this).attr("aria-label", t + 1);
            });
        },
    }),
        $("#testimonials-Rehabrion -therapists .arrow.next").click(function () {
            i.trigger("next.owl.carousel");
        }),
        $("#testimonials-Rehabrion -therapists .arrow.prev").click(function () {
            i.trigger("prev.owl.carousel");
        }),
        $("#testimonials-Rehabrion -therapists .arrow.prev").css(
            "visibility",
            "hidden"
        ),
        i.on("changed.owl.carousel", function (t) {
            var i = t.item.index,
                o = t.item.count,
                e = $("#testimonials-Rehabrion -therapists .arrow.prev"),
                a = $("#testimonials-Rehabrion -therapists .arrow.next");
            0 === i
                ? e.css("visibility", "hidden")
                : e.css("visibility", "visible"),
                i === o - 1
                    ? a.css("visibility", "hidden")
                    : a.css("visibility", "visible");
        });
    var o = $("#technology-testimonials .technology-physicians-testimonials");
    o.owlCarousel({
        loop: !1,
        margin: 0,
        nav: !1,
        items: 1,
        slideBy: 1,
        dots: !0,
        autoWidth: !1,
        center: !0,
        startPosition: 0,
        autoHeight: !0,
        onInitialized: function () {
            $(".owl-dots > button").each(function (t) {
                $(this).attr("aria-label", t + 1);
            });
        },
    }),
        $("#technology-testimonials .arrow.next").click(function () {
            o.trigger("next.owl.carousel");
        }),
        $("#technology-testimonials .arrow.prev").click(function () {
            o.trigger("prev.owl.carousel");
        }),
        $("#technology-testimonials .arrow.prev").css("visibility", "hidden"),
        o.on("changed.owl.carousel", function (t) {
            var i = t.item.index,
                o = t.item.count,
                e = $("#technology-testimonials .arrow.prev"),
                a = $("#technology-testimonials .arrow.next");
            0 === i
                ? e.css("visibility", "hidden")
                : e.css("visibility", "visible"),
                i === o - 1
                    ? a.css("visibility", "hidden")
                    : a.css("visibility", "visible");
        });
    var e = $("#expert-vetter .experts-slide");
    "/welcome-3" == window.location.pathname
        ? e.owlCarousel({
              loop: !1,
              margin: 0,
              nav: !1,
              items: 3,
              slideBy: 1,
              lazyLoad: !0,
              lazyLoadEager: 0,
              dots: !1,
              autoWidth: !0,
              center: !1,
              startPosition: 0,
              onInitialized: function () {
                  $(".owl-dots > button").each(function (t) {
                      $(this).attr("aria-label", t + 1);
                  });
              },
              responsive: {
                  0: {
                      dots: !0,
                      items: 3,
                      slideBy: 1,
                      center: !0,
                      startPosition: 0,
                  },
                  576: {
                      dots: !1,
                      items: 3,
                      slideBy: 1,
                      center: !1,
                      startPosition: 0,
                  },
                  768: {
                      dots: !1,
                      items: 3,
                      slideBy: 1,
                      center: !1,
                      startPosition: 1,
                  },
                  992: {
                      dots: !1,
                      items: 3,
                      slideBy: 1,
                      center: !1,
                  },
              },
          })
        : e.owlCarousel({
              loop: !0,
              margin: 0,
              nav: !1,
              items: 3,
              slideBy: 1,
              lazyLoad: !0,
              lazyLoadEager: 0,
              dots: !1,
              autoWidth: !0,
              autoHeight: !0,
              center: !0,
              startPosition: 1,
              onInitialized: function () {
                  $(".owl-dots > button").each(function (t) {
                      $(this).attr("aria-label", t + 1);
                  });
              },
              responsive: {
                  0: {
                      dots: !0,
                      startPosition: 1,
                      items: 1,
                  },
                  576: {
                      dots: !1,
                      startPosition: 1,
                  },
                  768: {
                      startPosition: 1,
                  },
              },
          }),
        $("#expert-vetter .arrow.next").click(function () {
            e.trigger("next.owl.carousel");
        }),
        $("#expert-vetter .arrow.prev").click(function () {
            e.trigger("prev.owl.carousel");
        });
    var a = $("#use-your-insurance .items-insurances");
    a.owlCarousel({
        loop: !0,
        margin: 0,
        nav: !1,
        items: 5,
        slideBy: 1,
        lazyLoad: !0,
        lazyLoadEager: 0,
        dots: !0,
        autoWidth: !0,
        center: !0,
        startPosition: 0,
        onInitialized: function () {
            $(".owl-dots > button").each(function (t) {
                $(this).attr("aria-label", t + 1);
            });
        },
        responsive: {
            0: {
                dots: !0,
                items: 1,
            },
            576: {
                dots: !1,
            },
        },
    }),
        $("#use-your-insurance .arrow.next").click(function () {
            a.trigger("next.owl.carousel");
        }),
        $("#use-your-insurance .arrow.prev").click(function () {
            a.trigger("prev.owl.carousel");
        });
    var s = $("#why-on-demand .why-on-demand-carousel");
    s.owlCarousel({
        loop: !0,
        margin: 0,
        nav: !1,
        items: 5,
        slideBy: 1,
        lazyLoad: !0,
        lazyLoadEager: 0,
        dots: !1,
        autoWidth: !0,
        center: !0,
        startPosition: 1,
        onInitialized: function () {
            $(".owl-dots > button").each(function (t) {
                $(this).attr("aria-label", t + 1);
            });
        },
        responsive: {
            0: {
                dots: !0,
                items: 1,
            },
            576: {
                dots: !1,
            },
        },
    }),
        $("#why-on-demand .arrow.next").click(function () {
            s.trigger("next.owl.carousel");
        }),
        $("#why-on-demand .arrow.prev").click(function () {
            s.trigger("prev.owl.carousel");
        }),
        $(".related-webinars .items-webinars").owlCarousel({
            loop: !0,
            margin: 0,
            nav: !1,
            items: 3,
            slideBy: 1,
            lazyLoad: !0,
            lazyLoadEager: 0,
            dots: !0,
            autoWidth: !0,
            center: !0,
            startPosition: 0,
            onInitialized: function () {
                $(".owl-dots > button").each(function (t) {
                    $(this).attr("aria-label", t + 1);
                });
            },
            responsive: {
                0: {
                    items: 1,
                },
            },
        });
});
