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
    'status_pembayaran',
    'id_type_slik',
    'id_status',
  ];

  public function typeSlik()
  {
    return $this->belongsTo(TypeSlik::class, 'id_type_slik');
  }

  public function statusBi()
  {
    return $this->belongsTo(StatusBI::class, 'id_status');
  }
}
