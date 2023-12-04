<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
  protected $table = 'promo';
  protected $fillable = [
    'judul',
    'deskripsi',
    'thumbnail',
    'tanggal_promo',
  ];
}
