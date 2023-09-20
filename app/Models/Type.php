<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    protected $table = 'type';
    protected $fillable = [
        'nama'
    ];
}
