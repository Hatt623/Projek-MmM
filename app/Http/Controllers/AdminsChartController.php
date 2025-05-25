<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;


class AdminsChartController extends Controller
{
    public function getAdminChartData()
    {

        // Ambil 7 hari terakhir
        $start = now()->subDays(6); 
        $end = now();

        $labels = [];
        $pemasukkan = [];
        $pengeluaran = [];

        for ($date = $start; $date <= $end; $date->addDay()) {
            $tanggal = $date->format('Y-m-d');
            $labels[] = $tanggal;

            $pemasukkan[] = Transaksi::whereDate('created_at', $tanggal)
                ->whereDate('created_at', $tanggal)
                ->where('tipe_transaksi', 'pemasukkan')
                ->sum('jumlah');

            $pengeluaran[] = Transaksi::whereDate('created_at', $tanggal)
                ->whereDate('created_at', $tanggal)
                ->where('tipe_transaksi', 'pengeluaran')
                ->sum('jumlah');
        }

        return response()->json([
            'labels' => $labels,
            'pemasukkan' => $pemasukkan,
            'pengeluaran' => $pengeluaran,
        ]);
    }
}
