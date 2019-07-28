<?php

namespace Therour\SbAdmin2\Providers;

use Therour\SbAdmin2\SbAdmin;
use Therour\SbAdmin2\SbOptions;
use Therour\SbAdmin2\SbMenuBuilder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Therour\SbAdmin2\Factory as SbAdminFactory;
use Therour\SbAdmin2\Commands\MakeScaffoldCommand;
use Therour\SbAdmin2\Commands\PublishAssetCommand;
use Therour\SbAdmin2\SbMenuFactory;

class SbAdmin2ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php',
            'sb-admin-2'
        );

        $this->app->singleton(SbAdminFactory::class, function ($app) {
            return new SbAdmin($app, $app['config']['sb-admin-2']);
        });
        $this->app->singleton(SbOptions::class);
        $this->app->singleton(SbMenuFactory::class, function () {
            return new SbMenuBuilder;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('sb-admin-2.php'),
        ], 'config');

        $this->registerResources();

        if ($this->app->runningInConsole()) {
            $this->commands(PublishAssetCommand::class);
            $this->commands(MakeScaffoldCommand::class);
        }

        $this->registerPlugins();

        $this->app[SbAdminFactory::class]->registerComponents();
        if (config('sb-admin-2.demo', false)) {
            $this->app[SbAdminFactory::class]->loadDemoRoutes();
        }
    }

    protected function registerResources()
    {
        $this->loadViewsFrom([
            resource_path('sb-admin-2/views'),
            __DIR__.'/../../resources/views',
        ], 'sb-admin-2');

        $this->publishes([
            __DIR__.'/../../resources' => resource_path('sb-admin-2'),
        ], 'sb-admin-2-resources');
    }

    /**
     * Register Css and js plugins.
     *
     * @return void
     */
    protected function registerPlugins()
    {
        View::share('sbOptions', $this->app->make(SbOptions::class));

        View::share('sbAssets', $this->app[SbAdminFactory::class]->getAvailablePlugins());
        View::share('sbPluginsLoaded', []);

        Blade::directive('requireplugin', new Directives\RequirePlugin);
        Blade::directive('setOption', new Directives\SetOption);
        Blade::directive('sidebarDivider', function ($expression) {
            return '<?php echo app(\Therour\SbAdmin2\SbMenuFactory::class)->renderDivider() ?>';
        });
        Blade::directive('sidebarHeading', function ($expression) {
            return '<?php echo app(\Therour\SbAdmin2\SbMenuFactory::class)->renderHeading('.$expression.') ?>';
        });
        Blade::directive('sidebarMenu', function ($expression) {
            return '<?php echo app(\Therour\SbAdmin2\SbMenuFactory::class)->renderMenu('.$expression.') ?>';
        });
        Blade::directive('sidebarDropdown', function ($expression) {
            return '<?php echo app(\Therour\SbAdmin2\SbMenuFactory::class)->renderDropdown('.$expression.') ?>';
        });
    }
}
