/*=========================================================================================
    File Name: form-repeater.js
    Description: form repeater page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    "use strict";

    // form repeater jquery
    $(".invoice-repeater, .repeater-default").repeater({
        show: function () {
            $(this).slideDown();
            // Feather Icons
            if (feather) {
                feather.replace({ width: 14, height: 14 });
            }
        },
        hide: function (deleteElement) {
            Swal.fire({
                title: "Anda Yakin Ingin Menghapus Baris ini?",
                text: "Data Yang Sudah Di Input Akan Hilang ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Tidak, Batalkan!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).slideUp(deleteElement);
                }
            });
            //   if (confirm('Are you sure you want to delete this element?')) {
            //     $(this).slideUp(deleteElement);
            //   }
        },
    });
});
