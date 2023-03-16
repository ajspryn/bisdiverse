<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Dosen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Mahasiswa;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\Form\Entities\SkpdPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $data_debiturumkm;
        $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();
        $data = null;
        $extend = ' ';
        if (isset($role)) {
            if ($role->jabatan_id == 0) {
                $data = null;
                $extend = 'admin::';
            } elseif ($role->jabatan_id == 1) {
                $data = Dosen::select()->where('user_id', Auth::user()->id)->get()->first();
                $extend = 'kaprodi::';
            } elseif ($role->jabatan_id == 2) {
                $data = Dosen::select()->where('user_id', Auth::user()->id)->get()->first();
                $extend = 'dosen::';
            } elseif ($role->jabatan_id == 3) {
                $data = Mahasiswa::select()->where('user_id', Auth::user()->id)->get()->first();
                $extend = 'mahasiswa::';
            } else {
                $data = null;
                $extend = ' ';
            }
        }
        return view('profile', [
            'role' => $role,
            'user' => User::select()->where('id', Auth::user()->id)->get()->first(),
            'data' => $data,
            'extend' => $extend,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        if ($request->code == 1) {
            // $cek = Hash::check($request->password, Auth::user()->password);
            // dd(Hash::check($request->password, Auth::user()->password));
            if (Hash::check($request->password, Auth::user()->password)) {
                User::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'email' => $request->email,
                    ]);
                return redirect()->back()->with('success', 'Data Diri Berhasil Diubah');
            } else {
                Alert::error('Error', 'Password Yang Anda Masukan Salah.');
                return redirect()->back();
                // return back()->with('errors', 'Password Yang Anda Masukan Salah');
            }
        } elseif ($request->code == 2) {
            // $cek = Hash::check($request->password_lama, Auth::user()->password);
            // return $cek;
            if (Hash::check($request->password_lama, Auth::user()->password)) {
                User::where('id', $id)
                    ->update([
                        'password' => Hash::make($request->password_baru)
                    ]);
                return redirect()->back()->with('success', 'Password Berhasil Diubah');
            } else {
                Alert::error('Error', 'Password Yang Anda Masukan Salah.');
                return redirect()->back();
            }
        } elseif ($request->code == 3) {
            if ($request->file('avatar')) {
                if ($request->avatar_lama) {
                    Storage::delete($request->avatar_lama);
                }
                $input = $request->file('avatar')->store('avatar');
                User::where('id', $id)
                    ->update([
                        'avatar' => $input,
                    ]);
            }
            return redirect()->back()->with('success', 'Foto Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
