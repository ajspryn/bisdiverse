<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Sistem Terintegrasi Akademik Bisnis Digital Fakultas Ekonomi Dan Bisnis Universitas Pakuan Bogor">
    <meta name="keywords" content="Bisdiverse,Bisdiverse.com,Sistem Akademik,Bisnis Digital,Sistem Terintegrasi Bisnis Digital,Fakultas Ekonomi Dan Bisnis,Unpak,Universitas Unpak,FEB,Bisdi,Bogor">
    <meta name="author" content="Adji Supriyono">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ url('/') }}/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles

    <!-- PWA  -->
    <meta name="theme-color" content="#fffff" />
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
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/vendors/css/forms/wizard/bs-stepper.min.css">
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
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/page-knowledge-base.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/app-todo.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/plugins/forms/form-wizard.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/app-invoice.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/app-assets/css/pages/page-faq.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        .swal2-container {
            z-index: 9999;
        }
    </style>
    <style>
        .loading1 {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: #fff; */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(10px);
        }

        .spinner {
            width: 60px;
            height: 60px;
            /* background-color: #333; */

            margin: 100px auto;
            -webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
            animation: sk-rotateplane 1.2s infinite ease-in-out;
        }

        @-webkit-keyframes sk-rotateplane {
            0% {
                -webkit-transform: perspective(120px)
            }

            50% {
                -webkit-transform: perspective(120px) rotateX(-180deg)
            }

            100% {
                -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-180deg)
            }
        }

        @keyframes sk-rotateplane {
            0% {
                transform: perspective(120px) rotateY(0deg) rotateX(0deg);
                -webkit-transform: perspective(120px) rotateY(0deg) rotateX(0deg)
            }

            50% {
                transform: perspective(120px) rotateY(180.1deg) rotateX(0deg);
                -webkit-transform: perspective(120px) rotateY(180.1deg) rotateX(0deg)
            }

            100% {
                transform: perspective(120px) rotateY(180deg) rotateX(179.9deg);
                -webkit-transform: perspective(120px) rotateY(-180deg) rotateX(-179.9deg);
            }
        }
    </style>

</head>
