@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<div class="container py-5">
    <div class="row mb-4 text-center">
        <h2 class="fw-bold">Welcome to Your Dashboard</h2>
        <p class="text-muted">Manage all modules from one place</p>
    </div>

    <div class="row justify-content-center">
        @foreach($modules as $module)
        <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm h-100 border-0 rounded-4 hover-card text-center">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <div class="icon-circle bg-light mb-3">
                        <i class="fa-solid fa-folder-open fa-xl text-success"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-1">{{ $module->name }}</h5>
                    <p class="card-text text-muted small">{{ $module->description ?? 'Manage ' . $module->name }}</p>
                    @php $topPage = $module->pages->sortBy('sequence')->first(); @endphp
                    @if($topPage)
                    <a href="{{ url($topPage->page_url) }}" class="btn btn-dark btn-sm mt-2 px-4">Open</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
            <div class="glass-tile text-center p-4 d-flex flex-column align-items-center justify-content-between h-100">
                <div class="tile-icon mb-3">
                    <i class="fa-solid fa-folder-open fa-2x"></i>
                </div>
                <h5 class="fw-semibold mb-1">{{ $module->name }}</h5>
                <p class="text-muted small">{{ $module->description ?? 'Manage ' . $module->name }}</p>
                @php $topPage = $module->pages->sortBy('sequence')->first(); @endphp
                @if($topPage)
                <a href="{{ url($topPage->page_url) }}" class="btn btn-sm btn-primary mt-2 px-4">Open</a>
                @endif
            </div>
        </div> -->

        @endforeach
    </div>
</div>

<style>
    body {
        background-color: #f7f7f7;
    }

    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%); */
        background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
        border-bottom: 2px solid #000 !important;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    }

    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .card-title {
        font-size: 1.1rem;
    }
</style>
<!-- <style>
    body {
    background: linear-gradient(to right, #eef2f3, #ffffff);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.glass-tile {
    background: rgba(255, 255, 255, 0.65);
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    transition: all 0.3s ease;
    min-height: 260px;
}

.glass-tile:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.1);
}

.tile-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ace0f9, #e0c3fc);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0a58ca;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}

.tile-icon i {
    color: #0a58ca;
}

h2 {
    color: #1d3557;
}

p.text-muted {
    color: #6c757d;
}

.btn-primary {
    background-color: #0a58ca;
    border-color: #0a58ca;
    font-weight: 500;
    border-radius: 6px;
}

.btn-primary:hover {
    background-color: #084298;
    border-color: #07387a;
}

</style> -->

@endsection