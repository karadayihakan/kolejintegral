<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Popup Banner Yönetimi') }}
            </h2>
            <button id="createNewPopupBanner" class="btn btn-primary d-flex align-items-center" style="background: #51223a; border: none;">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni Popup Banner
            </button>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <div id="popupBannerAlertMessage" class="alert d-none mb-4" role="alert" style="display: none !important;"></div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="popup-banner-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Görsel</th>
                                    <th>Başlık</th>
                                    <th>Link</th>
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
    <div class="modal fade" id="popupBannerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gray-50 border-b">
                    <h5 class="modal-title text-lg font-semibold" id="popupBannerModalHeading">Yeni Popup Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-6">
                    <form id="popupBannerForm" name="popupBannerForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="popup_banner_id">

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="popup_banner_title" class="form-label">Başlık <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="popup_banner_title" name="title" required>
                                    <span class="text-danger small d-none" id="title-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="popup_banner_link" class="form-label">Link</label>
                                    <input type="text" class="form-control" id="popup_banner_link" name="link" placeholder="https://...">
                                    <span class="text-danger small d-none" id="link-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="popup_banner_background" class="form-label">Görsel</label>
                                    <input type="file" class="form-control" id="popup_banner_background" name="background" accept="image/*">
                                    <div id="popup_banner_background_preview" class="mt-2 d-none">
                                        <img id="popup_banner_background_preview_img" src="" alt="Popup banner önizleme" style="height: 200px; width: 100%; object-fit: cover; border-radius: 0.375rem;">
                                    </div>
                                    <span class="text-danger small d-none" id="background-error"></span>
                                </div>
                            </div>

                            <div class="col-12 d-flex align-items-center">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="popup_banner_is_active" name="is_active">
                                    <label class="form-check-label" for="popup_banner_is_active">
                                        Aktif
                                    </label>
                                    <small class="text-muted d-block mt-1">Not: Bir popup aktif yapıldığında diğer aktif popuplar otomatik olarak pasif yapılacaktır.</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                            <button type="submit" class="btn btn-primary" id="savePopupBannerBtn">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            var table = $('#popup-banner-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.popup-banner.data') }}",
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
                    { data: 'link', name: 'link' },
                    { data: 'is_active_label', name: 'is_active' },
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

            function showPopupBannerAlert(message, type = 'success') {
                var alertDiv = $('#popupBannerAlertMessage');
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

            function clearPopupBannerErrors() {
                $('#popupBannerForm .text-danger').addClass('d-none').text('');
                $('#popupBannerForm .border-danger').removeClass('border-danger');
            }

            $('#createNewPopupBanner').click(function () {
                $('#savePopupBannerBtn').val("create-popup-banner");
                $('#popup_banner_id').val('');
                $('#popupBannerForm').trigger("reset");
                $('#popupBannerModalHeading').html("Yeni Popup Banner");
                $('#popup_banner_background_preview').addClass('d-none');
                $('#popup_banner_is_active').prop('checked', false);
                clearPopupBannerErrors();
                $('#popupBannerModal').modal('show');
            });

            $('body').on('click', '.edit-popup-banner', function () {
                var id = $(this).data('id');
                $.get("{{ route('dashboard.popup-banner.index') }}" + '/' + id + '/edit', function (data) {
                    $('#popupBannerModalHeading').html("Popup Banner Düzenle");
                    $('#savePopupBannerBtn').val("edit-popup-banner");
                    $('#popupBannerModal').modal('show');
                    clearPopupBannerErrors();

                    $('#popup_banner_id').val(data.id);
                    $('#popup_banner_title').val(data.title || '');
                    $('#popup_banner_link').val(data.link || '');
                    $('#popup_banner_is_active').prop('checked', !!data.is_active);

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

                        $('#popup_banner_background_preview_img').attr('src', imgSrc);
                        $('#popup_banner_background_preview').removeClass('d-none');
                    } else {
                        $('#popup_banner_background_preview').addClass('d-none');
                    }
                });
            });

            $('body').on('click', '.delete-popup-banner', function () {
                var id = $(this).data('id');
                if (!confirm('Bu popup banner\'ı silmek istediğinize emin misiniz?')) {
                    return;
                }

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.popup-banner.index') }}" + '/' + id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        table.ajax.reload();
                        showPopupBannerAlert(data.message || 'Popup banner silindi.', 'success');
                    },
                    error: function () {
                        showPopupBannerAlert('Silme işlemi sırasında hata oluştu.', 'danger');
                    }
                });
            });

            $('#popupBannerForm').on('submit', function (e) {
                e.preventDefault();
                clearPopupBannerErrors();

                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.popup-banner.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#popupBannerModal').modal('hide');
                        table.ajax.reload();
                        showPopupBannerAlert(data.message || 'Kayıt başarıyla kaydedildi.', 'success');
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors || {};
                            Object.keys(errors).forEach(function (key) {
                                var errorMsg = errors[key][0];
                                var errorSpan = $('#' + key + '-error');
                                if (errorSpan.length) {
                                    errorSpan.text(errorMsg).removeClass('d-none');
                                    var input = $('#popup_banner_' + key);
                                    if (input.length) {
                                        input.addClass('border-danger');
                                    }
                                }
                            });
                        } else {
                            showPopupBannerAlert('Kayıt sırasında beklenmeyen bir hata oluştu.', 'danger');
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>
