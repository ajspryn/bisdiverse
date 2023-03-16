@extends('layouts.main')

@section('title', 'Dahsboard Admin')

@section('menu')
    @include('bisdiboard::layouts.menu')
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
                            <h2 class="content-header-title float-start mb-0">Bisdiboard</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Project</a>
                                    </li>
                                    {{-- <li class="breadcrumb-item active">
                                    </li> --}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                                Tambah Project
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="content-body">
                <!-- Card Advance -->
                <div id="user-profile">
                    <!-- profile header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                                <!-- profile cover photo -->
                                <img class="card-img-top" src="../../../app-assets/images/profile/user-uploads/timeline.jpg" alt="User Profile Image" />
                                <!--/ profile cover photo -->

                                <div class="position-relative">
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded img-fluid" alt="Card image" />
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ms-3">
                                            <h2 class="text-white">{{ Auth::user()->name }}</h2>
                                            <p class="text-white">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- tabs pill -->
                                <div class="profile-header-nav">
                                    <!-- navbar -->
                                    <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                        <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button>

                                        <!-- collapse  -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">
                                                    {{-- <li class="nav-item">
                                                        <a class="nav-link fw-bold active" href="#">
                                                            <span class="d-none d-md-block">Feed</span>
                                                            <i data-feather="rss" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">About</span>
                                                            <i data-feather="info" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">Photos</span>
                                                            <i data-feather="image" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">Friends</span>
                                                            <i data-feather="users" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li> --}}
                                                </ul>
                                                <!-- edit button -->
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i data-feather="plus"></i>
                                                    Tambah Project
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ collapse  -->
                                    </nav>
                                    <!--/ navbar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->
                    <div class="row match-height">
                        @foreach ($projects as $project)
                            @php
                                $tasks = Modules\Bisdiboard\Entities\Tasks::with('user')
                                    ->select()
                                    ->where('project_id', $project->id)
                                    ->get();
                                $selesai = $tasks->where('status', 'Done')->count();
                                $total = $tasks->count();
                            @endphp
                            <!-- App Design Card -->
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card card-app-design">
                                    <div class="card-body">
                                        <span class="badge badge-light-primary">{{ Carbon\Carbon::parse($project->tgl_mulai)->format('d-F-Y') }} - {{ Carbon\Carbon::parse($project->tgl_selesai)->format('d-F-Y') }}</span>
                                        <h4 class="card-title mt-1 mb-75">{{ $project->nama }}</h4>
                                        <p class="card-text font-small-2 mb-2">
                                            {{ $project->deskripsi }}
                                        </p>
                                        <div class="design-group">
                                            <h6 class="section-label">Dibuat Oleh</h6>
                                            <div class="avatar avatar-lg">
                                                <img src="{{ asset('storage/' . $project->user->avatar) }}" alt="avatar" />
                                            </div>
                                            <span class="me-1">
                                                {{ $project->user->name }}
                                            </span>
                                            {{-- <span class="badge badge-light-primary">Wireframe</span> --}}
                                        </div>
                                        <div class="design-group">
                                            <h6 class="section-label">Members</h6>
                                            <div class="avatar-group">
                                                @foreach ($tasks as $member)
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="{{ $member->user->username }}" class="avatar pull-up">
                                                        <img src="{{ asset('storage/' . $member->user->avatar) }}" alt="Avatar" height="32" width="32" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="design-planning-wrapper">
                                            <div class="design-planning">
                                                <p class="card-text mb-25">Task Complete</p>
                                                <h6 class="mb-0">{{ $selesai }}/{{ $total }}</h6>
                                            </div>
                                            <div class="design-planning">
                                                <p class="card-text mb-25">Status</p>
                                                <span class="badge badge-light-warning">{{ $project->status }}</span>
                                            </div>
                                        </div>
                                        <div class="progress-wrapper mb-2">
                                            <div id="example-caption-1">Progres&hellip; {{ ($selesai / $total) * 100 }}%</div>
                                            <div class="progress progress-bar-primary">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ ($selesai / $total) * 100 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($selesai / $total) * 100 }}%" aria-describedby="example-caption-1"></div>
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <a href="/bisdiboard/task/{{ $project->id }}" class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ App Design Card -->
                        @endforeach

                    </div>
                    <!--/ Card Advance -->
                </div>
            </div>
        </div>
        <!-- END: Content-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="/bisdiboard/project">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-1">
                                <label class="form-label" for="basic-addon-name">Name</label>
                                <input type="text" id="basic-addon-name" class="form-control" placeholder="Nama Project" name="nama" aria-label="Name" aria-describedby="basic-addon-name" required />
                                {{-- <div class="invalid-feedback">Wajib Diisi.</div> --}}
                            </div>
                            <div class="mb-1">
                                <label class="form-label" class="d-block">Jenis</label>
                                <div class="form-check my-50">
                                    <input type="radio" id="validationRadio3" name="jenis" value="Private" class="form-check-input" required />
                                    <label class="form-check-label" for="validationRadio3">Private</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="validationRadio4" name="jenis" value="Public" class="form-check-input" required />
                                    <label class="form-check-label" for="validationRadio4">Public</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <label class="d-block form-label" for="validationBioBootstrap">Deskripsi</label>
                                <textarea class="form-control" id="validationBioBootstrap" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="tgl_mulai">Tgl Mulai</label>
                                <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" required />
                                <div class="invalid-feedback">Wajib Diisi.</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="tgl_selesai">Tgl Selesai</label>
                                <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" required />
                                <div class="invalid-feedback">Wajib Diisi.</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
