@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->

                    <div class="row">
                        @foreach($modules as $module)
                        <div class="col-md-4">
                            <div class="card text-center menu-box" style=" background: rgb(36,0,15);
background: linear-gradient(90deg, rgba(36,0,15,1) 0%, rgba(121,9,19,1) 35%, rgba(255,0,0,0.8771708512506565) 100%);  border: none; box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); border-radius: 10px; transition: transform 0.3s, box-shadow 0.3s;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: white;">{{ $module->name }}</h5>
                                    <p class="text-light card-text">{{ $module->description ?? 'Manage ' . $module->name }}</p>
                                    @php
                                    $topPage = $module->pages->sortBy('sequence')->first(); // Get the top page by sequence
                                    @endphp
                                    @if($topPage)
                                    <a href="{{ url($topPage->page_url) }}" class="btn btn-primary mb-2">Click Here</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row d-none">
                        <!-- Menu Box 1 -->
                        <div class="col-md-4">
                            <div class="card text-center menu-box" style=" background: rgb(36,0,15);
background: linear-gradient(90deg, rgba(36,0,15,1) 0%, rgba(121,9,19,1) 35%, rgba(255,0,0,0.8771708512506565) 100%);  border: none; box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); border-radius: 10px; transition: transform 0.3s, box-shadow 0.3s;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: white;">Users</h5>
                                    <p class="text-light card-text">Manage users of the system.</p>
                                    <a href="{{ url('/users') }}" class="btn btn-primary">Go to Users</a>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Box 2 -->
                        <div class="col-md-4">
                            <div class="card text-center menu-box" style=" background: rgb(36,0,15);
background: linear-gradient(90deg, rgba(36,0,15,1) 0%, rgba(121,9,19,1) 35%, rgba(255,0,0,0.8771708512506565) 100%);  border: none; box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); border-radius: 10px; transition: transform 0.3s, box-shadow 0.3s;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: white;">Settings</h5>
                                    <p class="text-light card-text">Configure application settings.</p>
                                    <a href="{{ url('/settings') }}" class="btn btn-primary">Go to Settings</a>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Box 3 -->
                        <div class="col-md-4">
                            <div class="card text-center menu-box" style=" background: rgb(36,0,15);
background: linear-gradient(90deg, rgba(36,0,15,1) 0%, rgba(121,9,19,1) 35%, rgba(255,0,0,0.8771708512506565) 100%);  border: none; box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); border-radius: 10px; transition: transform 0.3s, box-shadow 0.3s;">
                                <div class="card-body">
                                    <h5 class="card-title" style="color: white;">Reports</h5>
                                    <p class="text-light card-text">View system reports and analytics.</p>
                                    <a href="{{ url('/reports') }}" class="btn btn-primary">Go to Reports</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .menu-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection