<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'laravel') }}</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider mt-0">
    @includeFirst([config('sb-admin-2.sidebar-menu'), 'sb-admin-2::layouts.partials.sidebar-menu'])
    <!-- Divider -->
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-auto mb-5">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
