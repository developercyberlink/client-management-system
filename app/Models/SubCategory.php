<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ["content_id", "category_id"];

    public function content(){
        return $this->belongsTo(Content::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_sub_categories');
    }
}
