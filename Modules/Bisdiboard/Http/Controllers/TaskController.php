<?php

namespace Modules\Bisdiboard\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Bisdiboard\Entities\BoardTask;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

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

        $assigne = User::select()->where('id', $request->assigned_to)->get()->first();

        $toEmail = $assigne->email;
        $subject = 'Anda Memiliki Taks Baru Di BisdiBoard';

        Mail::send('bisdiboard::emails.task-reminder', [
            'nama' => $assigne->name,
            'task' => $request->nama,
            'prioritas' => $request->prioritas,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu
        ], function ($message) use ($toEmail, $subject) {
            $message->to($toEmail)
                ->subject($subject);
        });

        $input = $request->all();
        $input['status'] = 'To Do';
        BoardTask::create($input);
        return back()->with('success', 'Task Baru Telah Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        if (request('prioritas')) {
            $tasks = BoardTask::with('user')->select()->where('project_id', $id)->where('prioritas', request('prioritas'))->get();
        } else {
            $tasks = BoardTask::with('user')->select()->where('project_id', $id)->get();
        }
        return view('bisdiboard::task', [
            'tasks' => $tasks,
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
        BoardTask::where('id', $id)->update($input);
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
