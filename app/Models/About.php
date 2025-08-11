<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFactory> */

    protected $fillable = [
    'name',
    'designation',
    'brief',
    'image',
    'web_design_percent',
    'development_percent',
    'branding_percent',
    'facebook',
    'linkedin',
    'github',
];
    use HasFactory;
}
