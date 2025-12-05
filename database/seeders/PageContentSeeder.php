<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hakkımızda sayfası içeriği - Admin panelinden düzenlenebilir
        $aboutPage = Page::where('slug', 'hakkimizda')->first();
        if ($aboutPage && (empty($aboutPage->description) || strlen($aboutPage->description) < 100)) {
            $aboutContent = '<h2><strong>MİSYON</strong></h2>
<p>Önce kendine, sonra çevresine, akabinde ülkesine ve nihayetinde tüm insanlığa faydalı bireyler yetiştirmek.</p>

<h2><strong>VİZYON</strong></h2>
<p>Türkiye\'nin öncü eğitim kurumlarından biri olmak suretiyle geleceğe yön vermek.</p>

<h2><strong>HAKKIMIZDA</strong></h2>
<p>İntegral Eğitim Kurumları bünyesinde 2017-2018 eğitim öğretim yılında anadolu lisesi birimiyle başlayan okul yolculuğumuz, 2019-2020 eğitim öğretim yılında fen lisesi ve ortaokul birimlerinin, 2021-2022 eğitim öğretim yılında ise ilkokul ve okul öncesi birimlerinin faaliyete geçmesiyle k12 bütünlüğünü sağlamak suretiyle devam etmektedir.</p>
<p>Kolejintegral, bir öğretmenler kurulu kuruluşu olup Ulu Önder Mustafa Kemal Atatürk\'ün açtığı yolda ilerlemeyi şiar edinen, modern eğitimin gereklerini yerine getiren, akademik başarı ve disiplin anlayışından ödün vermeyen, dünyanın en geçerli uluslararası diploma programı Advanced Placement (AP) ile dünya vatandaşı yetiştirmeyi gaye edinen ve bu çerçevede eğitim öğretim kadrosunu hassasiyetle tertip eden bir okuldur.</p>
<p>Okulumuz Malatya\'da iki ayrı yerleşkede hizmet vermekte olup ahlaki değerleri önceleyen ve insanlık bilinci yüksek bireyler yetiştirmeyi ilke edinmiştir.</p>

<h2><strong>NEDEN KOLEJİNTEGRAL</strong></h2>

<h3><strong>Sorumluluk ve Değer Sahibi Çocuklar ve Gençler</strong></h3>
<p>Sorumluluklarının bilincinde olan, neyi niçin yapması gerektiğini bilen, ahlaki ve insani değerleri özümsemiş bireyler yetiştirmek en önemli önceliklerimizdendir.</p>

<h3><strong>Akademik ve Sosyal Başarı ile Kendini Gerçekleştirebilen Öğrenciler</strong></h3>
<p>Alanında yetkin yönetim ve öğretim personelleriyle öğrencilerimizin hem akademik hem sosyal bakımdan gelişimini sağlamak, bu suretle kendilerini gerçekleştirebilmelerine ve beceri kazandıkları alanda faydalı işler yapabilmelerine yönelik temeller atmak en önemli özelliklerimizdendir.</p>

<h3><strong>Özgür, Yenilikçi ve Lider Bireyler</strong></h3>
<p>Değişen koşullara uyum sağlayabilecek, gerektiğinde koşulları kendisi değiştirebilecek potansiyele sahip, aldığı sorumlulukla çevresine öncülük edebilecek; fikri hür, vicdanı hür, irfanı hür bireyler yetiştirmek en önemli değerlerimizdendir.</p>
<p>Ve biz bunları başarabilen donanım, gayret ve tecrübeye sahibiz.</p>';

            $aboutPage->update(['description' => $aboutContent]);
        }

        // Kayıt Ol sayfası içeriği - PDF'ler dinamik olarak RegisterPdf'den çekilecek
        $registerPage = Page::where('slug', 'kayitol')->first();
        if ($registerPage && (empty($registerPage->description) || strlen($registerPage->description) < 50)) {
            $registerContent = '<h2><strong>Okula Kayıt</strong></h2>
<p>Kayıt işlemleri için gerekli belgeler ve bilgiler aşağıda yer almaktadır.</p>';
            $registerPage->update(['description' => $registerContent]);
        }

        // KVKK Aydınlatma Metni sayfası içeriği
        $kvkkPage = Page::where('slug', 'kvkk-aydinlatma-metni')->first();
        if ($kvkkPage && (empty($kvkkPage->description) || strlen($kvkkPage->description) < 50)) {
            $kvkkContent = '<p>Kişisel verileriniz 6698 sayılı Kişisel Verilerin Korunması Kanunu kapsamında korunmakta olup, Kolej İntegral tarafından ilgili mevzuata uygun olarak işlenmektedir. Detaylı aydınlatma metni en kısa sürede bu alana taşınacaktır.</p>';
            $kvkkPage->update(['description' => $kvkkContent]);
        }

        // Gizlilik Politikası sayfası içeriği
        $gizlilikPage = Page::where('slug', 'gizlilik-politikasi')->first();
        if ($gizlilikPage && (empty($gizlilikPage->description) || strlen($gizlilikPage->description) < 50)) {
            $gizlilikContent = '<p>Gizliliğiniz bizim için önemlidir. Kolej İntegral olarak kişisel verilerinizi yalnızca ilgili mevzuata uygun şekilde ve hizmetlerimizi sunabilmek amacıyla işlemekteyiz. Detaylı gizlilik politikası içeriği bu alanda yayınlanacaktır.</p>';
            $gizlilikPage->update(['description' => $gizlilikContent]);
        }
    }
}

