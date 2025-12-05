<?php

namespace Database\Seeders;

use App\Models\Magazine;
use Illuminate\Database\Seeder;

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $magazines = [
            [
                'name' => 'Mart 2022',
                'pdf_path' => 'magazines/mart2022.pdf',
                'thumbnail_path' => 'magazines/thumbnails/mart2022.png',
            ],
        ];

        foreach ($magazines as $magazine) {
            Magazine::firstOrCreate(
                ['name' => $magazine['name']],
                $magazine
            );
        }
    }
}

