<?php

namespace Therour\SbAdmin2\Providers;

use Therour\SbAdmin2\SbMenuBuilder;
use Therour\SbAdmin2\SbOptions;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Therour\SbAdmin2\Commands\PublishAssetCommand;

class SbAdmin2ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SbOptions::class);

        $this->mergeConfigFrom(
            __DIR__.'/../../config/config.php',
            'sb-admin-2'
        );
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
        
        $this->commands(PublishAssetCommand::class);

        $this->registerPlugins();

        if (config('sb-admin.component', false)) {
            $this->registerComponents(config('sb-admin.component.registers', []));
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
     * Define available plugins.
     *
     * @return array
     */
    protected function availablePlugins()
    {
        return [
            'chart' => [
                'js' => [asset('sb-admin-2/plugins/chart.js/Chart.min.js')],
            ],
            'datatable' => [
                'js' => [
                    asset('sb-admin-2/plugins/datatables/jquery.dataTables.min.js'),
                    asset('sb-admin-2/plugins/datatables/dataTables.bootstrap4.min.js'),
                ],
                'css' => [asset('sb-admin-2/plugins/datatables/dataTables.bootstrapt4.min.css')],
            ],
        ];
    }

    protected function registerComponents(array $registers)
    {
        foreach ($registers as $name => $component) {
            if ($component) {
                Blade::component($component, $name);
            }
        }
    }

    /**
     * Register Css and js plugins.
     *
     * @return void
     */
    protected function registerPlugins()
    {
        View::share('sbAssets', $this->availablePlugins());
        View::share('sbPluginsLoaded', []);
        View::share('sbOptions', $this->app->make(SbOptions::class));
        View::share('sbSidebarMenu', $this->app->make(SbMenuBuilder::class));

        // Blade::component('sb-admin-2::components.sidebar.menu', 'sidebarMenu');
        Blade::component('sb-admin-2::components.sidebar.dropdown', 'sidebarDropdown');

        Blade::directive('requireplugin', new Directives\RequirePlugin);

        Blade::directive('setOption', new Directives\SetOption);

        Blade::directive('sidebarDivider', function ($expression) {
            return '<?php echo $sbSidebarMenu->renderDivider() ?>';
        });
        Blade::directive('sidebarHeading', function ($expression) {
            return '<?php echo $sbSidebarMenu->renderHeading('.$expression.') ?>';
        });

        Blade::directive('sidebarMenu', function ($expression) {
            return '<?php echo $sbSidebarMenu->renderMenu('.$expression.') ?>';
        });

        Blade::directive('sidebarDropdown', function ($expression) {
            return '<?php echo $sbSidebarMenu->renderDropdown('.$expression.') ?>';
        });
    }
}
