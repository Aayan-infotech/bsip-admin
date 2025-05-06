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
                            aria-label="{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}">{{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'भूगर्भ विज्ञान' : 'Geology' }}
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
                ])

                <!-- Main Content -->
                <div class="col-md-9 content">
                    <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'भूगर्भ विज्ञान' : 'Geology' }}</h2>
                    <hr class="divider">
                    <div class="row mb-0">

                        @if ($language === 'hi')
                            <div class="col-md-12">
                                <h5>भारतीय भूविज्ञान में बीरबल साहनी का योगदान (एस.आर. नारायण राव, पैलियोबोटनिस्ट 1: 46-48)
                                </h5>
                                <div class="divider"></div>
                                <p class="normal-text">1886 में भारतीय गोंडवाना वनस्पतियों पर फीस्टमैंटल के क्लासिक कार्य के
                                    पूरा होने
                                    के बाद से तीन दशकों से भी अधिक समय तक जीवाश्म पौधों के अध्ययन को गंभीर झटका लगा था
                                    क्योंकि भारतीय
                                    भूवैज्ञानिक भूवैज्ञानिक कालक्रम में उनके महत्व के बारे में संशय में थे। भूवैज्ञानिक काफी
                                    हद तक उस
                                    दृष्टिकोण से प्रभावित थे जो डब्लू. टी. ब्लैनफोर्ड ने 1876 में अपनाया था कि जीवाश्म पौधों
                                    पर आधारित
                                    साक्ष्य को सावधानी से प्राप्त किया जाना चाहिए, और यह कि ऐसे साक्ष्य कुछ मामलों में
                                    समुद्री जीवों
                                    द्वारा प्रस्तुत साक्ष्य के विपरीत थे। वर्ष 1920, जिसमें भारतीय गोंडवाना पौधों के संशोधन
                                    पर सीवार्ड और
                                    साहनी की मात्रा प्रकाशित हुई, भारतीय भूविज्ञान और पुरावनस्पति विज्ञान के इतिहास में एक
                                    मील का पत्थर
                                    है: यह वर्ष भारत में पुरावनस्पति विज्ञान अनुसंधान के पुनरुद्धार का प्रतीक है, जिसमें
                                    पौधों के जीवाश्म
                                    भारतीय भूविज्ञान की तस्वीर में अधिक से अधिक आ रहे हैं। प्रो. साहनी वनस्पतिशास्त्री और
                                    भूविज्ञानी का एक
                                    दुर्लभ संयोजन थे और दोनों विज्ञानों में उनकी अद्वितीय स्थिति ने उन्हें उन दोनों के बीच
                                    की खाई को पाटने
                                    के लिए सबसे उपयुक्त बना दिया। उन्होंने भूविज्ञानी को यह समझाने में किसी और से ज़्यादा
                                    काम किया कि
                                    पौधों के जीवाश्मों के अध्ययन से दूरगामी परिणाम मिलते हैं जिन्हें भूविज्ञानी अनदेखा नहीं
                                    कर सकते।</p>
                                <p class="normal-text">प्रो. साहनी के लिए पौधों के जीवाश्म प्राचीन वनस्पतियों के महज संयोगवश
                                    मिले अवशेष
                                    नहीं थे; उनके लिए उनका गहरा महत्व था। उनकी भूवैज्ञानिक पृष्ठभूमि और निहितार्थ हमेशा उनके
                                    दिमाग में
                                    मौजूद रहते थे। हर स्तर पर उनके काम ने भूविज्ञान के क्षेत्र को प्रभावित किया और
                                    पैलियोबॉटनी का क्षेत्र
                                    इस देश में वनस्पतिशास्त्रियों और भूवैज्ञानिकों के लिए मिलन स्थल बन गया। 1926 में
                                    भूवैज्ञानिकों को दिए
                                    गए एक यादगार संबोधन में उन्होंने कहा कि जीवाश्म पौधे वनस्पति विज्ञान का भूविज्ञान के
                                    प्रति ऋण हैं।
                                    बदले में, उनके द्वारा शुरू किया गया पैलियोबॉटनीकल शोध न केवल स्ट्रेटीग्राफिकल समस्याओं
                                    को हल करने में
                                    मददगार रहा है, बल्कि पैलियोजियोग्राफी, पिछली जलवायु और यहां तक ​​कि पृथ्वी की हलचलों के
                                    सवालों पर भी
                                    प्रकाश डाला है। साथ ही इसने आर्थिक भूविज्ञान में भी अपना योगदान दिया है।</p>
                                <p class="normal-text">पिछले दो दशकों और उससे भी अधिक समय में भारत में भूवैज्ञानिक चिंतन और
                                    शोध को
                                    उन्होंने किस हद तक प्रभावित किया, इसका एक संक्षिप्त लेख में पर्याप्त विचार देना कठिन है।
                                    इसी देश में
                                    पहली बार ग्लोसोप्टेरिस की खोज की गई थी और गोंडवानालैंड से संबंधित भूविज्ञान की बड़ी
                                    समस्याओं को उठाया
                                    गया था और उन पर चर्चा की गई थी। गोंडवाना की समस्याओं ने स्वाभाविक रूप से उनका काफी ध्यान
                                    आकर्षित किया।
                                    भारतीय भूविज्ञान के दो अन्य अध्याय जहां उनके शोधों का असर पड़ा, वे थे डेक्कन ट्रैप और
                                    पंजाब सलाइन
                                    सीरीज। उन्होंने माइक्रोपेलियंटोलॉजी के महत्व को इसके अकादमिक और व्यावहारिक दोनों पहलुओं
                                    में महसूस किया
                                    और माइक्रोपेलियंटोलॉजिकल तकनीक जिसे उन्होंने सलाइन सीरीज पर अपने काम में पहले ही
                                    इस्तेमाल किया था, को
                                    अन्य समस्याओं में भी विस्तारित किया: असम के तृतीयक अनुक्रम को स्पष्ट करने में और भारत
                                    में भूवैज्ञानिक
                                    समय के मापन में सहायता के रूप में।</p>
                                <p class="normal-text">भारतीय भूविज्ञान में कुछ ही समस्याओं ने गोंडवाना संरचनाओं के वर्गीकरण
                                    और आयु सीमा
                                    से संबंधित विवादों को जन्म दिया है। फीस्टमैंटल के मूल वर्गीकरण को ऊपरी, मध्य (पारसोरा
                                    चरण को
                                    संक्रमणकालीन चरण के रूप में) और निचले में बाद के भूवैज्ञानिकों, विशेष रूप से कॉटर और
                                    फॉक्स द्वारा
                                    प्रश्नांकित किया गया है। फॉक्स ने सोचा कि मध्य गोंडवाना के लिए कोई औचित्य नहीं था
                                    क्योंकि पंचेट चरण के
                                    ऊपर एक पुष्प विराम था। उन्होंने पारसोरा चरण को जुरासिक में शामिल किया। हालांकि, प्रो.
                                    साहनी इस बात से
                                    सहमत नहीं थे कि पारसोरा वनस्पति जुरासिक थी और दूसरी ओर, उन्होंने सोचा कि यह ट्रायस से
                                    छोटी नहीं थी और
                                    संभवतः पर्मियन जितनी पुरानी थी। भूवैज्ञानिकों ने फिर से गोंडवाना की ऊपरी आयु सीमा को
                                    निम्न क्रेटेशियस
                                    माना, क्योंकि पूर्वी तट के गोंडवाना से जुड़े निम्न क्रेटेशियस अम्मोनाइट पाए जाते हैं। इस
                                    संबंध में
                                    राजमहल की सिलिकेट वनस्पतियों ने प्रो. साहनी का काफी ध्यान आकर्षित किया। इस वनस्पति के
                                    बारे में
                                    फीस्टमैंटल का विवरण मुख्यतः पत्तियों के निशानों तक ही सीमित था और हाल के वर्षों में कई
                                    जीवाश्म युक्त
                                    स्थानों की खोज की गई थी। पत्थर के अवशेषों की आलोचनात्मक जांच से प्रो. साहनी इस निष्कर्ष
                                    पर पहुंचे कि
                                    यह वनस्पति जुरासिक थी और इसमें क्रेटेशियस की एक भी प्रजाति नहीं थी।</p>
                                <p class="normal-text">एक समस्या जिसमें उन्होंने कई वर्षों तक बहुत रुचि ली, वह थी महाद्वीपीय
                                    बहाव। जहाँ
                                    वेगनर का मानना ​​था कि महाद्वीप अलग-अलग होकर टूट गए थे, वहीं प्रो. साहनी ने
                                    पैलियोबोटैनिकल साक्ष्यों
                                    के आधार पर एक पूरक सिद्धांत प्रस्तुत किया कि एक बार महासागरों द्वारा अलग किए गए महाद्वीप
                                    एक-दूसरे की
                                    ओर बह गए थे।

                                    1934 में डेक्कन इंटरट्रैपियन बेड की सिलिकिफाइड वनस्पतियों पर उनका पहला योगदान सामने आया,
                                    और इसके साथ
                                    ही एक भूवैज्ञानिक विवाद फिर से शुरू हो गया, जो अग्रणी भूवैज्ञानिकों हिसलोप और हंटर के
                                    समय से चला आ रहा
                                    है। ब्लैनफोर्ड और अन्य लोगों द्वारा भूवैज्ञानिक आधार पर प्रस्तुत क्रेटेशियस युग के
                                    विपरीत, प्रो. साहनी
                                    ने पाया कि वनस्पति स्पष्ट रूप से इओसीन थी, और यह जानकर खुशी हुई कि इओसीन दृष्टिकोण को
                                    बाद में
                                    भूवैज्ञानिकों से सबसे मजबूत समर्थन मिला।</p>
                                <p class="normal-text">साठ से अधिक वर्षों से, लवणीय श्रृंखला की आयु भारतीय भूवैज्ञानिकों के
                                    लिए एक उलझन भरी समस्या रही है और जिस तरह से प्रो. साहनी इस समस्या की ओर आकर्षित हुए, उसे
                                    उनके अपने शब्दों में (1947) बताया जा सकता है: “लगभग चार वर्ष पूर्व, जब वे खेवड़ा में नमक
                                    की खान में छात्रों के एक दल के साथ थे, लेखक के मन में खारे पानी की कुछ बूंदों को घोलने
                                    और सूक्ष्मदर्शी से जांचने का विचार आया। विचार यह था कि चूंकि नमक किसी खाड़ी या लैगून के
                                    सूखने से समुद्री जल से बना होगा, इसलिए लवणीय पानी में कम से कम कुछ सूक्ष्म कार्बनिक
                                    अवशेष अवश्य दिखाई देने चाहिए, जो इसकी भूवैज्ञानिक आयु का संकेत दे सकते हैं। यह अनुमान
                                    सही साबित हुआ: द्विबीजपत्री और शंकुधारी वृक्षों के लकड़ी के ऊतकों के काफी छोटे-छोटे
                                    टुकड़े, साथ ही पंख वाले कीटों के चिटिनस अवशेष पाए गए। इन टुकड़ों को निस्संदेह पानी में
                                    बहा दिया गया था या हवा द्वारा इसकी सतह पर उड़ा दिया गया था; और यह स्पष्ट था कि यदि ये
                                    जीव उस समय जीवित थे जब समुद्र अस्तित्व में था, तो नमक संभवतः इतना पुराना नहीं हो सकता
                                    था: जितना कि कैम्ब्रियन"। इस दृष्टिकोण ने सलाइन श्रृंखला और ऊपरी कैम्ब्रियन बेड के बीच
                                    एक ओवरथ्रस्ट की शुरूआत को आवश्यक बना दिया। डॉ. जी और अन्य क्षेत्रीय भूविज्ञानी, हालांकि,
                                    मानते हैं कि (नमक श्रृंखला) की लवण श्रृंखला अपने सामान्य स्ट्रेटीग्राफिकल अनुक्रम में है
                                    और इसलिए, उम्र में प्री-कैम्ब्रियन है। लवण श्रृंखला को नमक श्रेणी कैम्ब्रियन का सबसे कम
                                    उजागर सदस्य साबित करने वाला महत्वपूर्ण सबूत श्रृंखला और ऊपरी कैम्ब्रियन बेड के जंक्शन की
                                    प्रकृति है। डॉ. जी के अनुसार, यह जंक्शन एक अछूता तलछटी है और इसलिए समस्या यह पता लगाना
                                    है कि प्रोफेसर साहनी के माइक्रोफॉसिल्स को कैम्ब्रियन अनुक्रम में कैसे पेश किया गया। डॉ.
                                    जी के तर्कों के लिए, प्रोफेसर साहनी ने उत्तर दिया (1947): "यह दिखाने के लिए पर्याप्त कहा
                                    गया है कि क्षेत्र मानदंड जिस पर कैम्ब्रियन स्कूल के भूवैज्ञानिकों द्वारा भरोसा किया जाता
                                    है, सुरक्षित मानदंड नहीं हैं। साल्ट रेंज का सवाल जो हमें इतने लंबे समय से उलझन में डाल
                                    रहा है, अब स्थानीय महत्व की समस्या नहीं है: हमें इसे व्यापक अनुभव के आधार पर मानकों के
                                    आधार पर आंकना सीखना चाहिए... चट्टानों की गवाही और जीवाश्मों की गवाही के बीच कोई वास्तविक
                                    संघर्ष नहीं हो सकता है। जब दोनों सहमत नहीं लगते हैं, तो जीवाश्मों के प्रत्यक्ष प्रमाण पर
                                    ही भरोसा किया जाना चाहिए: जीवाश्म विज्ञान, क्षेत्रीय साक्ष्य की तुलना में स्ट्रेटीग्राफी
                                    के लिए एक अधिक सुनिश्चित आधार है।"भूविज्ञान का एक पहलू जिसमें बाद के वर्षों में उनकी
                                    विशेष रुचि थी, वह था माइक्रोपेलियोन्टोलॉजी, जिसके बारे में वे कहते हैं: "पिछले कुछ दशकों
                                    में माइक्रोपेलियोन्टोलॉजी का उदय हुआ है, जो एक महत्वपूर्ण स्थान पर है।भूविज्ञान में,
                                    विशेष रूप से तेल की खोज में, काफी महत्व है। यद्यपि यह अकादमिक भूवैज्ञानिक थे जिन्होंने
                                    पहली बार माइक्रोफ़ॉसिल्स के वैज्ञानिक मूल्य को महसूस किया, हम इस क्षेत्र में मुख्य विकास
                                    के लिए अनुप्रयुक्त भूवैज्ञानिकों और विशेष रूप से तेल और कोयला उद्योगों में कार्यरत
                                    जीवाश्म विज्ञानियों के ऋणी हैं।" अध्ययन की इस शाखा के आगे के अनुप्रयोगों के बारे में, वे
                                    लिखते हैं: "अब हम जानते हैं कि सभी तलछटी संरचनाएं जो बाहरी रूप से जीवाश्म रहित प्रतीत
                                    होती हैं, वास्तव में कार्बनिक अवशेषों से रहित नहीं हैं। इनमें से कुछ हाल ही में
                                    आश्चर्यजनक रूप से पौधे और पशु दोनों समूहों का प्रतिनिधित्व करने वाले सूक्ष्म जीवाश्मों
                                    से भरपूर पाए गए हैं। पंजाब के साल्ट रेंज में सलाइन सीरीज़ एक अच्छा उदाहरण है, साथ ही
                                    ऑस्ट्रेलिया और दक्षिण अफ्रीका में गोंडवाना प्रणाली के आधार पर ग्लेशियल टिलाइट्स भी - और
                                    हाल ही में साल्ट रेंज में चिट्टीडिल के पास तालचिर बोल्डर बेड में भी कार्बनिक अवशेषों का
                                    पता चला है। रॉक-मैट्रिक्स के शरीर में उनके व्यापक प्रसार के कारण माइक्रोफ़ॉसिल कभी-कभी
                                    एक आयु सूचकांक प्रदान कर सकते हैं, भले ही यादृच्छिक रूप से एकत्र किए गए चट्टान के छोटे
                                    टुकड़ों का विश्लेषण किया जाए। ...भारत में, विशेष रूप से प्रायद्वीप में, अज्ञात या
                                    विवादित आयु की प्राचीन तलछटी चट्टानों से ढके बहुत बड़े क्षेत्र हैं। इन परतों में बहुत कम
                                    मेगाफ़ॉसिल पाए गए हैं, और न ही हमें भविष्य में बहुत अधिक मिलने की संभावना है। इन
                                    चट्टानों के नमूनों से माइक्रोफ़ॉसिल को पुनर्प्राप्त करने का प्रयास उपयोगी हो सकता है,
                                    जिन्हें भूवैज्ञानिकों द्वारा स्थानीय और क्षितिज से एकत्र किया जाना चाहिए जो क्षेत्रों को
                                    सबसे अच्छी तरह से जानते हैं।"</p>
                                <p class="normal-text">हालाँकि, उनकी गतिविधियाँ प्रयोगशाला तक ही सीमित नहीं थीं; उनका मानना
                                    ​​था कि पैलियोबोटानिस्टों को फील्ड-वर्क का अनुभव होना चाहिए और वे अपने हथौड़े, नोटबुक और
                                    लेईका के साथ जीवाश्म स्थानों पर जाने का कोई मौका नहीं छोड़ते थे। साल्ट रेंज, राजमहल
                                    हिल्स और डेक्कन इंटरट्रैपियन क्षेत्र सभी उनके लिए परिचित क्षेत्र थे। साल्ट रेंज के उनके
                                    फील्ड-नोट्स (उनकी अप्रकाशित पांडुलिपियों के बीच संरक्षित) जटिल भूवैज्ञानिक संरचनाओं की
                                    उनकी गहरी और चतुर धारणा और समझ का प्रमाण हैं। उनके भूवैज्ञानिक भ्रमण में उनके साथ रहने
                                    वाले लोग शारीरिक और मानसिक शक्ति से भरे एक व्यक्तित्व की ज्वलंत यादें रखते हैं, जो खुद
                                    को कभी नहीं छोड़ते और जीवाश्म संग्रह और फील्ड डेटा के लिए असीम उत्साह रखते थे। अपनी
                                    मृत्यु से कुछ सप्ताह पहले उन्होंने "राजमहल पहाड़ियों की यात्रा" की। जो लोग उनके साथ थे,
                                    वे अमरजोला के पास विलियम्सोनिया-असर वाली क्यारियों की खोज का जो रोमांच और खुशी उन्होंने
                                    महसूस की थी, उसे कभी नहीं भूल सकते। पैलियोबॉटनी संस्थान के लिए उन्होंने जो कई परियोजनाएँ
                                    बनाई थीं, उनमें भारत के वनस्पति-क्षेत्रों का मानचित्रण करना एक उच्च प्राथमिकता थी। वे
                                    हिमालय के स्पीति क्षेत्र में एक अभियान का नेतृत्व करने के लिए भी उत्सुक थे।</p>
                                <p class="normal-text">उन्होंने भारतीय विश्वविद्यालयों में भूवैज्ञानिक अनुसंधान और शिक्षण
                                    में बहुत रुचि ली और यह उनके प्रयासों के कारण था कि इस विषय को कई विश्वविद्यालयों में पेश
                                    किया गया। वे 1943 में अपनी स्थापना के बाद से लखनऊ विश्वविद्यालय के भूविज्ञान विभाग के
                                    प्रमुख थे: गतिशील भूविज्ञान और पैलियोबॉटनी पर उनके प्रेरक व्याख्यान और अनुसंधान के लिए
                                    युवा प्रतिभाओं को प्रोत्साहित करने और प्रशिक्षित करने में उन्होंने जो विलक्षण सफलता
                                    हासिल की, उसने जल्द ही विभाग को इस क्षेत्र में भूविज्ञान के लिए एक महत्वपूर्ण शिक्षण और
                                    अनुसंधान केंद्र बना दिया। country.
                                    दुनिया भर के प्रमुख भूवैज्ञानिकों के साथ उनकी घनिष्ठ मित्रता और मजबूत वैज्ञानिक संबंध
                                    थे, और दुनिया के किसी भी हिस्से से कोई भी भूविज्ञानी भारत आने पर लखनऊ में उनकी
                                    प्रयोगशाला और संग्रहालय में प्रो. साहनी से मिलने का अवसर कभी नहीं चूकता था। उन्होंने जो
                                    विशाल वैज्ञानिक पत्राचार छोड़ा है, वह समकालीन भूवैज्ञानिक विचारों और प्रवृत्तियों का एक
                                    बहुत ही मूल्यवान रिकॉर्ड है।
                                    प्रो. साहनी के काम या जीवन की कोई भी चर्चा उनकी पत्नी श्रीमती सावित्री साहनी के उल्लेख
                                    के बिना पूरी नहीं होगी, जिनकी समझदारी, सहानुभूति और साथ उनके लिए सब कुछ था। वह हमेशा
                                    उनकी वैज्ञानिक यात्राओं में उनके साथ रहीं और उनकी कई भूवैज्ञानिक यात्राओं में भाग लिया।
                                    उनकी अटूट भक्ति ने प्रो. साहनी की महान वैज्ञानिक उपलब्धियों में बहुत योगदान दिया।</p>
                            </div>
                        @else
                            <div class="col-md-12">
                                <h5>Birbal Sahni’s Contribution to Indian Geology (By S.R. Narayana Rao, Palaeobotanist 1:
                                    46-48)</h5>
                                <div class="divider"></div>
                                <p class="normal-text">For more than three decades, since the completion of Feistmantel's
                                    classic work
                                    on the Indian Gondwana flora in 1886, the study of fossil plants had suffered a serious
                                    set-back as
                                    Indian geologists were sceptical regarding their value in geological chronology.
                                    Geologists were
                                    largely influenced by the attitude which W. T. Blanford took up in 1876 that the
                                    evidence founded upon
                                    fossil plants should be received with caution, and that such evidence was in some cases
                                    opposed to the
                                    evidence furnished by marine faunas. The year 1920, in which Seward and Sahni's volume
                                    on the revision
                                    of Indian Gondwana plants appeared, is a landmark in the history of Indian geology and
                                    palaeobotany:
                                    this year marks the revival of palaeobotanical research in India with plant fossils
                                    coming more and
                                    more into the picture of Indian geology. Prof. Sahni was a rare combination of the
                                    botanist and the
                                    geologist and the unique position he held in both the sciences made him eminently suited
                                    to bridge the
                                    gulf that separated them. He did more than anyone else to convince the geologist that
                                    study of plant
                                    fossils yielded results of a far-reaching nature which the geologist could not afford to
                                    ignore.</p>
                                <p class="normal-text">To Prof. Sahni plant fossils were not just chance relics of ancient
                                    floras; they
                                    had a deeper significance to him. Their geological background and implications were
                                    always present in
                                    his mind. His work, at every stage, impinged upon the domain of geology, and the field
                                    of palaeobotany
                                    became a meeting ground for botanists and geologists in this country. In a memorable
                                    address delivered
                                    to geologists in 1926, he expressed that fossil plants represent the debt that botany
                                    owes to geology.
                                    In return, palaeobotanical research which he initiated has not only been helpful in
                                    solving
                                    stratigraphical problems, but has also thrown light upon questions of palaeogeography,
                                    past climates
                                    and even earth movements. At the same time it has made its contributions to economic
                                    geology.</p>
                                <p class="normal-text">It is difficult to give an adequate idea, within the space of a brief
                                    article, of
                                    the extent to which he influenced geological thought and research in India within the
                                    last two decades
                                    and more. It was in this country that the first Glossopteris was discovered and the
                                    great problems in
                                    geology concerning the Gondwanaland were raised and discussed. The Gondwana problems
                                    naturally
                                    attracted a good deal of his attention. Two other chapters of Indian geology where his
                                    researches had
                                    their repercussions were the Deccan Traps and the Punjab Saline Series. He realized the
                                    importance of
                                    micropalaeontology, both in its academic and applied aspects, and the
                                    micropalaeontological technique
                                    which he had already employed in his work on the Saline Series was extended to other
                                    problems: in
                                    elucidating the Tertiary sequence of Assam and as an aid to the measurement of
                                    geological time in
                                    India.</p>
                                <p class="normal-text">Feistmantel's original classification into Upper, Middle (with
                                    Parsora stage as a
                                    transitional stage) and Lower has been questioned by later geologists, particularly
                                    Cotter and Fox.
                                    Fox thought there was no justification for Middle Gondwanas as there was a floral break
                                    above the
                                    Panchet stage. He further included the Parsora stage in the Jurassic. Prof. Sahni,
                                    however, did not
                                    agree that the Parsora flora was Jurassic and, on the other hand, he thought it was not
                                    younger than
                                    the Trias and possibly as old as the Permian. The geologists, again, considered the
                                    upper age limit of
                                    the Gondwanas as Lower Cretaceous, as Lower Cretaceous ammonites are found associated
                                    with the
                                    east-coast Gondwanas. In this connection the silicified flora of the Rajmahals received
                                    a good deal of
                                    attention from Prof. Sahni. Feistmantel's account of this flora was mostly confined to
                                    leaf
                                    impressions and in recent years many fossil-bearing localities had been discovered. From
                                    a critical
                                    examination of the petrifactions, Prof. Sahni came to the conclusion that the flora was
                                    Jurassic with
                                    not a single species characteristic of the Cretaceous.</p>
                                <p class="normal-text">A problem in which he took a great interest for many years was that
                                    of
                                    continental drift. Whereas Wegener thought that continents had broken up by drifting
                                    apart, Prof.
                                    Sahni, on palaeobotanical evidence, elaborated a complementary theory that continents
                                    once separated
                                    by oceans had drifted towards each other.

                                    In 1934 his first contribution on the silicified flora of the Deccan Intertrappean beds
                                    appeared, and
                                    with this was revived a geological controversy which dates back to the time of the
                                    pioneer geologists
                                    Hislop and Hunter. As against the Cretaceous age put forward on geological grounds by
                                    Blanford and
                                    others, Prof. Sahni found that the flora was distinctly Eocene, and it is gratifying to
                                    note that the
                                    Eocene view later received its strongest support from the geologists themselves.</p>
                                <p class="normal-text">For more than sixty years, the age of the Saline Series had been a
                                    baffling
                                    problem to Indian geologists and the way in which Prof. Sahni was attracted to this
                                    problem may be
                                    stated in his own words (1947): “About four years ago, while with a party of students in
                                    the Salt Mine
                                    at Khewra, it occurred to the author to dissolve a little of the saline earth and to
                                    examine some
                                    drops of the brine under the microscope. The idea was that since the salt must have been
                                    formed from
                                    sea-water by the drying up of a bay or lagoon, the brine ought to show at least some
                                    minute traces of
                                    organic remains which might give a clue to its geological age. The surmise proved to be
                                    correct: quite
                                    a number of little shreds of woody tissue of dicotyledons and conifers, as well as the
                                    chitinous
                                    remains of winged insects, were discovered. These fragments had no doubt been washed
                                    into the water or
                                    wafted on to its surface by the wind; and it was clear that if these creatures were
                                    alive at the time
                                    the sea existed, the salt could not possibly be so old: as the Cambrian”. This view
                                    necessitated the
                                    introduction of an overthrust between, the Saline Series and the overlying Cambrian
                                    beds. Dr. Gee and
                                    other field geologists, however, maintain that the Saline Series of (the Salt Range is
                                    in its normal
                                    stratigraphical sequence and, therefore, Pre-Cambrian in age. The critical evidence
                                    proving the Saline
                                    Series to be the lowest exposed member of the Salt Range Cambrian is the nature of the
                                    junction of the
                                    series and the overlying Cambrian beds. This junction, according to Dr. Gee, is an
                                    undisturbed
                                    sedimentary one and the problem, therefore, is to discover how Prof. Sahni's
                                    microfossils were
                                    introduced into the Cambrian sequence. To Dr. Gee's arguments, Prof. Sahni replied
                                    (1947): "Enough has
                                    been said to show that the field criteria upon which reliance is placed by the
                                    geologists of the
                                    Cambrian school are not safe criteria. The Salt Range question which has so long baffled
                                    us is no
                                    longer a problem of local significance: we must learn to judge it by standards based
                                    upon wider
                                    experience... Between the testimony of the rocks and the testimony of the fossils there
                                    can be no real
                                    conflict. When the two do not seem to agree, it is the direct evidence of the fossils
                                    that is to be
                                    relied upon: palaeontology is a surer foundation for stratigraphy than field
                                    evidence."One aspect of
                                    geology in which he was particularly interested in later years was micropalaeontology
                                    regarding which
                                    he states: "The last few decades have seen the rise of micropalaeontology to a position
                                    of
                                    considerable importance in geology, particularly in the quest for oil. Although it was
                                    the academic
                                    geologists who first realized the scientific value of microfossils, we owe the main
                                    developments in
                                    this field to the applied geologists, and particularly to the palaeontologists employed
                                    in the oil and
                                    coal industries."Regarding further applications of this branch of study, he writes: "We
                                    now know that
                                    not all sedimentary formations which outwardly appeared to be unfossiliferous are really
                                    devoid of
                                    organic remains. Some of these have recently been shown to be astonishingly rich in
                                    micro- fossils
                                    representing both plant and animal groups. The Saline Series in the Salt Range of the
                                    Punjab is a good
                                    case in point, so also the glacial tillites at the base of the Gondwana system in
                                    Australia and South
                                    Africa - and quite recently organic remains have also been detected in the Talchir
                                    Boulder Bed near
                                    Chittidil in the Salt Range. Owing to their wide dissemination in the body of the
                                    rock-matrix
                                    microfossils can sometimes provide an age index even if small bits of the rock collected
                                    at random are
                                    analyzed. ...There are great areas in India, particularly in the Peninsula, covered by
                                    ancient
                                    sedimentary rocks of unknown or disputed age. Very few megafossils have been found in
                                    these strata,
                                    nor are we likely to find many more in the future. An attempt may usefully be made to
                                    recover
                                    microfossils from samples of these rocks which should be collected from localities and
                                    horizons by
                                    geologists who best know the areas."
                                    His activities were, however, not confined to the laboratory; he believed that
                                    palaeobotanists should
                                    have experience of field-work and missed no opportunity of visiting fossil localities
                                    with his hammer,
                                    note-book and Leica. The Salt Range, the Rajmahal Hills and the Deccan Intertrappean
                                    areas were all
                                    familiar grounds to him. His field-notes of the Salt Range (preserved among his
                                    unpublished
                                    manuscripts) bear testimony to his keen and shrewd perception and understanding of
                                    complicated
                                    geological structures. Those who accompanied him in his geological excursions retain
                                    vivid memories of
                                    a personality full of physical and mental vigour, never sparing himself and with an
                                    unbounded
                                    enthusiasm for fossil collections and field data. A few weeks before his death he led
                                    "an excursion to
                                    the Rajmahal Hills. Those who were with him can never forget the thrill and joy with
                                    which he greeted
                                    the discovery of the Williamsonia-bearing beds near Amarjola. Among several projects he
                                    had planned
                                    for the Institute of Palaeobotany, mapping of the plant-beds of India held a high
                                    priority. He was
                                    also anxious to lead an expedition to the Spiti region of the Himalayas.</p>
                                <p class="normal-text">He took very great interest in geological research and teaching in
                                    Indian
                                    universities and it was due to his efforts that the subject was introduced in many of
                                    the
                                    universities. He was the Head of the Geology Department of the Lucknow University since
                                    its inception
                                    in 1943 : his inspiring lectures on dynamical geology and palaeobotany and the singular
                                    success he
                                    achieved in stimulating and training young talent for research soon made the Department
                                    an important
                                    teaching and research center for geology in this country.</p>
                                <p class="normal-text">He had close friendships and strong scientific connections with
                                    leading
                                    geologists allover the world, and no geologist from any part of the world while visiting
                                    India ever
                                    missed the opportunity of meeting Prof. Sahni in his laboratory and museum at Lucknow.
                                    The voluminous
                                    scientific correspondence he has left behind forms a very valuable record of
                                    contemporary geological
                                    thought and trends.
                                    No notice of Prof. Sahni's work or life would be complete without a reference to his
                                    wife, Srimati
                                    Savitri Sahni, whose understanding sympathy and companionship meant everything to him.
                                    She always
                                    accompanied him on his scientific travels and took part in many of his geological
                                    excursions. Her
                                    unflinching devotion in no small measure contributed to the great scientific
                                    achievements of Prof.
                                    Sahni.</p>
                            </div>
                        @endif

                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection
