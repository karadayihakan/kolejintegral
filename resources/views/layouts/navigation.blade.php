<nav style="background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%); border-bottom: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);">
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
                    <a href="{{ route('dashboard.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" style="padding: 0.6rem 1.1rem; text-decoration: none; color: #ffffff; font-weight: 550; font-size: 1.05rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Panel
                        @if(request()->routeIs('dashboard.index'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #fd7a31; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.news.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.news.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #ffffff; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Haberler
                        @if(request()->routeIs('dashboard.news.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #fd7a31; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.news-categories.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.news-categories.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #ffffff; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Haber Kategorileri
                        @if(request()->routeIs('dashboard.news-categories.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #fd7a31; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.pages.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.pages.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #ffffff; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                      Sayfalar
                      @if(request()->routeIs('dashboard.pages.*'))
                          <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #51223a; border-radius: 2px;"></span>
                      @endif
                    </a>
                    <a href="{{ route('dashboard.gallery.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.gallery.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #ffffff; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Keşfet
                        @if(request()->routeIs('dashboard.gallery.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #fd7a31; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.popup-banner.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.popup-banner.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #ffffff; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Popup Banner
                        @if(request()->routeIs('dashboard.popup-banner.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #fd7a31; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <a href="{{ route('dashboard.magazines.index') }}" class="nav-link-custom {{ request()->routeIs('dashboard.magazines.*') ? 'active' : '' }}" style="padding: 0.5rem 1rem; text-decoration: none; color: #ffffff; font-weight: 500; font-size: 0.875rem; border-radius: 0.5rem; transition: all 0.2s; position: relative;">
                        Pikajintegral
                        @if(request()->routeIs('dashboard.magazines.*'))
                            <span style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80%; height: 2px; background: #fd7a31; border-radius: 2px;"></span>
                        @endif
                    </a>
                    <div class="dropdown">
                        <button class="nav-link-custom d-flex align-items-center gap-1 {{ request()->routeIs('dashboard.settings.*') || request()->routeIs('dashboard.branch.*') || request()->routeIs('dashboard.hero-sliders.*') || request()->routeIs('dashboard.menu.*') ? 'active' : '' }}"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="padding: 0.6rem 1.1rem; text-decoration: none; color: #ffffff; font-weight: 550; font-size: 1.05rem; border-radius: 0.5rem; transition: all 0.2s;">
                            Ayarlar
                            <svg style="width: 1rem; height: 1rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu" style="border-radius: 0.5rem; border: 1px solid #e5e7eb; padding: 0.25rem 0;">
                            <li><a class="dropdown-item {{ request()->routeIs('dashboard.branch.*') ? 'active' : '' }}" href="{{ route('dashboard.branch.index') }}">Birimler</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('dashboard.hero-sliders.*') ? 'active' : '' }}" href="{{ route('dashboard.hero-sliders.index') }}">Hero</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('dashboard.menu.*') ? 'active' : '' }}" href="{{ route('dashboard.menu.index') }}">Menü Yönetimi</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}" href="{{ route('dashboard.settings.index') }}">Site Ayarları</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="d-none d-sm-flex align-items-center">
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; border: none; color: #ffffff; font-weight: 500; padding: 0.5rem 1rem;">
                        <div class="me-2">
                            <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #fd7a31 0%, #fd7024 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 550; font-size: 0.875rem;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>
                        <span style="font-size: 0.875rem;">{{ Auth::user()->name }}</span>
                        <svg style="width: 1rem; height: 1rem; margin-left: 0.5rem; color: #ffffff;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown" style="min-width: 200px; border: 1px solid #e5e7eb; border-radius: 0.5rem; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); padding: 0.5rem; margin-top: 0.5rem;">
                        <li>
                            <div class="px-3 py-2 border-bottom" style="border-color: #e5e7eb;">
                                <div style="font-weight: 550; color: #111827; font-size: 0.875rem;">{{ Auth::user()->name }}</div>
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
                <button type="button" id="mobileMenuToggle" style="background: transparent; border: none; color: #ffffff; padding: 0.5rem;" onclick="toggleMobileMenu()">
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
                <a href="{{ route('dashboard.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" style="padding: 0.9rem 1.1rem; text-decoration: none; color: #1f2937; font-weight: 550; font-size: 1.05rem; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Panel
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
                <a href="{{ route('dashboard.gallery.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.gallery.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Keşfet
                </a>
                <a href="{{ route('dashboard.popup-banner.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.popup-banner.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Popup Banner
                </a>
                <a href="{{ route('dashboard.magazines.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.magazines.*') ? 'active' : '' }}" style="padding: 0.75rem 1rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Pikajintegral
                </a>
                <div style="padding: 0.5rem 0 0.25rem 0; font-weight: 700; color: #fd7a31; font-size: 0.85rem;">Ayarlar</div>
                <a href="{{ route('dashboard.branch.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.branch.*') ? 'active' : '' }}" style="padding: 0.75rem 1.2rem; text-decoration: none; color: #1f2937; font-weight: 550; font-size: 1.05rem; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Birimler
                </a>
                <a href="{{ route('dashboard.hero-sliders.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.hero-sliders.*') ? 'active' : '' }}" style="padding: 0.6rem 1.2rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Hero
                </a>
                <a href="{{ route('dashboard.menu.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.menu.*') ? 'active' : '' }}" style="padding: 0.6rem 1.2rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Menü Yönetimi
                </a>
                <a href="{{ route('dashboard.settings.index') }}" class="mobile-nav-link {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}" style="padding: 0.6rem 1.2rem; text-decoration: none; color: #1f2937; font-weight: 500; border-radius: 0.5rem; transition: background 0.2s;" onmouseover="this.style.background='#f3f4f6';" onmouseout="this.style.background='transparent';">
                    Site Ayarları
                </a>
            </div>

            <div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                <div class="px-3 py-2 mb-2">
                    <div style="font-weight: 550; color: #111827; font-size: 0.875rem;">{{ Auth::user()->name }}</div>
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
    .nav-link-custom {
        font-weight: 550 !important;
        font-size: 1.05rem !important;
    }
    .nav-link-custom:hover {
        color: #ffffff !important;
        background: rgba(255, 255, 255, 0.15) !important;
        font-weight: 550 !important;
        font-size: 1.05rem !important;
    }
    .nav-link-custom.active {
        color: #ffffff !important;
        background: rgba(255, 255, 255, 0.15) !important;
        font-weight: 550 !important;
        font-size: 1.05rem !important;
    }
    .mobile-nav-link {
        font-weight: 550 !important;
        font-size: 1.05rem !important;
    }
    .mobile-nav-link.active {
        background: rgba(253, 122, 49, 0.2) !important;
        color: #fd7a31 !important;
        font-weight: 550 !important;
        font-size: 1.05rem !important;
    }
    .dropdown-item {
        font-weight: 550 !important;
        font-size: 1.05rem !important;
    }
    nav a.nav-link-custom,
    nav button.nav-link-custom {
        font-weight: 550 !important;
        font-size: 1.05rem !important;
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
