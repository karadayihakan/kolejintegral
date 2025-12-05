<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Sayfa Yönetimi') }}
            </h2>
            <button id="createNewPage" class="btn btn-primary d-flex align-items-center">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni Sayfa Ekle
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
                        <table id="pages-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Başlık</th>
                                    <th>Slug</th>
                                    <th>Şablon</th>
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
                    <h5 class="modal-title fw-bold" id="modelHeading">Yeni Sayfa Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pageForm" name="pageForm">
                        <input type="hidden" name="page_id" id="page_id">
                        
                        <div class="row g-3">
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
                                    <small class="text-muted">URL için kullanılacak benzersiz tanımlayıcı (örn: hakkimizda)</small>
                                    <span class="text-danger small d-none" id="slug-error"></span>
                                </div>
                            </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="description" class="form-label mb-2">İçerik</label>
                                        <div id="editor-container">
                                            <textarea class="form-control" id="description" name="description" rows="15"></textarea>
                                        </div>
                                        <small class="text-muted">Sayfa içeriğini buraya yazabilirsiniz. PDF dosyaları için link butonunu kullanarak dosya yükleme sayfasına gidebilir veya mevcut PDF linklerini ekleyebilirsiniz.</small>
                                        <div class="mt-2">
                                            <a href="{{ route('dashboard.pages.upload.page') }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fa-solid fa-file-pdf"></i> PDF Yükle
                                            </a>
                                            <small class="text-muted ms-2">PDF yükledikten sonra link butonunu kullanarak ekleyebilirsiniz.</small>
                                        </div>
                                        <span class="text-danger small d-none" id="description-error"></span>
                                    </div>
                                </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="template" class="form-label">Şablon</label>
                                    <select id="template" name="template" class="form-select">
                                        <option value="default">Varsayılan</option>
                                        <option value="about">Hakkımızda</option>
                                        <option value="register">Kayıt</option>
                                        <option value="legal">Yasal</option>
                                    </select>
                                    <span class="text-danger small d-none" id="template-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <div class="form-check mt-4">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                        <label class="form-check-label" for="is_active">
                                            Aktif
                                        </label>
                                    </div>
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

    <!-- FontAwesome for PDF icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- TinyMCE 6 - Community (API key gerektirmez) -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        $(function () {
            function initDescriptionEditor() {
                tinymce.remove('#description');
                if (!document.querySelector('#description')) return;

                tinymce.init({
                    selector: '#description',
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

            // Modal açıldığında editor'ü başlat
            $('#ajaxModel').on('shown.bs.modal', function () {
                setTimeout(function () {
                    initDescriptionEditor();
                }, 50);
            });
            var table = $('#pages-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.pages.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'slug', name: 'slug' },
                    { data: 'template', name: 'template' },
                    { data: 'status', name: 'status', orderable: false },
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
                if (!$('#page_id').val()) {
                    var slug = $(this).val().toLowerCase()
                        .replace(/ğ/g, 'g').replace(/ü/g, 'u').replace(/ş/g, 's')
                        .replace(/ı/g, 'i').replace(/ö/g, 'o').replace(/ç/g, 'c')
                        .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
                    $('#slug').val(slug);
                }
            });

            $('#createNewPage').click(function () {
                $('#saveBtn').val("create-page");
                $('#page_id').val('');
                $('#pageForm').trigger("reset");
                $('#is_active').prop('checked', true);
                $('#modelHeading').html("Yeni Sayfa Ekle");
                clearErrors();

                // Editor container'ı sıfırla
                var container = $('#editor-container');
                container.html('<textarea class="form-control" id="description" name="description" rows="15"></textarea>');
                
                $('#ajaxModel').modal('show');
            });

                $('body').on('click', '.edit', function () {
                    var page_id = $(this).data('id');
                    
                    $.get("{{ route('dashboard.pages.index') }}" + '/' + page_id + '/edit', function (data) {
                        $('#modelHeading').html("Sayfa Düzenle");
                        $('#saveBtn').val("edit-page");
                        clearErrors();
                        
                        $('#page_id').val(data.id);
                        $('#title').val(data.title);
                        $('#slug').val(data.slug);
                        $('#template').val(data.template || 'default');
                        $('#is_active').prop('checked', data.is_active);
                        
                        // VERİTABANINDAN GELEN İÇERİĞİ AL
                        var dbContent = data.description || '';
                        
                        // Editor container'ı sıfırla
                        var container = $('#editor-container');
                        container.html('<textarea class="form-control" id="description" name="description" rows="15"></textarea>');
                        
                        // VERİTABANINDAN GELEN İÇERİĞİ TEXTAREA'YA YAZ
                        $('#description').val(dbContent);
                        
                        $('#ajaxModel').modal('show');
                    }).fail(function(xhr) {
                        console.error('AJAX hatası:', xhr);
                        showAlert('Sayfa bilgileri yüklenirken bir hata oluştu!', 'error');
                    });
                });

            $('#pageForm').on('submit', function(e) {
                e.preventDefault();
                var $saveBtn = $('#saveBtn');
                var originalText = $saveBtn.html();
                $saveBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Kaydediliyor...');
                clearErrors();

                // is_active checkbox'ını formData'ya ekle
                if (tinymce.get('description')) {
                    tinymce.get('description').save(); // textarea'yı güncelle
                }

                var formData = $(this).serialize();
                if ($('#is_active').is(':checked')) {
                    formData += '&is_active=1';
                } else {
                    formData += '&is_active=0';
                }

                $.ajax({
                    url: "{{ route('dashboard.pages.store') }}",
                    type: "POST",
                    data: formData,
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    success: function (data) {
                        showAlert('Sayfa başarıyla kaydedildi!', 'success');
                        $('#pageForm').trigger("reset");
                        // Editör içeriğini temizle
                        if (tinymce.get('description')) {
                            tinymce.get('description').setContent('');
                        }
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
                var page_id = $(this).data("id");
                var page_title = $(this).data("title") || 'bu sayfa';
                
                if(confirm('"' + page_title + '" sayfasını silmek istediğinizden emin misiniz? Bu işlem geri alınamaz!')){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.pages.index') }}" + '/' + page_id,
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                        success: function (data) {
                            showAlert('Sayfa başarıyla silindi!', 'success');
                            table.draw();
                        },
                        error: function (xhr) {
                            showAlert('Sayfa silinirken bir hata oluştu!', 'error');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
