@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="3" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Staff Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('staff.sub.category') }}">Staff Sub Category</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>
                        <!-- User Registration Form -->
                        <form id="addStaffSubCategory" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-12 ">
                                    <label>Select Category:</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-category_id"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Staff Sub Category:</label>
                                    <input type="text" name="staff_sub_category" class="form-control">
                                    <span class="text-danger error-staff_sub_category"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Staff Sub Category (Hindi):</label>
                                    <input type="text" name="staff_sub_category_hin" class="form-control">
                                    <span class="text-danger error-staff_sub_category_hin"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add Sub Category
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="yajraTable table table-bordered table-hover align-middle pt-3 w-full m-0"
                                id="subCategoryTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Sub Category(Hindi)</th>
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
    <div id="editSubCategoryModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSubCategoryForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label>Select Category:</label>
                            <select name="category_id" class="form-control" id="editCategoryId">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-category_id"></span>
                        </div>
                        <div class="mb-3">
                            <label>Sub Category:</label>
                            <input type="text" name="staff_sub_category" id="editSubCategory" class="form-control">
                            <span class="text-danger erroredit-staff_sub_category"></span>
                        </div>
                        <div class="mb-3">
                            <label>Sub Category (Hindi):</label>
                            <input type="text" name="staff_sub_category_hin" id="editSubCategoryHin"
                                class="form-control">
                            <span class="text-danger erroredit-staff_sub_category_hin"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #subCategoryTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            $("#addStaffSubCategory").trigger("reset");
            $("#addStaffSubCategory").on("submit", function(e) {
                e.preventDefault();
                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");
                $(".text-danger").text("");
                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'staff_sub_category/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);
                        $.ajax({
                            url: "{{ route('staff.sub.category.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Sub Category added successfully!"
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
            const table = $('#subCategoryTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('staff.sub.category.list') }}",
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
                        data: "category.category_name",
                        name: "category.category_name"
                    },
                    {
                        data: "sub_category_name",
                        name: "sub_category_name"
                    },
                    {
                        data: "sub_category_name_hin",
                        name: "sub_category_name_hin"
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
                    url: "{{ route('staff.sub.category.toggleStatus') }}",
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


            $(document).on('click', '.edit-sub-category', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/staff_sub_category/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        $('#editId').val(response.id);
                        $('#editCategoryId').val(response.category_id);
                        $('#editSubCategory').val(response.sub_category_name);
                        $('#editSubCategoryHin').val(response.sub_category_name_hin);
                        $('#editSubCategoryModal').find('.text-danger').text('');
                        $('#editSubCategoryModal').modal('show');
                    }
                });
            });

            $('#editSubCategoryForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editId').val();

                $.ajax({
                    url: "/staff_sub_category/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editSubCategoryModal').modal('hide');
                        $('#editSubCategoryForm').trigger('reset');
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
