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
        'id_best_motor',
        'stock'
    ];

    public function detailMotor()
    {
        return $this->hasOne(DetailMotor::class, 'id_motor', 'id');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id');
    }
}
