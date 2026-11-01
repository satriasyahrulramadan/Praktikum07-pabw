@extends('layouts.app')

@section('content')
    <h2>Form Pelaporan Banjir</h2>

    <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('partials.laporan-fields')

        <div class="field">
            <label for="foto">Foto bukti (jpg/jpeg/png, maks. 2 MB)</label>
            <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
            @error('foto') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Kirim Laporan</button>
    </form>
@endsection