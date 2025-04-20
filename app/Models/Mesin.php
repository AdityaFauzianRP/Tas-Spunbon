<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'mesin';

    protected $fillable = [
        'kode_mesin',
        'nama_mesin',
    ];

    public $timestamps = false; // karena hanya ada created_at
}
