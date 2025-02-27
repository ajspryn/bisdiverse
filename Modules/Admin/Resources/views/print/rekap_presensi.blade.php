<!DOCTYPE html>
<html class="loading" lang="id" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Print Presensi</title>
    <link rel="apple-touch-icon" href="../../../favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script> --}}
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-invoice-print.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

    <style type="text/css">
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="invoice-header d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex">
                                <img src="../../../logounpak.png" height="100" alt="">
                                {{-- <h3 class="text-primary fw-bold ms-1"></h3> --}}
                            </div>
                        </div>
                        <div>
                            <div class="d-flex text-center">
                                <div class="text-primary fw-bold ms-1">
                                    <h1>
                                        UNIVERSITAS PAKUAN
                                    </h1>
                                    <h2>
                                        FAKULTAS EKONOMI DAN BISNIS
                                    </h2>
                                    <h5>
                                        Jl. Pakuan PO. BOX 452 Bogor 16143 Telp.
                                        (0251) 8314918
                                        (Hunting)
                                    </h5>
                                    <h5>
                                        Website:https://feb.unpak.ac.id/ e-mail:
                                        fekonomi@unpak.ac.id
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex">
                                <img src="../../../LOGO2.png" height="100" alt="">
                            </div>
                        </div>
                        <div class="mt-md-0">
                            {{-- <h4 class="fw-bold text-end mb-1">INVOICE #3492</h4>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">Date Issued:</span>
                                <span class="fw-bold"> 25/08/2020</span>
                            </div>
                            <div class="invoice-date-wrapper">
                                <span class="invoice-date-title">Due Date:</span>
                                <span class="fw-bold">29/08/2020</span>
                            </div> --}}
                        </div>
                    </div>

                    <hr class="" />
                    <div class="row pb-2">
                        {{-- <div class="col-sm-6">
                            <h6 class="mb-1">Invoice To:</h6>
                            <p class="mb-25">Thomas shelby</p>
                            <p class="mb-25">Shelby Company Limited</p>
                            <p class="mb-25">Small Heath, B10 0HF, UK</p>
                            <p class="mb-25">718-986-6062</p>
                            <p class="mb-0">peakyFBlinders@gmail.com</p>
                        </div> --}}
                        <div class="col-sm-7 mt-sm-0">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="pe-1"><strong>Mata Kuliah</strong></td>
                                        <td>: {{ $ujian->matkul->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1"><strong>Kelas</strong></td>
                                        <td>: {{ $ujian->kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1"><strong>Hari/Tanggal</strong></td>
                                        <td>: {{ Carbon\Carbon::now()->format('l/d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1"><strong>Waktu/Ruangan</strong></td>
                                        <td>: {{ $ujian->jam_mulai_ujian }} -
                                            {{ $ujian->jam_berakhir_ujian }}/{{ $ujian->ruangan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pe-1"><strong>Dosen/Penguji</strong></td>
                                        <td>: {{ $ujian->dosen->nama }} / {{ $ujian->dosen->kds }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="1%" style="text-align: center">No</th>
                                    <th class="py-1" width="5%" style="text-align: center">NPM</th>
                                    <th class="py-1" width="60%">Nama</th>
                                    {{-- <th class="py-1" width="25%" style="text-align: center">Tgl</th> --}}
                                    {{-- <th class="py-1" width="15%" style="text-align: center">Waktu</th> --}}
                                    <th class="py-1" width="30%" style="text-align: center">Status</th>
                                    <th class="py-1" width="10%" style="text-align: center">Jam Absensi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswas as $mahasiswa)
                                    @php
                                        $presensi = Modules\Admin\Entities\Presensi::select()
                                            ->where('npm', $mahasiswa->mahasiswa->npm)
                                            ->where('kelas', $mahasiswa->mahasiswa->kelas)
                                            ->where('matkul_kode', Request('matkul'))
                                            ->wheredate('created_at', Request('tanggal'))
                                            ->get()
                                            ->first();
                                    @endphp
                                    <tr>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td style="text-align: center">{{ $mahasiswa->mahasiswa->npm }}</td>
                                        <td>{{ $mahasiswa->mahasiswa->nama }}</td>
                                        @if ($presensi)
                                            <td style="text-align: center">Masuk</td>
                                            <td style="text-align: center">{{ $presensi->created_at->format('H:i') }}</td>
                                        @else
                                            <td style="text-align: center">Tidak Masuk</td>
                                            <td style="text-align: center">-</td>
                                        @endif
                                        {{-- <td style="text-align: center">{{ $presensi->created_at->format('d-m-Y') }}</td>
                                        <td style="text-align: center">{{ $presensi->created_at->format('H:i') }}</td> --}}
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-1">
                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-1">
                            <p class="card-text mb-0"><span class="fw-bold">Total Hadir :</span> <span class="ms-75">{{ $presensis->count() }} Mahasiswa</span></p>
                        </div>
                    </div>

                    <hr class="my-2" />
                    <div class="row">
                        <div class="col-sm-6 ml-0">
                            <div class="table-responsive mt-1">
                                <table class="table">
                                    <tbody>
                                        <tr>

                                            <td>
                                                <p>Bogor, {{ Carbon\Carbon::now()->format('d-m-Y') }}</p>
                                                <p>Ketua Program Studi Bisnis Digital</p>
                                                <div id="qrcode"></div>
                                                <br>
                                                <p>Dion Achmad Armadi, S.E., M.Si.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-invoice-print.min.js"></script>
    <!-- END: Page JS-->

    {{-- <script>
        // Fungsi untuk mendapatkan tanggal dan jam dalam format yang diinginkan
        function getFormattedDateTime() {
            var currentDateTime = new Date();

            // Format tanggal dan jam sebagai string
            var formattedDateTime = currentDateTime.toISOString().replace(/[-:]/g, "").slice(0, -5);

            return formattedDateTime;
        }

        // Mendapatkan tanggal dan jam saat ini
        var currentDateTime = getFormattedDateTime();

        // Data tanda tangan digital
        var signatureText = "Tanda Tangan Digital Oleh : ";

        // Gabungkan teks tanda tangan dengan tanggal dan jam
        var barcodeData = signatureText + " " + currentDateTime;

        // Buat barcode menggunakan JsBarcode
        JsBarcode("#barcode", barcodeData, {
            format: "CODE128", // Pilih format barcode, misalnya CODE128
            displayValue: true // Tampilkan nilai barcode di bawahnya
        });
    </script> --}}

    <script>
        // Fungsi untuk mendapatkan tanggal dan jam dalam format yang diinginkan
        function getFormattedDateTime() {
            var currentDateTime = new Date();
            var formattedDateTime = currentDateTime.toLocaleString();
            return formattedDateTime;
        }

        // Fungsi untuk menghasilkan QR code dengan tanggal, jam, dan tanda tangan digital
        function generateQRCode() {
            var signatureText = "Tanda Tangan Digital Oleh : Dion Achmad Armadi, S.E., M.Si.";
            var dateTime = getFormattedDateTime();
            var data = signatureText + " " + dateTime;

            // Konfigurasi QR code menggunakan library qrcodejs
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: data,
                width: 128,
                height: 128,
                colorDark: "#000000",
                colorLight: "#ffffff",
                correctLevel: QRCode.CorrectLevel.H
            });
        }

        // Panggil fungsi untuk menghasilkan QR code
        generateQRCode();
    </script>
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
</body>
<!-- END: Body-->

</html>
