<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemForeign extends Model
{
    use HasFactory;
    protected $fillable = [
        'dx',
        'joka',
        'tk',
        'name',
        'photo',
        'pa',
        'size',
        'high',
        'three_piece',
        'two_piece',
        'regular',
        'quantity',
        'dx_price',
        'joka_price',
        'tk_price',
       'dx_mm',
       'joka_mm',
       'tk_mm',
       'cbm',
        'fixed_quantity',
        'remark',
    ];
}
