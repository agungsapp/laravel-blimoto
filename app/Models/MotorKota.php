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
        'id_motor',
        'harga_otr'
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor', 'id');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'id_kota', 'id');
    }
}
