<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $fillable= [
        'no',
        'narye_code',
        'code',
        'pipe_size',
        'name',
        'up_down',
        'photo',
        'tank',

        'narye_code_price',
        'code_price',
        'price',
        'quantity',
        'fixed_quantity',
        'cnc_quantity',
        'nagoya_quantity',
        'narye_mm',
        'code_mm',
        'remark',

      ];

    use HasFactory;

    public function tankorderdetails()
    {
        return $this->hasMany('App\Models\TankOrderDetail');
    }
}
