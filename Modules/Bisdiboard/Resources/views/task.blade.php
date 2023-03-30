@extends('layouts.main')

@section('title', 'Dahsboard Admin')

@section('menu')
    @include('bisdiboard::layouts.menu')
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
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
                        </div>
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
                                    @foreach ($tasks as $task)
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
                                                    @if ($task->project[0]->user_id == Auth::user()->id || $task->assigned_to == Auth::user()->id)
                                                        <div class="me-1">
                                                            <button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $task->id }}"><i data-feather="edit"></i>Edit</button>
                                                        </div>
                                                    @endif
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
                                                        <div class="card">
                                                            <div class="card-content" id="todo-list">
                                                                <div class="card-body">
                                                                    <livewire:todo-list :taskid="$task->id" />
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                                    <input type="radio" id="validationRadio3" name="prioritas" value="High" class="form-check-input" required {{ old('prioritas', $task->prioritas) == 'High' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="validationRadio3"><span class="badge rounded-pill badge-light-danger">High</span></label>
                                                                </div>
                                                                <div class="form-check my-50">
                                                                    <input type="radio" id="validationRadio4" name="prioritas" value="Medium" class="form-check-input" required {{ old('prioritas', $task->prioritas) == 'Medium' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="validationRadio3"><span class="badge rounded-pill badge-light-warning">Medium</span></label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="validationRadio5" name="prioritas" value="Low" class="form-check-input" required {{ old('prioritas', $task->prioritas) == 'Low' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="validationRadio4"><span class="badge rounded-pill badge-light-success">Low</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-1">
                                                                <label class="form-label" class="d-block">Status</label>
                                                                <div class="form-check my-50">
                                                                    <input type="radio" id="validationRadio3" name="status" value="To Do" class="form-check-input" required {{ old('status', $task->status) == 'To Do' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="validationRadio3"><span class="badge rounded-pill badge-light-primary">To Do</span></label>
                                                                </div>
                                                                <div class="form-check my-50">
                                                                    <input type="radio" id="validationRadio4" name="status" value="In Progress" class="form-check-input" required {{ old('status', $task->status) == 'In Progress' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="validationRadio3"><span class="badge rounded-pill badge-light-info">In Progress</span></label>
                                                                </div>
                                                                <div class="form-check my-50">
                                                                    <input type="radio" id="validationRadio5" name="status" value="On Hold" class="form-check-input" required {{ old('status', $task->status) == 'On Hold' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="validationRadio4"><span class="badge rounded-pill badge-light-danger">On Hold</span></label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input type="radio" id="validationRadio5" name="status" value="Done" class="form-check-input" required {{ old('status', $task->status) == 'Done' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="validationRadio4"><span class="badge rounded-pill badge-light-success">Done</span></label>
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
    <!-- END: Content-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/bisdiboard/task">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Title" required />
                            <div class="invalid-feedback">Wajib Diisi.</div>
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
                                    <option value="{{ $user->id }}">
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" height="32" width="32" />{{ $user->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="task-due-date" class="form-label">Due Date</label>
                            <input type="Date" class="form-control task-due-date" id="task-due-date" name="batas_waktu" required />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" class="d-block">Priority</label>
                            <div class="form-check my-50">
                                <input type="radio" id="validationRadio3" name="prioritas" value="High" class="form-check-input" required />
                                <label class="form-check-label" for="validationRadio3"><span class="badge rounded-pill badge-light-danger">High</span></label>
                            </div>
                            <div class="form-check my-50">
                                <input type="radio" id="validationRadio4" name="prioritas" value="Medium" class="form-check-input" required />
                                <label class="form-check-label" for="validationRadio3"><span class="badge rounded-pill badge-light-warning">Medium</span></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="validationRadio5" name="prioritas" value="Low" class="form-check-input" required />
                                <label class="form-check-label" for="validationRadio4"><span class="badge rounded-pill badge-light-success">Low</span></label>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
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
