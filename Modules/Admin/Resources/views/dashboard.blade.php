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
            <div class="content-body">
                <!-- search header -->
                <section id="faq-search-filter">
                    <div class="row match-height">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <h1 class="mb-3 mt-3"><a href="#">Selamat Datang</a></h3>
                                        <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /search header -->

                <section id="faq-tabs">
                    <!-- vertical tab pill -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                                <!-- pill tabs navigation -->
                                <ul class="nav nav-pills nav-left flex-column" role="tablist">
                                    <!-- payment -->
                                    <li class="nav-item">
                                        <a class="nav-link active" id="payment" data-bs-toggle="pill" href="#jadwal" aria-expanded="true" role="tab">
                                            <i data-feather="calendar" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Jadwal Ujian</span>
                                        </a>
                                    </li>

                                    <!-- delivery -->
                                    <li class="nav-item">
                                        <a class="nav-link" id="delivery" data-bs-toggle="pill" href="#tambah_jadwal" aria-expanded="false" role="tab">
                                            <i data-feather="plus-circle" class="font-medium-3 me-1"></i>
                                            <span class="fw-bold">Tambah Jadwal Ujian</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- FAQ image -->
                                <img src="../../../app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block" alt="demand img" />
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <!-- pill tabs tab content -->
                            <div class="tab-content">
                                <!-- payment panel -->
                                <div role="tabpanel" class="tab-pane active" id="jadwal" aria-labelledby="payment" aria-expanded="true">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="calendar" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Jadwal Ujian</h4>
                                            <span>Jadwal Ujian Yang Sedang Berlangsung</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="card card-revenue-budget mt-3">
                                        <table class="datatables-basic table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">no</th>
                                                    <th style="text-align: center">Tanggal Ujian</th>
                                                    <th style="text-align: center">Waktu</th>
                                                    <th style="text-align: center">Kode Matkul</th>
                                                    <th style="text-align: center">Nama Matkul</th>
                                                    <th style="text-align: center">Dosen Penguji</th>
                                                    <th style="text-align: center">Kelas</th>
                                                    <th style="text-align: center">Kelas Ujian</th>
                                                    <th style="text-align: center">Ruangan</th>
                                                    <th style="text-align: center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jadwals as $jadwal)
                                                    <tr>
                                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                                        <td style="text-align: center">{{ $jadwal->tgl_ujian }}</td>
                                                        <td style="text-align: center">{{ $jadwal->jam_mulai_ujian }} -
                                                            {{ $jadwal->jam_berakhir_ujian }}</td>
                                                        <td style="text-align: center">{{ $jadwal->matkul_kode }}</td>
                                                        <td>{{ $jadwal->matkul->nama }}</td>
                                                        <td>{{ $jadwal->dosen->nama }}</td>
                                                        <td style="text-align: center">{{ $jadwal->kelas }}</td>
                                                        <td style="text-align: center">{{ $jadwal->kelas_ujian }}</td>
                                                        <td style="text-align: center">{{ $jadwal->ruangan }}</td>
                                                        <td style="text-align: center">
                                                            <div class="dropdown">
                                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                                    <span class="badge rounded-pill badge-light-primary me-1"><i data-feather="more-vertical"></i>Action</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <form action="/admin/jadwal/{{ $jadwal->id }}" method="post" class="d-inline">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                            <i data-feather="trash" class="me-50"></i>
                                                                            <span>Delete</span>
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- delivery panel -->
                                <div class="tab-pane" id="tambah_jadwal" role="tabpanel" aria-labelledby="delivery" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="plus-circle" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Tambah Jadwal Ujian</h4>
                                            <span>Form Tambah Jadwal Ujian</span>
                                        </div>
                                    </div>

                                    <!-- frequent answer and question  collapse  -->
                                    <div class="card pb-5 px-sm-5 pt-50 mt-3">
                                        <form class="needs-validation" novalidate id="editUserForm" class="row gy-1 pt-75" method="POST" action="/admin">
                                            @csrf
                                            <div class="row mt-3">
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="jenis">Jenis</label>
                                                    <select id="jenis" name="jenis_ujian" class="form-select" aria-label="Default select example" required>
                                                        <option label=""></option>
                                                        <option>UTS</option>
                                                        <option>UAS</option>
                                                        <option>Seminar/Webinar</option>
                                                        <option>Talkshow</option>
                                                        <option>Lainnya</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="matkul">Matakuliah</label>
                                                    <select id="matkul" name="matkul_kode" class="form-select" aria-label="Default select example" required>
                                                        <option label=""></option>
                                                        @foreach ($matkuls as $matkul)
                                                            <option value="{{ $matkul->kode }}">{{ $matkul->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="tgl_ujian">Tanggal</label>
                                                    <input type="date" id="tgl_ujian" name="tgl_ujian" class="form-control" required />
                                                </div>
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="jam_mulai_ujian">Jam Mulai</label>
                                                    <input type="time" id="jam_mulai_ujian" name="jam_mulai_ujian" class="form-control" required />
                                                </div>
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="jam_berakhir_ujian">Jam Berakhir</label>
                                                    <input type="time" id="jam_berakhir_ujian" name="jam_berakhir_ujian" class="form-control" required />
                                                </div>
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="kelas_id">Kelas</label>
                                                    <select id="kelas_id" name="kelas" class="form-select" aria-label="Default select example" required>
                                                        <option value="">Silahkan Pilih Kelas</option>
                                                        @foreach ($kelass as $kelas)
                                                            <option value="{{ $kelas->kelas }} {{ $kelas->tahun }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-2">
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
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="dosen_id">Dosen</label>
                                                    <select id="dosen_id" name="dosen_kds" class="form-select" aria-label="Default select example" required>
                                                        <option value="">Silahkan Pilih Dosen</option>
                                                        @foreach ($dosens as $dosen)
                                                            <option value="{{ $dosen->kds }}">{{ $dosen->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 mb-2">
                                                    <label class="form-label" for="ruangan_id">Ruang</label>
                                                    <select id="ruangan_id" name="ruangan" class="form-select" aria-label="Default select example" required>
                                                        <option value="">Silahkan Pilih Ruangan</option>
                                                        @foreach ($ruangans as $ruangan)
                                                            <option value="{{ $ruangan->ruangan }}">{{ $ruangan->ruangan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center mt-2 pt-50">
                                                <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                    Batalkan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    {{-- <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <h1 class="mb-3 mt-3"><a href="#">Selamat Datang</a></h3>
                                        <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row match-height">
                        <div class="col-lg-3 col-12">
                            <div class="card card-developer-meetup mb-1">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <h2 class="mb-3 mt-3"><a href="#">Jadwal Ujian</a></h3>
                                </div>
                            </div>
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <button type="button" class="btn btn-primary mb-5 mt-4" data-bs-toggle="modal" data-bs-target="#editUser">Tambah Jadwal</button>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <img src="../../../app-assets/images/pages/calendar-illustration.png" alt="Meeting Pic" height="170" />
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Report Card -->
                        <div class="col-lg-9 col-12">
                            <div class="card card-revenue-budget">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">no</th>
                                            <th style="text-align: center">Tanggal Ujian</th>
                                            <th style="text-align: center">Waktu</th>
                                            <th style="text-align: center">Kode Matkul</th>
                                            <th style="text-align: center">Nama Matkul</th>
                                            <th style="text-align: center">Dosen Penguji</th>
                                            <th style="text-align: center">Kelas</th>
                                            <th style="text-align: center">Kelas Ujian</th>
                                            <th style="text-align: center">Ruangan</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwals as $jadwal)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $jadwal->tgl_ujian }}</td>
                                                <td style="text-align: center">{{ $jadwal->jam_mulai_ujian }} -
                                                    {{ $jadwal->jam_berakhir_ujian }}</td>
                                                <td style="text-align: center">{{ $jadwal->matkul_kode }}</td>
                                                <td>{{ $jadwal->matkul->nama }}</td>
                                                <td>{{ $jadwal->dosen->nama }}</td>
                                                <td style="text-align: center">{{ $jadwal->kelas }}</td>
                                                <td style="text-align: center">{{ $jadwal->kelas_ujian }}</td>
                                                <td style="text-align: center">{{ $jadwal->ruangan }}</td>
                                                <td style="text-align: center">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                            <span class="badge rounded-pill badge-light-primary me-1"><i data-feather="more-vertical"></i>Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="/admin/jadwal/{{ $jadwal->id }}" method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                    <i data-feather="trash" class="me-50"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Revenue Report Card -->
                    </div>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body pb-5 px-sm-5 pt-50">
                                    <div class="text-center mb-2">
                                        <h1 class="mb-1">Tambahkan Jadwal</h1>
                                        <p>Silahkan Isi Form Dibawah Ini Untuk Membuat Jadwal.</p>
                                    </div>
                                    <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="/admin">
                                        @csrf
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="jenis">Jenis</label>
                                            <select id="jenis" name="jenis_ujian" class="form-select" aria-label="Default select example" required>
                                                <option label=""></option>
                                                <option>UTS</option>
                                                <option>UAS</option>
                                                <option>Seminar/Webinar</option>
                                                <option>Talkshow</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="matkul">Matakuliah</label>
                                            <select id="matkul" name="matkul_kode" class="form-select" aria-label="Default select example" required>
                                                <option label=""></option>
                                                @foreach ($matkuls as $matkul)
                                                    <option value="{{ $matkul->kode }}">{{ $matkul->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="tgl_ujian">Tanggal</label>
                                            <input type="date" id="tgl_ujian" name="tgl_ujian" class="form-control" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="jam_mulai_ujian">Jam Mulai</label>
                                            <input type="time" id="jam_mulai_ujian" name="jam_mulai_ujian" class="form-control" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="jam_berakhir_ujian">Jam Berakhir</label>
                                            <input type="time" id="jam_berakhir_ujian" name="jam_berakhir_ujian" class="form-control" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="kelas_id">Kelas</label>
                                            <select id="kelas_id" name="kelas" class="form-select" aria-label="Default select example" required>
                                                <option selected>Silahkan Pilih Kelas</option>
                                                @foreach ($kelass as $kelas)
                                                    <option value="{{ $kelas->kelas }} {{ $kelas->tahun }}">{{ $kelas->kelas }} ({{ $kelas->tahun }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="kelas_id">Kelas Ujian</label>
                                            <select id="kelas_ujian" name="kelas_ujian" class="form-select" aria-label="Default select example" required>
                                                <option selected>Silahkan Pilih Kelas</option>
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
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="dosen_id">Dosen</label>
                                            <select id="dosen_id" name="dosen_kds" class="form-select" aria-label="Default select example" required>
                                                <option selected>Silahkan Pilih Dosen</option>
                                                @foreach ($dosens as $dosen)
                                                    <option value="{{ $dosen->kds }}">{{ $dosen->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="ruangan_id">Ruang</label>
                                            <select id="ruangan_id" name="ruangan" class="form-select" aria-label="Default select example" required>
                                                <option selected>Silahkan Pilih Ruangan</option>
                                                @foreach ($ruangans as $ruangan)
                                                    <option value="{{ $ruangan->ruangan }}">{{ $ruangan->ruangan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 text-center mt-2 pt-50">
                                            <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                                                Batalkan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Edit User Modal -->

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content--> --}}
@endsection
