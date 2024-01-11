<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUserModel extends Model
{
    use HasFactory;
    protected $table = 'detail_users';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'id_kota');
    }
}
