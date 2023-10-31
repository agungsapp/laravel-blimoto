<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
  public $timestamps = false;
  protected $table = 'hasil';
  protected $fillable = [
    'hasil'
  ];

  public function penjualan()
  {
    return $this->hasMany(Penjualan::class, 'id_hasil');
  }
}
