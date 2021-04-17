<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stopPoints extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'ref_trip'

    ];
}
