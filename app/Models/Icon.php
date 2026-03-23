<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = [
        'class_name',
        'icon_name',
        'display_name',
        'category'
    ];
}
