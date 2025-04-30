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
                        <p>{{ $language === 'hi' ? 'परामर्श सेवा/अनुबंध प्रशिक्षण भारतीय/विदेशी दर' : 'Consultancy Service/Contract Training Indian/Foreign Rate' }}
                        </p>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ $language === 'hi' ? 'क्रमांक' : 'S. No.' }}</th>
                                    <th>{{ $language === 'hi' ? 'आइटम' : 'Item' }}</th>
                                    <th>{{ $language === 'hi' ? 'भारतीय - INR' : 'Charges (India - INR)' }}</th>
                                    <th>{{ $language === 'hi' ? 'विदेशी - USD' : 'Charges (Foreign - USD)' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="3">1</td>
                                    <td>{{ $language === 'hi' ? 'पैलिनोलॉजी में अनुबंध प्रशिक्षण दरें (4 सप्ताह, 5 दिन प्रति सप्ताह)' : 'Contract training rates in palynology (4 weeks, 5 days per week)' }}
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'i. पैलिनोलॉजिकल अध्ययन के लिए तकनीक (सूक्ष्मदर्शी, आदि)' : 'i. Techniques for palynological studies (microscope, etc.)' }}
                                    </td>
                                    <td>Rs. 10,000 (Academic) / Rs. 20,000 (Industries)</td>
                                    <td>$250 (Academic) / $500 (Industries)</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'ii. पैलिनोलॉजिकल अध्ययन' : 'ii. Palynological studies' }}
                                    </td>
                                    <td>Rs. 15,000 per trainee</td>
                                    <td>$350</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'iii. अतिरिक्त सप्ताह' : 'iii. Additional weeks' }}</td>
                                    <td>{{ $language === 'hi' ? 'Rs. 5,000 प्रति सप्ताह प्रति प्रशिक्षु' : 'Rs. 5,000 per week per trainee' }}
                                    </td>
                                    <td>{{ $language === 'hi' ? '$120' : '$120' }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="2">2</td>
                                    <td>{{ $language === 'hi' ? 'कोयला/लिग्नाइट पेट्रोग्राफी में अनुबंध प्रशिक्षण (4 सप्ताह, 5 दिन प्रति सप्ताह)' : 'Contract training in coal/lignite petrography (4 weeks, 5 days per week)' }}
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'i. कार्यरत कर्मचारियों के लिए प्रशिक्षण' : 'i. Training for working staff' }}
                                    </td>
                                    <td>{{ $language === 'hi' ? 'Rs. 20,000 प्रति प्रशिक्षु' : 'Rs. 20,000 per trainee' }}
                                    </td>
                                    <td>{{ $language === 'hi' ? '$500' : '$500' }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ $language === 'hi' ? 'ii. अतिरिक्त अवधि (4 सप्ताह से अधिक)' : 'ii. Additional period (more than 4 weeks)' }}
                                    </td>
                                    <td>{{ $language === 'hi' ? 'Rs. 10,000 प्रति प्रशिक्षु' : 'Rs. 10,000 per trainee' }}
                                    </td>
                                    <td>{{ $language === 'hi' ? '$250' : '$250' }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="4">3</td>
                                    <td>{{ $language === 'hi' ? 'भौतिक रसायन विज्ञान और OSL डेटिंग में अनुबंध प्रशिक्षण (4 सप्ताह, 5 दिन प्रति सप्ताह)' : 'Contract training in Geochemistry and OSL dating (4 weeks, 5 days per week)' }}
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'i. तत्वीय विश्लेषण ICP-MS द्वारा' : 'i. Elemental analysis by ICP-MS' }}
                                    </td>
                                    <td>Rs. 10,000</td>
                                    <td>$250</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'ii. आइसोटोपिक विश्लेषण IRMS द्वारा' : 'ii. Isotopic analysis by IRMS' }}
                                    </td>
                                    <td>Rs. 10,000</td>
                                    <td>$250</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'iii. कार्बनिक यौगिक विश्लेषण GC-MS द्वारा' : 'iii. Organic compound analysis by GC-MS' }}
                                    </td>
                                    <td>Rs. 10,000</td>
                                    <td>$250</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ $language === 'hi' ? 'iv. OSL डेटिंग तकनीक' : 'iv. OSL dating technique' }}</td>
                                    <td>Rs. 10,000</td>
                                    <td>$250</td>
                                </tr>
                            </tbody>
                        </table>

                        <p><strong>{{ $language === 'hi' ? 'नोट:' : 'Note:' }}</strong>
                            {{ $language === 'hi'
                                ? 'सरकारी मानदंडों के अनुसार सेवा कर + शिक्षा उपकर (या अन्य लगाए गए कर) अतिरिक्त वसूले जाएंगे।'
                                : 'Service Tax + Education Cess (or other levied taxes) will be charged extra  as
                                                        per Government norms.' }}
                        </p>
                        <p><em>* {{ $language === 'hi' ? 'यह सुविधा जल्द ही काम करना शुरू कर देगी।':'This facility will start functioning soon.' }}</em></p>
                        <p><em>** {{ $language === 'hi' ? 'भारतीय शैक्षणिक संस्थानों के शोध छात्रों के लिए प्रशिक्षण निःशुल्क है (प्रति वित्तीय वर्ष छह छात्रों तक सीमित)। छात्रों को भोजन, आवास और यदि आवश्यक हो तो नमूनों की रासायनिक प्रसंस्करण की व्यवस्था करनी होगी।':'Training is free for research students from Indian academic institutions (limited to six
                                students per financial year). Students must arrange meals, accommodation, and chemical
                                processing of
                                samples if needed.'}}</em></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
