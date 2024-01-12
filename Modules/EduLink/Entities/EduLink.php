<?php

namespace Modules\EduLink\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EduLink extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected static function newFactory()
    {
        return \Modules\EduLink\Database\factories\EduLinkFactory::new();
    }
}
