<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankOrderDetail extends Model
{
    protected $table = 'tank_order_details';
    protected $fillable = [
        'tank_id',
        'tank_order_id',
        'quantity',
        'price',
        'amount',
        ];
        use HasFactory;

        public function tank_order(){
            return $this->belongsTo('App\Models\TankOrder');
        }
        public function tank(){
            return $this->belongsTo('App\Models\Tank');
        }


}
