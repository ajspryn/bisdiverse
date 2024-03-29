$(function () {
    "use strict";
    $(".invoice-repeater, .repeater-default").repeater({
        show: function () {
            $(this).slideDown(),
                feather && feather.replace({ width: 14, height: 14 });
        },
        hide: function (e) {
            confirm("Are you sure you want to delete this element?") &&
                $(this).slideUp(e);
        },
    });
});
