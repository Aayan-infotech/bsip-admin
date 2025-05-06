@extends('website.layouts.app')
@push('meta-tags')
    <meta name="description"
        content="Explore the adventurous life of Prof. Birbal Sahni — from sports and student life at Cambridge to his legendary Himalayan treks that enriched his pioneering palaeobotanical research.">
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
                        {{ $language === 'hi' ? 'फॉर्म डाउनलोड करें' : 'Download Forms' }}
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
                        <h3 id="notices" tabindex="0">{{ $language === 'hi' ? 'फॉर्म डाउनलोड करें' : 'Download Forms' }}
                        </h3>
                        <div class="divider"></div>
                    </div>
                    <table class="table table-hover table-bordered align-middle" aria-describedby="notices">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">#<br></th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'शीर्षक' : 'Title' }}<br><small
                                        class="text-muted">{{ $language === 'hi' ? '(शीर्षक)' : '(Title)' }}</small></th>
                                <th scope="col" class="text-center">{{ $language === 'hi' ? 'पीडीएफ' : 'PDF' }}<br><small
                                        class="text-muted">{{ $language === 'hi' ? '(पीडीएफ)' : '(PDF)' }}</small></th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'डाउनलोड करें' : 'Word Document' }}
                                    <br>
                                    <small class="text-muted"
                                        style="color: #979797 !important;">{{ $language === 'hi' ? '(अंग्रेज़ी)' : '(English)' }}</small>
                                </th>
                                <th scope="col" class="text-center">
                                    {{ $language === 'hi' ? 'डाउनलोड करें' : 'Word Document' }}
                                    <br>
                                    <small class="text-muted"
                                        style="color: #979797 !important;">{{ $language === 'hi' ? '(हिंदी)' : '(Hindi)' }}</small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($forms as $index => $notice)
                                <tr>
                                    <td scope="row" class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $language === 'hi' ? $notice->hin_title : $notice->title }}</strong>

                                    </td>
                                    <td class="text-center">
                                        @if ($notice->pdf)
                                            <a href="{{ asset('storage/' . $notice->pdf) }}" target="_blank"
                                                class="btn btn-outline-success btn-sm" role="link"
                                                aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $notice->pdf_size }}) MB
                                        @else
                                            <span
                                                class="text-muted">{{ $language === 'hi' ? 'कोई पीडीएफ नहीं' : 'No PDF' }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->document)
                                            <a href="{{ asset('storage/' . $notice->document) }}" target="_blank"
                                                class="btn btn-outline-success btn-sm" role="link"
                                                aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $notice->document_size }}) MB
                                        @else
                                            <span class="text-muted">{{ $language === 'hi' ? '-' : '-' }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->hin_document)
                                            <a href="{{ asset('storage/' . $notice->hin_document) }}" target="_blank"
                                                class="btn btn-outline-success btn-sm" role="link"
                                                aria-label="{{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}">
                                                <i class="fas fa-download" aria-hidden="true"></i>
                                                {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                            </a>
                                            ({{ $notice->hin_document_size }}) MB
                                        @else
                                            <span class="text-muted">{{ $language === 'hi' ? '-' : '-' }}</span>
                                        @endif
                                    </td>
                                </tr>
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
