<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesinTable extends Migration
{
    public function up(): void
    {
        Schema::create('mesin', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->string('kode_mesin', 50)->unique(); // kode_mesin VARCHAR(50) UNIQUE NOT NULL
            $table->string('nama_mesin', 100); // nama_mesin VARCHAR(100) NOT NULL
            $table->timestamp('created_at')->useCurrent(); // created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->nullable()->useCurrent(); // updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NULL
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesin');
    }
}
