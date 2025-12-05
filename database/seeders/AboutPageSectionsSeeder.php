<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Database\Seeder;

class AboutPageSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hakkımızda sayfasını bul veya oluştur
        $page = Page::firstOrCreate(
            ['slug' => 'hakkimizda'],
            [
                'title' => 'Hakkımızda',
                'description' => 'Kolej İntegral hakkında bilgiler',
                'template' => 'about',
                'is_active' => true,
            ]
        );

        // Mevcut bölümleri temizle
        PageSection::where('page_id', $page->id)->delete();

        // Bölümleri ekle
        $sections = [
            [
                'section_key' => 'misyon',
                'section_type' => 'content',
                'title' => 'MİSYON',
                'content' => 'Önce kendine, sonra çevresine, akabinde ülkesine ve nihayetinde tüm insanlığa faydalı bireyler yetiştirmek.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'section_key' => 'vizyon',
                'section_type' => 'content',
                'title' => 'VİZYON',
                'content' => 'Türkiye\'nin öncü eğitim kurumlarından biri olmak suretiyle geleceğe yön vermek.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'section_key' => 'hakkimizda',
                'section_type' => 'content',
                'title' => 'HAKKIMIZDA',
                'content' => "İntegral Eğitim Kurumları bünyesinde 2017-2018 eğitim öğretim yılında anadolu lisesi birimiyle başlayan okul yolculuğumuz, 2019-2020 eğitim öğretim yılında fen lisesi ve ortaokul birimlerinin, 2021-2022 eğitim öğretim yılında ise ilkokul ve okul öncesi birimlerinin faaliyete geçmesiyle k12 bütünlüğünü sağlamak suretiyle devam etmektedir.\n\nKolejintegral, bir öğretmenler kurulu kuruluşu olup Ulu Önder Mustafa Kemal Atatürk'ün açtığı yolda ilerlemeyi şiar edinen, modern eğitimin gereklerini yerine getiren, akademik başarı ve disiplin anlayışından ödün vermeyen, dünyanın en geçerli uluslararası diploma programı Advanced Placement (AP) ile dünya vatandaşı yetiştirmeyi gaye edinen ve bu çerçevede eğitim öğretim kadrosunu hassasiyetle tertip eden bir okuldur.\n\nOkulumuz Malatya'da iki ayrı yerleşkede hizmet vermekte olup ahlaki değerleri önceleyen ve insanlık bilinci yüksek bireyler yetiştirmeyi ilke edinmiştir.",
                'order' => 3,
                'is_active' => true,
            ],
            [
                'section_key' => 'neden-kolejintegral',
                'section_type' => 'content',
                'title' => 'NEDEN KOLEJİNTEGRAL',
                'content' => '',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'section_key' => 'neden-kolejintegral-1',
                'section_type' => 'content',
                'title' => 'Sorumluluk ve Değer Sahibi Çocuklar ve Gençler',
                'content' => 'Sorumluluklarının bilincinde olan, neyi niçin yapması gerektiğini bilen, ahlaki ve insani değerleri özümsemiş bireyler yetiştirmek en önemli önceliklerimizdendir.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'section_key' => 'neden-kolejintegral-2',
                'section_type' => 'content',
                'title' => 'Akademik ve Sosyal Başarı ile Kendini Gerçekleştirebilen Öğrenciler',
                'content' => 'Alanında yetkin yönetim ve öğretim personelleriyle öğrencilerimizin hem akademik hem sosyal bakımdan gelişimini sağlamak, bu suretle kendilerini gerçekleştirebilmelerine ve beceri kazandıkları alanda faydalı işler yapabilmelerine yönelik temeller atmak en önemli özelliklerimizdendir.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'section_key' => 'neden-kolejintegral-3',
                'section_type' => 'content',
                'title' => 'Özgür, Yenilikçi ve Lider Bireyler',
                'content' => "Değişen koşullara uyum sağlayabilecek, gerektiğinde koşulları kendisi değiştirebilecek potansiyele sahip, aldığı sorumlulukla çevresine öncülük edebilecek; fikri hür, vicdanı hür, irfanı hür bireyler yetiştirmek en önemli değerlerimizdendir.\n\nVe biz bunları başarabilen donanım, gayret ve tecrübeye sahibiz.",
                'order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $sectionData) {
            PageSection::create(array_merge($sectionData, ['page_id' => $page->id]));
        }
    }
}

