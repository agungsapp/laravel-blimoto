<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slik extends Model
{
  protected $table = 'slik';
  public $timestamps = false;
  protected $fillable = [
    'ktp',
    'kk',
    'status',
    'id_type_slik'
  ];
}
