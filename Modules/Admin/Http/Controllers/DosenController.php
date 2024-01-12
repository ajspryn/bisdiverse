<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Dosen;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Contracts\Support\Renderable;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::dosen.index', [
            'dosens' => Dosen::all(),
        ]);
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
        if ($request->dosen) {
            Excel::import(new DosenImport, request()->file('dosen'));
            return redirect()->back()->with('success', 'Data Dosen Berhasil Ditambahkan');
        } else {
            $data = ([
                'nama' => 'required|unique:dosens,nama',
                'kds' => 'required|unique:dosens,kds',
                'email' => 'required|email|unique:users,email',
                'nidn_nidk' => 'nullable',
            ]);
            $row = $request->validate($data);
            $avatar = 'avatar/avatar-' . $row['kds'] . '.png';
            if (isset($row['avatar'])) {
                $avatar = $row['avatar']->store('avatar');
            } else {
                Avatar::create($row['nama'])->save(storage_path(path: 'app/public/avatar/avatar-' . $row['kds'] . '.png'));
            }
            User::updateOrInsert([
                'name' => $request->nama,
                'username' => $request->kds,
                'email' => $request->email,
                'password' => Hash::make('dosenunpak'),
                'avatar' => $avatar,
            ]);
            $user_id = User::select()->where('name', $request->nama)->get()->first();
            Role::updateOrInsert([
                'user_id' => $user_id->id,
                'role_id' => 1,
                'jabatan_id' => 2,
            ]);

            $request->validate([
                'nama' => 'required',
                'kds' => 'required',
                'nidn_nidk' => 'nullable',
            ]);

            $input = $request->all();
            $input['user_id'] = $user_id->id;

            Dosen::create($input);
            return redirect()->back()->with('success', 'Data Dosen Berhasil Ditambahkan');
        }
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
        return view('admin::dosen.edit', [
            'dosen' => Dosen::select()->where('id', $id)->get()->first(),
        ]);
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
        $rules = [
            'nama' => 'required',
            'kds' => 'required',
            'nidn_nidk' => 'nullable',
        ];

        $input = $request->validate($rules);

        Dosen::where('id', $id)
            ->update($input);
        return redirect('/admin/dosen')->with('success', 'Data Dosen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $dosen = Dosen::with('user')->select()->where('id', $id)->get()->first();
        // return $dosen->user;
        if ($dosen->user) {
            Role::destroy('user_id', $dosen->user->id);
            User::destroy('id', $dosen->user->id);
        }
        // Dosen::where('id', $id)->update(['user_id' => null]);
        Dosen::destroy('id', $id);
        return redirect()->back()->with('success', 'Data berhasil di Hapus');
    }
}
