<footer class="section bg-footer">
    <div class="container">
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
                        <i class="fas fa-phone-alt" role="presentation"></i> {{$contact->contact}}
                    </p>
                    <p class="contact-info">
                        <i class="fas fa-envelope" role="presentation"></i> {{$contact->email}}
                    </p>
                    <!-- <p class="contact-info">
                        <i class="fas fa-envelope" role="presentation"></i> registrar@bsip.res.in
                    </p> -->
                    <p class="contact-info">
                        <i class="fas fa-globe" role="presentation"></i>
                        <a href="{{$contact->website}}" target="_blank" class="text-white">{{$contact->website}}</a>
                    </p>

                    <!-- Social Links -->
                    <div class="mt-1">
                        <ul class="list-inline">
                            @foreach($socialLinks as $link)
                            <li class="list-inline-item">
                                <a href="{{ $link->url }}" role="link" aria-label="{{ $link->title }}" target="_blank">
                                    <!-- <i class="fab {{ $link->icon_class }} footer-social-icon"></i> -->
                                    <img style="width: 60%;" alt="Social Link" src="{{ asset('storage/' . $link->icon_image) }}">
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
                        @foreach($importantLinks as $link)
                        <li>
                            <a href="{{ Str::startsWith($link->url, ['http://', 'https://']) ? $link->url : url($language . '/' . $link->url) }}"
                                role="link"
                                aria-label="{{ $language === 'hi' ? $link->hin_title : $link->title }}"
                                {{ Str::startsWith($link->url, ['http://', 'https://']) ? 'target="_blank"' : '' }}>
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
                        @foreach($usefulLinks as $link)
                        <li>
                            <a href="{{ Str::startsWith($link->url, ['http://', 'https://']) ? $link->url : url($language . '/' . $link->url) }}"
                                role="link"
                                aria-label="{{ $language === 'hi' ? $link->hin_title : $link->title }}"
                                {{ Str::startsWith($link->url, ['http://', 'https://']) ? 'target="_blank"' : '' }}>
                                {{ $language === 'hi' ? $link->hin_title : $link->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Site Visitors Section -->
            <div class="col-lg-2 col-6">
                <div class="visitor-section text-center">
                    <h4 class="footer-heading mb-3" style="font-weight: bold; color: #1565c0;">
                        {{ $language === 'hi' ? 'साइट आगंतुक' : 'Site Visitors' }}
                    </h4>
                    <div class="visitor-counter" style="background: #f7f7f7; padding: 15px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <p style="font-size: 18px; font-weight: bold; margin: 0; color: #333;">
                            {{ $language === 'hi' ? 'आगंतुक : ' . $visitorCount : 'Visitors : ' . $visitorCount }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <p class="footer-alt mb-0 f-14">
                    {{ $language === 'hi' ? '2025 © कॉपीराइट, सर्वाधिकार सुरक्षित' : '2025 © Copyright | All Rights Reserved' }}
                </p>
            </div>
            <div class="col-md-6 text-end">
                <p class="footer-alt mb-0 f-14">
                    {{ $language === 'hi' ? 'डिज़ाइन एवं विकसित द्वारा' : 'Designed & Developed By' }}
                    <span>
                        <a href="https://aayaninfotech.com/" class="text-white" target="_blank" role="link" aria-label="aayan">Aayan Infotech</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</footer>