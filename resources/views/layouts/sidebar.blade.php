<div class="col-md-2 col-sm-3 bg-light sidebar" style="min-height: 100vh; padding: 20px; max-width: fit-content;">
    <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-expanded="false" aria-controls="sidebarMenu">
        Open Menu
    </button>
    <div class="collapse d-md-block" id="sidebarMenu">
        <!-- <h5 class="text-white" style="background: blue; padding: 5px; border-radius: 5px;">User Management</h5> -->
        <ul class="nav flex-column">
            @php
                $userId = Auth::id(); // Get the logged-in user's ID
                $modules = \App\Models\Module::with(['pages' => function ($query) use ($userId) {
                    $query->whereIn('id', function ($subQuery) use ($userId) {
                        $subQuery->select('page_id')
                            ->from('user_rights')
                            ->where('user_id', $userId);
                    });
                }])
                ->where('id', '1') // Filter modules by category (e.g., user-management)
                ->whereHas('pages', function ($query) use ($userId) {
                    $query->whereIn('id', function ($subQuery) use ($userId) {
                        $subQuery->select('page_id')
                            ->from('user_rights')
                            ->where('user_id', $userId);
                    });
                })->get();
            @endphp

            @foreach($modules as $module)
                <li class="nav-item">
                    <a class="nav-link {{ request()->is($module->module_url) ? 'active' : '' }}" href="#">
                        <i class="fas fa-cogs"></i> {{ $module->name }}
                    </a>
                    <ul class="nav flex-column ms-3">
                        @foreach($module->pages->sortBy('sequence') as $page)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is($page->page_url) ? 'active' : '' }}" href="{{ url($page->page_url) }}">
                                    <i class="fas fa-file-alt"></i> {{ $page->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>