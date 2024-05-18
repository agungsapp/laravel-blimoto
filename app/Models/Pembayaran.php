<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  protected $table = 'pembayaran';

  protected $fillable = [
    'id_detail_pembayaran',
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

  public function detailPembayaran()
  {
    return $this->belongsTo(DetailPembayaranModel::class, 'id', 'id_detailPembayaran');
  }
}
