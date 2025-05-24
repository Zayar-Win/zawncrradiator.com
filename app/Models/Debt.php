<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable= [
        'total_amount',
        'date',
        'name',
        'phone',
        'address',

        'reason',

      ];
    use HasFactory;
}
