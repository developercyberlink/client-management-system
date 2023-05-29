<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ["total", 'service_id',"discount", "vat", "user_id", "invoice_no", "remarks", "date_of_entry","status"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function invoiceItems(){
        return $this->hasMany(InvoiceItem::class);
    }
}
