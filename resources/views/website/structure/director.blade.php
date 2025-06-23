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
                        @if ($director)
                            @foreach ($director as $subCategory)
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
                                            <div class="card-custom-new bg-light">
                                                <div class="row">
                                                    @foreach ($subCategory->staff as $member)
                                                        <div class="col-md-4 imgcard-new">
                                                            <div class="profile-img-new">
                                                                <img src="{{ asset($member->profile_picture) }}"
                                                                    alt="{{ $member->name }}">
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
                                                                    <a href="tel:{{ $member->telephone_extension }}"><i
                                                                            class="fas fa-phone"></i>
                                                                        {{ $member->telephone_extension }}</a>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            {{ $language === 'hi' ? 'अनुसंधान रुचि' : 'Research Interest' }}
                                        </button>
                                    </h4>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <h5>{{ $member->research_interests }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            {{ $language === 'hi' ? 'पुरस्कार और सम्मान' : 'Awards and Honors' }}
                                        </button>
                                    </h4>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-bordered table-striped">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'क्र.सं' : 'S.No' }}</th>
                                                        <th>{{ $language === 'hi' ? 'पुरस्कार और सम्मान' : 'Awards and Honors' }}
                                                        </th>
                                                        <th>{{ $language === 'hi' ? 'वर्ष' : 'Year' }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($member->awardsHonors->isNotEmpty())
                                                        @foreach ($member->awardsHonor as $award)
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>{{ $award->award_name }}</td>
                                                                <td>{{ $award->award_year }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="3">No Data available.</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            {{ $language === 'hi' ? 'प्रकाशन' : 'Publications' }}
                                        </button>
                                    </h4>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <h5>{{ $member->no_of_publications ? $member->no_of_publications : 'N/A' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFive" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            {{ $language === 'hi' ? 'पेशेवर समाजों की सदस्यता' : 'Memberships of professional societies' }}
                                        </button>
                                    </h4>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <table class="table table-bordered table-striped">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'क्र.सं' : 'S.No' }}</th>
                                                        <th>{{ $language === 'hi' ? 'फ़ेलोशिप/सदस्यता का नाम' : 'Fellowship/Membership Name' }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($member->fellowships->isNotEmpty())
                                                        @foreach ($member->fellowships as $fellowship)
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>{{ $fellowship->fellowship_name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="2">No Data available.</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            {{ $language === 'hi' ? 'सीवी डाउनलोड करें' : 'Download CV' }}
                                        </button>
                                    </h4>
                                    <div id="collapseSix" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <h5>You can Download CV Here :</h5>
                                            <a href="{{ asset($member->cv) }}" target="_blank" class="btn btn-primary">
                                                {{ $language === 'hi' ? 'सीवी डाउनलोड करें' : 'Download CV' }}
                                                <span class="badge bg-secondary">{{ $member->cv_size }} MB</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                {{ $language === 'hi' ? 'कोई डेटा उपलब्ध नहीं है।' : 'No data available.' }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
