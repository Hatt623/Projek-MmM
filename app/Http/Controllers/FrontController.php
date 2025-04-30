<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaksi;
use App\Models\user;
use App\Models\Dompet;

class FrontController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $userid = Auth::id();

        $transaksi = Transaksi::where('user_id', $userid)->get();
        $dompet = Dompet::where('user_id', $userid)->get();

        $totalsaldo = $dompet->sum('saldo');
        $totaldompet = $dompet->count();

        return view('welcome', compact('transaksi', 'totalsaldo','totaldompet','dompet'));
    }
}
