<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $table = 'product_attribute_values';
    protected $fillable = [
        'product_id',
        'attribute_value_id',
        'status',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function attribute_value()
    {
        return $this->hasOne(AttributeValue::class, 'id', 'attribute_value_id');
    }
}