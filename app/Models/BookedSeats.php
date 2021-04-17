<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedSeats extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'ref_seat',
        'ref_trip',
        'ref_pickup_point',
        'ref_drop_point'

    ];
}
