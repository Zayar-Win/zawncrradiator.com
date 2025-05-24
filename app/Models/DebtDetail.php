<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtDetail extends Model
{
    protected $fillable= [
        'debt_id',
        'order_id',
        'debt_date',
        'amount',
        'paid_amount',
        'remaining_amount',
        'total',
      ];
    use HasFactory;
}
