<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ["by_admin", "order_id", "user_id", "service_id", "company", "email", "contact_person",
     "contact_no", "price", "status", "remark"];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public static function generateOrderNumber() {
        $prefix = "CLPL";
        $uniqueId = uniqid();
        $timestamp = now()->format('Ymdhms');
        $result = $timestamp;
        return $result;
    }
}
