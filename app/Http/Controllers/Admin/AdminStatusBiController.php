<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slik;
use App\Models\StatusBI;
use App\Models\TypeSlik;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminStatusBiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $data = [
      'status' => StatusBI::all(),
    ];

    return view('admin.status-bi.index', $data);
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
      'status' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      $lowercaseStatus = strtolower($request->input('status'));

      // Check if the status with the given lowercase value already exists
      $existingStatus = StatusBI::whereRaw('LOWER(status) = ?', [$lowercaseStatus])->first();

      if ($existingStatus) {
        flash()->addError("Status dengan nama {$request->status} sudah ada!");
        return redirect()->back()->withInput();
      }

      // Create a new status only if it doesn't exist
      $status = StatusBI::create([
        'status' => $lowercaseStatus,
      ]);

      flash()->addSuccess("Status {$status->status} berhasil dibuat");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Gagal membuat status, pastikan sudah benar!");
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
    // Validasi data input
    $validator = Validator::make($request->all(), [
      'status' => 'required',
    ]);

    if ($validator->fails()) {
      flash()->addError("Inputkan semua data dengan benar!");
      return redirect()->back();
    }

    try {
      $status = StatusBI::find($id);
      $status->status = $request->input('status');
      $status->save();

      flash()->addSuccess("Data berhasil diupdate");
      return redirect()->back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->addError("Data gagal di update");
      return redirect()->back();
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
    $slik = StatusBI::findOrFail($id);
    try {
      $slik->delete();
      flash()->addSuccess("Berhasil menghapus data!");
      return redirect()->back();
    } catch (\Throwable $th) {
      flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
      return redirect()->back();
    }
  }
}
