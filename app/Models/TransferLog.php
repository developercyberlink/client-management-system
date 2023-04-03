<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferLog extends Model
{
    use HasFactory;

    protected $fillable = ["assign_task_id", "transferred_by", "transferred_to", "remarks"];

    public function transferredTo(){
        return $this->belongsTo(Admin::class, 'transferred_to');
    }

    public function transferredBy(){
        return $this->belongsTo(Admin::class, 'transferred_by');
    }
}
