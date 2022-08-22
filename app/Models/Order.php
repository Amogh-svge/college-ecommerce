<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(){
        return $this->BelongsTo(User::class);
    }
}
