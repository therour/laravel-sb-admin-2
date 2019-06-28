@sidebarHeading('Heading 1')

@sidebarMenu([
    'title' => 'Application',
    'icon' => 'fas fa-fw fa-cubes',
    'url' => '#',
])

@sidebarDropdown([
    'title' => 'Dropdowns',
    'icon' => 'fas fa-fw fa-cubes',
    'active' => '/dropdowns/*'
    ], function ($dropdown) {
        $dropdown->heading('Heading:');
        $dropdown->menu(['title' => 'Sub Menu 1', 'url' => url('dropdowns/1')]);
        $dropdown->menu(['title' => 'Sub Menu 2', 'url' => url('dropdowns/2')]);
        $dropdown->menu(['title' => 'Sub Menu 3', 'url' => url('dropdowns/3')]);
        $dropdown->menu(['title' => 'Sub Menu 4', 'url' => url('dropdowns/4')]);
    }
)
