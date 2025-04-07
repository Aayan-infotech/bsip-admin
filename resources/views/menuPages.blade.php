@extends('layouts.app')

@section('content')
<style>
    td[rowspan] {
        vertical-align: middle !important;
        text-align: center;
    }
</style>
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
                    <!-- Form for Adding Menu Page -->
                    <form id="menuPageForm">
                        @csrf
                        <div class="mb-3">
                            <label for="parent_menu_id" class="form-label">Parent Menu</label>
                            <select name="parent_menu_id" id="parent_menu_id" class="form-control">
                                <option value="">Select Parent Menu</option>
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the title" required>
                        </div>
                        <div class="mb-3">
                            <label for="hin_title" class="form-label">Hindi Title</label>
                            <input type="text" name="hin_title" id="hin_title" class="form-control" placeholder="Enter the Hindi title">
                        </div>
                        <div class="mb-3">
                            <label for="page_url" class="form-label">Page URL</label>
                            <input type="url" name="page_url" id="page_url" class="form-control" placeholder="Enter the page URL" required>
                        </div>
                        <div class="mb-3">
                            <label for="sequence" class="form-label">Sequence</label>
                            <input type="number" name="sequence" id="sequence" class="form-control" placeholder="Enter the sequence" required>
                        </div>
                        <button type="button" id="saveMenuPage" class="btn btn-primary">Save</button>
                    </form>

                    <hr>

                    <!-- Yajra Table for Menu Pages -->
                    <div class="table-responsive">
                        <table id="menuPageTable" class="yajraTable table table-bordered table-hover align-middle">
                            <thead class="thead-dark">
                                <tr>
                                <th>Menu Name</th>
                                    <th>Sequence</th>
                                    <th>Title</th>
                                    <th>Hindi Title</th>
                                    <th>Page URL</th>
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
<!-- Modal for Editing Menu Page -->
<div class="modal fade" id="editMenuPageModal" tabindex="-1" aria-labelledby="editMenuPageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuPageModalLabel">Edit Menu Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editMenuPageForm">
                    @csrf
                    <input type="hidden" id="editPageId">
                    <div class="mb-3">
                        <label for="editParentMenuId" class="form-label">Parent Menu</label>
                        <select name="parent_menu_id" id="editParentMenuId" class="form-control">
                            <option value="">Select Parent Menu</option>
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Title</label>
                        <input type="text" name="title" id="editTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHinTitle" class="form-label">Hindi Title</label>
                        <input type="text" name="hin_title" id="editHinTitle" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editPageUrl" class="form-label">Page URL</label>
                        <input type="url" name="page_url" id="editPageUrl" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSequence" class="form-label">Sequence</label>
                        <input type="number" name="sequence" id="editSequence" class="form-control" required>
                    </div>
                    <button type="button" id="updateMenuPage" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Initialize Yajra DataTable
        const table = $('#menuPageTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('menuPages.index') }}",
            order: [],
            columns: [
                { data: 'menu_name', name: 'menu_name' },
                {
                    data: 'sequence',
                    name: 'sequence'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'hin_title',
                    name: 'hin_title'
                },
                {
                    data: 'page_url',
                    name: 'page_url'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        return `<button class="btn btn-sm ${data === 'Active' ? 'btn-success' : 'btn-secondary'} toggleStatus" data-id="${row.id}">${data}</button>`;
                    }
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }
            ],
        drawCallback: function (settings) {
            // Group rows by menu_name
            const api = this.api();
            const rows = api.rows({ page: 'current' }).nodes();
            let last = null;

            api.column(0, { page: 'current' })
                .data()
                .each(function (menuName, i) {
                    if (last !== menuName) {
                        const count = api
                            .column(0, { page: 'current' })
                            .data()
                            .filter(function (value) {
                                return value === menuName;
                            }).length;

                        $(rows)
                            .eq(i)
                            .find('td:first')
                            .attr('rowspan', count);
                        last = menuName;
                    } else {
                        $(rows).eq(i).find('td:first').remove();
                    }
                });
        },
        });

        // Save Menu Page
        $('#saveMenuPage').on('click', function() {
            const formData = {
                _token: "{{ csrf_token() }}",
                title: $('#title').val(),
                hin_title: $('#hin_title').val(),
                page_url: $('#page_url').val(),
                sequence: $('#sequence').val(),
                parent_menu_id: $('#parent_menu_id').val()
            };

            $.ajax({
                url: "{{ route('menuPages.store') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    toastr.success(response.message || 'Menu page added successfully!');
                    $('#menuPageForm')[0].reset();
                    table.ajax.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        alert('An error occurred while adding the menu page.');
                    }
                }
            });
        });

        // Edit Menu Page
        $(document).on('click', '.editMenuPage', function() {
            const id = $(this).data('id');
            $.ajax({
                url: `/menuPages/${id}/edit`,
                type: 'GET',
                success: function(response) {
                    $('#editPageId').val(response.id);
                    $('#editTitle').val(response.title);
                    $('#editHinTitle').val(response.hin_title);
                    $('#editPageUrl').val(response.page_url);
                    $('#editSequence').val(response.sequence);
                    $('#editParentMenuId').val(response.parent_menu_id);
                    $('#editMenuPageModal').modal('show');
                },
                error: function() {
                    alert('Failed to fetch menu page details.');
                }
            });
        });

        // Update Menu Page
        $('#updateMenuPage').on('click', function() {
            const id = $('#editPageId').val();
            const formData = {
                _token: "{{ csrf_token() }}",
                title: $('#editTitle').val(),
                hin_title: $('#editHinTitle').val(),
                page_url: $('#editPageUrl').val(),
                sequence: $('#editSequence').val(),
                parent_menu_id: $('#editParentMenuId').val()
            };

            $.ajax({
                url: `/menuPages/${id}`,
                type: 'PUT',
                data: formData,
                success: function(response) {
                    toastr.success(response.message || 'Menu page updated successfully!');
                    $('#editMenuPageModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        alert('An error occurred while updating the menu page.');
                    }
                }
            });
        });

        // Toggle Status
        $(document).on('click', '.toggleStatus', function() {
            const id = $(this).data('id');
            $.ajax({
                url: `/menuPages/${id}/toggleStatus`,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success(response.message || 'Status updated successfully!');
                    table.ajax.reload();
                },
                error: function() {
                    alert('Failed to update status.');
                }
            });
        });
    });
</script>
@endsection