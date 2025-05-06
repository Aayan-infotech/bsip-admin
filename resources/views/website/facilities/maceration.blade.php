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
                            <h3>{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                            <div class="divider"></div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <img src="{{ asset('assets-new/assets/images/services/macration.jpg') }}"
                                        class="img-history img-fluid" alt="Maceration Image">
                                </div>
                            </div>
                            <p>{{ $language === 'hi' ? 'तलछट से जैविक अवशेषों की पुनर्प्राप्ति के लिए नवीनतम मैक्रेशन सुविधाएं उपलब्ध हैं।':'Latest Maceration facilities are available for the recovery of organic remains from the
                                sediments.' }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
