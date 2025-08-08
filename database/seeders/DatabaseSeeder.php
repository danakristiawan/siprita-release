<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Example;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\SatkerSeeder;
use Database\Seeders\KategoriSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // SatkerSeeder::class,
            KategoriSeeder::class,
        ]);
    }
}
