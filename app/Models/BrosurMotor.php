<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrosurMotor extends Model
{
    protected $table = 'brosur_motor';
    public $timestamps = false;
    protected $fillable = [
        'nama_file',
        'is_popular',
        'id_motor',
    ];
    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor');
    }
}
