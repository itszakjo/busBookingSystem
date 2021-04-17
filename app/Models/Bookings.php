<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'name',
        'trip',
        'pickup_point',
        'drop_point',
        'seats',
        'booking_date',
        'total_price'

    ];



    public function Trip(){
        return $this->belongsTo(Trips::class , 'trip');
    }

    public function pickupPoint(){
        return $this->belongsTo(Stations::class , 'pickup_point');
    }

    public function dropPoint(){
        return $this->belongsTo(Stations::class , 'drop_point');
    }


}
