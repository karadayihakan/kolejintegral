<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Önce mevcut haberleri sil
        News::truncate();
        
        $newsItems = [
            [
                'title' => 'Kolej İntegral\'de Yeni Eğitim Dönemi Başladı',
                'content' => '<p>2024-2025 eğitim öğretim yılı Kolej İntegral\'de büyük bir coşkuyla başladı. Öğrencilerimiz modern sınıflarda, deneyimli öğretmen kadromuzla birlikte yeni bir eğitim yolculuğuna çıktılar. Bu yıl özellikle STEM eğitimi ve dijital okuryazarlık alanlarında önemli gelişmeler kaydedeceğiz.</p><p>Okulumuzda öğrencilerimizin akademik başarılarının yanı sıra sosyal, kültürel ve sportif gelişimlerine de önem veriyoruz. Yeni dönemde birçok etkinlik ve proje planlanmış durumda.</p>',
                'image_path' => 'images/okul-foto-1.jpg',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Öğrencilerimiz Matematik Olimpiyatlarında Başarılı',
                'content' => '<p>Kolej İntegral öğrencileri, bu yıl düzenlenen Ulusal Matematik Olimpiyatları\'nda büyük başarılar elde etti. 3 öğrencimiz altın madalya, 5 öğrencimiz gümüş madalya kazandı. Bu başarı, okulumuzun matematik eğitimindeki kalitesini bir kez daha gösterdi.</p><p>Öğrencilerimizi tebrik ediyor, başarılarının devamını diliyoruz. Matematik öğretmenlerimizin özverili çalışmaları sayesinde öğrencilerimiz bu başarıyı elde ettiler.</p>',
                'image_path' => 'images/okul-foto-2.jpg',
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'Okulumuzda Bilim Fuarı Düzenlendi',
                'content' => '<p>Kolej İntegral\'de bu yıl 5. kez düzenlenen Bilim Fuarı büyük ilgi gördü. Öğrencilerimiz bir yıl boyunca hazırladıkları projeleri sergilediler. Robotik, kodlama, fen deneyleri ve mühendislik projeleri fuarda yer aldı.</p><p>Fuarımıza velilerimiz, öğretmenlerimiz ve çevre okullardan öğrenciler katıldı. Öğrencilerimizin yaratıcılığı ve bilimsel düşünme becerileri fuarda öne çıktı.</p>',
                'image_path' => 'images/okul-foto-3.jpg',
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title' => 'Yeni Kütüphane ve Okuma Salonu Açıldı',
                'content' => '<p>Okulumuzda öğrencilerimizin okuma alışkanlıklarını geliştirmek için modern bir kütüphane ve okuma salonu açıldı. Kütüphanemizde 10.000\'den fazla kitap bulunuyor. Dijital okuma platformları ve sessiz çalışma alanları da öğrencilerimizin hizmetinde.</p><p>Kütüphanemiz, öğrencilerimizin araştırma yapabileceği, kitap okuyabileceği ve ders çalışabileceği modern bir ortam sunuyor. Hafta içi ve hafta sonu açık olan kütüphanemiz öğrencilerimizin yoğun ilgisini görüyor.</p>',
                'image_path' => 'images/ilkokul-hero.jpg',
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title' => 'Spor Takımlarımız İl Birinciliği Kazandı',
                'content' => '<p>Kolej İntegral spor takımlarımız bu sezon büyük başarılar elde etti. Basketbol, voleybol ve futbol takımlarımız il birinciliği kazandı. Öğrencilerimizin hem akademik hem de sportif başarıları bizleri gururlandırıyor.</p><p>Spor eğitimi okulumuzun önemli bir parçası. Öğrencilerimizin fiziksel gelişimlerinin yanı sıra takım çalışması, disiplin ve liderlik becerilerini de geliştirmelerine önem veriyoruz.</p>',
                'image_path' => 'images/ortaokul-hero.jpg',
                'published_at' => Carbon::now()->subDays(25),
            ],
            [
                'title' => 'Mezunlarımız Üniversite Sınavlarında Başarılı',
                'content' => '<p>2024 mezunlarımız üniversite sınavlarında büyük başarılar elde etti. Öğrencilerimizin %95\'i istedikleri üniversite ve bölümlere yerleşti. Tıp, mühendislik, hukuk ve diğer alanlarda öğrencilerimiz tercih ettikleri bölümlere girmeyi başardı.</p><p>Bu başarı, okulumuzun eğitim kalitesinin ve öğrencilerimizin çalışkanlığının bir göstergesi. Mezunlarımızı tebrik ediyor, yeni eğitim hayatlarında başarılar diliyoruz.</p>',
                'image_path' => 'images/okul-oncesi-hero.jpg',
                'published_at' => Carbon::now()->subDays(30),
            ],
        ];

        foreach ($newsItems as $item) {
            News::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'content' => $item['content'],
                'image_path' => $item['image_path'],
                'published_at' => $item['published_at'],
            ]);
        }
    }
}

