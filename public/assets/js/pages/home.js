$(document).ready(function() {
    var e = JSON.parse(sessionStorage.getItem("personSubscribe"));
    jQuery.validator.addMethod("maxLengthZip", function(e, s) {
        return !e || 5 === e.length
    }, "Please enter a valid zip code."),
    $("#check_zip").validate({
        rules: {
            zipCode: {
                maxLengthZip: !0
            }
        },
        errorClass: "font-16 font-weight-300 color-base-100 d-block text-left mt-5 d-block lh-1",
        errorElement: "label",
        highlight: function(e, s, o) {
            $(e.form).find("label[for=" + e.id + "]").addClass("font-16 font-weight-300 color-base-100 d-block text-left mt-5 d-block lh-1")
        },
        unhighlight: function(e, s, o) {
            $(e.form).find("label[for=" + e.id + "]").removeClass("font-16 font-weight-300 color-base-100 d-block text-left mt-5 d-block lh-1")
        }
    }),
    null != sessionStorage.getItem("subscribed") && "false" === sessionStorage.getItem("subscribed") && null != sessionStorage.getItem("personSubscribe") && ($("#subscriber-name").html(e.name),
    null != e && e.title && $("#subcribe-modal-title").html(null == e ? void 0 : e.title),
    null != e && e.message && $("#subcribe-modal-message").html(null == e ? void 0 : e.message),
    $("#modal-subscribe").addClass("active"),
    $("#overlay-modal-subscribe").addClass("active"),
    $("body").css("overflow", "hidden")),
    $("#button-subscribe").on("click", function(s) {
        if (void 0 === sessionStorage.getItem("personSubscribe"))
            return $("#modal-subscribe").removeClass("active"),
            $("#overlay-modal-subscribe").removeClass("active"),
            $("body").removeAttr("overflow"),
            void alert("We can't susbcribe you, try again later");
        $("body").append('\n            <div class="load-container opacity-9 bg-base-100" id="loading">  \n                <div class="lds-ring"><div></div></div>\n            </div>\n        ');
        var o = {
            properties: [{
                property: "email",
                value: e.email
            }, {
                property: blog_id,
                value: "weekly"
            }]
        };
        $.ajax({
            url: "/api/sendappointment",
            type: "post",
            data: o,
            success: function(e) {
                $("#modal-subscribe").removeClass("active"),
                $("#overlay-modal-subscribe").removeClass("active"),
                $("#modal-subscribed").addClass("active"),
                $("#overlay-modal-subscribed").addClass("active"),
                sessionStorage.clear(),
                $("#loading").remove("")
            },
            error: function(e) {
                $("#modal-subscribe").removeClass("active"),
                $("#overlay-modal-subscribe").removeClass("active"),
                alert("We can't susbcribe you, try again later"),
                $("#loading").remove("")
            }
        })
    }),
    $("#modal-subscribe .close").on("click", function(e) {
        sessionStorage.clear()
    }),
    $("#overlay-modal-subscribe").on("click", function(e) {
        sessionStorage.clear()
    })
});





// slider styling here expert
 (function () {
    const track   = document.querySelector('.pt-experts-track');
    const cards   = Array.from(document.querySelectorAll('.pt-expert-card'));
    const prevBtn = document.querySelector('.pt-experts-prev');
    const nextBtn = document.querySelector('.pt-experts-next');

    if (!track || cards.length === 0) return;

    let currentIndex = 0;
    let cardsPerView = 3;

    function getCardsPerView() {
      const w = window.innerWidth;
      if (w < 768) return 1;
      if (w < 992) return 2;
      return 3;
    }

    function updateLayout() {
      cardsPerView = getCardsPerView();

      // set card width according to view
      const widthPercent = 100 / cardsPerView;
      cards.forEach(card => {
        card.style.flex = `0 0 ${widthPercent}%`;
        card.style.maxWidth = `${widthPercent}%`;
      });

      // clamp index
      const maxIndex = Math.max(0, cards.length - cardsPerView);
      if (currentIndex > maxIndex) currentIndex = maxIndex;

      applyTransform();
    }

    function applyTransform() {
      const step = 100 / cardsPerView;
      const offset = currentIndex * step;
      track.style.transform = `translateX(-${offset}%)`;
    }

    prevBtn.addEventListener('click', () => {
      if (currentIndex > 0) {
        currentIndex--;
        applyTransform();
      }
    });

    nextBtn.addEventListener('click', () => {
      const maxIndex = Math.max(0, cards.length - cardsPerView);
      if (currentIndex < maxIndex) {
        currentIndex++;
        applyTransform();
      }
    });

    window.addEventListener('resize', () => {
      updateLayout();
    });

    // initial
    updateLayout();
  })();