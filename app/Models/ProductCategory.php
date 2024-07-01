<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = "product_categories";

    protected $fillable = [
        'name',
        'description',
        'is_active'
    ];

    protected $attributes = [
        'is_active' => 1
    ];
}
