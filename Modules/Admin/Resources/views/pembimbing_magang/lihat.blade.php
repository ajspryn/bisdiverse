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
                            <h2 class="content-header-title float-start mb-0">Mahasiswa Bimbingan {{ $dosen->nama }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Magang</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Dosen Pembimbing Magang</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Lihat</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <a href="/magang/pembimbing/create" class="btn btn-primary" type="button">Tambah Data</a>
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
                                            <th style="text-align: center">Instansi</th>
                                            <th style="texzt-align: center">Alamat Instansi</th>
                                            <th style="texzt-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswas as $mahasiswa)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->mahasiswa->nama }}</td>
                                                <td>{{ $mahasiswa->mahasiswa->npm }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->instansi }}</td>
                                                <td style="text-align: center">{{ $mahasiswa->alamat_instansi }}</td>
                                                <td style="text-align: center">
                                                    <form action=""></form>
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
