<style>
    .sidebar {
        background-color: #d0e8ff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-left: 20px;
    }
    .content{
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
        text-decoration: none;
        font-size: 1rem;
        color: #495057;
        padding: 8px 12px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .sidebar-nav a i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .sidebar-nav a.active {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .sidebar-nav a:hover {
        background-color: #e9ecef;
        color: #007bff;
    }
</style>

<div class="col-md-2 sidebar">
    <nav aria-label="{{ $language === 'hi' ? 'साइडबार नेविगेशन' : 'Sidebar Navigation' }}">
        <ul class="sidebar-nav">
            <li>
                <p class="sidebar-heading">
                    {{ $language === 'hi' ? 'प्रोफाइल' : 'Profile' }}
                </p>
            </li>
            @foreach ($menuPages as $menuPage)
                <li>
                    <a href="{{ url($language . '/' . $menuPage->page_url) }}" 
                       class="{{ $menuPage->id === $currentPageId ? 'active' : '' }}" 
                       aria-label="{{ $language === 'hi' ? $menuPage->hin_title : $menuPage->title }}">
                        <i class="{{ $menuPage->icon }}"></i> 
                        <span>{{ $language === 'hi' ? $menuPage->hin_title : $menuPage->title }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>