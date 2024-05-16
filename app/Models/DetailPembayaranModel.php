<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'detail_pembayaran';
    protected $guarded = ['id'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class,  'id_penjualan', 'id'); // Definisikan relasi terbalik
    }
}
