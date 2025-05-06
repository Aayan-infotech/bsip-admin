<footer class="section bg-footer">
    <div class="container content-print">
        <div class="row">
            <!-- Contact Section -->
            <div class="col-lg-4 col-6">
                <div class="">
                    <h4 class="footer-heading">{{ $language === 'hi' ? 'संपर्क करें' : 'Contact Us' }}</h4>
                    <p class="contact-info mt-4">
                        {{ $language === 'hi'
                            ? 'बीरबल साहनी पुराविज्ञान संस्थान, 53 विश्वविद्यालय रोड, लखनऊ - 226007, उत्तर प्रदेश, भारत'
                            : 'Birbal Sahni Institute of Palaeosciences, 53 University Road, Lucknow - 226007, Uttar Pradesh, India' }}
                    </p>
                    <p class="contact-info">
                        <i class="fas fa-phone-alt" role="presentation"></i> {{ $contact->contact }}
                    </p>
                    <p class="contact-info">
                        <i class="fas fa-envelope" role="presentation"></i> {{ $contact->email }}
                    </p>
                    <!-- <p class="contact-info">
                        <i class="fas fa-envelope" role="presentation"></i> registrar@bsip.res.in
                    </p> -->
                    <p class="contact-info">
                        <i class="fas fa-globe" role="presentation"></i>
                        <a href="{{ $contact->website }}" target="_blank" class="text-white">{{ $contact->website }}</a>
                    </p>

                    <!-- Social Links -->
                    <div class="mt-1">
                        <ul class="list-inline">
                            @foreach ($socialLinks as $link)
                                <li class="list-inline-item">
                                    <a href="{{ $link->url }}" role="link" aria-label="{{ $link->title }}"
                                        target="_blank"
                                        onclick="return confirmExternalLink()"
                                        >
                                        <!-- <i class="fab {{ $link->icon_class }} footer-social-icon"></i> -->
                                        <img style="max-width:30px;" alt="Social Link"
                                            src="{{ asset('storage/' . $link->icon_image) }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Important Links Section -->
            <div class="col-lg-3 col-6">
                <div class="">
                    <h4 class="footer-heading">{{ $language === 'hi' ? 'महत्वपूर्ण लिंक' : 'Important Links' }}</h4>
                    <ul class="list-unstyled footer-link mt-4">
                        @foreach ($importantLinks as $link)
                            <li>
                                <a href="{{ Str::startsWith($link->url, ['http://', 'https://']) ? $link->url : url($language . '/' . $link->url) }}"
                                    role="link"
                                    aria-label="{{ $language === 'hi' ? $link->hin_title : $link->title }}"
                                    {{ Str::startsWith($link->url, ['http://', 'https://']) ? 'target="_blank"' : '' }}
                                    onclick="{{ Str::startsWith($link->url, ['http://', 'https://']) ? 'return confirmExternalLink()' : '' }}">
                                    {{ $language === 'hi' ? $link->hin_title : $link->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Useful Links Section -->
            <div class="col-lg-3 col-6">
                <div class="">
                    <h4 class="footer-heading">{{ $language === 'hi' ? 'उपयोगी लिंक' : 'Useful Links' }}</h4>
                    <ul class="list-unstyled footer-link mt-4">
                        @foreach ($usefulLinks as $link)
                            <li>
                                <a href="{{ Str::startsWith($link->url, ['http://', 'https://']) ? $link->url : url($language . '/' . $link->url) }}"
                                    role="link"
                                    aria-label="{{ $language === 'hi' ? $link->hin_title : $link->title }}"
                                    {{ Str::startsWith($link->url, ['http://', 'https://']) ? 'target="_blank"' : '' }}
                                    onclick="{{ Str::startsWith($link->url, ['http://', 'https://']) ? 'return confirmExternalLink()' : '' }}"
                                    >
                                    {{ $language === 'hi' ? $link->hin_title : $link->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Site Visitors Section -->
            <div class="col-lg-2 col-6">
                <div class="visitor-section">
                    <h4 class="footer-heading mb-3" style="font-weight: bold; color: #1565c0;">
                        {{ $language === 'hi' ? 'साइट आगंतुक' : 'Site Visitors' }}
                    </h4>
                    <div class="visitor-counter"
                        style="background: #f7f7f7; padding: 5px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <p style="font-size: 18px; font-weight: bold; margin: 0; color: #000000;">
                            {{ $language === 'hi' ? 'आगंतुक : ' . $visitorCount : 'Visitors : ' . $visitorCount }}
                        </p>
                    </div>
                </div>
                <div class="mt-3">
                    <h4 class="footer-heading" style="font-weight: bold; color: #1565c0;">
                        {{ $language === 'hi' ? 'महत्वपूर्ण लिंक' : 'Other Links' }}
                    </h4>
                    <div class="important-links">
                        <ul class="list-unstyled footer-link">
                            <li><a href="https://quiz.mygov.in/" target="_blank" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'माईगव क्विज़' : 'MyGov Quiz' }}</a></li>
                            <li><a href="https://transformingindia.mygov.in/" target="_blank" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'ट्रांसफॉर्मिंग इंडिया' : 'Transforming India' }}</a></li>
                            <li><a href="https://innovate.mygov.in/" target="_blank" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'माईगव नवाचार' : 'MyGov Innovation' }}</a></li>
                            <li><a href="https://pledge.mygov.in/" target="_blank" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'माईगव प्रतिज्ञा' : 'MyGov Pledge' }}</a></li>
                            {{-- <li><a href="https://blog.mygov.in/" target="_blank" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'माईगव ब्लॉग' : 'MyGov Blog' }}</a></li>
                            <li><a href="https://self4society.mygov.in/" target="_blank" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'सेल्फ4सोसाइटी' : 'Self4Society' }}</a></li>
                            <li><a href="https://campus.mygov.in/" target="_blank" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'कैंपस कार्यक्रम' : 'Campus Program' }}</a></li> --}}
                        </ul>
                    </div>
                </div>

            </div>


            <div class="divider" style="border-bottom: 1px solid rgb(255, 255, 255);"></div>
            <div class="row text-center">
                <div class="col-md-2 footer-link"><a
                    href="{{ route('frontend.copyRightPolicy', ['language' => $language]) }}"
                    class="text-white"
                    aria-label="{{ $language === 'hi' ? 'कॉपीराइट नीति' : 'Copyright Policy' }}">
                    {{ $language === 'hi' ? 'कॉपीराइट नीति' : 'Copyright Policy' }}
                </a>

                </div>
                <div class="col-md-2 footer-link"><a
                    href="{{ route('frontend.securityPolicy', ['language' => $language]) }}"
                    class="text-white"
                    aria-label="{{ $language === 'hi' ? 'सुरक्षा नीति' : 'Security Policy' }}">
                    {{ $language === 'hi' ? 'सुरक्षा नीति' : 'Security Policy' }}
                </a>
                </div>
                <div class="col-md-2 footer-link"><a
                    href="{{ route('frontend.onlineFeedbackForm', ['language' => $language]) }}"
                    class="text-white"
                    aria-label="{{ $language === 'hi' ? 'ऑनलाइन फीडबैक फॉर्म' : 'Online Feedback Form' }}">
                    {{ $language === 'hi' ? 'ऑनलाइन फीडबैक फॉर्म' : 'Online Feedback Form' }}
                </a>

                </div>


                <div class="col-md-2 footer-link"><a href="{{ route('frontend.help', ['language' => $language]) }}"
                        class="text-white">{{ $language === 'hi' ? 'मदद' : 'Help' }}</a></div>
                <div class="col-md-2 footer-link"><a
                        href="{{ route('frontend.contactUs', ['language' => $language]) }}" class="text-white">
                        {{ $language === 'hi' ? 'संपर्क करें' : 'Contact Us' }}</a></div>
                <div class="col-md-2 footer-link"><a
                        href="https://www.india.gov.in/" target="_blank"
                        aria-label="National Portal"
                        class="text-white" onclick="return confirmExternalLink()">{{ $language === 'hi' ? 'राष्ट्रीय पोर्टल' : 'National Portal' }}</a></div>
            </div>

        </div>
    </div>

    <!-- Footer Bottom Section -->
    <div class="container mt-5 content-print">
        <div class="row">

            <div class="col-md-4 text-center">
                <p class="footer-alt mb-0 f-14">
                    {{ $language === 'hi' ? '2025 © कॉपीराइट, सर्वाधिकार सुरक्षित' : '2025 © Copyright | All Rights Reserved' }}
                </p>
            </div>
            <div class="col-md-4">
                <p class="footer-alt mb-0 f-14 text-center">{{ $language === 'hi' ? 'अंतिम अपडेट' : 'Last Updated' }}: {{ $lastModified }}</p>
            </div>

            <div class="col-md-4 text-center">
                <p class="footer-alt mb-0 f-14">
                    {{ $language === 'hi' ? 'डिज़ाइन एवं विकसित द्वारा' : 'Designed & Developed By' }}
                    <span>
                        <a href="https://aayaninfotech.com/" class="text-white" target="_blank" role="link"
                            aria-label="aayan">Aayan India</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</footer>
