<?php

namespace Modules\EduLink\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Mahasiswa;

class EduLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $npm = request('npm');
        $cek_npm = Mahasiswa::select()->where('npm', $npm)->get()->first();
        $response = 'succes';
        $title = 'Data Mahasiswa Terdaftar';
        $mahasiswa = $cek_npm;
        // return $npm;
        if ($npm == null) {
            $response = ' ';
        };
        if ($cek_npm == null && $npm) {
            $response = 'error';
            $title = 'Maaf NPM Mahasiswa Belum Terdaftar';
        };
        // return $response;
        return view('edulink::index', [
            'response' => $response,
            'title' => $title,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('edulink::create');
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
        return view('edulink::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('edulink::edit');
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
