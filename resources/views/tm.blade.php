
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Template Management</h3>
                </div>
                <div class="card-body">
                    <!-- Logo Section -->
                    <div class="mb-4">
                        <h4>Logo</h4>
                        <form id="logoForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <button type="button" id="saveLogo" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Language Section -->
                    <div class="mb-4">
                        <h4>Language</h4>
                        <form id="languageForm">
                            @csrf
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" id="languageEn" name="language" value="en">
                                <label class="form-check-label" for="languageEn">English</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" id="languageHi" name="language" value="hi">
                                <label class="form-check-label" for="languageHi">Hindi</label>
                            </div>
                            <button type="button" id="saveLanguage" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Contact Details Section -->
                    <div class="mb-4">
                        <h4>Contact Details</h4>
                        <form id="contactForm">
                            @csrf
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" name="contact" id="contact" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" name="website" id="website" class="form-control">
                            </div>
                            <button type="button" id="saveContact" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Social Links Section -->
                    <div class="mb-4">
                        <h4>Social Links</h4>
                        <form id="socialLinksForm">
                            @csrf
                            <div id="socialLinks">
                                <div class="mb-3">
                                    <label for="icon_image" class="form-label">Icon Image</label>
                                    <input type="file" name="social_links[0][icon_image]" class="form-control">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="url" name="social_links[0][url]" class="form-control">
                                </div>
                            </div>
                            <button type="button" id="addSocialLink" class="btn btn-secondary">Add More</button>
                            <button type="button" id="saveSocialLinks" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Important Links Section -->
                    <div class="mb-4">
                        <h4>Important Links</h4>
                        <form id="importantLinksForm">
                            @csrf
                            <div id="importantLinks">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="important_links[0][title]" class="form-control">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="url" name="important_links[0][url]" class="form-control">
                                </div>
                            </div>
                            <button type="button" id="addImportantLink" class="btn btn-secondary">Add More</button>
                            <button type="button" id="saveImportantLinks" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                    <!-- Useful Links Section -->
                    <div class="mb-4">
                        <h4>Useful Links</h4>
                        <form id="usefulLinksForm">
                            @csrf
                            <div id="usefulLinks">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="useful_links[0][title]" class="form-control">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="url" name="useful_links[0][url]" class="form-control">
                                </div>
                            </div>
                            <button type="button" id="addUsefulLink" class="btn btn-secondary">Add More</button>
                            <button type="button" id="saveUsefulLinks" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add more social links
    $('#addSocialLink').on('click', function() {
        const index = $('#socialLinks .mb-3').length;
        const html = `
            <div class="mb-3">
                <label for="icon_image" class="form-label">Icon Image</label>
                <input type="file" name="social_links[${index}][icon_image]" class="form-control">
                <label for="url" class="form-label">URL</label>
                <input type="url" name="social_links[${index}][url]" class="form-control">
            </div>
        `;
        $('#socialLinks').append(html);
    });

    // Add more important links
    $('#addImportantLink').on('click', function() {
        const index = $('#importantLinks .mb-3').length;
        const html = `
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="important_links[${index}][title]" class="form-control">
                <label for="url" class="form-label">URL</label>
                <input type="url" name="important_links[${index}][url]" class="form-control">
            </div>
        `;
        $('#importantLinks').append(html);
    });

    // Add more useful links
    $('#addUsefulLink').on('click', function() {
        const index = $('#usefulLinks .mb-3').length;
        const html = `
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="useful_links[${index}][title]" class="form-control">
                <label for="url" class="form-label">URL</label>
                <input type="url" name="useful_links[${index}][url]" class="form-control">
            </div>
        `;
        $('#usefulLinks').append(html);
    });

    // Save forms via AJAX
    function saveForm(formId, url) {
        const formData = new FormData($(formId)[0]);
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert('Saved successfully!');
            },
            error: function(xhr) {
                alert('An error occurred!');
            }
        });
    }

    $('#saveLogo').on('click', function() {
        saveForm('#logoForm', "{{ route('template.store') }}");
    });

    $('#saveLanguage').on('click', function() {
        saveForm('#languageForm', "{{ route('template.store') }}");
    });

    $('#saveContact').on('click', function() {
        saveForm('#contactForm', "{{ route('template.store') }}");
    });

    $('#saveSocialLinks').on('click', function() {
        saveForm('#socialLinksForm', "{{ route('template.store') }}");
    });

    $('#saveImportantLinks').on('click', function() {
        saveForm('#importantLinksForm', "{{ route('template.store') }}");
    });

    $('#saveUsefulLinks').on('click', function() {
        saveForm('#usefulLinksForm', "{{ route('template.store') }}");
    });
</script>
@endsection
