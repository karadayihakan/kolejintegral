<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fw-bold" style="font-size: 1.5rem; color: #1f2937;">
                {{ __('Menü Yönetimi') }}
            </h2>
            <button id="createNewMenu" class="btn btn-primary d-flex align-items-center" style="background: #51223a; border: none;">
                <svg style="width: 1.25rem; height: 1.25rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Yeni Menü Öğesi
            </button>
        </div>
    </x-slot>

    <div style="padding: 1.5rem 0;">
        <div class="container-fluid px-4">
            <div id="alertMessage" class="alert d-none mb-4" role="alert" style="display: none !important;"></div>

            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="filter_branch" class="form-label">Birim Filtresi</label>
                        <select class="form-select" id="filter_branch" style="max-width: 300px;">
                            <option value="">Genel Menü</option>
                            @foreach(\App\Models\Branch::orderBy('name')->get() as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table id="menu-table" class="table table-striped table-hover" style="width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Etiket</th>
                                    <th>URL</th>
                                    <th>Kapsam</th>
                                    <th>Hedef</th>
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
    <div class="modal fade" id="menuModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gray-50 border-b">
                    <h5 class="modal-title text-lg font-semibold" id="menuModalHeading">Yeni Menü Öğesi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-6">
                    <form id="menuForm" name="menuForm">
                        @csrf
                        <input type="hidden" name="id" id="menu_id">

                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="label" class="form-label">Etiket <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="label" name="label" required>
                                    <span class="text-danger small d-none" id="label-error"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="url" name="url" placeholder="/hakkimizda veya #explore" required>
                                    <small class="text-muted d-block mt-1">İç link için: /hakkimizda, #explore gibi. Dış link için: https://example.com</small>
                                    <span class="text-danger small d-none" id="url-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="branch_id" class="form-label">Kapsam / Birim</label>
                                    <select class="form-select" id="branch_id" name="branch_id">
                                        <option value="">Genel (Ana Site Menüsü)</option>
                                        @foreach(\App\Models\Branch::orderBy('name')->get() as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted d-block mt-1">Birim seçilirse, o birimin menüsüne eklenir.</small>
                                    <span class="text-danger small d-none" id="branch_id-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="target" class="form-label">Hedef</label>
                                    <select class="form-select" id="target" name="target">
                                        <option value="_self">Aynı Sekme</option>
                                        <option value="_blank">Yeni Sekme</option>
                                    </select>
                                    <span class="text-danger small d-none" id="target-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Sıra</label>
                                    <input type="number" class="form-control" id="order" name="order" value="0" min="0">
                                    <span class="text-danger small d-none" id="order-error"></span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-check mb-3" style="margin-top: 2rem;">
                                    <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                            <button type="submit" class="btn btn-primary" id="saveMenuBtn">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            var table = $('#menu-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.menu.data') }}",
                    data: function (d) {
                        d.branch_id = $('#filter_branch').val();
                    }
                },
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'label', name: 'label' },
                    { data: 'url', name: 'url' },
                    { data: 'branch_name', name: 'branch.name' },
                    { data: 'target_label', name: 'target' },
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

            $('#filter_branch').on('change', function() {
                table.ajax.reload();
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

            $('#createNewMenu').click(function () {
                $('#saveMenuBtn').val("create-menu");
                $('#menu_id').val('');
                $('#menuForm').trigger("reset");
                $('#menuModalHeading').html("Yeni Menü Öğesi");
                $('#is_active').prop('checked', true);
                clearErrors();
                $('#menuModal').modal('show');
            });

            $('body').on('click', '.edit-menu', function () {
                var id = $(this).data('id');
                $.get("{{ route('dashboard.menu.index') }}" + '/' + id + '/edit', function (data) {
                    $('#menuModalHeading').html("Menü Öğesini Düzenle");
                    $('#saveMenuBtn').val("edit-menu");
                    $('#menuModal').modal('show');
                    clearErrors();

                    $('#menu_id').val(data.id);
                    $('#label').val(data.label || '');
                    $('#url').val(data.url || '');
                    $('#branch_id').val(data.branch_id || '');
                    $('#target').val(data.target || '_self');
                    $('#order').val(data.order || 0);
                    $('#is_active').prop('checked', !!data.is_active);
                });
            });

            $('body').on('click', '.delete-menu', function () {
                var id = $(this).data('id');
                if (!confirm('Bu menü öğesini silmek istediğinize emin misiniz?')) {
                    return;
                }

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.menu.index') }}" + '/' + id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        table.ajax.reload();
                        showAlert(data.message || 'Menü öğesi silindi.', 'success');
                    },
                    error: function (xhr) {
                        showAlert('Silme işlemi sırasında hata oluştu.', 'danger');
                    }
                });
            });

            $('#menuForm').on('submit', function (e) {
                e.preventDefault();
                clearErrors();

                $.ajax({
                    type: "POST",
                    url: "{{ route('dashboard.menu.store') }}",
                    data: $(this).serialize(),
                    success: function (data) {
                        $('#menuModal').modal('hide');
                        table.ajax.reload();
                        showAlert(data.message || 'Menü öğesi başarıyla kaydedildi.', 'success');
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

