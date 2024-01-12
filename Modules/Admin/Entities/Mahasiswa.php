<?php

namespace Modules\Admin\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EduLink\Entities\EduLink;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function krs()
    {
        return $this->hasMany(KrsMahasiswa::class, 'mahasiswa_npm', 'npm');
    }

    public function edulink()
    {
        return $this->hasMany(EduLink::class, 'mahasiswa_npm', 'npm');
    }
    public function presensi()
    {
        return $this->hasMany(presensi::class, 'npm', 'npm');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_kode', 'kode');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\MahasiswaFactory::new();
    }
}
