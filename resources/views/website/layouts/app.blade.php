<!DOCTYPE html>
<html lang="{{ $language }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=yes">

    <meta name="format-detection" content="telephone=no" />
    @stack('meta-tags')
    <meta name="author" content="Birbal Sahni Institute of Palaeosciences">
    <meta name="keywords"
        content="BSIP, Birbal Sahni Institute of Palaeosciences, Palaeobotany, Palaeobiology, Research,
        Science, Education, India">
    <link rel="apple-touch-icon" href="{{ asset('assets-new/assets/images/favicon/bsip-favicon.png') }}">
    <link rel="icon" href="{{ asset('assets-new/assets/images/favicon/bsip-favicon.png') }}">
    <!-- <title>{{ $language === 'hi' ? 'मुख्य पृष्ठ | बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान' : 'Home | Birbal Sahni Institute of Palaeosciences' }}</title> -->
    <title>
        {{ $pageTitle }}{{ $language === 'hi' ? ' | बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान' : ' | Birbal Sahni Institute of Palaeosciences' }}
    </title>
    <!-- Custom styles -->
    <link href="{{ asset('assets-new/assets/css/base.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/assets/css/base-responsive.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/assets/css/grid.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/assets/css/font.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/assets/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/assets/css/flexslider.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/assets/css/megamenu.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/assets/css/print.css') }}" rel="stylesheet" media="print">
    <link href="{{ asset('assets-new/theme/css/site.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/theme/css/site-responsive.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets-new/theme/css/ma5gallery.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets-new/theme/css/print.css') }}" rel="stylesheet" type="text/css" media="print">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-new/assets/css/custom.css') }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script>
        function confirmLanguageChange(language) {
            let message = language === 'English' ?
                'Do you want to change the language?' : 'क्या आप भाषा बदलना चाहते हैं?';

            return confirm(message);
        }



        function confirmAndChangeLanguage(select) {
            const selectedOption = select.options[select.selectedIndex];
            const language = selectedOption.text;

            // const message = {{ $language === 'hi' ? 'क्या आप भाषा बदलना चाहते हैं?' : 'Do you want to change the language?' }};
            const message = (language === 'English') ?
                'Do you want to change the language?' : 'क्या आप भाषा बदलना चाहते हैं?';

            if (confirm(message)) {
                location = selectedOption.value;
            } else {
                // Revert to previously selected option
                select.selectedIndex = [...select.options].findIndex(option => option.defaultSelected);
            }
        }

        function confirmExternalLink() {
            const language = '{{ $language }}';
            console.log(language);
            return confirm(language === 'hi' ? 'क्या आप बाहरी लिंक पर जाना चाहते हैं?' :
                'Do you want to go to external link?');
        }
    </script>
    <style>
        @media print {

            header,
            .slides {
                display: block !important;
            }

            .ico-social.cf li img {
                border: 1px solid red
            }
        }
    </style>
</head>

<body>
    <div id="fb-root"></div>

    <!-- Include Header -->
    @include('website.layouts.header', ['language' => $language])

    <main>
        @yield('content')
    </main>

    <!-- Include Footer -->
    @include('website.layouts.footer', ['language' => $language, 'lastModified' => $lastModified])


    <!-- Scripts -->
    <script src="{{ asset('assets-new/assets/js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('assets-new/assets/js/jquery-accessibleMegaMenu.js') }}"></script>
    <script src="{{ asset('assets-new/assets/js/framework.js') }}"></script>
    <script src="{{ asset('assets-new/assets/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('assets-new/assets/js/font-size.js') }}"></script>
    <script src="{{ asset('assets-new/assets/js/swithcer.js') }}"></script>
    <script src="{{ asset('assets-new/theme/js/ma5gallery.js') }}"></script>
    <script src="{{ asset('assets-new/assets/js/megamenu.js') }}"></script>
    <script src="{{ asset('assets-new/theme/js/easyResponsiveTabs.js') }}"></script>
    <script src="{{ asset('assets-new/theme/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

    {{--
    <script>
        function startAutoScroll(containerId) {
            const container = document.getElementById(containerId);
            let scrollAmount = 0;
            const scrollInterval = setInterval(() => {
                scrollAmount += 1;
                container.scrollTop = scrollAmount;
                if (scrollAmount >= container.scrollHeight - container.clientHeight) {
                    scrollAmount = 0;
                }
            }, 30);
            container.addEventListener("mouseover", () => clearInterval(scrollInterval));
            container.addEventListener("mouseout", () => startAutoScroll(containerId));
        }
        document.addEventListener("DOMContentLoaded", () => {
            if (window.location.pathname === "/en" || window.location.pathname === "/hi") {
                startAutoScroll("research-highlights");
                startAutoScroll("notices-updates");
            }
        });
    </script> --}}

    <script>
        function setupAutoScroll(containerId) {
            const container = document.getElementById(containerId);
            if (!container) return;

            let scrollInterval = null;

            function startScrolling() {
                if (scrollInterval) return;

                scrollInterval = setInterval(() => {
                    container.scrollTop += 1;
                    if (container.scrollTop >= container.scrollHeight - container.clientHeight) {
                        container.scrollTop = 0;
                    }
                }, 30);
            }

            function stopScrolling() {
                clearInterval(scrollInterval);
                scrollInterval = null;
            }

            container.addEventListener("mouseover", stopScrolling);
            container.addEventListener("mouseout", startScrolling);

            startScrolling();
        }

        document.addEventListener("DOMContentLoaded", () => {
            const path = window.location.pathname;
            if (path === "/en" || path === "/hi") {
                setupAutoScroll("research-highlights");
                setupAutoScroll("notices-updates");
            }
        });

        // let currentZoom = window.devicePixelRatio;

        // function checkZoomChange() {
        //     const newZoom = window.devicePixelRatio;
        //     if (newZoom !== currentZoom) {
        //         currentZoom = newZoom;
        //         const zoomPercent = Math.round(newZoom * 100);
        //         if (zoomPercent > 130) {
        //             window.location.reload();
        //         }
        //     }
        // }
        // window.addEventListener('resize', checkZoomChange);

    </script>

    @yield('scripts')

</body>

</html>
