<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHierarchy extends Model
{
    use HasFactory;

    protected $fillable = ["role_id", "parent_id"];
    public $timestamps = false;

    public function parent(){
        return RoleHierarchy::where('role_id', $this->parent_id)->first();
    }
    
}
