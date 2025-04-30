<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Dompet;

class AdminsonlyController extends Controller
{
    public function __construct()
     {
        $this->middleware('auth');
        
     }

     public function index()
    {
        $transaksi = Transaksi::all();

        $dompet = Dompet::all();
        $totalsaldo = $dompet->sum('saldo');
        $totaldompet = $dompet->count();

        $user = User::with('dompet')->get(); 
        $totaluser = $user->count();
        // $totaldompet = $dompet->count(); ilangin dulu aja
        return view('adminonly.index', compact('transaksi','dompet', 'totalsaldo','user','totaluser'));
    }
    
}
