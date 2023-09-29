<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CicilanMotor extends Model
{
  protected $table = 'cicilan_motor';
  public $timestamps = false;
  protected $fillable = [
    'dp',
    'tenor',
    'potongan_tenor',
    'cicilan',
    'id_leasing',
    'id_lokasi',
    'id_motor',
  ];

  public static function getCicilanTable()
  {
    return DB::select('
    SELECT 
        motor.nama AS motor_name, 
        leasing_motor.nama AS leasing_name, 
        cicilan_motor.dp, 
        cicilan_motor.tenor, 
        cicilan_motor.potongan_tenor, 
        cicilan_motor.cicilan
    FROM 
        cicilan_motor
    INNER JOIN 
        motor ON cicilan_motor.id_motor = motor.id
    INNER JOIN 
        leasing_motor ON cicilan_motor.id_leasing = leasing_motor.id
    ');
  }

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
