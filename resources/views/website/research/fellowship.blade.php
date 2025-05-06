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
                <!-- Main Content -->
                <div class="col-md-9 content">
                    <div>
                        <h3>{{ $language === 'hi' ? ' वैज्ञानिकों के लिए योजना' : 'Scheme for Scientists' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'यह संस्थान वैज्ञानिकों को पैलेओबॉटनी और संबद्ध विषयों में अनुसंधान करने और पैलेओबॉटनी में युवा व्यक्तियों के प्रशिक्षण के लिए कई अवसर प्रदान करता है। पलायोबोटनी के क्षेत्र में अनुसंधान को बढ़ावा देने और उपलब्धियों को पहचानने के लिए, संस्थान ने निम्नलिखित की स्थापना की है:'
                            : 'The Institute offers several opportunities for scientists to carry out research in palaeobotany
                                                                                                    and allied disciplines and training of young persons in palaeobotany. To encourage the research
                                                                                                    and recognize the achievements in the field of Palaeobotany, the Institute has instituted the
                                                                                                    following:' }}

                        </p>
                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'बीरबल साहनी प्रोफेसरशिप' : 'Birbal Sahni Professorship' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi' ? 'लियोबोटनी या संबद्ध विषयों में विशेषज्ञता वाले उत्कृष्ट वैज्ञानिकों को बीरबल साहनी प्रोफेसर की पेशकश की गई है ताकि वे रचनात्मक कार्य जारी रख सकें और संस्थान द्वारा प्रकाशित होने के लिए मोनोग्राफ या ग्रंथ लिख सकें। प्रो. टी.एस. सदाशिवन, भारत और प्रो। टी.एम. हैरिस, यू.के. को यह सम्मान दिया गया।' : 'Outstanding scientists with specialization in palaeobotany or allied disciplines have been offered Birbal Sahni Professorship to enable him/her to continue creative work and write monographs or treatises to be published by the Institute. Prof. T.S. Sadasivan, India and Prof. T.M. Harris, U.K. were bestowed this honor.' }}
                        </p>
                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'एमेरिटस वैज्ञानिक योजना' : 'Emeritus Scientist Scheme' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान के वरिष्ठ सेवानिवृत्त वैज्ञानिक और ख्याति के अन्य वैज्ञानिक जो अपने विशेषज्ञता में नेताओं / विशेषज्ञों को स्वीकार करते हैं, उन्हें अनुसंधान के अपने संबंधित क्षेत्रों में जारी रखने के लिए आमंत्रित किया जाता है।'
                            : 'Senior retired scientists of BSIP and other scientists of repute who are acknowledged
                                                                            leaders/experts in their specialization are invited to continue in their respective fields of
                                                                            research.' }}
                        </p>
                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'आगंतुक वैज्ञानिक योजना' : 'Visiting Scientist Scheme' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'भारत और विदेशों के उच्च शिक्षण, अनुसंधान एवं विकास प्रयोगशालाओं और वैज्ञानिक संगठनों के अन्य संस्थानों के प्रख्यात वैज्ञानिकों को पैलेओबोटनी और संबद्ध विषयों में राष्ट्रीय / अंतर्राष्ट्रीय सहयोग को बढ़ावा देने और नए विचारों और तकनीकों को लाने के लिए तीन से छह महीने की अवधि के लिए आमंत्रित किया जाता है। संस्थान।'
                            : 'Eminent Scientists from other institutions of higher learning, R & D Laboratories and scientific
                                                    organizations from India and abroad are invited for a period of three to six months for
                                                    promoting national/international cooperation in palaeobotany and allied disciplines and for
                                                    bringing new ideas and techniques at the Institute.' }}
                        </p>
                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'बीरबल साहनी अनुसंधान छात्रवृत्ति' : 'Birbal Sahni Research Scholarship' }}
                        </h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'अच्छे अकादमिक रिकॉर्ड वाले उज्ज्वल युवा व्यक्तियों को पलायोबोटनी / पैलियोनोलॉजी के क्षेत्र के अनुभवी शोधकर्ताओं / जांचकर्ताओं और वनस्पति विज्ञान और भूविज्ञान के ऐसे पहलुओं के तहत अनुसंधान प्रशिक्षण का अवसर प्रदान किया जाता है, जो कि पैलेओबोटिकल अनुसंधान पर सीधा असर डालते हैं। बीरबल साहनी रिसर्च फेलो को पीएचडी के लिए पंजीकरण करना आवश्यक है।'
                            : 'Bright young persons with good academic record are provided opportunity for research training
                                                    under experienced researchers / investigators of repute in the field of Palaeobotany/Palynology
                                                    and such aspects of Botany and Geology which have a direct bearing on palaeobotanical research.
                                                    The Birbal Sahni Research Fellow is required to register for the Ph.D.' }}
                        </p>
                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'बीरबल साहनी अनुसंधान सहयोगी योजना' : 'Birbal Sahni Research Associateship Scheme' }}
                        </h3>
                        <div class="divider"></div>
                        <ul class="custom-list">
                            <li>{{ $language === 'hi'
                                ? 'बीरबल साहनी रिसर्च असोसिटशिप (बीएसआरए) योजना को पैलेओबोटनी और संबद्ध विषयों जैसे पफ्रेम्ब्रियन पैलायोबायोलोजी पैलियोजोइक पैलियोबॉटनी \ _ पैलियोबायोनी, पैलियोबायोनी, पैलियोबायोनी, पैलियोबायोनी और पैलियोबैनी पैलियोबेनी पैलियोनोनि पैलियोनॉटनी के क्षेत्र में उज्ज्वल युवा शोधकर्ताओं को अवसर प्रदान करने के लिए स्थापित किया गया है। मरीन माइक्रोपलायोनोलॉजी \ माइक्रोपलाओबॉटनी, कोल पेट्रोलॉजी \ _ स्रोत रॉक मूल्यांकन, औद्योगिक (हाइड्रोकार्बन एक्सप्लोरेशन) और आर्कियोबोटनी \ _ डेंड्रोकॉलॉजी।'
                                : 'The Birbal Sahni Research Assocateship (BSRA) Scheme has been instituted to provided
                                                            opportunities to bright young researchers in the field of palaeobotany and allied
                                                            disciplines such as Pfrecambrian palaeobilogy palaeozoic Palaeobotany\ Palanology, Mesozoic
                                                            Palaeobotany\Palyonology, Cenozoic Palaeobotany\Palynology, Quaternary
                                                            Palynology\Palaeoclimate Marine Micropalaeonlogy\ Micropalaeobotany, Coal Petrology\Source
                                                            Rock Evaluation, Industrial (Hydrocarbon Exploration)and Archaeobotany\Dendrochronology.' }}
                            </li>
                            <li>{{ $language === 'hi' ? 'इस योजना के तहत एक समय में अधिकतम 5 सहयोगी संस्थाएँ संचालित होंगी।' : 'There will be a maximum of 5 associateship operating at a time under this Scheme.' }}</li>
                            <li>{{ $language === 'hi' ? 'सभी संघों को पालयोबोटनी के बीरबल साहनी संस्थानों में किराए पर लिया जाएगा।':'All the associateships will be tenable at the Birbal Sahni Institutions of Palaeobotany.' }}
                            </li>
                            <li>{{ $language === 'hi' ? 'केवल भारतीय नागरिक आमतौर पर भारत के निवासी शोध सहयोगी के लिए पात्र हैं।' : 'Only Indian citizens normally residents of India are eligible for research associateship.' }}
                            </li>
                            <li>{{ $language === 'hi' ? 'एसोसिएटशिप का पुरस्कार बीरबल साहनी इंस्टीट्यूट ऑफ पलायोबोटनी में बाद के रोजगार के लिए कोई आश्वासन या गारंटी नहीं होगा।' : 'The award of associateship shall not imply any assurance or guarantee for subsequent employment at the Birbal Sahni Institute of Palaeobotany.' }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
