@extends('website.layouts.app')

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
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'कॉपीराइट नीति' : 'Copyright Policy' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container my-5">
            <h1 class="mb-4 text-center">{{ $language === 'hi' ? 'कॉपीराइट नीतियाँ' : 'Copyright Policies' }}</h1>

            <!-- Copyright -->
            <section class="p-4 rounded mb-4 section-copyright">
                <div class="policy-header">{{ $language === 'hi' ? 'कॉपीराइट नीति' : 'Copyright Policy' }}</div>
                <p>{!! $language === 'hi'
                    ? '<strong>बीरबल साहनी पुराविज्ञान संस्थान (बीएसआईपी)</strong> की आधिकारिक वेबसाइट पर प्रदर्शित सभी सामग्री को किसी भी प्रारूप या माध्यम में निःशुल्क पुनरुत्पादित किया जा सकता है, बशर्ते कि पुनरुत्पादन सटीक हो और उसे भ्रामक संदर्भ में प्रस्तुत न किया गया हो या अपमानजनक तरीके से इस्तेमाल न किया गया हो।
                                जहां कोई बीएसआईपी सामग्री प्रकाशित की जा रही हो या दूसरों को वितरित की जा रही हो, वहां स्रोत को प्रमुखता से स्वीकार किया जाना चाहिए:'
                    : "All material featured on the official website of the <strong>Birbal Sahni Institute of Palaeosciences (BSIP)</strong> may be reproduced free of charge in any format or medium, provided that the reproduction is accurate and is not presented in a misleading context or used in a derogatory manner.
                                Where any BSIP material is being published or distributed to others, the source must be prominently acknowledged as:" !!}
                </p>
                <p>{!! $language === 'hi'
                    ? '<strong>"स्रोत: बीरबल साहनी जीवाश्म विज्ञान संस्थान (BSIP)"</strong><br>
                यह पुनरुत्पादन की अनुमति उन सामग्रियों पर लागू नहीं होती जो स्पष्ट रूप से किसी तृतीय पक्ष के कॉपीराइट के अंतर्गत आती हैं। ऐसी सामग्री के पुनरुत्पादन के लिए संबंधित कॉपीराइट धारकों से स्वतंत्र अनुमति प्राप्त करना आवश्यक होगा, क्योंकि BSIP के पास ऐसी सामग्री को पुनः प्रस्तुत करने का अधिकार नहीं है।
                BSIP को यह अधिकार है कि वह इस नीति को किसी भी समय, बिना पूर्व सूचना के संशोधित या वापस ले सकता है।'
                    : '<strong>"Source: Birbal Sahni Institute of Palaeosciences (BSIP)".</strong><br>
                This permission to reproduce BSIP material does not apply to content explicitly identified as the copyright of a third party. For such materials, authorization must be obtained directly from the concerned copyright holders, as BSIP does not hold the rights to grant such permission.
                BSIP reserves the right to revise or withdraw this policy at any time without prior notice.' !!}
                </p>
            </section>

        </div>
    </section>
    <style>
        .policy-header {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .section-standardisation {
            background-color: #e3f2fd;
        }

        .section-copyright {
            background-color: #e3f2fd;
        }

        .section-hyperlinking {
            background-color: #e3f2fd;
        }

        .section-privacy {
            background-color: #e3f2fd;
        }

        .section-terms {
            background-color: #e3f2fd;
        }
    </style>
@endsection
