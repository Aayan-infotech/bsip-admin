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
                                <li class="breadcrumb-item"><a href="{{ route('research_highlights') }}">Add Research
                                        Highlights</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addResearchHighlight" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Year:</label>
                                    <input type="text" name="year" class="form-control">
                                    <span class="text-danger error-year"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Link</label>
                                    <input type="text" name="link" class="form-control">
                                    <span class="text-danger error-link"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12 ">
                                    <label>Title:</label>
                                    <input type="text" name="title" class="form-control">
                                    <span class="text-danger error-title"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Title (Hindi):</label>
                                    <input type="text" name="hin_title" class="form-control">
                                    <span class="text-danger error-hin_title"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload English File:</label>
                                    <input type="file" name="english_file" class="form-control" accept=".pdf">
                                    <span class="text-danger error-english_file"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload Hindi File:</label>
                                    <input type="file" name="hindi_file" class="form-control" accept=".pdf">
                                    <span class="text-danger error-hindi_file"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add Research Highlight
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="yajraTable table table-bordered table-hover align-middle pt-3 w-full m-0"
                                id="researchHighlights">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Year</th>
                                        <th>Title</th>
                                        <th>Title (Hindi)</th>
                                        <th>Link</th>
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
    <div id="editResearchHighlightModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Research Highlight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editResearchHighlightForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editResearchHighlightId">
                        <div class="mb-3">
                            <label>Year:</label>
                            <input type="text" id="editYear" name="year" class="form-control" >
                            <span class="text-danger erroredit-year"></span>
                        </div>
                        <div class="mb-3">
                            <label>Link:</label>
                            <input type="text" id="editLink" name="link" class="form-control" >
                            <span class="text-danger erroredit-link"></span>
                        </div>
                        <div class="mb-3">
                            <label>Title:</label>
                            <input type="text" id="editTitle" name="title" class="form-control" >
                            <span class="text-danger erroredit-title"></span>
                        </div>
                        <div class="mb-3">
                            <label>Title (Hindi):</label>
                            <input type="text" id="editHinTitle" name="hin_title" class="form-control" >
                            <span class="text-danger erroredit-hin_title"></span>
                        </div>
                        <div class="mb-3">
                            <label>Upload English File:</label>
                            <input type="file" name="english_file" class="form-control" accept=".pdf">
                            <span class="text-danger erroredit-english_file"></span>
                        </div>
                        <div class="mb-3">
                            <label>Upload Hindi File:</label>
                            <input type="file" name="hindi_file" class="form-control" accept=".pdf">
                            <span class="text-danger erroredit-hindi_file"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Research Highlight</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #researchHighlights {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addResearchHighlight").trigger("reset");
            $("#addResearchHighlight").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");


                $(".text-danger").text("");


                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'research_highlights/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);
                        console.log("Token",)

                        $.ajax({
                            url: "{{ route('research_highlights.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Research highlight added successfully!"
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

            var table = $('#researchHighlights').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('research.highlights.list') }}",
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
                        data: "year",
                        name: "year"
                    },
                    {
                        data: "title",
                        name: "title"
                    },
                    {
                        data: "hin_title",
                        name: "hin_title"
                    },
                    {
                        data: "link",
                        name: "link",
                        render: function(data) {
                            return `<a href="${data}" target="_blank" >${data}</a>`;
                        }
                    },
                    {
                        data: "english_file",
                        name: "english_file",
                        render: function(data) {
                            return `<div style="display: flex; justify-content: center; align-items: center;">
                                ${data ? `<a href="${data}" target="_blank" style="text-decoration: none;">
                                                        <i class="fas fa-file-pdf" style="font-size: 24px; color: #df0d17;"></i>
                                                    </a>` : `<span>-</span>`}
                            </div>`;
                        }
                    },
                    {
                        data: "hindi_file",
                        name: "hindi_file",
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
                    url: "{{ route('research_highlights.toggleStatus') }}",
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
                    url: "{{ route('research_highlights.toggleArchivedStatus') }}",
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



            $(document).on('click', '.edit-research-highlight', function() {
                let id = $(this).data('id');
                console.log(id);

                $.ajax({
                    url: "/research_highlights/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editResearchHighlightId').val(response.id);
                        $('#editTitle').val(response.title);
                        $('#editHinTitle').val(response.hin_title);
                        $('#editLink').val(response.link);
                        $('#editYear').val(response.year);
                        $('#editResearchHighlightModal').find('.text-danger').text('');
                        $('#editResearchHighlightModal').modal('show');
                    }
                });
            });

            $('#editResearchHighlightForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editResearchHighlightId').val();

                $.ajax({
                    url: "/research_highlights/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editResearchHighlightModal').modal('hide');
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

        // function formatDate(dateString) {
        //     if (!dateString) return '';
        //     const date = new Date(dateString);
        //     return new Intl.DateTimeFormat('en-GB', {
        //         day: '2-digit',
        //         month: 'short',
        //         year: 'numeric'
        //     }).format(date);
        // }
    </script>
@endsection
