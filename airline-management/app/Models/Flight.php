<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;
    protected $table="flight";

    protected $primaryKey="flightnum";


    protected $fillable = [
        'flightdate',
        'origin',
        'destination',
    ];
    public $timestamps = false;
}
