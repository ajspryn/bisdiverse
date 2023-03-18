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
                            <h2 class="content-header-title float-start mb-0">Dosen</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Pengaturan</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Dosen</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <div class="row">
                    <div class="col-md-8 col-12">
                        <section id="multiple-column-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Dosen</h4>
                                        </div>
                                        <div class="card-body">
                                            <form class="needs-validation" novalidate id="dosenForm" method="POST" action="/admin/dosen">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">Nama
                                                                Dosen</label>
                                                            <input type="text" id="first-name-column" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Dosen" name="nama" required />
                                                            {{-- @error('nama')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror --}}
                                                            <div class="invalid-feedback">Wajib Diisi</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">Email</label>
                                                            <input type="email" id="first-name-column" class="form-control @error('email') is-invalid @enderror" placeholder="Email Dosen" name="email" required />
                                                            {{-- @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror --}}
                                                            <div class="invalid-feedback">Wajib Diisi</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">Kode
                                                                Dosen</label>
                                                            <input type="number" id="first-name-column" class="form-control @error('kds') is-invalid @enderror" placeholder="Kode Dosen" name="kds" required />
                                                            {{-- @error('kds')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror --}}
                                                            <div class="invalid-feedback">Wajib Diisi</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">NIDN /
                                                                NIDK</label>
                                                            <input type="text" id="first-name-column" class="form-control @error('nidn_nidk') is-invalid @enderror" placeholder="NIDN / NIDK" name="nidn_nidk" />
                                                            {{-- @error('nidn_nidk')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary me-1" onclick="document.getElementById('dosenForm').submit()">Submit</button>
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
                    <div class="col-md-4 col-12">
                        <section id="multiple-column-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Tambahkan Sekaligus Dosen</h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="myForm" class="form" method="POST" action="/admin/dosen" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="first-name-column">Silahkan
                                                                Upload file
                                                                Exel (<a href="{{ url('/') }}/import/dosen.xlsx">Download Template Upload</a>)</label>
                                                            <input type="file" id="first-name-column" class="form-control" accept=".xlsx,.csv" name="dosen" required />
                                                        </div>
                                                        <div class="alert alert-danger" role="alert">
                                                            <h4 class="alert-heading"><i data-feather="alert-circle" class="me-50"></i> Perhatian</h4>
                                                            <div class="alert-body">
                                                                <p>- Pastikan Data Yang Diinput Sesuai Template</p>
                                                                <p>- Kode Dosen/KDS Akan Menjadi Username Dan Password Default Adalah "dosenunpak"</p>
                                                                <p>- Jika Ada Error Saat Upload Maka Rubah Format Upload Menjadi CSV</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary me-1" onclick="document.getElementById('myForm').submit()">Submit</button>
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
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">NIDN / NIDK</th>
                                            <th style="text-align: center">Nama Dosen</th>
                                            <th style="text-align: center">Kode Dosen</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dosens as $dosen)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $dosen->nidn_nidk }}</td>
                                                <td>{{ $dosen->nama }}</td>
                                                <td style="text-align: center">{{ $dosen->kds }}</td>
                                                <td style="text-align: center">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                            <span class="badge rounded-pill badge-light-primary me-1"><i data-feather="more-vertical"></i>Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="/admin/dosen/{{ $dosen->id }}/edit">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                            <form action="/admin/dosen/{{ $dosen->id }}" method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <a class="dropdown-item" href="#" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});">
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
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
