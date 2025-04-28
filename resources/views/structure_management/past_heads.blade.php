@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="6" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Structure Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('past.heads') }}">Past Heads</a>
                                </li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addPastHeads" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control">
                                    <span class="text-danger error-name"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Name (Hindi):</label>
                                    <input type="text" name="hin_name" class="form-control">
                                    <span class="text-danger error-hin_name"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>From Month</label>
                                    <select class="form-select" id="form_month" name="from_month">
                                        <option value="">From month</option>
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                    <span class="text-danger error-from_month"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>From Year</label>
                                    <select class="form-select year-dropdown" id="year" name="from_year">
                                        <option value="">From Year</option>
                                    </select>
                                    <span class="text-danger error-from_year"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>To Month</label>
                                    <select class="form-select" id="to_month" name="to_month">
                                        <option value="">To month</option>
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                    <span class="text-danger error-to_month"></span>
                                </div>
                                <div class="col-md-6 col-12 mb-3">
                                    <label>To Year</label>
                                    <select class="form-select year-dropdown" id="to_year" name="to_year">
                                        <option value="">To Year</option>
                                    </select>
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
                                id="pastHeadTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Name (Hindi)</th>
                                        <th>From </th>
                                        <th>To </th>
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
    <div id="editPastHeadModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Past Head</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPastHeadForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editPastHeadId">

                        <div class="mb-3">
                            <label>Past Head Name:</label>
                            <input type="text" id="editPastHeadName" name="name" class="form-control">
                            <span class="text-danger erroredit-name"></span>
                        </div>
                        <div class="mb-3">
                            <label>Past Head Name (Hindi):</label>
                            <input type="text" id="editHinPastHeadName" name="hin_name"
                                class="form-control">
                            <span class="text-danger erroredit-hin_name"></span>
                        </div>
                        <div class="mb-3">
                            <label>From Month:</label>
                            <select class="form-select" id="editFromMonth" name="from_month">
                                <option value="">Select Month</option>
                                <option value="january">January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                            <span class="text-danger erroredit-from_month"></span>
                        </div>
                        <div class="mb-3">
                            <label>From Year:</label>
                            <select class="form-select year-dropdown" id="editFromYear" name="from_year">
                                <option value="">Select Year</option>
                            </select>
                            <span class="text-danger erroredit-from_year"></span>
                        </div>
                        <div class="mb-3">
                            <label>To Month:</label>
                            <select class="form-select" id="editToMonth" name="to_month">
                                <option value="">Select Month</option>
                                <option value="january">January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                            <span class="text-danger erroredit-to_month"></span>
                        </div>
                        <div class="mb-3">
                            <label>To Year:</label>
                            <select class="form-select year-dropdown" id="editToYear" name="to_year">
                                <option value="">Select Year</option>
                            </select>
                            <span class="text-danger erroredit-to_year"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #pastHeadTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {

            const currentYear = new Date().getFullYear();
            const startYear = 1950;

            for (let year = currentYear; year >= startYear; year--) {
                $('.year-dropdown').each(function() {
                    $(this).append(`<option value="${year}">${year}</option>`);
                });
            }


            $("#addPastHeads").trigger("reset");
            $("#addPastHeads").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");
                $(".text-danger").text("");

                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'past_heads/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);

                        $.ajax({
                            url: "{{ route('past.heads.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Past head added successfully!"
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

            var table = $('#pastHeadTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('past.heads.list') }}",
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
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "hin_name",
                        name: "hin_name"
                    },
                    {
                        data:"from",
                        name: "from"
                    },
                    {
                        data:"to",
                        name: "to"
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
                    url: "{{ route('past.heads.toggleStatus') }}",
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

            $(document).on('click', '.edit-past-head', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: "/past_heads/edit/" + id, // Updated URL to match the correct route
                    type: "GET",
                    success: function(response) {
                        $('#editPastHeadId').val(response.id);
                        $('#editHinPastHeadName').val(response.hin_name);
                        $('#editPastHeadName').val(response.name);
                        $('#editFromMonth').val(response.from_month);
                        $('#editFromYear').val(response.from_year);
                        $('#editToMonth').val(response.to_month);
                        $('#editToYear').val(response.to_year);
                        $('#editPastHeadModal').find('.text-danger').text('');
                        $('#editPastHeadModal').modal('show');
                    }
                });
            });

            $('#editPastHeadForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editPastHeadId').val();

                $.ajax({
                    url: "/past_heads/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editPastHeadModal').modal('hide');
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
