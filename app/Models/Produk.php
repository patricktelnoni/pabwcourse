<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;
    // class OOP untuk eksekusi query
    protected $table ="produks";
    //$sql = "SELECT * FROM produk";
    protected $fillable = ['nama_produk', 'deskripsi','harga', 'stok', 'gambar'];
    // protected $guarded  = ['is_admin'];
    
}

