<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["title", "introduction", "description", "price", "discounted_price", "slug", "sku", "cover_image", "tags"];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
    }

    public function subCategories(){
        return $this->belongsToMany(SubCategory::class, 'product_sub_categories');
    }

    public function productDetails(){
        return $this->hasMany(ProductDetail::class);
    }
}
