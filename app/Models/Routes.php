<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Routes extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'name',
        'start_point',
        'end_point'
    ];

    public function trips()
    {
        return $this->hasMany(Trips::class , 'route_id');
    }

    public function stations()
    {
        return $this->belongsToMany(Stations::class, 'route_stops' , 'route_id' , 'stop_point')->withPivot('stop_order', 'created_at', 'updated_at');
    }

    public function startPoint(){

       return $this->belongsTo(Stations::class , 'start_point');

    }

    public function endPoint(){

        return $this->belongsTo(Stations::class , 'end_point');

    }




}
