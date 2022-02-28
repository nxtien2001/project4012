<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $table = 'invoice_details';
    protected $fillable = ['invoice_id', 'product_id', 'unit_price', 'quantity	'];
    public function invoice()
    {
        //thuộc về 1 hóa đơn
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
