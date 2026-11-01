@extends('layouts.app')

@section('content')
    <h2>Login Petugas BPBD</h2>

    <form action="{{ route('login') }}" method="POST" style="max-width: 400px;">
        @csrf
        <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label><input type="checkbox" name="remember" value="1"> Ingat saya</label>
        </div>

        <button type="submit" class="btn">Masuk</button>
    </form>
@endsection