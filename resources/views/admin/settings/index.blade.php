<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                Site Ayarları
            </h2>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            @if(session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('dashboard.settings.update') }}">
                        @csrf

                        <div class="row g-4">
                            <!-- İletişim Bilgileri -->
                            <div class="col-12 col-lg-6">
                                <h5 class="fw-bold mb-3" style="color:#111827;">İletişim Bilgileri</h5>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', $contact['phone'] ?? '') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', $contact['email'] ?? '') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="left_contact_title" class="form-label">Sol Kart Başlığı</label>
                                            <input type="text" name="left_contact_title" id="left_contact_title" class="form-control @error('left_contact_title') is-invalid @enderror"
                                                   value="{{ old('left_contact_title', $contact['left_contact_title'] ?? 'İlk Öğretim Yerleşkesi') }}">
                                            @error('left_contact_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="address_left" class="form-label">Adres (Sol Kolon)</label>
                                            <textarea name="address_left" id="address_left" rows="3" class="form-control @error('address_left') is-invalid @enderror">{{ old('address_left', $contact['address_left'] ?? '') }}</textarea>
                                            @error('address_left')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="left_embed_url" class="form-label">Sol Kolon Harita Embed URL</label>
                                            <textarea name="left_embed_url" id="left_embed_url" rows="3" class="form-control @error('left_embed_url') is-invalid @enderror">{{ old('left_embed_url', $map['left_embed_url'] ?? '') }}</textarea>
                                            @error('left_embed_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">İlköğretim yerleşkesi için özel harita.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="left_phone" class="form-label">Sol Kolon Telefon</label>
                                            <input type="text" name="left_phone" id="left_phone" class="form-control @error('left_phone') is-invalid @enderror"
                                                   value="{{ old('left_phone', $contact['left_phone'] ?? '') }}">
                                            @error('left_phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="left_email" class="form-label">Sol Kolon E-posta</label>
                                            <input type="email" name="left_email" id="left_email" class="form-control @error('left_email') is-invalid @enderror"
                                                   value="{{ old('left_email', $contact['left_email'] ?? '') }}">
                                            @error('left_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="right_contact_title" class="form-label">Sağ Kart Başlığı</label>
                                            <input type="text" name="right_contact_title" id="right_contact_title" class="form-control @error('right_contact_title') is-invalid @enderror"
                                                   value="{{ old('right_contact_title', $contact['right_contact_title'] ?? 'Fen-Anadolu Lisesi Yerleşkesi') }}">
                                            @error('right_contact_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="address_right" class="form-label">Adres (Sağ Kolon)</label>
                                            <textarea name="address_right" id="address_right" rows="3" class="form-control @error('address_right') is-invalid @enderror">{{ old('address_right', $contact['address_right'] ?? '') }}</textarea>
                                            @error('address_right')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="right_embed_url" class="form-label">Sağ Kolon Harita Embed URL</label>
                                            <textarea name="right_embed_url" id="right_embed_url" rows="3" class="form-control @error('right_embed_url') is-invalid @enderror">{{ old('right_embed_url', $map['right_embed_url'] ?? '') }}</textarea>
                                            @error('right_embed_url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="text-muted">Fen-Anadolu Lisesi yerleşkesi için özel harita.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="right_phone" class="form-label">Sağ Kolon Telefon</label>
                                            <input type="text" name="right_phone" id="right_phone" class="form-control @error('right_phone') is-invalid @enderror"
                                                   value="{{ old('right_phone', $contact['right_phone'] ?? '') }}">
                                            @error('right_phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="right_email" class="form-label">Sağ Kolon E-posta</label>
                                            <input type="email" name="right_email" id="right_email" class="form-control @error('right_email') is-invalid @enderror"
                                                   value="{{ old('right_email', $contact['right_email'] ?? '') }}">
                                            @error('right_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sosyal Medya -->
                            <div class="col-12 col-lg-6">
                                <h5 class="fw-bold mb-3" style="color:#111827;">Sosyal Medya</h5>

                                <div class="mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="url" name="instagram" id="instagram" class="form-control @error('instagram') is-invalid @enderror"
                                           value="{{ old('instagram', $social['instagram'] ?? '') }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="url" name="facebook" id="facebook" class="form-control @error('facebook') is-invalid @enderror"
                                           value="{{ old('facebook', $social['facebook'] ?? '') }}">
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="twitter" class="form-label">X / Twitter</label>
                                    <input type="url" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror"
                                           value="{{ old('twitter', $social['twitter'] ?? '') }}">
                                    @error('twitter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="youtube" class="form-label">YouTube</label>
                                    <input type="url" name="youtube" id="youtube" class="form-control @error('youtube') is-invalid @enderror"
                                           value="{{ old('youtube', $social['youtube'] ?? '') }}">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror"
                                           value="{{ old('linkedin', $social['linkedin'] ?? '') }}">
                                    @error('linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                Kaydet
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


