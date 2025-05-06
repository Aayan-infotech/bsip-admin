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
                <ul>
                    <li>
                        <a href="{{ $language === 'hi' ? url('hi') : url('en') }}"
                            aria-label="{{ $language === 'hi' ? 'मुख्य पृष्ठ पर जाएं' : 'Go to Home' }}">
                            {{ $language === 'hi' ? 'मुख्य' : 'Home' }}
                        </a>
                    </li>
                    <li class="active" aria-current="page">
                        {{ $language === 'hi' ? 'निविदा' : 'Tenders' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container-fluid py-3">
            <div class="row gx-5">
                <!-- Main Content -->
                <div class="col-md-12 content">
                    <div>
                        <h3 id="notices" tabindex="0">{{ $language === 'hi' ? 'निविदा' : 'Tenders' }}</h3>
                        <div class="divider"></div>
                    </div>
                    <table class="table table-hover table-bordered align-middle" aria-describedby="notices">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">{{ $language === 'hi' ? '#' : '#' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'निविदा संदर्भ' : 'Tender Reference' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'दस्तावेज़ का नाम' : 'Tender Document Name' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'डाउनलोड पीडीएफ' : 'Download PDF' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'प्रारंभ तिथि' : 'Start Date' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'अंतिम तिथि' : 'Last Date' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tenders as $tender)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $tender->reference_no }}</td>
                                    <td>{{ $language === 'hi' ? $tender->hin_title : $tender->title }}</td>
                                    <td class="text-center">
                                        @if ($tender->tender_document)
                                            <a href="{{ asset('storage/' . $tender->tender_document) }}" target="_blank"
                                                class="btn btn-outline-success btn-sm" role="link"
                                                aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $tender->tender_document_size }}) MB
                                        @else
                                            <span
                                                class="text-muted">{{ $language === 'hi' ? 'कोई पीडीएफ नहीं' : 'No PDF' }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($tender->start_date)->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($tender->end_date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        {{ $language === 'hi' ? 'कोई निविदा उपलब्ध नहीं है।' : 'No tenders available.' }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Archived Tenders --}}
                <div class="col-md-12 content">
                    <div>
                        <h3 id="notices" tabindex="0">{{ $language === 'hi' ? 'पुरालेख निविदा' : 'Archived Tenders' }}</h3>
                        <div class="divider"></div>
                    </div>
                    <table class="table table-hover table-bordered align-middle" aria-describedby="notices">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">{{ $language === 'hi' ? '#' : '#' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'निविदा संदर्भ' : 'Tender Reference' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'दस्तावेज़ का नाम' : 'Tender Document Name' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'डाउनलोड पीडीएफ' : 'Download PDF' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'प्रारंभ तिथि' : 'Start Date' }}</th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'अंतिम तिथि' : 'Last Date' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($archivedTenders as $tender)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $tender->reference_no }}</td>
                                    <td>{{ $language === 'hi' ? $tender->hin_title : $tender->title }}</td>
                                    <td class="text-center">
                                        @if ($tender->tender_document)
                                            <a href="{{ asset('storage/' . $tender->tender_document) }}" target="_blank"
                                                class="btn btn-outline-success btn-sm" role="link"
                                                aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $tender->tender_document_size }}) MB
                                        @else
                                            <span
                                                class="text-muted">{{ $language === 'hi' ? 'कोई पीडीएफ नहीं' : 'No PDF' }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($tender->start_date)->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($tender->end_date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        {{ $language === 'hi' ? 'कोई निविदा उपलब्ध नहीं है।' : 'No tenders available.' }}
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
