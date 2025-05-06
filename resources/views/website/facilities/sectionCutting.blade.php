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
                            <h3>
                                {{ $language === 'hi' ? 'चट्टान अनुभाग कटाई' : 'Rock Section Cutting' }}
                            </h3>
                            <div class="divider"></div>
                            <p class="normal-text">
                                {{ $language === 'hi'
                                    ? 'लॉजिटेक सेक्शन कटिंग और पॉलिशिंग मशीनों का उपयोग जीवाश्म लकड़ी के वर्गों को काटने के लिए किया जाता है। Palaeobotanical शोधों पर डेटाबेस विकसित करने के लिए छवि विश्लेषक और स्कैनर का उपयोग किया जा रहा है।'
                                    : 'Logitech Section Cutting and Polishing Machines are used for cutting
                                                                sections of fossil woods. Image Analyser and scanner for developing database on
                                                                palaeobotanical researches are being utilized.' }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/services/section-cutting-1.jpg') }}" alt=""
                                class="img-fluid img-history">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/services/section-cutting-2.jpg') }}" alt=""
                                class="img-fluid img-history">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/services/section-cutting-3.jpg') }}" alt=""
                                class="img-fluid img-history">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="divider"></div>
                            <div class="col-md-4">
                                <a href="{{ asset('assets-new/assets/images/services/Wood cutting form.doc') }}" class="btn btn-view-profile" target="_blank">
                                    <i class="fas fa-file-pdf me-2"></i> {{ $language === 'hi' ? 'लकड़ी अनुभाग कटाई फॉर्म' : 'Wood Section Cutting Form' }}
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
