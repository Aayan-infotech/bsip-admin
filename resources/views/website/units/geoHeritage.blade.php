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
                    <h3 id="history">{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <img src="https://www.bsip.res.in/images/Untitled%20design_page-0001.jpg" alt=""
                                class="img-fluid img-history">
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-12">

                            <p class="normal-text"><b>{{ $language === 'hi' ? 'प्रस्तावना' : 'PREAMBLE' }}</b>
                                <br>{!! $language === 'hi'
                                    ? 'प्रोफेसर साहनी द्वारा भारत और विदेश से एकत्रित जीवाश्म पौधों का संग्रह, जिसमें उन्हें उपहार या विनिमय के रूप में प्राप्त पौधे भी शामिल हैं, ने संस्थान के संग्रहालय की शुरुआत की। संग्रहालय का भण्डार संस्थान के वैज्ञानिकों द्वारा पूरे देश में अपने क्षेत्र कार्य के दौरान एकत्रित किए गए संग्रहों और विदेशों से प्राप्त सामग्री के आदान-प्रदान से लगातार समृद्ध होता रहा है। संग्रहालय द्वारा होलोटाइप नमूने, स्लाइड और चित्रित नमूनों को व्यवस्थित रूप से संग्रहित किया जाता है, जो अनुसंधानकर्ताओं को जांच के लिए आसानी से उपलब्ध होते हैं। <br><b>भू-विरासत क्यों खतरे में है?</b> शहरी विकास, बर्बरता, तस्करी, उचित कानूनी संरक्षण और अंतर्राष्ट्रीय समझौतों की अनुपस्थिति, विशेषज्ञता की कमी और अंतर्राष्ट्रीय, राष्ट्रीय और स्थानीय अधिकारियों की अनभिज्ञता के कारण भूवैज्ञानिक स्थलों के आंशिक या पूर्ण नुकसान की संभावना है।'
                                    : 'The collection of fossil plants made by Professor
                                                                                                                                                                                                                                Sahni from
                                                                                                                                                                                                                                India and abroad,
                                                                                                                                                                                                                                including those received by him as gift or in exchange, structured the beginning of
                                                                                                                                                                                                                                Institute’s
                                                                                                                                                                                                                                museum. The repository of the museum has continuously been enriched through collections made
                                                                                                                                                                                                                                by
                                                                                                                                                                                                                                scientists of the Institute during their fieldwork all over the country, and also by the
                                                                                                                                                                                                                                receipt in
                                                                                                                                                                                                                                exchange of material from foreign countries. The Holotype specimens, slides and figured
                                                                                                                                                                                                                                specimens are
                                                                                                                                                                                                                                systematically stored by the museum that is readily available for the investigation to the
                                                                                                                                                                                                                                research
                                                                                                                                                                                                                                workers. <br><b>Why is geoheritage at risk?</b> There is scope of partial or total loss of
                                                                                                                                                                                                                                geological
                                                                                                                                                                                                                                sites triggered by urban development, vandalism, smuggling, absence of a proper legal
                                                                                                                                                                                                                                protection and
                                                                                                                                                                                                                                international agreements, lack of expertise, and unawareness of international, national and
                                                                                                                                                                                                                                local
                                                                                                                                                                                                                                authorities.' !!}
                            </p>

                            {!! $language === 'hi'
                                ? '<p class="normal-text"><b>समाज को भू-संरक्षण की आवश्यकता क्यों है?</b><br>प्रभावी भू-संरक्षण रणनीतियों के कार्यान्वयन से समाज को बहुत लाभ मिलता है। सबसे पहले, यह प्राकृतिक प्रणालियों और पारिस्थितिकी तंत्र सेवाओं के भूवैज्ञानिक घटक को समझने की आवश्यकता के बारे में जागरूकता बढ़ाता है। इसके अलावा, अच्छी तरह से प्रबंधित भूवैज्ञानिक स्थल समाज के लिए स्पष्ट लाभ के साथ विभिन्न प्रकार के संधारणीय उपयोग का समर्थन कर सकते हैं, जैसे वैज्ञानिक, शैक्षिक और आर्थिक उपयोग। यह पहले से ही दुनिया भर के कई क्षेत्रों में हो रहा है जैसे कि ग्लोबल जियोपार्क, जिन्हें यूनेस्को द्वारा पूरी तरह से मान्यता दी गई है। भू-विविधता तत्वों पर आधारित भू-पर्यटन और मनोरंजक गतिविधियाँ संयुक्त राष्ट्र द्वारा 2017 के लिए घोषित अंतर्राष्ट्रीय सतत पर्यटन वर्ष के उद्देश्यों में पूरी तरह से एकीकृत हैं। </p> <p class="normal-text">भूवैज्ञानिकों की प्राकृतिक प्रयोगशाला भूवैज्ञानिक आउटक्रॉप हैं। इसलिए, हमारा मूल हित इसे यथासंभव संरक्षित करना है। ये चट्टानें इतिहास की किताब की तरह हैं जो समय के साथ पृथ्वी के विकास का विवरण प्रदान करती हैं। इसके अलावा, राष्ट्रीय और वैश्विक महत्व की कई अनूठी भूवैज्ञानिक विशेषताएं हैं जिन्हें भू-विरासत स्थलों के रूप में वर्गीकृत किया जा सकता है। ये भू-विरासत स्थल भूवैज्ञानिक घटनाओं और प्रक्रियाओं के पाठ हैं, जो न केवल भूवैज्ञानिकों के लिए बल्कि आम लोगों और छात्रों के लिए भी रुचिकर हैं। सांस्कृतिक और ऐतिहासिक स्थल की तरह, ये भू-स्थल अतीत की घटनाओं के बारे में जानकारी प्रदान करते हैं।</p> <p class="normal-text">संयुक्त राष्ट्र सतत विकास के लिए 2030 एजेंडा सभी देशों में सार्वभौमिक रूप से लागू किए जाने वाले 17 सतत विकास लक्ष्यों को परिभाषित करता है। इनमें से कई लक्ष्य भू-विविधता और जैव-विविधता दोनों सहित प्रकृति के उचित प्रबंधन की मांग करेंगे।</p>

                                                                                                                                                                        <p class="normal-text"><b>भारत में भू-विविधता की स्थिति</b><br>48 देशों में (वर्ष 2023 तक) लगभग 195 यूनेस्को वैश्विक भू-पार्क (UGG) हैं, जिनमें कुछ बहुत छोटे देश भी शामिल हैं। लेकिन, भारत में एक भी UGG नहीं है, जबकि हमारे पास 40 यूनेस्को विश्व धरोहर स्थल हैं। ऐसा इसलिए है क्योंकि हमारे पास अभी भी भू-विविधता संरक्षण और भू-पार्क के विकास की अवधारणा के बारे में जानकारी की कमी है। हमें यह भी समझने की आवश्यकता है कि भू-पार्क भूवैज्ञानिक पार्क नहीं हैं। भू-पार्क भूवैज्ञानिक, सांस्कृतिक और ऐतिहासिक विरासत का समामेलन हैं, जिसमें भूविज्ञान केंद्र में है। समुदाय की भागीदारी हर भू-पार्क का मुख्य पहलू है। इसलिए, सरकार और विकास एजेंसियों को इस अवधारणा के बारे में जागरूक करना समय की मांग है।</p>
                                                                                                                                                                        <p class="normal-text">इसके अलावा, विभिन्न राज्यों में कई भू-विरासत विकास परियोजनाएं हैं और अच्छा काम किया जा रहा है, लेकिन किसी भी भू-विरासत स्थल की विकास योजना के बारे में कोई केंद्रीय विचार नहीं है, अवधारणा के बारे में कोई उचित समझ नहीं है और यहां तक ​​कि यह भी देखा गया है कि उचित वैज्ञानिक समर्थन की कमी के कारण विकास कार्यों ने भू-विरासत स्थलों को नुकसान पहुंचाया है। मेघालय युग की मावम्लुह गुफा को प्रथम 100 आईयूजीएस भू-विरासत स्थल घोषित किए जाने के बाद, जिसका नमूना बीएसआईपी के संग्रहालय में है, भू-विरासत स्थलों के संरक्षण और भू-पर्यटन की संभावनाओं के बारे में जागरूकता ने गति पकड़ी है। बीएसआईपी कई भू-विरासत संरक्षण परियोजनाओं में सहायक रहा है और अन्य संगठनों के साथ मिलकर जागरूकता अभियान चलाए हैं। </p> <p class="normal-text"> भू-विरासत संरक्षण का स्थायी दृष्टिकोण भू-पर्यटन है। भू-पार्कों/स्थलों को इस तरह से विकसित किया जाना चाहिए कि वे वित्त पोषण एजेंसियों पर कम से कम निर्भरता के साथ आत्मनिर्भर हों। इसके अलावा, भू-पर्यटन को बढ़ावा देने के लिए पीपीपी मॉडल को लागू करने की आवश्यकता है। हालांकि, भारत में भू-विरासत स्थलों या भू-पार्कों की योजना, विकास और स्थापना में विकास एजेंसियों/राज्य सरकारों को सलाह/सहायता देने के लिए कोई केंद्र या एजेंसी नहीं है। इस प्रकार, अलग-अलग प्रयास अपेक्षित परिणाम नहीं दे रहे हैं। बातचीत के लिए एक मंच की कमी के कारण विभिन्न एजेंसियों के बीच कोई नेटवर्किंग, सहयोग और समझ नहीं है। इसलिए, उपलब्ध विशेषज्ञता के साथ बीएसआईपी, लखनऊ के दायरे में भू-विरासत और भू-पर्यटन (सीपीजीजी) को बढ़ावा देने के लिए केंद्र की स्थापना करना समय की मांग है।</p>'
                                : ' <p class="normal-text"><b>WHY DOES SOCIETY NEED GEOCONSERVATION ?</b><br>The implementation of
                                                                                                                                                                                                        effective
                                                                                                                                                                                                        geoconservation strategies brings great advantages to society. Firstly, it raises awareness
                                                                                                                                                                                                        of the
                                                                                                                                                                                                        need to understand natural systems and the geological component of ecosystem services.
                                                                                                                                                                                                        Moreover,
                                                                                                                                                                                                        well-managed geological sites can support different types of sustainable use with clear
                                                                                                                                                                                                        benefits for
                                                                                                                                                                                                        the society, such as scientific, educational and economic use. This is already happening in
                                                                                                                                                                                                        many
                                                                                                                                                                                                        territories around the world such as with Global Geoparks, which have been fully recognized
                                                                                                                                                                                                        by UNESCO.
                                                                                                                                                                                                        Geotourism and recreational activities based on geodiversity elements are completely
                                                                                                                                                                                                        integrated in the
                                                                                                                                                                                                        aims of the International Year of Sustainable Tourism, proclaimed by the United Nations for
                                                                                                                                                                                                        2017.
                                                                                                                                                                                                    </p>
                                                                                                                                                                                                    <p class="normal-text">Geological outcrops are the natural laboratory of geoscientists.
                                                                                                                                                                                                        Therefore, our
                                                                                                                                                                                                        basic interest is to preserve it as far as possible. These outcrops are like history book
                                                                                                                                                                                                        providing
                                                                                                                                                                                                        details of evolution of Earth through time. Further, there are several unique geological
                                                                                                                                                                                                        features of
                                                                                                                                                                                                        national and global significance that can be classified as Geoheritage sites. These
                                                                                                                                                                                                        Geoheritage sites
                                                                                                                                                                                                        are lessons of geological events and processes, which are not only of the interests of
                                                                                                                                                                                                        geoscientists
                                                                                                                                                                                                        but also for the common people and students. Like cultural and historical site, these
                                                                                                                                                                                                        Geosites provide
                                                                                                                                                                                                        information about the past events.</p>
                                                                                                                                                                                                    <p class="normal-text">The United Nations 2030 Agenda for Sustainable Development defines 17
                                                                                                                                                                                                        Sustainable
                                                                                                                                                                                                        Development Goals to be universally applied in all countries. Many of these goals will
                                                                                                                                                                                                        demand proper
                                                                                                                                                                                                        management of nature, including both geodiversity and biodiversity.</p>

                                                                                                                                                                                                    <p class="normal-text"><b>STATUS OF GEOHERITAGE IN INDIA</b><br>There are about 195 UNESCO
                                                                                                                                                                                                        Global
                                                                                                                                                                                                        Geoparks (UGGs) in 48 countries (by the year 2023) including some very small countries. BUT,
                                                                                                                                                                                                        India do
                                                                                                                                                                                                        not have even a single UGG while we have 40 UNESCO World Heritage Sites. This is because we
                                                                                                                                                                                                        are still
                                                                                                                                                                                                        lacking the knowledge about the concept of Geoheritage conservation and development of
                                                                                                                                                                                                        Geoparks. We
                                                                                                                                                                                                        also need to understand that Geoparks are not Geological Parks. Geoparks are amalgamation of
                                                                                                                                                                                                        geological, cultural and historical heritage with geology in the centre. Involvement of
                                                                                                                                                                                                        community is
                                                                                                                                                                                                        the core aspect of every Geopark. Therefore, making government and developmental agencies
                                                                                                                                                                                                        aware of
                                                                                                                                                                                                        this concept is the need of time.</p>
                                                                                                                                                                                                          <p class="normal-text">Further, there are several geoheritage development projects in different
                                                                                                                                                                            states
                                                                                                                                                                            and good work is being done, but there is no central thought about the development plan of
                                                                                                                                                                            any
                                                                                                                                                                            geoheritage site, no proper understanding about the concept and even it has been observed
                                                                                                                                                                            that
                                                                                                                                                                            development works has harmed the geoheritage sites due to lack of proper scientific support.
                                                                                                                                                                            After the
                                                                                                                                                                            declaration of Mawmluh Cave of Meghalayan Age fame among the First 100 IUGS Geoheritage
                                                                                                                                                                            Site, whose
                                                                                                                                                                            type specimen is in the museum of BSIP, the awareness about the conservation and geotourism
                                                                                                                                                                            potential
                                                                                                                                                                            of geoheritage sites have taken a momentum. BSIP has been instrumental in several
                                                                                                                                                                            geoheritage
                                                                                                                                                                            conservation projects and organised awareness drives in association with other
                                                                                                                                                                            organisations.
                                                                                                                                                                        </p>
                                                                                                                                                                        <p class="normal-text">
                                                                                                                                                                            The sustainable approach of geoheritage conservation is the Geotourism. The Geoparks/sites
                                                                                                                                                                            should be
                                                                                                                                                                            developed in such a way that they are self-sustainable with least dependency on funding
                                                                                                                                                                            agencies.
                                                                                                                                                                            Further, PPP model needs to be implemented in the promotion of Geotourism. However, there is
                                                                                                                                                                            no centre
                                                                                                                                                                            or agency to advice/support developmental agencies/state governments in planning,
                                                                                                                                                                            development and
                                                                                                                                                                            establishment of Geoheritage sites or Geoparks in India. As such, isolated efforts are not
                                                                                                                                                                            bearing
                                                                                                                                                                            required fruits. There is no networking, cooperation and understanding between various
                                                                                                                                                                            agencies due to
                                                                                                                                                                            lack of a platform for interaction. Therefore, it is need of the time to establish the
                                                                                                                                                                            <b>CENTRE FOR
                                                                                                                                                                                PROMOTION OF GEOHERITAGE & GEOTOURISM(CPGG)</b> under the ambit of BSIP, Lucknow with
                                                                                                                                                                            available
                                                                                                                                                                            expertise.
                                                                                                                                                                        </p>' !!}


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="history">{{ $language === 'hi' ? 'सीपीजीजी की भूमिका:' : 'ROLE OF CPGG:' }} </h3>
                            <div class="divider"></div>
                            <ul class="custom-list">
                                <li>{{ $language === 'hi'
                                    ? 'भू-विरासत स्थलों की चुनिंदा आंतरिक परियोजनाओं को लेकर विकासात्मक प्रस्ताव तैयार करना, जिन्हें राज्य सरकारों को प्रस्तुत किया जाना है।'
                                    : 'Take selective in-house projects of geoheritage sites to prepare developmental proposals
                                                                                                                                                                    to submit
                                                                                                                                                                    to State Governments.' }}
                                </li>
                                <li> {{ $language === 'hi'
                                    ? 'किसी भी भू-विरासत स्थल योजना के लिए डोजियर, योजनाएँ तैयार करने और समय-समय पर मार्गदर्शन प्रदान करने के लिए राज्य सरकारों और विकास एजेंसियों की परामर्श परियोजनाएँ लें।'
                                    : 'Take up consultancy projects of State Governments and developmental agencies to prepare
                                                                                                                                    dossiers,
                                                                                                                                    plans, and provide time-to-time guidance for any Geoheritage site plan.' }}
                                </li>
                                <li>{{ $language === 'hi' ? 'भू-विरासत स्थलों का एक राष्ट्रीय डोजियर तैयार करें, जिसमें शामिल हैं:' : 'Prepare a national dossier of Geoheritage sites, including:' }}
                                    {!! $language === 'hi'
                                        ? '<ul>
                                                                                                                    <li>ब्रोशर की लोकप्रिय मुद्रित और सॉफ्ट कॉपी</li>
                                                                                                                    <li>लघु प्रचार फिल्में</li>
                                                                                                                    <li>युवा छात्रों और पेशेवरों को व्याख्यान देना</li>
                                                                                                                </ul>'
                                        : '<ul>
                                                                                                                    <li>Popular printed and soft copies of brochures</li>
                                                                                                                    <li>Short promotional films</li>
                                                                                                                    <li>Delivering lectures to young students and professionals</li>
                                                                                                                </ul>' !!}
                                </li>
                                {!! $language === 'hi'
                                    ? '<li>विभिन्न विकास एजेंसियों के बीच अंतर-विभागीय बातचीत और आपसी सहयोग के लिए एक नोडल एजेंसी के रूप में काम करना।</li>
                                                                                                    <li>अंतर-विषयक बातचीत के लिए एक मंच तैयार करना:
                                                                                                    <ul>
                                                                                                    <li>प्रशिक्षण पाठ्यक्रमों का आयोजन करना</li>
                                                                                                    <li>सम्मेलन आयोजित करना</li>
                                                                                                    <li>नेटवर्किंग के अवसर बनाना</li>
                                                                                                    </ul>
                                                                                                    </li>
                                                                                                    <li>भूविज्ञान, भूगोल और पर्यटन क्षेत्रों के पीएचडी विद्वानों के लिए अनुसंधान और विकास की गुंजाइश प्रदान करना।</li>'
                                    : '<li>Work as a nodal agency for inter-departmental interactions and mutual cooperation among
                                                                                                    various
                                                                                                    developmental agencies.</li>
                                                                                                <li>Prepare a platform for interdisciplinary interactions by:
                                                                                                    <ul>
                                                                                                        <li>Organizing training courses</li>
                                                                                                        <li>Hosting conferences</li>
                                                                                                        <li>Building networking opportunities</li>
                                                                                                    </ul>
                                                                                                </li>
                                                                                                <li>Provide R&D scope for Ph.D. scholars from geology, geography, and tourism sectors.</li>' !!}
                            </ul>
                            {!! $language === 'hi'
                                ? '<p class="normal-text">अधिक जानकारी के लिए कृपया संपर्क करें:</p>
                                                        <p><i class="fas fa-map-marker-alt"></i> बीरबल साहनी इंस्टीट्यूट ऑफ पैलियोसाइंसेज,<br>
                                                        53, यूनिवर्सिटी रोड, लखनऊ - 226007, उत्तर प्रदेश, भारत</p>

                                                        <p><i class="fas fa-globe"></i> वेबसाइट: <a href="https://www.bsip.res.in"
                                                        target="_blank">www.bsip.res.in</a></p>

                                                        <p><i class="fas fa-envelope"></i> ईमेल:
                                                        <a href="mailto:geoheritage@bsip.res.in">geoheritage@bsip.res.in</a>,
                                                        <a href="mailto:director@bsip.res.in">director@bsip.res.in</a>
                                                        </p>

                                                        <p><i class="fas fa-phone"></i> फ़ोन:
                                                        <a href="tel:+917607374176">+91-7607374176</a>,
                                                        <a href="tel:+915222742901">+91-522-2742901</a>
                                                        </p>'
                                : '<p class="normal-text">For further enquiries please contact:</p>
                                                                                    <p><i class="fas fa-map-marker-alt"></i> Birbal Sahni Institute of Palaeosciences,<br>
                                                                                        53, University Road, Lucknow - 226007, Uttar Pradesh, India</p>

                                                                                    <p><i class="fas fa-globe"></i> Website: <a href="https://www.bsip.res.in"
                                                                                            target="_blank">www.bsip.res.in</a></p>

                                                                                    <p><i class="fas fa-envelope"></i> Email:
                                                                                        <a href="mailto:geoheritage@bsip.res.in">geoheritage@bsip.res.in</a>,
                                                                                        <a href="mailto:director@bsip.res.in">director@bsip.res.in</a>
                                                                                    </p>

                                                                                    <p><i class="fas fa-phone"></i> Phone:
                                                                                        <a href="tel:+917607374176">+91-7607374176</a>,
                                                                                        <a href="tel:+915222742901">+91-522-2742901</a>
                                                                                    </p>' !!}

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3> {{ $language === 'hi' ? 'गतिविधियाँ और कार्यक्रम' : 'ACTIVITIES AND EVENTS' }} </h3>
                            <div class="divider"></div>
                            <p><b>{{ $language === 'hi' ? 'बीएसआईपी ने एमपीईडीबी के साथ समझौता ज्ञापन पर हस्ताक्षर किए' : 'BSIP signed MoU with MPEDB' }}</b>
                                <br>
                                {{ $language === 'hi'
                                    ? 'बीरबल साहनी पुराविज्ञान संस्थान, लखनऊ और मध्य प्रदेश इकोटूरिज्म विकास बोर्ड (एमपीईडीबी) ने भू-विरासत और भू-पर्यटन के संरक्षण और संवर्धन के लिए आपसी सहयोग हेतु 25 जुलाई, 2023 को एक समझौता ज्ञापन (एमओयू) पर हस्ताक्षर किए। एमपीईटीडीबी, भोपाल की सीईओ डॉ. समीता राजोरा ने एमओयू पर हस्ताक्षर करने के लिए बीएसआईपी, लखनऊ का दौरा किया और बीएसआईपी की निदेशक डॉ. वंदना प्रसाद के साथ योजनाओं पर चर्चा की।'
                                    : 'Birbal Sahni Institute of Palaeosciences, Lucknow and Madhya Pradesh Ecotourism Development
                                                                Board
                                                                (MPEDB) signed a Memorandum of Understanding (MoU) on 25th July, 2023 to have mutual
                                                                cooperation for
                                                                conserving and promoting the geoheritage and geotourism. Dr. Sameeta Rajora, CEO, MPETDB,
                                                                Bhopal
                                                                visited BSIP, Lucknow to sign the MoU and discussed plans with Dr. Vandana Prasad, Director,
                                                                BSIP.' }}
                            </p>
                            <img src="https://www.bsip.res.in/admin/assets/img/BSIPGEO6_12_59_11_PM_9633.png" alt=""
                                class="img-fluid img-history">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h3>{{ $language === 'hi' ? 'सीपीजीजी का उद्घाटन' : 'Inauguration of CPGG' }}</h3>
                            <div class="divider"></div>
                            <p>{{ $language === 'hi'
                                ? 'भू-विरासत एवं भू-पर्यटन को बढ़ावा देने के लिए नव स्थापित केंद्र का उद्घाटन 28 जून 2023 को बीरबल साहनी पुराविज्ञान संस्थान, लखनऊ के शासी निकाय के अध्यक्ष प्रो. नितिन आर. कर्मालकर द्वारा बीरबल साहनी पुराविज्ञान संस्थान, लखनऊ की निदेशक डॉ. वंदना प्रसाद की उपस्थिति में किया गया। समारोह के दौरान शासी निकाय एवं अनुसंधान सलाहकार समिति के सदस्य और वरिष्ठ वैज्ञानिक मौजूद थे।'
                                : 'Newly established Center for promotion of Geoheritage and Geotourism was inaugurated by Prof.
                                                            Nitin R Karmalkar, Chairman, Governing Body, Birbal Sahni Institute of Palaeosciences,
                                                            Lucknow in presence of Dr. Vandana Prasad, Director, Birbal Sahni Institute of
                                                            Palaeosciences, Lucknow on 28 June 2023. The Governing Body and Research Advisory Committee
                                                            members and senior scientists were present during the ceremony.' }}
                            </p>
                            <img src="https://www.bsip.res.in/admin/assets/img/BSIPGEO6_12_59_28_PM_7468.png" alt=""
                                class="img-fluid img-history">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
