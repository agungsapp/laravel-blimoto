<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ColorModel;
use App\Models\Motor;
use App\Models\WarnaMotorModel;
use Illuminate\Http\Request;

class AdminWarnaMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'motors' => Motor::all(),
            'colors' => ColorModel::all(),
            'warnaMotors' => WarnaMotorModel::all()
        ];

        return view('admin.warna_motor.index', $data);
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
        $request->validate([
            'motor' => 'required',
            'color' => 'required|array',
            'color.*' => 'exists:color,id',
        ]);

        $id_motor = $request->motor;
        $newColors = $request->color;

        // Update or create new data
        foreach ($newColors as $id_color) {
            WarnaMotorModel::updateOrCreate(
                [
                    'id_motor' => $id_motor,
                    'id_color' => $id_color,
                ],
                [
                    // Jika ada kolom lain yang perlu diperbarui atau dibuat, Anda dapat menambahkannya di sini
                ]
            );
        }

        // Delete old data that are not in the new color selection
        WarnaMotorModel::where('id_motor', $id_motor)
            ->whereNotIn('id_color', $newColors)
            ->delete();

        flash()->addSuccess("Berhasil menambahkan, memperbarui, atau menghapus data warna motor");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Ambil data warna berdasarkan motor yang dipilih
        $colors = WarnaMotorModel::where('id_motor', $id)->pluck('id_color')->toArray();

        return response()->json($colors);
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
}
