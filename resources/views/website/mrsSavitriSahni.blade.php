@extends('website.layouts.app')

@section('content')
<section>
    <div class="container-fluid p-0">
        <!-- Breadcrumb -->
        <nav class="bio-breadcrumb" aria-label="Breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" aria-label="{{ $language === 'hi' ? 'मुख्य पृष्ठ पर जाएं' : 'Go to Home' }}">
                        {{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" aria-label="{{ $language === 'hi' ? 'प्रोफाइल पर जाएं' : 'Go to Profile' }}">
                        {{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $language === 'hi' ? 'श्रीमती सावित्री साहनी' : 'Mrs. Savitri Sahni' }}
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
                <h2 id="history" tabindex="0" class="text-primary">
                    {{ $language === 'hi' ? 'श्रीमती सावित्री साहनी' : 'Mrs. Savitri Sahni' }}
                </h2>
                <hr class="divider">
                <div class="row mb-0">
                    @if ($language === 'hi')
                    <div class="col-md-2">
                        <img src="https://www.bsip.res.in/images/pages/savitri-sahni-1.jpg"
                            alt="श्रीमती सावित्री साहनी की छवि" class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-10">
                        <p class="normal-text" style="text-align: justify;">
                        प्रख्यात भारतीय वनस्पतिविज्ञानी, स्व. प्रो. बीरबल साहनी, एफ.आर.एस. की पत्नी महोदया सावित्री साहनी का 26 अप्रैल 1985 को सुबह 83 साल की उम्र में देहांत हो गया तथा लखनऊ में गोमती नदी के तट पर स्थित उनके अपने घर के परिसर में अंत्येष्टि की गई। किसने कल्पना की होगी कि अपने महान पति, बीरबल की असामयिक मृत्यु के उपरांत सुंदर, नाजुक सी दिखने वाली महिला लखनऊ में स्थित बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान (बी.सा.पु.सं.)- शोध संस्था को ही पोषित करने में सक्षम होंगी अपितु भारत में इस पुरावनस्पतिक अनुसंधान केंद्र को प्रधान संस्थान बनाने में भी सहायक होंगी।हालांकि संस्थान की स्थापना उनके पति प्रो. बीरबल साहनी ने 10 सितंबर 1946 को की थी, जब उसकी मौजूदा इमारत का शिलान्यास पंडित जवाहर लाल नेहरू भारत के पहले प्रघानमंत्री ने भारतीय विज्ञानियों के विशाल जनसमूह और देश के नामी-गिरामी व्यक्तित्वों की मौजूदगी में 03 अप्रैल 1949 को किया था तब वास्तव में यह अस्तित्व में आया।
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text" style="text-align: justify;">
                            संभवतः प्रो. साहनी के पुरावानस्पतिक संस्थान के विचार की कल्पना का भाग्य आने वाले वर्षों में दौर से अलग था, जब इसके स्थापना समारोह के एक सप्ताह से कम में ही उन्हें अचानक 9-10 अप्रैल 1949 की आधी रात में छीन लिया। प्रो. साहनी की अकाल मृत्यु महा विपत्ति थी। श्रीमती सावित्री साहनी अपने पति की सतत साथी रहीं, चाहे वह घर हो या विदेश, विदेश विश्वविद्यालयों, शोध संस्थाओं में जाने तथा नामी-गिरामी भू-विज्ञानविदों, पुरावनस्पतिविज्ञानविदों और देश में अन्य विज्ञानीगण की बैठकों में जहाॅं वे गए। अपने पति की अकाल मृत्यु के सदमें तथा अपने वैवाहिक जीवन में हुए क्रूर आपात के सुधार के तुरंत बाद, सावित्री साहनी ने अपने पति के छूटे हुए लक्ष्यों को पूर्ण करने में दृढ़ संकल्प एंव प्रण से समर्पित हो गईं। मौजूदा बी.सा.पु.सं. के परिपोषण में इसके लक्ष्यों को अपने पति की कल्पना को अमल में लाने के लिए दुर्लुभ आत्म-विश्वास ओर पवित्रता के साथ उन्होंने अति परिश्रम किया। श्रीमती साहनी के धर्मार्थ कार्य संबंधी भाव एवं समर्पण तथा इस साहस के साथ कि बी.सा.पु.सं. उनकी संतान थी। 1949 से 1969 तक इसके अस्तित्व में आने से शुरू के 20 सालों तक इसकी अध्यक्षा एवं सह-संस्थापिका के रूप में कार्य किया। संस्थान को 1969 में विज्ञान एवं प्रौद्योगिकी विभाग, भारत सरकार के तहत स्थानांतरित कर दिया गया तथा श्रीमती साहनी को इसके शासी मंडल का आजीवन सदस्य नामांकित किया गया। संस्थान की अपनी विशिष्ट सेवाओं को प्रतिष्ठा में और विज्ञान के कारण, प्रतिष्ठित ‘‘पद्मश्री’’ बहुत बड़े राष्ट्रीय सम्मान से 1969 में भारत के राष्ट्रपति ने नवाज़ा। सदैव करीने से श्वेत सिल्क परिधान पहने हुए श्रीमती सावित्री अति सुंदर एवं सुसंस्कृत महिला थीं और जो कोई भी उनसे मिला उनके मधुर मृदुभाषी एवं विनम्र स्वभाव की प्रतिभा से बच न सका। श्रीमती साहनी ने सुविस्तृत यात्राएं कीं अपने समय के बहुत से प्रतिष्ठित विज्ञानियों से व्यक्गित संपर्क में रहीं तथा यू एस एस आर, चीन, जापान, यू एस ए तथा बहुत से अन्य यूरोपीय व सुदूर पूर्वी देशों के दौरों के दरम्यान तमाम सोसाइटियों व शोध संगठनों में उन्हें सम्मानित किया। संस्थान को यश एवं कीर्ति दिलाते हुए श्रीमती साहनी ने एक या भिन्न हैसियत में 36 वर्षों से ज्यादा बी.सा.पु.सं. में सेवा की। संस्थान के कर्मचारीवृदों हेतु श्रीमती साहनी स्नेहमयी मां थीं। उनकी इकलौती संतान, उनके पति का जीवंत स्मारक - बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान में अनुसंधान के उन्नयन हेतु राष्ट्र की अपनी संपदा में उन्हें दृढ़ संकल्प था।
                        </p>
                    </div>
                    @else
                    <div class="col-md-2">
                        <img src="https://www.bsip.res.in/images/pages/savitri-sahni-1.jpg"
                            alt="Image of Mrs. Savitri Sahni" class="img-fluid img-history rounded shadow-sm">
                    </div>
                    <div class="col-md-10">
                        <p class="normal-text" style="text-align: justify;">
                            Madam Savitri Sahni-wife of the eminent Indian palaeobotanist, late Prof. Birbal Sahni, F.R.S., died
                            on the morning of April 26, 1985, in her 83rd year, and was cremated in the campus of her own house
                            situated on the bank of river Gomti at Lucknow. Who could imagine that after the untimely death of her
                            illustrious husband, Birbal, this graceful, fragile-looking woman would not only be able to nurture a
                            research institution-the Birbal Sahni Institute of Palaeobotany (BSIP) at Lucknow but would also be
                            instrumental in making this Institute a premier palaeobotanical research center in India. Although the
                            Institute was founded by her husband, Prof. Birbal Sahni, on September 10, 1946, it actually came into
                            existence only when the foundation stone of its present building was laid on April 3, 1949, by Pandit
                            Jawaharlal Nehru-the first Prime Minister of India-in the presence of a large gathering of Indian
                            scientists and eminent personalities of the country.
                        </p>
                    </div>
                    <div class="col-md-12">
                        <p class="normal-text" style="text-align: justify;">
                            Probably the destiny of Prof. Sahni's cherished dream of a Palaeobotanical
                            Institute had a different course in the years to come, as within less than a week of its foundation
                            ceremony, he was suddenly snatched away on the mid-night of April 9-10, 1949. The premature death of
                            Prof. Sahni was a great misfortune. Mrs Sahni had been a constant companion of her husband, whether at
                            home or abroad, visiting foreign universities, research institutions, and meeting the leading
                            geologists, palaeobotanist and other scientists in the country they visited. Soon after her recovery
                            from the shock of her husband's untimely death and a cruel blow to her happy married life, Mrs Sahni
                            dedicated herself with an iron will and determination to complete the unfinished task her husband had
                            left. She worked hard with a rare self-confidence and sanctity of its objectives to see the dream of
                            her husband materialize in bringing up the present BSIP. Mrs Sahni served the Institute as its
                            President and co-founder in its early 20 years of existence from 1949 to 1969 with a missionary zeal
                            and dedication and with the spirit that BSIP was her own child. In 1969, the Institute was transferred
                            under the Department of Science and Technology, Government of India, and Mrs Sahni was nominated a
                            Life Member of its Governing Body. In recognition of her distinguished services to the Institute, and
                            the cause of science, the President of India honoured Mrs Sahni in 1969, with the coveted "Padma
                            Shri", a great national honour. Mrs Sahni was an extremely graceful and cultured lady, always dressed
                            meticulously in her white silk, and whosoever met her would not escape from the charisma of her sweet,
                            soft-spoken, and courteous disposition. Mrs Sahni was a widely travelled lady, having personal
                            contacts with many eminent scientists of her time, and was honoured by several societies and research
                            organisations during her visits to USSR, China, Japan, the USA, and many other European and far-east
                            countries. Mrs Sahni served BSIP for more than 36 years in one or the other capacity, bringing fame
                            and lustre to the Institute. For us, the staff of the Institute, Mrs Sahni was an affectionate mother.
                            She has willed her estate to the Nation for the promotion of research in palaeobotany at the Birbal
                            Sahni Institute of Palaeobotany-her only child, her husband's living memorial.
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection