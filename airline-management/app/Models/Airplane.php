<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    use HasFactory;
    protected $table="airplane";

    protected $primaryKey="numser";

    protected $foreignKey="aircraft_type";

    protected $fillable = [
        'aircraft_type',
        'manufacturer',
        'model'
    ];
    public $timestamps = false;
}
