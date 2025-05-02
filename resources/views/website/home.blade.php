@extends('website.layouts.app')

@section('content')
    <!-- //Slider -->
    <section class="wrapper banner-wrapper">
        <div id="flexSlider" class="flexslider">
            <ul class="slides">
                @foreach ($sliders as $slider)
                    <li>
                        <img src="{{ asset('storage/' . $slider->image) }}" alt="bsip slide image">
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <section id="skipToContent" class="wrapper body-wrapper ">
        <section class="main-contents-home-page">
            <div class="container-fluid p-5">
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="card">
                            <h2 class="header-section-profiles">
                                <i class="fas fa-chart-bar" role="presentation"></i>
                                {{ $language === 'hi' ? 'बीएसआईपी एक नजर में' : 'BSIP At A Glance' }}
                            </h2>
                            <div class="card-image">
                                <img src="{{ asset('assets-new/assets/images/home/bsip-1.png') }}" alt="">
                            </div>
                            <div class="card-content">
                                <p class="paragraph-profile-card">
                                    {{ $language === 'hi'
                                        ? 'प्रोफेसर बीरबल साहनी, एफआरएस, और एक महान दूरदर्शी, ने वर्ष 1946 में पैलियोबॉटनी संस्थान के रूप में संस्थान की स्थापना की...'
                                        : 'Professor Birbal Sahni, FRS, and a great visionary, established the Institute as Institute of Palaeobotany...' }}
                                </p>
                                <div class="row">
                                    <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_institute_history' : 'bsip_institute_history' }}"
                                        class="button-profile-card">
                                        {{ $language === 'hi' ? 'और पढ़ें' : 'Know More' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="card">
                            <h2 class="header-section-profiles">
                                <i class="fas fa-user-tie" role="presentation"></i>
                                {{ $language === 'hi' ? 'संस्थापक' : 'Founder' }}
                            </h2>
                            <div class="card-image">
                                <img src="{{ asset('assets-new/assets/images/founder.png') }}" alt=""
                                    width="100">
                            </div>
                            <div class="card-content">
                                <h3>{{ $language === 'hi' ? 'प्रो. बीरबल साहनी' : 'Prof. Birbal Sahni, FRS' }}</h3>
                                <h4>{{ $language === 'hi' ? 'संस्थापक बी.सा.पु.सं.' : 'Founder BSIP' }}</h4>
                                <div class="row">
                                    <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_Prof_birbal_Sahni_background' : 'bsip_Prof_birbal_Sahni_background' }}"
                                        class="button-profile-card">
                                        {{ $language === 'hi' ? 'प्रोफाइल देखिये' : 'View Profile' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="card">
                            <h2 class="header-section-profiles">
                                <i class="fas fa-user" role="presentation"></i>
                                {{ $language === 'hi' ? 'निदेशक' : 'Director' }}
                            </h2>
                            <div class="card-image">
                                <img src="{{ $director->profile_picture }}" alt="" class="director-img">
                            </div>
                            <div class="card-content">
                                <h3>{{ $language === 'hi' ? $director->name_hin : $director->name }}</h3>
                                <h4>{{ $language === 'hi' ? 'निदेशक' : 'Director' }}</h4>
                                <div class="row">
                                    <a href="{{ $language }}/{{ $language === 'hi' ? 'director' : 'director' }}"
                                        class="button-profile-card">
                                        {{ $language === 'hi' ? 'प्रोफाइल देखिये' : 'View Profile' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid p-5">
            <div class="row">
                <!-- Research Highlights -->
                <div class="col-md-4">
                    <div class="card shadow">
                        <h2 class="header-section-profiles">
                            <i class="fas fa-lightbulb" role="presentation"></i>
                            {{ $language === 'hi' ? 'अनुसंधान की मुख्य विशेषताएं' : 'Research Highlights' }}
                        </h2>
                        <div class="card-body auto-scroll" id="research-highlights">
                            <ul class="list-group list-group-flush">
                                @if ($researchHighlights->isNotEmpty())
                                    @foreach ($researchHighlights as $index => $highlight)
                                        <li class="list-group-item">
                                            {{ $language === 'hi' ? $highlight->hin_title : $highlight->title }}

                                            <a href="{{ $language === 'hi' ? $highlight->hindi_file : $highlight->english_file }}"
                                                class="text-primary" role="link" aria-label="home" target="_blank">
                                                [{{ $language === 'hi' ? 'पीडीएफ देखें' : 'View PDF' }}]
                                                <i class="fas fa-file-pdf text-danger" role="presentation"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_research_highlights_all' : 'bsip_research_highlights_all' }}"
                                class="button-profile-card">
                                {{ $language === 'hi' ? 'और पढ़ें' : 'Read More' }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Notices/Updates -->
                <div class="col-md-4">
                    <div class="card shadow">
                        <h2 class="header-section-profiles">
                            <i class="fas fa-bell" role="presentation"></i>
                            {{ $language === 'hi' ? 'नोटिस/अपडेट' : 'Notices/Updates' }}
                        </h2>
                        <div class="card-body auto-scroll" id="notices-updates">
                            <ul class="list-group list-group-flush">
                                <!-- @foreach ($notices as $notice)
    -->
                                @php
                                    $today = \Carbon\Carbon::today(); // Get today's date
                                @endphp
                                @forelse ($notices as $index => $notice)
                                    @if (\Carbon\Carbon::parse($notice->expiry_date)->gte($today))
                                        <li class="list-group-item">
                                            <span>{{ $language === 'hi' ? $notice->hin_title : $notice->title }}</span>
                                            @if ($notice->expiry_date)
                                                <span aria-label="{{ $language === 'hi' ? 'अंतिम तिथि' : 'Last Date' }}">
                                                    [{{ $language === 'hi' ? 'अंतिम तिथि' : 'Last Date' }}:
                                                    {{ \Carbon\Carbon::parse($notice->expiry_date)->format('d-m-Y') }}]
                                                </span>
                                            @endif
                                            @if ($notice->pdf)
                                                <a href="{{ asset('storage/' . $notice->pdf) }}" target="_blank"
                                                    class="text-primary" role="link"
                                                    aria-label="{{ $language === 'hi' ? 'पीडीएफ देखें' : 'View PDF' }}">
                                                    [{{ $language === 'hi' ? 'पीडीएफ देखें' : 'View PDF' }}]
                                                </a>
                                            @endif
                                            @if ($notice->url)
                                                <a href="{{ $notice->url }}" target="_blank" class="text-primary"
                                                    role="link"
                                                    aria-label="{{ $language === 'hi' ? 'लिंक देखें' : 'View Link' }}">
                                                    [{{ $language === 'hi' ? 'लिंक देखें' : 'View Link' }}]
                                                </a>
                                            @endif
                                        </li>
                                    @endif
                                @empty
                                    <li>
                                        <td colspan="4" class="text-center text-muted">
                                            {{ $language === 'hi' ? 'कोई सूचना उपलब्ध नहीं है।' : 'No notices available.' }}
                                        </td>
                                    </li>
                                @endforelse
                                <!--
    @endforeach -->
                            </ul>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ $language === 'hi' ? $language . '/bsip_notice_and_updates_all' : $language . '/bsip_notice_and_updates_all' }}"
                                class="button-profile-card" role="link"
                                aria-label="{{ $language === 'hi' ? 'सभी नोटिस और अपडेट पढ़ें' : 'Read all notices and updates' }}">
                                {{ $language === 'hi' ? 'और पढ़ें' : 'Read More' }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0">

                        <h2 class="header-section-profiles m-0">
                            <i class="fas fa-microscope me-2" role="presentation"></i>
                            {{ $language === 'hi' ? 'अनुसंधान गतिविधि' : 'Research Activity' }}
                        </h2>
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <div class="row justify-content-center g-4">
                                <!-- Journal of Palaeosciences -->
                                <div class="col-6">
                                    <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_the_paleobotanist' : 'bsip_the_paleobotanist' }}"
                                        class="card-link text-decoration-none" role="link" aria-label="home">
                                        <div class="card-section border rounded text-center p-3">
                                            <div
                                                class="icon-container bg-primary text-white d-flex justify-content-center align-items-center mx-auto">
                                                <i class="fas fa-bookmark fa-1x" role="presentation"></i>
                                            </div>
                                            <p class="mt-2 fw-bold">
                                                {{ $language === 'hi' ? 'पुरापाषाण विज्ञान जर्नल' : 'Journal of Palaeosciences' }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <!-- Research Projects -->
                                <div class="col-6">
                                    <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_research_activities' : 'bsip_research_activities' }}"
                                        class="card-link text-decoration-none" role="link" aria-label="home">
                                        <div class="card-section border rounded text-center p-3">
                                            <div
                                                class="icon-container bg-success text-white d-flex justify-content-center align-items-center mx-auto">
                                                <i class="fas fa-flask fa-1x" role="presentation"></i>
                                            </div>
                                            <p class="mt-2 fw-bold">
                                                {{ $language === 'hi' ? 'अनुसंधान परियोजनायें' : 'Research Projects' }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <!-- Annual Report -->
                                <div class="col-6">
                                    <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_annual_reports' : 'bsip_annual_reports' }}"
                                        class="card-link text-decoration-none" role="link" aria-label="home">
                                        <div class="card-section border rounded text-center p-3">
                                            <div
                                                class="icon-container bg-warning text-white d-flex justify-content-center align-items-center mx-auto">
                                                <i class="fas fa-book fa-1x" role="presentation"></i>
                                            </div>
                                            <p class="mt-2 fw-bold">
                                                {{ $language === 'hi' ? 'वार्षिक रिपोर्ट' : 'Annual Report' }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <!-- Monthly Report -->
                                <div class="col-6">
                                    <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_monthly_report' : 'bsip_monthly_report' }}"
                                        class="card-link text-decoration-none" role="link" aria-label="home">
                                        <div class="card-section border rounded text-center p-3">
                                            <div
                                                class="icon-container bg-danger text-white d-flex justify-content-center align-items-center mx-auto">
                                                <i class="fas fa-file-alt fa-1x" role="presentation"></i>
                                            </div>
                                            <p class="mt-2 fw-bold">
                                                {{ $language === 'hi' ? 'मासिक रिपोर्ट' : 'Monthly Report' }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <section class="main-contents-home-page">
            <div class="container-fluid p-5">
                <div class="row">
                    <!-- Recent Events -->
                    <div class="col-md-4">
                        <div class="card shadow border-0">
                            <h2 class="header-section-profiles m-0">
                                <i class="fas fa-calendar-alt me-2" role="presentation"></i>
                                {{ $language === 'hi' ? 'रीसेन्ट ईवेन्ट' : 'Recent Events' }}
                            </h2>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="row justify-content-center g-4">
                                    <div class="col-6">
                                        <a href="{{ $language }}/bsip_past_events" class="card-link text-decoration-none" role="link"
                                            aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-primary text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-calendar-alt fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">{{ $language === 'hi' ? 'आयोजन' : 'Events' }}</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="https://youtu.be/NpKQ1LPbrfE" class="card-link text-decoration-none"
                                            role="link" aria-label="home" target="_blank">
                                            <div class="card-section border rounded text-center p-2">
                                                <div
                                                    class="icon-container bg-success text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-flask fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'प्लैटिनम जुबली मूवी (अंग्रेजी)' : 'Platinum Jubilee Movie (English)' }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="https://www.youtube.com/watch?v=NpKQ1LPbrfE"
                                            class="card-link text-decoration-none" role="link" aria-label="home"
                                            target="_blank">
                                            <div class="card-section border rounded text-center p-2">
                                                <div
                                                    class="icon-container bg-warning text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-film fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'प्लैटिनम जुबली फिल्म (हिंदी)' : 'Platinum Jubilee Movie (Hindi)' }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="https://www.youtube.com/@bsiponline573"
                                            class="card-link text-decoration-none" role="link" aria-label="home"
                                            target="_blank">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-danger text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-video fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'यूट्यूब पुरानी फिल्में' : 'YouTube Old Movies' }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Career -->
                    <div class="col-md-4">
                        <div class="card shadow border-0">
                            <h2 class="header-section-profiles m-0">
                                <i class="fas fa-graduation-cap me-2" role="presentation"></i>
                                {{ $language === 'hi' ? 'कैरियर' : 'Career' }}
                            </h2>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="row justify-content-center g-4">
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_short_term_training_program' : 'bsip_short_term_training_program' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-2">
                                                <div
                                                    class="icon-container bg-primary text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-chalkboard-teacher fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'अनुसंधान विद्वानों के लिए बीरबल साहनी प्रशिक्षण कार्यक्रम' : 'Birbal Sahni Training Programs For Research Scholars' }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_master_dissertation_program' : 'bsip_master_dissertation_program' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-success text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-graduation-cap fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'बीरबल साहनी प्रशिक्षण कार्यक्रम के लिए शोध विद्वान' : "Master's Dissertation Programs at BSIP" }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_admission_to_phd' : 'bsip_admission_to_phd' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-warning text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-university fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'पीएचडी में प्रवेश' : 'Admission to PhD' }}</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_career' : 'bsip_career' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-danger text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-bullhorn fa-1x" role="presentation"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'विज्ञापन' : 'Advertisement' }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Staff -->
                    <div class="col-md-4">
                        <div class="card shadow border-0">
                            <h2 class="header-section-profiles m-0">
                                <i class="fas fa-users me-2" role="presentation"></i>
                                {{ $language === 'hi' ? 'कर्मचारी' : 'Staff' }}
                            </h2>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="row justify-content-center g-4">
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_scientific' : 'bsip_scientific' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-primary text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-microscope fa-1x"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'वैज्ञानिक' : 'Scientific' }}</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_technical_staff' : 'bsip_technical_staff' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-success text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-cogs fa-1x"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">{{ $language === 'hi' ? 'तकनीकी' : 'Technical' }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_administrative' : 'bsip_administrative' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-warning text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-users-cog fa-1x"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'प्रशासनिक' : 'Administrative' }}</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_superannuated_employee' : 'bsip_superannuated_employee' }}"
                                            class="card-link text-decoration-none" role="link" aria-label="home">
                                            <div class="card-section border rounded text-center p-3">
                                                <div
                                                    class="icon-container bg-danger text-white d-flex justify-content-center align-items-center mx-auto">
                                                    <i class="fas fa-user-clock fa-1x"></i>
                                                </div>
                                                <p class="mt-2 fw-bold">
                                                    {{ $language === 'hi' ? 'वयोवृद्ध' : 'Superannuated' }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="">
            <div class="container-fluid p-5">
                <div class="row">

                    <!-- Museum Card -->
                    <div class="col-md-4">
                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_museum' : 'bsip_museum' }}"
                            class="text-decoration-none" role="link" aria-label="home">
                            <div class="card shadow">
                                <h2 class="header-section-profiles">
                                    <i class="fas fa-landmark me-2"></i>
                                    {{ $language === 'hi' ? 'संग्रहालय' : 'Museum' }}
                                </h2>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ $language === 'hi' ? 'https://www.bsip.res.in/images/nav/museum2.jpg' : 'assets-new/assets/images/home/museum2.jpg' }}"
                                                alt="museum-img" class="img-fluid img-museum">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- CPGG Card -->
                    <div class="col-md-4">
                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_geo_heritage' : 'bsip_geo_heritage' }}"
                            class="text-decoration-none" role="link" aria-label="home">
                            <div class="card shadow">
                                <h2 class="header-section-profiles">
                                    <i class="fas fa-handshake me-2"></i>
                                    {{ $language === 'hi' ? 'सीपीजीजी' : 'CPGG' }}
                                </h2>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ $language === 'hi' ? 'https://www.bsip.res.in/museumpics/cpgg.jpg' : 'assets-new/assets/images/home/cpgg.jpg' }}"
                                                alt="cpgg-img" class="img-fluid img-museum">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Media Cell Card -->
                    <div class="col-md-4">
                        <a href="{{ $language }}/{{ $language === 'hi' ? 'bsip_media_cell' : 'bsip_media_cell' }}"
                            class="text-decoration-none" role="link" aria-label="home">
                            <div class="card shadow">
                                <h2 class="header-section-profiles">
                                    <i class="fas fa-broadcast-tower me-2"></i>
                                    {{ $language === 'hi' ? 'मीडिया सेल' : 'Media Cell' }}
                                </h2>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ $language === 'hi' ? 'https://www.bsip.res.in/images/media-cell-eng.jpg' : 'assets-new/assets/images/home/media-cell-eng.jpg' }}"
                                                alt="cell-img" class="img-fluid img-museum">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <section class="main-contents-home-page">
            <div class="container-fluid heading-facilities-home">
                <h2 class="header-section-profiles m-0 text-center bg-primary text-white py-3"
                    aria-label="{{ $language === 'hi' ? 'सुविधाएँ' : 'Facilities' }}">
                    <i class="fas fa-microscope me-2" role="presentation"></i>
                    {{ $language === 'hi' ? 'सुविधाएँ' : 'Facilities' }}
                </h2>
            </div>
            <div class="container-fluid container-slider-facilities">
                <div class="carousel-facilities">
                    <button class="btn-slider-home btn-left" onclick="slideLeft();"
                        aria-label="{{ $language === 'hi' ? 'बाएं स्लाइड करें' : 'Slide Left' }}">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </button>
                    <div class="slider-wrapper">
                        <div class="slider-container">
                            <div class="slider-item">
                                <a href="{{ $language }}/{{ $language === 'hi' ? 'saif' : 'saif' }}">
                                    <img src="https://www.bsip.res.in/images/services/TL-OSL.jpg" alt="TL/OSL">
                                    <div class="slider-title">TL/OSL</div>
                                </a>
                            </div>
                            <div class="slider-item">
                                <a href="{{ $language }}/{{ $language === 'hi' ? 'saif' : 'saif' }}">
                                    <img src="https://www.bsip.res.in/images/services/XRD.jpg" alt="XRD">
                                    <div class="slider-title">XRD</div>
                                </a>
                            </div>
                            <div class="slider-item">
                                <a href="{{ $language }}/{{ $language === 'hi' ? 'saif' : 'saif' }}">
                                    <img src="https://www.bsip.res.in/images/services/Nutrien%20Analyzer.jpg"
                                        alt="Nutrien Analyzer">
                                    <div class="slider-title">Nutrien Analyzer</div>
                                </a>
                            </div>
                            <div class="slider-item">
                                <a href="{{ $language }}/{{ $language === 'hi' ? 'saif' : 'saif' }}">
                                    <img src="https://www.bsip.res.in/images/services/FESEM.jpg" alt="FESEM">
                                    <div class="slider-title">FESEM</div>
                                </a>
                            </div>
                            <div class="slider-item">
                                <a href="{{ $language }}/{{ $language === 'hi' ? 'saif' : 'saif' }}">
                                    <img src="https://www.bsip.res.in/images/services/Coal-CF.jpeg" alt="Coal CF">
                                    <div class="slider-title">Coal CF</div>
                                </a>
                            </div>
                            <div class="slider-item">
                                <a href="{{ $language }}/{{ $language === 'hi' ? 'saif' : 'saif' }}">
                                    <img src="https://www.bsip.res.in/images/services/Thermo-Gravimetric-Analyser-(TGA).jpeg"
                                        alt="Bomb Calorimeter">
                                    <div class="slider-title">Bomb Calorimeter</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="btn-slider-home btn-right" onclick="slideRight();"
                        aria-label="{{ $language === 'hi' ? 'दाएं स्लाइड करें' : 'Slide Right' }}">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Magazine and External Links -->
        <div class="wrapper home-btm-slider">
            <div class="container common-container four_content gallery-container">
                <div class="gallery-area clearfix">
                    <div class="gallery-heading text-center" role="main">
                        <h3>{{ $language === 'hi' ? 'फोटो गैलरी' : 'Photo Gallery' }}</h3>
                        <a class="bttn-more bttn-view"
                            href="{{ $language }}/{{ $language === 'hi' ? 'bsip_rajbhasha_patal' : 'bsip_rajbhasha_patal' }}"
                            target="_blank" aria-label="{{ $language === 'hi' ? 'सभी को देखें' : 'View All' }}">
                            <span>{{ $language === 'hi' ? 'सभी को देखें' : 'View All' }}</span>
                        </a>
                    </div>
                    <div class="fancybox">
                        <ul class="slider">
                            @if ($photoGallery->count() > 0)
                                @foreach ($photoGallery as $photo)
                                    <li>
                                        <a href="{{ $photo}}"
                                            data-fancybox="images">
                                            <img src="{{ $photo }}"
                                                alt="Photo Gallery Slide 1" class="photo-gallery-img" />
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="gallery-right">
                    <div class="video-heading text-center">
                        <h3>{{ $language === 'hi' ? 'वीडियो गैलरी' : 'Video Gallery' }}</h3>
                    </div>
                    <div class="video-wrapper">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/NpKQ1LPbrfE"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>


    </section>



    <!-- // Brand -->
    <section class="wrapper carousel-wrapper">
        <div class="container common-container four_content carousel-container">
            <div id="flexCarousel" class="flexslider carousel">
                <ul class="slides">
                    <li>
                        <a target="_blank" href="http://digitalindia.gov.in/"
                            title="Digital India, External Link that opens in a new window"><img
                                src="assets-new/assets/images/carousel/digital-india.png" alt="Digital India"></a>
                    </li>
                    <li>
                        <a target="_blank" href="http://www.makeinindia.com/"
                            title="Make In India, External Link that opens in a new window"> <img
                                src="assets-new/assets/images/carousel/makeinindia.png" alt="Make In India"></a>
                    </li>
                    <li>
                        <a target="_blank" href="http://india.gov.in/"
                            title="National Portal of India, External Link that opens in a new window"><img
                                src="assets-new/assets/images/carousel/india-gov.png" alt="National Portal of India"></a>
                    </li>
                    <li>
                        <a target="_blank" href="http://goidirectory.nic.in/"
                            title="GOI Web Directory, External Link that opens in a new window"><img
                                src="assets-new/assets/images/carousel/goidirectory.png" alt="GOI Web Directory"></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://data.gov.in/"
                            title="Data portal, External Link that opens in a new window"><img
                                src="assets-new/assets/images/carousel/data-gov.png" alt="Data portal"></a>
                    </li>
                    <li>
                        <a target="_blank" href="https://mygov.in/"
                            title="MyGov, External Link that opens in a new window"><img
                                src="assets-new/assets/images/carousel/mygov.png" alt="MyGov Portal"></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
