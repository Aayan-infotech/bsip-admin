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
                <ul>
                    <li>
                        <a href="{{ $language === 'hi' ? url('hi') : url('en') }}"
                            aria-label="{{ $language === 'hi' ? 'मुख्य पृष्ठ पर जाएं' : 'Go to Home' }}">
                            {{ $language === 'hi' ? 'मुख्य' : 'Home' }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#"
                            aria-label="{{ $language === 'hi' ? 'रोजगार' : 'Career' }}">{{ $language === 'hi' ? 'रोजगार' : 'Career' }}</a>
                    </li>
                    <li class="active" aria-current="page">
                        {{ $language === 'hi' ? 'कैरियर विज्ञापन' : 'Career Advertisement' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container py-3">
            <div class="row gx-5">
                @include('website.layouts.sidebar', [
                    'menuPages' => $menuPages,
                    'currentPageId' => $currentPageId,
                    'language' => $language,
                    'currentHeaderMenu' => $currentHeaderMenu,
                ])

                <!-- Main Content -->
                <div class="col-md-9 content">
                    <div>
                        <h3 id="notices" tabindex="0">
                            {{ $language === 'hi' ? 'कैरियर विज्ञापन' : 'Career Advertisement' }}</h3>
                        <div class="divider"></div>
                    </div>
                    <table class="table table-hover table-bordered align-middle" aria-describedby="notices">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">{{ $language === 'hi' ? 'क्र.सं' : 'S.No' }}</th>
                                <th scope="col" class="text-center">{{ $language === 'hi' ? 'विवरण' : 'Details' }}</th>
                                <th scope="col" class="text-center">{{ $language === 'hi' ? 'अंतिम तिथि' : 'Last Date' }}
                                </th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'डाउनलोड पीडीएफ' : 'Download PDF' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($career as $index => $job)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $language === 'hi' ? $job->hin_title : $job->title }}</strong>
                                    </td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($job->last_date)->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center">
                                        @if ($job->pdf)
                                            <a href="{{ asset('storage/' . $job->pdf) }}" target="_blank"
                                                onclick="return confirmExternalLink()"
                                                class="btn btn-outline-success btn-sm" role="link"
                                                aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $job->pdf_size }})
                                            MB
                                        @else
                                            <span
                                                class="text-muted">{{ $language === 'hi' ? 'कोई पीडीएफ नहीं' : 'No PDF' }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        {{ $language === 'hi' ? 'कोई नया विज्ञापन उपलब्ध नहीं है।' : 'No new advertisement available.' }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
