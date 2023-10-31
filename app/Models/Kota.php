<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    public $timestamps = false;
    protected $table = 'kota';
    protected $fillable = [
        'nama'
    ];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_kota');
    }
}
