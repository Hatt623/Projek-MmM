<?php

namespace App\Observers;

use App\Models\Transaksi;
use App\Models\Dompet;

class TransaksiObserver
{
    /**
     * Kalau buat create data
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return void
     */
    public function created(Transaksi $transaksi)
    {
        $dompet = Dompet::find($transaksi->id_dana);
        if ($dompet) {
            if ($transaksi->tipe_transaksi == 'Pemasukkan') {
                $dompet->saldo += $transaksi->jumlah;

            } 
            
            elseif ($transaksi->tipe_transaksi == 'Pengeluaran') {
                $dompet->saldo -= $transaksi->jumlah;
            }
            $dompet->save();
        }
    }

    /**
     * Kalau buat Update data
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return void
     */
    public function updated(Transaksi $transaksi)
    {
        // data sebelum update
        $original = $transaksi->getOriginal(); 
        $dompet = Dompet::find($transaksi->id_dana);

        if ($dompet) {
            // Balikin saldo berdasarkan data lama dulu
            if ($original['tipe_transaksi'] == 'Pemasukkan') {
                $dompet->saldo -= $original['jumlah'];

            } 
            
            elseif ($original['tipe_transaksi'] == 'Pengeluaran') {
                $dompet->saldo += $original['jumlah'];
            }

            // update saldo pakai data baru
            if ($transaksi->tipe_transaksi == 'Pemasukkan') {
                $dompet->saldo += $transaksi->jumlah;
                
            } 
            
            elseif ($transaksi->tipe_transaksi == 'Pengeluaran') {
                $dompet->saldo -= $transaksi->jumlah;
            }

            $dompet->save();
        }
    }

    /**
     * kalau buat delete
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return void
     */
    public function deleted(Transaksi $transaksi)
    {
        $dompet = Dompet::find($transaksi->id_dana);
        if ($dompet) {
            // Balikin saldo
            if ($transaksi->tipe_transaksi == 'Pemasukkan') {
                $dompet->saldo -= $transaksi->jumlah;
                
            } elseif ($transaksi->tipe_transaksi == 'Pengeluaran') {
                $dompet->saldo += $transaksi->jumlah;
            }
            $dompet->save();
        }
    }

    /**
     * Handle the Transaksi "restored" event.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return void
     */
    public function restored(Transaksi $transaksi)
    {
        //
    }

    /**
     * Handle the Transaksi "force deleted" event.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return void
     */
    public function forceDeleted(Transaksi $transaksi)
    {
        //
    }
}
