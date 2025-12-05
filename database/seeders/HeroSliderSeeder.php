<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Seeder;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'title' => 'Okul Öncesi',
                'subtitle' => "Kolej İntegral'de erken yaşta eğitimle geleceğe hazırlanın.",
                'button_text' => "Kolej İntegral'de Beni Neler Bekliyor?",
                'button_url' => '#',
                'background_image' => 'images/okul-oncesi-hero.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'İlkokul',
                'subtitle' => 'Temel eğitimde sağlam bir başlangıç için Kolej İntegral.',
                'button_text' => "Kolej İntegral'de Beni Neler Bekliyor?",
                'button_url' => '#',
                'background_image' => 'images/ilkokul-hero.jpg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Ortaokul',
                'subtitle' => 'Ortaokul eğitiminde akademik başarı ve kişisel gelişim.',
                'button_text' => "Kolej İntegral'de Beni Neler Bekliyor?",
                'button_url' => '#',
                'background_image' => 'images/ortaokul-hero.jpg',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Fen-Anadolu Lisesi',
                'subtitle' => 'Üniversiteye hazırlıkta en iyi eğitim ve rehberlik.',
                'button_text' => "Kolej İntegral'de Beni Neler Bekliyor?",
                'button_url' => '#',
                'background_image' => 'images/fen-anadolu-lisesi-hero.jpg',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlider::updateOrCreate(
                ['title' => $slide['title']],
                $slide
            );
        }
    }
}


