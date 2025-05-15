<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Transaksi;
use App\Models\user;


class ChartsController extends Controller
{
    public function getChartData()
    {
        $userid = Auth::id();

        // Ambil 7 hari terakhir
        $start = now()->subDays(6); 
        $end = now();

        $labels = [];
        $pemasukkan = [];
        $pengeluaran = [];

        for ($date = $start; $date <= $end; $date->addDay()) {
            $tanggal = $date->format('Y-m-d');
            $labels[] = $tanggal;

            $pemasukkan[] = Transaksi::where('user_id', $userid)
                ->whereDate('created_at', $tanggal)
                ->where('tipe_transaksi', 'pemasukkan')
                ->sum('jumlah');

            $pengeluaran[] = Transaksi::where('user_id', $userid)
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
