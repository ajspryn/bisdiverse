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
                            <h2 class="content-header-title float-start mb-0">Akademik</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Pengaturan Modul Akademik</a>
                                    </li>
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
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th style="text-align: center">Nama Module</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($modules as $module)
                                                @if ($module == 'PresensiUjian' || $module == 'Magang' || $module == 'Judulskripsi' || $module == 'Seminar')
                                                    <tr style="text-align: center">
                                                        <td></td>
                                                        <td>{{ $module->getName() }}</td>
                                                        <td style="text-align: center">{!! $module->isEnabled() ? '<span class="badge badge-light-success">Aktif</span>' : '<span class="badge badge-light-danger">Tidak Aktif</span>' !!}</td>
                                                        <td>
                                                            @if ($module->isEnabled() == true)
                                                                <form action="akademik/disable/{{ $module->getName() }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Matikan</button>
                                                                    {{-- <button type="submit">Disable</button> --}}
                                                                </form>
                                                            @else
                                                                <form action="akademik/enable/{{ $module->getName() }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success">Aktifkan</button>
                                                                    {{-- <button type="submit">Enable</button> --}}
                                                                </form>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
