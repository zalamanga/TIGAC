<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'stock',
        'volume'
    ];

    public function variants()
    {
        return $this->belongsToMany(Variant::class);
    }

    public function images()
    {
        return $this->belongsToManyToMany(Image::class);
    }

    public function productCategory()
    {
        return $this->hasOne(ProductCategory::class);
    }
}
