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
                                    <li class="breadcrumb-item"><a href="index.html">Pengaturan</a>
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
                <section id="multiple-column-form ">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/mahasiswa/{{ $mahasiswa->id }}">
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama Mahasiswa</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Nama Mahasiswa" name="nama" value="{{ $mahasiswa->nama }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">NPM</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan NPM" name="npm" value="{{ $mahasiswa->npm }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No RFID</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No RFID" name="no_rfid" value="{{ $mahasiswa->no_rfid }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No RFID
                                                        Cadangan</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No rfid Cadangan" name="no_rfid_cadangan" value="{{ $mahasiswa->no_rfid_cadangan }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tahun Masuk</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" value="{{ $mahasiswa->tahun_masuk }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kelas">Kelas</label>
                                                    <select class="select2 w-100" name="kelas" id="kelas" required>
                                                        @if (old('kelas', $mahasiswa->kelas) == $mahasiswa->kelas)
                                                            <option value="{{ $mahasiswa->kelas }}" selected>
                                                                {{ $mahasiswa->kelas }} ({{ $mahasiswa->tahun_masuk }})</option>
                                                            @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kelas_ujian">Kelas Ujian</label>
                                                    <select class="select2 w-100" name="kelas_ujian" id="kelas_ujian" required>
                                                        @if (old('kelas_ujian', $mahasiswa->kelas_ujian) == $mahasiswa->kelas_ujian)
                                                            <option value="{{ $mahasiswa->kelas_ujian }}" selected>
                                                                {{ $mahasiswa->kelas_ujian }}</option>
                                                            <option>Silahkan Pilih Kelas</option>
                                                            <option>C5.1</option>
                                                            <option>C5.2</option>
                                                            <option>C5.3</option>
                                                            <option>C5.4</option>
                                                            <option>C4.1</option>
                                                            <option>C4.2</option>
                                                            <option>C4.3</option>
                                                            <option>C4.4</option>
                                                        @else
                                                            <option label="kelas_ujian"></option>
                                                            <option>Silahkan Pilih Kelas</option>
                                                            <option>C5.1</option>
                                                            <option>C5.2</option>
                                                            <option>C5.3</option>
                                                            <option>C5.4</option>
                                                            <option>C4.1</option>
                                                            <option>C4.2</option>
                                                            <option>C4.3</option>
                                                            <option>C4.4</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No KTP</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No KTP Mahasiswa" name="no_ktp" value="{{ $mahasiswa->no_ktp }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Alamat</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Alamat Mahasiswa" name="alamat" value="{{ $mahasiswa->alamat }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kab/Kota</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Kab/Kota Alamat6 Mahasiswa" name="kabkota" value="{{ $mahasiswa->kabkota }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kecamatan</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Kecamatan Alamat Mahasiswa" name="kecamatan" value="{{ $mahasiswa->kecamatan }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Desa/Kelurahan</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Desa/Kelurahan Alamat Mahasiswa" name="desa" value="{{ $mahasiswa->desa }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">RT</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan RT Alamat Mahasiswa" name="rt" value="{{ $mahasiswa->rt }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">RW</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan RW Alamat Mahasiswa" name="rw" value="{{ $mahasiswa->rw }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode
                                                        POS</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan Kode POS Alamat Mahasiswa" name="kode_pos" value="{{ $mahasiswa->kode_pos }}" />
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No Telephone</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan No Telp Mahasiswa" name="no_telp" value="{{ $mahasiswa->no_telp }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tempat
                                                        Lahir</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Tempat Lahir Mahasiswa" name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Tanggal
                                                        Lahir</label>
                                                    <input type="date" id="first-name-column" class="form-control" placeholder="Masukan Tanggal Lahir Mahasiswa" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Ibu
                                                        Kandung</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Nama Ibu Kandung Mahasiswa" name="ibu_kandung" value="{{ $mahasiswa->ibu_kandung }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama
                                                        Ortu/Wali</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Nama Ortu/Wali Mahasiswa (Selain ibu)" name="nama_ot" value="{{ $mahasiswa->nama_ot }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Hubungan
                                                        Ortu/Wali</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Masukan Hubungan Ortu/Wali Mahasiswa" name="hubungan_ot" value="{{ $mahasiswa->hubungan_ot }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">No. Telp Orang
                                                        Tua</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Masukan No. Telp Orang Tua Mahasiswa" name="no_telp_ot" value="{{ $mahasiswa->no_telp_ot }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Asal
                                                        Sekolah</label>
                                                    <input type="teks" id="first-name-column" class="form-control" placeholder="Masukan sal Sekolah Mahasiswa" name="asal_sekolah" value="{{ $mahasiswa->asal_sekolah }}" />
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
                                            @if ($mahasiswa->krs->count() > 0)
                                                @foreach ($mahasiswa->krs as $krs)
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="matkul">Matakuliah</label>
                                                                    <select id="matkul" name="matkul_kode" class="form-select" aria-label="Default select example" required>
                                                                        <option label=""></option>
                                                                        @foreach ($matkuls as $matkul)
                                                                            <option value="{{ $matkul->kode }}" {{ $krs->matkul_kode == $matkul->kode ? 'selected' : '' }}>{{ $matkul->nama }}</option>
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
                                                                            <option value="{{ $kelas->kelas }}" {{ $krs->kelas == $kelas->kelas ? 'selected' : '' }}>{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="kelas_id">Kelas Ujian</label>
                                                                    <select id="kelas_ujian" name="kelas_ujian" class="form-select" aria-label="Default select example" required>
                                                                        <option value="">Silahkan Pilih Kelas</option>
                                                                        <option {{ $krs->kelas_ujian == 'A' ? 'selected' : '' }}>A</option>
                                                                        <option {{ $krs->kelas_ujian == 'B' ? 'selected' : '' }}>B</option>
                                                                        <option {{ $krs->kelas_ujian == 'C' ? 'selected' : '' }}>C</option>
                                                                        <option {{ $krs->kelas_ujian == 'D' ? 'selected' : '' }}>D</option>
                                                                        <option {{ $krs->kelas_ujian == 'E' ? 'selected' : '' }}>E</option>
                                                                        <option {{ $krs->kelas_ujian == 'F' ? 'selected' : '' }}>F</option>
                                                                        <option {{ $krs->kelas_ujian == 'G' ? 'selected' : '' }}>G</option>
                                                                        <option {{ $krs->kelas_ujian == 'H' ? 'selected' : '' }}>H</option>
                                                                        <option {{ $krs->kelas_ujian == 'I' ? 'selected' : '' }}>I</option>
                                                                        <option {{ $krs->kelas_ujian == 'J' ? 'selected' : '' }}>J</option>
                                                                        <option {{ $krs->kelas_ujian == 'K' ? 'selected' : '' }}>K</option>
                                                                        <option {{ $krs->kelas_ujian == 'L' ? 'selected' : '' }}>L</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="dosen_id">Dosen</label>
                                                                    <select id="dosen_id" name="dosen_kds" class="form-select" aria-label="Default select example">
                                                                        <option value="">Silahkan Pilih Dosen</option>
                                                                        @foreach ($dosens as $dosen)
                                                                            <option value="{{ $dosen->kds }}" {{ $krs->dosen_kds == $dosen->kds ? 'selected' : '' }}>{{ $dosen->nama }}</option>
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
                                                @endforeach
                                            @else
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        {{-- <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="npm">NPM</label>
                                                            <input type="text" class="form-control" id="npm" aria-describedby="npm" name="mahasiswa_npm" value="{{ $mahasiswa->npm }}" readonly />
                                                        </div>
                                                    </div> --}}
                                                        <div class="col-md-4 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="matkul">Matakuliah</label>
                                                                <select id="matkul" name="matkul_kode" class="form-select" aria-label="Default select example" required>
                                                                    <option label=""></option>
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
                                                                        <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
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
                                            @endif
                                        </div>
                                        <input type="hidden" id="mahasiswa_npm" class="form-input" name="mahasiswa_npm" value="{{ $mahasiswa->npm }}">
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
