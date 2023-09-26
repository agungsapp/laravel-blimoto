<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CicilanMotor extends Model
{
  protected $table = 'cicilan_motor';

  protected $fillable = [
    'min_dp',
    'max_dp',
    'id_motor'
  ];
}
