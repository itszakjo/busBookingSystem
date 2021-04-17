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
        'route',
        'date',
        'departure_at',
        'arrival_at' ,
        'duration',
        'seat_price'

    ];


    public function Route(){

        return $this->belongsTo(Routes::class ,'route');
    }
}
