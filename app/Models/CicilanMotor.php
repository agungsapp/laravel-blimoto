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
    'cicilan',
    'id_leasing',
    'id_lokasi',
    'id_motor',
  ];

  public static function getCicilanTable($motorId = null, $leasingId = null, $lokasiId = null, $tenor = null)
  {
    $query = DB::table('cicilan_motor')
      ->select(
        'cicilan_motor.id',
        'motor.nama AS motor_name',
        'kota.nama AS lokasi_name',
        'leasing_motor.nama AS leasing_name',
        'cicilan_motor.dp',
        'cicilan_motor.tenor',
        'cicilan_motor.cicilan'
      )
      ->join('motor', 'cicilan_motor.id_motor', '=', 'motor.id')
      ->join('leasing_motor', 'cicilan_motor.id_leasing', '=', 'leasing_motor.id')
      ->join('kota', 'cicilan_motor.id_lokasi', '=', 'kota.id');

    if ($motorId !== null) {
      $query->where('cicilan_motor.id_motor', $motorId);
    }

    if ($leasingId !== null) {
      $query->where('cicilan_motor.id_leasing', $leasingId);
    }

    if ($lokasiId !== null) {
      $query->where('cicilan_motor.id_lokasi', $lokasiId);
    }

    if ($tenor !== null) {
      $query->where('cicilan_motor.tenor', $tenor);
    }

    return $query->get();
  }

  public static function deleteData($idMotor, $idLeasing, $tenor, $idKota)
  {
    return DB::table('cicilan_motor')
      ->where('id_motor', $idMotor)
      ->where('id_leasing', $idLeasing)
      ->where('tenor', $tenor)
      ->where('id_lokasi', $idKota)
      ->delete();
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
