@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="col-md-10 col-sm-9">
            <div class="card mt-3">
                <div class="card-header">
                    <!-- {{ __('User Management') }} -->
                    <nav aria-label="breadcrumb" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">User Management</li>
                            <li class="breadcrumb-item"><a href="{{ url('/modules') }}">Modules</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <form id="addModuleForm">
                        @csrf
                        <div class="mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required>
                            <span class="text-danger error-name"></span>
                        </div>
                        <div class="mb-3">
                            <label>Module URL:</label>
                            <input type="text" name="module_url" class="form-control" required>
                            <span class="text-danger error-module_url"></span>
                        </div>
                        <div class="mb-3">
                            <label>Sequence:</label>
                            <input type="number" name="sequence" class="form-control" required>
                            <span class="text-danger error-sequence"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Module</button>
                    </form>
                </div>


                <div class="card-body">
                    <table id="modulesTable" class="yajraTable table table-bordered table-hover align-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Module URL</th>
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
                <h5 class="modal-title">Edit Module</h5>
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
                        <label>Module URL:</label>
                        <input type="text" id="editModuleUrl" name="module_url" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Module Sequence:</label>
                        <input type="text" id="editSequence" name="sequence" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Module</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#modulesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('modules.list') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'module_url',
                    name: 'module_url'
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

        $('#addModuleForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);


            $(".text-danger").text("");


            grecaptcha.ready(function() {
                grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                    action: 'users/store'
                }).then(function(token) {
                    let formData = form.serialize() + "&g-recaptcha-response=" + token;

                    $.ajax({
                        url: "{{ route('modules.store') }}",
                        type: "POST",
                        data: formData,
                        dataType: "json",
                        success: function(response) {
                            toastr.success("User added successfully!");
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
            // 
        });

        $(document).on('change', '.toggle-status', function() {
            const checkbox = $(this);
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('modules.updateStatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(response) {
                    toastr.success(response.success);
                    table.ajax.reload();
                },
                error: function(xhr) {
                    toastr.error("Failed to update status. Please try again.");
                    checkbox.prop('checked', !status);
                }
            });
        });

        $(document).on('click', '.edit-module', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "/modules/edit/" + id,
                type: "GET",
                success: function(response) {
                    $('#editUserId').val(response.id);
                    $('#editName').val(response.name);
                    $('#editModuleUrl').val(response.module_url);
                    $('#editSequence').val(response.sequence);
                    $('#editUserModal').modal('show');
                    // $('#addModuleForm').attr('action', '/modules/update/' + id);
                }
            });
        });
        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#editUserId').val();

            $.ajax({
                url: "/modules/update/" + id,
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