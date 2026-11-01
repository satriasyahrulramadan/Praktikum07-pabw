<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use App\Models\User;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function showRegister()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'name'         => ['required', 'string', 'max:255'],
        'email'        => ['required', 'email', 'max:255', 'unique:users,email'],
        'password'     => ['required', 'string', 'min:8', 'confirmed'],
        'kode_petugas' => ['required', Rule::in([config('app.kode_petugas')])],
    ], [
        'name.required'         => 'Nama wajib diisi.',
        'email.required'        => 'Email wajib diisi.',
        'email.email'           => 'Format email tidak valid.',
        'email.unique'          => 'Email sudah terdaftar.',
        'password.required'     => 'Password wajib diisi.',
        'password.min'          => 'Password minimal 8 karakter.',
        'password.confirmed'    => 'Konfirmasi password tidak sama.',
        'kode_petugas.required' => 'Kode petugas wajib diisi.',
        'kode_petugas.in'       => 'Kode petugas salah.',
    ]);

    $user = User::create($request->only('name', 'email', 'password'));

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('laporan.index')
        ->with('success', 'Registrasi berhasil. Selamat datang, '.$user->name.'!');
}

}