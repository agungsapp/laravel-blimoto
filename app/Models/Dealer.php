<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
  protected $table = 'dealers';
  public $timestamps = false;
  protected $fillable = [
    'nama',
    'alamat',
    'telpon',
    'link_map',
    'gambar',
    'id_kota',
  ];

  public function kota()
  {
    return $this->belongsTo(Kota::class, 'id_kota', 'id');
  }
}
