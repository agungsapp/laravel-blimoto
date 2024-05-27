<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesPenjualanModel extends Model
{
    use HasFactory;
    protected $table = 'akses_penjualan';
    protected $guarded = ['id'];


    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan', 'id');
    }
}
