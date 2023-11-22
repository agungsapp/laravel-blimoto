<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MtrBestMotor extends Model
{
  protected $table = 'mtr_motor_best';
  public $timestamps = false;

  protected $fillable = [
    'id_motor',
    'id_best_motor',
  ];

  public function motor()
  {
    return $this->belongsTo(Motor::class, 'id_motor', 'id');
  }

  public function bestMotor()
  {
    return $this->belongsTo(BestMotor::class, 'id_best_motor', 'id');
  }
}
