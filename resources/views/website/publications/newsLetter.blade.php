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
                        <h3>{{ $language === 'hi' ? 'सूचना पत्र' : 'Newsletter' }}</h3>
                        <div class="divider"></div>

                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>{{ $language === 'hi' ? 'सूचना पत्र का शीर्षक' : 'Newsletter Title' }}</th>
                                <th>{{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2009' : 'Newsletter 2009' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2009.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                    {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2008' : 'Newsletter 2008' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2008.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                    {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2007' : 'Newsletter 2007' }}</td>
                                <td><a href="#" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2006' : 'Newsletter 2006' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2006.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2005' : 'Newsletter 2005' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2005.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2004' : 'Newsletter 2004' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2004.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2003' : 'Newsletter 2003' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2003.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2002' : 'Newsletter 2002' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2002.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2001' : 'Newsletter 2001' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2001.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        Download</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 2000' : 'Newsletter 2000' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter2000.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 1999' : 'Newsletter 1999' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter1999.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                            <tr>
                                <td>{{ $language === 'hi' ? 'सूचना पत्र 1998' : 'Newsletter 1998' }}</td>
                                <td><a href="{{ asset('assets-new/assets/newsletter/Newsletter1998.pdf') }}" class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
@endsection
