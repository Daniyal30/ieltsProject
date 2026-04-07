<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sidebar extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'url',
        'order',
        'is_active',
        'icon',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sidebar) {
            $lastOrder = self::max('order');

            $sidebar->order = $lastOrder ? $lastOrder + 1 : 1;
        });
    }
}
