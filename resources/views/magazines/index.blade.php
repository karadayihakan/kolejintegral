<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pikajintegral | Kolej İntegral</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
  <!-- Navigation Container -->
  <div class="nav-container" style="background-color: #51223a;">
    <!-- Top Bar -->
    <div class="top-nav">
      <div class="container">
        <div class="top-nav-left">
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>{{ !empty($settings['phone']) ? $settings['phone'] : '444 3 742' }}</p>
          </div>
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 9.33317C4 8.62593 4.28095 7.94765 4.78105 7.44755C5.28115 6.94746 5.95942 6.6665 6.66667 6.6665H25.3333C26.0406 6.6665 26.7189 6.94746 27.219 7.44755C27.719 7.94765 28 8.62593 28 9.33317V22.6665C28 23.3737 27.719 24.052 27.219 24.5521C26.7189 25.0522 26.0406 25.3332 25.3333 25.3332H6.66667C5.95942 25.3332 5.28115 25.0522 4.78105 24.5521C4.28095 24.052 4 23.3737 4 22.6665V9.33317Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M4 9.3335L16 17.3335L28 9.3335" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>{{ isset($settings['email']) && $settings['email'] ? $settings['email'] : 'bilgi@kolejintegral.com' }}</p>
          </div>
        </div>
        <div class="top-nav-right">
          <a href="https://www.facebook.com/kolejintegral" target="_blank" style="text-decoration:none;">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
          <a href="https://x.com/KOLEJNTEGRAL1" target="_blank" style="text-decoration:none;">
            <i class="fa-brands fa-x-twitter"></i>
          </a>
          <a href="https://www.instagram.com/kolej.integral/?hl=af" target="_blank" style="text-decoration:none;">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="nav fixed-page-nav" style="background-color: #51223a;">
      <div class="container">
        <a href="{{ route('home') }}">
          <img src="/images/integral-logo.png" alt="Kolej İntegral" width="115" height="106">
        </a>
        <div class="nav-items">
          <div class="nav-item">
            <a href="{{ route('about') }}">Hakkımızda</a>
            <div class="line"></div>
          </div>
          <div class="nav-item">
            <a href="{{ route('home') }}#explore">Keşfet</a>
            <div class="line"></div>
          </div>
          <div class="nav-item">
            <a href="{{ route('home') }}#classes">Birimler</a>
            <div class="line"></div>
          </div>
          <div class="nav-item">
            <a href="{{ route('news.index') }}">Haberler</a>
            <div class="line"></div>
          </div>
          <div class="nav-item">
            <a href="{{ route('home') }}#contact">İletişim</a>
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
          <div class="girisbuton" style="background-color: #0d1331; padding: 10px 20px; border-radius: 25px;">
            <a href="{{ route('kayitol') }}">
              Kayıt Ol
            </a>
          </div>
        </div>
        <div class="hamburger">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
        </div>
      </div>
      <div class="mobile-nav">
        <div class="mobile-nav-x">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </div>
        <a href="{{ route('home') }}">Ana Sayfa</a>
        <a href="{{ route('about') }}">Hakkımızda</a>
        <a href="{{ route('home') }}#explore">Keşfet</a>
        <a href="{{ route('home') }}#classes">Birimler</a>
        <a href="{{ route('news.index') }}">Haberler</a>
        <a href="{{ route('home') }}#contact">İletişim</a>
        <a href="https://integral.eyotek.com/v1/Pages/human-resources-application" target="_blank">İnsan Kaynakları</a>
        <a href="{{ route('magazines.index') }}">Pikajintegral</a>
        <div class="girisbuton" style="background-color: #0d1331; padding: 10px 20px; border-radius: 25px;">
          <a href="{{ route('kayitol') }}" style="color:#ffffff !important;">
            Kayıt Ol
          </a>
        </div>
      </div>
    </nav>
  </div>

  <section style="width: 100%; background-color: #51223a; padding: 0; margin-top: 200px;">
    <div style="width: 100%; background-color: white; padding: 20px 0; text-align: center;">
      <h1 style="color: #0d1331; font-size: 32px; font-weight: bold; margin: 0;">PİKAJİNTEGRAL</h1>
    </div>
    <div style="padding: 60px 0; background-color: white;">
      <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
        @if($magazines->count() > 0)
          <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 40px; justify-items: center;">
            @foreach($magazines as $magazine)
              @if($magazine->pdf_path)
                <a href="{{ asset('storage/' . $magazine->pdf_path) }}" target="_blank" style="text-decoration: none; display: block;">
              @endif
              <div style="text-align: center; transition: transform 0.3s ease; background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 6px 20px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">
                @if($magazine->thumbnail_path)
                  <img src="{{ asset('storage/' . $magazine->thumbnail_path) }}" alt="{{ $magazine->name }}" style="width: 100%; max-width: 200px; height: auto; object-fit: contain; margin-bottom: 20px; border-radius: 10px;">
                @else
                  <div style="width: 200px; height: 280px; background: linear-gradient(135deg, rgba(248, 147, 31, 0.2) 0%, rgba(81, 34, 58, 0.2) 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                    <i class="fa-solid fa-file-pdf" style="font-size: 60px; color: #f8931f;"></i>
                  </div>
                @endif
                <h3 style="color: #0d1331; font-size: 20px; font-weight: bold; margin-bottom: 15px;">{{ $magazine->name }}</h3>
                @if($magazine->pdf_path)
                  <div class="magazine-read-btn" style="background-color: #51223a; color: white; padding: 12px 30px; border-radius: 25px; font-weight: bold; display: inline-block; transition: all 0.3s ease;">
                    Oku
                  </div>
                @endif
              </div>
              @if($magazine->pdf_path)
                </a>
              @endif
            @endforeach
          </div>
        @else
          <div style="text-align: center; color: #666; padding: 60px 20px;">
            <i class="fa-solid fa-book-open" style="font-size: 80px; color: #f8931f; margin-bottom: 20px; opacity: 0.5;"></i>
            <p style="font-size: 20px;">Henüz dergi bulunmamaktadır.</p>
          </div>
        @endif
      </div>
    </div>
    <div class="shadow" style="pointer-events: none;"></div>
  </section>

  <!-- Footer -->
  @include('layouts.footer')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    // Mobile menu toggle
    $('.hamburger svg').click(function() {
      $('.mobile-nav').addClass('active')
    })

    $('.mobile-nav-x svg').click(function() {
      $('.mobile-nav').removeClass('active')
    })

    $('a').click(function() {
      $('.mobile-nav').removeClass('active')
    })
  </script>
</body>
</html>

