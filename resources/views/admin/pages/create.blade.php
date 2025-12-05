<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Yeni Sayfa Oluştur') }}
            </h2>
            <a href="{{ route('dashboard.pages.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Geri Dön
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form id="pageForm" name="pageForm">
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Başlık <span class="text-red-500">*</span></label>
                                <input type="text" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" name="title" required>
                                <span class="text-red-500 text-sm hidden" id="title-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                                <input type="text" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="slug" name="slug">
                                <p class="text-xs text-gray-500 mt-1">Boş bırakılırsa başlıktan otomatik oluşturulur</p>
                                <span class="text-red-500 text-sm hidden" id="slug-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Açıklama</label>
                                <textarea class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="description" name="description" rows="3"></textarea>
                                <span class="text-red-500 text-sm hidden" id="description-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="template" class="block text-sm font-medium text-gray-700 mb-1">Şablon</label>
                                <select id="template" name="template" class="form-control w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="default">Varsayılan</option>
                                    <option value="homepage">Ana Sayfa</option>
                                    <option value="about">Hakkımızda</option>
                                    <option value="contact">İletişim</option>
                                    <option value="custom">Özel</option>
                                </select>
                                <span class="text-red-500 text-sm hidden" id="template-error"></span>
                            </div>

                            <div class="form-group">
                                <div class="flex items-center">
                                    <input type="checkbox" id="is_active" name="is_active" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                                    <label for="is_active" class="ml-2 block text-sm text-gray-900">Aktif</label>
                                </div>
                            </div>

                            <div class="flex justify-end space-x-3 pt-4">
                                <a href="{{ route('dashboard.pages.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">İptal</a>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#pageForm').submit(function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: "{{ route('dashboard.pages.store') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if(response.success) {
                            window.location.href = "{{ route('dashboard.pages.index') }}";
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
        });
    </script>
</x-app-layout>

