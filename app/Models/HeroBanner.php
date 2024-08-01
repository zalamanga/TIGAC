<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'media_type',
        'media_path',
        'media_link',
        'is_active',
        'is_priority'
    ];
}
