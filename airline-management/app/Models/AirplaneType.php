<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirplaneType extends Model
{
    use HasFactory;
    protected $table="airplane_type";

    protected $primaryKey="typeid";


    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
}
