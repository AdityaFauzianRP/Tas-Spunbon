<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MesinJadwal extends Model
{
    protected $table = 'mesin_jadwal';

    protected $fillable = [
        'mesin_id',
        'hari',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'produk',
        'proses',
        'qty',
        'unit',
        'next_proses',
        'next_tgl',
        'tgl_kirim',
        'keterangan',
        'pic',
        'produk_real',
        'proses_real',
        'output',
        'satuan_output',
        'catatan',
    ];

    public function mesin(): BelongsTo
    {
        return $this->belongsTo(Mesin::class);
    }
}
