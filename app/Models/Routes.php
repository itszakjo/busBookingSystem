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
        'end_point',
        'stop_points'

    ];

    public function startPoint(){

       return $this->belongsTo(Stations::class , 'start_point');

    }

    public function endPoint(){

        return $this->belongsTo(Stations::class , 'end_point');

    }


}
