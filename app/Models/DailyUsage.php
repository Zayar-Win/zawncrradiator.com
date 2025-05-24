<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyUsage extends Model
{ 
     protected $fillable= [
    'date',
    'daily_usage',
    
  ];
    use HasFactory;
}
