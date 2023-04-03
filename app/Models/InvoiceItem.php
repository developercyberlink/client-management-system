<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ["particular", "rate", "amount", "time", "invoice_id"];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
