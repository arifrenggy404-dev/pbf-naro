<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jemaat extends Model
{
    protected $table = 'jemaat';
    
    protected $fillable = [
        'nama', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 
        'telepon', 'email', 'status_anggota', 'tanggal_bergabung', 'last_data_update'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_bergabung' => 'date',
        'last_data_update' => 'date',
    ];

    public function sakramen(): HasMany
    {
        return $this->hasMany(Sakramen::class);
    }

    public function jadwalPelayanan(): BelongsToMany
    {
        return $this->belongsToMany(JadwalPelayanan::class, 'petugas_pelayanan')
                    ->withPivot('peran')
                    ->withTimestamps();
    }
}
