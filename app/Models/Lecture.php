<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'module_id',
        'title',
        'video_path',
        'description',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
