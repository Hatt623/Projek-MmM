<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Dompet;
use App\Models\User;

class DompetsController extends Controller
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
        $dompet = Dompet::where('user_id', Auth::id()) -> paginate(5);
        return view('dompet.index', compact('dompet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dompet = Dompet::where('user_id', Auth::id()) -> get();
        return view('dompet.create', compact('dompet'));
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
            'nama_dompet' => 'required|string|max:30',
            'saldo' => 'integer',
        ],
        [
            'nama_dompet.required' => 'Nama dompet tidak boleh kosong',
            
        ]);
        
        $dompet = new Dompet();

        //      Nama yang di tabel          nama yang di form
        $dompet->nama_dompet           = $request->nama_dompet;
        $dompet->saldo                 = $request->saldo;

        $dompet->user_id               = Auth::id();
        $dompet->created_at            = now();

        $dompet->save();

        return redirect()->route('dompet.index')->with('success', 'Dompet berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dompet = Dompet::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('dompet.show', compact('dompet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dompet = Dompet::where('id', $id)->where('user_id', Auth::id()) -> firstOrFail();
        return view('dompet.edit', compact('dompet'));
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
            'nama_dompet' => 'required|string|max:30',
            'saldo' => 'integer',
        ],
        [
            'nama_dompet.required' => 'Nama dompet tidak boleh kosong',
        ]);
        
        $dompet = Dompet::where('id', $id)->where('user_id', Auth::id()) -> firstOrFail();

        //      Nama yang di tabel          nama yang di form
        $dompet->nama_dompet           = $request->nama_dompet;
        $dompet->saldo                 = $request->saldo;

        $dompet->save();

        return redirect()->route('dompet.index')->with('success', 'Dompet berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dompet = Dompet::where('id', $id)->where('user_id', Auth::id()) -> firstOrFail();
        $dompet->delete();

        return redirect()->route('dompet.index')->with('success', 'Dompet berhasil dihapus');
    }
}
