<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Pikajintegral Yönetimi') }}
            </h2>
            <button id="createNewMagazine" class="btn btn-primary d-flex align-items-center">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni Dergi Ekle
            </button>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <div id="alertMessage" class="alert d-none mb-4" role="alert" style="display: none !important;"></div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="magazines-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Görsel</th>
                                    <th>Dergi Adı</th>
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
                    <h5 class="modal-title fw-bold" id="modelHeading">Yeni Dergi Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="magazineForm" name="magazineForm" enctype="multipart/form-data">
                        <input type="hidden" name="magazine_id" id="magazine_id">
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Dergi Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <span class="text-danger small d-none" id="name-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="pdf" class="form-label">PDF Dosyası</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
                                    <small class="text-muted">Maksimum 10MB</small>
                                    <div id="pdf-preview" class="mt-2"></div>
                                    <span class="text-danger small d-none" id="pdf-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Kapak Görseli</label>
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*">
                                    <small class="text-muted">Maksimum 2MB (JPG, PNG)</small>
                                    <div id="thumbnail-preview" class="mt-2"></div>
                                    <span class="text-danger small d-none" id="thumbnail-error"></span>
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
            var table = $('#magazines-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.magazines.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'thumbnail_preview', name: 'thumbnail_preview', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
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

            // Thumbnail preview
            $('#thumbnail').on('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnail-preview').html('<img src="' + e.target.result + '" style="max-width: 200px; max-height: 250px; border-radius: 5px;">');
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#createNewMagazine').click(function () {
                $('#saveBtn').val("create-magazine");
                $('#magazine_id').val('');
                $('#magazineForm').trigger("reset");
                $('#thumbnail-preview').html('');
                $('#pdf-preview').html('');
                $('#modelHeading').html("Yeni Dergi Ekle");
                clearErrors();
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.edit', function () {
                var magazine_id = $(this).data('id');
                $.get("{{ route('dashboard.magazines.index') }}" + '/' + magazine_id + '/edit', function (data) {
                    $('#modelHeading').html("Dergi Düzenle");
                    $('#saveBtn').val("edit-magazine");
                    $('#ajaxModel').modal('show');
                    clearErrors();
                    
                    $('#magazine_id').val(data.id);
                    $('#name').val(data.name);
                    
                    if (data.thumbnail_path) {
                        $('#thumbnail-preview').html('<img src="{{ asset("storage") }}/' + data.thumbnail_path + '" style="max-width: 200px; max-height: 250px; border-radius: 5px;">');
                    }
                    if (data.pdf_path) {
                        $('#pdf-preview').html('<a href="{{ asset("storage") }}/' + data.pdf_path + '" target="_blank" class="btn btn-sm btn-outline-primary">Mevcut PDF\'i Görüntüle</a>');
                    }
                }).fail(function() {
                    showAlert('Dergi bilgileri yüklenirken bir hata oluştu!', 'error');
                });
            });

            $('#magazineForm').on('submit', function(e) {
                e.preventDefault();
                var $saveBtn = $('#saveBtn');
                var originalText = $saveBtn.html();
                $saveBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Kaydediliyor...');
                clearErrors();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('dashboard.magazines.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    success: function (data) {
                        showAlert('Dergi başarıyla kaydedildi!', 'success');
                        $('#magazineForm').trigger("reset");
                        $('#thumbnail-preview').html('');
                        $('#pdf-preview').html('');
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
                var magazine_id = $(this).data("id");
                var magazine_name = $(this).data("title") || 'bu dergi';
                
                if(confirm('"' + magazine_name + '" dergisini silmek istediğinizden emin misiniz? Bu işlem geri alınamaz!')){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.magazines.index') }}" + '/' + magazine_id,
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                        success: function (data) {
                            showAlert('Dergi başarıyla silindi!', 'success');
                            table.draw();
                        },
                        error: function (xhr) {
                            showAlert('Dergi silinirken bir hata oluştu!', 'error');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>

