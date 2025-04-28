@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<div class="container py-5">
    <div class="row mb-4 text-center">
        <h2 class="fw-bold" style="color: #1f1f1f;">This PC</h2>
        <p class="text-muted">Access your modules just like system drives</p>
    </div>

<<<<<<< HEAD
                    <!-- {{ __('You are logged in!') }} -->

                    <div class="row">
                        @foreach($modules as $module)
                        <div class="col-md-4 mt-3">
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
=======
    <div class="row justify-content-start">
        @foreach($modules as $module)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
            <div class="glass-tile d-flex flex-column align-items-center justify-content-center text-center p-4">
                <div class="win11-icon mb-3">
                    <i class="fa-solid fa-folder fa-2x text-white"></i>
>>>>>>> c2e0f8f0a956c02e348c4d919f04a01ae5eac31a
                </div>
                <h5 class="fw-semibold text-dark mb-1">{{ $module->name }}</h5>
                <p class="text-dark small mb-2">{{ $module->description ?? 'Manage ' . $module->name }}</p>
                @php $topPage = $module->pages->sortBy('sequence')->first(); @endphp
                @if($topPage)
                <a href="{{ url($topPage->page_url) }}" class="btn btn-dark btn-sm mt-2 px-4">Open</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    body {
        background-color: #f7f7f7;
        font-family: 'Segoe UI', sans-serif;
    }

    .glass-tile {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 240px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glass-tile:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    }

    .win11-icon {
        /* background: linear-gradient(145deg, #6dd5fa, #2980b9); */
        background: green;
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: inset 2px 2px 6px rgba(255, 255, 255, 0.3),
                    2px 4px 6px rgba(0, 0, 0, 0.2);
    }

    .btn-glass {
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        padding: 6px 18px;
        font-weight: 500;
        border-radius: 30px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(8px);
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }

    .btn-glass:hover {
        background: rgba(255, 255, 255, 0.3);
        color: #000;
    }
</style>
@endsection
