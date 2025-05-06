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
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Past Events</h3>
                            <div class="divider"></div>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ $language === 'hi' ? 'इवेंट का नाम' : 'Event Name' }}</th>
                                    <th>{{ $language === 'hi' ? 'सामाजिक लिंक' : 'Social Links' }}</th>
                                    <th>{{ $language === 'hi' ? 'देखें' : 'View' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pastEvents as $event)
                                    <tr>
                                        <td>
                                            {{ $language === 'hi' ? $event->hin_title : $event->title }}
                                        </td>
                                        <td>
                                            @if($event->youtube_url)
                                                <a href="{{ $event->youtube_url }}" target="_blank" class="btn btn-primary btn-sm">YouTube</a>
                                            @endif
                                            @if($event->facebook_url)
                                                <a href="{{ $event->facebook_url }}" target="_blank" class="btn btn-primary btn-sm">Facebook</a>
                                            @endif
                                        </td>
                                        <td><a href="{{ $event->pdf ?? '#' }}" class="btn btn-primary btn-sm" target="_blank">View</a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
