<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Kayıt PDF Yönetimi') }}
            </h2>
            <button id="createNewPdf" class="btn btn-primary d-flex align-items-center">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni PDF Ekle
            </button>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <div id="alertMessage" class="alert d-none mb-4" role="alert" style="display: none !important;"></div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="pdfs-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Başlık</th>
                                    <th>PDF</th>
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
    <div class="modal fade" id="ajaxModel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modelHeading">Yeni PDF Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pdfForm" name="pdfForm" enctype="multipart/form-data">
                        <input type="hidden" name="pdf_id" id="pdf_id">
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Başlık <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                    <span class="text-danger small d-none" id="title-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="pdf" class="form-label">PDF Dosyası <span class="text-danger" id="pdf-required">*</span></label>
                                    <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
                                    <small class="text-muted">Maksimum 10MB</small>
                                    <div id="pdf-preview" class="mt-2"></div>
                                    <span class="text-danger small d-none" id="pdf-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Sıra</label>
                                    <input type="number" class="form-control" id="order" name="order" value="0" min="0">
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Durum</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                        <label class="form-check-label" for="is_active">Aktif</label>
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

    <script type="text/javascript">
        $(function () {
            var table = $('#pdfs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.register-pdfs.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'pdf_link', name: 'pdf_link', orderable: false, searchable: false},
                    {data: 'order', name: 'order'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            function showAlert(message, type) {
                var alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                $('#alertMessage').removeClass('d-none alert-success alert-danger').addClass(alertClass).html(message).fadeIn();
                setTimeout(function() {
                    $('#alertMessage').fadeOut();
                }, 3000);
            }

            function clearErrors() {
                $('.text-danger').addClass('d-none');
                $('.border-danger').removeClass('border-danger');
            }

            $('#createNewPdf').click(function () {
                $('#saveBtn').val("create-pdf");
                $('#pdf_id').val('');
                $('#pdfForm').trigger("reset");
                $('#is_active').prop('checked', true);
                $('#pdf-required').show();
                $('#modelHeading').html("Yeni PDF Ekle");
                clearErrors();
                $('#pdf-preview').empty();
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.edit', function () {
                var pdf_id = $(this).data('id');
                $.get("{{ route('dashboard.register-pdfs.index') }}" + '/' + pdf_id + '/edit', function (data) {
                    $('#modelHeading').html("PDF Düzenle");
                    $('#saveBtn').val("edit-pdf");
                    $('#ajaxModel').modal('show');
                    clearErrors();
                    
                    $('#pdf_id').val(data.id);
                    $('#title').val(data.title);
                    $('#order').val(data.order);
                    $('#is_active').prop('checked', data.is_active);
                    $('#pdf-required').hide();
                    
                    if (data.pdf_path) {
                        var pdfUrl = data.pdf_path;
                        if (pdfUrl.startsWith('storage/')) {
                            pdfUrl = '{{ asset("") }}' + pdfUrl;
                        } else if (!pdfUrl.startsWith('http') && !pdfUrl.startsWith('/')) {
                            pdfUrl = '{{ asset("storage/") }}/' + pdfUrl;
                        }
                        $('#pdf-preview').html('<a href="' + pdfUrl + '" target="_blank" class="btn btn-sm btn-info">Mevcut PDF\'i Görüntüle</a>');
                    }
                }).fail(function() {
                    showAlert('PDF bilgileri yüklenirken bir hata oluştu!', 'error');
                });
            });

            $('#pdfForm').on('submit', function(e) {
                e.preventDefault();
                var $saveBtn = $('#saveBtn');
                var originalText = $saveBtn.html();
                $saveBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Kaydediliyor...');
                clearErrors();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('dashboard.register-pdfs.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    success: function (data) {
                        showAlert('PDF başarıyla kaydedildi!', 'success');
                        $('#pdfForm').trigger("reset");
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
                var pdf_id = $(this).data("id");
                var pdf_title = $(this).data("title") || 'bu PDF';
                
                if(confirm('"' + pdf_title + '" PDF\'ini silmek istediğinizden emin misiniz? Bu işlem geri alınamaz!')){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.register-pdfs.index') }}" + '/' + pdf_id,
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                        success: function (data) {
                            showAlert('PDF başarıyla silindi!', 'success');
                            table.draw();
                        },
                        error: function (xhr) {
                            showAlert('PDF silinirken bir hata oluştu!', 'error');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>

