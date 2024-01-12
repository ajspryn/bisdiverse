<?php

namespace Modules\Bisdiboard\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class BoardProject extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function task()
    {
        return $this->hasMany(BoardTask::class, 'project_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Bisdiboard\Database\factories\BoardProjectFactory::new();
    }
}
