<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sakramen extends Model
{
    protected $table = 'sakramen';

    protected $fillable = [
        'jemaat_id', 'jenis_sakramen', 'tanggal_pelaksanaan', 
        'tempat_pelaksanaan', 'pendeta_pelayan', 'catatan'
    ];

    protected $casts = [
        'tanggal_pelaksanaan' => 'date',
    ];

    public function jemaat(): BelongsTo
    {
        return $this->belongsTo(Jemaat::class);
    }
}
