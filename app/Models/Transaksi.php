<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'deskripsi','jumlah','tipe_transaksi','id_dana','user_id','created_at'];
    public $timestamp = true;

    // Untuk relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Untuk relasi ke tabel dompet
    public function dompet()
    {
        return $this->belongsTo(Dompet::class, 'id_dana');
    }       

    

}
