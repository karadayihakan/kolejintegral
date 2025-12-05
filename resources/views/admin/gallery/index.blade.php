<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Keşfet (Galeri) Yönetimi') }}
            </h2>
            <button id="createNewGallery" class="btn btn-primary d-flex align-items-center" style="background: #51223a; border: none;">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni Keşfet Öğesi
            </button>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <div id="alertMessage" class="alert d-none mb-4" role="alert" style="display: none !important;"></div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="gallery-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Önizleme</th>
                                    <th>Başlık</th>
                                    <th>Kapsam</th>
                                    <th>Tip</th>
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
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gray-50 border-b">
                    <h5 class="modal-title text-lg font-semibold" id="galleryModalHeading">Yeni Keşfet Öğesi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-6">
                    <form id="galleryForm" name="galleryForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="gallery_id">

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Başlık</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                    <span class="text-danger small d-none" id="title-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="branch_id" class="form-label">Kapsam / Birim</label>
                                    <select class="form-select" id="branch_id" name="branch_id">
                                        <option value="">Genel (Tüm site)</option>
                                        @foreach(\App\Models\Branch::orderBy('name')->get() as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted d-block mt-1">Boş bırakılırsa genel galeri öğesi olur.</small>
                                    <span class="text-danger small d-none" id="branch_id-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tip</label>
                                    <select class="form-select" id="type" name="type">
                                        <option value="photo">Görsel</option>
                                        <option value="video">Video</option>
                                    </select>
                                    <span class="text-danger small d-none" id="type-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Sıra</label>
                                    <input type="number" class="form-control" id="order" name="order" value="0" min="0">
                                    <span class="text-danger small d-none" id="order-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 col-md-6" id="image-wrapper">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Görsel</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    <div id="image-preview" class="mt-2 d-none">
                                        <img id="image-preview-img" src="" alt="Önizleme" style="height: 80px; width: 80px; object-fit: cover; border-radius: 0.375rem;">
                                    </div>
                                    <span class="text-danger small d-none" id="image-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6" id="video-wrapper" style="display:none;">
                                <div class="mb-3">
                                    <label for="video_url" class="form-label">Video URL</label>
                                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="YouTube veya başka bir video URL">
                                    <small class="text-muted d-block mt-1">YouTube linki veya embed URL kullanabilirsiniz.</small>
                                    <span class="text-danger small d-none" id="video_url-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                            <button type="submit" class="btn btn-primary" id="saveGalleryBtn">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            var table = $('#gallery-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.gallery.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { 
                        data: 'preview', 
                        name: 'preview',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    { data: 'title', name: 'title' },
                    { data: 'branch_name', name: 'branch.name' },
                    { data: 'type_label', name: 'type' },
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

            function toggleTypeFields() {
                var type = $('#type').val();
                if (type === 'video') {
                    $('#video-wrapper').show();
                    $('#image-wrapper').hide();
                } else {
                    $('#video-wrapper').hide();
                    $('#image-wrapper').show();
                }
            }

            $('#type').on('change', toggleTypeFields);

            $('#createNewGallery').click(function () {
                $('#saveGalleryBtn').val("create-gallery");
                $('#gallery_id').val('');
                $('#galleryForm').trigger("reset");
                $('#galleryModalHeading').html("Yeni Keşfet Öğesi");
                $('#image-preview').addClass('d-none');
                clearErrors();
                toggleTypeFields();
                $('#galleryModal').modal('show');
            });

            $('body').on('click', '.edit-gallery', function () {
                var id = $(this).data('id');
                // /dashboard/gallery/{id}/edit
                $.get("{{ route('dashboard.gallery.index') }}" + '/' + id + '/edit', function (data) {
                    $('#galleryModalHeading').html("Keşfet Öğesini Düzenle");
                    $('#saveGalleryBtn').val("edit-gallery");
                    $('#galleryModal').modal('show');
                    clearErrors();

                    $('#gallery_id').val(data.id);
                    $('#title').val(data.title || '');
                    $('#branch_id').val(data.branch_id || '');
                    $('#type').val(data.type || 'photo');
                    $('#order').val(data.order || 0);
                    $('#is_active').prop('checked', !!data.is_active);
                    $('#video_url').val(data.video_url || '');

                    toggleTypeFields();

                    if (data.image_path && data.type === 'photo') {
                        var imgSrc = '';
                        var path = data.image_path || '';

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
                        } else if (path === 'placeholder.jpg' || path === '/placeholder.jpg') {
                            imgSrc = '/images/okul-foto-1.jpg';
                        } else {
                            // varsayılan: storage altı
                            imgSrc = '{{ asset('storage') }}/' + path;
                        }
                        $('#image-preview-img').attr('src', imgSrc);
                        $('#image-preview').removeClass('d-none');
                    } else {
                        $('#image-preview').addClass('d-none');
                    }
                });
            });

            $('body').on('click', '.delete-gallery', function () {
                var id = $(this).data('id');
                if (!confirm('Bu öğeyi silmek istediğinize emin misiniz?')) {
                    return;
                }

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.gallery.index') }}" + '/delete/' + id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        table.ajax.reload();
                        showAlert(data.message || 'Öğe silindi.', 'success');
                    },
                    error: function (xhr) {
                        showAlert('Silme işlemi sırasında hata oluştu.', 'danger');
                    }
                });
            });

            $('#galleryForm').on('submit', function (e) {
                e.preventDefault();
                clearErrors();

                var formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.gallery.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#galleryModal').modal('hide');
                        table.ajax.reload();
                        showAlert(data.message || 'Kayıt başarıyla kaydedildi.', 'success');
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors || {};
                            Object.keys(errors).forEach(function (key) {
                                var errorMsg = errors[key][0];
                                var errorSpan = $('#' + key + '-error');
                                if (errorSpan.length) {
                                    errorSpan.text(errorMsg).removeClass('d-none');
                                    var input = $('#' + key);
                                    if (input.length) {
                                        input.addClass('border-danger');
                                    }
                                }
                            });
                        } else {
                            showAlert('Kayıt sırasında beklenmeyen bir hata oluştu.', 'danger');
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>


