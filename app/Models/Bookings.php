<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;


    public static $createRules = [
        'pickup_point' => 'required|int',
        'drop_point' => 'required|int',
        'trip' => 'required|int',
        'seat_id' => 'required|int',
    ];

    protected $fillable = [

        'id',
        'name',
        'trip',
        'pickup_point',
        'drop_point',
        'seat_id',
        'booking_date',
        'total_price'

    ];


    public function seat()
    {
        return $this->belongsTo(Seats::class ,'seat_id');
    }

    public function trip(){
        return $this->belongsTo(Trips::class , 'trip');
    }

    public function pickupPoint(){
        return $this->belongsTo(Stations::class , 'pickup_point');
    }

    public function dropPoint(){
        return $this->belongsTo(Stations::class , 'drop_point');
    }


}
