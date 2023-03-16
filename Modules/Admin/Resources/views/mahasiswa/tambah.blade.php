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
                            <h2 class="content-header-title float-start mb-0">Data Mahasiswa</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Mahasiswa</a>
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
                                    <h4 class="card-title">Tambahkan Sekaligus Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" id="myForm" method="POST" action="/admin/mahasiswa" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Silahkan Upload file
                                                        Exel (<a href="{{ url('/') }}/import/mahasiswa.xlsx">Download Template Upload</a>) </label>
                                                    <input type="file" id="first-name-column" class="form-control" accept=".xlsx,.csv" name="mahasiswa" required />
                                                    <div class="alert alert-danger mt-1" role="alert">
                                                        <h4 class="alert-heading"><i data-feather="alert-circle" class="me-50"></i> Perhatian</h4>
                                                        <div class="alert-body">
                                                            <p>- Pastikan Data Yang Diinput Sesuai Template</p>
                                                            <p>- Jika NPM Telah Digunakan Maka Data Tersebut Tidak Akan Diupload Ulang</p>
                                                            <p>- NPM Mahasiswa Akan Menjadi Username Dan Password Secara Otomatis</p>
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
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambahkan Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate method="POST" action="/admin/mahasiswa">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama Mahasiswa</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Nama Mahasiswa" name="nama" required />
                                                    <div class="valid-feedback">Ok!</div>
                                                    <div class="invalid-feedback">Wajib Diisi</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">NPM</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan NPM" name="npm" required />
                                                    <div class="valid-feedback">Ok!</div>
                                                    <div class="invalid-feedback">Wajib Diisi</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No RFID</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No RFID" name="no_rfid" required />
                                                    <div class="valid-feedback">Ok!</div>
                                                    <div class="invalid-feedback">Wajib Diisi</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No RFID Cadangan</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No rfid Cadangan" name="no_rfid_cadangan" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tahun Masuk</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" required />
                                                    <div class="valid-feedback">Ok!</div>
                                                    <div class="invalid-feedback">Wajib Diisi</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kelas">Kelas</label>
                                                    <select class="form-select" name="kelas" id="kelas" required>
                                                        <option label="kelas"></option>
                                                        @foreach ($kelass as $kelas)
                                                            <option value="{{ $kelas->kelas }} {{ $kelas->tahun }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">Ok!</div>
                                                    <div class="invalid-feedback">Wajib Diisi</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kelas_ujian">Kelas Ujian</label>
                                                    <select class="form-select" name="kelas_ujian" id="kelas_ujian" required>
                                                        <option label="kelas_ujian"></option>
                                                        <option>A</option>
                                                        <option>B</option>
                                                        <option>C</option>
                                                        <option>D</option>
                                                        <option>E</option>
                                                        <option>F</option>
                                                    </select>
                                                    <div class="valid-feedback">Ok!</div>
                                                    <div class="invalid-feedback">Wajib Diisi</div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No KTP</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No KTP Mahasiswa" name="no_ktp" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Alamat</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Alamat Mahasiswa" name="alamat" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="province">Provinsi</label>
                                                    <label class="form-label" for="first-name-column">Provinsi</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Provinsi Mahasiswa" name="provinsi" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kab/Kota</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Kab/Kota Mahasiswa" name="kabkota" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kecamatan</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Kecamatan Alamat Mahasiswa" name="kecamatan" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Desa/Kelurahan</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Desa/Kelurahan Alamat Mahasiswa" name="desa" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">RT</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan RT Alamat Mahasiswa" name="rt" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">RW</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan RW Alamat Mahasiswa" name="rw" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode
                                                        POS</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan Kode POS Alamat Mahasiswa" name="kode_pos" />
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No Telephone</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No Telp Mahasiswa" name="no_telp" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tempat
                                                        Lahir</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Tempat Lahir Mahasiswa" name="tempat_lahir" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tanggal
                                                        Lahir</label>
                                                    <input type="date" id="first-name-column" class="form-control" placeholder="Masukan Tanggal Lahir Mahasiswa" name="tgl_lahir" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Ibu
                                                        Kandung</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Nama Ibu Kandung Mahasiswa" name="ibu_kandung" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama
                                                        Ortu/Wali</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Nama Ortu/Wali Mahasiswa (Selain ibu)" name="nama_ot" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Hubungan
                                                        Ortu/Wali</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Hubungan Ortu/Wali Mahasiswa" name="hubungan_ot" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No. Telp Orang
                                                        Tua</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No. Telp Orang Tua Mahasiswa" name="no_telp_ot" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Asal
                                                        Sekolah</label>
                                                    <input type="teks" id="first-name-column" class="form-control" placeholder="Masukan sal Sekolah Mahasiswa" name="asal_sekolah" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
