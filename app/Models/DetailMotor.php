<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMotor extends Model
{
    protected $table = 'detail_motor';
    protected $fillable = [
        'warna',
        'gambar',
        'id_motor',
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor', 'id');
    }
}
