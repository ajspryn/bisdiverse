<?php

namespace Modules\Magang\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Dosen;
use Illuminate\Routing\Controller;
use Modules\Magang\Entities\Magang;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Mahasiswa;
use Illuminate\Contracts\Support\Renderable;
use Modules\Magang\Entities\HistoryPengajuanMagang;

class BimbinganMagangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dosen = Dosen::select()->where('user_id', Auth::user()->id)->get()->first();
        return view('dosen::bimbingan_magang.index', [
            'dosen' => Dosen::select()->where('user_id', Auth::user()->id)->get()->first(),
            'mahasiswas' => Magang::select()->whereIn('status', ['Disetujui Kaprodi'])->where('dosen_kds', $dosen->kds)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('magang::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $magang = Magang::where('id', $id)->get()->first();
        $mahasiswa = Mahasiswa::select()->where('npm', $magang->mahasiswa_npm)->get()->first();
        return view('dosen::bimbingan_magang.detail', [
            'magang' => $magang,
            'mahasiswa' => $mahasiswa,
            'historys' => HistoryPengajuanMagang::select()->where('magang_id', $magang->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('magang::edit');
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
