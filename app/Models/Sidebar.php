<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    protected $fillable = [
        'title',
        'url',
        'order',
        'is_active',
        'icon',
    ];
}
