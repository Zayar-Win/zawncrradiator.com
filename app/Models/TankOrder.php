<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankOrder extends Model
{
    protected $fillable = [

        'date',
        'customer_type',
        'name',
        'phone',
        'item',
        'type',
      ];
    use HasFactory;

    public function tankorderdetails()
    {
        return $this->hasMany('App\Models\TankOrderDetail');
    }

}
