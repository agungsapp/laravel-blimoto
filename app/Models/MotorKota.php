<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorKota extends Model
{
    public $timestamps = false;
    protected $table = 'motor_kota';
    protected $fillable = [
        'id_kota',
        'id_motor'
    ];
}
