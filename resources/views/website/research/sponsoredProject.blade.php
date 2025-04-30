@extends('website.layouts.app')

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
                    <h3>{{ $language === 'hi' ? 'प्रायोजित परियोजनाएँ' : 'Sponsored Projects' }}</h3>
                    <div class="divider"></div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $language === 'hi' ? 'संस्थान में प्रायोजित परियोजना का विवरण' : 'Details of Sponsored Project Tenable at the Institute' }}
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($sponsoredProjects->isNotEmpty())
                                        @foreach ($sponsoredProjects as $project)
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'प्रोजेक्ट शीर्षक' : 'Project Title' }}</th>
                                                        <td>
                                                            {{ $language === 'hi' ? $project->hin_project_title : $project->project_title }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'प्रोजेक्ट नंबर':'Project Number' }}</th>
                                                        <td>{{ $project->project_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'एजेंसी' : 'Agency' }}</th>
                                                        <td>{{ $language === 'hi' ? $project->hin_funding_agency : $project->funding_agency }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'समन्वयक' : 'Coordinator' }}</th>
                                                        <td>{{ $language === 'hi' ? $project->hin_project_coordinator : $project->project_coordinator }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'प्रोजेक्ट लागत (लाख में)' : 'Project Cost (in Lac)' }}</th>
                                                        <td>{{ $project->project_cost }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ $language === 'hi' ? 'अवधि' : 'Duration' }}</th>
                                                        <td>{{ $language === 'hi' ? $project->hin_duration : $project->duration }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info" role="alert">
                                            {{ $language === 'hi' ? 'कोई जानकारी उपलब्ध नहीं है।' : 'No information available.' }}
                                        </div>
                                    @endIf
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
