<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteStops extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'stop_order',
        'stop_point',
        'route_id'

    ];


    public function station(){

        return $this->belongsTo(Stations::class ,'stop_point');
    }

    public function route(){

        return $this->belongsTo(Routes::class ,'route_id');
    }


}
