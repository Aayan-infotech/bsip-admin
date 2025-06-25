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
                    <h3 id="history">{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col-md-4"><img src="{{ asset('assets-new/assets/geo-heritage/compsec.jpg') }}"
                                alt="Computer Section" title="Computer Section Image" class="img-fluid img-history"></div>
                        <div class="col-md-8">
                            <p class="normal-text">
                                {{ $language === 'hi'
                                    ? 'वैज्ञानिक अनुसंधानों के लिए सूचना प्रौद्योगिकी में प्रगति को देखते हुए, संस्थान ने डेढ़ दशक पहले इलेक्ट्रॉनिक डाटा प्रोसेसिंग (ईडीपी) इकाई को लाभप्रद रूप से स्थापित किया। यह अत्याधुनिक कंप्यूटिंग सुविधाओं से लैस है, जिसे लगातार अपग्रेड किया जाता है। यह वैज्ञानिकों, तकनीकी और प्रशासनिक कर्मचारियों को उनके काम में सेवाएं प्रदान करता है। प्रारंभ में इकाई के पास संस्थान में 64KBPS पट्टे वाली लाइन इंटरनेट कनेक्शन था, जिसे "bsip.res.in" डोमेन नाम के साथ कमीशन किया गया था। स्थानीय क्षेत्र नेटवर्क (LAN) संस्थान में 150 नोड्स के साथ इंटरनेट का उपयोग प्रदान करता है। वर्तमान में प्रॉक्सी, मेल, डीएनएस और बैकअप सर्वर को नए हार्डवेयर के साथ सफलतापूर्वक अपग्रेड किया गया है।'
                                    : 'In view of the advancements in the information technology in aid to
                                                                scientific
                                                                researches, the Institute advantageously established an Electronic Data Processing (EDP)
                                                                unit over one
                                                                and half decade ago. It is equipped with the state-of-art computing facilities, which is
                                                                constantly
                                                                upgraded. It renders services to the scientists, technical and administrative staff in their
                                                                working.
                                                                Initially the unit had 64KBPS leased line internet connection in the Institute, commissioned
                                                                with the
                                                                domain name "bsip.res.in". Local area Network (LAN) provides Internet access in the
                                                                Institute with 150
                                                                nodes. Presently Proxy, Mail, DNS and Backup Servers have been successfully upgraded with
                                                                new
                                                                hardware.' }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="normal-text">
                                {{ $language === 'hi'
                                    ? 'भारत में सॉफ्टवेयर टेक्नोलॉजी पार्क, लखनऊ और एनकेएन (नेशनल नॉलेज नेटवर्क) से रेडियो लिंक सुविधा के साथ इंटरनेट कनेक्शन, जो कि एनआईसी द्वारा ओएफसी के माध्यम से प्रदान किया जाता है, संस्थान में 8 एमबीपीएस तक चल रहा है। प्रॉक्सी, मेल और डीएनएस सर्वर सफलतापूर्वक रेडहैट लिनक्स ईएस 3.0 ऑपरेटिंग सिस्टम और सन सोलारिस पर कॉन्फ़िगर किए गए हैं। यह संस्थान के कर्मचारियों को 24 घंटे इंटरनेट की सुविधा प्रदान करता है। वर्तमान में 150 कंप्यूटर LAN से जुड़े हुए हैं। वैज्ञानिकों, इकाइयों / अनुभागों के लिए ई-मेल खात े संस्थान डोमेन नाम (BSIP.RES.IN) पर मेल सर्वर के माध्यम से खोले गए हैं।'
                                    : 'Internet Connection with Radio link facility from Software Technology
                                                                Park of
                                                                India, Lucknow and NKN (National Knowledge Network) link provided by NIC through OFC are
                                                                running up to
                                                                8 Mbps in the Institute. Proxy, Mail and DNS Servers are successfully configured on Redhat
                                                                Linux ES
                                                                3.0 Operating System and Sun Solaris. This provides 24 hours Internet facility to the
                                                                Institute Staff.
                                                                At present 150 Computers are connected with the LAN. E-Mail accounts for Scientists,
                                                                Units/Sections
                                                                have been opened through Mail Server on Institute Domain Name (BSIP.RES.IN).' }}
                            </p>
                            <p class="normal-text">
                                {{ $language === 'hi'
                                    ? 'एक एंटी वायरस प्रोग्राम सिमेंटिक एंड पॉइंट वेर 11.0 को सिस्टम और वायरस से बचाने के लिए 150 उपयोगकर्ता लाइसेंस के साथ नवीनीकृत किया गया है।
                                पेरोल, फॉर्म 16 और पेंशन पैकेज भी आवश्यकताओं के अनुसार संशोधित किए जाते हैं और वार्षिक लेखा, बजट और संशोधित अनुमान भी तैयार किए जाते हैं। अनुभाग वैज्ञानिकों को उनके वैज्ञानिक प्रकाशनों और प्रलेखन के लिए मल्टीमीडिया प्रस्तुतियों, चार्ट, ग्राफ़, लिथोलोग और अन्य आरेख तैयार करने में मदद प्रदान कर रहा है।'
                                    : 'An Anti Virus Program Symentic End Point Ver 11.0 has been renewed with
                                                                150 user
                                                                license to protect the system from viruses and worms.
                                                                Payroll, Form16 and Pension packages are also modified as per the requirements and also the
                                                                Annual
                                                                Accounts, Budget and Revised Estimates are prepared. Section is providing help to the
                                                                scientists in
                                                                preparing the Multimedia presentations, Charts, Graphs, Lithologs and other diagrams for
                                                                their
                                                                scientific publications and documentation' }}
                            </p>
                            <p class="normal-text">Institute’s web site (https://www.bsip.res.in) is running on the
                                Institute’s
                                Server. Computer Section is maintaining the day to day updation.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="history">Staff Members</h3>
                            <div class="divider"></div>
                            <ul class="custom-list">
                                <li>{{ $language === 'hi' ? "श्री। पी.एस. कटियार, तकनीकी अधिकारी 'डी'":"Sri. P.S Katiyar, Technical Officer 'D'" }}</li>
                                <li>{{ $language === 'hi' ? "श्री। वाई.पी. सिंह, तकनीकी अधिकारी 'डी'":"Sri Y.P. Singh, Technical Officer 'D'" }}</li>
                                <li>{{ $language === 'hi' ? "डॉ. निलय गोविंद, तकनीकी अधिकारी 'ए'":"Dr. Nilay Govind, Technical Officer 'A'" }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
