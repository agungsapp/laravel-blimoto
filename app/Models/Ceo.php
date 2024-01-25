<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Ceo extends Model implements AuthenticatableContract
{
  use Authenticatable;

  protected $table = 'ceo';
  public $timestamps = false;
  protected $fillable = [
    'nama',
    'username',
    'password',
  ];
}
