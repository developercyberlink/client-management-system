<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = ["color_id", "size_id", "quantity", "product_id"];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function color(){
        return $this->belongsTo(ColorSize::class);
    }

    public function size(){
        return $this->belongsTo(ColorSize::class);
    }

    public function images(){
        return $this->hasMany(ProductDetailImage::class);
    }
}
