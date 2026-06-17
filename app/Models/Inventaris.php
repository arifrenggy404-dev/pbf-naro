<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    protected $fillable = [
        'kode_barang', 'nama_barang', 'jumlah', 'kondisi', 'tanggal_pengadaan', 'nilai_perolehan'
    ];

    protected $casts = [
        'tanggal_pengadaan' => 'date',
        'nilai_perolehan' => 'decimal:2',
    ];
}
