<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
  public $timestamps = false;
  protected $table = 'penjualan';
  protected $fillable = [
    'nama_konsumen',
    'jumlah',
    'catatan',
    'tenor',
    'metode_pembelian',
    'metode_pembayaran',
    'warna_motor',
    'no_hp',
    'bpkb',
    'dp',
    'diskon_dp',
    'status_pembayaran_dp',
    'tanggal_dibuat',
    'tanggal_hasil',
    'is_cetak',
    'no_po',
    'id_sales',
    'id_lising',
    'id_motor',
    'id_kota',
    'id_hasil',
  ];

  public function sales()
  {
    return $this->belongsTo(Sales::class, 'id_sales');
  }
  public function motor()
  {
    return $this->belongsTo(Motor::class, 'id_motor');
  }

  public function leasing()
  {
    return $this->belongsTo(LeasingMotor::class, 'id_lising');
  }

  public function hasil()
  {
    return $this->belongsTo(Hasil::class, 'id_hasil');
  }

  public function kota()
  {
    return $this->belongsTo(Kota::class, 'id_kota');
  }

  public function refund()
  {
    return $this->belongsTo(PengajuanRefundModel::class, 'id_penjualan');
  }
}
