@extends('website.layouts.app')


@section('content')
<section>
    <div class="container-fluid p-0" id="skipToContent">
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
                    {{ $language === 'hi' ? 'शैक्षिक योग्यताएं' : 'Education Career' }}
                </li>
            </ul>
        </nav>
    </div>
</section>

<section class="common-mobile-view">
    <div class="container py-3">
        <div class="row gx-5">
            <!-- Sidebar with Links and Icons -->
            @include('website.layouts.sidebar', ['menuPages' => $menuPages, 'currentPageId' => $currentPageId, 'language' => $language])

            <!-- Main Content -->
            <div class="col-md-9 content">
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'शैक्षिक योग्यताएं' : 'Education Career' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')
                    <div class="col-md-6">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="{{ $language === 'hi' ? 'बीरबल साहनी' : 'Prof. Birbal Sahni' }}"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-6">
                        <p class="normal-text"  style="text-align: justify;">बीरबल ने पूरी पढ़ाई (पूर्ण शिक्षा), लाहौर, भारत में पहले मिशन और सेंट्रल मिडिल स्कूलों में तथा तदोपरांत जहाॅं उनके पिता रसायनविज्ञान में एक पद पर थे वहाॅं गवर्नमेंट कालेज में की। पंजाब विश्वविद्यालय की दसवीं की परीक्षा में संस्कृत में पहला स्थान और बारहवीं के विज्ञान में सूबे में दर्जा पाते हुए उन्होंने बहुत-सी शैक्षणिक योग्यताएं प्राप्त कीं।
                            संस्कृत के प्रति उनका झुकाव अंत तक रहा और बाद के सालों में तो वह वास्तव में इसके प्रति ज़्यादा निष्ठावान हो गए। 1911 में वह लाहौर से स्नातक हुए और उसी साल इम्मानुएल कालेज, कैंब्रिज में प्रवेश ले लिया।
                            बीरबल 1911 में कैंब्रिज से स्नातक हुए और जल्दी ही शोध के लिए जम एग। </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text mt-0 mb-0"  style="text-align: justify;">उन्होंने उस ज़माने के बहुत नामी-गिरामी वनस्पतिविज्ञानी, प्रेरणादायक, नेतृत्व एवं दिशा-निर्देश के अधीन अत्यंत रूचि से शोध की शुरूआत की। </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text"  style="text-align: justify;">प्रो. ए.सी. सीवर्ड जीवित एवं जीवाश्म पादपों पर उसके लेखों को सुनने के प्रेरणा स्त्रोत थे किंतु एक स्त्रोत ने गौरव जोड़ दिया जब उनके प्रिय विद्यार्थी बीरबल का नाम गोंडवाना और अन्य पेड़-पौधों के अध्ययन में उल्लिखित था। प्रो. एवं श्रीमती सीवर्ड बीरबल के प्रति मृदु ख़याल रखते थे तथा सदैव स्नेही सीमाओं में लिखते थे। यह शिक्षक एवं उसके शिष्य के बीच के बजाय और गहरा व अति सुंदर नाता था तथा जिसे बीरबल ने बहुत सी अन्य चीजों के बजाए संजोया। कैंब्रिज में, केवल अभी छात्र के लिए भारतीय जीवित पादपों के बीरबल की रूचि और ज्ञान को वक़्त से पहले ही मान्यता मिल गई थी, लाॅसन की वनस्पतिविज्ञान की पाठ्य-पुस्तक जो कि आजकल इस विषय पर बृहत रूप से प्रयुक्त की जाती है को परिशोधित करने की साग्रह प्रार्थना की गई थी।</p>
                        <p class="normal-text"  style="text-align: justify;">जीवाश्म पादपों पर उनके शोधों के लिए 1919 में उन्हें लंदन विश्वविद्यालय की डी.एस-सी. उपाधि से नवाज़ा गया। उसी वर्ष में घर लौटते समय भारत में पुरावनस्पतिविज्ञान का स्थान और ऊॅंचा करते हुए उन्होंने केवल अपने अन्वेषणों को ही जारी नहीं रखा बल्कि राष्ट्र के हर भाग से समर्पित छात्रों के समूह को भी अपने चहुंओर एकत्रित किया। भारत में समय से पहले ही उनकी जीवन-यात्रा के दौरान, बीरबल का प्रो. सीवर्ड ने अति अभिनंदन किया जब उन्होंने भारत से प्राप्त कुछेक जीवाश्म संग्रहणों का अध्ययन करने से यह कहते हुए इन्कार कर दिया कि इस पर सबसे पहला अधिकार मेरे युवा शिष्य का है। अंततोगत्वा सामग्री बीरबल पर आ गई। अपने भविष्य के शोध के लिए इसने मार्ग प्रशस्त किया तथा इस प्रकार भारतीय भू-वैज्ञानिक सर्वेक्षण के साथ दीर्घ एवं चिरस्थायी संगति की शुरूआत हुई।</p>
                        <p class="normal-text"  style="text-align: justify;">ऐसे बहुत-से अवसर रहे हैं जब बीरबल ने अपने गुरू जी जिनको उन्होंने सीमा से परे सम्मान एवं प्यार दिया, की भूमिका पर अच्छे कृत्य को कृतज्ञतापूर्वक स्वीकार किया है। भारतीय भू-वैज्ञानिक सर्वेक्षण ने उनके सम्मान में उनकी अर्ध प्रतिमा स्थापित करके उन्हें स्मरण किया है। कई पुरावानस्पतिक शोधों के अलावा उन्होंने पंजाब लवण पर्वतमाला की लवण श्रृंखलाओं की आयु तथा दक्कन पाश की आयु से संबद्ध महत्वपूर्ण लेखों को प्रस्तुत किया तथा जिन्हें उन्होंने प्रकाशित किया।</p>
                        <p class="normal-text"  style="text-align: justify;">नए खोले गए लखनऊ विश्वविद्यालय का वनस्पतिविज्ञान विभाग के प्रथम आचार्य के रूप में उन्होंने 1921 में कार्यभार संभाला। उन्होंने अपने आपको जल्दी ही दिल और आत्मा से संगठन के कार्य में लगा दिया। अन्य अति व्यस्तताओं के बावजूद, अपने हाथों से जीवाश्म पादपों की पिसाई और तनु खंडों को बनाते हुए उन्हें अक्सर देखा जाता था। कठिन परिश्रम एवं प्रेरक आकर्षण से उन्होंने विश्वविद्यालय की साख बना दी जो जल्दी ही भारत में वानस्पतिक व पुरावानस्पतिक अन्वेषणों का पहला केंद्र बन गया।</p>
                        <p class="normal-text"  style="text-align: justify;">भारतीय विज्ञानी को संयोगवश प्रथम प्रदान करने वाली एस-सी.डी. उपाधि प्रदान कर कैंब्रिज विश्वविद्यालय ने उनके शोधों को मान्यता दी। जब उन्हें लंदन की राॅयल सोसाइटी का अध्येता चयनित किया गया तब उन्हें 1936 में ब्रिटिश का सर्वोच्च वैज्ञानिक सम्मान मिला। उन्हें क्रमशः 1930 एवं 1935, पांचवीं एवं छठी अंतराष्ट्रीय वानस्पतिक कांग्रेस के वानस्पतिक खंड का उपाध्यक्ष, वर्ष 1940 के लिए भारतीय विज्ञान कांग्रेस का महा अध्यक्ष; 1937-39 और 1943-44 में राष्ट्रीय विज्ञान अकादमी, भारत का अध्यक्ष चुना गया। 1948 में उन्हें कला एवं विज्ञान की अमेरिकी अकादमी का विदेश सम्मानित सदस्य चुना गया। अंतर्राष्ट्रीय वानस्पतिक कांग्रेस, स्टाॅकहाॅम के सम्मानित अध्यक्ष के रूप में उनका चयन शीर्ष सम्मान के रूप में मिला।</p>
                    </div>

                    @else
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="{{ $language === 'hi' ? 'बीरबल साहनी' : 'Prof. Birbal Sahni' }}"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text " style="text-align: justify;">
                            The Birbal Sahni Institute of Palaeobotany commemorates the name of its reverend
                            founder, Professor
                            Birbal Sahni, one of the great sons of modern India. In September 1939 a committee of palaeobotanists
                            working in India was formed, with Professor Sahni as Convener, to coordinate palaeobotanical
                            researches and to publish periodical reports. The first report entitled ‘Palaeobotany in India’
                            appeared in 1940 and the last in 1953. On May 19, 1946 eight members of the committee, who then
                            happened to be working at Lucknow (K.N. Kaul, R.N. Lakhanpal, B. Sahni, S.D. Saxena, R.V. Sitholey,
                            K.R. Surange, B.S. Trivedi and S. Venkatachary), signed a Memorandum of Association to form a
                            Palaeobotanical Society. </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            A trust that name was created on 3rd June, under the Societies Registration
                            Act (XXI of 1860), with a nucleus of private funds and immovable property, a reference library and
                            fossil collections dedicated by Professor Birbal Sahni and Mrs. Savitri Sahni, to the promotion of
                            original research in Palaeobotany.</p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            This trust was assigned the job for the foundation of a Research Institute. By a
                            resolution passed on
                            10th September 1946, the Governing Body of the Society established an ‘Institute of Palaeobotany’ and
                            appointed Professor Sahni as its first Director in an honorary capacity. Pending the acquisition of
                            per manent place the work of the Institute was carried out in the Department of Botany, Lucknow
                            University, Lucknow. In September 1948, the Institute moved to its present campus received as a
                            generous gift of an estate comprising a large bunglow on 3.50 acres of land, from the Government of
                            the then United Provinces. Soon plans were made for erecting a building for the Institute. The
                            Foundation Stone for the new building was laid on April 3, 1949 by the Prime Minister Pandit
                            Jawaharlal Nehru.</p>
                        <p class="normal-text" style="text-align: justify;">Unfortunately after a week on 10th April 1949 Prof. Sahni passed away leaving the
                            responsibility to establish the Institute to his wife Mrs. Savitri Sahni. Untiring efforts and zeal of
                            Mrs. Savitri Sahni led to the completion of the new building by the end of 1952. The Prime Minister
                            Pandit Jawaharlal Nehru dedicated the building to science on January 2, 1953, amidst a galaxy of
                            scientists from India and abroad. From December 1949 to January 1950, Prof. T.M. Harris of the
                            University of Reading, England, served as Advisor to the Institute. In May 1950 Dr. R.V. Sitholey,
                            Assistant Director was appointed as Officer-in-charge for carrying out current duties of the Director
                            under the supervision of the President Mrs. Savitri Sahni.</p>
                        <p class="normal-text" style="text-align: justify;">In 1951, the United Nations Educational, Scientific and Cultural Organization
                            (UNESCO) included the Birbal Sahni Institute of Palaeobotany in its Technical Assistance Programme,
                            under which Professor O.A. Høeg of the University of Oslo, Norway, served as its Director from
                            October, 1951 to the beginning of August, 1953. A short time after Prof. Høeg’s departure, Dr. K.R.
                            Surange was made the Officer-in-charge, under the supervision of the President, Governing Body of the
                            Palaeobotanical Society. In October 1959 Mrs. Savitri Sahni, in addition to being the President of the
                            Society, also became the President of the Institute and in charge of administration, and at the same
                            time Dr. Surange was appointed as Director having charge of academic and research activities. In the
                            end of 1967 a stage came when it was felt that the Palaeobotanical Society should function as a purely
                            scientific body and the Institute as a separate organization. In January 1968, Prof. K.N. Kaul was
                            elected as the President of the Society. A new constitution was framed in the meantime, under which
                            Birbal Sahni Institute of Palaeobotany was registered as a separate body on July 9, 1969. Thus, the
                            Palaeobotanical Society in November, 1969, transferred and delivered the possession of Institute to
                            this new body whereby the Birbal Sahni Institute of Palaeobotany came under the management of a new
                            Governing Body. Since then, the Institute functions as an autonomous research organization and is
                            funded by the Department of Science and Technology, Government of India.</p>
                    </div>
                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection
