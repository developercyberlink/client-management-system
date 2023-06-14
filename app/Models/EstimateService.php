<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimateService extends Model
{
    use HasFactory;

    protected $table  = "estimate_service_rels";
    protected $fillable = ["estimate_id","service_id"];
}
