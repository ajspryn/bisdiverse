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
                            <h2 class="content-header-title float-start mb-0">Pengajuan Magang</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Magang</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pengajuan Magang</a>
                                    </li>
                                    {{-- <li class="breadcrumb-item active"><a href="#">Lihat</a>
                                    </li> --}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Nama Mahasiswa</th>
                                            <th style="text-align: center">NPM</th>
                                            <th style="text-align: center">Dosen Pembimbing</th>
                                            <th style="text-align: center">Instansi</th>
                                            <th style="text-align: center">Alamat Instansi</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="texzt-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $mahasiswa->mahasiswa->nama }}</td>
                                                <td>{{ $mahasiswa->mahasiswa->npm }}</td>
                                                <td>{{ $mahasiswa->dosen->nama }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->instansi }}</td>
                                                <td>{{ $mahasiswa->alamat_instansi }}</td>
                                                <td style="text-align: center">
                                                    @if ($mahasiswa->status == 'Diajukan Mahasiswa')
                                                        <span class="badge bg-primary">{{ $mahasiswa->status }}</span>
                                                    @elseif ($mahasiswa->status == 'Ditinjau Admin Prodi' || $mahasiswa->status == 'Ditinjau Kaprodi')
                                                        <span class="badge bg-info">{{ $mahasiswa->status }}</span>
                                                    @elseif ($mahasiswa->status == 'Diverifikasi Admin Prodi')
                                                        <span class="badge bg-success">{{ $mahasiswa->status }}</span>
                                                    @elseif ($mahasiswa->status == 'Ditolak Admin Prodi' || $mahasiswa->status == 'Ditolak Kaprodi')
                                                        <span class="badge bg-danger">{{ $mahasiswa->status }}</span>
                                                    @elseif ($mahasiswa->status == 'Disetujui Kaprodi')
                                                        <span class="badge bg-success">{{ $mahasiswa->status }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center"><a href="/magang/pengajuan/{{ $mahasiswa->id }}" class="btn btn-primary me-1">Lihat</a>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
