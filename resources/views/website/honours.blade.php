@extends('website.layouts.app')

@section('content')
<section>
    <div class="container-fluid p-0">
        <!-- Breadcrumb -->
        <nav class="bio-breadcrumb" aria-label="Breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" aria-label="{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}">{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $language === 'hi' ? 'सम्मान' : 'Honours' }}
                </li>
            </ul>
        </nav>
    </div>
</section>
<style>
    .list-honours {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 1rem;
        line-height: 1.6;
        color: #212529;
    }

    .list-honours li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 8px 12px;
        border: 1px solid #e3e3e3;
        border-radius: 5px;
        background-color: #f8f9fa;
        transition: background-color 0.3s ease;
    }

    .list-honours li:hover {
        background-color: #e9ecef;
    }

    .list-honours i {
        color: #007bff;
        font-size: 1.2rem;
        margin-right: 10px;
    }

    .list-honours span {
        font-size: 1rem;
        color: #495057;
    }
</style>
<section class="common-mobile-view">
    <div class="container-fluid py-3">
        <div class="row gx-5">
            <!-- Sidebar with Links and Icons -->
            @include('website.layouts.sidebar', ['menuPages' => $menuPages, 'currentPageId' => $currentPageId, 'language' => $language])

            <!-- Main Content -->
            <div class="col-md-9 content">
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'सम्मान' : 'Honours' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')

                    <div class="col-md-12">
                        <ul class="list-honours">
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>विज्ञान वाचस्पति की उपाधि, कैंब्रिज विश्वविद्यालय, 1929</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>उपाध्यक्ष, पुरावनस्पतिविज्ञान अनुभाग 1930 एवं 1935</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>राॅयल सोसाइटी की अध्येता, लंदन 1936</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>महा अध्यक्ष, भारतीय विज्ञान कांग्रेस, 1940</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>अध्यक्ष, राष्ट्रीय विज्ञान अकादमी, भारत, 1937-1939 एवं 1943-1944</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>सदस्य, अमेरिका की कला एवं विज्ञान अकादमी, 1948</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>अध्यक्ष, अंतर्राष्ट्रीय वानस्पतिक कांग्रेस, स्टाॅकहोम, 1950</span>
                            </li>
                        </ul>
                    </div>


                    @else
                    <div class="col-md-12">
                        <ul class="list-honours">
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>Degree of D. Sc., Cambridge University, 1929.</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>Vice-President, Palaeobotany section, 1930 and 1935.</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>Fellow of the Royal Society, London, 1936.</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>General President, Indian Science Congress, 1940.</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>President, National Academy of Sciences, India, 1937-1939
                                    and 1943-1944.</span>
                            </li>
                            <li>
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                                <span>President, International Botanical Congress, Stockholm,
                                    1950.</span>
                            </li>
                        </ul>
                    </div>


                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection