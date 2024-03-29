<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'product_price',
        'total',    
    ];

    // public function getOrderItem(){
    //     return $this->hasOne(Product::class,'id');
    // }
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
