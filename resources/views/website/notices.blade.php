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
                    <a href="{{ $language === 'hi' ? url('hi') : url('en') }}" aria-label="{{ $language === 'hi' ? 'मुख्य पृष्ठ पर जाएं' : 'Go to Home' }}">
                        {{ $language === 'hi' ? 'मुख्य' : 'Home' }}
                    </a>
                </li>
                <li class="active" aria-current="page">
                    {{ $language === 'hi' ? 'सूचना/अद्यतन' : 'Notice/ Updates' }}
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
                    <h3 id="notices" tabindex="0">{{ $language === 'hi' ? 'सूचना/अद्यतन' : 'Notice/ Updates' }}</h3>
                    <div class="divider"></div>
                </div>
                <table class="table table-hover table-bordered align-middle" aria-describedby="notices">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">{{ $language === 'hi' ? 'शीर्षक' : 'Title' }}</th>
                            <th scope="col" class="text-center">{{ $language === 'hi' ? 'लिंक' : 'Link' }}</th>
                            <th scope="col" class="text-center">{{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $today = \Carbon\Carbon::today(); // Get today's date
                        @endphp
                        @forelse ($notices as $index => $notice)
                            @if (\Carbon\Carbon::parse($notice->expiry_date)->gte($today))
                                <tr>
                                    <td scope="row" class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $language === 'hi' ? $notice->hin_title : $notice->title }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            {{ $language === 'hi' ? 'अंतिम तिथि' : 'Last Date' }}:
                                            {{ \Carbon\Carbon::parse($notice->expiry_date)->format('d-m-Y') }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->url)
                                            <a href="{{ $notice->url }}" target="_blank" class="btn btn-outline-primary btn-sm" role="link" aria-label="{{ $language === 'hi' ? 'लिंक देखें' : 'View Link' }}">
                                                <i class="fas fa-link" aria-hidden="true"></i> {{ $language === 'hi' ? 'लिंक देखें' : 'View Link' }}
                                            </a>
                                        @else
                                            <span class="text-muted">{{ $language === 'hi' ? 'कोई लिंक नहीं' : 'No Link' }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->pdf)
                                            <a href="{{ asset('storage/' . $notice->pdf) }}" target="_blank" class="btn btn-outline-success btn-sm" role="link" aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i> {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $notice->pdf_size }} MB)
                                        @else
                                            <span class="text-muted">{{ $language === 'hi' ? 'कोई पीडीएफ नहीं' : 'No PDF' }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    {{ $language === 'hi' ? 'कोई सूचना उपलब्ध नहीं है।' : 'No notices available.' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>




            {{-- Archived Notices --}}
            <div class="col-md-12 content">
                <div>
                    <h3 id="notices" tabindex="0">{{ $language === 'hi' ? 'पुरालेखित सूचना/अद्यतन' : 'Archieved Notice/ Updates' }}</h3>
                    <div class="divider"></div>
                </div>
                <table class="table table-hover table-bordered align-middle" aria-describedby="notices">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">{{ $language === 'hi' ? 'शीर्षक' : 'Title' }}</th>
                            <th scope="col" class="text-center">{{ $language === 'hi' ? 'लिंक' : 'Link' }}</th>
                            <th scope="col" class="text-center">{{ $language === 'hi' ? 'डाउनलोड' : 'Download' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $today = \Carbon\Carbon::today(); // Get today's date
                        @endphp
                        @forelse ($archivedNotices as $index => $notice)
                            @if (\Carbon\Carbon::parse($notice->expiry_date)->gte($today))
                                <tr>
                                    <td scope="row" class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $language === 'hi' ? $notice->hin_title : $notice->title }}</strong>
                                        <br>
                                        <small class="text-muted">
                                            {{ $language === 'hi' ? 'अंतिम तिथि' : 'Last Date' }}:
                                            {{ \Carbon\Carbon::parse($notice->expiry_date)->format('d-m-Y') }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->url)
                                            <a href="{{ $notice->url }}" target="_blank" class="btn btn-outline-primary btn-sm" role="link" aria-label="{{ $language === 'hi' ? 'लिंक देखें' : 'View Link' }}">
                                                <i class="fas fa-link" aria-hidden="true"></i> {{ $language === 'hi' ? 'लिंक देखें' : 'View Link' }}
                                            </a>
                                        @else
                                            <span class="text-muted">{{ $language === 'hi' ? 'कोई लिंक नहीं' : 'No Link' }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->pdf)
                                            <a href="{{ asset('storage/' . $notice->pdf) }}" target="_blank" class="btn btn-outline-success btn-sm" role="link" aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i> {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $notice->pdf_size }} MB)
                                        @else
                                            <span class="text-muted">{{ $language === 'hi' ? 'कोई पीडीएफ नहीं' : 'No PDF' }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    {{ $language === 'hi' ? 'कोई सूचना उपलब्ध नहीं है।' : 'No notices available.' }}
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
