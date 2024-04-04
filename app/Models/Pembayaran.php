<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  protected $table = 'pembayaran';

  protected $fillable = [
    'id_penjualan',
    'order_id',
    'harga',
    'status_pembayaran',
    'metode_pembayaran',
    'paid_at'
  ];

  protected $dates = [
    'paid_at',
    'created_at',
    'updated_at'
  ];

  public function penjualan()
  {
    return $this->belongsTo(Penjualan::class, 'id_penjualan');
  }
}
