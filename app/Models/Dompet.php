<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_dompet', 'saldo','user_id','created_at'];
    public $timestamp = true;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function transaksi()
    {
        return $this->hasmany(Transaksi::class);
    }
}
