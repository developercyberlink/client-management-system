<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHasTask extends Model
{
    use HasFactory;

    protected $fillable = ["admin_id", "task_id", "remark", "status"];

    public function assignedAdmin(){
        return Admin::find($this->admin_id);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function logs(){
        return $this->hasMany(TransferLog::class, 'assign_task_id');
    }
}
