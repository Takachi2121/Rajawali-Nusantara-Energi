<?php

namespace Database\Seeders;

use App\Models\Galeri;
use App\Models\Lokasi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([LokasiSeeder::class, HargaSeeder::class, GaleriSeeder::class]);

        User::factory()->create([
            'name' => 'Admin RNE',
            'email' => 'rne@gmail.com',
        ]);
    }
}
