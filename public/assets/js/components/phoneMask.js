window.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        $("input[type=tel]").keydown(function(e) {
            var n = e.which || e.charCode || e.keyCode || 0;
            return $phone = $(this),
            0 !== $phone.val().length || 8 !== n && 46 !== n ? 1 !== $phone.val().length || 8 !== n && 46 !== n ? 1 === $phone.val().length && "(" !== $phone.val() ? ($phone.val("(" + String.fromCharCode(e.keyCode)),
            !1) : (8 !== n && 9 !== n && (4 === $phone.val().length && $phone.val($phone.val() + ")"),
            5 === $phone.val().length && $phone.val($phone.val() + " "),
            9 === $phone.val().length && $phone.val($phone.val() + "-")),
            8 == n || 9 == n || 46 == n || n >= 48 && n <= 57 || n >= 96 && n <= 105) : ($phone.val(""),
            !1) : ($phone.val("("),
            !1)
        }).blur(function() {
            $phone = $(this),
            "(" === $phone.val() && $phone.val("")
        }).attr("maxlength", "14").mask("(000) 000-0000"),
        $("input[name*=phone]").keydown(function(e) {
            var n = e.which || e.charCode || e.keyCode || 0;
            return $phone = $(this),
            0 !== $phone.val().length || 8 !== n && 46 !== n ? 1 !== $phone.val().length || 8 !== n && 46 !== n ? 1 === $phone.val().length && "(" !== $phone.val() ? ($phone.val("(" + String.fromCharCode(e.keyCode)),
            !1) : (8 !== n && 9 !== n && (4 === $phone.val().length && $phone.val($phone.val() + ")"),
            5 === $phone.val().length && $phone.val($phone.val() + " "),
            9 === $phone.val().length && $phone.val($phone.val() + "-")),
            8 == n || 9 == n || 46 == n || n >= 48 && n <= 57 || n >= 96 && n <= 105) : ($phone.val(""),
            !1) : ($phone.val("("),
            !1)
        }).blur(function() {
            $phone = $(this),
            "(" === $phone.val() && $phone.val("")
        }).attr("maxlength", "14").attr("type", "tel").mask("(000) 000-0000"),
        $("input[name*=fax]").keydown(function(e) {
            var n = e.which || e.charCode || e.keyCode || 0;
            return $phone = $(this),
            0 !== $phone.val().length || 8 !== n && 46 !== n ? 1 !== $phone.val().length || 8 !== n && 46 !== n ? 1 === $phone.val().length && "(" !== $phone.val() ? ($phone.val("(" + String.fromCharCode(e.keyCode)),
            !1) : (8 !== n && 9 !== n && (4 === $phone.val().length && $phone.val($phone.val() + ")"),
            5 === $phone.val().length && $phone.val($phone.val() + " "),
            9 === $phone.val().length && $phone.val($phone.val() + "-")),
            8 == n || 9 == n || 46 == n || n >= 48 && n <= 57 || n >= 96 && n <= 105) : ($phone.val(""),
            !1) : ($phone.val("("),
            !1)
        }).blur(function() {
            $phone = $(this),
            "(" === $phone.val() && $phone.val("")
        }).attr("maxlength", "14").attr("type", "tel").mask("(000) 000-0000"),
        $(".hs-input[name*=phone]").keydown(function(e) {
            var n = e.which || e.charCode || e.keyCode || 0;
            return $phone = $(this),
            0 !== $phone.val().length || 8 !== n && 46 !== n ? 1 !== $phone.val().length || 8 !== n && 46 !== n ? 1 === $phone.val().length && "(" !== $phone.val() ? ($phone.val("(" + String.fromCharCode(e.keyCode)),
            !1) : (8 !== n && 9 !== n && (4 === $phone.val().length && $phone.val($phone.val() + ")"),
            5 === $phone.val().length && $phone.val($phone.val() + ""),
            8 === $phone.val().length && $phone.val($phone.val() + "-")),
            8 == n || 9 == n || 46 == n || n >= 48 && n <= 57 || n >= 96 && n <= 105) : ($phone.val(""),
            !1) : ($phone.val("("),
            !1)
        }).blur(function() {
            $phone = $(this),
            "(" === $phone.val() && $phone.val("")
        }).attr("maxlength", "13").mask("(000)000-0000")
    }, 500)
});
