<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
  protected $table = 'mitra';
  public $timestamps = false;
  protected $fillable = [
    'nama',
    'gambar',
  ];
}
