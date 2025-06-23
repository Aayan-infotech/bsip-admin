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
                <ul>
                    <li>
                        <a href="{{ $language === 'hi' ? url('hi') : url('en') }}"
                            aria-label="{{ $language === 'hi' ? 'मुख्य पृष्ठ पर जाएं' : 'Go to Home' }}">
                            {{ $language === 'hi' ? 'मुख्य' : 'Home' }}
                        </a>
                    </li>
                    <li class="active" aria-current="page">
                        {{ $language === 'hi' ? 'सूचना का अधिकार' : 'Right to Information' }}
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
        <div class="container py-3">
            <div class="row gx-5">
                <!-- Main Content -->
                <div class="col-md-12 content">
                    <div>
                        <h3 id="notices" tabindex="0">
                            {{ $language === 'hi'
                                ? 'आरटीआई अधिनियम 2005 के तहत संस्थान की जानकारी'
                                : 'Institutes Information under RTI
                                        Act 2005 ' }}
                        </h3>
                        <div class="divider"></div>
                    </div>
                    <div class="section-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row mb-4">
                                    <!-- Bye-Laws -->
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                        <div class="card card1 bg-warning border-warning shadow-sm">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-dark">Bye-Laws (May 2016)</h5>
                                                <a href="{{ asset('old/pdf/Bye-laws and rules/Bye-Laws ( May 2016).pdf') }}"
                                                    class="btn btn-light btn-sm mt-2" target="_blank" onclick="return confirmExternalLink()" role="link"
                                                    aria-label="Download Bye-Laws (May 2016)">
                                                    <i class="fas fa-download"></i>
                                                    {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                                </a>
                                                <span
                                                class="ms-1">(0.25) MB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Staff Rules -->
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                        <div class="card card1 bg-info border-info shadow-sm">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-dark">Staff Rules (March 2013)</h5>
                                                <a href="{{ asset('old/pdf/Bye-laws and rules/Staff Rules - BSIP - March 31, 2013.pdf') }}"
                                                    class="btn btn-light btn-sm mt-2" target="_blank" onclick="return confirmExternalLink()" role="link"
                                                    aria-label="Download Staff Rules (March 2013)">
                                                    <i class="fas fa-download"></i>
                                                   {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                                   
                                                </a>
                                                <span
                                                class="ms-1">(0.25) MB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Rules and Regulations -->
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                        <div class="card card1 bg-primary border-primary shadow-sm">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-dark">Rules and Regulations (March 2013)</h5>
                                                <a href="{{ asset('old/pdf/Bye-laws and rules/Rules and Regulation( March 2013).pdf') }}"
                                                    class="btn btn-light btn-sm mt-2" target="_blank" onclick="return confirmExternalLink()" role="link"
                                                    aria-label="Download Rules and Regulations (March 2013)">
                                                    <i class="fas fa-download"></i>
                                                    {{ $language === 'hi' ? 'डाउनलोड करें' : 'Download' }}
                                                </a>
                                                <span
                                                class="ms-1">(0.25) MB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light p-4 rounded shadow-sm border-primary">
                                    <h4 class="text-dark-blue text-center mb-4" tabindex="0" aria-label="Key Officials">
                                        Key Officials
                                    </h4>
                                    <hr class="mb-4">
                                    <div class="row">
                                        <!-- Central Public Information Officer -->
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                            <div class="card bg-dark border-success shadow-sm h-100">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-light">Central Public Information Officer
                                                    </h5>
                                                    <p class="card-text text-light">
                                                        <strong>Pavan Singh Katiyar</strong> <br>
                                                        <span tabindex="0"
                                                            aria-label="Pavan Singh Katiyar, Technical Officer D, appointed as Central Public Information Officer on 15th July 2019">
                                                            Technical Officer - D <br> (wef. 15.07.2019)
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Transparency Officer -->
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                            <div class="card bg-dark border-info shadow-sm h-100">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-light">Transparency Officer</h5>
                                                    <p class="card-text text-light">
                                                        <strong>Dr. Anupam Sharma</strong> <br>
                                                        <span tabindex="0"
                                                            aria-label="Dr. Anupam Sharma, Scientist G, appointed as Transparency Officer">
                                                            Scientist - G
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Appellate Authority -->
                                        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                            <div class="card bg-dark border-primary shadow-sm h-100">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title text-light">Appellate Authority</h5>
                                                    <p class="card-text text-light">
                                                        <strong>Dr. (Mrs.) Binita Phartiyal</strong> <br>
                                                        <span tabindex="0"
                                                            aria-label="Dr. Mrs. Binita Phartiyal, Scientist F, appointed as Appellate Authority">
                                                            Scientist - F
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="accordion bg-light p-4 rounded shadow-sm border border-primary" id="accordion1">

                                    <!-- Accordion Item 1 -->
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="false" aria-controls="collapseOne"
                                                aria-labelledby="headingOne">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading1-text">(i) Particulars of Birbal Sahni
                                                    Institute of Palaeosciences,
                                                    Functions and Duties</span>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <h5 class="fw-bold" id="org-name">Name and Address of the Organization</h5>
                                                <p aria-labelledby="org-name">Birbal Sahni Institute of Palaeosciences, 53
                                                    University Road,
                                                    Lucknow - 226007</p>

                                                <h5 class="fw-bold mt-3" id="org-head">Head of the Organization</h5>
                                                <p aria-labelledby="org-head">Director</p>

                                                <h5 class="fw-bold mt-3" id="vision">Vision, Mission and Key Objectives
                                                </h5>
                                                <p>
                                                    The Institute, established by Professor Birbal Sahni in 1946, focuses on
                                                    the development of
                                                    palaeobotany
                                                    and has expanded to encompass all areas of palaeosciences. Its goals
                                                    include:
                                                </p>
                                                <ul class="ms-4" aria-labelledby="vision">
                                                    <li>Understanding origin and evolution of life through time</li>
                                                    <li>Studying climate change over geological periods</li>
                                                    <li>Exploring ancient civilizations and human history</li>
                                                    <li>Applying research in the oil and coal industry</li>
                                                </ul>

                                                <h5 class="fw-bold mt-3" id="functions">Functions and Duties</h5>
                                                <p aria-labelledby="functions">
                                                    BSIP aims for R&D excellence through a dedicated scientific team and
                                                    cutting-edge research.
                                                    It interprets plant evolution, geological processes, and environmental
                                                    history.
                                                </p>

                                                <h5 class="fw-bold mt-3" id="chart">Organization Chart</h5>
                                                <p>
                                                    <a href="{{ asset('doc/annexure - I-organisational structure.pdf') }}"
                                                        target="_blank" class="text-primary fw-semibold"
                                                        aria-labelledby="chart">
                                                        View Organizational Chart (PDF)
                                                    </a>
                                                </p>

                                                <h5 class="fw-bold mt-3" id="others">Additional Details</h5>
                                                <p aria-labelledby="others">
                                                    The Director has the authority to form various committees (e.g.,
                                                    Research Development, Works,
                                                    Store & Purchase, Museum, etc.)
                                                    to ensure smooth functioning.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 2 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo"
                                                aria-labelledby="headingTwo">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading2-text"> (ii) Powers and duties of Officers and
                                                    Employees of the
                                                    Institute </span>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h4>(i) Powers and duties of officers (administrative, financial and
                                                            judicial)</h4>
                                                        <p>The Chairman of the Governing Body of the Institute presides over
                                                            all the meetings of the
                                                            Governing Body and other Committees of which he is a Member. The
                                                            Governing Body may, by
                                                            resolution, delegate
                                                            to the Chairman such of its powers for the conduct of business
                                                            as it may deem fit, subject
                                                            to the condition that the action taken by the Chairman under the
                                                            powers delegated under the
                                                            rules is
                                                            reported for information at the next meeting of the Governing
                                                            Body. In emergent cases, the
                                                            Chairman exercises the powers of the Governing Body and appraise
                                                            the Governing Body of the
                                                            action taken
                                                            by him
                                                            <br> The Chief Executive of the Institute is the Director whose
                                                            powers and duties are given
                                                            as follows
                                                            <br> 1. The Director is the academic as well as administrative
                                                            head of the Institute. All
                                                            members of staff of the Institute are under the general control
                                                            of the Director who may
                                                            issue standing
                                                            orders from time to time as may be necessary. The Director
                                                            prescribes the duties of all
                                                            officers and employees of the Institute and exercises such
                                                            supervision and disciplinary
                                                            control as may
                                                            be necessary, subject to Rules and Bye-Laws and any other
                                                            instructions that may be issued by
                                                            the Governing Body from time to time.
                                                            <br> 2. It is the duty of the Director to coordinate and
                                                            exercise general supervision over
                                                            all research, training and other activities of the Institute.
                                                            <br> 3. Subject to Rules, the Director has the power to sanction
                                                            all expenditure within the
                                                            approved budget and to make re-appropriations.
                                                            <br> 4. The Director has the power to negotiate and enter into
                                                            contracts on behalf of the
                                                            Institute and to vary or rescind such contracts.
                                                            <br> 5. The Director submits the Annual Report of the Institute
                                                            to the Governing Body during
                                                            its meeting to be held after the close of the financial year but
                                                            not later than the ensuing
                                                            September.
                                                            <br> 6. It is the duty of the Director to see that the
                                                            provisions of the Memorandum of
                                                            Association, Rules and Regulations and the Bye-laws including
                                                            Staff Rules are duly observed.
                                                            <br> The Registrar is Incharge of Administration including
                                                            finance and accounts and is a
                                                            custodian of records and advises the Director on various aspects
                                                            of administrative and
                                                            financial matters
                                                        </p>
                                                        <h4>(ii) Power and duties of other employees</h4>
                                                        <p>vi) The Project Coordinators of Projects are responsible for
                                                            coordinating the scientific
                                                            activities of the projects and report to the Director. vii) The
                                                            Ancillary Units to Research
                                                            are SAIF, Library,
                                                            Publication, Museum, Herbarium, Computer Centre, Photography
                                                            Unit, Maceration Facility, C14
                                                            Unit, Electron Microscopy Unit, TL-OSL and Geochemical unit,
                                                            Palaeomagnetism Laboratory,
                                                            Vertibrate
                                                            Plaeontology Laboratory, Ancient and Modern DNA laboratory, and
                                                            Workshop Unit. The Conveners
                                                            of various Advisory Committees or Scientists Incharge are
                                                            responsible for monitoring the
                                                            activities
                                                            of various ancillary Units for research and report to Director.
                                                            <br> viii) The Accounts Officer is Incharge of Finance &
                                                            Accounts Section and reports to the
                                                            Registrar.
                                                            <br> ix) The Administrative Division excluding Finance &
                                                            Accounts Section is divided into
                                                            four Sections viz Establishment, Scientific Activities, Stores
                                                            and Purchase and Works and
                                                            Building. Each
                                                            Section is headed by a Section Officer who in turn reports to
                                                            the Registrar.
                                                            <br> x) The Institute has appointed a Vigilance Officer, a
                                                            Central Public Information
                                                            Officer supported by one Assistant Central Public Information
                                                            Officers,Transparency Officer
                                                            and an SC/ST
                                                            Welfare(Liaison) Officer.
                                                            <br> xi) The Institute has a Legal Cell which deals with the
                                                            legal matters of the Institute.
                                                            <br> xii) The security services, sanitation services, canteen
                                                            services and telephone
                                                            operation-cum-reception services of the Institute are on
                                                            contract.
                                                            <br>
                                                        </p>
                                                        <h4>(iii) Rules/ orders under which powers and duty are derived and
                                                        </h4>
                                                        <p>The Institute functions as per the provisions of the Rules and
                                                            Regulations, Bye-Laws and
                                                            Staff Rules. Wherever there are no prescribed rules, the
                                                            Institute follows the Government of
                                                            India rules and
                                                            orders as applicable.</p>
                                                        <h4>(iv) Exercised</h4>
                                                        <p><strong>All stated above is exercised for smooth functioning
                                                                of the institute</strong></p>
                                                        <h4>(v) Work allocation</h4>
                                                        <p><strong>The information provided for (i), (ii) and (iii) are
                                                                followed in right sprit</strong></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 3 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading3-text">(III) Procedure followed in the
                                                    decision making process</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Details of Disclosure</th>
                                                                <th scope="col">Remarks / Reference</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Process of decision making</td>
                                                                <td>Identify key decision making points. The Governing Body
                                                                    of the Institute has framed
                                                                    Memorandum of Association, Rules and Regulations,
                                                                    Bye-Laws and Staff Rules with
                                                                    Government approval.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Final decision making authority</td>
                                                                <td>Chairman, Governing Body</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Related provisions, acts, rules etc.</td>
                                                                <td>Rules and Bye-Laws govern general management and staff
                                                                    conditions of the Institute.
                                                                </td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Time limit for taking decisions</td>
                                                                <td>As per the laws and urgency of the matter</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Channel of supervision and accountability</td>
                                                                <td>GB, RAC, F&B, Director, Committee Convenors, Registrar,
                                                                    Vigilance Officer,
                                                                    Transparency Officer</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 4 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading4-text">(IV) Norms set by the Institute for the
                                                    discharge of its
                                                    functions</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Details of Disclosure</th>
                                                                <th scope="col">Remarks / Reference</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Nature of functions/ services offered</td>
                                                                <td>The Institute follows its own Rules, Bye-Laws, and Staff
                                                                    Rules. In absence of specific
                                                                    rules, Government of India rules apply.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Norms/ standards for functions/ service delivery</td>
                                                                <td>Files are routed via Registrar to respective sections.
                                                                    File Tracking System (FTS) is
                                                                    in place to ensure timely processing.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Process by which these services can be accessed</td>
                                                                <td>Via FTS system; facilitates timely decisions and
                                                                    tracking of file movement.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Time-limit for achieving the targets</td>
                                                                <td>Efforts are made to achieve targets within the
                                                                    stipulated time frame.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Process of redress of grievances</td>
                                                                <td>Through Grievance Committee and Internal Complaint
                                                                    Committee (ICC)</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 5 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading5-text">(V) Rules, Regulations, Instructions,
                                                    Manuals and Records
                                                    [Section 4(1)(b)(v)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Details of Disclosure</th>
                                                                <th scope="col">Remarks / Reference</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Title and nature of the record/ manual /instruction</td>
                                                                <td>Memorandum of Association, Rules, Bye-Laws, and Staff
                                                                    Rules framed by the Governing
                                                                    Body. In absence, Government of India rules are
                                                                    followed.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>List of Rules, regulations, instructions, manuals and
                                                                    records</td>
                                                                <td>Rules and Bye-Laws for management; Staff Rules for
                                                                    employee conditions.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Acts/ Rules manuals etc.</td>
                                                                <td>Institute’s Bye-Laws in tandem with Government of India
                                                                    acts/rules.</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Transfer policy and transfer orders</td>
                                                                <td>As per the Bye-Laws and Staff Rules of the Institute
                                                                </td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 6 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSix">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading6-text">(VI) Statement of the Categories of
                                                    Documents Held [Section
                                                    4(1)(b)(vi)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="headingSix" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Details of Disclosure</th>
                                                                <th scope="col">Remarks / Reference</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Categories of documents</td>
                                                                <td>
                                                                    <ul class="mb-0">
                                                                        <li>Governing Body: constitution, agendas, and
                                                                            proceedings</li>
                                                                        <li>Research Advisory Council: constitution,
                                                                            agendas, and proceedings</li>
                                                                        <li>Finance & Building Committee: constitution,
                                                                            agendas, and proceedings</li>
                                                                        <li>Standing Promotions Grievances Committee:
                                                                            constitution, agendas, and proceedings
                                                                        </li>
                                                                        <li>Review Committees documents appointed by GoI
                                                                        </li>
                                                                        <li>Memorandum of Association, Rules, Bye-Laws &
                                                                            related approvals</li>
                                                                        <li>Staff personal files, service books, and
                                                                            establishment matters</li>
                                                                        <li>Recruitment and Promotion records for all staff
                                                                            types</li>
                                                                        <li>Scientific activity files: projects, visits,
                                                                            collaborations, awards, etc.</li>
                                                                        <li>Accounts and financial documents: vouchers,
                                                                            ledgers, FDRs, etc.</li>
                                                                        <li>Store & purchase records: stock registers, AMC
                                                                            contracts, etc.</li>
                                                                        <li>Building matters: maps, drawings, security,
                                                                            canteen, etc.</li>
                                                                        <li>Director’s Office and Research Planning Cell
                                                                            records</li>
                                                                        <li>Registrar’s Office files</li>
                                                                        <li>Technical Units and related Advisory Committees
                                                                            files</li>
                                                                        <li>Legal Cell documents</li>
                                                                        <li>Other admin units: dispatch, transport, guest
                                                                            house, etc.</li>
                                                                    </ul>
                                                                </td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Custodian of documents/categories</td>
                                                                <td>Registrar, BSIP</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 7 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeven">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                                                aria-expanded="false" aria-controls="collapseSeven">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading7-text">(VII) Particulars of any Arrangement
                                                    for Consultation with, or
                                                    Representation by the Public [Section 4(1)(b)(vii)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseSeven" class="accordion-collapse collapse"
                                            aria-labelledby="headingSeven" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Details of Disclosure</th>
                                                                <th scope="col">Remarks / Reference</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Arrangement for consultation with, or representation by
                                                                    the public</td>
                                                                <td>Nil</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 8 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEight">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseEight"
                                                aria-expanded="false" aria-controls="collapseEight">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading8-text">(VIII) Statement of Boards, Councils,
                                                    Committees and Other
                                                    Bodies [Section 4(1)(b)(viii)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseEight" class="accordion-collapse collapse"
                                            aria-labelledby="headingEight" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Details of Disclosure</th>
                                                                <th scope="col">Remarks / Reference</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Name of Boards, Council, Committee etc.</td>
                                                                <td>
                                                                    <ul class="mb-0">
                                                                        <li>Governing Body (Chairperson: Prof. H B
                                                                            Srivastava, w.e.f. September 13, 2024)</li>
                                                                        <li>Research Advisory Council (Chairman: Prof. Subir
                                                                            Sarkar, w.e.f. March 21, 2025)
                                                                        </li>
                                                                        <li>Finance Committee (w.e.f. March 21, 2025)</li>
                                                                        <li>Building Committee (w.e.f. March 21, 2025)</li>
                                                                        <li>Other Committees: KRC, BEMC, Museum, Investment,
                                                                            Welfare, SEM, Rajbhasha, CLSM,
                                                                            Store, Computer, Auditorium & AV, Grievance, ICC
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>Various members including experts, officials from DST,
                                                                    Director and Registrar</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Composition</td>
                                                                <td>Members from DST, domain experts, Director, Registrar,
                                                                    and other designated roles</td>
                                                                <td>Defined in the Bye-Laws and DST nominations</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Date from which constituted</td>
                                                                <td>As mentioned for each committee (e.g., GB from September
                                                                    13, 2024)</td>
                                                                <td>3-year tenure</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Term / Tenure</td>
                                                                <td>Three years</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Powers and Functions</td>
                                                                <td>As per details given in point 1.1</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Whether meetings are open to the public?</td>
                                                                <td>No. Outcomes and decisions are communicated to concerned
                                                                    personnel only</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Whether minutes are open to the public?</td>
                                                                <td>No. Proceedings are not accessible for public</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Place where minutes are available (if open)</td>
                                                                <td>Not Applicable</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 9 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNine">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseNine"
                                                aria-expanded="false" aria-controls="collapseNine">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading9-text">(IX) Directory of Officers and
                                                    Employees [Section
                                                    4(1)(b)(ix)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseNine" class="accordion-collapse collapse"
                                            aria-labelledby="headingNine" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <p><strong>(i) Name and Designation:</strong></p>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle table-sm">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col">Designation</th>
                                                                <th scope="col">Name(s)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Director</td>
                                                                <td>Prof. Mahesh G Thakkar</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scientist 'G'</td>
                                                                <td>Dr. Anupam Sharma</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scientists 'F'</td>
                                                                <td>Dr. (Mrs.) Binita Partiyal, Dr. A. K. Pokharaia, Dr.
                                                                    Ratan Kar, Dr. Srinivas Bikkina
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scientists 'E'</td>
                                                                <td>Dr. S. K. Basumatary, Dr. Pawan Govil, Dr. Srikanta
                                                                    Murthy, Dr. S. K. Shah, Dr. Hukam
                                                                    Singh, Dr. Veeru K. Singh, Dr. Biswajeet Thakur, Dr. S.
                                                                    S. K. Pillai, Dr. (Mrs.) K.
                                                                    Pauline Sabina, Dr. (Mrs.) Anju Saxena, Dr. Abhijit
                                                                    Mazumdar, Dr. P. S. Ranhotra, Dr.
                                                                    (Ms) Vartika Singh, Dr. Gaurav Srivastava, Dr. (Mrs.)
                                                                    Swati Tripathi, Dr. (Mrs.) Anjali
                                                                    Trivedi, Dr. (Mrs.) Poonam Verma, Dr. (Mrs.) Neha
                                                                    Aggarwal, Dr. (Mrs.) Deepa Agnihotri,
                                                                    Dr. Kamlesh Kumar, Dr. (Mrs.) Shilpa Pandey, Dr. (Mrs.)
                                                                    Neelam, Dr. M. F. Quamar, Dr.
                                                                    (Mrs.) Jyoti Srivastava, Anumeha Shukla, Dr. K. G.
                                                                    Misra, Dr. Shailesh Agrawal, Dr. S.
                                                                    N. Ali, Dr. (Mrs.) Abha Singh, Dr. V. V. Kapur</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scientists 'D'</td>
                                                                <td>Sh. Manoj M.C., Dr. R. P. Mathews, Dr. S. K. Pandey, Dr.
                                                                    S. K. Shukla, Dr. A. H.
                                                                    Ansari, Dr. Gurumurthy GP, Dr. Niraj Rai, Dr. P.
                                                                    Morthekai, Dr. Prasanna K., Dr.
                                                                    Niteshkumar Narendra Khonde</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scientists 'C'</td>
                                                                <td>Dr. Yogmaya Shukla, Mohd. Arif, Dr. Trina Bose, Dr.
                                                                    Adrita Choudhuri, Dr. Anuag Kumar,
                                                                    Sh. Sabyasachi Mandal, Dr. Divya Kumari Mishra, Dr.
                                                                    Shreya Mishra, Dr. Prem Raj
                                                                    Uddandam, Dr. Ansuya Bhandari</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Scientists 'B'</td>
                                                                <td>Sh. Sanjay Kumar Singh Gahlaud, Dr. Nimish Kapoor</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Technical Officer 'D'</td>
                                                                <td>Shri Makhukar Arvind, Shri P. S. Katiyar, Shri R. L.
                                                                    Mehra, Shri Y.P. Singh, Shri
                                                                    Subodh Kumar</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Technical Officers 'B'</td>
                                                                <td>Shri S.R. Ali, Shri D. S. Bisht, Shri D. K. Pal, Shri
                                                                    Dhirendra Sharma, Dr. S. K.
                                                                    Singh</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Technical Officers 'A'</td>
                                                                <td>Shri S.K. Bisht, Sh. Ishwar Chandra Rahi, Ms. Nandita
                                                                    Tiwari, Dr. Nilay Govind</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Technical Assistants 'E'</td>
                                                                <td>Shri M. S. Rana, Shri A. K. Srivastava, Shri Amrit Pal
                                                                    Singh Chadha, Shri Pawan Kumar
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Technical Assistants 'D'</td>
                                                                <td>Sh. Sandeep Kumar Kohri, Ishwar Chandra Shukla, Jitendra
                                                                    Yadav</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Technical Assistants 'B'</td>
                                                                <td>Sh. Jaskaran, Sh. Ashok Sharma, Sh. Ram Ujagar, Ms.
                                                                    Shivalee Srivastava, Sh. Raja Ram
                                                                    Verma</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Technical Assistants 'A'</td>
                                                                <td>Ms. Archana Sonkar, Shailendra Kumar</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Registrar</td>
                                                                <td>Sh. Sandeep Kumar Shivhare</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accounts Officer</td>
                                                                <td>Sh. Ashutosh Shukla</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Section Officers</td>
                                                                <td>Smt. Swapna Majumdar, Sh. Shailendra S Panwar, Sh.
                                                                    Avinesh Srivastava, Shri Mishri Lal
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Accountant</td>
                                                                <td>Shri Ashok Kumar</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Assistants</td>
                                                                <td>Ms. Manisha Tharu, Shri R. K. Mishra, Sh. Dheerendra
                                                                    Kumar</td>
                                                            </tr>
                                                            <tr>
                                                                <td>U.D.Cs</td>
                                                                <td>Mrs. Sudha Kuriel, Shri Rahul Gupta, Ms. Anupam Jain,
                                                                    Shri Manoj Singh</td>
                                                            </tr>
                                                            <tr>
                                                                <td>L.D.Cs</td>
                                                                <td>Smt. Vijay Venkateswari, Sh. Shailesh Kumar, Sh.
                                                                    Purneshwar Mishra, Sh. Karan Yadav,
                                                                    Pushkar Verma, Sh. Akshay Kumar, Sh. Abhishek Sachan,
                                                                    Mrs. Savita Nair, Ms. Barsha Shah,
                                                                    Sh. Abhay Shukla</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Drivers IV</td>
                                                                <td>Sri P.K. Mishra</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Multi Tasking - II</td>
                                                                <td>Sri Ram Dheeraj, Sri Dhan B. Kunwar</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Multi Tasking - I</td>
                                                                <td>Sri R.K. Awasthi, Smt. Beena, Sri Deepak Kumar, Sri V.
                                                                    S. Gaikwad, Sri Inder Kumar,
                                                                    Km. Nandani, Sri Ravi Shankar, Sh. Shailesh Kumar, Sh.
                                                                    Suneet Kumar, Sh. Ankit Pratap
                                                                    Singh, Ms. Bhavana Bajpai, Ms. Sandhya Singh, Sh. Inder
                                                                    Kumar Yadav, Shri Ram Chandra,
                                                                    Shri Ram Kewal, Shri Mathura Prasad</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <p class="mt-3"><strong>(ii) Telephone, Fax, and Email ID:</strong>
                                                    Please refer to the website <a href="http://www.bsip.res.in"
                                                        target="_blank" rel="noopener noreferrer">www.bsip.res.in</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 10 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTen"
                                                aria-expanded="false" aria-controls="collapseTen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading10-text">(X) Monthly Remuneration [Section
                                                    4(1)(b)(x)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseTen" class="accordion-collapse collapse"
                                            aria-labelledby="headingTen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped mt-3">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Details of Disclosure</th>
                                                                <th>Remarks / Reference Points</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Monthly remuneration received by each of its Officers
                                                                    and employees, including the
                                                                    system of compensation as provided in its regulations.
                                                                </td>
                                                                <td>(i) List of employees with Gross monthly remuneration
                                                                    (March, 2025)</td>
                                                                <td>
                                                                    <a href="{{ asset('doc/Annexure - II-List of employees with gross remuneration.pdf') }}"
                                                                        target="_blank" class="text-primary fw-semibold">
                                                                        View Annexure - II (PDF)
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(ii) System of compensation as provided in its
                                                                    regulations</td>
                                                                <td>In case of demise of a serving staff, a member of the
                                                                    deceased family is offered a job
                                                                    in the institute.</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 11 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEleven">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseEleven"
                                                aria-expanded="false" aria-controls="collapseEleven">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading11-text">(XI) Budget Allocation [Section
                                                    4(1)(b)(xi)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseEleven" class="accordion-collapse collapse"
                                            aria-labelledby="headingEleven" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <p><strong>Budget allocated to each of its agency, including particulars of
                                                        all plans, proposed
                                                        expenditures and reports on disbursements made:</strong></p>

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped mt-3">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Details of Disclosure</th>
                                                                <th>Remarks / Reference Points</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>(i) Total Budget for the public authority</td>
                                                                <td>Rs. 109,32,19,059/-</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(ii) Budget for each agency and plan & programmes</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(iii) Proposed expenditures</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(iv) Revised budget for each agency, if any</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(v) Report on disbursements made and place where the
                                                                    related reports are available
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Accordion Item 12 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwelve">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwelve"
                                                aria-expanded="false" aria-controls="collapseTwelve">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading12-text">(XII) Manner of Execution of Subsidy
                                                    Programmes [Section
                                                    4(1)(b)(xii)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseTwelve" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwelve" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <p><strong>Manner of execution of subsidy programmes, including the amounts
                                                        allocated and the
                                                        details of beneficiaries:</strong></p>

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped mt-3">
                                                        <thead class="table-primary">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Details of Disclosure</th>
                                                                <th>Remarks / Reference Points</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>(i) Name of the programme of activity</td>
                                                                <td>The Birbal Sahni Institute of Palaeosciences, Lucknow
                                                                    does not execute any subsidy
                                                                    programme.</td>
                                                                <td>Fully Met</td>
                                                            </tr>
                                                            <tr>
                                                                <td>(ii) Objective of the programme</td>
                                                                <td>—</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(iii) Procedure to avail benefits</td>
                                                                <td>—</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(iv) Duration of the programme / scheme</td>
                                                                <td>—</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(v) Physical and financial targets of the programme</td>
                                                                <td>—</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(vi) Nature / scale of subsidy / amount allotted</td>
                                                                <td>—</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(vii) Eligibility criteria for grant of subsidy</td>
                                                                <td>—</td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>(viii) Details of beneficiaries of subsidy programme
                                                                    (number, profile, etc.)</td>
                                                                <td>Canteen services</td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 13 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThirteen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThirteen"
                                                aria-expanded="false" aria-controls="collapseThirteen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading13-text">(xiii) Particulars of recipients of
                                                    concessions, permits or
                                                    authorizations granted by it:</span>
                                            </button>
                                        </h2>
                                        <div id="collapseThirteen" class="accordion-collapse collapse"
                                            aria-labelledby="headingThirteen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <p>
                                                    The Institute adheres to the Government of India norms, as applicable to
                                                    Autonomous Bodies and
                                                    updated from time to time, regarding the reservations and concessions
                                                    provided to:
                                                </p>
                                                <ul>
                                                    <li>Scheduled Castes (SC)</li>
                                                    <li>Scheduled Tribes (ST)</li>
                                                    <li>Other Backward Classes (OBC)</li>
                                                    <li>Physically Handicapped Persons (PH)</li>
                                                </ul>
                                                <p>
                                                    These concessions/reservations apply specifically to posts meant for
                                                    direct recruitment. Several
                                                    staff members have been appointed under these categories in accordance
                                                    with the prescribed
                                                    norms.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 14 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFourteen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFourteen"
                                                aria-expanded="false" aria-controls="collapseFourteen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading14-text">(xiv) Details in respect of the
                                                    information, available to or
                                                    held by it, reduced in an electronic form:</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFourteen" class="accordion-collapse collapse"
                                            aria-labelledby="headingFourteen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <p>The Institute publishes an international journal ‘The Palaeobotanist’,
                                                    various scientific
                                                    publications including monographs, catalogues and proceedings etc. in
                                                    addition to its Annual
                                                    Report and Newsletter. The Institute is also hosting web site viz <a
                                                        href="https://www.bsip.res.in" target="_blank">www.bsip.res.in</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 15 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFifteen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFifteen"
                                                aria-expanded="false" aria-controls="collapseFifteen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading15-text">(xv) Particulars of facilities
                                                    available to citizens for
                                                    obtaining information, including the working hours of a library or
                                                    reading room, if maintained
                                                    for public use :</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFifteen" class="accordion-collapse collapse"
                                            aria-labelledby="headingFifteen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Details of Disclosure</th>
                                                                <th>Remarks / Reference Points</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Particulars of facilities available to citizen for
                                                                    obtaining information [Section
                                                                    4(1)(b)(xv)]</td>
                                                                <td>(i) Name & Location of the Facility</td>
                                                                <td>The Museum and Library of the Institute are open during
                                                                    working hours of the
                                                                    Institute, excluding Saturdays, Sundays, and holidays.
                                                                    Citizens can visit the Museum or
                                                                    consult the Library with the permission of the Director.
                                                                    The annual report of the
                                                                    Institute is meant for public use and distribution to
                                                                    various Agencies. The annual
                                                                    report is also available on the Institute’s website.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(ii) Details of Information Made Available</td>
                                                                <td>Information is available through the Institute’s website
                                                                    and can also be provided via
                                                                    mail, phone calls, or in-person visits.</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(iii) Working Hours of the Facility</td>
                                                                <td>9:30 AM to 6:00 PM.</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(iv) Contact Person & Contact Details</td>
                                                                <td>
                                                                    <strong>Prof. Mahesh G Thakkar, Director</strong><br>
                                                                    BSIP, 53 University Road, Lucknow - 226007<br>
                                                                    Ph: 0522- 2742901<br>
                                                                    Email: <a
                                                                        href="mailto:director@bsip.res.in">director@bsip.res.in</a><br><br>

                                                                    <strong>Sh. Sandeep Kumar Shivhare,
                                                                        Registrar</strong><br>
                                                                    BSIP, 53 University Road, Lucknow - 226007<br>
                                                                    Ph: 0522- 2742903<br>
                                                                    Email: <a
                                                                        href="mailto:registrar@bsip.res.in">registrar@bsip.res.in</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 16 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSixteen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSixteen"
                                                aria-expanded="false" aria-controls="collapseSixteen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading16-text">(xvi) Names, designations and other
                                                    particulars of the Public
                                                    Information Officers :</span>
                                            </button>
                                        </h2>
                                        <div id="collapseSixteen" class="accordion-collapse collapse"
                                            aria-labelledby="headingSixteen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <p><strong>(i) Name and Designation of the Public Information Officer (PIO),
                                                        Assistant Public
                                                        Information Officers (APIO), & Appellate Authority:</strong></p>
                                                <ul>
                                                    <li><strong>Dr. Anupam Sharma</strong>, Scientist - G, Transparency
                                                        Officer</li>
                                                    <li><strong>Dr. Binita Phartiyal</strong>, Scientist - F, First
                                                        Appellate Authority</li>
                                                    <li><strong>Sh. P. S. Katiyar</strong>, Technical Officer - D, CPIO</li>
                                                    <li><strong>Shri. Madhukar Arvind</strong>, Technical Officer - D,
                                                        Assistant Central Public
                                                        Information Officer</li>
                                                    <li><strong>Mrs. Swapna Mazumdar</strong>, Section Officer, Assistant
                                                        Central Public Information
                                                        Officer</li>
                                                </ul>

                                                <p><strong>(ii) Address, Telephone Numbers, and Email ID of Each Designated
                                                        Official:</strong></p>
                                                <ul>
                                                    <li><strong>Dr. Anupam Sharma</strong>, BSIP, 53 University Road,
                                                        Lucknow<br>
                                                        Email: <a
                                                            href="mailto:anupam110367@gmail.com">anupam110367@gmail.com</a><br>
                                                        Mobile: 7839457713
                                                    </li>
                                                    <li><strong>Dr. Binita Phartiyal</strong>, BSIP, 53 University Road,
                                                        Lucknow<br>
                                                        Email: <a
                                                            href="mailto:binitaphartiyal@googlemail.com">binitaphartiyal@googlemail.com</a><br>
                                                        Mobile: +91 94118 56391
                                                    </li>
                                                    <li><strong>Sh. P. S. Katiyar</strong>, BSIP, 53 University Road,
                                                        Lucknow<br>
                                                        Email: <a
                                                            href="mailto:pskatiyar@bsip.res.in">pskatiyar@bsip.res.in</a><br>
                                                        Mobile: 9450358919
                                                    </li>
                                                    <li><strong>Shri. Madhukar Arvind</strong>, BSIP, 53 University Road,
                                                        Lucknow<br>
                                                        Email: <a
                                                            href="mailto:madhukar_arvind@bsip.res.in">madhukar_arvind@bsip.res.in</a><br>
                                                        Mobile: 9450018846
                                                    </li>
                                                    <li><strong>Mrs. Swapna Mazumdar</strong>, BSIP, 53 University Road,
                                                        Lucknow<br>
                                                        Email: <a href="mailto:soe@bsip.res.in">soe@bsip.res.in</a><br>
                                                        Mobile: 6388436049
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Accordion Item 17 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingSeventeen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseSeventeen"
                                                aria-expanded="false" aria-controls="collapseSeventeen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading17-text">(XVII) Such Other Information as May
                                                    Be Prescribed</span>
                                            </button>
                                        </h2>
                                        <div id="collapseSeventeen" class="accordion-collapse collapse"
                                            aria-labelledby="headingSeventeen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Details of Disclosure</th>
                                                                <th>Remarks / Reference Points</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Such other information as may be prescribed under
                                                                    section 4(i)(b)(xvii)</td>
                                                                <td>(i) Grievance redressal mechanism</td>
                                                                <td>By hand or By post<br>Grievance Committee,<br>Internal
                                                                    Complaint Committee (ICC)</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(ii) Details of applications received under RTI and
                                                                    information provided</td>
                                                                <td>
                                                                    <a href="{{ asset('doc/Annexure - V-Details of applications received under RTI and information provided.pdf') }}"
                                                                        target="_blank" class="text-primary fw-semibold">
                                                                        View Annexure - V (PDF)
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(iii) List of completed schemes/ projects/ programmes
                                                                </td>
                                                                <td>
                                                                    <a href="http://www.bsip.res.in" target="_blank"
                                                                        class="text-primary fw-semibold">
                                                                        www.bsip.res.in
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(iv) List of schemes/ projects/ programmes underway</td>
                                                                <td>
                                                                    <a href="{{ asset('doc/Annexure VI- Research Project 2021-2025.pdf') }}"
                                                                        target="_blank" class="text-primary fw-semibold">
                                                                        View Annexure - VI (PDF)
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(v) Details of all contracts entered into including name
                                                                    of the contractor, amount and
                                                                    duration</td>
                                                                <td>
                                                                    <ul class="mb-0">
                                                                        <li><strong>Security Services:</strong> M/s UP Purva
                                                                            Sainik Kalyan Nigam Ltd., Lucknow
                                                                            - Rs. 44,00,000/-</li>
                                                                        <li><strong>Sanitation Services:</strong> M/s A N
                                                                            Kapur Pvt. Ltd., Lucknow - Rs.
                                                                            25,00,000/-</li>
                                                                        <li><strong>AMC of EPABX:</strong> M/s Digitech
                                                                            System - Rs. 17,300/-</li>
                                                                        <li><strong>AMC of Air Conditioners:</strong> M/s
                                                                            Cold Refrigeration, Lucknow - Rs.
                                                                            3,26,600/-</li>
                                                                        <li><strong>AMC of Aqua Guards:</strong> M/s M S
                                                                            Enterprises, Lucknow - Rs. 63,800/-
                                                                        </li>
                                                                        <li><strong>AMC of Generator:</strong> M/s Rajat
                                                                            Enterprises - Rs. 8,500/-</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(vi) Annual Report</td>
                                                                <td>
                                                                    <a href="{{ url($language . '/bsip_annual_reports') }}"
                                                                        target="_blank" class="text-primary fw-semibold">
                                                                        View Annual Reports
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>(viii) Any other information</td>
                                                                <td>
                                                                    <ul class="mb-0">
                                                                        <li><strong>Citizen’s Charter:</strong> Nil</li>
                                                                        <li><strong>Result Framework Document
                                                                                (RFD):</strong> Nil</li>
                                                                        <li><strong>Six-Monthly Reports:</strong> Nil</li>
                                                                        <li><strong>Performance Against Benchmarks:</strong>
                                                                            Nil</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 18 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingEighteen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseEighteen"
                                                aria-expanded="false" aria-controls="collapseEighteen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading18-text">(XVIII) Receipt & Disposal of RTI
                                                    Applications & Appeals
                                                    [F.No 1/6/2011-IR dt. 15.04.2013]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseEighteen" class="accordion-collapse collapse"
                                            aria-labelledby="headingEighteen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Details of Disclosure</th>
                                                                <th>Remarks/ Reference Points</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Receipt & Disposal of RTI applications & appeals [F.No
                                                                    1/6/2011-IR dt. 15.04.2013]
                                                                </td>
                                                                <td>(i) Details of applications received and disposed</td>
                                                                <td>
                                                                    <a href="{{ asset('doc/Annexure - V-Details of applications received under RTI and information provided.pdf') }}"
                                                                        target="_blank" class="text-primary fw-semibold">
                                                                        View Annexure - V (PDF)
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Receipt & Disposal of RTI applications & appeals [F.No
                                                                    1/6/2011-IR dt. 15.04.2013]
                                                                </td>
                                                                <td>(ii) Details of appeals received and orders issued</td>
                                                                <td>
                                                                    <a href="{{ asset('doc/Annexure - V-Details of applications received under RTI and information provided.pdf') }}"
                                                                        target="_blank" class="text-primary fw-semibold">
                                                                        View Annexure - V (PDF)
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion Item 19 -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingNineteen">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseNineteen"
                                                aria-expanded="false" aria-controls="collapseNineteen">
                                                <i class="bi bi-arrow-right me-2 text-primary" aria-hidden="true"></i>
                                                <span id="accordion1-heading19-text">(XIX) Replies to Questions Asked in
                                                    the Parliament [Section
                                                    4(1)(d)(2)]</span>
                                            </button>
                                        </h2>
                                        <div id="collapseNineteen" class="accordion-collapse collapse"
                                            aria-labelledby="headingNineteen" data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Details of Disclosure</th>
                                                                <th>Remarks/ Reference Points</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Replies to questions asked in the parliament [Section
                                                                    4(1)(d)(2)]</td>
                                                                <td>Details of questions asked and replies given</td>
                                                                <td>
                                                                    <a href="{{ asset('doc/Annexure - VII-Replies to Question asked in the parliament.pdf') }}"
                                                                        target="_blank" class="text-primary fw-semibold">
                                                                        View Annexure - VII (PDF)
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="doc/participation in workshop.pdf" target="_blank">
                                    <h4 class="text-primary"> </h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
