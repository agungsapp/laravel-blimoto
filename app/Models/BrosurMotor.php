<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrosurMotor extends Model
{
    protected $fillable = [
        'nama_file',
        'is_popular',
        'id_motor',
    ];
}
