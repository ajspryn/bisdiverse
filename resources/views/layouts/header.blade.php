<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Sistem Terintegrasi Akademik Bisnis Digital Fakultas Ekonomi Dan Bisnis Universitas Pakuan Bogor">
    <meta name="keywords" content="Bisdiverse,Bisdiverse.com,Sistem Akademik,Bisnis Digital,Sistem Terintegrasi Bisnis Digital,Fakultas Ekonomi Dan Bisnis,Unpak,Universitas Unpak,FEB,Bisdi,Bogor">
    <meta name="author" content="Adji Supriyono">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ url('/') }}/pwa.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/pwa.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- PWA  -->
    <meta name="theme-color" content="#fffff" />
    <link rel="apple-touch-icon" href="{{ url('/') }}/pwa.png">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/extensions/dragula.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/semi-dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/page-pricing.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/page-profile.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/page-knowledge-base.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/app-todo.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-wizard.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.css">
    <!-- END: Custom CSS-->

    <script>
        $(document).ready(function() {
            // Load Provinsi saat halaman dimuat
            loadProvinces();

            // Load Kabupaten/Kota saat Provinsi dipilih
            $('#province').change(function() {
                var provinceId = $(this).val();
                loadCities(provinceId);
            });

            // Load Kecamatan saat Kabupaten/Kota dipilih
            $('#city').change(function() {
                var cityId = $(this).val();
                loadDistricts(cityId);
            });

            // Load Kelurahan/Desa saat Kecamatan dipilih
            $('#district').change(function() {
                var districtId = $(this).val();
                loadSubdistricts(districtId);
            });

            // Load Kode Pos saat Kelurahan/Desa dipilih
            $('#subdistrict').change(function() {
                var subdistrictId = $(this).val();
                loadPostcode(subdistrictId);
            });
        });

        function loadProvinces() {
            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    var options = '<option value="">Pilih Provinsi</option>';
                    $.each(result.provinsi, function(index, value) {
                        options += '<option value="' + value.nama + '">' + value.nama + '</option>';
                    });
                    $('#province').html(options);
                }
            });
        }

        function loadCities(provinceId) {
            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=' + provinceId,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    var options = '<option value="">Pilih Kabupaten/Kota</option>';
                    $.each(result.kota_kabupaten, function(index, value) {
                        options += '<option value="' + value.nama + '">' + value.nama + '</option>';
                    });
                    $('#city').html(options);
                }
            });
        }

        function loadDistricts(cityId) {
            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=' + cityId,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    var options = '<option value="">Pilih Kecamatan</option>';
                    $.each(result.kecamatan, function(index, value) {
                        options += '<option value="' + value.nama + '">' + value.nama + '</option>';
                    });
                    $('#district').html(options);
                }
            });
        }

        function loadSubdistricts(districtId) {
            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' + districtId,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    var options = '<option value="">Pilih Kelurahan/Desa</option>';
                    $.each(result.kelurahan, function(index, value) {
                        options += '<option value="' + value.nama + '">' + value.nama + '</option>';
                    });
                    $('#subdistrict').html(options);
                }
            });
        }

        function loadPostcode(subdistrictId) {
            $.ajax({
                url: 'https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kelurahan=' + subdistrictId,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    $('#postcode').val(result.kelurahan.kode_pos);
                }
            });
        }
    </script>

</head>
