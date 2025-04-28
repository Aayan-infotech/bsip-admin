@extends('website.layouts.app')

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
                    {{ $language === 'hi' ? 'बीरबल साहनी बीएसआईपी में द्विवार्षिक स्नातकोत्तर शोध प्रबंध कार्यक्रम' : 'Birbal Sahni Biannual Masters Dissertation Programs at BSIP' }}
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
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी में द्विवार्षिक मास्टर्स डिसर्टेशन प्रोग्राम' : 'BIRBAL SAHNI BIANNUAL MASTERS DISSERTATION PROGRAMS AT BSIP' }}">
                {{ $language === 'hi' ? 'बीएसआईपी में द्विवार्षिक मास्टर्स डिसर्टेशन प्रोग्राम' : 'BIRBAL SAHNI BIANNUAL MASTERS DISSERTATION PROGRAMS AT BSIP' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'बीएसआईपी का विवरण' : 'BSIP Details' }}">
                {{ $language === 'hi' ? 
                'बीरबल साहनी इंस्टीट्यूट ऑफ पैलियोसाइंसेज (बीएसआईपी) को देश में मानव संसाधन विकास और क्षमता निर्माण के लिए अधिदेश प्राप्त है। इस लक्ष्य की प्राप्ति के लिए, बीएसआईपी देश भर के स्नातकोत्तर छात्रों को, विशेष रूप से उनके दूसरे वर्ष/अंतिम सेमेस्टर में, वर्ष में दो बार मास्टर्स शोध प्रबंध कार्यक्रम प्रदान करता है। वर्तमान में, लगभग एक सौ वैज्ञानिक और अनुसंधान विद्वान पादप और पृथ्वी विज्ञान के क्षेत्र में शुद्ध और व्यावहारिक दोनों पहलुओं पर अनुसंधान गतिविधियों में लगे हुए हैं। बीएसआईपी में अनुसंधान में विकासवादी पहलू, आकृति विज्ञान और वर्गीकरण, उच्च रिज़ॉल्यूशन बायोस्ट्रेटिग्राफी, पुराजीवभूगोल, पुराजलवायु, पुरापारिस्थितिक विज्ञान और पुरापर्यावरण शामिल हैं; ध्रुवीय अनुसंधान; ग्लेशियोलॉजी; औद्योगिक सूक्ष्म जीवाश्म विज्ञान; एम्बर विश्लेषण और पुरापाषाण विज्ञान; कशेरुक एवं अकशेरुकी जीवाश्म विज्ञान; पुरातत्व वनस्पति विज्ञान और प्राचीन डीएनए अध्ययन; डेंड्रोक्रोनोलॉजी; तलछट विज्ञान; समुद्रशास्त्र; रेडियोकार्बन जियोक्रोनोलॉजी, टीएल/ओएसएल डेटिंग; मौलिक, अकार्बनिक और स्थिर आइसोटोप भू-रसायन; अंतःविषय जैविक और अजैविक दृष्टिकोणों का उपयोग करके भूवैज्ञानिक समय के माध्यम से पृथ्वी, महासागर और जीवन रूपों के विकास का अध्ययन करने के लिए जैविक भू-रसायन और कोयला पेट्रोलॉजी और पुराचुंबकत्व। ' : 
                'Birbal Sahni Institute of Palaeosciences (BSIP) has a mandate towards human resource development and capacity building in the country. Towards this goal, BSIP offers Masters Dissertation Programs twice a year to postgraduate students from around the country, typically in their second year/last semester. At present, about one hundred scientists and research scholars are engaged in research activities in the field of plant and earth sciences, both on pure and applied aspects. Research at BSIP involves evolutionary aspects, morphology and taxonomy, high resolution biostratigraphy, palaeobiogeography, palaeoclimate, palaeoecology & palaeoenvironment; polar research; glaciology; industrial micropalaeontology; amber analysis and palaeoentomology; vertebrate & invertebrate palaeontology; archaeobotany and ancient DNA studies; dendrochronology; sedimentology; oceanography; radiocarbon geochronology, TL/OSL dating; elemental, inorganic & stable isotope geochemistry; organic geochemistry & coal petrology and palaeomagnetism to study the evolution of the earth, ocean, and life forms through geological time using interdisciplinary biotic and abiotic approaches. ' }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'पात्रता' : 'Eligibility' }}">
                {{ $language === 'hi' ? 'पात्रता' : 'Eligibility' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'पात्रता विवरण' : 'Eligibility Details' }}">
                {{ $language === 'hi' ? 
                'निबंध कार्यक्रम एम.एससी./एम.टेक करने वाले स्नातकोत्तर छात्रों के लिए खुला है। पृथ्वी में या जीवन विज्ञान या अनुसंधान कार्यक्रमों से संबंधित किसी अन्य संबंधित अनुशासन में बीएसआईपी का, अधिमानतः सरकार समर्थित शैक्षणिक संस्थानों/विश्वविद्यालयों से देश। ' : 
                'The Dissertation Program is open to the postgraduate students pursuing M.Sc./M.Tech. in earth or life sciences or in any other related discipline relevant to the research programs of BSIP, preferably from government-supported academic institutions/universities across the country. ' }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'कार्यक्रम की अवधि' : 'Program Duration' }}">
                {{ $language === 'hi' ? 'कार्यक्रम की अवधि' : 'Program Duration' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'कार्यक्रम की अवधि विवरण' : 'Program Duration Details' }}">
                {{ $language === 'hi' ? 
                'आवेदन प्रत्येक वर्ष दो बार-नवंबर (जनवरी-जून सत्र के लिए) बुलाए जाएंगे मई (जुलाई-दिसंबर सत्र के लिए)। इन सत्रों की अवधि भिन्न-भिन्न होती है 2-6 महीने और इसे चुना जा सकता है आवश्यकता है। इस कार्यक्रम के संबंध में प्राप्त आवेदनों पर अमल किया जाएगा निदेशक द्वारा नामित समिति द्वारा लघु-सूचीबद्ध किया जाएगा। उम्मीदवार होंगे पर चयनित समिति की सिफ़ारिशें और निदेशक द्वारा अनुमोदन। चयनित विद्यार्थी होगा बीएसआईपी द्वारा शोध प्रबंध शुरू होने की वास्तविक तारीख के बारे में सूचित किया गया कार्यक्रम और वह मार्गदर्शक जिसे छात्र को सौंपा गया है। उपलब्ध कराने की जिम्मेदारी मेंटर की होगी आव श्यक प्रशिक्षण सामग्री और अवधि के दौरान प्रशिक्षु का मार्गदर्शन करने के लिए। निदेशक बीएसआईपी है किसी भी छात्र का चयन न करने या सीटों की संख्या बढ़ाने या घटाने का अधिकार नहीं एक वर्ष में आवेदन की योग्यता के आधार पर. ' : 
                'Applications will be called twice each year-November (For January-June session) and May (for July - December session). The duration within these sessions ranges from 2-6 months and can be opted as needed. Applications received in regard to this program will be short-listed by a committee designated by the Director. Candidates will be selected upon the recommendations of the committee and approval by the Director. The selected students will be informed by the BSIP about the actual date of commencement of the Dissertation Program and the Mentor to whom the student is assigned. Only one candidate will be allotted under each scientist. In cases where specialists of desired domain are lacking, maximum of two candidates will be allotted or they will be allotted under experts of closest similar domain. The Mentor will be responsible for providing the required training materials and for guiding the student during the period. The Director BSIP has the authority not to select any student or to increase or decrease the number of seats in a year depending on the merit of the application.' }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'आवेदन प्रक्रिया' : 'Application Procedure' }}">
                {{ $language === 'hi' ? 'आवेदन प्रक्रिया' : 'Application Procedure' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'आवेदन प्रक्रिया विवरण' : 'Application Procedure Details' }}">
                {{ $language === 'hi' ? 
                'लिंक हर नवंबर (जनवरी-जून सत्र के लिए) और मई (के लिए) सक्रिय किया जाएगा जुलाई - दिसंबर सत्र) एक निर्धारित समय सीमा के साथ और समय सीमा के बाद निष्क्रिय कर दिया गया। इच्छुक उम्मीदवारों को वेबसाइट पर इस पर ध्यान देने और प्रोत्साहित करने की आवश्यकता है लगा देना सूचित समय सीमा से पहले.' : 
                'The link will be activated every November (For January - June session) and May (for July - December session) with a prescribed deadline and deactivated after the deadline. Interested candidates are required to pay attention to the same in the website and encouraged to apply before the intimated deadline.' }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'शुल्क संरचना' : 'Fee Structure' }}">
                {{ $language === 'hi' ? 'शुल्क संरचना' : 'Fee Structure' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'शुल्क विवरण' : 'Fee Details' }}">
                {{ $language === 'hi' ? 
                'रुपये का शुल्क. 1-3 महीने के लिए 2,000/- रुपये का शुल्क लिया जाएगा। 4,000/- 4-6 महीने के लिए प्रति उम्मीदवार. ' : 
                'The fee for the dissertation is Rs. 4000/- and should be paid after the candidate initiates his/her work at BSIP.' }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'आवास, चिकित्सा और कैंटीन सुविधाएं' : 'Accommodation, Medical and Canteen Facilities' }}">
                {{ $language === 'hi' ? 'आवास, चिकित्सा और कैंटीन सुविधाएं' : 'Accommodation, Medical and Canteen Facilities' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'सुविधा विवरण' : 'Facility Details' }}">
                {{ $language === 'hi' ? 
                'प्रशिक्षुओं से अपेक्षा की जाती है कि वे रहने और परिवहन की व्यवस्था स्वयं करें उनके दौरान प्रशिक्षण अवधि। यदि उपलब्ध हो तो संस्थान के अतिथि गृह में आवास उपलब्ध हो सकता है प्रदान किया प्रशिक्षुओं को बहुत सीमित अवधि के लिए। कैंटीन की सेवाएं रियायती होंगी पर उपलब्ध कार्य दिवसों पर कार्यालय समय के दौरान उम्मीदवार को भुगतान का आधार। संस्था कोई मेडिकल नहीं है शोध प्रबंध छात्रों के लिए बीमा पॉलिसी. उम्मीदवार या उनके प्रायोजक संस्थाएं हैं प्रायोजित के चिकित्सा उपचार के लिए स्वयं की व्यवस्था करने की अपेक्षा की गई दौरान छात्र उनकी प्रशिक्षण अवधि. बीएसआईपी किसी भी चोट या चोट के लिए जिम्मेदार नहीं है प्रशिक्षण के दौरान. ' : 
                'Interns are expected to make their own arrangement for stay and transportation during their training period. Accommodation in the Institutes Guest House, if available, may be provided to interns for a very limited period. Services of the subsidized canteen will be available on payment bases to the candidate during the office hours on working days. Institute has no Medical Insurance Policy for dissertation students. Candidates or their sponsoring institutions are expected to make their own arrangement for medical treatment of the sponsored student during their training period. BSIP is not responsible for any injury caused or inflicted during the training. ' }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'अनुशासन' : 'Discipline' }}">
                {{ $language === 'hi' ? 'अनुशासन' : 'Discipline' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'अनुशासन विवरण' : 'Discipline Details' }}">
                {{ $language === 'hi' ? 
                'प्रशिक्षुओं को संस्थान के नियमों और विनियमों और निर्धारित नियमों का पालन करना होगा द्वारा उनके गुरु. प्रशिक्षु की ओर से किसी भी अनुशासनहीनता पर सख्ती से व्यवहार किया जाएगा और कार्रवाई की जा सकती है को इंटर्नशिप की समाप्ति. संस्थान की संपत्ति को हुई कोई हानि या क्षति द्वारा एक प्रशिक्षु को उसके द्वारा मुआवजा दिया जाएगा। ' : 
                'Interns must follow the rules and regulations of the Institute and those prescribed by their mentors. Any indiscipline on part of the intern will be treated sternly and may lead to termination of the internship. Any loss or damage caused to the Institutes property by an Intern will be compensated by him/her. ' }}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 tabindex="0" aria-label="{{ $language === 'hi' ? 'प्रोजेक्ट रिपोर्ट' : 'Project Report' }}">
                {{ $language === 'hi' ? 'प्रोजेक्ट रिपोर्ट' : 'Project Report' }}
            </h3>
            <div class="divider" role="separator" aria-hidden="true"></div>
            <p class="normal-text" tabindex="0" aria-label="{{ $language === 'hi' ? 'प्रोजेक्ट रिपोर्ट विवरण' : 'Project Report Details' }}">
                {{ $language === 'hi' ? 
                'सभी उम्मीदवारों को अपनी शोध प्रबंध रिपोर्ट की एक प्रति बीएसआईपी को जमा करनी होगी। बीएसआईपी करेगा बनाए रखना प्रशिक्षण के दौरान उत्पन्न सभी सामग्रियों, विश्लेषणों और डेटा के अधिकार अवधि और बीएसआईपी की पूर्व अनुमति के बिना कोई भी डेटा प्रकाशित नहीं किया जा सकता है। प्राप्त होने पर परियोजना रिपोर्ट, उम्मीदवारों को उम्मीदवार के सलाहकार द्वारा एक प्रमाण पत्र जारी किया जाएगा, निदेशक द्वारा प्रतिहस्ताक्षरित। इंटर्नशिप के दौरान प्राप्त परिणाम हो सकते हैं प्रकाशित संबंधित संरक्षक और उम्मीदवार द्वारा संयुक्त रूप से। ' : 
                'All candidates must submit a copy of their work in PDF format to the BSIP library and collect an acknowledgment/endorsement from the librarian. Certificate of completion will be issued only on submitting this along with a copy of the fees paid. BSIP shall retain the rights for all the materials, analyses and data generated during the training period and no data can be published without prior permission from BSIP. Results obtained during the dissertation may be published jointly by the concerned mentor and the candidate. ' }}
            </p>
        </div>
    </div>
</div>
        </div>
    </div>
</section>
@endsection