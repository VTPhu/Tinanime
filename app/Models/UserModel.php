<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserModel extends Model
{
    protected $dates = ['created_at'];
    protected $table='users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'role',
        'status',
        'token',
        'created_at',
        'updated_at	',
    ];
   
    
}
