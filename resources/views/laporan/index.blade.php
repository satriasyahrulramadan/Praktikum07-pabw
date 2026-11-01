@extends('layouts.app')

@section('content')
    <h2>Kelola Laporan Banjir</h2>

    @if ($laporan->isEmpty())
        <x-alert type="info">Belum ada laporan.</x-alert>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th><th>Foto</th><th>Pelapor</th><th>Kecamatan</th>
                        <th>Tinggi air</th><th>Tanggal</th><th>Status</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $item)
                        <tr>
                            <td>{{ $laporan->firstItem() + $loop->index }}</td>
                            <td>
                                @if ($item->foto_url)
                                    <img src="{{ $item->foto_url }}" alt="Foto banjir {{ $item->kecamatan }}" class="thumb">
                                @else
                                    <small>Tidak ada foto</small>
                                @endif
                            </td>
                            <td>{{ $item->nama_pelapor }}<br><small>{{ $item->no_hp }}</small></td>
                            <td>{{ $item->kecamatan }}</td>
                            <td>
                                {{ $item->tinggi_air }} cm<br>
                                <span class="badge {{ $item->tingkat }}">{{ $item->tingkat }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_kejadian)->format('d-m-Y') }}</td>
                            <td><span class="badge {{ $item->status }}">{{ $item->status }}</span></td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('laporan.show', $item) }}" class="btn">Detail</a>
                                    <a href="{{ route('laporan.edit', $item) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('laporan.destroy', $item) }}" method="POST"
                                          onsubmit="return confirm('Hapus laporan ini beserta fotonya?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $laporan->links() }}
    @endif
@endsection