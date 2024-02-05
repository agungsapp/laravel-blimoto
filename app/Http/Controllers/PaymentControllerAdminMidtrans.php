
<?php

use App\Http\Controllers\Controller;

use App\Models\Hasil;
use App\Models\Kota;
use App\Models\LeasingMotor;
use App\Models\Motor;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentControllerAdminMidtrans extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Penjualan::with('motor', 'leasing', 'hasil', 'kota', 'sales')
            ->orderBy('id', 'desc')
            ->get();
        $kota = Kota::all();
        $hasil = Hasil::all();
        $motor = Motor::all();
        $leasing = LeasingMotor::all();
        $sales = Sales::all();

        return view('admin.pembayaran.index', [
            'penjualan' => $data,
            'kota' => $kota,
            'hasil' => $hasil,
            'motor' => $motor,
            'leasing' => $leasing,
            'sales' => $sales,
        ]);
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
            'konsumen' => 'required',
            'sales' => 'required',
            'dp' => 'required',
            'id_penjualan' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back()->withInput();
        }

        try {
            $penjualan = Penjualan::where('id', $request->id_penjualan)
                ->where('nama_konsumen', $request->konsumen)
                ->where('id_sales', $request->sales)
                ->first();

            if (!$penjualan) {
                flash()->addError("Data penjualan tidak ditemukan!");
                return redirect()->back()->withInput();
            }

            // Menggunakan metode create untuk membuat pembayaran baru
            $pembayaran = Pembayaran::create([
                'id_penjualan' => $request->id_penjualan,
                'harga' => $request->dp
            ]);

            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = false;


            // Mempersiapkan data transaksi

            $transactionDetails = [
                'order_id' => $pembayaran->id,
                'gross_amount' => $pembayaran->harga,
            ];

            // Membuat transaksi ke Midtrans
            $transaction = [
                'transaction_details' => $transactionDetails,
                // Anda dapat menambahkan data customer, item_details, dll.
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($transaction);
            $snapUrl = \Midtrans\Snap::createTransaction($transaction)->redirect_url;

            return redirect()->away($snapUrl);
        } catch (\Exception $e) {
            throw $e;
            flash()->addError("Data penjualan tidak ditemukan!");
            return redirect()->back()->withInput();
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
            'konsumen' => 'required',
            'sales' => 'required',
            'pembayaran' => 'required',
            'kabupaten' => 'required',
            'hasil' => 'required',
            'motor' => 'required',
            'jumlah' => 'required',
            'tanggal_dibuat' => 'required',
            'status_pembayaran_dp' => 'required',
        ]);

        if ($validator->fails()) {
            flash()->addError("Inputkan semua data dengan benar!");
            return redirect()->back();
        }

        $penjualan = Penjualan::findOrFail($id);

        $tanggal_dibuat = \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('tanggal_dibuat'))->format('Y-m-d');
        $tanggal_hasil = $request->input('tanggal_hasil') ? \Carbon\Carbon::createFromFormat('m/d/Y', $request->input('tanggal_hasil'))->format('Y-m-d') : null;
        $pembayaran = $request->pembayaran;
        $tenor = $pembayaran === 'cash' ? 0 : $request->tenor;
        $catatan = $request->catatan ?? '-';
        $leasing = $pembayaran === 'cash' ? null : $request->leasing;

        $penjualan->nama_konsumen = $request->input('konsumen');
        $penjualan->tenor = $tenor;
        $penjualan->pembayaran = $pembayaran;
        $penjualan->id_sales = $request->input('sales');
        $penjualan->jumlah = $request->input('jumlah');
        $penjualan->catatan = $catatan;
        $penjualan->tanggal_dibuat = $tanggal_dibuat;
        $penjualan->tanggal_hasil = $tanggal_hasil;
        $penjualan->status_pembayaran_dp = $request->input('status_pembayaran_dp');
        $penjualan->id_lising = $leasing;
        $penjualan->id_motor = $request->input('motor');
        $penjualan->id_kota = $request->input('kabupaten');
        $penjualan->id_hasil = $request->input('hasil');

        $penjualan->save();

        // Redirect back with a success message
        flash()->addSuccess("Berhasil merubah data!");
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
            $penjualan = Penjualan::findOrFail($id);
            $penjualan->delete();
            flash()->addSuccess("Berhasil menghapus data!");
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->addError("Tidak bisa dihapus karena data digunakan oleh data lain!");
            return redirect()->back();
        }
    }
}
