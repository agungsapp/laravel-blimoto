<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TypeMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = DB::table('type')
            ->where('nama', 'LIKE', "%{$search}%")
            ->paginate(10);
        return view('admin.type_merk.index', [
            'types' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
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
            $type = Type::create([
                'nama' => $request->input('nama')
            ]);
            flash()->addSuccess("Type motor $type->nama berhasil dibuat");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("Gagal membuat data pastikan sudah benar!");
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function createMerkMotor(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         flash()->addError("Inputkan semua data dengan benar!");
    //         return redirect()->back();
    //     }

    //     try {
    //         $merk = Merk::create([
    //             'nama' => $request->input('nama')
    //         ]);
    //         flash()->addSuccess("Merk motor $merk->nama berhasil dibuat");
    //         return redirect()->back();
    //     } catch (\Throwable $th) {
    //         throw $th;
    //         flash()->addError("Gagal membuat data pastikan sudah benar!");
    //         return redirect()->back();
    //     }
    // }

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
        $type = Type::findOrFail($id);

        // Update the Type model
        $type->nama = $request->nama_edit;
        $type->save();

        // Redirect back with a success message
        flash()->addSuccess("Berhasil merubah type motor: $type->name !");
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
            $type = Type::findOrFail($id);
            $type->delete();
            flash()->addSuccess("Berhasil menghapus type motor!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("$type->name tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
