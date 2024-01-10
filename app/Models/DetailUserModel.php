<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUserModel extends Model
{
    use HasFactory;
    protected $table = 'detail_users';
    protected $guarded = ['id'];

    // public function user()
    // {
    //     $this->belongsTo(User::class, 'id', 'id_user');
    // }
}
