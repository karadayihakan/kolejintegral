<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="mb-0 fw-bold" style="font-size: 1.75rem; color: #1f2937;">Dashboard</h2>
                <p class="mb-0 mt-1" style="font-size: 0.875rem; color: #6b7280;">Hoş geldiniz, {{ Auth::user()->name }}</p>
            </div>
            <div class="text-end">
                <p class="mb-0" style="font-size: 0.75rem; color: #6b7280;">{{ now()->format('d F Y') }}</p>
                <p class="mb-0" style="font-size: 0.875rem; font-weight: 500; color: #374151;">{{ now()->format('H:i') }}</p>
            </div>
        </div>
    </x-slot>

    <div style="padding: 2rem 0;">
        <div class="container-fluid px-4">
            <!-- İstatistik Kartları -->
            <div class="row g-4 mb-4">
                <!-- Birim Kartı -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="stat-card" style="background: linear-gradient(135deg, #4b5563 0%, #6b7280 100%); border-radius: 1rem; padding: 1.5rem; color: white; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)';">
                        <div style="position: absolute; top: -1rem; right: -1rem; width: 6rem; height: 6rem; background: white; opacity: 0.1; border-radius: 50%;"></div>
                        <div style="position: absolute; bottom: -1rem; left: -1rem; width: 8rem; height: 8rem; background: white; opacity: 0.05; border-radius: 50%;"></div>
                        <div class="d-flex justify-content-between align-items-start" style="position: relative; z-index: 1;">
                            <div>
                                <p class="mb-1" style="font-size: 0.875rem; font-weight: 500; color: rgba(255,255,255,0.9);">Toplam Birim</p>
                                <p class="mb-0" style="font-size: 2rem; font-weight: 700;">{{ $stats['branches_count'] }}</p>
                                <p class="mb-0 mt-2" style="font-size: 0.75rem; color: rgba(255,255,255,0.8);">Aktif birimler</p>
                            </div>
                            <div style="background: rgba(255,255,255,0.2); border-radius: 0.75rem; padding: 1rem; backdrop-filter: blur(10px);">
                                <svg style="width: 2rem; height: 2rem; color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pikajintegral Kartı -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="stat-card" style="background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%); border-radius: 1rem; padding: 1.5rem; color: white; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)';">
                        <div style="position: absolute; top: -1rem; right: -1rem; width: 6rem; height: 6rem; background: white; opacity: 0.1; border-radius: 50%;"></div>
                        <div style="position: absolute; bottom: -1rem; left: -1rem; width: 8rem; height: 8rem; background: white; opacity: 0.05; border-radius: 50%;"></div>
                        <div class="d-flex justify-content-between align-items-start" style="position: relative; z-index: 1;">
                            <div>
                                <p class="mb-1" style="font-size: 0.875rem; font-weight: 500; color: rgba(255,255,255,0.9);">Pikajintegral Sayısı</p>
                                <p class="mb-0" style="font-size: 2rem; font-weight: 700;">{{ $stats['magazines_count'] }}</p>
                                <p class="mb-0 mt-2" style="font-size: 0.75rem; color: rgba(255,255,255,0.8);">
                                    @if($stats['latest_magazine'])
                                        Son sayı: <span style="font-weight: 600;">{{ $stats['latest_magazine']->name }}</span>
                                    @else
                                        Henüz dergi eklenmemiş
                                    @endif
                                </p>
                            </div>
                            <div style="background: rgba(255,255,255,0.2); border-radius: 0.75rem; padding: 1rem; backdrop-filter: blur(10px);">
                                <svg style="width: 2rem; height: 2rem; color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h12a2 2 0 012 2v13l-4-2-4 2-4-2-4 2V6a2 2 0 012-2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Haber Kartı -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="stat-card" style="background: linear-gradient(135deg, #374151 0%, #4b5563 100%); border-radius: 1rem; padding: 1.5rem; color: white; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)';">
                        <div style="position: absolute; top: -1rem; right: -1rem; width: 6rem; height: 6rem; background: white; opacity: 0.1; border-radius: 50%;"></div>
                        <div style="position: absolute; bottom: -1rem; left: -1rem; width: 8rem; height: 8rem; background: white; opacity: 0.05; border-radius: 50%;"></div>
                        <div class="d-flex justify-content-between align-items-start" style="position: relative; z-index: 1;">
                            <div>
                                <p class="mb-1" style="font-size: 0.875rem; font-weight: 500; color: rgba(255,255,255,0.9);">Yayınlanan Haber</p>
                                <p class="mb-0" style="font-size: 2rem; font-weight: 700;">{{ $stats['news_count'] }}</p>
                                <p class="mb-0 mt-2" style="font-size: 0.75rem; color: rgba(255,255,255,0.8);">Aktif haberler</p>
                            </div>
                            <div style="background: rgba(255,255,255,0.2); border-radius: 0.75rem; padding: 1rem; backdrop-filter: blur(10px);">
                                <svg style="width: 2rem; height: 2rem; color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sayfa Kartı -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="stat-card" style="background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); border-radius: 1rem; padding: 1.5rem; color: white; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); position: relative; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;" onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)';">
                        <div style="position: absolute; top: -1rem; right: -1rem; width: 6rem; height: 6rem; background: white; opacity: 0.1; border-radius: 50%;"></div>
                        <div style="position: absolute; bottom: -1rem; left: -1rem; width: 8rem; height: 8rem; background: white; opacity: 0.05; border-radius: 50%;"></div>
                        <div class="d-flex justify-content-between align-items-start" style="position: relative; z-index: 1;">
                            <div>
                                <p class="mb-1" style="font-size: 0.875rem; font-weight: 500; color: rgba(255,255,255,0.9);">Sayfalar</p>
                                <p class="mb-0" style="font-size: 2rem; font-weight: 700;">{{ \App\Models\Page::count() }}</p>
                                <p class="mb-0 mt-2" style="font-size: 0.75rem; color: rgba(255,255,255,0.8);">Toplam sayfa</p>
                            </div>
                            <div style="background: rgba(255,255,255,0.2); border-radius: 0.75rem; padding: 1rem; backdrop-filter: blur(10px);">
                                <svg style="width: 2rem; height: 2rem; color: white;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hızlı Erişim Butonları -->
            <div class="mb-4">
                <h3 class="mb-3 fw-bold" style="font-size: 1.25rem; color: #111827;">
                    <svg style="width: 1.25rem; height: 1.25rem; display: inline-block; vertical-align: middle; margin-right: 0.5rem; color: #4b5563;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Hızlı Erişim
                </h3>
                <div class="row g-3">
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ route('dashboard.branch.index') }}" class="quick-access-card" style="display: block; background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border: 1px solid #e5e7eb; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'; this.style.borderColor='#fd7a31'; this.style.transform='translateY(-2px)';" onmouseout="this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)'; this.style.borderColor='#e5e7eb'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center mb-3">
                                <div class="quick-icon" style="background: #fed7aa; border-radius: 0.5rem; padding: 0.75rem; transition: background 0.3s;">
                                    <svg style="width: 1.5rem; height: 1.5rem; color: #fd7a31;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                            <h4 class="mb-1 fw-semibold" style="color: #111827; font-size: 1rem;">Birimleri Yönet</h4>
                            <p class="mb-0" style="font-size: 0.875rem; color: #6b7280;">Birim ekle, düzenle veya sil</p>
                            <div class="mt-3 d-flex align-items-center" style="color: #fd7a31; opacity: 0; transition: opacity 0.3s;">
                                <span style="font-size: 0.875rem; font-weight: 500;">Git</span>
                                <svg style="width: 1rem; height: 1rem; margin-left: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ route('dashboard.news.index') }}" class="quick-access-card" style="display: block; background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border: 1px solid #e5e7eb; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'; this.style.borderColor='#fd7a31'; this.style.transform='translateY(-2px)';" onmouseout="this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)'; this.style.borderColor='#e5e7eb'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center mb-3">
                                <div class="quick-icon" style="background: #fed7aa; border-radius: 0.5rem; padding: 0.75rem; transition: background 0.3s;">
                                    <svg style="width: 1.5rem; height: 1.5rem; color: #fd7a31;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            </div>
                            <h4 class="mb-1 fw-semibold" style="color: #111827; font-size: 1rem;">Haberleri Yönet</h4>
                            <p class="mb-0" style="font-size: 0.875rem; color: #6b7280;">Haber ekle, düzenle veya sil</p>
                            <div class="mt-3 d-flex align-items-center" style="color: #fd7a31; opacity: 0; transition: opacity 0.3s;">
                                <span style="font-size: 0.875rem; font-weight: 500;">Git</span>
                                <svg style="width: 1rem; height: 1rem; margin-left: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ route('dashboard.pages.index') }}" class="quick-access-card" style="display: block; background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border: 1px solid #e5e7eb; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'; this.style.borderColor='#fd7a31'; this.style.transform='translateY(-2px)';" onmouseout="this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)'; this.style.borderColor='#e5e7eb'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center mb-3">
                                <div class="quick-icon" style="background: #fed7aa; border-radius: 0.5rem; padding: 0.75rem; transition: background 0.3s;">
                                    <svg style="width: 1.5rem; height: 1.5rem; color: #fd7a31;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <h4 class="mb-1 fw-semibold" style="color: #111827; font-size: 1rem;">Sayfaları Yönet</h4>
                            <p class="mb-0" style="font-size: 0.875rem; color: #6b7280;">Sayfa ekle, düzenle veya sil</p>
                            <div class="mt-3 d-flex align-items-center" style="color: #fd7a31; opacity: 0; transition: opacity 0.3s;">
                                <span style="font-size: 0.875rem; font-weight: 500;">Git</span>
                                <svg style="width: 1rem; height: 1rem; margin-left: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ route('dashboard.settings.index') }}" class="quick-access-card" style="display: block; background: white; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border: 1px solid #e5e7eb; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'; this.style.borderColor='#fd7a31'; this.style.transform='translateY(-2px)';" onmouseout="this.style.boxShadow='0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)'; this.style.borderColor='#e5e7eb'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center mb-3">
                                <div class="quick-icon" style="background: #fed7aa; border-radius: 0.5rem; padding: 0.75rem; transition: background 0.3s;">
                                    <svg style="width: 1.5rem; height: 1.5rem; color: #fd7a31;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                            </div>
                            <h4 class="mb-1 fw-semibold" style="color: #111827; font-size: 1rem;">Site Ayarları</h4>
                            <p class="mb-0" style="font-size: 0.875rem; color: #6b7280;">Telefon, sosyal medya ve adresler</p>
                            <div class="mt-3 d-flex align-items-center" style="color: #fd7a31; opacity: 0; transition: opacity 0.3s;">
                                <span style="font-size: 0.875rem; font-weight: 500;">Git</span>
                                <svg style="width: 1rem; height: 1rem; margin-left: 0.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Son Eklenenler -->
            <div class="row g-4">
                <!-- Son Birimler -->
                <div class="col-12 col-lg-6">
                    <div class="card" style="border: 1px solid #e5e7eb; border-radius: 0.75rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); overflow: hidden;">
                        <div style="background: linear-gradient(135deg, #bc541b 0%, #c05e2e 100%); padding: 1rem 1.5rem;">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="mb-0 fw-bold text-white" style="font-size: 1.125rem;">
                                    <svg style="width: 1.25rem; height: 1.25rem; display: inline-block; vertical-align: middle; margin-right: 0.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    Son Eklenen Birimler
                                </h3>
                                <a href="{{ route('dashboard.branch.index') }}" class="text-white text-decoration-none" style="font-size: 0.875rem; font-weight: 500;" onmouseover="this.style.opacity='0.8';" onmouseout="this.style.opacity='1';">Tümünü Gör →</a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 1.5rem;">
                            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                                @forelse($stats['recent_branches'] as $branch)
                                    <div class="d-flex align-items-center justify-content-between p-3" style="background: #f9fafb; border-radius: 0.5rem; border: 1px solid transparent; transition: all 0.2s;" onmouseover="this.style.background='#fff7ed'; this.style.borderColor='#fed7aa';" onmouseout="this.style.background='#f9fafb'; this.style.borderColor='transparent';">
                                        <div class="d-flex align-items-center" style="flex: 1; min-width: 0;">
                                            <div style="background: #fed7aa; border-radius: 0.5rem; padding: 0.5rem; margin-right: 0.75rem;">
                                                <svg style="width: 1.25rem; height: 1.25rem; color: #fd7a31;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                            <div style="flex: 1; min-width: 0;">
                                                <p class="mb-0 fw-semibold text-truncate" style="color: #111827; font-size: 0.875rem;">{{ $branch->name }}</p>
                                                <p class="mb-0 text-truncate" style="color: #6b7280; font-size: 0.875rem;">{{ $branch->slug }}</p>
                                            </div>
                                        </div>
                                        <span class="text-muted" style="font-size: 0.75rem; white-space: nowrap; margin-left: 0.75rem;">{{ $branch->created_at->diffForHumans() }}</span>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <svg style="width: 3rem; height: 3rem; color: #9ca3af; margin: 0 auto 0.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <p class="mb-0" style="font-size: 0.875rem; color: #6b7280;">Henüz birim eklenmemiş</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Son Haberler -->
                <div class="col-12 col-lg-6">
                    <div class="card" style="border: 1px solid #e5e7eb; border-radius: 0.75rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); overflow: hidden;">
                        <div style="background: linear-gradient(135deg, #fd7a31 0%, #fd7024 100%); padding: 1rem 1.5rem;">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="mb-0 fw-bold text-white" style="font-size: 1.125rem;">
                                    <svg style="width: 1.25rem; height: 1.25rem; display: inline-block; vertical-align: middle; margin-right: 0.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                    Son Yayınlanan Haberler
                                </h3>
                                <a href="{{ route('dashboard.news.index') }}" class="text-white text-decoration-none" style="font-size: 0.875rem; font-weight: 500;" onmouseover="this.style.opacity='0.8';" onmouseout="this.style.opacity='1';">Tümünü Gör →</a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 1.5rem;">
                            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                                @forelse($stats['recent_news'] as $news)
                                    <div class="d-flex align-items-center justify-content-between p-3" style="background: #f9fafb; border-radius: 0.5rem; border: 1px solid transparent; transition: all 0.2s;" onmouseover="this.style.background='#fff7ed'; this.style.borderColor='#fed7aa';" onmouseout="this.style.background='#f9fafb'; this.style.borderColor='transparent';">
                                        <div class="d-flex align-items-center" style="flex: 1; min-width: 0;">
                                            <div style="background: #fed7aa; border-radius: 0.5rem; padding: 0.5rem; margin-right: 0.75rem;">
                                                <svg style="width: 1.25rem; height: 1.25rem; color: #fd7a31;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                                </svg>
                                            </div>
                                            <div style="flex: 1; min-width: 0;">
                                                <p class="mb-0 fw-semibold text-truncate" style="color: #111827; font-size: 0.875rem;">{{ Str::limit($news->title, 40) }}</p>
                                                <p class="mb-0" style="color: #6b7280; font-size: 0.875rem;">
                                                    {{ $news->published_at ? $news->published_at->format('d.m.Y') : 'Yayınlanmadı' }}
                                                </p>
                                            </div>
                                        </div>
                                        <span class="text-muted" style="font-size: 0.75rem; white-space: nowrap; margin-left: 0.75rem;">{{ $news->created_at->diffForHumans() }}</span>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <svg style="width: 3rem; height: 3rem; color: #9ca3af; margin: 0 auto 0.5rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        <p class="mb-0" style="font-size: 0.875rem; color: #6b7280;">Henüz haber eklenmemiş</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .quick-access-card:hover .quick-icon {
            background: #fd7a31 !important;
        }
        .quick-access-card:hover .quick-icon svg {
            color: white !important;
        }
        .quick-access-card:hover > div:last-child {
            opacity: 1 !important;
        }
        
        .quick-access-card:nth-child(2):hover .quick-icon,
        .quick-access-card:nth-child(3):hover .quick-icon,
        .quick-access-card:nth-child(4):hover .quick-icon {
            background: #fd7a31 !important;
        }
    </style>
</x-app-layout>
