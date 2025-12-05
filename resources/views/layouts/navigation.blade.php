<nav style="background: white; border-bottom: 1px solid #e5e7eb; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center" style="height: 64px;">
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <div class="me-4">
                    <a href="{{ route('dashboard.index') }}" class="text-decoration-none">
                        <img src="{{ asset('images/fizetmedya-logo.svg') }}" alt="Fizet Medya" style="height: 40px; width: auto;">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="d-none d-md-flex align-items-center" style="gap: 0.5rem;">
                    <a href="{{ route('dashboard.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Panel
                        @if(request()->routeIs('dashboard.index'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.branch.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.branch.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Birimler
                        @if(request()->routeIs('dashboard.branch.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.news.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.news.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Haberler
                        @if(request()->routeIs('dashboard.news.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.news-categories.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.news-categories.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Haber Kategorileri
                        @if(request()->routeIs('dashboard.news-categories.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.pages.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.pages.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                      Sayfalar
                      @if(request()->routeIs('dashboard.pages.*'))
                          <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                      @endif
                    </a>
                    <a href="{{ route('dashboard.hero-sliders.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.hero-sliders.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Hero
                        @if(request()->routeIs('dashboard.hero-sliders.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.gallery.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.gallery.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Keşfet
                        @if(request()->routeIs('dashboard.gallery.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.menu.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.menu.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Menü Yönetimi
                        @if(request()->routeIs('dashboard.menu.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.popup-banner.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.popup-banner.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Popup Banner
                        @if(request()->routeIs('dashboard.popup-banner.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.settings.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Site Ayarları
                        @if(request()->routeIs('dashboard.settings.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.magazines.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.magazines.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Pikajintegral
                        @if(request()->routeIs('dashboard.magazines.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="d-none d-sm-flex align-items-center">
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; border: none; color: #1f2937; font-weight: 500; padding: 0.5rem 1rem;">
                        <div class="me-2">
                            <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #51223a 0%, #6b2d4a 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 0.875rem;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>
                        <span style="font-size: 0.875rem;">{{ Auth::user()->name }}</span>
                        <svg style="width: 1rem; height: 1rem; margin-left: 0.5rem; color: #1f2937;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="min-width: 200px; border: 1px solid #e5e7eb; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 0.5rem; margin-top: 0.5rem;">
                        <li>
                            <div class="px-3 py-2 border-bottom" style="border-color: #e5e7eb;">
                                <div style="font-weight: 600; color: #111827; font-size: 0.875rem;">{{ Auth::user()->name }}</div>
                                <div style="font-size: 0.75rem; color: #1f2937; margin-top: 0.25rem;">{{ Auth::user()->email }}</div>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}" style="padding: 0.5rem 0.75rem; color: #1f2937; text-decoration: none; border-radius: 0.375rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                                <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem; vertical-align: middle; color: #1f2937;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item w-100 text-start" style="padding: 0.5rem 0.75rem; color: #dc2626; text-decoration: none; border: none; background: transparent; border-radius: 0.375rem; transition: background 0.2s; cursor: pointer;" onmouseover="this.style.background='#fef2f2';" onmouseout="this.style.background='transparent';">
                                    <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem; vertical-align: middle;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Çıkış Yap
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="d-flex d-md-none align-items-center">
                <button type="button" id="mobileMenuToggle" style="background: transparent; border: none; color: #1f2937; padding: 0.5rem;" onclick="toggleMobileMenu()">
                    <svg style="width: 1.5rem; height: 1.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="mobileMenu" style="display: none; border-top: 1px solid #e5e7eb; background: #f9fafb;">
        <div class="container-fluid px-4 py-3">
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                <a href="{{ route('dashboard.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Panel
                </a>
                <a href="{{ route('dashboard.branch.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.branch.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Birimler
                </a>
                <a href="{{ route('dashboard.news.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.news.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Haberler
                </a>
                <a href="{{ route('dashboard.news-categories.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.news-categories.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Haber Kategorileri
                </a>
                <a href="{{ route('dashboard.pages.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.pages.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Sayfalar
                </a>
                <a href="{{ route('dashboard.hero-sliders.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.hero-sliders.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Hero
                </a>
                <a href="{{ route('dashboard.gallery.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.gallery.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Keşfet
                </a>
                <a href="{{ route('dashboard.menu.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.menu.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Menü Yönetimi
                </a>
                <a href="{{ route('dashboard.popup-banner.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.popup-banner.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Popup Banner
                </a>
                <a href="{{ route('dashboard.settings.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Site Ayarları
                </a>
                <a href="{{ route('dashboard.magazines.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.magazines.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Pikajintegral
                </a>
            </div>

            <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                <div class="px-3 py-2 mb-2">
                    <div style="font-weight: 600; color: #111827; font-size: 0.875rem;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.75rem; color: #1f2937; margin-top: 0.25rem;">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}" style="display: block; padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s; margin-bottom: 0.5rem;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-100 text-start" style="padding: 0.75rem 1rem; color: #dc2626; text-decoration: none; border: none; background: transparent; border-radius: 0.5rem; transition: background 0.2s; cursor: pointer; font-weight: 500;" onmouseover="this.style.background='#fef2f2';" onmouseout="this.style.background='transparent';">
                        Çıkış Yap
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-link-custom:hover {
        color: #51223a !important;
        background: #f5eef2 !important;
    }
    .nav-link-custom.active {
        color: #51223a !important;
        background: #f5eef2 !important;
    }
    .mobile-nav-link.active {
        background: #f5eef2 !important;
        color: #51223a !important;
    }
</style>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        if (menu.style.display === 'none' || menu.style.display === '') {
            menu.style.display = 'block';
        } else {
            menu.style.display = 'none';
        }
    }
</script>
