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
                    {{ $language === 'hi' ? 'पैतृक पृष्ठभूमि' : 'Parental Background' }}
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
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'पैतृक पृष्ठभूमि' : 'Parental Background' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="बीरबल साहनी की छवि" class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text " style="text-align: justify;">
                            बीरबल अपने माता-पिता स्वर्गीय प्रो. रुचि राम साहनी और श्रीमती ईश्वर देवी की तीसरी संतान थे। उनका जन्म
                            14 नवंबर 1891 को शाहपुर जिले के एक छोटे से कस्बे भेरा में हुआ था, जो अब पश्चिमी पंजाब का हिस्सा है और
                            कभी व्यापार का एक समृद्ध केंद्र था, जिस पर मूर्तिभंजक महमूद गजनवी ने आक्रमण किया था। भेरा के
                            इर्द-गिर्द घूमने वाली तत्काल दिलचस्पी इस तथ्य से बढ़ जाती है कि यह छोटा सा शहर साल्ट रेंज से बहुत दूर
                            नहीं है जिसे वास्तविक "भूविज्ञान संग्रहालय" के रूप में वर्णित किया जा सकता है। इन बंजर पर्वतमालाओं की
                            यात्राएँ, जहाँ भारतीय भूविज्ञान के कुछ सबसे दिलचस्प प्रसंग और स्थलचिह्न छिपे हुए हैं, अक्सर हमारे बचपन
                            के दौरान भेरा की यात्राओं के साथ समन्वित होती थीं, विशेष रूप से खेवड़ा की। यहाँ भूवैज्ञानिक युग से
                            संबंधित कुछ पौधे-असर वाली संरचनाएँ हैं, जिनके बारे में बीरबल ने बाद के वर्षों में महत्वपूर्ण योगदान
                            दिया।</p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            भेरा उनका पैतृक घर था, लेकिन उनके माता-पिता एक समय में बहुत दूर, वास्तव में सिंधु
                            पर देहरा इस्माइल खान के एक स्वप्निल बंदरगाह पर बसे थे, और बाद में लाहौर चले गए।
                            प्रो. साहनी के पिता को भाग्य के उलटफेर और हमारे दादा की मृत्यु के कारण देहरा इस्माइल खान छोड़ना पड़ा, जो शहर के एक प्रमुख नागरिक थे। भाग्य के परिवर्तन के साथ, जीवन अलग और कठिन हो गया। निडर होकर, रुचि राम साहनी ने स्कूल में दाखिला लेने के लिए देहरा इस्माइल खान से झंग तक, 150 मील से अधिक की दूरी पर, अपनी पीठ पर पुस्तकों का एक बंडल लेकर पैदल यात्रा की। बाद में भेरा और लाहौर में, उन्होंने खुद को एक विद्वान के रूप में प्रतिष्ठित किया। उन्होंने खुद को पूरी तरह से छात्रवृत्तियों पर शिक्षित किया जो उन्होंने जीती थीं। इस प्रकार उनका पालन-पोषण जीवन के कठिन स्कूल में हुआ, और वे पूरी तरह से एक स्व-निर्मित व्यक्ति थे।
                        </p>

                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            प्रो. रुचि राम साहनी उदार विचारों वाले व्यक्ति थे, और अपने करियर के दौरान वे पंजाब में ब्रह्मो समाज आंदोलन के नेताओं में से एक बन गए, जो एक प्रगतिशील धार्मिक और सामाजिक उभार था, जिसने उस समय नई-नई जड़ें जमा ली थीं। निस्संदेह पिता ने अपने शुरुआती दिनों में कलकत्ता प्रवास के दौरान इन विचारों को आत्मसात किया था। उन्होंने जाति से पूरी तरह अलग होकर अपने विचारों को व्यावहारिक रूप दिया। और जब बुलावा आया, तो उस समय वृद्ध हो चुके पिता स्वर्ण मंदिर के तालाब की पवित्र मिट्टी में घुटनों तक डूबे रहे और जमा हुई मिट्टी को साफ करने में मदद करने के लिए अपने कमजोर कंधों पर टोकरी भर मिट्टी उतारी। उनका धर्म कोई सीमा नहीं जानता था। हमेशा एक देशभक्त, उन्होंने स्वतंत्रता के संघर्ष में खुद को दिल और आत्मा से झोंक दिया और यहां तक ​​कि गुरु का बाग में नौकरशाही की कठोरता का भी स्वाद चखा। उन्होंने अपने देशवासियों के अधिकारों के लिए बहादुरी से लड़ाई लड़ी, और एक से अधिक बार गिरफ्तारी के कगार पर थे।
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            लगभग 1922 में, जब उन्होंने तत्कालीन सरकार द्वारा उन्हें प्रदान की गई उपाधि का प्रतीक चिन्ह लौटा दिया, तो प्रो. रुचि राम साहनी को उनकी पेंशन बंद करने की धमकी दी गई, लेकिन उनका एकमात्र उत्तर यह था कि उन्होंने अपने कार्य के सभी संभावित परिणामों के बारे में सोच लिया था और उन्हें पहले से ही भांप लिया था। उन्होंने अपनी पेंशन बरकरार रखी!
                            यह अवश्यंभावी था कि इन घटनाओं ने परिवार पर अपनी छाप छोड़ी और बीरबल ने भी इसे आत्मसात कर लिया। यदि बीरबल कांग्रेस आंदोलन के कट्टर समर्थक बन गए, तो यह उनके पिता के जीवित उदाहरण के कारण ही संभव हुआ। इसमें यह भी जोड़ा जा सकता है कि उन्हें प्रेरणा, चाहे दुर्लभ अवसरों पर ही क्यों न हो, मोतीलाल नेहरू, गोखले, श्रीनिवास शास्त्री, सरोजिनी नायडू, मदन मोहन मालवीय और अन्य राजनीतिक हस्तियों की उपस्थिति से मिली, जो रुचि राम के लाहौर स्थित घर में मेहमान हुआ करते थे, जो ब्रैडलाफ हॉल के पास स्थित था, जो उस समय पंजाब में राजनीतिक गतिविधियों का केंद्र था।</p>
                    </div>
                    @else
                    <div class="col-md-5">
                        <img src="{{ asset('images/pages/prof_birbal_sahni.jpg') }}"
                            alt="Image of Prof. Birbal Sahni" class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-7">
                        <p class="normal-text " style="text-align: justify;">
                            Birbal was the third child of his parents, the late Prof. Ruchi Ram Sahni and Shrimati Ishwar Devi. He
                            was born on the 14th of November 1891, at Bhera, a small town in the Shahpur district, now a part of
                            the West Punjab, and once a flourishing centre of trade, which had the distinction of an invasion by
                            the iconoclast, Mahmud of Ghazni. The immediate interest that canters round Bhera is enhanced by the
                            fact that this little town is situated not far from the Salt Range which may be described as a
                            veritable "Museum of Geology ". Excursions to these barren ranges, where lie unmasked some of the most
                            interesting episodes and landmarks of Indian geology, were often coordinated with visits to Bhera
                            during our childhood, particularly to Khewra.</p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            Here occur certain plant-bearing formations concerning
                            the geological age of which Birbal made important contributions in later years.Bhera was his ancestral home, but his parents were at one time settled much
                            farther a field, in fact at the reverie port of Dehra Ismail Khan on the Indus, and later migrated to
                            Lahore.
                            Prof. Sahni's father was obliged to leave Dehra Ismail Khan owing to reverses of fortune and the death
                            of our grandfather who was a leading citizen of the town. With the change of fortune, life became
                            different and difficult. Undeterred, Ruchi Ram Sahni walked with a bundle of books on his back all the
                            way from Dehra Ismail Khan to Jhang, a distance of over 150 miles, to join school. Later at Bhera and
                            at Lahore, he distinguished himself as a scholar. He educated himself entirely on scholarships that he
                            won. He was thus brought up in a hard school of life, and was entirely a self-made man.
                            Prof. Ruchi Ram Sahni was a person of liberal views, and during his career he became one of the
                            leaders of the Brahmo Samaj movement in the Punjab, a progressive religious and social upsurge which
                            had then freshly taken root. Undoubtedly father imbibed these ideas during his sojourn in Calcutta in
                            his early days. He gave practical effect to his views by breaking away completely from caste. And when
                            the call came, father, then a man of advanced years, stood knee-deep in the sacred mud of the tank of
                            the Golden Temple and removed basket load of it upon his frail shoulders to assist in clearing the
                            accumulated silt. His religion knew no boundaries. Always a patriot, he threw himself heart and soul
                            into the struggle for independence and even tasted the severity of the bureaucratic baton at the Guru
                            ka Bagh. He fought valiantly for the rights of his countrymen, and was more than once on the verge of
                            arrest.</p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text " style="text-align: justify;">
                            About 1922, when he returned the insignia of the title conferred upon him by the
                            then government, Prof. Ruchi Ram Sahni was threatened with the termination of his pension, but his
                            only answer was that he had thought out and foreseen all possible consequences of his action. He
                            retained his pension !
                            It was inevitable that these events left their impress upon the family and were also imbibed by
                            Birbal. If Birbal became a staunch supporter of the Congress movement, it was due in no small measure
                            to father's living example. To this may be added the inspiration he derived, even if on
                            rare-occasions, from the presence of political figures like Motilal Nehru, Gokhale, Srinivasa Shastri,
                            Sarojini Naidu, Madan Mohan Malaviya and others who were guests at Ruchi Ram's Lahore house, situated
                            near the Bradlaugh Hall which was then the hub of political activity in the Punjab.
                            Birbal's mother was a pious lady of more conservative views, whose one aim in life was to see that the
                            children received the best possible education. Hers was a brave sacrifice, and together they managed
                            to send five sons to British and European universities. Nor was the education of the daughters
                            neglected in spite of opposition from orthodox relations, and Birbal's elder sister was one of the
                            first women to graduate from the Punjab University.
                            Such then was the family and parental background which influenced Birbal throughout life. In later
                            years he prided in calling himself a "chip of the old block" which he was in every sense of the term.
                            It can be truly said that he inherited from father his intense patriotism, his love of science and
                            outdoor life and the sterling qualities which made him stand unswervingly in the cause of the country,
                            while he imbibed his generosity and his deep attachments from our unassuming and self-sacrificing
                            mother.</p>
                    </div>
                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection