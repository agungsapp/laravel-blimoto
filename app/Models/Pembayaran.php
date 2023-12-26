<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  // Tentukan nama tabel yang terkait dengan model
  protected $table = 'pembayaran';

  // Tentukan kolom-kolom yang bisa diisi (mass assignable)
  protected $fillable = [
    'id_penjualan',
    'harga',
    'status_pembayaran',
    'paid_at'
  ];

  // Tentukan kolom-kolom yang diinginkan formatnya seperti tanggal
  protected $dates = [
    'paid_at',
    'created_at',
    'updated_at'
  ];

  /**
   * Relasi ke model penjualan (opsional, tergantung pada struktur aplikasi Anda).
   * Misalnya, jika Anda memiliki model Penjualan yang terkait dengan Pembayaran.
   */
  public function penjualan()
  {
    return $this->belongsTo(Penjualan::class, 'id_penjualan');
  }
}
