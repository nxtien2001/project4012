<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'table_products';
    protected $fillable = ['name', 'price', 'quantity', 'category_id', 'image', 'short_content', 'long_content', 'slug', 'sale_price', 'status'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attrs', 'id_product', 'id_attr');
    }
    public function attribute()
    {
        return $this->hasMany(Attribute::class, 'id_product');
    }
    public function proAttr()
    {
        return $this->belongsTo(ProductAttr::class, 'id_product', 'id_attr');
    }
}
