@extends('website.layouts.app')

@section('content')
<section>
    <div class="container-fluid p-0">
        <!-- Breadcrumb -->
        <nav class="bio-breadcrumb" aria-label="Breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" aria-label="{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}">{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $language === 'hi' ? 'इतिहास' : 'History' }}
                </li>
            </ul>
        </nav>
    </div>
</section>

<section class="common-mobile-view">
    <div class="container-fluid py-3">
        <div class="row gx-5">
            <!-- Sidebar with Links and Icons -->
            @include('website.layouts.sidebar', ['menuPages' => $menuPages, 'currentPageId' => $currentPageId, 'language' => $language])

            <!-- Main Content -->
            <div class="col-md-9 content">
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'इतिहास' : 'History' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/inauguration%20speach.gif') }}"
                            alt="{{ $language === 'hi' ? 'इतिहास छवि 1' : 'History Image 1' }}"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text " style="text-align: justify;">
                            बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान, इसके संस्थापक आधुनिक भारत के महान सपूतों में से एक श्रद्धेय प्रोफ्ेसर साहनी की स्मृति को ताज़ा रखता है। पुरावानस्पतिक अनुसंधानों को समन्वित करने और रिपोर्टों को प्रकाशित करने को संयोजक के रूप में प्रोफ्ेसर साहनी के साथ भारत में कार्यरत पुरावनस्पतिविदों की समिति सितंबर 1939 में गठित की गई थी। ‘‘भारत में पुरावनस्पतिविज्ञान’’ विषयी पहली रिपोर्ट 1940 में तथा आखिरी रिपोर्ट 1953 में प्रकाशित हुई। लखनऊ में उस समय कार्यरत समिति के आठ सदस्यों (के.एन. कौल, आर.एन. लखनपाल, बी. साहनी, एस.डी. सक्सेना, आर.वी. सिठोले, के.आर. सुरंगे, बी.एस. त्रिवेदी एवं वेंकटचरी) ने 19 मई 1946 को ‘पैलियोबाॅटनीकल सोसाइटी’ को गठित करने को संघ के ज्ञापन पर हस्ताक्षर किए। पुरावनस्पतिविज्ञान में मूल अनुसंधान के संवर्धन को प्रोफ्ेसर बीरबल साहनी एवं श्रीमती सावित्री साहनी द्वारा समर्पित संदर्भ पुस्तकालय और जीवाश्म संग्रहण, निजी निधियों और अचल संपत्ति को केंद्र सहित सोसाइटी पंजीकरण अधिनियम (1860 का 21वां) के तहत उस नाम से 03 जून को न्यास का गठन किया गया।
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            अनुसंधान संस्थान की स्थापना हेतु इस न्यास को कार्य दिया गया। 10 सितंबर 1946 को संकल्प से लिए गए निर्णय से सोसाइटी के शासी मंडल ने ‘पुरावनस्पतिविज्ञान संस्थान की स्थापना’ की तथा अवैतनिक हैसियत से प्रोफ़ेसर साहनी को इसका प्रथम निदेशक नियुक्त किया गया। स्थायी जगह के लंबित अधिग्रहण से वनस्पतिविज्ञान विभाग, लखनऊ विश्वविद्यालय, लखनऊ में संस्थान का कार्य किया गया। सितंबर 1948 में उस समय संयुक्त प्रदेश की सरकार से 3.50 एकड़ जमीन पर विशाल बंगला सन्निहित संपदा को समृद्ध उपहार के रूप में प्राप्त संस्थान इसके मौजूदा परिसर में स्थानांतरित हो गया। संस्थान के लिए इमारत बनवाने हेतु जल्दी ही योजनाएं बनायी गईं।
                            नवीन भवन हेतु 03 अप्रैल 1949 को प्रधानमंत्री पंडित जवाहर लाल नेहरू ने आधारशिला रखी। अपनी पत्नी श्रीमती सावित्री साहनी को संस्थान स्थापित करने की जिम्मेदारी सौंपते हुए दुर्भाग्यवश एक सप्ताहोपरांत 10 अप्रैल 1949 को प्रोफ्ेसर साहनी का देहावसान (निधन) हो गया। श्रीमती सावित्री साहनी के अथक प्रयास और उत्साह से 1952 के अंत तक नवीन भवन का कार्य पूर्ण हो गया।
                        </p>

                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            भारत एवं विदेश से आए विज्ञानियों की विशिष्ट मंडली के बीच प्रधानमंत्री पंडित जवाहर लाल नेहरू ने 02 जनवरी 1953 को विज्ञान को यह भवन समर्पित किया। रीडिंग विश्वविद्यालय, इंग्लैंड के प्रोफ़ेसर टी.एम. हैरिस ने दिसंबर 1949 से जनवरी 1950 तक संस्थान के सलाहकार के रूप में सेवा की। अध्यक्ष श्रीमती सावित्री साहनी के पर्यवेक्षण में निदेशक की वर्तमान ड्यूटी कार्यान्वित करने को मई 1950 में डाॅ. आर. वी. सिठोले, सहायक निदेशक की नियुक्ति प्रभारी अधिकारी के रूप में की गई।
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            संयुक्त राष्ट्र शैक्षणिक, वैज्ञानिक एवं सांस्कृतिक संगठन (यूनेस्को) ने 1951 में बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान को अपने तकनीकी सहायता कार्यक्रम में सम्मिलित कर लिया, जिसके तहत ओस्लो विश्वविद्यालय, नार्वे के प्रोफ्ेसर ओ.ए. होग ने अक्तूबर 1951 से अगस्त 1953 की शुरूआत तक निदेशक के रूप में सेवा की। प्रोफ्ेसर होग के जाने के कुछ-समय बाद पैलियोबाॅटिनीकल सोसाइटी के शासी मंडल, अध्यक्ष के पर्यवेक्षण में डाॅ. के.आर. सुरंगे को प्रभारी अधिकारी बनाया गया। सोसाइटी की अध्यक्ष होने के अलावा श्रीमती सावित्री साहनी अक्तूबर 1959 में संस्थान की अध्यक्ष और प्रशासन प्रभारी बनीं तथा उसी समय डाॅ. सुरंगे को शैक्षणिक व शोध गतिविधियों की जिम्मेदारी सौंपते हुए निदेशक के रूप में नियुक्त किया गया। 1967 के आखिर में ऐसी स्थिति आई जब महसूस किया गया कि पैलियोबाॅटिनीकल सोसाइटी को विशुद्ध रूप से वैज्ञानिक निकाय के रूप में और संस्थान को अलग संगठन के रूप में कार्य करना चाहिए। जनवरी 1968 में प्रोफ्ेसर के.एन. कौल को सोसाइटी का अध्यक्ष चुना गया। इस दरम्यान नया संविधान गठित किया गया जिसके तहत 09 जुलाई 1969 को बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान अलग निकाय के रूप में पंजीकृत किया गया। इस प्रकार पैलियोबाॅटिनीकल सोसाइटी ने नवंबर 1969 से संस्थान को नए निकाय को हस्तांतरित व सुपुर्द कर दिया जिससे बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान नए शासी मंडल के प्रबंधन में आया। तब से, संस्थान स्वायत्त शोध संगठन के रूप में कार्य करता है तथा विज्ञान और प्रौद्योगिकी विभाग, भारत सरकार से पैसा (निधि) मिलता है।</p>
                    </div>
                    @else
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/inauguration%20speach.gif') }}"
                            alt="{{ $language === 'hi' ? 'इतिहास छवि 1' : 'History Image 1' }}"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text " style="text-align: justify;">
                            The Birbal Sahni Institute of Palaeobotany commemorates the name of its reverend founder, Professor Birbal Sahni, one of the great sons of modern India. In September 1939 a committee of palaeobotanists working in India was formed, with Professor Sahni as Convener, to coordinate palaeobotanical researches and to publish periodical reports. The first report entitled ‘Palaeobotany in India’ appeared in 1940 and the last in 1953. On May 19, 1946 eight members of the committee, who then happened to be working at Lucknow (K.N. Kaul, R.N. Lakhanpal, B. Sahni, S.D. Saxena, R.V. Sitholey, K.R. Surange, B.S. Trivedi and S. Venkatachary), signed a Memorandum of Association to form a Palaeobotanical Society. A trust that name was created on 3rd June, under the Societies Registration Act (XXI of 1860), with a nucleus of private funds and immovable property, a reference library and fossil collections dedicated by Professor Birbal Sahni and Mrs. Savitri Sahni, to the promotion of original research in Palaeobotany.
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            This trust was assigned the job for the foundation of a Research Institute. By a resolution passed on 10th September 1946, the Governing Body of the Society established an ‘Institute of Palaeobotany’ and appointed Professor Sahni as its first Director in an honorary capacity. Pending the acquisition of per manent place the work of the Institute was carried out in the Department of Botany, Lucknow University, Lucknow. In September 1948, the Institute moved to its present campus received as a generous gift of an estate comprising a large bunglow on 3.50 acres of land, from the Government of the then United Provinces. Soon plans were made for erecting a building for the Institute. The Foundation Stone for the new building was laid on April 3, 1949 by the Prime Minister Pandit Jawaharlal Nehru. Unfortunately after a week on 10th April 1949 Prof. Sahni passed away leaving the responsibility to establish the Institute to his wife Mrs. Savitri Sahni. Untiring efforts and zeal of Mrs. Savitri Sahni led to the completion of the new building by the end of 1952. The Prime Minister Pandit Jawaharlal Nehru dedicated the building to science on January 2, 1953, amidst a galaxy of scientists from India and abroad. From December 1949 to January 1950, Prof. T.M. Harris of the University of Reading, England, served as Advisor to the Institute. In May 1950 Dr. R.V. Sitholey, Assistant Director was appointed as Officer-in-charge for carrying out current duties of the Director under the supervision of the President Mrs. Savitri Sahni.
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            In 1951, the United Nations Educational, Scientific and Cultural Organization (UNESCO) included the Birbal Sahni Institute of Palaeobotany in its Technical Assistance Programme, under which Professor O.A. Høeg of the University of Oslo, Norway, served as its Director from October, 1951 to the beginning of August, 1953. A short time after Prof. Høeg’s departure, Dr. K.R. Surange was made the Officer-in-charge, under the supervision of the President, Governing Body of the Palaeobotanical Society. In October 1959 Mrs. Savitri Sahni, in addition to being the President of the Society, also became the President of the Institute and in charge of administration, and at the same time Dr. Surange was appointed as Director having charge of academic and research activities. In the end of 1967 a stage came when it was felt that the Palaeobotanical Society should function as a purely scientific body and the Institute as a separate organization. In January 1968, Prof. K.N. Kaul was elected as the President of the Society. A new constitution was framed in the meantime, under which Birbal Sahni Institute of Palaeobotany was registered as a separate body on July 9, 1969. Thus, the Palaeobotanical Society in November, 1969, transferred and delivered the possession of Institute to this new body whereby the Birbal Sahni Institute of Palaeobotany came under the management of a new Governing Body. Since then, the Institute functions as an autonomous research organization and is funded by the Department of Science and Technology, Government of India.
                        </p>
                    </div>
                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection
