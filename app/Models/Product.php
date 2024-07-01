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
        'stock',
        'price',
        'discount_percent',
        'is_active',
        'is_hot_item',
        'sku',
        'product_category_id'
    ];

    public function variants()
    {
        return $this->belongsToMany(Variant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
