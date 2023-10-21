<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class HookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'hooks' => Hook::all()
        ];


        return view('admin.hook.index', $data);
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
            'nama' => 'required|string|max:255',
            'link' => 'required|max:255',
            'caption' => 'required|string|max:255',
            'warna' => 'required|string|max:7',
            'warna_teks' => 'required|string|max:7',
            'status-hook' => 'required',
            'urutan-hook' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // dd($request->all());

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        try {
            $gambar = $request->file('gambar');
            $waktu = Carbon::now();
            $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/images/custom/hook/'), $gambarName);

            Hook::create([
                'nama' => $request->input('nama'),
                'gambar' => $gambarName,
                'link' => $request->input('link'),
                'warna' => $request->input('warna'),
                'status' => $request->input('status-hook'),
                'order' => $request->input('urutan-hook'),
                'warna_teks' => $request->input('warna_teks'),
                'caption' => $request->input('caption'),
            ]);

            flash()->addSuccess("Data hook berhasil ditambah");
            return redirect()->route('admin.hook.index');
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Data hook gagal di tambah");
            return redirect()->route('admin.hook.index');
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
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'link' => 'required|max:255',
            'caption' => 'required|string|max:255',
            'warna' => 'required|string|max:7', // Sesuaikan dengan panjang HEX
            'warna_teks' => 'required|string|max:7', // Sesuaikan dengan panjang HEX
            'status' => $request->input('status-hook'),
            'order' => $request->input('urutan-hook'),
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Sesuaikan dengan jenis dan ukuran gambar
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        try {
            $hook = Hook::find($id);

            if ($request->hasFile('gambar')) {

                $gambarLama = public_path('assets/images/custom/hook/' . $hook->gambar);
                if (file_exists($gambarLama)) {
                    unlink($gambarLama);
                }
                $gambar = $request->file('gambar');

                $waktu = Carbon::now();
                $gambarName = $waktu->toDateString() . '_' . $gambar->getClientOriginalName();

                $gambar->move(public_path('assets/images/custom/hook/'), $gambarName);
                $hook->gambar = $gambarName;
            }

            $hook->nama = $request->input('nama');
            $hook->link = $request->input('link');
            $hook->caption = $request->input('caption');
            $hook->warna = $request->input('warna');
            $hook->warna_teks = $request->input('warna_teks');
            $hook->status = $request->input('status-hook');
            $hook->order = $request->input('urutan-hook');

            $hook->save();

            flash()->addSuccess("Data hook berhasil diupdate");
            return redirect()->route('admin.hook.index');
        } catch (\Throwable $th) {
            throw $th;
            flash()->addError("Data hook gagal di update");
            return redirect()->route('admin.hook.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hook = Hook::findOrFail($id);
        try {
            $gambarLama = public_path('assets/images/custom/hook/' . $hook->gambar);
            if (file_exists($gambarLama)) {
                unlink($gambarLama);
            }
            $hook->delete();
            flash()->addSuccess("Berhasil menghapus hook!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("$hook->name tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
