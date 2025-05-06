@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
@section('content')
    <section>
        <div class="container-fluid p-0">
            <!-- Breadcrumb -->
            <nav class="bio-breadcrumb" aria-label="Breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"
                            aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#"
                            aria-label="{{ $language === 'hi' ? $currentHeaderMenu['hin_title'] : $currentHeaderMenu['title'] }}">{{ $language === 'hi' ? $currentHeaderMenu['hin_title'] : $currentHeaderMenu['title'] }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? $currentPage->hin_title : $currentPage->title }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container py-3">
            <div class="row gx-5">
                <!-- Sidebar with Links and Icons -->
                @include('website.layouts.sidebar', [
                    'menuPages' => $menuPages,
                    'currentPageId' => $currentPageId,
                    'language' => $language,
                    'currentHeaderMenu' => $currentHeaderMenu,
                ])

                <div class="col-md-9 content">
                    <h3>{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                    <div class="divider"></div>
                    <div class="accordion" id="accordionExample">
                        @if ($superannuatedEmployee)
                            @if ($superannuatedEmployee->staff->isNotEmpty())
                                <table class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th><i class="fa-solid fa-image"></i> Photo</th>
                                            <th><i class="fa-solid fa-user"></i> Name</th>
                                            <th><i class="fa-solid fa-id-badge"></i> Designation</th>
                                            <th><i class="fa-solid fa-envelope"></i> E-Mail</th>
                                            <th><i class="fa-solid fa-calendar"></i> Superannuated Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($superannuatedEmployee->staff as $employee)
                                            <tr>
                                                <td><img src="{{ $employee->profile_picture }}" alt="{{ $employee->name }}"
                                                        class="img-fluid rounded" width="50"></td>
                                                <td>{{ $language === 'hi' ? $employee->name_hin : $employee->name }}</td>
                                                <td>{{ $language === 'hi' ? $employee->hin_current_position : $employee->current_position }}
                                                </td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->superannuation_date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info" role="alert">
                                    {{ $language === 'hi' ? 'कोई जानकारी उपलब्ध नहीं है।' : 'No information available.' }}
                                </div>
                            @endif
                        @else
                            <div class="alert alert-info" role="alert">
                                {{ $language === 'hi' ? 'कोई जानकारी उपलब्ध नहीं है।' : 'No information available.' }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
