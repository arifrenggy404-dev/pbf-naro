<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JadwalPelayanan extends Model
{
    protected $table = 'jadwal_pelayanan';

    protected $fillable = [
        'nama_kegiatan', 'waktu_mulai', 'waktu_selesai', 'lokasi', 'deskripsi'
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    public function petugas(): HasMany
    {
        return $this->hasMany(PetugasPelayanan::class);
    }

    public function jemaatPetugas(): BelongsToMany
    {
        return $this->belongsToMany(Jemaat::class, 'petugas_pelayanan')
                    ->withPivot('peran')
                    ->withTimestamps();
    }
}
