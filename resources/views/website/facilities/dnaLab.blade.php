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
                            <h3>{{ $language === 'hi' ? 'DNA प्रयोगशाला' : 'DNA Lab' }}</h3>
                            <div class="divider"></div>
                            <p class="normal-text">{{
                                $language === 'hi' ? 'मेरी प्रयोगशाला का शोध फोकस दक्षिण एशिया में मानव आबादी के इतिहास और वर्तमान आनुवंशिक विविधता के पैटर्न को समझने के लिए अत्याधुनिक अगली पीढ़ी के अनुक्रमण उपकरण का उपयोग करना है। मैं एक संयुक्त दृष्टिकोण का उपयोग करता हूं जो समय के साथ मानव और पशु आबादी की गतिशीलता की जांच करने के लिए आधुनिक और प्राचीन डीएनए डेटासेट को एक साथ लाता है और कैसे अतीत में घटनाओं, जैसे कि प्रवासन और मिश्रण ने वर्तमान आनुवंशिक परिदृश्य को आकार दिया है।':'The research focus of my lab is to use the cutting edge next-generation
                                sequencing tool to understand the human population histories and patterns of present-day
                                genetic diversity in South Asia. I use a combined approach that brings together modern and
                                ancient DNA datasets in order to investigate human and animal population dynamics over time
                                and how events in the past, such as migrations and admixture, have shaped the current
                                genetic landscape.'
                                }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/services/dna-lab-1.jpg') }}" alt="DNA Lab" title="DNA Lab Image 1"
                                class="img-fluid img-history">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/services/dna-lab-1.jpg') }}" alt="DNA Lab" title="DNA Lab Image 2"
                                class="img-fluid img-history">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets-new/assets/images/services/dna-lab-1.jpg') }}" alt="DNA Lab" title="DNA Lab Image 3"
                                class="img-fluid img-history">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
