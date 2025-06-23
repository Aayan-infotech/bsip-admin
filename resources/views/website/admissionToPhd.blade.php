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
                <ul>
                    <li>
                        <a href="{{ $language === 'hi' ? url('hi') : url('en') }}"
                            aria-label="{{ $language === 'hi' ? 'मुख्य पृष्ठ पर जाएं' : 'Go to Home' }}">
                            {{ $language === 'hi' ? 'मुख्य' : 'Home' }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#"
                            aria-label="{{ $language === 'hi' ? 'रोजगार' : 'Career' }}">{{ $language === 'hi' ? 'रोजगार' : 'Career' }}</a>
                    </li>
                    <li class="active" aria-current="page">
                        {{ $language === 'hi' ? 'पीएचडी कार्यक्रम में प्रवेश' : 'Admission to Ph.D. Program' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container py-3">
            <div class="row gx-5">
                @include('website.layouts.sidebar', [
                    'menuPages' => $menuPages,
                    'currentPageId' => $currentPageId,
                    'language' => $language,
                    'currentHeaderMenu' => $currentHeaderMenu,
                ])

                <!-- Main Content -->
                <div class="col-md-9 content">
                    <h3 tabindex="0"
                        aria-label="{{ $language === 'hi' ? 'पीएचडी कार्यक्रम में प्रवेश' : 'Admission to Ph.D. Program' }}">
                        {{ $language === 'hi' ? 'पीएचडी कार्यक्रम में प्रवेश' : 'Admission to Ph.D. Program' }}
                    </h3>
                    <div class="divider" role="separator" aria-hidden="true"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="normal-text" tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'बीएसआईपी विवरण' : 'BSIP Details' }}">
                                {{ $language === 'hi'
                                    ? 'बीरबल साहनी इंस्टीट्यूट ऑफ पलायोबोटनी (BSIP), लखनऊ, के तहत एक स्वायत्त अनुसंधान संस्थान विज्ञान और प्रौद्योगिकी विभाग, भारत सरकार एक प्रमुख शोध है संगठन संयंत्र और पृथ्वी विज्ञान के क्षेत्र में अनुसंधान गतिविधियों में लगे हुए हैं, दोनों शुद्ध पर और लागू पहलुओं। जीवाश्म पौधा में अनुसंधान वर्गीकरण, आकृति विज्ञान, शरीर रचना विज्ञान, विकासवादी भूगर्भीय युग, जैव विविधता, वनस्पति गतिकी, राजवंश, के माध्यम से पादप जीवन के पहलू विकास, समुद्री और महाद्वीपीय पारिस्थितिकी तंत्र, बायोस्ट्रेटीग्राफी, जियोकेमिस्ट्री, जियो सिंक्रोनोलॉजी, कोयला पेट्रोलाजी, ध्रुवीय अनुसंधान, ग्लेशियोलॉजी, डेंड्रोक्रोनोलॉजी, जलवायु परिवर्तन, आर्कियोबोटनी और संबद्ध पहलुओं, संस्थान में खोज की जाती है।
                                                BSIP उपरोक्त क्षेत्रों में से एक में अपने डॉक्टरेट कार्य को आगे बढ़ाने के लिए पात्र छात्रों से आवेदन आमंत्रित करता है। '
                                    : 'Birbal Sahni Institute of Palaeobotany (BSIP), Lucknow, an autonomous research institute under the Department of Science and Technology, Government of India, is a premier research organization engaged in research activities in the field of plant and earth sciences, both on pure and applied aspects. Research in fossil plant taxonomy, morphology, anatomy, evolutionary aspects of plant life through the geological ages, biodiversity, vegetation dynamics, palynology, evolution, marine and continental ecosystems, biostratigraphy, geochemistry, geochronology, coal petrology, polar research, glaciology, dendrochronology, climate change, archaeobotany and allied aspects, is pursued in Institute.
                                                <br>BSIP invites applications from eligible students to pursue their doctoral work in one of the above fields. ' }}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p class="normal-text" tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'पात्रता' : 'Eligibility' }}">
                                <b>{{ $language === 'hi' ? 'पात्रता:' : 'Eligibility:' }}</b>
                            </p>
                            <p class="normal-text" tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'श्रेणी I' : 'Category I' }}">
                                <b>{{ $language === 'hi' ? 'श्रेणी I:' : 'Category I:' }}</b>
                                {{ $language === 'hi'
                                    ? 'जिन उम्मीदवारों के पास प्रथम श्रेणी M.Sc./M.Tech है। पृथ्वी / जीवन विज्ञान या किसी अन्य प्रासंगिक अनुशासन के साथ-साथ CSIR-UGC NET (JRF) योग्यता / DST INSPIRE फैलोशिप या सरकारी संगठनों द्वारा प्रायोजित किसी भी अन्य फैलोशिप में डिग्री लागू करने के लिए पात्र हैं। '
                                    : 'Candidates with 1st class M.Sc./M.Tech. degree in earth/life science or any other relevant discipline plus CSIR-UGC NET (JRF) qualification/DST INSPIRE Fellowship or any other Fellowship sponsored by government organizations are eligible to apply. ' }}
                            </p>
                            <p class="normal-text" tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'श्रेणी II' : 'Category II' }}">
                                <b>{{ $language === 'hi' ? 'श्रेणी II:' : 'Category II:' }}</b>
                                {{ $language === 'hi'
                                    ? 'स्व-समर्थित उम्मीदवारों के साथ प्रथम श्रेणी M.Sc./M.Tech। पृथ्वी / जीवन विज्ञान या किसी अन्य प्रासंगिक अनुशासन में डिग्री (इस श्रेणी के उम्मीदवारों को स्क्रीनिंग टेस्ट और / या व्यक्तिगत साक्षात्कार में उपस्थित होने के लिए कहा जा सकता है)। '
                                    : 'Self-supported candidates with 1st class M.Sc./M.Tech. degree in earth/life science or any other relevant discipline (candidates in this category may be asked to appear in a screening test and/or personal interview). ' }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3 tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'आवेदन प्रक्रिया' : 'Application Process' }}">
                                {{ $language === 'hi' ? 'आवेदन प्रक्रिया' : 'Application Process' }}
                            </h3>
                            <div class="divider" role="separator" aria-hidden="true"></div>
                            <p class="normal-text" tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'आवेदन विवरण' : 'Application Details' }}">
                                {{ $language === 'hi'
                                    ? 'इच्छुक उम्मीदवारों को सीवी के साथ हाल के पासपोर्ट आकार की तस्वीर, शैक्षणिक रिकॉर्ड की फोटोकॉपी और ब्याज के क्षेत्र में लगभग 250 शब्दों के लेखन के साथ आवेदन करना आवश्यक है। आवश्यक दस्तावेजों के साथ आवेदन को या तो निदेशक बीएसआईपी (ई-मेल: director@bsip.res.in) पर ईमेल द्वारा या निदेशक, बीरबल साहनी इंस्टीट्यूट ऑफ पालेओबॉटनी, 53 यूनिवर्सिटी रोड, लखनऊ 6006007 (द्वारा पोस्ट किया जाना चाहिए) उत्तर प्रदेश)। आवेदन प्राप्त करने की कोई अंतिम तिथि नहीं है। आवेदनों को तिमाही आधार पर संसाधित किया जाएगा, और कोई अंतरिम पूछताछ नहीं की जाएगी। '
                                    : 'Interested candidates are required to apply with a CV with recent passport size photograph, photocopies of academic records and a write up of about 250 words on the field of interest. The application along with the necessary documents should be submitted either by email to the Director BSIP (E-mail: director@bsip.res.in) or by post to the Director, Birbal Sahni Institute of Palaeobotany, 53 University Road, Lucknow 226007 (UP). There is no last date for receiving applications. Applications will be processed on a quarterly basis, and no interim enquiries will be entertained. ' }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3 tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'वैज्ञानिक और नवोन्मेषी अनुसंधान अकादमी (AcSIR)' : 'Academy of Scientific and Innovative Research (AcSIR)' }}">
                                {{ $language === 'hi' ? 'वैज्ञानिक और नवोन्मेषी अनुसंधान अकादमी (AcSIR)' : 'Academy of Scientific and Innovative Research (AcSIR)' }}
                            </h3>
                            <div class="divider" role="separator" aria-hidden="true"></div>
                            <p class="normal-text" tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'AcSIR विवरण' : 'AcSIR Details' }}">
                                {{ $language === 'hi'
                                    ? 'AcSIR का उद्देश्य विज्ञान और प्रौद्योगिकी के क्षेत्र में अनुसंधान और नवाचार को बढ़ावा देना है। बीएसआईपी ने जनवरी 2020 में AcSIR के साथ एक समझौता ज्ञापन पर हस्ताक्षर किए।'
                                    : 'The Academy of Scientific and Innovative Research (AcSIR) was established in 2011 by an Act of Parliament, the Academy of Scientific Innovative Research Act, 2011 vide The Gazette of India No. 15 dated February 7, 2012 and notified on April 3, 2012 as an ‘Institution of National Importance’ (interim operations started in June, 2010). AcSIR has adopted the mandate to create and train some of the best of tomorrow’s Science & Technology leaders through a combination of innovative and novel curricula, pedagogy and evaluation. AcSIR’s focus will be on imparting instruction and providing research opportunities in the domain of science & engineering; and to equip them with the skills to innovate and conduct seamless interdisciplinary research. AcSIR is a world class research academy functioning within 44 national laboratories, 6 units and 39 extension centres, encompassing biological, physical, chemical and engineering sciences, of the Council of Scientific & Industrial Research (CSIR) that have the country’s best infrastructural facilities.
                                                Birbal Sahni Institute of Palaeosciences (BSIP) signed a MoU with AcSIR in January, 2020 primarily for the PhD program. Students can register for Biological Sciences and Physical Sciences within the institute projects under AcSIR PhD programs. BSIP provide detailed course work on multiple subjects and also training on facilities/instruments available within the campus. For details of the BSIP’s ongoing projects and faculties, candidates are requested to visit the website https://www.bsip.res.in. AcSIR call for application twice a year in the month of September/October and April/May for admission to the AcSIR doctoral classes starting from January and August, respectively. For more details about application and admission procedures, candidates are requested to visit the website a href=">http://acsir.res.in" target="_blank" onclick="return confirmExternalLink()">http://acsir.res.in</a>. ' }}
                            </p>
                            <p class="normal-text" tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'AcSIR प्रवेश प्रक्रिया' : 'AcSIR Admission Process' }}">
                                {!! $language === 'hi'
                                    ? 'AcSIR प्रवेश प्रक्रिया के बारे में अधिक जानकारी के लिए, कृपया <a href="http://acsir.res.in" target="_blank" onclick="return confirmExternalLink()">http://acsir.res.in</a> पर जाएं।'
                                    : 'For more details about the AcSIR admission process, please visit <a href="http://acsir.res.in" target="_blank" onclick="return confirmExternalLink()">http://acsir.res.in</a>.' !!}
                            </p>
                            <p tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'AcSIR संपर्क जानकारी' : 'AcSIR Contact Information' }}">
                                <strong>{{ $language === 'hi' ? 'AcSIR प्रवेश के लिए संपर्क करें:' : 'For any query related to AcSIR admission, contact:' }}</strong>
                            </p>
                            <p tabindex="0" aria-label="{{ $language === 'hi' ? 'डॉ. रतन कर' : 'Dr. Ratan Kar' }}">
                                <i class="fas fa-user"></i>
                                <strong>{{ $language === 'hi' ? 'डॉ. रतन कर' : 'Dr. Ratan Kar' }}</strong>,
                                {{ $language === 'hi' ? 'वैज्ञानिक - एफ' : 'Scientist - F' }}
                            </p>
                            <p tabindex="0"
                                aria-label="{{ $language === 'hi' ? 'ईमेल: ratan_kar@bsip.res.in' : 'Email: ratan_kar@bsip.res.in' }}">
                                <i class="fas fa-envelope"></i> Email: <a
                                    href="mailto:ratan_kar@bsip.res.in">ratan_kar@bsip.res.in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
