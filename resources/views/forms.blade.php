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
                            <li class="breadcrumb-item active" aria-current="page">Forms</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <form id="addForm" action="{{ route('forms.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="document" class="form-label">Document</label>
                            <input type="file" class="form-control" id="document" name="document">
                            <span class="text-danger error-document"></span>
                        </div>
                        <div class="mb-3">
                            <label for="hin_document" class="form-label">Hindi Document</label>
                            <input type="file" class="form-control" id="hin_document" name="hin_document">
                            <span class="text-danger error-hin_document"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Form</button>
                    </form>
                </div>

                <div class="card-body">
                    <table class="yajraTable table table-bordered table-hover align-middle" id="forms-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Title (Hindi)</th>
                                <th>PDF</th>
                                <th>Document</th>
                                <th>Hindi Document</th>
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

<!-- Edit Form Modal -->
<div id="editFormModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="editFormId" name="id">
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
                        <label for="editDocument" class="form-label">Document</label>
                        <input type="file" id="editDocument" name="document" class="form-control">
                        <small class="text-muted">Leave blank to keep the current document.</small>
                    </div>
                    <div class="mb-3">
                        <label for="editHinDocument" class="form-label">Hindi Document</label>
                        <input type="file" id="editHinDocument" name="hin_document" class="form-control">
                        <small class="text-muted">Leave blank to keep the current Hindi document.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Form</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#forms-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('forms.data') }}",
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
                    data: 'document',
                    name: 'document',
                    render: function(data) {
                        return `<a href="/storage/${data}" target="_blank">View Document</a>`;
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'hin_document',
                    name: 'hin_document',
                    render: function(data) {
                        return `<a href="/storage/${data}" target="_blank">View Hindi Document</a>`;
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

        // Add Form Submission
        $('#addForm').on('submit', function(e) {
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
                        url: "{{ route('forms.store') }}",
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

        // Edit Form
        $(document).on('click', '.edit-forms', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "/forms/edit/" + id,
                type: "GET",
                success: function(response) {
                    $('#editFormId').val(response.id);
                    $('#editTitle').val(response.title);
                    $('#editHinTitle').val(response.hin_title);
                    $('#editFormModal').modal('show');
                }
            });
        });

        // Update Form Submission
        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#editFormId').val();
            let formData = new FormData(this);

            $.ajax({
                url: "/forms/update/" + id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success(response.message);
                    $('#editFormModal').modal('hide');
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

        // Toggle Status
        $(document).on('click', '.toggle-status', function() {
            const checkbox = $(this);
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('forms.toggleStatus') }}",
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

        // Toggle Archived Status
        $(document).on('change', '.toggle-archived-status', function() {
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 'Yes' : 'No';

            $.ajax({
                url: "{{ route('forms.toggleArchivedStatus') }}",
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
