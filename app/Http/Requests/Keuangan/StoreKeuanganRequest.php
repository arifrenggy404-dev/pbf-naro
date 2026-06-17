<?php

namespace App\Http\Requests\Keuangan;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeuanganRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tipe' => 'required|in:Pemasukan,Pengeluaran',
            'kategori' => 'required|string|max:100',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_transaksi' => 'required|date',
            'keterangan' => 'nullable|string',
        ];
    }
}
