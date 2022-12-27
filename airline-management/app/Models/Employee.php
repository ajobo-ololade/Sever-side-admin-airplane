<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employee";

    protected $primaryKey="empnum";

    protected $foreignKey="ratingid";

    protected $fillable = [
        'surname',
        'name',
        'address',
        'phone',
        'salary',
        'ratingid'
    ];
    public $timestamps = false;
}
