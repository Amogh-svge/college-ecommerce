<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role'; //if table name not defined

    protected $fillable = [
        'role',
        'description',
        'created_date',
    ];


    protected $attributes = [
        'role' => 'no-role',
        'description' => 'no-description',
    ];

    //want to become vendor, here 1 is vendor
    public static $role_vendor = 2;
    public static $DEFAULT = 0;
    public static $ACCEPTED = 1;

    public static $SUPER_ADMIN = 3;
    public static $VENDOR = 1;
    public static $USER = 2;


    public function users()
    {
        $this->hasMany(User::class);
    }
}
