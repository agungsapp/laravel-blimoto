<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualTransferModel extends Model
{
    use HasFactory;

    protected $table = 'manual_transfer';
    protected $guarded = ['id'];


    public function detailPembayaran()
    {
        return $this->belongsTo(DetailPembayaranModel::class, 'id', 'id_detailPembayaran');
    }
}
