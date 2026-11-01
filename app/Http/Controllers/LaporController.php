<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLaporanRequest;
use App\Models\Laporan;

class LaporController extends Controller
{
    public function create()
    {
        return view('lapor.form');
    }

    public function store(StoreLaporanRequest $request)
    {
        $data = $request->validated();

        // Disimpan ke storage/app/public/laporan
        $data['foto'] = $request->file('foto')->store('laporan', 'public');
        $data['status'] = 'Menunggu';

        Laporan::create($data);

        return redirect()->route('lapor.create')
            ->with('success', 'Terima kasih! Laporan banjir Anda berhasil dikirim dan akan segera ditindaklanjuti petugas.');
    }
}