<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLaporanRequest;
use App\Models\Laporan;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->paginate(10);

        return view('laporan.index', compact('laporan'));
    }

    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(UpdateLaporanRequest $request, Laporan $laporan)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto); // hapus foto lama
            }
            $data['foto'] = $request->file('foto')->store('laporan', 'public');
        } else {
            unset($data['foto']); // tidak ganti foto -> pertahankan yang lama
        }

        $laporan->update($data);

        return redirect()->route('laporan.show', $laporan)
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto); // foto ikut terhapus
        }

        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}