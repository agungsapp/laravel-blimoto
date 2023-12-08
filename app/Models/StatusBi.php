<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusBI extends Model
{
  protected $table = 'status_bi_checking';
  public $timestamps = false;
  protected $fillable = [
    'status',
  ];

  public function sliks()
  {
    return $this->hasMany(Slik::class, 'id_status');
  }
}
