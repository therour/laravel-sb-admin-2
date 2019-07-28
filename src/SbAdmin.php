<?php

namespace Therour\SbAdmin2;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Blade;

class SbAdmin implements Factory
{
    /**
     * Container instance.
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $app;

    /**
     * configurations.
     *
     * @var array
     */
    protected $config;

    /**
     * Create new instance.
     *
     * @param array $config
     */
    public function __construct(Container $app, array $config = [])
    {
        $this->app = $app;
        $this->config = $config;
    }

    /**
     * Registering components.
     *
     * @return void
     */
    public function registerComponents()
    {
        foreach ($this->config['components'] as $alias => $component) {
            Blade::component($component, $alias);
        }
    }

    /**
     * Retrieve plugins from config.
     *
     * @return array
     */
    public function getAvailablePlugins()
    {
        return $this->config['plugins'];
    }

    /**
     * Load remo routes;
     *
     * @return void
     */
    public function loadDemoRoutes()
    {
        $this->app['router']
            ->namespace('\Therour\SbAdmin2\Controllers')
            ->prefix('demos')
            ->middleware('web')
            ->name('demos.')
            ->group(__DIR__.'/../routes/demo.php');
    }
}
