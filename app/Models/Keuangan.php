<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keuangan extends Model
{
    protected $table = 'keuangan';

    protected $fillable = [
        'nomor_transaksi', 'tipe', 'kategori', 'jumlah', 'tanggal_transaksi', 'keterangan', 'created_by'
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date',
        'jumlah' => 'decimal:2',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
