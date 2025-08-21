<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PanelUser extends Model
{
    protected $fillable = [
        'name', 'email', 'password',  'is_super'
    ];

    protected $casts = [
        'is_super' => 'boolean',
    ];
}
