<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        @includeFirst([config('sb-admin-2.brand'), 'sb-admin-2::layouts.partials.brand'])
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider mt-0">
    @includeFirst([config('sb-admin-2.sidebar-menu'), 'sb-admin-2::layouts.partials.sidebar-menu'])
    <!-- Divider -->
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
