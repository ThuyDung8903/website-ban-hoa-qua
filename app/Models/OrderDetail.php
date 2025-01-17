<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_image',
        'product_color',
        'product_size',
        'quantity',
    ];

    public function orders()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
