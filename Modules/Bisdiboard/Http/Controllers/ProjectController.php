<?php

namespace Modules\Bisdiboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Bisdiboard\Entities\Project;
use Illuminate\Contracts\Support\Renderable;
use Modules\Bisdiboard\Entities\BoardProject;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('bisdiboard::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('bisdiboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            "nama" => "required",
            "jenis" => "required",
            "kategori" => "required",
            "deskripsi" => "required",
            "tgl_mulai" => "required",
            "tgl_selesai" => "required",
        ]);

        $input = $request->all();
        $input['status'] = 'Active';
        $input['user_id'] = Auth::user()->id;
        BoardProject::create($input);
        return back()->with('success', 'Project Baru Telah Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('bisdiboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('bisdiboard::edit');
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
        BoardProject::destroy('id', $id);
        return redirect()->back()->with('success', 'Project berhasil di Hapus');
    }
}
