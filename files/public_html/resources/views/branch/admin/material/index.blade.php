@extends('layouts.branch.admin.app')

@section('content')
<div class="container">
    <button class="btn btn-primary mb-4 mt-4" id="createNewMaterial">Yeni Materyal Ekle</button>
    <table class="table table-bordered" id="materialsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Görsel</th>
                <th>Başlık</th>
                <th>Fiyat</th>
                <th>Açıklama</th>
                <th>İşlemler</th>
            </tr>
        </thead>
    </table>

    <!-- Modal for Adding/Editing Materials -->
    <div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="materialModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="materialForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="materialModalLabel">Materyal Ekle/Düzenle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="material_id">
                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Fiyat</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Açıklama</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Görsel</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
$(document).ready(function() {
    // CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    var table = $('#materialsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('branch.dashboard.material.data', ['slug' => $branch->slug]) }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'title', name: 'title' },
            { data: 'price', name: 'price' },
            { data: 'description', name: 'description' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });

    // Show modal for creating new material
    $('#createNewMaterial').click(function() {
        $('#materialForm').trigger('reset');
        $('#material_id').val('');
        $('#materialModal').modal('show');
    });

    // Save material (create/update)
    $('#materialForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('branch.dashboard.material.store', ['slug' => $branch->slug]) }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#materialModal').modal('hide');
                table.ajax.reload();
                alert(response.success);
            }
        });
    });

    // Edit material
    $('body').on('click', '.editMaterial', function() {
        var id = $(this).data('id');
        $.get("{{ route('branch.dashboard.material.edit', [$branch->slug, ':id']) }}".replace(':id', id), function(data) {
            $('#material_id').val(data.id);
            $('#title').val(data.title);
            $('#price').val(data.price);
            $('#description').val(data.description);
            $('#materialModal').modal('show');
        });
    });

    // Delete material
    $('body').on('click', '.deleteMaterial', function() {
        var id = $(this).data('id');
        if (confirm("Silmek istediğinize emin misiniz?")) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('branch.dashboard.material.destroy', [$branch->slug, ':id']) }}".replace(':id', id),
                success: function(response) {
                    table.ajax.reload();
                    alert(response.success);
                }
            });
        }
    });
});
</script>

@endsection
