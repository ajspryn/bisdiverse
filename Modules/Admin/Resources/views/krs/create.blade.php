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
                            <h2 class="content-header-title float-start mb-0">KRS Mahasiswa</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">KRS Mahasiswa</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
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
                </section>
                <section class="form-control-repeater">
                    <div class="row">
                        <!-- Invoice repeater -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">KRS Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form action="/admin/krs" class="invoice-repeater" method="POST">
                                        @csrf
                                        <div data-repeater-list="krs">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="npm">NPM</label>
                                                            <input type="text" class="form-control" id="npm" aria-describedby="npm" name="mahasiswa_npm" required autofocus />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="matkul">Matakuliah</label>
                                                            <select id="matkul" name="matkul_kode" class="form-select" aria-label="Default select example" required>
                                                                <option label="">Pilih Matkul</option>
                                                                @foreach ($matkuls as $matkul)
                                                                    <option value="{{ $matkul->kode }}">{{ $matkul->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="kelas_id">Kelas</label>
                                                            <select id="kelas_id" name="kelas" class="form-select" aria-label="Default select example" required>
                                                                <option value="">Silahkan Pilih Kelas</option>
                                                                @foreach ($kelass as $kelas)
                                                                    <option value="{{ $kelas->kelas }} {{ $kelas->tahun }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="kelas_id">Kelas Ujian</label>
                                                            <select id="kelas_ujian" name="kelas_ujian" class="form-select" aria-label="Default select example" required>
                                                                <option value="">Silahkan Pilih Kelas</option>
                                                                <option>A</option>
                                                                <option>B</option>
                                                                <option>C</option>
                                                                <option>D</option>
                                                                <option>E</option>
                                                                <option>F</option>
                                                                <option>G</option>
                                                                <option>H</option>
                                                                <option>I</option>
                                                                <option>J</option>
                                                                <option>K</option>
                                                                <option>L</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="dosen_id">Dosen</label>
                                                            <select id="dosen_id" name="dosen_kds" class="form-select" aria-label="Default select example">
                                                                <option value="">Silahkan Pilih Dosen</option>
                                                                @foreach ($dosens as $dosen)
                                                                    <option value="{{ $dosen->kds }}">{{ $dosen->nama }}</option>
                                                                @endforeach
                                                            </select>
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
