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
                                <li class="breadcrumb-item"><a href="{{ route('manage.lecturer') }}">Manage Lecturer</a>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addLecturer" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Lecturer Name:</label>
                                    <input type="text" name="lecturer_name" class="form-control">
                                    <span class="text-danger error-lecturer_name"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Lecturer Name (Hindi):</label>
                                    <input type="text" name="hin_lecturer_name" class="form-control">
                                    <span class="text-danger error-hin_lecturer_name"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add Lecturer
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="yajraTable table table-bordered table-hover align-middle pt-3 w-full m-0"
                                id="lecturerTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Lecturer Name</th>
                                        <th>Lecturer Name (Hindi)</th>
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
    <div id="editLecturerModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Lecturer Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editLecturerForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editLecturerId">

                        <div class="mb-3">
                            <label>Lecturer Name:</label>
                            <input type="text" id="editLecturerName" name="lecturer_name" class="form-control">
                            <span class="text-danger erroredit-lecturer_name"></span>
                        </div>
                        <div class="mb-3">
                            <label>Lecturer Name (Hindi):</label>
                            <input type="text" id="editHinLecturerName" name="hin_lecturer_name" class="form-control">
                            <span class="text-danger erroredit-hin_lecturer_name"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Lecturer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #lecturerTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addLecturer").trigger("reset");
            $("#addLecturer").on("submit", function(e) {
                e.preventDefault();

                console.log('hello');

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");


                $(".text-danger").text("");


                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'manage_lecturer/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);

                        $.ajax({
                            url: "{{ route('manage.lecturer.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Lecturer added successfully!"
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

            var table = $('#lecturerTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('manage.lecturer.list') }}",
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
                        data: "lecturer_name",
                        name: "lecturer_name"
                    },
                    {
                        data: "hin_lecturer_name",
                        name: "hin_lecturer_name"
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
                    url: "{{ route('manage.lecturer.toggleStatus') }}",
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




            $(document).on('click', '.edit-lecturer', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "/manage_lecturer/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editLecturerId').val(response.id);
                        $('#editHinLecturerName').val(response.hin_lecturer_name);
                        $('#editLecturerName').val(response.lecturer_name);
                        $('#editLecturerModal').find('.text-danger').text('');
                        $('#editLecturerModal').modal('show');
                    }
                });
            });

            $('#editLecturerForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editLecturerId').val();

                $.ajax({
                    url: "/manage_lecturer/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editLecturerModal').modal('hide');
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
