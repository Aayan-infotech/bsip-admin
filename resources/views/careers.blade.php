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
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Web Content Management</li>
                            <li class="breadcrumb-item active" aria-current="page">Careers</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <form id="addCareerForm" action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf">
                            <span class="text-danger error-pdf"></span>
                        </div>
                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="url" class="form-control" id="url" name="url">
                            <span class="text-danger error-url"></span>
                        </div>
                        <div class="mb-3">
                            <label for="interview_date" class="form-label">Interview Date</label>
                            <input type="date" class="form-control" id="interview_date" name="interview_date" required>
                            <span class="text-danger error-interview_date"></span>
                        </div>
                        <div class="mb-3">
                            <label for="last_date" class="form-label">Last Date</label>
                            <input type="date" class="form-control" id="last_date" name="last_date" required>
                            <span class="text-danger error-last_date"></span>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Interview Time</label>
                            <div class="d-flex">
                                <select class="form-control me-2" id="hour" name="hour" required>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                                <select class="form-control" id="minute" name="minute" required>
                                    @for ($i = 0; $i < 60; $i+=5)
                                        <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                </select>
                                <select class="form-control" id="ampm" name="ampm" required>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                            <span class="text-danger error-time"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Career</button>
                    </form>
                </div>

                <div class="card-body">
                    <table class="yajraTable table table-bordered table-hover align-middle" id="careers-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Title (Hindi)</th>
                                <th>Interview Date</th>
                                <th>Interview Time</th>
                                <th>Last Date</th>
                                <th>PDF</th>
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
<div id="editCareerModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Career</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editCareerForm">
                    @csrf
                    <input type="hidden" id="editCareerId" name="id">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Title (English):</label>
                        <input type="text" id="editTitle" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHinTitle" class="form-label">Title (Hindi):</label>
                        <input type="text" id="editHinTitle" name="hin_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPdf" class="form-label">PDF:</label>
                        <input type="file" id="editPdf" name="pdf" class="form-control" accept="application/pdf">
                        <small class="text-muted">Leave blank to keep the current PDF.</small>
                    </div>
                    <div class="mb-3">
                        <label for="editUrl" class="form-label">URL:</label>
                        <input type="url" id="editUrl" name="url" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="editInterviewDate" class="form-label">Interview Date:</label>
                        <input type="date" id="editInterviewDate" name="interview_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editInterviewLastDate" class="form-label">Last Date:</label>
                        <input type="date" id="editInterviewLastDate" name="last_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTime" class="form-label">Interview Time:</label>
                        <div class="d-flex">
                            <select class="form-control me-2" id="editHour" name="hour" required>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                            <select class="form-control" id="editMinute" name="minute" required>
                                @for ($i = 0; $i < 60; $i+=5)
                                    <option value="{{ $i }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                    @endfor
                            </select>
                            <select class="form-control" id="editAmpm" name="ampm" required>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Career</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#careers-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('careers.data') }}",
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
                    data: 'interview_date',
                    name: 'interview_date'
                },
                {
                    data: 'interview_time',
                    name: 'interview_time'
                },
                {
                    data: 'last_date',
                    name: 'last_date'
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

        $('#addCareerForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);

            // Clear previous error messages
            $(".text-danger").text("");

            grecaptcha.ready(function() {
                grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                    action: 'sliders/store'
                }).then(function(token) {
                    let formData = new FormData(form[0]);
                    formData.append('g-recaptcha-response', token);

                    $.ajax({
                        url: "{{ route('careers.store') }}",
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

        $(document).on('click', '.edit-career', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "/careers/edit/" + id,
                type: "GET",
                success: function(response) {
                    $('#editCareerId').val(response.id);
                    $('#editTitle').val(response.title);
                    $('#editHinTitle').val(response.hin_title);
                    $('#editUrl').val(response.url);
                    $('#editInterviewDate').val(response.interview_date);
                    $('#editInterviewLastDate').val(response.last_date);
                    $('#editHour').val(response.hour);
                    $('#editMinute').val(response.minute);
                    $('#editAmpm').val(response.ampm);
                    $('#editCareerModal').modal('show');
                }
            });
        });

        $('#editCareerForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#editCareerId').val();
            let formData = new FormData(this);

            $.ajax({
                url: "/careers/update/" + id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success(response.message);
                    $('#editCareerModal').modal('hide');
                    $('#careers-table').DataTable().ajax.reload();
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
        $(document).on('change', '.toggle-archived-status', function() {
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 'Yes' : 'No';

            $.ajax({
                url: "{{ route('careers.toggleArchivedStatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(response) {
                    toastr.success(response.success);
                    $('#careers-table').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    toastr.error("Failed to update archived status. Please try again.");
                }
            });
        });
        $(document).on('click', '.toggle-status', function() {

            const checkbox = $(this);
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('careers.toggleStatus') }}",
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
    });
</script>
@endsection
