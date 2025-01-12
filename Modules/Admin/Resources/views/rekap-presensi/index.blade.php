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
                            <h2 class="content-header-title float-start mb-0">Rekap Absensi</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/rekap_absensi">Absensi</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Rekap Absensi</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class='col-9'>
                        <section class="basic-select2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Rekap Absensi</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="/admin/rekap-presensi">
                                                <div class="row">
                                                    <!-- Basic -->
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="matkul">Mata Kuliah</label>
                                                        <select class="select2 form-select" id="matkul" name="matkul" required>
                                                            <option>Silahkan Pilih Matakuliah</option>
                                                            @foreach ($matkuls as $matkul)
                                                                <option value="{{ $matkul->kode }}">{{ $matkul->nama }} ({{ $matkul->dosen->nama }})
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="kelas">Kelas</label>
                                                        <select class="select2 form-select" id="kelas" name="kelas">
                                                            <option>Silahkan Pilih Kelas</option>
                                                            @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-md-4 mb-1">
                                                        <label class="form-label" for="tahun">Tahun</label>
                                                        <select class="select2 form-select" id="tahun" name="tahun">
                                                            <option>Silahkan Pilih tahun</option>
                                                            @foreach ($kelass as $kelas)
                                                                <option value="{{ $kelas->tahun }}">{{ $kelas->tahun }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="last-name-column">Tangal</label>
                                                            <input type="date" id="last-name-column" class="form-control" placeholder="Last Name" name="tanggal" value="{{ request('tanggal') }}" />
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
                    <div class="col-3">
                        <section id="multiple-column-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Tambahkan Presensi</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="form" method="POST" action="/presensiujian" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">Silahkan
                                                                Upload file
                                                                Exel</label>
                                                            <input type="file" id="first-name-column" class="form-control" accept=".xlsx,.csv" name="presensi" required />
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
                <!-- Basic Floating Label Form section end -->
                @if ($mahasiswas)
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-9">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">No RFID</th>
                                                <th style="text-align: center">Nama</th>
                                                <th style="text-align: center">NPM</th>
                                                <th style="text-align: center">Kelas</th>
                                                {{-- <th style="text-align: center">Kelas Ujian</th> --}}
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Jam Absensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswas as $mahasiswa)
                                                @php
                                                    $presensi = Modules\Admin\Entities\Presensi::select()
                                                        ->where('npm', $mahasiswa->npm)
                                                        ->where('kelas', $mahasiswa->kelas)
                                                        ->where('matkul_kode', Request('matkul'))
                                                        ->wheredate('created_at', Request('tanggal'))
                                                        ->get()
                                                        ->first();
                                                @endphp
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $mahasiswa->mahasiswa->no_rfid }}</td>
                                                    <td>{{ $mahasiswa->mahasiswa->nama }}</td>
                                                    <td style="text-align: center">{{ $mahasiswa->mahasiswa->npm }}</td>
                                                    <td style="text-align: center">{{ $mahasiswa->mahasiswa->kelas }}</td>
                                                    {{-- <td style="text-align: center">{{ $mahasiswa->presensi->kelas_ujian->where('kelas', request('kelas'))->where('tahun', request('tahun'))->where('matkul_kode', request('matkul')) }}</td> --}}
                                                    @if ($presensi)
                                                        <td style="text-align: center">Masuk</td>
                                                        <td style="text-align: center">{{ $presensi->created_at->format('H:i') }}</td>
                                                    @else
                                                        <td style="text-align: center">Tidak Masuk</td>
                                                        <td style="text-align: center">-</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Invoice Actions -->
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 style="text-align: center">Print Rekap Presensi</h3>
                                        <hr class="mb-2 mt-2">
                                        <form action="/admin/print-presensi">
                                            <input type="hidden" name="matkul" value="{{ request('matkul') }}">
                                            <input type="hidden" name="kelas" value="{{ request('kelas') }}">
                                            <input type="hidden" name="tahun" value="{{ request('tahun') }}">
                                            <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
                                            <button type="submit" class="btn btn-outline-secondary w-100 mb-75">Cetak</button>
                                        </form>
                                        {{-- <a class="btn btn-outline-secondary w-100 mb-75" href="./app-invoice-print.html" target="_blank"> Print </a> --}}
                                        {{-- <a class="btn btn-outline-secondary w-100 mb-75" href="./app-invoice-edit.html"> Edit </a> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Actions -->
                        </div>
                    </section>
                @endif
                {{-- @if ($presensis)
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-9">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">No RFID</th>
                                                <th style="text-align: center">Nama</th>
                                                <th style="text-align: center">NPM</th>
                                                <th style="text-align: center">Kelas</th>
                                                <th style="text-align: center">Kelas Ujian</th>
                                                <th style="text-align: center">Matkul</th>
                                                <th style="text-align: center">Jam Absensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($presensis as $presensi)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $presensi->no_rfid }}</td>
                                                    <td>{{ $presensi->nama }}</td>
                                                    <td style="text-align: center">{{ $presensi->npm }}</td>
                                                    <td style="text-align: center">{{ $presensi->kelas }}</td>
                                                    <td style="text-align: center">{{ $presensi->kelas_ujian }}</td>
                                                    <td style="text-align: center">{{ $presensi->matkul->nama }}</td>
                                                    <td style="text-align: center">
                                                        {{ $presensi->created_at->format('H:i') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Invoice Actions -->
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 style="text-align: center">Print Rekap Presensi</h3>
                                        <hr class="mb-2 mt-2">
                                        <form action="/admin/print-presensi">
                                            <input type="hidden" name="matkul" value="{{ request('matkul') }}">
                                            <input type="hidden" name="kelas" value="{{ request('kelas') }}">
                                            <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
                                            <button type="submit" class="btn btn-outline-secondary w-100 mb-75">Cetak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice Actions -->
                        </div>
                    </section>
                @endif --}}


            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- END: Content-->
@endsection
