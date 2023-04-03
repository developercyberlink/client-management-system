<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingType extends Model
{
    use HasFactory;

    protected $fillable = ["title"];
}
