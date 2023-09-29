<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hook extends Model
{
    use HasFactory;

    protected $table = 'hook';
    protected $fillable = [
        'nama',
        'link',
        'caption',
        'warna',
        'warna_teks',
        'gambar',
    ];
}
