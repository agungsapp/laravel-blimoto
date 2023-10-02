<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CicilanMotor;
use App\Models\DetailMotor;
use App\Models\Hook;
use App\Models\Merk;
use App\Models\Motor;
use App\Models\Type;
use Illuminate\Http\Request;

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
            'hooks' => Hook::all()
        ];

        // dd($data['hook']);
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
        $tenor = $request->input('tenor');

        $dps = CicilanMotor::where('id_motor', $id_motor)
            ->where('tenor', $tenor)
            ->pluck('dp');

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


    // get gambar pada detail :
    private function getMotorData($bestMotorId)
    {
        $motors = Motor::where('id_best_motor', $bestMotorId)->get();

        foreach ($motors as $motor) {
            $motor->image = DetailMotor::where('id_motor', $motor->id)->pluck('gambar')->first();
        }

        return $motors;
    }
}
