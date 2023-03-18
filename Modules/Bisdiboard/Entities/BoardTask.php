<?php

namespace Modules\Bisdiboard\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Bisdiboard\Entities\BoardComment;
use Modules\Bisdiboard\Entities\BoardProject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardTask extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    public function project()
    {
        return $this->hasMany(BoardProject::class, 'id', 'project_id');
    }

    public function comment()
    {
        return $this->hasMany(BoardComment::class, 'task_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Bisdiboard\Database\factories\BoardTaskFactory::new();
    }
}
