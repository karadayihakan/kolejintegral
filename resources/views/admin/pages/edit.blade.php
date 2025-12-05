<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Sayfa Düzenle: ') . $page->title }}
            </h2>
            <a href="{{ route('dashboard.pages.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Geri Dön
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Sayfa Bilgileri -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Sayfa Bilgileri</h3>
                    <form id="pageForm" name="pageForm">
                        <input type="hidden" name="page_id" value="{{ $page->id }}">
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Başlık <span class="text-red-500">*</span></label>
                                <input type="text" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" name="title" value="{{ $page->title }}" required>
                                <span class="text-red-500 text-sm hidden" id="title-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                                <input type="text" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="slug" name="slug" value="{{ $page->slug }}">
                                <p class="text-xs text-gray-500 mt-1">Boş bırakılırsa başlıktan otomatik oluşturulur</p>
                                <span class="text-red-500 text-sm hidden" id="slug-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Açıklama</label>
                                <textarea class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="description" name="description" rows="3">{{ $page->description }}</textarea>
                                <span class="text-red-500 text-sm hidden" id="description-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="template" class="block text-sm font-medium text-gray-700 mb-1">Şablon</label>
                                <select id="template" name="template" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="default" {{ $page->template == 'default' ? 'selected' : '' }}>Varsayılan</option>
                                    <option value="homepage" {{ $page->template == 'homepage' ? 'selected' : '' }}>Ana Sayfa</option>
                                    <option value="about" {{ $page->template == 'about' ? 'selected' : '' }}>Hakkımızda</option>
                                    <option value="contact" {{ $page->template == 'contact' ? 'selected' : '' }}>İletişim</option>
                                    <option value="custom" {{ $page->template == 'custom' ? 'selected' : '' }}>Özel</option>
                                </select>
                                <span class="text-red-500 text-sm hidden" id="template-error"></span>
                            </div>

                            <div class="form-group">
                                <div class="flex items-center">
                                    <input type="checkbox" id="is_active" name="is_active" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ $page->is_active ? 'checked' : '' }}>
                                    <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktif</label>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 pt-4">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Güncelle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Bölümler -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Sayfa Bölümleri</h3>
                        <button id="createNewSection" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Bölüm Ekle
                            </span>
                        </button>
                    </div>

                    <div id="sections-list" class="space-y-4">
                        @forelse($page->sections as $section)
                            <div class="border border-gray-200 rounded-lg p-4" data-section-id="{{ $section->id }}">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-900">{{ $section->section_key }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">Tip: {{ $section->section_type }}</p>
                                        @if($section->title)
                                            <p class="text-sm text-gray-700 mt-1">{{ $section->title }}</p>
                                        @endif
                                        @if($section->content)
                                            <p class="text-sm text-gray-600 mt-2">{{ Str::limit($section->content, 100) }}</p>
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="edit-section bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm" data-id="{{ $section->id }}">
                                            Düzenle
                                        </button>
                                        <button class="delete-section bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm" data-id="{{ $section->id }}">
                                            Sil
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-8">Henüz bölüm eklenmemiş</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Modal -->
    <div class="modal fade" id="sectionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gray-50 border-b">
                    <h5 class="modal-title text-lg font-semibold" id="sectionModalHeading">Yeni Bölüm Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-6">
                    <form id="sectionForm" name="sectionForm">
                        <input type="hidden" name="section_id" id="section_id">
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="section_key" class="block text-sm font-medium text-gray-700 mb-1">Bölüm Anahtarı <span class="text-red-500">*</span></label>
                                <input type="text" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="section_key" name="section_key" required>
                                <p class="text-xs text-gray-500 mt-1">Örn: hero, about, classes</p>
                                <span class="text-red-500 text-sm hidden" id="section_key-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="section_type" class="block text-sm font-medium text-gray-700 mb-1">Bölüm Tipi <span class="text-red-500">*</span></label>
                                <select id="section_type" name="section_type" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="content">İçerik</option>
                                    <option value="image">Görsel</option>
                                    <option value="video">Video</option>
                                    <option value="gallery">Galeri</option>
                                    <option value="slider">Slider</option>
                                </select>
                                <span class="text-red-500 text-sm hidden" id="section_type-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="section_title" class="block text-sm font-medium text-gray-700 mb-1">Başlık</label>
                                <input type="text" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="section_title" name="title">
                                <span class="text-red-500 text-sm hidden" id="section_title-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="section_content" class="block text-sm font-medium text-gray-700 mb-1">İçerik</label>
                                <textarea class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="section_content" name="content" rows="6"></textarea>
                                <span class="text-red-500 text-sm hidden" id="section_content-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="section_order" class="block text-sm font-medium text-gray-700 mb-1">Sıra</label>
                                <input type="number" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="section_order" name="order" value="0">
                                <span class="text-red-500 text-sm hidden" id="section_order-error"></span>
                            </div>

                            <div class="form-group">
                                <div class="flex items-center">
                                    <input type="checkbox" id="section_is_active" name="is_active" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                                    <label for="section_is_active" class="ml-2 block text-sm text-gray-900">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-gray-50 border-t">
                    <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400" data-bs-dismiss="modal">İptal</button>
                    <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" id="saveSection">Kaydet</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var pageId = {{ $page->id }};
        
        $(document).ready(function() {
            // Page form submit
            $('#pageForm').submit(function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: "{{ route('dashboard.pages.update', $page->id) }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.success) {
                            alert('Sayfa başarıyla güncellendi.');
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        if(xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '-error').text(value[0]).removeClass('hidden');
                            });
                        }
                    }
                });
            });

            // Create new section
            $('#createNewSection').click(function() {
                $('#sectionForm')[0].reset();
                $('#section_id').val('');
                $('#sectionModalHeading').text('Yeni Bölüm Ekle');
                $('#sectionModal').modal('show');
            });

            // Edit section
            $(document).on('click', '.edit-section', function() {
                var sectionId = $(this).data('id');
                $.ajax({
                    url: "{{ route('dashboard.pages.sections.edit', ['pageId' => $page->id, 'sectionId' => ':id']) }}".replace(':id', sectionId),
                    type: 'GET',
                    success: function(response) {
                        $('#section_id').val(response.id);
                        $('#section_key').val(response.section_key);
                        $('#section_type').val(response.section_type);
                        $('#section_title').val(response.title);
                        $('#section_content').val(response.content);
                        $('#section_order').val(response.order);
                        $('#section_is_active').prop('checked', response.is_active);
                        $('#sectionModalHeading').text('Bölüm Düzenle');
                        $('#sectionModal').modal('show');
                    }
                });
            });

            // Save section
            $('#saveSection').click(function() {
                var sectionId = $('#section_id').val();
                var url = sectionId 
                    ? "{{ route('dashboard.pages.sections.update', ['pageId' => $page->id, 'sectionId' => ':id']) }}".replace(':id', sectionId)
                    : "{{ route('dashboard.pages.sections.store', $page->id) }}";
                var method = sectionId ? 'POST' : 'POST';

                $.ajax({
                    url: url,
                    type: method,
                    data: $('#sectionForm').serialize(),
                    success: function(response) {
                        if(response.success) {
                            $('#sectionModal').modal('hide');
                            location.reload();
                        }
                    },
                    error: function(xhr) {
                        if(xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#section_' + key + '-error').text(value[0]).removeClass('hidden');
                            });
                        }
                    }
                });
            });

            // Delete section
            $(document).on('click', '.delete-section', function() {
                if(!confirm('Bu bölümü silmek istediğinizden emin misiniz?')) return;
                
                var sectionId = $(this).data('id');
                $.ajax({
                    url: "{{ route('dashboard.pages.sections.destroy', ['pageId' => $page->id, 'sectionId' => ':id']) }}".replace(':id', sectionId),
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success) {
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>

