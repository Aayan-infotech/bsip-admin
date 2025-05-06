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
                        <h3>{{ $language === 'hi' ? 'पदक और पुरस्कार' : 'Medals and Awards' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'फेलोशिप के अलावा, संस्थान में वैज्ञानिकों के विभिन्न स्तरों पर और अंतर्राष्ट्रीय स्तर पर Palaeosciences के क्षेत्र में वैज्ञानिकों के योगदान को पहचानने के लिए पदक और पुरस्कार प्रदान किए जाते हैं।'
                            : 'Besides fellowships, the Medals and prizes are awarded to recognize the contributions of
                                                                            scientists in
                                                                            the field of Palaeosciences at different levels of scientists in the Institute and also at
                                                                            International
                                                                            level' }}
                        </p>
                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'प्रोफेसर टी. एम. हैरिस पदक' : 'Professor T. M. Harris Medal' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? "उम्मीदवार का चयन पलायोबोटनी या किसी भी संबद्ध अनुशासन में जीवन काल की उपलब्धि के आधार पर किया जाएगा। उम्मीदवार का नाम एक प्रस्तावक से उम्मीदवार और उम्मीदवार के बायोडाटा की सहमति से आना चाहिए।
                                                उम्मीदवार संस्थान से या विदेश से बाहर से हो सकता है। पुरस्कार को 1998 से शुरू करते हुए हर वैकल्पिक वर्ष बनाया जाएगा।"
                            : "The selection of the candidate shall be made on the basis of life time achievement in
                                                                            Palaeobotany or
                                                                            any allied discipline. The name of the candidate should come from a Proposer with the consent of
                                                                            the
                                                                            candidate and candidate's bio-data.
                                                                            The candidate can be from the Institute or from outside including foreign countries. The award
                                                                            shall be
                                                                            made every alternate year, starting from 1998.</p>
                                                                    " }}
                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'डॉ. पी. एन. श्रीवास्तव पदक' : 'Dr. P. N. Srivastava Medal' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? "पुरस्कार के वर्ष से पहले के दो वर्षों के दौरान संस्थान में किए गए शोध कार्यों के सर्वोत्तम कार्य के लिए वैज्ञानिक का चयन संस्थान के वैज्ञानिक 'डी' के बीच किया जाता है। 1997 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।"
                            : "The selection of the Scientist is made amongst Scientist 'D' of the Institute for the best piece
                                                    of
                                                    research work done in the Institute during the two years preceding the year of award. The award
                                                    shall be
                                                    made every alternate year, starting from 1997." }}
                        </p>
                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'श्री चंद्र दत्त पंत मेमोरियल मेडल' : 'Shri Chandra Dutt Pant Memorial Medal' }}
                        </h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? "पुरस्कार के वर्ष से पहले के तीन वर्षों के दौरान संस्थान में किए गए अनुसंधान कार्यों के सर्वश्रेष्ठ टुकड़े के लिए वैज्ञानिक का चयन संस्थान के वैज्ञानिक 'सी' के बीच किया जाता है। यह पुरस्कार 1999 से शुरू होने वाले हर तीन साल के बाद बनाया जाएगा। वैज्ञानिक का चयन पुरस्कार के वर्ष से पहले दो वर्षों के दौरान संस्थान में किए गए शोध कार्यों के सर्वोत्तम कार्य के लिए संस्थान के वैज्ञानिक 'डी' के बीच किया जाता है। 1997 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।"
                            : "The selection of the Scientist is made amongst Scientist 'C' of the Institute for the best piece
                                                    of
                                                    research work done in the Institute during the three years preceding the year of award. The
                                                    award shall
                                                    be made every three years, starting from 1999. The selection of the Scientist is made amongst
                                                    Scientist
                                                    'D' of the Institute for the best piece of research work done in the Institute during the two
                                                    years
                                                    preceding the year of award. The award shall be made every alternate year, starting from 1997." }}
                        </p>
                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'डॉ. चुन्नी लाल खत्याल पदक' : 'Dr. Chunni Lal Khatiyal Medal' }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? "पुरस्कार के वर्ष से पहले के तीन वर्षों के दौरान संस्थान में किए गए शोध कार्यों के सर्वोत्तम कार्य के लिए वैज्ञानिक का चयन संस्थान के वैज्ञानिक 'बी' के बीच किया जाता है। यह पुरस्कार 1998 से शुरू होकर हर तीन साल में बनाया जाएगा।"
                            : "The selection of the Scientist is made amongst Scientist 'B' of the Institute for the best piece
                                                    of
                                                    research work done in the Institute during the three years preceding the year of award. The
                                                    award shall
                                                    be made every three years, starting from 1998." }}
                        </p>
                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'डॉ. प्रातुल चंद्र भंडारी पदक' : ' Dr. Pratul Chandra Bhandari Medal' }}
                        </h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? 'वैज्ञानिक का चयन पुरस्कार के वर्ष से पहले के तीन वर्षों के दौरान किए गए शोध कार्यों के सर्वोत्तम कार्य के लिए बीरबल साहनी रिसर्च स्कॉलर्स के बीच से किया गया है। 1997 से शुरू होने वाला यह पुरस्कार हर तीन साल में बनाया जाएगा'
                            : 'The selection of the scientist is made from amongst Birbal Sahni Research Scholars for the best
                                                    piece
                                                    of research work done during the three years preceding the year of the award. The award shall be
                                                    made
                                                    every three years, starting from 1997.' }}
                        </p>

                    </div>

                    <div>
                        <h3>{{ $language === 'hi' ? 'अयंगर-साहनी मेडल' : 'The Iyengar-Sahni Medal' }}</h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? 'अयंगर-साहनी मेडल को पुरस्कार के वर्ष से पहले दो वर्षों के दौरान द पैलेओबोटनिस्ट में प्रकाशित सर्वश्रेष्ठ पेपर की मान्यता से सम्मानित किया जाना है। लेखक / लेखक संस्थान से या बाहर से शामिल हो सकते हैं जिसमें विदेशी देश या दोनों शामिल हैं। एकाधिक लेखक के मामले में, सभी लेखक पुरस्कार प्राप्त करेंगे। 1997 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।'
                            : 'The Iyengar-Sahni Medal is to be awarded in recognition of the best paper published in The
                                                    Palaeobotanist during the two years preceding the year of award. The author/authors can be from
                                                    the
                                                    Institute or from outside including foreign countries or both. In the case of Multiple
                                                    authorship, all
                                                    the author shall receive the award. The award shall be made every alternate year, starting from
                                                    1997.' }}
                        </p>

                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'डॉ. बी. एस. वेंकटाचल मेमोरियल मेडल' : 'Dr. B. S. Venkatachala’s Memorial Medal' }}
                        </h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? "संस्थान के युवा वैज्ञानिक (बीएसआरएस, बीएसआरए और प्रोजेक्ट स्कॉलर्स सहित) द्वारा पैलियोबोटनी में शोध कार्य के उत्कृष्ट कार्य को मान्यता देने के लिए डॉ। बी.एस. यह पदक 2008 से शुरू होने वाले वैकल्पिक वर्ष में प्रदान किया जाता है। यह पुरस्कार एक स्वर्ण पदक ले जाएगा और एक व्याख्यान भी देगा
                        निम्नलिखित पदक बीरबल साहनी इंस्टीट्यूट ऑफ पलेओसिएंस, लखनऊ के अलविदा कानून 30.1 के तहत अनुसूची 'एच' में शामिल किए गए हैं:"
                            : "Dr. B. S. Venkatachala’s Memorial Medal is to be awarded in recognition of outstanding piece of
                                                    research work in palaeobotany by a young scientist (including BSRS, BSRA and Project Scholars)
                                                    of the
                                                    Institute, preferably below the age of 35 years. This Medal is awarded in alternate year
                                                    starting from
                                                    2008.The award shall carry a Gold Medal and also deliver a lecture
                                                    The following Medals have been included in Schedule 'H' under Bye-Law 30.1 of the Bye-Laws of
                                                    the
                                                    Birbal Sahni Institute of Palaeosciences, Lucknow :" }}
                        </p>

                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'टीम पदक' : 'Team Medal' }}</h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? "टीम का चयन संस्थान के वैज्ञानिकों के बीच किया जाएगा, जिन्होंने पुरस्कार के वर्ष से पहले दो वर्षों के दौरान संस्थान के भीतर या अन्य संस्थान (ओं) के सहयोग से टीम की भावना और सहयोगात्मक एकीकृत कार्य करने के लिए उत्कृष्ट प्रदर्शन किया है। यह काम जरूरी प्रकाशित रिकॉर्ड नहीं हो सकता है। यह पुरस्कार बीरबल साहनी रिसर्च एसोसिएट्स और बीरबल साहनी रिसर्च स्कॉलर्स सहित सभी वैज्ञानिकों के लिए खुला होगा।
                        यह पुरस्कार वैज्ञानिकों की टीम के प्रत्येक सदस्य को एक पदक और एक प्रशस्ति पत्र प्रदान करेगा।
                        2006 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।"
                            : "The selection of the team shall be made among the scientists of the Institute who have excelled
                                                    to
                                                    inculcate team spirit and collaborative integrated work within the Institute or in collaboration
                                                    with
                                                    other Institution (s) during the two years preceding the year of award. This work may not
                                                    necessarily
                                                    be a published record. This award will be open to all Scientists, including Birbal Sahni
                                                    Research
                                                    Associates and Birbal Sahni Research Scholars.
                                                    The Award shall carry a Medal and a Citation to each member of team of Scientists.
                                                    The award shall be made every alternate year, starting from 2006." }}
                        </p>

                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'हीरा जयंती पदक' : ' Diamond Jubilee Medal' }}</h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? 'उम्मीदवार का चयन संस्थान के वैज्ञानिकों के बीच किया जाएगा, जिन्होंने व्यक्तिगत रूप से या एक टीम के सदस्य के रूप में पुरस्कार के वर्ष से पहले दो वर्षों के दौरान रेफरी पत्रिकाओं में उच्च गुणवत्ता के पत्र प्रकाशित किए हैं। यह शोध पत्रों की गुणवत्ता और पुरस्कार के वर्ष से पहले दो वर्षों के दौरान उनके प्रभाव पर आधारित हो सकता है।
                        पुरस्कार एक पदक और एक प्रशस्ति पत्र ले जाएगा।
                        2006 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।'
                            : 'The selection of candidate shall be made among the Scientists of the Institute who have published
                                                    papers of high quality in refereed journals during the two years preceding the year of award,
                                                    individually or as member of a team. This may be based on the quality of research papers and
                                                    their
                                                    impact during the two years preceding the year of award.
                                                    The Award shall carry a Medal and a Citation.
                                                    The award shall be made every alternate year, starting from 2006.' }}
                        </p>

                    </div>
                    <div>
                        <h3> {{ $language === 'hi' ? 'साइंटिफिक आउट पुट मेडल' : 'Scientific Out Put Medal' }}</h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? 'पुरस्कार के वर्ष से पहले के दो वर्षों के दौरान संस्थान में किए गए शोध कार्यों के सर्वश्रेष्ठ टुकड़े के लिए एक उम्मीदवार का चयन वैज्ञानिकों ई, एफ और जी के बीच किया जाएगा।
                        पुरस्कार एक पदक और एक प्रशस्ति पत्र ले जाएगा।
                        2006 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।'
                            : 'The selection of a candidate shall be made amongst the Scientists E, F and G for the best piece
                                                    of
                                                    research work done in the Institute during the two years preceding the year of award.
                                                    The Award shall carry a Medal and a Citation.
                                                    The award shall be made every alternate year, starting from 2006.' }}
                        </p>

                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'बाहरी बजटीय संसाधन पदक' : 'External Budgetory Resource Medal' }}</h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? 'उम्मीदवार का चयन संस्थान के वैज्ञानिक / तकनीकी कर्मियों के बीच किया जाएगा, जिन्होंने संस्थान में परामर्शी सेवाओं, अनुबंध अनुसंधान और अनुबंध प्रशिक्षण के दौरान संस्थान में प्रायोजित परियोजनाओं को लाने के लिए बाहरी बजटीय संसाधन प्रदान करने में उत्कृष्ट प्रदर्शन किया है। पुरस्कार के वर्ष से पहले दो वर्ष।
                        पुरस्कार एक पदक और एक प्रशस्ति पत्र ले जाएगा।
                        2006 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।'
                            : 'The selection of the candidate shall be made among the Scientific/Technical personnel of the
                                                    Institute who have excelled in providing external budgetary resource to the Institute by
                                                    bringing
                                                    Sponsored projects tenable at the Institute, Consultancy services, Contract research and
                                                    Contract
                                                    training in the Institute during the two years preceding the year of award.
                                                    The Award shall carry a Medal and a Citation.
                                                    The award shall be made every alternate year, starting from 2006.' }}
                        </p>

                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'प्रभावी प्रशासनिक स्टाफ मेडल' : 'Efficient Administrative Staff Medal' }}
                        </h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? "उम्मीदवार का चयन ग्रुप बी और सी के प्रशासनिक और अन्य स्टाफ से किया जाएगा, जो कि उसकी सेवाओं का पूरी मुस्तैदी और दक्षता के साथ निर्वहन करके प्रशासनिक और वैज्ञानिक लक्ष्यों को प्राप्त करने पर प्राप्त मतों के आधार पर किया जाएगा। वैज्ञानिक, तकनीकी और प्रशासनिक और अन्य कर्मचारी (ग्रुप डी को छोड़कर) पुरस्कार के वर्ष से पहले दो वर्षों के दौरान प्रदान की गई सेवाओं के लिए उम्मीदवार के चयन के लिए मतदान करेंगे।
                        पुरस्कार एक पदक और एक प्रशस्ति पत्र ले जाएगा।
                        2006 से शुरू होने वाला यह पुरस्कार हर वैकल्पिक वर्ष में बनाया जाएगा।
                        छह साल में दो बार पुरस्कार पाने वाले स्टाफ सदस्य को रु 5000 / का नकद पुरस्कार भी दिया जाएगा।"
                            : "The selection of candidate shall be made from the Administrative and Others Staff of Group B and
                                                    C
                                                    based upon the votes received in achieving administrative and scientific goals by discharging
                                                    his/her
                                                    services with utmost promptness and efficiency. The Scientific, Technical and Administrative and
                                                    Others staff (excluding Group D) shall vote for selection of the candidate for services rendered
                                                    during the two years preceding the year of award.
                                                    The Award shall carry a Medal and a Citation.
                                                    The award shall be made every alternate year, starting from 2006.
                                                    A staff member who gets the award twice in six years shall also be given cash award of Rs.
                                                    5000/-" }}
                        </p>

                    </div>
                    <div>
                        <h3>{{ $language === 'hi' ? 'BSIP कर्मचारी पदक (दो)' : 'BSIP Employee Medals (Two)' }}</h3>
                        <div class="divider"></div>

                        <p>{{ $language === 'hi'
                            ? "उम्मीदवारों का चयन समूह I और II के तकनीकी कर्मचारियों और प्रशासनिक और अन्य लोगों के समूह डी के कर्मचारियों से किया जाएगा, जिन्होंने लगन और कुशलता से काम किया है और अपने कर्तव्यों के निर्वहन में अतिरिक्त प्रयास किए हैं। पुरस्कार के वर्ष से पहले के दो वर्षों के दौरान कर्मचारी द्वारा प्रदान की गई सेवाओं के लिए परियोजना समन्वयक / अनुभागीय / यूनिट प्रमुखों से नामांकन आमंत्रित किए जाएंगे।
                        प्रत्येक पुरस्कार एक पदक और एक प्रशस्ति पत्र ले जाएगा। यह पुरस्कार रुपये 1000 / - प्रत्येक का नकद पुरस्कार भी प्रदान करेगा।
                        यह पुरस्कार हर साल दिया जाएगा, जो 2006 से शुरू होगा।
                        उपर्युक्त पदक का समावेश शासी निकाय के अनुमोदन की तिथि से प्रभावी होगा, अर्थात् सितंबर 09,2005।"
                            : "The selection of the candidates shall be made each from the Technical staff of Group I and II and
                                                    Group D staff of Administrative and Others who have worked diligently and efficiently and have
                                                    shown
                                                    extra efforts in discharging their duties. The nominations shall be invited from the Project
                                                    Coordinators/Sectional/Unit Heads for services rendered by the employee during the two years
                                                    preceding
                                                    the year of award.
                                                    Each Award shall carry a Medal and a Citation. The Award shall also carry cash prize of Rs.
                                                    1000/-
                                                    each.
                                                    The award shall be given every year, starting from 2006.
                                                    The inclusion of above Medals shall be effective from the date of approval of the Governing Body
                                                    i.e.
                                                    September 09,2005." }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
