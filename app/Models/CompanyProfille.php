<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfille extends Model
{
  protected $table = 'company_profile';
  public $timestamps = false;
  protected $fillable = [
    'nama_perusahaan',
    'alamat',
    'no_wa',
    'logo',
  ];
}
