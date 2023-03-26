<?php

namespace Modules\Bisdiboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Bisdiboard\Entities\BoardTodo;
use Illuminate\Contracts\Support\Renderable;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //
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
        Log::info('Data berhasil disimpan: ' . json_encode($request));
        $request->validate([
            'task_id' => 'required',
            'todo' => 'required',
        ]);
        $input = $request->all();
        BoardTodo::create($input);
        // $this->dispatchBrowserEvent('todoAdded');
        return response()->json(['message' => 'Data berhasil disimpan.']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $todos = BoardTodo::where('task_id', $id)->get();
        return response()->json($todos);
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
        //
    }
}
