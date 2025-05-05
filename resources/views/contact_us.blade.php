@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Added the SideBar Components --}}
            <x-side-bar-component module="10" />

            <!-- Main Content -->
            <div class="col-md-10 col-sm-9">
                <div class="card mt-3">
                    <div class="card-header">
                        <nav aria-label="breadcrumb" class="float-start">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/adminDashboard') }}"><i
                                            class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Visitor Form</li>
                                <li class="breadcrumb-item"><a href="{{ route('contactUs.admin') }}">Contact Us</a></li>
                            </ol>
                        </nav>
                    </div>




                    <div class="card-body">
                        {{-- <div class="table-responsive"> --}}
                        <table class="yajraTable table table-bordered table-hover align-middle pt-1 w-full m-0 nowrap"
                            id="SAIFTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sr</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                        </table>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        #SAIFTable {
            width: 100% !important;
        }

        .fixed-width-desc {
            max-width: 200px;
            word-wrap: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    <!-- jQuery & AJAX -->

    <script>
        $(document).ready(function() {


            var table = $('#SAIFTable').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{{ route('contactUsList.admin') }}",
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
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "email",
                        name: "email",
                    },
                    {
                        data: "phone",
                        name: "phone",
                    },
                    {
                        data: "subject",
                        name: "subject",
                    },

                    {
                        data: "message",
                        name: "message",
                    },

                ]
            });
        });
    </script>
@endsection
