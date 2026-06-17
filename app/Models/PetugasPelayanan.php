<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetugasPelayanan extends Model
{
    protected $table = 'petugas_pelayanan';

    protected $fillable = ['jadwal_pelayanan_id', 'jemaat_id', 'peran'];

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(JadwalPelayanan::class, 'jadwal_pelayanan_id');
    }

    public function jemaat(): BelongsTo
    {
        return $this->belongsTo(Jemaat::class, 'jemaat_id');
    }
}
