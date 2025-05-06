<style>
    /* .sidebar {
        background-color: #004b8c;
        padding:
            7px;
        padding-left: 7px;
        border-radius:
            8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-left: 20px;
        padding-left: 0px;
    }

    .content {
        width: 80%;
    }

    .sidebar-heading {
        font-size: 1.2rem;
        color: #343a40;
        margin-bottom: 1rem;
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
    }

    .sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-nav li {
        margin-bottom: 10px;
    }

    .sidebar-nav a {
        display: flex;
        align-items: center;
        text-decoration:
            none;
        font-size: 14px;
        color:rgb(255, 255, 255);
        padding:
            8px 12px;
        border-radius:
            5px;
        transition:
            all 0.3s ease;
    }

    .sidebar-nav a i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .sidebar-nav a.active {
        background-color: #bd371a;
        color: #fff;
        font-weight: bold;
    }

    .sidebar-nav a:hover {
        background-color: #fff;
        color: #007bff;
        margin-left: 5px;
    } */
</style>

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
