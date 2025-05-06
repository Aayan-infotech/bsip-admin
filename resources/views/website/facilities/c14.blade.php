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
                        <div class="colmd-12">
                            <h3> {{ $language === 'hi' ? 'रेडियो कार्बन डेटिंग - राष्ट्रीय सुविधा' : 'Radio Carbon Dating - National Facility' }}
                            </h3>
                            <div class="divider"></div>
                            <p class="normal-text">
                                {{ $language === 'hi'
                                    ? 'कुछ तत्वों के रेडियोधर्मी क्षय पर आधारित डेटिंग विधियाँ लगभग निरपेक्ष आयु के बारे में डेटा प्रदान करती हैं। क्वाटरनेरी जमा और पुरातात्विक अवशेषों की रेडियो कार्बन डेटिंग पिछले 40,000 वर्षों के दौरान जैविक घटनाओं के कालानुक्रमिक अनुक्रम को समझने के लिए की जाती है।'
                                    : 'Dating methods based on radio active decay of certain elements provide
                                                                data on near
                                                                absolute ages. Radio Carbon Dating of Quaternary deposits and archaeological remains is done
                                                                to understand
                                                                the chronological sequence of biological events during the past 40,000 years.' }}
                            </p>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('assets-new/assets/images/c14/c14_bpu.jpg') }}"
                                            class="card-img-top-saif img-fluid" alt="Image">
                                        <div class="card-body text-center p-2">
                                            <h5 class="card-title">{{ $language === 'hi' ? 'बेंजीन तैयारी इकाई' : 'Benzene Preparation Unit' }}</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('assets-new/assets/images/c14/c14_lsbc.jpg') }}"
                                            class="card-img-top-saif img-fluid" alt="Image">
                                        <div class="card-body text-center p-2">
                                            <h5 class="card-title">{{ $language === 'hi' ? 'तरल सिंटिलेशन बीटा काउंटर \'क्वांटुलस\'' : 'Liquid Scintillation Beta Counter \'Quantulus\'' }}</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('assets-new/assets/images/c14/c14_gps.jpg') }}"
                                            class="card-img-top-saif img-fluid" alt="Image">
                                        <div class="card-body text-center p-2">
                                            <h5 class="card-title">{{ $language === 'hi' ? 'स्वचालित ग्रेफाइट तैयारी प्रणाली' : 'Newly established Automated Graphite preparation system for AMS C-14 dating' }}</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('assets-new/assets/images/c14/c14_new_gps.jpg') }}"
                                            class="card-img-top-saif img-fluid" alt="Image">
                                        <div class="card-body text-center p-2">
                                            <h5 class="card-title">
                                                {{ $language === 'hi' ? 'तत्व विश्लेषक (ईए), आइसोटोप अनुपात द्रव्यमान स्पेक्ट्रोमीटर (आईआरएमएस) और कार्बोनेट हैंडलिंग प्रणाली (सीएचएस)' : 'Elemental Analyzer (EA), Isotope ratio mass spectrometer (IRMS) and Carbonate Handling system (CHS)' }}</h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            {!! $language === 'hi'
                                ? '<p class="normal-text">संस्थान में जियोक्रोनोमेट्री की शुरुआत 1973 में राष्ट्रीय सुविधा के रूप में रेडियो कार्बन डेटिंग प्रयोगशाला की स्थापना के साथ हुई। परतों की पूर्ण आयु रेडियोमेट्रिक डेटिंग द्वारा प्राप्त की जाती है। रेडियो कार्बन (सी-14) और विखंडन-ट्रैक डेटिंग विधियाँ पहले से ही स्थापित हैं। क्वाटरनेरी श्रमिकों की बढ़ती आवश्यकताओं को ध्यान में रखते हुए प्रयोगशाला ने 1997 में अल्ट्रा लो लेवल काउंटिंग सिस्टम \'क्वांटुलस\' का उपयोग करके बेंजीन की लिक्विड सिंटिलेशन काउंटिंग को और अधिक तेजी से काम करने के लिए शुरू किया।</p> <p><i class="fas fa-user"></i> डॉ. श्रीनिवास बिकिना, वैज्ञानिक - एफ और प्रभारी</p> <p><i class="fas fa-envelope"></i> ई-मेल: <a
                            href="mailto:sbikkina@bsip.res.in">sbikkina@bsip.res.in</a></p> <p><i class="fas fa-envelope"></i> निदेशक ई-मेल: <a
                            href="mailto:director@bsip.res.in">director@bsip.res.in</a></p> <p><i class="fas fa-phone"></i> संपर्क नंबर: <a href="tel:+919335788378">+91-93357 88378</a></p>'
                                : ' <p class="normal-text">Geochronometry started in the Institute with the establishment of Radio
                                                            Carbon
                                                            Dating Laboratory as a National facility in 1973. The absolute ages of the strata are
                                                            obtained by the
                                                            radiometric dating. The Radio Carbon (C-14) and Fission-Track dating methods are already
                                                            established.
                                                            Considering the increasing requirements of Quaternary workers the laboratory further took-up
                                                            the
                                                            Liquid Scintillation Counting of Benzene in 1997 using ultra low level counting system
                                                            \'Quantulus\' for
                                                            more speedy work.</p>
                                                        <p><i class="fas fa-user"></i> Dr. Srinivas Bikkina, Scientist - F & In-Charge</p>
                                                        <p><i class="fas fa-envelope"></i> E-Mail: <a
                                                                href="mailto:sbikkina@bsip.res.in">sbikkina@bsip.res.in</a></p>
                                                        <p><i class="fas fa-envelope"></i> Director E-Mail: <a
                                                                href="mailto:director@bsip.res.in">director@bsip.res.in</a></p>
                                                        <p><i class="fas fa-phone"></i> Contact No: <a href="tel:+919335788378">+91-93357 88378</a></p>' !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
