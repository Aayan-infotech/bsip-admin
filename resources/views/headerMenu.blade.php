@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.2sidebar')
        <div class="col-md-10 col-sm-9">
            <div class="card mt-3">
                <div class="card-header">
                    <nav aria-label="breadcrumb" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Template Management</li>
                            <li class="breadcrumb-item"><a href="{{ url('/headerMenu') }}">Header Menus</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <!-- Form for Adding Header Menu -->
                    <form id="headerMenuForm">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the title" required>
                        </div>
                        <div class="mb-3">
                            <label for="hin_title" class="form-label">Hindi Title</label>
                            <input type="text" name="hin_title" id="hin_title" class="form-control" placeholder="Enter the Hindi title">
                        </div>
                        <div class="mb-3">
                            <label for="menuHas" class="form-label">Menu Has</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="menuHas" id="menuHasPage" value="Page" required>
                                <label class="form-check-label" for="menuHasPage">Page</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="menuHas" id="menuHasURL" value="URL" required>
                                <label class="form-check-label" for="menuHasURL">URL</label>
                            </div>
                        </div>
                        <div class="mb-3" id="urlField" style="display: none;">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" name="url" id="url" class="form-control" placeholder="Enter the URL">
                        </div>
                        <div class="mb-3">
    <label for="sequence" class="form-label">Sequence</label>
    <input type="number" name="sequence" id="sequence" class="form-control" placeholder="Enter the sequence">
</div>
                        <button type="button" id="saveHeaderMenu" class="btn btn-primary">Save</button>
                    </form>

                    <hr>

                    <!-- Yajra Table for Header Menus -->
                    <div class="table-responsive">
                        <table id="headerMenuTable" class="yajraTable table table-bordered table-hover align-middle">
                        <thead class="thead-dark">
                                <tr>
                                    <th>Sequence</th>
                                    <th>Title</th>
                                    <th>Hindi Title</th>
                                    <th>Menu Has</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Editing Header Menu -->
<div class="modal fade" id="editHeaderMenuModal" tabindex="-1" aria-labelledby="editHeaderMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editHeaderMenuModalLabel">Edit Header Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editHeaderMenuForm">
                    @csrf
                    <input type="hidden" id="editMenuId">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Title</label>
                        <input type="text" name="title" id="editTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHinTitle" class="form-label">Hindi Title</label>
                        <input type="text" name="hin_title" id="editHinTitle" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editMenuHas" class="form-label">Menu Has</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="editMenuHas" id="editMenuHasPage" value="Page">
                            <label class="form-check-label" for="editMenuHasPage">Page</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="radio" name="editMenuHas" id="editMenuHasURL" value="URL">
                            <label class="form-check-label" for="editMenuHasURL">URL</label>
                        </div>
                    </div>
                    <div class="mb-3" id="editUrlField" style="display: none;">
                        <label for="editUrl" class="form-label">URL</label>
                        <input type="url" name="url" id="editUrl" class="form-control">
                    </div>
                    <div class="mb-3">
    <label for="editSequence" class="form-label">Sequence</label>
    <input type="number" name="sequence" id="editSequence" class="form-control">
</div>
                    <button type="button" id="updateHeaderMenu" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
    // Toggle URL field based on Menu Has selection
    $('input[name="menuHas"]').on('change', function () {
        if ($(this).val() === 'URL') {
            $('#urlField').show();
        } else {
            $('#urlField').hide();
        }
    });

    $('input[name="editMenuHas"]').on('change', function () {
        if ($(this).val() === 'URL') {
            $('#editUrlField').show();
        } else {
            $('#editUrlField').hide();
        }
    });

    // Initialize Yajra DataTable
    const table = $('#headerMenuTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('headerMenu.index') }}",
        order: [], 
        columns: [
            { data: 'sequence', name: 'sequence' },
            { data: 'title', name: 'title' },
            { data: 'hin_title', name: 'hin_title' },
            { data: 'menuHas', name: 'menuHas' },
            { data: 'status', name: 'status', render: function (data, type, row) {
                return `<button class="btn btn-sm ${data === 'Active' ? 'btn-success' : 'btn-secondary'} toggleStatus" data-id="${row.id}">${data}</button>`;
            }},
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ]
    });

    // Save Header Menu
    $('#saveHeaderMenu').on('click', function () {
        const formData = {
            _token: "{{ csrf_token() }}",
            title: $('#title').val(),
            hin_title: $('#hin_title').val(),
            menuHas: $('input[name="menuHas"]:checked').val(),
            url: $('#url').val(),
            sequence: $('#sequence').val()
        };

        $.ajax({
            url: "{{ route('headerMenu.store') }}",
            type: 'POST',
            data: formData,
            success: function (response) {
                toastr.success(response.message || 'Header menu added successfully!');
                $('#headerMenuForm')[0].reset();
                $('#urlField').hide();
                table.ajax.reload();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    alert('An error occurred while adding the header menu.');
                }
            }
        });
    });

    // Edit Header Menu
    $(document).on('click', '.editHeaderMenu', function () {
        const id = $(this).data('id');
        $.ajax({
            url: `/headerMenu/${id}/edit`,
            type: 'GET',
            success: function (response) {
                $('#editMenuId').val(response.id);
                $('#editTitle').val(response.title);
                $('#editHinTitle').val(response.hin_title);
                $(`#editMenuHas${response.menuHas}`).prop('checked', true).trigger('change');
                $('#editUrl').val(response.url);
                $('#editSequence').val(response.sequence);
                $('#editHeaderMenuModal').modal('show');
            },
            error: function () {
                alert('Failed to fetch header menu details.');
            }
        });
    });

    // Update Header Menu
    $('#updateHeaderMenu').on('click', function () {
        const id = $('#editMenuId').val();
        const formData = {
            _token: "{{ csrf_token() }}",
            title: $('#editTitle').val(),
            hin_title: $('#editHinTitle').val(),
            menuHas: $('input[name="editMenuHas"]:checked').val(),
            url: $('#editUrl').val(),
            sequence: $('#editSequence').val()
        };

        $.ajax({
            url: `/headerMenu/${id}`,
            type: 'PUT',
            data: formData,
            success: function (response) {
                toastr.success(response.message || 'Header menu updated successfully!');
                $('#editHeaderMenuModal').modal('hide');
                table.ajax.reload();
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        toastr.error(value[0]);
                    });
                } else {
                    alert('An error occurred while updating the header menu.');
                }
            }
        });
    });

    // Toggle Status
    $(document).on('click', '.toggleStatus', function () {
        const id = $(this).data('id');
        $.ajax({
            url: `/headerMenu/${id}/toggleStatus`,
            type: 'POST',
            data: { _token: "{{ csrf_token() }}" },
            success: function (response) {
                toastr.success(response.message || 'Status updated successfully!');
                table.ajax.reload();
            },
            error: function () {
                alert('Failed to update status.');
            }
        });
    });
});
</script>
@endsection