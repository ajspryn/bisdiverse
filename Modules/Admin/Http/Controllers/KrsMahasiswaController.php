<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Kelas;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Matkul;
use App\Imports\KrsMahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Mahasiswa;
use Modules\Admin\Entities\KrsMahasiswa;
use Illuminate\Contracts\Support\Renderable;

class KrsMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::krs.create', [
            'kelass' => Kelas::all(),
            'mahasiswas' => Mahasiswa::all(),
            'matkuls' => Matkul::all(),
            'dosens' => Dosen::all(),
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
        // return $request;
        if ($request->file('upload_file')) {
            Excel::import(new KrsMahasiswaImport, request()->file('upload_file'));
            // Excel::import(new StokProductImport, request()->file('upload_file'));
            return redirect()->back()->with('success', 'Data KRS Berhasil Di Simpan');
        }
        $npm = $request->mahasiswa_npm;
        KrsMahasiswa::where('mahasiswa_npm', $npm)->delete();
        if ($request->krs) {
            foreach ($request->krs as $data) {
                $input = $data;
                $input['mahasiswa_npm'] = $npm;
                KrsMahasiswa::create($input);
            }
        }

        return redirect()->back()->with('success', 'Data KRS Berhasil Di Simpan');
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
