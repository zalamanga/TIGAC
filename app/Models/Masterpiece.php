<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Masterpiece extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'detail_link',
        'thumbnail',
        'is_active'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }
}
