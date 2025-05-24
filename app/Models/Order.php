<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
  'date',
  'customer_type',
  'name',
  'phone',
  'item',
  'type',
  'shop',
  'seller',
];
    use HasFactory;

    public function orderdetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}

