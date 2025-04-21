@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="4" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Research Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('manage.projects') }}">Manage Projects</a>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>
                        <!-- User Registration Form -->
                        <form id="addProject" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3  col-12">
                                    <label>Select Project:</label>
                                    <select class="form-control select2" name="activity_id" id="activity_id">
                                        <option value="">Select Project</option>
                                        @foreach ($activities as $activity)
                                            <option value="{{ $activity->id }}">{{ $activity->project_title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-activity_id"></span>
                                </div>

                                <div class="mb-3 col-12 ">
                                    <label>Component Number:</label>
                                    <input type="text" name="component_no" class="form-control">
                                    <span class="text-danger error-component_no"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Component title:</label>
                                    <input type="text" name="component_title" class="form-control">
                                    <span class="text-danger error-component_title"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Component title(Hindi):</label>
                                    <input type="text" name="hin_component_title" class="form-control">
                                    <span class="text-danger error-hin_component_title"></span>
                                </div>
                                <div class="col-12 mb-3">
                                    <label>Personnel</label>
                                    <input type="text" name="personnel" class="form-control">
                                    <span class="text-danger error-personnel"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add Project
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="yajraTable table table-bordered table-hover align-middle pt-3 w-full m-0"
                                id="projectTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Project</th>
                                        <th>Component No</th>
                                        <th>Title</th>
                                        <th>Personnel</th>
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
    <div id="editProjectModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProjectForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editProjectId">

                        <div class="row">
                            <div class="mb-3  col-12">
                                <label>Select Project:</label>
                                <select class="form-control select2" name="activity_id" id="edit_activity_id">
                                    <option value="">Select Project</option>
                                    @foreach ($activities as $activity)
                                        <option value="{{ $activity->id }}">{{ $activity->project_title }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger erroredit-activity_id"></span>
                            </div>

                            <div class="mb-3 col-12 ">
                                <label>Component No:</label>
                                <input type="text" name="component_no" id="edit_component_no" class="form-control">
                                <span class="text-danger erroredit-component_no"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>Component title:</label>
                                <input type="text" name="component_title" id="edit_component_title" class="form-control">
                                <span class="text-danger erroredit-component_title"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>Component title(Hindi):</label>
                                <input type="text" name="hin_component_title" id="edit_hin_component_title"
                                    class="form-control">
                                <span class="text-danger erroredit-hin_component_title"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label>Personnel</label>
                                <input type="text" name="personnel" id="edit_personnel" class="form-control">
                                <span class="text-danger erroredit-personnel"></span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #projectTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addProject").trigger("reset");
            $("#addProject").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");


                $(".text-danger").text("");


                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'manage_projects/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);

                        $.ajax({
                            url: "{{ route('manage.projects.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Project added successfully!"
                                );
                                form.trigger("reset");
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;
                                    $.each(errors, function(key, value) {
                                        $(".error-" + key).text(value[
                                            0]);
                                    });
                                } else {
                                    toastr.error(
                                        "Something went wrong! Please try again."
                                    );
                                }
                            },
                            complete: function() {
                                submitBtn.prop("disabled", false);
                                spinner.addClass("d-none");
                            }
                        });
                    }).catch(function(error) {
                        console.log("Recaptcha error:", error);
                        console.error("Recaptcha error:", error);
                        toastr.error("Recaptcha verification failed. Please try again.");
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");
                    });
                });
            });

            var table = $('#projectTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('manage.projects.list') }}",
                    type: "GET",
                    data: function(d) {
                        d.customParam = 'value'; // Add custom parameter if needed
                    },
                    error: function(xhr, error, code) {
                        console.log(xhr.responseText);
                    }
                },
                columns: [{
                        data: "id",
                        name: "sr"
                    },
                    {
                        data: "project_title",
                        name: "Project"
                    },
                    {
                        data: "component_no",
                        name: "component_no"
                    },
                    {
                        data: "component_title",
                        name: "component_title"
                    },
                    {
                        data: "personnel",
                        name: "personnel"
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
                    url: "{{ route('manage.projects.toggleStatus') }}",
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

            $(document).on('click', '.edit-project', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "/manage_projects/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editProjectId').val(response.id);
                        $('#edit_activity_id').val(response.activity_id);
                        $('#edit_component_no').val(response.component_no);
                        $('#edit_component_title').val(response.component_title);
                        $('#edit_hin_component_title').val(response.hin_component_title);
                        $('#edit_personnel').val(response.personnel);
                        $('#editProjectModal').find('.text-danger').text('');
                        $('#editProjectModal').modal('show');
                    }
                });
            });

            $('#editProjectForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editProjectId').val();

                $.ajax({
                    url: "/manage_projects/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editProjectModal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                // alert(value[0]);
                                $(".erroredit-" + key).text(value[0]);
                            });
                        } else {
                            toastr.error("An unexpected error occurred. Please try again.");
                        }
                    }
                });
            });

        });
    </script>
@endsection
