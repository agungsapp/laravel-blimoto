<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CicilanMotor;
use App\Models\Hook;
use App\Models\Merk;
use App\Models\Motor;
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
            'best1' => Motor::where('id_best_motor', 1)->get(),
            'best2' => Motor::where('id_best_motor', 2)->get(),
            'best3' => Motor::where('id_best_motor', 3)->get(),
            'best4' => Motor::where('id_best_motor', 4)->get(),
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

        $dp = CicilanMotor::where('id_motor', $id_motor)->value('dp');

        return response()->json(['dp' => $dp]);
    }
}
