<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianBarangTable extends Migration
{
    public function up(): void
    {
        Schema::create('pembelian_barang', function (Blueprint $table) {
            $table->id(); // ID untuk pembelian barang
            $table->string('nama_barang'); // Nama barang yang dibeli
            $table->decimal('harga', 15, 2); // Harga barang
            $table->string('alamat_toko'); // Alamat toko
            $table->string('no_telpon_toko'); // Nomor telepon toko
            $table->string('yang_pergi_beli'); // Nama yang pergi beli barang
            $table->timestamps(); // Untuk mencatat waktu pembuatan dan update
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembelian_barang');
    }
}
