@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.2sidebar')
        <div class="col-md-10 col-sm-9">
            <div class="card mt-3">
                <div class="card-header">
                    <nav aria-label="breadcrumb" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Template Management</li>
                            <li class="breadcrumb-item"><a href="{{ url('/manageTemplate') }}">Manage Template</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <!-- Logo Section -->
                    <div class="mb-4" style="padding: 20px; background: #f7f5d6; border: 1px solid #90caf9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h4 style="color: #1565c0; font-weight: bold;">Logo-Title Settings</h4>
                        <p style="color: #5c6bc0;">Manage your Logo and Title. These details will be displayed on your website.</p>
                        <div id="logoDisplay" style="margin-bottom: 20px;">
                            <img id="logoPreview" src="" alt="Logo Preview" style="max-width:100%; max-height: 100px; margin-top: 10px; display: none;">
                            <h2 id="logoTitle" class="text-center" style="margin-top: 10px; font-size:bold"></h2>
                            <p id="logoDescription" class="text-center" style="margin-top: -15px;"></p>
                        </div>
                        <hr>
                        <!-- Form for Adding/Updating Logo -->
                        <form id="logoForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo <sup1><code>[ Max File Size : 2MB ]</code></sup1></label>
                                <input type="file" required name="logo" id="logo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" required name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" required id="description" class="form-control"></textarea>
                            </div>
                            <button type="button" id="saveLogo" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Language Section -->
                    <div class="mb-4" style="padding: 20px; background: #f7f5d6; border: 1px solid #90caf9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h4 style="color: #1565c0; font-weight: bold;">Language Settings</h4>
                        <p style="color: #5c6bc0;">Select your preferred language. The selected language will be saved and displayed on page load.</p>
                        <form id="languageForm">
                            @csrf
                            <div class="form-check form-switch mb-3" style="display: flex; align-items: center;">
                                <input class="form-check-input" type="radio" id="languageEn" name="language" value="en">
                                <label class="form-check-label ms-2" for="languageEn" style="font-size: 16px; color: #1e88e5;">English</label>
                            </div>
                            <div class="form-check form-switch mb-3" style="display: flex; align-items: center;">
                                <input class="form-check-input" type="radio" id="languageHi" name="language" value="hi">
                                <label class="form-check-label ms-2" for="languageHi" style="font-size: 16px; color: #1e88e5;">हिन्दी</label>
                            </div>
                            <button type="button" id="saveLanguage" class="btn btn-primary" style="background: #1565c0; border: none; padding: 10px 20px; font-size: 16px;">Save</button>
                        </form>
                    </div>

                    <!-- Contact Details Section -->
                    <div class="mb-4" style="padding: 20px; background: #f7f5d6; border: 1px solid #90caf9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h4 style="color: #1565c0; font-weight: bold;">Address-Contact Settings</h4>
                        <p style="color: #5c6bc0;">Manage your contact details. These details will be displayed on your website.</p>
                        <form id="contactForm">
                            @csrf
                            <div class="mb-3">
                                <label for="address" class="form-label" style="font-weight: bold; color: #1e88e5;">
                                    Address
                                    <br><span id="addressCounter" style="float: right; font-size: 12px; color: #5c6bc0;">255 characters remaining</span>
                                </label>
                                <textarea name="address" id="address" class="form-control" placeholder="Enter your address" style="resize: none;" maxlength="255"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label" style="font-weight: bold; color: #1e88e5;">
                                    Contact
                                    <br><span id="contactCounter" style="float: right; font-size: 12px; color: #5c6bc0;">255 characters remaining</span>
                                </label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter your contact number" maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="font-weight: bold; color: #1e88e5;">
                                    Email
                                    <br><span id="emailCounter" style="float: right; font-size: 12px; color: #5c6bc0;">255 characters remaining</span>
                                </label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" maxlength="255">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label" style="font-weight: bold; color: #1e88e5;">
                                    Website
                                    <br><span id="websiteCounter" style="float: right; font-size: 12px; color: #5c6bc0;">255 characters remaining</span>
                                </label>
                                <input type="url" name="website" id="website" class="form-control" placeholder="Enter your website URL" maxlength="255">
                            </div>
                            <button type="button" id="saveContact" class="btn btn-primary" style="background: #1565c0; border: none; padding: 10px 20px; font-size: 16px;">Save</button>
                        </form>
                    </div>

                    <!-- Social Links Section -->
                    <div class="mb-4" style="padding: 20px; background: #f7f5d6; border: 1px solid #90caf9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h4 style="color: #1565c0; font-weight: bold;">Social-Links Settings</h4>
                        <p style="color: #5c6bc0;">Manage your social accounts details. These details will be displayed on your website.</p>
                        <form id="socialLinksForm">
                            @csrf
                            <div id="socialLinks">
                                <div class="mb-3">
                                    <label for="icon_image" class="form-label">Icon Image</label>
                                    <input type="file" name="icon_image" id="icon_image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="url" name="url" id="url" class="form-control" placeholder="Enter the URL">
                                </div>
                                <button type="button" id="addSocialLink" class="btn btn-primary">Add Link</button>
                            </div>
                        </form>

                        <hr>

                        <h5 style="color: #1565c0; font-weight: bold;">Added Social Links</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" id="socialLinksTable">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>URL</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Existing social links will be appended here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Important Links Section -->
                    <div class="mb-4" style="padding: 20px; background: #f7f5d6; border: 1px solid #90caf9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h4 style="color: #1565c0; font-weight: bold;">Important-Links Settings</h4>
                        <p style="color: #5c6bc0;">Manage your important accounts details. These details will be displayed on your website.</p>
                        <form id="importantLinksForm">
                            @csrf
                            <div id="importantLinks">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="imp_title" class="form-control" placeholder="Enter the title">
                                </div>
                                <div class="mb-3">
                                    <label for="hin_title" class="form-label">Hindi Title</label>
                                    <input type="text" name="hin_title" id="imp_hin_title" class="form-control" placeholder="Enter the Hindi title">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="url" name="url" id="imp_url" class="form-control" placeholder="Enter the URL">
                                </div>
                                <button type="button" id="addImportantLink" class="btn btn-primary">Add Link</button>
                            </div>
                        </form>

                        <hr>

                        <h5 style="color: #1565c0; font-weight: bold;">Added Important Links</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" id="importantLinksTable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Hindi Title</th>
                                        <th>URL</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Existing important links will be appended here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Useful Links Section -->
                    <div class="mb-4" style="padding: 15px;background: #f7f5d6;border: 1px solid black;border-radius: 7px;">
                        <h4>Useful Links</h4>
                        <form id="usefulLinksForm">
                            @csrf
                            <div id="usefulLinks">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="useful_title" class="form-control" placeholder="Enter the title">
                                </div>
                                <div class="mb-3">
                                    <label for="hin_title" class="form-label">Hindi Title</label>
                                    <input type="text" name="hin_title" id="useful_hin_title" class="form-control" placeholder="Enter the Hindi title">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="url" name="url" id="useful_url" class="form-control" placeholder="Enter the URL">
                                </div>
                                <button type="button" id="addUsefulLink" class="btn btn-primary">Add Link</button>
                            </div>
                        </form>

                        <hr>

                        <h5 style="color: #1565c0; font-weight: bold;">Added Useful Links</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" id="usefulLinksTable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Hindi Title</th>
                                        <th>URL</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Existing useful links will be appended here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        // Fetch existing useful links on page load
        function fetchUsefulLinks() {
            const tableBody = $('#usefulLinksTable tbody');
            tableBody.empty(); // Clear the table
            $.ajax({
                url: "{{ route('template.usefulLinks.get') }}", // Replace with your route to fetch useful links
                type: 'GET',
                success: function(response) {
                    if (response && response.length > 0) {
                        response.forEach((link, index) => {
                            const row = `
                            <tr data-id="${link.id}">
                                <td>${link.title}</td>
                                <td>${link.hin_title || 'N/A'}</td>
                                <td>${link.url}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deleteUsefulLink" data-id="${link.id}">Delete</button>
                                </td>
                            </tr>
                        `;
                            tableBody.append(row);
                        });
                    }
                },
                error: function() {
                    alert('Failed to fetch useful links.');
                }
            });
        }

        // Add a new useful link
        $('#addUsefulLink').on('click', function() {
            const formData = {
                _token: "{{ csrf_token() }}",
                title: $('#useful_title').val(),
                hin_title: $('#useful_hin_title').val(),
                url: $('#useful_url').val(),
            };

            $.ajax({
                url: "{{ route('template.usefulLinks.store') }}", // Replace with your route to save useful links
                type: 'POST',
                data: formData,
                success: function(response) {
                    toastr.success(response.message || 'Useful link added successfully!');
                    $('#usefulLinksForm')[0].reset(); // Reset the form
                    fetchUsefulLinks(); // Refresh the table
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        alert('An error occurred while adding the useful link.');
                    }
                }
            });
        });

        // Delete a useful link
        $(document).on('click', '.deleteUsefulLink', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this useful link?')) {
                $.ajax({
                    url: `/template/useful-links/${id}`, // Replace with your route to delete useful links
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        toastr.success(response.message || 'Useful link deleted successfully!');
                        fetchUsefulLinks(); // Refresh the table
                    },
                    error: function() {
                        alert('An error occurred while deleting the useful link.');
                    }
                });
            }
        });

        // Fetch useful links on page load
        fetchUsefulLinks();

        // Fetch existing important links on page load
        function fetchImportantLinks() {
            const tableBody = $('#importantLinksTable tbody');
            tableBody.empty(); // Clear the table
            $.ajax({
                url: "{{ route('template.importantLinks.get') }}", // Replace with your route to fetch important links
                type: 'GET',
                success: function(response) {
                    if (response && response.length > 0) {
                        response.forEach((link, index) => {
                            const row = `
                            <tr data-id="${link.id}">
                                <td>${link.title}</td>
                                <td>${link.hin_title || 'N/A'}</td>
                                <td>${link.url}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deleteImportantLink" data-id="${link.id}">Delete</button>
                                </td>
                            </tr>
                        `;
                            tableBody.append(row);
                        });
                    }
                },
                error: function() {
                    alert('Failed to fetch important links.');
                }
            });
        }

        // Add a new important link
        $('#addImportantLink').on('click', function() {
            const formData = {
                _token: "{{ csrf_token() }}",
                title: $('#imp_title').val(),
                hin_title: $('#imp_hin_title').val(),
                url: $('#imp_url').val(),
            };

            $.ajax({
                url: "{{ route('template.importantLinks.store') }}", // Replace with your route to save important links
                type: 'POST',
                data: formData,
                success: function(response) {
                    toastr.success(response.message || 'Important link added successfully!');
                    $('#importantLinksForm')[0].reset(); // Reset the form
                    fetchImportantLinks(); // Refresh the table
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        alert('An error occurred while adding the important link.');
                    }
                }
            });
        });

        // Delete an important link
        $(document).on('click', '.deleteImportantLink', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this important link?')) {
                $.ajax({
                    url: `/template/important-links/${id}`, // Replace with your route to delete important links
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        toastr.success(response.message || 'Important link deleted successfully!');
                        fetchImportantLinks(); // Refresh the table
                    },
                    error: function() {
                        alert('An error occurred while deleting the important link.');
                    }
                });
            }
        });

        // Fetch important links on page load
        fetchImportantLinks();

        // Fetch existing social links on page load
        function fetchSocialLinks() {
            const tableBody = $('#socialLinksTable tbody');
            tableBody.empty(); // Clear the table
            $.ajax({
                url: "{{ route('template.socialLinks.get') }}", // Replace with your route to fetch social links
                type: 'GET',
                success: function(response) {
                    if (response && response.length > 0) {
                        response.forEach((link, index) => {
                            const row = `
                            <tr data-id="${link.id}">
                                <td class="text-center"><img src="storage/${link.icon_image}" alt="Icon" style="max-height: 20px;"></td>
                                <td>${link.url}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deleteSocialLink" data-id="${link.id}">Delete</button>
                                </td>
                            </tr>
                        `;
                            tableBody.append(row);
                        });
                    }
                },
                error: function() {
                    alert('Failed to fetch social links.');
                }
            });
        }

        // Add a new social link
        $('#addSocialLink').on('click', function() {
            const formData = new FormData($('#socialLinksForm')[0]);
            $.ajax({
                url: "{{ route('template.socialLinks.store') }}", // Replace with your route to save social links
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success(response.message || 'Social link added successfully!');
                    $('#socialLinksForm')[0].reset(); // Reset the form
                    fetchSocialLinks(); // Refresh the table
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        alert('An error occurred while adding the social link.');
                    }
                }
            });
        });

        // Delete a social link
        $(document).on('click', '.deleteSocialLink', function() {
            const id = $(this).data('id');
            if (confirm('Are you sure you want to delete this social link?')) {
                $.ajax({
                    url: `/template/social-links/${id}`, // Replace with your route to delete social links
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        toastr.success(response.message || 'Social link deleted successfully!');
                        fetchSocialLinks(); // Refresh the table
                    },
                    error: function() {
                        alert('An error occurred while deleting the social link.');
                    }
                });
            }
        });

        // Fetch social links on page load
        fetchSocialLinks();

        // Function to update the character counter
        function updateCharCounter(inputId, counterId, maxLength) {
            const input = $(`#${inputId}`);
            const counter = $(`#${counterId}`);
            const remaining = maxLength - input.val().length;
            counter.text(`${remaining} characters remaining`);
        }

        // Attach keyup event listeners to update counters dynamically
        $('#address').on('input', function() {
            updateCharCounter('address', 'addressCounter', 255);
        });

        $('#contact').on('input', function() {
            updateCharCounter('contact', 'contactCounter', 255);
        });

        $('#email').on('input', function() {
            updateCharCounter('email', 'emailCounter', 255);
        });

        $('#website').on('input', function() {
            updateCharCounter('website', 'websiteCounter', 255);
        });


        // Fetch existing contact data on page load
        function fetchContactData() {
            $.ajax({
                url: "{{ route('template.contact.get') }}", // Replace with your route to fetch contact data
                type: 'GET',
                success: function(response) {
                    if (response) {
                        // Prefill the form fields with existing data
                        $('#address').val(response.address || '');
                        $('#contact').val(response.contact || '');
                        $('#email').val(response.email || '');
                        $('#website').val(response.website || '');

                        // Function to update the character counter
                        function updateCharCounter(inputId, counterId, maxLength) {
                            const input = $(`#${inputId}`);
                            const counter = $(`#${counterId}`);
                            const remaining = maxLength - input.val().length;
                            counter.text(`${remaining} characters remaining`);
                        }

                        // Attach keyup event listeners to update counters dynamically
                        $('#address').on('input', function() {
                            updateCharCounter('address', 'addressCounter', 255);
                        });

                        $('#contact').on('input', function() {
                            updateCharCounter('contact', 'contactCounter', 255);
                        });

                        $('#email').on('input', function() {
                            updateCharCounter('email', 'emailCounter', 255);
                        });

                        $('#website').on('input', function() {
                            updateCharCounter('website', 'websiteCounter', 255);
                        });

                        // Initialize counters on page load
                        updateCharCounter('address', 'addressCounter', 255);
                        updateCharCounter('contact', 'contactCounter', 255);
                        updateCharCounter('email', 'emailCounter', 255);
                        updateCharCounter('website', 'websiteCounter', 255);
                    }
                },
                error: function() {
                    alert('Failed to fetch contact data.');
                }
            });
        }

        // Call fetchContactData on page load
        fetchContactData();

        // Save or update contact data
        $('#saveContact').on('click', function() {
            const formData = {
                _token: "{{ csrf_token() }}",
                address: $('#address').val(),
                contact: $('#contact').val(),
                email: $('#email').val(),
                website: $('#website').val(),
            };

            $.ajax({
                url: "{{ route('template.contact.store') }}", // Replace with your route to save contact data
                type: 'POST',
                data: formData,
                success: function(response) {
                    toastr.success(response.message || 'Contact details saved successfully!');
                    fetchContactData(); // Refresh the form fields after saving
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        alert('An error occurred while saving the contact details.');
                    }
                }
            });
        });



        // Fetch existing language data on page load
        function fetchLanguageData() {
            $.ajax({
                url: "{{ route('template.language.get') }}", // Replace with your route to fetch language
                type: 'GET',
                success: function(response) {
                    if (response && response.language) {
                        // Set the selected language
                        $(`#languageForm input[name="language"][value="${response.language}"]`).prop('checked', true);
                    }
                },
                error: function() {
                    alert('Failed to fetch language data.');
                }
            });
        }

        // Call fetchLanguageData on page load
        fetchLanguageData();

        // Save or update language
        $('#saveLanguage').on('click', function() {
            const selectedLanguage = $('#languageForm input[name="language"]:checked').val();
            if (!selectedLanguage) {
                // alert();
                toastr.error('Please select a language.');
                return;
            }

            $.ajax({
                url: "{{ route('template.language.store') }}", // Replace with your route to save language
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    language: selectedLanguage
                },
                success: function(response) {
                    toastr.success(response.message || 'Language saved successfully!');
                    fetchLanguageData(); // Refresh the selected language
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        alert('An error occurred while saving the language.');
                    }
                }
            });
        });
        // Fetch existing logo data on page load
        function fetchLogoData() {
            $.ajax({
                url: "{{ route('template.logo.get') }}",
                type: 'GET',
                success: function(response) {
                    if (response) {
                        // Update the display section
                        if (response.logo) {
                            $('#logoPreview').attr('src', `/${response.logo}`).show();
                        } else {
                            $('#logoPreview').hide();
                        }
                        $('#logoTitle').text(response.title || 'No Title Available');
                        $('#logoDescription').text(response.description || 'No Description Available');

                        // Populate the form fields
                        // $('#title').val(response.title || '');
                        // $('#description').val(response.description || '');
                        $('#logo').val('');
                        $('#title').val('');
                        $('#description').val('');
                    }
                },
                error: function() {
                    alert('Failed to fetch logo data.');
                }
            });
        }

        // Call fetchLogoData on page load
        fetchLogoData();

        // Save or update logo
        $('#saveLogo').on('click', function() {
            const formData = new FormData($('#logoForm')[0]);
            $.ajax({
                url: "{{ route('template.logo.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success(response.message);
                    fetchLogoData(); // Refresh the display section after saving
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                            // alert(value[0]);
                        });
                    }
                }
            });
        });
    });
</script>
<script>
    // Add more social links
    // $('#addSocialLink').on('click', function() {
    //     const index = $('#socialLinks .mb-3').length;
    //     const html = `
    //         <div class="mb-3">
    //             <label for="icon_image" class="form-label">Icon Image</label>
    //             <input type="file" name="social_links[${index}][icon_image]" class="form-control">
    //             <label for="url" class="form-label">URL</label>
    //             <input type="url" name="social_links[${index}][url]" class="form-control">
    //         </div>
    //     `;
    //     $('#socialLinks').append(html);
    // });

    // // Add more important links
    // $('#addImportantLink').on('click', function() {
    //     const index = $('#importantLinks .mb-3').length;
    //     const html = `
    //         <div class="mb-3">
    //             <label for="title" class="form-label">Title</label>
    //             <input type="text" name="important_links[${index}][title]" class="form-control">
    //             <label for="url" class="form-label">URL</label>
    //             <input type="url" name="important_links[${index}][url]" class="form-control">
    //         </div>
    //     `;
    //     $('#importantLinks').append(html);
    // });

    // // Add more useful links
    // $('#addUsefulLink').on('click', function() {
    //     const index = $('#usefulLinks .mb-3').length;
    //     const html = `
    //         <div class="mb-3">
    //             <label for="title" class="form-label">Title</label>
    //             <input type="text" name="useful_links[${index}][title]" class="form-control">
    //             <label for="url" class="form-label">URL</label>
    //             <input type="url" name="useful_links[${index}][url]" class="form-control">
    //         </div>
    //     `;
    //     $('#usefulLinks').append(html);
    // });

    // // Save forms via AJAX
    // function saveForm(formId, url) {
    //     const formData = new FormData($(formId)[0]);
    //     $.ajax({
    //         url: url,
    //         type: 'POST',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success: function(response) {
    //             alert('Saved successfully!');
    //         },
    //         error: function(xhr) {
    //             alert('An error occurred!');
    //         }
    //     });
    // }
</script>
@endsection