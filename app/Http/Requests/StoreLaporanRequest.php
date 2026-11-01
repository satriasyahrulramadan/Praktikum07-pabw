<?php

namespace App\Http\Requests;

use App\Models\Laporan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLaporanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama_pelapor'     => ['required', 'string', 'max:255'],
            'no_hp'            => ['required', 'regex:/^(\+62|62|0)8[0-9]{8,12}$/'],
            'lokasi'           => ['required', 'string', 'max:255'],
            'kecamatan'        => ['required', Rule::in(Laporan::KECAMATAN)],
            'tinggi_air'       => ['required', 'integer', 'min:0', 'max:1000'],
            'tanggal_kejadian' => ['required', 'date', 'before_or_equal:today'],
            'keterangan'       => ['nullable', 'string', 'max:1000'],
            'foto'             => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'required'        => ':attribute wajib diisi.',
            'string'          => ':attribute harus berupa teks.',
            'integer'         => ':attribute harus berupa angka bulat.',
            'date'            => ':attribute bukan tanggal yang valid.',
            'before_or_equal' => ':attribute tidak boleh melebihi hari ini.',
            'in'              => ':attribute yang dipilih tidak valid.',
            'nama_pelapor.max' => 'Nama pelapor maksimal 255 karakter.',
            'lokasi.max'       => 'Lokasi maksimal 255 karakter.',
            'keterangan.max'   => 'Keterangan maksimal 1000 karakter.',
            'tinggi_air.min'   => 'Tinggi air minimal 0 cm.',
            'tinggi_air.max'   => 'Tinggi air maksimal 1000 cm.',
            'no_hp.regex'      => 'Format nomor HP tidak valid (contoh: 081234567890).',
            'foto.image'       => 'File harus berupa gambar.',
            'foto.mimes'       => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'         => 'Ukuran foto maksimal 2 MB.',
            'foto.uploaded'    => 'Foto gagal diunggah (ukuran maksimal 2 MB).',
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_pelapor'     => 'Nama pelapor',
            'no_hp'            => 'No. HP',
            'lokasi'           => 'Lokasi',
            'kecamatan'        => 'Kecamatan',
            'tinggi_air'       => 'Tinggi air',
            'tanggal_kejadian' => 'Tanggal kejadian',
            'keterangan'       => 'Keterangan',
            'foto'             => 'Foto',
            'status'           => 'Status',
        ];
    }
}