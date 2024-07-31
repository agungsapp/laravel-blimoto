<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penjualan extends Model
{
  public $timestamps = true;
  protected $table = 'penjualan';
  protected $fillable = [
    'nama_konsumen',
    'jumlah',
    'catatan',
    'tenor',
    'metode_pembelian',
    'metode_pembayaran',
    'id_color',
    'no_hp',
    'bpkb',
    'dp',
    'dp_asli',
    'angsuran',
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
    'nik',
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

  // public function refund()
  // {
  //   return $this->belongsTo(PengajuanRefundModel::class, 'id', 'id_penjualan');
  // }

  public function pembayaran()
  {
    return $this->belongsTo(Pembayaran::class, 'id', 'id_penjualan');
  }

  public function manual()
  {
    return $this->belongsTo(ManualTransferModel::class, 'id', 'id_penjualan');
  }
  public function detailPembayaran()
  {
    return $this->hasMany(DetailPembayaranModel::class, 'id_penjualan', 'id');
  }

  public function pengajuanAkses()
  {
    return $this->belongsTo(AksesPenjualanModel::class, 'id', 'id_penjualan');
  }

  public function pengajuanAksesBy($status)
  {
    return $this->belongsTo(AksesPenjualanModel::class, 'id', 'id_penjualan')
      ->where('status', $status); // Tambahkan kondisi where di sini
  }


  public function color()
  {
    return $this->belongsTo(ColorModel::class, 'id_color', 'id');
  }




  // Method untuk mengambil cicilan yang sesuai
  public function cicilanMotor()
  {
    // Ambil hanya cicilan yang sesuai dengan kriteria
    return $this->motor->cicilanMotor()
      ->where('tenor', $this->tenor)
      ->where('id_leasing', $this->id_lising)
      ->where('id_lokasi', $this->id_kota)
      ->where('id_motor', $this->id_motor)
      ->first(); // Mengambil hanya cicilan yang sesuai
  }

  // Accessor untuk mengambil cicilan yang sesuai
  public function getCicilanYangSesuaiAttribute()
  {
    // Menggunakan method cicilanMotor untuk mendapatkan cicilan yang sesuai
    return $this->cicilanMotor();
  }



  public function diskonMotor()
  {
    // Ambil hanya cicilan yang sesuai dengan kriteria
    return $this->motor->diskonMotor()
      ->where('tenor', $this->tenor)
      ->where('id_leasing', $this->id_lising)
      ->where('id_lokasi', $this->id_kota)
      ->where('id_motor', $this->id_motor)
      ->first(); // Mengambil hanya cicilan yang sesuai
  }

  public function getDiskonMotorYangSesuaiAttribute()
  {
    // Menggunakan method cicilanMotor untuk mendapatkan cicilan yang sesuai
    return $this->diskonMotor();
  }
}
