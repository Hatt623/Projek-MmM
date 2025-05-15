<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Transaksi;
use App\Models\Dompet;
use App\Models\User;


class TransaksisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $transaksi = Transaksi::where('user_id', Auth::id()) -> get();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = Transaksi::where('user_id', Auth::id()) -> get();
        $dompet = Dompet::where('user_id', Auth::id()) -> get();
        
        return view('transaksi.create', compact('transaksi','dompet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([     
            'deskripsi' => 'required|string|max:100',
            'jumlah' => 'required|integer',
            'tipe_transaksi' => 'required|string|max:30',
        ],
        [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 100 karakter',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'jumlah.min' => 'Jumlah tidak boleh kurang dari 0',
            'tipe_transaksi.required' => 'Tipe transaksi tidak boleh kosong',
            'tipe_transaksi.string' => 'Tipe transaksi harus berupa string',
            'tipe_transaksi.max' => 'Tipe transaksi tidak boleh lebih dari 30 karakter',

        ]);

        $transaksi = new Transaksi();
        //      Nama yang di tabel          nama yang di form
        $transaksi->deskripsi               = $request->deskripsi;
        $transaksi->jumlah                  = $request->jumlah;
        $transaksi->tipe_transaksi          = $request->tipe_transaksi;
        $transaksi->id_dana                 = $request->id_dana;
        
        $transaksi->user_id                 = Auth::id();
        $transaksi->created_at              = now();

        // if ($request->tipe_transaksi == 'Pengeluaran') {
        //     $dompet = Dompet::find($request->id_dana);
        
        //     if ($dompet->saldo < $request->jumlah) {
        //         return redirect()->route('transaksi.index')->with('error', 'Saldo tidak mencukupi!');
        //     }
        // }

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'transaksi created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $dompet = Dompet::where('user_id', Auth::id())->get();

        return view('transaksi.show', compact('transaksi', 'dompet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $dompet = Dompet::where('user_id', Auth::id())->get();

        return view('transaksi.edit', compact('transaksi','dompet'));
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
        // Validasi input
        $request->validate([     
            'deskripsi' => 'required|string|max:100',
            'jumlah' => 'required|integer',
            'tipe_transaksi' => 'required|string|max:30',
        ],
        [
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 100 karakter',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'jumlah.min' => 'Jumlah tidak boleh kurang dari 0',
            'tipe_transaksi.required' => 'Tipe transaksi tidak boleh kosong',
            'tipe_transaksi.string' => 'Tipe transaksi harus berupa string',
            'tipe_transaksi.max' => 'Tipe transaksi tidak boleh lebih dari 30 karakter',
            
        ]);

        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        //      Nama yang di tabel          nama yang di form
        $transaksi->deskripsi               = $request->deskripsi;
        $transaksi->jumlah                  = $request->jumlah;
        $transaksi->tipe_transaksi          = $request->tipe_transaksi;
        $transaksi->id_dana                 = $request->id_dana;

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'transaksi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $transaksi = Transaksi::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil dihapus');
    }
}
