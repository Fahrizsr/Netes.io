<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRotasiTelurRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jumlah_rotasi' => 'required|integer',
            'jam_rotasi'    => 'required|date_format:H:i:s',
            'id_riwayat'    => 'required|exists:riwayat_inkubasi,id_riwayat'
        ];
    }
}
