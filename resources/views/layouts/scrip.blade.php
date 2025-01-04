 <!-- BEGIN: Vendor JS-->
 <script src="{{ url('/') }}/app-assets/vendors/js/vendors.min.js"></script>
 <!-- BEGIN Vendor JS-->

 <!-- BEGIN: Page Vendor JS-->
 <script src="{{ url('/') }}/app-assets/vendors/js/ui/jquery.sticky.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/editors/quill/katex.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/editors/quill/quill.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/extensions/dragula.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/forms/wizard/bs-stepper.min.js"></script>
 <script src="{{ url('/') }}/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
 <!-- END: Page Vendor JS-->

 <!-- BEGIN: Theme JS-->
 <script src="{{ url('/') }}/app-assets/js/core/app-menu.js"></script>
 <script src="{{ url('/') }}/app-assets/js/core/app.js">
     < /scrip> <
     script src = "{{ url('/') }}/app-assets/js/core/app-menu.min.js" >
 </script>
 <script src="{{ url('/') }}/app-assets/js/core/app.min.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/customizer.min.js"></script>
 <!-- END: Theme JS-->

 <!-- BEGIN: Page JS-->
 <script src="{{ url('/') }}/app-assets/js/scripts/pages/page-knowledge-base.min.js"></script>
 {{-- <script src="{{ url('/') }}/app-assets/js/scripts/forms/form-tooltip-valid.min.js"></script> --}}
 <script src="{{ url('/') }}/app-assets/js/scripts/tables/table-datatables-basic.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/pages/page-account-settings-account.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/pages/page-pricing.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/pages/page-profile.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/pages/app-todo.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/forms/form-validation.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/forms/form-wizard.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/forms/form-repeater.js"></script>
 <script src="{{ url('/') }}/app-assets/js/scripts/pages/app-invoice.min.js"></script>
 <!-- END: Page JS-->

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script>
     $(window).on('load', function() {
         if (feather) {
             feather.replace({
                 width: 14,
                 height: 14
             });
         }
     })
 </script>
 <script>
     function deleteConfirmation() {
         swal({
                 title: "Apakah Anda yakin ingin menghapus data ini?",
                 icon: "warning",
                 buttons: ["Tidak", "Ya"],
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     document.forms[0].submit();
                 } else {
                     return false;
                 }
             });
     }
 </script>

 <script src="{{ asset('/sw.js') }}"></script>
 <script>
     if (!navigator.serviceWorker.controller) {
         navigator.serviceWorker.register("/sw.js").then(function(reg) {
             console.log("Service worker has been registered for scope: " + reg.scope);
         });
     }
 </script>

 @include('layouts.cs')

 <script>
     $(document).ready(function() {
         $('.loading1').show(); // Menampilkan spinner
     });

     $(window).on('load', function() {
         $('.loading1').fadeOut('slow', function() {
             $(this).remove(); // Menghapus spinner setelah konten halaman dimuat
         });
     });
 </script>

 <script>
     document.getElementById('fullScreenBtn').addEventListener('click', function() {
         let elem = document.documentElement;

         if (elem.requestFullscreen) {
             elem.requestFullscreen();
         } else if (elem.mozRequestFullScreen) { // Firefox
             elem.mozRequestFullScreen();
         } else if (elem.webkitRequestFullscreen) { // Chrome, Safari and Opera
             elem.webkitRequestFullscreen();
         } else if (elem.msRequestFullscreen) { // IE/Edge
             elem.msRequestFullscreen();
         }
     });
 </script>

 @livewireScripts
