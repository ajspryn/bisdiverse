<?php

namespace Modules\BisdiEvent\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\BisdiEvent\Database\factories\DokumentasiFactory::new();
    }
}
