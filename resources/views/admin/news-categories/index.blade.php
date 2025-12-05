<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Haber Kategorileri') }}
            </h2>
            <button id="createNewCategory" class="btn btn-primary d-flex align-items-center">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni Kategori Ekle
            </button>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <!-- Başarı/Hata Mesajları -->
            <div id="alertMessage" class="alert d-none mb-4" role="alert" style="display: none !important;"></div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="categories-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori Adı</th>
                                    <th>Slug</th>
                                    <th>Sıra</th>
                                    <th>Haber Sayısı</th>
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
    <div class="modal fade" id="ajaxModel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modelHeading">Yeni Kategori Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm" name="categoryForm">
                        <input type="hidden" name="category_id" id="category_id">
                        
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Sıra</label>
                                    <input type="number" class="form-control" id="order" name="order" value="0" min="0">
                                    <small class="text-muted">Kategorilerin sıralaması için kullanılır</small>
                                    <span class="text-danger small d-none" id="order-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Kategori Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <span class="text-danger small d-none" id="name-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" required>
                                    <small class="text-muted">URL için kullanılacak benzersiz tanımlayıcı</small>
                                    <span class="text-danger small d-none" id="slug-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
                                    <small class="text-muted">Pasif kategoriler haber ekleme formunda görünmez</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                            <button type="submit" class="btn btn-primary" id="saveBtn">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            var table = $('#categories-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.news-categories.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'order', name: 'order' },
                    { data: 'news_count', name: 'news_count', orderable: false },
                    { data: 'status', name: 'status', orderable: false },
                    { 
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                ],
                order: [[4, 'asc'], [1, 'asc']]
            });

            function showAlert(message, type = 'success') {
                var alertDiv = $('#alertMessage');
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

            function clearErrors() {
                $('.text-danger').addClass('d-none').text('');
                $('.border-danger').removeClass('border-danger');
            }

            // Slug otomatik oluştur
            $('#name').on('input', function() {
                if (!$('#category_id').val()) {
                    var slug = $(this).val().toLowerCase()
                        .replace(/ğ/g, 'g').replace(/ü/g, 'u').replace(/ş/g, 's')
                        .replace(/ı/g, 'i').replace(/ö/g, 'o').replace(/ç/g, 'c')
                        .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
                    $('#slug').val(slug);
                }
            });

            $('#createNewCategory').click(function () {
                $('#saveBtn').val("create-category");
                $('#category_id').val('');
                $('#categoryForm').trigger("reset");
                $('#is_active').prop('checked', true);
                $('#modelHeading').html("Yeni Kategori Ekle");
                clearErrors();
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.edit', function () {
                var category_id = $(this).data('id');
                $.get("{{ route('dashboard.news-categories.index') }}" + '/' + category_id + '/edit', function (data) {
                    $('#modelHeading').html("Kategori Düzenle");
                    $('#saveBtn').val("edit-category");
                    $('#ajaxModel').modal('show');
                    clearErrors();
                    
                    $('#category_id').val(data.id);
                    $('#name').val(data.name);
                    $('#slug').val(data.slug);
                    $('#order').val(data.order || 0);
                    $('#is_active').prop('checked', data.is_active);
                }).fail(function() {
                    showAlert('Kategori bilgileri yüklenirken bir hata oluştu!', 'error');
                });
            });

            $('#categoryForm').on('submit', function(e) {
                e.preventDefault();
                var $saveBtn = $('#saveBtn');
                var originalText = $saveBtn.html();
                $saveBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Kaydediliyor...');
                clearErrors();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('dashboard.news-categories.store') }}",
                    type: "POST",
                    data: formData,
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    success: function (data) {
                        showAlert('Kategori başarıyla kaydedildi!', 'success');
                        $('#categoryForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '-error').removeClass('d-none').text(value[0]);
                                $('#' + key).addClass('border-danger');
                            });
                            showAlert('Lütfen form hatalarını düzeltin!', 'error');
                        } else {
                            showAlert('Bir hata oluştu: ' + (xhr.responseJSON?.message || 'Bilinmeyen hata'), 'error');
                        }
                    },
                    complete: function() {
                        $saveBtn.prop('disabled', false).html(originalText);
                    }
                });
            });

            $('body').on('click', '.delete', function () {
                var category_id = $(this).data("id");
                var category_name = $(this).data("name") || 'bu kategori';
                
                if(confirm('"' + category_name + '" kategorisini silmek istediğinizden emin misiniz? Bu işlem geri alınamaz!')){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.news-categories.index') }}" + '/' + category_id,
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                        success: function (data) {
                            showAlert('Kategori başarıyla silindi!', 'success');
                            table.draw();
                        },
                        error: function (xhr) {
                            var errorMsg = xhr.responseJSON?.error || 'Kategori silinirken bir hata oluştu!';
                            showAlert(errorMsg, 'error');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>

