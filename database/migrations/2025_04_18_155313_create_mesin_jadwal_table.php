<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesinJadwalTable extends Migration
{
    public function up(): void
    {
        Schema::create('mesin_jadwal', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mesin_id');
            $table->string('hari', 10)->nullable();
            $table->date('tanggal')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();

            // Rencana Proses
            $table->string('produk', 100)->nullable();
            $table->string('proses', 100)->nullable();
            $table->integer('qty')->nullable();
            $table->string('unit', 20)->nullable();
            $table->string('next_proses', 100)->nullable();
            $table->date('next_tgl')->nullable();
            $table->date('tgl_kirim')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('pic', 100)->nullable();

            // Realisasi Proses
            $table->string('produk_real', 100)->nullable();
            $table->string('proses_real', 100)->nullable();
            $table->integer('output')->nullable();
            $table->string('satuan_output', 20)->nullable();
            $table->text('catatan')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('mesin_id')->references('id')->on('mesin')->onDelete('cascade');

            $table->unique(['mesin_id', 'tanggal', 'jam_mulai'], 'unique_jam_mulai');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesin_jadwal');
    }
}
