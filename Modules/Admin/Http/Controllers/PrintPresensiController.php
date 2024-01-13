<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Presensi;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Admin\Entities\JadwalUjian;
use Illuminate\Contracts\Support\Renderable;

class PrintPresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // return request('tahun');
        $jadwal_ujian = JadwalUjian::select()->where('matkul_kode', Request('matkul'))->get()->first();
        // return $jadwal_ujian->tgl_ujian;
        if ($jadwal_ujian) {
            $str_tgl_ujian = strtotime($jadwal_ujian->tgl_ujian);
            $tgl_ujian = strtotime($str_tgl_ujian);
            $tanggal = Carbon::parse($tgl_ujian);
            $rekap = Presensi::select()->where('matkul_kode', Request('matkul'))->where('kelas', Request('kelas'))->wheredate('created_at', Request('tanggal'))->orderBy('npm', 'asc')->get();
            $mahasiswa = Mahasiswa::select()->where('kelas', Request('kelas'))->where('tahun_masuk', Request('tahun'))->orderBy('npm', 'asc')->get();
            return view('admin::print.rekap_presensi', [
                // 'presensis' => Presensi::select()->where('matkul_kode', Request('matkul'))->where('kelas', Request('kelas'))->wheredate('created_at', Request('tanggal'))->orderBy('npm', 'asc')->get(),
                'ujian' => JadwalUjian::select()->where('matkul_kode', Request('matkul'))->where('kelas', Request('kelas'))->where('tahun', Request('tahun'))->wheredate('tgl_ujian', Request('tanggal'))->get()->first(),
                'tgl_ujian' => Carbon::parse($jadwal_ujian->tgl_ujian),
                'presensis' => $rekap,
                'mahasiswas' => $mahasiswa,
            ]);
        } else {
            return view('admin::rekap-presensi.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
