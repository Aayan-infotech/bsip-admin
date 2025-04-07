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
                            <li class="breadcrumb-item"><a href="{{ url('/users') }}">Users</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="card-body">
                    <!-- Success Message -->
                    <div id="alert-success" class="alert alert-success d-none"></div>

                    <!-- User Registration Form -->
                    <form id="addUserForm" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" required>
                            <span class="text-danger error-name"></span>
                        </div>
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            <span class="text-danger error-email"></span>
                        </div>
                        <div class="mb-3">
                            <label>Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            <span class="text-danger error-password"></span>
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password:</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                            <span class="text-danger error-password_confirmation"></span>
                        </div>
                        <button type="submit" id="submitButton" class="btn btn-primary">
                            Add User
                            <span class="spinner-border spinner-border-sm d-none"></span>
                        </button>
                    </form>
                </div>


                <div class="card-body">

                    <div class="table-responsive">
                        <table id="usersTable" class="yajraTable table table-bordered table-hover align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Last Updated At</th>
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
</div>
<div id="editUserModal" class="modal right fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
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
                        <label>Email:</label>
                        <input type="email" id="editEmail" readonly name="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
</style>

<!-- jQuery & AJAX -->

<script>
    $(document).ready(function() {
        $("#email").val("");

        $("#addUserForm").trigger("reset");
        $("#addUserForm").on("submit", function(e) {
            e.preventDefault();

            let form = $(this);
            let submitBtn = $("#submitButton");
            let spinner = $(".spinner-border");

            submitBtn.prop("disabled", true);
            spinner.removeClass("d-none");


            $(".text-danger").text("");


            grecaptcha.ready(function() {
                grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                    action: 'users/store'
                }).then(function(token) {
                    let formData = form.serialize() + "&g-recaptcha-response=" + token;

                    $.ajax({
                        url: "{{ route('users.store') }}",
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
                            submitBtn.prop("disabled", false);
                            spinner.addClass("d-none");
                        }
                    });
                });
            });
        });

        var table = $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users.list') }}",
                type: "GET",
                error: function(xhr, error, code) {
                    console.log(xhr.responseText); // Log detailed error
                }
            },
            columns: [{
                    data: "id",
                    name: "id"
                },
                {
                    data: "name",
                    name: "name"
                },
                {
                    data: "email",
                    name: "email"
                },
                {
                    data: "created_at",
                    name: "created_at",
                    render: function(data) {
                        return formatDate(data); // Format the created_at date
                    }
                },
                {
                    data: "updated_at",
                    name: "updated_at",
                    render: function(data, type, row) {
                        return row.created_at !== row.updated_at ? formatDate(data) : '';
                    }
                },
                {
                    data: "status",
                    name: "status"
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $(document).on('change', '.toggle-status', function() {
            const checkbox = $(this);
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('users.updateStatus') }}",
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

        $(document).on('click', '.edit-user', function() {
            let id = $(this).data('id');

            $.ajax({
                url: "/users/edit/" + id,
                type: "GET",
                success: function(response) {
                    $('#editUserId').val(response.id);
                    $('#editName').val(response.name);
                    $('#editEmail').val(response.email);
                    $('#editUserModal').modal('show');
                }
            });
        });

        $('#editUserForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#editUserId').val();

            $.ajax({
                url: "/users/update/" + id,
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
                            alert(value[0]);
                        });
                    }
                }
            });
        });

    });

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('en-GB', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        }).format(date);
    }
</script>

@endsection