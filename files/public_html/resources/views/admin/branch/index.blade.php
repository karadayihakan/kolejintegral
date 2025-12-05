<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Şubeler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-success" id="createNewBranch">Yeni Şube Ekle</button>
                    <table id="branches-table" class="min-w-full table-auto display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Adı</th>
                                <th>Slug</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="branchForm" name="branchForm" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="branch_id" id="branch_id">
                        <input type="hidden" name="user_id" id="user_id">
                        
                        <div class="form-group">
                            <label for="name" class="control-label">Adı</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="slug" class="control-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="phone" class="control-label">Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="form-group mt-2">
                            <label for="logo" class="col-sm-12 control-label">Logo</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="logo" name="logo">
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label for="background" class="col-sm-12 control-label">Arka Plan</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="background" name="background">
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label for="address" class="control-label">Adres</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="email" class="control-label">E-posta</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group mt-2">
                            <label for="password" class="control-label">Şifre</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group mt-2">
                            <label for="password_confirmation" class="control-label">Şifre (Tekrar)</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables Script -->
    <script type="text/javascript">
        $(function () {
            var table = $('#branches-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.branch.data') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'phone', name: 'phone' },
                    { data: 'user.email', name: 'user.email' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });

            $('#createNewBranch').click(function () {
                $('#saveBtn').val("create-branch");
                $('#branch_id').val('');
                $('#branchForm').trigger("reset");
                $('#modelHeading').html("Yeni Şube Ekle");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.edit', function () {
                var branch_id = $(this).data('id');
                $.get("{{ route('dashboard.branch.index') }}" + '/' + branch_id + '/edit', function (data) {
                    $('#modelHeading').html("Şube Düzenle");
                    $('#saveBtn').val("edit-branch");
                    $('#ajaxModel').modal('show');
                    $('#branch_id').val(data.id);
                    $('#user_id').val(data.user.id);
                    $('#name').val(data.name);
                    $('#slug').val(data.slug);
                    $('#phone').val(data.phone);
                    $('#logo').val(data.logo);
                    $('#address').val(data.address);
                    $('#background').val(data.background);
                    $('#email').val(data.user.email);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Kaydediliyor..');

                var formData = new FormData($('#branchForm')[0]);

                $.ajax({
                    url: "{{ route('dashboard.branch.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                    success: function (data) {
                        $('#branchForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Kaydet');
                    }
                });
            });

            $('body').on('click', '.delete', function () {
                var branch_id = $(this).data("id");
                if(confirm("Bu şubeyi silmek istediğinizden emin misiniz?")){
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.branch.index') }}" + '/' + branch_id,
                        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                        success: function (data) {
                            table.draw();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    </script>

</x-app-layout>
