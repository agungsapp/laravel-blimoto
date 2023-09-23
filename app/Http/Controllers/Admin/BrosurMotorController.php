<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrosurMotor;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrosurMotorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$data = [
			'brosur_motors' => BrosurMotor::with('motor')->get(),
			'motors' => Motor::all()
		];

		return view('admin.brosur-motor.index', $data);
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
		// Validate the request
		$validator = Validator::make(
			$request->all(),
			[
				'file-pdf' => 'required|file|mimes:pdf',
				'is-popular' => 'required',
				'motor' => 'required'
			]
		);

		if ($validator->fails()) {
			flash()->addError("Inputkan semua data dengan benar!");
			return redirect()->back();
		}

		// Store the file
		try {
			$file = $request->file('file-pdf');
			$filename = $file->getClientOriginalName();
			$file->move(public_path('assets/pdfs'), $filename);
			BrosurMotor::create([
				'nama_file' => $filename,
				'is_popular' => $request->input('is-popular'),
				'id_motor' => $request->input('motor'),
			]);
			flash()->addSuccess("Berhasil menambahkan data brosur!");
			return redirect()->back();
		} catch (\Throwable $th) {
			throw $th;
			flash()->addError("Gagal menambahkan data brosur!");
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
		// Validate the request
		$validator = Validator::make(
			$request->all(),
			[
				'file-pdf' => 'required|file|mimes:pdf',
				'is-popular' => 'required',
			]
		);

		if ($validator->fails()) {
			flash()->addError("Inputkan semua data dengan benar!");
			return redirect()->back();
		}

		// Get the old brochure
		$oldBrochure = BrosurMotor::find($id);

		// Delete the old file
		File::delete(public_path('assets/pdfs/' . $oldBrochure->nama_file));

		// Store the new file
		try {
			$file = $request->file('file-pdf');
			$filename = $file->getClientOriginalName();
			$file->move(public_path('assets/pdfs'), $filename);

			// Update the database
			$oldBrochure->update([
				'nama_file' => $filename,
				'is_popular' => $request->input('is-popular'),
			]);

			flash()->addSuccess("Berhasil merubah data brosur!");
			return redirect()->back();
		} catch (\Throwable $th) {
			throw $th;
			flash()->addError("Gagal menambahkan data brosur!");
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
		// Get the brochure
		$brochure = BrosurMotor::find($id);

		// Delete the file
		File::delete(public_path('assets/pdfs/' . $brochure->nama_file));

		// Delete the brochure from the database
		$brochure->delete();

		flash()->addSuccess("Berhasil hapus data brosur!");
		return redirect()->back();
	}
}
