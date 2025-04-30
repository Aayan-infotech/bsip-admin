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
                                <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Research Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('manage.activities') }}">Manage Activities</a>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addActivity" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3  col-12">
                                    <label>Select Activity:</label>
                                    <select class="form-control select2" name="activity_name_id" id="activity_name_id">
                                        <option value="">Select Activity</option>
                                        @foreach ($activitiesNames as $activitiesName)
                                            <option value="{{ $activitiesName->id }}">{{ $activitiesName->activity_name }}
                                                - {{ $activitiesName->hin_activity_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-activity_name_id"></span>
                                </div>

                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Related Project:</label>
                                    <input type="text" name="related_project" class="form-control">
                                    <span class="text-danger error-related_project"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Related Project(Hindi):</label>
                                    <input type="text" name="hin_related_project" class="form-control">
                                    <span class="text-danger error-hin_related_project"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Title:</label>
                                    <input type="text" name="project_title" class="form-control">
                                    <span class="text-danger error-project_title"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Title(Hindi):</label>
                                    <input type="text" name="hin_project_title" class="form-control">
                                    <span class="text-danger error-hin_project_title"></span>
                                </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Coordinator:</label>
                                    <input type="text" name="project_coordinator" class="form-control">
                                    <span class="text-danger error-project_coordinator"></span>
                                </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Coordinator(Hindi):</label>
                                    <input type="text" name="hin_project_coordinator" class="form-control">
                                    <span class="text-danger error-hin_project_coordinator"></span>
                                </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Co-coordinator:</label>
                                    <input type="text" name="project_co_coordinator" class="form-control">
                                    <span class="text-danger error-project_co_coordinator"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Co-coordinator(Hindi):</label>
                                    <input type="text" name="hin_project_co_coordinator" class="form-control">
                                    <span class="text-danger error-hin_project_co_coordinator"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="">Project Core Member</label>
                                    <input type="text" name="project_core_members" class="form-control">
                                    <span class="text-danger error-project_core_members"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="">Project Core Member(Hindi)</label>
                                    <input type="text" name="hin_project_core_members" class="form-control">
                                    <span class="text-danger error-hin_project_core_members"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="">Associate Member:</label>
                                    <input type="text" name="associated_members" class="form-control">
                                    <span class="text-danger error-associated_members"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="">Associate Member(Hindi):</label>
                                    <input type="text" name="hin_associated_members" class="form-control">
                                    <span class="text-danger error-hin_associated_members"></span>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label>Description:</label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-description"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Description (Hindi):</label>
                                    <textarea name="hin_description" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-hin_description"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add Lecture
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="yajraTable table table-bordered table-hover align-middle pt-3 w-full m-0"
                                id="activityTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Activity</th>
                                        <th>Project</th>
                                        <th>Project title</th>
                                        <th>Project Coordinator</th>
                                        <th>Project Co-coordinator</th>
                                        <th>Project Core Member</th>
                                        <th>Associate Member</th>
                                        <th>Description</th>
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
    <div id="editActivityModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editActivityForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editActivityId">

                        <div class="row">
                            <div class="mb-3  col-12">
                                <label>Select Activity:</label>
                                <select class="form-control select2" name="activity_name_id" id="edit_activity_name_id">
                                    <option value="">Select Activity</option>
                                    @foreach ($activitiesNames as $activitiesName)
                                        <option value="{{ $activitiesName->id }}">{{ $activitiesName->activity_name }}
                                            - {{ $activitiesName->hin_activity_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger erroredit-activity_name_id"></span>
                            </div>

                            <div class="mb-3 col-md-6 col-12 ">
                                <label>Related Project:</label>
                                <input type="text" name="related_project" id="edit_related_project" class="form-control">
                                <span class="text-danger erroredit-related_project"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>Related Project(Hindi):</label>
                                <input type="text" name="hin_related_project" id="edit_hin_related_project" class="form-control">
                                <span class="text-danger erroredit-hin_related_project"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>Project Title:</label>
                                <input type="text" name="project_title" id="edit_project_title" class="form-control">
                                <span class="text-danger erroredit-project_title"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>Project Title(Hindi):</label>
                                <input type="text" name="hin_project_title" id="edit_hin_project_title" class="form-control">
                                <span class="text-danger erroredit-hin_project_title"></span>
                            </div>

                            <div class="col-md-6 col-12 mb-3">
                                <label>Project Coordinator:</label>
                                <input type="text" name="project_coordinator" id="edit_project_coordinator" class="form-control">
                                <span class="text-danger erroredit-project_coordinator"></span>
                            </div>

                            <div class="col-md-6 col-12 mb-3">
                                <label>Project Coordinator(Hindi):</label>
                                <input type="text" name="hin_project_coordinator" id="edit_hin_project_coordinator" class="form-control">
                                <span class="text-danger erroredit-hin_project_coordinator"></span>
                            </div>

                            <div class="col-md-6 col-12 mb-3">
                                <label>Project Co-coordinator:</label>
                                <input type="text" name="project_co_coordinator" id="edit_project_co_coordinator" class="form-control">
                                <span class="text-danger erroredit-project_co_coordinator"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label>Project Co-coordinator(Hindi):</label>
                                <input type="text" name="hin_project_co_coordinator" id="edit_hin_project_co_coordinator" class="form-control">
                                <span class="text-danger erroredit-hin_project_co_coordinator"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="">Project Core Member</label>
                                <input type="text" name="project_core_members" id="edit_project_core_members" class="form-control">
                                <span class="text-danger erroredit-project_core_members"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="">Project Core Member(Hindi)</label>
                                <input type="text" name="hin_project_core_members" id="edit_hin_project_core_members" class="form-control">
                                <span class="text-danger erroredit-hin_project_core_members"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="">Associate Member:</label>
                                <input type="text" name="associated_members" id="edit_associated_members" class="form-control">
                                <span class="text-danger erroredit-associated_members"></span>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="">Associate Member(Hindi):</label>
                                <input type="text" name="hin_associated_members" id="edit_hin_associated_members" class="form-control">
                                <span class="text-danger erroredit-hin_associated_members"></span>
                            </div>

                            <div class="mb-3 col-md-6 col-12">
                                <label>Description:</label>
                                <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                                <span class="text-danger erroredit-description"></span>
                            </div>
                            <div class="mb-3 col-md-6 col-12">
                                <label>Description (Hindi):</label>
                                <textarea name="hin_description" id="edit_hin_description" class="form-control" rows="3"></textarea>
                                <span class="text-danger erroredit-hin_description"></span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Activity</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #activityTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addActivity").trigger("reset");
            $("#addActivity").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");


                $(".text-danger").text("");


                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'manage_activities/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);

                        $.ajax({
                            url: "{{ route('manage.activities.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Activity added successfully!"
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

            var table = $('#activityTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('manage.activities.list') }}",
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
                        data: "activity_name",
                        name: "activity_name"
                    },
                    {
                        data: "related_project",
                        name: "related_project"
                    },
                    {
                        data: "project_title",
                        name: "project_title"
                    },
                    {
                        data: "project_coordinator",
                        name: "project_coordinator"
                    },
                    {
                        data: "project_co_coordinator",
                        name: "project_co_coordinator"
                    },
                    {
                        data: "project_core_members",
                        name: "project_core_members"
                    },
                    {
                        data: "associated_members",
                        name: "associated_members"
                    },
                    {
                        data: "description",
                        name: "description"
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
                    url: "{{ route('manage.activities.toggleStatus') }}",
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

            $(document).on('click', '.edit-activities', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "/manage_activities/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editActivityId').val(response.id);
                        $('#edit_activity_name_id').val(response.activity_name_id).trigger('change');
                        $('#edit_related_project').val(response.related_project);
                        $('#edit_hin_related_project').val(response.hin_related_project);
                        $('#edit_project_title').val(response.project_title);
                        $('#edit_hin_project_title').val(response.hin_project_title);
                        $('#edit_project_coordinator').val(response.project_coordinator);
                        $('#edit_hin_project_coordinator').val(response.hin_project_coordinator);
                        $('#edit_project_co_coordinator').val(response.project_co_coordinator);
                        $('#edit_hin_project_co_coordinator').val(response.hin_project_co_coordinator);
                        $('#edit_project_core_members').val(response.project_core_members);
                        $('#edit_hin_project_core_members').val(response.hin_project_core_members);
                        $('#edit_associated_members').val(response.associated_members);
                        $('#edit_hin_associated_members').val(response.hin_associated_members);
                        $('#edit_description').val(response.description);
                        $('#edit_hin_description').val(response.hin_description);
                        $('#editActivityModal').find('.text-danger').text('');
                        $('#editActivityModal').modal('show');
                    }
                });
            });

            $('#editActivityForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editActivityId').val();

                $.ajax({
                    url: "/manage_activities/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editActivityModal').modal('hide');
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
