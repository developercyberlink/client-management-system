<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "deadline", "priority_id", "assigned_by"];

    public function admins(){
        return $this->belongsToMany(Admin::class, 'admin_has_tasks')->withTimestamps();
    }

    public function assignedTo(){
        return $this->hasMany(AdminHasTask::class);
    }

    public function priority(){
        return $this->belongsTo(Priority::class);
    }

    public function givenBy(){
        return $this->belongsTo(Admin::class, 'assigned_by');
    }
}
