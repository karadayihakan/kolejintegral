<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Endeneyim | {{ $branch->name }}</title>

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
  />
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="nav-container">
    <div class="top-nav">
      <div class="container">
        <div class="top-nav-left">
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M22 16.92V19.92C22.0011 20.1985 21.9441 20.4742 21.8325 20.7294C21.7209 20.9845 21.5573 21.2136 21.3521 21.4019C21.1469 21.5901 20.9046 21.7335 20.6408 21.8227C20.3769 21.9119 20.0974 21.9451 19.82 21.92C16.7428 21.5856 13.787 20.5342 11.19 18.85C8.77383 17.3147 6.72534 15.2662 5.19 12.85C3.49998 10.2412 2.44824 7.271 2.12 4.18001C2.09501 3.90347 2.12788 3.62477 2.2165 3.36163C2.30513 3.09849 2.44757 2.85669 2.63477 2.65163C2.82196 2.44656 3.04981 2.28271 3.30379 2.17053C3.55778 2.05834 3.83234 2.00027 4.11 2.00001H7.11C7.59531 1.99523 8.06579 2.16708 8.43376 2.48354C8.80173 2.79999 9.04208 3.23945 9.11 3.72001C9.23662 4.68007 9.47145 5.62273 9.81 6.53001C9.94455 6.88793 9.97366 7.27692 9.89391 7.65089C9.81415 8.02485 9.62886 8.36812 9.36 8.64001L8.09 9.91001C9.51356 12.4136 11.5865 14.4865 14.09 15.91L15.36 14.64C15.6319 14.3711 15.9752 14.1859 16.3491 14.1061C16.7231 14.0263 17.1121 14.0555 17.47 14.19C18.3773 14.5286 19.3199 14.7634 20.28 14.89C20.7658 14.9585 21.2094 15.2032 21.5265 15.5775C21.8437 15.9518 22.0122 16.4296 22 16.92Z" stroke="#F5F5F5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>{{ $branch->phone }}</p>
          </div>
          <div class="top-nav-left__item">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_2_3)">
              <path d="M3 21L4.65 17.2C3.38766 15.4081 2.82267 13.217 3.06104 11.0381C3.29942 8.85918 4.32479 6.84214 5.94471 5.36552C7.56463 3.8889 9.66775 3.05421 11.8594 3.0181C14.051 2.98198 16.1805 3.74693 17.8482 5.16937C19.5159 6.59182 20.6071 8.57398 20.9172 10.7439C21.2272 12.9138 20.7347 15.1222 19.5321 16.9548C18.3295 18.7873 16.4994 20.118 14.3854 20.6971C12.2713 21.2762 10.0186 21.0639 8.05 20.1L3 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M8.47059 10.0995C8.47059 10.2435 8.5278 10.3817 8.62963 10.4835C8.73146 10.5853 8.86957 10.6425 9.01358 10.6425C9.15758 10.6425 9.2957 10.5853 9.39752 10.4835C9.49935 10.3817 9.55656 10.2435 9.55656 10.0995V9.01357C9.55656 8.86956 9.49935 8.73145 9.39752 8.62962C9.2957 8.52779 9.15758 8.47058 9.01358 8.47058C8.86957 8.47058 8.73146 8.52779 8.62963 8.62962C8.5278 8.73145 8.47059 8.86956 8.47059 9.01357V10.0995C8.47059 11.5396 9.04266 12.9207 10.061 13.939C11.0793 14.9573 12.4604 15.5294 13.9005 15.5294H14.9864C15.1304 15.5294 15.2685 15.4722 15.3704 15.3704C15.4722 15.2685 15.5294 15.1304 15.5294 14.9864C15.5294 14.8424 15.4722 14.7043 15.3704 14.6025C15.2685 14.5006 15.1304 14.4434 14.9864 14.4434H13.9005C13.7564 14.4434 13.6183 14.5006 13.5165 14.6025C13.4147 14.7043 13.3575 14.8424 13.3575 14.9864C13.3575 15.1304 13.4147 15.2685 13.5165 15.3704C13.6183 15.4722 13.7564 15.5294 13.9005 15.5294" fill="white"/>
              <path d="M8.47059 10.0995C8.47059 10.2435 8.5278 10.3817 8.62963 10.4835C8.73146 10.5853 8.86957 10.6425 9.01358 10.6425C9.15758 10.6425 9.2957 10.5853 9.39752 10.4835C9.49935 10.3817 9.55656 10.2435 9.55656 10.0995V9.01357C9.55656 8.86956 9.49935 8.73145 9.39752 8.62962C9.2957 8.52779 9.15758 8.47058 9.01358 8.47058C8.86957 8.47058 8.73146 8.52779 8.62963 8.62962C8.5278 8.73145 8.47059 8.86956 8.47059 9.01357V10.0995ZM8.47059 10.0995C8.47059 11.5396 9.04266 12.9207 10.061 13.939C11.0793 14.9573 12.4604 15.5294 13.9005 15.5294M13.9005 15.5294H14.9864C15.1304 15.5294 15.2685 15.4722 15.3704 15.3704C15.4722 15.2685 15.5294 15.1304 15.5294 14.9864C15.5294 14.8424 15.4722 14.7043 15.3704 14.6025C15.2685 14.5006 15.1304 14.4434 14.9864 14.4434H13.9005C13.7564 14.4434 13.6183 14.5006 13.5165 14.6025C13.4147 14.7043 13.3575 14.8424 13.3575 14.9864C13.3575 15.1304 13.4147 15.2685 13.5165 15.3704C13.6183 15.4722 13.7564 15.5294 13.9005 15.5294Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </g>
              <defs>
              <clipPath id="clip0_2_3">
              <rect width="24" height="24" fill="white"/>
              </clipPath>
              </defs>
            </svg>
          </div>
        </div>
        <div class="top-nav-right">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_12)">
            <path d="M4 4L15.733 20H20L8.267 4H4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4 20L10.768 13.232M13.228 10.772L20 4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_12">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_8)">
            <path d="M2 8C2 6.93913 2.42143 5.92172 3.17157 5.17157C3.92172 4.42143 4.93913 4 6 4H18C19.0609 4 20.0783 4.42143 20.8284 5.17157C21.5786 5.92172 22 6.93913 22 8V16C22 17.0609 21.5786 18.0783 20.8284 18.8284C20.0783 19.5786 19.0609 20 18 20H6C4.93913 20 3.92172 19.5786 3.17157 18.8284C2.42143 18.0783 2 17.0609 2 16V8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 9L15 12L10 15V9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_8">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_19)">
            <path d="M4 8C4 6.93913 4.42143 5.92172 5.17157 5.17157C5.92172 4.42143 6.93913 4 8 4H16C17.0609 4 18.0783 4.42143 18.8284 5.17157C19.5786 5.92172 20 6.93913 20 8V16C20 17.0609 19.5786 18.0783 18.8284 18.8284C18.0783 19.5786 17.0609 20 16 20H8C6.93913 20 5.92172 19.5786 5.17157 18.8284C4.42143 18.0783 4 17.0609 4 16V8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.5 7.5V7.51" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_19">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_16)">
            <path d="M7 10V14H10V21H14V14H17L18 10H14V8C14 7.73478 14.1054 7.48043 14.2929 7.29289C14.4804 7.10536 14.7348 7 15 7H18V3H15C13.6739 3 12.4021 3.52678 11.4645 4.46447C10.5268 5.40215 10 6.67392 10 8V10H7Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_16">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
        </div>
      </div>
    </div>
    <nav class="nav">
      <div class="container">
        <img src="/images/logo.png" alt="" width="115" height="106">
        <div class="nav-items">
          <div class="nav-item">
            <a href="https://endeneyimmerkezi.com">Ana Sayfa</a>
            <div class="line"></div>
          </div>
          <div class="nav-item">
            <a href="https://endeneyimmerkezi.com/#about-us">Hakkımızda</a>
            <div class="line"></div>
          </div>
          <div class="nav-item">
            <a href="https://endeneyimmerkezi.com/#explore">Keşfet</a>
            <div class="line"></div>
          </div>
    <!-- <div class="nav-item">
            <a href="https://endeneyimmerkezi.com/#classes">Şubeler</a>
            <div class="line"></div> 
          </div>
          -->
          <div class="nav-item">
            <a href="https://endeneyimmerkezi.com/#contact">İletişim</a>
            <div class="line"></div>
          </div>
     <!-- <div class="nav-item">
            <a href="https://endeneyimmerkezi.com/#contact">Kurumsal Başvuru</a>
            <div class="line"></div> 
          </div> 
     -->
        </div>
        <div class="hamburger">
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-menu-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 6l16 0" /><path d="M4 12l16 0" /><path d="M4 18l16 0" /></svg>
        </div>
      </div>
      <div class="mobile-nav">
        <div class="mobile-nav-x">
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
        </div>
        <a href="https://endeneyimmerkezi.com">Ana Sayfa</a>
        <a href="https://endeneyimmerkezi.com/#about-us">Hakkımızda</a>
        <a href="https://endeneyimmerkezi.com/#explore">Keşfet</a>
        <!-- <a href="https://endeneyimmerkezi.com#/classes">Şubeler</a> -->
        <a href="https://endeneyimmerkezi.com/#contact">İletişim</a>
        <!-- <a href="https://endeneyimmerkezi.com/#contact">Kurumsal Başvuru</a> -->
      </div>
    </nav>
  </div>

   <header class="header">
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
         @if($branch->slug == "malatya")
          <div class="swiper-slide" style="background-image: url('/images/branches/malatya.jpeg');">
            <div class="container">
              <div class="class-item" style="margin-bottom: 25px;">
                <img src="/storage/{{ $branch->logo }}" alt="" width="228" height="197">
              </div>
              <a href="#packages" class="secondary" href="#packages">DENEYİM MODÜLLERİNİ İNCELE</a>
            </div>
          </div>
         @else
          <div class="swiper-slide" style="background-image: url('/images/branches/besiktas.jpeg');">
            <div class="container">
              <div class="class-item" style="margin-bottom: 50px;">
                <img src="/storage/{{ $branch->logo }}" alt="" width="228" height="197">
              </div>
              <a href="#packages" class="secondary" href="#packages">DENEYİM MODÜLLERİNİ İNCELE</a>
            </div>
          </div>
         @endif
        
        <div class="swiper-slide" style="background-image: url('/images/branches/1.jpeg');">
            <div class="container">
              <div class="class-item" style="margin-bottom: 50px;">
                <img src="/storage/{{ $branch->logo }}" alt="" width="228" height="197">
              </div>
              <a href="#packages" class="secondary" href="#packages">DENEYİM MODÜLLERİNİ İNCELE</a>
            </div>
          </div>

          <div class="swiper-slide" style="background-image: url('/images/branches/2.jpeg');">
            <div class="container">
              <div class="class-item" style="margin-bottom: 50px;">
                <img src="/storage/{{ $branch->logo }}" alt="" width="228" height="197">
              </div>
              <a href="#packages" class="secondary" href="#packages">DENEYİM MODÜLLERİNİ İNCELE</a>
            </div>
          </div>
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </header>

  <div class="fake-header"></div>

  <div class="packages" id="packages">
    <div class="container">
      <h2>Keşfet</h2>
      <div class="package-items">
        @foreach ($packages as $package)
          <div class="package-item small silver">
            <div class="package-mid">
              <h4>{{$package->name}}</h4>
              <div class="package-features">
                @foreach ($package->features as $feature)
                  <div class="package-feature">
                    <img src="images/package/green-tick.svg" alt="">
                    <p>{{ $feature->name }}</p>
                  </div>
                @endforeach
              </div>
            </div>
            
            <div style="flex-direction:column;display:flex;gap:10px;align-items:center;width: 100%;">
              <div class="package-buy" style="width:100%;">SATIN AL</div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="shadow"></div>
  </div>

  <div class="contact" id="contact">
    <div class="container">
      <h2 style="text-transform: uppercase;">EN DENEYİM {{ $branch->name }}</h2>
      <div class="contact-item">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_91_1221)">
          <path d="M28 13.3335C28 22.6668 16 30.6668 16 30.6668C16 30.6668 4 22.6668 4 13.3335C4 10.1509 5.26428 7.09865 7.51472 4.84821C9.76516 2.59778 12.8174 1.3335 16 1.3335C19.1826 1.3335 22.2348 2.59778 24.4853 4.84821C26.7357 7.09865 28 10.1509 28 13.3335Z" stroke="#F3F3F3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M16 17.3335C18.2091 17.3335 20 15.5426 20 13.3335C20 11.1244 18.2091 9.3335 16 9.3335C13.7909 9.3335 12 11.1244 12 13.3335C12 15.5426 13.7909 17.3335 16 17.3335Z" stroke="#F3F3F3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
          </g>
          <defs>
          <clipPath id="clip0_91_1221">
          <rect width="32" height="32" fill="white"/>
          </clipPath>
          </defs>
        </svg>
          
        <p>{{ $branch->address }}</p>
      </div>
      <div class="contact-item">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M29.3334 22.56V26.56C29.3349 26.9313 29.2589 27.2989 29.1101 27.6391C28.9613 27.9793 28.7431 28.2848 28.4695 28.5358C28.1959 28.7868 27.8728 28.9779 27.5211 29.0969C27.1693 29.2159 26.7966 29.2601 26.4267 29.2266C22.3239 28.7808 18.3827 27.3788 14.9201 25.1333C11.6985 23.0862 8.96719 20.3549 6.92007 17.1333C4.66671 13.6549 3.2644 9.69463 2.82674 5.5733C2.79342 5.20459 2.83724 4.83298 2.95541 4.48213C3.07357 4.13128 3.2635 3.80889 3.51309 3.53546C3.76269 3.26204 4.06648 3.04358 4.40513 2.894C4.74378 2.74441 5.10986 2.66698 5.48007 2.66663H9.48007C10.1271 2.66026 10.7545 2.8894 11.2451 3.31134C11.7357 3.73328 12.0562 4.31923 12.1467 4.95997C12.3156 6.24006 12.6287 7.49694 13.0801 8.70663C13.2595 9.18387 13.2983 9.70252 13.1919 10.2011C13.0856 10.6998 12.8386 11.1574 12.4801 11.52L10.7867 13.2133C12.6848 16.5514 15.4487 19.3152 18.7867 21.2133L20.4801 19.52C20.8426 19.1615 21.3003 18.9144 21.7989 18.8081C22.2975 18.7018 22.8162 18.7406 23.2934 18.92C24.5031 19.3714 25.76 19.6845 27.0401 19.8533C27.6878 19.9447 28.2793 20.2709 28.7021 20.77C29.125 21.269 29.3496 21.9061 29.3334 22.56Z" stroke="#F3F3F3" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
          
          
        <p>{{ $branch->phone }}</p>
      </div>
    </div>

    <div class="shadow"></div>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="footer-left">
        <img src="/images/logo.png" alt="">
        <p>Yepyeni Bir Öğrenme Deneyimi</p>
        <div class="top-nav-right">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_12)">
            <path d="M4 4L15.733 20H20L8.267 4H4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4 20L10.768 13.232M13.228 10.772L20 4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_12">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_8)">
            <path d="M2 8C2 6.93913 2.42143 5.92172 3.17157 5.17157C3.92172 4.42143 4.93913 4 6 4H18C19.0609 4 20.0783 4.42143 20.8284 5.17157C21.5786 5.92172 22 6.93913 22 8V16C22 17.0609 21.5786 18.0783 20.8284 18.8284C20.0783 19.5786 19.0609 20 18 20H6C4.93913 20 3.92172 19.5786 3.17157 18.8284C2.42143 18.0783 2 17.0609 2 16V8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 9L15 12L10 15V9Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_8">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_19)">
            <path d="M4 8C4 6.93913 4.42143 5.92172 5.17157 5.17157C5.92172 4.42143 6.93913 4 8 4H16C17.0609 4 18.0783 4.42143 18.8284 5.17157C19.5786 5.92172 20 6.93913 20 8V16C20 17.0609 19.5786 18.0783 18.8284 18.8284C18.0783 19.5786 17.0609 20 16 20H8C6.93913 20 5.92172 19.5786 5.17157 18.8284C4.42143 18.0783 4 17.0609 4 16V8Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.5 7.5V7.51" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_19">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2_16)">
            <path d="M7 10V14H10V21H14V14H17L18 10H14V8C14 7.73478 14.1054 7.48043 14.2929 7.29289C14.4804 7.10536 14.7348 7 15 7H18V3H15C13.6739 3 12.4021 3.52678 11.4645 4.46447C10.5268 5.40215 10 6.67392 10 8V10H7Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_2_16">
            <rect width="24" height="24" fill="white"/>
            </clipPath>
            </defs>
          </svg>
        </div>
      </div>
      <div class="footer-right">
        <div class="footer-right-column">
          <a href="#">Hakkımızda</a>
          <a href="#">İş Ortaklığı</a>
          <a href="#">Destek</a>
          <a href="#">Medya Merkezi</a>
          <a href="#">Blog</a>
        </div>
        <div class="footer-right-column">
          <a href="#">Kullanım Sözleşmesi</a>
          <a href="#">Gizlilik Sözleşmesi</a>
          <a href="#">Mesafeli Satış Sözleşmesi</a>
          <a href="#">Ön Bilgilendirme Formu</a>
        </div>
      </div>
    </div>
  </footer>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
      },
});

const swiperExplore = new Swiper('.swiper-explore', {
  // Optional parameters
  loop: true,
  autoplay: {
    delay: 5000,
  },

  slidesPerView: 1,
  spaceBetween: 10,

  centeredSlides: true,

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


$('.mobile-nav-x svg').click(function() {
  $('.mobile-nav').removeClass('active')
})

$('.hamburger svg').click(function() {
  $('.mobile-nav').addClass('active')
})

$('a').click(function() {
  $('.mobile-nav').removeClass('active')
})
  </script>
</body>
</html>