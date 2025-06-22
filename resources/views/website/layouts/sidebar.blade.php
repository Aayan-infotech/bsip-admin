<div class="col-md-3 sidebar">
    <nav aria-label="{{ $language === 'hi' ? 'साइडबार नेविगेशन' : 'Sidebar Navigation' }}">
        <ul class="sidebar-nav">
            <li>
                @if (isset($currentHeaderMenu) && !empty($currentHeaderMenu))
                    <h2 class="sidebar-heading">
                        {{ $language === 'hi' ? $currentHeaderMenu['hin_title'] : $currentHeaderMenu['title'] }}
                    </h2>
                @endIf
            </li>
            @foreach ($menuPages as $menuPage)
                <li>
                    <a href="{{ Str::startsWith($menuPage->page_url, ['http://', 'https://']) ? $menuPage->page_url : url($language . '/' . $menuPage->page_url) }}"
                        target="{{ Str::startsWith($menuPage->page_url, ['http://', 'https://']) ? '_blank' : '_self' }}"
                        class="{{ $menuPage->id === $currentPageId ? 'active' : '' }}"
                        aria-label="{{ $language === 'hi' ? $menuPage->hin_title : $menuPage->title }}"
                         onclick="{{ Str::startsWith($menuPage->page_url, ['http://', 'https://']) ? 'return confirmExternalLink()' : '' }}"
                        >
                        <i class="{{ $menuPage->icon }}"></i>
                        <span>{{ $language === 'hi' ? $menuPage->hin_title : $menuPage->title }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
