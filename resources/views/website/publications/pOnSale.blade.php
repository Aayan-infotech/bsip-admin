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
                    <h3 class="mb-4">{{  $language ==='hi' ? 'बिक्री पर उपलब्ध प्रकाशन':'Publication On Sale'  }}</h3>
                    <div class="divider"></div>
                    <h4 class="mb-3">{{ $language === 'hi' ? 'दी पेलीयोबोटनिस्ट' : 'The Paleobotanist' }}</h4>
                    <div class="table-responsive mb-5">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ $language === 'hi' ? 'वॉल्यूम' : 'Volume' }}</th>
                                    <th>{{ $language === 'hi' ? 'वर्ष' : 'Year' }}</th>
                                    <th>{{ $language === 'hi' ? 'मूल्य (INR)' : 'Price (INR)' }}</th>
                                    <th>{{ $language === 'hi' ? 'मूल्य (USD)' : 'Price (USD)' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 14' : 'Volume 14' }}</td>
                                    <td>1965</td>
                                    <td>60</td>
                                    <td>$13.50</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 15 (1,2)' : 'Volume 15 (1,2)' }}</td>
                                    <td>1966</td>
                                    <td>40</td>
                                    <td>$9.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 21' : 'Volume 21' }}</td>
                                    <td>1972</td>
                                    <td>100</td>
                                    <td>$18.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 22' : 'Volume 22' }}</td>
                                    <td>1973</td>
                                    <td>100</td>
                                    <td>$18.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 23' : 'Volume 23' }}</td>
                                    <td>1974</td>
                                    <td>100</td>
                                    <td>$18.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 24' : 'Volume 24' }}</td>
                                    <td>1975</td>
                                    <td>100</td>
                                    <td>$18.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 25' : 'Volume 25' }}</td>
                                    <td>1976</td>
                                    <td>150</td>
                                    <td>$45.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 26' : 'Volume 26' }}</td>
                                    <td>1977</td>
                                    <td>120</td>
                                    <td>$30.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 27' : 'Volume 27' }}</td>
                                    <td>1978</td>
                                    <td>120</td>
                                    <td>$30.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 28' : 'Volume 28' }}</td>
                                    <td>1979</td>
                                    <td>240</td>
                                    <td>$60.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 29' : 'Volume 29' }}</td>
                                    <td>1980</td>
                                    <td>240</td>
                                    <td>$60.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 30' : 'Volume 30' }}</td>
                                    <td>1981</td>
                                    <td>120</td>
                                    <td>$30.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 31' : 'Volume 31' }}</td>
                                    <td>1982</td>
                                    <td>120</td>
                                    <td>$30.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 32' : 'Volume 32' }}</td>
                                    <td>1983</td>
                                    <td>120</td>
                                    <td>$30.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 33' : 'Volume 33' }}</td>
                                    <td>1984</td>
                                    <td>200</td>
                                    <td>$54.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 34' : 'Volume 34' }}</td>
                                    <td>1985</td>
                                    <td>300</td>
                                    <td>$80.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 35' : 'Volume 35' }}</td>
                                    <td>1986</td>
                                    <td>300</td>
                                    <td>$80.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 36' : 'Volume 36' }}</td>
                                    <td>1987</td>
                                    <td>600</td>
                                    <td>$150.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 37' : 'Volume 37' }}</td>
                                    <td>1988</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 38' : 'Volume 38' }}</td>
                                    <td>1989</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 39' : 'Volume 39' }}</td>
                                    <td>1990</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 40' : 'Volume 40' }}</td>
                                    <td>1991</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 41' : 'Volume 41' }}</td>
                                    <td>1992</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 42' : 'Volume 42' }}</td>
                                    <td>1993</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 43' : 'Volume 43' }}</td>
                                    <td>1994</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 44' : 'Volume 44' }}</td>
                                    <td>1995</td>
                                    <td>900</td>
                                    <td>$90.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 45' : 'Volume 45' }}</td>
                                    <td>1996</td>
                                    <td>750</td>
                                    <td>$105.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 46' : 'Volume 46' }}</td>
                                    <td>1997</td>
                                    <td>750</td>
                                    <td>$105.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 47' : 'Volume 47' }}</td>
                                    <td>1998</td>
                                    <td>750</td>
                                    <td>$105.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 48' : 'Volume 48' }}</td>
                                    <td>1999</td>
                                    <td>750</td>
                                    <td>$105.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 49' : 'Volume 49' }}</td>
                                    <td>2000</td>
                                    <td>1600</td>
                                    <td>$120.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 50' : 'Volume 50' }}</td>
                                    <td>2001</td>
                                    <td>1600</td>
                                    <td>$120.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 51' : 'Volume 51' }}</td>
                                    <td>2002</td>
                                    <td>1600</td>
                                    <td>$120.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 52' : 'Volume 52' }}</td>
                                    <td>2003</td>
                                    <td>1600</td>
                                    <td>$120.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 53' : 'Volume 53' }}</td>
                                    <td>2004</td>
                                    <td>1600</td>
                                    <td>$120.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 54' : 'Volume 54' }}</td>
                                    <td>2005</td>
                                    <td>1600</td>
                                    <td>$120.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'वॉल्यूम 55' : 'Volume 55' }}</td>
                                    <td>2006</td>
                                    <td>1600</td>
                                    <td>$120.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="mb-3">{{ $language === 'hi' ? 'अन्य प्रकाशन' : 'Other Publications' }}</h3>
                    <div class="divider"></div>
                    <div class="table-responsive mb-5">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ $language === 'hi' ? 'शीर्षक' : 'Title' }}</th>
                                    <th>{{ $language === 'hi' ? 'वर्ष' : 'Year' }}</th>
                                    <th>{{ $language === 'hi' ? 'मूल्य (INR)' : 'Price (INR)' }}</th>
                                    <th>{{ $language === 'hi' ? 'मूल्य (USD)' : 'Price (USD)' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'इंडियन गोंडवाना एनोटेटेड सिंपोजिसिस वॉल्यूम I' : 'Indian Gondwana Annotated Symposium Volume I' }}</td>
                                    <td>1994</td>
                                    <td>Rs. 150</td>
                                    <td>$15.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'इंडियन गोंडवाना एनोटेटेड सिंपोजिसिस वॉल्यूम II' : 'Indian Gondwana Annotated Symposium Volume II' }}</td>
                                    <td>—</td>
                                    <td>Rs. 150</td>
                                    <td>$15.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'ग्लोसोप्टेरिस की भारतीय प्रजातियों का पुनरीक्षण' : 'Revision of Indian Species of Glossopteris' }}</td>
                                    <td>1979</td>
                                    <td>Rs. 300</td>
                                    <td>$60.00</td>
                                </tr>
                                <tr>
                                    <td>{{ $language === 'hi' ? 'भारत के कोलिफेरस संसाधन' : 'Coal Resources of India' }}</td>
                                    <td>1995</td>
                                    <td>Rs. 1000</td>
                                    <td>$200.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="alert alert-info">
                       {!!
                        $language === 'hi' ?
                        " <strong>नोट:</strong> दी पेलीयोबोटनिस्ट पर vol.49 (2000) के बाद से
                        20% व्यापार छूट और वर्ष 2000 के बाद से अन्य प्रकाशनों पर 30% छूट इस
                        शर्त के अधीन है कि एजेंटों को अपने ग्राहक का पता प्रदान करना
                        चाहिए।<br /><br />
                        सदस्यता के लिए एक विशेष प्रस्ताव: पांच साल के लिए व्यक्तिगत ग्राहकों
                        के लिए Rs.5000 और संस्थागत ग्राहकों के लिए Rs.6000 भारत के भीतर।
                        विदेशी ग्राहकों के लिए: US$400 (व्यक्तिगत) और US$500 (संस्थान),
                        जिसमें एयरमेल शुल्क शामिल है।<br /><br />
                        1999 तक के प्रकाशन केवल विश्वविद्यालयों के पुस्तकालयों और शैक्षिक
                        संस्थानों को उनके अनुरोध पर मुफ्त दिए जाएंगे।<br /><br />
                        भुगतान अग्रिम में करें और DIRECTOR, BIRBAL SAHNI INSTITUTE OF
                        PALAEOBOTANY, LUCKNOW के पक्ष में भुगतान करें और REGISTRAR, बीरबल
                        साहनी इंस्टीट्यूट ऑफ पैलेओबॉटनी, 53 यूनिवर्सिटी रोड, लखनऊ - 226007
                        को भेजें।":
                        "<strong>Note:</strong> 20% trade discount on The Palaeobotanist from vol.49 (2000) onwards and 30% discount on other publications from the year 2000 onwards subject to the condition that agents should provide their client's address.<br /><br />
A special offer for subscription: Rs.5000 for individual subscribers and Rs.6000 for institutional subscribers for five years within India. For foreign subscribers: US$400 (individual) and US$500 (institution),
including airmail charges.<br /><br />
Publications upto 1999 will be supplied free of cost to University Libraries and Educational
Institutions only on request.<br /><br />
Payment to be made in advance and drawn in favour of DIRECTOR, BIRBAL SAHNI INSTITUTE OF
PALAEOBOTANY, LUCKNOW and send to REGISTRAR, Birbal Sahni Institute of Palaeobotany, 53 University Road, Lucknow - 226007."
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
