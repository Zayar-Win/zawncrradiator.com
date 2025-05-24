<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'dx',
        'joka',
        'tk',
        't_pic',
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
        't_pic_price',
       'dx_mm',
       'joka_mm',
       'tk_mm',
       't_pic_mm',
       'cbm',
        'fixed_quantity',
        'remark',
        'ncr_id',
        'roll_grade',
        'cnc_quantity',
        'nagoya_quantity',
    ];
    use HasFactory;

    public function orderdetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
