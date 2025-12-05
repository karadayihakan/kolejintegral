<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // İletişim Bilgileri
        Setting::set('phone', '0(212) 571 71 55', 'phone', 'contact');
        Setting::set('email', 'iletisim@integral.fizetmedya.com', 'email', 'contact');
        
        // Sosyal Medya
        Setting::set('instagram', 'https://www.instagram.com/endeneyim', 'url', 'social');
        Setting::set('youtube', '', 'url', 'social');
        Setting::set('facebook', '', 'url', 'social');
        Setting::set('linkedin', '', 'url', 'social');
        Setting::set('twitter', '', 'url', 'social');
        
        // Harita
        Setting::set('embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.565332333537!2d28.868541275704423!3d40.99099792048925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cabb5754304481%3A0xa58f5440b04a9581!2sKartaltepe%2C%20Yunus%20Nadi%20Sk.%20No%3A2%2C%2034145%20Bak%C4%B1rk%C3%B6y%2F%C4%B0stanbul!5e0!3m2!1str!2str!4v1733951338111!5m2!1str!2str', 'url', 'map');
    }
}
