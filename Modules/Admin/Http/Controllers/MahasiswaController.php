<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\MahasiswaImport;
use Modules\Admin\Entities\Kelas;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Laravolt\Avatar\Facade as Avatar;
use Modules\Admin\Entities\Mahasiswa;
use Illuminate\Contracts\Support\Renderable;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::mahasiswa.index', [
            'mahasiswas' => Mahasiswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::mahasiswa.tambah', [
            'kelass' => Kelas::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if ($request->mahasiswa) {
            // return $request->file('mahasiswa');
            Excel::import(new MahasiswaImport, request()->file('mahasiswa'));
            return redirect('/admin/mahasiswa')->with('success', 'Data Mahasiswa berhasil ditambahkan');
        } else {
            $data = ([
                'nama' => 'required|unique:dosens,nama',
                'npm' => 'required|unique:dosens,kds',
                'email' => 'required|email|unique:users,email',
            ]);
            $row = $request->validate($data);
            $user_id = User::select()->where('name', $row['nama'])->get()->first();
            if (User::select()->where('name', $row['nama'])->get()->first() == null) {
                $avatar = 'avatar/avatar-' . $row['npm'] . '.png';
                if (isset($row['avatar'])) {
                    $avatar = $row['avatar']->store('avatar');
                } else {
                    Avatar::create($row['nama'])->save(storage_path(path: 'app/public/avatar/avatar-' . $row['npm'] . '.png'));
                }
                User::updateOrInsert([
                    'name' => $row['nama'],
                    'username' => $row['npm'],
                    'email' => $row['email'],
                    'password' => Hash::make($row['npm']),
                    'avatar' => $avatar,
                ]);
                $user_id = User::select()->where('name', $row['nama'])->get()->first();
                Role::updateOrInsert([
                    'user_id' => $user_id->id,
                    'role_id' => 1,
                    'jabatan_id' => 3,
                ]);
            }
            $validateData = $request->validate([
                'nama' => 'required',
                'npm' => 'required',
                'no_rfid' => 'nullable',
                'no_rfid_cadangan' => 'nullable',
                'tahun_masuk' => 'nullable',
                'kelas' => 'nullable',
                'kelas_ujian' => 'nullable',
                'no_ktp' => 'nullable',
                'alamat' => 'nullable',
                'provinsi' => 'nullable',
                'kabkota' => 'nullable',
                'kecamatan' => 'nullable',
                'desa' => 'nullable',
                'rt' => 'nullable',
                'rw' => 'nullable',
                'kode_pos' => 'nullable',
                'no_telp' => 'nullable',
                'tempat_lahir' => 'nullable',
                'tgl_lahir' => 'nullable',
                'ibu_kandung' => 'nullable',
                'nama_ot' => 'nullable',
                'hubungan_ot' => 'nullable',
                'no_telp_ot' => 'nullable',
                'asal_sekolah' => 'nullable',
            ]);

            $input = $validateData;
            $input['user_id'] = $user_id->id;
            Mahasiswa::create($input);
            return redirect('/admin/mahasiswa')->with('success', 'Data Mahasiswa berhasil ditambahkan');
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
        return view('admin::mahasiswa.edit', [
            'kelass' => Kelas::all(),
            'mahasiswas' => Mahasiswa::all(),
            //             'daftar' => Rfid::select()->where('id', $id)->get()->first(),
            'mahasiswa' => Mahasiswa::select()->where('id', $id)->get()->first(),
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
        $rules = [
            'nama' => 'required',
            'npm' => 'required',
            'no_rfid' => 'nullable',
            'no_rfid_cadangan' => 'nullable',
            'tahun_masuk' => 'nullable',
            'kelas' => 'required',
            'kelas_ujian' => 'nullable',
            'no_ktp' => 'nullable',
            'alamat' => 'nullable',
            'provinsi' => 'nullable',
            'kabkota' => 'nullable',
            'kecamatan' => 'nullable',
            'desa' => 'nullable',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'kode_pos' => 'nullable',
            'no_telp' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tgl_lahir' => 'nullable',
            'ibu_kandung' => 'nullable',
            'nama_ot' => 'nullable',
            'hubungan_ot' => 'nullable',
            'no_telp_ot' => 'nullable',
            'asal_sekolah' => 'nullable',
        ];

        $input = $request->validate($rules);

        Mahasiswa::where('id', $id)
            ->update($input);
        return redirect('/admin/mahasiswa')->with('success', 'Data Mahasiswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::with('user')->select()->where('id', $id)->get()->first();
        if ($mahasiswa->user) {
            Role::destroy('user_id', $mahasiswa->user->id);
            User::destroy('id', $mahasiswa->user->id);
        }
        Mahasiswa::destroy('id', $id);
        return redirect('/admin/mahasiswa')->with('success', 'Data berhasil di Hapus');
    }
}
