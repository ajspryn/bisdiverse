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
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i data-feather="plus"></i>
                                Tambah Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <!-- frequently asked questions tabs pills -->
                <section id="faq-tabs">
                    <!-- vertical tab pill -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card">
                                <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                                    <!-- pill tabs navigation -->
                                    <ul class="nav nav-pills nav-left flex-column" role="tablist">
                                        <!-- dashboard -->
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard" data-bs-toggle="pill" href="#board-dashboard" aria-expanded="true" role="tab">
                                                <i data-feather="home" class="font-medium-3 me-1"></i>
                                                <span class="fw-bold">Dashboard</span>
                                            </a>
                                        </li>

                                        <!-- project -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="project" data-bs-toggle="pill" href="#board-project" aria-expanded="false" role="tab">
                                                <i data-feather="clipboard" class="font-medium-3 me-1"></i>
                                                <span class="fw-bold">Project</span>
                                            </a>
                                        </li>

                                        <!-- task -->
                                        <li class="nav-item">
                                            <a class="nav-link" id="task" data-bs-toggle="pill" href="#board-task" aria-expanded="false" role="tab">
                                                <i data-feather="check-square" class="font-medium-3 me-1"></i>
                                                <span class="fw-bold">Task</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- FAQ image -->
                                    <img src="../../../app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block" alt="demand img" />
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <!-- pill tabs tab content -->
                            <div class="tab-content">
                                <!-- dashboard -->
                                <div role="tabpanel" class="tab-pane active" id="board-dashboard" aria-labelledby="dasboard" aria-expanded="true">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="home" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Dashboard Project</h4>
                                            <span>Dashboard Project</span>
                                        </div>
                                    </div>

                                    <div class="row match-height mt-2">
                                        <div class="col-lg-12 col-12">
                                            <div class="card card-statistics">
                                                <div class="card-header">
                                                    <h4 class="card-title">Statistics</h4>
                                                    <div class="d-flex align-items-center">
                                                        {{-- <p class="card-text me-25 mb-0">Updated 1 month ago</p> --}}
                                                    </div>
                                                </div>
                                                <div class="card-body statistics-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-12 mb-2 mb-md-0">
                                                            <div class="d-flex flex-row">
                                                                <div class="avatar bg-light-primary me-2">
                                                                    <div class="avatar-content">
                                                                        <i data-feather="clipboard" class="avatar-icon"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <h4 class="fw-bolder mb-0">{{ $projects->count() }}</h4>
                                                                    <p class="card-text font-small-3 mb-0">Project</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-12 mb-2 mb-md-0">
                                                            <div class="d-flex flex-row">
                                                                <div class="avatar bg-light-info me-2">
                                                                    <div class="avatar-content">
                                                                        <i data-feather="check-square" class="avatar-icon"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <h4 class="fw-bolder mb-0">{{ $taskss->count() }}</h4>
                                                                    <p class="card-text font-small-3 mb-0">Task</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                                            <div class="d-flex flex-row">
                                                                <div class="avatar bg-light-danger me-2">
                                                                    <div class="avatar-content">
                                                                        <i data-feather="box" class="avatar-icon"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <h4 class="fw-bolder mb-0">1.423k</h4>
                                                                    <p class="card-text font-small-3 mb-0">Products</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-6 col-12">
                                                            <div class="d-flex flex-row">
                                                                <div class="avatar bg-light-success me-2">
                                                                    <div class="avatar-content">
                                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="my-auto">
                                                                    <h4 class="fw-bolder mb-0">$9745</h4>
                                                                    <p class="card-text font-small-3 mb-0">Revenue</p>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            @php
                                                $project = $projects->where('tgl_selesai', '<=', Carbon\carbon::now())->first();
                                                $tasks = Modules\Bisdiboard\Entities\BoardTask::with('user')
                                                    ->select()
                                                    ->where('project_id', $project->id)
                                                    ->get();
                                                $selesai = $tasks->where('status', 'Done')->count();
                                                $total = $tasks->count();
                                            @endphp
                                            <!-- App Design Card -->
                                            <div class="col-lg-12 col-md-6 col-12">
                                                <div class="card card-app-design">
                                                    <div class="card-body">
                                                        <span class="badge badge-light-primary badge-xl me-1">{{ Carbon\Carbon::parse($project->tgl_mulai)->format('d-F-Y') }} - {{ Carbon\Carbon::parse($project->tgl_selesai)->format('d-F-Y') }} </span>
                                                        <h4 class="card-title mt-1 mb-75">{{ $project->nama }} <span class="section-label">({{ $project->kategori }})</span></h4>
                                                        <p class="card-text mb-2">
                                                            {{ $project->deskripsi }}
                                                        </p>
                                                        @if ($project->jenis == 'Classified')
                                                            <span class="badge badge-light-warning">{{ $project->jenis }}</span>
                                                        @elseif ($project->jenis == 'Public')
                                                            <span class="badge badge-light-primary">{{ $project->jenis }}</span>
                                                        @endif
                                                        <div class="design-group mt-1">
                                                            <h6 class="section-label">Dibuat Oleh</h6>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div class="avatar">
                                                                    <img src="{{ asset('storage/' . $project->user->avatar) }}" alt="avatar" height="38" width="38" />
                                                                </div>
                                                                <div class="ms-50">
                                                                    <h6 class="mb-0"> {{ $project->user->name }}</h6>
                                                                    <span>{{ $project->user->email }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="design-group">
                                                            <h6 class="section-label">Members</h6>
                                                            <div class="avatar-group">
                                                                @foreach ($tasks->unique('assigned_to') as $member)
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
                                                                @if ($project->status == 'Active')
                                                                    <span class="badge badge-light-info">{{ $project->status }}</span>
                                                                @elseif ($project->status == 'Pending')
                                                                    <span class="badge badge-light-warning">{{ $project->status }}</span>
                                                                @elseif ($project->status == 'Canceled')
                                                                    <span class="badge badge-light-danger">{{ $project->status }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrapper mb-2">
                                                            @if ($total > 0)
                                                                <div id="example-caption-1">Progres&hellip; {{ round(($selesai / $total) * 100) }}%</div>
                                                                <div class="progress progress-bar-primary">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ round(($selesai / $total) * 100) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round(($selesai / $total) * 100) }}%" aria-describedby="example-caption-1"></div>
                                                                </div>
                                                            @else
                                                                <div id="example-caption-1">Progres&hellip; 0%</div>
                                                                <div class="progress progress-bar-primary">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" aria-describedby="example-caption-1"></div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="/bisdiboard/task/{{ $project->id }}" class="btn btn-primary">Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ App Design Card -->
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <div class="card business-card">
                                                <div class="card-header pb-1">
                                                    <h4 class="card-title">Task</h4>
                                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">task with a todo that is due</p>
                                                    {{-- <h6 class="mb-75">Basic price is $130</h6> --}}
                                                    <div class="accordion accordion-margin mt-2" id="faq-cancellation-qna">
                                                        @foreach ($taskss->limit(5)->get() as $task)
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#task{{ $task->id }}" aria-expanded="false" aria-controls="task{{ $task->id }}">
                                                                        {{ $task->nama }}
                                                                        <span class="badge badge-light-danger ml-2"> {{ Carbon\Carbon::now()->diffInDays($task->batas_waktu) == 0 ? 'Batas Waktu Habis' : Carbon\Carbon::now()->diffInDays($task->batas_waktu) . ' ' . 'Hari Lagi' }}</span>
                                                                    </button>
                                                                </h2>

                                                                <div id="task{{ $task->id }}" class="collapse" aria-labelledby="cancellationOne" data-bs-parent="#faq-cancellation-qna">
                                                                    <div class="accordion-body">
                                                                        <livewire:todo-list :taskid="$task->id" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- project panel -->
                                <div class="tab-pane" id="board-project" role="tabpanel" aria-labelledby="project" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="clipboard" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Project</h4>
                                            <span>All Project</span>
                                        </div>
                                    </div>

                                    <div class="row match-height mt-2">
                                        @foreach ($projects as $project)
                                            @php
                                                $tasks = Modules\Bisdiboard\Entities\BoardTask::with('user')
                                                    ->select()
                                                    ->where('project_id', $project->id)
                                                    ->get();
                                                $selesai = $tasks->where('status', 'Done')->count();
                                                $total = $tasks->count();
                                            @endphp
                                            <!-- App Design Card -->
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="card card-app-design">
                                                    <div class="card-body">
                                                        <span class="badge badge-light-primary badge-xl me-1">{{ Carbon\Carbon::parse($project->tgl_mulai)->format('d-F-Y') }} - {{ Carbon\Carbon::parse($project->tgl_selesai)->format('d-F-Y') }} </span>
                                                        <h4 class="card-title mt-1 mb-75">{{ $project->nama }} <span class="section-label">({{ $project->kategori }})</span></h4>
                                                        <p class="card-text mb-2">
                                                            {{ $project->deskripsi }}
                                                        </p>
                                                        @if ($project->jenis == 'Classified')
                                                            <span class="badge badge-light-warning">{{ $project->jenis }}</span>
                                                        @elseif ($project->jenis == 'Public')
                                                            <span class="badge badge-light-primary">{{ $project->jenis }}</span>
                                                        @endif
                                                        <div class="design-group mt-1">
                                                            <h6 class="section-label">Dibuat Oleh</h6>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div class="avatar">
                                                                    <img src="{{ asset('storage/' . $project->user->avatar) }}" alt="avatar" height="38" width="38" />
                                                                </div>
                                                                <div class="ms-50">
                                                                    <h6 class="mb-0"> {{ $project->user->name }}</h6>
                                                                    <span>{{ $project->user->email }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="design-group">
                                                            <h6 class="section-label">Members</h6>
                                                            <div class="avatar-group">
                                                                @foreach ($tasks->unique('assigned_to') as $member)
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
                                                                @if ($project->status == 'Active')
                                                                    <span class="badge badge-light-info">{{ $project->status }}</span>
                                                                @elseif ($project->status == 'Pending')
                                                                    <span class="badge badge-light-warning">{{ $project->status }}</span>
                                                                @elseif ($project->status == 'Canceled')
                                                                    <span class="badge badge-light-danger">{{ $project->status }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrapper mb-2">
                                                            @if ($total > 0)
                                                                <div id="example-caption-1">Progres&hellip; {{ round(($selesai / $total) * 100) }}%</div>
                                                                <div class="progress progress-bar-primary">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ round(($selesai / $total) * 100) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ round(($selesai / $total) * 100) }}%" aria-describedby="example-caption-1"></div>
                                                                </div>
                                                            @else
                                                                <div id="example-caption-1">Progres&hellip; 0%</div>
                                                                <div class="progress progress-bar-primary">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" aria-describedby="example-caption-1"></div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <a href="/bisdiboard/task/{{ $project->id }}" class="btn btn-primary">Detail</a>
                                                        @if ($project->user_id == Auth::user()->id)
                                                            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#projectedit{{ $project->id }}"><i data-feather="edit"></i></button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ App Design Card -->
                                            <div class="modal fade" id="projectedit{{ $project->id }}" tabindex="-1" aria-labelledby="projecteditTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title pe-1" id="exampleModalCenterTitle">Form Edit Project</h5>
                                                            <form action="/bisdiboard/project/{{ $project->id }}" method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <a href="#" class="btn btn-outline-danger btn-sm" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus Project ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});">
                                                                    <i data-feather="trash" class="me-50"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </form>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="/bisdiboard/project">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="basic-addon-name">Nama Project</label>
                                                                    <input type="text" id="basic-addon-name" class="form-control" placeholder="Nama Project" name="nama" aria-label="Name" aria-describedby="basic-addon-name" value="{{ old('nama', $project->nama) }}" required />
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="basic-addon-name">Kategori</label>
                                                                    <input type="text" id="basic-addon-name" class="form-control" placeholder="Nama Kategori" name="kategori" aria-label="Kategori" aria-describedby="basic-addon-name" value="{{ old('kategori', $project->kategori) }}" required />
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="form-label" class="d-block">Jenis</label>
                                                                    <div class="form-check my-50">
                                                                        <input type="radio" id="validationRadio3" name="jenis" value="Classified" class="form-check-input" {{ old('jenis', $project->jenis) == 'Classified' ? 'checked' : '' }} required />
                                                                        <label class="form-check-label" for="validationRadio3">Classified</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input type="radio" id="validationRadio4" name="jenis" value="Public" class="form-check-input" {{ old('jenis', $project->jenis) == 'Public' ? 'checked' : '' }} required />
                                                                        <label class="form-check-label" for="validationRadio4">Public</label>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="d-block form-label" for="validationBioBootstrap">Deskripsi</label>
                                                                    <textarea class="form-control" id="validationBioBootstrap" name="deskripsi" rows="3"></textarea>
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
                                        @endforeach
                                    </div>
                                </div>

                                <!-- task  -->
                                <div class="tab-pane" id="board-task" role="tabpanel" aria-labelledby="task" aria-expanded="false">
                                    <!-- icon and header -->
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-tag bg-light-primary me-1">
                                            <i data-feather="check-square" class="font-medium-4"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">Taks</h4>
                                            <span>All Task</span>
                                        </div>
                                    </div>

                                    <div class="todo-application mt-2">
                                        <div class="content-area-wrapper">
                                            <div class="sidebar-left">
                                                <div class="sidebar">
                                                    <div class="sidebar-content todo-sidebar">
                                                        {{-- <div class="todo-app-menu">
                                                            <div class="add-task">
                                                                @if ($project->user_id == Auth::user()->id)
                                                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i data-feather="plus"></i>
                                                                        Add Task
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            <div class="sidebar-menu-list">
                                                                <div class="list-group list-group-filters">
                                                                    <a href="#" class="list-group-item list-group-item-action active">
                                                                        <i data-feather="mail" class="font-medium-3 me-50"></i>
                                                                        <span class="align-middle"> My Task</span>
                                                                    </a>
                                                                </div>
                                                                <div class="mt-3 px-2 d-flex justify-content-between">
                                                                    <h6 class="section-label mb-1">Priority</h6>
                                                                </div>
                                                                <div class="list-group list-group-labels">
                                                                    <form action="/bisdiboard/task/{{ $project->id }}">
                                                                        <button type="submit" class="list-group-item list-group-item-action d-flex align-items-center">
                                                                            <span class="bullet bullet-sm bullet-primary me-1"></span>All
                                                                        </button>
                                                                    </form>
                                                                    <form action="/bisdiboard/task/{{ $project->id }}">
                                                                        <input type="hidden" name="prioritas" value="Low">
                                                                        <button type="submit" class="list-group-item list-group-item-action d-flex align-items-center">
                                                                            <span class="bullet bullet-sm bullet-success me-1"></span>Low
                                                                        </button>
                                                                    </form>
                                                                    <form action="/bisdiboard/task/{{ $project->id }}">
                                                                        <input type="hidden" name="prioritas" value="Medium">
                                                                        <button type="submit" class="list-group-item list-group-item-action d-flex align-items-center">
                                                                            <span class="bullet bullet-sm bullet-warning me-1"></span>Medium
                                                                        </button>
                                                                    </form>
                                                                    <form action="/bisdiboard/task/{{ $project->id }}">
                                                                        <input type="hidden" name="prioritas" value="High">
                                                                        <button type="submit" class="list-group-item list-group-item-action d-flex align-items-center">
                                                                            <span class="bullet bullet-sm bullet-danger me-1"></span>High
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content-right">
                                                <div class="content-wrapper container-xxl p-0">
                                                    <div class="content-header row">
                                                    </div>
                                                    <div class="content-body">
                                                        <div class="body-content-overlay"></div>
                                                        <div class="todo-app-list">
                                                            <!-- Todo search starts -->
                                                            <div class="app-fixed-search d-flex align-items-center">
                                                                <div class="sidebar-toggle d-block d-lg-none ms-1">
                                                                    <i data-feather="menu" class="font-medium-5"></i>
                                                                </div>
                                                                <div class="d-flex align-content-center justify-content-between w-100">
                                                                    <div class="input-group input-group-merge">
                                                                        <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                                                        <input type="text" class="form-control" id="todo-search" placeholder="Search task" aria-label="Search..." aria-describedby="todo-search" />
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle hide-arrow me-1" id="todoActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="todoActions">
                                                                        <a class="dropdown-item sort-asc" href="#">Sort A - Z</a>
                                                                        <a class="dropdown-item sort-desc" href="#">Sort Z - A</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Todo search ends -->

                                                            <!-- Todo List starts -->
                                                            <div class="todo-task-list-wrapper list-group">
                                                                <ul class="todo-task-list media-list" id="todo-task-list">
                                                                    @foreach ($taskss->get() as $task)
                                                                        <li class="todo-item" data-bs-toggle="modal" data-bs-target="#detail-{{ $task->id }}">
                                                                            <div class="todo-title-wrapper">
                                                                                <div class="todo-title-area">
                                                                                    @if ($task->status == 'Done')
                                                                                        <i data-feather="check-circle" class="drag-icon"></i>
                                                                                    @else
                                                                                        <i data-feather="clock" class="drag-icon"></i>
                                                                                    @endif
                                                                                    <div class="title-wrapper">
                                                                                        <span class="todo-title">{{ $task->nama }}</span>
                                                                                        <i data-feather="message-square" class="text-body font-medium-3 me-50"></i>
                                                                                        <span class="text-muted me-1">{{ $task->comment->count() }}</span>
                                                                                        @if ($task->todo->count() > 0)
                                                                                            <i data-feather="check-square" class="text-body font-medium-3 me-50"></i>
                                                                                            <span class="text-muted me-1">{{ $task->todo->count() }}/{{ $task->todo->where('status', 'checked')->count() }}</span>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="todo-item-action">
                                                                                    <div class="badge-wrapper me-1">
                                                                                        @if ($task->status == 'To Do')
                                                                                            <span class="badge rounded-pill badge-light-primary">To Do</span>
                                                                                        @elseif ($task->status == 'In Progress')
                                                                                            <span class="badge rounded-pill badge-light-info">In Progress</span>
                                                                                        @elseif ($task->status == 'On Hold')
                                                                                            <span class="badge rounded-pill badge-light-danger">On Hold</span>
                                                                                        @elseif ($task->status == 'Done')
                                                                                            <span class="badge rounded-pill badge-light-success">Done</span>
                                                                                        @endif

                                                                                        @if ($task->prioritas == 'High')
                                                                                            <span class="badge rounded-pill badge-light-danger">High</span>
                                                                                        @elseif ($task->prioritas == 'Medium')
                                                                                            <span class="badge rounded-pill badge-light-warning">Medium</span>
                                                                                        @elseif ($task->prioritas == 'Low')
                                                                                            <span class="badge rounded-pill badge-light-success">Low</span>
                                                                                        @endif
                                                                                    </div>
                                                                                    <span class="text-nowrap text-muted me-1">{{ Carbon\Carbon::now()->diffInDays($task->batas_waktu) == 0 ? 'Batas Waktu Habis' : Carbon\Carbon::now()->diffInDays($task->batas_waktu) . ' ' . 'Hari Lagi' }}</span>
                                                                                    <div class="avatar">
                                                                                        <img src="{{ asset('storage/' . $task->user->avatar) }}" alt="user-avatar" height="32" width="32" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <div class="modal fade" id="detail-{{ $task->id }}" tabindex="-1" aria-labelledby="detail{{ $task->id }}" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Detail Task</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <!-- post 1 -->
                                                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                                                            <div class="profile-user-info">
                                                                                                <h6 class="mb-0">{{ $task->nama }}</h6>
                                                                                                <small class="text-muted">Created : {{ $task->created_at->format('d-m-Y') }}</small>
                                                                                                <small class="text-muted">Due Date : {{ Carbon\Carbon::parse($task->batas_waktu)->format('d-m-Y') }}</small>
                                                                                            </div>
                                                                                        </div>
                                                                                        <p class="card-text">
                                                                                            {{ $task->deskripsi }}
                                                                                        </p>
                                                                                        <button class="btn btn-primary me-1 mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i data-feather="check-square" class="me-50"></i>
                                                                                            Add Todo
                                                                                        </button>
                                                                                        <div class="collapse mb-1" id="collapseExample">
                                                                                            <livewire:form-todo taskid="{{ $task->id }}" />
                                                                                        </div>
                                                                                        <livewire:todo-list :taskid="$task->id" />

                                                                                        <!-- like share -->
                                                                                        <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                                                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                                                                <a href="#" class="d-flex align-items-center text-muted text-nowrap">
                                                                                                    <span>Assign To</span>
                                                                                                </a>

                                                                                                <!-- avatar group with tooltip -->
                                                                                                <div class="d-flex align-items-center">
                                                                                                    <div class="avatar-group ms-1">
                                                                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="{{ $task->user->username }}" class="avatar pull-up">
                                                                                                            <img src="{{ asset('storage/' . $task->user->avatar) }}" alt="Avatar" height="26" width="26" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <a href="#" class="text-muted text-nowrap ms-50">{{ $task->user->username }}</a>
                                                                                                </div>
                                                                                                <!-- avatar group with tooltip -->
                                                                                            </div>

                                                                                            <!-- share and like count and icons -->
                                                                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                                                                <a href="#" class="text-nowrap">
                                                                                                    <i data-feather="message-square" class="text-body font-medium-3 me-50"></i>
                                                                                                    <span class="text-muted me-1">{{ $task->comment->count() }}</span>
                                                                                                </a>
                                                                                            </div>
                                                                                            <!-- share and like count and icons -->
                                                                                        </div>
                                                                                        <!-- like share -->
                                                                                        <!-- comments -->
                                                                                        @foreach ($task->comment as $comment)
                                                                                            <div class="d-flex align-items-start mb-1">
                                                                                                <div class="avatar mt-25 me-75">
                                                                                                    <img src="{{ asset('storage/' . $comment->user->avatar) }}" alt="Avatar" height="34" width="34" />
                                                                                                </div>
                                                                                                <div class="profile-user-info w-100">
                                                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                                                        <h6 class="mb-0">{{ $comment->user->username }}</h6>
                                                                                                        <a href="#">
                                                                                                            <span class="align-middle text-muted">{{ $comment->created_at->diffForhumans() }}</span>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                    <small>
                                                                                                        {{ $comment->comment }}
                                                                                                    </small>
                                                                                                    @if ($comment->file != null)
                                                                                                        <div class="d-flex flex-row align-items-center">
                                                                                                            <i data-feather="paperclip"> </i>
                                                                                                            <span><a href="{{ asset('storage/' . $comment->file) }}" target="blank"> File Lampiran</a></span>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                        <!--/ comments -->
                                                                                        <form action="/bisdiboard/comment" method="POST" enctype="multipart/form-data">
                                                                                            @csrf
                                                                                            <div class="input-group">
                                                                                                <span class="input-group-text">
                                                                                                    <label for="attach-doc" class="attachment-icon mb-0">
                                                                                                        <i data-feather="paperclip" class="cursor-pointer text-secondary"></i>
                                                                                                        <input type="file" id="attach-doc" name="file" hidden />
                                                                                                    </label>
                                                                                                </span>
                                                                                                <input type="text" class="form-control message" name="comment" placeholder="Type your message" required />
                                                                                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                                                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                                                <button class="btn btn-outline-primary" id="button-addon2" type="submit"><i data-feather="send" class="cursor-pointer text-secondary"></i></button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                    <!--/ post 1 -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal fade" id="edit{{ $task->id }}" tabindex="-1" aria-labelledby="edit{{ $task->id }}Title" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title pe-1" id="exampleModalCenterTitle">Form Edit Task</h5>
                                                                                        @if ($project->user_id == Auth::user()->id)
                                                                                            <form action="/bisdiboard/task/{{ $task->id }}" method="post" class="d-inline">
                                                                                                @method('delete')
                                                                                                @csrf
                                                                                                <a href="#" class="btn btn-outline-danger btn-sm" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus Taks ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});">
                                                                                                    <i data-feather="trash" class="me-50"></i>
                                                                                                    <span>Delete</span>
                                                                                                </a>
                                                                                            </form>
                                                                                        @endif
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <form method="POST" action="/bisdiboard/task/{{ $task->id }}">
                                                                                        @method('put')
                                                                                        @csrf
                                                                                        <div class="modal-body">
                                                                                            <div class="mb-1">
                                                                                                <label for="nama" class="form-label">Nama</label>
                                                                                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Title" required value="{{ $task->nama }}" />
                                                                                            </div>
                                                                                            <div class="mb-1">
                                                                                                <label for="task-assigned" class="form-label d-block">Assignee</label>
                                                                                                <select class="select2 form-select" id="task-assigned" name="assigned_to" required>
                                                                                                    <option value=""></option>
                                                                                                    @php
                                                                                                        $users = App\Models\User::with([
                                                                                                            'roles' => function ($query) {
                                                                                                                $query->wherein('jabatan_id', [1, 0, 4]);
                                                                                                            },
                                                                                                        ])
                                                                                                            ->select()
                                                                                                            ->get();
                                                                                                    @endphp
                                                                                                    @foreach ($users as $user)
                                                                                                        <option value="{{ $user->id }}" {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                                                                                                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" height="32" width="32" />{{ $user->username }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="mb-1">
                                                                                                <label for="task-due-date" class="form-label">Due Date</label>
                                                                                                <input type="Date" class="form-control task-due-date" id="task-due-date" name="batas_waktu" required value="{{ $task->batas_waktu }}" />
                                                                                            </div>
                                                                                            <div class="mb-1">
                                                                                                <label class="form-label" class="d-block">Priority</label>
                                                                                                <div class="form-check my-50">
                                                                                                    <input type="radio" id="validationRadio1" name="prioritas" value="High" class="form-check-input" required {{ old('prioritas', $task->prioritas) == 'High' ? 'checked' : '' }} />
                                                                                                    <label class="form-check-label" for="validationRadio1"><span class="badge rounded-pill badge-light-danger">High</span></label>
                                                                                                </div>
                                                                                                <div class="form-check my-50">
                                                                                                    <input type="radio" id="validationRadio2" name="prioritas" value="Medium" class="form-check-input" required {{ old('prioritas', $task->prioritas) == 'Medium' ? 'checked' : '' }} />
                                                                                                    <label class="form-check-label" for="validationRadio2"><span class="badge rounded-pill badge-light-warning">Medium</span></label>
                                                                                                </div>
                                                                                                <div class="form-check">
                                                                                                    <input type="radio" id="validationRadio3" name="prioritas" value="Low" class="form-check-input" required {{ old('prioritas', $task->prioritas) == 'Low' ? 'checked' : '' }} />
                                                                                                    <label class="form-check-label" for="validationRadio3"><span class="badge rounded-pill badge-light-success">Low</span></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="mb-1">
                                                                                                <label class="form-label" class="d-block">Status</label>
                                                                                                <div class="form-check my-50">
                                                                                                    <input type="radio" id="validationRadio4" name="status" value="To Do" class="form-check-input" required {{ old('status', $task->status) == 'To Do' ? 'checked' : '' }} />
                                                                                                    <label class="form-check-label" for="validationRadio4"><span class="badge rounded-pill badge-light-primary">To Do</span></label>
                                                                                                </div>
                                                                                                <div class="form-check my-50">
                                                                                                    <input type="radio" id="validationRadio5" name="status" value="In Progress" class="form-check-input" required {{ old('status', $task->status) == 'In Progress' ? 'checked' : '' }} />
                                                                                                    <label class="form-check-label" for="validationRadio5"><span class="badge rounded-pill badge-light-info">In Progress</span></label>
                                                                                                </div>
                                                                                                <div class="form-check my-50">
                                                                                                    <input type="radio" id="validationRadio6" name="status" value="On Hold" class="form-check-input" required {{ old('status', $task->status) == 'On Hold' ? 'checked' : '' }} />
                                                                                                    <label class="form-check-label" for="validationRadio6"><span class="badge rounded-pill badge-light-danger">On Hold</span></label>
                                                                                                </div>
                                                                                                <div class="form-check">
                                                                                                    <input type="radio" id="validationRadio7" name="status" value="Done" class="form-check-input" required {{ old('status', $task->status) == 'Done' ? 'checked' : '' }} />
                                                                                                    <label class="form-check-label" for="validationRadio7"><span class="badge rounded-pill badge-light-success">Done</span></label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="mb-1">
                                                                                                <label class="form-label">Description</label>
                                                                                                <textarea class="form-control" name="deskripsi" rows="3">{{ $task->deskripsi }}</textarea>
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
                                                                    @endforeach
                                                                </ul>
                                                                <div class="no-results">
                                                                    <h5>No Items Found</h5>
                                                                </div>
                                                            </div>
                                                            <!-- Todo List ends -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- / frequently asked questions tabs pills -->
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
                                <label class="form-label" for="basic-addon-name">Nama Project</label>
                                <input type="text" id="basic-addon-name" class="form-control" placeholder="Nama Project" name="nama" aria-label="Name" aria-describedby="basic-addon-name" required />
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-addon-name">Kategori</label>
                                <input type="text" id="basic-addon-name" class="form-control" placeholder="Nama Kategori" name="kategori" aria-label="Kategori" aria-describedby="basic-addon-name" required />
                            </div>
                            <div class="mb-1">
                                <label class="form-label" class="d-block">Jenis</label>
                                <div class="form-check my-50">
                                    <input type="radio" id="validationRadio3" name="jenis" value="Classified" class="form-check-input" required />
                                    <label class="form-check-label" for="validationRadio3">Classified</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="validationRadio4" name="jenis" value="Public" class="form-check-input" required />
                                    <label class="form-check-label" for="validationRadio4">Public</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <label class="d-block form-label" for="validationBioBootstrap">Deskripsi</label>
                                <textarea class="form-control" id="validationBioBootstrap" name="deskripsi" rows="3"></textarea>
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
