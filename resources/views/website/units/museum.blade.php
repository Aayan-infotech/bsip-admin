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
                        <div class="col-md-4"><img src="https://www.bsip.res.in/images/nav/museum2.jpg"
                                alt="History Image 1" class="img-fluid img-history"></div>
                        <div class="col-md-8">
                            <p class="normal-text">{{ $language === 'hi' ? 'प्रोफेसर साहनी द्वारा भारत और विदेशों से एकत्रित जीवाश्म पौधों का संग्रह, जिसमें उन्हें उपहार या विनिमय के रूप में प्राप्त जीवाश्म पौधे भी शामिल हैं, ने संस्थान के संग्रहालय की शुरुआत की। संग्रहालय का भण्डार संस्थान के वैज्ञानिकों द्वारा पूरे देश में अपने फील्डवर्क के दौरान किए गए संग्रह और विदेशों से प्राप्त सामग्री के आदान-प्रदान से लगातार समृद्ध होता रहा है। संग्रहालय द्वारा होलोटाइप नमूने, स्लाइड और चित्रित नमूनों को व्यवस्थित रूप से संग्रहीत किया जाता है जो अनुसंधानकर्ताओं के लिए जांच के लिए आसानी से उपलब्ध हैं।':'The collection of fossil plants made by Professor Sahni from India and
                                abroad,
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
                                workers.' }}</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="normal-text">{{ $language === 'hi' ? 'जीवाश्म नमूनों को वनस्पति विज्ञान और भूविज्ञान के विश्वविद्यालय और कॉलेज विभागों को शिक्षण और प्रदर्शन उद्देश्यों के लिए स्वतंत्र रूप से उपहार में दिया जाता है। प्रकार और चित्रित नमूनों की वर्तमान स्थिति निम्नानुसार है।' : 'The fossil specimens are also freely gifted to the university and college departments of botany and geology, for teaching and demonstration purposes. The present position of Type and figured specimens is as under.' }}</p>
                            <p class="normal-text">{{ $language ==='hi' ? 'प्रकार और चित्रित नमूने 6679' : 'Type and figured specimens 6679' }}<br>
                                {{ $language === 'hi' ?'प्रकार और लगाई गई स्लाइड्स 12740 निगेटिव 17504':'Type and figured Slides 12740 Negatives 17504' }} <br>
                                {{ $language === 'hi' ? 'संग्रहालय को विशाल हॉल में रखा गया है जिसमें एक सामान्यीकृत और भूवैज्ञानिक दृष्टिकोण से, पैलियोबोटनी के विभिन्न पहलुओं को चित्रित करने के लिए प्रदर्शनों की व्यवस्था और प्रदर्शन किया जाता है। संग्रहालय में, प्रोफेसर बीरबल साहनी द्वारा खुद को संस्थान का फाउंडेशन स्टोन, अपने आप में अनूठा है। इसमें विभिन्न भूवैज्ञानिक युगों के जीवाश्म शामिल हैं और कई देशों से एकत्र किए गए हैं, जो संगमरमर के ग्रिट-सीमेंट ब्लॉक में एम्बेडेड हैं। जियोलॉजिकल टाइम क्लॉक ’एक और संग्रहालय का एक विशेष आकर्षण है, जिसमें भूवैज्ञानिक समय को 24 घंटों के भीतर अनुबंधित किया जाता है। घड़ी पृथ्वी पर जीवन के विकास का संचार करती है क्योंकि दिन मध्य रात्रि से आगे बढ़ता है, और 24 घंटे की निर्धारित समय-सीमा के भीतर मनुष्य के आगमन तक विकास की क्रमिक घटनाओं को दर्शाता है।' : 'The museum is housed in spacious halls in which the exhibits are arranged and displayed in order to illustrate various aspects of palaeobotany, from a generalized and geological point of view. In the museum, the Foundation Stone of the Institute, casted by Professor Birbal Sahni himself, is unique in its own right. It comprises fossils of different geological ages and collected from several countries, embedded in a marble grit-cement block. A ‘Geological Time Clock’ is another and one of the special attractions of the museum, in which the geological time is contracted within 24 hours. The clock communicates the evolution of life on earth as the day progresses from mid-night, and depicts the gradual events of evolution up to the advent of man, within the stipulated time-scale of 24 hours.'}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
