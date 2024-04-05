<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminBankController extends Controller
{
    public function getBank()
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'https://api-rekening.lfourr.com/listBank', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                $body = json_decode($response->getBody()->getContents(), true);
                return response()->json(['status' => true, 'data' => $body['data']]);
            } else {
                return response()->json(['status' => false, 'message' => 'Gagal mendapatkan data dari API'], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            Log::error('Error fetching bank data: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Terjadi kesalahan saat menghubungi API'], 500);
        }
    }

    public function getBankAcc(Request $request)
    {


        $client = new Client();
        try {
            $response = $client->request('GET', "https://api-rekening.lfourr.com/getBankAccount?bankCode=$request->bank&accountNumber=$request->norek", [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                $body = json_decode($response->getBody()->getContents(), true);
                return response()->json(['status' => true, 'data' => $body['data']]);
            } else {
                return response()->json(['status' => false, 'message' => 'Gagal mendapatkan data dari API'], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            Log::error('Error fetching bank data: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Terjadi kesalahan saat menghubungi API'], 500);
        }
    }
}
