<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'bus_id',
        'name'

    ];

    public function bookings()
    {
        return $this->hasMany(Bookings::class , 'seat_id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class , 'bus_id');
    }

}
