<?php

namespace Modules\Admin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Magang\Entities\Magang;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function jadwal_ujian()
    {
        return $this->hasMany(JadwalUjian::class, 'dosen_kds', 'kds');
    }

    public function matkul()
    {
        return $this->hasMany(Matkul::class, 'dosen_kds', 'kds');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function bimbingan_magang()
    {
        return $this->hasMany(Magang::class, 'dosen_kds', 'kds');
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\DosenFactory::new();
    }
}
