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
                            <li class="breadcrumb-item active" aria-current="page">Tenders</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <form id="addTenderForm" action="{{ route('tenders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="reference_no" class="form-label">Reference No</label>
                            <input type="text" class="form-control" id="reference_no" name="reference_no" required>
                            <span class="text-danger error-reference_no"></span>
                        </div>
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
                            <label for="tender_document" class="form-label">Tender Document (PDF)</label>
                            <input type="file" class="form-control" id="tender_document" name="tender_document" accept="application/pdf" required>
                            <span class="text-danger error-tender_document"></span>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                            <span class="text-danger error-start_date"></span>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                            <span class="text-danger error-end_date"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Tender</button>
                    </form>
                </div>

                <div class="card-body">
                    <table class="yajraTable table table-bordered table-hover align-middle" id="tenders-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Reference No</th>
                                <th>Title</th>
                                <th>Title (Hindi)</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Tender Document</th>
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

<!-- Edit Tender Modal -->
<div id="editTenderModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tender</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTenderForm">
                    @csrf
                    <input type="hidden" id="editTenderId" name="id">
                    <div class="mb-3">
                        <label for="editReferenceNo" class="form-label">Reference No</label>
                        <input type="text" id="editReferenceNo" name="reference_no" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Title (English)</label>
                        <input type="text" id="editTitle" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editHinTitle" class="form-label">Title (Hindi)</label>
                        <input type="text" id="editHinTitle" name="hin_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStartDate" class="form-label">Start Date</label>
                        <input type="date" id="editStartDate" name="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEndDate" class="form-label">End Date</label>
                        <input type="date" id="editEndDate" name="end_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTenderDocument" class="form-label">Tender Document (PDF)</label>
                        <input type="file" class="form-control" id="editTenderDocument" name="tender_document" accept="application/pdf" >
                    </div>
                    <button type="submit" class="btn btn-primary">Update Tender</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#tenders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tenders.data') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'reference_no',
                    name: 'reference_no'
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
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'end_date',
                    name: 'end_date'
                },
                {
                    data: 'tender_document',
                    name: 'tender_document',
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

        // Add Tender Form Submission
        $('#addTenderForm').on('submit', function(e) {
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
                        url: "{{ route('tenders.store') }}",
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

        // Edit Tender
        $(document).on('click', '.edit-tender', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "/tenders/edit/" + id,
                type: "GET",
                success: function(response) {
                    $('#editTenderId').val(response.id);
                    $('#editReferenceNo').val(response.reference_no);
                    $('#editTitle').val(response.title);
                    $('#editHinTitle').val(response.hin_title);
                    $('#editStartDate').val(response.start_date);
                    $('#editEndDate').val(response.end_date);
                    $('#editTenderModal').modal('show');
                }
            });
        });

        // Update Tender Form Submission
        $('#editTenderForm').on('submit', function(e) {
            e.preventDefault();

            let id = $('#editTenderId').val();
            let formData = new FormData(this);

            $.ajax({
                url: "/tenders/update/" + id,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success(response.message);
                    $('#editTenderModal').modal('hide');
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
                url: "{{ route('tenders.toggleStatus') }}",
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
                url: "{{ route('tenders.toggleArchivedStatus') }}",
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