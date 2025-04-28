@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.webContentSidebar')

        <!-- Main Content -->
        <div class="col-md-10 col-sm-9">
            <div class="card mt-3">
                <div class="card-header">
                    <nav aria-label="breadcrumb" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Web Content Management</li>
                            <li class="breadcrumb-item active" aria-current="page">Past Events</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <form id="addPastEventForm" action="{{ route('pastEvents.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title (English)</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            <span class="text-danger error-title"></span>
                        </div>
                        <div class="mb-3">
                            <label for="hin_title" class="form-label">Title (Hindi)</label>
                            <input type="text" class="form-control" id="hin_title" name="hin_title" required>
                            <span class="text-danger error-hin_title"></span>
                        </div>
                        <div class="mb-3">
                            <label for="pdf" class="form-label">PDF</label>
                            <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf" required>
                            <span class="text-danger error-pdf"></span>
                        </div>
                        <div class="mb-3">
                            <label for="facebook_url" class="form-label">Facebook URL</label>
                            <input type="url" class="form-control" id="facebook_url" name="facebook_url" >
                            <span class="text-danger error-facebook_url"></span>
                        </div>
                        <div class="mb-3">
                            <label for="youtube_url" class="form-label">YouTube URL</label>
                            <input type="url" class="form-control" id="youtube_url" name="youtube_url" >
                            <span class="text-danger error-youtube_url"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Past Event</button>
                    </form>
                </div>

                <div class="card-body">
                    <table class="yajraTable table table-bordered table-hover align-middle" id="pastEvents-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Title (Hindi)</th>
                                <th>PDF</th>
                                <th>Facebook URL</th>
                                <th>YouTube URL</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Past Event Modal -->
<div id="editPastEventModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Past Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPastEventForm">
                    @csrf
                    <input type="hidden" id="editPastEventId" name="id">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Title (English)</label>
                        <input type="text" id="editTitle" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHinTitle" class="form-label">Title (Hindi)</label>
                        <input type="text" id="editHinTitle" name="hin_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPdf" class="form-label">PDF</label>
                        <input type="file" id="editPdf" name="pdf" class="form-control" accept="application/pdf">
                        <small class="text-muted">Leave blank to keep the current PDF.</small>
                    </div>
                    <div class="mb-3">
                        <label for="editFacebookUrl" class="form-label">Facebook URL</label>
                        <input type="url" id="editFacebookUrl" name="facebook_url" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="editYoutubeUrl" class="form-label">YouTube URL</label>
                        <input type="url" id="editYoutubeUrl" name="youtube_url" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary">Update Past Event</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#pastEvents-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pastEvents.data') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'hin_title',
                    name: 'hin_title'
                },
                {
                    data: 'pdf',
                    name: 'pdf',
                    render: function(data) {
                        return `
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <a href="/storage/${data}" target="_blank" style="text-decoration: none;">
                                    <i class="fas fa-file-pdf" style="font-size: 24px; color: #df0d17;"></i>
                                </a>
                            </div>`;
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'facebook_url',
                    name: 'facebook_url'
                },
                {
                    data: 'youtube_url',
                    name: 'youtube_url'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // Add Past Event Form Submission
        $('#addPastEventForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            $(".text-danger").text("");

            grecaptcha.ready(function() {
                grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                    action: 'sliders/store'
                }).then(function(token) {
                    let formData = new FormData(form[0]);
                    formData.append('g-recaptcha-response', token);
                    $.ajax({
                        url: "{{ route('pastEvents.store') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            toastr.success(response.message);
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
                                toastr.error("Something went wrong! Please try again.");
                            }
                        }
                    });
                });
            });
        });

        // Edit Past Event
        $(document).on('click', '.edit-past-event', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "/pastEvents/edit/" + id,
                type: "GET",
                success: function(response) {
                    $('#editPastEventId').val(response.id);
                    $('#editTitle').val(response.title);
                    $('#editHinTitle').val(response.hin_title);
                    $('#editFacebookUrl').val(response.facebook_url);
                    $('#editYoutubeUrl').val(response.youtube_url);
                    $('#editPastEventModal').modal('show');
                }
            });
        });

        // Update Past Event Form Submission
        $('#editPastEventForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#editPastEventId').val();
            let formData = new FormData(this);

            $.ajax({
                url: "/pastEvents/update/" + id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success(response.message);
                    $('#editPastEventModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                }
            });
        });
        $(document).on('click', '.toggle-status', function() {
            const checkbox = $(this);
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('pastEvents.toggleStatus') }}",
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
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 'Yes' : 'No';

            $.ajax({
                url: "{{ route('pastEvents.toggleArchivedStatus') }}",
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
                    toastr.error("Failed to update archived status. Please try again.");
                }
            });
        });
    });
</script>
@endsection