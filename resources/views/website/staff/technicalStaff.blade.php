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
                    <h3>{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                    <div class="divider"></div>
                    <div class="accordion" id="accordionExample">
                        @if ($technicalStaff->isNotEmpty())
                            @foreach ($technicalStaff as $subCategory)
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $subCategory->id }}" aria-expanded="true"
                                            aria-controls="collapse{{ $subCategory->id }}">
                                            {{ $language === 'hi' ? $subCategory->sub_category_name_hin : $subCategory->sub_category_name }}
                                        </button>
                                    </h4>
                                    <div id="collapse{{ $subCategory->id }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if ($subCategory->staff->isNotEmpty())
                                            <div class="card-custom-new bg-light">
                                                <div class="row">
                                                    @foreach ($subCategory->staff as $member)
                                                        <div class="col-md-4 imgcard-new">
                                                            <div class="profile-img-new">
                                                                <img src="{{ asset($member->profile_picture) }}"
                                                                    alt="{{ $member->name }}" title="Technical Staff Image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="profile-info-new">
                                                                <h3>{{ $language === 'hi' ? $member->name_hin : $member->name }}
                                                                </h3>
                                                                <p><strong>{{ $language === 'hi' ? $member->hin_current_position : $member->current_position }}</strong>
                                                                </p>
                                                                <p>{{ $language === 'hi' ? $member->hin_previous_position : $member->previous_position }}
                                                                </p>
                                                                <div class="contact-new">
                                                                    {{-- @if ($member->mobile_no) --}}
                                                                    <a href="tel:{{ $member->mobile_no }}"><i
                                                                            class="fas fa-phone"></i>
                                                                        {{ $member->mobile_no }}</a>
                                                                    {{-- @endif --}}
                                                                    {{-- @if ($member->email) --}}
                                                                    <br>
                                                                    <a href="mailto:{{ $member->email }}"><i
                                                                            class="fas fa-envelope"></i>
                                                                        {{ $member->email }}</a>
                                                                    {{-- @endif --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                            @else
                                                <div class="alert alert-info" role="alert">
                                                    {{ $language === 'hi' ? 'कोई जानकारी उपलब्ध नहीं है।' : 'No information available.' }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-info" role="alert">
                                {{ $language === 'hi' ? 'कोई जानकारी उपलब्ध नहीं है।' : 'No information available.' }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
