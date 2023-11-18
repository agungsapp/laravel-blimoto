<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPK extends Model
{
  protected $table = 'spk';
  public $timestamps = false;
  protected $fillable = [
    'nomor_spk',
    'tanggal_pesanan',
    'no_ktp',
    'nama_pemohon',
    'bpkb_stnk',
    'nomor_hp',
    'unit',
    'type',
    'warna',
    'harga',
    'keterangan_program',
    'nama_diskon',
    'kelengkapan',
    'dp',
    'total_diskon',
    'sisa_bayar',
    'kredit_via',
    'jangka_waktu',
  ];
}
