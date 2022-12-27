<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table="rating";

    protected $primaryKey="ratno";

    protected $foreignKey="aircraft_type";

    protected $fillable = [
        'name',
        'aircraft_type',
    ];
    public $timestamps = false;
}
