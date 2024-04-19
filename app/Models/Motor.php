<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Motor extends Model
{
    protected $table = 'motor';

    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'fitur_utama',
        'id_merk',
        'id_type',
        'stock',
        'bonus'
    ];

    public function motorKota()
    {
        return $this->hasMany(MotorKota::class, 'id_motor', 'id');
    }

    public function cicilanMotor()
    {
        return $this->hasMany(CicilanMotor::class, 'id_motor', 'id');
    }

    public function detailMotor()
    {
        return $this->hasMany(DetailMotor::class, 'id_motor', 'id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_motor');
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id');
    }

    public function diskonMotor()
    {
        return $this->hasMany(DiskonMotor::class, 'id_motor', 'id');
    }

    public function mtrBestMotor()
    {
        return $this->belongsTo(MtrBestMotor::class, 'id', 'id_motor');
    }

    public function mtrBestMotorDua()
    {
        return $this->belongsTo(MtrBestMotor::class, 'id_motor', 'id');
    }


    public function brosurMotor()
    {
        return $this->hasOne(BrosurMotor::class, 'id_motor', 'id');
    }



    // logika data : 
    public static function getMotorsWithBrosur($search = null)
    {
        $kotaId = Session::get('lokasiUser');
        // Set default value of $kotaId to 1 if it's empty
        if (empty($kotaId)) {
            $kotaId = 1;
        }

        $query = self::with(['diskonMotor', 'brosurMotor', 'motorKota' => function ($query) use ($kotaId) {
            $query->where('id_kota', $kotaId);
        }])
            ->whereHas('brosurMotor');

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $motors = $query->get();

        foreach ($motors as $motor) {
            $motor->image = DetailMotor::where('id_motor', $motor->id)
                ->pluck('gambar')->first();

            $motor->brosur = $motor->brosurMotor ? $motor->brosurMotor->nama_file : null;
        }

        return $motors;
    }
}
