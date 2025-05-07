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
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $language === 'hi' ? 'मदद' : 'Help' }}
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="common-mobile-view">
        <div class="container my-5">
            <h2 class="mb-2">Help</h2>
            <p>Information related to the various screen readers</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Screen Reader</th>
                            <th>Website</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Screen Access For All (SAFA)</td>
                            <td><a href="https://lists.sourceforge.net/lists/listinfo/safa-developer" target="_blank"><i
                                        class="bi bi-link-45deg"></i> SAFA Developer</a></td>
                            <td><i class="bi bi-check-circle-fill text-success"></i> Free</td>
                        </tr>
                        {{-- <tr>
                            <td>Non Visual Desktop Access (NVDA)</td>
                            <td><a href="http://www.nvda-project.org" target="_blank" onclick="return confirmExternalLink()"><i class="bi bi-link-45deg"></i>
                                    nvda-project.org</a></td>
                            <td><i class="bi bi-check-circle-fill text-success"></i> Free</td>
                        </tr> --}}
                        <tr>
                            <td>System Access To Go</td>
                            <td><a href="http://www.satogo.com" target="_blank" onclick="return confirmExternalLink()"><i class="bi bi-link-45deg"></i>
                                    satogo.com</a></td>
                            <td><i class="bi bi-check-circle-fill text-success"></i> Free</td>
                        </tr>
                        <tr>
                            <td>Thunder</td>
                            <td><a href="http://www.webbie.org.uk/thunder" target="_blank" onclick="return confirmExternalLink()"><i class="bi bi-link-45deg"></i>
                                    webbie.org.uk</a></td>
                            <td><i class="bi bi-check-circle-fill text-success"></i> Free</td>
                        </tr>
                        <tr>
                            <td>WebAnywhere</td>
                            <td><a href="http://webinsight.cs.washington.edu/" target="_blank" onclick="return confirmExternalLink()"><i
                                        class="bi bi-link-45deg"></i> webinsight.cs.washington.edu</a></td>
                            <td><i class="bi bi-check-circle-fill text-success"></i> Free</td>
                        </tr>
                        <tr>
                            <td>Hal</td>
                            <td><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=5" target="_blank" onclick="return confirmExternalLink()"><i
                                        class="bi bi-link-45deg"></i> yourdolphin.co.uk</a></td>
                            <td><i class="bi bi-currency-dollar text-warning"></i> Commercial</td>
                        </tr>
                        <tr>
                            <td>JAWS</td>
                            <td><a href="http://www.freedomscientific.com/Downloads/JAWS" target="_blank" onclick="return confirmExternalLink()"><i
                                        class="bi bi-link-45deg"></i> freedomscientific.com</a></td>
                            <td><i class="bi bi-currency-dollar text-warning"></i> Commercial</td>
                        </tr>
                        <tr>
                            <td>Supernova</td>
                            <td><a href="http://www.yourdolphin.co.uk/productdetail.asp?id=1" target="_blank" onclick="return confirmExternalLink()"><i
                                        class="bi bi-link-45deg"></i> yourdolphin.co.uk</a></td>
                            <td><i class="bi bi-currency-dollar text-warning"></i> Commercial</td>
                        </tr>
                        {{-- <tr>
                            <td>Window-Eyes</td>
                            <td><a href="http://www.gwmicro.com/Window-Eyes/" target="_blank" onclick="return confirmExternalLink()"><i
                                        class="bi bi-link-45deg"></i> gwmicro.com</a></td>
                            <td><i class="bi bi-currency-dollar text-warning"></i> Commercial</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <style>
        .policy-header {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .section-standardisation {
            background-color: #e3f2fd;
        }

        .section-copyright {
            background-color: #e3f2fd;
        }

        .section-hyperlinking {
            background-color: #e3f2fd;
        }

        .section-privacy {
            background-color: #e3f2fd;
        }

        .section-terms {
            background-color: #e3f2fd;
        }
        .table a{
            text-decoration: none;
            color: #004b8c;
        }
    </style>
@endsection
