<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'total_amount',
        'tax_amount',
        'shipping_amount',
        'discount_amount',
        'currency',
        'payment_status',
        'payment_method',
        'notes',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function shippingAddress()
    {
        return $this->hasOne(\App\Models\ShippingAddress::class);
    }
}
