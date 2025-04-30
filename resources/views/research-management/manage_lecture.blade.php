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
                                <li class="breadcrumb-item"><a href="{{ route('manage.lecture') }}">Manage Lecture</a>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addLecture" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3  col-12">
                                    <label>Select Lecturer:</label>
                                    <select class="form-control select2" name="lecturer_id" id="lecturer_id">
                                        <option value="">Select Lecturer</option>
                                        @foreach ($lecturers as $lecturer)
                                            <option value="{{ $lecturer->id }}">{{ $lecturer->lecturer_name }}
                                                - {{ $lecturer->hin_lecturer_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-lecturer_id"></span>
                                </div>

                                <div class="mb-3  col-12 ">
                                    <label>Lecture Title:</label>
                                    <input type="text" name="lecture_title" class="form-control">
                                    <span class="text-danger error-lecture_title"></span>
                                </div>
                                <div class="mb-3 col-12">
                                    <label>Lecture Title (Hindi):</label>
                                    <input type="text" name="hin_lecture_title" class="form-control">
                                    <span class="text-danger error-hin_lecture_title"></span>
                                </div>

                                <div class="mb-3 col-12">
                                    <label>Lecture Description:</label>
                                    <textarea name="lecture_description" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-lecture_description"></span>
                                </div>
                                <div class="mb-3 col-12">
                                    <label>Lecture Description (Hindi):</label>
                                    <textarea name="hin_lecture_description" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-hin_lecture_description"></span>
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
                                id="lectureTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Lecturer Name</th>
                                        <th>Lecture Title</th>
                                        <th>Lecture Description</th>
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
    <div id="editLectureModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Lecture Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editLectureForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editLectureId">

                        <div class="mb-3">
                            <label>Select Lecturer:</label>
                            <select class="form-control select2" name="lecturer_id" id="editlecturer_id">
                                <option value="">Select Lecturer</option>
                                @foreach ($lecturers as $lecturer)
                                    <option value="{{ $lecturer->id }}">{{ $lecturer->lecturer_name }}
                                        - {{ $lecturer->hin_lecturer_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-lecturer_id"></span>
                        </div>
                        <div class="mb-3">
                            <label>Lecture Title:</label>
                            <input type="text" name="lecture_title" id="editLectureName" class="form-control">
                            <span class="text-danger erroredit-lecture_title"></span>
                        </div>
                        <div class="mb-3">
                            <label>Lecture Title (Hindi):</label>
                            <input type="text" name="hin_lecture_title" id="editHinLectureName" class="form-control">
                            <span class="text-danger erroredit-hin_lecture_title"></span>
                        </div>
                        <div class="mb-3">
                            <label>Lecture Description:</label>
                            <textarea name="lecture_description" id="editLectureDescription" class="form-control"
                                rows="3"></textarea>
                            <span class="text-danger erroredit-lecture_description"></span>
                        </div>
                        <div class="mb-3">
                            <label>Lecture Description (Hindi):</label>
                            <textarea name="hin_lecture_description" id="editHinLectureDescription"
                                class="form-control" rows="3"></textarea>
                            <span class="text-danger erroredit-hin_lecture_description"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Lecture</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #lectureTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addLecture").trigger("reset");
            $("#addLecture").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");


                $(".text-danger").text("");


                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'manage_lecture/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);

                        $.ajax({
                            url: "{{ route('manage.lecture.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Lecture added successfully!"
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

            var table = $('#lectureTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('manage.lecture.list') }}",
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
                        data: "lecture_title",
                        name: "lecture_title"
                    },
                    {
                        data: "lecture_description",
                        name: "lecture_description"
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
                    url: "{{ route('manage.lecture.toggleStatus') }}",
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

            $(document).on('click', '.edit-lecture', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "/manage_lecture/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editLectureId').val(response.id);
                        $('#editlecturer_id').val(response.lecturer_id).trigger('change');
                        $('#editLectureName').val(response.lecture_title);
                        $('#editHinLectureName').val(response.hin_lecture_title);
                        $('#editLectureDescription').val(response.lecture_description);
                        $('#editHinLectureDescription').val(response.hin_lecture_description);
                        $('#editLectureModal').find('.text-danger').text('');
                        $('#editLectureModal').modal('show');
                    }
                });
            });

            $('#editLectureForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editLectureId').val();

                $.ajax({
                    url: "/manage_lecture/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editLectureModal').modal('hide');
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
