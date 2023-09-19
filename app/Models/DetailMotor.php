<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMotor extends Model
{
    protected $fillable = [
        'warna',
        'gambar',
        'id_motor',
    ];
}
