<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTaskFeedback extends Model
{
    use HasFactory;

    protected $fillable = ["message", "user_task_id", "sender"];
}
