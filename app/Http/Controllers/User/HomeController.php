<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CicilanMotor;
use App\Models\DetailMotor;
use App\Models\Hook;
use App\Models\Kota;
use App\Models\Merk;
use App\Models\Mitra;
use App\Models\Motor;
use App\Models\MotorKota;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'best2' => $this->getMotorData(3),
            'best3' => $this->getMotorData(4),
            'best4' => $this->getMotorData(5),
            'blogs' => Blog::orderBy('id', 'DESC')->get(),
            'hooks' => Hook::where('status', 1)
                ->orderBy('order', 'asc')->get(),
            'mitras' => Mitra::all(),
        ];

        // dd($data['best1']);

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
        $motorNama = $request->input('motor');
        $idLokasi = intval($request->input('id_lokasi'));
        $typeMotor = intval($request->input('kategori'));

        $results = Motor::with([
            'motorKota',
            'merk',
            'type',
            'detailMotor'
        ])
            ->whereHas('type', function ($query) use ($typeMotor) {
                $query->where('id', '=', $typeMotor);
            })
            ->whereHas('motorKota', function ($query) use ($idLokasi) {
                $query->where('id_kota', '=', $idLokasi);
            })
            ->whereRaw("MATCH(motor.nama) AGAINST(? IN NATURAL LANGUAGE MODE)", [$motorNama])
            ->get();

        $data = [
            'data' => $results,
            'keyword' => $motorNama,
            'lokasi' => Kota::where('id', $idLokasi)->get(),
            'merks' => Merk::all(),
            'types' => Type::all()
        ];


        // return response()->json($data);
        // dd($data['lokasi']);
        return view('user.pencarian.index', $data);
    }

    // get gambar pada detail :
    private function getMotorData($bestMotorId)
    {
        $motors = Motor::where('id_best_motor', $bestMotorId)->get();

        foreach ($motors as $motor) {
            $motor->image = DetailMotor::where('id_motor', $motor->id)->pluck('gambar')->first();
        }

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
}
