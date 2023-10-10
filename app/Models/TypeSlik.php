<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSlik extends Model
{
  protected $table = 'type_slik';
  public $timestamps = false;
  protected $fillable = [
    'nama',
    'harga',
  ];
}
