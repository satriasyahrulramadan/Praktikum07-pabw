<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    public const STATUS = ['Menunggu', 'Diproses', 'Selesai'];

    public const KECAMATAN = [
        'Arjasari', 'Baleendah', 'Banjaran', 'Bojongsoang', 'Cangkuang', 'Cicalengka',
        'Cikancung', 'Cilengkrang', 'Cileunyi', 'Cimaung', 'Cimenyan', 'Ciparay',
        'Ciwidey', 'Dayeuhkolot', 'Ibun', 'Katapang', 'Kertasari', 'Kutawaringin',
        'Majalaya', 'Margaasih', 'Margahayu', 'Nagreg', 'Pacet', 'Pameungpeuk',
        'Pangalengan', 'Paseh', 'Pasirjambu', 'Rancabali', 'Rancaekek',
        'Solokanjeruk', 'Soreang',
    ];

    protected $fillable = [
        'nama_pelapor', 'no_hp', 'lokasi', 'kecamatan', 'tinggi_air',
        'tanggal_kejadian', 'keterangan', 'foto', 'status',
    ];

    /** URL foto (null jika tidak ada). Butuh `php artisan storage:link`. */
    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/'.$this->foto) : null;
    }

    /** Tingkat bahaya berdasarkan tinggi air (logika dari Praktikum 4). */
    public function getTingkatAttribute(): string
    {
        return match (true) {
            $this->tinggi_air >= 100 => 'Awas',
            $this->tinggi_air >= 50 => 'Siaga',
            default => 'Waspada',
        };
    }
}