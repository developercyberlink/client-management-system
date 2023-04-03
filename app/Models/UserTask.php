<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "assigned_by", "task_id"];

    public function user(){
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function referenceTask(){
        return $this->belongsTo(Task::class, 'task_id');
    }
}
