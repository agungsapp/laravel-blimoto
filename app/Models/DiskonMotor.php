<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiskonMotor extends Model
{
  protected $table = 'diskon_motor';
  public $timestamps = false;
  protected $fillable = [
    'id_motor',
    'id_leasing',
    'id_lokasi',
    'diskon',
    'diskon_promo',
    'tenor',
    'potongan_tenor',
  ];

  public function motor()
  {
    return $this->belongsTo(Motor::class, 'id_motor', 'id');
  }

  public function leasing()
  {
    return $this->belongsTo(LeasingMotor::class, 'id_leasing', 'id');
  }

  public function lokasi()
  {
    return $this->belongsTo(Kota::class, 'id_lokasi', 'id');
  }
}
