<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBarang extends Model
{
    use HasFactory;

    protected $table = 'pembelian_barang';

    // Tentukan kolom-kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama_barang',
        'harga',
        'alamat_toko',
        'no_telpon_toko',
        'yang_pergi_beli',
    ];

    // Jika ada kolom yang perlu diparsing secara otomatis (misal harga), kamu bisa membuat accessor atau mutator
}
