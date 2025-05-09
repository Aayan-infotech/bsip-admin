@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Welcome to the Birbal Sahni Institute of Palaeosciences (BSIP), India's leading research institute in palaeobotany, palaeobiology, and earth sciences, advancing the study of plant fossils and Earth's history.">
@endpush
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
                        {{ $language === 'hi' ? 'सर्च परिणाम' : 'Search Results' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12"></div>
                @if (count($matchedPages))
                    @foreach ($matchedPages as $page)
                        {{-- @php
                            dd($page['url']);
                        @endphp --}}

                        <div class="col-md-12">
                            <div class="alert alert-secondary" role="alert">
                                <a href="{{ $page['url'] }}" class="text-decoration-none" aria-label="सर्च परिणाम के लिए लिंक">{{ $page['url'] }}</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            {{ $language === 'hi' ? 'कोई परिणाम नहीं मिला' : 'No results found' }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
