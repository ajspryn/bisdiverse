<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Dosen;
use Modules\Admin\Entities\Mahasiswa;

class UserMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user_id = request('user');
        return view('admin::user.mahasiswa', [
            'user' => User::select()->where('id', $user_id)->get()->first(),
            'mahasiswas' => Mahasiswa::select()->where('user_id', null)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        $rules = [
            'user_id' => 'required',
        ];

        $input = $request->validate($rules);

        Mahasiswa::where('id', $request->mahasiswa_id)
            ->update($input);
        Role::create([
            'user_id' => $request->user_id,
            'role_id' => 1,
            'jabatan_id' => 3,
        ]);
        return redirect('/admin/user-mahasiswa')->with('success', 'Data User Mahasiswa Berhasil Ditambahkan');
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
    public function destroy(Request $request, $id)
    {
        // return $request;
        if ($request->jabatan_id == 1) {
            Dosen::where('user_id', $id)->update(['user_id' => null]);
            Role::destroy('user_id', $id);
            // Dosen::destroy('user_id', $id);
        } elseif ($request->jabatan_id == 2) {
            Dosen::where('user_id', $id)->update(['user_id' => null]);
            Role::destroy('user_id', $id);
            // Dosen::destroy('user_id', $id);
        } elseif ($request->jabatan_id == 3) {
            Mahasiswa::where('user_id', $id)->update(['user_id' => null]);
            Role::destroy('user_id', $id);
            // Mahasiswa::destroy('user_id', $id);
        }
        User::destroy('id', $id);
        return redirect()->back()->with('success', 'Data berhasil di Hapus');
    }
}
