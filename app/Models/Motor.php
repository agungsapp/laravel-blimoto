<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';

    protected $fillable = [
        'nama',
        'berat',
        'power',
        'harga',
        'deskripsi',
        'fitur_utama',
        'id_merk',
        'id_type',
    ];
}
