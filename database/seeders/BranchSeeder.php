<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'name' => 'Ana Sınıfı',
                'slug' => 'ana-sinifi',
                'type' => 'okul-oncesi',
                'description' => 'Okul öncesi eğitim birimi',
                'hero_image' => null, // Admin panelden yüklenecek
            ],
            [
                'name' => 'İlkokul',
                'slug' => 'ilkokul',
                'type' => 'ilkokul',
                'description' => 'İlkokul eğitim birimi',
                'hero_image' => 'images/ilkokul-hero.jpg',
            ],
            [
                'name' => 'Ortaokul',
                'slug' => 'ortaokul',
                'type' => 'ortaokul',
                'description' => 'Ortaokul eğitim birimi',
                'hero_image' => 'images/ortaokul-hero.jpg',
            ],
            [
                'name' => 'Anadolu Lisesi',
                'slug' => 'anadolu-lisesi',
                'type' => 'anadolu-lisesi',
                'description' => 'Anadolu Lisesi eğitim birimi',
                'hero_image' => 'images/fen-anadolu-lisesi-hero.jpg',
            ],
            [
                'name' => 'Fen Lisesi',
                'slug' => 'fen-lisesi',
                'type' => 'fen-lisesi',
                'description' => 'Fen Lisesi eğitim birimi',
                'hero_image' => 'images/fen-anadolu-lisesi-hero.jpg',
            ],
        ];

        foreach ($units as $unit) {
            // Kullanıcı oluştur (eğer yoksa)
            $email = strtolower(str_replace([' ', 'ı', 'İ', 'ş', 'Ş', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'ç', 'Ç'], ['', 'i', 'i', 's', 's', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c'], $unit['name'])) . '@kolejintegral.com';
            $phone = '555' . str_pad(rand(1000000, 9999999), 7, '0', STR_PAD_LEFT); // Benzersiz telefon numarası
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $unit['name'] . ' Admin',
                    'password' => Hash::make('password123'),
                    'role' => 'branch_admin',
                    'phone' => $phone,
                ]
            );

            // Birim oluştur (eğer yoksa)
            Branch::firstOrCreate(
                ['slug' => $unit['slug']],
                [
                    'name' => $unit['name'],
                    'type' => $unit['type'],
                    'description' => $unit['description'],
                    'hero_image' => $unit['hero_image'],
                    'user_id' => $user->id,
                ]
            );
        }
    }
}
