<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;
    protected $table="crew";

    protected $primaryKey="crewid";

    protected $fillable = [
        'empnum',
        'scheduleid',
        'role'
    ];
    public $timestamps = false;
}
