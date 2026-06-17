<?php

namespace App\Http\Requests\Jemaat;

use Illuminate\Foundation\Http\FormRequest;

class StoreJemaatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:L,P',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:jemaat,email',
            'status_anggota' => 'required|in:Aktif,Pindah,Meninggal',
            'tanggal_bergabung' => 'required|date',
        ];
    }
}
