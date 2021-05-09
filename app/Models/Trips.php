<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'name',
        'bus_id',
        'route_id',
        'date',
        'departure_at',
        'arrival_at' ,
        'duration',
        'seat_price'

    ];


    public function route(){

        return $this->belongsTo(Routes::class ,'route_id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function bookings(){

        return $this->hasMany(Bookings::class , 'trip');
    }

}
