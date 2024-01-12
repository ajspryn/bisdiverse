<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EduLink\Entities\EduLink;
use Illuminate\Contracts\Support\Renderable;

class EduLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::edulink.create', []);
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
        // $request->validate([
        //     'mahasiswa_npm' => 'required',
        //     'semester' => 'required',
        //     'tahun' => 'required',
        //     'dokumen' => 'required',
        // ]);

        if ($request->krs) {
            foreach ($request->krs as $data) {
                $input = $data;
                // dd($input['dokumen']);
                $input['mahasiswa_npm'] = $input['mahasiswa_npm'];
                $input['tahun'] = $input['tahun'];
                $input['semester'] = $input['semester'];

                if ($input['dokumen']) {
                    $input['dokumen'] = $input['dokumen']->store('dokumen-edulink');
                }
                EduLink::create($input);
            }
        }

        return redirect()->back()->with('success', 'Data Berhasil Di Simpan');
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
