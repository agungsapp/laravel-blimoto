<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model implements AuthenticatableContract
{
  use Authenticatable;

  protected $table = 'sales';
  public $timestamps = false;
  protected $fillable = [
    'nama',
    'nip',
    'username',
    'password',
    'status_online'
  ];

  public function penjualan()
  {
    return $this->hasMany(Penjualan::class, 'id_motor');
  }
}
