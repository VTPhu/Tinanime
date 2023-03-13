<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinModel extends Model
{
    protected $table = 'tin';
    protected $primaryKey = 'id';
    protected $dates = ['ngayDang'];
    protected $fillable = [
        'tieuDe',
        'tomTat',
        'urlHinh',
        'ngayDang',
        'noiDung',
        'idLT',
        'xem',
        'noiBat',
        'anHien',
        'tags',
        'lang',
        'updated_at',
        'created_at',
    ];
}
