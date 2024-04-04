<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\PengajuanRefundModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminApiRefundController extends Controller
{

    public function proses(Request $request)
    {

        try {


            $validate = $request->validate([
                'idp' => 'required|string', // Assumsi order_id adalah string
            ]);

            $idp = $request->idp;
            $refund = PengajuanRefundModel::where('id_penjualan', $idp)->first();
            $pembayaran = Pembayaran::where('id_penjualan', $idp)->first();

            // return response()->json(['success' => $refund]);

            $nominal = $refund->nominal;
            $order_id = $pembayaran->order_id;

            $auth = 'Basic ' . base64_encode(env('MIDTRANS_SERVER_KEY'));
            // return response()->json(['message' => $auth]);
            $client = new Client();
            $response = $client->request('POST', 'https://api.sandbox.midtrans.com/v2/' . $order_id . '/refund', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $auth
                ],
                'json' => [
                    'refund_key' => 'RFND-' . uniqid(),
                    'amount' => $nominal,
                    'reason' => 'pengembalian dana blimoto'
                ]
            ]);

            $body = json_decode($response->getBody(), true);

            switch ($body['status_code']) {
                case '200':
                    $body['message'] = 'Pengembalian dana berhasil dilakukan.';
                    $refund->status_pengajuan = 'completed';
                    $refund->save();
                    break;
                case '414':
                    $body['message'] = 'Pengembalian dana mungkin sudah di lakukan sebelumnya.';
                    break;
                case '500':
                    $body['message'] = 'Terjadi sebuah kesalahan saat melakukan request.';
                    break;
                default:
                    $body['message'] = 'Tidak terdefinisi';
                    break;
            }

            // Mengembalikan response dengan status code 200 dan body yang sudah dimodifikasi
            return response()->json($body, 200);
            // return response()->json($body);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function pengajuanRefund(Request $request, $id)
    {
        // Membuat rules validasi
        $rules = [
            'idr' => 'required',
            'konsumen' => 'required',
            'dp' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'motor' => 'required',
        ];
        // Melakukan validasi
        $validator = Validator::make($request->all(), $rules);

        // Cek jika validasi gagal
        if ($validator->fails()) {
            // Mengembalikan response JSON dengan pesan error dan kode status 422
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $cekPengajuanLalu = PengajuanRefundModel::where('id_penjualan', $request->idr)
            ->where('status_pengajuan', 'menunggu')
            ->get();

        if ($cekPengajuanLalu->count() > 0) {
            return response()->json(['error' => 'Pengajuan sebelumnya masih dalam proses mohon menunggu !'], 500);
        }

        try {
            $pengajuan = new PengajuanRefundModel();
            $pengajuan->id_penjualan = $request->idr;
            $pengajuan->nominal = $request->dp;
            $pengajuan->status_pengajuan = 'menunggu';
            $pengajuan->metode_pembayaran = $request->metode_pembayaran;
            if ($request->catatan) {
                $pengajuan->catatan = $request->catatan;
            }
            $pengajuan->save();

            return response()->json(['message' => 'Pengajuan refund sedang menunggu di acc oleh CEO ! '], 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Gagal terjadi kesalahan pada server: ' . $th->getMessage()], 500);
        }
    }
}
