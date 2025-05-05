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
                    {{ $language === 'hi' ? 'जीवाश्म' : 'Fossil' }}
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
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'जीवाश्म' : 'Fossil' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')

                    <div class="col-md-12">
                        <h5>प्रोफेसर साहनी का पैलियोबोटैनिकल कार्य (टी.जी. हाले द्वारा, पैलियोबोटैनिस्ट 1:23-41)</h5>
                        <div class="divider"></div>
                        <p class="normal-text">
                            जीवाश्म पौधों पर बीरबल साहनी के काम पर एक सरसरी नज़र डालने से ही इसकी असाधारण व्यापकता और विविधता का
                            स्पष्ट आभास मिलता है। वास्तव में, उनके शोधों ने पैलियोबॉटनी के लगभग पूरे क्षेत्र को कवर किया। उन्होंने
                            न केवल संवहनी पौधों के सभी प्रमुख समूहों और लगभग सभी पौधों वाले भूवैज्ञानिक प्रणालियों से अपने शोध के
                            लिए ठोस वस्तुओं का चयन किया; बल्कि इस विविध सामग्री से निपटने में, और अपने अधिक सामान्य विचार-विमर्श
                            में, उन्होंने हर संभव कोण से संबंधित समस्याओं पर विचार किया। इस प्रकार जीवाश्म पौधों पर उनके काम के
                            परिणामस्वरूप वनस्पति विज्ञान की सभी प्रासंगिक शाखाओं के साथ-साथ स्ट्रेटीग्राफी, पैलियोजियोग्राफी और
                            भूवैज्ञानिक अनुसंधान की अन्य संबंधित शाखाओं में योगदान मिला। किसी को भी यह आभास होता है कि वे काफी
                            परिचित ज़मीन पर महसूस करते थे, चाहे वे जटिल शारीरिक संरचनाओं का अध्ययन कर रहे हों, टैक्सोनोमिक संबंधों
                            का विश्लेषण कर रहे हों, जीवाश्म वनस्पतियों का वर्णन कर रहे हों, या जलवायु परिवर्तन या महाद्वीपों के
                            विस्थापन की समस्याओं पर उनके असर पर चर्चा कर रहे हों। साहनी के काम की व्यापक प्रकृति के कारण वनस्पति
                            विज्ञानियों के लिए स्पष्ट नहीं हो सकते हैं जो जीवाश्म पौधों के अध्ययन से अपर्याप्त रूप से परिचित हैं
                            और इसलिए, विश्लेषण का प्रयास करना उचित हो सकता है।</p>
                        <p class="normal-text">जीवाश्म वनस्पति विज्ञान में यह देखना बिल्कुल भी असामान्य नहीं है कि एक लेखक के
                            प्रकाशन कई ऐसे मामलों से निपटते हैं जो अतीत के पौधों से संबंधित होने के अलावा बहुत कम संबंधित हैं।
                            पैलियोबोटैनिस्ट शायद ही कभी अपने विषयों को केवल कुछ समस्याओं में जुड़े हुए जांच को आगे बढ़ाने के
                            उद्देश्य से चुनने के लिए स्वतंत्र होता है। एक नियम के रूप में वह अपने निपटान में सामग्री पर निर्भर
                            होता है; वास्तव में, जीवाश्म पौधों पर अधिकांश काम इस या उस संग्रह तक पहुंच के कारण हुआ है। जीवाश्म
                            पौधे दुर्लभ हैं, सामग्री कीमती है और इसकी जांच अक्सर एक कर्तव्य प्रतीत होती है। यह वास्तव में
                            पैलियोबॉटनी के इतिहास की एक विशेषता है कि यहां तक ​​​​कि सबसे महत्वपूर्ण प्रगति अक्सर आकस्मिक रूप से
                            खोजी गई या प्राप्त सामग्री का अध्ययन और वर्णन करके की गई है। उदाहरण के लिए, किडस्टन और लैंग ने सामान्य
                            आकारिकी की समस्याओं की जांच करने का लक्ष्य नहीं रखा। उनका प्राथमिक कार्य राइनी के डेवोनियन से
                            पेट्रीफाइड प्लांट-अवशेषों की संरचनाओं की जांच, विश्लेषण और वर्णन करना था; लेकिन फिर भी, उनके काम ने
                            संवहनी पौधों की आकृति विज्ञान से जुड़ी कुछ बुनियादी समस्याओं की हमारी अवधारणा को गहराई से प्रभावित
                            किया। इसमें कोई संदेह नहीं है कि सामग्री के दावों का साहनी के मामले में अक्सर एक विशेष महत्व था। उनका
                            देश जीवाश्म पौधों से समृद्ध है, और महत्वपूर्ण अवर्णित संग्रहों के साथ-साथ अपूर्ण रूप से खोजे गए
                            पौधे-असर वाले भंडार उनके ध्यान की प्रतीक्षा कर रहे थे, जब उन्होंने पहली बार अकेले ही इस विशाल क्षेत्र
                            में काम करना शुरू किया। इसमें कोई संदेह नहीं है कि वे अक्सर न केवल वनस्पति विज्ञान के प्रति बल्कि
                            भारतीय भूविज्ञान की जरूरतों के प्रति भी कर्तव्य की भावना से प्रेरित थे।</p>
                        <p class="normal-text">साथ ही साहनी के शोध मुख्यतः कुछ निश्चित संबद्ध अध्ययन की पंक्तियों के साथ खुद को
                            समूहबद्ध करते हैं, जिन्हें उन्होंने स्पष्ट रूप से अन्य की तुलना में प्राथमिकता दी क्योंकि उनका संबंध
                            सामान्य महत्व के प्रश्नों से था। उनके काम का एक बहुत बड़ा हिस्सा उन समस्याओं के विश्लेषण और सर्वेक्षण
                            से भी संबंधित था जिनका अध्ययन ठोस सामग्री के प्रत्यक्ष संदर्भ के बिना किया जा सकता था। कुल मिलाकर यह
                            प्रतीत होता है कि उनके शोध की विविधता काफी हद तक उनकी रुचियों की विस्तृत श्रृंखला, उनके व्यापक ज्ञान
                            और बौद्धिक बहुमुखी प्रतिभा की अभिव्यक्ति थी। उनके बहुमुखी वैज्ञानिक व्यक्तित्व की कुछ विशिष्ट
                            विशेषताएं एक शोधकर्ता के रूप में उनके करियर के उल्लेखनीय शुरुआती चरण में ही स्पष्ट हो गईं।</p>
                        <p class="normal-text">इसमें कोई संदेह नहीं है कि साहनी पहली बार पैलियोबॉटनी की ओर अपने कैम्ब्रिज शिक्षक
                            स्वर्गीय प्रोफेसर सर ए.सी. सीवार्ड के प्रभाव से आकर्षित हुए थे। 1914 में स्नातक होने के बाद, उन्होंने
                            वनस्पति विज्ञान स्कूल में शोध शुरू किया, जहाँ सीवार्ड के नेतृत्व में, जीवित और विलुप्त पौधों के अध्ययन
                            को उस समय की तुलना में कहीं और एक साथ जोड़ा गया। सबसे पहले साहनी हाल के पौधों, मुख्य रूप से
                            टेरिडोफाइट्स और कोनिफ़र की रूपात्मक और शारीरिक जांच में लगे रहे। जल्द ही उन्होंने जीवित पौधों के
                            अध्ययन को जारी रखते हुए पैलियोबॉटनी का काम भी शुरू कर दिया। कैम्ब्रिज में अपने शेष प्रवास के दौरान,
                            1919 में भारत लौटने तक, उन्होंने अपना समय अनुसंधान की इन शाखाओं के बीच विभाजित किया, और दोनों में
                            आश्चर्यजनक रूप से उत्कृष्ट कार्य किया।</p>
                        <h5 class="mt-4">पैलियोज़ोइक फ़र्न की शारीरिक रचना और आकृति विज्ञान</h5>
                        <div class="divider"></div>
                        <p class="normal-text">
                            पैलियोज़ोइक फ़र्न जैसे पौधों पर साहनी का काम मुख्य रूप से कोएनोप्टेरिडिनेई और विशेष रूप से
                            ज़ाइगोप्टेरिडेसी परिवार पर केंद्रित था। चूँकि इस पूरी तरह से विलुप्त समूह के बारे में जानकारी वनस्पति
                            विज्ञानियों के बीच बहुत आम नहीं है, इसलिए साहनी के काम के दायरे और महत्व को समझना आसान बनाने के लिए
                            कुछ सामान्य टिप्पणियाँ करना उचित होगा।
                            कोएनोप्टेरिडीनी विभिन्न मामलों में असाधारण रुचि के हैं। साथ ही वे शोध के विषय के रूप में असामान्य
                            कठिनाइयाँ प्रस्तुत करते हैं। सामग्री ज्यादातर पत्थर जैसी है, और संरचना अक्सर खूबसूरती से संरक्षित है;
                            लेकिन यह बहुत खंडित भी है और पौधों की आदत के बारे में बहुत कम जानकारी देती है। कुछ मामलों में केवल तना
                            ही ज्ञात है, अधिक बार केवल पत्ती के डंठल और पत्तियों के रेकिस; लेमिना और स्पोरैंगिया शायद ही कभी
                            संरक्षित होते हैं। विभिन्न भागों के बीच संबंध, एक नियम के रूप में, तुलनात्मक अध्ययनों के माध्यम से
                            स्थापित किया जाना चाहिए। केवल बहुत कम ही वास्तव में अलग-अलग टुकड़ों को एक साथ जोड़कर अधिक प्रत्यक्ष
                            प्रमाण प्राप्त करना संभव हो पाया है, एक ऐसा काम जिसमें साहनी ने अग्रणी भूमिका निभाई थी। कुल मिलाकर,
                            कोएनोप्टेरिडीनी शायद ही पैलियोबॉटनी में पहले अध्ययन के लिए एक आकर्षक विषय प्रतीत होता है। हालाँकि,
                            साहनी इस कार्य के लिए अच्छी तरह से तैयार थे, क्योंकि उन्होंने सीवार्ड (1915ए, 1916, 1917) के तहत
                            स्नातकोत्तर छात्र के रूप में जीवित फर्न की शारीरिक रचना पर काफी शोध किया था।</p>
                        <p class="normal-text">इस समय कोएनोप्टेरिडीनी को हाल ही में कई प्रमुख लेखकों द्वारा महत्वपूर्ण प्रकाशनों
                            में शामिल किया गया था: डी. एच. स्कॉट, ए. जी. टैन्सले, आर. किडस्टन और डी. टी. आर. ग्वेने-वॉघन, डब्ल्यू.
                            टी. गॉर्डन और विशेष रूप से पी. बर्ट्रेंड। तब और अब भी दिलचस्पी सबसे बड़े उपखंड, ज़ाइगोप्टेरिडेसी के
                            इर्द-गिर्द केंद्रित है। यह परिवार अत्यधिक मिश्रित पत्तियों की असाधारण शाखाओं के लिए उल्लेखनीय है:
                            अधिकांश प्रजातियों में प्राथमिक पिना चार पंक्तियों में स्थित हैं, दो दोनों तरफ, और वे हमेशा इस तरह से
                            उन्मुख होते हैं कि उनके तल मातृ रेकिस के तल से समकोण बनाते हैं। इस अजीबोगरीब प्रकार की समरूपता में, और
                            कुछ शारीरिक विशेषताओं में, ज़ाइगोप्टेरिडेसी के पत्ते सामान्य पत्तियों से बहुत अलग हैं; कम से कम उनके
                            समीपस्थ भागों में तो यह कहा जा सकता है कि वे तने और पत्ती दोनों के गुणों को मिलाते हैं। पी. बर्ट्रेंड
                            ने वास्तव में उनके डंठलों को एक विशेष प्रकार के अंग का प्रतिनिधित्व करने वाला माना था, जिसे उन्होंने
                            फाइलोफोरस नाम दिया था; हालाँकि, इस शब्द का उपयोग यहाँ नहीं किया जाएगा।</p>
                        <p class="normal-text">इन पौधों पर साहनी का पहला शोधपत्र (1918) ज़ाइगोप्टेरिडियन पत्ती की शाखाओं का एक
                            आलोचनात्मक अध्ययन था। चूँकि यह मुख्य रूप से वर्तमान विचारों की चर्चा से संबंधित था, इसलिए कोई यह
                            निष्कर्ष निकाल सकता है कि साहनी को सबसे पहले जीवित फ़र्न की शारीरिक रचना की जांच के संबंध में साहित्य
                            के अध्ययन द्वारा कोएनोप्टेरिडिनेई के विषय की ओर आकर्षित किया गया था। लेकिन उसी प्रकाशन में उन्होंने
                            ऑस्ट्रेलिया से एक ज़ाइगोट फ़र्न के नमूने का संक्षेप में उल्लेख किया, जिसके बारे में उन्होंने फरवरी
                            1917 में ही कैम्ब्रिज फिलॉसॉफिकल सोसाइटी के समक्ष एक प्रारंभिक विवरण दिया था। इस नमूने पर काम, जिसे
                            सीवार्ड ने सुझाया था, बाद में, अधिक सामग्री के जुड़ने के माध्यम से बढ़ा और संभवतः साहनी द्वारा
                            कोएनोप्टेरिडिनेई के अध्ययन को अपने शोध की मुख्य पंक्तियों में से एक के रूप में अपनाने का तत्काल कारण
                            था।
                        </p>
                        <p class="normal-text">ऑस्ट्रेलियाई ज़ाइगोप्टेरिडियन स्टेम की साहनी की निरंतर जांच के परिणामस्वरूप कई
                            प्रकाशन हुए (1919 ए, 1928 डी, 1930 ए, 1932 सी)। यह प्रजाति बहुत दिलचस्प साबित हुई। इसकी संरचनात्मक
                            विशेषताओं का अनोखा संयोजन विभिन्न जेनेरिक नामों में परिलक्षित होता है जो अलग-अलग समय पर इसके लिए लागू
                            किए गए हैं: ज़ाइगोप्टेरिस, एंकिरोप्टेरिस, क्लेप्सीड्रॉप्सिस, और अंत में ऑस्ट्रोक्लेप्सिस, साहनी द्वारा
                            स्थापित एक नया जीनस। श्रीमती ई. एम. ओसबोर्न ने पहले ही नोट कर लिया था कि यह पौधा स्टेल और पत्ती के
                            निशानों की संरचना में एंकिरोप्टेरिस जीनस से सहमत है, लेकिन पेटियोलर बंडल क्लेप्सीड्रॉप्सिस के प्रकार
                            के थे। इस बहुचर्चित जीनस की स्थापना 1856 में उंगर द्वारा अलग-अलग पेटियोल्स के लिए की गई थी, जिसमें
                            अनुप्रस्थ खंड में देखे गए संवहनी बंडल का कुछ हद तक घंटे के आकार का या डंबल जैसा रूप था।
                            क्लेप्सीड्रॉप्सिस पेटीओल्स का एनकीरोप्टेरिस प्रकार के स्टेल के साथ संयोजन बहुत ही आश्चर्यजनक लग रहा
                            था, क्योंकि अन्य एनकीरोप्टेरिस तने ऐसे पेटीओल्स धारण करने के लिए जाने जाते थे जिनमें बंडलों का
                            क्रॉस-सेक्शन अक्षर एच या डबल एंकर जैसा दिखता था - बाद की विशेषता ने जीनस को इसका नाम दिया। एक बड़ी
                            सामग्री की जांच करके और विभिन्न टुकड़ों को एक साथ फिट करके, साहनी स्टेम की शारीरिक रचना का अप्रत्याशित
                            रूप से पूरा विवरण देने में सक्षम थे और साथ ही असाधारण आदत को चित्रित करने में भी सक्षम थे। उन्होंने
                            पाया कि यह पौधा एक विशाल वृक्ष-फ़र्न था, जिसका तना लगभग एक अनोखे प्रकार का था: कई पतले, द्विभाजक अक्ष,
                            अपस्थानिक जड़ों और अपस्फीति के एक मोटे द्रव्यमान में अंतर्निहित थे और इस प्रकार एक साथ रखे गए थे, ताकि
                            एक झूठा तना बन सके", कुछ हद तक क्रेटेशियस जीनस टेम्प्सकिया की याद दिलाता है। जीवित पौधों के नामकरण के
                            नियमों के अनुरूप, साहनी ने एक समय (1919 ए, 1928 डी) इस प्रजाति का नाम क्लेप्सीड्रॉप्सिस ऑस्ट्रेलिस
                            रखा। हालाँकि, एक अन्य पेट्रीफाइड स्टेम के उनके बाद के अध्ययनों से पता चला कि इससे बेतुके परिणाम होंगे,
                            और इसलिए उन्होंने (1932 सी) ऑस्ट्रेलियाई पौधे के लिए नया सामान्य नाम ऑस्ट्रोक्लेप्सिस प्रस्तावित किया।
                            ऐसा करते हुए उन्होंने एक पैलियोबोटैनिकल नामकरण पद्धति को अपनाया जिसे बाद में अंतर्राष्ट्रीय वनस्पति
                            कांग्रेस के समक्ष स्वीकृति के लिए प्रस्तुत किया गया: कि एक "संयोजन जीनस" (प्राकृतिक जीनस) को एक नया
                            नाम दिया जा सकता है, हालांकि प्रकार की प्रजातियों के अलग-अलग हिस्सों को पुराने जेनेरिक नामों के तहत
                            वर्णित किया गया है, और ये - "अंग जीनस" या "फॉर्म जीनस" के अर्थ में - समान लक्षणों वाले अन्य अलग-अलग
                            पौधों के टुकड़ों के लिए उपयोग किए जाते हैं।
                            साहनी का बाद का काम ऑस्ट्रोक्लेप्सिस पर उनकी एक अन्य प्रजाति की जांच से काफी प्रभावित था, जिसे
                            उन्होंने एक नए जीनस, एस्टेरोक्लेनोप्सिस (1930 ए) के रूप में भी संदर्भित किया था। इस प्रजाति का एक
                            दिलचस्प इतिहास है। साइबेरिया से एक पेड़-फ़र्न के एक बढ़िया पेट्रीफाइड तने को बहुत पहले कई स्लैब में
                            काट दिया गया था, जिनमें से कुछ जर्मनी के विभिन्न संग्रहालयों में अपना रास्ता खोज चुके होंगे। जब साहनी
                            ने टुकड़ों की खोज शुरू की, तो वे अब एक साथ नहीं थे; उनमें से दो को अलग-अलग जेनेरा की प्रजातियों के रूप
                            में भी वर्णित किया गया था: एस्टेरोक्लेना और राकोप्टेरिस। इन दो टुकड़ों को फिर से खोजकर और एक साथ
                            जोड़कर साहनी यह साबित कर सके कि वे वास्तव में एक ही नमूने के हिस्से थे। तने के उनके पुनर्निर्माण ने,
                            तीन अन्य टुकड़ों को भी शामिल करते हुए, पात्रों के एक और दिलचस्प संयोजन को उजागर किया। डंठल
                            क्लेप्सीड्रॉप्सिस प्रकार के थे, लेकिन पत्ती-निशान अनुक्रम एस्टेरोक्लेना जैसा था, और पहले से अज्ञात
                            स्तम्भ एस्टेरोक्लेना और एंकिरोप्टेरिस के बीच कुछ मध्यवर्ती प्रकार का साबित हुआ।
                        </p>
                        <p class="normal-text">क्लेप्सीड्रॉप्सिस की प्रकृति और समानताएं, जिन्हें साहनी ने स्पष्ट करने के लिए
                            बहुत कुछ किया है, एक तुच्छ मामला लग सकता है। वास्तव में, कोएनोप्टेरिडिनेई की चर्चाओं में जीनस ने एक
                            महत्वपूर्ण भूमिका निभाई है। न केवल इसे एक परिवार के प्रकार के रूप में माना गया है, बल्कि इसकी व्याख्या
                            पूरे समूह के काफी हिस्से में वर्गीकरण के आधार को प्रभावित करती है। साहनी की जांच, जिसकी यहां विस्तार
                            से समीक्षा की गई है, जो अन्यथा अनावश्यक होती, इस प्रकार विभिन्न मामलों में व्यापक प्रभाव डालती है।
                            उनके निष्कर्षों में से एक, जो वर्तमान लेखक की राय में अपरिहार्य है, हालांकि पी. बर्ट्रेंड द्वारा
                            स्वीकार नहीं किया गया, यह था कि क्लेप्सीड्रॉप्सिस को एक वास्तविक वर्गीकरण इकाई के रूप में नहीं माना
                            जाना चाहिए, बल्कि इसे केवल एक निश्चित प्रकार की संरचना वाले पेटीओल्स और रेचिस के लिए एक फॉर्म जीनस के
                            रूप में माना जा सकता है, जो पौधों के विभिन्न समूहों में हो सकता है।
                            बर्ट्रेंड ने एक बार सुझाव दिया था, जिसे बाद में वापस ले लिया गया, कि उंगर के क्लेप्सीड्रॉप्सिस रेचिस
                            अजीबोगरीब जीनस क्लेडॉक्सिलॉन के तने से संबंधित हैं, जो थुरिंगिया के सालफेल्ड में निचले कार्बोनिफेरस
                            में उनके साथ जुड़े हुए हैं। साहन (1930 ए, 1932 सी) ने भी यही विचार रखा, और दोनों सहयोगियों ने वास्तव
                            में मैत्रीपूर्ण सहयोग में रेचिस और तनों के बीच जैविक संबंध स्थापित करने की कोशिश की। लेकिन कोई निश्चित
                            प्रमाण सामने नहीं आया, और 1941 में बर्ट्रेंड ने क्लेप्सीड्रॉप्सिस को एक स्वतंत्र जीनस के रूप में बनाए
                            रखा, जो क्लेप्सीड्रेसी परिवार का प्रकार था। उन्होंने इस परिवार और क्लेडॉक्सिलॉन को अलग-अलग क्रमों में
                            भी रखा: पाइलोफोरेल्स और क्लैडॉक्सिलेल्स! इस अत्यंत जटिल विवाद का नतीजा चाहे जो भी हो, अंगर की पुरानी
                            प्रजाति क्लेप्सीड्रॉप्सिस एंटिका को अकेला छोड़ दिया गया और उसे स्टेम प्रदान करने के सभी प्रयासों के
                            बाद भी उससे कोई जुड़ाव नहीं रहा।
                            क्लेप्सीड्रॉप्सिस समस्या में शामिल विभिन्न पौधों का अध्ययन करने में लगे रहने के दौरान, साहनी ने एक अलग
                            तरह के जाइगोप्टेरिडियन फर्न (1932 डी) पर शोध शुरू किया। 1929 में यूरोप में अपने दौरे के दौरान उन्होंने
                            न केवल पहले से संदर्भित जांच के लिए सामग्री एकत्र की, बल्कि अपना ध्यान (1932 डी) अस्पष्ट प्रजाति
                            जाइगोप्टेरिस प्राइमेरिया (कोट्टा) कॉर्डा की ओर भी लगाया। पुराने जीनस जाइगोप्टेरिस (कॉर्डा, 1845),
                            जिसने परिवार को अपना नाम दिया है, में एक बार कई प्रजातियां शामिल थीं। इनमें से एक को छोड़कर सभी को बाद
                            में अन्य जेनेरा में स्थानांतरित कर दिया गया - वास्तव में कम से कम चार के बीच विभाजित किया गया। शेष
                            प्रजातियाँ, ज़ेड प्रिमेरिया, केवल केमनिट्ज़ के पर्मियन से एक सिलिकिफाइड नमूने में संरक्षित फ़र्न
                            पेटीओल्स की संरचना पर आधारित थीं। माना जाता था कि यह नमूना अस्तित्व में एकमात्र था, लेकिन इसके कटे हुए
                            हिस्से व्यापक रूप से बिखरे हुए थे। साहनी ने इंग्लैंड, फ्रांस और विशेष रूप से जर्मनी के कम से कम आधा
                            दर्जन संग्रहालयों में पेटीओल्स के इन टुकड़ों की पहचान की और उनका अध्ययन किया। लेकिन बर्लिन पहुँचने पर
                            उन्हें एक और नमूना दिखाया गया, जिसे पहले अनदेखा कर दिया गया था, जिसमें एक प्रोटोस्टेलिक स्टेम संरक्षित
                            था। इस मामले में भी, साहनी पौधे की आदत को फिर से बना सकते थे, जो एक पेड़-फ़र्न साबित हुआ, जिसमें
                            पेटीओल-बेस और अपस्थानिक जड़ों के कवच द्वारा समर्थित एक पतली धुरी थी। विभिन्न भागों की शारीरिक संरचना
                            की जाँच ने सबसे अप्रत्याशित परिणाम दिए। तना, पत्ती-निशान अनुक्रम और जड़ें पहले से ज्ञात जीनस
                            बोट्रीकियोक्सिलॉन के प्रकार की पाई गईं, जो कि बड़ी मात्रा में द्वितीयक लकड़ी के साथ एक आदिम फर्न के
                            रूप में उल्लेखनीय है। दूसरी ओर, पेटीओल्स में एटेप्टेरिस की संरचना थी, जो एक बड़ा जीनस था जिसके केवल
                            विशिष्ट पत्ते ही ज्ञात थे। इस प्रकार, तीन जेनेरा की मुख्य विशेषताएं, जो सभी सामान्य पाठ्य-पुस्तकों से
                            परिचित हैं, एक ही नमूने में संयुक्त पाई गईं! यदि यह तना उस समय ज्ञात होता और संतोषजनक ढंग से अध्ययन
                            किया गया होता, तो यह संभव है, साहनी टिप्पणी करते हैं, कि जेनेरा बोट्रीकियोक्सिलॉन और एटेप्टेरिस की कभी
                            स्थापना नहीं हुई होती। हालाँकि, साहनी अपनी खोज के स्पष्ट लेकिन परेशान करने वाले नामकरण संबंधी परिणाम
                            को स्वीकार करने के लिए अनिच्छुक थे, और उन्होंने दो अन्य प्रजातियों को ज़ाइगोप्टेरिस में विलय नहीं
                            किया।
                            ग्राममेटोप्टेरिस बाल्डौफी (1932 ग्राम) पर अपने काम में साहनी ने एक पेड़-फ़र्न से निपटा था जिसे एक अलग
                            परिवार, बोट्रीओप्टेरिडेसी में रखा गया था। इस अध्ययन में भी कई बिखरे हुए टुकड़ों की तुलना शामिल थी
                            जिसमें 1915 में खोजे जाने पर केमनिट्ज़ के निचले पर्मियन से एकमात्र ज्ञात तना टूटा हुआ पाया गया था। इस
                            प्रजाति की संरचना और समानताओं की नई व्याख्या - और रेनॉल्ट के अपूर्ण रूप से ज्ञात जीनस ग्राममेटोप्टेरिस
                            - 1929 और 1930 में साहनी के यूरोपीय दौरों का एक और महत्वपूर्ण परिणाम था। उन्होंने ग्राममेटोप्टेरिस को
                            बोट्रीओप्टेरिडेसी से हटाने के लिए ठोस सबूत पाए, और कुछ हिचकिचाहट के साथ इसे ज़ाइगोप्टेरिडेसी में रखा,
                            जबकि ओसमुंडेसी के साथ इसकी महान समानता पर जोर दिया।
                            इन उदाहरणों से पता चलता है कि कोएनोप्टेरिडीनी पर साहनी का काम, एक नियम के रूप में, नए और दिलचस्प
                            संग्रहों का वर्णन करने में शामिल नहीं था, जो आसानी से महत्वपूर्ण परिणाम दे सकते थे। इसके बजाय,
                            उन्होंने अध्ययन की निश्चित रेखाओं का अनुसरण किया, और इस उद्देश्य के लिए उन्हें कई संग्रहालयों और
                            विभिन्न देशों में सामग्री की खोज करनी पड़ी। जिन नमूनों का अध्ययन करने का उन्हें अवसर मिला, वे शायद ही
                            कभी नए थे; अक्सर उन्हें पिछले कार्यकर्ताओं द्वारा बार-बार जांचा गया था, और कभी-कभी वे वास्तविक प्रकार
                            की प्रजातियां और वंश थे। उनके शोध की एक विशेषता, जिसका बार-बार ऊपर उदाहरण दिया गया है, यह थी कि
                            उन्होंने एक ही तने के बिखरे हुए और कभी-कभी भूले हुए टुकड़ों को खोजकर एक साथ जोड़ दिया। इस उद्देश्य के
                            लिए उन्हें अक्सर पुराने संग्रहों के भाग्य का पता लगाना पड़ता था और किसी जासूस की तरह अतीत की घटनाओं का
                            पुनर्निर्माण करना पड़ता था। आदिम फर्न की पत्थर जैसी सामग्री पर रखे गए उच्च मूल्य को देखते हुए, साहनी
                            अपने निपटान में महत्वपूर्ण नमूने रखने में उल्लेखनीय रूप से सफल रहे। इसमें कोई संदेह नहीं कि उनकी
                            चतुराई और आकर्षक व्यक्तित्व ने उन्हें अक्सर एक प्रतिष्ठित अन्वेषक को दी जाने वाली पारंपरिक सुविधाओं से
                            कहीं अधिक प्राप्त करने में मदद की; वे अक्सर हर जगह मिलने वाली सहायता और शिष्टाचार पर कृतज्ञतापूर्वक
                            ध्यान देते थे।
                            संग्रहालयों में यह "जीवाश्म खोज" ही थी जिसने साहनी को कुछ बहुत ही रोचक पौधों (हमेशा गायब पत्तियों के
                            विन्यास को छोड़कर) के सामान्य संगठन और आदत का पुनर्निर्माण करने में सक्षम बनाया। इस पुनर्निर्माण कार्य
                            ने, बदले में, कोएनोप्टेरिडिनिया में न केवल विशेष उदाहरणों में, बल्कि अधिक सामान्य तरीके से संबंधों की
                            अवधारणा को प्रभावित किया। इसने वर्तमान वर्गीकरण की अस्थिर स्थिति और कृत्रिम प्रकृति को स्पष्ट रूप से
                            प्रकट किया, यह दिखाते हुए कि अक्सर बहुत अधिक निर्भरता एकल शारीरिक विशेषताओं पर रखी गई थी। जबकि
                            कोएनोपिडिनी पर साहनी के अधिकांश कार्य में आलोचनात्मक प्रवृत्ति थी, आलोचना निश्चित रूप से सकारात्मक और
                            रचनात्मक थी। उनके अन्य कार्यों के साथ मिलकर इसने इस समूह में अधिक प्राकृतिक वर्गीकरण वर्गीकरण के
                            निर्माण की धीमी और कठिन सिंथेटिक प्रक्रिया को तेज करने में बहुत मदद की।
                            साहनी का ग्रामाटोप्टेरिस का अध्ययन कोएनोप्टेरिडिनेई के विषय पर उनका अंतिम मौलिक प्रकाशन था। अन्य
                            महत्वपूर्ण कार्य, मुख्यतः अपने देश के जीवाश्म पौधों पर, लगभग उतना ही समय लेते थे जितना वे एक शिक्षक और
                            अनुसंधान के नेता के रूप में अपने कर्तव्यों से बचा पाते थे। लेकिन उन्होंने कभी भी पेलियोज़ोइक फ़र्न में
                            अपनी रुचि नहीं छोड़ी, और यूरोप में अपने प्रत्येक दौरे का उपयोग अतिरिक्त सामग्री प्राप्त करने के लिए
                            किया। 1948 में स्टॉकहोम में कुछ महीनों तक रहने के दौरान उन्होंने स्वीडिश म्यूजियम ऑफ़ नेचुरल हिस्ट्री
                            में विभिन्न कोएनोप्टेरिड्स का अध्ययन किया, और जब उनकी मृत्यु की खबर आई, तो वहाँ उनके लिए कुछ नमूने
                            वास्तव में रखे जा रहे थे।
                            साहनी के काम का कोएनोप्टेरिडीनी के बारे में हमारे ज्ञान में क्या मतलब है, इसकी अंतिम अभिव्यक्ति के रूप
                            में महान अधिकारी पॉल बर्ट्रेंड की एक टिप्पणी - संक्षिप्त, लेकिन बिंदुवार - उद्धृत करना उचित लगता है।
                            एक ही क्षेत्र में काम करने वाले ये दो प्रमुख कार्यकर्ता हमेशा घनिष्ठ मित्र बने रहे, लेकिन
                            पैलियोबोटैनिकल मामलों में वे हमेशा एक ही विचार के नहीं थे। साहनी ने हाल ही में अपने कुछ सहयोगियों के
                            विचारों की आलोचना की थी, जब 1933 में बर्ट्रेंड ने कोएनोप्टेरिडीनी की जांच में सबसे महत्वपूर्ण चरणों का
                            खाका खींचा था। वॉन कॉट्टा, कॉर्डा और उंगर के अग्रणी काम से शुरू करते हुए, उन्होंने इन जांचों के इतिहास
                            में चार मुख्य अवधियों को अलग किया। इनमें से अंतिम के बारे में उन्होंने लिखा: "4:e period, de
                            1920-1933: यह period inrégistra des progress decisifs, dus surtout aux travaux mentionable de B. साहनी
                            ..."।</p>
                    </div>


                    @else
                    <div class="col-md-12">
                        <h5>Professor Sahni’s Palaeobotanical work (By T.G. Halle, Palaeobotanist 1:23-41) </h5>
                        <div class="divider"></div>
                        <p class="normal-text">
                            Even a cursory glance at Birbal Sahni's work on fossil plants inevitably conveys a vivid impression of
                            its extraordinary compass and variety. His researches, in fact, ranged over practically the whole
                            field of palaeobotany. He not only selected the concrete objects of his investigations from all major
                            groups of vascular plants and from nearly all plant-bearing geological systems; but in dealing with
                            this diverse material, and in his more general discussions, he approached the problems involved from
                            every possible angle. Thus his work on fossil plants resulted in contributions to, all pertinent
                            branches of botany, as well as to stratigraphy, palaeogeography and other related lines of geological
                            research. One has the impression that he felt on quite familiar ground whether he was studying
                            intricate anatomical structures, analyzing taxonomic relationships, describing fossil floras, or
                            discussing their bearings on problems of climatic changes or supposed displacements of continents. The
                            reasons for the comprehensive character of Sahni's work may not be evident to botanists insufficiently
                            acquainted with the study of fossil plants and may, therefore, warrant an attempt at analysis.</p>
                        <p class="normal-text">It is by no means unusual in fossil botany to find that the publications of one
                            author deal with many matters that are little related except that they concern plants of the past. The
                            palaeobotanist is rarely free to choose his subjects solely with a view to pursuing connected
                            inquiries into certain problems. As a rule he is dependent on the material at his disposal; indeed,
                            most work on fossil plants has been occasioned by access to this or that collection. Fossil plants are
                            scarce, the material is precious and its examination may not infrequently appear to be a duty. It is
                            in fact a characteristic feature of the history of palaeobotany that even the most important advances
                            have often been made by studying and describing accidentally discovered or acquired material. Kidston
                            and Lang, for instance, did not set out to inquire into problems of general morphology. Their primary
                            task was to examine, analyses and describe the structures of the petrified plant- remains from the
                            Devonian of Rhynie; but their work, nevertheless, profoundly influenced our conception of certain
                            fundamental problems connected with the morphology of vascular plants. No doubt the claims of the
                            material often had a particular significance in Sahni's case. His country is rich in fossil plants,
                            and important un described collections as well as imperfectly explored plant-bearing deposits awaited
                            his attention when, at first quite alone, he began work in this vast field. No doubt he was often
                            inspired by a sense of duty not only to botanical science but also to the needs of Indian geology.</p>
                        <p class="normal-text">At the same time Sahni's researches largely group themselves along certain lines
                            of connected study, which he evidently chose in preference to others because of their bearings on
                            questions of general importance. A very considerable part of his work was also concerned with the
                            analysis and survey of problems which could be studied without direct reference to concrete material.
                            On the whole it would appear that the diversity of his researches was largely an expression of the
                            wide range of his interests, his extensive knowledge and intellectual versatility. Some of the
                            characteristic features of his many- sided scientific personality became apparent at a remarkably
                            early stage of his career as a research worker.</p>
                        <p class="normal-text">There can scarcely be any doubt that Sahni was first attracted to palaeobotany
                            through the influence of the late Professor Sir A. C. Seward, his teacher at Cambridge. After
                            graduating in 1914, he began research at the Botany School where, under Seward's leadership, studies
                            of living and extinct plants were combined to an extent at that time unparalleled elsewhere. At first
                            Sahni engaged in morphological and anatomical investigations of recent plants, chiefly pteridophytes
                            and conifers. Before long he also took up palaeobotanical work, while continuing his studies of living
                            plants. For the remainder of his stay at Cambridge, till he returned to India in 1919, he divided his
                            time between these branches of research, doing a surprising amount of excellent work in both.</p>
                        <!-- <br> -->
                        <h5 class="mt-4">Morphology of Recent Plants</h5>
                        <div class="divider"></div>
                        <p class="normal-text">
                            Sahni's work on living plants will be reviewed separately by Dr. P. Maheshwari. But certain
                            palaeobotanical aspects of his early studies cannot be altogether passed over here. One of the
                            questions dealt with in the theoretical part of his publication on Acmopyle (1920a) was concerned with
                            a palaeobotanical matter: the relation of the Cordaitales to the pteridosperms and the conifers. Sahni
                            did not at that time definitely reject the prevailing idea that the Cordaitales were derived from the
                            pteridosperm stock; but he advanced strong arguments against this view and his criticism was later
                            shown to be justified by Florin's comprehensive studies. Sahni's views on various questions relating
                            to the conifers, too, were more in accord with our present knowledge of the oldest fossil conifers
                            than were those of most contemporary authors. In discussing the important problem of the position of
                            the seed in the gymnosperms, he introduced a conception of great general interest from a
                            rialaeobotanical point of view. On the basis of one single but important morphological feature he
                            suggested a division of the gymnosperms into two groups: “Phyllosperms", with leaf-borne seeds, and
                            “Stachyosperms" in which the seed is seated directly on a normal or modified axis. This distinction -
                            accepted in a morphological sense rather than for practical use in taxonomic classification -is
                            reflected in the views of later workers in phyletic morphology (e.g. Zimmermann, Florin). It has even
                            been extended to apply to the position of all sporangia in vascular plants (" Phyllospory" and
                            “Stachyospory" of H. J. Lam).</p>
                        <p class="normal-text">Sahni's views on the phylogeny of the stachyosperms were decidedly advanced. He
                            pointed out the strong evidence against a derivation of these plants from megaphyllous ancestors, and
                            was inclined to regard the position of their megasporangia on caulinar branches as a primitive
                            feature. D. H. Scott expressed similar thoughts at about the same time; but it was not until ten years
                            later that W. Zimmermann introduced the telome concept in his Phylogenie der Pflanzen, and more than
                            another ten years were to pass before direct evidence was brought forward by Florin in the case of the
                            conifers and the Cordaitales. It would be interesting to know whether Sahni - like Zimmermann at a
                            later date was influenced by Kidston and Lang's discovery of the axial and terminal position of the
                            sporangia of the Psilophytales. He did not quote the first Rhynie paper, which had appeared about two
                            years earlier, but this may be due to a natural reluctance to enter into comparisons with plants so
                            remote in systematic position and geological age. Only three years later he showed that he was fully
                            alive to the consequences of the Scottish discoveries by his study of the sporangiophores of the
                            Psilotaceae (1923, 1923 b ).</p>
                        <p class="normal-text">n his early work on living plants Sahni followed the example of his teacher by
                            mostly choosing those groups which particularly invite comparison with the fossils. It was almost
                            inevitable that from the first he came to adopt a phyletic view in his morphological interpretations
                            and thus to stand out as a decided adherent of what has been named "the new morphology" (H. HAMSHAW
                            THOMAS, 1931). His discussions of phylogenetic relationships at this time throw a vivid light on his
                            analytical mind and his interest in general problems. But they also show that at an early date he had
                            acquired a remarkably extensive knowledge of the morphology and anatomy of both living and fossil
                            pteriodophytes and gymnosperms. One cannot but be impressed with the large amount of high class work
                            which he crammed into the years he spent at Cambridge, dividing his time, as he did, between various
                            little related and most difficult subjects.
                            Sahni's first contributions to pure palaebotany, too, were products of his research work at the Botany
                            School. With an interval of only a couple of years between them he published papers on two widely
                            different groups of palaeobotanical subjects: <br>
                        <ul>
                            <li style="list-style:disc;">The anatomy and morphology of Palaeozoic ferns, and</li>
                            <li style="list-style:disc;">The fossil Plants of the Indian Gondwana formations.</li>
                        </ul>
                        </p>
                        <p class="normal-text">His later publications, too, are largely concerned with these two fields of
                            investigation. It was fortunate for palaeobotany, no less than for Sahni himself, that, at the very
                            outset of his scientific career, his attentIon was thus attracted to fruitful branches of research
                            which were to hold his interest to the end of his life. We have Sahni's own words to prove that this
                            important first choice of subjects was chiefly inspired by Seward. Even after Sahni had left England,
                            Seward continued to take a great interest in his gifted Indian pupil who, in after years, frequently
                            expressed his gratitude to the founder and leader of the Cambridge school of palaeobotanical research.
                        </p>
                    </div>


                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection