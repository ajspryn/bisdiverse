<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Admin\Entities\KrsMahasiswa;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KrsMahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        KrsMahasiswa::updateOrInsert([
            'mahasiswa_npm' => $row['mahasiswa_npm'],
            'kelas' => $row['kelas'],
            'kelas_ujian' => $row['kelas_ujian'],
            'matkul_kode' => $row['matkul_kode'],
            'dosen_kds' => $row['dosen_kds'],
        ]);
        // return new KrsMahasiswa([
        //     //
        // ]);
    }
}
