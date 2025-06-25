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
                    <a href="/" aria-label="मुख्य पृष्ठ पर जाएं">{{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" aria-label="{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}">{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $language === 'hi' ? 'युवाओं का वृत्तांत' : 'Incident of Youth' }}
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
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'युवाओं का वृत्तांत' : 'Incident of Youth' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="{{ $language === 'hi' ? 'बीरबल साहनी' : 'Prof. Birbal Sahni' }}" title="Prof. Birbal Sahni Image"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text" style="text-align: justify;">एक घटना थी जो दर्शाती है कि अपरिपक्व बीरबल ने साहसिक कार्य में अपरिचित व अभिरूचि हेतु जिज्ञासा कैसे
                            प्राप्त की। 1905 में ग्रीष्म ऋतु में पूरा परिवार मुर्री चला गया। एक सुहावनी सुबह को उसने कुछ रूमाल व
                            एक या दो कनस्तरों को एकत्रित किया तथा अपनी बड़ी बहन व भाई से साथ चलने को कहा। छोटे ने किया वे
                            पूर्णरूपेण समझ गए कि वह किसकी तैयारी में था। वे आत्मा की जाने बगैर घर से शांतिपूर्वक निकले तथा कस्बे
                            के उत्तर में एक खड्ड में उतर गए, उतरते और उतरते चले गए जब तक कि वे धारा तक न पहुंच गए। नीचे जाने की
                            यात्रा बहुत कठिन नहीं प्रतीत हो रही थी यद्यपि ऐसे बहुत से अवसर आए जब बीरबल ने उनकी खाइयों और शिलाखंडों
                            में मदद की। पीछा करने के आवेश में, जब भूख के कष्ट ने कार्य को असहनीय बनाने के अलावा समय का पता न चला
                            जब उन्होंने वापसी यात्रा शुरू की तब तक रात होने वाली थी।</p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text">
                            चढ़ा अधिकाधिक कठिन होते चला गया तथा बीरबल को
                            शिलाखंडों के ऊपर से सबसे पहले सामना करना था तथा बाद में अन्य को जो पश्च दर्शन में आज पर्वत जैसे दिखते
                            हैं।
                            रात हो गई तथा पूरा परिवाल खलबली की हालत में था। युवा अन्वेषकों की तलाश करने को नौकरों को लालटेन के साथ
                            भेजा जा चुका था थोड़ी जानकारी थी उन्हें कहाॅं ढूंढें किसी को चूंकि क्षणिक विश्वास न था कि वे कस्बे से
                            बाहर गए हैं। वे थके हुए भूखे एवं खून बहाते परौं से देर रात घर पहुंचे, इसके अलावा, कम कहना अच्छा बोलना
                            है, ग्रहण करने में सर्वोत्तम प्रत्याशा सहित हमारे गालों से अनियंत्रित अश्रु धाराएं बहरही थीं, परंतु
                            युवा बीरबल बिल्कुल शांत थे, तथा जब पिता ने उनसे पूछा कि बिना अनुमति के घर से जाना और अपने संग बच्चों
                            को भी ले जाने का क्या मतलब था, उन्होंने सिर्फ उत्तर दिया वह केकडों को संगृहीत करना चाहते थे। इस
                            असाधारण कारण ने क़रीब-क़रीब घटना को मोहित कर दिया यद्यपि अंततोगत्वा इसने उनका बचाव भी सिद्ध कर दिया।
                            ‘‘केकडे, वास्तव में!’’ पिता का पहला दृश्यांश था इसके साथ उन्होंने कदम आगे बढ़ाया। कुछ पल के लिए सबने
                            सोचा कि सब कुछ ख़तम हो गया तथा उन्हें संभावना की विलक्षण अनुभूति के साथ उत्कंठा को समर्थन मिला। किंतु
                            ऐसे साहसिक कार्य के प्रति उनका लगाव तथा नई चीजों के बाद खोज जो कि उन्होंने खुद ही जांची थीं और ज़्यादा
                            कुछ नहीं कहा। बीरबल ने अपने पिता को और ज़्यादा दुर्गम व ख़तरनाक अभियानों में संग लिया। थोडे़-से उपकरण,
                            और पादुका हेतु रस्सी निर्मित चप्पलें तथा स्थानीय मार्गदर्शक के साथ ज़ोजिला दर्रे से ज़्यादा दूरी नहीं
                            मचोई हिमनद को पार करना इन सभी में अति उल्लेखनीय और उज्जवल था। यहां यही था ये नीचे देखना, उन्होंने गहरी
                            खाई घाटी में ऊध्र्वाधर, जमा हुआ और इसकी बर्फीली क़ब्र में परिरक्षित एक घोडे़ को देखा। जैसे ही वह
                            अंधेरे, विस्मय प्रेरक दरार में झांकने को झुके इसने रोंगटे खड़े कर दिए और पूर्व चेतावनी, अतत्पर क्योंकि
                            वह ऐसे साहसिक कार्य हेतु थे। यह था कि बीरबल ने इंग्लैंड प्रस्थान से ठीक पहले ग्रीष्मकाल के दौरान लाल
                            बर्फ (दुर्लभ बर्फ कवक) खोजी और संगृहीत की। संजोए गए अंश को प्रो. सीवर्ड ने परीक्षित किया तथा
                            वनस्पतिविज्ञान विभाग, कैंब्रिज में अभी भी परिरक्षित है। कैंब्रिज में युवा वनस्पतिविज्ञानी हेतु यह
                            अच्छा परिचय था। भारत में विगत काफी समय से ऐसा कवक नहीं मिला है। साहसिक कार्य के जोश के अलावा उनमें
                            अपने अरिपक्व दिनों में शैतानी का प्रचुर अनुपात था। एक बार परिवाल शिमला में ब्रह्मो समाज से लगे हुए सदम
                            में रूका जिसे उन्होंने अन्य परिवार के साथ साझी किया। उनके निवास और समाज के भवन के बीच एक भू-खंड था
                            जिसमें हमने संयुक्त रूप से शाक-सब्जी वाटिका उगाई। किसी तरह छुट्टियां कम कर दी गईं और कुटुंब को शिमला
                            के शीत शिखर को और बलबत्ता इसके संग खीरे व अध-पके मक्का-भुट्टों को भी छोड़कर जाना था।
                            यह बड़ा धक्का था तथा बीरबल ने समस्त खाद्य फलों को उखाड़ने की योजना बनाई। जैसेकि ये काफी नहीं था,
                            प्रस्थान पूर्व की रात्रि में कैंची के पड़े युग्मों से तने के नीचे से पौधों की जड़ों को अपने नेतृत्व में
                            उसने काट दिया। परिवार के प्रस्थान के उपरांत, पौधे प्राकृतिक रूप से शनै शनै स्थिर रूप से, रहस्यात्मक
                            रूप से मुरझााने शुरू हो गए। उसके पहले के पड़ोसियों ने सोचा कि क्या यह गिरने की बीमारी थी? उन्होंने
                            पौधों में खूब पानी लगाया उन्होंने जितना ज़्यादा पानी लगाया उतनी ही तेजी से वे मुरझाते गए। परंतु
                            पड़ोसियों को इसका राज पता नहीं चला। जब तक कि वे लहौर वापस नहीं पहुॅंच गए! तथा इसे वे बाखूबी अभी भी याद
                            करते हैं।</p>
                        <p class="normal-text">कुछ सालों बाद शैतानी के प्रति झुकाव खुशी में तब्दील हो गया। उनका प्रिय खिलौना
                            बंदर को बहुत से लोग याद रखेंगे जो उनके साथ बहुत से महाद्वीपों पर गया तथा जिससे वह बच्चों का मनोरंजन
                            कराया करते थे। यह वानर म्युनिख में फुटपाथ विक्रेता से खरीदा गया था। बीरबल ने कुछ बच्चों को ऐसे ही वानर
                            से खेलते हुए देखा था तथा वह इससे बहुत मनोरंजित हुए थे। तमाम दुकानों पर खोजने के बाद वह उसी नकल का
                            खरीदने में कामयाब हुए और प्रायः बगीचे में जाते थे जहाॅं छोटे बच्चों के खेल को पहले उन्होंने देखा था।
                        </p>
                        <p class="normal-text">बल्कि बीरबल संवेदनशील प्रकृति के थे। उन्होंने शुरूआती दिनों से बड़ा लगाव था जिसकी
                            व्याख्या उनके कालेज कैरियर की घटना से की जा सकती है। जब इंटरमीडिएट परीक्षा के परिणाम, जिसमें उनके
                            निकटतम एवं अविभाज्य मित्र ने परीक्षा दी थी, घोषित हुए थे। दुर्भाग्य के अकथनीय आघात से उनकी कक्षा का
                            सहपाठी असफल घोषित किया गया था। इसने घर में तूफान ही नहीं मचाया बल्कि करीब करीब त्रासदी का दौर था
                            क्योंकि बीरबल दो दिनों तक बालक की भांति रोते रहे और खाना खाने से इन्कार कर दिया। काफी दिनों तक उनकी
                            चाल में चिंता झलकती रही और यह अति शनै-शनै हुआ कि उन्होंने इस विचार से स्वयं को स्वीकार किया कि कालेज
                            में उनका मित्र एक साल पीछे छूट गया है।</p>
                        <p class="normal-text">निष्पक्षता और निष्पक्ष व्यवहार उनकी अति उतकृष्ट अभिलाषा थी। लाहौर में (इंग्लैंड
                            में इस समय सबसे बडे़) आंशिक रूप से बड़े भाई होने के नाते तथा आंशिक रूप से स्नेही मिज़ाज़ की वजह से कुटुंब
                            में छोटे भाइयों व बहनों से उन्हें तटस्थ पंच के रूप में पहचाना। चाहे वह पेन्सिल या पुस्तक के स्वामित्व
                            के बारे में झगड़ा हो या सर्दी की रातों में सबसे बाद में घर की बत्ती बुझाने की बात हो, हम सब उनके निर्णय
                            को देखते थे तथा ज्यादा महत्वपूर्ण क्या है कि सभी लोग इसका अनुपालन करते थे।</p>
                        <br>
                        <h2>बृहत वैज्ञानिक दिलचस्पी</h2>
                        <div class="divider"></div>
                        <div class="col-md-12">
                            <p class="normal-text">
                                बीरबल की दिलचस्पियाॅं अति बृहत थीं तथा रोहतक में 1936 में नए नए सिक्के ढालने की खोज इसका परिचय देती
                                हैं। भू-वैज्ञानिक हथौड़े से पुरावनस्पतिविज्ञान की यह पुरातात्विक खोज मानव की मार्मिकता एवं बहुमुखी
                                प्रतिभा द््योतित करती है। यह उनकी प्रतिभा को सम्मान है कि उन्होंने न केवल अनूठी खोज की अपितु इन नएन्नए
                                सिक्कों को ढालने के अध्ययन में अपना दिल और आत्मा लगा दी। मुद्राविज्ञानविद् के अनुरूप विषय में अनुसंधान
                                का नूतन मानक व्यवस्थित करते हुए उन्होंने 1945 में न्युमिस्मेटिक सोसाइटी के जर्नल में अपने निष्कर्षों
                                को अद्वितीय पुस्तिका में प्रकाशित किया। इसके प्रयोजनार्थ उन्होंने कुछ भारतीय नए सिक्के ढालने के
                                साथ-ही-साथ चीन के भी अध्ययन में स्वयं को व्यवस्थित किया। उन्होंने समस्त भू-वैज्ञानिक समस्याओं में अति
                                रूचि ली जो कि उनके पुरावनस्पतिक कार्य में सीधे समाहित न थीं। किंतु यह कहना चाहिए कि यदि किसी ने उन्हें
                                गहराई से कुरेदा है क्रोड में सदैव एक वनस्पतिविज्ञानी को पाया है।</p>
                            <p class="normal-text">अपने वैज्ञानिक रूचियों के अलावा, उनका संगीत के प्रति भी बहुत लगाव था और वह सितार
                                एवं सारंगी बजाते थे। उन्हें चित्रकला एवं मिट्टी माॅडलिंग में रूचि थी तथा जब उन्हें दूसरे कार्यों से
                                फुर्सत मिलती थी इन चित्रकलाओं में और जानकारी के लिए आट्र्स स्कूल, लखनऊ जाकर सुअवसरों का सदुपयोग किया।
                                स्वतंत्र दृष्टिकोण बीरबल का जीवन के प्रति मनोभाव दूसरा पहलू था जो मस्तिष्क में प्रबलता से आता है, जो
                                विज्ञान के प्रति स्वतंत्र दृष्टिकोण एवं अनुराग दर्शाता है जिसके प्रति उनकी जिंदगी भर तथा जिसमें वह
                                स्वयं का एवं राष्ट्र का नाम बाद में करने में श्रद्धा रखते रहे। पिता उन अनुशासकों में से एक थे जिनमें
                                एक मात्र सुझाव प्रायः निपटारे हेतु पर्याप्त रहता था जहाॅं से निर्णय स्थापित होता था।</p>
                        </div>
                    </div>

                    @else
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="{{ $language === 'hi' ? 'बीरबल साहनी' : 'Prof. Birbal Sahni' }}" title="Prof. Birbal Sahni Image"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <h3>Early Quest for Science and Adventure</h3>
                        <p class="normal-text " style="text-align: justify;">
                            There was one incident which shows how early Birbal acquired his curiosity for the unknown and love of
                            adventure. In 1905 the entire family moved to Murree for the summer. One fine morning he collected a
                            few handkerchiefs and one or two small empty tins and asked his elder sister and brother to accompany
                            him. Little did they realize what they were in for. They left home quietly, without a soul knowing,
                            and descended into the ravine on the north side of the town. They descended further and further till
                            they reached the stream. The downward journey did not seem too difficult though occasions were
                            numerous when Birbal had to help them across ditches and boulders. In the excitement of the chase all
                            count of time was lost, except when the pangs of hunger made things unbearable. And when they started
                            on the return journey, it was already nearing dark.</p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text">
                            It became more and more difficult to climb and Birbal was faced with the task of first helping one and
                            then the other over the huge boulders which even today appear as mountains in retrospect. Night had
                            already fallen and meanwhile the entire household was in a state of turmoil. The servants had been
                            sent out with lanterns to look for the young explorers, little knowing where to find them, since no
                            one imagined for a moment that they could have gone beyond the environs of the town. They reached home
                            late at night tired, hungry and with bleeding feet, not to speak of the unrestrained stream of tears
                            rolling down our cheeks, with the best prospect of receiving, in addition, a good talking to, to say
                            the least. But young Birbal was quite composed, and when father asked him what he meant by leaving
                            home without permission and taking the youngsters, too, with him, he merely answered that he wanted to
                            collect crabs. This unusual reason almost spelt tragedy though ultimately it also proved their saving.
                            “Crabs, indeed!" was father's first outburst and with it he took a step forward. For a moment
                            everybody thought all was over and their backs began to itch with a queer feeling of expectancy! But
                            such was his own love of adventure and for search after things new, that he immediately checked
                            himself and said nothing more. Birbal accompanied his father on many excursions much more difficult
                            and dangerous. The most notable and exciting of these was crossing of the Machoi glacier not far from
                            the Zoji la Pass in 1911, with little more equipment than rope-made chappals for footwear and a local
                            guide. It was here that looking down, he saw in a gaping chasm a horse standing upright, frozen and
                            preserved in its icy grave. As he bent down to peep into the dark, awe-inspiring fissure, it gave him
                            a shudder and a premonition of consequences, unprepared as he was for such an adventure. It was here
                            that Birbal found and collected red snow (a rare snow alga) during the summer of 1911, just before his
                            departure for England. A part of the sample collected was examined by Prof. Seward and is perhaps
                            still preserved at the Botany School, Cambridge. This was a good introduction for the young botanist
                            at Cambridge, for this alga had not been found for a long time past in India.</p>
                        <p class="normal-text">Besides his spirit of adventure he had in him a liberal measure of mischief in
                            his early days. Once family stayed at Simla in the house which adjoins the Brahmo Samaj and which they
                            shared with another family. In the small plot that lay between their residence and the Samaj building
                            we had jointly reared vegetable garden. Somehow holiday was cut short, and family had to leave the
                            cool heights of Simla - and of course with it the cucumbers and the half-ripened maize cobs as well.
                            This was too much of a blow, and Birbal conceived the plan to remove all the edible fruit. As if that
                            were not enough, the night prior to our departure, he cut off, under his leadership, the roots of the
                            plants just below the stems with a large pair of scissors. After family left, the plants naturally
                            began to wither slowly, steadily, mysteriously. Was it a fell disease, his erstwhile neighbors
                            thought? They had watered the plants hard enough. Indeed the more they had been watered, the faster
                            they had withered. But neighbors never knew of the secret till they returned to Lahore! and well
                            remember it even now.</p>
                        <p class="normal-text">In later years the bent for mischief took turn for playfulness. Many will
                            remember his favorite toy monkey which toured with him over many continents and with which he often
                            used to amuse children. This monkey was bought in Munich from a pavement vendor. Birbal had seen some
                            children playing with a similar monkey and was himself much amused at it. After ransacking many shops
                            he was able to purchase an exact replica and often went to the garden where he had erstwhile seen the
                            children at play to 'perform' during the lunch interval to the great pleasure of the little ones.</p>
                        <p class="normal-text">Birbal was of a rather sensitive nature. He formed deep attachments from his
                            early days, which may be illustrated by an incident during his college career. when the results of the
                            Intermediate examination, at which one of his close and inseparable friends had appeared, were
                            announced. By an inexplicable stroke of misfortune his class fellow was declared unsuccessful. This
                            created not only storm in the house, but almost spelt tragedy, because for at least two days Birbal
                            wept like a child and refused to eat. For a number of days his movements caused anxiety, and it was
                            only very gradually that he reconciled himself to the idea that a friend of his was left one year
                            behind him at college.</p>
                        <p class="normal-text">Most outstanding was his desire for equity and fair-play. Partly by virtue of
                            being the eldest brother at Lahore (the eldest was then in England) and partly because of his
                            affectionate temperament, the younger brothers and sisters recognized him as an impartial arbitrator
                            in the family. Whether it was a dispute about the ownership of a pencil or a book, or as to who should
                            last switch off the light in the cold winter nights, we all looked to him for a decision, and what is
                            more important, everybody abided by it.</p>
                        <br>
                        <h3>Early Quest for Science and Adventure</h3>
                        <div class="divider"></div>
                        <div class="col-md-12">
                            <p class="normal-text">
                                Birbal's interests were wide and his discovery of the coin moulds at Rohtak in March 1936 bears
                                witness. This archaeological discovery by a palaeobotanist, with the stroke of a geologist's hammer,
                                symbolizes the vitality and versatility of the man. It is a tribute to his genius that not only did he
                                make this unique discovery, but also threw himself heart and soul into the study of these coin moulds.
                                He published his results in a masterly monograph in the journal of the Numismatic Society in 1945,
                                setting, according to a numismatist, a new standard of research in the subject. For this purpose he
                                set himself to the study of some of the Indian coin moulds as well as those from China. He took keen
                                interest in all geological problems, even those that had no direct bearing upon his palaeobotanical
                                work. But it must be said that, if one scratched him deep enough, one always found a botanist in the
                                core.</p>
                            <p class="normal-text">Apart from his scientific interests, he was much inclined towards music and he
                                could play on the sitar and the violin. He was also interested in drawing and clay-modeling and he
                                utilized opportunities, whenever he was free from his other work, to visit the Arts School, Luc know,
                                for further acquaintance with these arts.</p>
                        </div>
                        <br>
                        <h3>Independent Outlook</h3>
                        <div class="divider"></div>
                        <div class="col-md-12">
                            <p class="normal-text">
                                There was another aspect of Birbal's attitude towards life which comes forcibly to mind and which
                                shows his independent outlook and his love for the science to which he remained devoted throughout
                                life, and in which he was subsequently to make a name for himself and for his country. Father was one
                                of those disciplinarians from whom a mere suggestion was usually enough to settle where the decision
                                lay. He and his friends had sometimes discussed what career the sons were to follow. In the summer of
                                1911 came Birbal's turn to proceed to England for higher studies. Birbal was asked to prepare for his
                                departure. There could not be much argument about it, but I distinctly remember Birbal's answer: that
                                if it was an order, he would go, but that if his own inclinations in the matter were to be considered,
                                he would take up a research career in Botany, and nothing else. Though this astonished father for a
                                while, yet he consented, for in spite of his strong disciplinarian attitude, he gave perfect freedom
                                of choice in essential matters. Thus it was that Birbal took up a career as a botanist. In this case,
                                perhaps, father's acquiescence was not so difficult, as he had been himself always keen on research
                                and, indeed, after years of service as a professor of chemistry, he went to Manchester where he
                                carried out investigations on radioactivity with Prof. Ernest Rutherford, results of which were
                                subsequently published. Indeed, Birbal helped him there in photographic and other incidental work
                                during the vacations, though he had himself to take the Natural Science Tripos, Part II, in the same
                                year. It scarcely needs repetition that father's example gave the incentive and inspiration for
                                research to all those around him, and not only that; he inculcated a spirit of fearless, shedding the
                                lustre of freedom around himself which played its own part in the independence movement.</p>
                            <p class="normal-text">Although Birbal gained many academic distinctions but he did not plan to seek
                                them. He invariably had an independent outlook where such matters were concerned, irrespective of
                                consequences. Once during his B.Sc. examination of the Punjab University sitting down the Botany
                                examination he found that question paper set was an exact, or almost exact, replica of the paper set
                                at a previous examination. He thought that such a question paper might give undue advantage to some
                                and an undue handicap others, and that, in any case, it could not be a fair test of knowledge. He got
                                up, handing the (blank) answer sheets to the invigilator against all persuasion, walked out of the
                                hall in protest. When came home within less than half an hour of the commencement of the examination
                                and met father at the doorstep, it was a worthy sight! The surprised parent could not decide whether
                                to show anger or laugh at situation, such as even he as a professor of long standing had never been
                                faced with – a situation comic enough, but, nevertheless, potentially fraught with serious
                                consequences for the University was in no way bound to set a fresh paper to please the impetuosity of
                                a young student. The matter went to the University Syndicate. Birbal one the day, for it was decided
                                that no examiner could be so easy going or disinterested as to pick up an earlier paper and inflict it
                                upon the students, almost to to. A fresh paper was set for him. This shows how well he held the
                                courage of convictions, where even an older man might have been afraid to lose a year so
                                unnecessarily, being well able to answer the questions set.</p>
                        </div>
                    </div>

                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection
