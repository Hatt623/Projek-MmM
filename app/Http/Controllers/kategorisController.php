<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class kategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Untuk user udah login atau belom
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('kategori.create', compact('kategori'));
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
            'nama_kategori' => 'required|string|max:30',
            'deskripsi' => 'required|string|max:100',
        ],
        [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ]);
        
        $kategori = new Kategori();

        //      Nama yang di tabel          nama yang di form
        $kategori->nama_kategori           = $request->nama_kategori;
        $kategori->deskripsi               = $request->deskripsi;

        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::FindOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::FindOrFail($id);
        return view('kategori.edit', compact('kategori'));
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
            'nama_kategori' => 'required|string|max:30',
            'deskripsi' => 'required|string|max:100',
        ],
        [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ]);

        $kategori = Kategori::FindOrFail($id);

        //      Nama yang di tabel          nama yang di form
        $kategori->nama_kategori                 = $request->nama_kategori;
        $kategori->deskripsi                = $request->deskripsi;

        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::FindOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
