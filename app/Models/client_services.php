<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client_services extends Model
{
    use HasFactory;

    protected $fillable = ["client_id", "service", "service_type", "programming_type","domain","price","registered","expiring","status"];
}
