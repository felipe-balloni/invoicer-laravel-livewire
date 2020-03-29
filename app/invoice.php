<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['invoice_number', 'invoice_date', 'customer_id', 'tax_percent'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function invoice_items()
    {
        return $this->hasMany(InvoicesItem::class);
    }

    public function getTotalAmountAttribute()
    {
        $total_amount = 0;
        foreach ($this->invoice_items as $item) {
            $total_amount += $item->price * $item->quantity;
        }
        return $total_amount;
    }
}
