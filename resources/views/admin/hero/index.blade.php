<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Hero Alanı Yönetimi') }}
            </h2>
            <button id="createNewHero" class="btn btn-primary d-flex align-items-center" style="background: #51223a; border: none;">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni Hero Slaytı
            </button>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <div id="heroAlertMessage" class="alert d-none mb-4" role="alert" style="display: none !important;"></div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="hero-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Arka Plan</th>
                                    <th>Başlık</th>
                                    <th>Alt Başlık</th>
                                    <th>Buton</th>
                                    <th>Sıra</th>
                                    <th>Durum</th>
                                    <th class="text-center">İşlemler</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="heroModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gray-50 border-b">
                    <h5 class="modal-title text-lg font-semibold" id="heroModalHeading">Yeni Hero Slaytı</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-6">
                    <form id="heroForm" name="heroForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="hero_id">

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="hero_title" class="form-label">Başlık <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="hero_title" name="title" required>
                                    <span class="text-danger small d-none" id="title-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="hero_subtitle" class="form-label">Alt Başlık</label>
                                    <textarea class="form-control" id="hero_subtitle" name="subtitle" rows="2"></textarea>
                                    <span class="text-danger small d-none" id="subtitle-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="hero_button_text" class="form-label">Buton Metni</label>
                                    <input type="text" class="form-control" id="hero_button_text" name="button_text">
                                    <span class="text-danger small d-none" id="button_text-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-8">
                                <div class="mb-3">
                                    <label for="hero_button_url" class="form-label">Buton Linki</label>
                                    <input type="text" class="form-control" id="hero_button_url" name="button_url" placeholder="https://...">
                                    <span class="text-danger small d-none" id="button_url-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="hero_order" class="form-label">Sıra</label>
                                    <input type="number" class="form-control" id="hero_order" name="order" value="0" min="0">
                                    <span class="text-danger small d-none" id="order-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 d-flex align-items-center">
                                <div class="form-check mb-3 mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="hero_is_active" name="is_active" checked>
                                    <label class="form-check-label" for="hero_is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="hero_background" class="form-label">Arka Plan Görseli</label>
                                    <input type="file" class="form-control" id="hero_background" name="background" accept="image/*">
                                    <div id="hero_background_preview" class="mt-2 d-none">
                                        <img id="hero_background_preview_img" src="" alt="Hero önizleme" style="height: 80px; width: 100%; object-fit: cover; border-radius: 0.375rem;">
                                    </div>
                                    <small class="text-muted d-block mt-1">Boş bırakılırsa varsayılan hero görselleri kullanılabilir.</small>
                                    <span class="text-danger small d-none" id="background-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                            <button type="submit" class="btn btn-primary" id="saveHeroBtn">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            var table = $('#hero-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.hero-sliders.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { 
                        data: 'background_preview', 
                        name: 'background_preview',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    { data: 'title', name: 'title' },
                    { data: 'subtitle', name: 'subtitle' },
                    { data: 'button_text', name: 'button_text' },
                    { data: 'order', name: 'order' },
                    { data: 'is_active_label', name: 'is_active' },
                    { 
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                ],
                order: [[5, 'asc']]
            });

            function showHeroAlert(message, type = 'success') {
                var alertDiv = $('#heroAlertMessage');
                alertDiv.removeClass('d-none alert-success alert-danger');
                alertDiv.addClass(type === 'success' ? 'alert-success' : 'alert-danger');
                alertDiv.html(message);
                alertDiv.css('display', 'block');
                setTimeout(function() {
                    alertDiv.fadeOut(function() {
                        alertDiv.addClass('d-none');
                    });
                }, 5000);
            }

            function clearHeroErrors() {
                $('#heroForm .text-danger').addClass('d-none').text('');
                $('#heroForm .border-danger').removeClass('border-danger');
            }

            $('#createNewHero').click(function () {
                $('#saveHeroBtn').val("create-hero");
                $('#hero_id').val('');
                $('#heroForm').trigger("reset");
                $('#heroModalHeading').html("Yeni Hero Slaytı");
                $('#hero_background_preview').addClass('d-none');
                clearHeroErrors();
                $('#heroModal').modal('show');
            });

            $('body').on('click', '.edit-hero', function () {
                var id = $(this).data('id');
                $.get("{{ route('dashboard.hero-sliders.index') }}" + '/' + id + '/edit', function (data) {
                    $('#heroModalHeading').html("Hero Slaytını Düzenle");
                    $('#saveHeroBtn').val("edit-hero");
                    $('#heroModal').modal('show');
                    clearHeroErrors();

                    $('#hero_id').val(data.id);
                    $('#hero_title').val(data.title || '');
                    $('#hero_subtitle').val(data.subtitle || '');
                    $('#hero_button_text').val(data.button_text || '');
                    $('#hero_button_url').val(data.button_url || '');
                    $('#hero_order').val(data.order || 0);
                    $('#hero_is_active').prop('checked', !!data.is_active);

                    if (data.background_image) {
                        var path = data.background_image || '';
                        var imgSrc = '';

                        if (path.startsWith('http://') || path.startsWith('https://')) {
                            imgSrc = path;
                        } else if (path.startsWith('storage/')) {
                            imgSrc = '{{ asset('storage') }}/' + path.replace(/^storage\//, '');
                        } else if (path.startsWith('/storage/')) {
                            imgSrc = path;
                        } else if (path.startsWith('images/')) {
                            imgSrc = '/' + path.replace(/^\/?/, '');
                        } else if (path.startsWith('/images/')) {
                            imgSrc = path;
                        } else {
                            imgSrc = '{{ asset('storage') }}/' + path;
                        }

                        $('#hero_background_preview_img').attr('src', imgSrc);
                        $('#hero_background_preview').removeClass('d-none');
                    } else {
                        $('#hero_background_preview').addClass('d-none');
                    }
                });
            });

            $('body').on('click', '.delete-hero', function () {
                var id = $(this).data('id');
                if (!confirm('Bu hero slaytını silmek istediğinize emin misiniz?')) {
                    return;
                }

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.hero-sliders.index') }}" + '/delete/' + id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        table.ajax.reload();
                        showHeroAlert(data.message || 'Slayt silindi.', 'success');
                    },
                    error: function () {
                        showHeroAlert('Silme işlemi sırasında hata oluştu.', 'danger');
                    }
                });
            });

            $('#heroForm').on('submit', function (e) {
                e.preventDefault();
                clearHeroErrors();

                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.hero-sliders.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#heroModal').modal('hide');
                        table.ajax.reload();
                        showHeroAlert(data.message || 'Kayıt başarıyla kaydedildi.', 'success');
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors || {};
                            Object.keys(errors).forEach(function (key) {
                                var errorMsg = errors[key][0];
                                var errorSpan = $('#' + key + '-error');
                                if (errorSpan.length) {
                                    errorSpan.text(errorMsg).removeClass('d-none');
                                    var input = $('#hero_' + key);
                                    if (input.length) {
                                        input.addClass('border-danger');
                                    }
                                }
                            });
                        } else {
                            showHeroAlert('Kayıt sırasında beklenmeyen bir hata oluştu.', 'danger');
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>


