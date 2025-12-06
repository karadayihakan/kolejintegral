<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kolej İntegral | Okul Ötesi</title>
  <link rel="icon" type="image/png" href="/images/integral-logo.png">
  <link rel="shortcut icon" href="/favicon.ico">

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />
  <link rel="stylesheet" href="/css/style.css?v={{ time() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-wcXyhpXmuFjd5MuV8F5N+G/5uM0KtWbGu+P5Lk2a0X4BHD2dCDGZuAo3l4YVNFxdQ8qIl3TCzrfA3MHZBAL2Kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
body {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}

/* WhatsApp butonu kaldırıldı */

.top-nav-left__item p {
  font-size: 14px;
}

.girisbuton {
  background-color: #fd7a31;
  padding: 10px 20px 10px 20px;
  border-radius: 25px;
  transition: background-color 0.2s ease-in-out;
}

.girisbuton a {
  color: #ffffff;
}

.girisbuton:hover {
  background-color: #fd7a31;
  opacity: 0.9;
}
</style>

<style>
  .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      width: 90%;
      max-width: 1000px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow-y: scroll;
      max-height: 60vh;
    }

    .modal-content * {
      color: black !important;
      padding-bottom: 10px;
    }

    .modal-content h2 {
      margin: 0 0 10px;
      color: black;
      font-size: 20px;
    }

    .modal-content p {
      margin: 10px 0;
      color: black;
      font-weight: 400;
      font-size: 16px;
    }

    .modal-content li {
      margin: 10px 0;
      color: black;
      font-weight: 400;
      font-size: 16px;
    }

    .close {
      display: inline-block;
      margin-top: 10px;
      padding: 5px 10px;
    background-color: #51223a;
    padding: 10px 20px 10px 20px;
    border-radius: 25px;      
    color: #ffffff;
      border: none;
      cursor: pointer;
      
    }

    .close:hover {
      background-color: #0056b3;
    }

    /* Video modal özel stilleri */
    .modal-video-content {
      padding: 0 !important;
      max-height: 90vh !important;
      max-width: 90vw !important;
      width: 90vw !important;
      overflow: hidden !important;
      background: #000 !important;
      border-radius: 8px;
    }

    .modal-video-content * {
      padding-bottom: 0 !important;
    }
    
    #modalvideo {
      display: flex !important;
      z-index: 10000 !important;
    }
    
    #modalvideo .modal-content {
      max-height: 90vh !important;
      overflow: hidden !important;
      background: #000 !important;
    }
    
    #video-iframe {
      z-index: 1 !important;
      background: #000;
    }

</style>

</head>
<body>
  <div class="nav-container">
    <div class="top-nav">
      <div class="container">
        <div class="top-nav-left">
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            @php
              $headerPhone = !empty($settings['phone']) ? $settings['phone'] : '0212 555 1234';
              $headerPhoneClean = preg_replace('/[^0-9]/', '', $headerPhone);
            @endphp
            <p><a href="tel:{{ $headerPhoneClean }}" style="color: inherit; text-decoration: none;">{{ $headerPhone }}</a></p>
          </div>
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 9.33317C4 8.62593 4.28095 7.94765 4.78105 7.44755C5.28115 6.94746 5.95942 6.6665 6.66667 6.6665H25.3333C26.0406 6.6665 26.7189 6.94746 27.219 7.44755C27.719 7.94765 28 8.62593 28 9.33317V22.6665C28 23.3737 27.719 24.052 27.219 24.5521C26.7189 25.0522 26.0406 25.3332 25.3333 25.3332H6.66667C5.95942 25.3332 5.28115 25.0522 4.78105 24.5521C4.28095 24.052 4 23.3737 4 22.6665V9.33317Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M4 9.3335L16 17.3335L28 9.3335" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            @php
              $headerEmail = isset($settings['email']) && $settings['email'] ? $settings['email'] : 'info@kolejintegral.com';
            @endphp
            <p><a href="mailto:{{ $headerEmail }}" style="color: inherit; text-decoration: none;">{{ $headerEmail }}</a></p>
          </div>
        </div>
        <div class="top-nav-right">
          @php
            $facebookUrl = $socialSettings['facebook'] ?? null;
            $twitterUrl = $socialSettings['twitter'] ?? null;
            $instagramUrl = $socialSettings['instagram'] ?? null;
          @endphp
          @if($facebookUrl)
            <a href="{{ $facebookUrl }}" target="_blank" style="text-decoration:none; color: white;">
              <i class="fa-brands fa-facebook-f"></i>
            </a>
          @endif
          @if($twitterUrl)
            <a href="{{ $twitterUrl }}" target="_blank" style="text-decoration:none; color: white;">
              <i class="fa-brands fa-x-twitter"></i>
            </a>
          @endif
          @if($instagramUrl)
            <a href="{{ $instagramUrl }}" target="_blank" style="text-decoration:none; color: white;">
              <i class="fa-brands fa-instagram"></i>
            </a>
          @endif
        </div>
      </div>
    </div>
    <nav class="nav">
      <div class="container">
        <img src="/images/integral-logo.png" alt="Kolej İntegral" width="115" height="106">
        <div class="nav-items">
          @forelse($menus as $menu)
            <div class="nav-item">
              <a href="{{ $menu->url }}" target="{{ $menu->target }}">{{ $menu->label }}</a>
              <div class="line"></div>
            </div>
          @empty
            {{-- Varsayılan menü öğeleri (menü yoksa) --}}
            <div class="nav-item">
              <a href="{{ route('about') }}">Hakkımızda</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a target="_self" href="#explore">Keşfet</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a target="_self" href="#classes">Birimler</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a href="#haberler">Haberler</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a target="_self" href="#contact">İletişim</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a href="https://integral.eyotek.com/v1/Pages/human-resources-application" target="_blank">İnsan Kaynakları</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a href="{{ route('magazines.index') }}">Pikajintegral</a>
              <div class="line"></div>
            </div>
          @endforelse
          <div class="girisbuton">
            <a href="{{ route('kayitol') }}">
              Kayıt Ol
            </a>
            </div>
        </div>
        <div class="hamburger">
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
        </div>
      </div>
      <div class="mobile-nav">
        <div class="mobile-nav-x">
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </div>
        @forelse($menus as $menu)
          <a href="{{ $menu->url }}" target="{{ $menu->target }}">{{ $menu->label }}</a>
        @empty
          {{-- Varsayılan menü öğeleri (menü yoksa) --}}
          <a href="{{ route('about') }}">Hakkımızda</a>
          <a target="_self" href="#explore">Keşfet</a>
          <a target="_self" href="#classes">Birimler</a>
          <a href="#haberler">Haberler</a>
          <a target="_self" href="#contact">İletişim</a>
          <a href="https://integral.eyotek.com/v1/Pages/human-resources-application" target="_blank">İnsan Kaynakları</a>
          <a href="{{ route('magazines.index') }}">Pikajintegral</a>
        @endforelse
        <div class="girisbuton">
          <a href="{{ route('kayitol') }}" style="color:#ffffff !important">
            Kayıt Ol
          </a>
        </div>
      </div>
    </nav>
  </div>

  <header class="header">
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        @php
          $defaultHeroImages = [
            '/images/okul-oncesi-hero.jpg',
            '/images/ilkokul-hero.jpg',
            '/images/ortaokul-hero.jpg',
            '/images/fen-anadolu-lisesi-hero.jpg',
          ];
          $defaultIndex = 0;
        @endphp

        @forelse($heroSliders as $slide)
          @php
            $bgImage = null;
            $path = $slide->background_image;

            if ($path) {
              if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                $bgImage = $path;
              } elseif (str_starts_with($path, 'storage/')) {
                $bgImage = asset($path);
              } elseif (str_starts_with($path, '/storage/')) {
                $bgImage = $path;
              } elseif (str_starts_with($path, 'images/')) {
                $bgImage = asset($path);
              } elseif (str_starts_with($path, '/images/')) {
                $bgImage = $path;
              } else {
                $bgImage = asset('storage/' . ltrim($path, '/'));
              }
            } else {
              $bgImage = $defaultHeroImages[$defaultIndex] ?? $defaultHeroImages[0];
              $defaultIndex++;
            }

            $buttonUrl = $slide->button_url ?: '#';
            $buttonText = $slide->button_text ?: "Kolej İntegral'de Beni Neler Bekliyor?";
            $buttonClass = 'cta-button';
          @endphp
          <div class="swiper-slide" style="background-image: url('{{ $bgImage }}');">
            <div class="container">
              <h2>{{ $slide->title }}</h2>
              @if($slide->subtitle)
                <p>{{ $slide->subtitle }}</p>
              @endif
              <a href="{{ $buttonUrl }}" class="{{ $buttonClass }}" style="display:flex;align-items:center;gap:10px;">
                <img src="/images/integral-logo.png" alt="Kolej İntegral" width="52" height="52">
                {{ $buttonText }}
              </a>
            </div>
          </div>
        @empty
          <div class="swiper-slide" style="background-image: url('/images/okul-oncesi-hero.jpg');">
            <div class="container">
              <h2>Okul Öncesi</h2>
              <p>Kolej İntegral'de erken yaşta eğitimle geleceğe hazırlanın.</p>
              <a href="{{ route('about') }}" class="cta-button" style="display:flex;align-items:center;gap:10px;">
                <img src="/images/integral-logo.png" alt="Kolej İntegral" width="52" height="52">
                Kolej İntegral'de Beni Neler Bekliyor?
              </a>
            </div>
          </div>
        @endforelse
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
    </div>
    
    <!-- Atatürk Köşesi - Hero Sağ Alt Köşe -->
    <div class="ataturk-corner">
      <div style="text-align: center; padding: 20px; background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(10px); border-radius: 15px; max-width: 300px;">
        <img src="/images/ataturk.png" alt="Atatürk" style="width: 120px; height: auto; margin-bottom: 15px; object-fit: contain; border-radius: 8px;">
        <p style="color: white; font-size: 16px; font-style: italic; line-height: 1.6; margin: 0;">
          "Öğretmenler; Cumhuriyet sizden fikri hür, vicdanı hür, irfanı hür nesiller ister."
        </p>
        <p style="color: white; font-size: 14px; margin-top: 10px; font-weight: bold;">Mustafa Kemal Atatürk</p>
      </div>
    </div>
  </header>

  <div class="fake-header"></div>

  <section class="mouse">
    <div style="margin-bottom: 20px;">
      <h2 style="color: white; font-size: 48px; font-weight: bold; text-align: center;">Okul Ötesi</h2>
    </div>
    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M9 10.5C9 8.9087 9.63214 7.38258 10.7574 6.25736C11.8826 5.13214 13.4087 4.5 15 4.5H21C22.5913 4.5 24.1174 5.13214 25.2426 6.25736C26.3679 7.38258 27 8.9087 27 10.5V25.5C27 27.0913 26.3679 28.6174 25.2426 29.7426C24.1174 30.8679 22.5913 31.5 21 31.5H15C13.4087 31.5 11.8826 30.8679 10.7574 29.7426C9.63214 28.6174 9 27.0913 9 25.5V10.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M18 10.5V16.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <p class="mouse-bold">Kolej İntegral'i keşfetmek için</p>  
    <p class="mouse-thin">kaydırın</p>    
  </section>

  <div class="about-us" id="about-us" style="display: none;">
    <div class="container">
      <div style="margin-bottom: 40px; text-align: center;">
        <button class="cta-main-button trigger" data-modal="modalcta" style="background-color: #51223a; color: white; padding: 20px 40px; font-size: 24px; font-weight: bold; border: none; border-radius: 45px; cursor: pointer; transition: 0.3s ease;">
          Kolej İntegral'de Beni Neler Bekliyor?
        </button>
      </div>
      <h2 style="display:flex;align-items:center;gap:10px; justify-content: center;">
        <img src="/images/integral-logo.png" alt="Kolej İntegral" width="64" height="64">
        <span>Hakkımızda</span>
      </h2>
      <div style="max-width: 800px; margin: 40px auto; text-align: center;">
        <p style="color: white; font-size: 20px; line-height: 1.8;">
          Kolej İntegral, eğitimde "Okul Ötesi" anlayışıyla öğrencilerine sadece akademik başarı değil, 
          aynı zamanda kişisel gelişim, değerler eğitimi ve geleceğe hazırlık konularında kapsamlı bir eğitim sunmaktadır. 
          Modern eğitim teknolojileri, deneyimli öğretmen kadromuz ve öğrenci odaklı yaklaşımımızla, 
          her öğrencinin potansiyelini en üst seviyeye çıkarmayı hedefliyoruz.
        </p>
      </div>
      <div class="swiper-container">
        <div class="swiper-about">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
              <img src="/images/icons/studyhall.png" />
              <h4>Study H’all</h4>
              <p>
                Her öğrencinin sadece kendine ait çalışma alanının olduğu çalışma salonu.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/golgekoc.png" />
              <h4>Gölge Koç</h4>
              <p>
                Öğrencinin sınav sürecini planlayıp onu adım adım takip ederek potansiyelini en iyi şekilde açığa çıkaran uzman.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/endenekulup.png" />
              <h4>En Deneme Kulübü</h4>
              <p>
                Türkiye genelinde 200’ü aşkın şubenin katıldığı sınav kulübü.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/tipkiprova.png" />
              <h4>Tıpkı Prova</h4>
              <p>
                Tüm Türkiye’de aynı anda, gerçek sınav salonlarında ve gerçek sınav kurallarıyla yapılan oldukça geniş katılımlı sınav.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/allstar.png" />
              <h4>ÜçDörtBeş All Star</h4>
              <p>
                Basılı materyal ile dijital öğrenmenin olanaklarının kullanıldığı ve kendi içinde ölçme değerlendirme sistemi olan sınav hazırlık seti.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/kunduz.png" />
              <h4>Kunduz</h4>
              <p>
                Türkiye’nin en geniş ağına sahip dijital soru çözüm platformu.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/enozelders.png" />
              <h4>En Özel Ders</h4>
              <p>
                Eksik konuların “En Deneyim”li öğretmenler vasıtasıyla bire bir ve yüz yüze anlatıldığı ders.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/studybox.png" />
              <h4>Study Box</h4>
              <p>
                Bire bir ve grup derslerinin masa başında yapıldığı modern sınıf.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/encoffe.png" />
              <h4>En Coffe</h4>
              <p>
                Ders aralarında keyifli sohbetlerin yapıldığı şık ve nezih sosyal alan.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/guvenlik.png" />
              <h4>Gelişmiş Güvenlik</h4>
              <p>
                Öğrencilerin kendilerine tanımlı kartlarla giriş çıkış yapmalarına olanak sağlayan güvenlik sistemi.
              </p>                
            </div>
            <div class="swiper-slide">
              <img src="/images/icons/enapp.png" />
              <h4>En App</h4>
              <p>
                Öğrencilerin ve velilerin bilgilendirilmesi amacıyla kullanılan aplikasyon sistemi.
              </p>                
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="shadow"></div>
  </div>

  <div class="classes" id="classes">
    <div class="container">
      <h2>Birimler</h2>
      <style>
        .classes .class-item {
          transition: border-color 0.2s ease-in-out;
        }
        .classes .class-item:hover {
          border-color: #ffffff !important;
        }
      </style>
      <div class="class-items" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 30px; margin: 50px auto 0; max-width: 1400px;">
        @forelse($homepageUnits as $branch)
          @php
            // Hero görsel varsa onu kullan, yoksa type'a göre varsayılan görseli kullan
            $defaultImages = [
              'okul-oncesi' => 'images/okul-oncesi-hero.jpg',
              'ilkokul' => 'images/ilkokul-hero.jpg',
              'ortaokul' => 'images/ortaokul-hero.jpg',
              'anadolu-lisesi' => 'images/fen-anadolu-lisesi-hero.jpg',
              'fen-lisesi' => 'images/fen-anadolu-lisesi-hero.jpg',
            ];
            
            if ($branch->hero_image) {
              // Eğer tam URL ise direkt kullan
              if (str_starts_with($branch->hero_image, 'http')) {
                $bgImage = $branch->hero_image;
              }
              // Eğer storage/ ile başlıyorsa storage'dan çek
              elseif (str_starts_with($branch->hero_image, 'storage/')) {
                $bgImage = asset($branch->hero_image);
              }
              // Eğer images/ ile başlıyorsa public/images'den çek
              elseif (str_starts_with($branch->hero_image, 'images/')) {
                $bgImage = asset($branch->hero_image);
              }
              // Diğer durumlarda storage'dan çek
              else {
                $bgImage = asset('storage/' . $branch->hero_image);
              }
            } else {
              $bgImage = asset($defaultImages[$branch->type] ?? 'images/okul-oncesi-hero.jpg');
            }
          @endphp
          <a href="{{ $branch->slug ? '/' . $branch->slug : '#' }}" class="class-item" style="position: relative; overflow: hidden; background: rgba(81, 34, 58, 0.8); min-height: 250px; display: flex; align-items: center; justify-content: center; text-decoration: none; border: 2px solid #f59e0b;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.4; background-image: url('{{ $bgImage }}'); background-size: cover; background-position: center;"></div>
            <div style="position: relative; z-index: 1; padding: 20px; text-align: center; width: 100%;">
              <h3 style="color: white; font-size: 24px; font-weight: bold; margin: 0; text-shadow: 2px 2px 6px rgba(0,0,0,0.8);">{{ $branch->name }}</h3>
            </div>
          </a>
        @empty
          <p style="grid-column: 1 / -1; text-align: center; color: #666;">Henüz birim eklenmemiş</p>
        @endforelse
      </div>
    </div>

    <div class="shadow"></div>
  </div>

  <style>
    /* Mobil ayarları - sadece mobil için override */
    @media (max-width: 768px) {
      .explore .container {
        padding: 0 30px !important;
      }
      .swiper-explore .swiper-slide {
        border-radius: 8px !important;
        padding: 0 8px !important;
      }
      .swiper-explore .swiper-slide img {
        border-radius: 8px !important;
      }
      .swiper-pagination-explore {
        bottom: 10px !important;
      }
    }
    
    @media (max-width: 480px) {
      .explore .container {
        padding: 0 25px !important;
      }
      .swiper-explore .swiper-slide {
        border-radius: 6px !important;
        padding: 0 6px !important;
      }
      .swiper-explore .swiper-slide img {
        border-radius: 6px !important;
      }
    }
  </style>
  <div class="explore" id="explore" style="margin-top: 0;">
    <div class="container">
      <h2>Keşfet</h2>
      <div class="swiper-container">
        <div class="swiper-explore">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            @forelse($galleries as $gallery)
            <div class="swiper-slide">
                @if($gallery->type === 'video' && $gallery->video_url)
                  @php
                    // YouTube video ID'sini çıkar
                    $videoId = null;
                    $videoUrl = $gallery->video_url;
                    
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                      $videoId = $matches[1];
                    }
                    
                    // YouTube thumbnail URL'i oluştur
                    if ($videoId) {
                      $thumbnailPath = 'https://img.youtube.com/vi/' . $videoId . '/maxresdefault.jpg';
                    } else {
                      // YouTube değilse mevcut thumbnail'ı kullan
                      $thumbnailPath = $gallery->image_path;
                      if (str_starts_with($thumbnailPath, 'images/images/')) {
                        $thumbnailPath = str_replace('images/images/', 'images/', $thumbnailPath);
                      }
                      if (str_starts_with($thumbnailPath, 'images/') && !str_starts_with($thumbnailPath, '/images/')) {
                        $thumbnailPath = '/' . $thumbnailPath;
                      }
                      if (!str_starts_with($thumbnailPath, '/images/') && !str_starts_with($thumbnailPath, '/storage/') && !str_starts_with($thumbnailPath, 'storage/') && !str_starts_with($thumbnailPath, 'http')) {
                        $thumbnailPath = '/images/' . ltrim($thumbnailPath, '/');
                      }
                      // Eğer placeholder ise varsayılan görsel kullan
                      if ($thumbnailPath === '/placeholder.jpg' || $thumbnailPath === 'placeholder.jpg') {
                        $thumbnailPath = '/images/okul-foto-1.jpg';
                      }
                    }
                  @endphp
                  <div class="video-thumbnail" data-video-url="{{ $gallery->video_url }}" style="position: relative; width: 100%; height: 100%; cursor: pointer;">
                    <img class="bg" src="{{ $thumbnailPath }}" alt="{{ $gallery->title ?? 'Kolej İntegral' }}" style="width: 100%; height: 100%; object-fit: cover;" />
                    <div class="play-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.3); transition: background 0.3s ease;">
                      <img src="/images/play.png" alt="Play" style="width: 80px; height: 80px; opacity: 0.9; transition: transform 0.3s ease;" />
            </div>
            </div>
                @else
                  @php
                    $imagePath = $gallery->image_path;
                    // Çift images/ varsa düzelt
                    if (str_starts_with($imagePath, 'images/images/')) {
                      $imagePath = str_replace('images/images/', 'images/', $imagePath);
                    }
                    // images/ ile başlıyorsa / ekle
                    if (str_starts_with($imagePath, 'images/') && !str_starts_with($imagePath, '/images/')) {
                      $imagePath = '/' . $imagePath;
                    }
                    // Eğer /images/ ile başlamıyorsa ve storage'da değilse /images/ ekle
                    if (!str_starts_with($imagePath, '/images/') && !str_starts_with($imagePath, '/storage/') && !str_starts_with($imagePath, 'storage/') && !str_starts_with($imagePath, 'http')) {
                      $imagePath = '/images/' . ltrim($imagePath, '/');
                    }
                    // Eğer placeholder ise varsayılan görsel kullan
                    if ($imagePath === '/placeholder.jpg' || $imagePath === 'placeholder.jpg') {
                      $imagePath = '/images/okul-foto-1.jpg';
                    }
                  @endphp
                  <div class="photo-thumbnail" data-image-url="{{ $imagePath }}" style="position: relative; width: 100%; height: 100%; cursor: pointer;">
                    <img class="bg" src="{{ $imagePath }}" alt="{{ $gallery->title ?? 'Kolej İntegral' }}" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
                @endif
          </div>
            @empty
              <!-- Galeri boşsa hiçbir şey gösterme -->
            @endforelse
          </div>
          <!-- Pagination bullets -->
          <div class="swiper-pagination swiper-pagination-explore"></div>
        </div>
      </div>
    </div>

    <div class="shadow"></div>
  </div>
  
  <div class="haberler-section" id="haberler" style="width: 100%; min-height: 100vh; display: flex; justify-content: center; background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%); position: relative; padding: 80px 0; margin-top: 0;">
    <div class="container">
      <h2 style="color: #ffffff; font-size: 48px; font-weight: bold; text-align: center; margin-bottom: 60px;">Haberler</h2>
      @if($news->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; max-width: 1400px; margin: 0 auto; align-items: end;">
          @foreach($news as $item)
            <a href="{{ route('news.show', $item->slug) }}" style="text-decoration: none; display: block; height: 100%;">
              <div class="haber-kart" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                @php
                  $newsImagePath = $item->image_path;
                  if ($newsImagePath) {
                    // images/ ile başlıyorsa /images/ olarak kullan
                    if (str_starts_with($newsImagePath, 'images/')) {
                      $newsImagePath = '/' . $newsImagePath;
                    } elseif (!str_starts_with($newsImagePath, '/') && !str_starts_with($newsImagePath, 'http')) {
                      // Eğer / ile başlamıyorsa ve http değilse /images/ ekle
                      $newsImagePath = '/images/' . $newsImagePath;
                    }
                  } else {
                    $newsImagePath = '/images/haber-default.jpg';
                  }
                @endphp
                <div style="height: 200px; background: linear-gradient(135deg, rgba(255,140,66,0.3) 0%, rgba(139,71,137,0.3) 100%); background-image: url('{{ $newsImagePath }}'); background-size: cover; background-position: center;"></div>
                <div style="padding: 20px; flex: 1; display: flex; flex-direction: column;">
                  @if($item->category || $item->branch || $item->published_at)
                    <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:12px;">
                      <div style="display:flex; flex-wrap:wrap; gap:8px;">
                        @if($item->category)
                          <span style="background:#51223a; color:#fff; font-size:12px; font-weight:600; padding:4px 10px; border-radius:999px; text-transform:uppercase; letter-spacing:0.5px;">{{ $item->category->name }}</span>
                        @endif
                        @if($item->branch)
                          <span style="background:#ede9fe; color:#4c1d95; font-size:12px; font-weight:600; padding:4px 10px; border-radius:999px; text-transform:uppercase; letter-spacing:0.5px;">{{ $item->branch->name }}</span>
                        @endif
                      </div>
                      @if($item->published_at)
                        <div style="color:#6b7280; font-size:12px; white-space:nowrap;">
                          {{ $item->published_at->format('d.m.Y') }}
                        </div>
                      @endif
                    </div>
                  @endif
                  <h3 style="color: #0d1331; font-size: 20px; margin-bottom: 10px;">{{ $item->title }}</h3>
                  <p style="color: #666; font-size: 16px; line-height: 1.6; flex: 1;">
                    {{ Str::limit(strip_tags($item->content), 120) }}
                  </p>
                  <span style="color: #fd7a31; text-decoration: none; font-weight: bold; margin-top: auto; display: inline-block; font-size: 14px; margin-top: 20px;">Devamını Oku →</span>
   </div>
              </div>
            </a>
@endforeach
      </div>
        <div style="text-align: center; margin-top: 40px;">
          <a href="{{ route('news.index') }}" class="tumunu-gor-btn" style="color: white; padding: 15px 40px; border-radius: 45px; text-decoration: none; font-weight: bold; display: inline-block; cursor: pointer;">Tümünü Gör</a>
    </div>
      @else
        <div style="text-align: center; color: white; padding: 40px;">
          <p style="font-size: 20px;">Henüz haber bulunmamaktadır.</p>
        </div>
      @endif
    </div>
    <div class="shadow"></div>
  </div>

  <div class="contact-us" id="contact">
    <div class="container">
      <div style="display:flex;flex-direction:column;gap:30px;">
          
        <h2>İletişim Bilgileri</h2>
        
        <div class="contact-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-bottom: 40px;">
          <!-- İlk Öğretim Yerleşkesi -->
          <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px;">
            <h3 style="color: white; font-size: 24px; margin-bottom: 25px;">
              {{ $settings['left_contact_title'] ?? 'İlk Öğretim Yerleşkesi' }}
            </h3>
            
            <!-- Adres -->
            <div style="display:flex;gap:15px;align-items:flex-start;margin-bottom:20px;">
              <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; flex-shrink: 0;">
<path d="M14.4373 13.1042C15.1834 12.3583 15.6915 11.408 15.8974 10.3734C16.1033 9.33882 15.9978 8.26638 15.5942 7.29175C15.1906 6.31712 14.507 5.48407 13.6299 4.89796C12.7528 4.31186 11.7216 3.99902 10.6667 3.99902C9.61176 3.99902 8.58055 4.31186 7.70346 4.89796C6.82636 5.48407 6.14277 6.31712 5.73915 7.29175C5.33553 8.26638 5.23001 9.33882 5.43593 10.3734C5.64185 11.408 6.14996 12.3583 6.896 13.1042L10.6667 16.8762L14.4373 13.1042Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
              <p style="color:white; line-height: 1.6; margin: 0; max-width: 420px;">
                {{ $settings['address_left'] ?? ($homepageUnits->first()->address ?? 'Kartaltepe Mahallesi, Yunusnadi Sokak No:2, Bakırköy / İstanbul') }}
              </p>
            </div>
            
            <!-- Sol Kolon Telefon -->
            @php
              $leftPhone = !empty($settings['left_phone']) ? $settings['left_phone'] : (!empty($settings['phone']) ? $settings['phone'] : '0212 555 1234');
              $leftPhoneClean = preg_replace('/[^0-9]/', '', $leftPhone);
            @endphp
            <div style="display:flex;gap:15px;align-items:center;margin-bottom:15px;">
              <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                <path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <a href="tel:{{ $leftPhoneClean }}" style="color:white; text-decoration: none;">{{ $leftPhone }}</a>
        </div>
            
            <!-- Sol Kolon Email -->
            @php
              $leftEmail = !empty($settings['left_email']) ? $settings['left_email'] : (isset($settings['email']) && $settings['email'] ? $settings['email'] : 'info@kolejintegral.com');
            @endphp
            <div style="display:flex;gap:15px;align-items:center;margin-bottom:20px;">
              <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
<path d="M4 9.33317C4 8.62593 4.28095 7.94765 4.78105 7.44755C5.28115 6.94746 5.95942 6.6665 6.66667 6.6665H25.3333C26.0406 6.6665 26.7189 6.94746 27.219 7.44755C27.719 7.94765 28 8.62593 28 9.33317V22.6665C28 23.3737 27.719 24.052 27.219 24.5521C26.7189 25.0522 26.0406 25.3332 25.3333 25.3332H6.66667C5.95942 25.3332 5.28115 25.0522 4.78105 24.5521C4.28095 24.052 4 23.3737 4 22.6665V9.33317Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4 9.3335L16 17.3335L28 9.3335" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
              <a href="mailto:{{ $leftEmail }}" style="color:white; text-decoration: none;">{{ $leftEmail }}</a>
            </div>
            
            <!-- Harita -->
            @php
              $leftEmbed = $mapSettings['left_embed_url'] ?? null;
              $leftSrc = null;
              if ($leftEmbed) {
                  if (preg_match('/src="([^"]+)"/i', $leftEmbed, $m)) {
                      $leftSrc = $m[1];
                  } else {
                      $leftSrc = trim($leftEmbed);
                  }
              } elseif ($homepageUnits->first() && $homepageUnits->first()->map_embed_url) {
                  $leftSrc = $homepageUnits->first()->map_embed_url;
              }
            @endphp
            @if($leftSrc)
              <div style="margin-top: 20px;">
                <iframe style="border-radius: 15px; width: 100%; height: 250px; border:0;" src="{{ $leftSrc }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            @endif
          </div>
          
          <!-- Fen-Anadolu Lisesi Yerleşkesi -->
          <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px;">
            <h3 style="color: white; font-size: 24px; margin-bottom: 25px;">
              {{ $settings['right_contact_title'] ?? 'Fen-Anadolu Lisesi Yerleşkesi' }}
            </h3>
            
            <!-- Adres -->
            <div style="display:flex;gap:15px;align-items:flex-start;margin-bottom:20px;">
              <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; flex-shrink: 0;">
                <path d="M14.4373 13.1042C15.1834 12.3583 15.6915 11.408 15.8974 10.3734C16.1033 9.33882 15.9978 8.26638 15.5942 7.29175C15.1906 6.31712 14.507 5.48407 13.6299 4.89796C12.7528 4.31186 11.7216 3.99902 10.6667 3.99902C9.61176 3.99902 8.58055 4.31186 7.70346 4.89796C6.82636 5.48407 6.14277 6.31712 5.73915 7.29175C5.33553 8.26638 5.23001 9.33882 5.43593 10.3734C5.64185 11.408 6.14996 12.3583 6.896 13.1042L10.6667 16.8762L14.4373 13.1042Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p style="color:white; line-height: 1.6; margin: 0; max-width: 420px;">
                {{ $settings['address_right'] ?? ($homepageUnits->skip(1)->first()->address ?? ($homepageUnits->first()->address ?? 'Yeşilköy Mahallesi, Atatürk Caddesi No:45, Bakırköy / İstanbul')) }}
              </p>
        </div>
            
            <!-- Sağ Kolon Telefon -->
            @php
              $rightPhone = !empty($settings['right_phone']) ? $settings['right_phone'] : (!empty($settings['phone']) ? $settings['phone'] : '0212 555 1234');
              $rightPhoneClean = preg_replace('/[^0-9]/', '', $rightPhone);
            @endphp
            <div style="display:flex;gap:15px;align-items:center;margin-bottom:15px;">
              <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
<path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
              <a href="tel:{{ $rightPhoneClean }}" style="color:white; text-decoration: none;">{{ $rightPhone }}</a>
        </div>

            <!-- Sağ Kolon Email -->
            @php
              $rightEmail = !empty($settings['right_email']) ? $settings['right_email'] : (isset($settings['email']) && $settings['email'] ? $settings['email'] : 'info@kolejintegral.com');
            @endphp
            <div style="display:flex;gap:15px;align-items:center;margin-bottom:20px;">
              <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                <path d="M4 9.33317C4 8.62593 4.28095 7.94765 4.78105 7.44755C5.28115 6.94746 5.95942 6.6665 6.66667 6.6665H25.3333C26.0406 6.6665 26.7189 6.94746 27.219 7.44755C27.719 7.94765 28 8.62593 28 9.33317V22.6665C28 23.3737 27.719 24.052 27.219 24.5521C26.7189 25.0522 26.0406 25.3332 25.3333 25.3332H6.66667C5.95942 25.3332 5.28115 25.0522 4.78105 24.5521C4.28095 24.052 4 23.3737 4 22.6665V9.33317Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 9.3335L16 17.3335L28 9.3335" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <a href="mailto:{{ $rightEmail }}" style="color:white; text-decoration: none;">{{ $rightEmail }}</a>
      </div>
      
            <!-- Harita -->
            @php
              $rightEmbed = $mapSettings['right_embed_url'] ?? null;
              $rightSrc = null;
              if ($rightEmbed) {
                  if (preg_match('/src="([^"]+)"/i', $rightEmbed, $m)) {
                      $rightSrc = $m[1];
                  } else {
                      $rightSrc = trim($rightEmbed);
                  }
              } elseif ($homepageUnits->skip(1)->first() && $homepageUnits->skip(1)->first()->map_embed_url) {
                  $rightSrc = $homepageUnits->skip(1)->first()->map_embed_url;
              } elseif ($homepageUnits->first() && $homepageUnits->first()->map_embed_url) {
                  $rightSrc = $homepageUnits->first()->map_embed_url;
              }
            @endphp
            @if($rightSrc)
              <div style="margin-top: 20px;">
                <iframe style="border-radius: 15px; width: 100%; height: 250px; border:0;" src="{{ $rightSrc }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="shadow"></div>
  </div>

  @include('layouts.footer')
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h2>6698 SAYILI KİŞİSEL VERİLERİN KORUNMASI KANUNU KAPSAMINDA AYDINLATMA METNİ</h2>
            <h6>Aydınlatma Metni Amacı ve Kapsamı</h6>
            <p>En Deneme Bilişim Yazılım Teknoloji Eğitim ve Yay. Tic. Ltd.Şti. olarak 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK” veya “Kanun” olarak anılacaktır.) kapsamında kişisel verilerinizin korunması için tedbir almaktayız. Kişisel Verilerinizi, KVKK ve ilgili yasal mevzuat kapsamında ve “veri sorumlusu” sıfatımızla aşağıda açıklanan sebeplerle ve yöntemlerle işlemekteyiz.</p>
            <p>En Deneme Bilişim Yazılım Teknoloji Eğitim ve Yay. Tic. Ltd.Şti Kişisel Verilerin İşlenmesi Hakkında Aydınlatma Metni, KVKK’nın 10. Maddesinde yer alan “ Veri Sorumlusu’nun Aydınlatma Yükümlülüğü “ başlıklı maddesi uyarınca: veri sorumlusunun kimliği, kişisel verilerinizin toplanma yöntemi ve hukuki sebebi, bu verilerin hangi amaçla işleneceği, kimlere ve hangi amaçla aktarılabileceği, veri işleme süresi ve KVKK’nın 11. Maddesinde sayılan haklarınızın neler olduğu ile ilgili sizi en şeffaf şekilde bilgilendirme amacıyla hazırlanmıştır. Aydınlatma metninde “Kişisel Verileriniz” için yapılan açıklamalar, “Özel Nitelikli Kişisel Veriler”inizi de kapsamaktadır.</p>
            <h6>Veri Sorumlusu</h6>
            <p>Şirket Unvanı: <strong>EN DENEME BİLİŞİM YAZILIM TEKNOLOJİ EĞİTİM VE YAY. TİC. LTD.ŞTİ</strong></p>
            <p>Adres: Şirinevler Mah. M.Fevziçakmak Cad. 3.Sok No:3 Bahçelievler/İst. (İşbu Aydınlatma Metni kapsamında “Firma” olarak anılacaktır.)</p>
            <h6>Kişisel Verilerinizin Toplanma Yöntemi ve Hukuki Sebebi</h6>
            <p>Kişisel verileriniz, otomatik ya da otomatik olmayan yöntemlerle, Firmanın bağlı birimleri, internet sitesi, çağrı merkezi, mobil uygulamalar, firma içerisinde faaliyetlerin yürütülebilmesi için kullanılan yazılımlar ve benzeri vasıtalarla sözlü, yazılı ya da elektronik olarak toplanabilecektir. Kişisel verileriniz, Firma ile ilişkiniz devam ettiği müddetçe oluşturularak ve güncellenerek işlenebilecek ve hem dijital hem de fiziki ortamda muhafaza altında tutulabilecektir. EN DENEME olarak, mevzuattan kaynaklanan yasal yükümlülüklerimiz çerçevesinde; üyelik işlemlerinin tamamlanması ve <a href="https://endeneyimmerkezi.com/" target="_blank">https://endeneyimmerkezi.com/</a> internet sitesi üzerinden alışveriş işlemini tamamlayabilmeniz ve satın aldığınız ürünlerin/hizmetlerin hesabınıza teslim edilmesi, onayınız halinde kampanyalarımız hakkında sizleri bilgilendirmek, öneri ve şikayetlerinizi kayıt altına alabilmek, sizlere daha iyi hizmet sunabilmek amaçlarıyla kişisel verinizi yukarıda açıklanan yöntemlerle toplamaktayız.</p>
            <p>Sipariş oluşturma/hizmet alma işlemleri esnasında ve kullanımı süresince internet sitesi platformu üzerinden, ad-soyad ve iletişim bilgilerini, adres, T.C. kimlik numarasını mevzuattan kaynaklanan yasal yükümlülüklerimiz çerçevesinde, siparişlerinizin işlenmesi, faturalarınızın düzenlenebilmesi ve siparişlerinizin teslimi ile 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği’nden doğan yükümlülüklerimizin ifası amacıyla verilerin toplanması ve kullanılması gerekmektedir. Kişisel Verileriniz Kanun’un 5. Maddesi e bendi uyarınca “bir hakkın tesisi, kullanılması veya korunması için veri işlemenin zorunlu olmasına ilişkin hukuki sebebe dayalı olarak işbu Aydınlatma Metninde belirtilen amaçlar doğrultusunda işlenebilecek ve paylaşılabilecektir.</p>
            <p>Kişisel verileriniz, aşağıda yer alan amaçlar doğrultusunda ve 6698 sayılı Kanun’un 5. ve 6. maddelerinde belirtilen kişisel veri işleme şartları ve amaçları kapsamında işlenebilmekte ve aktarılabilmektedir.</p>
            <h6>İşlenen Kişisel Verileriniz ve İşlenme Amaçları</h6>
            <p>Kişisel Verileriniz yasal yükümlülükler gereği veya firma iş ve işlemlerinde daha uygun bir hizmet verebilmek, siparişlerinizin/hizmetlerin gereğinin yerine getirilmesi amacıyla güvenli bir şekilde Kişisel Verilerin Korunması Kanunu’na uygun bir şekilde işlenmektedir.</p>
            <p>Firma tarafından, Potansiyel Ürün veya Hizmet Alıcısı, Ürün veya Hizmet Alan Kişi, Çalışan, Tedarikçi Yetkilisi, Hissedar/Ortak ve Ziyaretçi’lerden;</p>
            <p>Kimlik bilgisi, iletişim bilgisi, meslek bilgisi, sağlık bilgisi, adres bilgisi, müşteri bilgisi, müşteri işlem bilgisi, pazarlama bilgisi, özlük bilgisi, ödeme bilgisi, görsel ve işitsel kayıtlara ilişkin bilgiler kategorilerinde özel nitelikli kişisel veri ve kişisel veri (İkisi birlikte “Kişisel Veri” olarak anılacaktır.) toplanmaktadır.</p>
            <h6>Toplanan kişisel verileriniz;</h6>
            <ul>
              <li>Firma ile ilişkisi olan gerçek ve/veya tüzel üçüncü kişi, kurum ve kuruluşların birimlerinin ürün ve hizmetlerinden yararlanabilmeleri için gerekli çalışmaların ilgili iş birimlerimiz tarafından yapılabilmesi,</li>
              <li>Firma işlerinin yürütüldüğü veya firmaya bağlı merkez ve birimlerinde bulunan gerçek ve/veya tüzel üçüncü kişi kurum ve kuruluşların can ve mal güvenlikleri ile hukuki, ticari ve iş sağlığı güvenliklerinin temini,</li>
              <li>4857 sayılı İş Kanunu, 6102 sayılı Türk Ticaret Kanunu, 6098 sayılı Türk Borçlar Kanunu, 6502 sayılı Tüketicinin Korunması Hakkında Kanunu, 3308 sayılı Mesleki Eğitim Kanunu, 6331 sayılı İş Sağlığı ve Güvenliği Kanunu, 6698 sayılı Kişisel Verilerin Korunması Kanunu, 213 sayılı Vergi Usul Kanunu, 5510 sayılı Sosyal Sigortalar ve Genel Sağlık Sigortası Kanunu, Kişisel Sağlık Verilerinin İşlenmesi ve Mahremiyetinin Korunması Yönetmeliği hükümleri doğrultusunda kullanılması,</li>
              <li>Görevli ve yetkili kamu kurum ve kuruluşları ile kamu kurumu niteliğindeki meslek kuruluşlarınca yapılacak denetleme ve/veya düzenleme görevlerinin yürütülmesi,</li>
              <li>Yargı organlarının ve/veya idari makamların istediği bilgi ve belge taleplerinin yerine getirilmesi,</li>
              <li>Firmamız ve firmaya bağlı tüm merkez ve birimlerde sunulan ürün ve hizmetlerin kullanım şekline ilişkin listeleme, raporlama, doğrulama analiz çalışması yapmak, bu hususta istatistiki ve bilimsel bilgiler üretmek, buna bağlı olarak ürün ve hizmetlerimizi geliştirmek, ürün ve hizmetlerimize ilişkin memnuniyeti arttırmak ve bu kapsamda kullanıcıya ilişkin özelleştirmelerde bulunmak,</li>
              <li>Ürün ve hizmetlerimize ilişkin, pazar araştırması, tanıtım ve gerekli bilgilendirmeyi yapabilmek, şikâyet ve önerileri değerlendirebilmek ve Firma ile paylaşılan iletişim kanalları üzerinden doğrudan sizinle irtibata geçebilmek,</li>
              <li>Firmamızın tüm İnsan Kaynakları süreç ve politikalarının yürütülmesi,</li>
              <li>Sunulan tüm hizmetlerin finansmanının planlanması ve yönetimi, faturalandırılmasının yapılması,</li>
              <li>Tüm çalışanların eğitilmesi ve geliştirilmesi,</li>
              <li>Eğitim, seminer vb. organizasyonlara katılım taleplerinin yerine getirilmesi,</li>
              <li>Risk yönetimi ve kalite geliştirme aktivitelerinin yerine getirilmesi,</li>
              <li>Anlaşmalı olunan özel sigorta şirketleri ve/veya diğer kurumlar tarafından, anlaşmalar çerçevesinde sunulan teklif, promosyon, muafiyet vb. hak ve yükümlülüklerin yerine getirilmesi,</li>
              <li>Veri güvenliği kapsamında, sistem ve uygulamalar için gerekli tüm teknik ve idari tedbirlerin alınması,</li>
              <li>Kamu düzeninin ve sağlığının korunması,</li>
            </ul>
            <p>Amaçlarıyla, 6698 sayılı Kanun’un 5. ve 6. maddelerinde belirtilen kişisel veri işleme şartları ve amaçları dâhilinde işlenecektir.</p>
            <h6>İşlenen Kişisel Verilerinizin Kimlere ve Hangi Amaçla Aktarılabileceği</h6>
            <p>KVKK ve ilgili sağlık mevzuatı uyarınca uygun güvenlik düzeyini temin etmeye yönelik gerekli her türlü teknik ve idari tedbirlerin alınmasını sağlayarak, Kişisel Veri/Kişisel Verilerinizi yukarıda belirtilen amaçlar doğrultusunda;</p>
            <ul>
              <li>İlgili diğer mevzuat hükümlerinin izin verdiği kişi/kurum ve/veya kuruluşlara,</li>
              <li>Özel sigorta şirketleri, bankalar, sandıklar, vakıflara,</li>
              <li>Hukuki işlerin takibi amacıyla avukatlar veya avukatlık ortaklıklarına,</li>
              <li>Finans ve muhasebe işlemlerinin yürütülmesi amacıyla mali müşavirlere,</li>
              <li>Doğrudan/dolaylı yurtiçi/yurtdışı hissedarlarımıza aktarılabilecektir.</li>
            </ul>
            <p>İlgili Kişinin Hakları (6698 Sayılı Kanun’un 11. Maddesinde Sayılan Hakları) ve Bu Haklarını Kullanması (Kişisel Verisi İşlenen İlgili Kişilerin Hakları)</p>
            <p>Kişisel verisi işlenen ilgili kişiler aşağıda yer alan haklara sahiptirler:</p>
            <ol>
              <li>Kişisel veri işlenip işlenmediğini öğrenme,</li>
              <li>Kişisel verileri işlenmişse buna ilişkin bilgi talep etme,</li>
              <li>Kişisel verilerin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme,</li>
              <li>Yurt içinde veya yurt dışında kişisel verilerin aktarıldığı üçüncü kişileri bilme,</li>
              <li>Kişisel verilerin eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini isteme ve bu kapsamda yapılan işlemin kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme,</li>
              <li>KVKK Kanunu ve ilgili diğer kanun hükümlerine uygun olarak işlenmiş olmasına rağmen, işlenmesini gerektiren sebeplerin ortadan kalkması hâlinde kişisel verilerin silinmesini veya yok edilmesini isteme ve bu kapsamda yapılan işlemin kişisel verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme,</li>
              <li>İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkması halinde bu sonuca itiraz etme,</li>
              <li>Kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması hâlinde zararın giderilmesini talep etme.</li>
            </ol>
            <h6>İlgili Kişinin Haklarını Kullanması</h6>
            <p>Online sipariş/satım alım sistemi aracılığıyla toplanan verilerinizin silinmesini ya da kişisel verilerinizin 3. kişilerle paylaşımına son verilmesini talep etmeniz halinde, size hizmet verme imkanımız kalmayacağından, kişisel verileriniz yasal süresi içerisinde şirketimiz ve iş ortakları tarafından silinecektir.</p>
            <p>Kişisel verisi işlenen ilgili kişilerin adına üçüncü kişilerin başvuru talebinde bulunabilmesi için ilgili kişi tarafından başvuruda bulunacak kişi adına noter kanalıyla düzenlenmiş özel vekâletname bulunmalıdır.</p>
            <p>Talebinizin niteliğine göre kimlik tespitine olanak sağlayacak bilgi ve belgelerin eksiksiz ve doğru olarak tarafımıza sağlanması gerekmektedir. İstenilen bilgi ve belgelerin gereği gibi sağlanmaması durumunda, Firma tarafından talebinize istinaden yapılacak araştırmaların tam ve nitelikli şekilde yürütülmesinde aksaklıklar yaşanabilecektir. Bu durumda, Firma kanuni haklarını saklı tuttuğunu beyan eder. Bu nedenle, başvurunuzun talebinizin niteliğine göre eksiksiz ve istenilen bilgileri ve belgeleri içerecek şekilde gönderilmesi gerekmektedir.</p>
            <h6>Görüş ve sorularınızla ilgili bizimle iletişime geçebilirsiniz:</h6>
            <p>Ünvanı: EN DENEME BİLİŞİM YAZILIM TEKNOLOJİ EĞİTİM VE YAY. TİC. LTD.ŞTİ</p>
            <p>Mersis No: 0334114225100001</p>
            <p>Adres: Şirinevler Mah. M.Fevziçakmak Cad. 3.Sok No:3 Bahçelievler/İst.</p>
            <p>E-mail: iletisim@endeneyimmerkezi.com</p>
            <p>Telefon: (0212) 0212 571 7155</p>
            <button class="close" data-modal="modal1">Kapat</button>
          </div>
        </div>

        <div id="modal2" class="modal">
          <div class="modal-content">
            <h2>Gizlilik Politikası</h2>
            <h6>Gizlilik Politikası</h6>
            <ul>
              <li>Bu beyanlar <strong>EN DENEME BİLİŞİM YAZILIM TEKNOLOJİ EĞİTİM VE YAY. TİC. LTD.ŞTİ’nin</strong> gizlilik politikasını içerir. <a href="https://endeneyimmerkezi.com" target="_blank"></a> web sitesini ziyaret ederek aşağıda bulunan şartları ve kuralları kabul etmiş sayılmaktasınız.</li>
              <li>Firmamız, çeşitli amaçlarla kişisel veriler toplayabilir. Aşağıda, toplanan kişisel verilerin nasıl ve ne şekilde toplandığı, bu verilerin nasıl ve ne şekilde korunduğu belirtilmiştir. Kişisel verilerin toplanması hususunda daha detaylı bilgi için web sitemizde bulunan <strong>“KVKK Aydınlatma Metnini”</strong> okuyabilirsiniz.</li>
              <li>Şirketimiz ve/veya çalıştığımız markalar tarafından analiz edilerek size özel reklam, kampanya ve diğer faydaların sunulması, izin tercihleriniz doğrultusunda ticari elektronik ileti gönderilebilmesi, posta iletilmesi, anket ve tele satış uygulamaları, bir takım kullanım verilerinizin raporlanması ve değerlendirilmesi, analizler yapılması, Şirketimizin ve Şirketimizle iş ilişkisi içerisinde olan kişilerin hukuki ve ticari güvenliğinin temini, ticari ve iş stratejilerinin belirlenmesi ve uygulanması ile Şirketimizin insan kaynakları politikalarının yürütülmesinin temini amaçlarıyla üye işyerlerimize, iş ortaklarımıza, çalıştığımız markalara, hissedarlarımıza, kanunen yetkili kamu kurumu ve özel kişilere, KVKK’nın 8. Ve 9. Maddelerinde belirtilen kişisel veri işleme şartları ve amaçları çerçevesinde aktarılabilecektir.</li>
              <li>Kişisel bilgileriniz; siparişlerinizi almak, ürün ve hizmetlerimizi sunmak, ödemelerinizi gerçekleştirmek, siparişlerinizi ulaştırmak ve siparişleriniz ile ilgili bilgi vermek, ürünler ve hizmetler hakkında sizinle irtibata geçmek, bilgilerinizi güncellemek, üyeliğinizi yönetmek ve sürdürmek, kargo firmalarının teknik, lojistik ve benzeri diğer işlevlerini bizim adımıza yerine getirmelerini sağlamak amacıyla kullanılmaktadır.</li>
              <li>Üyelerimizden aldığımız kişisel veriler, üyelerimiz ile yaptığımız “Üyelik Sözleşmesi” ile belirlenen amaçlar ve kapsamlar dışında üçüncü kişilere açıklanmayacaktır.</li>
              <li>Firmamız, gizli bilgileri kesinlikle özel ve gizli tutmayı, bunu bir sır saklama yükümü olarak addetmeyi ve gizliliğin sağlanması ve sürdürülmesi, gizli bilginin tamamının veya herhangi bir kısmının kamu alanına girmesini veya yetkisiz kullanımını veya üçüncü bir kişiye ifşasını önlemek için gerekli tüm tedbirleri almayı ve gerekli özeni göstermeyi taahhüt etmektedir.</li>
            </ul>
            <h6>Kredi Kartı Güvenliği</h6>
            <p><a href="https://endeneyimmerkezi.com" target="_blank">https://endeneyimmerkezi.com</a> ‘da kredi kartı ile ilgili tüm işlemler, internet güvenlik standardı olan SSL Secure sistemi ile şifrelenmiştir. Firmamız, sitemizden alışveriş yapan kredi kartı sahiplerinin güvenliğini ön planda tutmaktadır. Kullanmış olduğumuz Veri iletiminde 4096 bit şifreleme algoritması ile bilgi güvenliği sağlayan SSL sertifikası sayesinde bilgilerinizin istenilmeyen kişi veya kurumlar tarafından ele geçirilmesi önlenmiştir. Kartlarınızla ilgili hiçbir bilgi tarafımızdan görüntülenemediğinden ve kaydedilmediğinden, üçüncü şahısların herhangi bir koşulda bu bilgileri ele geçirmesi engellenmiş olur.</p>
            <p>Online olarak kredi kartı ile verilen siparişlerin ödeme/fatura/teslimat adresi bilgilerinin güvenilirliği firmamız tarafından kredi kartları dolandırıcılığına karşı denetlenmektedir. Bu yüzden, alışveriş sitelerimizden ilk defa sipariş veren müşterilerin siparişlerinin tedarik ve teslimat aşamasına gelebilmesi için öncelikle finansal ve adres/telefon bilgilerinin doğruluğunun onaylanması gereklidir. Bu bilgilerin kontrolü için gerekirse kredi kartı sahibi müşteri ile veya ilgili banka ile irtibata geçilmektedir. Gizlilik politikamız ile ilgili her türlü soru ve öneriniz için sitemizdeki iletişim bölümünden bize e-mail gönderebilirsiniz.</p>
            <h6>Çerezler (Cookie) Politikası</h6>
            <ul>
              <li>Firmamız, web sitesi dâhilinde başka sitelere link verebilir. Firmamız, bu linkler vasıtasıyla erişilen sitelerin gizlilik uygulamaları ve içeriklerine yönelik herhangi bir sorumluluk taşımamaktadır. Firmamıza ait sitede yayınlanan reklamlar, reklamcılık yapan iş ortaklarımız aracılığı ile kullanıcılarımıza dağıtılır. İş bu sözleşmedeki Gizlilik Politikası Prensipleri, sadece Mağazamızın kullanımına ilişkindir, üçüncü taraf web sitelerini kapsamaz.</li>
              <li>Firmamızın Müşteri Hizmetleri’ne, herhangi bir siparişinizle ilgili olarak göndereceğiniz e-postalarda, asla kredi kartı numaranızı veya şifrelerinizi yazmayınız. E-postalarda yer alan bilgiler üçüncü şahıslar tarafından görülebilir. Firmamız e-postalarınızdan aktarılan bilgilerin güvenliğini hiçbir koşulda garanti edemez.</li>
              <li>EN DENEME, Gizlilik Politikası ile kullanıcılarına çerez kullanımının kapsamı ve amaçları hakkında detaylı açıklama sunmayı ve çerez tercihleri konusunda kullanıcılarını bilgilendirmeyi hedeflemiştir. Bu bakımdan, <a href="https://endeneyimmerkezi.com" target="_blank">https://endeneyimmerkezi.com</a>  web sitesinde yer alan çerez bilgilendirme uyarısının kapatılması ve Site’nin kullanılmaya devam edilmesi halinde Çerez kullanımına rıza verildiği kabul edilmektedir. Kullanıcıların çerez tercihlerini değiştirme imkânı her zaman saklıdır.</li>
            </ul>
            <button class="close" data-modal="modal2">Kapat</button>
          </div>
        </div>

        <div id="modal3" class="modal">
          <div class="modal-content">
            <h2>MESAFELİ SATIŞ SÖZLEŞMESİ</h2>
            <h4>MADDE 1- TARAFLAR</h4>
            <h6>1.1. SATICI:</h6>
            <p>Ünvanı :</p>
            <p>Adresi :</p>
            <p>Telefon :</p>
            <p>Mersis Numarası :</p>
            <h6>1.2. ALICI:</h6>
            <p>Adı/Soyadı/Ünvanı :</p>
            <p>Adresi :</p>
            <p>Telefon :</p>
            <p>Email :</p>
            <p>VKN :</p>
            <h4>MADDE 2- KONU</h4>
            <p>İşbu sözleşmenin konusu, ALICI’nın tüketici olması durumunda “https://endeneyimmerkezi.com “ internet sitesinden elektronik ortamda siparişini yaptığı aşağıda nitelikleri ve satış fiyatı belirtilen ürünün satışı ve teslimi ile ilgili olarak 6502 sayılı Tüketicinin Korunması Hakkındaki Kanun hükümleri,Mesafeli Sözleşmeler Yönetmeliği ve diğer ilgili mevzuat hükümleri gereğince tarafların hak ve yükümlülüklerinin saptanmasıdır.</p>
            <p>ALICI’nın tacir olması durumunda ise taraflar arasında TBK ve TTK’nın ilgili maddeleri uyarınca genel hükümler uygulanacak olup, ALICI uygulanacak bu hükümleri kabul, beyan ve taahhüt eder</p>
            <h4>MADDE 3- SÖZLEŞME KONUSU ÜRÜN, ÖDEME VE TESLİMATA İLİŞKİN BİLGİLER</h4>
            <p>Ürün Adı ve Temel Nitelikleri :</p>
            <p>Adet :</p>
            <p>Satış Bedeli (KDV dahil toplam Türk Lirası) :</p>
            <p>Vadeli Satış Bedeli (KDV dahil toplam) :</p>
            <p>Ödeme Şekli :</p>
            <p>Teslimat Adresi :</p>
            <p>Teslimat Şekli :</p>
            <p>Teslimat Süresi :</p>
            <p>Fatura Adresi :</p>
            <p>Kargo ücreti :</p>
            <p>Yukarıda belirtildiği şekildedir.</p>
            <p>Yukarıda yer alan bilgiler doğru ve eksiksiz olmalıdır. Bu bilgilerin doğru olmadığı veya noksan olduğu durumlardan doğacak zararları tamamıyla karşılamayı ve bu durumdan oluşabilecek her türlü sorumluluğu ALICI kabul eder.</p>
            <h4>MADDE 4 - GENEL HÜKÜMLER</h4>
            <p>4.1- ALICI, satıcıya ait isim, unvan, açık adres, telefon ve diğer erişim bilgileri, satışa konu malın temel nitelikleri, vergiler dahil olmak üzere satış fiyatı, ödeme şekli, teslimat koşulları ve masrafları vs. satışa konu mal ile ilgili tüm ön bilgiler ve “cayma” hakkının kullanılması ve bu hakkın nasıl kullanılacağı konusunda açık, anlaşılır ve internet ortamına uygun şekilde satıcı tarafından bilgilendirildiğini, bu ön bilgileri elektronik ortamda teyit ettiğini ve sonrasında mal sipariş verdiğini iş bu sözleşme hükümlerince kabul ve beyan eder.</p>
            <p>4.2- Sözleşme konusu her bir ürün/hizmet, sözleşmenin 3. maddesinde belirtilen süreyi aşmamak kaydı ile ALICI'nın yerleşim yeri uzaklığına bağlı olarak internet sitesindeki ürün bilgileri kısmında belirtilen süre zarfında ALICI veya ALICI’nın gösterdiği adresteki kişi ve/veya kuruluşa teslim edilir. Sözleşmenin 3. maddesinde yer alan sözleşme konusu ürün ya da ürünlerden bazıları ALICI dışında başka bir kişi/kuruluşa teslim edilecek ise, SATICI, teslim edilecek kişi/kuruluşun teslimatı kabul etmemesinden ötürü sorumlu tutulamaz.  ALICI ve/veya ürünü teslim alan kişi teslimat sırasında ürünün hasarlı olup olmadığını, ürünlerin eksiksiz ve sağlam olduğunu kontrol etmekle yükümlüdür. Teslim Belgesi, alıcı ve/veya teslim alan kişi tarafından imzalandıktan sonra kutu içerisindeki ürün/ürünlerin hasarından veya eksikliğinden SATICI sorumlu olmaz.</p>
            <p>4.3-  SATICI, Sözleşme konusu ürün(ler)ü /hizmetleri eksiksiz, sağlam, siparişte belirtilen niteliklere uygun ve varsa garanti belgeleri, kullanım kılavuzları işin gereği olan bilgi ve belgeler ile teslim etmeyi, standartlara uygun bir şekilde işi doğruluk ve dürüstlük esasları dâhilinde ifa etmeyi, işin ifası sırasında gerekli dikkat ve özeni göstermeyi kabul, beyan ve taahhüt eder.</p>
            <p>4.4- SATICI, sözleşmeden doğan ifa yükümlülüğünün süresi dolmadan ALICI’yı bilgilendirmek ve açıkça onayını almak suretiyle eşit kalite ve fiyatta farklı bir ürün/hizmet tedarik edebilir.</p>
            <p>4.5- SATICI, sipariş konusu ürün veya hizmetin yerine getirilmesinin imkânsızlaşması halinde sözleşme konusu yükümlülüklerini yerine getiremezse, bu durumu, öğrendiği tarihten itibaren 3 gün içinde yazılı olarak tüketiciye bildireceğini kabul, beyan ve taahhüt eder.</p>
            <p>4.6- Sözleşme konusu ürünün teslimatı için işbu sözleşmenin bedelinin ALICI’nın tercih ettiği ödeme şekli ile ödenmiş olması şarttır. Herhangi bir nedenle ürün bedeli ödenmez veya banka kayıtlarında iptal edilir ise, SATICI ürünün teslimi yükümlülüğünden kurtulmuş kabul edilir.</p>
            <p>4.7- Ürünün tesliminden sonra ALICI’ya ait kredi kartının ALICI’nın kusurundan kaynaklanmayan bir şekilde yetkisiz kişilerce haksız veya hukuka aykırı olarak kullanılması nedeni ile ilgili banka veya finans kuruluşun ürün bedelini SATICI'ya ödememesi halinde, ALICI’nın kendisine teslim edilmiş olması kaydıyla ürünün 3 gün içerisinde SATICI'ya gönderilmesi zorunludur. Bu gibi durumlarda nakliye gideri ALICI'ya aittir.</p>
            <p>4.8- Garanti belgeli ya da garanti belgesiz satılan ürünlerden arızalı veya bozuk olanlar, garanti şartları içerisinde gerekli onarımın yetkili servise yaptırılması için SATICI'ya gönderilebilir. Bu durumda kargo masrafları SATICI tarafından karşılanacaktır.</p>
            <p>4.9- SATICININ, ALICI tarafından siteye kayıt formunda belirtilen veya daha sonra kendisi tarafından güncellenen adresi, e-posta adresi, sabit ve mobil telefon hatları ve diğer iletişim bilgileri üzerinden mektup, e-posta, SMS, telefon görüşmesi ve diğer yollarla iletişim, pazarlama, bildirim ve diğer amaçlarla ALICI’ya ulaşma hakkı bulunmaktadır. ALICI, işbu sözleşmeyi kabul etmekle SATICI’nın kendisine yönelik yukarıda belirtilen iletişim faaliyetlerinde bulunabileceğini kabul ve beyan etmektedir.</p>
            <p>4.10. 18 yaşından küçük kişiler ile ayırt etme gücünden yoksun veya kısıtlı erginler SATICI'dan alış-veriş yapamaz. İnternet sitesi üzerinden 18 yaşından küçük kişiler ile ayırt etme gücünden yoksun veya kısıtlı erginler tarafından mesafeli satış sözleşmesi kurulması için yapılacak girişimler sebebiyle SATICI’nın herhangi bir sorumluluğu yoktur.</p>
            <p>4.11. ALICI ile işbu sözleşmenin kurulması ancak teslimat adresi olarak Türkiye coğrafi sınırlarının gösterilmesiyle mümkün olacaktır. ALICI teslimat adresi olarak Türkiye coğrafi sınırları dışında bir yeri göstermesi durumunda, işbu sözleşme kurulmayacak olup, bu konuda SATICI’nın herhangi bir sorumluluk taşımayacağı ALICI tarafından kabul, beyan ve taahhüt edilir.</p>
            <p>4.12.  ALICI’nın tacir olması durumunda malların ayıplı olması halinde TBK ve TTK genel hükümleri uyarınca ayıba ilişkin hükümler uygulanacağını kabul ve beyan eder. Tacir olan ALICI, sözleşme konusu mal/hizmeti teslim almadan önce muayene edecek; ezik, kırık, ambalajı yırtılmış vb. hasarlı ve ayıplı mal/hizmeti kargo şirketinden teslim almayacak ve bu hususu kargo görevlisi ile birlikte düzenleyeceği hasar tespit tutanağı ile tespit ettirecektir. Kargo görevlisine hasar tespit tutanağı düzenlettirmediği takdirde ALICI sözleşme konusu mallar hakkında hasar ve ayıp iddiasında bulunamayacak, Teslim alınan mal/hizmetin hasarsız ve sağlam olduğu kabul edilecektir.</p>
            <h4>MADDE 5 - İADE VE CAYMA HAKKI</h4>
            <p>5.1 -  Alıcı, Ürün'ü teslim aldığı tarihten itibaren on dört (14) gün içinde herhangi bir gerekçe göstermeksizin ve cezai şart ödemeksizin siparişten-sözleşmeden cayma hakkını haizdir. Ancak Alıcı, Sözleşmenin kurulmasından Ürün’ün teslimine kadar olan süre içinde cayma hakkını kullanabilir.</p>
            <p>5.2 - Cayma hakkının kullanılması için on dört(14) gün içinde SATICI'ya faks, email veya telefon ile bildirimde bulunulması ve ürünün 6. madde hükümleri çercevesinde kullanılmamış olması şartına bağlıdır.</p>
            <p>5.3 - Sözleşme gereğince SATICI'nın bedelin iadesini yapacağı durumlarda, iadenin yapılacağı banka hesabı, ürün bedelinin ödendiği hesaptır. SATICI'nın para iadesini ALICI'nın bu hesabının kapatılmış/değiştirilmiş ve/veya herhangi bir sebeple işlemez halde olması nedenleriyle bu hesaba yapamaması durumunda ALICI, SATICI'ya bizzat yazılı olarak başvurarak parayı teslim almakla yükümlüdür. ALICI böyle bir durumda gecikme zararı, faiz vb. taleplerde bulunamaz.</p>
            <p>5.4 - İade Prosedürü:</p>
            <p>ALICI'nın cayma hakkını kullandığı durumlarda ya da siparişe konu olan ürünün çeşitli sebeplerle tedarik edilememesi veya hakem heyeti kararları ile ALICI'ya bedel iadesine karar verilen durumlarda, ödeme seçeneklerine ilişkin iade prosedürü aşağıda belirtilmiştir:</p>
            <ul>
              <li>Kredi Kartı ile Ödeme Seçeneklerinde İade Prosedürü</li>
            </ul>
            <p>Alışveriş kredi kartı ile ve taksitli olarak yapılmışsa, ALICI ürünü kaç taksit ile aldıysa Banka ALICI'ya geri ödemesini taksitle yapmaktadır. SATICI bankaya ürün bedelinin tamamını tek seferde ödedikten sonra, Banka poslarından yapılan taksitli harcamaların ALICI'nın kredi kartına iadesi durumunda, konuya müdahil tarafların mağdur duruma düşmemesi için talep edilen iade tutarları, yine taksitli olarak hamil taraf hesaplarına Banka tarafından aktarılır. ALICI'nın satış iptaline kadar ödemiş olduğu taksit tutarları, eğer iade tarihi ile kartın hesap kesim tarihleri çakışmazsa her ay karta 1 (bir) iade yansıyacak ve ALICI iade öncesinde ödemiş olduğu taksitleri satışın taksitleri bittikten sonra, iade öncesinde ödemiş olduğu taksitleri sayısı kadar ay daha alacak ve mevcut borçlarından düşmüş olacaktır.</p>
            <p>Kart ile alınmış mal ve hizmetin iadesi durumunda SATICI, Banka ile yapmış olduğu sözleşme gereği ALICI'ya nakit para ile ödeme yapamaz. Kredi kartına iade, SATICI'nın Banka'ya bedeli tek seferde ödemesinden sonra, Banka tarafından yukarıdaki prosedür gereğince yapılacaktır.</p>
            <p>ALICI, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.</p>
            <ul>
              <li>Kapıda Ödeme ile Havale/EFT Ödeme Seçeneklerinde İade Prosedürü</li>
            </ul>
            <p>Kapıdan ödeme ile havale/EFT ödeme seçeneklerinde iade ALICIDAN banka hesap bilgileri istenerek,  ALICININ belirttiği hesaba ( hesabın fatura adresindeki kişinin adına veya kullanıcı üyenin adına olması şarttır) havale ve /EFT şeklinde yapılacaktır. </p>
            <p>Kapıda Ödeme ve Havale/EFT ödeme durumunda SATICI bankaya ürün bedelinin tamamını tek seferde geri öder.</p>
            <p>ALICI, bu prosedürü okuduğunu ve kabul ettiğini kabul ve taahhüt eder.</p>
            <h4>MADDE 6 - CAYMA HAKKI KULLANILAMAYACAK ÜRÜNLER</h4>
            <p>ALICI’nın isteği veya açıkça kişisel ihtiyaçları doğrultusunda hazırlanan ve geri gönderilmeye müsait olmayan, iç giyim ve tüm türevleri, tek kullanımlık ürünler, şekil değişikliğine uğramış ürünler, tahrip edilmiş ürünler, fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve satıcı veya sağlayıcının kontrolünde olmayan mal veya hizmetler, ALICI’ya teslim edilmesinin ardından ALICI tarafından ambalajı açıldığı takdirde iade edilmesi sağlık ve hijyen açısından uygun olmayan ürünler, teslim edildikten sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan ürünlerin, ambalajının ALICI tarafından açılmış olması halinde teslim edilen malların iadesi Mesafeli Sözleşmelere Dair Yönetmelik gereği mümkün değildir.</p>
            <h4>MADDE 7 - TEMERRÜT HÜKÜMLERİ</h4>
            <p>Tarafların işbu sözleşmeden kaynaklanan edimlerini yerine getirmemesi ve temerrüt hallerinde Borçlar Kanununda yer alan Borçlunun Temerrüdü hükümleri uygulanacaktır.</p>
            <h4>MADDE 8 - MÜCBİR SEBEPLER</h4>
            <p>8.1 - Sözleşmenin imzalandığı tarihte mevcut olmayan veya öngörülmeyen, tarafların kontrolleri dışında gelişen, ortaya çıkmasıyla taraflardan birinin ya da her ikisinin de sözleşme ile yüklendikleri borç ve sorumluluklarını kısmen ya da tamamen yerine getirmelerini ya da bunları zamanında yerine getirmelerini olanaksızlaştıran durumlar, mücbir sebep olarak kabul edilecektir. Mücbir sebep şahsında gerçekleşen taraf, diğer tarafa durumu derhal ve yazılı olarak bildirecektir.</p>
            <p>8.2 - Mücbir sebebin devamı esnasında tarafların edimlerini yerine getirememelerinden dolayı herhangi bir sorumlulukları doğmayacaktır.</p>
            <h4>MADDE 9- UYUŞMAZLIK VE YETKİLİ MAHKEME</h4>
            <p>İşbu sözleşme ile ilgili çıkacak ihtilaflarda; Türk Mahkemeleri yetkili olup; uygulanacak hukuk Türk Hukuku'dur.</p>
            <p>Türkiye Cumhuriyeti sınırları içerisinde geçerli olmak üzere her yıl Ticaret Bakanlığı tarafından ilan edilen değere kadar olan ihtilaflar için TÜKETİCİ işleminin yapıldığı veya TÜKETİCİ ikametgahının bulunduğu yerdeki İl veya İlçe Tüketici Hakem Heyetleri, söz konusu değerin üzerindeki ihtilaflarda ise TÜKETİCİ işleminin yapıldığı veya TÜKETİCİ ikametgahının bulunduğu yerdeki Tüketici Mahkemeleri Yetkili olacaktır. ALICI’nın tacir olması halinde ise taraflar arasından TBK ve TTK’nın ilgili hükümleri uygulanacaktır.</p>
            <p>Siparişin gerçekleşmesi durumunda ALICI işbu sözleşmenin tüm koşullarını kabul etmiş sayılır.</p>
            <p>SATICI :</p>
            <p>ALICI :</p>
            <p>Tarih :</p>
            <button class="close" data-modal="modal3">Kapat</button>
          </div>
        </div>


        <div id="modalcta" class="modal">
          <div class="modal-content">
            <h2>Kolej İntegral'de Beni Neler Bekliyor?</h2>
            <div style="text-align: center; margin: 30px 0;">
              <img src="/images/kitap-gorseli.jpg" alt="Kolej İntegral" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            </div>
            <p>Kolej İntegral'de öğrencilerimizi bekleyen zengin eğitim olanakları, modern tesisler, deneyimli öğretmen kadrosu ve kapsamlı akademik programlar hakkında detaylı bilgi için bizimle iletişime geçebilirsiniz.</p>
            <ul style="margin-top: 20px;">
              <li>Modern eğitim teknolojileri</li>
              <li>Deneyimli öğretmen kadrosu</li>
              <li>Kapsamlı akademik programlar</li>
              <li>Kişisel gelişim fırsatları</li>
              <li>Sosyal ve kültürel aktiviteler</li>
            </ul>
            <button class="close" data-modal="modalcta">Kapat</button>
          </div>
        </div>

        <div id="modalhaberler" class="modal">
          <div class="modal-content" style="max-width: 1000px; max-height: 90vh; overflow-y: auto;">
            <h2 style="color: #0d1331; margin-bottom: 30px; text-align: center;">Tüm Haberler</h2>
            @if(isset($allNews) && $allNews->count() > 0)
              <div style="display: flex; flex-direction: column; gap: 30px;">
                @foreach($allNews as $item)
                  <a href="{{ route('news.show', $item->slug) }}" style="text-decoration: none; display: block;">
                    <div class="haber-kart-modal" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); display: flex; flex-direction: row; align-items: stretch; cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                      @php
                        $modalNewsImagePath = $item->image_path;
                        if ($modalNewsImagePath) {
                          // images/ ile başlıyorsa /images/ olarak kullan
                          if (str_starts_with($modalNewsImagePath, 'images/')) {
                            $modalNewsImagePath = '/' . $modalNewsImagePath;
                          } elseif (!str_starts_with($modalNewsImagePath, '/') && !str_starts_with($modalNewsImagePath, 'http')) {
                            // Eğer / ile başlamıyorsa ve http değilse /images/ ekle
                            $modalNewsImagePath = '/images/' . $modalNewsImagePath;
                          }
                        } else {
                          $modalNewsImagePath = '/images/haber-default.jpg';
                        }
                      @endphp
                      <div style="width: 300px; min-width: 300px; height: 200px; background: linear-gradient(135deg, rgba(255,140,66,0.3) 0%, rgba(139,71,137,0.3) 100%); background-image: url('{{ $modalNewsImagePath }}'); background-size: cover; background-position: center;"></div>
                      <div style="padding: 20px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                          @if($item->category || $item->branch || $item->published_at)
                            <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom:12px;">
                              <div style="display:flex; flex-wrap:wrap; gap:8px;">
                                @if($item->category)
                                  <span style="background:#fef2de; color:#b45309; font-size:12px; font-weight:600; padding:4px 10px; border-radius:999px; text-transform:uppercase; letter-spacing:0.5px;">{{ $item->category->name }}</span>
                                @endif
                                @if($item->branch)
                                  <span style="background:#ede9fe; color:#4c1d95; font-size:12px; font-weight:600; padding:4px 10px; border-radius:999px; text-transform:uppercase; letter-spacing:0.5px;">{{ $item->branch->name }}</span>
                                @endif
                              </div>
                              @if($item->published_at)
                                <div style="color:#6b7280; font-size:12px; white-space:nowrap;">
                                  {{ $item->published_at->format('d.m.Y') }}
                                </div>
                              @endif
                            </div>
                          @endif
                          <h3 style="color: #0d1331; font-size: 22px; margin-bottom: 10px;">{{ $item->title }}</h3>
                          <p style="color: #666; font-size: 16px; line-height: 1.6;">
                            {{ Str::limit(strip_tags($item->content), 200) }}
                          </p>
                        </div>
                        <span style="color: #fd7a31; text-decoration: none; font-weight: bold; margin-top: 15px; display: inline-block; align-self: flex-start; font-size: 14px;">Devamını Oku →</span>
                      </div>
                    </div>
                  </a>
                @endforeach
              </div>
            @else
              <p style="text-align: center; color: #666; padding: 40px;">Henüz haber bulunmamaktadır.</p>
            @endif
            <div style="text-align: center; margin-top: 30px;">
              <button class="close" data-modal="modalhaberler" style="background-color: #51223a; color: white; padding: 12px 30px; border-radius: 25px; border: none; cursor: pointer; font-weight: bold;">Kapat</button>
            </div>
          </div>
        </div>

        <!-- Video Modal -->
        <div id="modalvideo" class="modal" style="z-index: 10000; display: none !important; visibility: hidden !important;">
          <div class="modal-content modal-video-content" style="max-width: 800px; width: 90%; max-height: 80vh; padding: 0; background: #000; overflow: hidden; position: relative; margin: auto; border-radius: 8px;">
            <button class="close close-video-modal" data-modal="modalvideo" style="position: absolute; top: 10px; right: 10px; background-color: rgba(81, 34, 58, 0.95); color: #f59e0b; padding: 0; border-radius: 50%; border: 3px solid white; cursor: pointer; z-index: 10001; font-weight: bold; font-size: 24px; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); transition: all 0.3s ease; line-height: 1;">✕</button>
            <div style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000;">
              <iframe id="video-iframe" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; background: #000;"></iframe>
            </div>
          </div>
        </div>

        <!-- Photo Modal -->
        <div id="modalphoto" class="modal" style="z-index: 10000; display: none !important; visibility: hidden !important;">
          <div class="modal-content modal-photo-content" style="max-width: 90%; width: auto; max-height: 90vh; padding: 0; background: #000; overflow: hidden; position: relative; margin: auto; border-radius: 8px;">
            <button class="close close-photo-modal" data-modal="modalphoto" style="position: absolute; top: 10px; right: 10px; background-color: rgba(81, 34, 58, 0.95); color: white; padding: 0; border-radius: 50%; border: 3px solid white; cursor: pointer; z-index: 10001; font-weight: bold; font-size: 24px; width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); transition: all 0.3s ease; line-height: 1;">✕</button>
            <img id="photo-image" src="" alt="Fotoğraf" style="max-width: 100%; max-height: 90vh; width: auto; height: auto; display: block; margin: 0 auto;" />
          </div>
        </div>

                 <div id="modalfranchise" class="modal">
                      <div class="modal-content">

        <h2>İnsan Kaynakları Başvuru Formu</h2>
        <form action="{{ route('form.submit') }}" method="POST">
  @csrf
  <!-- Ad Soyad -->
  <div class="input-container">
    <label for="name">Ad Soyad <span style="color: red;">*</span></label>
    <input type="text" name="name" id="name" required>
  </div>
  
  <!-- E-posta -->
  <div class="input-container">
    <label for="email">E-posta <span style="color: red;">*</span></label>
    <input type="email" name="email" id="email" required>
  </div>
  
  <!-- Telefon -->
  <div class="input-container">
    <label for="phone">Telefon <span style="color: red;">*</span></label>
    <input type="tel" name="phone" id="phone" required>
  </div>
  
  <!-- Mesaj -->
  <div class="input-container">
    <label for="message">Mesaj <span style="color: red;">*</span></label>
    <textarea name="message" id="message" required></textarea>
  </div>
  
  <!-- Pozisyon -->
  <div class="input-container">
    <label for="position">Başvurulan Pozisyon <span style="color: red;">*</span></label>
    <input type="text" name="position" id="position" placeholder="Örn: Öğretmen, Müdür Yardımcısı, Rehber Öğretmen" required>
  </div>

  <!-- Deneyim -->
  <div class="input-container">
    <label for="experience">Mesleki Deneyim (Yıl) <span style="color: red;">*</span></label>
    <input type="number" name="experience" id="experience" min="0" placeholder="Örn: 5" required>
  </div>
  
  <!-- Eğitim Durumu -->
  <div class="input-container">
    <label for="education">Eğitim Durumu <span style="color: red;">*</span></label>
    <select name="education" id="education" required>
      <option value="">Seçiniz</option>
      <option value="lise">Lise</option>
      <option value="onlisans">Ön Lisans</option>
      <option value="lisans">Lisans</option>
      <option value="yukseklisans">Yüksek Lisans</option>
      <option value="doktora">Doktora</option>
    </select>
  </div>

  <!-- CV Yükleme -->
  <div class="input-container">
    <label for="cv">CV (PDF) <span style="color: red;">*</span></label>
    <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" required>
    <small style="color: #666; font-size: 14px;">Maksimum 5MB, PDF veya Word formatında</small>
  </div>

  <!-- Submit -->
  <button type="submit" class="form-submit">Gönder</button>
</form>
            <button class="close" data-modal="modalfranchise">Kapat</button>

          </div>
      </div>
      </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const swiperAbout = new Swiper('.swiper-about', {
      // Optional parameters
      loop: true,
      autoplay: {
        delay: 5000,
      },
      slidesPerView: 1,
      spaceBetween: 10,

      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
        1600: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      },

      
    });

const swiper = new Swiper('.swiper', {
  // Optional parameters
  loop: true,
  autoplay: {
    delay: 5000,
  },

  // If we need pagination
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
});

// Keşfet slider'ı sadece içerik varsa başlat
const exploreSection = document.querySelector('.explore');
if (exploreSection && exploreSection.style.display !== 'none') {
  const swiperWrapper = exploreSection.querySelector('.swiper-wrapper');
  if (swiperWrapper && swiperWrapper.children.length > 0) {
const swiperExplore = new Swiper('.swiper-explore', {
  // Optional parameters
  loop: true,
  autoplay: {
    delay: 5000,
  },

  slidesPerView: 1,
  spaceBetween: 10,

  centeredSlides: true,

      // Pagination
      pagination: {
        el: '.swiper-pagination-explore',
        clickable: true,
        dynamicBullets: true,
      },

  breakpoints: {
    1200: {
      slidesPerView: 2,
      spaceBetween: 100,
    },
    1600: {
      slidesPerView: 2,
      spaceBetween: 100,
    },
  },
});
  }
}


$('.mobile-nav-x svg').click(function() {
  $('.mobile-nav').removeClass('active')
  $('.nav-container').removeClass('menu-open')
})

$('.hamburger svg').click(function() {
  $('.mobile-nav').addClass('active')
  $('.nav-container').addClass('menu-open')
})

$('a').click(function() {
  $('.mobile-nav').removeClass('active')
  $('.nav-container').removeClass('menu-open')
})
  </script>
  
  <!-- WhatsApp butonu kaldırıldı -->

<script>
    // Tüm trigger elementlerini seç
    const triggers = document.querySelectorAll('.trigger');
    // Tüm modal kapatma düğmelerini seç
    const closeButtons = document.querySelectorAll('.close');
    // Tüm modalları seç
    const modals = document.querySelectorAll('.modal');

    // Trigger event'ini tanımla
    triggers.forEach(trigger => {
      trigger.addEventListener('click', function (e) {
        e.preventDefault();
        const modalId = this.getAttribute('data-modal');
        // Modal4 kaldırıldı, sadece diğer modallar için çalış
        if (modalId === 'modal4') {
          return;
        }
        const modal = document.getElementById(modalId);
        if (modal) {
          modal.style.display = 'flex';
        }
      });
    });

    // Video modal kapatma fonksiyonu - Tüm kapatma işlemleri için tek fonksiyon
    function closeVideoModal() {
      const modal = document.getElementById('modalvideo');
      if (modal) {
        modal.style.setProperty('display', 'none', 'important');
        modal.style.setProperty('visibility', 'hidden', 'important');
        document.body.style.overflow = '';
        const iframe = document.getElementById('video-iframe');
        if (iframe) {
          iframe.src = '';
        }
        console.log('Video modal kapatıldı');
      }
    }

    // Modal kapatma event'ini tanımla
    closeButtons.forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const modalId = this.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        if (modal) {
          // Video modal için özel fonksiyon kullan
          if (modalId === 'modalvideo') {
            closeVideoModal();
          } else if (modalId === 'modalphoto') {
            closePhotoModal();
          } else {
            modal.style.setProperty('display', 'none', 'important');
            document.body.style.overflow = '';
          }
        }
      });
    });

    // Modal dışında bir yere tıklanınca modalı kapat
    modals.forEach(modal => {
      modal.addEventListener('click', function (e) {
        // Modal container'ına (arka plana) tıklanırsa kapat
        // Modal content'e tıklanırsa kapatma
        if (e.target === this) {
          // Video modal için özel fonksiyon kullan
          if (this.id === 'modalvideo') {
            closeVideoModal();
          } else if (this.id === 'modalphoto') {
            closePhotoModal();
          } else {
            this.style.setProperty('display', 'none', 'important');
            document.body.style.overflow = '';
          }
        }
      });
    });

    // Video thumbnail tıklama event'i - Event delegation kullan
    document.addEventListener('click', function(e) {
      // Video thumbnail veya içindeki herhangi bir elemente (play icon, overlay, img) tıklanırsa
      const thumbnail = e.target.closest('.video-thumbnail');
      const playOverlay = e.target.closest('.play-overlay');
      
      if (thumbnail || playOverlay) {
        e.preventDefault();
        e.stopPropagation();
        
        // Thumbnail'ı bul (play-overlay içindeyse parent'ı al)
        const targetThumbnail = thumbnail || playOverlay?.closest('.video-thumbnail');
        
        if (!targetThumbnail) return;
        
        const videoUrl = targetThumbnail.getAttribute('data-video-url');
        const modal = document.getElementById('modalvideo');
        const iframe = document.getElementById('video-iframe');
        
        console.log('Video thumbnail tıklandı:', { videoUrl, modal: !!modal, iframe: !!iframe });
        
        if (!videoUrl) {
          console.error('Video URL bulunamadı!');
          return;
        }
        
        if (!modal) {
          console.error('Modal bulunamadı!');
          return;
        }
        
        if (!iframe) {
          console.error('Iframe bulunamadı!');
          return;
        }
        
        // YouTube URL'ini embed formatına çevir
        let embedUrl = videoUrl;
        if (videoUrl.includes('youtube.com/watch?v=')) {
          const videoId = videoUrl.split('v=')[1].split('&')[0];
          embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
        } else if (videoUrl.includes('youtu.be/')) {
          const videoId = videoUrl.split('youtu.be/')[1].split('?')[0];
          embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
        } else if (videoUrl.includes('youtube.com/embed/')) {
          embedUrl = videoUrl + (videoUrl.includes('?') ? '&' : '?') + 'autoplay=1';
        } else if (!videoUrl.includes('autoplay')) {
          embedUrl = videoUrl + (videoUrl.includes('?') ? '&' : '?') + 'autoplay=1';
        }
        
        console.log('Embed URL:', embedUrl);
        
        // Önce iframe src'yi ayarla
        iframe.src = embedUrl;
        
        // Modal'ı aç - !important ile CSS override
        modal.style.setProperty('display', 'flex', 'important');
        modal.style.setProperty('visibility', 'visible', 'important');
        modal.style.setProperty('z-index', '10000', 'important');
        
        // Kapat butonunu görünür yap
        const closeBtn = modal.querySelector('.close-video-modal');
        if (closeBtn) {
          closeBtn.style.setProperty('display', 'flex', 'important');
          closeBtn.style.setProperty('visibility', 'visible', 'important');
          closeBtn.style.setProperty('opacity', '1', 'important');
        }
        
        document.body.style.overflow = 'hidden'; // Scroll'u engelle
        
        console.log('Modal açıldı');
      }
    });
    
    // Video thumbnail hover efekti - CSS ile yönetiliyor, burada sadece ekstra efektler için
    document.addEventListener('DOMContentLoaded', function() {
      // Video thumbnail'lara hover efekti ekle
      const exploreSection = document.querySelector('.explore');
      if (exploreSection) {
        exploreSection.addEventListener('mouseenter', function(e) {
          const thumbnail = e.target.closest('.video-thumbnail');
          if (thumbnail) {
            const overlay = thumbnail.querySelector('.play-overlay');
            if (overlay) {
              overlay.style.background = 'rgba(0, 0, 0, 0.5)';
            }
          }
        }, true);
        
        exploreSection.addEventListener('mouseleave', function(e) {
          const thumbnail = e.target.closest('.video-thumbnail');
          if (thumbnail) {
            const overlay = thumbnail.querySelector('.play-overlay');
            if (overlay) {
              overlay.style.background = 'rgba(0, 0, 0, 0.3)';
            }
          }
        }, true);
      }
    });
    
    // Video modal için özel kapatma event'i - Kapat butonu (close-video-modal class)
    document.addEventListener('click', function(e) {
      const closeBtn = e.target.closest('.close-video-modal');
      if (closeBtn) {
        e.preventDefault();
        e.stopPropagation();
        closeVideoModal();
      }
    });
    
    // Photo modal kapatma fonksiyonu
    function closePhotoModal() {
      const modal = document.getElementById('modalphoto');
      if (modal) {
        modal.style.setProperty('display', 'none', 'important');
        modal.style.setProperty('visibility', 'hidden', 'important');
        document.body.style.overflow = '';
        const photoImg = document.getElementById('photo-image');
        if (photoImg) {
          photoImg.src = '';
        }
        console.log('Photo modal kapatıldı');
      }
    }
    
    // Photo thumbnail tıklama event'i
    document.addEventListener('click', function(e) {
      const photoThumbnail = e.target.closest('.photo-thumbnail');
      if (photoThumbnail) {
        e.preventDefault();
        e.stopPropagation();
        const imageUrl = photoThumbnail.getAttribute('data-image-url');
        const modal = document.getElementById('modalphoto');
        const photoImg = document.getElementById('photo-image');
        
        if (imageUrl && modal && photoImg) {
          photoImg.src = imageUrl;
          modal.style.setProperty('display', 'flex', 'important');
          modal.style.setProperty('visibility', 'visible', 'important');
          modal.style.setProperty('z-index', '10000', 'important');
          document.body.style.overflow = 'hidden';
          console.log('Photo modal açıldı:', imageUrl);
        }
      }
    });
    
    // Photo modal için özel kapatma event'i
    document.addEventListener('click', function(e) {
      const closeBtn = e.target.closest('.close-photo-modal');
      if (closeBtn) {
        e.preventDefault();
        e.stopPropagation();
        closePhotoModal();
      }
    });
    
    // ESC tuşu ile modal kapatma
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' || e.keyCode === 27) {
        const videoModal = document.getElementById('modalvideo');
        const photoModal = document.getElementById('modalphoto');
        
        if (videoModal) {
          const computedStyle = window.getComputedStyle(videoModal);
          if (computedStyle.display !== 'none' && videoModal.style.display !== 'none') {
            closeVideoModal();
            return;
          }
        }
        
        if (photoModal) {
          const computedStyle = window.getComputedStyle(photoModal);
          if (computedStyle.display !== 'none' && photoModal.style.display !== 'none') {
            closePhotoModal();
          }
        }
      }
    });

    // Sticky menü scroll efekti - scroll down'da kaybol, scroll up'da görün
    const nav = document.querySelector('.nav');
    const navContainer = document.querySelector('.nav-container');
    let lastScrollY = window.scrollY;
    let ticking = false;
    
    window.addEventListener('scroll', function() {
      if (!ticking) {
        window.requestAnimationFrame(function() {
          const scrollY = window.scrollY;
          
          // Scroll pozisyonuna göre menüyü göster/gizle
          if (scrollY > 100) {
            // Aşağı kaydırıyorsa gizle
            if (scrollY > lastScrollY) {
              navContainer.classList.add('hidden');
            } 
            // Yukarı kaydırıyorsa göster
            else if (scrollY < lastScrollY) {
              navContainer.classList.remove('hidden');
            }
            
            // Koyuluk efekti
            nav.classList.add('scrolled');
            navContainer.classList.add('scrolled');
          } else {
            // Üstteyken her zaman göster
            navContainer.classList.remove('hidden');
            nav.classList.remove('scrolled');
            navContainer.classList.remove('scrolled');
          }
          
          lastScrollY = scrollY;
          ticking = false;
        });
        ticking = true;
      }
    });
  </script>

  <!-- Popup Banner -->
  @if(isset($popupBanner) && $popupBanner)
    <style>
      .popup-banner-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 10000;
        align-items: center;
        justify-content: center;
      }
      
      .popup-banner-content {
        position: relative;
        max-width: 90%;
        width: auto;
        max-width: 1200px;
        height: 90vh;
        max-height: 90vh;
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        display: flex;
        flex-direction: column;
      }
      
      .popup-banner-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        z-index: 10001;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #333;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: all 0.3s;
      }
      
      .popup-banner-close:hover {
        transform: scale(1.1);
        background: #f0f0f0;
      }
      
      .popup-banner-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
        flex: 1;
        min-height: 0;
      }
      
      /* Masaüstü için özel ayarlar */
      @media (min-width: 769px) {
        .popup-banner-content {
          width: auto;
          max-width: 1200px;
          height: 90vh;
          max-height: 90vh;
        }
      }
      
      /* Mobil için responsive ayarlar */
      @media (max-width: 768px) {
        .popup-banner-content {
          max-width: 95%;
          width: 95%;
          height: auto;
          max-height: 90vh;
          border-radius: 10px;
        }
        
        .popup-banner-image {
          max-height: calc(90vh - 60px);
          object-fit: contain;
        }
        
        .popup-banner-close {
          width: 35px;
          height: 35px;
          font-size: 20px;
          top: 10px;
          right: 10px;
        }
      }
      
      @media (max-width: 480px) {
        .popup-banner-content {
          max-width: 95%;
          width: 95%;
          height: auto;
          max-height: 90vh;
          border-radius: 10px;
          margin: 20px auto;
        }
        
        .popup-banner-image {
          max-height: calc(90vh - 60px);
          object-fit: contain;
        }
        
        .popup-banner-close {
          width: 30px;
          height: 30px;
          font-size: 18px;
          top: 8px;
          right: 8px;
        }
      }
    </style>
    <div id="popupBannerModal" class="popup-banner-overlay">
      <div class="popup-banner-content">
        <button class="popup-banner-close">
          ×
        </button>
        @php
          $popupImagePath = $popupBanner->background_image;
          if ($popupImagePath) {
            if (str_starts_with($popupImagePath, 'http://') || str_starts_with($popupImagePath, 'https://')) {
              $popupImageSrc = $popupImagePath;
            } elseif (str_starts_with($popupImagePath, 'storage/')) {
              $popupImageSrc = asset($popupImagePath);
            } elseif (str_starts_with($popupImagePath, '/storage/')) {
              $popupImageSrc = $popupImagePath;
            } elseif (str_starts_with($popupImagePath, 'images/')) {
              $popupImageSrc = asset($popupImagePath);
            } elseif (str_starts_with($popupImagePath, '/images/')) {
              $popupImageSrc = $popupImagePath;
            } else {
              $popupImageSrc = asset('storage/' . $popupImagePath);
            }
          } else {
            $popupImageSrc = null;
          }
        @endphp
        @if($popupBanner->link)
          <a href="{{ $popupBanner->link }}" target="_blank" style="display: flex; flex-direction: column; flex: 1; text-decoration: none; height: 100%; min-height: 0;">
        @else
          <div style="display: flex; flex-direction: column; flex: 1; height: 100%; min-height: 0;">
        @endif
        @if($popupImageSrc)
          <img src="{{ $popupImageSrc }}" alt="{{ $popupBanner->title ?? 'Popup Banner' }}" class="popup-banner-image">
        @endif
        @if($popupBanner->link)
          </a>
        @else
          </div>
        @endif
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var popupModal = document.getElementById('popupBannerModal');
        var closeBtn = document.querySelector('.popup-banner-close');
        
        // Sayfa yüklendiğinde popup'ı göster
        setTimeout(function() {
          popupModal.style.display = 'flex';
        }, 500);

        // Kapat butonuna tıklandığında
        if (closeBtn) {
          closeBtn.addEventListener('click', function() {
            popupModal.style.display = 'none';
          });
        }

        // Overlay'e tıklandığında kapat
        popupModal.addEventListener('click', function(e) {
          if (e.target === popupModal) {
            popupModal.style.display = 'none';
          }
        });

        // ESC tuşu ile kapat
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape' && popupModal.style.display === 'flex') {
            popupModal.style.display = 'none';
          }
        });
      });
    </script>
  @endif

</body>
</html>