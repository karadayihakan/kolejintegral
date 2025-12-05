@extends('layouts.branch.admin.app')

@section('content')
<div class="container">
    <button class="btn btn-primary mb-4 mt-4" id="createNewPackage">Yeni Paket Ekle</button>
    <table class="table table-bordered" id="packagesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paket Adı</th>
                <th>İşlemler</th>
            </tr>
        </thead>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="packageForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="packageModalLabel">Paket Ekle/Düzenle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="package_id" id="package_id">
                        <div class="form-group">
                            <label for="name">Paket Adı</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="features">Paket Özellikleri</label>
                            <button type="button" id="addFeature" class="btn btn-success btn-sm ml-3">+ Özellik Ekle</button>
                        </div>
                        
                        <!-- Package Features -->
                        <div id="featuresContainer">
                            
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

    var table = $('#packagesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('branch.dashboard.package.data', ['slug' => $slug]) }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });

    $('#createNewPackage').click(function() {
        $('#package_id').val('');
        $('#packageForm').trigger('reset');
        $('#packageModal').modal('show');
        $('#featuresContainer').html('');
    });

    // Add feature row
    $('#addFeature').click(function() {
        $('#featuresContainer').append(`
            <div class="form-group feature-row">
                <input type="text" name="features[][name]" class="form-control" placeholder="Özellik Adı" required>
                <button type="button" class="btn btn-danger btn-sm removeFeature">Çöp Kovası</button>
            </div>
        `);
    });

    // Remove feature row
    $(document).on('click', '.removeFeature', function() {
        $(this).closest('.feature-row').remove();
    });

    // Save or update package
    $('#packageForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "{{ route('branch.dashboard.packages.store', ['slug' => $slug]) }}",
            data: $('#packageForm').serialize(),
            success: function(response) {
                $('#packageModal').modal('hide');
                table.ajax.reload();
                alert(response.success);
            }
        });
    });

    // Edit package
    $('body').on('click', '.editPackage', function() {
        var id = $(this).data('id');
        $.get("{{ route('branch.dashboard.packages.index', ['slug' => $slug]) }}" + '/' + id + '/edit', function(data) {
            $('#package_id').val(data.id);
            $('#name').val(data.name);
            $('#featuresContainer').html('');
            $.each(data.features, function(index, feature) {
                $('#featuresContainer').append(`
                    <div class="form-group feature-row">
                        <input type="text" name="features[][name]" class="form-control" value="${feature.name}" required>
                        <button type="button" class="btn btn-danger btn-sm removeFeature">Çöp Kovası</button>
                    </div>
                `);
            });
            $('#packageModal').modal('show');
        });
    });

    // Delete package
    $('body').on('click', '.deletePackage', function() {
        var id = $(this).data('id');
        if (confirm("Silmek istediğinizden emin misiniz?")) {
            $.ajax({
                type: 'DELETE',
                url: "{{ route('branch.dashboard.packages.index', ['slug' => $slug]) }}/" + id,
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
