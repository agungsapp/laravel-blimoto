<?php

namespace App\Exports;

use App\Models\Penjualan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportLaporanWilayah implements FromView
{
    use Exportable;

    protected $idWilayah;
    protected $tanggalMulai;
    protected $tanggalSelesai;

    public function __construct($idWilayah, $tanggalMulai, $tanggalSelesai)
    {
        $this->idWilayah = $idWilayah;
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
    }

    public function view(): View
    {
        $laporans = $this->query()->get(); // Ambil data berdasarkan query dengan filter
        return view('admin.penjualan_wilayah.excel', [
            'laporans' => $laporans
        ]);
    }

    public function query()
    {
        $query = Penjualan::query();

        // Filter berdasarkan wilayah hanya jika ada input wilayah yang valid
        if (!empty($this->idWilayah)) {
            $query->where('id_kota', $this->idWilayah);
        }

        // Filter berdasarkan range tanggal jika ada
        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $query->whereBetween('tanggal_dibuat', [$this->tanggalMulai, $this->tanggalSelesai]);
        } else {
            if ($this->tanggalMulai) {
                $query->where('tanggal_dibuat', '>=', $this->tanggalMulai);
            }
            if ($this->tanggalSelesai) {
                $query->where('tanggal_dibuat', '<=', $this->tanggalSelesai);
            }
        }

        return $query
            // ->whereIn('status_pembayaran_dp', ['success', 'cod'])
            ->with(['motor', 'kota', 'detailPembayaran' => function ($dp) {
                $dp->orderBy('periode', 'desc')->get();
            }]);
    }
}
