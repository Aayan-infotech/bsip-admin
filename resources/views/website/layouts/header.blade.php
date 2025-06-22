<header>
    <div class="region region-header-top">
        <div id="block-cmf-content-header-region-block" class="block block-cmf-content first last odd">
            <div class="wrapper common-wrapper">
                <div class="container common-container four_content top-header">
                    <div class="common-right clearfix">
                        <ul id="header-nav">
                            <li class="ico-skip cf">
                                <a href="#skipToContent" title="">
                                    {{ $language === 'hi' ? 'मुख्य सामग्री पर जाएँ' : 'Skip to main content' }}
                                </a>
                            </li>
                            <li class="ico-skip cf">
                                <a href="{{ route('frontend.help', ['language' => $language]) }}" title="">
                                    {{ $language === 'hi' ? 'स्क्रीन रीडर एक्सेस' : 'Screen Reader Access' }}
                                </a>
                            </li>
                            <li class="ico-site-search cf">
                                <a href="javascript:void(0)" id="toggleSearch" title="Site Search" class="text-dark">
                                    <img class="top"
                                        src="{{ asset('assets-new/assets/images/ico-site-search.png') }}"
                                        alt="Site Search">

                                </a>
                                <div class="search-drop both-search">
                                    <div class="find">
                                        <form name="searchForm" id="searchForm"
                                            action="{{ route('frontend.search', ['language' => $language]) }}">
                                            <label for="search" class="notdisplay">Search</label>
                                            <input type="text" name="search" id="search" autocomplete="off"
                                                required value="{{ old('search') }}">
                                            <input type="submit" value="Search" class="bttn-search">
                                        </form>
                                        <div id="auto_suggesion"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="ico-accessibility accessibility-inline" style="list-style: none;">
                                <div id="accessibilityBar" role="group" aria-label="Accessibility Controls">
                                    <a onClick="set_font_size('increase')" title="Increase font size"
                                        href="#">A<sup>+</sup></a>
                                    <a onClick="set_font_size('reset')" title="Reset font size" href="#">A</a>
                                    <a onClick="set_font_size('decrease')" title="Decrease font size"
                                        href="#">A<sup>-</sup></a>
                                    <a href="javascript:void(0);" class="high-contrast dark" title="High Contrast">Dark
                                        Mode</a>
                                    <a href="javascript:void(0);" class="high-contrast light" title="Normal Contrast"
                                        style="display: none;">Light Mode</a>
                                </div>
                            </li>
                            {{-- <li class="ico-social cf">
                                <a href="#" id="toggleSocial" title="Social Medias" class="text-dark">
                                    <img class="top" src="{{ asset('assets-new/assets/images/ico-social.png') }}"
                                        alt="Social Medias">
                                </a>
                                <ul>
                                    @foreach ($socialLinks as $link)
                                        <li>
                                            <a target="_blank" title="Social Link" href="{{ $link->url }}"
                                                onclick="return confirmExternalLink()">
                                                <img alt="Social Link"
                                                    src="{{ asset('storage/' . $link->icon_image) }}">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li> --}}
                            <li class="ico-sitemap cf">
                                <a href="{{ route('frontend.sitemap', ['language' => $language]) }}" title="Sitemap"
                                    aria-label="sitemap" class="text-dark">
                                    <img class="top" src="{{ asset('assets-new/assets/images/ico-sitemap.png') }}"
                                        alt="Sitemap">
                                </a>
                            </li>
                            <!-- Desktop Language Switcher (d-hide) -->
                            <li class="hindi cmf_lan d-hide">
                                <label class="de-lag" for="language-select">
                                    <span>Language</span>
                                </label>
                                <select id="language-select" title="Select language" aria-label="Select Language"
                                    onchange="confirmAndChangeLanguage(this)">
                                    <option value="{{ url('en/' . request()->segment(2)) }}"
                                        {{ request()->segment(1) === 'en' ? 'selected' : '' }}>
                                        English
                                    </option>
                                    <option value="{{ url('hi/' . request()->segment(2)) }}"
                                        {{ request()->segment(1) === 'hi' ? 'selected' : '' }}>
                                        हिन्दी
                                    </option>
                                </select>
                            </li>

                            <!-- Mobile Language Switcher (m-hide) -->
                            <li class="hindi cmf_lan m-hide">
                                <a href="javascript:;" title="Select Language">Language</a>
                                <nav aria-label="Language selector">
                                    <ul>
                                        <li>
                                            <a href="{{ url('/en') }}" lang="en" class="alink"
                                                title="Click here for English version."
                                                @if ($language === 'en') aria-current="page" @endif
                                                onclick="return confirmLanguageChange('English')">
                                                English
                                            </a>

                                        </li>
                                        <li>
                                            <a href="{{ url('/hi') }}" lang="hi" class="alink"
                                                title="Click here for हिन्दी version."
                                                {{ $language === 'hi' ? 'aria-current="page"' : '' }}
                                                onclick="return confirmLanguageChange('हिन्दी')">
                                                हिन्दी
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <p id="scroll" style="display: none;"><span></span></p>
    </div>
    <!--Top-Header Section end-->
    <section class="wrapper header-wrapper">
        <div class="container-fluid common-container four_content header-container">
            <div class="row">
                <div class="col-md-12 logo">

                    <a href="{{ url($language) }}" title="{{ $logo->title ?? 'Go to home page' }}" rel="home"
                        class="header__logo" id="logo"
                        aria-label="Homepage - Birbal Sahni Institute of Palaeosciences">
                        <img class="national_emblem" src="{{ asset($logo->logo ?? 'default-logo.png') }}"
                            alt="Birbal Sahni Institute of Palaeosciences - Homepage" loading="lazy">
                    </a>

                </div>
                <h1 class="visually-hidden">Welcome to My Accessible Website</h1>
            </div>
        </div>
    </section>
    <div class="wrapper megamenu-wraper">

        <div class="container-fluid common-container four_content">
            {{-- <p class="showhide"><em></em><em></em><em></em></p> --}}
            <a href="javascript:void(0);" class="showhide" id="menuToggleBtn" aria-label="Toggle mobile menu" >
                <em></em><em></em><em></em>
            </a>
            <nav class="main-menu clearfix" id="main_menu">
                <ul class="nav-menu">
                    @foreach ($headerMenus as $menu)
                        <li class="nav-item" aria-haspopup="true" aria-expanded="false">
                            <a href="{{ $menu->menuHas === 'Page' ? '#' : url($language . '/' . $menu->url) }}"
                                aria-label="{{ $language === 'hi' ? $menu->hin_title : $menu->title }}"
                                tabindex="0" class="menu-toggle" aria-expanded="false">
                                @if ($menu->title === 'Home')
                                    {{ $language === 'hi' ? 'होम' : 'Home' }}
                                @else
                                    {{ $language === 'hi' ? $menu->hin_title : $menu->title }}
                                @endif
                            </a>
                            @if ($menu->menuHas === 'Page' && $menu->menuPages->isNotEmpty())
                                <div class="sub-nav" data-keyboard-toggle="false">
                                    <ul class="sub-nav-group">
                                        @foreach ($menu->menuPages as $page)
                                            <li>
                                                <a href="{{ Str::startsWith($page->page_url, ['http://', 'https://']) ? $page->page_url : url($language . '/' . $page->page_url) }}"
                                                    target="{{ Str::startsWith($page->page_url, ['http://', 'https://']) ? '_blank' : '_self' }}"
                                                    tabindex="0"
                                                    aria-label="{{ $language === 'hi' ? $page->hin_title : $page->title }}"
                                                    onclick="{{ Str::startsWith($page->page_url, ['http://', 'https://']) ? 'return confirmExternalLink()' : '' }}">
                                                    {{ $language === 'hi' ? $page->hin_title : $page->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
            <nav class="main-menu clearfix" id="overflow_menu">
                <ul class="nav-menu clearfix"></ul>
            </nav>
        </div>

    </div>

</header>
