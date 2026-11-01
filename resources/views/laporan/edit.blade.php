@extends('layouts.app')

@section('content')
    <h2>Edit Laporan #{{ $laporan->id }}</h2>

    <form action="{{ route('laporan.update', $laporan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('partials.laporan-fields', ['laporan' => $laporan])

        <div class="field">
            <label for="status">Status penanganan</label>
            <select id="status" name="status">
                @foreach (\App\Models\Laporan::STATUS as $st)
                    <option value="{{ $st }}" @selected(old('status', $laporan->status) === $st)>{{ $st }}</option>
                @endforeach
            </select>
            @error('status') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label>Foto saat ini</label>
            @if ($laporan->foto_url)
                <img src="{{ $laporan->foto_url }}" alt="Foto bukti" class="thumb" style="width: 150px; height: 150px;">
            @else
                <small>Belum ada foto.</small>
            @endif
        </div>

        <div class="field">
            <label for="foto">Ganti foto (opsional; jpg/jpeg/png, maks. 2 MB)</label>
            <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
            @error('foto') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Simpan Perubahan</button>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection