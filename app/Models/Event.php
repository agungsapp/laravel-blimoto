<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $table = 'event';
  protected $fillable = [
    'judul',
    'deskripsi',
    'thumbnail_berita',
  ];
}
