<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseBillItem extends Model
{
    use HasFactory;

    protected $fillable = ["particular", "rate", "amount", "purchase_bill_id"];

    public function purchaseBill(){
        return $this->belongsTo(PurchaseBill::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
