@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
@section('content')
    <section>
        <div class="container-fluid p-0" id="skipToContent">
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
                            <h3>BSIP Platinum Jubilee Year Documentary 2021</h3>
                            <div class="divider"></div>
                        </div>
                        <div class="col-md-4"><img src="{{ asset('assets-new/assets/gallery/gallery-1.jpg') }}"
                                alt="Gallery Image 1" title="Gallery Image 1" class="img-fluid img-history"></div>
                        <div class="col-md-4"><img src="{{ asset('assets-new/assets/gallery/gallery-1.jpg') }}"
                                alt="Gallery Image 2" title="Gallery Image 3" class="img-fluid img-history"></div>
                        <div class="col-md-4"><img src="{{ asset('assets-new/assets/gallery/gallery-1.jpg') }}"
                                alt="Gallery Image 3" title="Gallery Image 3" class="img-fluid img-history"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
