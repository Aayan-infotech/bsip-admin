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
            <ul>
                <li>
                    <a href="{{ $language === 'hi' ? url('hi') : url('en') }}" aria-label="{{ $language === 'hi' ? 'मुख्य पृष्ठ पर जाएं' : 'Go to Home' }}">
                        {{ $language === 'hi' ? 'मुख्य' : 'Home' }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" aria-label="{{ $language === 'hi' ? 'रोजगार' : 'Career' }}">{{ $language === 'hi' ? 'रोजगार' : 'Career' }}</a>
                </li>
                <li class="active" aria-current="page">
                    {{ $language === 'hi' ? 'बीरबल साहनी अनुसंधान के लिए अल्पावधि प्रशिक्षण कार्यक्रम विद्वान, स्नातकोत्तर और स्नातक छात्र' : 'BIRBAL SAHNI SHORT TERM TRAINING PROGRAMS FOR RESEARCH SCHOLARS, POSTGRADUATE AND UNDERGRADUATE STUDENTS' }}
                </li>
            </ul>
        </nav>
    </div>
</section>

<section class="common-mobile-view">
    <div class="container-fluid py-3">
        <div class="row gx-5">
            @include('website.layouts.sidebar', ['menuPages' => $menuPages, 'currentPageId' => $currentPageId, 'language' => $language])

            <!-- Main Content -->
            <div class="col-md-9 content">
                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'बीरबल साहनी अनुसंधान के लिए अल्पावधि प्रशिक्षण कार्यक्रम विद्वान, स्नातकोत्तर और स्नातक छात्र' : 'BIRBAL SAHNI SHORT TERM TRAINING PROGRAMS FOR RESEARCH SCHOLARS, POSTGRADUATE AND UNDERGRADUATE STUDENTS' }}">
                            {{ $language === 'hi' ? 'बीरबल साहनी अनुसंधान के लिए अल्पावधि प्रशिक्षण कार्यक्रम विद्वान, स्नातकोत्तर और स्नातक छात्र' : 'BIRBAL SAHNI SHORT TERM TRAINING PROGRAMS FOR RESEARCH SCHOLARS, POSTGRADUATE AND UNDERGRADUATE STUDENTS' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीरबल साहनी अनुसंधान के लिए अल्पावधि प्रशिक्षण कार्यक्रम विद्वान, स्नातकोत्तर और स्नातक छात्र' : 'BIRBAL SAHNI SHORT TERM TRAINING PROGRAMS FOR RESEARCH SCHOLARS, POSTGRADUATE AND UNDERGRADUATE STUDENTS' }}">
                            {{ $language === 'hi' ?
                ' बीएसआईपी बुनियादी और अनुप्रयुक्त अनुसंधान में एकीकृत नवीन विचारों के साथ एक समर्पित वैज्ञानिक टीम के माध्यम से अनुसंधान और विकास में उत्कृष्टता प्राप्त करने का प्रयास कर रहा है। इसने अपने अनुसंधान आयामों को व्यापक बनाया है और अपने अधिदेश का काफी विस्तार किया है, जिसमें एक छत के नीचे पैलियोसाइंस को आगे बढ़ाने और वैश्विक परिवर्तन के बीच देश की बढ़ती जरूरतों को पूरा करने के लिए सुदृढ़ रणनीतियों और परिष्कृत विश्लेषणात्मक सुविधाओं के साथ एक अधिक समग्र दृष्टिकोण को समायोजित किया गया है।

इस दृष्टि से, बीएसआईपी विभिन्न शैक्षणिक चरणों में छात्रों की जरूरतों को पूरा करने के लिए एक योजना पेश करता है, जिसमें बीएससी, एमएससी और डॉक्टरेट की डिग्री प्राप्त करने वाले शोधार्थी शामिल हैं, जो पैलियोसाइंस और संबद्ध विषयों में वर्तमान रुझानों में रुचि रखते हैं।

बीएसआईपी में अनुसंधान में विकासवादी पहलू, आकृति विज्ञान और वर्गीकरण, उच्च संकल्प बायोस्ट्रेटीग्राफी, पैलियोबायोगोग्राफी, पैलियोक्लाइमेट, पैलियोइकोलॉजी पैलियोएनवायरनमेंट; ध्रुवीय अनुसंधान; ग्लेशियोलॉजी; औद्योगिक माइक्रोपेलियोन्टोलॉजी; एम्बर विश्लेषण और पैलियोएंटोमोलॉजी; कशेरुकी अकशेरुकी पैलियोन्टोलॉजी; पुरातत्व वनस्पति विज्ञान और प्राचीन डीएनए अध्ययन; डेंड्रोक्रोनोलॉजी; तलछट विज्ञान; समुद्र विज्ञान; रेडियोकार्बन जियोक्रोनोलॉजी, टीएल/ओएसएल डेटिंग; मौलिक, अकार्बनिक स्थिर आइसोटोप जियोकेमिस्ट्री; कार्बनिक जियोकेमिस्ट्री कोयला पेट्रोलॉजी और पैलियोमैग्नेटिज्म शामिल हैं, ताकि अंतःविषय जैविक और अजैविक दृष्टिकोणों का उपयोग करके भूवैज्ञानिक समय के माध्यम से पृथ्वी, महासागर और जीवन रूपों के विकास का अध्ययन किया जा सके।' :
                ' BSIP is striving to attain excellence in R & D through a dedicated scientific team together with integrated innovative ideas in basic and applied research. It has widened its research dimensions and significantly expanded its mandate accommodating a more holistic approach with reinforced strategies and sophisticated analytical facilities to pursue palaeosciences under one roof and cater enhancing needs of the country amidst global change.

With this in view, BSIP offers a scheme to cater to students at various academic stages including BSc, MSc and research scholars pursuing their doctorate degree, who are interested in current trends in palaeosciences and allied subjects.

Research at BSIP involves evolutionary aspects, morphology and taxonomy, high resolution biostratigraphy, palaeobiogeography, palaeoclimate, palaeoecology & palaeoenvironment; polar research; glaciology; industrial micropalaeontology; amber analysis and palaeoentomology; vertebrate & invertebrate palaeontology; archaeobotany and ancient DNA studies; dendrochronology; sedimentology; oceanography; radiocarbon geochronology, TL/OSL dating; elemental, inorganic & stable isotope geochemistry; organic geochemistry & coal petrology and palaeomagnetism to study the evolution of the earth, ocean, and life forms through geological time using interdisciplinary biotic and abiotic approaches. ' }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है' : 'BSIP offers training in the following fields' }}">
                            {{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है' : 'BSIP offers training in the following fields' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'पुरावनस्पति विज्ञान और परागविज्ञान-हमारे पास पुरावनस्पति विज्ञान के विशेषज्ञ बड़ी संख्या में हैं और पैलिनोलोजी जो विभिन्न भूवैज्ञानिक युगों के मेगाफॉसिल्स और पैलिनोमोर्फ पर काम करते हैं से उनके विकासवादी पहलुओं, आकृति विज्ञान और वर्गीकरण का दृष्टिकोण उच्च है संकल्प बायोस्ट्रेटिग्राफी, पुराजैविकता, पुराजलवायु, पुरापारिस्थितिकी और पुरापाषाणपर्यावरण. वे प्रीकैम्ब्रियन जीवन के विविधीकरण से भी निपटते हैं; विविधता, वितरण, मूल, फ़ाइलोजेनेटिक ढांचे में पैलियोज़ोइक, मेसोज़ोइक और सेनोज़ोइक वनस्पतियों का विकास; अंतर और गोंडवानन और सेनोज़ोइक समय-स्लाइस के दौरान अंतर-बेसिनल और वैश्विक सहसंबंध; के दौरान जलवायु परिवर्तन और वनस्पति के बीच संबंध को समझना चारों भागों का अवधि। वे अलग करने के लिए मैक्रेशन जैसी प्रयोगशाला तकनीकों पर प्रशिक्षण प्रदान करते हैं ये संस्थाएँ उनके संबद्ध रॉक मैट्रिक्स से; उनकी पहचान और व्याख्या. ' :
                'Palaeobotany and Palynology- We have a large number of experts in palaeobotany and palynology who work on megafossils and palynomorphs from different geological ages from the view point of their evolutionary aspects, morphology and taxonomy, high resolution biostratigraphy, palaeobiogeography, palaeoclimate, palaeoecology and palaeoenvironment. They also deal with diversification of Precambrian life; diversity, distribution, origin, evolution of Paleozoic, Mesozoic and Cenozoic flora in a phylogenetic framework; intra- and inter-basinal and global correlation during Gondwanan and Cenozoic time-slices; understanding the link(s) between climate change and vegetation during the Quaternary Period. They offer training on laboratory techniques like maceration to separate these entities from their associated rock matrix; their identification and interpretation. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'औद्योगिक सूक्ष्म जीवाश्म विज्ञान-यह पूरी तरह से के विश्लेषण के लिए समर्पित है पैलीनोलॉजिकल और हाइड्रोकार्बन अन्वेषण में अनुप्रयोग के लिए पुरापाषाणकालीन प्रॉक्सी। प्रमुख कार्य इस का सुविधा में बायोस्ट्रेटिग्राफी और तैयारी के माध्यम से सटीक आयु निर्धारण शामिल है 2डी का फोरामिनिफेरा के विश्लेषण पर आधारित निक्षेपणात्मक पुरापर्यावरणीय मॉडल, कैल्शियम युक्त नैनोफॉसिल्स, डाइनोफ्लैगलेट सिस्ट और बीजाणु-पराग। पैलिनोलॉजिकल की गणना समुद्री समुद्र स्तर में परिवर्तन को समझने, समुद्री बाढ़ की पहचान के लिए सूचकांक (पीएमआई)। सतहों, और पुरातटीय तटों का सीमांकन और पारिस्थितिक चार्ट तैयार करना इनमें से कुछ हैं पैलीनोलॉजिकल प्रॉक्सी के अध्ययन से अन्य डिलिवरेबल्स। बेन्थिक और का अध्ययन प्लैंकटिक फोरामिनिफेरा प्रयोगशाला के काम का एक अभिन्न अंग है जो उच्च है में संभावना उथले-समुद्री से गहरे पुरापाषाणकालीन वातावरण का पुनर्निर्माण और मूल्यवान निष्कर्ष निकालना पैलियोबैथिमेट्रिक डेटा।' :
                'Industrial Micropalaeontology- It is fully dedicated to the analysis of palynological and palaeontological proxies for application in hydrocarbon exploration. Major functions of this facility include precise age determination through biostratigraphy and preparation of 2D depositional palaeoenvironmental models based on the analysis of foraminifera, calcareous nannofossils, dinoflagellate cysts and spore-pollen. Calculation of Palynological Marine Index (PMI) for deciphering sea level changes, identification of marine flooding surfaces, and the demarcation of palaeoshorelines and preparation of ecological charts are some of the other deliverables from the study of palynological proxies. Study of benthic and planktic foraminifera are an integral component of the laboratory work that has high potential in the reconstruction of shallow-marine to deeper palaeoenvironments and deducing valuable palaeobathymetric data. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'एम्बर विश्लेषण और पुरापाषाण विज्ञान- बीरबल साहनी संस्थान पैलियोसाइंसेज, इस क्षेत्र में अनुसंधान करने वाला भारत का एकमात्र संगठन है विज्ञान की इस प्रकार भारत दुनिया के उन कुछ देशों में शामिल है जहां एम्बर और अन्य पर अध्ययन किया जाता है इसका संरक्षित बायोटा का अनुसरण किया जा रहा है। इसने राष्ट्रीय और अंतर्राष्ट्रीय को आकर्षित किया है जीवाश्म विज्ञानी, भूवैज्ञानिक और कीटविज्ञानी। बीएसआईपी में एम्बर विभाग प्रशिक्षण प्रदान करता है नमूना एम्बर में अंतर्निहित जीवाश्म कीड़ों और संबंधित बायोटा के निष्कर्षण की तैयारी से पश्चिमी भारत के सेनोज़ोइक बेसिन, विशेषकर कच्छ और कैम्बे की लिग्नाइट खदानें के बेसिन गुजरात, और सह-विकास, जैव विविधता और फैलाव मार्गों पर उनका महत्व जीव-जंतु और वनस्पति. ' :
                'Amber Analysis and Palaeoentomology- Birbal Sahni Institute of Palaeosciences, is the only organization in India to carryout research in this field of science thus including India among the few countries in the world where studies on amber and its preserved biota are being pursued. It has attracted national and international palaeontologists, geologists and entomologists. The amber department at BSIP provides training on sample preparation for extraction of fossil insects and associated biota embedded in amber from the Cenozoic basins of western India preferably the lignite mines of Kutch and Cambay basins of Gujarat, and their significance on coevolution, biodiversity and dispersal routes of fauna and flora. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'कशेरुकी पुरापाषाण विज्ञान- यह अन्वेषण और पुनर्प्राप्ति से संबंधित है मेगा की तकनीकें और माइक्रोफॉसिल कशेरुक, संबंधित माइक्रोफौना, और इचनोफॉसिल्स और कोप्रोलाइट्स की पश्चिमी भारत के मेसोज़ोइक और सेनोज़ोइक अनुक्रमों की उत्पत्ति, विकास का अध्ययन करने के लिए विविधता, पुरापाषाण भूगोल और पुरापर्यावरण। यह विभिन्न विषयों पर प्रशिक्षण भी प्रदान करता है उपकरण कशेरुकी जीवाश्मों, फोटो दस्तावेज़ीकरण और उनके तैयार करने के लिए उपयोग किया जाता है morphometric पहलू। ' :
                'Vertebrate Palaeontology- It deals with the exploration and recovery techniques of mega and microfossil vertebrates, associated microfauna, and ichnofossils and coprolites of the Mesozoic and Cenozoic sequences of western India to study their origin, evolution, diversity, palaeobigeography and palaeoenvironment. It also provides training on various equipment utilized for preparation of vertebrate fossils, photo documentation and their morphometric aspects. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'अकशेरुकी पुरापाषाण विज्ञान (प्रीकैम्ब्रियन-से-प्रारंभिक पुरापाषाण काल)- प्रदान करता है अंतर्दृष्टि में जैव विविधता के संदर्भ में पृथ्वी का जीवमंडल, और पारिस्थितिक संपर्क के माध्यम से की विविध रेंज जीवाश्म, जिसमें ट्रेस जीवाश्म (इक्नोलॉजी), शरीर के जीवाश्म (ट्रिलोबाइट्स, गैस्ट्रोपोड्स, क्रस्टेशियंस, ब्रैकियोपोड्स आदि) और अन्य छोटे शेली जीव (एसएसएफ) और पैलिनोमोर्फ जैसे एक्रिटार्क्स, कार्बनिक दीवार वाले माइक्रोफॉसिल्स (ओडब्लूएम) और क्रिप्टोस्पोर। यह क्षेत्र मौलिक अन्वेषण करता है के बारे में सवाल जीवन की उत्पत्ति और अचानक विविधीकरण, जबकि वैज्ञानिक कौशल विकसित करना पूछताछ और अंतःविषय अनुसंधान. यह जैसे विषयों के लिए बहुमूल्य अंतर्दृष्टि प्रदान करता है पुरापाषाण विज्ञान, विकासवादी जीवविज्ञान, भूविज्ञान, पुरापारिस्थितिकी विज्ञान, पुरापाषाण भूगोल और पद्धति दृष्टिकोण प्रयोगशाला विश्लेषण सहित (उदाहरण के लिए, माइक्रोस्कोपी और माइक्रोफोटोग्राफी, जियोकेमिकल)। विश्लेषण, मैक्रेशन तकनीक आदि) और डेटा प्रोसेसिंग, और व्याख्या। छात्र सीखते हैं संघटित करना अकशेरुकी जीवाश्म विज्ञान का अध्ययन करके विभिन्न क्षेत्रों से ज्ञान प्राप्त करना, पालन-पोषण करना बहुविषयक अनुसंधान और सहयोग। ' :
                'Invertebrate Palaeontology (Precambrian -To- early Palaeozoic)- Provides insights into Earths biosphere in term of biodiversity, and ecological interactions through a diverse range of fossils, including trace fossils (Ichnology), body fossils (trilobites, gastropods, crustaceans, brachiopods etc.) and other small shelly faunas (SSFs) and palynomorphs such as acritarchs, Organic walled microfossils (OWM) and cryptospores. This field explore fundamental questions about lifes origins and abrupt diversification, while developing skills in scientific inquiry and interdisciplinary research. It contributes valuable insights to disciplines like Palaeontology, Evolutionary Biology, Geology, Palaeoecology, Palaeobiogeography and Methodological approaches including laboratory analysis (e.g., microscopy and microphotography, geochemical analysis, maceration techniques etc.) and data processing, and interpretation. Students learn to integrate knowledge from various fields by studying invertebrate palaeontology, fostering multidisciplinary research and collaboration. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'आर्कियोबॉटनी और प्राचीन डीएनए अध्ययन- यह उत्पत्ति और प्राचीनता से संबंधित है प्राचीन सभ्यताएँ, मानव इतिहास और उसके बाद के हस्तक्षेप। प्राचीन डीएनए अध्ययन और इंसान- पर्यावरण संपर्क हमारी समझ को गहरा करने का एक अनूठा अवसर प्रदान करता है अतीत, मानव इतिहास को उजागर करें और बीच के जटिल संबंधों पर प्रकाश डालें मनुष्य और उनके वातावरण. बीएसआईपी के विशेषज्ञ प्राप्त करने के लिए डीएनए अनुक्रमण और विश्लेषण करते हैं आनुवंशिक प्राचीन मानव और गैर-मानव नमूनों से जानकारी, जिससे अध्ययन संभव हो सके जनसंख्या अतीत में गतिशीलता, प्रवासन, रोग विकास और आनुवंशिक अनुकूलन। वे सौदा भी आनुवंशिक विविधता, जनसंख्या संरचना और का पता लगाने के लिए पैलियोजीनोमिक्स के साथ विकासवादी प्राचीन मानव आबादी का इतिहास, जिसमें प्राचीन मानव का अध्ययन भी शामिल है पलायन, मिश्रण घटनाएँ, और अन्य होमिनिड प्रजातियों के साथ आनुवंशिक बातचीत; मानव पर्यावरण इंटरैक्शन; प्राचीन रोगज़नक़ जीनोम की जांच करने के लिए पैलियोपैथोलॉजी और रोग अतीत में संक्रामक रोगों की व्यापकता और विकास, और आनुवंशिक का पता लगाएं के आधार प्राचीन मानव रोग और पर्यावरणीय कारकों के साथ उनकी अंतःक्रिया।' :
                'Archaeobotany and Ancient DNA Studies- It deals with origin and antiquity of ancient civilizations, human history and subsequent interventions. Ancient DNA studies and Human- Environment interaction provides a unique opportunity to deepen our understanding of the past, unravel human history, and shed light on the intricate relationships between humans and their environments. Experts at BSIP conduct DNA sequencing and analysis to obtain genetic information from ancient human and non-human samples, enabling the study of population dynamics, migrations, disease evolution, and genetic adaptation in the past. They also deal with- Palaeogenomics to explore the genetic diversity, population structure, and evolutionary history of ancient human populations, including the study of ancient human migrations, admixture events, and genetic interactions with other hominid species; human-environment interaction; paleopathology and disease to investigate ancient pathogen genomes and the prevalence and evolution of infectious diseases in the past, and explore the genetic basis of ancient human diseases and their interactions with environmental factors. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'डेंड्रोक्रोनोलॉजी- डेंड्रोक्रोनोलॉजी वह विज्ञान है जो कालनिर्धारण से संबंधित है और पढ़ाई लकड़ी में वार्षिक वृद्धि परतें। यह सबसे सटीक डेटिंग तकनीक है वैज्ञानिक बिरादरी आजकल उपयोग करती है। यह आज तक का वार्षिक और मौसमी समाधान प्रदान करता है पिछले रिकॉर्ड. बीएसआईपी में डेंड्रोक्रोनोलॉजी प्रयोगशाला अच्छी तरह से सुसज्जित है और प्रशिक्षण प्रदान करती है डेंड्रोक्रोनोलॉजी की तकनीकें और अनुप्रयोग, जिसमें प्रसंस्करण शामिल है, क्रॉस-डेटिंग, स्थापित करने के लिए वृक्ष-वलय कालक्रम का मापन और विकास वृक्ष-विकास-जलवायु- संबंध, जलवायु पुनर्निर्माण और उनकी व्याख्याएँ। ' :
                'Dendrochronology- Dendrochronology is the science that deals with the dating and studying annual growth layers in wood. It is the most accurate dating technique that the scientific fraternity uses nowadays. It provides annual and seasonal resolutions to date the past records. The Dendrochronology Laboratory at BSIP is well-equipped and offers training on techniques and applications of dendrochronology, which involves processing, cross-dating, measurement, and development of tree-ring chronologies to establish tree-growth-climate- relationship, climatic reconstructions, and their interpretations. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'सेडिमेंटोलॉजी- सेडिमेंटोलॉजी एक जीवंत अनुशासन है जो परिसर की खोज करता है की परस्पर क्रिया भूवैज्ञानिक प्रक्रियाएँ जिन्होंने अतीत के साथ-साथ भविष्य में भी हमारे ग्रह को आकार दिया है उपस्थित। यह पृथ्वी विज्ञान में सबसे आगे है, जो अतीत में एक अनोखी खिड़की पेश करता है। द्वारा पढ़ना तलछट और तलछटी चट्टानें, हम प्राचीन पर्यावरण का पुनर्निर्माण कर सकते हैं, समझ सकते हैं अतीत जलवायु, और भूदृश्यों के विकास को समझें। सेडिमेंटोलॉजी एक धन प्रदान करती है का प्राचीन पारिस्थितिकी प्रणालियों की खोज, अध्ययन के संदर्भ में अनुसंधान के अवसर इसका प्रभाव समय के साथ जलवायु परिवर्तन, और नए निर्माण खंडों और ऊर्जा की खोज संसाधन। बीएसआईपी में तलछटविज्ञानी फील्डवर्क और प्रयोगशाला विश्लेषण में प्रशिक्षण प्रदान करते हैं प्रक्रिया आधारित भौतिक तलछट विज्ञान, चेहरे की पहचान और व्याख्या, पतला खंड पेट्रोग्राफी, अनुक्रम स्ट्रैटिग्राफी, तलछट भू-रसायन, मिट्टी खनिज विज्ञान, को समझना स्थलीय, समुद्री और सहित तलछटी वातावरण की बारीकियाँ संक्रमणकालीन तलछट की विशेषताओं पर सेटिंग्स और उनके संबंधित प्रभाव और अवसादी चट्टानें; बेसिन विश्लेषण और पुराभौगोलिक पुनर्निर्माण और भी अन्वेषण करना प्राकृतिक संसाधन जैसे तेल, गैस और भूजल।  ' :
                'Sedimentology- Sedimentology is a vibrant discipline that explores the complex interplay of geological processes that have shaped our planet both in the past as well as in the present. It is at the forefront of Earth Sciences, offering a unique window into the past. By studying sediments and sedimentary rocks, we can reconstruct ancient environments, decipher past climates, and understand the evolution of landscapes. Sedimentology offers a wealth of opportunities for research in terms of exploring ancient ecosystems, studying the effects of climate change through time, and discovering new building blocks and energy resources. The sedimentologists at BSIP offer training in fieldwork and laboratory analysis for process based physical sedimentology, facies identification and interpretation, thin section petrography, sequence stratigraphy, sediment geochemistry, clay mineralogy, to understand the nuances of sedimentary environments, including terrestrial, marine, and transitional settings and their corresponding influence on the characteristics of sediments and sedimentary rocks; basin analysis and paleogeographic reconstruction and also to explore natural resources such as oil, gas, and groundwater. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'समुद्र विज्ञान-बीएसआईपी के महासागर और ध्रुवीय पुराजलवायु संकाय कार्यान्वित करते हैं पर अनुसंधान हिंद महासागर, दक्षिणी महासागर, आर्कटिक और अंटार्कटिक शासन। गहरा समुद्र हाइड्रोडायनामिक्स, तलछट आंदोलन, जलवायु-जल जन संपर्क, और जैविक उत्पादकता उपयोग सुविधाओं में फोरामिनिफेरा, डायटम, डाइनोफ्लैगलेट्स आदि का अध्ययन किया जाता है। भू-रासायनिक अध्ययन ध्रुवीय से पिछली उत्पादकता, उत्पत्ति और ऑक्सीजनेशन को समझने के लिए उपयोग किया जाता है और समुद्री शासन. बीएसआईपी में आधुनिक जियोकेमिकल, माइक्रोपेलेन्टोलॉजिकल, और है इन अध्ययनों को करने के लिए तलछट संबंधी सुविधाएं। ' :
                'Oceanography-The Ocean and Polar Palaeoclimate faculties of BSIP carry out research on the Indian Ocean, Southern Ocean, Arctic, and Antarctic regimes. Deep sea hydrodynamics, sediment movement, climate-water mass interactions, and biological productivity utilizing foraminifera, diatoms, dinoflagellates, etc. are studied at the facilities. Geochemical studies are utilized to understand past productivity, provenance, and oxygenation from polar and oceanic regimes. BSIP has modern geochemical, micropalaeontological, and sedimentological facilities to carry out these studies. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'भू-रसायन- भू-रसायन प्रभाग के वैज्ञानिकों में विविधता है में विशेषज्ञता अध्ययन के लिए अकार्बनिक, कार्बनिक और आइसोटोपिक (स्थिर और रेडियोजेनिक आइसोटोप) उपकरण विकासवादी पृथ्वी, महासागर और जीवन का प्रक्षेप पथ, और नियंत्रित करने वाले विभिन्न भूवैज्ञानिक कारक पृथ्वी का सतही वातावरण. संस्थान कई अत्याधुनिक सुविधाओं की मेजबानी करता है विश्लेषणात्मक आईसीपी-ओईएस, एक्सआरडी, जैसे भू-रासायनिक और समस्थानिक डेटासेट को मापने की सुविधाएं एक्सआरएफ, जीसी-एमएस, आईआर-एमएस, आईसीपी-एमएस, कण आकार विश्लेषक, पोषक तत्व विश्लेषक, बायोमोलेक्यूल और क्लम्प्ड आइसोटोप प्रयोगशाला, और टीएल/ओएसएल, क्लम्प्ड आइसोटोप सुविधाएं।' :
                'Geochemistry- The scientists in the geochemistry division have diverse expertise in inorganic, organic and isotopic (stable and radiogenic isotope) tools to study the evolutionary trajectory of the earth, ocean and life, and various geological factors governing the earth surface environment. The Institute hosts many state-of-the-art sophisticated analytical facilities to measure the geochemical and isotopic datasets such as ICP-OES, XRD, XRF, GC-MS, IR-MS, ICP-MS, Particle Size Analyzer, Nutrient Analyzer, Biomolecule and Clumped Isotope Laboratory, and TL/OSL, clumped isotope facilities. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'उन्नत कोयला पेट्रो-जियोकेमिकल प्रयोगशाला- के लिए बीएसआईपी में अच्छी तरह से स्थापित है इसकी उत्पत्ति, संरचना और अकार्बनिक गुणों के लिए कोयले की विशेषताएँ जैविक औद्योगिक उपयोग के लिए घटकों के साथ-साथ पुरापाषाण काल को समझने के लिए वातावरण. हाल के अपडेट में एफटीआईआर सहित उपकरणों को शामिल करना शामिल है स्पेक्ट्रोमीटर, बम कैलोरीमीटर, थर्मोग्रैविमेट्रिक विश्लेषक और एलिमेंटल विश्लेषक। ' :
                'Advanced Coal Petro-Geochemical Laboratory- is well established at BSIP for characterizing coal for its origin, composition and properties of the inorganic and organic components for industrial utilization as well as to understand the palaeodepositonal environments. Recent updates include addition of equipment including FTIR spectrometer, Bomb calorimeter, Thermogravimetric analyser and Elemental analyser. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'रेडियोकार्बन डेटिंग/ऑर्गेनिक जियोकैमिस्ट्री प्रयोगशाला- एलिमेंटल से युक्त है विश्लेषक दोनों से जुड़ा, आइसोटोप अनुपात मास स्पेक्ट्रोमीटर, आयु-3 प्रणाली, सीनियर-एनडी कॉलम रसायन विज्ञान, तलछट, कार्बनिक में ट्रेस धातु पाचन के लिए मल्टीक्यूब (सीटी-48) पाचन इकाई लिपिड निष्कर्षण, पूर्व सांद्रण और विश्लेषण। इस प्रभाग के विशेषज्ञ प्रदान करते हैं पर प्रशिक्षण रेडियोकार्बन डेटिंग और समुद्री/झील से कार्बनिक लिपिड बायोमार्कर का निष्कर्षण तलछट कोर जो स्थलीय वनस्पति परिवर्तनों पर बहुमूल्य अंतर्दृष्टि प्रदान करते हैं जैसे का प्रभुत्व C3 या C4, पुरापाषाण गतिविधि, कार्बनिक पदार्थों का अन्य जीवाणु क्षरण। ' :
                'Radiocarbon Dating/Organic Geochemistry Laboratory- Consists of Elemental Analyzer connected to both, isotope ratio mass spectrometer, Age-3 system, Sr-Nd Column chemistry, Multicube (CT-48) digestion unit for trace metal digestion in sediments, organic lipid extraction, pre concentration and analysis. The experts of this division provide training on radiocarbon dating and extraction of organic lipid biomarkers from the oceanic/lake sediment cores which provide valuable insights on terrestrial vegetation changes such as dominance of C3 or C4, palaeofire activity, other bacterial degradation of organic matter. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'ल्यूमिनसेंस डेटिंग लेबोरेटरी (LumDL)- भूवैज्ञानिक और पुरातात्विक सामग्री जो से संबंधित है पृथ्वी के इतिहास का चतुर्धातुक काल (एंथ्रोपोसीन, होलोसीन और प्लीस्टोसीन) हो सकता है सटीक दिनांकित ल्यूमिनसेंस डेटिंग विधि द्वारा. आज तक व्यापक रूप से उपयोग की जाने वाली सामग्री मोटे अनाज हैं क्वार्ट्ज और के-फेल्डस्पार, और बहुखनिज महीन दाने। हम जैसे बायोजेनिक सामग्री भी स्थापित कर रहे हैं डायटम फ्रस्ट्यूल्स और फेल्डस्पार क्वार्ट्ज अनाज के साथ समावेशन। यह विधि फंसे हुए इलेक्ट्रॉनों का शोषण करती है आयनीकरण परमाणु द्वारा परिणाम इन्सुलेटिंग क्रिस्टल के साथ विकिरण। हम जुनून और जिज्ञासा से प्रेरित का स्वागत करते हैं जो छात्र रुचि रखते हैं अंतर-विषयक दृष्टिकोण में, भौतिकविदों ने आज तक नई विधियों को विकसित करना शामिल किया है सटीक और सटीकता से, और ल्यूमिनसेंस डेटिंग की गतिशील आयु सीमा को बढ़ाएं तरीका।' :
                'Luminescence Dating Laboratory (LumDL)- Geological and archaeological materials that belong to the Quaternary Period (Anthropocene, Holocene and Pleistocene) of Earth history can be dated accurately by luminescence dating method. Widely used materials to date are coarse grains of quartz and K-feldspar, and polymineral fine grains. We are also establishing biogenic materials such as diatom frustules and feldspar inclusions with quartz grains. This method exploit the trapped electrons that results by the ionizing nuclear radiations with the insulating crystals. We welcome passion and curiosity driven students who are interested in inter-disciplinary approach, Physicists included, to develop new methods to date accurately and precisely, and increase the dynamic age range of luminescence dating method.' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'पुराचुंबकत्व- पुराचुंबकत्व पृथ्वी के रिकॉर्ड का अध्ययन है प्राचीन चट्टानों, तलछटों और पुरातात्विक सामग्रियों में संरक्षित चुंबकीय क्षेत्र। यह है पर आधारित सिद्धांत यह है कि इन सामग्रियों के भीतर कुछ चुंबकीय खनिज दिशा रिकॉर्ड करते हैं और उनके गठन के समय पृथ्वी के चुंबकीय क्षेत्र की ताकत। विश्लेषण करके इन संरक्षित रिकॉर्ड, वैज्ञानिक टेक्टोनिक प्लेटों की गतिविधियों का पुनर्निर्माण कर सकते हैं, अध्ययन पृथ्वी के चुंबकीय क्षेत्र के उलट होने की घटनाएँ, और पिछली जलवायु के बारे में जानकारी प्राप्त करें। पर्यावरण चुंबकत्व को समझने के लिए चट्टान चुंबकत्व का एक महत्वपूर्ण अनुप्रयोग है पुराजलवायु और पृथ्वी पर पुरातन पर्यावरण. बीएसआईपी में पुराचुम्बकत्व प्रयोगशाला विकसित हो गई है राष्ट्रीय सुविधा और वर्तमान में उन्नत उपकरणों की एक श्रृंखला की मेजबानी करती है और प्रशिक्षण प्रदान करती है पर, जेआर-6 स्पिनर मैग्नेटोमीटर, D2000T अल्टरनेटिंग फील्ड डिमैग्नेटाइज़र, TD-48 थर्मल नमूना डिमैग्नेटाइज़र, एमएफके2-एफए कप्पाब्रिज, आईएम-10-30 इंपल्स मैग्नेटाइज़र और बार्टिंगटन प्रयोगशाला और क्षेत्र सर्वेक्षण दोनों के लिए संवेदनशीलता सेंसर (MS2C/2D/2E/2F)। उद्देश्य. ' :
                'Palaeomagnetism- Palaeomagnetism is the study of the record of the Earth ancient magnetic field preserved in rocks, sediments and archaeological materials. It is based on the principle that certain magnetic minerals within these materials record the direction and strength of the Earth magnetic field at the time of their formation. By analysing these preserved records, scientists can reconstruct the movements of tectonic plates, study the Earth magnetic field reversal events, and gain insights into past climates. Environmental magnetism is an important application of rock magnetism to understand the paleoclimate and paleoenvironment on Earth. The palaeomagnetism laboratory at BSIP has grown to a national facility and at present hosts a range of advanced instruments and offers training on, JR-6 Spinner Magnetometer, D2000T Alternating Field Demagnetizer, TD-48 Thermal Specimen Demagnetizer, MFK2-FA Kappabridge, IM-10-30 Impulse Magnetizer and the Bartington Susceptibility Sensors (MS2C/2D/2E/2F) for both laboratory and field survey purposes. ' }}
                        </p>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी निम्नलिखित क्षेत्रों में प्रशिक्षण प्रदान करता है ' : 'BSIP offers training in the following fields ' }}">
                            {{ $language === 'hi' ?
                'डेटा एकीकरण- हमारी नई अग्रणी पहलों में से एक है दक्षिण एशियाई जैव विविधता पोर्टल (एसएबीडीपी), दक्षिण एशियाई आधुनिक और पुरापाषाण डेटासेट के अभिलेखीय और एकीकरण पर ध्यान केंद्रित करना। पोर्टल इस शासित क्षेत्र में प्रकाशित डेटा को समेकित, व्यवस्थित और पहुंच प्रदान करता है आईआईटी, आईआईएसईआर आदि जैसे प्रमुख संस्थानों के प्रतिनिधित्व वाली एक परिषद द्वारा। पोर्टल विभिन्न स्रोतों से निर्बाध डेटा एकीकरण की सुविधा प्रदान करेगा और कुशल हितधारक को सुनिश्चित करेगा सहयोग। यह पोर्टल AI-सहायता प्राप्त इनपुट के साथ एक PostgreSQL डेटाबेस होस्ट करेगा बहुआयामी डेटा विज़ुअलाइज़ेशन।' :
                'Data Integration- One of our new path breaking initiatives is the South Asian Biodiversity Portal (SABDP), focusing on the archival and integration of South Asian modern and palaeo datasets. The portal consolidates, organises, and provides access to published data in this region governed by a council with representation from prominent institutions like IITs, IISERs, etc. The portal will facilitate seamless data integration from various sources and ensure efficient stakeholder collaboration. This portal will host a PostgreSQL database with AI-aided input and multidimensional data visualisation. ' }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'पात्रता ' : 'ELIGIBILITY' }}">
                            {{ $language === 'hi' ? 'पात्रता ' : 'ELIGIBILITY' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'पात्रता  विवरण' : 'ELIGIBILITY Details' }}">
                            {{ $language === 'hi' ?
                'प्रशिक्षण कार्यक्रम स्नातक, स्नातकोत्तर की पढ़ाई करने वाले छात्रों के लिए खुला है और वास्तविक अनुसंधान (पीएचडी) विद्वान, अधिमानतः किसी भी सरकार समर्थित अकादमिक से देश भर के संस्थान/विश्वविद्यालय।' :
                'The training program is open for students pursuing their graduation, postgraduation and bonafide research (Ph.D.) scholars preferably from any government-supported academic institutions/universities across the country. ' }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'कार्यक्रम की अवधि और प्रशिक्षुओं की संख्या ' : 'PROGRAM DURATION AND NUMBER OF TRAINEES ' }}">
                            {{ $language === 'hi' ? 'कार्यक्रम की अवधि और प्रशिक्षुओं की संख्या ' : 'PROGRAM DURATION AND NUMBER OF TRAINEES ' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'कार्यक्रम की अवधि और प्रशिक्षुओं की संख्या  विवरण' : 'PROGRAM DURATION AND NUMBER OF TRAINEES  Details' }}">
                            {{ $language === 'hi' ?
                'वर्ष के किसी भी समय दो सप्ताह तक। अधिकतम दो प्रशिक्षु होंगे हर साल बीएसआईपी से एक सलाहकार को सौंपा जाता है। तथापि, बीएसआईपी निदेशक को यह अधिकार है कि वह किसी भी छात्र का चयन नहीं कर सकते, बढ़ा नहीं सकते के आधार पर प्रशिक्षुओं की संख्या कम करें उसके आवेदन की योग्यता के आधार पर। ' :
                'Maximum one month only during any time of the year. A maximum of two trainees will be assigned to a mentor from BSIP every year. However, the Director BSIP has the authority not to select any student or to increase or decrease the number of trainees depending on the merit of his/her application. ' }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'आवेदन की प्रक्रिया ' : 'APPLICATION PROCEDURE ' }}">
                            {{ $language === 'hi' ? 'आवेदन की प्रक्रिया ' : 'APPLICATION PROCEDURE ' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'आवेदन की प्रक्रिया  विवरण' : 'APPLICATION PROCEDURE  Details' }}">
                            {{ $language === 'hi' ?
                'वर्ष के किसी भी समय दो सप्ताह तक। अधिकतम दो प्रशिक्षु होंगे हर साल बीएसआईपी से एक सलाहकार को सौंपा जाता है। तथापि, बीएसआईपी निदेशक को यह अधिकार है कि वह किसी भी छात्र का चयन नहीं कर सकते, बढ़ा नहीं सकते के आधार पर प्रशिक्षुओं की संख्या कम करें उसके आवेदन की योग्यता के आधार पर। ' :
                'Before submitting the application for the training program, the candidate will need to discuss the exact timing and duration of training in consultation with his/her mentor. The submitted application shoud include the following documents: CV with recent passport size photograph, a transcript of academic record, a letter of support from the competent authority of the Institute/University. The application along with the above documents should be emailed to the Director, BSIP (e-mail: director@bsip.res.in). The e-mail should have the subject as candidate’s name followed by the word training (e.g. Rajiv Singh training). The applications will be put up for consideration of a committee designated by the Director. Upon approval by the Director, BSIP, confirmation regarding the training program will be communicated to the selected candidates by the Institute.

Applications can be submitted with the required documents throughout the year; there is no deadline. Documents submitted by the selected candidates will be verified with the originals at the time of his/her reporting for the internship program. ' }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'कार्यक्रम की लागत ' : 'COST OF THE PROGRAM ' }}">
                            {{ $language === 'hi' ? 'कार्यक्रम की लागत ' : 'COST OF THE PROGRAM ' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'कार्यक्रम की लागत  विवरण' : 'COST OF THE PROGRAM  Details' }}">
                            {{ $language === 'hi' ?
                'रुपये का शुल्क. प्रशिक्षण के लिए प्रति शोधार्थी से 2,000/- रुपये शुल्क लिया जाएगा। तथापि, निदेशक, बीएसआईपी पूरी तरह या आंशिक रूप से छूट दे सकते हैं योग्यता या आवश्यकता के आधार पर प्रशिक्षण की लागत। ' :
                'A fee of Rs. 2,000/- will be charged per research scholar for the training. However, Director, BSIP can waive fully or partially the cost of training based on merit or need. ' }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'आवास, चिकित्सा और कैंटीन सुविधाएं ' : 'ACCOMMODATION, MEDICAL AND CANTEEN FACILITIES ' }}">
                            {{ $language === 'hi' ? 'आवास, चिकित्सा और कैंटीन सुविधाएं ' : 'ACCOMMODATION, MEDICAL AND CANTEEN FACILITIES ' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'आवास, चिकित्सा और कैंटीन सुविधाएं  विवरण' : 'ACCOMMODATION, MEDICAL AND CANTEEN FACILITIES  Details' }}">
                            {{ $language === 'hi' ?
                'प्रशिक्षुओं से अपेक्षा की जाती है कि वे रहने और परिवहन की व्यवस्था स्वयं करें उनके प्रशिक्षण अवधि के दौरान. आवास संस्थान के गेस्ट हाउस में, यदि उपलब्ध हो, प्रशिक्षुओं को बहुत अधिक शुल्क उपलब्ध कराया जा सकता है सीमित अवधि। सब्सिडी वाली सेवाएँ कार्य दिवसों पर कार्यालय समय के दौरान प्रशिक्षुओं के लिए कैंटीन उपलब्ध रहेगी। संस्थान के पास कोई चिकित्सा बीमा पॉलिसी नहीं है प्रशिक्षुओं के लिए. प्रशिक्षुओं या उनके प्रायोजक संस्थानों से अपेक्षा की जाती है कि वे अपना स्वयं का निर्माण करें के चिकित्सा उपचार की व्यवस्था प्रशिक्षण अवधि के दौरान प्रायोजित छात्र। बीएसआईपी किसी के लिए जिम्मेदार नहीं है प्रशिक्षण के दौरान लगी या पहुंचाई गई चोट। ' :
                'Interns are expected to make their own arrangement for stay and transportation during their training period. Accommodation in the Institute’s Guest House, if available, may be provided to interns for a very limited period. Services of the subsidized canteen will be available to the trainees during the office hours on working days. Institute has no Medical Insurance Policy for interns. Interns or their sponsoring institutions are expected to make their own arrangement for medical treatment of the sponsored student during their traning period. BSIP is not responsible for any injury caused or inflicted during the training. ' }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'अनुशासन ' : 'DISCIPLINE ' }}">
                            {{ $language === 'hi' ? 'अनुशासन ' : 'DISCIPLINE ' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'अनुशासन  विवरण' : 'DISCIPLINE  Details' }}">
                            {{ $language === 'hi' ?
                'प्रशिक्षुओं को संस्थान के नियमों और विनियमों और निर्धारित नियमों का पालन करना होगा उनके गुरुओं द्वारा. इंटर्न की ओर से किसी भी अनुशासनहीनता पर सख्ती से व्यवहार किया जाएगा और इसके लिए जिम्मेदार ठहराया जा सकता है इंटर्नशिप की समाप्ति. किसी प्रशिक्षु द्वारा संस्थान की संपत्ति को होने वाली कोई भी हानि या क्षति होगी उसके द्वारा मुआवजा दिया गया। ' :
                'Interns must follow the rules and regulations of the Institute and those prescribed by their mentors. Any indiscipline on part of the intern will be treated sternly and may lead to termination of the internship. Any loss or damage caused to the Institute’s property by an Intern will be compensated by him/her.  ' }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'परियोजना रिपोर्ट ' : 'PROJECT REPORT  ' }}">
                            {{ $language === 'hi' ? 'परियोजना रिपोर्ट ' : 'PROJECT REPORT  ' }}
                        </h3>
                        <div class="divider" role="separator" aria-hidden="true"></div>
                        <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'परियोजना रिपोर्ट  विवरण' : 'PROJECT REPORT   Details' }}">
                            {{ $language === 'hi' ?
                'सभी प्रशिक्षुओं से अपेक्षा की जाती है कि वे अपना प्रशिक्षण पूरा होने पर एक रिपोर्ट प्रस्तुत करें को शामिल करना चाहिए शुरू की गई परियोजना का सारांश, प्रशिक्षण से मुख्य परिणाम, सीखी गई कार्यप्रणाली और कोई अतिरिक्त सेमिनारों में भागीदारी और स्थानीय संस्थानों के दौरे सहित गतिविधियाँ, यदि कोई भी। बीएसआईपी बरकरार रहेगा प्रशिक्षण के दौरान उत्पन्न सभी सामग्रियों, विश्लेषणों और डेटा के अधिकार अवधि और कोई डेटा नहीं हो सकता बीएसआईपी की पूर्व अनुमति के बिना प्रकाशित। परियोजना रिपोर्ट प्राप्त होने पर उम्मीदवारों को जारी किया जाएगा उम्मीदवार के गुरु द्वारा निदेशक द्वारा प्रतिहस्ताक्षरित एक प्रमाण पत्र। परिणाम के दौरान प्राप्त किया गया इंटर्नशिप संबंधित सलाहकार और उम्मीदवार द्वारा संयुक्त रूप से प्रकाशित की जा सकती है।  ' :
                'All trainees are expected to submit a report on completion of their training, which should include the summary of the project undertaken, key outcome from the training, methodology learnt and any additional activities including participation in seminars and visits to local institutes, if any. BSIP shall retain the rights for all the materials, analyses and data generated during the training period and no data can be published without prior permission from BSIP. On receipt of the project report, the candidates will be issued a certificate by the Mentor of the candidate, countersigned by the Director. Results obtained during the Internship may be published jointly by the concerned mentor and the candidate. ' }}
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection
