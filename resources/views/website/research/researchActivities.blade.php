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
                        @if ($researchActivities->isNotEmpty())
                            @foreach ($researchActivities as $activityName)
                                {{-- @php
                                    dd($activityName);
                                @endphp --}}
                                <div class="accordion-item">
                                    <h4 class="accordion-header">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $activityName->id }}" aria-expanded="true"
                                            aria-controls="collapse{{ $activityName->id }}">
                                            {{ $language === 'hi' ? $activityName->hin_activity_name : $activityName->activity_name }}
                                        </button>
                                    </h4>
                                    <div id="collapse{{ $activityName->id }}"
                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if ($activityName->activities->isNotEmpty())
                                                @foreach ($activityName->activities as $activity)
                                                    <table class="table table-striped table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th>{{ $language === 'hi' ? 'प्रोजेक्ट नंबर' : 'Project No.' }}
                                                                </th>
                                                                <td>{{ $language === 'hi' ? $activity->hin_related_project : $activity->related_project }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ $language === 'hi' ? 'प्रोजेक्ट शीर्षक' : 'Project Title' }}
                                                                </th>
                                                                <td>{{ $language === 'hi' ? $activity->hin_project_title : $activity->project_title }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ $language === 'hi' ? 'संयोजक' : 'Coordinator' }}
                                                                </th>
                                                                <td>{{ $language === 'hi' ? $activity->hin_project_coordinator : $activity->project_coordinator }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th> {{ $language === 'hi' ? 'सह-समन्वयक' : 'Co-Coordinator' }}
                                                                </th>
                                                                <td>{{ $language === 'hi' ? $activity->hin_project_co_coordinator : $activity->project_co_coordinator }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th> {{ $language === 'hi' ? 'कोर टीम सदस्य' : 'Core Team Members' }}
                                                                </th>
                                                                <td>{{ $language === 'hi' ? $activity->hin_project_core_members : $activity->project_core_members }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th> {{ $language === 'hi' ? 'सहयोगी सदस्य' : 'Associate Members' }}
                                                                </th>
                                                                <td>{{ $language === 'hi' ? $activity->hin_associated_members : $activity->associated_members }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ $language === 'hi' ? 'विवरण' : 'Description' }}</th>
                                                                <td>{{ $language === 'hi' ? $activity->hin_description : $activity->description }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    @if ($activity->projects->isNotEmpty())
                                                        <button class="btn btn-sm btn-dark"
                                                            onclick="toggleComponents({{ $activity->id }},this)">
                                                            {{ $language === 'hi' ? 'प्रोजेक्ट घटक देखें' : 'View Project Components' }}
                                                        </button>
                                                        <div class="d-none" id="projectComponents{{ $activity->id }}">
                                                            <table class="table table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>{{ $language === 'hi' ? 'घटक संख्या' : 'Component No.' }}
                                                                        </th>
                                                                        <th>{{ $language === 'hi' ? 'घटक शीर्षक' : 'Component Title' }}
                                                                        </th>
                                                                        <th>{{ $language === 'hi' ? 'कार्मिक' : 'Personnel' }}
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($activity->projects as $project)
                                                                        <tr>
                                                                            <td>{{ $project->component_no }}</td>
                                                                            <td>{{ $language === 'hi' ? $project->hin_component_title : $project->component_title }}
                                                                            </td>
                                                                            <td>{{ $language === 'hi' ? $project->hin_personnel : $project->personnel }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endif
                                                @endforeach
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
    <script>
        function toggleComponents(activityId, element) {
            if (element.innerText === 'View Project Components' || element.innerText === 'प्रोजेक्ट घटक देखें') {
                if (element.innerText === 'प्रोजेक्ट घटक देखें') {
                    element.innerText = 'प्रोजेक्ट घटक छिपाएँ';
                } else {
                    element.innerText = 'Hide Project Components';
                }
            } else {
                if (element.innerText === 'प्रोजेक्ट घटक छिपाएँ') {
                    element.innerText = 'प्रोजेक्ट घटक देखें';
                } else {
                    element.innerText = 'View Project Components';
                }
            }

            const projectComponents = document.getElementById('projectComponents' + activityId);
            projectComponents.classList.toggle('d-none');
        }
    </script>
@endsection
