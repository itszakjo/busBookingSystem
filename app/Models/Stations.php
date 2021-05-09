<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'name'

    ];


    public function start_point(){

        return $this->hasOne(Stations::class , 'start_point');
    }

    public function end_point(){

        return $this->hasOne(Stations::class , 'end_point');
    }


    public function routes()
    {
//        return $this->belongsToMany(Routes::class, 'route_stops', 'route_id','stop_point')->withPivot('stop_order', 'created_at', 'updated_at');

        return $this->belongsToMany(Stations::class, 'route_stops' , 'stop_point' , ' route_id')->withPivot('stop_order', 'created_at', 'updated_at');

    }
}
