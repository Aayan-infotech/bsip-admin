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
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'सुरक्षा नीति' : 'Security Policy' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container my-5">
            <h1 class="mb-4 text-center">Web Policies</h1>
            <!-- Standardisation -->
            <section class="p-4 rounded mb-4 section-standardisation">
                <div class="policy-header">Standardisation Testing and Quality Certification</div>
                <p>No specific content provided under this heading, but it likely refers to adherence to standardized
                    practices and certifications for website quality and accessibility.</p>
            </section>

            <!-- Copyright -->
            <section class="p-4 rounded mb-4 section-copyright">
                <div class="policy-header">Copyright Policy</div>
                <p>Material featured on this site may be reproduced free of charge in any format or media without requiring
                    specific permission. This is subject to the material being reproduced accurately and not being used in a
                    derogatory manner or in a misleading context. Where the material is being published or issued to others,
                    the source must be prominently acknowledged.</p>
                <p>However, the permission to reproduce this material does not extend to any material on this site which is
                    explicitly identified as being the copyright of a third party. Authorization to reproduce such material
                    must be obtained from the concerned copyright holders.</p>
            </section>

            <!-- Hyperlinking -->
            <section class="p-4 rounded mb-4 section-hyperlinking">
                <div class="policy-header">Hyperlinking Policy</div>
                <p>Links to other websites/portals are provided for convenience. IIG is not responsible for the content or
                    reliability of linked websites and does not necessarily endorse their views. The presence of a link does
                    not imply endorsement. Link availability cannot be guaranteed.</p>
                <p>Direct linking to this website is allowed unless otherwise specified, though informing us is appreciated.
                    Framing our website within another site is not permitted. Pages must load in a new browser window.</p>
            </section>

            <!-- Privacy -->
            <section class="p-4 rounded mb-4 section-privacy">
                <div class="policy-header">Privacy Policy</div>
                <p>The Department of Science and Technology does not automatically capture any specific personal information
                    such as name, phone number, or email address that can identify you.</p>
                <p>No personally identifiable information volunteered on this site is sold or shared with third parties.
                    Information provided will be protected against loss, misuse, or unauthorized disclosure.</p>
                <p>This site does not use cookies.</p>
            </section>

            <!-- Terms of Use -->
            <section class="p-4 rounded mb-4 section-terms">
                <div class="policy-header">Terms of Use</div>
                <p>This site is maintained by the Department of Science and Technology. While efforts are made to ensure
                    content accuracy, it should not be considered a legal statement. Users should verify details
                    independently and seek professional advice if needed.</p>
                <p>The Department is not liable for any losses or damages arising from use of this site or data loss.</p>
                <p>These terms are governed by Indian laws and any disputes are under the jurisdiction of Indian courts.</p>
                <p>Links to third-party websites are provided for convenience. The Department does not guarantee
                    availability or content accuracy of external links, and users are subject to the privacy and security
                    policies of those external sites.</p>
            </section>
        </div>
    </section>
    <style>
        .policy-header {
          font-size: 1.5rem;
          font-weight: 600;
          margin-bottom: 1rem;
        }
        .section-standardisation { background-color: #e3f2fd; }
        .section-copyright { background-color: #e3f2fd; }
        .section-hyperlinking { background-color: #e3f2fd; }
        .section-privacy { background-color: #e3f2fd; }
        .section-terms { background-color: #e3f2fd; }
      </style>
@endsection
