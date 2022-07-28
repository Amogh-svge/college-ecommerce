<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout';

    protected $fillable = [
        'Name',
        'email',
        'country',
        'state',
        'city',
        'street_address',
        'phone',
        'user_id',
        'order_id',
        'order_notes',
    ];
    
    public function order(){
        return $this->hasOne(order::class,'id');
    }

    public function orderItems(){
        return $this->hasMany(orderItem::class,'order_id');
    }

}
