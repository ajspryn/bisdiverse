<?php

namespace Modules\Bisdiboard\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Bisdiboard\Entities\Tasks;

class TaskController extends Controller
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
            "assigned_to" => "required",
            "deskripsi" => "nullable",
            "batas_waktu" => "required",
            "prioritas" => "required",
            "project_id" => "required",
        ]);

        $input = $request->all();
        $input['status'] = 'Todo';
        Tasks::create($input);
        return back()->with('success', 'Task Baru Telah Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('bisdiboard::task', [
            'tasks' => Tasks::with('user')->select()->where('project_id', $id)->get(),
            'project' => $id,
        ]);
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
        // return $request;
        $data = [
            "nama" => "required",
            "assigned_to" => "required",
            "deskripsi" => "nullable",
            "batas_waktu" => "required",
            "prioritas" => "required",
            "status" => "required",
        ];

        $input = $request->validate($data);
        Tasks::where('id', $id)->update($input);
        return back()->with('success', 'Task Berhasil Diedit');
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
