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
    'diskon_35',
    'diskon_24',
    'diskon_12',
    'dp_35',
    'dp_24',
    'dp_12',
  ];

  public function motor()
  {
    return $this->belongsTo(Motor::class, 'id_motor', 'id');
  }

  public function leasing()
  {
    return $this->belongsTo(LeasingMotor::class, 'id_leasing', 'id');
  }
}
