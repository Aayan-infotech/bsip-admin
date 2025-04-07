@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-10 col-sm-9">
            <div class="card mt-3">
                <div class="card-header">
                    <!-- {{ __('User Rights Management') }} -->
                    <nav aria-label="breadcrumb" class="float-start">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">User Management</li>
                            <li class="breadcrumb-item"><a href="{{ url('/user-rights') }}">User Rights</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="userSelect">Select User:</label>
                        <select id="userSelect" class="form-control">
                            <option value="">Select User</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="fetchUserDetails" class="btn btn-primary">Fetch User Details</button>
                </div>

                <div class="card-body">
                    <div id="loader" class="text-center d-none">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <table id="rightsTable" class="yajraTable table table-bordered table-hover align-middle d-none">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr No</th>
                                <th>Module Name</th>
                                <th>Page Name</th>
                                <th>
                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                    Assign Rights
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <button id="updateRights" class="btn btn-success d-none">Update Rights</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle "Select All" checkbox
        $('#selectAll').on('change', function() {
            const isChecked = $(this).is(':checked');
            $('.page-checkbox').prop('checked', isChecked); // Select or unselect all checkboxes
        });

        // Update "Select All" checkbox state based on individual checkboxes
        $(document).on('change', '.page-checkbox', function() {
            const allChecked = $('.page-checkbox').length === $('.page-checkbox:checked').length;
            $('#selectAll').prop('checked', allChecked); // Check or uncheck "Select All" based on individual checkboxes
        });


        $('#fetchUserDetails').on('click', function() {
            $('#loader').removeClass('d-none');
            const userId = $('#userSelect').val();
            if (!userId) {
                alert('Please select a user.');
                return;
            }

            $.ajax({
                url: "{{ route('userRights.fetch') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id: userId
                },
                success: function(response) {
                    const {
                        modules,
                        assignedRights
                    } = response;
                    const tbody = $('#rightsTable tbody');
                    tbody.empty();

                    let srNo = 1;
                    modules.forEach(module => {
                        const moduleRowSpan = module.pages.length;
                        module.pages.forEach((page, index) => {
                            const isChecked = assignedRights.includes(page.id) ? 'checked' : '';
                            const row = `
                                <tr>
                                    ${index === 0 ? `<td rowspan="${moduleRowSpan}">${srNo++}</td>` : ''}
                                    ${index === 0 ? `<td rowspan="${moduleRowSpan}">${module.name}</td>` : ''}
                                    <td>${page.name}</td>
                                    <td>
                                        <input type="checkbox" class="page-checkbox" data-page-id="${page.id}" ${isChecked}>
                                    </td>
                                </tr>
                            `;
                            tbody.append(row);
                        });
                    });
                    $('#loader').addClass('d-none');
                    $('#rightsTable').removeClass('d-none');
                    $('#updateRights').removeClass('d-none');
                }
            });
        });

        $('#updateRights').on('click', function() {
            $('#loader').removeClass('d-none');
            const userId = $('#userSelect').val();
            const moduleId = '';
            const pageIds = [];
            $('.page-checkbox:checked').each(function() {
                pageIds.push($(this).data('page-id'));
            });

            $.ajax({
                url: "{{ route('userRights.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id: userId,
                    module_id: moduleId,
                    page_ids: pageIds
                },
                success: function(response) {
                    // alert(response.message);
                    toastr.success(response.message);
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
            $('#loader').addClass('d-none');
        });
    });
</script>
@endsection