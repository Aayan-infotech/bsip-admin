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
                        {{ $language === 'hi' ? 'आंतरिक शिकायत (आईसी) समिति' : 'Internal Complaints (IC) Committee' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <style>
        .card1 {
            height: fit-content;
        }
    </style>
    <section class="common-mobile-view">
        <div class="container-fluid py-3">
            <div class="row gx-5">
                <!-- Main Content -->
                <div class="col-md-12 content">
                    <!-- <div>
                            <h3 id="notices" tabindex="0">
                                {{ $language === 'hi' ? 'आंतरिक शिकायत (आईसी) समिति' : 'Internal Complaints (IC) Committee' }}
                            </h3>
                            <div class="divider"></div>
                        </div> -->
                    <style>
                        .ic-header {
                            font-size: 2rem;
                            font-weight: bold;
                            color: #dc3545;
                            text-align: center;
                            margin-bottom: 20px;
                        }

                        .ic-subheader {
                            font-size: 1.2rem;
                            font-weight: bold;
                            color: #6c757d;
                            text-align: center;
                            margin-bottom: 30px;
                        }

                        .ic-card {
                            background-color: #f8f9fa;
                            border: 1px solid #dee2e6;
                            border-radius: 8px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            padding: 20px;
                            margin-bottom: 20px;
                            height: 100%;
                        }

                        .ic-card h5 {
                            font-size: 1.1rem;
                            font-weight: bold;
                            color: #ffc107;
                        }

                        .ic-card p {
                            font-size: 0.95rem;
                            line-height: 1.6;
                        }

                        .ic-image {
                            max-width: 71%;
                            height: auto;
                            border-radius: 8px;
                            border: 1px solid #ddd;
                        }

                        .ic-instructions {
                            font-size: 1rem;
                            line-height: 1.8;
                            margin-top: 20px;
                        }

                        .ic-download-btn {
                            margin-top: 20px;
                            font-size: 1rem;
                            font-weight: bold;
                        }

                        .divider {
                            height: 3px;
                            /* background-color: #dc3545; */
                            width: 100%;
                            margin: 10px auto;
                        }
                    </style>

                    <section class="common-mobile-view">
                        <div class="container-fluid py-3">
                            <!-- Convener Section -->
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1 class="ic-header" tabindex="0"
                                                aria-label="Internal Complaints (IC) Committee">
                                                आंतरिक शिकायत (आईसी) समिति
                                            </h1>
                                            <p class="ic-subheader" tabindex="0"
                                                aria-label="Birbal Sahni Institute of Palaeosciences">
                                                बीरबल साहनी पुराविज्ञान संस्थान, लखनऊ
                                            </p>
                                            <div class="divider" role="separator" aria-hidden="true"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="ic-card" role="region" aria-labelledby="convener-title">
                                                <h5 id="convener-title" tabindex="0"
                                                    aria-label="Convener of IC Committee">संयोजक</h5>
                                                <h5 tabindex="0" aria-label="Dr. Binita Phartiyal">डॉ. (श्रीमती) बिनीता
                                                    फर्तियाल</h5>
                                                <p tabindex="0" aria-label="Details of Dr. Binita Phartiyal">
                                                    वैज्ञानिक-'एफ'<br>
                                                    बीरबल साहनी पुराविज्ञान संस्थान (बीएसआईपी),<br>
                                                    53, यूनिवर्सिटी रोड, लखनऊ-226007<br>
                                                    यू.पी., भारत<br>
                                                    <b>मोबाइल नंबर:</b> 09411856391<br>
                                                    <b>ईमेल:</b> <a href="mailto:binita_phartiyal@bsip.res.in"
                                                        class="text-primary">binita_phartiyal@bsip.res.in</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="{{ asset('ic.jpg') }}" alt="Image of IC Committee Convener" class="ic-image"
                                        role="img" aria-label="Image of IC Committee Convener">
                                </div>
                            </div>

                            <hr>

                            <!-- Members Section -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-1">
                                        <h5 id="member-1" tabindex="0" aria-label="Dr. Anju Saxena">डॉ. (श्रीमती) अंजू
                                            सक्सेना</h5>
                                        <p tabindex="0" aria-label="Details of Dr. Anju Saxena">
                                            वैज्ञानिक 'ई'<br>
                                            बी.एस.आई.पी, लखनऊ<br>
                                            <b>मोबाइल नंबर:</b> +91 9415582686<br>
                                            <b>ईमेल:</b> <a href="mailto:anju_saxena@bsip.res.in"
                                                class="text-primary">anju_saxena@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-2">
                                        <h5 id="member-2" tabindex="0" aria-label="Dr. Vartika Singh">डॉ. वर्तिका सिंह
                                        </h5>
                                        <p tabindex="0" aria-label="Details of Dr. Vartika Singh">
                                            वैज्ञानिक 'ई'<br>
                                            बी.एस.आई.पी, लखनऊ<br>
                                            <b>मोबाइल नंबर:</b> +91 9450363404<br>
                                            <b>ईमेल:</b> <a href="mailto:vartika_singh@bsip.res.in"
                                                class="text-primary">vartika_singh@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-3">
                                        <h5 id="member-3" tabindex="0" aria-label="Dr. Gaurav Srivastava">डॉ. गौरव
                                            श्रीवास्तव</h5>
                                        <p tabindex="0" aria-label="Details of Dr. Gaurav Srivastava">
                                            वैज्ञानिक 'ई'<br>
                                            बी.एस.आई.पी, लखनऊ<br>
                                            <b>मोबाइल नंबर:</b> +91 9792704022<br>
                                            <b>ईमेल:</b> <a href="mailto:gaurav_srivastava@bsip.res.in"
                                                class="text-primary">gaurav_srivastava@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-4">
                                        <h5 id="member-4" tabindex="0" aria-label="Registrar or Nominee">रजिस्ट्रार और/या
                                            उनके नामिती</h5>
                                        <p tabindex="0" aria-label="Details of Registrar or Nominee">
                                            बी.एस.आई.पी, लखनऊ<br>
                                            <b>ईमेल:</b> <a href="mailto:registrar@bsip.res.in"
                                                class="text-primary">registrar@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-5">
                                        <h5 id="member-5" tabindex="0" aria-label="डॉ. (श्रीमती) मनीषा थारू">डॉ.
                                            (श्रीमती) मनीषा थारू</h5>
                                        <p tabindex="0" aria-label="डॉ. मनीषा थारू का विवरण">
                                            सहायक<br>
                                            <b>मोबाइल नंबर:</b> 9451383244<br>
                                            <b>ईमेल:</b> <a href="mailto:manishabsip@gmail.com"
                                                class="text-primary">manishabsip@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-6">
                                        <h5 id="member-6" tabindex="0" aria-label="श्री अक्षय कुमार">श्री अक्षय कुमार
                                        </h5>
                                        <p tabindex="0" aria-label="श्री अक्षय कुमार का विवरण">
                                            एलडीसी<br>
                                            <b>मोबाइल नंबर:</b> 9520110694<br>
                                            <b>ईमेल:</b> <a href="mailto:akshay.kumar@bsip.res.in"
                                                class="text-primary">akshay.kumar@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-7">
                                        <h5 id="member-7" tabindex="0" aria-label="संस्थान के वकील">संस्थान के वकील
                                        </h5>
                                        <p tabindex="0" aria-label="संस्थान के वकील का विवरण">
                                            बी.एस.आई.पी, लखनऊ
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Complaint Filing Instructions -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center" tabindex="0" aria-label="How to file a complaint?">
                                        <b>शिकायत कैसे दर्ज करें ?</b>
                                    </h4>
                                    <ul class="ic-instructions">
                                        <li tabindex="0"
                                            aria-label="Send an email to the IC Convener at binita_phartiyal@bsip.res.in">
                                            संबंधित शिकायत हेतु एक ईमेल संयोजक, आईसी <b>(binita_phartiyal@bsip.res.in)</b>
                                            को भेजा जा सकता है। ई-मेल प्राप्त होते ही शिकायत दर्ज कर तत्काल प्रभाव से
                                            कार्रवाई की जाती है।
                                        </li>
                                        <li tabindex="0"
                                            aria-label="Submit a written complaint directly to the IC Convener">
                                            लिखित शिकायत भी सीधे संयोजक आईसी को भेजी जा सकती है।
                                        </li>
                                    </ul>
                                    <div class="text-center">
                                        <a href="{{ asset('IC_Committee_list_details_for_website.pdf') }}"
                                            class="btn btn-view-profile ic-download-btn" target="_blank"
                                            onclick="return confirmExternalLink()"
                                            download="IC Committee list_details_for_website_hindi.pdf"
                                            aria-label="Download IC Committee details in PDF format">
                                            {{ $language === 'hi' ? 'डाउनलोड पीडीएफ़' : 'Download PDF' }} <i
                                                class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </a>
                                        <span class="ms-1">(0.25) MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="divider" role="separator" aria-hidden="true"></div>
                    <section class="common-mobile-view">
                        <div class="container-fluid py-3">
                            <!-- Header Section -->
                            <!-- <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="ic-header text-center" tabindex="0" aria-label="Birbal Sahni Institute of Palaeosciences">
                                            BIRBAL SAHNI INSTITUTE OF PALAEOSCIENCES
                                        </h1>
                                        <p class="ic-subheader text-center" tabindex="0" aria-label="An autonomous institute under the Department of Science and Technology, Government of India">
                                            (An autonomous institute under the Department of Science and Technology, Govt. of India) <br>
                                            53, University Road, Lucknow-226 007, UP
                                        </p>
                                        <h3 class="text-center text-danger" tabindex="0" aria-label="Internal Complaints (IC) Committee">
                                            <b>Internal Complaints (IC) Committee</b>
                                        </h3>
                                        <div class="divider" role="separator" aria-hidden="true"></div>
                                    </div>
                                </div> -->

                            <!-- Convener Section -->
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <h1 class="ic-header" tabindex="0"
                                            aria-label="Internal Complaints (IC) Committee">
                                            Internal Complaints (IC) Committee
                                        </h1>
                                        <p class="ic-subheader" tabindex="0"
                                            aria-label="Birbal Sahni Institute of Palaeosciences">
                                            BIRBAL SAHNI INSTITUTE OF PALAEOSCIENCES
                                        </p>
                                        <div class="divider" role="separator" aria-hidden="true"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="ic-card" role="region" aria-labelledby="convener-title">
                                            <h5 id="convener-title" tabindex="0" aria-label="Convener">Convener</h5>
                                            <h5 tabindex="0" aria-label="Dr. (Mrs.) Binita Phartiyal">Dr. (Mrs.) Binita
                                                Phartiyal</h5>
                                            <p tabindex="0" aria-label="Details of Dr. Binita Phartiyal">
                                                Scientist-F<br>
                                                Birbal Sahni Institute of Palaeosciences (BSIP),<br>
                                                53, University Road, Lucknow-226 007<br>
                                                U.P., India<br>
                                                <b>Mobile Number:</b> 09411856391<br>
                                                <b>Email:</b> <a href="mailto:binita_phartiyal@bsip.res.in"
                                                    class="text-primary">binita_phartiyal@bsip.res.in</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <img src="{{ asset('ic.jpg') }}" alt="Image of IC Committee Convener"
                                        class="ic-image border img-fluid" role="img"
                                        aria-label="Image of IC Committee Convener">
                                </div>
                            </div>

                            <hr>

                            <!-- Members Section -->
                            <h4 class="text-center" tabindex="0" aria-label="Members">Members</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-1">
                                        <h5 id="member-1" tabindex="0" aria-label="Dr. (Mrs.) Anju Saxena">Dr. (Mrs.)
                                            Anju Saxena</h5>
                                        <p tabindex="0" aria-label="Details of Dr. Anju Saxena">
                                            Scientist E<br>
                                            <b>Mobile Number:</b> 09415582686<br>
                                            <b>Email:</b> <a href="mailto:anju_saxena@bsip.res.in"
                                                class="text-primary">anju_saxena@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-2">
                                        <h5 id="member-2" tabindex="0" aria-label="Dr. Vartika Singh">Dr. Vartika
                                            Singh</h5>
                                        <p tabindex="0" aria-label="Details of Dr. Vartika Singh">
                                            Scientist E<br>
                                            <b>Mobile Number:</b> 9450363404<br>
                                            <b>Email:</b> <a href="mailto:vartika_singh@bsip.res.in"
                                                class="text-primary">vartika_singh@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-3">
                                        <h5 id="member-3" tabindex="0" aria-label="Dr. Gaurav Srivastava">Dr. Gaurav
                                            Srivastava</h5>
                                        <p tabindex="0" aria-label="Details of Dr. Gaurav Srivastava">
                                            Scientist E<br>
                                            <b>Mobile Number:</b> 9792704022<br>
                                            <b>Email:</b> <a href="mailto:gaurav_srivastava@bsip.res.in"
                                                class="text-primary">gaurav_srivastava@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-4">
                                        <h5 id="member-4" tabindex="0" aria-label="Registrar and/or his nominee">
                                            Registrar and/or his nominee</h5>
                                        <p tabindex="0" aria-label="Details of Registrar and/or his nominee">
                                            BSIP, Lucknow<br>
                                            <b>Email:</b> <a href="mailto:registrar@bsip.res.in"
                                                class="text-primary">registrar@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-5">
                                        <h5 id="member-5" tabindex="0" aria-label="Dr. (Mrs.) Manisha Tharu">Dr.
                                            (Mrs.) Manisha Tharu</h5>
                                        <p tabindex="0" aria-label="Details of Dr. Manisha Tharu">
                                            Assistant<br>
                                            <b>Mobile Number:</b> 9451383244<br>
                                            <b>Email:</b> <a href="mailto:manishabsip@gmail.com"
                                                class="text-primary">manishabsip@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-6">
                                        <h5 id="member-6" tabindex="0" aria-label="Mr. Akshay Kumar">Mr. Akshay Kumar
                                        </h5>
                                        <p tabindex="0" aria-label="Details of Mr. Akshay Kumar">
                                            LDC<br>
                                            <b>Mobile Number:</b> 9520110694<br>
                                            <b>Email:</b> <a href="mailto:akshay.kumar@bsip.res.in"
                                                class="text-primary">akshay.kumar@bsip.res.in</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="ic-card" role="region" aria-labelledby="member-7">
                                        <h5 id="member-7" tabindex="0" aria-label="Institute's Lawyer">Institute's
                                            Lawyer</h5>
                                        <p tabindex="0" aria-label="Details of Institute's Lawyer">
                                            BSIP, Lucknow
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Complaint Filing Instructions -->
                            <h4 class="text-center" tabindex="0" aria-label="How to file a complaint?"><b>How to file a
                                    complaint?</b></h4>
                            <ul class="ic-instructions">
                                <li tabindex="0"
                                    aria-label="Send an email to the IC Convener at binita_phartiyal@bsip.res.in">
                                    An email regarding the complaint can be sent to the Convener IC
                                    <b>(binita_phartiyal@bsip.res.in)</b>. As soon as the email is received, the complaint
                                    will be registered and acted upon with immediate effect.
                                </li>
                                <li tabindex="0" aria-label="Submit a written complaint directly to the IC Convener">
                                    A written complaint can also be submitted directly to the Convener IC.
                                </li>
                            </ul>

                            <div class="text-center mt-4">
                                <a href="IC_Committee_list_details_for_website.pdf"
                                    class="btn btn-view-profile ic-download-btn" target="_blank"
                                    onclick="return confirmExternalLink()"
                                    download="IC Committee list_details_for_website.pdf"
                                    aria-label="Download IC Committee details in PDF format">
                                    {{ $language === 'hi' ? 'डाउनलोड पीडीएफ़' : 'Download PDF' }} <i
                                        class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                                <span class="ms-1">(0.25) MB</span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
