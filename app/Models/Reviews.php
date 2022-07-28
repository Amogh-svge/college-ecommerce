<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'product_id',
        'reviews',
        'ratings',
    ];

    public function userReview(){
        return $this->belongsTo(User::class,'user_id');
    }
}
