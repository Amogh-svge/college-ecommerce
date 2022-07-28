<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product'; //if table name not defined

    protected $fillable = [
        'prod_name',
        'prod_desc',
        'image',
        'category_id',
        'price',
        'short_desc',
        'specification',
        'users_id',
    ];

    protected $guarded = [];

    protected $attributes = [
        'image' => 'no-image',
        'price' => '0.00',
        'prod_name' => 'no_name',
        
    ];

    //protected $with = ['categ']; //if frequently used then define here
    //protected $without = ['categ'];

    public function categ()
    { //assumes categ_id 
        //hasOne, hasMany,belongsTo,belongsToMany
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    public function productOrderItem()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }
}
