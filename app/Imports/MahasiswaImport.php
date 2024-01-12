<?php

namespace App\Imports;

use App\Models\Role;
use App\Models\User;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Admin\Entities\Kelas;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (Kelas::select()->where('kelas', $row['kelas'])->where('tahun', $row['tahun_masuk'])->get()->first() == null) {
            Kelas::updateOrInsert([
                'kelas' => $row['kelas'],
                'tahun' => $row['tahun_masuk'],
            ]);
        }
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
        if (Mahasiswa::select()->where('npm', $row['npm'])->get()->first() == null) {
            Mahasiswa::updateOrInsert([
                'nama' => $row['nama'],
                'npm' => $row['npm'],
                'no_rfid' => $row['no_rfid'],
                'no_rfid_cadangan' => $row['no_rfid_cadangan'],
                'tahun_masuk' => $row['tahun_masuk'],
                'kelas' => $row['kelas'],
                'kelas_ujian' => $row['kelas_ujian'],
                'konsentrasi' => $row['konsentrasi'],
                'ipk' => $row['ipk'],
                'no_ktp' => $row['no_ktp'],
                'alamat' => $row['alamat'],
                'provinsi' => $row['provinsi'],
                'kabkota' => $row['kabkota'],
                'kecamatan' => $row['kecamatan'],
                'desa' => $row['desa'],
                'rt' => $row['rt'],
                'rw' => $row['rw'],
                'kode_pos' => $row['kode_pos'],
                'no_telp' => $row['no_telp'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tgl_lahir' => $row['tgl_lahir'],
                'ibu_kandung' => $row['ibu_kandung'],
                'nama_ot' => $row['nama_ot'],
                'hubungan_ot' => $row['hubungan_ot'],
                'no_telp_ot' => $row['no_telp_ot'],
                'asal_sekolah' => $row['asal_sekolah'],
                'user_id' => $user_id->id
            ]);
        }
        // return new Mahasiswa([
        //     'nama' => $row['nama'],
        //     'npm' => $row['npm'],
        //     'no_rfid' => $row['no_rfid'],
        //     'no_rfid_cadangan' => $row['no_rfid_cadangan'],
        //     'tahun_masuk' => $row['tahun_masuk'],
        //     'kelas' => $row['kelas'],
        //     'kelas_ujian' => $row['kelas_ujian'],
        //     'konsentrasi' => $row['konsentrasi'],
        //     'ipk' => $row['ipk'],
        //     'no_ktp' => $row['no_ktp'],
        //     'alamat' => $row['alamat'],
        //     'provinsi' => $row['provinsi'],
        //     'kabkota' => $row['kabkota'],
        //     'kecamatan' => $row['kecamatan'],
        //     'desa' => $row['desa'],
        //     'rt' => $row['rt'],
        //     'rw' => $row['rw'],
        //     'kode_pos' => $row['kode_pos'],
        //     'no_telp' => $row['no_telp'],
        //     'tempat_lahir' => $row['tempat_lahir'],
        //     'tgl_lahir' => $row['tgl_lahir'],
        //     'ibu_kandung' => $row['ibu_kandung'],
        //     'nama_ot' => $row['nama_ot'],
        //     'hubungan_ot' => $row['hubungan_ot'],
        //     'no_telp_ot' => $row['no_telp_ot'],
        //     'asal_sekolah' => $row['asal_sekolah']
        // ]);
    }
}
