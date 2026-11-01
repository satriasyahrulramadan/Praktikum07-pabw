<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->renameColumn('tinggi_genangan', 'tinggi_air');
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->string('no_hp', 20)->nullable()->after('nama_pelapor');
            $table->string('kecamatan')->nullable()->after('lokasi');
            $table->text('keterangan')->nullable()->after('tinggi_air');
            $table->string('foto')->nullable()->after('keterangan');
            $table->string('status')->default('Menunggu')->after('foto');
        });

        // Data lama: kolom "lokasi" sebelumnya berisi nama kecamatan
        DB::table('laporan')->whereNull('kecamatan')->update(['kecamatan' => DB::raw('lokasi')]);
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropColumn(['no_hp', 'kecamatan', 'keterangan', 'foto', 'status']);
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->renameColumn('tinggi_air', 'tinggi_genangan');
        });
    }
};