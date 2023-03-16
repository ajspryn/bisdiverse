<?php

namespace Modules\Bisdiboard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardTeam extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected static function newFactory()
    {
        return \Modules\Bisdiboard\Database\factories\BoardTeamFactory::new();
    }
}
