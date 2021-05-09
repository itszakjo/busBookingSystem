<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable =[

       'id',
       'name'
    ];

    public function seats()
    {
        return $this->hasMany(Seats::class , 'bus_id');
    }

    public function trips()
    {
        return $this->hasMany(Trips::class , 'bus_id');
    }
}
