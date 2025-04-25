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
                    {{ $language === 'hi' ? 'सामान्य रूचि' : 'General Interest' }}
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
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'सामान्य रूचि' : 'General Interest' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="{{ $language === 'hi' ? 'बीरबल साहनी' : 'Prof. Birbal Sahni' }}"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text" style="text-align: justify;">अपनी शैक्षणिक रूचि के बावजूद, बीरबल किसी सूरत में भी एकांतवासी नहीं थे तथा उन्होंने हालांकि अपने तरीके से जीवन के पड़ाव का पूरी सीमा में आनंद लिया। कैंब्रिज में जब भारतीय विद्यार्थियों ने रोचक परिधान का मंचन किया, वह साधु (मुनि) के रूप में आए, जो उनकी अंतरात्मा को कुल मिलाकर अप्रतीकात्मक नहीं था। वह खेल के अति शौकीन थे तथा खेल-कूद में बहुत समय तक रूचि बरकरार रखी। उन्होंने अपने स्कूल एवं कालेज हाकी एकादश का ही प्रतिनिधित्व नहीं किया अपितु वह सरकारी स्कूल, लाहौर में भी टेनिस में अति पुष्ट थे। कैंब्रिज में उन्होंने आॅक्सफोर्ड मजलिस के खि़लाफ़ टेनिस में विजेता कैंब्रिज भारतीय मजलिस का प्रतिनिधित्व किया।</p>
                    </div>
                    <div class="col-md-12">
                        <h3 class="mt-4">हिमालय में टेढ़े-मेंढ़े रास्ते</h3>
                        <div class="divider"></div>
                        <p class="normal-text">
                            बीरबल ने अपनी रोज़मर्राह की पढ़ाई और इम्तहान के कार्य का महत्वपूर्ण त्याग कर भी छात्र काल में भी हिमालयी पादपों का सबसे बड़ा संग्रहण किया। उन्होने हिमालय की विपुल अध्ययन यात्राएं कीं जिसके दरम्यान हुकर की फ्लोरा आॅफ ब्रिटिश इंडिया (ब्रिटिश भारत के पेड़-पौधे) उनकी अपरिवर्ती संगी रही। इन पादपों के अन्वेषण में, दूसरे कामों का ख़्याल रखे बिना वह बहुत ज़्यादा वक्त तक निष्ठावान रहे, मैं विश्वास करता हॅंूं कि उनमें से कुछेक अब नूतन पादपालय की पूंजी हैं। बाह्य जीवन एवं पर्वतारोहण वक़्त से पहले किए गए जोश थे। बुरान दर्रा (16,800 फुट ऊंचा) सन्निहित करते हुए पठानकोट से रोहतांग दर्रा; कसौली होते हुए कालका से चिनी (हिंदुस्तान-तिब्बत मार्ग), सुबाथु, शिमला, नरकंडा, रामपुर, बुशर किल्बा के टेढ़े-मेंढ़े रास्तों की छलांगें उल्लेखनीय हैं। शिमला से द्रास, जोजिला दर्रा पार, श्रीनगर से अमरनाथ (14,000 फुट ऊंचाई और मार्गस्थ 16,000 फुट के लगभग दूसरी चढ़ाई), विश्लाव दर्रा होते हुए शिमला से रोहतांग (12,000 फुट) और वहां से पठानकोट के अन्य टेढ़े-मेंढ़े रास्ते तय किए गए।</p>
                        <p class="normal-text">यूरोप से वापसी के उपरांत, 1920 में बीरबल ने लंबे टेढ़े-मेंढ़े रास्ते तय किए जिनमें पठानकोट से लेह सर्वाधिक महत्वपूर्ण था। स्वयं उत्कट वनस्पतिविज्ञानी स्वर्गीय प्रो. एस.आर. कश्यप के सान्निध्य में पठानकोट-खजियार-चंबा, लेह और वहां से जोजिला दर्रा-बालटाल-अमरनाथ-पहलगाम और अंत में जम्मू होते हुए वापसी के इन टेढ़े-मेंढ़े पथों का अनुसरण किया गया था। यह दौरा कई सप्ताहों तक चला और हिमालयी पादपों के प्रचुर संग्रहण का परिणामी रहा। बीरबल ने 1923 और 1944 के मध्य अपनी धर्मपत्नी के साथ क बार हिमालय में कई टेढे़-मेंढ़े मार्ग तय किए।</p>
                    </div>

                    @else
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="{{ $language === 'hi' ? 'बीरबल साहनी' : 'Prof. Birbal Sahni' }}"
                            class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text " style="text-align: justify;">
                        In spite of his academic interests, Birbal was by no means a recluse and he enjoyed in full measure
                  the lighter side of life, though in his own way. When some of the Indian students at Cambridge staged
                  a fancy dress celebration, he turned up as a sadhu (an ascetic), which was not altogether un symbolic
                  of his inner self. He was extremely fond of games and retained his interest in sports for a long time.
                  He not only represented his school and college hockey XIs but was also very keen on tennis at the
                  Government College, Lahore. At Cambridge he represented the victorious Cambridge Indian Majlis at
                  tennis against the Oxford Majlis.</p>
                    </div>
                    <div class="col-md-12">
                    <h3 class="mt-4">Traverses In The Himalayas</h3>
                    <div class="divider"></div>
                    <p class="normal-text" style="text-align: justify;">
                  Even as a student Birbal made one of the biggest collections of Himalayan plants at considerable
                  sacrifice of his routine studies and examination work. He made numerous excursions to the Himalayas
                  during which Hooker's Flora of British India was his invariable companion. He devoted a great deal of
                  time, irrespective of other work, to the investigation of these plants, some of which, I believe, now
                  form a part of the New Herbarium. The passion for outdoor life and trekking was acquired early. The
                  traverses from Pathankot to Rohtang Pass; Kalka to Chini (Hindustan-Tibet road) via Kasauli, Subathu,
                  Simla, Narkanda, Rampur Bushahr, Kilba, taking the Buran Pass (16,800 ft. high) in the stride are
                  worth mentioning. Other traverses were carried out from Srinagar to Dras, across the Zoji la Pass;
                  Srinagar to Amarnath (height 14,000 ft. with another climb of about 16,000 ft. en route); Simla to
                  Rohtang (12,000 ft.) via the Bishlao Pass and thence back to Pathankot.</p>
                <p class="normal-text" style="text-align: justify;">On his return from Europe, Birbal made long traverses independently, the most
                  important of which was from Pathankot to Leh in Ladakh in 1920. The route followed during this
                  traverse, carried out in the company of the late Prof. S. R. Kashyap, himself a keen botanist, was
                  Pathankot- Khajiar-Chamba-Leh and thence back via the Zoji la Pass-Baltal-Amarnath-Pahalgam and
                  finally Jammu. This tour lasted over several weeks and resulted in a rich collection of Himalayan
                  plants.</p>
                <p class="normal-text" style="text-align: justify;">Between 1923 and 1944 Birbal made a number of other traverses in the Himalayas,
                  accompanied at times by his wife. In 1925 between Srinagar, Uri, Poonch, Chor Panjal, Pal Gagrian and
                  thence to Gulmarg, they were marooned on the snow at Chor Panjal and arrived at Gulmarg after much
                  hardship. In 1944 he repeated the traverse of 1923, then left unfinished owing to unavoidable
                  circumstances. This time he was also accompanied by Prof. Jen Hsü and another colleague from the
                  University, Dr. R. D. Misra. Their route lay between Gujrat, Bhimbar, Nowshera, Rajauri, Thanamandi,
                  Poonch, Aliabad, Uri and finally Srinagar.</p>
                <p class="normal-text" style="text-align: justify;">It was these treks through the Himalayas which gave him that expansive horizon,
                  breaking through the bounds of insularity, and which enabled him to view palaeobotanical and
                  geological problems in their widest perspective, so essential to their correct understanding. It was
                  these accumulated experiences and his geological background, indispensable for palaeobotanists, which
                  he brought to bear upon his views on the origins and distribution of fossil floras, and upon the
                  geographic orientation of ancient continents and seas.</p>
                    </div>
                    
                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection