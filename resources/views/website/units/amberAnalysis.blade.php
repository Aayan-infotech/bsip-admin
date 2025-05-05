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
                    <h3 id="history">
                        {{ $language === 'hi' ? 'अम्बर विश्लेषण और प्राचीन कीट विज्ञान प्रयोगशाला' : 'Amber Analysis and Palaeoentomology Laboratory' }}
                    </h3>
                    <div class="divider"></div>
                    <div class="row">

                        <div class="col-md-12">
                            {!! $language === 'hi'
                                ? '<p class="normal-text">वर्तमान में, भारत में क्रेटेशियस (रुद्र एट अल., 2014), पैलियोसीन/इओसीन (रस्ट एट अल. 2010) और मियोसीन में वारकाली (दत्ता एट अल., 2014) और उत्तर-पूर्व (तिवारी एट अल., 2015) में एम्बर नोड्यूल पाए गए हैं और अन्य भूवैज्ञानिक स्तरों और स्थानों में उनके पाए जाने की काफी संभावना है। आम तौर पर, एम्बर विश्लेषण वनस्पति उत्पादक की पहचान करता है, बहुलक की संरचना की जानकारी देता है जो बदले में इसे ज्ञात श्रेणियों में वर्गीकृत करने की अनुमति देता है। यह जानना दिलचस्प है कि गुजरात बेसिन से भारतीय इओसीन एम्बर को डैमर रेजिन II के रूप में वर्गीकृत किया गया है, जिसे आमतौर पर दक्षिण पूर्व एशिया में जाना जाता है।</p> <p class="normal-text"> 2005 में पहली बार वर्णित (अलीमोहम्मदियन एट अल. 2005), कैम्बे और कच्छ बेसिन की गुजरात लिग्नाइट खदानों से खोजे गए एम्बर नोड्यूल भारतीय भूविज्ञान के लिए उपलब्ध कराई जाने वाली जानकारी के मामले में अद्वितीय हैं। वे ऐसे समय में पाए जाते हैं जब भारत उत्तर की ओर एशिया की ओर बढ़ रहा था और जब वैश्विक तापमान थर्मल घटनाओं की एक श्रृंखला से प्रभावित था, जिससे वैश्विक औसत वार्षिक तापमान 150 डिग्री सेल्सियस के मौजूदा मूल्यों से 50 से 80 डिग्री सेल्सियस तक बढ़ गया था। वे एक अद्वितीय बायोटा रिकॉर्ड करते हैं जो उस समय ग्रीनहाउस पृथ्वी में विविधता ला रहा था, इन रूपों में विभिन्न प्रकार के पौधे, कीड़े, आर्थ्रोपोड और ऑस्ट्राकोड शामिल हैं जो तीन आयामी उत्कृष्टता में संरक्षित हैं। आईआईटी मुंबई द्वारा किए गए जैव रासायनिक विश्लेषण से पता चलता है कि ये एम्बर पॉलीमराइज़्ड ट्री रेजिन हैं जो डिप्टेरोकार्पेसी (साल के पेड़) से निकलते हैं (दत्ता एट अल., 2009, 2011, 2014, दत्ता और मलिक, 2017)। भारतीय एम्बर जमा ने वैश्विक ध्यान आकर्षित किया है क्योंकि वे भूमध्यरेखीय जलवायु क्षेत्र में निचले इओसीन के दौरान पाए जाने वाले कुछ में से एक हैं। इसके अलावा, उच्च-रिज़ॉल्यूशन तकनीक विकसित की गई है, जिसके द्वारा जीवाश्म समावेशन को निकालना और परिष्कृत उपकरणों द्वारा उनका अध्ययन करना संभव है, जैसे स्कैनिंग इलेक्ट्रॉन माइक्रोस्कोपी (रस्ट एट अल., 2010), कॉन्फोकल लेजर स्कैनिंग माइक्रोस्कोपी (कै एट अल., 2018, फू एट अल., 2021), सिंक्रोटन एक्स-रे इमेजिंग (स्टेबनर एट अल., 2016) और मास स्पेक्ट्रोस्कोपी विधियों द्वारा जैव रसायन (बेइमफोर्ड एट अल. 2011)। </p>'
                                : ' <p class="normal-text">At present, amber nodules have been found in India in the Cretaceous
                                                                                        (Rudra et
                                                                                        al., 2014), Palaeocene/Eocene (Rust et al. 2010) and in the Miocene at Warkalli (Dutta et
                                                                                        al., 2014)
                                                                                        and in the North-East (Tiwari et al., 2015) and there is considerable potential of their
                                                                                        being found
                                                                                        in other geological levels and localities. Typically, amber analysis identifies the
                                                                                        botanical
                                                                                        producer, gives information of the structure of the polymer which in turn allows it to be
                                                                                        classified
                                                                                        in known categories. It is of interest to know that Indian Eocene amber from the Gujarat
                                                                                        Basins is
                                                                                        classified as Dammar Resin II, commonly known in Southeast Asia</p>
                                                                                    <p class="normal-text">
                                                                                        Described for the first time in 2005 (Alimohammadian et al. 2005), amber nodules discovered
                                                                                        from the
                                                                                        Gujarat Lignites Mines of the Cambay and Kutch Basins, are unique in terms of the
                                                                                        information they
                                                                                        provide for Indian geosciences. They occur at a time when India was drifting northwards
                                                                                        towards Asia
                                                                                        and when global temperatures were influenced by a series of thermal events, raising global
                                                                                        mean annual
                                                                                        temperatures by 50 to 80 C from current values of 150C. They record a unique biota that was
                                                                                        diversifying in the greenhouse earth at the time, these forms include a variety of plants,
                                                                                        insects,
                                                                                        arthropods and ostracodes preserved in three dimensional excellence. Biochemical analysis
                                                                                        carried out
                                                                                        by IIT Mumbai suggests that these ambers are polymerized tree resins that exuded from
                                                                                        Dipterocarpaceae
                                                                                        (Sal trees) (Dutta et al., 2009, 2011, 2014, Dutta and Mallick, 2017). The Indian amber
                                                                                        deposits have
                                                                                        commanded global attention since they are one of the few that occur during the Lower Eocene
                                                                                        in an
                                                                                        equatorial climatic zone. In addition, high-resolution techniques have been developed
                                                                                        whereby it is
                                                                                        possible to extract the fossil inclusions and study them by sophisticated instrumentations,
                                                                                        such as
                                                                                        scanning electron microscopy (Rust et al., 2010), confocal laser scanning microscopy (Cai et
                                                                                        al.,
                                                                                        2018, Fu et al., 2021), synchroton x-ray imaging (Stebner et al., 2016) and biochemistry by
                                                                                        mass
                                                                                        spectroscopy methods (Beimforde et al. 2011).
                                                                                    </p>' !!}

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/amber/amber-1.jpeg') }}" alt="amber 1"
                                class="img-fluid img-history"></div>
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/amber/amber-2.jpeg') }}" alt="amber 2"
                                class="img-fluid img-history"></div>
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/amber/amber-3.jpeg') }}" alt="amber 3"
                                class="img-fluid img-history"></div>
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/amber/amber-4.jpeg') }}" alt="amber "
                                class="img-fluid img-history"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! $language === 'hi'
                                ? '<p class="normal-text">
                            जीवाश्म आर्थ्रोपोड और अन्य समावेशन स्थलीय
                            बायोटा में एक और महत्वपूर्ण आयाम जोड़ते हैं। एम्बर
                            समावेशन में जीवों की एक विस्तृत श्रृंखला शामिल है: कवक, टेस्टेट अमीबा, डायटम, शैवाल,
                            ब्रायोफाइट्स
                            जिसमें माइक्रोबायोटा, तने, पत्ते, फूल, पराग (वनस्पति), कीड़े, मकड़ियाँ और उनके
                            अंडे और
                            जाल, ऑस्ट्राकोड और एक दुर्लभ पक्षी पंख शामिल हैं। इस प्रकार एम्बर अध्ययन निचले इओसीन में पहले विकसित उष्णकटिबंधीय सदाबहार जंगलों में से एक में अतीत की जैव विविधता की एक झलक प्रदान करते हैं और ग्रीनहाउस पृथ्वी और खुले महासागरों, लैगून और डेल्टा जमा के साथ इंटरफेस करने वाले पैलियोएनवायरनमेंट में लंबे समय से खोए हुए पारिस्थितिकी तंत्र को फिर से बनाने में मदद करते हैं। कई भारतीय रूप पारिवारिक स्तर पर सबसे पुराने रिकॉर्ड का प्रतिनिधित्व करते हैं और फैलाव गलियारों और प्रवास का पता लगाने और पैलियोबायोग्राफी के पुनर्निर्माण में मदद करते हैं। </p>
                            <p class="normal-text">
                            पिछले 15 वर्षों में, भारतीय एम्बर के विभिन्न पहलुओं पर 100 से अधिक उच्च गुणवत्ता वाले शोधपत्र प्रकाशित हुए हैं, जिनमें से कई प्रतिष्ठित पत्रिकाओं जैसे कि पीएनएएस (रस्ट एट अल., 2010), साइंटिफिक रिपोर्ट्स (स्टेबनर एट अल., 2016), अमेरिकन जर्नल ऑफ बॉटनी (सिंह एट अल., 2021), इंटरनेशनल जर्नल ऑफ कोल जियोलॉजी (सिंह एट अल., 2021) और कई अन्य (ग्रिमाल्डी और सिंह, 2012, स्टेबनर एट अल., 2017, एंगेल एट अल., 2011, ओर्टेगा ब्लैंको एट अल., 2013, सिंह 2020) में प्रकाशित हुए हैं।
                            </p>
                            <p class="normal-text">
                            विज्ञान के इस क्षेत्र को और बढ़ावा देने के लिए, 14 नवंबर, 2023 को पंजाब विश्वविद्यालय, चंडीगढ़ के एमेरिटस वैज्ञानिक प्रोफेसर अशोक साहनी द्वारा एम्बर विश्लेषण और पैलियोएंटोमोलॉजी प्रयोगशाला का उद्घाटन किया गया। प्रोफेसर साहनी भारतीय जीवाश्म विज्ञान के क्षेत्र में अग्रणी हैं, जिन्होंने नर्मदा नदी के किनारे पहला भारतीय डायनासोर जीवाश्म राजासौरस खोजा था। यह उनकी दृष्टि थी जिसने भारत में इस तरह के नए शोध की स्थापना का मार्ग प्रशस्त किया और गुजरात के भारतीय लिग्नाइट में छिपे जीवाश्म खजाने के बारे में बहुत कुछ बताता है। संस्थान के निदेशक प्रोफेसर महेश जी ठक्कर ने भी नई एम्बर प्रयोगशाला की स्थापना और वैज्ञानिक अनुसंधान और नवाचार के नए क्षेत्रों को प्रोत्साहित करने में अपना पूरा समर्थन दिया है। उद्घाटन गुरुवार को प्रोफेसर महेश ठक्कर, प्रोफेसर अशोक साहनी, डॉ. हुकम सिंह, संस्थान के अन्य वैज्ञानिकों और कर्मचारियों की उपस्थिति में किया गया। </p>
                            <p class="normal-text">
                            <b>अंबर ग्रुप, बीएसआईपी, लखनऊ</b> <br>
                            <b>डॉ. हुकम सिंह, वैज्ञानिक- ई</b> <br>
                            <b>डॉ. प्रिया अग्निहोत्री, पूर्व-बीएसआरएस (2019-2022)</b>
                            </p>'
                                : ' <p class="normal-text">
                                                            Fossil arthropods and other inclusions add another significant dimension to terrestrial
                                                            biotas. Amber
                                                            inclusions include a wide range of organisms: fungi, testate amoeba, diatoms, algae,
                                                            bryophytes
                                                            comprising microbiota, stems, leaves, flowers, pollen (flora), insects, spiders and their
                                                            eggs and
                                                            webs, ostracodes, and a rare bird feather. Amber studies thus afford a glimpse of the past
                                                            biodiversity in one of the first evolving tropical evergreen forests in the Lower Eocene and
                                                            help to
                                                            recreate long lost ecosystems in a greenhouse earth and paleoenvironments that interface
                                                            with open
                                                            oceans, lagoons and delta deposits. Several of the Indian forms represent the earliest
                                                            record at the
                                                            familial level and serve to trace dispersal corridors and migrations and help in the
                                                            reconstruction of
                                                            palaeobiogeography.
                                                        </p>
                                                        <p class="normal-text">
                                                            In the last 15 years or so, over 100 very high quality papers have been published on various
                                                            aspects
                                                            of Indian amber, many in prestigious journals such as PNAS (Rust et al., 2010), Scientific
                                                            Reports
                                                            (Stebner et al., 2016), American Journal of Botany (Singh et al., 2021), International
                                                            Journal of Coal
                                                            Geology (Singh et al., 2021) and several others (Grimaldi and Singh, 2012, Stebner et al.,
                                                            2017, Engel
                                                            et al., 2011, Ortega Blanco et al., 2013, Singh 2020).
                                                        </p>
                                                        <p class="normal-text">
                                                            To further encourage this field of Science, an amber analysis and palaeoentomology
                                                            laboratory was
                                                            inaugurated on 14th November, 2023 by Professor Ashok Sahni, Scientist Emeritus, Panjab
                                                            University,
                                                            Chandigarh. Prof. Sahni is a pioneer in the field of Indian Palaeontology who discovered the
                                                            first
                                                            Indian dinosaur fossil Rajasaurus along the Narmada River. It was his vision that paved way
                                                            for such
                                                            kind of new research to be established in India and speaks a lot about the hidden fossil
                                                            treasures in
                                                            the Indian Lignites of Gujarat. Institute’s director, Professor Mahesh G. Thakkar, has also
                                                            extended
                                                            his full support in the establishment of the new amber laboratory and encouraging new fields
                                                            of
                                                            scientific research and innovation. The inauguration was done in the presence of Professor
                                                            Mahesh
                                                            Thakkar, Prof. Ashok Sahni, Dr, Hukam Singh, other scientists and staff of the institute on
                                                            Thursday.
                                                        </p>
                                                        <p class="normal-text">
                                                            <b>Amber Group, BSIP, Lucknow</b> <br>
                                                            <b>Dr. Hukam Singh, Scientist- E</b> <br>
                                                            <b>Dr. Priya Agnihotri, Ex-BSRS (2019-2022)</b>
                                                        </p>' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
