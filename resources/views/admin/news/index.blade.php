<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Haber Yönetimi') }}
            </h2>
            <button id="createNewNews" class="btn btn-primary d-flex align-items-center">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Yeni Haber Ekle
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
                        <table id="news-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Görsel</th>
                                    <th>Başlık</th>
                                    <th>Birim</th>
                                    <th>Kategori</th>
                                    <th>Durum</th>
                                    <th>Yayın Tarihi</th>
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
                <div class="modal-header bg-gray-50 border-b">
                    <h5 class="modal-title text-lg font-semibold" id="modelHeading">Yeni Haber Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-6">
                    <form id="newsForm" name="newsForm" enctype="multipart/form-data">
                        <input type="hidden" name="news_id" id="news_id">
                        
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="branch_id" class="form-label">Birim</label>
                                    <select id="branch_id" name="branch_id" class="form-select">
                                        <option value="">Genel (Birim Seçilmedi)</option>
                                        @foreach($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted">Haberin hangi birime ait olduğunu seçin</small>
                                    <span class="text-danger small d-none" id="branch_id-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="news_category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select id="news_category_id" name="news_category_id" class="form-select" required>
                                    <option value="">Seçiniz</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                    <span class="text-danger small d-none" id="news_category_id-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Başlık <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                    <span class="text-danger small d-none" id="title-error"></span>
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
                                    <label for="content" class="form-label">İçerik <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="content" name="content" rows="12" required></textarea>
                                    <span class="text-danger small d-none" id="content-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="image_path" class="form-label">Görsel</label>
                                    <input type="file" class="form-control" id="image_path" name="image_path" accept="image/*">
                                    <div id="image-preview" class="mt-2 d-none">
                                        <img id="image-preview-img" src="" alt="Görsel önizleme" style="height: 200px; width: 100%; object-fit: cover; border-radius: 0.375rem;">
                                    </div>
                                    <span class="text-danger small d-none" id="image_path-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Yayın Tarihi</label>
                                    <input type="datetime-local" class="form-control" id="published_at" name="published_at">
                                    <small class="text-muted">Boş bırakılırsa taslak olarak kaydedilir</small>
                                    <span class="text-danger small d-none" id="published_at-error"></span>
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

    <!-- TinyMCE 6 - Haber İçeriği Editörü -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        $(function () {
            function initNewsEditor() {
                tinymce.remove('#content');
                if (!document.querySelector('#content')) return;

                tinymce.init({
                    selector: '#content',
                    height: 450,
                    menubar: 'file edit view insert format tools table help',
                    branding: false,
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
                        'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'help', 'wordcount'
                    ],
                    toolbar: 'undo redo | blocks | ' +
                             'bold italic underline forecolor backcolor | ' +
                             'alignleft aligncenter alignright alignjustify | ' +
                             'bullist numlist outdent indent | ' +
                             'link image media table | removeformat | code fullscreen | help',
                    block_formats: 'Paragraf=p; Başlık 1=h1; Başlık 2=h2; Başlık 3=h3',
                    link_default_target: '_blank',
                    image_caption: true,
                    toolbar_mode: 'sliding'
                });
            }

            // Modal açıldığında editörü başlat
            $('#ajaxModel').on('shown.bs.modal', function () {
                setTimeout(function () {
                    initNewsEditor();
                }, 50);
            });
            var table = $('#news-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.news.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { 
                        data: 'image_preview', 
                        name: 'image_preview', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                    { data: 'title', name: 'title' },
                    { data: 'branch_name', name: 'branch_name', orderable: false },
                    { data: 'category_name', name: 'category_name', orderable: false },
                    { data: 'status', name: 'status', orderable: false },
                    { data: 'published_date', name: 'published_at' },
                    { 
                        data: 'action', 
                        name: 'action', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                ],
                order: [[0, 'desc']]
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
            $('#title').on('input', function() {
                if (!$('#news_id').val()) {
                    var slug = $(this).val().toLowerCase()
                        .replace(/ğ/g, 'g').replace(/ü/g, 'u').replace(/ş/g, 's')
                        .replace(/ı/g, 'i').replace(/ö/g, 'o').replace(/ç/g, 'c')
                        .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
                    $('#slug').val(slug);
                }
            });

            $('#createNewNews').click(function () {
                $('#saveBtn').val("create-news");
                $('#news_id').val('');
                $('#newsForm').trigger("reset");
                $('#branch_id').val('');
                $('#news_category_id').val('');
                $('#modelHeading').html("Yeni Haber Ekle");
                $('#image-preview').addClass('d-none');
                clearErrors();
                $('#ajaxModel').modal('show');
                // İçerik editörünü sıfırla
                setTimeout(function () {
                    if (tinymce.get('content')) {
                        tinymce.get('content').setContent('');
                    }
                }, 100);
            });

            $('body').on('click', '.edit', function () {
                var news_id = $(this).data('id');
                $.get("{{ route('dashboard.news.index') }}" + '/' + news_id + '/edit', function (data) {
                    $('#modelHeading').html("Haber Düzenle");
                    $('#saveBtn').val("edit-news");
                    $('#ajaxModel').modal('show');
                    clearErrors();
                    
                    $('#news_id').val(data.id);
                    $('#branch_id').val(data.branch_id || '');
                    $('#news_category_id').val(data.news_category_id);
                    $('#title').val(data.title);
                    $('#slug').val(data.slug);
                    $('#content').val(data.content);
                    
                    if (data.published_at) {
                        var publishedDate = new Date(data.published_at);
                        var formattedDate = publishedDate.toISOString().slice(0, 16);
                        $('#published_at').val(formattedDate);
                    } else {
                        $('#published_at').val('');
                    }
                    
                    // Görsel önizleme
                    if (data.image_path) {
                        var imgPath = data.image_path.startsWith('http') ? data.image_path : 
                                     (data.image_path.startsWith('storage/') ? '/' + data.image_path : 
                                     (data.image_path.startsWith('images/') ? '/' + data.image_path : '/storage/' + data.image_path));
                        $('#image-preview-img').attr('src', imgPath);
                        $('#image-preview').removeClass('d-none');
                    } else {
                        $('#image-preview').addClass('d-none');
                    }
                }).fail(function() {
                    showAlert('Haber bilgileri yüklenirken bir hata oluştu!', 'error');
                });
            });

            // Dosya önizleme
            $('#image_path').change(function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview-img').attr('src', e.target.result);
                        $('#image-preview').removeClass('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            $('#newsForm').on('submit', function(e) {
                e.preventDefault();
                var $saveBtn = $('#saveBtn');
                var originalText = $saveBtn.html();
                $saveBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm mr-2"></span>Kaydediliyor...');
                clearErrors();

                // TinyMCE içeriğini textarea'ya kaydet
                if (tinymce.get('content')) {
                    tinymce.get('content').save();
                }

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('dashboard.news.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    success: function (data) {
                        showAlert('Haber başarıyla kaydedildi!', 'success');
                        $('#newsForm').trigger("reset");
                        // Editör içeriğini temizle
                        if (tinymce.get('content')) {
                            tinymce.get('content').setContent('');
                        }
                        $('#ajaxModel').modal('hide');
                        $('#image-preview').addClass('d-none');
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
                var news_id = $(this).data("id");
                var news_title = $(this).data("title") || 'bu haber';
                
                if(confirm('"' + news_title + '" haberini silmek istediğinizden emin misiniz? Bu işlem geri alınamaz!')){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.news.index') }}" + '/' + news_id,
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                        success: function (data) {
                            showAlert('Haber başarıyla silindi!', 'success');
                            table.draw();
                        },
                        error: function (xhr) {
                            showAlert('Haber silinirken bir hata oluştu!', 'error');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>

