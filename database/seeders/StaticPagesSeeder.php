<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class StaticPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Hakkımızda',
                'slug' => 'hakkimizda',
                'description' => 'Kolej İntegral hakkında bilgiler',
                'template' => 'about',
                'is_active' => true,
            ],
            [
                'title' => 'Kayıt Ol',
                'slug' => 'kayitol',
                'description' => 'Öğrenci kayıt sayfası',
                'template' => 'register',
                'is_active' => true,
            ],
            [
                'title' => 'KVKK Aydınlatma Metni',
                'slug' => 'kvkk-aydinlatma-metni',
                'description' => 'Kişisel Verilerin Korunması Kanunu aydınlatma metni',
                'template' => 'legal',
                'is_active' => true,
            ],
            [
                'title' => 'Gizlilik Politikası',
                'slug' => 'gizlilik-politikasi',
                'description' => 'Gizlilik politikası sayfası',
                'template' => 'legal',
                'is_active' => true,
            ],
        ];

        foreach ($pages as $pageData) {
            Page::firstOrCreate(
                ['slug' => $pageData['slug']],
                $pageData
            );
        }
    }
}
