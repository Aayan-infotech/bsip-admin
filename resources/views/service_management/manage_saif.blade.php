@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="9" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Service Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('manage.saif') }}">Manage SAIF</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addSAIF" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Instrument Name:</label>
                                    <input type="text" name="instrument_name" class="form-control">
                                    <span class="text-danger error-instrument_name"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Instrument Name(Hindi):</label>
                                    <input type="text" name="instrument_name_hin" class="form-control">
                                    <span class="text-danger error-instrument_name_hin"></span>
                                </div>
                                <div class="mb-3 col-12">
                                    <label>Related Scientist</label>
                                    <select name="related_scientist" class="form-control">
                                        <option value="">Select Scientist</option>
                                        @foreach ($scientists as $scientist)
                                            <option value="{{ $scientist->id }}">{{ $scientist->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-related_scientist"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Description:</label>
                                    <textarea name="description" class="form-control"></textarea>
                                    <span class="text-danger error-description"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Description(Hindi):</label>
                                    <textarea name="description_hin" class="form-control"></textarea>
                                    <span class="text-danger error-description_hin"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload Image:</label>
                                    <input type="file" name="image" class="form-control">
                                    <span class="text-danger error-image"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload PDF:</label>
                                    <input type="file" name="pdf_file" class="form-control" accept=".pdf">
                                    <span class="text-danger error-pdf_file"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add SAIF
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        {{-- <div class="table-responsive"> --}}
                        <table class="yajraTable table table-bordered table-hover align-middle pt-1 w-full m-0 nowrap"
                            id="SAIFTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Instrument Name</th>
                                    <th>Instrument Name(Hindi)</th>
                                    <th>Scientist</th>
                                    <th>Scientist(Hindi)</th>
                                    <th>Description</th>
                                    <th>Description(Hindi)</th>
                                    <th>Image</th>
                                    <th>PDF</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editSAIFModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit SAIF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSAIFForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editSAIFId">
                        <div class="mb-3">
                            <label>Instrument Name:</label>
                            <input type="text" id="editInstrumentName" name="instrument_name" class="form-control">
                            <span class="text-danger erroredit-instrument_name"></span>
                        </div>
                        <div class="mb-3">
                            <label>Instrument Name(Hindi):</label>
                            <input type="text" id="editInstrumentNameHin" name="instrument_name_hin"
                                class="form-control">
                            <span class="text-danger erroredit-instrument_name_hin"></span>
                        </div>
                        <div class="mb-3">
                            <label>Related Scientist:</label>
                            <select id="editRelatedScientist" name="related_scientist" class="form-control">
                                <option value="">Select Scientist</option>
                                @foreach ($scientists as $scientist)
                                    <option value="{{ $scientist->id }}">{{ $scientist->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger erroredit-related_scientist"></span>
                        </div>
                        <div class="mb-3">
                            <label>Description:</label>
                            <textarea id="editDescription" name="description" class="form-control"></textarea>
                            <span class="text-danger erroredit-description"></span>
                        </div>
                        <div class="mb-3">
                            <label>Description(Hindi):</label>
                            <textarea id="editDescriptionHin" name="description_hin" class="form-control"></textarea>
                            <span class="text-danger erroredit-description_hin"></span>
                        </div>
                        <div class="mb-3">
                            <label>Upload Image:</label>
                            <input type="file" id="editImage" name="image" class="form-control">
                            <span class="text-danger erroredit-image"></span>
                        </div>
                        <div class="mb-3">
                            <label>Upload PDF:</label>
                            <input type="file" id="editPdfFile" name="pdf_file" class="form-control" accept=".pdf">
                            <span class="text-danger erroredit-pdf_file"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        #SAIFTable {
            width: 100% !important;
        }

        .fixed-width-desc {
            max-width: 200px;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {


            $("#addSAIF").trigger("reset");
            $("#addSAIF").on("submit", function(e) {
                e.preventDefault();
                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");
                $(".text-danger").text("");
                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'manage_saif/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);
                        $.ajax({
                            url: "{{ route('manage.saif.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "SAIF Details added successfully!"
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

            var table = $('#SAIFTable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{{ route('manage.saif.list') }}",
                    type: "GET",
                    data: function(d) {
                        d.customParam = 'value';
                    },
                    error: function(xhr, error, code) {
                        console.log(xhr.responseText);
                    }
                },
                columnDefs: [{
                    targets: [5, 6],
                    className: 'fixed-width-desc'
                }],
                columns: [{
                        data: "id",
                        name: "sr"
                    },
                    {
                        data: "instrument_name",
                        name: "instrument_name",
                    },
                    {
                        data: "instrument_name_hin",
                        name: "instrument_name_hin",
                    },

                    {
                        data: "scientist.name",
                        name: "scientist.name",
                    },
                    {
                        data: "scientist.name_hin",
                        name: "scientist.name_hin",
                    },
                    {
                        data: "description",
                        name: "description",
                    },
                    {
                        data: "description_hin",
                        name: "description_hin",
                    },
                    {
                        data: "image",
                        name: "image",
                        render: function(data) {
                            return `<div style="display: flex; justify-content: center; align-items: center;">
                                ${data ? `<a href="${data}" target="_blank">
                                        <img src="${data}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;">
                                        </a>` : `<span>-</span>`}
                            </div>`;
                        }
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
                    url: "{{ route('manage.saif.toggleStatus') }}",
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
                    url: "{{ route('manage.saif.toggleArchivedStatus') }}",
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


            $(document).on('click', '.edit-saif', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/manage_saif/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        console.log(response);
                        $('#editSAIFId').val(response.id);
                        $('#editInstrumentName').val(response.instrument_name);
                        $('#editInstrumentNameHin').val(response.instrument_name_hin);
                        $('#editRelatedScientist').val(response.employee_id);
                        $('#editDescription').val(response.description);
                        $('#editDescriptionHin').val(response.description_hin);

                        $('#editSAIFModal').find('.text-danger').text('');
                        $('#editSAIFModal').modal('show');
                    }
                });
            });


            $('#editSAIFForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                let id = $('#editSAIFId').val();
                $.ajax({
                    url: "/manage_saif/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editSAIFModal').modal('hide');
                        $('#editSAIFForm').trigger('reset');
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
