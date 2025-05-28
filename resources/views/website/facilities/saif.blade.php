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
                    <div class="row g-3">
                        <div class="col-md-4">
                            <a href="{{ asset('assets-new/assets/saif/Revised rates for sample analysis V2.pdf') }}"
                                class="btn btn-primary w-100" target="_blank" onclick="return confirmExternalLink()">
                                <i class="fas fa-file-pdf me-2"></i>
                                {{ $language === 'hi' ? 'विश्लेषणात्मक शुल्क पीडीएफ' : 'Analytical Charges PDF' }}
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ asset('assets-new/assets/saif/BSIP_SAIF_Requisition_form.pdf') }}"
                                class="btn btn-danger w-100" target="_blank" onclick="return confirmExternalLink()">
                                <i class="fas fa-file-pdf me-2"></i>
                                {{ $language === 'hi' ? 'अनुरोध पीडीएफ फॉर्म' : 'Requisition PDF Form' }}
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ asset('assets-new/assets/saif/BSIP_SAIF_Requisition_form.docx') }}"
                                class="btn btn-info w-100" target="_blank" onclick="return confirmExternalLink()">
                                <i class="fas fa-file-word me-2"></i>
                                {{ $language === 'hi' ? 'अनुरोध डॉक. फॉर्म' : 'Requisition Doc. Form' }}
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="https://www.iobnet.co.in/iobpay/entry.do?dirlinkcatcd=EDU&dirlinkmerid=BIRLCK"
                                class="btn btn-success w-100" target="_blank" onclick="return confirmExternalLink()">
                                <i class="fas fa-credit-card me-2"></i>
                                {{ $language === 'hi' ? 'बीएसआईपी भुगतान लिंक' : 'BSIP Payment Link' }}
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ asset('assets-new/assets/saif/BSIP_Bankdetails_21022018.pdf') }}"
                                class="btn btn-warning w-100" target="_blank" onclick="return confirmExternalLink()">
                                <i class="fas fa-university me-2"></i>
                                {{ $language === 'hi' ? 'बीएसआईपी बैंक विवरण' : 'BSIP Bank Details' }}
                            </a>
                        </div>
                    </div>

                    <h3 class="mt-3">
                        {{ $language === 'hi' ? 'परिष्कृत विश्लेषणात्मक उपकरण सुविधाएं' : 'Sophisticated Analytical Instruments Facilities' }}
                    </h3>
                    <div class="divider"></div>
                    <div class="row">
                        @foreach ($saifData as $saif)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="{{ $saif->image }}" class="card-img-top-saif img-fluid"
                                        alt="Saif Page Image">
                                    <div class="card-body text-center p-2">
                                        <h5 class="card-title">
                                            {{ $language === 'hi' ? $saif->instrument_name_hin : $saif->instrument_name }}
                                        </h5>
                                        <p class="author"><i
                                                class="fas fa-user"></i>{{ $language === 'hi' ? $saif->scientist->name_hin : $saif->scientist->name }}
                                        </p>
                                        <a href="{{ $saif->pdf_file }}" class="btn btn-view-profile"><i
                                                class="fas fa-file-pdf"></i>
                                            Download</a>
                                        <span>({{ $saif->pdf_file_size }}) MB</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
