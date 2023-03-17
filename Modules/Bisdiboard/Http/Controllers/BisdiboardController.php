<?php

namespace Modules\Bisdiboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Bisdiboard\Entities\BoardTask;
use Illuminate\Contracts\Support\Renderable;
use Modules\Bisdiboard\Entities\BoardProject;

class BisdiboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $classified = BoardProject::whereHas('task', function ($query) use ($user_id) {
            $query->where('assigned_to', $user_id);
        })->with('task')->where('jenis', 'Classified')->get();
        $public = BoardProject::with('task')->select()->where('user_id', $user_id)->get();
        // return $classified;
        return view('bisdiboard::dashboard', [
            'projects' => $classified->Merge($public),
        ]);
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
        return $request;
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
        //
    }
}
