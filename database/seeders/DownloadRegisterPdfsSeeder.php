<?php

namespace Database\Seeders;

use App\Models\RegisterPdf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class DownloadRegisterPdfsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // HTML'den çıkarılan PDF URL'leri
        $pdfData = [
            [
                'title' => 'Fen Lisesi Ücret ilanı için tıklayınız',
                'url' => 'https://kolejintegral.com/wp-content/uploads/2025/09/FEN-LISESI-UCRET-ILANI.pdf',
                'filename' => 'fen-lisesi-ucret-ilani.pdf',
            ],
            [
                'title' => 'Anadolu Lisesi Ücret ilanı için tıklayınız',
                'url' => 'https://kolejintegral.com/wp-content/uploads/2025/09/ANADOLU-LISESI-UCRET-ILANI.pdf',
                'filename' => 'anadolu-lisesi-ucret-ilani.pdf',
            ],
            [
                'title' => 'İlkokul Ücret ilanı için tıklayınız',
                'url' => 'https://kolejintegral.com/wp-content/uploads/2025/09/bbbbb.pdf',
                'filename' => 'ilkokul-ucret-ilani.pdf',
            ],
            [
                'title' => 'Ortaokul Ücret ilanı için tıklayınız',
                'url' => 'https://kolejintegral.com/wp-content/uploads/2025/09/aaaa.pdf',
                'filename' => 'ortaokul-ucret-ilani.pdf',
            ],
        ];

        foreach ($pdfData as $data) {
            $pdf = RegisterPdf::where('title', $data['title'])->first();
            
            if ($pdf) {
                try {
                    $response = Http::timeout(30)->get($data['url']);
                    
                    if ($response->successful()) {
                        $contentType = $response->header('Content-Type');
                        
                        // PDF kontrolü
                        if (str_contains($contentType, 'pdf') || str_contains($contentType, 'octet-stream')) {
                            $path = 'register-pdfs/' . $data['filename'];
                            
                            Storage::disk('public')->put($path, $response->body());
                            $pdf->pdf_path = $path;
                            $pdf->save();
                            
                            $this->command->info("✓ {$data['title']} indirildi ve kaydedildi: {$path}");
                        } else {
                            $this->command->warn("✗ {$data['title']} PDF değil (Content-Type: {$contentType})");
                        }
                    } else {
                        $this->command->warn("✗ {$data['title']} indirilemedi (HTTP {$response->status()})");
                    }
                } catch (\Exception $e) {
                    $this->command->error("✗ {$data['title']} indirilirken hata: " . $e->getMessage());
                }
            } else {
                $this->command->warn("✗ {$data['title']} veritabanında bulunamadı");
            }
        }
    }
}
