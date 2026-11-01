@extends('layouts.app')

@section('content')
    <h2>Registrasi Petugas BPBD</h2>

    <form action="{{ route('register') }}" method="POST" style="max-width: 400px;">
        @csrf
        <div class="field">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus>
            @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="password">Password (minimal 8 karakter)</label>
            <input type="password" id="password" name="password">
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Konfirmasi password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="field">
            <label for="kode_petugas">Kode petugas</label>
            <input type="password" id="kode_petugas" name="kode_petugas">
            @error('kode_petugas') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Daftar</button>
    </form>
@endsection