<?php

namespace App\Imports;

use App\Models\Role;
use App\Models\User;
use Modules\Admin\Entities\Dosen;
use Illuminate\Support\Facades\Hash;
use Laravolt\Avatar\Facade as Avatar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user_id = User::select()->where('name', $row['nama'])->get()->first();
        if (User::select()->where('name', $row['nama'])->get()->first() == null) {
            $avatar = 'avatar/avatar-' . $row['kds'] . '.png';
            if (isset($row['avatar'])) {
                $avatar = $row['avatar']->store('avatar');
            } else {
                Avatar::create($row['nama'])->save(storage_path(path: 'app/public/avatar/avatar-' . $row['kds'] . '.png'));
            }
            User::updateOrInsert([
                'name' => $row['nama'],
                'username' => $row['kds'],
                'email' => $row['email'],
                'password' => Hash::make('dosenunpak'),
                'avatar' => $avatar,
            ]);
            $user_id = User::select()->where('name', $row['nama'])->get()->first();
            Role::updateOrInsert([
                'user_id' => $user_id->id,
                'role_id' => 1,
                'jabatan_id' => 2,
            ]);
        }
        if (Dosen::select()->where('kds', $row['kds'])->get()->first() == null) {
            Dosen::updateOrInsert([
                'nama' => $row['nama'],
                'kds' => $row['kds'],
                'nidn_nidk' => $row['nidn_nidk'],
                'user_id' => $user_id->id,
            ]);
        }
        // return new Dosen([
        //     'nama' => $row['nama'],
        //     'kds' => $row['kds'],
        //     'nidn_nidk' => $row['nidn_nidk'],
        // ]);
    }
}
