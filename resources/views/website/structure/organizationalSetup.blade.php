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

                {{-- <div class="col-md-9 content">
                    <h3>{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                    <div class="divider"></div>
                    <div class="img-oranization">
                        <img src="{{ asset('assets-new/assets/amber/setup.jpg') }}" alt="setup" class="img-fluid">
                    </div>
                </div> --}}
                <div class="col-md-9 content">
                    <div class="org-structure"
                        title="{{ $language === 'hi' ? 'संगठनात्मक संरचना' : 'Organization Structure' }}" role="tree"
                        aria-label="{{ $language === 'hi' ? 'संगठनात्मक संरचना' : 'Organization Structure' }}">
                        <h2 class="text-center mb-4" tabindex="0" id="org-structure-heading"
                            title="{{ $language === 'hi' ? 'संगठनात्मक संरचना' : 'Organization Structure' }}">
                            {{ $language === 'hi' ? 'संगठनात्मक संरचना' : 'Organization Structure' }}
                        </h2>
                        <div class="divider" title="{{ $language === 'hi' ? 'विभाजक रेखा' : 'Divider line' }}"></div>


                        <!-- Header -->
                        <div class="org-header" tabindex="0" aria-labelledby="org-header-title"
                            data-description="{{ $language === 'hi' ? 'विश्वविद्यालय की देखरेख करने वाली शीर्ष-स्तरीय शासी निकाय' : 'The top-level governing body overseeing the university' }}"
                            title="{{ $language === 'hi' ? 'भारत सरकार का विज्ञान और प्रौद्योगिकी विभाग (डीएसटी) - बिट्सुल बान यूनिवर्सिटी ऑफ पैलियो-बोरोकास (बीबीपी) का शीर्ष नियामक निकाय' : 'Government of India Department of Science & Technology (DST) - The apex regulatory body for Bitsul Bahn University of Palaeo-Borocas (BBP)' }}">
                            <div class="org-main">
                                <div class="org-title" id="org-header-title"
                                    title="{{ $language === 'hi' ? 'भारत सरकार का विज्ञान और प्रौद्योगिकी विभाग (डीएसटी) - वैज्ञानिक अनुसंधान और तकनीकी विकास के लिए प्रमुख नोडल एजेंसी' : 'Government of India Department of Science & Technology (DST) - The nodal agency for scientific research and technological development in India' }}">
                                    {{ $language === 'hi' ? 'विज्ञान और प्रौद्योगिकी विभाग (डीएसटी)' : 'Department of Science & Technology (DST)' }}
                                </div>
                                <div class="org-subtitle"
                                    title="{{ $language === 'hi' ? 'बिट्सुल बान यूनिवर्सिटी ऑफ पैलियो-बोरोकास (बीबीपी) - पुराविज्ञान और प्राचीन पारिस्थितिकी तंत्र अनुसंधान में विशेषज्ञता वाला एक प्रमुख स्वायत्त संस्थान' : 'Bitsul Bahn University of Palaeo-Borocas (BBP) - A premier autonomous institute specializing in paleontology and ancient ecosystems research' }}">
                                    {{ $language === 'hi' ? 'बिट्सुल बान यूनिवर्सिटी ऑफ पैलियो-बोरोकास (बीबीपी)' : 'Bitsul Bahn University of Palaeo-Borocas (BBP)' }}
                                </div>
                                <div class="org-badge"
                                    title="{{ $language === 'hi' ? '(स्वायत्त संस्थान) - भारत सरकार के विज्ञान और प्रौद्योगिकी विभाग द्वारा मान्यता प्राप्त स्वशासी शैक्षणिक संस्थान' : '(Autonomous Institute) - Self-governing academic institution recognized by the Department of Science & Technology, Government of India' }}">
                                    {{ $language === 'hi' ? '(स्वायत्त संस्थान)' : '(Autonomous Institute)' }}
                                </div>
                            </div>
                        </div>

                        <!-- Level 1 -->
                        <div class="org-level-1" role="group"
                            aria-label="{{ $language === 'hi' ? 'संगठन का पहला स्तर' : 'First level of organization' }}"
                            title="{{ $language === 'hi' ? 'संगठन का पहला स्तर' : 'First level of organization' }}">
                            <div class="org-node governing" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'शासी निकाय' : 'Governing Body' }}"
                                data-description="{{ $language === 'hi' ? 'मुख्य निर्णय लेने वाला निकाय जो नीतियों और रणनीतिक दिशा निर्धारित करता है' : 'The main decision-making body that sets policies and strategic direction' }}"
                                title="{{ $language === 'hi' ? 'शासी निकाय' : 'Governing Body' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'शासी निकाय' : 'GOVERNING BODY' }}
                                </div>
                            </div>
                        </div>

                        <!-- Level 2 -->
                        <div class="org-level-2" role="group"
                            aria-label="{{ $language === 'hi' ? 'संगठन का दूसरा स्तर' : 'Second level of organization' }}"
                            title="{{ $language === 'hi' ? 'संगठन का दूसरा स्तर' : 'Second level of organization' }}">
                            <div class="org-node chairman" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'अध्यक्ष' : 'Chairman' }}"
                                data-description="{{ $language === 'hi' ? 'नियुक्त नेता जो शासी निकाय की बैठकों की अध्यक्षता करता है' : 'The appointed leader who chairs the Governing Body meetings' }}"
                                title="{{ $language === 'hi' ? 'अध्यक्ष' : 'Chairman' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'अध्यक्ष' : 'CHAIRMAN' }}
                                </div>
                            </div>
                        </div>

                        <!-- Level 3 -->
                        <div class="org-level-3" role="group"
                            aria-label="{{ $language === 'hi' ? 'संगठन का तीसरा स्तर' : 'Third level of organization' }}"
                            title="{{ $language === 'hi' ? 'संगठन का तीसरा स्तर' : 'Third level of organization' }}">
                            <div class="org-node research" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'शोध सलाहकार परिषद' : 'Research Advisory Council' }}"
                                data-description="{{ $language === 'hi' ? 'समिति जो शोध प्राथमिकताओं और वैज्ञानिक दिशा पर सलाह देती है' : 'Committee that advises on research priorities and scientific direction' }}"
                                title="{{ $language === 'hi' ? 'शोध सलाहकार परिषद' : 'Research Advisory Council' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'शोध सलाहकार परिषद' : 'RESEARCH ADVISORY COUNCIL' }}
                                </div>
                            </div>
                            <div class="org-node finance" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'वित्त और भवन समिति' : 'Finance and Building Committee' }}"
                                data-description="{{ $language === 'hi' ? 'वित्तीय प्रबंधन और बुनियादी ढांचे के विकास की देखरेख करता है' : 'Oversees financial management and infrastructure development' }}"
                                title="{{ $language === 'hi' ? 'वित्त और भवन समिति' : 'Finance and Building Committee' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'वित्त और भवन समिति' : 'FINANCE AND BUILDING COMMITTEE' }}
                                </div>
                            </div>
                        </div>

                        <!-- Level 4 -->
                        <div class="org-level-4" role="group"
                            aria-label="{{ $language === 'hi' ? 'संगठन का चौथा स्तर' : 'Fourth level of organization' }}"
                            title="{{ $language === 'hi' ? 'संगठन का चौथा स्तर' : 'Fourth level of organization' }}">
                            <div class="org-node director" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'निदेशक' : 'Director' }}"
                                data-description="{{ $language === 'hi' ? 'संस्थान के दैनिक संचालन और प्रबंधन के लिए जिम्मेदार' : 'Responsible for the day-to-day operations and management of the institute' }}"
                                title="{{ $language === 'hi' ? 'निदेशक' : 'Director' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'निदेशक' : 'DIRECTOR' }}
                                </div>
                            </div>
                        </div>

                        <!-- Level 5 -->
                        <div class="org-level-5" role="group"
                            aria-label="{{ $language === 'hi' ? 'संगठन का पांचवां स्तर' : 'Fifth level of organization' }}"
                            title="{{ $language === 'hi' ? 'संगठन का पांचवां स्तर' : 'Fifth level of organization' }}">
                            <div class="org-node thrust" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'मुख्य क्षेत्र' : 'Thrust Areas' }}"
                                data-description="{{ $language === 'hi' ? 'संस्थान के प्रमुख शोध क्षेत्र और विशेषज्ञता' : 'The institute\'s main research areas and expertise' }}"
                                title="{{ $language === 'hi' ? 'मुख्य क्षेत्र' : 'Thrust Areas' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'मुख्य क्षेत्र' : 'THRUST AREAS' }}
                                </div>
                            </div>
                            <div class="org-node units" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'अनुसंधान से संबंधित इकाइयाँ' : 'Units Ancillary to Research' }}"
                                data-description="{{ $language === 'hi' ? 'अनुसंधान गतिविधियों का समर्थन करने वाली विशेष इकाइयाँ' : 'Specialized units supporting research activities' }}"
                                title="{{ $language === 'hi' ? 'अनुसंधान से संबंधित इकाइयाँ' : 'Units Ancillary to Research' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'अनुसंधान से संबंधित इकाइयाँ' : 'UNITS ANCILLARY TO RESEARCH' }}
                                </div>
                            </div>
                            <div class="org-node admin" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'प्रशासन' : 'Administration' }}"
                                data-description="{{ $language === 'hi' ? 'संस्थान के प्रशासनिक कार्यों और सेवाओं के लिए जिम्मेदार' : 'Responsible for the institute\'s administrative functions and services' }}"
                                title="{{ $language === 'hi' ? 'प्रशासन' : 'Administration' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'प्रशासन' : 'ADMINISTRATION' }}
                                </div>
                            </div>
                        </div>

                        <!-- Level 6 -->
                        <div class="org-level-6" role="group"
                            aria-label="{{ $language === 'hi' ? 'संगठन का छठा स्तर' : 'Sixth level of organization' }}"
                            title="{{ $language === 'hi' ? 'संगठन का छठा स्तर' : 'Sixth level of organization' }}">
                            <!-- Research Groups -->
                            <div class="org-node research-groups" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'शोध समूह' : 'Research Groups' }}"
                                data-description="{{ $language === 'hi' ? 'विशिष्ट शोध क्षेत्रों में काम करने वाले विशेषज्ञ समूह' : 'Specialized groups working in specific research areas' }}"
                                title="{{ $language === 'hi' ? 'शोध समूह' : 'Research Groups' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'शोध समूह' : 'RESEARCH GROUPS' }}
                                </div>
                                <div class="org-subnodes" role="group"
                                    aria-label="{{ $language === 'hi' ? 'शोध समूहों की सूची' : 'List of Research Groups' }}"
                                    title="{{ $language === 'hi' ? 'शोध समूहों की सूची' : 'List of Research Groups' }}">
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'प्रेजेंटोरियन पैलियोस्फोलॉजी समूह' : 'Presentorian Paleosfolology Group' }}">
                                        {{ $language === 'hi' ? 'प्रेजेंटोरियन पैलियोस्फोलॉजी समूह' : 'Presentorian Paleosfolology Group' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'कॉन्डोमस इकोसिस्टम्स समूह' : 'Condomous Ecosystems Group' }}">
                                        {{ $language === 'hi' ? 'कॉन्डोमस इकोसिस्टम्स समूह' : 'Condomous Ecosystems Group' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'सम्मेलन अनुबंध पारिस्थितिकी तंत्र समूह' : 'Conference Contracts Ecosystems Group' }}">
                                        {{ $language === 'hi' ? 'सम्मेलन अनुबंध पारिस्थितिकी तंत्र समूह' : 'Conference Contracts Ecosystems Group' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'कोयला रोगविज्ञान और कार्बनिक परामर्श समूह' : 'Coal Pathology and Organic Consultancy Group' }}">
                                        {{ $language === 'hi' ? 'कोयला रोगविज्ञान और कार्बनिक परामर्श समूह' : 'Coal Pathology and Organic Consultancy Group' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'चतुर्थ पुराजलवायु समूह' : 'Quaternary Palaeoclimate Group' }}">
                                        {{ $language === 'hi' ? 'चतुर्थ पुराजलवायु समूह' : 'Quaternary Palaeoclimate Group' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'भू-कालक्रम, पुरापुरातत्व और पुराजीनोमिक्स समूह' : 'Geochronology, Archaeobiology and Palaeogenomics Group' }}">
                                        {{ $language === 'hi' ? 'भू-कालक्रम, पुरापुरातत्व और पुराजीनोमिक्स समूह' : 'Geochronology, Archaeobiology and Palaeogenomics Group' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'अकार्बनिक भू-रसायन समूह' : 'Inorganic Geochemistry Group' }}">
                                        {{ $language === 'hi' ? 'अकार्बनिक भू-रसायन समूह' : 'Inorganic Geochemistry Group' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Ancillary Units -->
                            <div class="org-node ancillary" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'सहायक इकाइयाँ' : 'Ancillary Units' }}"
                                data-description="{{ $language === 'hi' ? 'अनुसंधान कार्यों का समर्थन करने वाली तकनीकी और सेवा इकाइयाँ' : 'Technical and service units supporting research work' }}"
                                title="{{ $language === 'hi' ? 'सहायक इकाइयाँ' : 'Ancillary Units' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'सहायक इकाइयाँ' : 'ANCILLARY UNITS' }}
                                </div>
                                <div class="org-subnodes" role="group"
                                    aria-label="{{ $language === 'hi' ? 'सहायक इकाइयों की सूची' : 'List of Ancillary Units' }}"
                                    title="{{ $language === 'hi' ? 'सहायक इकाइयों की सूची' : 'List of Ancillary Units' }}">
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'अनुसंधान विकास और रजिस्टर इकाई' : 'Research Development & Register Unit' }}">
                                        {{ $language === 'hi' ? 'अनुसंधान विकास और रजिस्टर इकाई' : 'Research Development & Register Unit' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'कंस्टीमेशन केंद्र' : 'Constimation Center' }}">
                                        {{ $language === 'hi' ? 'कंस्टीमेशन केंद्र' : 'Constimation Center' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'रोगविज्ञान प्रभाग' : 'Pathologies Division' }}">
                                        {{ $language === 'hi' ? 'रोगविज्ञान प्रभाग' : 'Pathologies Division' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'ज्ञान संसाधन केंद्र' : 'Knowledge Resource Centre' }}">
                                        {{ $language === 'hi' ? 'ज्ञान संसाधन केंद्र' : 'Knowledge Resource Centre' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'वैज्ञानिक गतिविधियाँ अनुभाग' : 'Scientific Activities Section' }}">
                                        {{ $language === 'hi' ? 'वैज्ञानिक गतिविधियाँ अनुभाग' : 'Scientific Activities Section' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'मैकेनिकल प्रयोगशाला' : 'Mecaratical Laboratory' }}">
                                        {{ $language === 'hi' ? 'मैकेनिकल प्रयोगशाला' : 'Mecaratical Laboratory' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'सेक्शन कटिंग कार्यशाला' : 'Section Cutting Workshop' }}">
                                        {{ $language === 'hi' ? 'सेक्शन कटिंग कार्यशाला' : 'Section Cutting Workshop' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'स्कैनिंग इलेक्ट्रॉन माइक्रोस्कोपी' : 'Scanning Electron Microscopy' }}">
                                        {{ $language === 'hi' ? 'स्कैनिंग इलेक्ट्रॉन माइक्रोस्कोपी' : 'Scanning Electron Microscopy' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'इलेक्ट्रॉनिक डेटा प्रोसेसिंग' : 'Electronic Data Processing' }}">
                                        {{ $language === 'hi' ? 'इलेक्ट्रॉनिक डेटा प्रोसेसिंग' : 'Electronic Data Processing' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'कन्फोकल लेजर स्कैनिंग माइक्रोस्कोपी और रमन स्पेक्ट्रोस्कोपी' : 'Confocal Laser Scanning Microscopy & Raman Spectroscopy' }}">
                                        {{ $language === 'hi' ? 'कन्फोकल लेजर स्कैनिंग माइक्रोस्कोपी और रमन स्पेक्ट्रोस्कोपी' : 'Confocal Laser Scanning Microscopy & Raman Spectroscopy' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'फोटोग्राफी' : 'Photography' }}">
                                        {{ $language === 'hi' ? 'फोटोग्राफी' : 'Photography' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Administration Units -->
                            <div class="org-node admin-units" tabindex="0" role="treeitem" aria-expanded="true"
                                aria-label="{{ $language === 'hi' ? 'प्रशासनिक इकाइयाँ' : 'Administration Units' }}"
                                data-description="{{ $language === 'hi' ? 'संस्थान के प्रशासनिक कार्यों और सेवाओं के लिए जिम्मेदार विभाग' : 'Departments responsible for the institute\'s administrative functions and services' }}"
                                title="{{ $language === 'hi' ? 'प्रशासनिक इकाइयाँ' : 'Administration Units' }}">
                                <div class="org-node-title">
                                    {{ $language === 'hi' ? 'प्रशासनिक इकाइयाँ' : 'ADMINISTRATION' }}
                                </div>
                                <div class="org-subnodes" role="group"
                                    aria-label="{{ $language === 'hi' ? 'प्रशासनिक इकाइयों की सूची' : 'List of Administration Units' }}"
                                    title="{{ $language === 'hi' ? 'प्रशासनिक इकाइयों की सूची' : 'List of Administration Units' }}">
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'संस्थान और लेखा अनुभाग' : 'Institute & Accounts Section' }}">
                                        {{ $language === 'hi' ? 'संस्थान और लेखा अनुभाग' : 'Institute & Accounts Section' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'स्थापना अनुभाग' : 'Establishment Section' }}">
                                        {{ $language === 'hi' ? 'स्थापना अनुभाग' : 'Establishment Section' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'हचुरुन हाउस और खरीद अनुभाग' : 'Hachurun House & Purchase Section' }}">
                                        {{ $language === 'hi' ? 'हचुरुन हाउस और खरीद अनुभाग' : 'Hachurun House & Purchase Section' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'लहरें, भवन और रखरखाव अनुभाग' : 'Waves, Buildings & Maintenance Section' }}">
                                        {{ $language === 'hi' ? 'लहरें, भवन और रखरखाव अनुभाग' : 'Waves, Buildings & Maintenance Section' }}
                                    </div>
                                    <div class="org-subnode" tabindex="0" role="treeitem"
                                        title="{{ $language === 'hi' ? 'परिवहन और अतिथि गृह' : 'Transport & Guest House' }}">
                                        {{ $language === 'hi' ? 'परिवहन और अतिथि गृह' : 'Transport & Guest House' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
