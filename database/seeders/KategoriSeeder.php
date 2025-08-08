<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class KategoriSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/data/kategori.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Kategori::updateOrCreate([
                'nama' => $item->nama,
            ]);
        }
    }
}
