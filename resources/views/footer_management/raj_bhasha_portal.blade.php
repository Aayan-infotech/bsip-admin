@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="7" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Footer Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('bsip.rajbhasha.portal') }}">BSIP Rajbhasha Portal</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addNews" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Title:</label>
                                    <input type="text" name="title" class="form-control">
                                    <span class="text-danger error-title"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Title (Hindi):</label>
                                    <input type="text" name="title_hin" class="form-control">
                                    <span class="text-danger error-title_hin"></span>
                                </div>
                                <div class="mb-3 col-12">
                                    <label>Date:</label>
                                    <input type="date" name="date" class="form-control datepicker">
                                    <span class="text-danger error-date"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload Images:</label>
                                    <input type="file" name="images[]" class="form-control" multiple>
                                    <span class="text-danger error-images"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload PDF:</label>
                                    <input type="file" name="pdf_file" class="form-control" accept=".pdf">
                                    <span class="text-danger error-pdf_file"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Description:</label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-description"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>Description (Hindi):</label>
                                    <textarea name="description_hin" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-description_hin"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Submit
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="yajraTable table table-bordered table-hover align-middle pt-3 w-full m-0"
                                id="newsTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        {{-- <th>Images</th> --}}
                                        <th>PDF</th>
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
    <div id="editNewsModal" class="modal right fade" tabindex="-1">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Rajbhasha Portal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editNewsForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label>Title:</label>
                            <input type="text" id="editTitle" name="title" class="form-control">
                            <span class="text-danger erroredit-title"></span>
                        </div>

                        <div class="mb-3">
                            <label>Title (Hindi):</label>
                            <input type="text" id="editTitleHin" name="title_hin" class="form-control">
                            <span class="text-danger erroredit-title_hin"></span>
                        </div>

                        <div class="mb-3">
                            <label>Date:</label>
                            <input type="date" id="editDate" name="date" class="form-control">
                            <span class="text-danger erroredit-date"></span>
                        </div>
                        <div class="mb-3">
                            <label>Uploaded Images</label>
                            <div id="editImagePreview" class="d-flex flex-wrap">
                                <!-- Existing images will be displayed here -->
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Upload Image:</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                            <span class="text-danger erroredit-images"></span>
                        </div>

                        <div class="mb-3">
                            <label>Upload PDF:</label>
                            <input type="file" name="pdf_file" class="form-control" accept=".pdf">
                            <span class="text-danger erroredit-pdf_file"></span>
                        </div>

                        <div class="mb-3">
                            <label>Description:</label>
                            <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
                            <span class="text-danger erroredit-description"></span>
                        </div>

                        <div class="mb-3">
                            <label>Description (Hindi):</label>
                            <textarea name="description_hin" id="editDescriptionHin" class="form-control" rows="3"></textarea>
                            <span class="text-danger erroredit-description_hin"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #newsTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addNews").trigger("reset");
            $("#addNews").on("submit", function(e) {
                e.preventDefault();
                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");
                $(".text-danger").text("");
                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'bsip_rajbhasha_portal/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);
                        $.ajax({
                            url: "{{ route('bsip.rajbhasha.portal.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Rajbhasha Event added successfully!"
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
                        toastr.error("Recaptcha verification failed. Please try again.");
                        submitBtn.prop("disabled", false);
                        spinner.addClass("d-none");
                    });
                });
            });

            var table = $('#newsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('bsip.rajbhasha.portal.list') }}",
                    type: "GET",
                    data: function(d) {
                        d.customParam = 'value';
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
                        data: "title",
                        name: "title"
                    },
                    {
                        data: "date",
                        name: "date"
                    },
                    {
                        data: "description",
                        name: "description"
                    },
                    {
                        data: "pdf_file",
                        name: "pdf_file",
                        render: function(data) {
                            return `<div style="display: flex; justify-content: center; align-items: center;">
                                ${data ? `<a href="${data}" target="_blank" style="text-decoration: none;">
                                                                                                <i class="fas fa-file-pdf" style="font-size: 24px; color: #df0d17;"></i>
                                                                                            </a>` : `<span>-</span>`}
                            </div>`;
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
                    url: "{{ route('bsip.rajbhasha.portal.toggleStatus') }}",
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

            $(document).on('change', '.toggle-archived-status', function() {
                const checkbox = $(this);
                let id = $(this).data('id');
                let status = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: "{{ route('bsip.rajbhasha.portal.toggleArchivedStatus') }}",
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
            })


            $(document).on('click', '.edit-bsip-rajbhasha-portal', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/bsip_rajbhasha_portal/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editId').val(response.id);
                        $('#editTitle').val(response.title);
                        $('#editTitleHin').val(response.title_hin);
                        $('#editDate').val(response.date);
                        $('#editDescription').val(response.description);
                        $('#editDescriptionHin').val(response.description_hin);
                        $('#editImagePreview').empty();
                        if (response.images) {
                            if (response.images.length > 0) {
                                $.each(response.images, function(index, image) {
                                    $('#editImagePreview').append(
                                        `<div class="image-preview" style="position: relative; margin-right: 10px;">
                                        <img src="${image}" alt="Image" style="width: 100px; height: 100px; object-fit: cover;">
                                        <button type="button" class="btn btn-danger btn-sm remove-image" data-id="${index}" data-image="${image}" style="position: absolute; top: 0; right: 0;">X</button>
                                    </div>`
                                    );
                                });
                            } else {
                                $('#editImagePreview').append(
                                    '<div class="alert alert-danger w-100 p-1 mt-1">No images uploaded.</div>'
                                );
                            }
                        } else {
                            $('#editImagePreview').append(
                                '<div class="alert alert-danger w-100 p-1 mt-1">No images uploaded.</div>'
                            );
                        }


                        $('#editNewsModal').find('.text-danger').text('');
                        $('#editNewsModal').modal('show');
                    }
                });
            });
            $(document).on('click', '.remove-image', function() {
                let imageName = $(this).data('image');
                $(this).closest('.image-preview').remove();
                $('#editNewsForm').append('<input type="hidden" name="removed_images[]" value="' +
                    imageName + '">');
            });

            $('#editNewsForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editId').val();

                $.ajax({
                    url: "/bsip_rajbhasha_portal/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editNewsModal').modal('hide');
                        $('#editNewsForm').trigger('reset');
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
