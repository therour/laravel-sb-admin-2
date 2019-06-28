@sidebarMenu([
    'title' => 'Dashboard',
    'icon' => 'fas fa-fw fa-tachometer-alt',
    'route' => 'demos.index',
])

@sidebarDivider

@sidebarHeading('Interface')
@sidebarDropdown([
    'title' => 'Components',
    'icon' => 'fas fa-fw fa-cog',
    'active' => '/demos/components/*'
    ], function ($dropdown) {
        $dropdown->heading('Custom Components:');
        $dropdown->menu(['title' => 'Buttons', 'route' => 'demos.components.buttons']);
        $dropdown->menu(['title' => 'Cards', 'route' => 'demos.components.cards']);
    }
)
@sidebarDropdown([
    'title' => 'Utilities',
    'icon' => 'fas fa-fw fa-wrench',
    'active' => '/demos/utilities/*'
    ], function ($dropdown) {
        $dropdown->heading('Custom Utilities:');
        $dropdown->menu(['title' => 'Colors', 'route' => 'demos.utilities.colors']);
        $dropdown->menu(['title' => 'Borders', 'route' => 'demos.utilities.borders']);
        $dropdown->menu(['title' => 'Animations', 'route' => 'demos.utilities.animations']);
        $dropdown->menu(['title' => 'Others', 'route' => 'demos.utilities.others']);
    }
)
@sidebarDivider

@sidebarHeading('Addons')

@sidebarDropdown([
    'title' => 'Pages',
    'icon' => 'fas fa-fw fa-folder',
    'active' => '/demos/pages/*'
    ], function ($dropdown) {
        $dropdown->heading('Login Screens:');
        $dropdown->menu(['title' => 'Login', 'route' => 'demos.pages.login']);
        $dropdown->menu(['title' => 'Register', 'route' => 'demos.pages.register']);
        $dropdown->menu(['title' => 'Forgot Password', 'route' => 'demos.pages.forgot-password']);
        $dropdown->heading('Other Pages:');
        $dropdown->menu(['title' => '404 Page', 'route' => 'demos.pages.404']);
        $dropdown->menu(['title' => 'Blank Page', 'route' => 'demos.pages.blank']);
    }
)
@sidebarMenu([
    'title' => 'Charts',
    'icon' => 'fas fa-fw fa-chart-area',
    'route' => 'demos.charts',
])
@sidebarMenu([
    'title' => 'Tables',
    'icon' => 'fas fa-fw fa-table',
    'route' => 'demos.tables',
])
@sidebarDivider
