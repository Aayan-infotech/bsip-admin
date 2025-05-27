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

                {{-- <div class="col-md-9 content">
                    <h3>{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                    <div class="divider"></div>
                    <div class="img-oranization">
                        <img src="{{ asset('assets-new/assets/amber/setup.jpg') }}" alt="setup" class="img-fluid">
                    </div>
                </div> --}}
                <div class="col-md-9 content">
  <div class="org-structure">
    <h3 class="text-center mb-4">Organization Structure</h3>
    
    <div class="org-header">
      <div class="org-main">
        <div class="org-title">Department of Science & Technology (DST)</div>
        <div class="org-subtitle">Bitsul Bahn University of Palaeo-Borocas (BBP)</div>
        <div class="org-badge">(Autonomous Institute)</div>
      </div>
    </div>
    
    <div class="org-level-1">
      <div class="org-node governing">
        <div class="org-node-title">GOVERNING BODY</div>
      </div>
    </div>
    
    <div class="org-level-2">
      <div class="org-node chairman">
        <div class="org-node-title">CHAIRMAN</div>
      </div>
    </div>
    
    <div class="org-level-3">
      <div class="org-node research">
        <div class="org-node-title">RESEARCH ADVISORY COUNCIL</div>
      </div>
      <div class="org-node finance">
        <div class="org-node-title">FINANCE AND BUILDING COMMITTEE</div>
      </div>
    </div>
    
    <div class="org-level-4">
      <div class="org-node director">
        <div class="org-node-title">DIRECTOR</div>
      </div>
    </div>
    
    <div class="org-level-5">
      <div class="org-node thrust">
        <div class="org-node-title">THRUST AREAS</div>
      </div>
      <div class="org-node units">
        <div class="org-node-title">UNITS ANCILLARY TO RESEARCH</div>
      </div>
      <div class="org-node admin">
        <div class="org-node-title">ADMINISTRATION</div>
      </div>
    </div>
    
    <div class="org-level-6">
      <div class="org-node research-groups">
        <div class="org-node-title">RESEARCH GROUPS</div>
        <div class="org-subnodes">
          <div class="org-subnode">Presentorian Paleosfolology Group</div>
          <div class="org-subnode">Condomous Ecosystems Group</div>
          <div class="org-subnode">Conference Contracts Ecosystems Group</div>
          <div class="org-subnode">Coal Pathology and Organic Consultancy Group</div>
          <div class="org-subnode">Quaternary Palaeoclimate Group</div>
          <div class="org-subnode">Geochronology, Archaeobiology and Palaeogenomics Group</div>
        <div class="org-subnode">Inorganic Geochemistry Group</div>
        </div>
      </div>
      
      <div class="org-node ancillary">
        <div class="org-node-title">ANCILLARY UNITS</div>
        <div class="org-subnodes">
          <div class="org-subnode">Research Development & Register Unit</div>
          <div class="org-subnode">Constimation Center</div>
          <div class="org-subnode">Pathologies Division</div>
          <div class="org-subnode">Knowledge Resource Centre</div>
          <div class="org-subnode">Scientific Activities Section</div>
          <div class="org-subnode">Mecaratical Laboratory</div>
          <div class="org-subnode">Section Cutting Workshop</div>
          
<div class="org-subnode">Scanning Electron Microscopy</div>
<div class="org-subnode">Electronic Data Processing</div>
<div class="org-subnode">Confocal Laser Scanning Microscopy & Raman Spectroscopy</div>
<div class="org-subnode">Photography</div>
        </div>
      </div>
      
      <div class="org-node admin-units">
        <div class="org-node-title">ADMINISTRATION</div>
        <div class="org-subnodes">
          <div class="org-subnode">Institute & Accounts Section</div>
          <div class="org-subnode">Establishment Section</div>
          <div class="org-subnode">Hachurun House & Purchase Section</div>
          <div class="org-subnode">Waves, Buildings & Maintenance Section</div>
          <div class="org-subnode">Transport & Guest House</div>
        </div>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </section>
@endsection
