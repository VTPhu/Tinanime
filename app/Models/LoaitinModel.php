<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaitinModel extends Model
{
    protected $table = 'loaitin';
    protected $primaryKey = 'id';
    protected $dates = ['updated_at'];
    protected $fillable = [
        
        'lang',
        'ten',
        'thuTu',
        'anHien',
        
    ];
}
