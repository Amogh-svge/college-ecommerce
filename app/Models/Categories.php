<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'parent_id',    
    ];
    
    public function productReturner(){
        return $this->hasMany(Product::class,'category_id');
    }

    public function children(){
        return $this->belongsTo(Categories::class,'id','parent_id');
    }
}
