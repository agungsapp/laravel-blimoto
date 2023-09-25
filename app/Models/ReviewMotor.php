<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewMotor extends Model
{
  protected $table = 'review_motor';
  protected $fillable = [
    'bintang',
    'id_motor',
    'id_user',
    'caption',
  ];
}
