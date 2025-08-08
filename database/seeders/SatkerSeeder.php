<?php

namespace Database\Seeders;

use App\Models\Satker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SatkerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/data/satker.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Satker::updateOrCreate([
                'kode' => $item->kode,
                'nama' => $item->nama,
                'kategori' => ''
            ]);
        }
    }
}
