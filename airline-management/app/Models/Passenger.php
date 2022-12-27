<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $table="passenger";

    protected $primaryKey="pasID";

    protected $foreignKey="schedulenum";

    protected $fillable = [
        'surname',
        'othername',
        'address',
        'phone',
        'schedulenum',
    ];
    public $timestamps = false;
}
