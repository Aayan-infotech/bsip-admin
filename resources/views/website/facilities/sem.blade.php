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
                            <h3> {{ $language === 'hi' ? 'स्कैनिंग इलेक्ट्रॉन माइक्रोस्कोप' : 'Scanning Electron Microscope' }}
                            </h3>
                            <div class="divider"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/fesem/i2.jpg') }}" alt=""
                                class="img-fluid img-history">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/fesem/i1.jpg') }}" alt=""
                                class="img-fluid img-history">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/fesem/i3.jpg') }}" alt=""
                                class="img-fluid img-history">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p>{{ $language === 'hi'
                                ? 'एसईएम अध्ययन से बीजों, क्यूटिकल्स, बीजाणुओं और पराग कणों आदि की रूपात्मक विशेषताओं का अध्ययन करने में मदद मिलती है|'
                                : 'SEM study helps in studying morphographic features of seeds, cuticles, spores and pollen
                                                                                                                    grains, etc.' }}
                            </p>
                            <div class="divider"></div>
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>{{ $language === 'hi' ? 'क्र.सं' : 'S.No' }}</th>
                                        <th>{{ $language === 'hi' ? 'विवरण' : 'Description' }}</th>
                                        <th>{{ $language === 'hi' ? 'डाउनलोड पीडीएफ़' : 'Download PDF' }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            {{ $language === 'hi' ? 'आंतरिक अनुरोधों के लिए' : 'For Internal Requisitions' }}
                                        </td>
                                        <td>
                                            <a href="{{ asset('assets-new/assets/images/fesem/internal-requisition-form.pdf') }}"
                                                class="btn btn-view-profile" target="_blank"
                                                onclick="return confirmExternalLink()">
                                                <i class="fas fa-download"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            <span class="ms-1">({{$staticFiles[0]['size']}}) MB</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            {{ $language === 'hi' ? 'बाहरी लोगों के लिए' : 'For Outsiders' }}
                                        </td>
                                        <td>
                                            <a href="{{ asset('assets-new/assets/images/fesem/outsider.pdf') }}"
                                                class="btn btn-view-profile" target="_blank"
                                                onclick="return confirmExternalLink()">
                                                <i class="fas fa-download"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            <span class="ms-1">({{$staticFiles[1]['size']}}) MB</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
