<?php

namespace Therour\SbAdmin2\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class MakeScaffoldCommand extends Command
{
    use DetectsApplicationNamespace;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sb-admin:scaffold
                    {--views : Only scaffold the authentication views}
                    {--force : Overwrite existing views by default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic login and registration views and routes';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'auth/login.stub' => 'auth/login.blade.php',
        'auth/register.stub' => 'auth/register.blade.php',
        'auth/passwords/email.stub' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.stub' => 'auth/passwords/reset.blade.php',
        'layouts/brand.stub' => 'layouts/brand.blade.php',
        'layouts/topbar.stub' => 'layouts/topbar.blade.php',
        'layouts/sidebar-menu.stub' => 'layouts/sidebar-menu.blade.php',
        'home.stub' => 'home.blade.php',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('make:auth', ['--force' => true]);

        // Replace the default make:auth views with sb-admin-2 views
        $this->exportViews();

        // Copy the assets into public path
        $this->call('sb-admin:publish-assets');

        // Set the `topbar, sidebar-menu, brand` configuration to use the exported views.
        $this->configureLayout();

        $this->info('Sb-Admin-2 scaffolding generated successfully.');
    }

    protected function configureLayout()
    {
        if (! file_exists(config_path('sb-admin-2.php'))) {
            $this->info('Publishing config file...');
            $this->call('vendor:publish', [
                '--provider' => 'Therour\SbAdmin2\Providers\SbAdmin2ServiceProvider',
                '--tag' => 'config'
            ]);
        }

        $file = config_path('sb-admin-2.php');
        $replaced = preg_replace(
            ['/(\'topbar\') => (\w+)/','/(\'sidebar-menu\') => (\w+)/','/(\'brand\') => (\w+)/'],
            ['$1 => \'layouts.topbar\'','$1 => \'layouts.sidebar-menu\'','$1 => \'layouts.brand\''],
            file_get_contents($file)
        );

        file_put_contents(
            $file,
            $replaced
        );
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            copy(
                __DIR__.'/stubs/make/views/'.$key,
                $this->getViewPath($value)
            );
        }
    }

    /**
     * Get full view path relative to the app's configured view path.
     *
     * @param  string  $path
     * @return string
     */
    protected function getViewPath($path)
    {
        return implode(DIRECTORY_SEPARATOR, [
            config('view.paths')[0] ?? resource_path('views'), $path,
        ]);
    }
}
