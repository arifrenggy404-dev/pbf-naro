<?php

namespace App\Http\Requests\Inventaris;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventarisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode_barang' => 'required|string|unique:inventaris,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'tanggal_pengadaan' => 'required|date',
            'nilai_perolehan' => 'required|numeric|min:0',
        ];
    }
}
