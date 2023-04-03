<?php

namespace App\Models;

use App\Events\ImageObjectDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductDetailImage extends Model
{
    use HasFactory;

    protected $fillable = ["product_detail_id", "image"];
}
