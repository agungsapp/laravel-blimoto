<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ColorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'colors' => ColorModel::all()
        ];

        return view('admin.color.index', $data);
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        try {
            // Check if the city already exists
            $existingColor = ColorModel::whereRaw('LOWER(nama) = LOWER(?)', [$request->input('nama')])->first();

            if ($existingColor) {
                flash()->addError("Kota {$existingColor->nama} sudah ada!");
                return redirect()->back()->withInput();
            }

            // If not, create a new city
            $color = ColorModel::create([
                'nama' => $request->input('nama')
            ]);

            flash()->addSuccess("Warna $color->nama berhasil dibuat");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("Gagal membuat data pastikan sudah benar!");
            return redirect()->back();
        }
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
        $validator = Validator::make($request->all(), [
            'nama_edit' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        // Find the Type model by id
        $type = ColorModel::findOrFail($id);

        // Update the Type model
        $type->nama = $request->nama_edit;
        $type->save();

        // Redirect back with a success message
        flash()->addSuccess("Berhasil merubah warna!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $type = ColorModel::findOrFail($id);
            $type->delete();
            flash()->addSuccess("Berhasil menghapus warna!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("$type->name tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
