@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="col-md-10 col-sm-9">
            <div class="card mt-3">
                <div class="card-header">
                    <!-- {{ __('Page Management') }} -->
                    <nav aria-label="breadcrumb" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">User Management</li>
                            <li class="breadcrumb-item"><a href="{{ url('/pages') }}">Pages</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="card-body">
                    <form id="addPageForm">
                        @csrf
                        <div class="mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required>
                            <span class="text-danger error-name"></span>
                        </div>
                        <div class="mb-3">
                            <label>Module:</label>
                            <select name="module_id" class="form-control" required>
                                <option value="">Select Module</option>
                                @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-module_id"></span>
                        </div>
                        <div class="mb-3">
                            <label>Page URL:</label>
                            <input type="text" name="page_url" class="form-control" required>
                            <span class="text-danger error-page_url"></span>
                        </div>
                        <div class="mb-3">
                            <label>Sequence:</label>
                            <input type="number" name="sequence" class="form-control" required>
                            <span class="text-danger error-sequence"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Page</button>
                    </form>
                </div>

                <div class="card-body">
                    <table id="pagesTable" class="yajraTable table table-bordered table-hover align-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Module</th>
                                <th>Page URL</th>
                                <th>Sequence</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="editUserModal" class="modal right fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Page</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editUserForm">
                    @csrf
                    <input type="hidden" id="editUserId">
                    <div class="mb-3">
                        <label>Name:</label>
                        <input type="text" id="editName" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Module:</label>
                        <select name="module_id" id="editModule_id" class="form-control" required>
                            <option value="">Select Module</option>
                            @foreach($modules as $module)
                            <option value="{{ $module->id }}">{{ $module->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Page URL:</label>
                        <input type="text" id="editPageUrl" name="page_url" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Module Sequence:</label>
                        <input type="text" id="editSequence" name="sequence" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Page</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#pagesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pages.list') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'module',
                    name: 'module'
                },
                {
                    data: 'page_url',
                    name: 'page_url'
                },
                {
                    data: 'sequence',
                    name: 'sequence'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#addPageForm').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            $('.text-danger').text('');
            grecaptcha.ready(function() {
                grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                    action: 'users/store'
                }).then(function(token) {
                    let formData = form.serialize() + "&g-recaptcha-response=" + token;

                    $.ajax({
                        url: "{{ route('pages.store') }}",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function(response) {
                            toastr.success("Page added successfully!");
                            form.trigger("reset");
                            table.ajax.reload();
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $(".error-" + key).text(value[0]);
                                });
                            } else {
                                toastr.error("Something went wrong! Please try again.");
                            }
                        },
                        complete: function() {
                            // grecaptcha.reset();
                        }
                    });                    
                });
            });



        });

        $(document).on('change', '.toggle-status', function() {
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;
            $.ajax({
                url: "{{ route('pages.updateStatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(response) {
                    toastr.success(response.success);
                    // alert(response.success);
                    table.ajax.reload();
                },
                error: function(xhr) {
                    toastr.error("Failed to update status. Please try again.");
                    checkbox.prop('checked', !status);
                }
            });
        });

        $(document).on('click', '.edit-page', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "/pages/edit/" + id,
                type: "GET",
                success: function(response) {
                    $('#editUserId').val(response.id);
                    $('#editName').val(response.name);
                    $('#editModule_id').val(response.module_id);
                    $('#editPageUrl').val(response.page_url);
                    $('#editSequence').val(response.sequence);
                    $('#editUserModal').modal('show');
                }
            });
        });
        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#editUserId').val();

            $.ajax({
                url: "/pages/update/" + id,
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    toastr.success(response.message);
                    $('#editUserModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                            // alert(value[0]);
                        });
                    }
                }
            });
        });
    });
</script>
@endsection