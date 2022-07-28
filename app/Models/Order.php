<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_status',
        'discount',
        'sub-total',
        'shipping_price',
        'total_price',
    ];

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
}
