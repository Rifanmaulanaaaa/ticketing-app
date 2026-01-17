<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama' => 'Konser'],
            ['nama' => 'Seminar'],
            ['nama' => 'Workshop'],
        ];

        foreach ($categories as $category) {
            Kategori::updateOrCreate(
                ['nama' => $category['nama']], // UNIQUE key
                $category
            );
        }
    }
}
