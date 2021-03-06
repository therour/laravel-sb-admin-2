# Laravel Sb Admin 2 Theme
original theme [link](https://startbootstrap.com/themes/sb-admin-2/)

## Installation
1. Install the package via composer
```
composer require therour/laravel-sb-admin
```
2. **(Laravel 5.5 below only)** add the provider to the config file `config/app.php`
```php
/*
* Package Service Providers...
*/
...
Therour\SbAdmin2\Providers\SbAdmin2ServiceProvider::class,
...
```
3. Install views.
    a. Install by scaffold the `make:auth`-like views using (nb: this will publish the config file, and public asset files)
    ```
    php artisan sb-admin:scaffold
    ```
    b. Publish the resource files, (this will publish resource files in `resources/sb-admin-2` folders, and publish the config file)
    ```
    php artisan vendor:publish --provider="Therour\SbAdmin2\Providers\SbAdmin2ServiceProvider"
    // if you managed to publish the compiled assets, run this
    php artisan sb-admin:publish-assets
    ```
4. (optional) Run the demo routes, by set `demo => true` in your `config/sb-admin-2.php` config file, Then you can access `/demos` routes.

## Special Usage
### Define global variables in view
you can set variable in first view by using blade directive `@setOption`
```
// home.blade.php
@setOption('title', 'Home')

// sb-admin-2/views/layouts/partials/topbar.blade.php
<h1>{{ $sbOptions->title }}</h1>
```
### Create Sidebarmenu
You can define your sidebar layout by add configuration in `config/sb-admin-2.php`
```php
'sidebar-menu' => 'layouts.menu' // set to layouts/menu.blade.php
```
to create the menu itself you can use some blade directives
example is in [sidebar-menu.blade.php](https://github.com/therour/laravel-sb-admin-2/blob/master/resources/views/layouts/partials/sidebar-menu.blade.php)
```php
@sidebarHeading('Heading 1') // output Heading 1

@sidebarMenu([ // Create Menu
    'title' => 'Application',
    'icon' => 'fas fa-fw fa-cubes',
    'url' => '#',
    // 'active' => '/' // define your url pattern to match for giving active class
    // by default is current url == menu's url will set the menu's class active.
])

@sidebarDropdown([ // Create Dropdown menu
    'title' => 'Dropdowns',
    'icon' => 'fas fa-fw fa-cubes',
    'active' => '/dropdowns/*' // same as menu's active url pattern
    ], function ($dropdown) {
        $dropdown->heading('Heading:'); // add heading inside dropdown
        $dropdown->menu(['title' => 'Sub Menu 1', 'url' => url('dropdowns/1')]);
        $dropdown->menu(['title' => 'Sub Menu 2', 'url' => url('dropdowns/2')]);
        $dropdown->menu(['title' => 'Sub Menu 3', 'url' => url('dropdowns/3')]);
        $dropdown->menu(['title' => 'Sub Menu 4', 'url' => url('dropdowns/4')]);
    }
)
```
