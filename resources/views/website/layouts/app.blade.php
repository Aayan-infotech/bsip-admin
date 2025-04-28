<!DOCTYPE html>
<html lang="{{ $language }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=yes">

   <meta name="format-detection" content="telephone=no" />
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="apple-touch-icon" href="{{ asset('assets-new/assets/images/favicon/bsip-favicon.png') }}">
   <link rel="icon" href="{{ asset('assets-new/assets/images/favicon/bsip-favicon.png') }}">
   <!-- <title>{{ $language === 'hi' ? 'मुख्य पृष्ठ | बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान' : 'Home | Birbal Sahni Institute of Palaeosciences' }}</title> -->
   <title>{{ $pageTitle }}{{ $language === 'hi' ? ' | बीरबल साहनी पुरावनस्पतिविज्ञान संस्थान' : ' | Birbal Sahni Institute of Palaeosciences' }}</title>
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
</head>

<body>
   <div id="fb-root"></div>

   <!-- Include Header -->
   @include('website.layouts.header', ['language' => $language])

   <main>
      @yield('content')
   </main>

   <!-- Include Footer -->
   @include('website.layouts.footer', ['language' => $language])

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
         startAutoScroll("research-highlights");
         startAutoScroll("notices-updates");
      });
   </script>
   <script>
      let currentIndex = 0;
      const jumpMargin = 250; // Matches the slider item width including margin
      const sliderContainer = document.querySelector(".slider-container");
      const sliderItems = [...document.querySelectorAll(".slider-item")];
      const sliderWrapperWidth = document.querySelector(".slider-wrapper").offsetWidth;

      // Clone slider items for infinite scrolling
      sliderItems.forEach((item) => {
         const clone = item.cloneNode(true);
         sliderContainer.appendChild(clone);
      });

      // Add event listeners for buttons
      document.querySelector(".btn-left").addEventListener("click", slideLeft);
      document.querySelector(".btn-right").addEventListener("click", slideRight);

      function updateSlider() {
         const offset = currentIndex * -jumpMargin;
         sliderContainer.style.transition = "transform 0.5s ease";
         sliderContainer.style.transform = `translateX(${offset}px)`;
      }

      function slideLeft() {
         if (currentIndex > 0) {
            currentIndex--;
         } else {
            // Handle the case when at the start and need to jump to the cloned items
            sliderContainer.style.transition = "none";
            currentIndex = sliderItems.length; // Jump to the cloned end
            const offset = currentIndex * -jumpMargin;
            sliderContainer.style.transform = `translateX(${offset}px)`;
            setTimeout(() => {
               sliderContainer.style.transition = "transform 0.5s ease";
               currentIndex--;
               updateSlider();
            }, 20);
            return;
         }
         updateSlider();
      }

      function slideRight() {
         currentIndex++;
         updateSlider();

         // Reset to the original position when reaching the end of cloned items
         if (currentIndex >= sliderItems.length) {
            setTimeout(() => {
               sliderContainer.style.transition = "none"; // Disable transition
               currentIndex = 0; // Reset index
               const offset = currentIndex * -jumpMargin;
               sliderContainer.style.transform = `translateX(${offset}px)`;
            }, 500); // Match the transition duration
         }
      }

      function autoScroll() {
         slideRight();
      }

      window.onload = () => {
         // Start auto-scrolling
         setInterval(autoScroll, 3000); // Auto-scroll every 3 seconds
      };
   </script>
</body>

</html>