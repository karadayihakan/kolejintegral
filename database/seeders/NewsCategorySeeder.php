<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Genel',
                'slug' => 'genel',
                'order' => 1,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'name' => 'Etkinlikler',
                'slug' => 'etkinlikler',
                'order' => 2,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'name' => 'Başarılar',
                'slug' => 'basarilar',
                'order' => 3,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'name' => 'Duyurular',
                'slug' => 'duyurular',
                'order' => 4,
                'is_active' => true,
                'branch_id' => null,
            ],
        ];

        foreach ($categories as $category) {
            NewsCategory::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}

