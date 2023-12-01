<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slik extends Model
{
  protected $table = 'slik';
  public $timestamps = false;
  protected $fillable = [
    'no',
    'email',
    'ktp',
    'kk',
    'status',
    'status_pembayaran',
    'id_type_slik'
  ];
  public function typeSlik()
  {
    return $this->belongsTo(TypeSlik::class, 'id_type_slik');
  }
}
