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
                        @if ($lectures->isNotEmpty())
                            @foreach ($lectures as $subCategory)
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $subCategory->id }}" aria-expanded="true"
                                            aria-controls="collapse{{ $subCategory->id }}">
                                            {{ $language === 'hi' ? $subCategory->hin_lecturer_name : $subCategory->lecturer_name }}
                                        </button>
                                    </h4>
                                    <div id="collapse{{ $subCategory->id }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <table class="table table-striped table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Speaker</th>
                                                        <th>Lecture</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($lectures->isNotEmpty())
                                                        @foreach ($subCategory->lectures as $lecture)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $language === 'hi' ? $lecture->hin_lecture_title : $lecture->lecture_title }}
                                                                </td>
                                                                <td>{{ $language === 'hi' ? $lecture->hin_lecture_description : $lecture->lecture_description }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="3" class="text-center">
                                                                {{ $language === 'hi' ? 'कोई जानकारी उपलब्ध नहीं है।' : 'No information available.' }}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
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
