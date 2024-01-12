<?php

namespace Modules\Bisdiboard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardTodo extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];



    protected static function newFactory()
    {
        return \Modules\Bisdiboard\Database\factories\BoardTodoFactory::new();
    }
}
