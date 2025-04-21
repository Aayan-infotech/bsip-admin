@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.webContentSidebar')

        <!-- Main Content -->
        <div class="col-md-10 col-sm-9">
            <div class="card mt-3">
                <div class="card-header">
                    <!-- {{ __('User Management') }} -->
                    <nav aria-label="breadcrumb" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Web Content Management</li>
                            <li class="breadcrumb-item"><a href="{{ url('/sliders') }}">Sliders</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <form id="addSliderForm">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <span class="text-danger error-title"></span>
                        </div>
                        <div class="mb-3">
                            <label for="sequence" class="form-label">Sequence</label>
                            <input type="number" step="0.01" class="form-control" id="sequence" name="sequence" required>
                            <span class="text-danger error-sequence"></span>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                            <small class="text-muted">Size: 1450x510 pixels. Max size: 2MB.</small>
                            <span class="text-danger error-image"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>


                <div class="card-body">
                    <table class="yajraTable table table-bordered table-hover align-middle" id="sliders-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Sequence</th>
                                <th>Image</th>
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
<div id="editSliderModal" class="modal right fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Slider</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editSliderForm">
                    @csrf
                    <input type="hidden" id="editSliderId">
                    <div class="mb-3">
                        <label>Title:</label>
                        <input type="text" id="editTitle" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Sequence:</label>
                        <input type="number" step="0.01" id="editSequence" name="sequence" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Image:</label>
                        <input type="file" id="editImage" name="image" class="form-control">
                        <small class="text-muted">Leave blank to keep the current image. Size: 1450x510 pixels.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Slider</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#sliders-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('sliders.data') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'sequence',
                    name: 'sequence'
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data) {
                        return `
        <div style="display: flex; justify-content: center; align-items: center;">
            <img src="/storage/${data}" alt="Slider Image"
                style="width: 120px; height: 80px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
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

        $('#addSliderForm').on('submit', function(e) {
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
                        url: "{{ route('sliders.store') }}",
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

        $(document).on('change', '.toggle-status', function() {
            const checkbox = $(this);
            let id = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('sliders.updateStatus') }}",
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

        $(document).on('click', '.edit-slider', function() {
    let id = $(this).data('id');
    $.ajax({
        url: "/sliders/edit/" + id,
        type: "GET",
        success: function(response) {
            $('#editSliderId').val(response.id);
            $('#editTitle').val(response.title);
            $('#editSequence').val(response.sequence);
            $('#editSliderModal').modal('show');
        }
    });
});

$('#editSliderForm').on('submit', function(e) {
    e.preventDefault();

    let id = $('#editSliderId').val();
    let formData = new FormData(this);

    $.ajax({
        url: "/sliders/update/" + id,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            toastr.success(response.message);
            $('#editSliderModal').modal('hide');
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

    });
</script>
@endsection
