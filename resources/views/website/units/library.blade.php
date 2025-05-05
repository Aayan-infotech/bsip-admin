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
                    <h3 id="history">{{ $language === 'hi' ? $currentPage['hin_title'] : $currentPage['title'] }}</h3>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/library/krc1.jpg') }}"
                                alt="Library 1" class="img-fluid img-history"></div>
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/library/krc2.jpg') }}"
                                alt="Library 2" class="img-fluid img-history"></div>
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/library/krc3.jpg') }}"
                                alt="Library 3" class="img-fluid img-history"></div>
                        <div class="col-md-3"><img src="{{ asset('assets-new/assets/library/krc4.jfif') }}"
                                alt="Library 4" class="img-fluid img-history"></div>

                        <div class="col-md-12 mt-3">
                            <p class="normal-text">The Library subscribes a wide variety of journals and is also a member of
                                CSIR-DST consortia NKRC (National Knowledge Resource Consortium). The online access of many
                                e-journals
                                from Elsevier, Springer, Wiley, Taylor & Francis, Oxford University Press and databases like
                                Scopus,
                                Web of Sciences is available to users over the institute LAN. The access of software viz.
                                iThenticate
                                and Grammarly provides facility for plagiarism check.</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center">Collection Snapshot of BSIP Library</h3>
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Resource Type</th>
                                        <th>Size</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Books (in English)</td>
                                        <td>6419</td>
                                    </tr>
                                    <tr>
                                        <td>Journals (Bound Volumes)</td>
                                        <td>18032</td>
                                    </tr>
                                    <tr>
                                        <td>Reprints</td>
                                        <td>40179</td>
                                    </tr>
                                    <tr>
                                        <td>Reference Books</td>
                                        <td>356</td>
                                    </tr>
                                    <tr>
                                        <td>Books (in Hindi)</td>
                                        <td>902</td>
                                    </tr>
                                    <tr>
                                        <td>PhD Thesis</td>
                                        <td>148</td>
                                    </tr>
                                    <tr>
                                        <td>Reports</td>
                                        <td>46</td>
                                    </tr>
                                    <tr>
                                        <td>Maps & Atlas</td>
                                        <td>61</td>
                                    </tr>
                                    <tr>
                                        <td>Microfilm/Fisches</td>
                                        <td>294</td>
                                    </tr>
                                    <tr>
                                        <td>Compact Disk</td>
                                        <td>74</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-end"><strong>Source: Annual Report 2022-23</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
