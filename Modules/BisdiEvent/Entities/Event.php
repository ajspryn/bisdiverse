<?php

namespace Modules\BisdiEvent\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\BisdiEvent\Entities\Agenda;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function agenda()
    {
        return $this->hasMany(Agenda::class);
    }

    protected static function newFactory()
    {
        return \Modules\BisdiEvent\Database\factories\EventFactory::new();
    }
}
