<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CicilanMotor;
use App\Models\DetailMotor;
use App\Models\DiskonMotor;
use App\Models\Hook;
use App\Models\Kota;
use App\Models\Merk;
use App\Models\Mitra;
use App\Models\Motor;
use App\Models\MotorKota;
use App\Models\MtrBestMotor;
use App\Models\Type;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'best1' => $this->getMotorData(2),
            'best2' => $this->getDpTermurah(3),
            'best3' => $this->getMotorData(4),
            'best4' => $this->getDpTermurah(5),
            'populer' => $this->getMotorData(6),
            'terbaru' => $this->getMotorData(7),
            'blogs' => Blog::orderBy('id', 'DESC')->get(),
            'hooks' => Hook::where('status', 1)
                ->orderBy('order', 'asc')->get(),
            'mitras' => Mitra::all(),
            'tenors' => CicilanMotor::distinct('tenor')->pluck('tenor')
        ];

        // dd(Session::get('lokasiUser'));

        // dd($data['best2'][2]);

        // return response()->json($this->getDpTermurahPartDua(3));

        // dd($data['best3'][0]->motorKota[0]->harga_otr);

        // dd($data['hooks']);
        return view('user.home.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // ajax area 
    public function getModelOptions(Request $request)
    {
        $merkId = $request->merk_id;
        $tipeId = $request->tipe_id;

        $modelOptions = Motor::where('id_merk', $merkId)
            ->where('id_type', $tipeId)
            ->get();


        return response()->json($modelOptions);
    }

    public function getDpMotor(Request $request)
    {
        $id_motor = $request->input('id_motor');
        $id_lokasi = $request->input('id_lokasi');
        $tenor = $request->input('tenor');

        // $dps = CicilanMotor::where('id_motor', $id_motor)
        //     ->where('tenor', $tenor)
        //     ->where('id_lokasi', $id_lokasi)
        //     ->pluck('dp');

        // $dps = $dps->unique()->values()->all();
        // sort($dps);

        $dps = CicilanMotor::getDpminLeasing($id_motor, $id_lokasi, $tenor);
        $dps = $dps->toArray();
        sort($dps);
        return response()->json(['dp' => $dps]);
    }

    public function getTypeMotor(Request $request)
    {
        $typeMotor = Type::all();

        return response()->json(['type_motor' => $typeMotor], 200);
    }
    public function getMerkMotor(Request $request)
    {
        $merkMotor = Merk::all();

        return response()->json(['merk_motor' => $merkMotor], 200);
    }

    public function getTenor(Request $request)
    {
        $id_lokasi = $request->input('id_lokasi');
        $id_motor = $request->input('id_motor');
        $tenorData = CicilanMotor::select('tenor')
            ->where('id_lokasi', $id_lokasi)
            ->where('id_motor', $id_motor)
            ->distinct('tenor')
            ->get();

        return response()->json($tenorData);
    }

    public function getLokasi()
    {
        $distinctKotaNama = DB::table('cicilan_motor')
            ->join('kota', 'cicilan_motor.id_lokasi', '=', 'kota.id')
            ->select('kota.nama', 'kota.id')
            ->distinct()
            ->get();

        return response()->json($distinctKotaNama);
    }


    public function getSearchMotor(Request $request)
    {

        $kotaId = Session::get('lokasiUser');
        // Set default value of $kotaId to 1 if it's empty
        if (empty($kotaId)) {
            $kotaId = 1;
        }

        $motorNama = $request->input('motor');
        $idLokasi = intval($request->input('id_lokasi'));
        $typeMotor = intval($request->input('kategori'));

        $query = Motor::with([
            'merk',
            'type',
            'detailMotor',
            'motorKota' => function ($query) use ($kotaId) {
                $query->where('id_kota', $kotaId);
            }
        ]);

        // Check if search keyword is provided
        if (!empty($motorNama)) {
            $query->whereRaw("MATCH(nama) AGAINST(? IN NATURAL LANGUAGE MODE)", [$motorNama]);
        }

        // Check if typeMotor is provided
        if (!empty($typeMotor)) {
            $query->whereHas('type', function ($query) use ($typeMotor) {
                $query->where('id', $typeMotor);
            });
        }

        $results = $query->get();

        $data = [
            'data' => $results,
            'keyword' => $motorNama,
            'lokasi' => Kota::where('id', $kotaId)->get(),
            'merks' => Merk::all(),
            'types' => Type::all(),
            'kategori' => $typeMotor,
            'lokasiUser' => $kotaId // Pass the $kotaId to the view
        ];

        // dd($data['data']);
        // dd($data['data'][0]->motorKota[0]);

        return view('user.pencarian.index', $data);
    }


    // get gambar pada detail :
    private function getMotorData($bestMotorId)
    {
        $kotaId = Session::get('lokasiUser');
        // Set default value of $kotaId to 1 if it's empty
        if (empty($kotaId)) {
            $kotaId = 1;
        }
        $motors = Motor::with(['motorKota' => function ($query) use ($kotaId) {
            $query->where('id_kota', $kotaId);
        }])
            ->whereHas('mtrBestMotor', function ($query) use ($bestMotorId) {
                $query->where('id_best_motor', $bestMotorId);
            })
            ->whereHas('motorKota', function ($query) use ($kotaId) {
                $query->where('id_kota', $kotaId);
            })
            ->get();

        foreach ($motors as $motor) {
            // Ambil data dari setiap motorKota yang terkait
            $motorKota = $motor->motorKota->first(); // Mengambil motorKota pertama dari koleksi
            // Cek apakah ada data motorKota
            if ($motorKota) {
                // Mengambil harga dari relasi motorKota
                $motor->harga = $motorKota->harga_otr ?? null;
            } else {
                // Atur harga menjadi null jika tidak ada data motorKota terkait
                $motor->harga = null;
            }
            // Mengambil gambar motor
            $motor->image = DetailMotor::where('id_motor', $motor->id)
                ->pluck('gambar')->first();
            // Mengambil diskon motor tertinggi
            $maxDiskonPromo = DiskonMotor::where('id_motor', $motor->id)
                ->max('diskon_promo');
            $maxDiskon = DiskonMotor::where('id_motor', $motor->id)
                ->max('diskon');
            $motor->diskon_promo = $maxDiskonPromo;
            $motor->diskon = $maxDiskon;
        }


        // dd($motors);

        return $motors;
    }





    public function try()
    {
        // return "joss";
        return view('user.home.try');
    }

    private function getBandingkanMotor()
    {
        // $motor = Motor
    }



    private function getDpTermurah($bestMotorId)
    {
        $kotaId = Session::get('lokasiUser');
        // Set default value of $kotaId to 1 if it's empty
        if (empty($kotaId)) {
            $kotaId = 1;
        }
        // Subquery untuk menemukan tenor maksimal per motor
        $maxTenorSubquery = CicilanMotor::selectRaw('MAX(tenor) as max_tenor, id_motor')
            ->groupBy('id_motor');



        // Query utama untuk mendapatkan motor bersama dengan tenor maksimal dan DP terendah
        $motors = Motor::with(['motorKota' => function ($query) use ($kotaId) {
            $query->where('id_kota', $kotaId);
        }])
            ->whereHas('mtrBestMotor', function ($query) use ($bestMotorId) {
                $query->where('id_best_motor', $bestMotorId);
            })
            ->leftJoinSub($maxTenorSubquery, 'max_tenors', function ($join) {
                $join->on('motor.id', '=', 'max_tenors.id_motor');
            })
            ->leftJoin('cicilan_motor', function ($join) {
                $join->on('motor.id', '=', 'cicilan_motor.id_motor')
                    ->on('cicilan_motor.tenor', '=', 'max_tenors.max_tenor');
            })
            ->select('motor.*', 'cicilan_motor.dp', 'cicilan_motor.cicilan', 'cicilan_motor.tenor', 'cicilan_motor.id_leasing', 'cicilan_motor.id_lokasi')
            ->groupBy('motor.id')
            ->orderBy('cicilan_motor.dp', 'asc')
            ->get();

        Log::info(["data" => $motors]);

        // Menambahkan informasi gambar dan diskon ke setiap motor
        foreach ($motors as $motor) {
            // Ambil data dari setiap motorKota yang terkait
            $motorKota = $motor->motorKota->first(); // Mengambil motorKota pertama dari koleksi
            // Cek apakah ada data motorKota
            if ($motorKota) {
                // Mengambil harga dari relasi motorKota
                $motor->harga = $motorKota->harga_otr ?? null;
            } else {
                // Atur harga menjadi null jika tidak ada data motorKota terkait
                $motor->harga = null;
            }

            // Mengambil gambar motor
            $motor->image = DetailMotor::where('id_motor', $motor->id)
                ->pluck('gambar')->first();

            // Mengambil diskon motor tertinggi
            $maxDiskonPromo = DiskonMotor::where('id_motor', $motor->id)
                ->max('diskon_promo');
            $maxDiskon = DiskonMotor::where('id_motor', $motor->id)
                ->max('diskon');
            $motor->diskon_promo = $maxDiskonPromo;
            $motor->diskon = $maxDiskon;
        }

        return $motors;
    }




    private function getDpTermurahPartDua($bestMotorId)
    {
        // Ambil id_motor dari MtrBestMotor berdasarkan id_best_motor
        $motorbestArray = MtrBestMotor::where('id_best_motor', $bestMotorId)
            ->pluck('id_motor')
            ->toArray();

        if (empty($motorbestArray)) {
            return [];
        }

        // Query untuk mendapatkan setiap id_motor dengan DP terendah
        $motorsWithMinDp = CicilanMotor::whereIn('id_motor', $motorbestArray)
            ->select('id_motor', 'dp', 'cicilan', 'tenor', 'id_leasing', 'id_lokasi')
            ->orderBy('id_motor')
            ->orderBy('dp')
            ->get()
            ->unique('id_motor')
            ->values();

        // Mengembalikan data dengan DP terendah untuk setiap id_motor
        return $motorsWithMinDp;
    }
}
