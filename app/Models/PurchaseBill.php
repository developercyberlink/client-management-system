<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseBill extends Model
{
    use HasFactory;

    protected $fillable = ["vendor_id", "total", "discount", "vat", "bill_no", "remarks", "date_of_entry"];

    public function billItems(){
        return $this->hasMany(PurchaseBillItem::class);
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
