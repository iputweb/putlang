<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_barang' => 'required',
            'gambar_barang' => 'nullable',
            'tanggal_barang' => 'required',
            'harga_barang' => 'required',
            'deskripsi_barang' => 'nullable'
        ];
    }
}
