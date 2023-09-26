<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'judul',
        'cuplikan',
        'deskripsi',
        'thumbnail',
        'created_at',
        'updated_at',
    ];
}
