<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPic extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'data_pic';

    // Kolom yang bisa diisi mass-assignable
    protected $fillable = ['nama'];

    // Kolom yang tidak bisa diubah
    protected $guarded = ['id'];

    // Jika kamu ingin menonaktifkan timestamps (created_at dan updated_at), bisa tambahkan
    // public $timestamps = false;
}
