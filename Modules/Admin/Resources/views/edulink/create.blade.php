@extends('layouts.main')

@section('title', 'Dahsboard Admin')

@section('menu')
    @include('admin::layouts.menu')
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">EduLink</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Edulink</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                {{-- <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambahkan Sekaligus KRS Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" id="myForm" method="POST" action="/admin/krs" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Silahkan Upload file
                                                        Exel (<a href="{{ url('/') }}/import/krsmahasiswa.xlsx">Download Template Upload</a>) </label>
                                                    <input type="file" id="first-name-column" class="form-control" accept=".xlsx,.csv" name="upload_file" required />
                                                    <div class="alert alert-danger mt-1" role="alert">
                                                        <h4 class="alert-heading"><i data-feather="alert-circle" class="me-50"></i> Perhatian</h4>
                                                        <div class="alert-body">
                                                            <p>- Pastikan Data Yang Diinput Sesuai Template</p>
                                                            <p>- Jika Ada Error Saat Upload Maka Rubah Format Upload Menjadi CSV</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary me-1" onclick="document.getElementById('myForm').submit()">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> --}}
                <section class="form-control-repeater">
                    <div class="row">
                        <!-- Invoice repeater -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">KRS Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/admin/edulink" class="invoice-repeater" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div data-repeater-list="krs">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="npm">NPM</label>
                                                            <input type="number" class="form-control" id="npm" aria-describedby="npm" name="mahasiswa_npm" required autofocus />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="semester">Semester</label>
                                                            <select id="semester" name="semester" class="form-select" aria-label="semester" required>
                                                                <option value="">Silahkan Pilih Semester</option>
                                                                <option value="Ganjil">Ganjil</option>
                                                                <option value="Genap">Genap</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="Tahun">Tahun</label>
                                                            <input type="text" class="form-control" id="Tahun" aria-describedby="Tahun" value={{ \Carbon\Carbon::now()->format('Y') }} name="tahun" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="Dokumen">Dokumen</label>
                                                            <input type="file" class="form-control" id="Dokumen" aria-describedby="Dokumen" name="dokumen" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New</span>
                                                </button>
                                                <button class="btn btn-icon btn-primary" type="submit">
                                                    <span>Submit</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice repeater -->
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
