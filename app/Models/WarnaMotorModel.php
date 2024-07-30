<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarnaMotorModel extends Model
{
    use HasFactory;

    protected $table = 'warna_motor';
    protected $guarded = ['id'];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor', 'id');
    }

    public function color()
    {
        return $this->belongsTo(ColorModel::class, 'id_color', 'id');
    }
}
