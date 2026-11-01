<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'petugas@bpbd.test'],
            ['name' => 'Petugas BPBD', 'password' => 'password']
        );

        $this->call(LaporanSeeder::class);
    }
}