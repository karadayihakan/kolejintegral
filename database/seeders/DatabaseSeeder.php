<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Test kullanıcısı oluştur (Faker gerektirmez)
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'admin',
                'phone' => '5550000000',
            ]
        );

        $this->call([
            SettingsSeeder::class,
            GallerySeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            BranchSeeder::class,
            StaticPagesSeeder::class,
            AboutPageSectionsSeeder::class,
            MenuSeeder::class,
            PopupBannerSeeder::class,
            MagazineSeeder::class,
            HeroSliderSeeder::class,
            RegisterPdfSeeder::class,
        ]);
    }
}
