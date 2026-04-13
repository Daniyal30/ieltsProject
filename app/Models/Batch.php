<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'start_date',
        'end_date',
        'days',
        'max_students',
        'status',
        'description',
    ];

    public function students(){
        return $this->belongsToMany(User::class,' batch_student');
    }
}
