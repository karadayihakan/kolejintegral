<?php

namespace Database\Seeders;

use App\Models\RegisterPdf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class RegisterPdfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pdfs = [
            [
                'title' => 'Fen Lisesi Ücret ilanı için tıklayınız',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Anadolu Lisesi Ücret ilanı için tıklayınız',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'İlkokul Ücret ilanı için tıklayınız',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Ortaokul Ücret ilanı için tıklayınız',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($pdfs as $pdfData) {
            RegisterPdf::firstOrCreate(
                ['title' => $pdfData['title']],
                [
                    'title' => $pdfData['title'],
                    'pdf_path' => '', // PDF yüklendikten sonra doldurulacak
                    'order' => $pdfData['order'],
                    'is_active' => $pdfData['is_active'],
                ]
            );
        }
    }
}

