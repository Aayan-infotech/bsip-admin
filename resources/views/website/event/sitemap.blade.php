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
        {{ $language === 'hi' ? 'साइटमैप' : 'Sitemap' }}
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
        <h3 id="notices" tabindex="0">
        {{ $language === 'hi' ? 'साइटमैप' : 'Sitemap' }}
        </h3>
        <div class="divider"></div>
      </div>
      <div class="section-content">
        <div class="tree-container">
        <div class="tree">
          <!-- Home -->
          <ul>
          <li class="root-node">
            <a href="{{ $language === 'hi' ? url('hi') : url('en') }}">
            <span class="node-content">
              <i class="fas fa-home"></i>
              {{ $language === 'hi' ? 'मुख्य पृष्ठ' : 'Home' }}
            </span>
            </a>

            <!-- Main Branches -->
            <ul>
            <!-- About BSIP -->
            <li>
              <a href="{{ $language === 'hi' ? url('hi/about') : url('en/about') }}">
              <span class="node-content">
                <i class="fas fa-info-circle"></i>
                {{ $language === 'hi' ? 'बीएसआईपी के बारे में' : 'Profile' }}
              </span>
              </a>
              <div class="submenu-list" style="display: block;">
              <ul>
                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_institute_history') : url('en/bsip_institute_history') }}">
                  <span class="node-content"><i class="fas fa-history"></i>
                  {{ $language === 'hi' ? 'इतिहास' : 'History' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_Prof_birbal_Sahni_background') : url('en/bsip_Prof_birbal_Sahni_background') }}">
                  <span class="node-content"><i class="fas fa-scroll"></i>
                  {{ $language === 'hi' ? 'पैतृक पृष्ठभूमि' : 'Parental Background' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_Prof_birbal_Sahni_education_career') : url('en/bsip_Prof_birbal_Sahni_education_career') }}">
                  <span class="node-content"><i class="fas fa-user-graduate"></i>
                  {{ $language === 'hi' ? 'शैक्षिक योग्यताएं' : 'Education Career' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_Prof_birbal_Sahni_General_interest') : url('en/bsip_Prof_birbal_Sahni_General_interest') }}">
                  <span class="node-content"><i class="fas fa-sitemap"></i>
                  {{ $language === 'hi' ? 'सामान्य रूचि' : 'General Interest' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_Prof_birbal_Sahni_youth_incident') : url('en/bsip_Prof_birbal_Sahni_youth_incident') }}">
                  <span class="node-content"><i class="fas fa-child"></i>
                  {{ $language === 'hi' ? 'युवाओं का वृत्तांत' : 'Incident of Youth' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_institute_honours') : url('en/bsip_institute_honours') }}">
                  <span class="node-content"><i class="fas fa-award"></i>
                  {{ $language === 'hi' ? 'सम्मान' : 'Honours' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_contribution_living') : url('en/bsip_contribution_living') }}">
                  <span class="node-content"><i class="fas fa-home"></i>
                  {{ $language === 'hi' ? 'जीविका' : 'Living' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_contribution_fossil') : url('en/bsip_contribution_fossil') }}">
                  <span class="node-content"><i class="fas fa-bone"></i>
                  {{ $language === 'hi' ? 'जीवाश्म' : 'Fossil' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_contribution_geology') : url('en/bsip_contribution_geology') }}">
                  <span class="node-content"><i class="fas fa-mountain"></i>
                  {{ $language === 'hi' ? 'भूगर्भ विज्ञान' : 'Geology' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_institute_mrs_savitri_sahni') : url('en/bsip_institute_mrs_savitri_sahni') }}">
                  <span class="node-content"><i class="fas fa-female"></i>
                  {{ $language === 'hi' ? 'श्रीमती सावित्री साहनी' : 'Mrs. Savitri Sahni' }}</span></a>
                </li>
              </ul>
              </div>
            </li>

            <!-- Administration -->
            <li>
              <a href="{{ $language === 'hi' ? url('hi/administration') : url('en/administration') }}">
              <span class="node-content">
                <i class="fas fa-sitemap"></i>
                {{ $language === 'hi' ? 'संरचना' : 'Structure' }}
              </span>
              </a>
              <div class="submenu-list" style="display: block;">
              <ul>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_governing_body') : url('en/bsip_governing_body') }}">
                  <span class="node-content"><i class="fas fa-users-cog"></i>
                  {{ $language === 'hi' ? 'शासी मंडल' : 'Governing Body' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_research_advisory_council') : url('en/bsip_research_advisory_council') }}">
                  <span class="node-content"><i class="fas fa-user-friends"></i>
                  {{ $language === 'hi' ? 'अनुसंधान सलाहकार परिषद' : 'Research Advisory Council' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_finance_and_building_committee') : url('en/bsip_finance_and_building_committee') }}">
                  <span class="node-content"><i class="fas fa-coins"></i>
                  {{ $language === 'hi' ? 'वित्त समिति' : 'Finance Committee' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_building_committee') : url('en/bsip_building_committee') }}">
                  <span class="node-content"><i class="fas fa-tools"></i>
                  {{ $language === 'hi' ? 'भवन समिति' : 'Building Committee' }}</span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/director') : url('en/director') }}">
                  <span class="node-content"><i class="fas fa-user-tie"></i>
                  {{ $language === 'hi' ? 'निदेशक' : 'Director' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_organizational_setup') : url('en/bsip_organizational_setup') }}">
                  <span class="node-content"><i class="fas fa-network-wired"></i>
                  {{ $language === 'hi' ? 'संगठनात्मक व्यवस्था' : 'Organizational Setup' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_past_institute_heads') : url('en/bsip_past_institute_heads') }}">
                  <span class="node-content"><i class="fas fa-portrait"></i>
                  {{ $language === 'hi' ? 'संस्थान के पूर्व-प्रमुख' : 'Past Heads of Institute' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_past_institute_presidents') : url('en/bsip_past_institute_presidents') }}">
                  <span class="node-content"><i class="fas fa-user-shield"></i>
                  {{ $language === 'hi' ? 'पूर्व सभापति/अध्यक्ष' : 'Past President/Chairman' }}</span>
                </a>
                </li>
              </ul>
              </div>
            </li>


            <!-- Staff -->
            <li>
              <a href="{{ $language === 'hi' ? url('hi/staff') : url('en/staff') }}">
              <span class="node-content">
                <i class="fas fa-user-friends"></i>
                {{ $language === 'hi' ? 'कर्मचारी' : 'Staff' }}
              </span>
              </a>
              <div class="submenu-list" style="display: block;">
              <ul>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/staff/director') : url('en/staff/director') }}">
                  <span class="node-content"><i class="fas fa-user-tie"></i>
                  {{ $language === 'hi' ? 'निदेशक' : 'Director' }}</span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/bsip_scientific') : url('en/bsip_scientific') }}">
                  <span class="node-content"><i class="fas fa-atom"></i>
                  {{ $language === 'hi' ? 'वैज्ञानिक' : 'Scientific' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_technical_staff') : url('en/bsip_technical_staff') }}">
                  <span class="node-content"><i class="fas fa-cogs"></i>
                  {{ $language === 'hi' ? 'तकनीकी' : 'Technical' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_administrative') : url('en/bsip_administrative') }}">
                  <span class="node-content"><i class="fas fa-briefcase"></i>
                  {{ $language === 'hi' ? 'प्रशासनिक' : 'Administrative' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_superannuated_employee') : url('en/bsip_superannuated_employee') }}">
                  <span class="node-content"><i class="fas fa-user-clock"></i>
                  {{ $language === 'hi' ? 'वयोवृद्ध' : 'Superannuated' }}</span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/bsip_acsir') : url('en/bsip_acsir') }}">
                  <span class="node-content"><i class="fas fa-university"></i>
                  {{ $language === 'hi' ? 'AcSIR' : 'AcSIR' }}</span>
                </a>
                </li>
              </ul>
              </div>
            </li>


            <!-- Research -->
            <li>
              <a href="javascript:void(0)">
                <span class="node-content">
                  <i class="fas fa-microscope"></i>
                  {{ $language === 'hi' ? 'अनुसंधान' : 'Research' }}
                </span>
              </a>
              
              <div class="submenu-list" style="display: block;">
              <ul>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_research_activities') : url('en/bsip_research_activities') }}">
                  <span class="node-content"><i class="fas fa-tasks"></i>
                  {{ $language === 'hi' ? 'अनुसंधान गतिविधियाँ' : 'Research Activities' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_collaboration') : url('en/bsip_collaboration') }}">
                  <span class="node-content"><i class="fas fa-handshake"></i>
                  {{ $language === 'hi' ? 'सहयोग' : 'Collaborations' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_sponsored_project') : url('en/bsip_sponsored_project') }}">
                  <span class="node-content"><i class="fas fa-project-diagram"></i>
                  {{ $language === 'hi' ? 'प्रायोजित परियोजनाएं' : 'Sponsored Projects' }}</span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/bsip_fellowship') : url('en/bsip_fellowship') }}">
                  <span class="node-content"><i class="fas fa-graduation-cap"></i>
                  {{ $language === 'hi' ? 'फेलोशिप' : 'Fellowship' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_medals_and_awards') : url('en/bsip_medals_and_awards') }}">
                  <span class="node-content"><i class="fas fa-award"></i>
                  {{ $language === 'hi' ? 'पदक एवं पुरस्कार' : 'Medals & Awards' }}</span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/bsip_lectures') : url('en/bsip_lectures') }}">
                  <span class="node-content"><i class="fas fa-chalkboard-teacher"></i>
                  {{ $language === 'hi' ? 'व्याख्यान' : 'Lectures' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_consultancy') : url('en/bsip_consultancy') }}">
                  <span class="node-content"><i class="fas fa-user-cog"></i>
                  {{ $language === 'hi' ? 'परामर्श' : 'Consultancy' }}</span>
                </a>
                </li>
              </ul>
              </div>
            </li>


            <!-- Units -->
            <li>
              <a href="javascript:void(0)">
                <span class="node-content">
                  <i class="fas fa-layer-group"></i>
                  {{ $language === 'hi' ? 'इकाईयां' : 'Units' }}
                </span>
              </a>
              
              <div class="submenu-list" style="display: block;">
              <ul>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/bsip_museum') : url('en/bsip_museum') }}">
                  <span class="node-content"><i class="fas fa-university"></i>
                  {{ $language === 'hi' ? 'संग्रहालय' : 'Museum' }}</span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/bsip_library') : url('en/bsip_library') }}">
                  <span class="node-content"><i class="fas fa-book-reader"></i>
                  {{ $language === 'hi' ? 'ज्ञान संसाधन केंद्र' : 'Knowledge Resource Centre' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_computer_section') : url('en/bsip_computer_section') }}">
                  <span class="node-content"><i class="fas fa-desktop"></i>
                  {{ $language === 'hi' ? 'कंप्यूटर अनुभाग' : 'Computer Section' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_geo_heritage') : url('en/bsip_geo_heritage') }}">
                  <span class="node-content"><i class="fas fa-globe-asia"></i>
                  {{ $language === 'hi' ? 'भू-विरासत एवं भू-पर्यटन संवर्धन केंद्र (सीपीजीजी)' : 'Centre for Promotion of Geoheritage and Geotourism (CPGG)' }}</span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_amber_analysis') : url('en/bsip_amber_analysis') }}">
                  <span class="node-content"><i class="fas fa-bug"></i>
                  {{ $language === 'hi' ? 'एम्बर विश्लेषण और पैलियोएंटोमोलॉजी प्रयोगशाला' : 'Amber Analysis and Palaeoentomology Laboratory' }}</span>
                </a>
                </li>
              </ul>
              </div>
            </li>

            <!-- Tenders -->
            <li>
              <a href="{{ $language === 'hi' ? url('hi/bsip_tenders') : url('en/bsip_tenders') }}">
              <span class="node-content">
                <i class="fas fa-file-contract"></i>
                {{ $language === 'hi' ? 'निविदा' : 'Tenders' }}
              </span>
              </a>
            </li>


            <!-- Career -->
            <li>
              <a href="javascript:void(0)">
              <span class="node-content">
                <i class="fas fa-briefcase"></i>
                {{ $language === 'hi' ? 'रोजगार' : 'Career' }}
              </span>
              </a>

              <div class="submenu-list" style="display: block;">
              <ul>
                <li><a
                  href="{{ $language === 'hi' ? url('hi/career/bsip-recruitment') : url('en/career/bsip-recruitment') }}">
                  <span class="node-content"><i class="fas fa-user-plus"></i>
                  {{ $language === 'hi' ? 'बीएसआईपी भर्ती पोर्टल' : 'BSIP Recruitment Portal' }}</span></a>
                </li>

                <li><a href="{{ $language === 'hi' ? url('hi/bsip_career') : url('en/bsip_career') }}">
                  <span class="node-content"><i class="fas fa-bullhorn"></i>
                  {{ $language === 'hi' ? 'विज्ञापन' : 'Advertisements' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_admission_to_phd') : url('en/bsip_admission_to_phd') }}">
                  <span class="node-content"><i class="fas fa-graduation-cap"></i>
                  {{ $language === 'hi' ? 'पीएच.डी. कार्यक्रम में प्रवेश' : 'Admission to Ph.D. Program' }}</span></a>
                </li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_master_dissertation_program') : url('en/bsip_master_dissertation_program') }}">
                  <span class="node-content"><i class="fas fa-file-alt"></i>
                  {{ $language === 'hi' ? 'बीरबल साहनी द्विवार्षिक परास्नातक बीएसआईपी में शोध प्रबंध कार्यक्रम' : 'Birbal Sahni Biannual Masters Dissertation Programs at BSIP' }}</span></a>
                </li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_short_term_training_program') : url('en/bsip_short_term_training_program') }}">
                  <span class="node-content"><i class="fas fa-chalkboard-teacher"></i>
                  {{ $language === 'hi' ? 'शोधार्थियों, स्नातकोत्तर और स्नातक छात्रों के लिए बीरबल साहनी प्रशिक्षण कार्यक्रम' : 'Birbal Sahni Training Programs' }}</span></a>
                </li>
              </ul>
              </div>
            </li>
            <!-- Facilities -->
            <li>
              <a href="javascript:void(0)">
              <span class="node-content">
                <i class="fas fa-tools"></i>
                {{ $language === 'hi' ? 'सुविधाएं' : 'Facilities' }}
              </span>
              </a>

              <div class="submenu-list" style="display: block;">
              <ul>
                <li><a href="{{ $language === 'hi' ? url('hi/saif') : url('en/saif') }}">
                  <span class="node-content"><i class="fas fa-vials"></i>
                  {{ $language === 'hi' ? 'सैफ' : 'SAIF' }}</span></a></li>

                <li><a href="{{ $language === 'hi' ? url('hi/bsip_dna_lab') : url('en/bsip_dna_lab') }}">
                  <span class="node-content"><i class="fas fa-dna"></i>
                  {{ $language === 'hi' ? 'डीएनए लैब' : 'DNA Lab' }}</span></a></li>

                <li><a href="{{ $language === 'hi' ? url('hi/bsip_sem') : url('en/bsip_sem') }}">
                  <span class="node-content"><i class="fas fa-microscope"></i>
                  {{ $language === 'hi' ? 'एफ.ई.एस.ई.एम.' : 'FESEM' }}</span></a></li>

                <li><a href="{{ $language === 'hi' ? url('hi/bsip_c14') : url('en/bsip_c14') }}">
                  <span class="node-content"><i class="fas fa-atom"></i>
                  {{ $language === 'hi' ? 'सी 14' : 'C 14' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_section_cutting') : url('en/bsip_section_cutting') }}">
                  <span class="node-content"><i class="fas fa-cut"></i>
                  {{ $language === 'hi' ? 'सेक्शन कटिंग' : 'Section Cutting' }}</span></a></li>

                <li><a
                  href="{{ $language === 'hi' ? url('hi/bsip_maceration') : url('en/bsip_maceration') }}">
                  <span class="node-content"><i class="fas fa-flask"></i>
                  {{ $language === 'hi' ? 'Maceration' : 'Maceration' }}</span></a></li>
              </ul>
              </div>
            </li>
            <!-- Events -->
            <li>
              <a href="javascript:void(0)">
              <span class="node-content">
                <i class="fas fa-calendar-alt"></i>
                {{ $language === 'hi' ? 'आयोजन' : 'Events' }}
              </span>
              </a>
              <div class="submenu-list" style="display: block;">
              <ul>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('https://www.inquaindia2027.in/') : url('https://www.inquaindia2027.in/') }}">
                  <span class="node-content"><i class="fas fa-globe"></i>
                  {{ $language === 'hi' ? 'XXII INQUA 2027' : 'XXII INQUA 2027' }}
                  </span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('https://bsip.res.in/IAS_BSIP_Circular.pdf') : url('https://bsip.res.in/IAS_BSIP_Circular.pdf') }}">
                  <span class="node-content"><i class="fas fa-users-cog"></i>
                  {{ $language === 'hi' ? '40वीं IAS-2024 कांफ्रेंस' : '40th CONVENTION OF IAS-2024' }}
                  </span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/LEM_ISS_2023') : url('en/LEM_ISS_2023') }}">
                  <span class="node-content"><i class="fas fa-chalkboard"></i>
                  {{ $language === 'hi' ? 'एलईएम-आईएसएस-2023' : 'LEM-ISS-2023' }}
                  </span>
                </a>
                </li>
                <li>
                <a href="{{ $language === 'hi' ? url('hi/bsip_gallery') : url('en/bsip_gallery') }}">
                  <span class="node-content"><i class="fas fa-image"></i>
                  {{ $language === 'hi' ? 'फोटो गैलरी' : 'Picture Gallery' }}
                  </span>
                </a>
                </li>
                <li>
                <a
                  href="{{ $language === 'hi' ? url('hi/bsip_past_events') : url('en/bsip_past_events') }}">
                  <span class="node-content"><i class="fas fa-history"></i>
                  {{ $language === 'hi' ? 'विगत आयोजन' : 'Past Events' }}
                  </span>
                </a>
                </li>
              </ul>
              </div>
            </li>

            <!-- Rajbhasha Patal -->
            <li>
              <a href="{{ $language === 'hi' ? url('hi/rajbhasha') : url('en/rajbhasha') }}">
              <span class="node-content">
                <i class="fas fa-language"></i>
                {{ $language === 'hi' ? 'राजभाषा पटल' : 'Rajbhasha Patal' }}
              </span>
              </a>
            </li>
            </ul>
          </li>
          </ul>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>

  <style>
    /* Font Awesome for icons */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

    .tree-container {
    width: 100%;
    overflow-x: auto;
    padding: 20px 0;
    }

    .tree {
    min-width: fit-content;
    text-align: center;
    }

    .tree ul {
    position: relative;
    padding: 1em 0;
    white-space: nowrap;
    margin: 0 auto;
    text-align: center;
    }

    .tree li {
    display: inline-block;
    vertical-align: top;
    text-align: center;
    list-style-type: none;
    position: relative;
    padding: 0.5em 0.5em 1em 0.5em;
    white-space: normal;
    }

    .tree li::before,
    .tree li::after {
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    width: 50%;
    height: 1em;
    border-top: 2px solid #004b8c;
    }

    .tree li::after {
    right: auto;
    left: 50%;
    border-left: 2px solid #004b8c;
    }

    .tree li:only-child::after,
    .tree li:only-child::before {
    display: none;
    }

    .tree li:only-child {
    padding-top: 0;
    }

    .tree li:first-child::before,
    .tree li:last-child::after {
    border: 0 none;
    }

    .tree li:last-child::before {
    border-right: 2px solid #004b8c;
    border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
    border-radius: 5px 0 0 0;
    }

    .tree ul ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 0;
    height: 1em;
    border-left: 2px solid #004b8c;
    }

    .tree li a {
    text-decoration: none;
    display: inline-block;
    padding: 0.5em 1em;
    border-radius: 5px;
    color: #333;
    position: relative;
    transition: all 0.3s;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    min-width: 120px;
    margin-bottom: 10px;
    }

    .tree li a:hover {
    background: #004b8c;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .tree li a:hover .node-content i {
    color: white;
    }

    .tree .root-node>a {
    background: #004b8c;
    color: white;
    font-weight: bold;
    padding: 0.8em 1.5em;
    font-size: 1.1em;
    }

    .tree .root-node>a:hover {
    background: #004b8c;
    transform: translateY(-3px);
    }

    .node-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    }

    .node-content i {
    font-size: 1.5em;
    margin-bottom: 0.3em;
    color: #004b8c;
    }

    /* Submenu list styles */
    .submenu-list {
    display: block;
    width: 100%;
    text-align: left;
    padding: 10px 0;
    }

    .submenu-list ul {
    padding: 0;
    margin: 0;
    list-style: none;
    }

    .submenu-list li {
    display: block;
    padding: 5px 0;
    position: relative;
    }

    .submenu-list li a {
    display: flex;
    align-items: center;
    padding: 8px 15px;
    background: #f1f1f1;
    border-radius: 4px;
    margin-bottom: 5px;
    min-width: auto;
    }

    .submenu-list li a:hover {
    background: #4a90e2;
    color: white;
    }

    .submenu-list .node-content {
    flex-direction: row;
    align-items: center;
    }

    .submenu-list .node-content i {
    font-size: 1em;
    margin-right: 10px;
    margin-bottom: 0;
    }

    @media (max-width: 768px) {
    .tree li {
      display: block;
      padding: 0.5em 0;
    }

    .tree li::before,
    .tree li::after {
      display: none;
    }

    .tree ul ul::before {
      display: none;
    }

    .tree ul {
      padding: 0;
    }

    .tree li a {
      min-width: 0;
      padding: 0.5em;
    }

    .submenu-list {
      position: static;
      width: 100%;
      box-shadow: none;
      padding-left: 20px;
    }
    }
  </style>
@endsection