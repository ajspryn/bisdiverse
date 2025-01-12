<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Kelas;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Matkul;
use Modules\Admin\Entities\Presensi;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\KrsMahasiswa;
use Modules\Admin\Entities\Mahasiswa;

class RekapPresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $rekap = null;
        $mahasiswa = null;
        if (Request('matkul') && Request('kelas') && Request('tanggal')) {
            $rekap = Presensi::select()->where('matkul_kode', Request('matkul'))->where('kelas', Request('kelas'))->wheredate('created_at', Request('tanggal'))->orderBy('npm', 'asc')->get();
            $mahasiswa = KrsMahasiswa::with('mahasiswa')->where('kelas', Request('kelas'))->where('matkul_kode', Request('matkul'))->orderBy('mahasiswa_npm', 'asc')->get();
            // $mahasiswa = Mahasiswa::select()->where('kelas', Request('kelas'))->where('tahun_masuk', Request('tahun'))->orderBy('nama', 'asc')->get();
        }
        // return $mahasiswa->presensi;
        return view('admin::rekap-presensi.index', [
            'kelass' => Kelas::all(),
            'matkuls' => Matkul::all(),
            'presensis' => $rekap,
            'mahasiswas' => $mahasiswa,
        ]);
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
