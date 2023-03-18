<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
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
        // return $request['user_id'];
        if ($request->jabatan_id == 0) {
            $role_id = 0;
        } else {
            $role_id = 1;
        }
        if (Role::where('user_id', $request->user_id)->get()->count() > 0) {
            Role::where('user_id', $request->user_id)->update([
                'role_id' => $role_id,
                'divisi_id' => 0,
                'jabatan_id' => $request->jabatan_id,
            ]);
        } else {
            Role::create([
                'user_id' => $request->user_id,
                'role_id' => $role_id,
                'divisi_id' => 0,
                'jabatan_id' => $request->jabatan_id,
            ]);
        }
        return back()->with('success', 'Sekarang Menjadi Admin Prodi');
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
