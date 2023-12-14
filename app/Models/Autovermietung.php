<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autovermietung extends Model
{
    protected $table = 'autovermietung';
    use HasFactory;
    protected $fillable =[
        'brand',
        'ps',
        'type',
        'color',
        'numberSeats',
        'pricePerDay',
        'rented',
        'guestId',
    ];

    protected $dates = [
      'created_at',
      'updated_at'
    ];
}
