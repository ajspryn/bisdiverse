@extends('layouts.main')

@section('title', 'Dahsboard Admin')

@section('menu')
    @include('dosen::layouts.menu')
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
                            <h2 class="content-header-title float-start mb-0">Lihat Pengajuan Magang</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Magang</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pengajuan Magang</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- Card Advance -->


                @if ($magang)
                    <div class="row match-height">
                        <!-- Developer Meetup Card -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card card-developer-meetup">
                                <div class="meetup-img-wrapper rounded-top text-center">
                                    <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                                </div>
                                <div class="card-body">
                                    <div class="meetup-header d-flex align-items-center">
                                        <div class="meetup-day">
                                            <h6 class="mb-0">IPK</h6>
                                            <h3 class="mb-0">{{ $magang->mahasiswa->ipk }}</h3>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="card-title mb-25">{{ $magang->mahasiswa->nama }}</h4>
                                            <p class="card-text mb-0">Instansi : {{ $magang->instansi }}</p>
                                            <p class="card-text mb-0">Departemen : {{ $magang->departemen }}</p>
                                            <p class="card-text mb-0">Posisi : {{ $magang->posisi }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="user" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Pembimbing</h6>
                                            <small>{{ $magang->dosen->nama }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Alamat Instansi</h6>
                                            <small>{{ $magang->alamat_instansi }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                            <div class="avatar-content">
                                                <i data-feather="award" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="content-body">
                                            <h6 class="mb-0">Status Pengajuan</h6>
                                            <small>
                                                @if ($magang->status == 'Diajukan Mahasiswa')
                                                    <span class="badge bg-primary">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditinjau Admin Prodi')
                                                    <span class="badge bg-info">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Diverifikasi Admin Prodi')
                                                    <span class="badge bg-success">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditolak TU')
                                                    <span class="badge bg-danger">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditinjau Kaprodi')
                                                    <span class="badge bg-info">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Disetujui Kaprodi')
                                                    <span class="badge bg-success">{{ $magang->status }}</span>
                                                @elseif ($magang->status == 'Ditolak Kaprodi')
                                                    <span class="badge bg-danger">{{ $magang->status }}</span>
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center mb-1">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#suratpermohonan">lihat Surat Permohonan</button>
                                    </div>
                                    @if ($magang->status == 'Disetujui Kaprodi')
                                        <div class="text-center mb-1">
                                            <button class="btn btn-outline-danger me-1" data-bs-toggle="modal" data-bs-target="#tolak">Tolak</button>
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verifikasi">Luluskan</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--/ Developer Meetup Card -->

                        {{-- <!-- Basic pills starts -->
                        <div class="col-xl-8 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bimbingan Magang</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="bimbingan-tab" data-bs-toggle="pill" href="#bimbingan" aria-expanded="true">Bimbingan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="history-tab" data-bs-toggle="pill" href="#history" aria-expanded="false">History Pengajuan Magang</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="bimbingan" aria-labelledby="bimbingan-tab" aria-expanded="true">
                                            <p>
                                                Pastry gummi bears sweet roll candy canes topping ice cream. Candy canes fruitcake cookie carrot cake
                                                pastry. Lollipop caramels sesame snaps pie tootsie roll macaroon dessert. Muffin jujubes brownie dragée
                                                ice cream cheesecake icing. Danish brownie pastry cotton candy donut. Cheesecake donut candy canes.
                                                Jelly beans croissant bonbon cookie toffee. Soufflé croissant lemon drops tootsie roll toffee tiramisu.
                                            </p>
                                        </div>
                                        <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab" aria-expanded="false">
                                            <div class="card card-user-timeline">
                                                <div class="card-header">
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="list" class="user-timeline-title-icon"></i>
                                                        <h4 class="card-title">History Pengajuan Magang</h4>
                                                    </div>
                                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="timeline">
                                                        @foreach ($historys as $history)
                                                            <li class="timeline-item">
                                                                @if ($history->status == 'Diajukan')
                                                                    <span class="timeline-point timeline-point-primary">
                                                                        <i data-feather="user"></i>
                                                                    </span>
                                                                @elseif ($history->status == 'Ditinjau')
                                                                    <span class="timeline-point timeline-point-info">
                                                                        <i data-feather="eye"></i>
                                                                    </span>
                                                                @elseif ($history->status == 'Diverifikasi')
                                                                    <span class="timeline-point timeline-point-success">
                                                                        <i data-feather="check"></i>
                                                                    </span>
                                                                @elseif ($history->status == 'Ditolak')
                                                                    <span class="timeline-point timeline-point-danger">
                                                                        <i data-feather="x"></i>
                                                                    </span>
                                                                @elseif ($history->status == 'Disetujui')
                                                                    <span class="timeline-point timeline-point-success">
                                                                        <i data-feather="check-circle"></i>
                                                                    </span>
                                                                @endif
                                                                <div class="timeline-event">
                                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                        <h6 class="mb-50">
                                                                            @if ($history->status == 'Diajukan')
                                                                                <span class="badge bg-primary">{{ $history->status }}</span>
                                                                            @elseif ($history->status == 'Ditinjau')
                                                                                <span class="badge bg-info">{{ $history->status }}</span>
                                                                            @elseif ($history->status == 'Diverifikasi')
                                                                                <span class="badge bg-success">{{ $history->status }}</span>
                                                                            @elseif ($history->status == 'Ditolak')
                                                                                <span class="badge bg-danger">{{ $history->status }}</span>
                                                                            @elseif ($history->status == 'Disetujui')
                                                                                <span class="badge bg-success">{{ $history->status }}</span>
                                                                            @endif
                                                                            {{ $history->jabatan }}
                                                                        </h6>
                                                                        <span class="timeline-event-time">{{ $history->created_at->diffforhumans() }}</span>
                                                                    </div>
                                                                    @if (isset($history->catatan))
                                                                        <p>Catatan : {{ $history->catatan }}</p>
                                                                    @endif
                                                                    <hr />
                                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                        <div class="d-flex flex-row align-items-center">
                                                                            <span>
                                                                                <p class="mb-0">
                                                                                    {{ $history->created_at->isoformat('dddd, D MMMM Y') }}
                                                                                </p>
                                                                                <span class="text-muted">Jam :
                                                                                    {{ $history->created_at->format('H:i') }}</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Basic pills ends --> --}}

                        <!-- User Timeline Card -->
                        <div class="col-lg-8 col-12">
                            <div class="card card-user-timeline">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="list" class="user-timeline-title-icon"></i>
                                        <h4 class="card-title">History Pengajuan Magang</h4>
                                    </div>
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-body">
                                    <ul class="timeline">
                                        @foreach ($historys as $history)
                                            <li class="timeline-item">
                                                @if ($history->status == 'Diajukan')
                                                    <span class="timeline-point timeline-point-primary">
                                                        <i data-feather="user"></i>
                                                    </span>
                                                @elseif ($history->status == 'Ditinjau')
                                                    <span class="timeline-point timeline-point-info">
                                                        <i data-feather="eye"></i>
                                                    </span>
                                                @elseif ($history->status == 'Diverifikasi')
                                                    <span class="timeline-point timeline-point-success">
                                                        <i data-feather="check"></i>
                                                    </span>
                                                @elseif ($history->status == 'Ditolak')
                                                    <span class="timeline-point timeline-point-danger">
                                                        <i data-feather="x"></i>
                                                    </span>
                                                @elseif ($history->status == 'Disetujui')
                                                    <span class="timeline-point timeline-point-success">
                                                        <i data-feather="check-circle"></i>
                                                    </span>
                                                @endif
                                                <div class="timeline-event">
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6 class="mb-50">
                                                            @if ($history->status == 'Diajukan')
                                                                <span class="badge bg-primary">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Ditinjau')
                                                                <span class="badge bg-info">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Diverifikasi')
                                                                <span class="badge bg-success">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Ditolak')
                                                                <span class="badge bg-danger">{{ $history->status }}</span>
                                                            @elseif ($history->status == 'Disetujui')
                                                                <span class="badge bg-success">{{ $history->status }}</span>
                                                            @endif
                                                            {{ $history->jabatan }}
                                                        </h6>
                                                        <span class="timeline-event-time">{{ $history->created_at->diffforhumans() }}</span>
                                                    </div>
                                                    @if (isset($history->catatan))
                                                        <p>Catatan : {{ $history->catatan }}</p>
                                                    @endif
                                                    <hr />
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <span>
                                                                <p class="mb-0">
                                                                    {{ $history->created_at->isoformat('dddd, D MMMM Y') }}
                                                                </p>
                                                                <span class="text-muted">Jam :
                                                                    {{ $history->created_at->format('H:i') }}</span>
                                                            </span>
                                                        </div>
                                                        {{-- <div
                                                            class="d-flex align-items-center cursor-pointer mt-sm-0 mt-50">
                                                            <i data-feather="message-square" class="me-1"></i>
                                                            <i data-feather="phone-call"></i>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <!--/ User Timeline Card -->
                    </div>
                @endif


                <!--/ Card Advance -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Modal -->
    <div class="modal fade text-start" id="suratpermohonan" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel16">Surat Permohonan Magang</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $magang->surat_permohonan) }}" width="100%" height="500" style="border:0px"></iframe>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Accept</button>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-start" id="tolak" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Apakah Anda Yakin Ingin Menolak Magang ini ?
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/magang/bimbingan" method='POST'>
                    @csrf
                    <div class="modal-body">
                        <label>Catatan : </label>
                        <div class="mb-1">
                            <textarea class="form-control" rows="3" placeholder="Berikan Catatan Anda" name="catatan" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="Ditolak">
                    <input type="hidden" name="jabatan" value="Dosen Pembimbing">
                    <input type="hidden" name="magang_id" value="{{ $magang->id }}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-start" id="verifikasi" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Apakah Anda Yakin Ingin Meluluskan Magang ini ?
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" novalidate action="/magang/bimbingan" method='POST'>
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="nilai">Nilai Magang</label>
                                    <input type="number" id="nilai" class="form-control" name="nilai" placeholder="Masukan Nilai Magang" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="email-id-vertical">Catatan</label>
                                    <textarea class="form-control" rows="3" placeholder="Berikan Catatan Anda" name="catatan"></textarea>
                                </div>
                            </div>
                        </div>
                        {{-- <label for="nilai">Masukan Nilai Magang</label>
                        <input type="number" name="nilai" id="nilai">
                        <label>Catatan : </label>
                        <div class="mb-1">
                            <textarea class="form-control" rows="3" placeholder="Berikan Catatan Anda" name="catatan"></textarea>
                        </div> --}}
                    </div>
                    <input type="hidden" name="status" value="Magang Selesai">
                    <input type="hidden" name="jabatan" value="Dosen Pembimbing">
                    <input type="hidden" name="magang_id" value="{{ $magang->id }}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
