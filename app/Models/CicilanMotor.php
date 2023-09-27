<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CicilanMotor extends Model
{
  protected $table = 'cicilan_motor';
  public $timestamps = false;
  protected $fillable = [
    'dp',
    'tenor',
    'cicilan',
    'id_leasing',
    'id_lokasi',
    'id_motor',
  ];

  public function leasingMotor()
  {
    return $this->belongsTo(LeasingMotor::class, 'id_leasing');
  }

  public function motor()
  {
    return $this->belongsTo(Motor::class, 'id_motor');
  }

  public function kota()
  {
    return $this->belongsTo(Kota::class, 'id_lokasi');
  }
}
