@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="8" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Web Content Management</li>
                                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="addBlog" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
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
                                <div class="mb-3 col-md-12 col-12">
                                    <label>Upload Image:</label>
                                    <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                                    <span class="text-danger error-image"></span>
                                </div>

                                <div class="mb-3 col-md-12 col-12">
                                    <label>Description:</label>
                                    <div id="editor"></div>
                                </div>

                                <div class="mb-3 col-md-12 col-12">
                                    <label>Description (Hindi):</label>
                                    <div id="hin_editor"></div>
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
                                id="blogs">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sr</th>
                                        <th>Title</th>
                                        <th>Title (Hindi)</th>
                                        <th>Image</th>
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
    <div id="editBlogModal" class="modal right fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Research Highlight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBlogForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="editBlogId">
                        <div class="mb-3">
                            <label>Title:</label>
                            <input type="text" id="editTitle" name="title" class="form-control">
                            <span class="text-danger erroredit-title"></span>
                        </div>
                        <div class="mb-3">
                            <label>Title (Hindi):</label>
                            <input type="text" id="editHinTitle" name="hin_title" class="form-control">
                            <span class="text-danger erroredit-hin_title"></span>
                        </div>
                        <div class="mb-3">
                            <label>Upload Image:</label>
                            <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                            <span class="text-danger erroredit-image"></span>
                        </div>
                        <div class="mb-3">
                            <label>Description:</label>
                            <div id="editEditor"></div>
                        </div>
                        <div class="mb-3">
                            <label>Description (Hindi):</label>
                            <div id="editHinEditor"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        #blogs {
            width: 100% !important;
        }

        #editor,
        #hin_editor {
            height:100px;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {
            // Initialize Quill editor
            const quill = new Quill('#editor', {
                theme: 'snow',
            });

            const quillHindi = new Quill('#hin_editor', {
                theme: 'snow'
            });
            // Initialize Quill editor for edit modal
            const editQuill = new Quill('#editEditor', {
                theme: 'snow',
            });
            const editQuillHindi = new Quill('#editHinEditor', {
                theme: 'snow'
            });


            $("#addBlog").trigger("reset");
            $("#addBlog").on("submit", function(e) {
                e.preventDefault();

                let form = $(this);
                let submitBtn = $("#submitButton");
                let spinner = $(".spinner-border");

                submitBtn.prop("disabled", true);
                spinner.removeClass("d-none");


                $(".text-danger").text("");


                grecaptcha.ready(function() {
                    grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
                        action: 'blogs/store'
                    }).then(function(token) {
                        let formData = new FormData(form[0]);
                        formData.append("g-recaptcha-response", token);
                        formData.append("description", quill.root.innerHTML);
                        formData.append("hin_description", quillHindi.root.innerHTML);

                        $.ajax({
                            url: "{{ route('blogs.store') }}",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                toastr.success(
                                    "Blog added successfully!"
                                );
                                form.trigger("reset");
                                quill.setContents([]);
                                quillHindi.setContents([]);
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

            var table = $('#blogs').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('blogs.list') }}",
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
                        data: "title",
                        name: "title"
                    },
                    {
                        data: "hin_title",
                        name: "hin_title"
                    },
                    {
                        data: "image",
                        name: "image",
                        render: function(data) {
                            return `${data ? `<img src=${data} alt="Image" style="width: 50px; height: 50px;">` : '-'}`;
                        }
                    },
                    {
                        data: "status",
                        name: "status",
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
                    url: "{{ route('blogs.toggleStatus') }}",
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


            $(document).on('click', '.edit-blog', function() {
                let id = $(this).data('id');
                console.log(id);

                $.ajax({
                    url: "/blogs/edit/" + id,
                    type: "GET",
                    success: function(response) {
                        console.log(response);

                        $('#editBlogId').val(response.id);
                        $('#editTitle').val(response.title);
                        $('#editHinTitle').val(response.hin_title);
                        editQuill.root.innerHTML = response.description;
                        editQuillHindi.root.innerHTML = response.hin_description;
                        $('#editBlogModal').find('.text-danger').text('');
                        $('#editBlogModal').modal('show');
                    }
                });
            });

            $('#editBlogForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                let id = $('#editBlogId').val();
                formData.append("description", editQuill.root.innerHTML);
                formData.append("hin_description", editQuillHindi.root.innerHTML);

                $.ajax({
                    url: "/blogs/update/" + id,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        toastr.success(response.message);
                        $('#editBlogModal').modal('hide');
                        $('#editBlogForm').trigger("reset");
                        editQuill.setContents([]);
                        editQuillHindi.setContents([]);
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
