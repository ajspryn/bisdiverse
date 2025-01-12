@extends('layouts.main')

@section('title', 'Dahsboard BisdiEvent')

@section('menu')
    @include('bisdievent::layouts.menu')
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
                            <h2 class="content-header-title mb-0">BisdiEvent</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                            <i data-feather="plus"></i>
                        </button>
                        <div class="modal fade text-start" id="tambah" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel16">Tambah Event</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="form form-vertical" action="/bisdievent/event" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="first-name-vertical">Nama Event</label>
                                                        <input type="text" id="first-name-vertical" class="form-control" name="nama" placeholder="Nama Event" required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="tgl-vertical">Tanggal Event</label>
                                                        <input type="date" id="tgl-vertical" class="form-control" name="tgl_event" placeholder="Tanggal Event" required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="keterangan-vertical">Keterangan</label>
                                                        <input type="text" id="keterangan-vertical" class="form-control" name="keterangan" placeholder="Keterangan" required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="alamat-vertical">Alamat</label>
                                                        <input type="text" id="alamat-vertical" class="form-control" name="alamat" placeholder="Alamat" required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="Flayer-vertical">Flayer</label>
                                                        <input type="file" id="Flayer-vertical" class="form-control" name="flayer" placeholder="Flayer" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Knowledge base -->
                <section id="knowledge-base-content">
                    <div class="row kb-search-content-info match-height">
                        @foreach ($events as $event)
                            @php
                                $tanggal = Carbon\Carbon::createFromFormat('Y-m-d', $event->tgl_event);
                            @endphp
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="card card-developer-meetup">
                                    <div class="meetup-img-wrapper rounded-top text-center">
                                        <img src="../../../app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                                    </div>
                                    <div class="card-body">
                                        <div class="meetup-header d-flex align-items-center">
                                            <div class="meetup-day">
                                                <h6 class="mb-0">{{ $tanggal->translatedFormat('D') }}</h6>
                                                <h3 class="mb-0">{{ $tanggal->translatedFormat('d') }}</h3>
                                            </div>
                                            <div class="my-auto">
                                                <h4 class="card-title mb-25">{{ $event->nama }}</h4>
                                                <p class="card-text mb-0">{{ $event->keterangan }}</p>
                                            </div>
                                            <div class="ms-auto">
                                                <button type="button" class="btn btn-icon btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit{{ $event->id }}">
                                                    <i data-feather="edit"></i>
                                                </button>
                                                <div class="modal fade text-start" id="edit{{ $event->id }}" tabindex="-1" aria-labelledby="myModalLabel16" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel16">Tambah Event</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form class="form form-vertical" action="/bisdievent/event/{{ $event->id }}" enctype="multipart/form-data" method="POST">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label" for="first-name-vertical">Nama Event</label>
                                                                                <input type="text" id="first-name-vertical" class="form-control" name="nama" placeholder="Nama Event" value="{{ $event->nama }}" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label" for="tgl-vertical">Tanggal Event</label>
                                                                                <input type="date" id="tgl-vertical" class="form-control" name="tgl_event" placeholder="Tanggal Event" value="{{ $event->tgl_event }}" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label" for="keterangan-vertical">Keterangan</label>
                                                                                <input type="text" id="keterangan-vertical" class="form-control" name="keterangan" placeholder="Keterangan" value="{{ $event->keterangan }}" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label" for="alamat-vertical">Alamat</label>
                                                                                <input type="text" id="alamat-vertical" class="form-control" name="alamat" placeholder="Alamat" value="{{ $event->alamat }}" required />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label" for="Flayer-vertical">Flayer</label>
                                                                                <input type="file" id="Flayer-vertical" class="form-control" name="flayer" placeholder="Flayer" />
                                                                                <input type="hidden" value="{{ $event->flayer }}" name="flayer_lama" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="/bisdievent/event/{{ $event->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-icon btn-danger" onclick="return Swal.fire({title:'Apakah Anda yakin ingin menghapus data ini?',icon:'warning',showCancelButton:true,confirmButtonText:'Ya',cancelButtonText:'Tidak',reverseButtons:true}).then((result) => {if (result.isConfirmed) {this.closest('form').submit();} else {return false;}});">
                                                        <i data-feather="trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="mt-0">
                                            <div class="avatar float-start bg-light-primary rounded me-1">
                                                <div class="avatar-content">
                                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                                </div>
                                            </div>
                                            <div class="more-info">
                                                <small class="mb-0">Tanggal Event</small>
                                                <h6>{{ $tanggal->translatedFormat('d-M-Y') }}</h6>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="avatar float-start bg-light-primary rounded me-1">
                                                <div class="avatar-content">
                                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                                </div>
                                            </div>
                                            <div class="more-info">
                                                <small class="mb-0">Lokasi</small>
                                                <h6>{{ $event->alamat }}</h6>
                                            </div>
                                        </div>
                                        <div class="d-grid col-lg-12 col-md-12 mb-1 mt-1 mb-lg-0">
                                            <a href="/bisdievent/event/{{ Illuminate\Support\Facades\Crypt::encrypt($event->id) }}" type="button" class="btn btn-primary">
                                                <i data-feather="eye" class="me-25"></i>
                                                <span>Lihat</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <!-- Knowledge base ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
