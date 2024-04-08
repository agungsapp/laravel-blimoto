<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManualTransferModel;
use App\Models\PengajuanRefundModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminStatusRefund extends Controller
{
    public function index()
    {

        $data = [
            'refunds' => PengajuanRefundModel::all(),
        ];

        // dd($data['refunds'][2]->manual);
        // dd($data['refunds'][2]->manual);

        return view('admin.refund.status.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idr' => 'required|exists:refund,id', // Pastikan id refund valid dan ada di database
            'bukti' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048', // Validasi file
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Simpan file ke disk 'public', folder 'bukti_transfer'
            $filePath = $file->storeAs('bukti_transfer', $filename, 'public');

            // Ambil id pengajuan refund dari input hidden
            $idr = $request->idr;

            // Temukan record pengajuan refund yang sesuai
            $manualTransfer = ManualTransferModel::where('id_pengajuan', $idr)->first();

            if ($manualTransfer) {
                // Simpan nama file ke dalam record
                $manualTransfer->bukti_transfer = $filename;
                $manualTransfer->save();

                flash()->addSuccess("Bukti transfer berhasil diupload!");
            } else {
                flash()->addError("Data pengajuan refund tidak ditemukan.");
            }
        } else {
            flash()->addError("Harap sertakan bukti transfer.");
        }

        return redirect()->back();
    }
}


// sesuaikan databasenya
