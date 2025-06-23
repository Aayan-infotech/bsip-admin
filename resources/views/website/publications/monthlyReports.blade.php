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
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            {{-- <th>Year</th>
                            <th>Month</th>
                            <th>Title</th>
                            <th>Download PDF</th> --}}
                            <tr>
                                <th>{{ $language === 'hi' ? 'क्र.सं' : 'S.No' }}</th>
                                <th>{{ $language === 'hi' ? 'वर्ष' : 'Year' }}</th>
                                <th>{{ $language === 'hi' ? 'महीना' : 'Month' }}</th>
                                <th>{{ $language === 'hi' ? 'शीर्षक' : 'Title' }}</th>
                                <th>{{ $language === 'hi' ? 'डाउनलोड पीडीएफ़' : 'Download PDF' }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($monthlyReports as $monthlyReport)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $monthlyReport->report_year }}</td>
                                    <td>{{ $language === 'hi' ? $monthlyReport->report_month_hin : $monthlyReport->report_month }}</td>
                                    <td>{{ $language === 'hi' ? $monthlyReport->report_hin_name : $monthlyReport->report_name }}
                                    </td>
                                    <td>
                                        @if ($monthlyReport->report_file || $monthlyReport->report_file_hin)
                                            <a href="{{ $language === 'hi' ? $monthlyReport->report_file_hin : $monthlyReport->report_file }}"
                                                class="btn btn-view-profile" target="_blank"
                                                onclick="return confirmExternalLink()">
                                                <i class="fas fa-download"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}
                                            </a>
                                            ({{ $language === 'hi' ? $monthlyReport->report_file_hin_size : $monthlyReport->report_file_size }})
                                            MB
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
