<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Birim Yönetimi') }}
            </h2>
            <button id="createNewBranch" class="btn btn-primary d-flex align-items-center" style="background: #51223a; border: none;">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                Yeni Birim Ekle
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
                        <table id="branches-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Görsel</th>
                                    <th>Adı</th>
                                    <th>Slug</th>
                                    <th>Telefon</th>
                                    <th>E-posta</th>
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
                    <h5 class="modal-title text-lg font-semibold" id="modelHeading">Yeni Birim Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-6">
                    <form id="branchForm" name="branchForm" enctype="multipart/form-data">
                        <input type="hidden" name="branch_id" id="branch_id">
                        <input type="hidden" name="user_id" id="user_id">
                        
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Birim Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    <span class="text-danger small d-none" id="name-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="slogan" class="form-label">Slogan</label>
                                    <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Örn: Okul Ötesi Eğitim Deneyimi">
                                    <span class="text-danger small d-none" id="slogan-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Açıklama</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    <span class="text-danger small d-none" id="description-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" required>
                                    <span class="text-danger small d-none" id="slug-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                    <span class="text-danger small d-none" id="phone-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-posta <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <span class="text-danger small d-none" id="email-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adres</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                    <span class="text-danger small d-none" id="address-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                    <div id="logo-preview" class="mt-2 d-none">
                                        <img id="logo-preview-img" src="" alt="Logo önizleme" style="height: 80px; width: 80px; object-fit: cover; border-radius: 0.375rem;">
                                    </div>
                                    <span class="text-danger small d-none" id="logo-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="background" class="form-label">Arka Plan</label>
                                    <input type="file" class="form-control" id="background" name="background" accept="image/*">
                                    <div id="background-preview" class="mt-2 d-none">
                                        <img id="background-preview-img" src="" alt="Arka plan önizleme" style="height: 80px; width: 80px; object-fit: cover; border-radius: 0.375rem;">
                                    </div>
                                    <span class="text-danger small d-none" id="background-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="hero_image" class="form-label">Hero Görseli</label>
                                    <input type="file" class="form-control" id="hero_image" name="hero_image" accept="image/*">
                                    <small class="text-muted d-block mt-1">Birim detay sayfası için hero görseli</small>
                                    <div id="hero_image-preview" class="mt-2 d-none">
                                        <img id="hero_image-preview-img" src="" alt="Hero görsel önizleme" style="height: 120px; width: 100%; object-fit: cover; border-radius: 0.375rem;">
                                    </div>
                                    <span class="text-danger small d-none" id="hero_image-error"></span>
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
            var table = $('#branches-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.branch.data') }}",
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { 
                        data: 'hero_image_preview', 
                        name: 'hero_image_preview', 
                        orderable: false, 
                        searchable: false,
                        className: 'text-center'
                    },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'phone', name: 'phone' },
                    { data: 'user.email', name: 'user.email' },
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

            $('#createNewBranch').click(function () {
                $('#saveBtn').val("create-branch");
                $('#branch_id').val('');
                $('#user_id').val('');
                $('#branchForm').trigger("reset");
                $('#modelHeading').html("Yeni Birim Ekle");
                $('#logo-preview, #background-preview, #hero_image-preview').addClass('d-none');
                clearErrors();
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.edit', function () {
                var branch_id = $(this).data('id');
                $.get("{{ route('dashboard.branch.index') }}" + '/' + branch_id + '/edit', function (data) {
                    $('#modelHeading').html("Birim Düzenle");
                    $('#saveBtn').val("edit-branch");
                    $('#ajaxModel').modal('show');
                    clearErrors();
                    
                    $('#branch_id').val(data.id);
                    $('#user_id').val(data.user ? data.user.id : '');
                    $('#name').val(data.name);
                    $('#slogan').val(data.slogan || '');
                    $('#description').val(data.description || '');
                    $('#slug').val(data.slug);
                    $('#phone').val(data.phone || '');
                    $('#address').val(data.address || '');
                    $('#email').val(data.user ? data.user.email : '');
                    
                    // Logo önizleme
                    if (data.logo) {
                        var logoPath = data.logo.startsWith('http') ? data.logo : 
                                      (data.logo.startsWith('storage/') ? '/' + data.logo : 
                                      (data.logo.startsWith('images/') ? '/' + data.logo : '/storage/' + data.logo));
                        $('#logo-preview-img').attr('src', logoPath);
                        $('#logo-preview').removeClass('d-none');
                    } else {
                        $('#logo-preview').addClass('d-none');
                    }
                    
                    // Background önizleme
                    if (data.background) {
                        var bgPath = data.background.startsWith('http') ? data.background : 
                                    (data.background.startsWith('storage/') ? '/' + data.background : 
                                    (data.background.startsWith('images/') ? '/' + data.background : '/storage/' + data.background));
                        $('#background-preview-img').attr('src', bgPath);
                        $('#background-preview').removeClass('d-none');
                    } else {
                        $('#background-preview').addClass('d-none');
                    }
                    
                    // Hero image önizleme
                    if (data.hero_image) {
                        var heroPath = data.hero_image.startsWith('http') ? data.hero_image : 
                                      (data.hero_image.startsWith('storage/') ? '/' + data.hero_image : 
                                      (data.hero_image.startsWith('images/') ? '/' + data.hero_image : '/storage/' + data.hero_image));
                        $('#hero_image-preview-img').attr('src', heroPath);
                        $('#hero_image-preview').removeClass('d-none');
                    } else {
                        $('#hero_image-preview').addClass('d-none');
                    }
                }).fail(function() {
                    showAlert('Birim bilgileri yüklenirken bir hata oluştu!', 'error');
                });
            });

            // Dosya önizleme
            $('#logo').change(function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#logo-preview-img').attr('src', e.target.result);
                        $('#logo-preview').removeClass('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            $('#background').change(function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#background-preview-img').attr('src', e.target.result);
                        $('#background-preview').removeClass('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            $('#hero_image').change(function(e) {
                if (e.target.files && e.target.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#hero_image-preview-img').attr('src', e.target.result);
                        $('#hero_image-preview').removeClass('d-none');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });

            $('#branchForm').on('submit', function(e) {
                e.preventDefault();
                var $saveBtn = $('#saveBtn');
                var originalText = $saveBtn.html();
                $saveBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm mr-2"></span>Kaydediliyor...');
                clearErrors();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('dashboard.branch.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    success: function (data) {
                        showAlert('Birim başarıyla kaydedildi!', 'success');
                        $('#branchForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#logo-preview, #background-preview, #hero_image-preview').addClass('d-none');
                        table.draw();
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#' + key + '-error').removeClass('d-none').text(value[0]);
                                $('#' + key).addClass('border-red-500');
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
                var branch_id = $(this).data("id");
                var branch_name = $(this).data("name") || 'bu birim';
                
                if(confirm(branch_name + ' birimini silmek istediğinizden emin misiniz? Bu işlem geri alınamaz!')){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.branch.index') }}" + '/' + branch_id,
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                        success: function (data) {
                            showAlert('Birim başarıyla silindi!', 'success');
                            table.draw();
                        },
                        error: function (xhr) {
                            showAlert('Birim silinirken bir hata oluştu!', 'error');
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
