<?php

namespace App\Http\Requests;

use App\Models\Laporan;
use Illuminate\Validation\Rule;

class UpdateLaporanRequest extends StoreLaporanRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'foto'   => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status' => ['required', Rule::in(Laporan::STATUS)],
        ]);
    }
}