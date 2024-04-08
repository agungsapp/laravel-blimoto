<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanRefundModel extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_refund';
    protected $guarded = ['id'];


    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_penjualan', 'id_penjualan');
    }

    public function manual()
    {
        return $this->belongsTo(ManualTransferModel::class, 'id', 'id_pengajuan');
    }
}



// sejuh ini sudah di implement tapi belum di test , baru suinpen pengajuan data