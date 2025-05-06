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
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'सुरक्षा नीति' : 'Security Policy' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container my-5">
            <h1 class="mb-4 text-center">{{ $language === 'hi' ? 'सुरक्षा नीति' : 'Security Policy' }}</h1>

            <!-- Privacy -->
            <section class="p-4 rounded mb-4 section-privacy">
                <div class="policy-header"> {{ $language === 'hi' ? 'गोपनीयता नीति' : 'Privacy Policy' }}</div>
                <p>{!! $language === 'hi'
                    ? '
                                                                बिरबल साहनी जीवाश्म विज्ञान संस्थान (BSIP) इस वेबसाइट पर आपके बारे में कोई विशिष्ट व्यक्तिगत जानकारी (जैसे नाम, फ़ोन नंबर या ई-मेल पता) स्वचालित रूप से एकत्रित नहीं करता, जिससे आपकी पहचान की जा सके।
                                                                BSIP वेबसाइट पर स्वेच्छा से दी गई कोई भी व्यक्तिगत पहचान योग्य जानकारी किसी भी तीसरे पक्ष (सरकारी या निजी) को बेची या साझा नहीं की जाती है। इस पोर्टल को प्रदान की गई कोई भी जानकारी हानि, दुरुपयोग, अनधिकृत पहुंच या प्रकटीकरण, परिवर्तन या विनाश से सुरक्षित रखी जाएगी।
                                                                "कुकी" एक सॉफ्टवेयर कोड का टुकड़ा होता है जिसे कोई वेबसाइट आपके ब्राउज़र को तब भेजती है जब आप उस वेबसाइट की जानकारी एक्सेस करते हैं। यह वेबसाइट किसी भी प्रकार की कुकीज़ का उपयोग नहीं करती है।'
                    : 'The Birbal Sahni Institute of Palaeosciences (BSIP) does not automatically capture any specific personal information from you (such as name, phone number, or e-mail address) that would allow us to identify you individually when you visit this website.
                                                                We do not sell or share any personally identifiable information voluntarily provided on the BSIP website with any third party (public or private). Any personal information shared with this portal will be handled with strict confidentiality and protected against loss, misuse, unauthorized access or disclosure, alteration, or destruction.
                                                                A "cookie" is a piece of software code sent to your browser when you access a website. The BSIP website does not use cookies' !!}</p>

            </section>
<!-- Hyperlinking Policy -->
<section class="p-4 rounded mb-4 section-terms">
    <div class="policy-header"> {{ $language === 'hi' ? 'हाइपरलिंकिंग नीति' : 'Hyperlinking Policy' }}</div>
    {!! $language === 'hi'
        ? '<p>इस वेबसाइट पर कई स्थानों पर आपको अन्य वेबसाइटों/पोर्टलों के लिंक मिल सकते हैं। ये लिंक केवल आपकी सुविधा के लिए प्रदान किए गए हैं। <strong>बीरबल साहनी जीवाश्म विज्ञान संस्थान (BSIP)</strong> इन लिंक की गई वेबसाइटों की सामग्री या विश्वसनीयता के लिए उत्तरदायी नहीं है, और उनमें व्यक्त विचारों का अनिवार्य रूप से समर्थन नहीं करता है। किसी लिंक की उपस्थिति या इस पोर्टल पर उसकी सूची को किसी भी प्रकार की स्वीकृति नहीं माना जाना चाहिए।</p>
           <p>हम यह सुनिश्चित नहीं कर सकते कि ये लिंक हर समय कार्यशील रहेंगे, और लिंक किए गए पृष्ठों की उपलब्धता पर हमारा कोई नियंत्रण नहीं है।</p>
           <p>जब तक अन्यथा उल्लेख न किया गया हो, तब तक हमारी वेबसाइट से सीधे लिंक करने के लिए किसी पूर्व अनुमति की आवश्यकता नहीं है। हालांकि, यदि आप हमारी साइट से लिंक करते हैं, तो हम अपेक्षा करते हैं कि आप हमें इसकी सूचना दें।</p>
           <p>साथ ही, हम यह अनुमति नहीं देते कि हमारी वेबसाइट के पृष्ठ किसी अन्य साइट पर फ्रेम में लोड किए जाएं। हमारे वेबसाइट के पृष्ठ उपयोगकर्ता के नए ब्राउज़र विंडो/टैब में खुलने चाहिए।</p>'
        : '<p>At various locations on this website, you may find links to external websites or portals. These links are provided solely for your convenience. The <strong>Birbal Sahni Institute of Palaeosciences (BSIP)</strong> is not responsible for the content or reliability of these linked websites and does not necessarily endorse the views expressed within them. The mere presence of a link or its inclusion on this portal should not be considered as an endorsement of any kind.</p>
           <p>We do not guarantee the functionality of these external links at all times, and we have no control over the availability or performance of the linked pages.</p>
           <p>Direct linking to our website is permitted without prior permission unless explicitly stated otherwise. However, we do request that you inform us when you provide a link to our site.</p>
           <p>Please note, we do not allow our website’s pages to be loaded into frames on any other website. BSIP web pages must open in a new browser window or tab.</p>' 
    !!}
</section>

            <!-- Terms of Use -->
            <section class="p-4 rounded mb-4 section-terms">
                <div class="policy-header"> {{ $language === 'hi' ? 'उपयोग की शर्तें' : 'Terms of Use' }}</div>
                {!! $language === 'hi'
                    ? ' <p>यह वेबसाइट <strong>बीरबल साहनी जीवाश्म विज्ञान संस्थान (BSIP)</strong>  द्वारा डिज़ाइन, विकसित और अनुरक्षित की गई है। यद्यपि इस वेबसाइट पर प्रदर्शित सामग्री की सटीकता और अद्यतनता सुनिश्चित करने के लिए सभी प्रयास किए गए हैं, फिर भी इसे किसी कानून के कथन के रूप में नहीं समझा जाना चाहिए और न ही किसी कानूनी उद्देश्य के लिए उपयोग किया जाना चाहिए।</p>
                                <p>किसी भी अस्पष्टता या संदेह की स्थिति में, उपयोगकर्ताओं को संस्थान या अन्य स्रोतों से जानकारी की पुष्टि करने और उपयुक्त पेशेवर सलाह लेने की सिफारिश की जाती है।</p>
                                <p>किसी भी स्थिति में BSIP इस वेबसाइट के उपयोग या उपयोग की असमर्थता से उत्पन्न किसी भी प्रकार की हानि, व्यय, या क्षति (प्रत्यक्ष, अप्रत्यक्ष या आनुषंगिक) के लिए उत्तरदायी नहीं होगा।</p>
                                <p>ये नियम और शर्तें भारत के कानूनों के अनुसार नियंत्रित और व्याख्यायित की जाएंगी। इन शर्तों के तहत उत्पन्न होने वाले किसी भी विवाद के लिए भारत के न्यायालयों का विशेष अधिकार क्षेत्र होगा।</p>
                                pइस वेबसाइट पर ऐसे हाइपरलिंक्स या संकेत हो सकते हैं जो गैर-सरकारी या निजी संगठनों द्वारा बनाए गए और अनुरक्षित अन्य वेबसाइटों की ओर निर्देशित करते हैं। ये लिंक केवल आपकी सूचना और सुविधा के लिए प्रदान किए गए हैं। जब आप ऐसे किसी बाहरी लिंक का चयन करते हैं, तो आप BSIP की वेबसाइट से बाहर निकल जाते हैं और उस बाहरी वेबसाइट के गोपनीयता और सुरक्षा नीतियों के अधीन हो जाते हैं। BSIP ऐसे लिंक किए गए पृष्ठों की हमेशा उपलब्धता की गारंटी नहीं देता।</p>'
                    : '<p>This website is designed, developed, and maintained by the <strong> Birbal Sahni Institute of
                                        Palaeosciences
                                        (BSIP).</strong> While every effort has been made to ensure the accuracy and currency of the content
                                    presented on
                                    this website, it should not be construed as a statement of law or be used for any legal purposes.
                                </p>
                                <p>In case of any ambiguity or doubts, users are advised to verify/check with the Institute or other
                                    appropriate sources and seek relevant professional advice.</p>
                                <p>Under no circumstances will BSIP be liable for any loss, expense, or damage—direct, indirect, or
                                    consequential—arising from the use of, or inability to use, this website or any information provided on
                                    it.</p>
                                <p>These terms and conditions shall be governed by and construed in accordance with the laws of India. Any
                                    disputes arising under these terms and conditions shall fall under the exclusive jurisdiction of the
                                    courts of India.</p>
                                <p>This website may include links to other websites maintained by non-government or private organizations.
                                    These links are provided solely for user convenience and informational purposes. When you select such a
                                    link, you are leaving the BSIP website and are subject to the privacy and security policies of the
                                    linked external website. BSIP does not guarantee the availability or accuracy of such external pages at
                                    all times.</p>' !!}




            </section>
        </div>
    </section>
    <style>
        .policy-header {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .section-standardisation {
            background-color: #e3f2fd;
        }

        .section-copyright {
            background-color: #e3f2fd;
        }

        .section-hyperlinking {
            background-color: #e3f2fd;
        }

        .section-privacy {
            background-color: #e3f2fd;
        }

        .section-terms {
            background-color: #e3f2fd;
        }
    </style>
@endsection
