<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = [
    'item_id',
    'tank_id',
    'order_id',
    'name',
    'quantity',
    'price',
    'amount',
    ];

    use HasFactory;

    public function item(){
        return $this->belongsTo('App\Models\Item');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
}
