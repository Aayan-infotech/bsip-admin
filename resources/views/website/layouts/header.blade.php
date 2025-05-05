<header>
    <div class="region region-header-top">
        <div id="block-cmf-content-header-region-block" class="block block-cmf-content first last odd">
            <div class="wrapper common-wrapper">
                <div class="container common-container four_content top-header">
                    <div class="common-right clearfix">
                        <ul id="header-nav">
                            <li class="ico-skip cf"><a href="#skipToContent" title=""> {{ $language === 'hi' ? 'मुख्य सामग्री पर जाएँ':'Skip to main content' }} </a>
                            </li>
                            <li class="ico-skip cf"><a href="{{ route('frontend.help',['language'=>$language]) }}" title="">{{ $language === 'hi' ? 'स्क्रीन रीडर एक्सेस':'Screen Reader Access' }}</a>
                            </li>
                            <li class="ico-site-search cf">
                                <a href="#" id="toggleSearch" title="Site Search" role="link">
                                    <img class="top"
                                        src="{{ asset('assets-new/assets/images/ico-site-search.png') }}"
                                        alt="Site Search" /></a>
                                <div class="search-drop both-search">
                                    <div class="google-find">
                                        <form method="get" action="http://www.google.com/search" target="_blank">
                                            <label for="search_key_g" class="notdisplay">Search</label>
                                            <input type="text" name="q" value="" id="search_key_g" />
                                            <input type="submit" value="Search" class="submit" />
                                            <fieldset>
                                                <legend>Search Options</legend>
                                                <input type="radio" name="sitesearch" value="" id="the_web">
                                                <label for="the_web">The Web</label>
                                                <input type="radio" name="sitesearch" value="india.gov.in" checked
                                                    id="the_domain">
                                                <label for="the_domain">INDIA.GOV.IN</label>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="find">
                                        <form name="searchForm" action="#">
                                            <label for="search_key" class="notdisplay">Search</label>
                                            <input type="text" name="search_key" id="search_key"
                                                onKeyUp="autoComplete()" autocomplete="off" required />
                                            <input type="submit" value="Search" class="bttn-search" />
                                        </form>
                                        <div id="auto_suggesion"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="ico-accessibility accessibility-inline" style="list-style: none;">
                                <div id="accessibilityBar" role="group" aria-label="Accessibility Controls">
                                    <a onClick="set_font_size('increase')" title="Increase font size" href="#"
                                        role="link">A<sup>+</sup></a>
                                    <a onClick="set_font_size('reset')" title="Reset font size" href="#"
                                        role="link">A</a>
                                    <a onClick="set_font_size('decrease')" title="Decrease font size" href="#"
                                        role="link">A<sup>-</sup></a>
                                        <a href="javascript:void(0);" class="high-contrast dark" title="High Contrast"
                                        role="link">Dark Mode</a>
                                    <a href="javascript:void(0);" class="high-contrast light" title="Normal Contrast"
                                        style="display: none;" role="link">Light Mode</a>
                                </div>
                            </li>
                            <li class="ico-social cf">
                                <a href="#" id="toggleSocial" title="Social Medias" role="link">
                                    <img class="top" src="{{ asset('assets-new/assets/images/ico-social.png') }}"
                                        alt="Social Medias" /></a>
                                <ul>

                                    @foreach ($socialLinks as $link)
                                        <li>
                                            <a target="_blank" title="Social Link" href="{{ $link->url }}"><img
                                                    alt="Social Link"
                                                    src="{{ asset('storage/' . $link->icon_image) }}"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="ico-sitemap cf">
                                <a href="{{ route('frontend.sitemap', ['language' => $language]) }}" title="Sitemap"
                                    role="link" aria-label="sitemap">
                                    <img class="top" src="{{ asset('assets-new/assets/images/ico-sitemap.png') }}"
                                        alt="Sitemap" /></a>
                            </li>
                            <!-- Desktop Language Switcher (d-hide) -->
                            <li class="hindi cmf_lan d-hide">
                                <label class="de-lag" for="language-select">
                                    <span>Language</span>
                                </label>
                                <select id="language-select" title="Select language"
                                    onchange="location = this.value;">
                                    <option value="{{ url('en/' . request()->segment(2)) }}"
                                        {{ request()->segment(1) === 'en' ? 'selected' : '' }}>English</option>
                                    <option value="{{ url('hi/' . request()->segment(2)) }}"
                                        {{ request()->segment(1) === 'hi' ? 'selected' : '' }}>हिन्दी</option>
                                </select>
                            </li>

                            <!-- Mobile Language Switcher (m-hide) -->
                            <li class="hindi cmf_lan m-hide">
                                <a href="javascript:;" title="Select Language">Language</a>
                                <ul>
                                    <li>
                                        <a href="{{ url('/en') }}" lang="en" class="alink"
                                            title="Click here for English version."
                                            {{ $language === 'en' ? 'aria-current="page"' : '' }}>English</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/hi') }}" lang="hi" class="alink"
                                            title="Click here for हिन्दी version."
                                            {{ $language === 'hi' ? 'aria-current="page"' : '' }}>हिन्दी</a>
                                    </li>
                                </ul>
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
                    <a href="{{ url($language) }}" title="{{ $logo->title ?? 'Home' }}" rel="home"
                        class="header__logo" id="logo">
                        <img class="national_emblem" src="{{ asset($logo->logo ?? 'default-logo.png') }}"
                            alt="{{ $logo->title ?? 'Birbal Sahni Institute of Palaeosciences Logo' }}">
                    </a>
                </div>
                <h1 class="d-none">1</h1>
            </div>
        </div>
    </section>
    <style>
        .main-menu ul>li {
            margin-right: 8px !important;
        }
    </style>
    <section class="wrapper megamenu-wraper">
        <div class="container-fluid common-container four_content">
            <p class="showhide"><em></em><em></em><em></em></p>
            <nav class="main-menu clearfix" id="main_menu">
                <ul class="nav-menu">
                    @foreach ($headerMenus as $menu)
                        <li class="nav-item" aria-haspopup="true" aria-expanded="false">
                            <a href="{{ $menu->menuHas === 'Page' ? '#' : url($language . '/' . $menu->url) }}"
                                role="link"
                                aria-label="{{ $language === 'hi' ? $menu->hin_title : $menu->title }}">
                                @if ($menu->title === 'Home')
                                    <i class="fa fa-home" aria-hidden="true"></i> <!-- Home icon -->
                                @else
                                    {{ $language === 'hi' ? $menu->hin_title : $menu->title }}
                                @endif
                            </a>
                            @if ($menu->menuHas === 'Page' && $menu->menuPages->isNotEmpty())
                                <div class="sub-nav">
                                    <ul class="sub-nav-group">
                                        @foreach ($menu->menuPages as $page)
                                            <li>
                                                <a href="{{ Str::startsWith($page->page_url, ['http://', 'https://']) ? $page->page_url : url($language . '/' . $page->page_url) }}"
                                                    target="{{ Str::startsWith($page->page_url, ['http://', 'https://']) ? '_blank' : '_self' }}"
                                                    role="link"
                                                    aria-label="{{ $language === 'hi' ? $page->hin_title : $page->title }}">
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
                <ul class="nav-menu clearfix">
                </ul>
            </nav>
        </div>
        <style type="text/css">
            body~.sub-nav {
                right: 0
            }
        </style>
    </section>
</header>
