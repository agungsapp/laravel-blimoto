<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestMotor extends Model
{
  public $timestamps = false;
  protected $table = 'best_motor';
  protected $fillable = [
    'nama',
  ];

  // app/Models/BestMotor.php

}
