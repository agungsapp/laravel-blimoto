<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeasingMotor extends Model
{
  protected $table = 'leasing_motor';

  protected $fillable = [
    'nama',
    'diskon',
  ];
}
