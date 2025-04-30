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
                                <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Staff Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('staff.master') }}">Staff Master</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addStaff" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-12 ">
                                    <label>Staff Type:</label>
                                    <select name="staff_type" class="form-control">
                                        <option value="">Select Staff Type</option>
                                        <option value="Scientist">Scientist</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <span class="text-danger error-staff_type"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Staff Category:</label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        <option value="">Select Staff Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-category_id"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Sub Category:</label>
                                    <select name="sub_category_id" class="form-control" id="sub_category_id">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                    <span class="text-danger error-sub_category_id"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control">
                                    <span class="text-danger error-name"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Name (Hindi):</label>
                                    <input type="text" name="name_hin" class="form-control">
                                    <span class="text-danger error-name_hin"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Telephone Extension</label>
                                    <input type="text" name="telephone_extension" class="form-control">
                                    <span class="text-danger error-telephone_extension"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label for="personal_telephone">Personal Telephone</label>
                                    <input type="text" name="personal_telephone" class="form-control"
                                        id="personal_telephone">
                                    <span class="text-danger error-personal_telephone"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label for="mobile_no">Mobile Number:</label>
                                    <input type="text" name="mobile_no" class="form-control" id="mobile_no">
                                    <span class="text-danger error-mobile_no"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label for="alternate_mobile_no">Alternate Mobile No:</label>
                                    <input type="number" name="alternate_mobile_no" class="form-control"
                                        id="alternate_mobile_no">
                                    <span class="text-danger error-alternate_mobile_no"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    <span class="text-danger error-email"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label for="alternate_email">Alternate Email:</label>
                                    <input type="email" name="alternate_email" class="form-control" id="alternate_email">
                                    <span class="text-danger error-alternate_email"></span>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label for="joining_date">Joining Date:</label>
                                    <input type="date" name="joining_date" class="form-control" id="joining_date">
                                    <span class="text-danger error-joining_date"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label for="exit_date">Exit Date:</label>
                                    <input type="date" name="exit_date" class="form-control" id="exit_date">
                                    <span class="text-danger error-exit_date"></span>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="superannuation_date">Superannuation date</label>
                                    <input type="date" name="superannuation_date" class="form-control"
                                        id="superannuation_date">
                                    <span class="text-danger error-superannuation_date"></span>
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label>Profile Picture:</label>
                                    <input type="file" name="profile_picture" class="form-control">
                                    <span class="text-danger error-profile_picture"></span>
                                </div>
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Upload CV:</label>
                                    <input type="file" name="cv_file" class="form-control" accept=".pdf">
                                    <span class="text-danger error-cv_file"></span>
                                </div>
                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Add Staff Member
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>


                    <div class="card-body">
                        {{-- <div class="table-responsive"> --}}
                        <table class="yajraTable table table-bordered table-hover align-middle pt-1 w-full m-0 nowrap"
                            id="staffTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Staff type</th>
                                    <th>Staff Category</th>
                                    <th>Staff Sub Category</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Personal Telephone</th>
                                    <th>Mobile No</th>
                                    <th>Alternate Mobile No</th>
                                    <th>Joining Date</th>
                                    <th>Profile Picture</th>
                                    <th>CV</th>
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
    <div id="editStaffModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editStaffForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editStaffId">
                        <div class="mb-3">
                            <label for="editStaffType">Staff type:</label>
                            <select id="editStaffType" name="staff_type" class="form-control">
                                <option value="">Select Staff Type</option>
                                <option value="Scientist">Scientist</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="text-danger erroredit-staff_type"></span>
                        </div>
                        <div class="mb-3">
                            <label>Staff Category:</label>
                            <select id="editCategoryId" name="category_id" class="form-control">
                                <option value="">Select Staff Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger erroredit-category_id"></span>
                        </div>

                        <div class="mb-3">
                            <label>Sub Category:</label>
                            <select id="editSubCategoryId" name="sub_category_id" class="form-control">
                                <option value="">Select Sub Category</option>
                            </select>
                            <span class="text-danger erroredit-sub_category_id"></span>
                        </div>
                        <div class="mb-3">
                            <label>Name:</label>
                            <input type="text" id="editName" name="name" class="form-control">
                            <span class="text-danger erroredit-name"></span>
                        </div>
                        <div class="mb-3">
                            <label>Name (Hindi):</label>
                            <input type="text" id="editNameHin" name="name_hin" class="form-control">
                            <span class="text-danger erroredit-name_hin"></span>
                        </div>
                        <div class="mb-3">
                            <label>Telephone Extension:</label>
                            <input type="text" id="editTelephoneExtension" name="telephone_extension"
                                class="form-control">
                            <span class="text-danger erroredit-telephone_extension"></span>
                        </div>
                        <div class="mb-3">
                            <label>Personal Telephone:</label>
                            <input type="text" id="editPersonalTelephone" name="personal_telephone"
                                class="form-control">
                            <span class="text-danger erroredit-personal_telephone"></span>
                        </div>
                        <div class="mb-3">
                            <label>Mobile Number:</label>
                            <input type="text" id="editMobileNo" name="mobile_no" class="form-control">
                            <span class="text-danger erroredit-mobile_no"></span>
                        </div>
                        <div class="mb-3">
                            <label>Alternate Mobile No:</label>
                            <input type="text" id="editAlternateMobileNo" name="alternate_mobile_no"
                                class="form-control">
                            <span class="text-danger erroredit-alternate_mobile_no"></span>
                        </div>
                        <div class="mb-3">
                            <label>Email:</label>
                            <input type="email" id="editEmail" name="email" class="form-control">
                            <span class="text-danger erroredit-email"></span>
                        </div>
                        <div class="mb-3">
                            <label>Alternate Email:</label>
                            <input type="email" id="editAlternateEmail" name="alternate_email" class="form-control">
                            <span class="text-danger erroredit-alternate_email"></span>
                        </div>
                        <div class="mb-3">
                            <label>Joining Date:</label>
                            <input type="date" id="editJoiningDate" name="joining_date" class="form-control">
                            <span class="text-danger erroredit-joining_date"></span>
                        </div>
                        <div class="mb-3">
                            <label>Exit Date:</label>
                            <input type="date" id="editExitDate" name="exit_date" class="form-control">
                            <span class="text-danger erroredit-exit_date"></span>
                        </div>
                        <div class="mb-3">
                            <label>Superannuation Date:</label>
                            <input type="date" id="editSuperannuationDate" name="superannuation_date"
                                class="form-control">
                            <span class="text-danger erroredit-superannuation_date"></span>
                        </div>
                        <div class="mb-3">
                            <label>Profile Picture:</label>
                            <input type="file" id="editProfilePicture" name="profile_picture" class="form-control">
                            <span class="text-danger erroredit-profile_picture"></span>
                        </div>
                        <div class="mb-3">
                            <label>Upload CV:</label>
                            <input type="file" id="editCvFile" name="cv_file" class="form-control" accept=".pdf">
                            <span class="text-danger erroredit-cv_file"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        #staffTable {
            width: 100% !important;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {

            $('#category_id').on('change', function() {
                let categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: "{{ route('staff.sub_category') }}",
                        type: "GET",
                        data: {
                            category_id: categoryId
                        },
                        success: function(response) {
                            $('#sub_category_id').empty();
                            $('#sub_category_id').append(
                                '<option value="">Select Sub Category</option>'
                            );
                            $.each(response, function(key, value) {
                                $('#sub_category_id').append(
                                    '<option value="' + value.id + '">' +
                                    value.sub_category_name + '</option>'
                                );
                            });
                        }
                    });
                }
            });

            $('#editCategoryId').on('change', function() {
                let categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: "{{ route('staff.sub_category') }}",
                        type: "GET",
                        data: {
                            category_id: categoryId
                        },
                        success: function(response) {
                            $('#editSubCategoryId').empty();
                            $('#editSubCategoryId').append(
                                '<option value="">Select Sub Category</option>'
                            );
                            $.each(response, function(key, value) {
                                $('#editSubCategoryId').append(
                                    '<option value="' + value.id + '" >' +
                                    value.sub_category_name + '</option>'
                                );
                            });
                        }
                    });
                }
            });

            $("#addStaff").trigger("reset");
            $("#addStaff").on("submit", function(e) {
                e.preventDefault();
                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");
                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");
                $(".text-danger").text("");
                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'staff_master/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);
                        $.ajax({
                            url: "{{ route('staff.master.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Staff Member added successfully!"
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

            var table = $('#staffTable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{{ route('staff.master.list') }}",
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
                        data: "staff_type",
                        name: "staff_type"
                    },
                    {
                        data: "category.category_name",
                        name: "category.category_name",
                    },
                    {
                        data: "sub_category.sub_category_name",
                        name: "sub_category.sub_category_name",
                    },
                    {
                        data:"employee_id",
                        name: "employee_id"
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: 'email',
                        name: "email",
                    },
                    {
                        data: "personal_telephone",
                        name: "personal_telephone"
                    },
                    {
                        data: "mobile_no",
                        name: "mobile_no"
                    },
                    {
                        data: "alternate_mobile_no",
                        name: "alternate_mobile_no"
                    },
                    {
                        data: "joining_date",
                        name: "joining_date"
                    },
                    {
                        data: "profile_picture",
                        name: "profile_picture",
                        render: function(data) {
                            return `<div style="display: flex; justify-content: center; align-items: center;">
                                ${data ? `<img src="${data}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;">` : `<span>-</span>`}
                            </div>`;
                        }
                    },
                    {
                        data: "cv",
                        name: "cv",
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
                    url: "{{ route('staff.master.toggleStatus') }}",
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
                    url: "{{ route('staff.master.toggleArchivedStatus') }}",
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


            $(document).on('click', '.edit-staff', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/staff_master/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        const staff = response.staff;
                        const subCategories = response.sub_categories;
                        $('#editStaffId').val(staff.id);
                        $('#editStaffType').val(staff.staff_type);
                        $('#editCategoryId').val(staff.category_id);
                        $('#editSubCategoryId').empty();
                        $('#editSubCategoryId').append(
                            '<option value="">Select Sub Category</option>'
                        );
                        $.each(subCategories, function(key, value) {
                            $('#editSubCategoryId').append(
                                '<option value="' + value.id + '" ' +
                                (value.id == staff.sub_category_id ? 'selected' :
                                    '') + '>' +
                                value.sub_category_name + '</option>'
                            );
                        });
                        $('#editName').val(response.staff.name);
                        $('#editNameHin').val(response.staff.name_hin);
                        $('#editTelephoneExtension').val(response.staff.telephone_extension);
                        $('#editPersonalTelephone').val(response.staff.personal_telephone);
                        $('#editMobileNo').val(response.staff.mobile_no);
                        $('#editAlternateMobileNo').val(response.staff.alternate_mobile_no);
                        $('#editEmail').val(response.staff.email);
                        $('#editAlternateEmail').val(response.staff.alternate_email);
                        $('#editJoiningDate').val(response.staff.joining_date);
                        $('#editExitDate').val(response.staff.exit_date);
                        $('#editSuperannuationDate').val(response.staff.superannuation_date);
                        $('#editStaffModal').find('.text-danger').text('');
                        $('#editStaffModal').modal('show');
                    }
                });
            });


            $('#editStaffForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                let id = $('#editStaffId').val();
                $.ajax({
                    url: "/staff_master/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editStaffModal').modal('hide');
                        $('#editStaffForm').trigger('reset');
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
