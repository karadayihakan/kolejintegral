<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $branch->name }} | Kolej İntegral</title>
  <link rel="icon" type="image/png" href="/images/integral-logo.png">
  <link rel="shortcut icon" href="/favicon.ico">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="/css/style.css?v={{ time() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
    }

    .top-nav-left__item p {
      font-size: 14px;
    }

    .girisbuton {
      background-color: #fd7a31;
      padding: 10px 20px;
      border-radius: 25px;
      transition: background-color 0.2s ease-in-out;
    }

    .girisbuton:hover {
      background-color: #fd7024;
      opacity: 1;
    }
    
    .girisbuton:hover a {
      color: #ffffff !important;
    }

    /* Mikro site menü - ana site ile aynı yapı */
    .nav .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
    }

    /* Logo ve branch adı container */
    .nav .container > div:first-child {
      display: flex;
      align-items: center;
      gap: 16px;
      flex-shrink: 0;
      max-width: 300px;
    }

    /* Branch adı - taşarsa alt satıra geç */
    .nav .container > div:first-child span {
      color: white;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      font-size: 16px;
      white-space: normal;
      word-wrap: break-word;
      line-height: 1.2;
      max-width: 180px;
    }

    /* Keşfet pagination dot rengi */
    .explore .swiper-pagination-explore .swiper-pagination-bullet-active {
      background-color: #f8931f !important;
    }

    /* Mobilde Keşfet bölümü iyileştirmeleri */
    @media (max-width: 768px) {
      .explore .container {
        padding: 0 30px !important;
      }
      .swiper-explore .swiper-slide {
        border-radius: 8px !important;
        padding: 0 !important;
        border: 2px solid #f59e0b !important;
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
        padding: 0 !important;
        border: 2px solid #f59e0b !important;
      }
      .swiper-explore .swiper-slide img {
        border-radius: 6px !important;
      }
    }
  </style>
</head>
<body>
  <div class="nav-container">
    <div class="top-nav">
      <div class="container">
        <div class="top-nav-left">
          @if($branch->phone)
            <div class="top-nav-left__item">
              <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p><a href="tel:{{ $branch->phone }}" style="text-decoration:none" target="_blank">{{ $branch->phone }}</a></p>
            </div>
          @endif
          @if(optional($branch->user)->email)
            <div class="top-nav-left__item">
              <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9.33317C4 8.62593 4.28095 7.94765 4.78105 7.44755C5.28115 6.94746 5.95942 6.6665 6.66667 6.6665H25.3333C26.0406 6.6665 26.7189 6.94746 27.219 7.44755C27.719 7.94765 28 8.62593 28 9.33317V22.6665C28 23.3737 27.719 24.052 27.219 24.5521C26.7189 25.0522 26.0406 25.3332 25.3333 25.3332H6.66667C5.95942 25.3332 5.28115 25.0522 4.78105 24.5521C4.28095 24.052 4 23.3737 4 22.6665V9.33317Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4 9.3335L16 17.3335L28 9.3335" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p><a href="mailto:{{ $branch->user->email }}" style="text-decoration:none" target="_blank">{{ $branch->user->email }}</a></p>
            </div>
          @endif
        </div>
        <div class="top-nav-right">
          <a href="{{ route('home') }}" style="color:#fff; font-size:14px; text-decoration:none;">
            Ana Siteye Dön
          </a>
        </div>
      </div>
    </div>
    <nav class="nav">
      <div class="container">
        <div>
          <img src="/images/integral-logo.png" alt="Kolej İntegral" width="115" height="106">
          <span>{{ $branch->name }}</span>
        </div>
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
              <a href="#explore">Keşfet</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a href="#haberler">Haberler</a>
              <div class="line"></div>
            </div>
            <div class="nav-item">
              <a href="#contact">İletişim</a>
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
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6h16" /><path d="M4 12h16" /><path d="M4 18h16" />
          </svg>
        </div>
      </div>
      <div class="mobile-nav">
        <div class="mobile-nav-x">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" />
          </svg>
        </div>
        @forelse($menus as $menu)
          <a href="{{ $menu->url }}" target="{{ $menu->target }}">{{ $menu->label }}</a>
        @empty
          {{-- Varsayılan menü öğeleri (menü yoksa) --}}
          <a href="{{ route('about') }}">Hakkımızda</a>
          <a href="#explore">Keşfet</a>
          <a href="#haberler">Haberler</a>
          <a href="#contact">İletişim</a>
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

  @php
    // Şube hero görseli veya varsayılan
    $defaultHero = '/images/okul-oncesi-hero.jpg';
    if (!empty($branch->hero_image)) {
        if (str_starts_with($branch->hero_image, 'http')) {
            $heroBg = $branch->hero_image;
        } elseif (str_starts_with($branch->hero_image, 'storage/')) {
            $heroBg = asset($branch->hero_image);
        } elseif (str_starts_with($branch->hero_image, 'images/')) {
            $heroBg = asset($branch->hero_image);
        } else {
            $heroBg = asset('storage/'.$branch->hero_image);
        }
    } else {
        $heroBg = $defaultHero;
    }
  @endphp

  <header class="header">
    <div class="swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('{{ $heroBg }}');">
          <div class="container">
            <h2>{{ $branch->name }}</h2>
            @if(!empty($branch->slogan))
              <p style="font-size: 20px; font-weight:500; margin-top:10px;">{{ $branch->slogan }}</p>
            @elseif(!empty($branch->address))
              <p>{{ $branch->address }}</p>
            @endif
            <a href="#explore" class="cta-button" style="margin-top:20px; display:inline-flex; align-items:center; gap:10px;">
              <img src="/images/integral-logo.png" alt="Kolej İntegral" width="52" height="52">
              Keşfet
            </a>
          </div>
        </div>
      </div>
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
    <div class="shadow"></div>
  </section>

  <div class="explore" id="explore" style="margin-top: 0;">
    <div class="container">
      <h2>Keşfet</h2>
      <div class="swiper-container">
        <div class="swiper-explore">
          <div class="swiper-wrapper">
            @forelse($galleries as $gallery)
              <div class="swiper-slide">
                @if($gallery->type === 'video' && $gallery->video_url)
                  @php
                    $videoUrl = $gallery->video_url;
                    $videoId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                      $videoId = $matches[1];
                    }
                    if ($videoId) {
                      $thumbnailPath = 'https://img.youtube.com/vi/' . $videoId . '/maxresdefault.jpg';
                    } else {
                      $thumbnailPath = $gallery->image_path ?: '/images/okul-foto-1.jpg';
                    }
                  @endphp
                  <a href="{{ $gallery->video_url }}" target="_blank" style="display:block; position:relative; width:100%; height:100%;">
                    <img class="bg" src="{{ $thumbnailPath }}" alt="{{ $gallery->title ?? 'Kolej İntegral' }}" style="width: 100%; height: 100%; object-fit: cover;" />
                    <div class="play-overlay" style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center; background:rgba(0,0,0,0.3);">
                      <img src="/images/play.png" alt="Play" style="width: 80px; height: 80px; opacity: 0.9;" />
                    </div>
                  </a>
                @else
                  @php
                    $imagePath = $gallery->image_path ?: '/images/okul-foto-1.jpg';
                    if (str_starts_with($imagePath, 'images/') && !str_starts_with($imagePath, '/images/')) {
                      $imagePath = '/' . $imagePath;
                    }
                    if (!str_starts_with($imagePath, '/images/') && !str_starts_with($imagePath, '/storage/') && !str_starts_with($imagePath, 'http')) {
                      $imagePath = '/images/' . ltrim($imagePath, '/');
                    }
                  @endphp
                  <div style="position: relative; width: 100%; height: 100%;">
                    <img class="bg" src="{{ $imagePath }}" alt="{{ $gallery->title ?? 'Kolej İntegral' }}" style="width: 100%; height: 100%; object-fit: cover;" />
                  </div>
                @endif
              </div>
            @empty
            @endforelse
          </div>
          <div class="swiper-pagination swiper-pagination-explore"></div>
        </div>
      </div>
    </div>
    <div class="shadow"></div>
  </div>
  
  <div class="haberler-section" id="haberler" style="width: 100%; min-height: 60vh; display: flex; justify-content: center; background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%); position: relative; padding: 80px 0; margin-top: 0;">
    <div class="container">
      <h2 style="color: #ffffff; font-size: 42px; font-weight: bold; text-align: center; margin-bottom: 40px;">Haberler</h2>
      @if($news->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; max-width: 1200px; margin: 0 auto;">
          @foreach($news as $item)
            <a href="{{ route('news.show', $item->slug) }}" style="text-decoration: none; display: block; height: 100%;">
              <div class="haber-kart" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                @php
                  $newsImagePath = $item->image_path;
                  if ($newsImagePath) {
                    if (str_starts_with($newsImagePath, 'images/')) {
                      $newsImagePath = '/' . $newsImagePath;
                    } elseif (!str_starts_with($newsImagePath, '/') && !str_starts_with($newsImagePath, 'http')) {
                      $newsImagePath = '/images/' . $newsImagePath;
                    }
                  } else {
                    $newsImagePath = '/images/haber-default.jpg';
                  }
                @endphp
                <div style="height: 200px; background-image: url('{{ $newsImagePath }}'); background-size: cover; background-position: center;"></div>
                <div style="padding: 20px; flex: 1; display: flex; flex-direction: column;">
                  <h3 style="color: #111827; font-size: 18px; font-weight: 700; margin-bottom: 10px;">
                    {{ $item->title }}
                  </h3>
                  <p style="color: #4b5563; font-size: 14px; line-height: 1.6; margin-bottom: auto;">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
                  </p>
                </div>
              </div>
            </a>
          @endforeach
        </div>
        <div style="text-align:center; margin-top:40px;">
          <a href="{{ route('branch.news.index', $branch->slug) }}" class="tumunu-gor-btn" style="color: white; padding: 15px 40px; border-radius: 45px; text-decoration: none; font-weight: bold; display: inline-block; cursor: pointer;">Tüm Haberler</a>
        </div>
      @else
        <p style="color: #e5e7eb; text-align: center;">Bu birim için henüz haber eklenmemiş.</p>
      @endif
    </div>
  </div>

  <div class="contact-us" id="contact" style="background-color:#5c3046;">
    <div class="container">
      <div style="display:flex;flex-direction:column;gap:30px;">
        <h2>İletişim Bilgileri</h2>

        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px; margin-bottom: 40px;">
          <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px;">
            <h3 style="color: white; font-size: 24px; margin-bottom: 25px;">
              {{ $branch->name }}
            </h3>

            <div style="display:flex;gap:15px;align-items:flex-start;margin-bottom:20px;">
              <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; flex-shrink: 0;">
                <path d="M14.4373 13.1042C15.1834 12.3583 15.6915 11.408 15.8974 10.3734C16.1033 9.33882 15.9978 8.26638 15.5942 7.29175C15.1906 6.31712 14.507 5.48407 13.6299 4.89796C12.7528 4.31186 11.7216 3.99902 10.6667 3.99902C9.61176 3.99902 8.58055 4.31186 7.70346 4.89796C6.82636 5.48407 6.14277 6.31712 5.73915 7.29175C5.33553 8.26638 5.23001 9.33882 5.43593 10.3734C5.64185 11.408 6.14996 12.3583 6.896 13.1042L10.6667 16.8762L14.4373 13.1042Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <p style="color:white; line-height: 1.6; margin: 0; max-width: 420px;">
                {{ $branch->address ?? 'Adres bilgisi yakında eklenecek.' }}
              </p>
            </div>

            @if($branch->phone)
              @php
                $branchPhoneClean = preg_replace('/[^0-9]/', '', $branch->phone);
              @endphp
              <div style="display:flex;gap:15px;align-items:center;margin-bottom:15px;">
                <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                  <path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a href="tel:{{ $branchPhoneClean }}" style="color:white; text-decoration: none;">{{ $branch->phone }}</a>
              </div>
            @endif

            @if(optional($branch->user)->email)
              <div style="display:flex;gap:15px;align-items:center;margin-bottom:20px;">
                <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                  <path d="M4 9.33317C4 8.62593 4.28095 7.94765 4.78105 7.44755C5.28115 6.94746 5.95942 6.6665 6.66667 6.6665H25.3333C26.0406 6.6665 26.7189 6.94746 27.219 7.44755C27.719 7.94765 28 8.62593 28 9.33317V22.6665C28 23.3737 27.719 24.052 27.219 24.5521C26.7189 25.0522 26.0406 25.3332 25.3333 25.3332H6.66667C5.95942 25.3332 5.28115 25.0522 4.78105 24.5521C4.28095 24.052 4 23.3737 4 22.6665V9.33317Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M4 9.3335L16 17.3335L28 9.3335" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a href="mailto:{{ $branch->user->email }}" style="color:white; text-decoration: none;">{{ $branch->user->email }}</a>
              </div>
            @endif
          </div>

          <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 15px;">
            <h3 style="color: white; font-size: 24px; margin-bottom: 25px;">
              Genel İletişim
            </h3>
            <p style="color:white; line-height: 1.6; margin: 0; max-width: 420px;">
              Kolej İntegral hakkında daha detaylı ve kurumsal bilgi için ana sitemizdeki iletişim kanallarını kullanabilirsiniz.
            </p>
            <div style="margin-top:20px;">
              <a href="{{ route('home') }}#contact" style="display:inline-block; padding:10px 20px; border-radius:999px; background:#f8931f; color:#fff; text-decoration:none; font-weight:600;">
                Kurumsal İletişim
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footer')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    const heroSwiper = new Swiper('.swiper', {
      loop: true,
      autoplay: { delay: 5000 },
      pagination: { el: '.swiper-pagination' }
    });

    const swiperExplore = new Swiper('.swiper-explore', {
      loop: true,
      autoplay: { delay: 5000 },
      slidesPerView: 1,
      spaceBetween: 10,
      centeredSlides: true,
      pagination: {
        el: '.swiper-pagination-explore',
        clickable: true,
        dynamicBullets: true,
      },
      breakpoints: {
        1200: { slidesPerView: 2, spaceBetween: 80 },
        1600: { slidesPerView: 2, spaceBetween: 100 },
      },
    });

    $('.mobile-nav-x svg').click(function() {
      $('.mobile-nav').removeClass('active')
    });

    $('.hamburger svg').click(function() {
      $('.mobile-nav').addClass('active')
    });

    $('.mobile-nav a').click(function() {
      $('.mobile-nav').removeClass('active')
    });

    // Sticky menü scroll efekti - ana sitedeki ile aynı
    const nav = document.querySelector('.nav');
    const navContainer = document.querySelector('.nav-container');
    let lastScrollY = window.scrollY;
    let ticking = false;
    
    window.addEventListener('scroll', function() {
      if (!ticking) {
        window.requestAnimationFrame(function() {
          const scrollY = window.scrollY;
          
          if (scrollY > 100) {
            if (scrollY > lastScrollY) {
              navContainer.classList.add('hidden');
            } else if (scrollY < lastScrollY) {
              navContainer.classList.remove('hidden');
            }
            nav.classList.add('scrolled');
            navContainer.classList.add('scrolled');
          } else {
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
</body>
</html>


