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
                    {{ $language === 'hi' ? 'जीविका' : 'Living' }}
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
                <h2 id="history" tabindex="0">{{ $language === 'hi' ? 'जीविका' : 'Living' }}</h2>
                <hr class="divider">
                <div class="row mb-0">

                    @if ($language === 'hi')

                    <div class="col-md-12">
                        <h5>जीवित पौधों पर प्रोफेसर साहनी का योगदान (पी. माहेश्वरी, पैलियोबोटनिस्ट 1:17-21)</h5>
                        <div class="divider"></div>
                        <p class="normal-text">
                            अपने ऐतिहासिक पहलू में विज्ञान की तुलना एक ऐसे वृक्ष से की जा सकती है जो लगातार शाखाएँ बनाता रहता है
                            क्योंकि ज्ञान का योग बढ़ता जाता है और क्षेत्र का एक उपविभाजन आवश्यक हो जाता है। कभी-कभी, विशेष उत्साह
                            की एक कली प्रकट होती है और एक ऐसी शाखा को जन्म देती है जो इतनी प्रभावशाली और महत्वपूर्ण होती है कि यह
                            पूरे जैविक शरीर की रूपरेखा को बदल देती है। इस तरह की एक घटना भारतीय वनस्पति विज्ञान में तब घटित हुई जब
                            युवा साहनी ने 1911 में लाहौर से स्नातक की उपाधि प्राप्त की और कैम्ब्रिज विश्वविद्यालय के वनस्पति
                            विज्ञान स्कूल में आगे की पढ़ाई करने के लिए इंग्लैंड चले गए। दिवंगत प्रो. ए. सी. सीवार्ड जैसे महान गुरु
                            के प्रभाव में आकर, उन्होंने तेजी से सीखा, जीवित और जीवाश्म पौधों की आकृति विज्ञान में बहुत अंतर्दृष्टि
                            और अनुभव प्राप्त किया और भारत लौटने पर अनुसंधान का एक समृद्ध स्कूल शुरू किया, जो अब पूरी दुनिया में
                            प्रसिद्ध है। आमतौर पर यह माना जाता है कि प्रो. साहनी एक पैलियोबोटैनिस्ट थे, और यह इस क्षेत्र में उनका
                            काम था जिसने उन्हें रॉयल सोसाइटी की फैलोशिप और भारतीय विज्ञान कांग्रेस की अध्यक्षता जैसी कई
                            विशिष्टताएँ दिलाईं। जबकि यह मूलतः सत्य है, वर्तमान लेखक जैसे लोग, जो उनके व्यक्तिगत संपर्क में आए, वे
                            तुरंत इस बात से सहमत होंगे कि वे बहुत व्यापक रुचियों वाले वनस्पतिशास्त्री थे, जो पौधों के जीवन के बारे
                            में हमारे ज्ञान को आगे बढ़ाने के लिए हर अवसर का लाभ उठाने के लिए उत्सुक थे। जब मुझे प्रो. साहनी के
                            पूर्व शिष्य और मेरे अपने पूर्व शिष्य तथा द पैलियोबोटनिस्ट की संपादकीय समिति के सचिव डॉ. आर.वी. सिथोले
                            ने बताया कि प्रो. टी.जी. हाले पैलियोबोटनिकल पक्ष पर उनके काम की समीक्षा करेंगे, और मुझे जीवित पौधों पर
                            उसकी समीक्षा करनी चाहिए, तो मैंने, इसलिए, तुरंत उनके अनुरोध को स्वीकार कर लिया और यह संक्षिप्त
                            रेखाचित्र तैयार करने के लिए निकल पड़ा। साहनी का पहला शोधपत्र जिसका शीर्षक था "जिन्कगो और जीवाश्म पौधों
                            के बीजांडों में विदेशी पराग" 1915 के न्यू फाइटोलॉजिस्ट में प्रकाशित हुआ था, कैम्ब्रिज पहुंचने के कुछ
                            ही साल बाद। यहां उन्होंने मोंटपेलियर से प्राप्त इस पौधे के लगभग एक दर्जन बीजांडों में से कम से कम आठ
                            में जिन्कगो के अलावा अन्य पराग कणों की उपस्थिति दर्ज की। उनमें से अधिकांश में दो प्रोथैलियल कोशिकाओं
                            की उपस्थिति दिखाई दी, जो उनकी अविकसित प्रकृति को दर्शाती है और एक ने अपने व्यास से दोगुनी लंबी ट्यूब
                            बनाने के लिए अंकुरित किया था। हालाँकि यह अपने आप में एक दिलचस्प अवलोकन है और लेखक की विवेकशील शक्ति का
                            काफी संकेत है, यह पेपर का उत्तरार्द्ध है जिसने विशेष रूप से साहनी की आलोचनात्मक अंतर्दृष्टि को उनके
                            करियर के शुरुआती चरण में भी प्रकट किया। उन्होंने लिखा: "यदि जीवाश्म अवस्था में एक समान उदाहरण पाया
                            जाता, तो यह सभी संभावनाओं में पराग कणों और बीजांड को एक ही प्रजाति के संदर्भ में ले जाता"। इसके अलावा,
                            केवल अंकुरण के तथ्य का उपयोग बीजांड में संलग्न जीवाश्म पराग कणों की पहचान के बारे में निष्कर्षों के
                            समर्थन में नहीं किया जा सकता है। साहनी का अगला पेपर, 1915 के न्यू फाइटोलॉजिस्ट में प्रकाशित हुआ,
                            नेफ्रोलेपिस वैलुबिलिस की शारीरिक रचना से संबंधित था, जिसे प्रोफेसर एफ. टी. ब्रूक्स द्वारा कुआलालंपुर,
                            फेडरेटेड मलय राज्यों के पास एकत्र किया गया था, जो उस समय कैम्ब्रिज विश्वविद्यालय के वनस्पति विज्ञान
                            स्कूल में व्याख्याता थे। यह एक बहुत ही विचित्र फर्न है जिसमें मातृ पौधे से उत्पन्न होने वाले बहुत लंबे
                            स्टोलन जंगल के पेड़ों पर 16 मीटर की ऊंचाई तक चढ़ते हैं। अंतराल पर उन पर पैदा हुए पार्श्व पौधे मातृ
                            पौधे से काफी ऊंचाई तक पहुंच जाते हैं जो मिट्टी में जड़ें जमा लेता है। समय-समय पर पूर्व को जमीन पर गिरा
                            दिया जाता है जिसके बाद वे अपनी जड़ें पैदा करते हैं। साहनी ने स्टोलन की शारीरिक रचना और पार्श्व पौधों
                            के मूल प्रोटोस्टेल के डिक्टियोस्टेल में परिवर्तित होने के तरीके का विस्तृत विवरण दिया। दुर्भाग्य से
                            मातृ पौधे का कोई भी हिस्सा उनके पास उपलब्ध नहीं था और इसलिए, अधिक विवरण नहीं दिया जा सका। नेफ्रोलेपिस
                            वैलुबिलिस से साहनी ने नेफ्रोलेपिस वैलुबिलिस के कंदों की संवहनी शारीरिक रचना का अध्ययन किया (न्यू
                            फाइटोलॉजिस्ट, 1916) शाखा स्टोलन का तंतु कंद के आधार में एक ठोस प्रोटोस्टेल के रूप में प्रवेश करता है,
                            लेकिन आंतरिक फ्लोएम, पेरीसाइकिल, एंडोडर्मिस और ग्राउंड ऊतक को प्राप्त करते हुए, एक फ़नल की तरह तेज़ी
                            से फैलता है। अंततः विस्तारित स्टेल अनियमित आकृतियों और आकारों के अंतराल से अलग स्पर्शरेखा रूप से चपटे
                            तंतुओं के एक खोखले नेटवर्क में टूट जाता है। कंद के शीर्ष की ओर तंतु फिर से एक एकल प्रोटोस्टेल बनाने के
                            लिए अभिसरित होते हैं। नेफ्रोलेपिस पर अपने शोधपत्रों के प्रकाशन के तुरंत बाद, साहनी ने "फिलिकेल्स में
                            शाखाओं के विकास" पर सुदबरी-हार्डीमैन पुरस्कार के लिए एक शोध प्रबंध प्रस्तुत किया, जिसे 1917 के न्यू
                            फाइटोलॉजिस्ट में प्रकाशित किया गया था। इसमें उन्होंने दिखाया कि एक नियम के रूप में शाखाएँ पत्तियों के
                            संबंध में कोई नियमित स्थिति नहीं रखती हैं और उन मामलों में जहाँ ऐसा संबंध पाया जाता है”, यह संबंध,
                            अपने विकासवादी मूल में, संभावित जैविक लाभों के कारण एक द्वितीयक घटना है, जिनमें से एक युवा कली की
                            सुरक्षा हो सकती है। न्यू कैलेडोनिया प्रशांत के कुछ अन्य द्वीपों के साथ साझा करता है

                        </p>
                    </div>


                    @else
                    <div class="col-md-12">
                        <h5>Professor Sahni’s Contributions on Living Plants (By P. Maheshwari, Palaeobotanist 1:17-21) </h5>
                        <div class="divider"></div>
                        <p class="normal-text">
                            In its historical aspect science may be likened to a tree which is constantly branching as the sum
                            total of knowledge grows larger and larger and a subdivision of the field becomes necessary.
                            Occasionally, a bud of special vigour appears and gives rise to a branch so dominating and important
                            that it changes the contour of the whole organic body. An event of this nature seems to have happened
                            in Indian Botany when the young Sahni graduated from Lahore in 1911 and proceeded to England to study
                            further in the Botany School of the Cambridge University. Coming under the influence of a great master
                            like the late Prof. A. C. Seward, he learnt rapidly, gained much insight and experience in the
                            morphology of living as well as fossil plants and started a flourishing school of research on his
                            return to India, which is now well known allover the world.</p>
                        <p class="normal-text">It is commonly believed that Prof. Sahni was a palaeobotanist, and that it was
                            his work in this field which brought him many distinctions like the Fellowship of the Royal Society
                            and the Presidentship of the Indian Science Congress. While this is essentially true, those like the
                            present writer, who came in personal touch with him, would at once agree that he was a botanist of
                            very wide interests, eager to take advantage of every opportunity in advancing our knowledge of plant
                            life. When I was told by Dr. R. V. Sitholey, a former pupil of Prof. Sahni and my own, and Secretary
                            to the Editorial Committee of The Palaeobotanist, that Prof. T. G. Halle would review his work on the
                            palaeobotanical side, and that I should review that on living plants, I, therefore, readily acceded to
                            his request and set out to prepare this brief sketch.</p>
                        <p class="normal-text">Sahni's first paper entitled "Foreign Pollen in the Ovules of Ginkgo and of
                            Fossil Plants" was published in the New Phytologist of 1915, only a few years after he reached
                            Cambridge. Here he recorded the presence of pollen grains other than those of Ginkgo in no less than
                            eight out of about a dozen ovules of this plant obtained from Montpellier. Most of them showed the
                            presence of two prothallial cells thus indicating their abietineous nature and one had germinated to
                            form a tube twice as long as its own diameter.</p>
                        <p class="normal-text">Although an interesting observation in itself and quite indicative of the
                            discerning power of the author, it is the latter part of the paper which specially revealed Sahni's
                            critical insight even at that early stage of his career. He notes: “If a similar example were found in
                            a fossil state, it would in all probability have led to a reference of the pollen grains and ovule to
                            the same species". Further, the mere fact of germination cannot be used in support of conclusions
                            regarding the identity of fossil pollen-grains found enclosed in ovules ".</p>
                        <p class="normal-text">Sahni's next paper, published in the New Phytologist of 1915, dealt with the
                            anatomy of Nephrolepis valubilis, collected near Kuala Lumpur, Federated Malay States, by Prof. F. T.
                            Brooks, at that time Lecturer in the Botany School of the Cambridge University. This is a very
                            peculiar fern in which the enormously long stolons arising from the mother plant scale forest trees to
                            a height of 16 metres. The lateral plants borne on them at intervals reach heights considerably above
                            the mother plant which is rooted in the soil. Periodically the former are shed to the ground after
                            which they produce their own roots. Sahni gave a detailed account of the anatomy of the stolon and the
                            manner in which the basal protostele of the lateral plants becomes modified into a dictyostele.
                            Unfortunately no part of the mother plant was available to him and, therefore, a fuller account could
                            not be given.</p>
                        <p class="normal-text">From N ephrolepis valubilis Sahni proceeded to a study of the vascular anatomy of
                            the tubers of N. cordifolia (New Phytologist, 1916) which are formed as terminal swellings of short
                            branches of the underground stolons. The influence of the size factor on internal structure was very
                            evident in this case. The strand of the branch stolon enters the base of the tuber as a solid
                            protostele but rapidly expands in a funnel-like fashion, acquiring internal phloem, pericycle,
                            endodermis and ground tissue. Eventually the expanded stele breaks up into a hollow network of
                            tangentially flattened strands separated by gaps of irregular shapes and sizes. Towards the apex of
                            the tuber the strands converge again to form a single protostele.</p>
                        <p class="normal-text">Soon after the publication of his papers on Nephrolepis, Sahni submitted a
                            dissertation for the Sudbury-Hardyman Prize on the "Evolution of Branching in the Filicales" which was
                            published in the New Phytologist of 1917. In this he showed that as a rule the branches do not hold
                            any regular position with respect to leaves and those cases where such a relationship is found”, this
                            association is, in its evolutionary origin, a secondary phenomenon attributable to possible biological
                            advantages, one of which may be the protection of the young bud ". New Caledonia shares with some
                            other islands of the Pacific the possession of a large number of endemic species which are of great
                            interest to the morphologist and systematist. Prof. R. H. Compton of South Africa, who visited these
                            islands in 1914, collected a number of plants among which was also the rare and little known conifer
                            Acmopyle pancheri. Originally named by Pancher as Podocarpus pectinata, then renamed by Brongniart and
                            Gris (1869) as Dacrydium pancheri, this plant was finally transferred by Pilger to a new genus of
                            doubtful affinity. The generic name Acmopyle, which he gave to it, refers to the so-called apical
                            position of the micropyle although actually it is not quite so.</p>
                        <p class="normal-text">The material collected by Compton was rather fragmentary and poorly preserved,
                            but Sahni was able to produce a fairly exhaustive work on the morphology and anatomy of this plant
                            which was submitted to the London University as a part of his D.Sc. thesis in 1919 and published one
                            year later in the Philosophical Transactions of the Royal Society.</p>
                        <p class="normal-text">Although Coulter and Chamberlain (1917) placed Acmopyle in the Taxineae and the
                            same procedure was followed by Chamberlain (1935) in his book on Gymnosperms, Sahni's work has made it
                            clear that this genus is very similar to Podocarpus in the vegetative anatomy of the root, stem and
                            leaf. Marked similarities also exist in the structure of the male cones, microsporophylls and pollen
                            grains, the drupaceous character of the seed, and the organization of the female gametophyte and young
                            embryo. The only important differences between the two genera are that in Acmopyle the mature seed is
                            nearly erect, the epimatium is fused to the integument even in the region of the micropyle, and the
                            vascular supply of the ovule is much better developed than in Podocarpus. Taking the sum total of the
                            characters, however, it was clear that Acmopyle had to be classed in the Podocarpaceae, perhaps as one
                            of its most highly specialized members.</p>
                        <p class="normal-text">In the theoretical part of the paper Sahni proposed a division of the Gymnosperms
                            into two broad groups: (a) Phyllosperms, with seeds borne upon the leaves; and (b) Stachyosperms, with
                            seeds borne either directly upon an axis or upon a structure which is probably some modification of an
                            axis. The Phyllosperms included the Pteridosperms and Cycadales (also the Caytoniales), and the
                            Stachyosperms included the Cordaitales, Ginkgoales, Coniferales, Taxales and Gnetales. The position of
                            the Bennettitales remained doubtful owing to the uncertainty regarding the morphological nature of
                            their ovule-bearing stalks. As remarked by Florin (Botanical Gazettel, 1948) Sahni's view that these
                            two groups constitute a natural assemblage receives considerable support from the results of recent
                            researches on the morphology and phylogeny of the Palaeozoic and Mesozoic conifers.
                            An important point here is the breaking up of the stele and the formation of gaps without any
                            influence from leaf traces which in normal fern rhizomes have been held to be the dominating factors
                            in the evolution of a dictyostele.</p>
                        <p class="normal-text">Soon after the publication of his papers on Nephrolepis, Sahni submitted a
                            dissertation for the Sudbury-Hardyman Prize on the "Evolution of Branching in the Filicales" which was
                            published in the New Phytologist of 1917. In this he showed that as a rule the branches do not hold
                            any regular position with respect to leaves and those cases where such a relationship is found”, this
                            association is, in its evolutionary origin, a secondary phenomenon attributable to possible biological
                            advantages, one of which may be the protection of the young bud ". New Caledonia shares with some
                            other islands of the Pacific the possession of a large number of endemic species which are of great
                            interest to the morphologist and systematist. Prof. R. H. Compton of South Africa, who visited these
                            islands in 1914, collected a number of plants among which was also the rare and little known conifer
                            Acmopyle pancheri. Originally named by Pancher as Podocarpus pectinata, then renamed by Brongniart and
                            Gris (1869) as Dacrydium pancheri, this plant was finally transferred by Pilger to a new genus of
                            doubtful affinity. The generic name Acmopyle, which he gave to it, refers to the so-called apical
                            position of the micropyle although actually it is not quite so.
                            The material collected by Compton was rather fragmentary and poorly preserved, but Sahni was able to
                            produce a fairly exhaustive work on the morphology and anatomy of this plant which was submitted to
                            the London University as a part of his D.Sc. thesis in 1919 and published one year later in the
                            Philosophical Transactions of the Royal Society.</p>
                        <p class="normal-text">Although Coulter and Chamberlain (1917) placed Acmopyle in the Taxineae and the
                            same procedure was followed by Chamberlain (1935) in his book on Gymnosperms, Sahni's work has made it
                            clear that this genus is very similar to Podocarpus in the vegetative anatomy of the root, stem and
                            leaf. Marked similarities also exist in the structure of the male cones, microsporophylls and pollen
                            grains, the drupaceous character of the seed, and the organization of the female gametophyte and young
                            embryo. The only important differences between the two genera are that in Acmopyle the mature seed is
                            nearly erect, the epimatium is fused to the integument even in the region of the micropyle, and the
                            vascular supply of the ovule is much better developed than in Podocarpus. Taking the sum total of the
                            characters, however, it was clear that Acmopyle had to be classed in the Podocarpaceae, perhaps as one
                            of its most highly specialized members.</p>
                        <p class="normal-text">In the theoretical part of the paper Sahni proposed a division of the Gymnosperms
                            into two broad groups: (a) Phyllosperms, with seeds borne upon the leaves; and (b) Stachyosperms, with
                            seeds borne either directly upon an axis or upon a structure which is probably some modification of an
                            axis. The Phyllosperms included the Pteridosperms and Cycadales (also the Caytoniales), and the
                            Stachyosperms included the Cordaitales, Ginkgoales, Coniferales, Taxales and Gnetales. The position of
                            the Bennettitales remained doubtful owing to the uncertainty regarding the morphological nature of
                            their ovule-bearing stalks. As remarked by Florin (Botanical Gazettel, 1948) Sahni's view that these
                            two groups constitute a natural assemblage receives considerable support from the results of recent
                            researches on the morphology and phylogeny of the Palaeozoic and Mesozoic conifers.</p>
                        <p class="normal-text">In the year 1920 Sahni published another' paper dealing with seed structure of
                            Taxus and suggested that the Palaeozoic seeds Cycadinocarpus, Rhabdospermum, Mitrospermum and
                            Taxospermum, all belonging to the Cordaitales, illustrated the general tendency which may have
                            operated in producing the types of seeds found in Taxus, Torreya and, Cephalotaxus. He further
                            proposed that these three genera were sufficiently apart from the rest of the conifers to merit their
                            being placed in a separate order Taxales. It is interesting to observe that recently Florin (Botanical
                            Gazette, 1948) has accepted this view, which is a fine testimony to the shrewdness and insight of
                            Sahni even during his pre-doctorate days.</p>
                        <p class="normal-text">Sahni's interest in the Taxales led him to cut some sections of the seeds of
                            Cephalotaxus pedunculata in which he discovered the presence of an apical prolongation of the female
                            gametophyte, which surrounded by a moat-like depression into which the archegonia open, props up the
                            nucellar membrane ( somewhat like a tent-pole. Since the tentpole is also found in several
                            Cordaitalean: seeds, he took it to be a further evidence of the close affinity between the two groups.
                            In 1924 Prof. Sahni, then Head of the Department of Botany at the Lucknow University, was elected
                            President of the Indian Botanical Society which had been founded only three years earlier as the
                            result of his own efforts and those of Profs. W. Dudgeon (Allahabad), S. R. Kashyap: (Lahore) and K.
                            Rangachari (Madras), none of whom is with us any more. The subject of Prof. Sahni's presidential
                            address was "The Ontogeny of Vascular Plants and the Theory of Recapitulation". Although formulated
                            for all living organisms, the theory of recapitulation had so far derived its chief support from the
                            zoological side. Sahni took pains to show that an equally convincing case could be made out for it on
                            the botanical side. He cited numerous examples from ferns to support his contention, but did not fail
                            to draw upon the gymnosperms and angiosperms and even the algae and bryophytes, and made a
                            contribution which is fully indicative of his scholarliness and powers of reviewing facts.</p>
                        <p class="normal-text">The brilliant discoveries of Kidston and Lang and the great resemblances between
                            the Psilophytales and Psilotales inspired Sahni into some studies on the latter. In 1923 he published
                            a short paper entitled “On the Theoretical Significance of Certain So-called Abnormalities in the
                            Sporangiophores of Psilotum and Tmespteris" based on some material of these plants collected from New
                            Caledonia by Prof. R. H. Compton. He concluded that the sporangiophores of the Psilotales are not
                            forked sporophylls but axial organs comparable with the branched sporangium-tipped axes of the
                            Psilophytales.
                            This short paper was followed by a larger and more detailed contribution published in the
                            Philosophical Transactions of the Royal Society (1925) in which Sahni gave a very complete account of
                            the morphology and anatomy of the rare species, Tmesipteris V ieiuardi. The erect and terrestrial
                            habit and presence of medullary xylem in the stem distinguish this plant from the more common T.
                            tannensis which grows as a pendant epiphyte and is devoid of any xylem elements in the pith. Sahni
                            correctly compared the medullary xylem of the former with the central caulinexylem in the steles of
                            Asteroxylon and Lycopodium and concluded that the Psilotales, especially Tmesipteris, offered a closer
                            resemblance to the Devonian genus Asteroxylon than had been suspected up to that time.
                            Another piece of work started by Sahni at Cambridge but completed only after his return to India (in
                            collaboration with his pupil A. K. Mitra) deals with the anatomy of some New Zealand species of
                            Dacrydium. As a result of this study one of these species, D. Bidwilli, had to be transferred to the
                            genus Podocarpus. Another, D. laxifolium, was found to be peculiar in the absence of all traces of
                            xylem parenchyma and of resin or mucilage canals in the stem, leaves or ovules. The article is
                            concluded with a criticism of the view that Podocarpus is the most primitive member of the
                            Podocarpaceae. The authors express the opinion that Dacrydium is the more primitive genus which gave
                            rise on the one hand to Podocarpus (by inversion of the ovule) and on the other hand to Asteroxylon(by
                            increasing succulence and fusion of the epimatium with the integument).</p>
                        <p class="normal-text">During his younger days Prof. Sahni was very fond of long treks in the hills.
                            Once in 1908, when he was yet a college student, and again in 1920, soon after his return from
                            Cambridge, he set out on a walking tour from Lahore to Ladakh via Chamba and the Bara Lecha.' About 8
                            miles from Chamba was the village of Khajiar with a beautiful meadow and lake set in the midst of a
                            dense forest at a height of about 6,400 ft. above sea level. A curious feature of the lake is a small
                            island thickly overgrown with tall reeds and gliding over the water like a sailing vessel before a
                            breeze. Sahni was naturally attracted by the sight of this island and presented his observations in a
                            paper entitled "A Note on the Floating Island and Vegetation of Khajiar, near Chamba in the N.W.
                            Himalayas" (Journal of the Indian Botanical Society, 1927), which again speaks of his great power of
                            taking advantage of every situation and pursuing any idea with keenness and determination. Although
                            the facts outlined by him were inadequate for a reconstruction of the precise origin or history of the
                            floating island, there seems to be no reason to doubt his view that there once arose around the lake
                            an extensive reed fen of which the islet was the only persisting relic, detached like the “Plav" of
                            the Danube described by M. Pallis in the Journal of the Linnean Society of 1916.</p>
                        <p class="normal-text">During his memorable voyage of the “Beagle" Captain Fitz Roy discovered a new
                            monotypic conifer named Fitzroya patagonica, some material of which was passed on to Sahni by Prof. A.
                            C. Seward during his Cambridge days. This he studied in co-operation with T. C. N. Singh on his return
                            to India (Journal of the Indian Botanical Society, 1931). Besides some peculiarities in the anatomy of
                            the leaf they described the three curious gland-like organs which are found in this plant at the apex
                            of the female cone alternating with the last whorl of scales. Their exact morphological nature still
                            remains problematical. The authors called attention to their superficial resemblance with naked nuclei
                            (i.e. ovules devoid of integuments) but wisely refrained from any further commitment on their
                            homologies.
                            While searching for flowers on a young Ginkgo tree at Lahore in 1920, Sahni noticed some abnormal
                            leaves shaped like the ascidia found in Ficus Krishnae and certain garden varieties of Codiaeum
                            variegatum. The two lower margins of the triangular lamina, which in a normal leaf converge into the
                            petiole, were bent over and fused on the upper side so as to make a funnel. While no morphological
                            significance was attributed to this abnormality, Sahni (Journal of the Indian Botanical Society, 1933)
                            quoted numerous instances of the occurrence of similar ascidia in several Mesozoic and Tertiary
                            species of Ginkgo, Ginkgoites, Ginkgodium and Baiera. He ends the paper with a cryptic note: "It is
                            indeed strange how these peculiarities sometimes tend to persist through geological time".
                            While most university men in India look upon the summer vacation as a time of rest and pause in some
                            hill station, this was hardly so with Sahni. He used to spend this time botanizing in Kashmir, Almora,
                            Lansdowne and other places in the Himalayas. Away from the din and bustle of Lucknow and the pressing
                            duties of his office, it was in these summer months that he used to do much of his thinking and
                            planning, writing of manuscripts, and even active work at the microscope. During one of these visits
                            to Lansdowne, Garhwal (Western Himalayas), he made some interesting observations on the fruits and
                            seeds of Viscum japonicum Thunb. now called Korthalsella opuntia Merr. This is a very common parasite
                            in the lower Himalayas on Quercus incana and at Lansdowne there is hardly an oak tree which is free
                            from one or more bunches of it. The minute obovoid fruits ripen in the rainy season during the month
                            of July and the seeds are ejected with some force to a distance of two feet or more. Microscopic
                            examination revealed that this is due to the occurrence of a viscid layer in the fruit which swells in
                            the presence of moisture and causes an all-round internal pressure on the seed which is relieved only
                            by a rupture of the fruit at its apical end and a shooting out of the seed in manner comparable to the
                            discharge of a bullet. Prof. Sahni very kindly passed on some material of this plant to me for a more
                            detailed investigation and refers to this in his paper published in the Journal of the Indian
                            Botanical Society of 1933. This work, I am glad to say, is now nearing completion and will be
                            published elsewhere in due course.</p>
                        <p class="normal-text">In 1935 Sahni wrote a short but interesting paper entitled “The Roots of
                            Psaronius, Intra-cortical or Extra-cortical? A Discussion" in which some very interesting observations
                            were recorded on the anatomy of the roots of Asphodelus tenuifolius (see also MEHTA, 1934; and PANT,
                            19425) which is a common weed in north India during the winter season. Unlike other monocotyledons
                            this plant has a main root which persists like that of a dicotyledon. The younger roots grow
                            vertically downward through the cortex of this root which becomes greatly distorted. This is made
                            possible by the activity of a peripheral cortical cambium which gives rise to several layers of
                            periderm. The younger rootlets contribute to the girth by the formation of peripheral periderms of
                            their own but these periderms are developed only on their outer sides, where they are in contact with
                            the main periderm. In a full-grown plant a transverse section of the root presents a baffling
                            appearance with as many as a hundred or more intra-cortical roots packed around the centrally placed
                            stele of the main root. These roots are usually so densely crowded that the original cortex of the
                            main root is practically all crushed and disorganized. At the lower end of the plant the roots are
                            seen breaking through the sheathing periderm, either singly or in thongs of two or more, which
                            themselves become resolved into their constituents at still lower levels.
                            What significance these observations have in our understanding of the anatomy of Psaronius is for
                            palaeobotanists to judge but Prof. Sahni felt that the compact root zone seen around the stele is a
                            part of the stem itself being formed by the presence of many roots growing down through the cortex.
                            The paper on the anatomy of the roots of Asphodelus was perhaps the last of Sahni's major
                            contributions to plant morphology, and although his interest in living plants never faded, his own
                            studies henceforth were devoted almost exclusively to palaeobotanical, geological and archaeological
                            investigations. Even so he inspired many young man in India into studies on living plants. No
                            reference to him would, therefore, be complete without a brief mention of the work of some of his
                            pupils in this line.</p>
                        <p class="normal-text">While Professor of Botany at the Banaras Hindu University for a few months, Sahni
                            encouraged N. K. Tiwary, himself a very senior botanist in India; to work on the origin of the
                            polyembryonate condition in Eugenia. At Lucknow the first to come under his fold were S. K. Pande who
                            has worked actively on the morphology and biology of the liverworts for upwards of twenty-five years;
                            T. C. N. Singh, now Professor of Botany at the Annamalai University, who interested himself in the
                            anatomy of ferns; and the late S. K. Mukherji who later went abroad and specialized in Ecology and
                            Soil Science. K. M. Gupta, now Professor of Botany at the Dungar College, Bikaner, worked on the
                            anatomy of some homoxylous woods and described the mode of reproduction in a moss, Physcomitrellopsis
                            indica, collected by Sahni from Banaras; and K. N. Kaul, Professor of Botany at the Agricultural
                            College, Kanpur, sought to classify the palms on the basis of the structure of the ground tissue of
                            the stems. In addition, H. S. Rao, now at the Forest Research Institute, Dehra Dun, contributed an
                            important paper on the structure and lifehistory of Azolla pinnata, which was, no doubt, inspired by
                            Sahni's great interest at that time in the fossil history and past distribution of Hydropterideae; N.
                            P. Chowdhury ( 1937) made a detailed study of the anatomy of some Indian species of Lycopodium; D. D.
                            Pant ( 1942), now at the University of Allahabad, produced a detailed account of the anatomy of the
                            roots of Asphodelus tenuifolius; and Bahadur Singh has given an interesting account of the embryology
                            and anatomy of Dendrophthoe falcata which is in course of publication.
                            In flesh and blood Sahni is no more with us, but the torch he lighted during the last thirty years now
                            bums more brightly than ever and the foundation of a research institute after his name will always be
                            a reminder of the great man who brought it into existence.</p>
                    </div>


                    @endif

                </div>



            </div>
        </div>
    </div>
</section>
@endsection