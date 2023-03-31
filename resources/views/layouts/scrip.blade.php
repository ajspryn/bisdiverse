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
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ url('/') }}/app-assets/js/core/app-menu.min.js"></script>
<script src="{{ url('/') }}/app-assets/js/core/app.min.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/customizer.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ url('/') }}/app-assets/js/scripts/pages/page-knowledge-base.min.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/forms/form-tooltip-valid.min.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/tables/table-datatables-basic.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/pages/page-account-settings-account.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/pages/page-pricing.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/pages/page-profile.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/pages/app-todo.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/forms/form-validation.js"></script>
<script src="{{ url('/') }}/app-assets/js/scripts/forms/form-wizard.js"></script>
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

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
        // Mengambil form
        var formTodo = $('#form-todo');

        // Mengambil input pada form
        var inputComment = $('input[name=todo]');
        var inputTaskId = $('input[name=task_id]');

        // Mengambil tombol submit pada form
        var submitBtn = $('button[type=submit]');

        // Event listener ketika form di-submit
        formTodo.on('submit', function(e) {
            e.preventDefault();

            // Men-disable tombol submit sementara
            submitBtn.prop('disabled', true);

            // Mengambil data dari form
            var formData = {
                '_token': '{{ csrf_token() }}',
                'todo': inputComment.val(),
                'task_id': inputTaskId.val(),
            };

            // Melakukan Ajax POST request ke URL /bisdiboard/todo
            $.ajax({
                url: '/bisdiboard/todo',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Jika sukses, tampilkan pesan sukses dan reset form
                    alert(response.message);
                    formTodo.trigger('reset');
                },
                error: function(xhr, status, error) {
                    // Jika gagal, tampilkan pesan error
                    alert('Error: ' + error);
                },
                complete: function() {
                    // Meng-enable tombol submit kembali setelah request selesai
                    submitBtn.prop('disabled', false);
                }
            });
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {
        // Mencegah form submit secara default
        $('#form-todo').submit(function(e) {
            e.preventDefault();

            // Mengambil data dari form
            var formData = $(this).serialize();

            // Melakukan Ajax POST request ke URL /bisdiboard/todo
            $.ajax({
                url: '/bisdiboard/todo',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Jika sukses, tampilkan pesan sukses dan reset form
                    $('#reload').trigger('click');
                    // alert(response.message);
                    $('#form-todo')[0].reset();
                },
                error: function(xhr, status, error) {
                    // Jika gagal, tampilkan pesan error
                    alert(error);
                }
            });
        });
    });
</script> --}}

@livewireScripts
