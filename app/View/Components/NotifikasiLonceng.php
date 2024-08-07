<?php

namespace App\View\Components;

use App\Models\AksesPenjualanModel;
use App\Models\PengajuanRefundModel;
use Illuminate\View\Component;

class NotifikasiLonceng extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $total = 0;
        $pengajuanAkses = AksesPenjualanModel::where('status', 'pengajuan')->get();
        $pengajuanRefund = PengajuanRefundModel::where('status_pengajuan', 'menunggu')->get();
        $total += $pengajuanAkses->count();
        $total += $pengajuanRefund->count();

        return view('components.notifikasi-lonceng', [
            'total' => $total,
            'akses' => $pengajuanAkses,
            'refund' => $pengajuanAkses,
        ]);
    }
}
