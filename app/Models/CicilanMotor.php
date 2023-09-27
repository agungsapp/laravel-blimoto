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
}
