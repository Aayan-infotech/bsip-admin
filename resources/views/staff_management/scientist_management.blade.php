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
                                <li class="breadcrumb-item"><a href="{{ route('scientist.management') }}">Scientist
                                        Management</a></li>
                            </ol>
                        </nav>
                    </div>

                    <div class="card-body">
                        <!-- Success Message -->
                        <div id="alert-success" class="alert alert-success d-none"></div>

                        <!-- User Registration Form -->
                        <form id="fetchEmployeeDetails" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 col-12">
                                    <label>Select Employee:</label>
                                    <select name="staff_id" class="form-control" id="staff_id">
                                        <option value="">Select Employee Name - EMPID</option>
                                        @foreach ($staffMembers as $member)
                                            <option value="{{ $member->id }}">{{ $member->name }} -
                                                {{ $member->employee_id }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-staff_id"></span>
                                </div>

                            </div>

                            <button type="submit" id="submitButton" class="btn btn-primary">
                                Get Details
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </form>
                    </div>
                </div>

                <div id="AccountDetailsOfUser" class="d-none">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Account Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="{{ asset('assets-new/assets/images/placeholder/avatar6.png') }}"
                                                    alt="Admin" class="rounded-circle p-1 bg-primary" width="110"
                                                    id="profileImage">
                                                <div class="mt-3">
                                                    <h4 id="userName">User Name</h4>
                                                    <p class="text-secondary mb-1" id="userStaffCategory">Staff Category</p>
                                                    <p class="text-muted font-size-sm" id="userSubCategory">Staff Sub
                                                        Category</p>
                                                    <form id="updateProfileImageForm" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" class="form-control mb-3"
                                                            name="profile_picture" id="profile_picture" accept="image/*">
                                                        <span class="text-danger error-profile_picture"></span>
                                                        <button class="btn btn-outline-primary"
                                                            id="uploadButton">Upload</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="updateAccountDetailsForm" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <label for="current_position">Current Position</label>
                                                        <input type="text" class="form-control" name="current_position"
                                                            id="current_position">
                                                        <span class="text-danger error-current_position"></span>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <label for="previous_position">Previous Position</label>
                                                        <input type="text" class="form-control" name="previous_position"
                                                            id="previous_position">
                                                        <span class="text-danger error-previous_position"></span>
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <label for="educational_qualification">Educational
                                                            Qualification</label>
                                                        <input type="text" class="form-control"
                                                            name="educational_qualification" id="educational_qualification">
                                                        <span class="text-danger error-educational_qualification"></span>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <label for="no_of_publications">No of Publications</label>
                                                        <input type="text" class="form-control" name="no_of_publications"
                                                            id="no_of_publications">
                                                        <span class="text-danger error-no_of_publications"></span>
                                                    </div>
                                                    <div class="col-md-6 col-12 mb-3">
                                                        <label for="total_citations">Total Citation</label>
                                                        <input type="text" class="form-control" name="total_citations"
                                                            id="total_citations">
                                                        <span class="text-danger error-total_citations"></span>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label for="research_interests">Research Interest</label>
                                                        <textarea class="form-control" name="research_interests" id="research_interests" rows="3">Quantum Physics</textarea>
                                                        <span class="text-danger error-research_interests"></span>
                                                    </div>
                                                </div>
                                                <button type="submit" id="submitButton" class="btn btn-primary"> Edit
                                                    Details
                                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>International Collaboration</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 mb-3">
                                    <form id="addCollaborationForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 mb-3">
                                                <label for="collaboration_name">Collaboration Name</label>
                                                <input type="text" class="form-control" name="collaboration_name"
                                                    id="collaboration_name">
                                                <span class="text-danger error-collaboration_name"></span>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-3">
                                                <button type="submit" id="addCollaborationButton"
                                                    class="btn btn-primary mt-4">Add
                                                    Collaboration
                                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered" id="collaborationTable">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Collaboration Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Professional Services</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 mb-3">
                                    <form id="addProfessionalServices" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 mb-3">
                                                <label for="service_name">Service Name</label>
                                                <input type="text" class="form-control" name="service_name"
                                                    id="service_name">
                                                <span class="text-danger error-service_name"></span>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-3">
                                                <button type="submit" id="addProfessionalServicesButton"
                                                    class="btn btn-primary mt-4">Add Service
                                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered" id="professionalServicesTable">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Professional Service Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Fellowship / Membership</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 mb-3">
                                    <form id="addFellowship" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 mb-3">
                                                <label for="fellowship_name">Fellowship/Membership Name</label>
                                                <input type="text" class="form-control" name="fellowship_name"
                                                    id="fellowship_name">
                                                <span class="text-danger error-fellowship_name"></span>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-3">
                                                <button type="submit" id="addFellowshipButton"
                                                    class="btn btn-primary mt-4">Add Fellowship
                                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered" id="fellowshipTable">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Fellowship/Membership Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Awards & Honors</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 col-sm-12 mb-3">
                                    <form id="addAward" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 mb-3">
                                                <label for="award_name">Award/Honor Name</label>
                                                <input type="text" class="form-control" name="award_name"
                                                    id="award_name">
                                                <span class="text-danger error-award_name"></span>
                                            </div>
                                            <div class="col-md-4 col-sm-6 mb-3">
                                                <label for="award_year">Award Year</label>
                                                <input type="text" class="form-control" name="award_year"
                                                    id="award_year">
                                                <span class="text-danger error-award_year"></span>
                                            </div>
                                            <div class="col-md-4 col-sm-4 mb-3">
                                                <button type="submit" id="addAwardButton"
                                                    class="btn btn-primary mt-4">Add Award
                                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered" id="awardTable">
                                        <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Award/Honor Name</th>
                                                <th>Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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

                function showProfileDetails(profilePicture, name, staffCategory, staffSubCategory) {
                    $('#profileImage').attr('src', profilePicture);
                    $('#userName').text(name);
                    $('#userStaffCategory').text(staffCategory);
                    $('#userSubCategory').text(staffSubCategory);
                }

                function showAccountDetails(currentPosition, previousPosition, educationalQualification,
                    noOfPublications, totalCitations, researchInterests) {
                    $('#current_position').val(currentPosition);
                    $('#previous_position').val(previousPosition);
                    $('#educational_qualification').val(educationalQualification);
                    $('#no_of_publications').val(noOfPublications);
                    $('#total_citations').val(totalCitations);
                    $('#research_interests').val(researchInterests);
                }

                function showCallaborationTable(internationalCollaborations) {
                    $('#collaborationTable tbody').empty();
                    if (internationalCollaborations.length == 0) {
                        $('#collaborationTable tbody').append(
                            '<tr><td colspan="3" class="text-center">No Collaborations Found</td></tr>'
                        );
                    }
                    $.each(internationalCollaborations, function(index, collaboration) {
                        $('#collaborationTable tbody').append(
                            '<tr><td>' + (index + 1) + '</td><td>' + collaboration.collaboration_name +
                            '</td><td><button type="button" class="btn btn-danger btn-sm removeCollaborationButton" data-id="' +
                            collaboration.id + '"><i class="fas fa-trash"></i></button></td></tr>'
                        );
                    });
                }

                function showProfessionalServicesTable(professionalServices) {
                    $('#professionalServicesTable tbody').empty();
                    if (professionalServices.length == 0) {
                        $('#professionalServicesTable tbody').append(
                            '<tr><td colspan="3" class="text-center">No Professional Services Found</td></tr>'
                        );
                    }
                    $.each(professionalServices, function(index, service) {
                        $('#professionalServicesTable tbody').append(
                            '<tr><td>' + (index + 1) + '</td><td>' + service.service_name +
                            '</td><td><button type="button" class="btn btn-danger btn-sm removeProfessionalServiceButton" data-id="' +
                            service.id + '"><i class="fas fa-trash"></i></button></td></tr>'
                        );
                    });
                }


                function showFellowshipTable(fellowships) {
                    $('#fellowshipTable tbody').empty();
                    if (fellowships.length == 0) {
                        $('#fellowshipTable tbody').append(
                            '<tr><td colspan="3" class="text-center">No Fellowships Found</td></tr>'
                        );
                    }
                    $.each(fellowships, function(index, fellowship) {
                        $('#fellowshipTable tbody').append(
                            '<tr><td>' + (index + 1) + '</td><td>' + fellowship.fellowship_name +
                            '</td><td><button type="button" class="btn btn-danger btn-sm removeFellowshipButton" data-id="' +
                            fellowship.id + '"><i class="fas fa-trash"></i></button></td></tr>'
                        );
                    });
                }

                function showAwardTable(awards) {
                    $('#awardTable tbody').empty();
                    if (awards.length == 0) {
                        $('#awardTable tbody').append(
                            '<tr><td colspan="4" class="text-center">No Awards Found</td></tr>'
                        );
                    }
                    $.each(awards, function(index, award) {
                        $('#awardTable tbody').append(
                            '<tr><td>' + (index + 1) + '</td><td>' + award.award_name +
                            '</td><td>' + award.award_year +
                            '</td><td><button type="button" class="btn btn-danger btn-sm removeAwardButton" data-id="' +
                            award.id + '"><i class="fas fa-trash"></i></button></td></tr>'
                        );
                    });
                }



                $('#fetchEmployeeDetails').on('submit', function(e) {
                    e.preventDefault();
                    // remove all error messages
                    $(this).find('.text-danger').text('');
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('scientist.management.staffDetails') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#submitButton').prop('disabled', true);
                            $('#submitButton .spinner-border').removeClass('d-none');
                        },
                        success: function(response) {
                            console.log(response);
                            $('#submitButton').prop('disabled', false);
                            $('#submitButton .spinner-border').addClass('d-none');
                            $('#AccountDetailsOfUser').removeClass('d-none');
                            // $(this).trigger('reset');
                            $('#updateProfileImageForm').trigger('reset');
                            showProfileDetails(
                                response.profile_picture,
                                response.name,
                                response?.category?.category_name,
                                response?.sub_category?.sub_category_name
                            );
                            showAccountDetails(
                                response.current_position,
                                response.previous_position,
                                response.educational_qualification,
                                response.no_of_publications,
                                response.total_citations,
                                response.research_interests
                            );
                            showCallaborationTable(response.international_collaborations);
                            showProfessionalServicesTable(response.professional_services);
                            showFellowshipTable(response.fellowships);
                            showAwardTable(response.awards_honors);
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                            $('#submitButton').prop('disabled', false);
                            $('#submitButton .spinner-border').addClass('d-none');
                        }
                    });
                });


                $('#updateProfileImageForm').on('submit', function(e) {
                    e.preventDefault();
                    var id = $('#staff_id').val();
                    // remove all error messages
                    $(this).find('.text-danger').text('');
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('scientist.management.updateProfileImage', ['id' => '__id__']) }}"
                            .replace('__id__', id),

                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#uploadButton').prop('disabled', true);
                            $('#uploadButton .spinner-border').removeClass('d-none');
                        },
                        success: function(response) {
                            toastr.success(
                                "Profile Picture updated successfully!"
                            );
                            $('#uploadButton').prop('disabled', false);
                            $('#uploadButton .spinner-border').addClass('d-none');
                            $('#updateProfileImageForm').trigger('reset');
                            showProfileDetails(
                                response.profile_picture,
                                response.name,
                                response?.category?.category_name,
                                response?.sub_category?.sub_category_name,
                            );
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                            $('#uploadButton').prop('disabled', false);
                            $('#uploadButton .spinner-border').addClass('d-none');
                        }
                    });
                });

                $('#updateAccountDetailsForm').on('submit', function(e) {
                    e.preventDefault();
                    var id = $('#staff_id').val();
                    $(this).find('.text-danger').text('');
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('scientist.management.updateAccountDetails', ['id' => '__id__']) }}"
                            .replace('__id__', id),

                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#submitButton').prop('disabled', true);
                            $('#submitButton .spinner-border').removeClass('d-none');
                        },
                        success: function(response) {
                            toastr.success(
                                "Account Details updated successfully!"
                            );
                            $('#submitButton').prop('disabled', false);
                            $('#submitButton .spinner-border').addClass('d-none');
                            $('#updateAccountDetailsForm').trigger('reset');
                            showAccountDetails(
                                response.current_position,
                                response.previous_position,
                                response.educational_qualification,
                                response.no_of_publications,
                                response.total_citations,
                                response.research_interests
                            );
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                            $('#submitButton').prop('disabled', false);
                            $('#submitButton .spinner-border').addClass('d-none');
                        }
                    });
                });

                $('#addCollaborationButton').on('click', function() {
                    $('#addCollaborationForm').submit();
                });

                $('#addCollaborationForm').on('submit', function(e) {
                    e.preventDefault();
                    console.log('addCollaborationForm');
                    $(this).find('.text-danger').text('');
                    var id = $('#staff_id').val();

                    var formData = new FormData(this);
                    formData.append('staff_id', id);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('scientist.management.addCollaboration') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#addCollaborationButton').prop('disabled', true);
                            $('#addCollaborationButton .spinner-border').removeClass('d-none');
                        },
                        success: function(response) {
                            toastr.success(
                                "Collaboration added successfully!"
                            );
                            $('#addCollaborationButton').prop('disabled', false);
                            $('#addCollaborationButton .spinner-border').addClass('d-none');
                            $('#addCollaborationForm').trigger('reset');
                            // showCallaborationTable(response.international_collaborations);

                            // append the new collaboration to the table
                            // remove the previous "No Collaborations Found" row if it exists
                            $('#collaborationTable tbody').find(
                                'tr:contains("No Collaborations Found")').remove();
                            $('#collaborationTable tbody').append(
                                '<tr><td>' + ($('#collaborationTable tbody tr').length + 1) +
                                '</td><td>' + response.collaboration_name +
                                '</td><td><button type="button" class="btn btn-danger btn-sm removeCollaborationButton" data-id="' +
                                response.id +
                                '"><i class="fas fa-trash"></i></button></td></tr>'
                            );
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                            $('#addCollaborationButton').prop('disabled', false);
                            $('#addCollaborationButton .spinner-border').addClass('d-none');
                        }
                    });
                });

                $('#collaborationTable').on('click', '.removeCollaborationButton', function() {
                    var id = $(this).data('id');
                    var row = $(this).closest('tr');
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('scientist.management.removeCollaboration') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success("Collaboration removed successfully!");
                            row.remove();
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                        }
                    });
                });


                $('#addProfessionalServices').on('submit', function(e) {
                    e.preventDefault();
                    $(this).find('.text-danger').text('');
                    var id = $('#staff_id').val();
                    var formData = new FormData(this);
                    formData.append('staff_id', id);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('addProfessionalService') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#addProfessionalServicesButton').prop('disabled', true);
                            $('#addProfessionalServicesButton .spinner-border').removeClass(
                                'd-none');
                        },
                        success: function(response) {
                            toastr.success(
                                "Professional Service added successfully!"
                            );
                            $('#addProfessionalServicesButton').prop('disabled', false);
                            $('#addProfessionalServicesButton .spinner-border').addClass('d-none');
                            $('#addProfessionalServices').trigger('reset');

                            // append the new service to the table
                            // remove the previous "No Professional Services Found" row if it exists
                            $('#professionalServicesTable tbody').find(
                                'tr:contains("No Professional Services Found")').remove();
                            $('#professionalServicesTable tbody').append(
                                '<tr><td>' + ($('#professionalServicesTable tbody tr').length +
                                    1) +
                                '</td><td>' + response.service_name +
                                '</td><td><button type="button" class="btn btn-danger btn-sm removeProfessionalServiceButton" data-id="' +
                                response.id +
                                '"><i class="fas fa-trash"></i></button></td></tr>'
                            );
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                            $('#addProfessionalServicesButton').prop('disabled', false);
                            $('#addProfessionalServicesButton .spinner-border').addClass('d-none');
                        }
                    });
                });


                $('#professionalServicesTable').on('click', '.removeProfessionalServiceButton', function() {
                    var id = $(this).data('id');
                    var row = $(this).closest('tr');
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('removeProfessionalService') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success("Professional Service removed successfully!");
                            row.remove();
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                        }
                    });
                });

                $('#addFellowship').on('submit', function(e) {
                    e.preventDefault();
                    $(this).find('.text-danger').text('');
                    var id = $('#staff_id').val();
                    var formData = new FormData(this);
                    formData.append('staff_id', id);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('addFellowship') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#addFellowshipButton').prop('disabled', true);
                            $('#addFellowshipButton .spinner-border').removeClass('d-none');
                        },
                        success: function(response) {
                            toastr.success(
                                "Fellowship added successfully!"
                            );
                            $('#addFellowshipButton').prop('disabled', false);
                            $('#addFellowshipButton .spinner-border').addClass('d-none');
                            $('#addFellowship').trigger('reset');

                            // append the new service to the table
                            // remove the previous "No Fellowships Found" row if it exists
                            $('#fellowshipTable tbody').find(
                                'tr:contains("No Fellowships Found")').remove();
                            $('#fellowshipTable tbody').append(
                                '<tr><td>' + ($('#fellowshipTable tbody tr').length + 1) +
                                '</td><td>' + response.fellowship_name +
                                '</td><td><button type="button" class="btn btn-danger btn-sm removeFellowshipButton" data-id="' +
                                response.id +
                                '"><i class="fas fa-trash"></i></button></td></tr>'
                            );
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                            $('#addFellowshipButton').prop('disabled', false);
                            $('#addFellowshipButton .spinner-border').addClass('d-none');
                        }
                    });
                });
                $('#fellowshipTable').on('click', '.removeFellowshipButton', function() {
                    var id = $(this).data('id');
                    var row = $(this).closest('tr');
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('removeFellowship') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success("Fellowship removed successfully!");
                            row.remove();
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                        }
                    });
                });

                // Add Award
                $('#addAward').on('submit', function(e) {
                    e.preventDefault();
                    $(this).find('.text-danger').text('');
                    var id = $('#staff_id').val();
                    var formData = new FormData(this);
                    formData.append('staff_id', id);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('addAward') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#addAwardButton').prop('disabled', true);
                            $('#addAwardButton .spinner-border').removeClass('d-none');
                        },
                        success: function(response) {
                            toastr.success(
                                "Award added successfully!"
                            );
                            $('#addAwardButton').prop('disabled', false);
                            $('#addAwardButton .spinner-border').addClass('d-none');
                            $('#addAward').trigger('reset');

                            // append the new service to the table
                            // remove the previous "No Awards Found" row if it exists
                            $('#awardTable tbody').find(
                                'tr:contains("No Awards Found")').remove();
                            $('#awardTable tbody').append(
                                '<tr><td>' + ($('#awardTable tbody tr').length + 1) +
                                '</td><td>' + response.award_name +
                                '</td><td>' + response.award_year +
                                '</td><td><button type="button" class="btn btn-danger btn-sm removeAwardButton" data-id="' +
                                response.id +
                                '"><i class="fas fa-trash"></i></button></td></tr>'
                            );
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                            $('#addAwardButton').prop('disabled', false);
                            $('#addAwardButton .spinner-border').addClass('d-none');
                        }
                    });
                });
                $('#awardTable').on('click', '.removeAwardButton', function() {
                    var id = $(this).data('id');
                    var row = $(this).closest('tr');
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('removeAward') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            toastr.success("Award removed successfully!");
                            row.remove();
                        },
                        error: function(xhr) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.error-' + key).text(value[0]);
                            });
                        }
                    });
                });
            });
        </script>
    @endsection
