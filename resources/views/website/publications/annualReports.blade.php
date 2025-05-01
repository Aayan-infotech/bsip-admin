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
                        <h3>{{ $language === 'hi' ? 'वार्षिक रिपोर्ट' : 'Annual Report' }}</h3>
                        <div class="divider"></div>
                        <p> {{ $language === 'hi'
                            ? 'द्विभाषी (अंग्रेजी / हिंदी) वार्षिक रिपोर्ट अनुसंधान से मिलकर प्रकाशित होती है रिपोर्ट, सम्मेलन में भागीदारी, पुरस्कार, शोध प्रकाशन, स्थापना / संस्थापक दिवस समारोह, वार्षिक लेखा और संबंधित मामले प्रासंगिक ग्राफिक्स और तस्वीरें।'
                            : "Bilingual (English/ Hindi) Annual Report is published consisting of Research reports, conference
                                                                                                                            participation, Awards, Research publications, Foundation/Founder's Day function, Annual Accounts
                                                                                                                            and
                                                                                                                            related matters with relevant graphics and photographs." }}
                        </p>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>{{ $language === 'hi' ? 'वार्षिक रिपोर्ट वर्ष' : 'Annual Report Year' }}</th>
                                <th>{{ $language === 'hi' ? 'हिंदी रिपोर्ट' : 'Hindi Report' }}</th>
                                <th>{{ $language === 'hi' ? 'अंग्रेजी रिपोर्ट' : 'English Report' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($annualReports as $annualReport)
                                <tr>
                                    <td>{{ $language === 'hi' ? $annualReport->report_hin_name : $annualReport->report_name }}
                                    </td>
                                    <td>
                                        @if ($annualReport->report_file_hin)
                                            <a href="{{ $annualReport->report_file_hin }}" class="btn btn-view-profile">
                                                <i class="fas fa-download"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($annualReport->report_file)
                                            <a href="{{ $annualReport->report_file }}" class="btn btn-view-profile">
                                                <i class="fas fa-download"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div>
                        <h3>{{ $language === 'hi' ? 'अभिलेखागार' : 'Archives' }}</h3>
                        <div class="divider"></div>
                        <p> {{ $language === 'hi'
                            ? 'द्विभाषी (अंग्रेजी / हिंदी) वार्षिक रिपोर्ट अनुसंधान से मिलकर प्रकाशित होती है रिपोर्ट, सम्मेलन में भागीदारी, पुरस्कार, शोध प्रकाशन, स्थापना / संस्थापक दिवस समारोह, वार्षिक लेखा और संबंधित मामले प्रासंगिक ग्राफिक्स और तस्वीरें।'
                            : "Bilingual (English/ Hindi) Annual Report is published consisting of Research reports, conference participation, Awards, Research publications, Foundation/Founder's Day function, Annual Accounts and related matters with relevant graphics and photographs." }}
                        </p>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>{{ $language === 'hi' ? 'वार्षिक रिपोर्ट वर्ष' : 'Annual Report Year' }}</th>
                                <th>{{ $language === 'hi' ? 'हिंदी रिपोर्ट' : 'Hindi Report' }}</th>
                                <th>{{ $language === 'hi' ? 'अंग्रेजी रिपोर्ट' : 'English Report' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivedReports as $annualReport)
                                <tr>
                                    <td>{{ $language === 'hi' ? $annualReport->report_hin_name : $annualReport->report_name }}
                                    </td>
                                    <td>
                                        @if ($annualReport->report_file_hin)
                                            <a href="{{ $annualReport->report_file_hin }}" class="btn btn-view-profile">
                                                <i class="fas fa-download"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($annualReport->report_file)
                                            <a href="{{ $annualReport->report_file }}" class="btn btn-view-profile">
                                                <i class="fas fa-download"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
