@extends('layouts.app')

@section('content')
    <h2>Detail Laporan #{{ $laporan->id }}</h2>

    <div class="card">
        @if ($laporan->foto_url)
            <p><img src="{{ $laporan->foto_url }}" alt="Foto bukti banjir" class="foto-detail"></p>
            <p><a href="{{ $laporan->foto_url }}" download>Unduh foto</a></p>
        @else
            <p><em>Tidak ada foto bukti.</em></p>
        @endif

        <table>
            <tr><th style="width: 200px;">Nama pelapor</th><td>{{ $laporan->nama_pelapor }}</td></tr>
            <tr><th>No. HP</th><td>{{ $laporan->no_hp }}</td></tr>
            <tr><th>Lokasi</th><td>{{ $laporan->lokasi }}</td></tr>
            <tr><th>Kecamatan</th><td>{{ $laporan->kecamatan }}</td></tr>
            <tr>
                <th>Tinggi air</th>
                <td>{{ $laporan->tinggi_air }} cm <span class="badge {{ $laporan->tingkat }}">{{ $laporan->tingkat }}</span></td>
            </tr>
            <tr><th>Tanggal kejadian</th><td>{{ \Carbon\Carbon::parse($laporan->tanggal_kejadian)->format('d-m-Y') }}</td></tr>
            <tr><th>Keterangan</th><td>{{ $laporan->keterangan ?: '-' }}</td></tr>
            <tr><th>Status</th><td><span class="badge {{ $laporan->status }}">{{ $laporan->status }}</span></td></tr>
            <tr><th>Dilaporkan pada</th><td>{{ $laporan->created_at?->format('d-m-Y H:i') }}</td></tr>
        </table>
    </div>

    <div class="aksi">
        <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection