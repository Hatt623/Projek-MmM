<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_kategori','deskripsi'];
    public $timestamp = true;

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
