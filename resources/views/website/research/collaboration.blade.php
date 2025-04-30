@extends('website.layouts.app')

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
                    <div>
                        <h3>{{ $language === 'hi' ? 'सहयोग' : 'Collaborations' }} </h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'संस्थान ने पैलेओबोटानिकल शोध के विभिन्न जोर क्षेत्रों में महत्वपूर्ण और अंतःविषय परिणाम की
                                                                                                                            उपलब्धि के
                                                                                                                            लिए कई संगठनों के साथ सहयोग और घनिष्ठ संपर्क स्थापित किया है। महत्वपूर्ण संगठनों में भारतीय
                                                                                                                            भूवैज्ञानिक
                                                                                                                            सर्वेक्षण, कई विश्वविद्यालयों के भूविज्ञान विभाग, शारीरिक अनुसंधान प्रयोगशाला, तेल और प्राकृतिक
                                                                                                                            गैस
                                                                                                                            आयोग, ऑयल इंडिया लिमिटेड, कोल इंडिया लिमिटेड, कोयला खदान योजना और डिजाइन संस्थान, वैज्ञानिक और
                                                                                                                            औद्योगिक
                                                                                                                            अनुसंधान प्रयोगशाला परिषद, नेयवेली लाइटाइट कॉर्पोरेशन शामिल हैं। , मिनरल एक्सप्लोरेशन कॉर्पोरेशन
                                                                                                                            लिमिटेड, इंडियन इंस्टीट्यूट ऑफ टेक्नोलॉजी, इंस्टीट्यूट फ्रैंकिस डी पांडिचेरी, बोटैनिकल सर्वे ऑफ
                                                                                                                            इंडिया,
                                                                                                                            वन अनुसंधान संस्थान, देहरादून, भाभा परमाणु अनुसंधान केंद्र, विज्ञान और प्रौद्योगिकी विभाग के तहत
                                                                                                                            प्रयोगशालाएँ, भारतीय पुरातत्व सर्वेक्षण, हिमालयन भूविज्ञान संस्थान और पुरातत्व के विभिन्न राज्य
                                                                                                                            सरकार और
                                                                                                                            विश्वविद्यालय विभाग।'
                            : 'The Institute has established collaboration and close interaction with a number of organizations for
                                                                                                                the accomplishment of significant and interdisciplinary result in the varied thrust areas of
                                                                                                                palaeobotanical researches. Important organizations include Geological Survey of India, Geology
                                                                                                                Departments of several Universities, Physical Research Laboratory, Oil and Natural Gas Commission, Oil
                                                                                                                India Limited, Coal India Limited, Coal Mine Planning and Design Institute, Council of Scientific and
                                                                                                                Industrial Research Laboratory, Neyveli Lignite Corporation, Mineral Exploration Corporation Limited,
                                                                                                                Indian Institute of Technology, Institute Francais de Pondicherry, Botanical Survey of India, Forest
                                                                                                                Research Institute, Dehradun, Bhabha Atomic Research Center, Laboratories under Department of Science
                                                                                                                and Technology, Archaeological Survey of India, Wadia Institute of Himalayan Geology and different State
                                                                                                                Government and University Departments of Archaeology.' }}
                        </p>
                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'औद्योगिक प्रसूतिविज्ञान' : 'Industrial Palynology' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'फॉसिल फ्यूल एक्सप्लोरेशन रिसर्च के लिए इंडस्ट्रियल पैलियोलॉजी ग्रुप फॉर फ़ॉसिल फ्यूल एक्सप्लोरेशन
                                                                            रिसर्च को स्थापित करने के प्रयास चल रहे हैं, बिखरे हुए कार्बनिक पदार्थ, कोयले / लिग्नाइट लक्षण
                                                                            वर्णन और
                                                                            पैलियोइनवायरल व्याख्याओं के माध्यम से स्रोत रॉक मूल्यांकन - बीएसआईपी को अकादमिक और अनुप्रयुक्त
                                                                            अनुसंधान
                                                                            दोनों के लिए नोडल केंद्र के रूप में बढ़ावा देने के लिए।
                                                                            विस्तारित सहयोग के लिए तेल और प्राकृतिक गैस निगम और भारतीय भूवैज्ञानिक सर्वेक्षण (कोल विंग) के
                                                                            साथ
                                                                            समझौता ज्ञापन पर हस्ताक्षर किए गए हैं। निजी क्षेत्र की तेल कंपनियों ने भी पैलेनोलाजी आधारित
                                                                            स्ट्रैटिगिक
                                                                            अध्ययन के लिए रुचि दिखाई है।'
                            : 'Efforts are on to establish Industrial Palynology Group for Fossil Fuel Exploration research based on high resolution biostratigraphic framework, source rock evaluation through dispersed organic matter, coal/lignite characterization and palaeoenvironmental interpretations – to promote BSIP as a nodal center for both academic and applied research. MOU for extended collaboration have been signed with Oil and natural Gas Corporation and Geological Survey of India (Coal Wing). Private Sector Oil companies have also shown interest for Palynology based stratigraphic studies.' }}
                        </p>
                    </div>

                    <div>
                        <h3> {{ $language === 'hi' ? 'पूर्व-जलवायु' : 'Palaeoclimate' }} </h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'पैलेरोलॉजिकल और डेंड्रोक्रोनोलॉजिकल (पेड़ की अंगूठी) अध्ययनों के आधार पर चतुर्धातुक Palaeoclimate
                                                    अध्ययन संस्थान के एक प्रमुख जोर क्षेत्र कार्यक्रम का गठन करते हैं। महाद्वीपीय और तटीय झील तलछटी
                                                    उत्तराधिकार के अलावा, अरब सागर और बंगाल की खाड़ी से समुद्री तल तलछट पर अध्ययन (बहु प्रॉक्सी
                                                    पैलियोलॉजिकल
                                                    मापदंडों के आधार पर) को palaeoclimate और भूमि-समुद्र सहसंबंध के लिए शुरू किया गया है।
                                                    डेल्टा स्टडीज इंस्टीट्यूट के साथ दीर्घकालीन प्रमुख सहयोग, विशाखापट्टनम (पैरामाशिया और
                                                    हाइड्रोकार्बन
                                                    अन्वेषण के संबंध में डेल्टा / बेसिन मॉडलिंग) और नेशनल इंस्टीट्यूट ऑफ ओशनोग्राफी, गोवा (समुद्री
                                                    और तटीय
                                                    क्षेत्रों के चतुर्धातुक पर्वतीय क्षेत्रों के लिए) समझौता ज्ञापन के विभिन्न चरणों में हैं।'
                            : 'Quaternary Palaeoclimate studies based on palynological and dendrochronological (tree ring) studies constitute a major thrust area program of the Institute. Besides continental and coastal lake sedimentary successions, studies on marine bottom sediments from Arabian Sea and bay of Bengal (based on multi proxy palynological parameters) have been initiated for palaeoclimate and land-sea correlation.
                                      Long term major collaborations with Delta Studies Institute, Vishakhapattnam (for delta/basin modeling in relation to paramecia and hydrocarbon exploration) and National Institute of Oceanography, Goa (for Quaternary palaeoclimate of marine and coastal areas) are at various stages of formulation of MOU.' }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
