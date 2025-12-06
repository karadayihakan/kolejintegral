<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Haberler | Kolej İntegral</title>
  <link rel="icon" type="image/png" href="/images/integral-logo.png">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-wcXyhpXmuFjd5MuV8F5N+G/5uM0KtWbGu+P5Lk2a0X4BHD2dCDGZuAo3l4YVNFxdQ8qIl3TCzrfA3MHZBAL2Kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <!-- Navigation Container -->
  <div class="nav-container" style="background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%);">
    <!-- Top Bar -->
    <div class="top-nav">
      <div class="container">
        <div class="top-nav-left">
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.66667 5.3335H12L14.6667 12.0002L11.3333 14.0002C12.7613 16.8955 15.1046 19.2389 18 20.6668L20 17.3335L26.6667 20.0002V25.3335C26.6667 26.0407 26.3857 26.719 25.8856 27.2191C25.3855 27.7192 24.7072 28.0002 24 28.0002C18.799 27.6841 13.8935 25.4755 10.2091 21.7911C6.52467 18.1066 4.31607 13.2011 4 8.00016C4 7.29292 4.28095 6.61464 4.78105 6.11454C5.28115 5.61445 5.95942 5.3335 6.66667 5.3335Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p><a href="tel:02125551234" style="color:inherit; text-decoration:none;">0212 555 1234</a></p>
          </div>
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 9.33317C4 8.62593 4.28095 7.94765 4.78105 7.44755C5.28115 6.94746 5.95942 6.6665 6.66667 6.6665H25.3333C26.0406 6.6665 26.7189 6.94746 27.219 7.44755C27.719 7.94765 28 8.62593 28 9.33317V22.6665C28 23.3737 27.719 24.052 27.219 24.5521C26.7189 25.0522 26.0406 25.3332 25.3333 25.3332H6.66667C5.95942 25.3332 5.28115 25.0522 4.78105 24.5521C4.28095 24.052 4 23.3737 4 22.6665V9.33317Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M4 9.3335L16 17.3335L28 9.3335" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p><a href="mailto:info@kolejintegral.com" style="color:inherit; text-decoration:none;">info@kolejintegral.com</a></p>
          </div>
        </div>
        <div class="top-nav-right">
          <a href="https://www.facebook.com/kolejintegral" target="_blank" style="text-decoration:none; color: white;">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
          <a href="https://x.com/KOLEJNTEGRAL1" target="_blank" style="text-decoration:none; color: white;">
            <i class="fa-brands fa-x-twitter"></i>
          </a>
          <a href="https://www.instagram.com/kolej.integral/?hl=af" target="_blank" style="text-decoration:none; color: white;">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="nav fixed-page-nav" style="background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%);">
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
        <div class="girisbuton" style="background-color: #51223a; padding: 10px 20px; border-radius: 25px;">
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
        <a href="#" class="trigger" data-modal="modalfranchise">İnsan Kaynakları</a>
        <div class="girisbuton" style="background-color: #51223a; padding: 10px 20px; border-radius: 25px;">
          <a href="{{ route('kayitol') }}" style="color:#ffffff !important;">
            Kayıt Ol
          </a>
      </div>
    </div>
  </nav>
  </div>

  <section style="width: 100%; background-color: #51223a; padding: 0; margin-top: 200px;">
    <div style="width: 100%; background-color: white; padding: 20px 0; text-align: center;">
      <h1 style="color: #0d1331; font-size: 32px; font-weight: bold; margin: 0;">HABERLER</h1>
    </div>
    <div style="padding: 40px 0 60px 0; background-color: white;">
    <div class="container" style="max-width: 1400px; margin: 0 auto; padding: 40px 20px;">
      @if($news->count() > 0)
        <style>
          .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            align-items: end;
            justify-items: center;
            width: 100%;
          }
          @media (max-width: 1024px) {
            .news-grid {
              grid-template-columns: repeat(2, 1fr) !important;
            }
          }
          @media (max-width: 768px) {
            .news-grid {
              grid-template-columns: 1fr !important;
            }
          }
        </style>
        <div class="news-grid">
          @foreach($news as $item)
            <a href="{{ route('news.show', $item->slug) }}" style="text-decoration: none; display: block; height: 100%; width: 100%; max-width: 400px;">
              <div class="haber-kart" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                @php
                  $indexImagePath = $item->image_path;
                  if ($indexImagePath) {
                    if (str_starts_with($indexImagePath, 'images/')) {
                      $indexImagePath = '/' . $indexImagePath;
                    } elseif (!str_starts_with($indexImagePath, '/') && !str_starts_with($indexImagePath, 'http')) {
                      $indexImagePath = '/images/' . $indexImagePath;
                    }
                  } else {
                    $indexImagePath = '/images/haber-default.jpg';
                  }
                @endphp
                <div style="height: 200px; background: linear-gradient(135deg, rgba(248,147,31,0.3) 0%, rgba(81,34,58,0.3) 100%); background-image: url('{{ $indexImagePath }}'); background-size: cover; background-position: center;"></div>
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
                  <span style="color: #f8931f; text-decoration: none; font-weight: bold; margin-top: 20px; display: inline-block; font-size: 14px;">Devamını Oku →</span>
                </div>
              </div>
            </a>
          @endforeach
        </div>
        @if($news->hasPages())
          <div style="margin-top: 40px; display: flex; justify-content: center; align-items: center; gap: 10px;">
            {{ $news->links('pagination::bootstrap-4') }}
          </div>
        @endif
      @else
        <div style="text-align: center; color: white; padding: 40px;">
          <p style="font-size: 20px;">Henüz haber bulunmamaktadır.</p>
        </div>
      @endif
      <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('home') }}" class="anasayfaya-don-btn" style="background-color: #f8931f; color: white; padding: 15px 40px; border-radius: 45px; text-decoration: none; font-weight: bold; display: inline-block; position: relative;">Ana Sayfaya Dön</a>
      </div>
    </div>
    </div>
    <div class="shadow"></div>
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

