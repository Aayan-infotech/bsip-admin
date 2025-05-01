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

                    </div>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>{{ $language === 'hi' ? 'ई-पत्रिका शीर्षक' : 'E-Magazine Title' }}</th>
                                <th>{{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $language === 'hi' ? 'ई-पत्रिका भाग 1 (2022)' : 'E-Magazine Part 1 (2022)' }}</td>
                                <td><a href="{{  asset('assets-new/assets/epatrika/e patrika ank 1 2022.pdf')  }}"
                                        class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>

                            <tr>
                                <td>{{ $language === 'hi' ? 'ई-पत्रिका भाग 2 (2023)' : 'E-Magazine Part 2 (2023)' }}</td>
                                <td><a href="{{  asset('assets-new/assets/epatrika/e patrika ank 2 2023.pdf')  }}"
                                        class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>

                            <tr>
                                <td>{{ $language === 'hi' ? 'ई-पत्रिका भाग 3 (2024)' : 'E-Magazine Part 3 (2024)' }}</td>
                                <td><a href="{{  asset('assets-new/assets/epatrika/e patrika ank 3 2024.pdf')  }}"
                                        class="btn btn-view-profile"><i class="fas fa-download"></i>
                                        {{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</a></td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>
@endsection
