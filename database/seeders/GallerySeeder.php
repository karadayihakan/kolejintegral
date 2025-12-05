<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Örnek video (YouTube embed URL)
        Gallery::create([
            'title' => 'Kolej İntegral Tanıtım Videosu',
            'image_path' => 'images/okul-foto-1.jpg', // Video thumbnail
            'type' => 'video',
            'video_url' => 'https://www.youtube.com/watch?v=DYLk228mSa4', // Kolej İntegral örnek video
            'order' => 1,
            'is_active' => true,
        ]);

        // Örnek fotoğraflar
        Gallery::create([
            'title' => 'Okul Fotoğrafı 1',
            'image_path' => 'images/okul-foto-1.jpg',
            'type' => 'photo',
            'video_url' => null,
            'order' => 2,
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Okul Fotoğrafı 2',
            'image_path' => 'images/okul-foto-2.jpg',
            'type' => 'photo',
            'video_url' => null,
            'order' => 3,
            'is_active' => true,
        ]);

        Gallery::create([
            'title' => 'Okul Fotoğrafı 3',
            'image_path' => 'images/okul-foto-3.jpg',
            'type' => 'photo',
            'video_url' => null,
            'order' => 4,
            'is_active' => true,
        ]);

        // İkinci örnek video
        Gallery::create([
            'title' => 'Kolej İntegral Eğitim Videosu',
            'image_path' => 'placeholder.jpg',
            'type' => 'video',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', // Örnek YouTube video - değiştirilebilir
            'order' => 5,
            'is_active' => true,
        ]);
    }
}

