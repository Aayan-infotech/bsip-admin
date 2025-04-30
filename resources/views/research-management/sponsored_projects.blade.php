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
                                <li class="breadcrumb-item"><a href="{{ route('sponsored.projects') }}">Sponsored Projects</a>
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
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Title</label>
                                    <input type="text" name="project_title" class="form-control">
                                    <span class="text-danger error-project_title"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Project Title(Hindi)</label>
                                    <input type="text" name="hin_project_title" class="form-control">
                                    <span class="text-danger error-hin_project_title"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="project_coordinator">Project Co-ordinator</label>
                                    <input type="text" name="project_coordinator" class="form-control">
                                    <span class="text-danger error-project_coordinator"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="hin_project_coordinator">Project Co-ordinator(Hindi)</label>
                                    <input type="text" name="hin_project_coordinator" class="form-control">
                                    <span class="text-danger error-hin_project_coordinator"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="funding_agency">Funding Agency</label>
                                    <input type="text" name="funding_agency" class="form-control">
                                    <span class="text-danger error-funding_agency"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="hin_funding_agency">Funding Agency(Hindi)</label>
                                    <input type="text" name="hin_funding_agency" class="form-control">
                                    <span class="text-danger error-hin_funding_agency"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="project_no">Project No</label>
                                    <input type="text" name="project_no" class="form-control">
                                    <span class="text-danger error-project_no"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="project_cost">Project Cost</label>
                                    <input type="text" name="project_cost" class="form-control">
                                    <span class="text-danger error-project_cost"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="duration">Project Duration</label>
                                    <input type="text" name="duration" class="form-control">
                                    <span class="text-danger error-duration"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label for="hin_duration">Project Duration(Hindi)</label>
                                    <input type="text" name="hin_duration" class="form-control">
                                    <span class="text-danger error-hin_duration"></span>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" name="start_date" class="form-control">
                                    <span class="text-danger error-start_date"></span>
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
                                        <th>Date</th>
                                        <th>Project Title</th>
                                        <th>Co-ordinator</th>
                                        <th>Funding Agency</th>
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
                            <div class="col-12 mb-3">
                                <label for="project_title">Project Title</label>
                                <input type="text" name="project_title" id="edit_project_title" class="form-control">
                                <span class="text-danger erroredit-project_title"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="hin_project_title">Project Title(Hindi)</label>
                                <input type="text" name="hin_project_title" id="edit_hin_project_title"
                                    class="form-control">
                                <span class="text-danger erroredit-hin_project_title"></span>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="project_coordinator">Project Co-ordinator</label>
                                <input type="text" name="project_coordinator" id="edit_project_coordinator"
                                    class="form-control">
                                <span class="text-danger erroredit-project_coordinator"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="hin_project_coordinator">Project Co-ordinator(Hindi)</label>
                                <input type="text" name="hin_project_coordinator" id="edit_hin_project_coordinator"
                                    class="form-control">
                                <span class="text-danger erroredit-hin_project_coordinator"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="funding_agency">Funding Agency</label>
                                <input type="text" name="funding_agency" id="edit_funding_agency"
                                    class="form-control">
                                <span class="text-danger erroredit-funding_agency"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="hin_funding_agency">Funding Agency(Hindi)</label>
                                <input type="text" name="hin_funding_agency" id="edit_hin_funding_agency"
                                    class="form-control">
                                <span class="text-danger erroredit-hin_funding_agency"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="project_no">Project No</label>
                                <input type="text" name="project_no" id="edit_project_no" class="form-control">
                                <span class="text-danger erroredit-project_no"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="project_cost">Project Cost</label>
                                <input type="text" name="project_cost" id="edit_project_cost" class="form-control">
                                <span class="text-danger erroredit-project_cost"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="duration">Project Duration</label>
                                <input type="text" name="duration" id="edit_duration"
                                    class="form-control">
                                <span class="text-danger erroredit-duration"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="hin_duration">Project Duration(Hindi)</label>
                                <input type="text" name="hin_duration" id="edit_hin_duration"
                                    class="form-control">
                                <span class="text-danger erroredit-hin_duration"></span>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="start_date">Start Date:</label>
                                <input type="date" name="start_date" id="edit_start_date" class="form-control">
                                <span class="text-danger erroredit-start_date"></span>
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
                        action: 'sponsored_projects/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);

                        $.ajax({
                            url: "{{ route('sponsored.projects.store') }}",
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
                    url: "{{ route('sponsored.projects.list') }}",
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
                        data: "start_date",
                        name: "start_date"
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
                        data: "funding_agency",
                        name: "funding_agency"
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
                    url: "{{ route('sponsored.projects.toggleStatus') }}",
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

            $(document).on('click', '.edit-sponsored-project', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "/sponsored_projects/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editProjectId').val(response.id);
                        $('#edit_project_title').val(response.project_title);
                        $('#edit_hin_project_title').val(response.hin_project_title);
                        $('#edit_project_coordinator').val(response.project_coordinator);
                        $('#edit_hin_project_coordinator').val(response.hin_project_coordinator);
                        $('#edit_funding_agency').val(response.funding_agency);
                        $('#edit_hin_funding_agency').val(response.hin_funding_agency);
                        $('#edit_project_no').val(response.project_no);
                        $('#edit_project_cost').val(response.project_cost);
                        $('#edit_duration').val(response.duration);
                        $('#edit_hin_duration').val(response.hin_duration);
                        $('#edit_start_date').val(response.start_date);
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
                    url: "/sponsored_projects/update/" + id,
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
