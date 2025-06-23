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

                <div class="col-md-9 content">
                    <div>
                        <h3>{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                        <div class="divider"></div>
                        <p>{{ $language === 'hi'
                            ? 'संस्थान ने पैलियोबोटैनिकल शोध के विभिन्न क्षेत्रों में महत्वपूर्ण और अंतःविषयक परिणाम प्राप्त करने के लिए कई संगठनों के साथ सहयोग और घनिष्ठ संपर्क स्थापित किया है। महत्वपूर्ण संगठनों में भारतीय भूवैज्ञानिक सर्वेक्षण, कई विश्वविद्यालयों के भूविज्ञान विभाग, भौतिक अनुसंधान प्रयोगशाला, तेल और प्राकृतिक गैस आयोग, ऑयल इंडिया लिमिटेड, कोल इंडिया लिमिटेड, कोयला खान योजना और डिजाइन संस्थान, वैज्ञानिक और औद्योगिक अनुसंधान प्रयोगशाला परिषद, नेवेली लिग्नाइट कॉर्पोरेशन, खनिज अन्वेषण निगम लिमिटेड, भारतीय प्रौद्योगिकी संस्थान, इंस्टीट्यूट फ्रैंकेइस डी पांडिचेरी, भारतीय वनस्पति सर्वेक्षण, वन अनुसंधान संस्थान, देहरादून, भाभा परमाणु अनुसंधान केंद्र, विज्ञान और प्रौद्योगिकी विभाग के तहत प्रयोगशालाएँ, भारतीय पुरातत्व सर्वेक्षण, वाडिया हिमालय भूविज्ञान संस्थान और विभिन्न राज्य सरकार और पुरातत्व के विश्वविद्यालय विभाग शामिल हैं।'
                            : 'The Institute has established collaboration and close interaction with a number of organizations
                                                                                                                                                    for
                                                                                                                                                    the accomplishment of significant and interdisciplinary result in the varied thrust areas of
                                                                                                                                                    palaeobotanical researches. Important organizations include Geological Survey of India, Geology
                                                                                                                                                    Departments of several Universities, Physical Research Laboratory, Oil and Natural Gas
                                                                                                                                                    Commission, Oil
                                                                                                                                                    India Limited, Coal India Limited, Coal Mine Planning and Design Institute, Council of
                                                                                                                                                    Scientific and
                                                                                                                                                    Industrial Research Laboratory, Neyveli Lignite Corporation, Mineral Exploration Corporation
                                                                                                                                                    Limited,
                                                                                                                                                    Indian Institute of Technology, Institute Francais de Pondicherry, Botanical Survey of India,
                                                                                                                                                    Forest
                                                                                                                                                    Research Institute, Dehradun, Bhabha Atomic Research Center, Laboratories under Department of
                                                                                                                                                    Science
                                                                                                                                                    and Technology, Archaeological Survey of India, Wadia Institute of Himalayan Geology and
                                                                                                                                                    different State
                                                                                                                                                    Government and University Departments of Archaeology.' }}
                        </p>
                    </div>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>{{ $language === 'hi' ? 'क्र.सं' : 'S.No' }}</th>
                                <th>{{ $language === 'hi' ? 'शीर्षक' : 'Title' }}</th>
                                <th>{{ $language === 'hi' ? 'बाहरी लिंक' : 'External Link' }}</th>
                                <th>{{ $language === 'hi' ? 'पीडीएफ़' : 'PDF' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $language === 'hi' ? 'जर्नल ऑफ़ पालेयोसाइंसेस' : 'Journal of Palaeosciences' }}</td>
                                <td>
                                    <a href="https://www.jpsonline.co.in/index.php/jop" class="btn btn-view-profile btn-sm"
                                        target="_blank" onclick="return confirmExternalLink()">
                                        {{ $language === 'hi' ? 'जर्नल देखें' : 'View Journal' }}
                                        <i class="fas fa-arrow-up-right-from-square"></i>
                                    </a>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
@endsection
