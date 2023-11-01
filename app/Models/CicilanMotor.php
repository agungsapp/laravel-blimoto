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
        cicilan_motor.id,
        motor.nama AS motor_name, 
        kota.nama AS lokasi_name,
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
    INNER JOIN 
        kota ON cicilan_motor.id_lokasi = kota.id
    ');
  }

  public static function getDpminLeasing($idMotor, $idLokasi, $tenor)
  {
    return DB::table('cicilan_motor')
      ->select(DB::raw('MIN(cicilan_motor.dp) AS min_dp'), 'leasing_motor.nama')
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->where('id_motor', $idMotor)
      ->where('id_lokasi', $idLokasi)
      ->where('tenor', $tenor)
      ->groupBy('id_leasing', 'leasing_motor.nama')
      ->get();
  }

  public function leasingMotor()
  {
    return $this->belongsTo(LeasingMotor::class, 'id_leasing', 'id');
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
