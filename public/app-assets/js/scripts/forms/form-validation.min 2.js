$(function () {
    "use strict";
    var e = $(".needs-validation"),
        i = $("#jquery-val-form"),
        a = $(".picker");
    $(".select2").each(function () {
        var e = $(this);
        e.wrap('<div class="position-relative"></div>'),
            e
                .select2({
                    placeholder: "Select value",
                    dropdownParent: e.parent(),
                })
                .change(function () {
                    $(this).valid();
                });
    }),
        a.length &&
            a.flatpickr({
                allowInput: !0,
                onReady: function (e, i, a) {
                    a.isMobile && $(a.mobileInput).attr("step", null);
                },
            }),
        e.length &&
            Array.prototype.filter.call(e, function (e) {
                e.addEventListener("submit", function (i) {
                    !1 === e.checkValidity() && e.classList.add("invalid"),
                        e.classList.add("was-validated"),
                        i.preventDefault();
                });
            }),
        i.length &&
            i.validate({
                rules: {
                    "basic-default-name": { required: !0 },
                    "basic-default-email": { required: !0, email: !0 },
                    "basic-default-password": { required: !0 },
                    "confirm-password": {
                        required: !0,
                        equalTo: "#basic-default-password",
                    },
                    "select-country": { required: !0 },
                    dob: { required: !0 },
                    customFile: { required: !0 },
                    validationRadiojq: { required: !0 },
                    validationBiojq: { required: !0 },
                    validationCheck: { required: !0 },
                },
            });
});
