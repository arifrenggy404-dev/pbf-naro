<?php

namespace App\Http\Requests\Jadwal;

use Illuminate\Foundation\Http\FormRequest;

class StoreJadwalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_kegiatan' => 'required|string|max:255',
            'waktu_mulai' => 'required|date|after:now',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'petugas' => 'required|array|min:1',
            'petugas.*.jemaat_id' => 'required|exists:jemaat,id',
            'petugas.*.peran' => 'required|string|max:100',
        ];
    }
}
