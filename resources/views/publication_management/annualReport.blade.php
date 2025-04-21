@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="5" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Publication Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('annual.report') }}">Annual Report</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addAnnualReport" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Report name:</label>
                                    <input type="text" name="report_name" class="form-control">
                                    <span class="text-danger error-report_name"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Report name(Hindi):</label>
                                    <input type="text" name="report_hin_name" class="form-control">
                                    <span class="text-danger error-report_hin_name"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload English File:</label>
                                    <input type="file" name="report_file" class="form-control" accept=".pdf">
                                    <span class="text-danger error-report_file"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload Hindi File:</label>
                                    <input type="file" name="report_file_hin" class="form-control" accept=".pdf">
                                    <span class="text-danger error-report_file_hin"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>More info:</label>
                                    <textarea name="more_info" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-more_info"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>More info(Hindi):</label>
                                    <textarea name="more_info_hin" class="form-control" rows="3"></textarea>
                                    <span class="text-danger error-more_info_hin"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add Annual Report
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="yajraTable table table-bordered table-hover align-middle pt-3 w-full m-0"
                                id="annualReportTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Report Name</th>
                                        <th>Report Name (Hindi)</th>
                                        <th>File (English)</th>
                                        <th>File (Hindi)</th>
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
    <div id="editAnnualReportModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Annual Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAnnualReportForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editAnnualReportId">
                        <div class="mb-3">
                            <label>Report Name:</label>
                            <input type="text" id="editReportName" name="report_name" class="form-control" >
                            <span class="text-danger erroredit-report_name"></span>
                        </div>

                        <div class="mb-3">
                            <label>Report Name (Hindi):</label>
                            <input type="text" id="editReportHinName" name="report_hin_name" class="form-control" >
                            <span class="text-danger erroredit-report_hin_name"></span>
                        </div>

                        <div class="mb-3">
                            <label>Upload English File:</label>
                            <input type="file" name="report_file" class="form-control" accept=".pdf">
                            <span class="text-danger erroredit-report_file"></span>
                        </div>

                        <div class="mb-3">
                            <label>Upload Hindi File:</label>
                            <input type="file" name="report_file_hin" class="form-control" accept=".pdf">
                            <span class="text-danger erroredit-report_file_hin"></span>
                        </div>

                        <div class="mb-3">
                            <label>More Info:</label>
                            <textarea name="more_info" id="editMoreInfo" class="form-control" rows="3"></textarea>
                            <span class="text-danger erroredit-more_info"></span>
                        </div>

                        <div class="mb-3">
                            <label>More Info (Hindi):</label>
                            <textarea name="more_info_hin" id="editMoreInfoHin" class="form-control" rows="3"></textarea>
                            <span class="text-danger erroredit-more_info_hin"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Annual Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #annualReportTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addAnnualReport").trigger("reset");
            $("#addAnnualReport").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");


                $(".text-danger").text("");


                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'annual_report/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);
                        $.ajax({
                            url: "{{ route('annual.report.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Annual report added successfully!"
                                );
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

            var table = $('#annualReportTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('annual.report.list') }}",
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
                        data: "report_name",
                        name: "report_name"
                    },
                    {
                        data: "report_hin_name",
                        name: "report_hin_name"
                    },
                    {
                        data: "report_file",
                        name: "report_file",
                        render: function(data) {
                            return `<div style="display: flex; justify-content: center; align-items: center;">
                                ${data ? `<a href="${data}" target="_blank" style="text-decoration: none;">
                                                        <i class="fas fa-file-pdf" style="font-size: 24px; color: #df0d17;"></i>
                                                    </a>` : `<span>-</span>`}
                            </div>`;
                        }
                    },
                    {
                        data: "report_file_hin",
                        name: "report_file_hin",
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
                    url: "{{ route('annual.report.toggleStatus') }}",
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
                    url: "{{ route('annual.report.toggleArchivedStatus') }}",
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



            $(document).on('click', '.edit-report', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/annual_report/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editAnnualReportId').val(response.id);
                        $('#editReportName').val(response.report_name);
                        $('#editReportHinName').val(response.report_hin_name);
                        $('#editMoreInfo').val(response.more_info);
                        $('#editMoreInfoHin').val(response.more_info_hin);
                        $('#editAnnualReportModal').find('.text-danger').text('');
                        $('#editAnnualReportModal').modal('show');
                    }
                });
            });

            $('#editAnnualReportForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editAnnualReportId').val();

                $.ajax({
                    url: "/annual_report/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editAnnualReportModal').modal('hide');
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
